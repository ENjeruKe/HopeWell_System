<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
//$c = $_POST['contact'];
//$d = $_POST['cperson'];
//$e = $_POST['note'];
// query
$sql = "UPDATE diseasefile 
        SET name=?, drugs_used=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$id));
//$q->execute(array(':a'=>$a,':b'=>$b));

header("location: disease_register.php");

?>