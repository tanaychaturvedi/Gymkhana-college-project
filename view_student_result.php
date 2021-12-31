<?php
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
$roll_no = $_POST['roll_no'];

echo '<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gymkhana IIITDM Jabalpur</title>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="sidenav.css">
</head>

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

</div>

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
<center><h1>Student Profile</h1><br>

<form action="view_student_result.php" method="post">
	<label for="roll_no"><b>Roll_No.</b></label>
	<input type="text" placeholder="2019130" name="roll_no" required><br><br>

	<input type="submit" name="submit" value="View_Profile">
</form></center><br><br>';

$link = mysqli_connect('localhost', 'root', '');
if(!$link) {
echo '<h4><center>Unable to connect to server<br>'.mysql_error().'</center></h4>';
}

$db = mysqli_select_db($link,'gymkhana');
if(!$db) {
echo '<h4><center>Unable to select database<br>'.mysql_error().'</center></h4>';
}

$query ="SELECT * FROM main_reg WHERE roll_no = $roll_no";
$result = mysqli_query($link,$query);

$query1 ="SELECT name FROM main_reg WHERE roll_no = $roll_no";
$nam = mysqli_query($link,$query1);
$name = mysqli_fetch_assoc($nam);

$count = 0;

if(!$result OR !$nam) {
echo '<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}

else {

if ($name['name'] == FALSE) {
echo '<h2><center>No entry found with Roll No. :- '.$roll_no.'.</center></h2>';
}

else {

echo '<h2><center>Profile of '.$name['name'].'</h2>

<center><table border="1"> <tr>

<th> Sr. No. </th> 
<th> Roll No. </th> 
<th> Name </th>
<th> Date of Registration </th>
<th> Club Name </th>
<th> Mobile No. </th> 
<th> Address </th>
<th> Email Id. </th> </tr>';

/*Show the rows in the fetched result set one by one*/ 
while ($row = mysqli_fetch_assoc($result))
{ 

$count = $count + 1;

echo '<tr> 

<td>'.$count.'</td>
<td>'.$row['roll_no'].'</td>
<td>'.$row['name'].'</td>
<td>'.$row['DATE'].'</td> 
<td>'.$row['club_name'].'</td>
<td>'.$row['mobile'].'</td>
<td>'.$row['address'].'</td> 
<td>'.$row['email_id'].'</td>
</tr>'; 
}

echo '</table><br><h3>Total number of clubs taken :- '.$count.'</h3></center>';
}


} 
}

else{ 
header('location:admin.php'); 
exit(); 
} 
?>
