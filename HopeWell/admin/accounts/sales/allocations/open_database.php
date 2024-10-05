<?php   
   session_start();
date_default_timezone_set("Africa/Nairobi"); 
ini_set('date.timezone','Africa/Nairobi');
$user = "selfcare";   
$pass = "v9p0CnfH60";   
$database = "selfcare_demo";   
$host = "localhost";   
$connect = mysql_connect($host,$user,$pass,$database)or die ("Unable to connect");
$con = mysqli_connect($host,$user,$pass,$database);
mysql_select_db($database) or die ("Unable to select the database");

date_default_timezone_set('Africa/Nairobi');
$today = $_SESSION['sys_date'];

$tod =date("Y-m-d H:i:s", strtotime("now"));


$tod = strtotime("now");

$time =$tod;
//-10800

$mtod =date("y-m-d","$time");
$today = $mtod;
$_SESSION['sys_date'] = $today;

$todv =date("Y-m-d H:i:s", "$time");

$_SESSION['log_date'] =$todv;

$query3= "UPDATE companyfile SET dates ='$today'";
$result3 =mysql_query($query3);  

$query5= "UPDATE medicalfile SET date ='$today' WHERE id ='1'";
$result5 =mysql_query($query5);  
$date = date('Y-m-d');

$username = $_SESSION['username'];
$aces2 = $_SESSION['aces2'];

?>