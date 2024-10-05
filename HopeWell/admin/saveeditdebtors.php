<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['dres'];
$e = $_POST['note'];
$f = $_POST['cperson3'];
// query
$sql = "UPDATE debtorsfile 
        SET account_Name=?, telephone_no=?, Address=?, os_balance=?, contact=?, accno=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$id));
header("location: debtors_register.php");

?>