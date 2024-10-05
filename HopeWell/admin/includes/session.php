<?php
session_start();
?>	

<?php
	include 'includes/conn.php';
	include 'includes/mysqli_connect.php';


	$sql = "SELECT * FROM systemfile2 WHERE username = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
	
	
$_SESSION['debtors'] = $debtors;
$_SESSION['doctors'] = $doctors;
$_SESSION['stocks']  = $stocks;
$_SESSION['counselor'] = $counselor;
$_SESSION['suppliers'] = $suppliers;
$_SESSION['triage'] = $triage;
$_SESSION['gledger'] = $gledger;
$_SESSION['laboratory'] = $laboratory;
$_SESSION['pharmacy'] = $pharmacy;
$_SESSION['accounts'] = $accounts;
$_SESSION['nurses'] = $nurses;
$_SESSION['doctors_p'] = $doctors_p;
$_SESSION['cashier'] = $cashier;
$_SESSION['reception'] = $reception;
$_SESSION['pat_reg'] = $patients;
	
	
	
	
?>
