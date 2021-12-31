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
  <li><a class="active" href="insert_club.php">Add New Club</a></li>
  <li><a href="update_club.php">Update Club Details</a></li>
  <li><a href="delete_club.php">Delete Club</a></li>
</ul><br>



<form action="insert_club_result.php" method="post">

      <b>Club Name:- <input type="text" placeholder="jazbaat" name="club" required><br><br>

      Domain:- <input type="text" placeholder="Cultural" name="domain" required><br><br>

      Registration Fees:- <input type="text" name="fee" required><br><br>

      Club Coordinator:- <input type="text" name="coordinator"><br><br>

      Club Co-Coordinator:- <input type="text" name="cocoordinator"><br><br>
      
      <br><input type="submit" name="submit" value="Insert">
      
    </b>
  </form>';



$club_name= $_POST['club']; 
$domain = $_POST['domain']; 
$entry_fee = $_POST['fee'];
$coordinator = $_POST['coordinator']; 
$co_coordinator = $_POST['cocoordinator'];

$link = mysql_connect('localhost', 'root', '');
if(!$link) {
echo '<h4><center>Unable to connect to server.<br>'.mysql_error().'</center></h4>';
}

$db = mysql_select_db('gymkhana');
if(!$db) {
echo '<h4><center>Unable to select database.<br>'.mysql_error().'</center></h4>';
}

$query1 = "CREATE TABLE $club_name (roll_no INTEGER(8) NOT NULL, name VARCHAR(15) NOT NULL, DATE DATE, mobile BIGINT(10), address LONGTEXT, email_id VARCHAR(30), PRIMARY KEY(roll_no) )";
$result1 = mysql_query($query1);
if($result1 == FALSE) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}

else {

$query ="INSERT INTO clubs (club_name, domain, entry_fee, coordinator, co_coordinator) VALUES ('$club_name', '$domain', '$entry_fee', '$coordinator', '$co_coordinator')";
$result = mysql_query($query);


if($result == FALSE) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}


else {
echo '<center><h2><br>New Club:- '.$club_name.' Club<br>Successfully Registered.<br>
Note*:- The entry in this club can be done through admin only. For making a page of this club contact developer.</h2></center>';
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


