<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
//$c = $_POST['contact'];
//$d = $_POST['cperson'];
//$e = $_POST['note'];
// query
$sql = "INSERT INTO allbedsfile (bed_no,Rate) VALUES (:a,:b)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b));
header("location: beds_register.php");


?>