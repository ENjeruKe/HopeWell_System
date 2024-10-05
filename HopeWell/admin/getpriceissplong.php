<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
//$adm_no   = $_SESSION['adm_no'];
//$long_ref_no   = $_SESSION['long_ref_no'];

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
$searches =$q2;

//$user = "hmisglobal";
//$pass = "jamboafrica";
//$database = "hmisglob_griddemo";
//$host = "localhost";
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
//mysql_select_db($database) or die ("Unable to select the database");

//mysqli_select_db($con,"hmisglob_griddemo");
//$sql="SELECT * FROM st_trans_long ";
//$result = mysqli_query($con,$sql);
//while($row = mysqli_fetch_array($result)) {
//   $location ="BUSTANI";
//   $adm_no $row['adm_no'];
//   $description = $row['description'];
//   $combo_search = $description.'-'.$adm_no;
//   if ($searches==$combo_search){
//      $item_price   = $row['qty'];
//      $search_item   = $row['description'];
//   }
//}

$query3 = "select * FROM st_trans_long" ;
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($i3 < $num3)
  {
  //$location ="BUSTANI";
  $adm_no = mysql_result($result3,$i3,"adm_no");
  $description = mysql_result($result3,$i3,"description");
  $combo_search = $description.'-'.$adm_no;
  if ($searches==$combo_search){
     $item_price   = mysql_result($result3,$i3,"qty");
     $search_item   = mysql_result($result3,$i3,"description");
     $long_ref_no   = mysql_result($result3,$i3,"id");
     $_SESSION['adm_no'] = mysql_result($result3,$i3,"adm_no");
     $_SESSION['long_ref_no'] = mysql_result($result3,$i3,"id");
  }
  $i3++;
  }








echo"<form action ='issuetopatientslong.php' method ='GET'>";
 echo"<table border = '0'><td width ='400'><input type='text' id ='item1' name='item1' size ='35' value ='$search_item'</td><td><input type='text' id ='amount_three' name='amount_three' size='10' value 
  ='$item_price'></td>";
 echo"<td><input type='text' id ='no_three' name='no_three' size='10' 
 onchange='function3()'></td>";
 echo"<td><input type='text' id ='result_three' name='result_three' size='10'></td>";

echo"<td width ='1' align ='right'></td>";

 echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td></table></form>";

//echo"<td><input type='text' id ='adm_no' name='adm_no' size='10' value ='$adm_no'></td><td><input type='text' id //='long_ref_no' name='long_ref_no' size='10' value ='$long_ref_no'></td>";

//echo "</table>";
//mysqli_close($con);
?>
</body>
</html>