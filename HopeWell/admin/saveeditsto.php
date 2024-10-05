<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['cperson'];
$d = $_POST['contact'];
$e = $_POST['con'];
$f = $_POST['cont'];
$g = $_POST['conta'];
$h = $_POST['coct'];
$i = $_POST['ctact'];
// query
$sql = "UPDATE stocklab 
        SET location=? ,description=? ,sell_price=? ,qty=? ,units=? ,search_name=? ,cost_price=? ,reorder=? ,maximum=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i,$id));
header("location: lab_st_reg.php");

?>