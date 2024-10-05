<?php
session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>
<form action ="" method ="GET">


<?php
$date = date('y-m-d');
$ref_no = $_GET['accounts3'];
$ref_no ='uploads/'.$ref_no.'.pdf';
echo"<OBJECT data='$ref_no' type='text/html' style='margin: 0; width: 100%; height: 100%; padding 0px; text-align:left;'></OBJECT>";
?>