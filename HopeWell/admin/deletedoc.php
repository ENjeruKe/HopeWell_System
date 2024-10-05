<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM doctorsfile WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>