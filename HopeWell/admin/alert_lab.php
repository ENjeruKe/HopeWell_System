<?php
	session_start();
	include 'includes/conn.php';
	include 'open_database.php';
    $today = date('y-m-d');
$time_a =date('H:i:s');
			$sql = "SELECT * FROM medicalfile WHERE date ='$today' and status='To Doctor'";
		$query = $conn->query($sql);

		if($query->num_rows <1){
		    echo 'Zero';
		}else{
		    echo"<img src='http://selfcare.co.ke/kingdavids/kingdavid/admin/waiting.jpg'/>";
		    echo"<br><br><h1>Currently waiting..".$query->num_rows."</h1>";
    echo"<embed src='http://selfcare.co.ke/kingdavids/kingdavid/admin/memories.mp3' controller='true' autoplay='true' autostart='True' width='0' height='0' />";
   
	}
?>