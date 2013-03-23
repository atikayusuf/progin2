<?php
	/*require "validation.php";*/
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<script>
		function isUsernameExist()
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
			document.getElementById("salah username").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","validationusername.php?username="+document.forms["form"].elements["username"].value,true);
		xmlhttp.send();
		}
		
		function isEmailExist()
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
			document.getElementById("salah email").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","validationemail.php?email="+document.forms["form"].elements["email"].value,true);
		xmlhttp.send();
		}
	</script>
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
		{
		return true;
		}
	}
		
		
	</script>

		<div id="elemenkiri">
		<div id="primary">
			<div id="content" role="main">
					<article class="post">	
						
							<form name="form" action="insertdatabase.php" method="post" onsubmit="return validate();"  enctype='multipart/form-data'>
							
							<strong >Username </strong> <br />
							<input id="username_login" name="username" size="30" type="text" maxlength="20" onkeyup="isUsernameExist()">
							<div id="salah username"> </div>
							<br/>
							
							<strong>Password </strong> <br />
							<input name="password" type="password" size="30" maxlength="20" >
							<div id="salah password"> </div>
							<div id="salah sama"> </div>
							<br/>
							
							<strong>Confirm Password </strong> <br />
							<input name="confirm" type="password" size="30" maxlength="20"> 
							<div id="salah tidaksama"> </div>
							<br/>
							
							<strong>Full Name </strong> <br />
							<input name="fullname" type="text" size="30" maxlength="30">
							<div id="salah tidaklengkap"> </div>							
							<br/>
							
							<strong>Email </strong> <br />
							<input id="email_login" name="email" type="text" size="30" maxlength="50" onkeyup="isEmailExist()"> 
							<div id="salah email"> </div>
							<div id="salah samapassword"> </div>
							<br/>
							
							<strong>Birth</strong> <br />
							<input name="birth" type="date" >
							<div id="salah tanggal"> </div>
							<br/>
							
							
							<strong>Upload Avatar</strong> <br />
							<input name="foto" type="file" size="30" >
							<div id="salah foto"> </div>
							
							<br/>
							
							<input id="submitbutton" name="submit" type="submit" value="Register Me!">
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