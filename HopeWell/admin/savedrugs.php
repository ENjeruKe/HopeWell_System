<?php
session_start();
include('../connect.php');
require('open_database.php');
$a = $_POST['name'];
$aa = $_POST['location'];
$a1 = $_POST['name2'];
$a2 = $_POST['name3'];
$a3 = $_POST['name4'];
$a4 = $_POST['name5'];
$a5 = $_POST['name6'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
// query

//echo 'tuuuutu'.$a4;


$sql = "INSERT INTO stockfile (location,description,sell_price,credit_price,search_name,cost_price,reorder,category) VALUES ('$a','$a1','$b','$d','$a5','$a2','$a3','$a4')";

$result =mysql_query($sql) or die(mysql_error());

//$q = $db->prepare($sql);
//$q->

//execute(array(':a'=>$a,':a1'=>$a1,':b'=>$b,':c'=>$c,':d'=>$d,'://a5'=>$a5,':a2'=>$a2,':a3'=>$a3,':a4'=>$a4));
header("location: stocks_register.php");

//echo 'tytytyt'.$a;

?>