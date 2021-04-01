<?php

// $server="50.62.209.47";
// $username="belal123123123";
// $password="belal123123123";
// $database="medservices";

$server="localhost";
$username="root";
$password="";
$database="medservices";

/*
** Establish Connection
*/
$conn=mysqli_connect($server,$username,$password,$database) or die("COnnection Not Established");
