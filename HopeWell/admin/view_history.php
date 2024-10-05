<?php
 session_start();
require('open_database.php');
$location = $_SESSION['company'];
$username =$_SESSION['username'];
?>
<html>
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/bills-pop-up.js"></script>

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


<?php

echo "<table width ='100%' width ='1'>
<tr>
<!--th width ='10' bgcolor ='black'><font color ='white'>ID</th-->
<th width ='10%' bgcolor ='black' align ='left'><font color ='white'>Date</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Temp</th>
<th width ='10%' bgcolor ='black'><font color ='white'>BP1</th>
<th width ='10%' bgcolor ='black'><font color ='white'>BP2</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Weight</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Pulse</th>
<th width ='20%' bgcolor ='black'><font color ='white'>History</th>
<th width ='20%' bgcolor ='black'><font color ='white'>Phy.Exam</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Diagnosis</th>
<th width ='20%' bgcolor ='black'><font color ='white'>Prescription</th>
</tr>";

$adm_no =$_GET['accounts'];

$sql3s="SELECT * FROM newprescription WHERE PatId ='$adm_no'";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;

while ($i3s < $num3s)
      {
$notes = '';
    $ref_no     = mysql_result($result3s,$i3s,"PrescId"); 
    $d1      = mysql_result($result3s,$i3s,"transDate"); 
    $d2    = mysql_result($result3s,$i3s,"Temp"); 
    $d3     = mysql_result($result3s,$i3s,"Bp1"); 
    $d4     = mysql_result($result3s,$i3s,"Bp2"); 
    $d5     = mysql_result($result3s,$i3s,"Weight"); 
    $d6     = mysql_result($result3s,$i3s,"PulseRate"); 
    $d7     = mysql_result($result3s,$i3s,"History"); 
    $d8     = mysql_result($result3s,$i3s,"PhyExam"); 
    $d9     = mysql_result($result3s,$i3s,"Diagnosis"); 
    $d10     = mysql_result($result3s,$i3s,"Prescription"); 
    
    

    echo "<tr>";
    echo "<td width ='10%'>" . $d1. "</td>";
    echo "<td width ='10%' align ='right'>".  $d2. "</td>";
    echo "<td width ='10%' align ='right'>".$d3."</td>";
    echo "<td width ='10%' align ='right'>".  $d4. "</td>";
    echo "<td width ='10%' align ='right'>".  $d5. "</td>";
    echo "<td width ='10%' align ='right'>".  $d6. "</td>";
    echo "<td width ='20%' align ='right'>".  $d7. "</td>";
    echo "<td width ='20%' align ='right'>".  $d8. "</td>";
    echo "<td width ='10%' align ='right'>".  $d9. "</td>";
    echo "<td width ='20%' align ='right'>".  $d10. "</td>";
    
    echo "</tr><tr>
<!--th width ='10' bgcolor ='black'><font color ='white'></th-->
<th width ='10%' bgcolor ='black' align ='left'><font color ='white'></th>
<th width ='10%' bgcolor ='black'><font color ='white'></th>
<th width ='10%' bgcolor ='black'><font color ='white'></th>
<th width ='10%' bgcolor ='black'><font color ='white'></th>
<th width ='10%' bgcolor ='black'><font color ='white'></th>
<th width ='10%' bgcolor ='black'><font color ='white'></th>
<th width ='20%' bgcolor ='black'><font color ='white'></th>
<th width ='20%' bgcolor ='black'><font color ='white'></th>
<th width ='10%' bgcolor ='black'><font color ='white'></th>
<th width ='20%' bgcolor ='black'><font color ='white'></th>
</tr>";

    
$i3s++;
}
echo "</table>";
?>
</html>