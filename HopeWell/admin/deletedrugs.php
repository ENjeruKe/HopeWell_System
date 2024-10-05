<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM stockfile WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>