<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
//$e = $_POST['note'];
// query
$sql = "INSERT INTO glaccounts_sub (account_Name,branch,type,balance) VALUES (:a,:b,:c,:d)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d));
header("location: gl_accounts_sub.php");


?>