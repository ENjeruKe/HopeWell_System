<?php
session_start();
 require('open_database.php');
echo"<font color ='red'>Checking for pending bills. Please wait.......</font>";
?>






<?php
 $branch     = $_SESSION['company']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');



 //if (isset($_GET['print'])){

 $date1 = $_SESSION['date1'];
 $date2 = $_SESSION['date2'];
if ($date1=='' or $date2==''){
    $date2 = date('y-m-d');
    $date1 = date('y-m-d');
} 
 
//$query = "SELECT date,ref_no FROM receiptf WHERE date >='$date1' AND date <= '$date2' GROUP BY ref_no"; 	 
//$result = mysql_query($query);
//while($row = mysql_fetch_array($result)){
//$refs_no =$row['ref_no']; 
//echo "$refs_no";
//$query2="update auto_transact set balance = credit_rate where invoice_no ='$refs_no'";
//$result2 = mysql_query($query2);
//}
 
$query = "SELECT date,gl_account, SUM(credit_rate),invoice_no FROM auto_transact WHERE date >='$date1' AND date <= '$date2' and balance<>credit_rate and description<>'CONSULTATION FEE' GROUP BY invoice_no"; 	 
$result = mysql_query($query) or die(mysql_error());
// Print out result
$count =0;
echo"<table width ='100%'>";
while($row = mysql_fetch_array($result)){
    echo"<tr><td>";
echo $row['date'].'</td><td>'.$row['gl_account'].'</td><td>'.$row['SUM(credit_rate)'].'</td><td>'.$row['invoice_no']; 
echo"</td></tr>";
$count++;
}
echo"</table><br>";
	echo "<table width ='50%'><td width ='300'>";
        echo "Pending bills: ";
        echo"</td><td width = '10'>";
        echo $count;
        echo"</td>";
echo"</table>";
echo"<font color ='red'>End of report..</font>";

 
 
?>





</html>
