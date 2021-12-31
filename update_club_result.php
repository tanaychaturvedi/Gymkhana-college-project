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
  <li><a class = "active" href="update_club.php">Update Club Details</a></li>
  <li><a href="delete_club.php">Delete Club</a></li>
</ul><br>


<form action="update_club_result.php" method="post">

      <b>Club Name:- <input type="text" placeholder="jazbaat" name="club" required><br><br>

      Domain:- <input type="text" placeholder="Cultural" name="domain"><br><br>

      Registration Fees:- <input type="text" name="fee"><br><br>

      Club Coordinator:- <input type="text" name="coordinator"><br><br>

      Club Co-Coordinator:- <input type="text" name="cocoordinator"><br><br>
      
      <br><input type="submit" name="submit" value="Update">
      
    </b>
  </form>

<br><br><h2>Note* :- It will update club details and old details will permanently erase.</h2>';





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

$query ="SELECT club_name FROM clubs WHERE club_name='$club_name' ";
$result = mysql_query($query);

if($result == FALSE) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}

else {

$row = mysql_fetch_assoc($result);

if(!$row['club_name']) {
echo '<h4><center>There is no '.$club_name.' club.</h4></center>';
}

else {

$status = TRUE;

echo '<h2><center><u>For '.$club_name.' club:-</u></center></h2>';

if($domain) {
$qry1 = "UPDATE clubs SET domain = '$domain' WHERE club_name='$club_name' ";
$result1 = mysql_query($qry1);
if($result1 == FALSE) {
echo '<h4><center>Wrong Entry in Domain<br>'.mysql_error().'</center></h4>';
}
else {
echo '<h4><center>Domain set to :- '.$domain.'</center></h4>';
}
$status = FALSE;
}

if($entry_fee) {
$qry2 = "UPDATE clubs SET entry_fee = '$entry_fee' WHERE club_name='$club_name' ";
$result2 = mysql_query($qry2);
if($result2 == FALSE) {
echo '<h4><center>Wrong Entry in Entry Fee<br>'.mysql_error().'</center></h4>';
}
else {
echo '<h4><center>Entry Fee set to :- '.$entry_fee.'</center></h4>';
}
$status = FALSE;
}

if($coordinator) {
$qry3 = "UPDATE clubs SET coordinator = '$coordinator' WHERE club_name='$club_name' ";
$result3 = mysql_query($qry3);
if($result3 == FALSE) {
echo '<h4><center>Wrong Entry in Coordinator<br>'.mysql_error().'</center></h4>';
}
else {
echo '<h4><center>Club Coordinator set to :- '.$coordinator.'</center></h4>';
}
$status = FALSE;
}

if($co_coordinator) {
$qry4 = "UPDATE clubs SET co_coordinator = '$co_coordinator' WHERE club_name='$club_name' ";
$result4 = mysql_query($qry4);
if($result4 == FALSE) {
echo '<h4><center>Wrong Entry in Co-Coordinator<br>'.mysql_error().'</center></h4>';
}
else {
echo '<h4><center>Club Co-Coordinator set to :- '.$co_coordinator.'</center></h4>';
}
$status = FALSE;
}

if($status) {
echo '<h4><center>Enter details that you want to update.</center></h4>';
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