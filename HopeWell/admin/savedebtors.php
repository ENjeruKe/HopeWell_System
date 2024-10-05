<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$f = $_POST['cperson2'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
$e = $_POST['note'];
// query
$sql = "INSERT INTO debtorsfile(account_Name,telephone_no,Address,os_balance,contact,accno) VALUES (:a,:f,:b,:c,:d,:e)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':f'=>$f,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e));
header("location: debtors_register.php");


?>