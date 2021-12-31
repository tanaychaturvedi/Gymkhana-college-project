<?php 

$login = $_POST['login']; 
$password = $_POST['password']; 

$link = mysql_connect('localhost', 'root', ''); 

if(!$link) { 
die(include('admin.php')); 
} 

$db = mysql_select_db('gymkhana'); 
if(!$db) { 
die(include('admin.php'));
} 

$query ="SELECT * FROM admins WHERE user_id = '$login' AND user_password = '$password'";
$run = mysql_query($query);
$result = mysql_fetch_assoc($run);

if(!$run OR $result['user_id'] != $login OR $result['user_password'] != $password) {
include('admin.php'); 
echo '<center><h4>Incorrect Username or Password !!!</h4></center>'; 
exit(); 
} 


else { 
$count = 1; 
} 


if( $count == 1){ 
session_start(); 
$_SESSION['IS_AUTHENTICATED'] = 1; 
$_SESSION['USER_ID'] = $result['user_name']; 
header('location:admin_page.php'); 
} 

?>
