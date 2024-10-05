<?php
   session_start();
?>
<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  require('open_database.php');
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<form action ='' method ='GET'>
<?php
$adm_no =$_SESSION['adm_no'];
echo 'File :'.$adm_no;
if (isset($_GET['add_cancel'])){  
   $line8 =$_GET['line26'];
   $line9 =$_GET['line27'];
   $line10 =$_GET['line28'];
   $line11 =$_GET['line29'];
   $line12 =$_GET['line30'];
   $line13 =$_GET['line31'];
   $line14 =$_GET['line32'];
   $line15 =$_GET['line33'];
   $line16 =$_GET['line34'];
   $line17 =$_GET['line35'];
   $line18 =$_GET['line36'];
   $line19 =$_GET['line37'];
   $line20 =$_GET['line38'];
   
   $customer =$_SESSION['name'];
   $ref_nos =$_SESSION['ref_no'];
   $sex =$_SESSION['sex'];

   $mdate =date('y-m-d');

$query9= "INSERT INTO hosp_clinic (id,adm_no,name,ref,line26,line27,line28,line29,line30,line31,line32,line33,line34,line35,line36,line37,line38) VALUES ('','$adm_no','$customer','$ref_nos','$line8','$line9','$line10','$line11','$line12','$line13','$line14',
'$line15','$line16','$line17','$line18','$line19','$line20')"; 
  $result9 =mysql_query($query9);   
}

echo"<table width ='100%'>";
echo "<tr><td width ='1%' bgcolor ='black'><font color ='white'>Date</td>";
echo "<td width ='1%' bgcolor ='black'><font color ='white'>Urine</td>";
echo "<td width ='1%' bgcolor ='black'><font color ='white'>Weight</td>
<td width ='1%' bgcolor ='black'><font color ='white'>B.P</td>";

echo "<td width ='1%' bgcolor ='black'><font color ='white'>H.b</td>";
echo "<td width ='1%' bgcolor ='black'><font color ='white'>Pallor</td>";
echo "<td width ='1%' bgcolor ='black'><font color ='white'>Maturity</td>";
echo "<td width ='1%' bgcolor ='black'><font color ='white'>Fundal Height</td>";
echo "<td width ='1%' bgcolor ='black'><font color ='white'>Sex</td>";
echo "<td width ='1%' bgcolor ='black'><font color ='white'>presentation</td>";
echo "<td width ='1%' bgcolor ='black'><font color ='white'>Lie</td>";
echo "<td width ='1%' bgcolor ='black'><font color ='white'>Foetal Heart</td>";
echo "<td width ='1%' bgcolor ='black'><font color ='white'>Foetal movt</td><td width ='1%' bgcolor ='black'><font color ='white'>Action</td></tr>";

echo"<tr>
<td><input type='text' size='6' id ='line26' name='line26' value ='$line26'></td>
<td><input type='text' size='7' id ='line27' name='line27' value ='$line27'></td>
<td><input type='text' size='8' id ='line28' name='line28' value ='$line28'></td>
<td><input type='text' size='6' id ='line29' name='line29' value ='$line29'></td>
<td><input type='text' size='4' id ='line30' name='line30' value ='$line30'></td>
<td><input type='text' size='8' id ='line31' name='line31' value ='$line31'></td>
<td><input type='text' size='5' id ='line32' name='line32' value ='$line32'></td>
<td><input type='text' size='6' id ='line33' name='line33' value ='$line33'></td>
<td><input type='text' size='6' id ='line34' name='line34' value ='$line34'></td>
<td><input type='text' size='7' id ='line35' name='line35' value ='$line35'></td>
<td><input type='text' size='9' id ='line36' name='line36' value ='$line36'></td>
<td><input type='text' size='5' id ='line37' name='line37' value ='$line37'></td>
<td><input type='text' size='6' id ='line38' name='line38' value ='$line38'></td><td><input type='submit' name ='add_cancel' value='Save'</td></tr>";



$query3 = "select * from hosp_clinic where adm_no ='$adm_no'";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$tot =0;
$i3 = 0;
while ($i3 < $num3)
      {
      $line8     = mysql_result($result3,$i3,"line26");  
      $line9     = mysql_result($result3,$i3,"line27");  
      $line10     = mysql_result($result3,$i3,"line28");  
      $line11     = mysql_result($result3,$i3,"line29");  
      $line12     = mysql_result($result3,$i3,"line30");  
      $line13     = mysql_result($result3,$i3,"line31");  
      $line14     = mysql_result($result3,$i3,"line32");  
      $line15     = mysql_result($result3,$i3,"line33");  
      $line16     = mysql_result($result3,$i3,"line34");  
      $line17     = mysql_result($result3,$i3,"line35");  
      $line18     = mysql_result($result3,$i3,"line36");  
      $line19     = mysql_result($result3,$i3,"line37");  
      $line20     = mysql_result($result3,$i3,"line38");  


      echo"<tr><td>$line8</td><td>$line9</td><td>$line10</td><td>$line11</td><td>$line12</td><td>$line13</td><td>$line14</td><td>$line15</td><td>$line16</td><td>$line17</td><td>$line18</td><td>$line19</td><td>$line20</td></tr>";


      $i3++;
      }
?>
</table>