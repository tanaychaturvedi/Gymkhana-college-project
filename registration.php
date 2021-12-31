<?php
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
echo '
<div class="sidenav">
  <a href="admin_page.php">Main</a>
  <button class="dropdown-btn">Students Profile</a></button>
  <div class="dropdown-container">
    <a href="view_student.php">View Students Details</a>
    <a href="update_student.php">Update Student Details</a>
  </div>
  <button class="dropdown-btn"><a href="#" class="active">Registrations</a></button>
  <div class="dropdown-container">
    <a href="registration.php">Number of Registration</a>
  </div>
  <button class="dropdown-btn">Clubs</button>
  <div class="dropdown-container">
    <a href="view_club.php">View Club Details</a>
    <a href="update_club.php">Update Club Details</a>
  </div>
</div>



<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

<div style="margin-left:207px; margin-top:108px; padding:1px 16px; height:auto;">
<center><h1>Registrations</h1><br>

<b><form action="registration_result.php" method="post">
	From:- <input type="date" name="start" required><br><br>
	To:- <input type="date" name="end" required><br><br>
	Club Name:- <input type="text" placeholder="Jazbaat" name="club_name"><br><br>

	<input type="submit" name="submit" value="View_Registrations">
</form></b>





</center>
</div>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gymkhana IIITDM Jabalpur</title>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="sidenav.css">
</head>
<body>

<div class="top">
<a href= https://www.iiitdmj.ac.in/ target= blank><img src="https://www.iiitdmj.ac.in/img/title14.jpg" alt="IIITDM Jabalpur" height="60px" width=100%></a>
<hr style="height:2px;border-width:0;color:gray;background-color:white; margin-top:0px; margin-bottom:0px;">
<ul>
<li><a href="logout_home.php">Home</a></li>
<li><a href="logout_news.php">News</a></li>
<li class="dropdown">
 <a href="javascript:void(0)">Clubs</a>
    <div class="dropdown-content">
      <a href="logout_sports.php">Sports</a>
      <a href="logout_cultural.php">Cultural</a>
      <a href="logout_technical.php">Technical</a>
    </div>
</li>
<li style="float: right;"><a href="logout.php">Log_Out</a></li>
</ul>
</div>



</body>
</html>'; 
exit(); 
} 
else{ 
header('location:admin.php'); 
exit(); 
} 
?>


