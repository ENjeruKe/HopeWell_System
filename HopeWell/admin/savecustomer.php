<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['sname'];
$c = $_POST['lname'];
$d = $_POST['mobile'];
$e = $_POST['dob'];
$f = $_POST['gender'];
$g = $_POST['marital'];
$h = $_POST['id'];
$i = $_POST['occupation'];
$j = $_POST['email'];
$k = $_POST['adress'];
$l = $_POST['country'];
$m = $_POST['county'];
$n = $_POST['town'];
// query
$sql = "INSERT INTO accounts (fname,sname,lname,mobile,dob,gender,marital,id,occupation,email,adress,country,county,town) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':l'=>$l,':m'=>$m,':n'=>$n));
header("location: customer.php");
 

?>