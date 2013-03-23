<!DOCTYPE html>
<?php
/*	session_start();
	$user = $_SESSION["login"];
	if ($user == ""){
		header("Location:index.php");
	}*/
?>
<html dir="ltr" lang="en-US">
<head>
	<!--[if lt IE 9]>
	<script src="html5.js" type="text/javascript"></script>
	<![endif]-->
	<title>ToDo</title>
	<link rel="stylesheet" type="text/css" media="all" href="css.css" />
	<script>
		function showUser()
		{
			var xmlhttp;
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
			xmlhttp.open("GET","getcateg.php?q="+document.forms["form"].elements["category"].value,true);
			xmlhttp.send();
		}
		
		function addcateg(str)
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
			xmlhttp.open("POST","addcateg.php?q="+str,true);
			xmlhttp.send();
		}
	</script>
</head>

<body>
<?php
	require_once("database.php");
	$con = connectDatabase();
	
	$resultavatar = mysqli_query($con,"SELECT avatar FROM user
			WHERE username='$user'");
	
	$rowavatar = mysqli_fetch_array($resultavatar);
?>
<header>	
			<div id="tes">
			<br></br>
			<a href="profil.php"><img id="avatar" src=<?php echo $rowavatar['avatar'] ?>></a>
			<h3 id="username"><a href="profil.php"><?php echo "$user"?></a>
			<h1 id="logo"><a href="dashboard.php"><img src="images/logo2.png"/></a>
			<form name="formsearch" action="search.php" method="get">
			<input name="searchquery" size="30" type="text" maxlength="30">
			<select name="filtersearch">
			<option value="0" selected="selected">Semua</option>
			<option value="1">Username</option>
			<option value="2">Judul Kategori</option>
			<option value="3">Task</option></select><img src="images/search-icon.png" onclick='SearchDatabase();'>
			</form>
			<h3 id="logout"><a href="logout.php">Logout</a>
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
							<a href="deletetask.php"><img src="images/delete.png"/></a>
							
							<a href="viewtask.php?nama="'.$namatask.'"><?php echo $namatask; ?></a>
							<?php
							echo "<PRE></PRE>";
							echo $deadline;
							echo "<PRE></PRE>";
							?>
							<a href="changetaskstatus.php?task="'.$namatask.'"&filter=-2"><img src="images/check.png"/></a>
							<?php echo $status; ?>
							<?php
							echo "<PRE></PRE>";
							
							$result2 = mysqli_query($con,"SELECT tag FROM tagging WHERE namaTask = '$namatask'");
							while($row2 = mysqli_fetch_array($result2)){
								$tag=$row2[0];
								echo $tag;
								echo ", ";

							}
							
							echo "<PRE></PRE>";
			
					
							}
							 $q=$_GET["q"]; 
							?>
							
						<a href="addtask.php?namakategori="'.$q.'">+ Add Task</a>
				</div>	
				</div>
				</article>
				</div>
		</div>
								
		<div id="secondary" class="widget-area">
			<aside class="widget">	
			<h1 class="widget-title">Categories</h1>
			<?php
			/*$result3 = mysqli_query($con,"SELECT * FROM kategori");
							
			while($row3 = mysqli_fetch_array($result3))
			  {
				
				$namakategori=$row3[0];
				?>
				<input type='button' onclick='showUser(this.value);' value=<?php echo $namakategori; ?>>
				<?php
				echo "</br>";
				
			  }*/
			?>
			
			<form>
			<select name="category" onchange="showUser()">
			<option value="">Select a category:</option>
			<option value="Projects">Projects</option>
			<option value="Work">Work</option>
			</select>
		</form>
				
				<div class="nav-previous"><a href="#openModal">+ Add category</a>
					<div id="openModal" class="modalDialog">
						<div>
							<a href="#close" title="Close" class="close">X</a>
							<form action="" method="POST">
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