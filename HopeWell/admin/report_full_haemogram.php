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
//$found ='No';
//echo "<table width ='100%'>";
while($row = mysql_fetch_array($result2)) {

    $qty =  $row['qty'];
    $line=  $row['id'];
    $id = $line.'name';
    $date = $row['date'];
    $description = $row['description'];
   // $_SESSION['description'] = $description;
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
    
   $v34    = $row['v34'];
   $v35  = $row['v35'];
   $v36    = $row['v36'];
   $v37 = $row['v37'];
   $v38  = $row['v38'];
   $v39    = $row['v39'];
   $v40  = $row['v40'];
   $v41    = $row['v41'];
   $v42 = $row['v42'];

   $v43    = $row['v43'];
   $v44  = $row['v44'];
   $v45    = $row['v45'];
   $v46 = $row['v46'];
   $v47  = $row['v47'];
   $v48    = $row['v48'];
   $v49  = $row['v49'];
   $v50    = $row['v50'];
   $v51 = $row['v51'];
    
   $v52    = $row['v52'];
   $v53  = $row['v53'];
   $v54    = $row['v54'];
   $v55 = $row['v55'];
   $v56  = $row['v56'];
   $v57    = $row['v57'];
 echo "<table><td width ='25' bgcolor ='Black'><font color ='white'>Report No:".$line;
   echo"</font></td></table>";
 
   echo "<table width ='100%'>";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>Test</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Result</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Ranges(M)</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Ranges(F)</td></tr>";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>$description</td><td></td><td></td><td></td></tr>";

echo "<tr><td width ='50%' >WBC</td>";
echo "</td><td><input type='text' id ='line1' name='line1' size='5' value ='$v1'></td><td><input type='text' name='line1_1' size='5' value ='4.0-10' readonly></td><td><input type='text' id ='line1_2' name='line1_2' size='5' value ='4.0-10' readonly></td></tr>";


echo "<tr><td width ='25%'>Lymph#</td>";
    echo "</td><td><input type='text' name='line2' size='5' value ='$v4'></td><td><input type='text' id ='line2_1' name='line2_1' size='5' value ='0.8-4.0' readonly></td><td><input type='text' id ='line2_2' name='line2_2' size='5' value ='0.8-4.0' readonly></td></tr>";

    echo "<tr><td width ='25%'>Mid#</td>";
    echo "</td><td><input type='text' name='line3' size='5' value ='$v7'></td><td><input type='text' name='line3_1' size='5' value ='0.1-1.2' readonly></td><td><input type='text' id ='line3_2' name='line3_2' size='5' value ='0.1-1.2' readonly></td></tr>";

echo "<tr><td width ='25%'>Gran#</td>";
    echo "</td><td><input type='text' name='line4' size='5' value ='$v10'></td><td><input type='text' id ='line4_1' name='line4_1' size='5' value ='2-7' readonly></td><td><input type='text' id ='line4_2' name='line4_2' size='5' value ='2-7' readonly></td></tr>";
    
    echo "<tr><td width ='25%'>Lymph%</td>";
    echo "</td><td><input type='text' name='line5' size='5' value ='$v13'></td><td><input type='text' name='line5_1' size='5' value ='20-40' readonly></td><td><input type='text' name='line5_2' size='5' value ='20-40' readonly></td></tr>";

    echo "<tr><td width ='25%'>Mid%</td>";
    echo "</td><td><input type='text' name='line6' size='5' value ='$v16'></td><td><input type='text' name='line6_1' size='5' value ='3.0-14.0' readonly></td><td><input type='text' name='line6_2' size='5' value ='3.0-14.0' readonly></td></tr>";

    echo "<tr><td width ='25%'>Gran%</td>";
    echo "</td><td><input type='text' name='line7' size='5' value ='$v19'></td><td><input type='text' name='line7_1' size='5' value ='50-70' readonly></td><td><input type='text' name='line7_2' size='5' value ='50-70' readonly></td></tr>";



echo "<tr><td width ='50%'>Hbg gm/dl</td>";
echo "</td><td><input type='text' name='line8' size='5' value ='$v22'></td><td><input type='text' name='line8_1' size='5' value ='12-18' readonly></td><td><input type='text' name='line8_2' size='5' value ='12-16' readonly></td></tr>";


    echo "<tr><td width ='25%' >RBC</td>";
   echo "</td><td><input type='text' name='line9' size='5' value ='$v25'></td><td><input type='text' name='line9_1' size='5' value ='4.5-6.3' readonly></td><td><input type='text' name='line9_2' size='5' value ='4.2-5.4' readonly></td></tr>";
   
   echo "<tr><td width ='25%'>HCT</td>";
   echo "</td><td><input type='text' name='line10' size='5' value ='$v28'></td><td><input type='text' name='line10_1' size='5' value ='42.1%' readonly></td><td><input type='text' name='line10_2' size='5' value ='42.1%' readonly></td></tr>";
   

echo "<tr><td width ='25%'>MCV</td>";
echo "</td><td><input type='text' name='line11' size='5' value ='$v31'></td><td><input type='text' name='line11_1' size='5' value ='0-9' readonly></td><td><input type='text' name='line11_2' size='5' value ='0-20' readonly></td></tr>";


echo "<tr><td width ='25%'>M.C.H</td>";
echo "</td><td><input type='text' name='line12' size='5' value ='$v34'></td><td><input type='text' name='line12_1' size='5' value ='26-32' readonly></td><td><input type='text' name='line12_2' size='5' value ='26-32' readonly></td></tr>";

echo "<tr><td width ='25%'>M.C.H.C</td>";
echo "</td><td><input type='text' name='line13' size='5' value ='$v37'></td><td><input type='text' name='line13_1' size='5' value ='32-36' readonly></td><td><input type='text' name='line13_2' size='5' value ='32-36' readonly></td></tr>";


echo "<tr><td width ='25%'>RDW-CV</td>";
    echo "</td><td><input type='text' name='line14' size='5' value ='$v40'></td><td><input type='text' name='line14_1' size='5' value ='14.1' readonly></td><td><input type='text' name='line14_2' size='5' value ='14.1' readonly></td></tr>";

echo "<tr><td width ='25%'>RDW-SD</td>";
    echo "</td><td><input type='text' name='line15' size='5' value ='$v43'></td><td><input type='text' name='line15_1' size='5' value ='41.1' readonly></td><td><input type='text' name='line15_2' size='5' value ='41.1' readonly></td></tr>";

echo "<tr><td width ='25%' >PLT</td>";
echo "</td><td><input type='text' name='line16' size='5' value ='$v46'></td><td><input type='text' name='line16_1' size='5' value ='320x10/L' readonly></td><td><input type='text' name='line16_2' size='5' value ='320x10/L' readonly></td></tr>";

echo "<tr><td width ='25%'>MPV</td>";
echo "</td><td><input type='text' name='line17' size='5' value ='$v49'></td><td><input type='text' name='line17_1' size='5' value ='8.0fL' readonly></td><td><input type='text' name='line17_2' size='5' value ='8.0fL' readonly></td></tr>";

echo "<tr><td width ='25%' >PDW</td>";
echo "</td><td><input type='text' name='line18' size='5' value ='$v52'></td><td><input type='text' name='line18_1' size='5' value ='76-96' readonly></td><td><input type='text' name='line18_2' size='5' value ='76-96' readonly></td></tr>";

echo "<tr><td width ='25%'>P.C.T</td>";
 echo "</td><td><input type='text' name='line19' size='5' value ='$v55'></td><td><input type='text' name='line19_1' size='5' value ='39-52' readonly></td><td><input type='text' name='line19_2' size='5' value ='36-46' readonly></td></tr>";

            
echo "</table>";    
    
    
}
