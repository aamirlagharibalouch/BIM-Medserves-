<?php 

session_start(); // Starting Session
require_once("admin/connection/config.php");

	$error=null; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
				$error = "Invalid Email or Password !";
		}else if(isset($_POST['username']) && isset($_POST['password'])){
			

			extract($_POST);
				
				if (isset($_POST['usertype'])) {
					if ($_POST['usertype']=="admin") {
						
						$query = "SELECT * FROM login WHERE password='$password' AND email='$username' ";
					 $result = mysqli_query($conn,$query);
					
					if(mysqli_num_rows($result)>0){
						while ($d = mysqli_fetch_assoc($result)) {
							$row = $d;
						}
						
						$_SESSION['type']="admin";

						if ($row >0 && $_SESSION['type']=="admin") {
							//$_SESSION['type']=$type;
						$_SESSION['login_user']=$username; // Initializing Session
						$_SESSION['FullName']=$row['name']; // Initializing Session
						$_SESSION['id']=$row['id']; // Initializing Session

						header("location: admin/dashboard/index.php"); // Redirecting To Other Page
						}

					}else{
						$error = "Sorry account not found wiith this email or username !";
					}

					}else if($_POST['usertype']=="employee"){

						$query = "SELECT * FROM employees WHERE password='$password' AND email='$username' ";
					 $result = mysqli_query($conn,$query);
					
					if(mysqli_num_rows($result)>0){
							while ($d = mysqli_fetch_assoc($result)) {
								$row = $d;
							}
							
							$_SESSION['type']=$row['type'];

								if ($row >0 && $_SESSION['type']=="employee") {
									//$_SESSION['type']=$type;
								$_SESSION['login_user']=$username; // Initializing Session
								$_SESSION['FullName']=$row['firstname']." ".$row['lastname']; // Initializing Session
								$_SESSION['id']=$row['id']; // Initializing Session

								// previllageforemployee
								if ($row['dashboard']=="Yes") {
									$_SESSION['dashboard']=$row['dashboard'];
								}
								if ($row['orderscreen']=="Yes") {
									$_SESSION['orderscreen']=$row['orderscreen'];
								}
								if($row['assigndelivery']=="Yes"){
									$_SESSION['assigndelivery']=$row['assigndelivery'];
								}
								if ($row['addcustomer']=="Yes") {
									$_SESSION['addcustomer']=$row['addcustomer'];
								}
								
								if($row['addappointment']=="Yes"){$_SESSION['addappointment']=$row['addappointment'];}
								if($row['billing']=="Yes"){$_SESSION['billing']=$row['billing'];}

								if($row['addemployees']=="Yes"){$_SESSION['addemployees']=$row['addemployees'];}
								if($row['adddrivers']=="Yes"){$_SESSION['adddrivers']=$row['adddrivers'];}
								if($row['addvehicle']=="Yes"){$_SESSION['addvehicle']=$row['addvehicle'];}
								
								if ($row['addproduct']=="Yes") {
									$_SESSION['addproduct']=$row['addproduct'];
								}

								header("location: employee/dashboard/index.php"); // Redirecting To Other Page
								}

						}else{
							$error = "Sorry account not found wiith this email or username !";
						}
						

					}else if($_POST['usertype']=="driver"){
						$query = "SELECT * FROM drivers WHERE password='$password' AND email='$username' ";
					 $result = mysqli_query($conn,$query);
					
					if(mysqli_num_rows($result)>0){
							while ($d = mysqli_fetch_assoc($result)) {
								$row = $d;
							}
							
							$_SESSION['type']="driver";

							if ($row >0 && $_SESSION['type']=="driver") {
								//$_SESSION['type']=$type;
							$_SESSION['login_user']=$username; // Initializing Session
							$_SESSION['FullName']=$row['firstname']." ".$row['lastname']; // Initializing Session
							$_SESSION['id']=$row['id']; // Initializing Session

							header("location: driver/dashboard/index.php"); // Redirecting To Other Page
							}

						}else{
							$error = "Sorry account not found wiith this email or username !";
						}

					}
				}else{
					$error = "Please Select User Type !";
				}

		}

	}

?>