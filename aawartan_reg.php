<?php

$roll_no = $_POST['roll_no']; 
$name = $_POST['name']; 
$DATE = $_POST['DATE'];
$mobile = $_POST['mobile']; 
$address = $_POST['address']; 
$email_id = $_POST['email_id'];
$club= 'aawartan';

$link = mysql_connect('localhost', 'root', '');
if(!$link) {
echo '<div style="margin-left:207px; margin-top:108px; padding:1px 16px; height:auto;">
<h4><center>Unable to connect to server.<br>'.mysql_error().'</center></h4>';
}

$db = mysql_select_db('gymkhana');
if(!$db) {
echo '<div style="margin-left:207px; margin-top:108px; padding:1px 16px; height:auto;">
<h4><center>Unable to select database.<br>'.mysql_error().'</center></h4>';
}

$query ="INSERT INTO $club (roll_no, name, DATE, mobile, address, email_id) VALUES ('$roll_no', '$name', '$DATE', '$mobile', '$address', '$email_id')";
$result = mysql_query($query);


if($result == FALSE) {
include('Aawartan.html');
echo '<div style="margin-left:207px; margin-top:108px; padding:1px 16px; height:auto;">
<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}

else {
$query1 ="INSERT INTO main_reg (roll_no, name, DATE, club_name, mobile, address, email_id) VALUES ('$roll_no', '$name', '$DATE', '$club', '$mobile', '$address', '$email_id')";
$result1 = mysql_query($query1);

if($result1 == FALSE) {
include('Aawartan.html');
echo '<div style="margin-left:207px; margin-top:108px; padding:1px 16px; height:auto;">
<h4><center>Wrong Entry<br>'.mysql_error().'</center></h4>';
}

else {
include('aawartan.html');
echo '<div style="margin-left:207px; margin-top:108px; padding:1px 16px; height:auto;">
<center><h2><br>Thank you '.$name.' for registration<br>For any change contact club coordinator or co-coordinator.</h2></center>';
}

}
?>