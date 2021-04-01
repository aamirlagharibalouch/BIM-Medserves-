<?php
session_start();// Starting Session
// Storing Session
?>

<?php $expiry = 1800 ;//session expiry required after 30 mins
    if (isset($_SESSION['LAST']) && (time() - $_SESSION['LAST'] > $expiry)) {
        session_unset();
        session_destroy();
    }
    $_SESSION['LAST'] = time();
?>

<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require_once("dashboard/connection/config.php");
// Selecting Database
//$db = mysqli_select_db("company", $connection);

$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT * from login where email = '$user_check' ";
//$ses_sql=mysqli_query("select username from login where username='$user_check'", $connection);
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

$_SESSION['login_user']=$row['email']; // Initializing Session
$_SESSION['FullName']=$row['name']; // Initializing Session
$_SESSION['id']=$row['id'];


$login_session =$row['email'];
if(!isset($login_session)){
mysqli_close($conn); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>