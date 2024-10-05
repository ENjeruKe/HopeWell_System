<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$store_select = $_SESSION['store_select'];
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 0px solid black;
    padding: 5px;
}

th {text-align: left;}
</style-->


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
   $description = $row['description'];
   $item_price   = $row['sell_price'];
   $search_item   = $row['search_name'];
   $quantity = $row['qty'];
}

echo"<form action ='issuetopatientsx.php' method ='GET'>";
 echo"<table border = '0' width='100%' width='0'><td width ='55%'><input type='text' id ='item1' name='item1' size ='90' value ='$description' 
</td><td width='3%' align ='left'></td><td width='10%' align ='left'><input type='text' id ='amount_three' name='amount_three' size ='10' value 
  ='$item_price'></td>";
 echo"<td width='10%' align ='left'><input type='text' id ='no_three' name='no_three' size ='10' 
 onchange='function3()'></td>";
 echo"<td width='10%' align ='left'><input type='text' id ='result_three' name='result_three' size ='10'></td>";

echo"<td width ='1' align ='right'><input type='text' id ='balance' name='balance' size='1' value='$quantity' readonly></td>";
 echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td></table></form>";

 

//echo "</table>";
//mysqli_close($con);
?>
</body>
</html>