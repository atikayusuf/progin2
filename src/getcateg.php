<?php
	$q=$_GET["q"];
	$con=mysqli_connect("localhost","progin","progin","progin_405_13510055");
	
	if (mysqli_connect_errno($con))
	 {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 }

	$result = mysql_query($con, "SELECT * FROM task WHERE namaKategori = '".$q."'");
	echo "whoo";
	while($row = mysqli_fetch_array($result))
	  {
		
		$namatask=$row[0];
		$deadline=$row[1];
		$status=$row[2];
	  <input name ="data" type="checkbox" value="<?php echo $namatask;?>">	
		<?php

		echo $namatask;
		echo "<PRE></PRE>";
		echo $deadline;
		echo "<PRE></PRE>";
		echo $status;
		echo "<PRE></PRE>";
		
		$result2 = mysqli_query($con,"SELECT tag FROM tagging WHERE namaTask = '".$namatask."'");
		while($row2 = mysqli_fetch_array($result2)){
			$tag=$row2[0];
			echo $tag;
			echo ", ";

		}
		
		echo "<PRE></PRE>";
		}
			?>  
			<input type="submit" name="btnsubmit" value="DELETE TASK">
			<input type="submit" name="btnsubmit" value="MARK DONE">
			</form>
			<?php 
			mysqli_free_result($result);
			mysqli_free_result($result2);
			mysqli_close($con);
?>