<?php
	require_once("database.php");
	$con = connectDatabase();
	
	$user = $_POST["userid"];
	$pass = $_POST["pass"];
	
	$resultuser = mysqli_query($con,"SELECT `username` FROM `user`
			WHERE username='$user'");
	$resultpass = mysqli_query($con,"SELECT `password` FROM `user`
			WHERE password='$pass'");
	$rowuser = mysqli_fetch_array($resultuser);
	$rowpassword = mysqli_fetch_array($resultpass);
	if(($rowuser['username'] == $user) && ($rowpassword['password'] == $pass)){
		session_start();
		$_SESSION["login"] = $user;
		header("Location:dashboard.php");
	} else {
	//	document.getElementById("salah_login").value="Username atau Password salah";
	}
?>