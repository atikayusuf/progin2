<?php
	function connectDatabase(){
			//create connection
			$con = mysqli_connect("localhost","progin","progin","progin_405_13510087");
			
			//check the connection
			if (mysqli_connect_errno($con)) {
			echo "Gagal melakukan koneksi ke MySQL : " . mysqli_connect_error();
			}
		return $con;
	}
	
	function closeDatabase(){
		mysqli_close($con);
	}
?>