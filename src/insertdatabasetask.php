<?php
	session_start();
	$user = $_SESSION["login"];
	
	require_once("database.php");
	$con = connectDatabase();
	
	$namatask = $_POST["newtask"];
	$attachment1 = $_FILES["file1"]["name"];
	$attachment2 = $_FILES["file2"]["name"];
	$attachment3 = $_FILES["file3"]["name"];
	$deadline = $_POST["deadline"];
	$assignee1 = $_POST["assignee1"];
	$assignee2 = $_POST["assignee2"];
	$assignee3 = $_POST["assignee3"];
	$comment = $_POST["comment"];
	$tag = $_POST["tag"];
	
	mysqli_query($con,"INSERT INTO `task`(`namaTask`, `deadline`, `status`, `creatorTaskName`, `namaKategori`, `jumlahKomentar`)
		VALUES ('$namatask','$deadline','Belum Selesai','$user','Pemrograman_Internet',1)");
	
	if ($attachment1 != ""){
		mysqli_query($con,"INSERT INTO `attach`(`namaTask`, `attachment`) VALUES ('$namatask','$attachment1')");
	}
	if ($attachment2 != ""){
	mysqli_query($con,"INSERT INTO `attach`(`namaTask`, `attachment`) VALUES ('$namatask','$attachment2')");
	}
	if ($attachment3 != ""){
	mysqli_query($con,"INSERT INTO `attach`(`namaTask`, `attachment`) VALUES ('$namatask','$attachment3')");
	}
	
	if ($assignee1 != ""){
	mysqli_query($con,"INSERT INTO `tasktoasignee`(`namaTask`, `asigneeName`) VALUES ('$namatask','$asignee1')");
	}
	if ($assignee2 != ""){
	mysqli_query($con,"INSERT INTO `tasktoasignee`(`namaTask`, `asigneeName`) VALUES ('$namatask','$asignee2')");
	}
	if ($assignee2 != ""){
	mysqli_query($con,"INSERT INTO `tasktoasignee`(`namaTask`, `asigneeName`) VALUES ('$namatask','$asignee3')");
	}
	
	mysqli_query($con,"INSERT INTO `tagging`(`namaTask`, `tag`) VALUES ('$namatask','$tag')");
	header("Location:rinciantask.php");
?>