<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['drugs_used'];
//$c = $_POST['contact'];
//$d = $_POST['cperson'];
//$e = $_POST['note'];
// query
$sql = "INSERT INTO diseasefile (name,drugs_used) VALUES (:a,:b)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b));
header("location: disease_register.php");


?>