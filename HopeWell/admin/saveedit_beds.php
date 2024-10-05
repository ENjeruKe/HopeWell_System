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
$sql = "UPDATE allbedsfile
        SET bed_no=?,Rate=?,Patients_Name=?,adm_no=?,visit_no=?
		WHERE client_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$d,$c,$e,$id));
header("location: beds_register.php");

?>



() VALUES (:a,:b,:c,:d,:e)