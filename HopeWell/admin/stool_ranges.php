<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>


<form action ="stool_ranges.php" method ="GET">

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

   $date = $_SESSION['date'];
   $id     = $_GET['line'];
   $id     = $_GET['idnos'];
   $desc   = $_SESSION['description'];
   $price  = $_GET['price'];
   $qty    = $_GET['qty'];

   $line1  = $_GET['line1'];
   $line2   = $_GET['line2'];
   $value  = $_GET['value'];
   $flag    = $_GET['flag'];
   $time_a  = $_GET['time_a'];
   $time_b    = $_GET['time_b'];
   $test1_result = $_GET['test1_result'];

   $v1  = $_GET['line8_1'];
   $v2   = $_GET['line6_1'];
   
   

$topay = $price*$qty;
   $show_it ='Yes';

$description=$description;


$query= "UPDATE ranges set line1 ='$line1',line2='$line2',value ='$value',flag='$flag',time_a='$time_a',time_b='$time_b',test1_result='$test1_result',
v1 ='$v1',v2 ='$v2' where description='$desc' and date='$date' and line_no ='$adm_no'" or die(mysql_error());
//description='$desc' and date='$date' and line_no ='$adm_no'

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
   $name   = $name.'_name';
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
   $sql="SELECT * FROM  auto_transact WHERE id = '$id'";
}else{
   //$sql="SELECT * FROM  auto_transact_inv WHERE id = '$id'";
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
   //$query3 = "SELECT * FROM  auto_transact WHERE id = '$id'";
   $query3 = "SELECT * FROM  auto_transact WHERE id = '$id'";
}else{
  //$query3 = "SELECT * FROM  auto_transact_inv WHERE id = '$id'";
   $query3 = "SELECT * FROM  auto_transact_inv WHERE id = '$id'" ;
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
   //$sql="SELECT * FROM  auto_transact WHERE id = '$id'";
   $sql="SELECT * FROM  auto_transact WHERE id = '$id'";
}else{
   //$sql="SELECT * FROM  auto_transact_inv WHERE id = '$id'";
   $sql="SELECT * FROM  auto_transact_inv WHERE id = '$id'";
}
$result = mysql_query($sql);
$found ='No';
echo "<table width ='100%'>";
while($row = mysql_fetch_array($result)) {

    $qty =  $row['qty'];
    $line=  $row['id'];
    $id = $line;
    //.'name';
    $date = $row['date'];
    $description = $row['description'];
    $_SESSION['description'] = $description;
    $_SESSION['date'] = $date;
    $prices = $row['sell_price'];
    //$totals = $row['credit_rate'];
    $totals = $qty*$prices;
    $total = $total+$totals;
echo $id;
echo "<tr><td width ='50%'></td>";
echo "<td width ='10%'><input type='hidden' name='idnos' size='10' value ='$id'></td><tr>";

echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>$description</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Result</td><tr>";
//echo "<td width ='10%' bgcolor ='black'><font color ='white'>Ranges(M)</td>";
//echo "<td width ='10%' bgcolor ='black'><font color ='white'>Ranges(F)</td></tr>";
echo "<!--tr><td width ='50%' bgcolor ='black'><font color ='white'><font color ='red'><b>$description</font></b></td><td></td-->";
echo "<tr><td width ='50%' bgcolor ='green'><font color ='yellow'><b>Macroscopic</font></b></td><td></td>";

echo "<tr><td width ='25%'>Color</td>";
echo "</td><td><input type='text' name='line8_1' size='5' value =''></td><!--td><input type='text' name='line8_2' size='5' value ='0-9' readonly></td><td><input type='text' name='line8_3' size='5' value ='0-20' readonly></td--></tr>";


echo "<tr><td width ='25%'>Consistency</td>";
echo "</td><td><input type='text' name='line6_1' size='5' value =''></td></tr>";

echo "<tr><td width ='50%' bgcolor ='green'><font color ='yellow'><b>Microscopic</font></b></td><td></td>";
echo "<table>";
echo "<tr><td width ='25%' bgcolor ='black'><font color ='white'>Others</td>";
    echo "</td><td><textarea rows='6' cols='50' name='test1_result'>$sign4</textarea><br></td></tr>";

echo "</table>";




    
        
            
    
    
    
}
echo "</table>";
echo"<br><br>";


$ref_nos =$_SESSION['ref_nos'];
//echo 'Ref No:'. $ref_nos;
$total = 0;

echo"</h3>";


echo"<table><td width ='20'><input type='submit' name='save_cancel'  class='button' value='Save'></td></table>";

