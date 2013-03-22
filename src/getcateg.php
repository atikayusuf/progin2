<?php
	$q=$_GET["q"];
	$con=mysqli_connect("localhost","progin","progin","progin_405_13510055");
	
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }

	$result = mysql_query($con, "SELECT * FROM task WHERE kategori = '".$q."'");

	while($row = mysql_fetch_array($result))
	  {
	  echo $row['nama'] . " " . $row['deadline'];
	  }

	mysql_close($con);
?>