<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$today = $_SESSION['sys_date'];
$date = $_SESSION['sys_date'];
$store_select = 'PHARMACY';
$payer  =$_SESSION['payer'];
$payerx  =$_SESSION['payer'];
$_SESSION['payer'] = $payerx;
//echo'payer.'.$payerx;
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


<form action ="doc_window_21.php" method ="GET">

<?php
//echo $adm_no;


$adm_no =$_SESSION['adm_no'];
$name   =$_SESSION['name'];
$ref_no =$_SESSION['ref_no'];
$payer  =$_SESSION['payer'];
//$date   =$_SESSION['old_date'];


$staff =substr($adm_no,0,5);


$q = intval($_POST['q']); 
$q2 = $_GET['q'];

$word ='KWS';

//$date = $_SESSION['sys_date'];

if($payer ==''){
$sql="SELECT * FROM stockfile WHERE description = '".$q2."' and location ='$store_select' ";
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

}

}elseif(strpos($payer, $word) !== false){



$sql="SELECT * FROM stockfile WHERE description = '".$q2."' and location ='$store_select' ";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   $price         = $row['nhif_price'];
   $short         = 'DRUGS';
   $short         = 'DRUGS';
   $qty           = $row['qty'];
   $unit          = $row['units'];
   $item          = $row['description'];
   $_SESSION['drug']= $item;
   $_SESSION['price']= $price;

}



}else{
    
  // echo 'Payers:'.$payer.$payerx;
  
    $sql="SELECT * FROM stockfile WHERE description = '".$q2."' and location ='$store_select' ";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   $price         = $row['credit_price'];
   $short         = 'DRUGS';
   $short         = 'DRUGS';
   $qty           = $row['qty'];
   $unit          = $row['units'];
   $item          = $row['description'];
   $nhif_price         = $row['nhif_price'];
   $_SESSION['drug']= $item;
   $_SESSION['price']= $price;
   
   $payer =$_SESSION['payer'];
   $payerx = substr($payer,0,4);
   //echo 'Payers:'.$payerx;
   if ($payerx == 'NHIF' or $payerx=='KWS ' or $payerx=='NAIV'){
       //Price remains credit_rate
       $price         = $row['nhif_price'];
   }else{
       $price = $row['credit_price'];
   }

}

}

echo 'Payer:'.$payer.$payerx;

if ($qty<=0){
   echo"<font color ='red'>Out of Stock.......";
   die();
}else{
   //echo 'Price'.$price;
}
//echo"<table><td><input name='qty' type='text' size ='1'></td><td><input name='units' type='text' size ='1' value ='$unit'></td><td><input name='freq' type='text' size ='1'></td><td><input name='days' type='text' size ='1'></td><td>Qty:<input name='total' type='text' size ='1' required></td><td><input type='submit' name='add_cancels'  class='button' value='Add'></table>";
echo"<table><tr><td width ='150'><font color ='red'><b>Available Qty:</b></font></td><td><input name='qty' type='text' size ='2' value ='$qty' readonly></td></tr>";

if ($staff=='STAFF'){
   echo"<tr><td width ='150'>Price</td><td><input name='three_price' type='text' size ='10' value ='$price'></td></tr>";
}else{
    echo"<tr><td width ='150'>Price</td><td><input name='three_price' type='text' size ='10' value ='$price' readonly></td></tr>";
}

echo"<tr><td width ='150'>Quantity</td><td><input name='total' type='text' size ='1' required></td>";

echo"<tr><td width ='150'>Dosage</td><td>";
echo"<select id ='freq2' name='freq2'>";
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
echo"<option value='o.d'>o.d</option>";
echo"<option value='q.i.d'>q.i.d</option>";
echo"<option value='nocte'>nocte</option>";
echo"<option value='prn'>prn</option>";
echo"<option value='tds'>tds</option>";


echo"<option value='Stat'>Stat</option>";
echo"</select></td></td>";

echo"<tr><td width ='150'>Prescription Instruction:</td><td><input name='dosage' type='text' size ='50' required></td>";

echo"<tr><td width ='150'>Duration</td><td><input name='freq' type='text' size ='10'></td></tr>";

echo"<tr><td></td><td><input type='submit' name='add_cancels'  class='button' value='Add'></td></tr></table>";
?>
