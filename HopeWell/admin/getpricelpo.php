<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$store_select = $_SESSION['store_select'];
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
//table {
//    width: 100%;
//    border-collapse: collapse;
//}

//table, td, th {
//    border: 0px solid black;
//    padding: 5px;
//}

//th {text-align: left;}
</style>
</head>
<body>

<script>
function function3() {
    var no = document.getElementById('no_three').value;   
    //var txt = document.getElementById('amount_three').value;
    var txtz = document.getElementById('result_three').value;
    
    //txt2 = txt * no;
    txt2 = txtz/no;
    
    //document.getElementById("result_three").value = txt2;
    document.getElementById("amount_three").value = txt2;
}
</script>


<script>
function function6() {
    var no_disc = document.getElementById('no_disc').value;   
    var txt     = document.getElementById('result_three').value;
    txt2 = (no_disc/100)*txt;
    txt2 = txt-txt2;
    document.getElementById("result_three").value = txt2;
}
</script>



<?php
$q = intval($_GET['q']); 
$q2 = $_GET['q'];

//$sql="SELECT * FROM stockfile WHERE description = '".$q2."'";
//$result = mysqli_query($con,$sql);
//while($row = mysqli_fetch_array($result)) {
//   $description = $row['description'];
//   $item_price   = $row['cost_price'];
//   $search_item   = $row['search_item'];
//  echo $description;

//}


$query3="SELECT * FROM stockfile WHERE description = '".$q2."' and location ='$store_select'";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($i3 < $num3)
  {
  $description = mysql_result($result3,$i3,"description");
  $item_price   = mysql_result($result3,$i3,"cost_price");
  $search_item   = mysql_result($result3,$i3,"search_name");
  $items_price = mysql_result($result3,$i3,"sell_price");
  $search_id     = mysql_result($result3,$i3,"id");
  $_qtys     = mysql_result($result3,$i3,"qty");
  $price   = $items_price;
  //echo $description;
  $i3++;
  }

echo"<form action ='stocks_lpo.php' method ='GET'>";
 echo"<table border = '0' width ='100%'>";
 echo"<td width ='10%'><input type='text' id ='search_id' name='search_id' size ='5' value ='$search_id' </td>";
 echo"<td width ='35%'><input type='text' id ='item1' name='item1' size ='100' value ='$description'</td>";
 echo"<td width ='10%'><input type='text' id ='amount_three' name='amount_three' size='7' value ='$item_price'></td>";
 
 echo"<td width ='10%'><input type='text' id ='no_three' name='no_three' size='7' onchange='function3()'></td>";
 //--echo"<td width ='5'></td><td><input type='text' id ='no_disc' name='no_disc' size='7'   onchange='function6()'></td>";
echo"<td width ='10%'><!--input type='text' id ='no_disc' name='no_disc' size='7' readonly --></td>";

 echo"<td width ='10%'><input type='text' id ='result_three' name='result_three' size='7'></td>";
$_SESSION['old_balance'] =$_qtys;
echo"<td width ='5'></td><td width ='50' align ='right'><font color ='blue'>Bal.$_qtys .Price:.$price </td>";

 echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td></table></form>";

 

//echo "</table>";
//mysqli_close($con);
?>
</body>
</html>