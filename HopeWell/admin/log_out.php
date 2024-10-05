<?php
	session_start();
	include 'open_database.php';
$username = $_SESSION['username'];
echo 'Re'.$username.'Gr';


 $query3= "UPDATE attendance SET num_hr='Closed' and time_out='$time_c' where employee_id ='$username' and date ='$date'";
         $result3 =mysql_query($query3);


echo 'Re'.$username;

	session_destroy();


//	header('location: index.php');
?>