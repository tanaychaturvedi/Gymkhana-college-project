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
</script>

<div style="margin-left:207px; margin-top:108px; padding:1px 16px; height:auto;">
<center><h1>Student Profile</h1><br>

<ul>
  <li><a href="insert_student.php">New Registration</a></li>
  <li><a href="update_student.php">Update Profile</a></li>
  <li><a class="active" href="delete_student.php">Delete Registration</a></li>
</ul><br>



<form action="delete_student_result.php" method="post">

      <b>Roll_No.:- <input type="text" placeholder="2019130" name="roll_no" required><br><br>
      Club Name:- <input type="text" placeholder="Jazbaat" name="club"><br><br>
      
      <br><input type="submit" name="submit" value="Delete">
      <br><input type="submit" name="submit" value="Delete_From_All_Clubs">
      
    </b>
  </form>
<br><br><h2>Note* :- It will permanently delete the entry.</h2></center>';



$roll_no = $_POST['roll_no'];
$club = $_POST['club'];


$link = mysql_connect('localhost', 'root', '');
if(!$link) {
echo '<h4><center>Unable to connect to server<br>'.mysql_error().'</center></h4>';
}

$db = mysql_select_db('gymkhana');
if(!$db) {
echo '<h4><center>Unable to select database<br>'.mysql_error().'</center></h4>';
}


if ($_POST['submit'] == 'Delete') {

if($club == "") {
echo '<br><center><h4>Enter Club Name</h4></center><br>';
}

else {

$qry8 ="SELECT roll_no FROM $club WHERE roll_no = '$roll_no'";
$rst8 = mysql_query($qry8);
if(!$rst8) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}
else {
$data = $rst8['roll_no'];
if($data == FALSE) {
echo '<h4><center>Roll No. :- '.$roll_no.' is not registered in '.$club.' club.</center></h4>';
}

else {
$query1 ="DELETE FROM main_reg WHERE roll_no = '$roll_no' AND club_name = '$club'";
$result1 = mysql_query($query1);

$query2 ="DELETE FROM $club WHERE roll_no = '$roll_no'";
$result2 = mysql_query($query2);

if(!$result1 OR !$result2) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}

else {
echo '<br><h4><center>Roll No:- '.$roll_no.'<br>Successfully removed from '.$club.' club.</center></h4><br>';
}

}
}
}
}

$status = FALSE;


if ($_POST['submit'] == 'Delete_From_All_Clubs') {

$query1 ="SELECT club_name FROM main_reg WHERE roll_no ='$roll_no'";
$result1 = mysql_query($query1);

if(!$result1) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}

else {

while ($row = mysql_fetch_assoc($result1))
{
$club_name = $row['club_name'];
$query2 ="DELETE FROM $club_name WHERE roll_no = '$roll_no'";
$result2 = mysql_query($query2);

if(!$result2) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}

else {
echo '<br><h4><center>Roll No:- '.$roll_no.' <br>Successfully removed from club:- '.$row['club_name'].'.</center></h4><br>';

$status = TRUE;
}
}
}


$query3 ="DELETE FROM main_reg WHERE roll_no = '$roll_no'";
$result3 = mysql_query($query3);


if(!$result3) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}

else {
if($status == TRUE) {
echo '<br><h4><center>Roll No:- '.$roll_no.'<br>Successfully removed from all clubs.</center></h4><br>';
}

else {
echo '<br><h4><center>Roll No:- '.$roll_no.' is not registered in any clubs.</center></h4><br>';
}
}
}







echo '</div>
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

