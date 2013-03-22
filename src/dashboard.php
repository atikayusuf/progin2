<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<!--[if lt IE 9]>
	<script src="html5.js" type="text/javascript"></script>
	<![endif]-->
	<title>ToDo</title>
	<link rel="stylesheet" type="text/css" media="all" href="css.css" />
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
			<li class="menu-item current_page_item"><a href="dashboard.html">Dashboard</a></li>
			<li class="menu-item"><a href="profil.html">Profile</a></li>
		
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
					
				</div>
				<div id="tasklist">
					<article class="post">
					<?php
							$con=mysqli_connect("localhost","progin","progin","progin_405_13510055");
							
							
							// Check connection
							if (mysqli_connect_errno($con))
							  {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							  }
							  
							$result = mysqli_query($con,"SELECT * FROM task");

							while($row = mysqli_fetch_array($result))
							  {
							  echo $row['nama'] . " " . $row['deadline']. " " . $row['kategori'];
							  echo "<br />";
							  }

							mysqli_close($con);
						?>
				</div>
				</article>
		</div>
								
		<div id="secondary" class="widget-area">
			<aside class="widget">	
			<h1 class="widget-title">Categories</h1>
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