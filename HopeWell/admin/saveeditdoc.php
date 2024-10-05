<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
$e = $_POST['note'];
// query
$sql = "UPDATE doctorsfile 
        SET account_Name=?, telephone_no=?, Address=?, os_balance=?, contact=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$id));
header("location: doctors_register.php");

?>