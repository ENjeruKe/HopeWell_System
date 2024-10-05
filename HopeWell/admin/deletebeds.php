<?php
	include('../connect.php');
	$id=$_GET['id'];
	
	echo $id;
	$result = $db->prepare("DELETE FROM allbedsfile WHERE client_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>