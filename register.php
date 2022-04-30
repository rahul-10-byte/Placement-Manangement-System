<?php

session_start();
header('location:index.php');

$con = mysqli_connect('localhost','root');
	if($con){
		echo"connection";
	}

	mysqli_select_db($con,'admin');

	$name = $_POST['name'];
	$email = $_POST['email'];
    $prn = $_POST['prn'];
	$password = $_POST['pass'];
	

	// echo $username;
	// echo $password;

	$check = "select * from users where email='$email' && pass='$password' ";
	$resultcheck = mysqli_query($con,$check);	

	 $row = mysqli_num_rows($resultcheck);
			if($row == 1){
				
				header('location:index.php');	

			}	else{

				$q = "insert into users(name, email, prn, pass) values ('$name', '$email', '$prn', '$password')"  ;

				$result = mysqli_query($con,$q);

			}



?>


