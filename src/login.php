<?php
	session_destroy();
	session_start();
	$_SESSION["infologin"] = "";
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
		//session_start();
		$_SESSION["login"] = $user;
		$_SESSION["infologin"] = "";
		header("Location:dashboard.php");
	} else {
		$_SESSION["infologin"] = "login gagal, silahkan ulangi";
		header("Location:index.php");
	}
?>