<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$location2 = $_SESSION['branch'];
$date = $_SESSION['sys_date'];
$username = $_SESSION['username'];
$branch = $_SESSION['branch'];

?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>





<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<body>

<?php
$q = intval($_GET['q']);
$q = $_GET['q'];
$con = mysqli_connect('localhost','selfcare','v9p0CnfH60','selfcare_kingdavid');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//$q;

mysqli_select_db($con,"selfcare_kingdavid");
$sql="SELECT * FROM st_butch_expiryf WHERE expiry <= '".$q."' order by expiry";
$result = mysqli_query($con,$sql);

$found ='No';
echo "<table width='100%'>
<tr>
<th bgcolor ='black'><font color ='white' width='10%'>Buy Date</th>
<th bgcolor ='black'><font color ='white' width='25%'>Drug Name</th>
<th bgcolor ='black'><font color ='white'  width='10%'>Batch N#</th>
<th bgcolor ='black'><font color ='white' width='10%'>Expiry Date</th>
<th bgcolor ='black'><font color ='white' width='10%'>Received by</th>
<th bgcolor ='black'><font color ='white' width='5%'>Qty</th>
</tr>";

//echo 'Date:'.$q;

while($row = mysqli_fetch_array($result)) {
    $found ='Yes';
    echo "<tr>";
    echo "<td width='10%'>" . $row['date'] . "</td>";
    echo "<td width='25%'>" . $row['description'] . "</td>";
    echo "<td width='10%'>" . $row['batch_no'] . "</td>";
    echo "<td width='10%'>" . $row['expiry'] . "</td>";
    echo "<td width='10%'>" . $row['inputby'] . "</td>";
    echo "<td width='5%'>" . $row['qty'] . "</td>";
    //echo "<td>" . $row['pay_account']. "</td>";
    
    
    
    echo "</tr>";
}
echo "</table>";
?>
<br>
<!--Send SMS: 
<br><br>
<textarea name="comment" form="usrform" rows="10" cols="145">Enter text here...</textarea-->
</body>
</html>