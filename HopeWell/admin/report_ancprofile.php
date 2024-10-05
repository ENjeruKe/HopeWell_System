<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>

<?php
$ref_nos =$_SESSION['ref_no'];
$test =$_SESSION['test'];
    
echo 'Ref:'.$ref_nos;
$sql2="SELECT * FROM  ranges WHERE invoice_no = '$ref_nos' and description ='$test'";

$result2 = mysql_query($sql2);
$found ='No';
//echo "<table width ='100%'>";
while($row = mysql_fetch_array($result2)) {

    $qty =  $row['qty'];
    $line=  $row['id'];
    $id = $line.'name';
    $date = $row['date'];
    $description = $row['description'];
    $_SESSION['description'] = $description;
    $_SESSION['date'] = $date;
    $prices = $row['sell_price'];
   $id = $raw['id'];
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
   
   
   $v34 = $row['test1_result'];
   echo "<table><td width ='25' bgcolor ='Black'><font color ='white'>Report No:".$line;
   echo"</font></td></table>";
 
echo "<table width ='100%'><tr><td width ='50%' bgcolor ='black'><font color ='white'>Test</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Result</td></tr>";

echo "<tr><td width ='50%'><font color ='red'>$description</font></td><td></td><td></td><td></td></tr>";
echo "<tr><td width ='25%'>Blood Group</td>";
echo "</td><td><input type='text' name='line1' size='5' value ='$v1'></td></tr>";
echo "<tr><td width ='25%'>Hb</td>";
echo "</td><td><input type='text' name='line2' size='5' value ='$v2'></td></tr>";
echo "<tr><td width ='25%'>Platelat Count</td>";
    echo "</td><td><input type='text' name='line3' size='5' value ='$v3'></td></tr>";
    
echo "<tr><td width ='25%'>VDRL</td>";
    echo "</td><td><input type='text' name='line4' size='5' value ='$v4'></td></tr>";
        
    echo "<tr><td width ='25%'><font color ='red'><b>Urinalysis</b></font></td>";
    
    
    //Now include Urine analysis parameters
    //-------------------------------------

echo "<tr><td width ='50%' bgcolor ='green'><font color ='white'><b>Macroscopic</b></td><td></td></tr>";

echo "<tr><td width ='25%'>Color</td>";
echo "</td><td><input type='text' name='line15' size='5' value ='$v15'></td></tr>";

echo "<tr><td width ='25%' >Appearance</td>";
echo "</td><td><input type='text' name='line16' size='5' value ='$v16'></td></tr>";


echo "<tr><td width ='50%' bgcolor ='green'><font color ='white'><b>Urine Chemistry</b></td><td></td></tr>";

    echo "<tr><td width ='50%'>Glucose</td>";
echo "</td><td><input type='text' name='line5' size='5' value ='$v6'></td></tr>";
echo "<tr><td width ='25%'>Bilirubin</td>";
    echo "</td><td><input type='text' name='line6' size='5' value ='$v6'></td>
    </tr>";

    echo "<tr><td width ='25%'>Ketone</td>";
    echo "</td><td><input type='text' name='line7' size='5' value ='$v7'></td></tr>";

echo "<tr><td width ='25%'>Sp. Gravity</td>";
    echo "</td><td><input type='text' name='line8' size='5' value ='$v8'></td><td></tr>";
    
    echo "<tr><td width ='25%' >Blood</td>";
    echo "</td><td><input type='text' name='line9' size='5' value ='$v9'></td></tr>";

    echo "<tr><td width ='25%' >PH</td>";
    echo "</td><td><input type='text' name='line10' size='5' value ='$v10'></td></tr>";

    echo "<tr><td width ='25%' >Protein</td>";
    echo "</td><td><input type='text' name='line11' size='5' value ='$v11'></td></tr>";

echo "<tr><td width ='50%' >Urobilinogen</td>";
echo "</td><td><input type='text' name='line12' size='5' value ='$v12'></td></tr>";


    echo "<tr><td width ='25%' >Nitrate</td>";
   echo "</td><td><input type='text' name='line13' size='5' value ='$v13'></td></tr>";
   
   echo "<tr><td width ='25%' >Leucocytes</td>";
   echo "</td><td><input type='text' name='line14' size='5' value ='$v14'></td></tr>";
   

echo "<!--tr><td width ='25%'>Volume</td>";
echo "</td><td><input type='text' name='line17' size='5' value ='$v17'></td></tr-->";

echo "<tr><td width ='50%' bgcolor ='green'><font color ='white'><b>Microscopic</b></td><td></td></tr>";


echo "<tr><td width ='25%'>Pus Cells</td>";
    echo "</td><td><input type='text' name='line18' size='5' value ='$v18'></td></tr>";

echo "<tr><td width ='25%'>Eptherial</td>";
    echo "</td><td><input type='text' name='line19' size='5' value ='$v19'></td></tr>";

echo "<tr><td width ='25%'>Yeast Cell</td>";
echo "</td><td><input type='text' name='line20' size='5' value ='$v20'></td></tr>";

echo "<tr><td width ='25%'>RBC Cells</td>";
echo "</td><td><input type='text' name='line21' size='5' value ='$v21'></td></tr>";

echo "<tr><td width ='25%'>TV Larvea</td>";
echo "</td><td><input type='text' name='line22' size='5' value ='$v22'></td></tr>";

echo "<!--tr><td width ='25%'>Deposits</td>";
 echo "</td><td><input type='text' name='line23' size='5' value ='$v23'></td></tr-->";
//------------End of Urine---------------
    

echo "</table>";

echo "<table>";
echo "<tr><td width ='25%' bgcolor ='black'><font color ='white'>NOTES</td>";
    echo "</td><td><textarea rows='6' cols='50' name='textarea4'>$v24</textarea><br></td></tr>";

    
}
echo "</table>";

