<?php
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
echo '
<div class="sidenav">
  <a href="admin_page.php">Main</a>
  <button class="dropdown-btn">Students Profile</button>
  <div class="dropdown-container">
    <a href="view_student.php">View Students Details</a>
    <a href="update_student.php">Update Student Details</a>
  </div>
  <button class="dropdown-btn">Registrations</button>
  <div class="dropdown-container">
    <a href="registration.php">Number of Registration</a>
  </div>
  <button class="dropdown-btn"><a href="#" class="active">Clubs</a></button>
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
<center><h1>Club Detail</h1><br>

<ul>
  <li><a href="insert_club.php">Add New Club</a></li>
  <li><a href="update_club.php">Update Club Details</a></li>
  <li><a class="active" href="delete_club.php">Delete Club</a></li>
</ul>




<br><form action="delete_club_result.php" method="post">

      <b>Club Name:- <input type="text" placeholder="jazbaat" name="club" required><br>
      
      <br><input type="submit" name="submit" value="Delete">
      
    </b>
  </form><br>';









$club_name= $_POST['club'];

$link = mysql_connect('localhost', 'root', '');
if(!$link) {
echo '<h4><center>Unable to connect to server<br>'.mysql_error().'</center></h4>';
}

$db = mysql_select_db('gymkhana');
if(!$db) {
echo '<h4><center>Unable to select database<br>'.mysql_error().'</center></h4>';
}

if($club_name == "") {
echo '<br><center><h4>Enter Club Name</h4></center><br>';
}

else {

$qry = "DROP TABLE $club_name";
$result1 = mysql_query($qry);

if(!$result1) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}

else {
$query ="DELETE FROM clubs WHERE club_name = '$club_name'";
$result = mysql_query($query);

$query2 ="DELETE FROM main_reg WHERE club_name = '$club_name'";
$result2 = mysql_query($query2);

if(!$result OR !result2) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}

else {
echo '<br><h4><center>'.$club_name.' Club <br> Successfully Removed</h4><br>
<h2>Note* :- Club details are removed as well as participants datas are also removed.</center></h2><br>';
}
}

}





echo '</center>
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


