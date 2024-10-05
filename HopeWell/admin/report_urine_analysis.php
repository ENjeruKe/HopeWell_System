<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>

<?php
$ref_nos =$_SESSION['ref_no'];
$test =$_SESSION['test'];
    
//echo 'Ref:'.$ref_nos;
$sql2="SELECT * FROM  ranges WHERE invoice_no = '$ref_nos' and description ='$test'";

$result2 = mysql_query($sql2);
$found ='No';
echo "<table width ='100%'>";
while($row = mysql_fetch_array($result2)) {

    $qty =  $row['qty'];
    $line=  $row['id'];
    $id = $line.'name';
    $date = $row['date'];
    $description = $row['description'];
    $_SESSION['description'] = $description;
    $_SESSION['date'] = $date;
    $prices = $row['sell_price'];

   $v1  = $row['v1'];
   $v2   = $row['v2'];
   $v3  = $row['v3'];
   
   $v4    = $row['v4'];
   $v5  = $row['v5'];
   $v6    = $row['v6'];
   
   $v7 = $row['v7'];
   $v8  = $row['v8'];
   $v9   = $row['v9'];
   
   $v10  = $row['v10'];
   $v11    = $row['v11'];
   $v12  = $row['v12'];
   
   $v13    = $row['v13'];
   $v14 = $row['v14'];
   $v15  = $row['v15'];
   
   $v16   = $row['v16'];
   $v17  = $row['v17'];
   $v18    = $row['v18'];
   
   $v19  = $row['v19'];
   $v20    = $row['v20'];
   $v21 = $row['v21'];
   
   $v22  = $row['v22'];
   $v23   = $row['v23'];
   $v24  = $row['v24'];
   
   $v25    = $row['v25'];
   $v26  = $row['v26'];
   $v27    = $row['v27'];
   $v28 = $row['v28'];
   $v29  = $row['v29'];
   $v30    = $row['v30'];
   $v31  = $row['v31'];
   $v32    = $row['v32'];
   $v33 = $row['v33'];
   $med1_dx2 = $row['test1_result'];
 
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>URINE</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Result</td><tr>";
//echo "<td width ='10%' bgcolor ='black'><font color ='white'>Ranges(M)</td>";
//echo "<td width ='10%' bgcolor ='black'><font color ='white'>Ranges(F)</td></tr>";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'><font color ='red'><b>$description</font></b></td><td></td>";
echo "<tr><td width ='50%' bgcolor ='green'><font color ='yellow'><b>Macroscopic</font></b></td><td></td>";

echo "<tr><td width ='25%'>Color</td>";
echo "</td><td><input type='text' name='line8_1' size='5' value ='$v11'></td><!--td><input type='text' name='line8_2' size='5' value ='0-9' readonly></td><td><input type='text' name='line8_3' size='5' value ='0-20' readonly></td--></tr>";

echo "<!--tr><td width ='50%' bgcolor ='green'><font color ='yellow'><b>Appearance</font></b></td><td></td-->";


echo "<tr><td width ='25%'>appearance</td>";
echo "</td><td><input type='text' name='line6_1' size='5' value ='$v12'></td><!--td><input type='text' name='line6_2' size='5' value ='26-32' readonly></td><td><input type='text' name='line6_3' size='5' value ='26-32' readonly></td--></tr>";


echo "<tr><td width ='50%' bgcolor ='green'><font color ='yellow'><b>Urine Chemistry</font></b></td><td></td>";

echo "<tr><td width ='50%'>Glucose</td>";
echo "</td><td><input type='text' id ='line1_1' name='line1_1' size='5' value ='$v1'></td><!--td><input type='text' id ='line1_2' name='line1_2' size='5' value ='4.0-10' readonly></td><td><input type='text' id ='line1_3' name='line1_3' size='5' value ='4.0-10' readonly></td--></tr>";


echo "<tr><td width ='25%'>Bilirubin</td>";
    echo "</td><td><input type='text' name='line13' size='5' value ='$v2'></td>
    <!--td><input type='text' id ='line13_2' name='line13_2' size='5' value ='0.8-4.0' readonly></td><td><input type='text' id ='line13_3' name='line13_3' size='5' value ='0.8-4.0' readonly></td--></tr>";

    echo "<tr><td width ='25%'>Ketone</td>";
    echo "</td><td><input type='text' name='line14' size='5' value ='$v3'></td><!--td><input type='text' id ='line14_2' name='line14_2' size='5' value ='0.1-1.2' readonly></td><td><input type='text' id ='line14_3' name='line14_3' size='5' value ='0.1-1.2' readonly></td--></tr>";

echo "<tr><td width ='25%'>Sp. Gravity</td>";
    echo "</td><td><input type='text' name='line12' size='5' value ='$v4'></td><td><!--input type='text' id ='line12_2' name='line12_2' size='5' value ='2-7' readonly></td><td><input type='text' id ='line12_3' name='line12_3' size='5' value ='2-7' readonly></td--></tr>";
    
    echo "<tr><td width ='25%'>Blood</td>";
    echo "</td><td><input type='text' name='line16' size='5' value ='$v5'></td><!--td><input type='text' id ='line16_2' name='line16_2' size='5' value ='20-40' readonly></td><td><input type='text' id ='line16_3' name='line16_3' size='5' value ='20-40' readonly></td--></tr>";

    echo "<tr><td width ='25%'>PH</td>";
    echo "</td><td><input type='text' name='line17' size='5' value ='$v6'></td><!--td><input type='text' id ='line17_2' name='line17_2' size='5' value ='3.0-14.0' readonly></td><td><input type='text' id ='line17_3' name='line17_3' size='5' value ='3.0-14.0' readonly></td--></tr>";

    echo "<tr><td width ='25%'>Protein</td>";
    echo "</td><td><input type='text' name='line15' size='5' value ='$v7'></td><!--td><input type='text' id ='line15_2' name='line15_2' size='5' value ='50-70' readonly></td><td><input type='text' id ='line15_3' name='line15_3' size='5' value ='50-70' readonly></td--></tr>";



echo "<tr><td width ='50%'>Urobilinogen</td>";
echo "</td><td><input type='text' id ='line2_1' name='line2_1' size='5' value ='$v8'></td><!--td><input type='text' id ='line2_2' name='line2_2' size='5' value ='12-18' readonly></td><td><input type='text' id ='line2_3' name='line2_3' size='5' value ='12-16' readonly></td--></tr>";


    echo "<tr><td width ='25%'>Nitrate</td>";
   echo "</td><td><input type='text' name='line3_1' size='5' value ='$v9'></td><!--td><input type='text' name='line3_2' size='5' value ='4.5-6.3' readonly></td><td><input type='text' name='line3_3' size='5' value ='4.2-5.4' readonly></td--></tr>";
   
   echo "<tr><td width ='25%'>Leucocytes</td>";
   echo "</td><td><input type='text' name='line19_1' size='5' value ='$v10'></td><!--td><input type='text' name='line19_2' size='5' value ='42.1%' readonly></td><td><input type='text' name='line19_3' size='5' value ='42.1%' readonly></td--></tr>";
   

echo "<!--tr><td width ='25%'>Volume</td>";
echo "</td><td><input type='text' name='line7_1' size='5' value ='$v13'></td><!--td><input type='text' name='line7_2' size='5' value ='32-36' readonly></td><td><input type='text' name='line7_3' size='5' value ='32-36' readonly></td--></tr-->";

echo "<tr><td width ='50%' bgcolor ='green'><font color ='yellow'><b>Microscopic</font></b></td><td></td>";

echo "<tr><td width ='25%'>Pus Cells</td>";
    echo "</td><td><input type='text' name='line11' size='5' value ='$v13'></td><!--td><input type='text' name='line11_2' size='5' value ='14.1' readonly></td><td><input type='text' name='line11_3' size='5' value ='14.1' readonly></td--></tr>";

echo "<tr><td width ='25%'>Eptherial</td>";
    echo "</td><td><input type='text' name='line18' size='5' value ='$v14'></td><!--td><input type='text' name='line18_2' size='5' value ='41.1' readonly></td><td><input type='text' name='line18_3' size='5' value ='41.1' readonly></td--></tr>";

echo "<tr><td width ='25%'>Yeast Cell</td>";
echo "</td><td><input type='text' name='line9' size='5' value ='$v15'></td><!--td><input type='text' name='line9_2' size='5' value ='320x10/L' readonly></td><td><input type='text' name='line9_3' size='5' value ='320x10/L' readonly></td--></tr>";

echo "<tr><td width ='25%'>RBC Cells</td>";
echo "</td><td><input type='text' name='line10' size='5' value ='$v16'></td><!--td><input type='text' name='line10_2' size='5' value ='8.0fL' readonly></td><td><input type='text' name='line10_3' size='5' value ='8.0fL' readonly></td--></tr>";

echo "<tr><td width ='25%'>TV Larvea</td>";
echo "</td><td><input type='text' name='line5_1' size='5' value ='$v17'></td><!--td><input type='text' name='line5_2' size='5' value ='76-96' readonly></td><td><input type='text' name='line5_3' size='5' value ='76-96' readonly></td--></tr>";

echo "<tr><td width ='25%'>Others</td>";
 echo "</td><td><textarea rows='5' cols='50%' name='textarea'>$med1_dx2</textarea></td><!--td><input type='text' name='line4_2' size='5' value ='39-52' readonly></td><td><input type='text' name='line4_3' size='5' value ='36-46' readonly></td--></tr>";

            
    
    
    
}
echo "</table>";