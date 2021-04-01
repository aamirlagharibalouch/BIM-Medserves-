<?php
    require_once ("connection/config.php");
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Invoice | B.I.M </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="include/favicon.png">

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>

</head>
<body>


    <?php if (isset($_GET['app']) && isset($_GET['cus']) && $_GET['cus']!="" && $_GET['app']!="" && isset($_GET['inv']) && $_GET['inv']!="") {

        $q1= "SELECT * from appointment where id=".$_GET['app'];
        $res = mysqli_query($conn,$q1);
        if(mysqli_num_rows($res)>0){
            while ($apt = mysqli_fetch_assoc($res)) {
                $data_apt = $apt;
            }
        }else{$data_apt = null;}

        $q2= "SELECT * from customers where id=".$_GET['cus'];
        $res2 = mysqli_query($conn,$q2);
        if(mysqli_num_rows($res2)>0){
            while ($cus = mysqli_fetch_assoc($res2)) {
                $customer = $cus;
            }
        }else{$customer=null;}

        $q3= "SELECT * from invoice where customerid=".$_GET['cus']." AND appointmentid=".$_GET['app']." AND invoicenumber=".$_GET['inv'];
        $res3 = mysqli_query($conn,$q3);
        if(mysqli_num_rows($res3)>0){
            while ($inv = mysqli_fetch_assoc($res3)) {
                $invoice_details = $inv;
            }
        }else{$invoice_details=null;}
    
        ?>
        
        <div id="maincont" class="container">

            <div class="row" style="padding-top: 8px;">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2><img style="width: 120px; height: 100px;" src="include/logo.png"></h2><h3 style="margin-top: 86px;" class="pull-right">INVOICE</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                    <strong>BILL TO:</strong><br>
                        <strong><?php echo $customer['firstname'].' '.$customer['lastname']; ?></strong><br>
                        <?php echo $customer['firstname'].' '.$customer['lastname']; ?><br>
                    </address>

                    <address>
                        <?php echo $customer['phonenumber']; ?><br>
                        <?php echo $customer['email']; ?>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                    <strong>B.I.M Enterprises</strong><br>
                        PO Box 631347<br>
                        Houston, TX 77263<br>
                        United States<br>
                        346-256-3156
                    </address>
                </div>
            </div>

            <?php $qty = $invoice_details['quantity'];
                                        $pri = $invoice_details['price'];
                                        $total = ($pri*$qty); ?>
            <div class="row">
                <div class="col-xs-6">
                    
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Invoice Number: </strong> <?php echo $invoice_details['invoicenumber']; ?><br>
                        <strong>Invoice Date: </strong> <?php echo $invoice_details['createdat']; ?><br>
                        <strong>Payment Due: </strong> <?php echo date($invoice_details['paymentdue']); ?><br>
                        <strong>Amount Due (USD): <?php echo "$".($total-$invoice_details['discount']+$invoice_details['tax']).".00"; ?></strong><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div  class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Items</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $data_apt['name']; ?> <?php if (isset($invoice_details['roundt'])) {
                                        echo'<br/>'.$invoice_details['roundt'].'<br/>';
                                    } ?> <br/><?php if (isset($data_apt['time'])) {
                                        
                                        $d=strtotime($data_apt['time']);
                                        echo "Pick up at " . date("h:i:sa", $d);

                                    } ?><br/><?php if (isset($data_apt['pickupaddress'])) {
                                        echo "pu address ".$data_apt['pickupaddress'];
                                    }else{echo"Pick up address not available !";} ?><br/>

                                <?php if (isset($data_apt['destinationaddress'])) {
                                        echo "Drop off ".$data_apt['destinationaddress'];
                                    }else{echo"Drop off address not available !";} ?>
                                    <br/><br/><?php echo 'Pt name : '.$customer['firstname']." ".$customer['lastname']; ?><br/>
                                    <?php echo $customer['phonenumber']; ?>
                                </td>
                                    <td class="text-center"><?php if (isset($invoice_details['price'])) {
                                        echo "$".$invoice_details['price'].".00";
                                    }else{
                                        echo'Price not Found !';
                                    } ?></td>
                                    <td class="text-center"><?php if (isset($invoice_details['quantity'])) {
                                        echo $invoice_details['quantity'];
                                    }else{
                                        echo'Quantity not Found !';
                                    } ?></td>
                                    <td class="text-right"><?php echo "$".$total.".00"; ?></td>
                                </tr>
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right"><?php echo "$".$total.".00"; ?></td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Discount</strong></td>
                                    <td class="no-line text-right"><?php echo "$".$invoice_details['discount'].".00"; ?></td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Tax</strong></td>
                                    <td class="no-line text-right"><?php echo "$".$invoice_details['tax'].".00"; ?></td>
                                </tr>
                                <tr><td class="no-line" colspan="4"><hr/></td></tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right"><?php echo "$".($total-$invoice_details['discount']+$invoice_details['tax']).".00"; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php
    }else{
        ?>
        <div class="row" style="padding-top: 100px;"><div class="alert alert-info">Sorry Wrong Entry ! Try again...</div></div>
        <?php
    } ?>
</div>

<br>
<br/>
<br/>
</body>
</html>