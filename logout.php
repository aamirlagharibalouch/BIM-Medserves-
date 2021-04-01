<?php
	session_start();
	if(isset($_SESSION['login_user'])){
			session_unset();
			session_destroy();
			unset($_SESSION['login_user']);

				header("location: index.php");
		}else if(!isset($_SESSION['login_user'])){
			session_destroy();
			unset($_SESSION['login_user']);

				header("location: index.php");
		}
?>