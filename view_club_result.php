<?php
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 

$club = $_POST['club'];

echo '<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gymkhana IIITDM Jabalpur</title>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="sidenav.css">
</head>
<body>




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




<div style="margin-left:207px; margin-top:108px; padding:1px 16px; height:auto;">
<center><h1>Club Detail</h1><br>

<form action="view_club_result.php" method="post">
	<b>Club Name:- </b>
	<input type="text" placeholder="jazbaat" name="club"><br><br>

	<input type="submit" name="submit" value="View_Details">
	<input type="submit" name="submit" value="View_Participants">
	<input type="submit" name="submit" value="View_All_Clubs_Details">
</form></center><br><br>';


$link = mysql_connect('localhost', 'root', '');
if(!$link) {
echo '<h4><center>Unable to connect to server.<br>'.mysql_error().'</h4></center>';
}

$db = mysql_select_db('gymkhana');
if(!$db) {
echo '<h4><center>Unable to select database.<br>'.mysql_error().'</h4></center>';
}

if ($_POST['submit'] == 'View_Details') {

if($club == FALSE) {
echo '<h4><center>Enter Club Name</h4></center>';
}

else {
$qry = "SELECT * FROM clubs WHERE club_name = '$club'";
$result = mysql_query($qry);

if(!$result) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}
$row = mysql_fetch_assoc($result);
if(!$row['club_name']) {

echo '<h4><center>There is no '.$club.' club.</h4></center>';

}


else {
echo '<h2><center>Details of '.$club.' club</h2></center>
<center><table border="1"><tr>
<th> Club Name </th>
<th> Domain </th>
<th> Entry Fee </th>
<th> Coordinator </th>
<th> Co-Coordinator </th>
</tr>
<tr>
<td>'.$row['club_name'].'</td>
<td>'.$row['domain'].'</td>
<td>'.$row['entry_fee'].'</td> 
<td>'.$row['coordinator'].'</td>
<td>'.$row['co_coordinator'].'</td>
</tr>
</table></center>';
}
}
}



if ($_POST['submit'] == 'View_Participants') {

if($club == FALSE) {
echo '<h4><center>Enter Club Name</h4></center>';
}


else {
$qry = "SELECT club_name FROM clubs WHERE club_name = '$club'";
$result = mysql_query($qry);

if(!$result) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}

$ro = mysql_fetch_assoc($result);

if(!$ro['club_name']) {
echo '<h4><center>There is no '.$club.' club.</h4></center>';
}

else {

$qry1 = "SELECT * FROM $club";
$result1 = mysql_query($qry1);

if(!$result) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}


else {
echo '<h2><center>Members of '.$club.' club.</h2>

<center><table border="1"> <tr>

<th> Roll No. </th> 
<th> Name </th>
<th> Date of Registration </th>
<th> Mobile No. </th> 
<th> Address </th>
<th> Email Id. </th> </tr>';

/*Show the rows in the fetched result set one by one*/ 
while ($row = mysql_fetch_assoc($result1))
{ 
echo '<tr> 

<td>'.$row['roll_no'].'</td>
<td>'.$row['name'].'</td>
<td>'.$row['DATE'].'</td>
<td>'.$row['mobile'].'</td>
<td>'.$row['address'].'</td> 
<td>'.$row['email_id'].'</td>
</tr>'; 
}

echo '</table></center>';
}
}
}
}




if ($_POST['submit'] == 'View_All_Clubs_Details') {

$qry = "SELECT * FROM clubs";
$result = mysql_query($qry);

if(!$result) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}


else {
echo '<h2><center>Detail of all clubs</h2></center>
<center><table border="1"><tr>
<th> Club Name </th>
<th> Domain </th>
<th> Entry Fee </th>
<th> Coordinator </th>
<th> Co-Coordinator </th>
</tr>';

while($row = mysql_fetch_assoc($result)) {
echo '<tr>
<td>'.$row['club_name'].'</td>
<td>'.$row['domain'].'</td>
<td>'.$row['entry_fee'].'</td> 
<td>'.$row['coordinator'].'</td>
<td>'.$row['co_coordinator'].'</td>
</tr>';
}

echo '</table></center>';
}
}



echo '</div></body>';
} 
else{ 
header('location:admin.php'); 
exit(); 
} 
?>


