<?php
session_start();
 require('open_database.php');

?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 0px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<script>
function function3() {
    var no = document.getElementById('no_three').value;   
    var txt = document.getElementById('amount_three').value;
    txt2 = txt * no;
    document.getElementById("result_three").value = txt2;
}
</script>



<?php
$q = intval($_GET['q']); 
$q2 = $_GET['q'];

//$con = mysqli_connect('localhost','hmisglobal','jamboafrica','hmisglob_griddemo');
//if (!$con) {
//    die('Could not connect: ' . mysqli_error($con));
//}

//mysqli_select_db($con,"hmisglob_griddemo");

$sql="SELECT * FROM doctorsfile WHERE account_name = '".$q2."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
   $location ="BUSTANI";
   $description = $row['account_name'];
   $item_price   = 0;
   //$row['sell_price'];
   $search_item   = $row['account_name'];
}
//$user = "hmisglobal";
//$pass = "jamboafrica";
//$database = "hmisglob_griddemo";
//$host = "localhost";
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
//mysql_select_db($database) or die ("Unable to select the database");

echo"<form action ='post_payment_doctors.php' method ='GET'>";
 echo"<table border = '0'><td width ='400'><input type='text' id ='s_desc_three' name='s_desc_three' size ='35' value ='$q2'</td><td width ='50'></td>";
 //echo"<td><input type='text' id ='no_three' name='no_three' size='10' onchange='function3()'></td>";
 echo"<td><input type='text' id ='result_three' name='result_three' size='10'></td>";

echo"<td width ='1' align ='right'></td>";

 echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td></table></form>";

 

//echo "</table>";
//mysqli_close($con);
?>
</body>
</html>