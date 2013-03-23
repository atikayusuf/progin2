<?php

	/*session_start();
	$user = $_SESSION["login"];
	if ($user == ""){
		header("Location:addcateg.php");
	}*/

	$q=$_POST["q"];
	require_once("database.php");
	$con= connectDatabase();
	$result = mysql_query($con, "INSERT INTO kategori VALUES('".$q."', '".$user."'");
	
?>