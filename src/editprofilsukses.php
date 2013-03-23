<!DOCTYPE html>
<html dir="ltr" lang="en-US">


<head>
	
	<title>ToDo</title>
	<link rel="stylesheet" type="text/css" media="all" href="css.css" />
<body>
<header>	
			
			<div id="tes">
			<br></br>
			<h1 id="logo"><a href="dashboard.html"><img src="images/logo2.png"/></a>
			<input name="search" size="30" type="text" maxlength="20"><img src="images/search-icon.png"/>
			</div>
	
</header>
		
<script type ="text/javascript">
	var checkusername = /^[A-Za-z0-9 ]{6,20}$/;
	var checkpwd=  /^[A-Za-z0-9!@#$%^&*()_]{8,20}$/;
	var checkname= /^.+\ (\[?)([A-Za-z]{1,15})(\]?)$/;
	var emailvalid = /^[a-zA-Z]{2,15}(\]?)+\@(\[?)[a-zA-Z0-9\-\_\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/;

	/*function validatefoto()
{
var extensions = new Array("jpg","jpeg");
var foto = document.form.foto.value;
var image_length = document.form.foto.value.length;
var pos = foto.lastIndexOf('.') + 1;
var ext = foto.substring(pos, image_length);
var final_ext = ext.toLowerCase();
for (i = 0; i < extensions.length; i++)
{
if(extensions[i] == final_ext)
{
return true;
}

}

return false;
}*/

	function validate ()
	{
	var name= document.form.username;
	var pwd = document.form.password;
	var checkconfirm=document.form.confirm;
	var fullname=document.form.fullname;
	var email=document.form.email;
	var tanggal=document.form.birth;
	var foto=document.form.foto;
	
	
	/*atribut pengecekan foto
	var foto_length= document.form.foto.value.length;
	var pos= foto.lastIndexof('.')+1;
	var ext=foto.substring(pos, foto_length);
	var final_ext= ext.toLowerCase();*/
	
	
	
	if	(!checkusername.test(name.value))
		{							
		document.getElementById("salah username").innerHTML="Nama harus lebih dari 6 karakter";
		name.focus();
		return false;}
	else if (!checkpwd.test(pwd.value))
		{document.getElementById("salah password").innerHTML="password harus lebih dari 8 karakter";
		pwd.focus();
		return false;
		}
	else if ((pwd.value==name.value)||(pwd.value==email.value))
		{document.getElementById("salah sama").innerHTML="password tidak boleh sama dengan email atau username!";
		pwd.focus();
		return false;
		}
	else if (checkconfirm.value!=pwd.value)
	{document.getElementById("salah tidaksama").innerHTML="password tidak cocok!";
		checkconfirm.focus();
		return false;
	}
	else if(!checkname.test(fullname.value))
	{document.getElementById("salah tidaklengkap").innerHTML="Nama minimal terdiri dari dua kata dipisah spasi";
		fullname.focus();
		return false;
	}
	
	else if (!emailvalid.test(email.value))
	{document.getElementById("salah email").innerHTML="email tidak valid!";
		email.focus();
		return false;
	}
	
	
	else if (pwd.value==email.value)
		{document.getElementById("salah samapassword").innerHTML="Email tidak boleh sama dengan password!";
		email.focus();
		return false;
		}
	
	else if (tanggal.value==0)
	{
	document.getElementById("salah tanggal").innerHTML="Tanggal harus dipilih!";
		tanggal.focus();
		return false;
		
	}
	/*else if (!validatefoto())
	{
	
		document.getElementById("salah foto").innerHTML="foto harus jpg,jpeg";
		foto.focus();
		return false;
		
	}*/
	else if (foto.value==0)
	{
	
		document.getElementById("salah foto").innerHTML="foto harus diisi";
		foto.focus();
		return false;
		
	}
	
	
	else
		{return true;}
	}
		
		
	</script>
	
</head>

<body>

<header >	
			
			<div id="tes">
			<br></br>
			<h1 id="site-title"> 
			</div>
		
	</header>

		<div id="elemenkiri">
		<div id="primary">
			<div id="content" role="main">
					<article class="post">	
					<header class="entry-header">
							<h1 class="entry-title"><a href="#"> EDITED INFO</a></h1>
					<?php
					require_once("database.php");
					$con= connectDatabase();
					
					/*$fullname = $_REQUEST['fullname'];
					$birth = $_REQUEST['tanggalLahir'];
					$pass = $_REQUEST['password'];
					
					if (!empty($fullname)) {
						print "$fullname<br>";
						}

					if (!empty($birth)) {
					print "$birth<br>";
					}

					if (!empty($pass)) {
					print "$pass<br>";
					}
					
					/*if(strlen(isset(!empty($_REQUEST['fullname']))) > 0) {
					   $fullname = $_REQUEST['fullname'];
					   echo "FULLNAME: <br />".$fullname;
					} else {
					  echo "Nothing was entered into ".$_REQUEST['fullname']."!";
					}
					
					if(strlen(isset(!empty($_REQUEST['tanggalLahir']))) > 0) {
					   $birth = $_REQUEST['tanggalLahir'];
					   echo "FULLNAME: <br />".$birth;
					} else {
					  echo "Nothing was entered into ".$_REQUEST['tanggalLahir']."!";
					}
					
					if(strlen(isset(!empty($_REQUEST['password']))) > 0) {
					   $pass = $_REQUEST['password'];
					   echo "NEW PASSWORD: <br />".$pass;
					} else {
					  echo "Nothing was entered into ".$_REQUEST['password']."!";
					}
					*/
					
					if (isset($_POST['btnsubmit'] )) {
						$fullname = $_POST['fullname'];
						//$avatar = $_POST['avatar'];
						$pass = $_POST['password'];
						//$birth = $_POST['tanggalLahir'];

						$con=mysqli_connect("localhost","progin","progin","progin_405_13510055");
						
						
						// Check connection
						if (mysqli_connect_errno($con))
						  {
						  echo "Failed to connect to MySQL: " . mysqli_connect_error();
						  }
					
					$query= "UPDATE user SET fullname='".$fullname."' WHERE username='atikayusuf'";
						  
					mysqli_query($conn, $query);
					$num = mysqli_affected_rows($conn);

					if ($num > 0) {
						echo "Profile Edited";
						?> <br/> <br/>
						<a href="profil.php" > Go Back To Profile Page</a>
						<?php
						}
					else {
						echo "Failed";
						}
					}
					
					?>
	
					</header>	
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