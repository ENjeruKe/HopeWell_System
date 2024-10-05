<?php
// 		    header('location:http://paltechsystemconsultants.co.ke/kingdavids/kingdavid/admin/index.php');
// 		die();    

	$conn = new mysqli('localhost', 'root', 'v9p0CnfH60', 'newhmisc_trinity');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>