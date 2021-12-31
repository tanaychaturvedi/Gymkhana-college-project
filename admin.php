<?php 
session_start(); 
session_unset(); 
session_destroy(); 
?>



<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gymkhana IIITDM Jabalpur</title>
<link rel="stylesheet" href="main.css">
</head>
<body>

<div style="margin-left:100px; margin-right:100px; margin-top:108px; padding:1px 16px; height:auto;">
<center>

<h1>This page is only for admin</h1><br>
<h3 align="center"> - Enter your login Details - </h3> 
<form name="adminloginform" method="post" action="admin_check.php"> 
<table width="300" border="1" cellpadding="5" cellspacing="0"> 
<tr> 
<td style="color:rgb(6,59,118)"><b>Login</b></td> 
<td><input name="login" type="text" id="login" required/></td> 
</tr> 
<tr> 
<td style="color:rgb(6,59,118)"><b>Password</b></td> 
<td><input name="password" type="password" required/></td> 
</tr> 
<tr> 
<td colspan="2" align="center"> 
<input type="submit" name="submit" value="Login" /></td> 
</tr> 
</table><br>
</form>

<h3>Note* :- If you want to be an admin, then you have to contact developer and should have authority permission.</h3>

<img src="photo/home1.jpg" class="w3-image w3-greyscale-min" style="width:100%">


</center>
</div>



<div class="top">
<a href= https://www.iiitdmj.ac.in/ target= blank><img src="https://www.iiitdmj.ac.in/img/title14.jpg" alt="IIITDM Jabalpur" height="60px" width=100%></a>
<hr style="height:2px;border-width:0;color:gray;background-color:white; margin-top:0px; margin-bottom:0px;">
<ul>
<li><a href="Home.html">Home</a></li>
<li><a href="News.html">News</a></li>
<li class="dropdown">
 <a href="javascript:void(0)" class="dropbtn">Clubs</a>
    <div class="dropdown-content">
      <a href="Sports.html">Sports</a>
      <a href="Cultural.html">Cultural</a>
      <a href="Technical.html">Technical</a>
    </div>
</li>
<li style="float: right;"><a class="active" href="admin.php">Admin_Login</a></li>
</ul>
</div>



</body>
</html>