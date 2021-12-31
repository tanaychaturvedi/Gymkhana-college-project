<?php
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
echo '
<div class="sidenav">
  <a href="admin_page.php">Main</a>
  <button class="dropdown-btn"><a href="#" class="active">Students Profile</a></button>
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
</script>';


echo '<div style="margin-left:207px; margin-top:108px; padding:1px 16px; height:auto;">
<center><h1>Student Profile</h1><br>

<ul>
  <li><a href="insert_student.php">New Registration</a></li>
  <li><a class= "active" href="update_student.php">Update Profile</a></li>
  <li><a href="delete_student.php">Delete Registration</a></li>
</ul><br>

  <form action="update_student_result.php" method="post">

      <b>Roll_No.:- <input type="text" placeholder="2019130" name="roll_no" required><br><br>

      Name:- <input type="text" placeholder="Enter Name" name="name"><br><br>

      Mobile No.:- <input type="text" placeholder="9876543210" name="mobile"><br><br>

      Address:- <input type="text" placeholder="Patna, Bihar" name="address"><br><br>

      Email id:- <input type="email" placeholder="123@gmail.com" name="email_id"><br><br>
      
      <br><input type="submit" name="submit" value="Update">
      
    </b>
  </form>

<br><br><h2>Note* :- It will update student details and old details will permanently erase.</h2>



</center>
</div>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gymkhana IIITDM Jabalpur</title>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="sidenav.css">
</head>

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

</div>'; 
exit(); 
} 
else{ 
header('location:admin.php'); 
exit(); 
} 
?>

