<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$today = $_SESSION['sys_date'];
$date = $_SESSION['sys_date'];
?>

<!--!DOCTYPE html>
<html>
<head-->
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


<form action ="auto_search2.php" method ="GET">

<?php
$adm_no =$_SESSION['adm_no'];
$name   =$_SESSION['name'];
$ref_no =$_SESSION['ref_no'];
$payer  =$_SESSION['payer'];
//$date   =$_SESSION['old_date'];

$q = intval($_POST['q']); 
$q2 = $_GET['q'];

//$date = $_SESSION['sys_date'];
$sql="SELECT * FROM stockfile WHERE description = '".$q2."' ";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   $price         = $row['sell_price'];
   $short         = 'DRUGS';
   $short         = 'DRUGS';
   $qty           = $row['qty'];
   $unit          = $row['units'];
   $item          = $row['description'];
   $_SESSION['drug']= $item;
   $_SESSION['price']= $price;







if ($payer==''){
//$query5= "INSERT INTO auto_transact VALUES('','$short','$q2','$price','1','$price','$name','$date','$adm_no','','$ref_no','')";
}else{

//$query5= "INSERT INTO auto_transact_inv VALUES('','$short','$q2','$price','1','$price','$name','$date','$adm_no','','$ref_no','')";
}
//$result5 =mysql_query($query5);
}

if ($qty<=0){
   echo"<font color ='red'>Out of Stock.......";
   die();
}else{
   //echo 'Price'.$price;
}
//echo"<table><td><input name='qty' type='text' size ='1'></td><td><input name='units' type='text' size ='1' value ='$unit'></td><td><input name='freq' type='text' size ='1'></td><td><input name='days' type='text' size ='1'></td><td>Qty:<input name='total' type='text' size ='1' required></td><td><input type='submit' name='add_cancels'  class='button' value='Add'></table>";
echo"<table><tr><td width ='150'><font color ='red'><b>Available Qty:</b></font></td><td><input name='qty' type='text' size ='2' value ='$qty' readonly></td></tr>";

echo"<tr><td width ='150'>Frequency</td><td><input name='freq' type='text' size ='10'></td></tr>";




echo"<tr><td width ='150'>Prescription Term</td><td>";
echo"<select id ='freq2' name='freq2' required>";
echo"<option value=''></option>";
echo"<option value='bd'>bd</option>";
echo"<option value='amp'>amp</option>";
echo"<option value='ad'>ad</option>";
echo"<option value='alt'>alt</option>";
echo"<option value='amp'>amp</option>";
echo"<option value='amt'>amt</option>";
echo"<option value='ant'>ant</option>";
echo"<option value='a.m'>a.m</option>";
echo"<option value='bi'>bi</option>";
echo"<option value='ba'>ba</option>";
echo"<option value='bid'>bid</option>";
echo"<option value='au'>au</option>";
echo"</select></td></td>";


echo"<tr><td width ='150'>Quantity</td><td><input name='total' type='text' size ='1'></td>";
echo"<tr><td></td><td><input type='submit' name='add_cancels'  class='button' value='Add'></td></tr></table>";
?>
