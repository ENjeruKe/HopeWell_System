<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$store_select = $_SESSION['store_select'];
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

$sql="SELECT * FROM stockfile WHERE description = '".$q2."' and location ='$store_select'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   //$location ="BUSTANI";
   $description = $row['description'];
   $item_price   = $row['cost_price'];
   $search_item   = $row['search_item'];
   $unit          = $row['units'];
   $search_id     = $row['id'];
   $balance     = $row['qty'];

}
echo"<form action ='stock_adjustment2.php' method ='GET'>";
 echo"<table border = '0' width ='100%'><td width ='5%'><input type='text' id ='search_id' name='search_id' size ='5' value ='$search_id' 
</td><td width ='50%'><input type='text' id ='item1' name='item1' size ='70' value ='$description'> 
</td><td width ='10%'>Bal:<input type='text' id ='qtyz' name='qtyz' size ='5' value ='$balance' readonly>
</td><td width ='10%'><input type='text' id ='amount_three' name='amount_three' size='10' value 
  ='$item_price'></td>";

//echo"<td><input type='text' id ='units_three' //name='units_three' size='5' value 
//  ='$unit'></td>";

 echo"<td width ='10%'><input type='text' id ='no_three' name='no_three' size='10' 
 onchange='function3()'></td>";
 echo"<td width ='10%'><input type='text' id ='result_three' name='result_three' size='10'></td>";

//echo"<td width ='1' align ='right'></td>";

 echo"<td align ='left' width ='5%'><input type='submit' name='add_next'  class='button' value='Add '></td></table></form>";

 

//echo "</table>";
//mysqli_close($con);
?>
</body>
</html>