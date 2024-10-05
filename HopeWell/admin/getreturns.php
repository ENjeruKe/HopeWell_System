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
    txt2 = txt*no;
    document.getElementById("result_three").value = txt2;
}
</script>



<?php
$q = intval($_GET['q']); 
$q2 = $_GET['q'];

//$con = mysqli_connect('localhost','hmisglobal','jamboafrica','hmisglob_griddemo');
$sql="SELECT * FROM stockfile WHERE description = '".$q2."' and location ='$store_select'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
      $description = $row['description'];
      $item_price   = $row['qty'];
      $search_item   = $row['search_item'];
      $search_id     = $row['id'];
}
echo"<form action ='stock_take.php' method ='GET'>";
 echo"<table border = '0' width ='100%'><td width ='10%'><input type='text' id ='search_id' name='search_id' size ='5' value ='$search_id' 
</td><td width ='60%'><input type='text' id ='iyem1' name='item1' size ='50' value ='$description' 
</td><td width ='10%'><input type='text' id ='amount_three' name='amount_three' size='10' value 
  ='$item_price' readonly></td>";
 echo"<td width ='10%'><input type='text' id ='no_three' name='no_three' size='10' 
 onchange='function3()'></td>";
 echo"<td width ='10%'><input type='text' id ='result_three' name='result_three' size='10'></td>";

//echo"<td width ='1' align ='right'></td>";

 echo"<td align ='left' width ='1%'><input type='submit' name='add_next'  class='button' value='Add '></td></table></form>";
?>
</body>
</html>