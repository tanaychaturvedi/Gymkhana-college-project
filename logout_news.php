 <?php 
//Destroy the session 
session_start(); 
session_unset(); 
session_destroy(); 
//Redirect to login page 
header("location: News.html"); 
exit(); 
?>
