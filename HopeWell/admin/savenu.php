<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$a1 = $_POST['name2'];
$a2 = $_POST['name3'];
$a3 = $_POST['name4'];
$a4 = $_POST['name5'];
$a5 = $_POST['name6'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
// query
$sql = "INSERT INTO nutritionf (location,description,sell_price,qty,units,search_name,cost_price,reorder,maximum) VALUES (:a,:a1,:b,:c,:d,:a5,:a2,:a3,:a4)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':a1'=>$a1,':b'=>$b,':c'=>$c,':d'=>$d,':a5'=>$a5,':a2'=>$a2,':a3'=>$a3,':a4'=>$a4));
header("location: nu_st_reg.php");


?>