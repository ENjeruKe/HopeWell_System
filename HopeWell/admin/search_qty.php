<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
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
$sql="SELECT * FROM stockfile WHERE search_name = '".$q2."' AND location ='$location'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   //$location ="BUSTANI";
   $description = $row['description'];
   $item_price   = $row['sell_price'];
   $search_item   = $row['search_name'];
}
//$user = "hmisglobal";
//$pass = "jamboafrica";
//$database = "hmisglob_griddemo";
//$host = "localhost";
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
//mysql_select_db($database) or die ("Unable to select the database");

echo"<form action ='issuetopatients.php' method ='GET'>";
 echo"<table border = '0'><td width ='400'><input type='text' id ='item1' name='item1' size ='35' value ='$description' 
</td><td><input type='text' id ='amount_three' name='amount_three' size='10' value 
  ='$item_price'></td>";
 echo"<td><input type='text' id ='no_three' name='no_three' size='10' 
 onchange='function3()'></td>";
 echo"<td><input type='text' id ='result_three' name='result_three' size='10'></td>";

echo"<td width ='1' align ='right'></td>";

 echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td></table></form>";

 

//echo "</table>";
//mysqli_close($con);
?>
</body>
</html>