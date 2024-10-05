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
$sql = "UPDATE revenuef
        SET Name=?,cash_rate=?,credit_rate=?,gl_account=?,Auto=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$d,$c,$e,$id));
header("location: revenue_register.php");

?>



() VALUES (:a,:b,:c,:d,:e)