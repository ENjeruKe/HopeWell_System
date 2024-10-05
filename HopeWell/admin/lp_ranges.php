<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>


<form action ="fhb_ranges.php" method ="GET">

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

   $v1  = $_GET['line1'];
   $v2   = $_GET['line1_1'];
   $v3  = $_GET['line1_2'];
   
   $v4    = $_GET['line2'];
   $v5  = $_GET['line2_1'];
   $v6    = $_GET['line2_2'];
   
   $v7 = $_GET['line3'];
   $v8  = $_GET['line3_1'];
   $v9   = $_GET['line3_2'];
   
   $v10  = $_GET['line4'];
   $v11    = $_GET['line4_1'];
   $v12  = $_GET['line4_2'];
   
   $v13    = $_GET['line5'];
   $v14 = $_GET['line5_1'];
   $v15  = $_GET['line5_2'];
   
   $v16   = $_GET['line6'];
   $v17  = $_GET['line6_1'];
   $v18    = $_GET['line6_2'];
   
   $v19  = $_GET['line7'];
   $v20    = $_GET['line7_1'];
   $v21 = $_GET['line7_2'];
   
   $v22  = $_GET['line8'];
   $v23   = $_GET['line8_1'];
   $v24  = $_GET['line8_2'];
   
   $v25    = $_GET['line9'];
   $v26   = $_GET['line9_1'];
   $v27  = $_GET['line9_2'];

   $v28  = $_GET['line10'];
   $v29   = $_GET['line10_1'];
   $v30  = $_GET['line10_2'];

   $v31    = $_GET['line11'];
   $v32   = $_GET['line11_1'];
   $v33  = $_GET['line11_2'];

   $v34 = $_GET['line12'];
   $v35   = $_GET['line12_1'];
   $v36  = $_GET['line12_2'];

   $v37  = $_GET['line13'];
   $v38   = $_GET['line13_1'];
   $v39  = $_GET['line13_2'];

   $v40    = $_GET['line14'];
   $v41   = $_GET['line14_1'];
   $v42  = $_GET['line14_2'];

   $v43  = $_GET['line15'];
   $v44   = $_GET['line15_1'];
   $v45  = $_GET['line15_2'];

   $v46    = $_GET['line16'];
   $v47   = $_GET['line16_1'];
   $v48  = $_GET['line16_2'];

   $v49 = $_GET['line17'];
   $v50   = $_GET['line17_1'];
   $v51  = $_GET['line17_2'];

   $v52    = $_GET['line18'];
   $v53   = $_GET['line18_1'];
   $v54  = $_GET['line18_2'];

   $v55 = $_GET['line19'];
   $v56   = $_GET['line19_1'];
   $v57  = $_GET['line19_2'];

   $res  = $_GET['res'];






















$topay = $price*$qty;
   $show_it ='Yes';

$description=$description;


$query= "UPDATE ranges set credit_rate='$res',line1 ='$line1',line2='$line2',value ='$value',flag='$flag',time_a='$time_a',time_b='$time_b',test1_result='$test1_result',
v1 ='$v1',v2 ='$v2',v3 ='$v3',v4 ='$v4',v5 ='$v5',v6 ='$v6',v7 ='$v7',v8 ='$v8'
,v9 ='$v9',v10 ='$v10',v11 ='$v11',v12 ='$v12',v13 ='$v13',v14 ='$v14',v15 ='$v15',v16 ='$v16',v17 ='$v17',v18 ='$v18',v19 ='$v19',v20 ='$v20',v21 ='$v21',v22 ='$v22',v23 ='$v23',v24 ='$v24',v25 ='$v25',v26 ='$v26',v27 ='$v27',v28 ='$v28',v29 ='$v29',v30 ='$v30',v31 ='$v31',v32 ='$v32',v33 ='$v33',
v34 ='$v34',v35 ='$v35',v36 ='$v36',v37 ='$v37',v38 ='$v38',v39 ='$v39',v40 ='$v40',v41 ='$v41'
,v42 ='$v42',v43 ='$v43',v44 ='$v44',v45 ='$v45',v46 ='$v46',v47 ='$v47',v48 ='$v48',v49 ='$v49',v50 ='$v50',v51 ='$v51',v52 ='$v52',v53 ='$v53',v54 ='$v54',v55 ='$v55',v56 ='$v56',v57 ='$v57' where description='$desc' and date='$date' and line_no ='$adm_no'" or die(mysql_error());

   $result =mysql_query($query) or die(mysql_error());  
 
echo"<center>$gl_accounts</center><br>";

echo"<center>$adm_no.$desc.$date.$time_a.$time_b</center><br>";

echo"<center>RESULTS SAVED SUCCESFULLY </center>";
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
    $id = $line.'name';
    $date = $row['date'];
    $description = $row['description'];
    $_SESSION['description'] = $description;
    $_SESSION['date'] = $date;
    $prices = $row['sell_price'];
    //$totals = $row['credit_rate'];
    $totals = $qty*$prices;
    $total = $total+$totals;
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>Test</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Result</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Ranges</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Unit</td></tr>";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>$description</td><td></td><td></td><td></td></tr>";

echo "<tr><td width ='50%' bgcolor ='green'><font color ='white'>Total Cholesterol</td>";
echo "</td><td><input type='text' id ='line1' name='line1' size='5' value =''></td><td><input type='text' id ='line1_1' name='line1_1' size='5' value ='0 - 5.2' readonly></td><td>mmol/l</td></tr>";


echo "<tr><td width ='25%' bgcolor ='green'><font color ='white'>Triglycerides</td>";
    echo "</td><td><input type='text' name='line2' size='5' value =''></td><td><input type='text' id ='line2_1' name='line2_1' size='5' value ='0 - 1.69' readonly></td><td>mmol/l</td></tr>";

    echo "<tr><td width ='25%' bgcolor ='green'><font color ='white'>HDL</td>";
    echo "</td><td><input type='text' name='line3' size='5' value =''></td><td><input type='text' name='line3_1' size='5' value ='1.09 - 2.28' readonly></td><td>mmol/l</td></tr>";

echo "<tr><td width ='25%' bgcolor ='green'><font color ='white'>LDL</td>";
    echo "</td><td><input type='text' name='line4' size='5' value =''></td><td><input type='text' id ='line4_1' name='line4_1' size='5' value ='0 - 3.36' readonly></td><td>mmol/l</td></tr>";
    
 //   echo "<tr><td width ='25%' bgcolor ='green'><font color ='white'>PT(INR) Value Normal Population</td>";
//    echo "</td><td><input type='text' name='line5' size='5' value =''></td><td><input type='text' name='line5_1' size='5' value ='0.8 - 1.2' readonly></td><td></td></tr>";

//    echo "<tr><td width ='25%' bgcolor ='green'><font color ='white'>PT(INR) Value Starndard Theraphy</td>";
//    echo "</td><td><input type='text' name='line6' size='5' value =''></td><td><input type='text' name='line6_1' size='5' value ='2.0 - 3.0' readonly></td><td></td></tr>";

//    echo "<tr><td width ='25%' bgcolor ='green'><font color ='white'>PT(INR) Value High Dose Theraphy</td>";
//    echo "</td><td><input type='text' name='line7' size='5' value =''></td><td><input type='text' name='line7_1' size='5' value ='3.0 - 4.5' readonly></td><td></td></tr>";


    
    
}
echo "</table>";


echo "<table>";
echo "<tr><td width ='100' bgcolor ='green'><font color ='white'>Result Analty</td>

<td><select name='res' required>
<option value=''></option>
<option value='yes'>Yes</option>
<option value='no'>No</option></select></td>";
echo "</table>";


echo"<br><br>";


$ref_nos =$_SESSION['ref_nos'];
//echo 'Ref No:'. $ref_nos;
$total = 0;

echo"</h3>";


echo"<table><td width ='20'><input type='submit' name='save_cancel'  class='button' value='Save'></td></table>";

