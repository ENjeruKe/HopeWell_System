<?php
session_start();
include('open_database.php');
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];
$a4 = $_POST['a4'];
$a5 = $_POST['a5'];
$a6 = $_POST['a6'];
$a7 = $_POST['a7'];
$a8 = $_POST['a8'];
$a9 = $_POST['a9'];
$a10 = $_POST['a10'];
$a11 = $_POST['a11'];
$a12 = $_POST['a12'];
$a13 = $_POST['a13'];
$a14 = $_POST['a14'];
$a15 = $_POST['a15'];
$a16 = $_POST['a16'];
$a17 = $_POST['a17'];
$a18 = $_POST['a18'];
$a19 = $_POST['a19'];
$a20 = $_POST['a20'];
$a21 = $_POST['a21'];
$a22 = $_POST['a22'];
$a23 = $_POST['a23'];
$a24 = $_POST['a24'];
$a25 = $_POST['a25'];
$a26 = $_POST['a26'];
$a27 = $_POST['a27'];
$a28 = $_POST['a28'];
$a29 = $_POST['a29'];
$a30 = $_POST['a30'];
$a31 = $_POST['a31'];
$a32 = $_POST['a32'];
$a33 = $_POST['a33'];
$a34 = $_POST['a34'];
$a35 = $_POST['a35'];
$a36 = $_POST['a36'];
$a37 = $_POST['a37'];
$a38 = $_POST['a38'];
$a39 = $_POST['a39'];
$a40 = $_POST['a40'];
$a41 = $_POST['a41'];
$a42 = $_POST['a42'];
$a43 = $_POST['a43'];
$a44 = $_POST['a44'];
$a45 = $_POST['a45'];



$query = "INSERT INTO systemfile2 VALUES ('','$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a22','$a21','$a23','$a24','$a25','$a26','$a27','$a28','$a29','$a30','$a31','$a32','$a33','$a34','$a35','$a36','$a37','$a38','$a39','$a40','$a41','$a42','$a43','$a44','$a45')";
        $result =mysql_query($query);  

header("location: user_permissions1.php");


?>