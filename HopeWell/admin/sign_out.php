<?php
	session_start();
	include 'includes/conn.php';
	include 'open_database.php';


$username = $_SESSION['username'];
$_SESSION['date'] = $date;

$date =date('Y-m-d');
$time_c =date('H:i:s');

     $query3= "UPDATE attendance set num_hr='Closed',time_out='$time_c',out_dte ='$date' where employee_id ='$username' and time_out='00:00:00'";
         $result3 =mysql_query($query3);

 header('location:index.php');



?>



