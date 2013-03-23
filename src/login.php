<?php
	require_once("database.php");
	$con = connectDatabase();
	
	$user = $_POST['userid'];
	$pass = $_POST['pass'];
        session_destroy();
	session_start();
	
	$resultuser = mysqli_query($con,"SELECT * FROM `user` WHERE username='$user'");
	$rowuser = mysqli_fetch_array($resultuser);
	if(($rowuser['username'] == $user) && ($rowuser['password'] == $pass)){
		$_SESSION['namauser'] = $user;
                ini_set("session.cookie_lifetime","2592000"); 
		header("Location:dashboard.php");
	} else {
		header("Location:index.php");
	}
?>