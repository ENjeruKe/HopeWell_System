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
   $line8 =$_GET['line8'];
   $line9 =$_GET['line9'];
   $line10 =$_GET['line10'];
   $line11 =$_GET['line11'];
   $line12 =$_GET['line12'];
   $line13 =$_GET['line13'];
   $line14 =$_GET['line14'];
   $line15 =$_GET['line15'];
   $line16 =$_GET['line16'];
   $line17 =$_GET['line17'];
   $line18 =$_GET['line18'];
   
   $customer =$_SESSION['name'];
   $ref_nos =$_SESSION['ref_no'];
   $sex =$_SESSION['sex'];

   $mdate =date('y-m-d');

$query9= "INSERT INTO hosp_clinic (id,adm_no,name,ref,line8,line9,line10,line11,line12,line13,line14,line15,line16,line17,line18) VALUES ('','$adm_no','$customer','$ref_nos','$line8','$line9','$line10','$line11','$line12','$line13','$line14',
'$line15','$line16','$line17','$line18')"; 
  $result9 =mysql_query($query9);   
}

echo"<table width ='100%'>";
echo "<tr><td width ='5' bgcolor ='black'><font color ='white'>Pregnancy Order</td>";
echo "<td width ='5' bgcolor ='black'><font color ='white'>Year</td>";
echo "<td width ='5' bgcolor ='black'><font color ='white'>No of ANC attended</td>
<td width ='25' bgcolor ='black'><font color ='white'>Delivery Place</td>";

echo "<td width ='5' bgcolor ='black'><font color ='white'>Maturity</td>";
echo "<td width ='5' bgcolor ='black'><font color ='white'>Labour Duration</td>";
echo "<td width ='15' bgcolor ='black'><font color ='white'>Delivery type</td>";
echo "<td width ='10' bgcolor ='black'><font color ='white'>Birth Weigh</td>";
echo "<td width ='2' bgcolor ='black'><font color ='white'>Sex</td>";
echo "<td width ='15' bgcolor ='black'><font color ='white'>Outcome</td>";
echo "<td width ='10' bgcolor ='black'><font color ='white'>Puerperium</td><td bgcolor ='black'><font color ='white'>Action</td></tr>";
//-------------------------------------------------------------
echo"<tr>
<td><input type='text' size ='2' id ='line8' name='line8' value ='$line8'></td>
<td><input type='text' size ='5' id ='line9' name='line9' value ='$line9'></td>
<td><input type='text' size ='5' id ='line10' name='line10' value ='$line10'></td>
<td><input type='text' size ='20' id ='line11' name='line11' value ='$line11'></td>
<td><input type='text' size ='6' id ='line12' name='line12' value ='$line12'></td>
<td><input type='text' size ='6' id ='line13' name='line13' value ='$line13'></td>
<td><input type='text' size ='5' id ='line14' name='line14' value ='$line14'></td>
<td><input type='text' size ='2' id ='line15' name='line15' value ='$line15'></td>
<td><input type='text' size ='2' id ='line16' name='line16' value ='$line16'></td>
<td><input type='text' size ='10' id ='line17' name='line17' value ='$line17'></td>
<td><input type='text' size ='15' id ='line18' name='line18' value ='$line18'></td>
<td><input type='submit' name ='add_cancel' value ='Save'></td></tr>";




$query3 = "select * from hosp_clinic where adm_no ='$adm_no'";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$tot =0;
$i3 = 0;
while ($i3 < $num3)
      {
      $line8     = mysql_result($result3,$i3,"line8");  
      $line9     = mysql_result($result3,$i3,"line9");  
      $line10     = mysql_result($result3,$i3,"line10");  
      $line11     = mysql_result($result3,$i3,"line11");  
      $line12     = mysql_result($result3,$i3,"line12");  
      $line13     = mysql_result($result3,$i3,"line13");  
      $line14     = mysql_result($result3,$i3,"line14");  
      $line15     = mysql_result($result3,$i3,"line15");  
      $line16     = mysql_result($result3,$i3,"line16");  
      $line17     = mysql_result($result3,$i3,"line17");  
      $line18     = mysql_result($result3,$i3,"line18");  


      echo"<tr><td>$line8</td><td>$line9</td><td>$line10</td><td>$line11</td><td>$line12</td><td>$line13</td><td>$line14</td><td>$line15</td><td>$line16</td><td>$line17</td><td>$line18</td></tr>";


      $i3++;
      }
?>
</table>