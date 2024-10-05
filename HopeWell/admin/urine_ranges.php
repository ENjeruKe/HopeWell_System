<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>


<form action ="urine_ranges.php" method ="GET">

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
echo "Id No.".$id;

   $line1  = $_GET['line1'];
   $line2   = $_GET['line2'];
   $value  = $_GET['value'];
   $flag    = $_GET['flag'];
   $time_a  = $_GET['time_a'];
   $time_b    = $_GET['time_b'];
   $test1_result = $_GET['test1_result'];

   $v1  = $_GET['line1_1'];
   $v2   = $_GET['line13'];
   $v3  = $_GET['line14'];
   $v4    = $_GET['line12'];
   
   $v5  = $_GET['line16'];
   $v6    = $_GET['line17'];
   $v7 = $_GET['line15'];
   $v8  = $_GET['line2_1'];
   
   
   $v9   = $_GET['line3_1'];
   
   $v10  = $_GET['line19_1'];
   $v11    = $_GET['line8_1'];
   $v12  = $_GET['line6_1'];
   $v13    = $_GET['line11'];
   $v14 = $_GET['line18'];
   $v15  = $_GET['line9'];
   $v16   = $_GET['line10'];
   
   $v17  = $_GET['line5_1'];
   $v18  = $_GET['line4_1'];
   
   //$v19  = $_GET['textarea'];

   //$v20    = $_GET['line7_2'];
   //$v21 = $_GET['line7_3'];
   
   //$v22  = $_GET['line8_1'];
   //$v23   = $_GET['line8_2'];
   //$v24  = $_GET['line8_3'];
   
   //$v25    = $_GET['line9'];
   //$v34   = $_GET['line9_2'];
   //$v35  = $_GET['line9_3'];

   //$v26  = $_GET['line10'];
   //$v36   = $_GET['line10_2'];
   //$v37  = $_GET['line10_3'];

   //$v27    = $_GET['line11'];
   //$v38   = $_GET['line11_2'];
   //$v39  = $_GET['line11_3'];

   //$v28 = $_GET['line12'];
   //$v40   = $_GET['line12_2'];
   //$v41  = $_GET['line12_3'];

   //$v29  = $_GET['line13'];
   //$v42   = $_GET['line13_2'];
   //$v43  = $_GET['line13_3'];

   //$v30    = $_GET['line14'];
   //$v44   = $_GET['line14_2'];
   //$v45  = $_GET['line14_3'];

   //$v31  = $_GET['line15'];
   //$v46   = $_GET['line15_2'];
   //$v47  = $_GET['line15_3'];

   //$v32    = $_GET['line16'];
   //$v48   = $_GET['line16_2'];
   //$v49  = $_GET['line16_3'];

   //$v33 = $_GET['line17'];
   //$v50   = $_GET['line17_2'];
   //$v51  = $_GET['line17_3'];
























$topay = $price*$qty;
   $show_it ='Yes';

$description=$description;


$query= "UPDATE ranges set line1 ='$line1',line2='$line2',value ='$value',flag='$flag',time_a='$time_a',time_b='$time_b',test1_result='$test1_result',
v1 ='$v1',v2 ='$v2',v3 ='$v3',v4 ='$v4',v5 ='$v5',v6 ='$v6',v7 ='$v7',v8 ='$v8'
,v9 ='$v9',v10 ='$v10',v11 ='$v11',v12 ='$v12',v13 ='$v13',v14 ='$v14',v15 ='$v15',v16 ='$v16',v17 ='$v17',v18 ='$v18',v19 ='$v19',v20 ='$v20',v21 ='$v21',v22 ='$v22',v23 ='$v23',v24 ='$v24',v25 ='$v25',v26 ='$v26',v27 ='$v27',v28 ='$v28',v29 ='$v29',v30 ='$v30',v31 ='$v31',v32 ='$v32',v33 ='$v33',
v34 ='$v34',v35 ='$v35',v36 ='$v36',v37 ='$v37',v38 ='$v38',v39 ='$v39',v40 ='$v40',v41 ='$v41',v42 ='$v42',v43 ='$v43',v44 ='$v44',v45 ='$v45',v46 ='$v46',v47 ='$v47',v48 ='$v48',v49 ='$v49',v50 ='$v50',v51 ='$v51' where description='$desc' and date='$date' and line_no ='$adm_no'" or die(mysql_error());
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
   $query3 = "SELECT * FROM  auto_transact WHERE id = '$id'" or 
die(mysql_error());
}else{
$query3 = "SELECT * FROM  auto_transact_inv WHERE id = '$id'" or 
die(mysql_error());
}
$result = mysql_query($query3);
$found ='No';
echo "<table width ='100%'>";
while($row = mysql_fetch_array($result)) {

    $qty =  $row['qty'];
    $line=  $row['id'];
    $id = $line;
//.'name'
    $date = $row['date'];
    $description = $row['description'];
    $_SESSION['description'] = $description;
    $_SESSION['date'] = $date;
    $prices = $row['sell_price'];
    //$totals = $row['credit_rate'];
    $totals = $qty*$prices;
    $total = $total+$totals;
echo "<tr><td width ='50%'><input type='hidden' name='idnos' size='10' value ='$id'></td><td></td></td>";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>URINE</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Result</td><tr>";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'><font color ='red'><b>$description</font></b></td><td></td>";
echo "<tr><td width ='50%' bgcolor ='green'><font color ='yellow'><b>Macroscopic</font></b></td><td></td>";

echo "<tr><td width ='25%'>Color</td>";
echo "</td><td><input type='text' name='line8_1' size='5' value =''></td><!--td><input type='text' name='line8_2' size='5' value ='0-9' readonly></td><td><input type='text' name='line8_3' size='5' value ='0-20' readonly></td--></tr>";


echo "<tr><td width ='25%'>Appearance</td>";
echo "</td><td><input type='text' name='line6_1' size='5' value =''></td><!--td><input type='text' name='line6_2' size='5' value ='26-32' readonly></td><td><input type='text' name='line6_3' size='5' value ='26-32' readonly></td--></tr>";

echo "<tr><td width ='50%' bgcolor ='green'><font color ='yellow'><b>Urine Chemistry</font></b></td><td></td></td>";

echo "<tr><td width ='50%'>Glucose</td>";
echo "</td><td><input type='text' id ='line1_1' name='line1_1' size='5' value =''></td><!--td><input type='text' id ='line1_2' name='line1_2' size='5' value ='4.0-10' readonly></td><td><input type='text' id ='line1_3' name='line1_3' size='5' value ='4.0-10' readonly></td--></tr>";


echo "<tr><td width ='25%'>Bilirubin</td>";
    echo "</td><td><input type='text' name='line13' size='5' value =''></td>
    <!--td><input type='text' id ='line13_2' name='line13_2' size='5' value ='0.8-4.0' readonly></td><td><input type='text' id ='line13_3' name='line13_3' size='5' value ='0.8-4.0' readonly></td--></tr>";

    echo "<tr><td width ='25%'>Ketone</td>";
    echo "</td><td><input type='text' name='line14' size='5' value =''></td><!--td><input type='text' id ='line14_2' name='line14_2' size='5' value ='0.1-1.2' readonly></td><td><input type='text' id ='line14_3' name='line14_3' size='5' value ='0.1-1.2' readonly></td--></tr>";

echo "<tr><td width ='25%'>Sp. Gravity</td>";
    echo "</td><td><input type='text' name='line12' size='5' value =''></td><td><!--input type='text' id ='line12_2' name='line12_2' size='5' value ='2-7' readonly></td><td><input type='text' id ='line12_3' name='line12_3' size='5' value ='2-7' readonly></td--></tr>";
    
    echo "<tr><td width ='25%'>Blood</td>";
    echo "</td><td><input type='text' name='line16' size='5' value =''></td><!--td><input type='text' id ='line16_2' name='line16_2' size='5' value ='20-40' readonly></td><td><input type='text' id ='line16_3' name='line16_3' size='5' value ='20-40' readonly></td--></tr>";

    echo "<tr><td width ='25%'>PH</td>";
    echo "</td><td><input type='text' name='line17' size='5' value =''></td><!--td><input type='text' id ='line17_2' name='line17_2' size='5' value ='3.0-14.0' readonly></td><td><input type='text' id ='line17_3' name='line17_3' size='5' value ='3.0-14.0' readonly></td--></tr>";

    echo "<tr><td width ='25%'>Protein</td>";
    echo "</td><td><input type='text' name='line15' size='5' value =''></td><!--td><input type='text' id ='line15_2' name='line15_2' size='5' value ='50-70' readonly></td><td><input type='text' id ='line15_3' name='line15_3' size='5' value ='50-70' readonly></td--></tr>";



echo "<tr><td width ='50%'>Urobilinogen</td>";
echo "</td><td><input type='text' id ='line2_1' name='line2_1' size='5' value =''></td><!--td><input type='text' id ='line2_2' name='line2_2' size='5' value ='12-18' readonly></td><td><input type='text' id ='line2_3' name='line2_3' size='5' value ='12-16' readonly></td--></tr>";


    echo "<tr><td width ='25%'>Nitrate</td>";
   echo "</td><td><input type='text' name='line3_1' size='5' value =''></td><!--td><input type='text' name='line3_2' size='5' value ='4.5-6.3' readonly></td><td><input type='text' name='line3_3' size='5' value ='4.2-5.4' readonly></td--></tr>";
   
   echo "<tr><td width ='25%'>Leucocytes</td>";
   echo "</td><td><input type='text' name='line19_1' size='5' value =''></td><!--td><input type='text' name='line19_2' size='5' value ='42.1%' readonly></td><td><input type='text' name='line19_3' size='5' value ='42.1%' readonly></td--></tr>";
   




echo "<tr><td width ='25%' bgcolor ='black'><font color ='yellow'><b>Microscopic</b></td>";
echo "</td><td><!--input type='text' name='line7_1' size='5' value =''--></td><!--td><input type='text' name='line7_2' size='5' value ='32-36' readonly></td><td><input type='text' name='line7_3' size='5' value ='32-36' readonly></td--></tr>";


echo "<tr><td width ='25%'>Pus Cells</td>";
    echo "</td><td><input type='text' name='line11' size='5' value =''></td><!--td><input type='text' name='line11_2' size='5' value ='14.1' readonly></td><td><input type='text' name='line11_3' size='5' value ='14.1' readonly></td--></tr>";

echo "<tr><td width ='25%'>Eptherial</td>";
    echo "</td><td><input type='text' name='line18' size='5' value =''></td><!--td><input type='text' name='line18_2' size='5' value ='41.1' readonly></td><td><input type='text' name='line18_3' size='5' value ='41.1' readonly></td--></tr>";

echo "<tr><td width ='25%'>Yeast Cell</td>";
echo "</td><td><input type='text' name='line9' size='5' value =''></td><!--td><input type='text' name='line9_2' size='5' value ='320x10/L' readonly></td><td><input type='text' name='line9_3' size='5' value ='320x10/L' readonly></td--></tr>";

echo "<tr><td width ='25%'>RBC Cells</td>";
echo "</td><td><input type='text' name='line10' size='5' value =''></td><!--td><input type='text' name='line10_2' size='5' value ='8.0fL' readonly></td><td><input type='text' name='line10_3' size='5' value ='8.0fL' readonly></td--></tr>";

echo "<tr><td width ='25%'>TV Larvea</td>";
echo "</td><td><input type='text' name='line5_1' size='5' value =''></td><!--td><input type='text' name='line5_2' size='5' value ='76-96' readonly></td><td><input type='text' name='line5_3' size='5' value ='76-96' readonly></td--></tr></table>";

echo "<!--table width ='100%'><tr><td width ='25%'>Others</td>";
 echo "</td><td width ='75%'><textarea rows='10' cols='25%' name='textarea'>$med1_dx2</textarea></td></tr></table-->";

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

