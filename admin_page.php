<?php
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
echo '
<div class="sidenav">
  <a href="admin_page.php" class="active">Main</a>
  <button class="dropdown-btn">Students Profile</button>
  <div class="dropdown-container">
    <a href="view_student.php">View Students Details</a>
    <a href="update_student.php">Update Student Details</a>
  </div>
  <button class="dropdown-btn">Registrations</button>
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
<center><h1>Welcome '.$_SESSION['USER_ID'].'</h1><br>


<table border=1>
<tr><th rowspan=4>Students Profile</th>
  <td colspan=2>View Students Profile</td></tr>
  <tr>
  <td rowspan=3>Update Student Profile</td>
  <td>Add New Registration</td>
  </tr>
<tr>
  <td>Update Student Profile</td></tr>
<tr>
  <td>Delete Student Profile</td></tr>
<tr><th>Registrations</th>
  <td colspan=2>No. of registrations in all clubs within time span</td>
  </tr>
<tr><th rowspan=4>Clubs</th>
  <td colspan=2>View Clubs Details</td></tr>
<tr>
  <td rowspan=3>Update Club Details</td>
  <td>Add New Club</td></tr>
<tr>
  <td>Update Club Details</td></tr>
<tr>
  <td>Delete Club</td></tr>
</table><br><br></center>

<h3>Merits:-</h3>
<ol><li>Can check every clubs</li><br>
<li>Can modify and delete permanently any clubs</li><br>
<li>Can check any participants profile</li><br>
<li>Can modify any students profile</li><br>
<li>Can remove anyone from any club</li><br></ol>

<h3>Demerits:-</h3>
<ol><li>Admin can see and modify any clubs details. Admins are not for their individual club.</li><br>
<li>Admin have to be careful because there is no record stored about the activity by admin.</li><br>
<li>Admin can check any student profile irrespective of its club.</li><br>
<li>Admin can not change in webpages without contacting developer.</li><br></ol>

<h3>Key Points:-</h3>
<ol><li>Admins can trace number of registration from time to time of any club.</li><br>
<li>Admin have full control over database.</li><br>
<li>All the data are linked to one another.</li><br></ol>







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


