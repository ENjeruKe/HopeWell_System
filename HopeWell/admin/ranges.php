<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
//date_default_timezone_set('Australia/Melbourne');
//$date = date('m/d/Y h:i:s a', time());
?>


<form action ="ranges.php" method ="GET">

<h3><center>Laboratory Test Results</center></h3>
<?php
//$show_it ='No';
$gl_account =  $_SESSION['name'];
$id_no =  $_SESSION['id_no'];
$adm_no=  $_SESSION['adm_no'];
//$description=  $_SESSION['description'];
$payer   =$_SESSION['payer'];
$ref_nos =$_SESSION['ref_nos'];
if (isset($_GET['save_cancel'])){ 

   $date = $_GET['date'];
   $id     = $_GET['line'];
   $id     = $_GET['idnos'];

   $desc   = $_GET['desc'];
   $price  = $_GET['price'];
   $qty    = $_GET['qty'];

   $line1  = $_GET['line1'];
   $line2   = $_GET['line2'];
   $value  = $_GET['value'];
   $flag    = $_GET['flag'];
   $time_a  = $_GET['time_a'];
   $time_b    = $_GET['time_b'];
   $test1_result = $_GET['test1_result'];

$topay = $price*$qty;
   $show_it ='Yes';

$description=$description;

   if ($payer==''){
//$query= "UPDATE ranges set line1 ='$line1',line2
//='$line2',value 
//='$value',flag='$flag',time_a='$time_a',time_b='$time_b',test1
//_result='$test1_result' where description='$desc' and 
//date='$date'" or die(mysql_error());

$query= "UPDATE ranges set line1 ='$line1',line2='$line2',value ='$value',flag='$flag',time_a='$time_a',time_b='$time_b',test1_result='$test1_result' where description='$desc' and date='$date' and line_no ='$adm_no'" or die(mysql_error());
   }else{
      $query= "UPDATE ranges set line1 ='$line1',line2='$line2',value='$value',flag='$flag',time_a='$time_a',time_b='$time_b',test1_result='$test1_result' where description='$desc' and date='$date' and line_no ='$adm_no'" or die(mysql_error());
      //where description='$desc' and date='$date'"  or //die(mysql_error());

   }
   $result =mysql_query($query) or die(mysql_error());  
 
echo"<center>$gl_accounts</center><br>";

echo"<center>$adm_no.$desc.$date.$time_a.$time_b</center><br>";

echo"<center>RESULTS SAVED SUCCESFULLY </center>";
   die();
  }




if (isset($_GET['accounts33'])){ 
   $price = $_GET['account3'];
   $id     = $_GET['accountss'];
   $name   = $_GET['accountss'];
   $name   = $name;
//.'_name'
   $id_no =  $_SESSION['id_no'];
   $adm_no=  $_SESSION['adm_no'];
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
   //$sql="SELECT * FROM  auto_transact WHERE id = '$id'";
    $sql="SELECT * FROM  ranges WHERE id = '$id'";
}else{
   //$sql="SELECT * FROM  auto_transact_inv WHERE id = '$id'";
    $sql="SELECT * FROM  ranges WHERE id = '$id'";
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

$time = 'time(h:m)';



if ($payer==''){
   $sql="SELECT * FROM  auto_transact WHERE id = '$id'";
}else{
   $sql="SELECT * FROM  auto_transact_inv WHERE id = '$id'";
}
$result = mysql_query($sql);
$found ='No';
echo "<table width ='100%'>";
while($row = mysql_fetch_array($result)) {

    $qty =  $row['qty'];
    $line=  $row['id'];
    $id = $line;
//.'name'
    $date = $row['date'];
    $description = $row['description'];
    $prices = $row['sell_price'];
    //$totals = $row['credit_rate'];
    $totals = $qty*$prices;
    $total = $total+$totals;
$range ='No';
$line1 ='';
$line2 ='';

if ($description=='HB'){
$range ='Yes';
 $line1 ='M = 14-18';
 $line2 ='F = 12-16';
}

if ($description=='H.PYLORI ANTIGEN'){
$range ='Yes';
 $line1 ='<20 -ve,20-40 L/p';
 $line2 ='41-120 M/p,>120 H/p';
}

if ($description=='Blood Sugar'){
$range ='Yes';
 $line1 ='RBS 4-8';
 $line2 ='FBS 3.5 - 6.5';
}

$time_now =$_SESSION['now_time'];

    echo "<tr><td width ='70'></td>";
    echo "<td align ='left'><input type='hidden' id ='idnos' name='idnos' size='15' value ='$id' readonly></td></tr>";


    echo "<tr><td width ='70' bgcolor ='black'><font color ='white'>Date</td>";

    echo "<td align ='left'>"."<input type='text' id ='date' name='date' size='15' value ='$date' readonly>" . "</td></tr>";


    echo "<tr><td width ='70' bgcolor ='black'><font color ='white'>Service </td>";
    echo "<td align ='left'>"."<input type='text' id ='desc' name='desc' size='30' value ='$description' readonly>" . "</td></tr>";


If ($range=='Yes'){
    echo "<tr><td width ='70' bgcolor ='black'><font color ='white'>Ranges </td>";
    echo "<td align ='left'>"."<input type='text' id ='line1' name='line1' size='10' value ='$line1'>" . to ."<input type='text' id ='line2' name='line2' size='10' value ='$line2'>".  "</td></tr>";

    echo "<tr><td width ='70' bgcolor ='black'><font color ='white'>Value</td>";
    echo "<td align ='left'>"."<input type='text' id ='value' name='value' size='30' value =''>" . "</td></tr>";

    echo "<tr><td width ='70' bgcolor ='black'><font color ='white'>Flag</td>";
    echo "<td align ='left'>"."<input type='text' id ='flag' name='flag' size='30' value =''>" . "</td></tr>";

}

echo "<tr><td width ='70' bgcolor ='black'><font color ='white'>Time In</td>";
    echo "<td align ='left'>"."<input type='text' id ='time_a' name='time_a' size='30' value ='$time_now' required>" . "</td></tr>";

echo "<tr><td width ='70' bgcolor ='black'><font color ='white'>Time out</td>";
    echo "<td align ='left'>"."<input type='text' id ='time_b' name='time_b' size='30' value ='$time_now' required>" . "</td></tr>";



echo "<tr><td width ='50' bgcolor ='black'><font color ='white'>Notes </td>";
   echo"<td><textarea rows='3' cols='45' id='test1_result' name='test1_result'>$test1_result</textarea></td></tr>";

}
echo "</table>";
echo"<br><br>";
//if (   $show_it =='Yes'){
//echo"<h3>Total Price:</h3><h3>$total</h3><br>";
//}

$ref_nos =$_SESSION['ref_nos'];
//echo 'Ref No:'. $ref_nos;
$total = 0;
//if ($payer==''){
//echo 'Cash'.$ref_nos;
//$sql="SELECT * FROM  auto_transact WHERE invoice_no = '$ref_nos' and date ='$date'  and description <>''";
//and location='DRUGS'
//}else{


//echo 'Credit'.$ref_nos;
//$sql="SELECT * FROM  auto_transact_inv WHERE invoice_no = '$ref_nos' and date ='$date' and description <>''";
//and location='DRUGS' 
//}
//$result = mysql_query($sql);
//$num =mysql_numrows($result) or die(mysql_error());
//$tot =0;
//$i = 0;
//while ($i < $num){
//      $desc     = mysql_result($result,$i,"description");  
//      $price     = mysql_result($result,$i,"sell_price");  
//      $qty       = mysql_result($result,$i,"qty");  
//      $all = $price*$qty;
//      $total = $total+$all;
//echo $desc;
//$i++;
//}
//echo"<h3>Total Khs.";
//echo $total;
echo"</h3>";


echo"<table><td width ='20'><input type='submit' name='save_cancel'  class='button' value='Save'></td></table>";
