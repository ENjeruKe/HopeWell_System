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
   
   
   
echo "<tr><td width ='40%' bgcolor ='black'><font color ='white'>Test</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Result</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Ranges(M)</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Ranges(F)</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Units</td></tr>";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>$description</td><td></td><td></td><td></td></tr>";

echo "<tr><td width ='50%' bgcolor ='green'><font color ='white'>Total Bilirubin</td>";
echo "</td><td><input type='text' id ='line1' name='line1' size='5' value ='$v1'></td><td><input type='text' id ='line1_1' name='line1_1' size='5' value ='0 - 33.9' readonly></td><td><input type='text' id ='line1_2' name='line1_2' size='5' value ='0 - 33.9' readonly></td><td>umol/l</td></tr>";


echo "<tr><td width ='25%' bgcolor ='green'><font color ='white'>Direct Bilirubin</td>";
    echo "</td><td><input type='text' name='line2' size='5' value ='$v4'></td><td><input type='text' id ='line2_1' name='line2_1' size='5' value ='0 - 3.39' readonly></td><td><input type='text' id ='line2_2' name='line2_2' size='5' value ='0 - 3.39' readonly></td><td>umol/l</td></tr>";

    echo "<tr><td width ='25%' bgcolor ='green'><font color ='white'>SGOT</td>";
    echo "</td><td><input type='text' name='line3' size='5' value ='$v7'></td><td><input type='text' name='line3_1' size='5' value ='Upto 35' readonly></td><td><input type='text' id ='line3_2' name='line3_2' size='5' value ='Upto 31' readonly></td><td>U/L</td></tr>";

echo "<tr><td width ='25%' bgcolor ='green'><font color ='white'>SGPT</td>";
    echo "</td><td><input type='text' name='line4' size='5' value ='$v10'></td><td><input type='text' id ='line4_1' name='line4_1' size='5' value ='Upto 45' readonly></td><td><input type='text' id ='line4_2' name='line4_2' size='5' value ='Upto 34' readonly></td><td>U/L</td></tr>";
    
    echo "<tr><td width ='25%' bgcolor ='green'><font color ='white'>GGT</td>";
    echo "</td><td><input type='text' name='line5' size='5' value ='$v13'></td><td><input type='text' name='line5_1' size='5' value ='Upto 55' readonly></td><td><input type='text' name='line5_2' size='5' value ='Upto 38' readonly></td><td>U/L</td></tr>";

    echo "<tr><td width ='25%' bgcolor ='green'><font color ='white'>ALP</td>";
    echo "</td><td><input type='text' name='line6' size='5' value ='$v16'></td><td><input type='text' name='line6_1' size='5' value ='53 - 128' readonly></td><td><input type='text' name='line6_2' size='5' value ='' ></td><td>U/L</td></tr>";


    
    
}
echo "</table>";