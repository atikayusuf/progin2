<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<!--[if lt IE 9]>
	<script src="html5.js" type="text/javascript"></script>
	<![endif]-->
	<title>ToDo</title>
	<link rel="stylesheet" type="text/css" media="all" href="css.css" />
	<script>
		function showUser(str)
		{
			if (str=="")
			{
			document.getElementById("tasklist").innerHTML="";
			return;
			} 
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("tasklist").innerHTML=xmlhttp.responseText;
			}
			}
			xmlhttp.open("GET","getcateg.php?q="+str,true);
			xmlhttp.send();
		}
	</script>
</head>

<body>
<header>	
			
<div id="tes">
<br></br>
<h1 id="logo"><a href="dashboard.html"><img src="images/logo2.png"/></a>
<input name="search" size="30" type="text" maxlength="20"><img src="images/search-icon.png"/>
</div>
</header>
<div id="page" >
	<header id="branding">
		<hgroup>
			<h1 id="site-title">              <a href="dashboard.html"></a></h1>
			<h2 id="site-description">            </h2>
		</hgroup>

		<nav id="access" role="navigation">
		<ul class="menu">
			<li class="menu-item current_page_item"><a href="dashboard.php">Dashboard</a></li>
			<li class="menu-item"><a href="profil.php">Profile</a></li>
		
		</ul>
		</nav>
		
	</header>

	<div id="main">
		<div id="primary">
				<div id="content" role="main">
					<article class="post">
						<header class="entry-header">
							<h1 class="entry-title">Tasks</h1>
						</header>
					</article>
					
				
				<div id="tasklist">
					<article class="post">
					<div class="entry-content">
					<form action="dashboard.php" method="post">
					<?php
							require_once("database.php");
							$con= connectDatabase();
							
							
							$result = mysqli_query($con,"SELECT * FROM task");
							
							while($row = mysqli_fetch_array($result))
							  {
								
								$namatask=$row[0];
								$deadline=$row[1];
								$status=$row[2];
							?>
							
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
							
						
				</div>	
				</div>
				</article>
				</div>
		</div>
								
		<div id="secondary" class="widget-area">
			<aside class="widget">	
			<h1 class="widget-title">Categories</h1>
				
					<form>
						<select name="category" onchange="showUser(this.value)">
						<option value="">Select a category:</option>
						<option value="Projects">Projects</option>
						<option value="Work">Work</option>
						</select>
					</form>

				
				<div class="nav-previous"><a href="#openModal">+ Add category</a>
					<div id="openModal" class="modalDialog">
						<div>
							<a href="#close" title="Close" class="close">X</a>
							<form action="" method="GET">
							<strong>Add New Category</strong> <br />
							<input name="newcateg" size="30" type="text">
							<input type="submit" name="btnsubmit" value="Add" onClick="addcateg(newcateg)">
							</form>
						</div>
					</div>
				</div>
			
			</aside>
		</div>

		<footer id="colophon">
			<div id="site-generator">
				<p>&copy; <a href="#">AAA</a>-IF3038 Pemrograman Internet 2013 <br />
				</p>
			</div>
		</footer>
	</div>
</div>	
</body>
</html>