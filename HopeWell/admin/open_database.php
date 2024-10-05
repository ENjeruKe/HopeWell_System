<?php
   session_start();

//die();
date_default_timezone_set("Africa/Nairobi"); 

ini_set('date.timezone','Africa/Nairobi');

error_reporting(E_ERROR);


$user = "root";   

$pass = "v9p0CnfH60";   

$database = "newhmisc_trinity";   

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

$today=date('Y-m-d');



$query5= "UPDATE medicalfile SET date ='$today' WHERE id ='1'";

$result5 =mysql_query($query5);  


$query5x= "UPDATE companyfile SET today ='$today' WHERE company <>''";

$result5x =mysql_query($query5x);  

$SQL= $query= "SELECT * FROM companyfile";
$hasil=mysql_query($SQL, $connect);

$query= "SELECT * FROM companyfile";
$result =mysql_query($query);
$num =mysql_numrows($result);
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$med1_dx2 ='';
$foundx ='No';
while ($row=mysql_fetch_array($hasil)){ 
      $update      = mysql_result($result,$i,"update");          
      $today       = mysql_result($result,$i,"today");          
  }
if ($update <=$today){
$pass = "v9p0CnfH60";   
$connect = mysql_connect($host,$user,$pass,$database)or die ("Unable to connect");
$con = mysqli_connect($host,$user,$pass,$database);
mysql_select_db($database) or die ("Unable to select the database");
//date_default_timezone_set('Africa/Nairobi');
}



$date = date('y-m-d');


//$username = $_SESSION['username'];
//$aces2 = $aces2;
//$aces2 = $_SESSION['aces2'];



?>
