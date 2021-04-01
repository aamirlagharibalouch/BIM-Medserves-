<?php
require_once('fun_login.php'); // Includes Login Script
?>
<?php
if(isset($_SESSION['login_user'])){
    if ($_SESSION['type']=="admin") {
        header("location: admin/dashboard/index.php");
    }else if ($_SESSION['type']=="driver") {
        header("location: driver/dashboard/index.php");
    }else if ($_SESSION['type']=="employee") {
        header("location: employee/dashboard/index.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="admin/dashboard/assets/img/favicon.png">
    <title>B.I Medserve | Admin | Employee| Driver | Login | Login Here</title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin/dashboard/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admin/dashboard/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="admin/dashboard/assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container" style="background-color: #fff;">
                <h3 class="account-title" style="font-family: arial black;"><img style="width: 180px;" src="admin/dashboard/assets/img/logo.png"><span style="font-family: cooper black;">B.<span style="font-family: times new roman; font-size: 35px;"></span>I.M</span></h3>
                <div class="row">
                     <div class="col-sm-4">
                            <div class="account-wrapper">
                        <div class="account-logo">
                            <?php
                             if (isset($_POST['submit'])) {
                    
                    if (isset($error)) {
                        ?>
                        <div class="alert alert-warning"><?php echo $error; ?></div>
                        <?php
                    }
                }
            ?>
                        </div>
                        <form method="POST">
                          
                            <div class="form-group">
                                <center>
                                    <table cellpadding="">
                                        <tr><td colspan="3" style="text-align: center;"><label style="text-align: center;" class="focus-label">Select User Type</label></td></tr>
                                    <tr>
                                        <td style="text-align: center; padding-right: 5px; padding-left: 5px;"><input name="usertype" value="admin" class="form-control" type="radio">Admin</td>
                                        
                                        <td style="text-align: center; padding-right: 5px; padding-left: 5px;"><input name="usertype" value="employee" class="form-control" type="radio">Employee</td>

                                        <td style="text-align: center; padding-right: 5px; padding-left: 5px;"><input name="usertype" value="driver" class="form-control" type="radio">Driver</td>
                                    </tr>
                                </table>
                                </center>
                            </div>
                            
                            <div class="form-group form-focus">
                                <label class="focus-label">Username or Email</label>
                                <input name="username" class="form-control floating" type="text">
                            </div>

                            <div class="form-group form-focus">
                                <label class="focus-label">Password</label>
                                <input name="password" class="form-control floating" type="password">
                            </div>
                            <div class="form-group text-center">
                                <button style="color: #1E1E1E;background-color:#D39F05; font-size: 22px; font-family: cooper black;" class="btn btn-block account-btn btn-rounded" style="border-radius: 12px;" name="submit" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                        </div>
                        <div class="col-sm-8" style="background-image: url(meds.png);">
                            
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="admin/dashboard/assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="admin/dashboard/assets/js/popper.min.js"></script>
    <script type="text/javascript" src="admin/dashboard/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="admin/dashboard/assets/js/app.js"></script>
</body>
</html>