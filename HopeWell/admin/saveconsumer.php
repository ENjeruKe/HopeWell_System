<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['drugs_used'];
//$c = $_POST['contact'];
//$d = $_POST['cperson'];
//$e = $_POST['note'];
// query
$sql = "INSERT INTO consumersf (description) VALUES (:a)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a));
header("location: consumer_dept.php");


?>