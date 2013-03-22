<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<!--[if lt IE 9]>
	<script src="html5.js" type="text/javascript"></script>
	<![endif]-->
	<title>ToDo</title>
	<script src="myscript.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="css.css" />
</head>

<body>
<?php
	require_once("database.php");
	$con = connectDatabase();
	
	$avatar = 
?>
<header>	
			<div id="tes">
			<br></br>
			<a href="profil.html"><img id="avatar" src="images/avatar.jpg"></a>
			<h3 id="username"><a href="profil.html">Arief Suharsono</a>
			<h1 id="logo"><a href="dashboard.html"><img src="images/logo2.png"/></a>
			<form name="formsearch" action="search.php" method="get">
			<input name="searchquery" size="20" type="text" maxlength="20">
			<select name="FilterSearch">
			<option value="0" selected="selected">Semua</option>
			<option value="1">Username</option>
			<option value="2">Judul Kategori</option>
			<option value="3">Task</option></select><img src="images/search-icon.png" onclick='SearchDatabase();'>
			</form>
			<h3 id="logout"><a href="index.html">Logout</a>
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
			<li class="menu-item"><a href="dashboard.html">Dashboard</a></li>
			<li class="menu-item"><a href="profil.html">Profile</a></li>
			
				<ul>
					<li class="menu-item"><a href="index.html">Subpage 1</a></li>
					<li class="menu-item"><a href="index.html">Subpage 2</a></li>
					<li class="menu-item"><a href="index.html">Subpage 3</a></li>
				</ul></li>
		</ul>
		</nav>
		
		
		
	</header>

			<div id="main">
		<div id="primary">
			<div id="content" role="main">
					<article class="post">	
						
						
							<form action="dashboard.html" method="post">
							<strong>New Task </strong> <br />
							<input name="newtask" size="30" type="text" >
							<br/><br/>
						
							<strong>Deadline</strong> <br />
							<input name="deadline" type="date" >
							<br/><br/>
							
							<strong>Assignee </strong> <br />
							<input name="assignee" type="text" size="30" maxlength="20"> 
							<br/><br/>
							
							<strong>Comment </strong> <br />
							<input name="comment" type="text" size="30" maxlength="20"> 
							<br/><br/>
							
							<strong>Tag </strong> <br />
							<input name="tag" type="text" size="30" maxlength="20" >
							<br/><br/>
							
							
							<p>Upload file:
							<input type="file" name="datafile" size="40">
							</p>
							<input type="submit" name="btnsubmit" value="Add Task">
							</form>
									
					</article>		
				</div>			
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