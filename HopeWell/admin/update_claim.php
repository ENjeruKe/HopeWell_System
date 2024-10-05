<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>


<form action ="patients_pha_change.php" method ="GET">

<h3>Update Claim Number</h3>
<?php
//$show_it ='No';
$payer   =$_SESSION['payer'];
$ref_nos =$_SESSION['ref_nos'];
$ref_nog =$_SESSION['ref_nog'];
echo $ref_nog.':'.$ref_nos;

if (isset($_GET['save_cancel'])){ 
   $date = $_GET['date'];
   $id     = $_GET['line'];
   $desc   = $_GET['desc'];
   $price  = $_GET['price'];
   $qty    = $_GET['qty'];
   $topay = $price*$qty;
   $show_it ='Yes';
   if ($payer==''){
      $query= "UPDATE auto_transact set qty ='$qty',sell_price='$price',credit_rate ='$topay' where id ='$id'" or die(mysql_error());
   }else{
      $query= "UPDATE auto_transact_inv set qty ='$qty',sell_price='$price',credit_rate ='$topay' where id ='$id'" or die(mysql_error());
   }
   $result =mysql_query($query) or die(mysql_error());   

}
if (isset($_GET['accounts33'])){ 
   $price = $_GET['account3'];
   $id     = $_GET['accountss'];
   $name   = $_GET['accountss'];
   $name   = $name.'_name';
   $id_no =  $_SESSION['id_no'];
   $adm_no=  $_SESSION['adm_no'];
   $ref_no=  $_SESSION['ref_no'];
   $prices = $_GET['55name'];
   $payer  =  $_SESSION['payer'];
}

if (isset($_GET['accountss'])){ 
   $price = $_GET['account3'];
   $id     = $_GET['accountss'];
   $name   = $_GET['accountss'];
   $name   = $name.'_name';
   $id_no =  $_SESSION['id_no'];
   $adm_no=  $_SESSION['adm_no'];
   $prices = $_GET['55name'];
   $payer  =  $_SESSION['payer'];

}

if ($payer==''){
    $sql="DELETE FROM  auto_transact WHERE description =''";
}else{
   $sql="DELETE FROM  auto_transact_inv WHERE description =''";
}
$result = mysql_query($sql);

if ($payer==''){
   $sql="SELECT * FROM  auto_transact WHERE id = '$id'";
}else{
   $sql="SELECT * FROM  auto_transact_inv WHERE id = '$id'";
}
$result = mysql_query($sql);
$found ='No';

while($row = mysql_fetch_array($result)) {
    $qty =  $row['qty'];
    $line=  $row['sell_price'];    
}
$total = 0;



if ($payer==''){
   $query3 = "SELECT * FROM  auto_transact WHERE id = '$id'" or 
die(mysql_error());
}else{
$query3 = "SELECT * FROM  auto_transact_inv WHERE id = '$id'" or 
die(mysql_error());
}
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$tot =0;
$i3 = 0;
while ($i3 < $num3)
      {
$description     = mysql_result($result3,$i3,"description");  
$i3++;
}





if ($payer==''){
   $sql="SELECT * FROM  auto_transact WHERE id = '$id'";
}else{
   $sql="SELECT * FROM  auto_transact_inv WHERE id = '$id'";
}
$result = mysql_query($sql);
$found ='No';
echo "<table width ='100%'>";
echo 'Out';
while($row = mysql_fetch_array($result)) {

    $qty =  $row['qty'];
    $line=  $row['id'];
    $id = $line.'name';
    $date = $row['date'];
    $description = $row['description'];
    $prices = $row['sell_price'];
    //$totals = $row['credit_rate'];
    $totals = $qty*$prices;
    $total = $total+$totals;
    echo "<tr><td width ='20' bgcolor ='black'><font color ='white'>ID</td>";
    echo "<td align ='left'>"."<input type='text' id ='line' name='line' size='5' value ='$line' readonly>" . "</td></tr>";
    echo "<tr><td width ='50' bgcolor ='black'><font color ='white'>Date</td>";
    echo "<td align ='left'>"."<input type='text' id ='date' name='date' size='5' value ='$date'>" . "</td></tr>";
    echo "<tr><td width ='50' bgcolor ='black'><font color ='white'>Description</td>";
    echo "<td align ='left'>"."<input type='text' id ='desc' name='desc' size='30' value ='$description'>" . "</td></tr>";
    echo "<tr><td width ='50' bgcolor ='black'><font color ='white'>Price</td>";
    echo "<td align ='left'>"."<input type='text' id ='price' name='price' size='30' value ='$prices'>" . "</td></tr>";

    echo "<tr><td width ='50' bgcolor ='black'><font color ='white'>Qty</td>";
    echo "<td align ='left'>"."<input type='text' id ='qty' name='qty' size='30' value ='$qty'>" . "</td></tr>";

}
echo "</table>";
//echo"<br><br>";
//if (   $show_it =='Yes'){
//echo"<h3>Total Price:</h3><h3>$total</h3><br>";
//}


$ref_nos =$_SESSION['ref_nos'];
//echo 'Ref No:'. $ref_nos;
$total = 0;
if ($payer==''){
//echo 'Cash'.$ref_nos;
$sql="SELECT * FROM  auto_transact WHERE invoice_no = '$ref_nos' and date ='$date'  and description <>''";
//and location='DRUGS'
}else{
//echo 'Credit'.$ref_nos;
$sql="SELECT * FROM  auto_transact_inv WHERE invoice_no = '$ref_nos' and date ='$date' and description <>''";
//and location='DRUGS' 
}
$result = mysql_query($sql);
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
while ($i < $num){
      $desc     = mysql_result($result,$i,"description");  
      $price     = mysql_result($result,$i,"sell_price");  
      $qty       = mysql_result($result,$i,"qty");  
      $all = $price*$qty;
      $total = $total+$all;
//echo $desc;
$i++;
}
echo"<h3>Total Khs.";
echo $total;
echo"</h3>";
echo"<table><td width ='20'><input type='submit' name='save_cancel'  class='button' value='Save'></td></table>";