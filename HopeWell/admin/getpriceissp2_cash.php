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



$sql="SELECT * FROM revenuef WHERE name = '$q2'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   $description = $row['name'];
   $item_price   = $row['cash_rate'];
   $search_item   = $row['name'];
}
$description = $q2;

echo"<form action ='cash_issuetopatients.php' method ='GET'>";
 echo"<table border = '0'><td width ='400'><input type='text' id ='item1' name='item1' size ='35' value ='$description' 
</td><td><input type='text' id ='amount_three' name='amount_three' size='10' value 
  ='$item_price'></td>";
 echo"<td><input type='text' id ='no_three' name='no_three' size='10' 
 onchange='function3()'></td>";
 echo"<td><input type='text' id ='result_three' name='result_three' size='10'></td>";

echo"<td width ='1' align ='right'></td>";

 echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td></table></form>";

?>
</body>
</html>