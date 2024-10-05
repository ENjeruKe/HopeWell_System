<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['names'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
$e = $_POST['note'];
// query
$sql = "UPDATE systemfile2 
        SET  name=?, access_all=?, password=?, username=?, account=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$id));
header("location: ../index.php");

?>