
<?php require_once ("connection/config.php");?>

<!DOCTYPE html>
<html>
<head>
    <title>View Quote</title>

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

    <?php if (isset($_GET['hashref']) && isset($_GET['txquote']) && $_GET['hashref']!="" && $_GET['txquote']!="" && isset($_GET['txquote']) && $_GET['hashref']!="") {

        $rf=$_GET['hashref'];
        $quotenum=$_GET['txquote'];

        $q1= "SELECT * from quote where quotenumber='$quotenum' AND refcode='$rf' ";
        $res = mysqli_query($conn,$q1);
        if(mysqli_num_rows($res)>0){
            while ($qte = mysqli_fetch_assoc($res)) {
                $data_quote = $qte;
            }
        }else{$data_quote = null;}
        ?>

        <div class="container-fluid" style="padding-top: 5px;">
            <h2 align="center">
                <a onclick="ex()" class="btn btn-danger">Close</a>
            </h2>
                </div>
                    <div id="maincont" class="container">

            <div class="row" style="padding-top: 8px;">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2><img style="width: 120px; height: 100px;" src="include/logo.png"></h2><h3 style="margin-top: 86px;" class="pull-right">QUOTE</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                    <strong>QUOTE TO:</strong><br>
                        <strong><?php echo $data_quote['name']; ?></strong><br>
                        <?php echo $data_quote['name']; ?><br>
                    </address>

                    <address>
                        <?php echo $data_quote['email']; ?>
                    </address>

                    <address style="width: 50%;">
                        <?php echo $data_quote['address']; ?>
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

            <div class="row">
                <div class="col-xs-6">
                    <!-- <address>
                        <strong>Payment Method:</strong><br>
                        Visa ending **** 4242<br>
                        jsmith@email.com
                    </address> -->
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Quote Number: </strong> <?php echo $data_quote['quotenumber'];  ?><br>
                        <strong>Date: </strong> <?php echo $data_quote['quotedate']; ?><br>
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
                                <tr style="background-color: #D79911; color:black; font-weight: bold; font-family: sans-serif;">
                                    <td><strong>Items</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-center"><strong>Unit Price</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                $rf=$_GET['hashref'];
                                $quotenum=$_GET['txquote'];
                                
                                $q2= "SELECT * from quote where quotenumber='$quotenum' AND refcode='$rf' ";
                                $res1 = mysqli_query($conn,$q2);
                                if(mysqli_num_rows($res1)>0){
                                    $totals=0;
                                    while ($dbres = mysqli_fetch_assoc($res1)) { 
                                        $dbress = $dbres;
                                        ?>
                                            <tr>
                                                <td class="no-line" ><?php echo $dbres['itemdescription']; ?></td>
                                                <td style="text-align: center;" class="no-line" ><?php echo $dbres['qty']; ?></td>
                                                <td style="text-align: center;" class="no-line"><?php echo "$".$dbres['unitprice'].".00"; ?></td>
                                                <td style="text-align: right;" class="no-line"><?php $totals += $dbres['unitprice']*$dbres['qty'];  echo "$".$dbres['unitprice']*$dbres['qty'].".00"; ?></td>
                                            </tr>
                                        <?php
                                    }
                                }else{$dbress = null; $dbres=null;}
                                 ?>
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right"><?php echo "$".$totals.".00"; ?></td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Discount</strong></td>
                                    <td class="no-line text-right"><?php echo "$".$dbress['discount'].".00"; ?></td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Tax</strong></td>
                                    <td class="no-line text-right"><?php echo "$".$dbress['tax'].".00"; ?></td>
                                </tr>
                                <tr><td class="no-line" colspan="4"><hr/></td></tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Grand Total</strong></td>
                                    <td class="no-line text-right"><?php echo "$".($totals-$dbress['discount']+$dbress['tax']).".00"; ?></td>
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
<script type="text/javascript">
    function ex() {
        close();
    }
</script>

<br>
<br/>
<br/>
</body>
</html>