<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$date = $_SESSION['smart_date'];

$q = intval($_GET['q']); 
$q2 = $_GET['q'];

if ($q2=='CASH/M-PESA RECEIPT'){
echo"<hr>";
echo"<td width ='100'><b>Cash Amount:</td><td width='30' align='left'><input type='text' id ='cash_amount' name='cash_amount' size='8' required></td>";
echo"<td width ='100'><b>M-Pesa Amount:</td><td width='30' align='left'><input type='text' id ='mpesa_amount' name='mpesa_amount' size='8' required></td>";
echo"<td width ='100'><b>M-Pesa Number:</td><td width='40' align='left'><input type='text' id ='dvPassport' name='dvPassport' size='10' required></td>";
echo"<hr>";
}
?>

