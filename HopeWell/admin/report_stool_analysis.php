<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>

<?php
$ref_nos =$_SESSION['ref_no'];
$test =$_SESSION['test'];
    
$sql2="SELECT * FROM  ranges WHERE invoice_no = '$ref_nos' and description ='$test'";

$result2 = mysql_query($sql2);
$found ='No';
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
   
   $med1_dx2 = $row['test1_result'];

  echo "<table><td width ='25' bgcolor ='Black'><font color ='white'>Report No:".$line;
   echo"</font></td></table>";
 
echo "<table width ='100%'>"; 
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'><font color ='red'><b>$description</font></b></td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Result</td><tr>";
echo "<tr><td width ='50%' bgcolor ='green'><font color ='yellow'><b>Macroscopic</font></b></td><td></td></tr>";

echo "<tr><td width ='25%'>Color</td>";
echo "</td><td><input type='text' name='line8_1' size='5' value ='$v1' readonly></td></tr>";

echo "<tr><td width ='25%'>Consistency</td>";
echo "</td><td><input type='text' name='line6_1' size='5' value ='$v2'></td></tr>";


echo "<tr><td width ='25%' bgcolor ='green'><font color ='yellow'><b>Microscopic</font></td>";
 echo "</td><td><textarea rows='5' cols='50%' name='textarea'>$med1_dx2</textarea></td></tr>";

            
    
    
    
}
echo "</table>";