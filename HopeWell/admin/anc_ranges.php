<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>


<form action ="anc_ranges.php" method ="GET">

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

   $v1  = $_GET['line1'];
   $v2   = $_GET['line2'];
   $v3  = $_GET['line3'];
   
   $v4    = $_GET['line4'];
   $v5  = $_GET['line5'];
   $v6    = $_GET['line6'];
   
   $v7 = $_GET['line7'];
   $v8  = $_GET['line8'];
   $v9   = $_GET['line9'];
   
   $v10  = $_GET['line10'];
   $v11    = $_GET['line11'];
   $v12  = $_GET['line12'];
   
   $v13    = $_GET['line13'];
   $v14 = $_GET['line14'];
   $v15  = $_GET['line15'];
   
   $v16   = $_GET['line16'];
   $v17  = $_GET['line17'];
   $v18    = $_GET['line18'];
   
   $v19  = $_GET['line19'];
   $v20    = $_GET['line20'];
   $v21 = $_GET['line21'];
   
   $v22  = $_GET['line22'];
   $v23   = $_GET['line23'];
   
   $v24  = $_GET['textarea4'];
   
   
   //$v25    = $_GET['line9'];
   //$v26  = $_GET['line10'];
   //$v27    = $_GET['line11'];
   //$v28 = $_GET['line12'];
   //$v29  = $_GET['line13'];
   //$v30    = $_GET['line14'];
   //$v31  = $_GET['line15'];
   //$v32    = $_GET['line16'];
   //$v33 = $_GET['line17'];























$topay = $price*$qty;
   $show_it ='Yes';

$description=$description;


$query= "UPDATE ranges set line1 ='$line1',line2='$line2'
,v1 ='$v1',v2 ='$v2',v3 ='$v3',v4 ='$v4',v5 ='$v5'
,v6 ='$v6',v7 ='$v7',v8 ='$v8',v9 ='$v9',v10 ='$v10',v11 ='$v11'
,v12 ='$v12',v13 ='$v13',v14 ='$v14',v15 ='$v15',v16 ='$v16'
,v17 ='$v17',v18 ='$v18',v19 ='$v19',v20 ='$v20',v21 ='$v21'
,v22 ='$v22',v23 ='$v23',v24 ='$v24' where description='$desc' and date='$date' and line_no ='$adm_no'" or die(mysql_error());
$result =mysql_query($query);  
// description='$desc' and date='$date' and line_no ='$adm_no'
 
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
   //$query3 = "SELECT * FROM  auto_transact WHERE id = '$id'";
   $query3 = "SELECT * FROM  ranges WHERE id = '$id'";
}else{
//$query3 = "SELECT * FROM  auto_transact_inv WHERE id = '$id'";
   $query3 = "SELECT * FROM  ranges WHERE id = '$id'";

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
$sql="SELECT * FROM  ranges WHERE id = '$id'";
}else{
   //$sql="SELECT * FROM  auto_transact_inv WHERE id = '$id'";
$sql="SELECT * FROM  ranges WHERE id = '$id'";
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
echo "<tr><td width ='25%'></td>";
echo "</td><td><input type='hidden' name='idnos' size='10' value ='$id'></td></tr>";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>Test</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Result</td>";
echo "<!--td width ='10%' bgcolor ='black'><font color ='white'>Ranges(M)</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Ranges(F)</td></tr-->";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>$description</td><td></td><td></td><td></td></tr>";

echo "<tr><td width ='25%'>Blood Group</td>";
echo "</td><td><input type='text' name='line1' size='5' value =''></td></tr>";

echo "<tr><td width ='25%'>Hb</td>";
echo "</td><td><input type='text' name='line2' size='5' value =''></td></tr>";

echo "<tr><td width ='25%'>Platelat Count</td>";
    echo "</td><td><input type='text' name='line3' size='5' value =''></td></tr>";
    
echo "<tr><td width ='25%'>VDRL</td>";
    echo "</td><td><input type='text' name='line4' size='5' value =''></td></tr>";
        
    echo "<tr><td width ='25%'><b>Urinalysis</b></td><td></td></tr>";
    
    
    //Now include Urine analysis parameters
    //-------------------------------------

echo "<tr><td width ='50%' bgcolor ='green'><font color ='white'><b>Macroscopic</b></td><td></td></tr>";

echo "<tr><td width ='25%'>Color</td>";
echo "</td><td><input type='text' name='line15' size='5' value =''></td></tr>";

echo "<tr><td width ='25%' >Appearance</td>";
echo "</td><td><input type='text' name='line16' size='5' value =''></td></tr>";


echo "<tr><td width ='50%' bgcolor ='green'><font color ='white'><b>Urine Chemistry</b></td><td></td></tr>";

    echo "<tr><td width ='50%'>Glucose</td>";
echo "</td><td><input type='text' name='line5' size='5' value =''></td></tr>";


echo "<tr><td width ='25%'>Bilirubin</td>";
    echo "</td><td><input type='text' name='line6' size='5' value =''></td></tr>";

    echo "<tr><td width ='25%'>Ketone</td>";
    echo "</td><td><input type='text' name='line7' size='5' value =''></td></tr>";

echo "<tr><td width ='25%'>Sp. Gravity</td>";
    echo "</td><td><input type='text' name='line8' size='5' value =''></td><td></tr>";
    
    echo "<tr><td width ='25%'>Blood</td>";
    echo "</td><td><input type='text' name='line9' size='5' value =''></td></tr>";

    echo "<tr><td width ='25%'>PH</td>";
    echo "</td><td><input type='text' name='line10' size='5' value =''></td></tr>";

    echo "<tr><td width ='25%'>Protein</td>";
    echo "</td><td><input type='text' name='line11' size='5' value =''></td></tr>";



echo "<tr><td width ='50%'>Urobilinogen</td>";
echo "</td><td><input type='text' name='line12' size='5' value =''></td></tr>";


    echo "<tr><td width ='25%'>Nitrate</td>";
   echo "</td><td><input type='text' name='line13' size='5' value =''></td></tr>";
   
   echo "<tr><td width ='25%'>Leucocytes</td>";
   echo "</td><td><input type='text' name='line14' size='5' value =''></td></tr>";
   


echo "<tr><td width ='50%' bgcolor ='green'><font color ='white'><b>Microscopic</b></td><td></td></tr>";

echo "<!--tr><td width ='25%' bgcolor ='blue'><font color ='yellow'>Volume</td>";
echo "</td><td><input type='text' name='line17' size='5' value =''></td></tr-->";


echo "<tr><td width ='25%'>Pus Cells</td>";
    echo "</td><td><input type='text' name='line18' size='5' value =''></td></tr>";

echo "<tr><td width ='25%'>Eptherial</td>";
    echo "</td><td><input type='text' name='line19' size='5' value =''></td></tr>";

echo "<tr><td width ='25%'>Yeast Cell</td>";
echo "</td><td><input type='text' name='line20' size='5' value =''></td></tr>";

echo "<tr><td width ='25%'>RBC Cells</td>";
echo "</td><td><input type='text' name='line21' size='5' value =''></td></tr>";

echo "<tr><td width ='25%'>TV Larvea</td>";
echo "</td><td><input type='text' name='line22' size='5' value =''></td></tr>";

echo "<!--tr><td width ='25%'>Deposits</td>";
 echo "</td><td><input type='text' name='line23' size='5' value =''></td></tr-->";
//------------End of Urine---------------
    
}
echo "</table>";

echo "<table>";
echo "<tr><td width ='25%' bgcolor ='black'><font color ='white'>NOTES</td>";
    echo "</td><td><textarea rows='6' cols='50' name='textarea4'>$sign4</textarea><br></td></tr>";

echo "</table>";
echo"<br><br>";


$ref_nos =$_SESSION['ref_nos'];
//echo 'Ref No:'. $ref_nos;
$total = 0;

echo"</h3>";


echo"<table><td width ='20'><input type='submit' name='save_cancel'  class='button' value='Save'></td></table>";

