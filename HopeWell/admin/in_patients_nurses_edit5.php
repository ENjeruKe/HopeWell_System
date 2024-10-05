<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>



<?php

if (isset($_GET['account3'])){ 
   $tooth = $_GET['account3'];
   $adm_no = $_GET['account'];
}


if (isset($_GET['accounts3']) OR isset($_GET['account3'])){    
   $check_date = date('y-md');
   if (isset($_GET['accounts3'])){
      $adm_no  = $_GET['accounts3'];
      $id_no  = $_GET['accounts'];
   }
   $_SESSION['id'] = $id_no;
   
   $SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   $query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   $results ='No';
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;



while ($i < $num)
//   while ($row=mysql_fetch_array($hasil)) 
      { 
      $id      = mysql_result($result,$i,"adm_no");          
      $doctor  = mysql_result($result,$i,"doctor");   
      $appointment = mysql_result($result,$i,"date");   
      $name        = mysql_result($result,$i,"name");   
      $date        = mysql_result($result,$i,"date");  
      $telephone   = mysql_result($result,$i,"description");  
      $status      = mysql_result($result,$i,"status");  
      $sex         = mysql_result($result,$i,"sex");
      $weight      = mysql_result($result,$i,"weight");
      $height      = mysql_result($result,$i,"height");
      $temp         = mysql_result($result,$i,"temp");
      $b_p         = mysql_result($result,$i,"b_p");
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"gl_account");  
      $textarea    = mysql_result($result,$i,"notes");  
      $ref_nos     = mysql_result($result,$i,"ref_no");  
      $time        = '';  
      $email       = '';  
      $image_id = ''; 
      $sign1       = mysql_result($result,$i,"sign1");  
      $sign2       = mysql_result($result,$i,"sign2"); 
      $sign3       = mysql_result($result,$i,"sign3"); 
      $sign4       = mysql_result($result,$i,"sign4"); 
      $sign5       = mysql_result($result,$i,"sign5"); 

     
      

      
      $_SESSION['med1_dx2'] = $drug1_dx2;
      $_SESSION['diag3'] = $diag3;
      $_SESSION['sign2'] = $sign2;
      $_SESSION['sign3'] = $sign3;
      $_SESSION['sign4'] = $sign4;
      $_SESSION['sign5'] = $sign5;
      $_SESSION['sex'] = $sex;
   $i++;
  }    
      

$query= "SELECT * FROM hosp_clinic where adm_no ='$id' and name ='$name' and line1<>''";
   $result =mysql_query($query);
   $num =mysql_numrows($result);
   $tot =0;
   $i = 0;
   $results ='No';
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
while ($i < $num)

   //while ($row=mysql_fetch_array($result)) 
      { 

   $line1 =mysql_result($result,$i,'line1');
   $line2 =mysql_result($result,$i,'line2');
   $line3 =mysql_result($result,$i,'line3');
   $line4 =mysql_result($result,$i,'line4');
   $line5 =mysql_result($result,$i,'line5');
   $line6 =mysql_result($result,$i,'line6');
   $line7 =mysql_result($result,$i,'line7');
   $line8 =mysql_result($result,$i,'line8');
   $line9 =mysql_result($result,$i,'line9');
   $line10 =mysql_result($result,$i,'line10');
   $line11 =mysql_result($result,$i,'line11');
   $line12 =mysql_result($result,$i,'line12');
   $line13 =mysql_result($result,$i,'line13');
   $line14 =mysql_result($result,$i,'line14');
   $line15 =mysql_result($result,$i,'line15');
   $line16 =mysql_result($result,$i,'line16');
   $line17 =mysql_result($result,$i,'line17');
   $line18 =mysql_result($result,$i,'line18');
   $line19 =mysql_result($result,$i,'line19');
   $line20 =mysql_result($result,$i,'line20');
   $line21 =mysql_result($result,$i,'line21');
   $line22 =mysql_result($result,$i,'line22');
   $line23 =mysql_result($result,$i,'line23');
   $line24 =mysql_result($result,$i,'line24');
   $line25 =mysql_result($result,$i,'line25');
   $line26 =mysql_result($result,$i,'line26');
   $line27 =mysql_result($result,$i,'line27');
   $line28 =mysql_result($result,$i,'line28');
   $line29 =mysql_result($result,$i,'line29');
   $line30 =mysql_result($result,$i,'line30');
   $line31 =mysql_result($result,$i,'line31');
   $line32 =mysql_result($result,$i,'line32');
   $line33 =mysql_result($result,$i,'line33');
   $line34 =mysql_result($result,$i,'line34');
   $line35 =mysql_result($result,$i,'line35');
   $line36 =mysql_result($result,$i,'line36');
   $line37 =mysql_result($result,$i,'line37');
   $line38 =mysql_result($result,$i,'line38');
   $line39 =mysql_result($result,$i,'line39');
   $line40 =mysql_result($result,$i,'line40');
   $line41 =mysql_result($result,$i,'line41');
   $line42 =mysql_result($result,$i,'line42');
   $line43 =mysql_result($result,$i,'line43');
   $line44 =mysql_result($result,$i,'line44');
   $line45 =mysql_result($result,$i,'line45');
   $line46 =mysql_result($result,$i,'line46');
   $line47 =mysql_result($result,$i,'line47');
   $line48 =mysql_result($result,$i,'line48');
   $line49 =mysql_result($result,$i,'line49');
   $line50 =mysql_result($result,$i,'line50');
   $line51 =mysql_result($result,$i,'line51');
   $line52 =mysql_result($result,$i,'line52');
   $line53 =mysql_result($result,$i,'line53');
   $line54 =mysql_result($result,$i,'line54');
   $line55 =mysql_result($result,$i,'line55');
   $line56 =mysql_result($result,$i,'line51');
   $line57 =mysql_result($result,$i,'line51');
   $line58 =mysql_result($result,$i,'line51');
   $line59 =mysql_result($result,$i,'line51');
   $line60 =mysql_result($result,$i,'line60');
   $line61 =mysql_result($result,$i,'line61');
   $line62 =mysql_result($result,$i,'line62');
   $line63 =mysql_result($result,$i,'line63');
   $line64 =mysql_result($result,$i,'line64');
   $line65 =mysql_result($result,$i,'line65');
   $line66 =mysql_result($result,$i,'line66');
   $line67 =mysql_result($result,$i,'line67');
   $line68 =mysql_result($result,$i,'line68');
   $line69 =mysql_result($result,$i,'line69');
   $line70 =mysql_result($result,$i,'line70');
   $line71 =mysql_result($result,$i,'line71');
   $line72 =mysql_result($result,$i,'line72');
   $line73 =mysql_result($result,$i,'line73');
   $line74 =mysql_result($result,$i,'line74');
   $line75 =mysql_result($result,$i,'line75');
   $line76 =mysql_result($result,$i,'line76');
   $line77 =mysql_result($result,$i,'line77');
   $line78 =mysql_result($result,$i,'line78');
   $line79 =mysql_result($result,$i,'line79');
   $line80 =mysql_result($result,$i,'line80');
   $line81 =mysql_result($result,$i,'line81');
   $line82 =mysql_result($result,$i,'line82');
   $line83 =mysql_result($result,$i,'line83');
   $line84 =mysql_result($result,$i,'line84');
   $line85 =mysql_result($result,$i,'line85');
   $line86 =mysql_result($result,$i,'line86');
   $line87 =mysql_result($result,$i,'line87');
   $line88 =mysql_result($result,$i,'line88');
   $line89 =mysql_result($result,$i,'line89');
   $line90 =mysql_result($result,$i,'line90');
   $line91 =mysql_result($result,$i,'line91');
   $line92 =mysql_result($result,$i,'line92');
   $line93 =mysql_result($result,$i,'line93');
   $line94 =mysql_result($result,$i,'line94');
   $line95 =mysql_result($result,$i,'line95');
   $line96 =mysql_result($result,$i,'line96');
   $line97 =mysql_result($result,$i,'line97');
   $line98 =mysql_result($result,$i,'line98');
   $line99 =mysql_result($result,$i,'line99');
   $line100 =mysql_result($result,$i,'line100');
   $line101 =mysql_result($result,$i,'line101');
   $line102 =mysql_result($result,$i,'line102');
   $line103 =mysql_result($result,$i,'line103');
   $line104 =mysql_result($result,$i,'line104');
   $line105 =mysql_result($result,$i,'line105');
   $line106 =mysql_result($result,$i,'line106');
   $line107 =mysql_result($result,$i,'line107');
   $line108 =mysql_result($result,$i,'line108');
   $line109 =mysql_result($result,$i,'line109');
   $line110 =mysql_result($result,$i,'line110');     
   $i++;
}



   //}
   //get information from medicalfile
   //--------------------------------


}

?>



<!DOCTYPE html>
<html>
<title>HMIS Global | Paltech System Consultants</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"-->
<head>




<!-- boot traps here -->


<!--script type='text/javascript'
  src='http://code.jquery.com/jquery-2.0.2.js'></script>
<link rel="stylesheet" type="text/css"
  href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<script type='text/javascript'
  src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css"
  href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css"-->


<style type='text/css'>
.panel-heading a:after {<!--   w w  w .  j a v a  2 s  . c  o m-->
  font-family: 'Glyphicons Halflings';
  content: "\e114";
  float: right;
  color: grey;
}

.panel-heading a.collapsed:after {
  content: "\e00";
}
</style>
<!-- End of boot trap -->



<body>
<!--div class="w3-container w3-teal">
  <h1>Update Triage Form | <font color ='yellow'>HMIS</font></h1>
</div>
<div class="w3-container"-->










<script language="javascript" type="text/javascript">
var newwindow;
function popitup22(url) {
	newwindow=window.open(url,'newwindow','height=300,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>


<script language="javascript" type="text/javascript">
var newwindow;
function popcontact505(url) {
	newwindow=window.open(url,'newwindow','height=300,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>

<script language="javascript" type="text/javascript">
var newwindow;
function popcontact3(url) {
	newwindow=window.open(url,'newwindow','height=300,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>



<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/bills-pop-up.js"></script>

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php









if (isset($_GET['refresh'])){
   $date = date('y/m/d');
}

?>







<script>
function myFunction() {
    var no = document.getElementById('no').value;   
    alert(no); 

    var txt = document.getElementById('amount').value;

    alert(txt); 

    //var option = no.options[no.selectedIndex].text;

    txt2 = txt * no;
    document.getElementById("result2").value = txt2;
}
</script>











<script>
function showUser(str) { 
    var txt = document.getElementById('drugs4').value;
    if (str == "") {
        document.getElementById("drugs4").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("drugs4").innerHTML = xmlhttp.responseText;
            }
        };

        //xmlhttp.open("GET","get_level.php?q="+str,true);
        //xmlhttp.send();
    }
}
</script>

















<script>
function function3() {
    var no = document.getElementById('no_three').value;   
    var txt = document.getElementById('amount_three').value;
    txt2 = txt * no;
    document.getElementById("result_three").value = txt2;
}
</script>

<script>
function function4() {
    var no = document.getElementById('no_4').value;   
    var txt = document.getElementById('amount_4').value;
    txt2 = txt * no;
    document.getElementById("result_4").value = txt2;
}
</script>

<script>
function function2() {
    var no = document.getElementById('no_two').value;   
    alert(no); 
    var txt = document.getElementById('amount_two').value;
    alert(txt); 
    txt2 = txt * no;
    document.getElementById("result_two").value = txt2;
}
</script>

<script>
function function1() {
 alert('here');
    var no = document.getElementById('no_one').value;   
    var txt = document.getElementById('amount_one').value;
    txt2 = txt * no;
    document.getElementById("result_one").value = txt2;
}
</script>












<!--body background="images/background.jpg"-->
<body>









<div style="width: 100%;">
   <!--div style="float:left; width: 60%"-->

<form action ="patients_register_nurses.php" method ="GET">
<?php


$company_identity =$company_identity; 
$cdquery="SELECT client_id,patients_name FROM clients";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
$date = date('y-m-d');
//<td>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////

echo"<table width ='100%' height ='100%' border ='0'><font color ='blue'>";
echo"<tr><td width ='10%'><b>Pay A/c:</b></td><td width='40%' align='left'><input type='text' id ='payer' name='payer' value='$payer' size='50' readonly></td><td width ='10%'><b>Ref:</b></td><td width='10%' align='left'><input type='text' id ='ref_no' name='ref_no' value='$ref_nos' size='9' readonly>";
echo"</td>";
echo"<td width ='20%'><p align ='right'><a href=javascript:popcontact505('view_labresult.php?accounts3=$ref_nos')><b>View results</b></a></p></tr></table>";
echo"<font color ='red'><b><hr></b></font>";

echo"<table width ='100%'>";

echo"<tr><td width ='5%'><b>ID:</b></td><td width='20%' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='10' readonly></td><td width ='10%'><b>Name:</b></td><td width='20%' align='left'><input type='text' id ='customer' name='customer'
value ='$name' size='42' readonly></td><td width ='10%'></td><td width ='20%'></td></tr>";
echo"<tr><td width ='10%'><b>Age.</td><td width='20%' align='left'><input type='text' id ='age' name='age'  
 value='$age' size='10' readonly></td><td width ='10%'><b>Sex</td><td width='20%' align='left'><input type='text' id ='sex' name='sex'  
 value='$sex' size='10' readonly></td><td width ='10%'><b>Weight:</b></td><td width='20%' align='left'><input type='text' id ='weight' name='weight' size='10' value='$weight' ></td></tr>";

echo"<tr><td width ='10%'><b>Temp.</td><td width='20%' align='left'><input type='text' id ='temp' name='temp' size='10' value='$temp' ></td><td width ='10%'><b>B.P</td><td width='20%' align='left'><input type='text' id ='b_p' name='b_p'  
 size='10' value='$b_p'></td><td width ='10%'><b>P/R</td><td width='20%' align='left'><input type='text' id ='height' name='height'  
 value='$height' size='10' ></td></tr></table><br>";
echo"<hr>";


//echo"<OBJECT data='auto_display.php' type='text/html' style='margin: 0; width: 100%; height: 100px; padding 0px; text-align:left;'></OBJECT>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_1.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo"<table width='100%'><td width='30%'>";
echo"<a href=javascript:popcontact7('doc_window_19.php?accounts=$adm_no&accounts3=$ref_nos')><img src='investigate.jpg' alt='scan' style='width:60%'></a></td><td width='30%'>";
echo"<a href=javascript:popcontact7('doc_window_21.php?accounts=$adm_no&accounts3=$ref_nos')><img src='medication.jpg' alt='scan' style='width:60%'></a></td><td width='30%'>";
echo"<a href=javascript:popcontact7('doc_window_23.php?accounts=$adm_no&accounts3=$ref_nos')><img src='folloup.jpg' alt='scan' style='width:60%'></a></td><td width='30%'></td><table>";












echo"<b>MEDICAL AND SURGICAL HISTORY</b><br>";

echo"<br><br>";

echo"<table width ='100%'>";
echo"<tr><td width ='33%'>Surgical Operation     :<input type='text' id ='line1' name='line1' value ='$line1'></td>
<td width ='33%'>Diabetes :<input type='text' id ='line2' name='line2' value ='$line2'></td>
<td width ='33%'>Hypertension :<input type='text' id ='line3' name='line3' value ='$line3'></tr></table>";

echo"<table width ='100%'>";
echo"<tr><td width ='50%'>Blood Transfusion     :<input type='text' id ='line4' name='line4' value ='$line4'></td><td width ='50%'>Tuberculosis :<input type='text' id ='line5' name='line5' value ='$line5'></td></tr>";
echo"<tr><td width ='5%'><b><u>Family History :</u></b></td></tr><tr><td width ='33%'>Twins:<input type='text' id ='line6' name='line6' value ='$line6'></td>
<td width ='33%'>Tuberculosis :<input type='text' id ='line7' name='line7' value ='$line7'></td></tr></table>";

echo"<table width ='100%'>";
echo"<table width ='100%'>";
echo "<tr><td width ='100%' bgcolor ='green'><font color ='yellow'><center>Previous Pregnancy</center></td><tr></table>";

//------------------------------------------------------------
//--------------------------------------------------------------
echo"<OBJECT data='Add_prev_pregnacies.php' type='text/html' style='margin: 0; width: 100%; height: 150px; padding 0px; text-align:left;'></OBJECT>";

//-------------------------------------------------------End---
echo"<br><b><font color ='green'>PHYSICAL EXAMINATION (First Visit)</b><br>";

echo"<br>";

echo"<table width ='100%'>";
echo"<tr><td width ='50%'>General  :<input type='text' id ='line19' name='line19' value ='$line19'></td></tr>
<tr><td width ='50%'>CVS :<input type='text' id ='line20' name='line20' value ='$line20'></td>
<td width ='50%'>Resp. :<input type='text' id ='line21' name='line21' value ='$line21'></tr></table>";

echo"<table width ='100%'>";
echo"<tr><td width ='50%'>Breasts :<input type='text' id ='line22' name='line22' value ='$line22'></td><td width ='50%'>Abdomen :<input type='text' id ='line23' name='line23' value ='$line23'></td></tr>";
echo"<tr><td width ='50%'>Vaginal Examination:<input type='text' id ='line24' name='line24' value ='$line24'></td><td width ='50%'>Discharge/GUD :<input type='text' id ='line25' name='line25' value ='$line25'></td></tr></table>";



echo"<br><br>";


echo"<table width ='100%'>";
echo "<tr><td width ='100%' bgcolor ='green'><font color ='yellow'><center>Present Pregnancy</center></td><tr></table>";
//------------------------------------------------------------
//--------------------------------------------------------------
echo"<OBJECT data='Add_pres_pregnacies.php' type='text/html' style='margin: 0; width: 100%; height: 150px; padding 0px; text-align:left;'></OBJECT>";

//-------------------------------------------------------End---



echo"<table>";
echo"<tr><td><font color ='blue'>To Display inserted data................</td></tr>";
echo"</table>";

echo"<br><br>";


echo"<table>";
echo"<tr><td><textarea rows='3' cols='100' id='line39' name='line39'>$line39</textarea></td></tr>";
echo"</table><br><br>";



echo"<table><br><b><font color ='Orange'><center>POST NATAL CARE</b></centre></table><br>";



echo"<br><b><font color ='Blue'>Delivery</b><br>";



echo"<table width ='100%'>";
echo"<tr><td width ='33%'>Pregnancy Duration :<input type='text' id ='line40' name='line40' value ='$line40'>Weeks</td>

<td width ='33%'>Mode of Delivery :<input type='text' id ='line41' name='line41' value ='$line41'></td>
<td width ='33%'>Date :<input type='text' id ='line42' name='line42' value ='$line42'></tr></table>";

echo"<table width ='100%'>";
echo"<tr><td width ='50%'>Blood Loss(Light/Medium/Heavy):<input type='text' id ='line43' name='line43' value ='$line43'></td>

<td width ='50%'>Condition Of Mother :<input type='text' id ='line44' name='line44' value ='$line44'></td></tr>";


echo"<tr><td width ='20%'>Apgar score 1 min<input type='text' id ='line45' name='line45' value ='$line45'></td>
<td width ='20%'>5 min :<input type='text' id ='line46' name='line46' value ='$line46'></td></td>
<td width ='20%'>10 min :<input type='text' id ='line47' name='line47' value ='$line47'></td>
</tr></table>";

echo"<table width ='100%'>";
echo"<tr><td width ='25%'>Drug Administer : Mother <input type='text' id ='line48' name='line48' value ='$line48'>Oxytocin/Ergometrine</td>

<td width ='10%'><input type='text' id ='line49' name='line49' value ='$line49'>AZT+NVP</td>
<td width ='10%'><input type='text' id ='line50' name='line50' value ='$line50'>NVP</td></tr></table>";


echo"<table width ='100%'>";
echo"<tr><td width ='30%'>Baby <input type='text' id ='line51' name='line51' value ='$line51'>Vitamin A</td>

<td width ='15%'><input type='text' id ='line52' name='line52' value ='$line52'>AZT+NVP</td>
<td width ='10%'><input type='text' id ='line53' name='line53' value ='$line53'>NVP</td>
<td width ='10%'><input type='text' id ='line41' name='line54' value ='$line54'>Vit K</td>
<td width ='10%'><input type='text' id ='line42' name='line55' value ='$line55'>TEO</td></tr></table>";


echo"<table width ='100%'>";
echo"<tr><td width ='33%'>Place of Delivery: Health Facility<input type='text' id ='line56' name='line56' value ='$line56'></td>

<td width ='33%'>Home :<input type='text' id ='line57' name='line57' value ='$line57'></td>
<td width ='33%'>Other(Specify) :<input type='text' id ='line58' name='line58' value ='$line58'></tr></table>";


echo"<table width ='100%'>";
echo"<tr><td width ='33%'>Conducted By: Nurse<input type='text' id ='line59' name='line59' value ='$line59'></td>

<td width ='33%'>Clinical Officer :<input type='text' id ='line60' name='line60' value ='$line60'></td>
<td width ='33%'>Doctor :<input type='text' id ='line61' name='line61' value ='$line61'></tr></table>";

echo"<table width ='100%'>";
echo"<tr><td width ='33%'>Others<input type='text' id ='line62' name='line62' value ='$line62'></td>
</tr></table>";



echo"<table><br><b><font color ='Green'><center>POST NATAL EXAMINATION</b></centre></table><br>";
$adm_no =$_SESSION['adm_no'];
$sex =$_SESSION['sex'];
$date =$_SESSION['date'];
//$adm_no =$_SESSION['id'];
//--------------------------------------------------------------
echo"<td><center><a href=javascript:popcontact7('postnatalcare.php?accounts=$adm_no&accounts3=$ref_nos')><img src='postnatal.jpg' alt='scan' style='width:30%'></a></td><td width='30%'></center></td><table>";

//-------------------------------------------------------End---


echo"<table><br><b><font color ='Green'><center>Cancer Screening</b></centre></table><br><br>";


echo"<table width ='100%'>";
echo "<tr><td width ='20%' bgcolor ='black'><font color ='white'>Date</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Examination</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Test</td>";
echo "<td width ='20%' bgcolor ='black'><font color ='white'>Results</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Remarks</td>";

echo"<tr><td><input type='text' id ='line87' name='line87' value ='$line87'></td>
<td>Cervix</td>
<td>VIA/VILI</td>
<td><input type='text' id ='line88' name='line88' value ='$line88'></td>
<td><input type='text' id ='line89' name='line89' value ='$line89'></td></tr>";

echo"<tr><td><input type='text' id ='line90' name='line90' value ='$line90'></td>
<td><input type='text' id ='line91' name='line91' value ='$line91'></td>
<td>PAP Smear</td>
<td><input type='text' id ='line92' name='line92' value ='$line92'></td>
<td><input type='text' id ='line93' name='line93' value ='$line93'></td></tr>";
echo"<tr><td><input type='text' id ='line94' name='line94' value ='$line94'></td>
<td>Breast</td>
<td><input type='text' id ='line95' name='line95' value ='$line95'></td>
<td><input type='text' id ='line96' name='line96' value ='$line96'></td>
<td><input type='text' id ='line97' name='line97' value ='$line97'></td></tr>";






echo"<br>";

echo"<table><td>";
echo"<b>Send To:</td><td width='30' align='left'>";
echo"<select id ='status' name='status' required>";
echo"<option value=''></option>";
echo"<option value='To Pharmacy'>To Pharmacy</option>";
echo"<option value='To cash office'>To cash office</option>";
echo"<option value='To Triage'>To Triage</option>";
echo"<option value='To Laboratory'>To Laboratory</option>";
echo"<option value='To Doctor'>To Doctor</option>";
echo"<option value='To Radiology'>To Radiology</option>";
echo"<option value='To Nutriton'>To Nutriton</option>";
echo"<option value='To WBC'>To WBC</option>";
echo"<option value='To Dental'>To Dental</option>";
echo"<option value='To Antenatal'>To Antenatal</option>";
echo"<option value='To Ward'>To Ward</option>";
echo"<option value='Completed'>Completed</option>";
echo"</select></td>";
echo"<td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Changes'></td></table>";








//echo"<b>Signs & Symptoms</h3><br>";
//echo"<OBJECT data='auto_search_signs.php' type='text/html' style='margin: 0; width: 550px; height: 150px; padding 0px; text-align:left;'></OBJECT>";








?>


<br><br>
</div>


<div style="float:right;">
 <!--div style="float:left; width: 70%"-->

<p align ='centre'></p>



<!--h2>Admission Details</h2-->
<?php
//echo"<table width ='100%' border ='0'><td width ='200' align ='left'><h3>Med.Test Request</h3></td><td width ='100' align ='center'>";
//Open it for wama





//----------------
//if ($results =='Yes'){
   //echo"<a href=javascript:popcontact505('view_labresult.php?accounts3=$ref_nos')><b>View results</b></a></td>";
//echo"<td width ='100' align ='center'><a //href=javascript:popcontact505('view_scans.php?accounts3=
//$ref_nos')><b>View Scans</b></a></td>";
//}else{
//   echo"<td width ='100' align ='center'><b><font color 
//='red'>Results NOT ready</b></td></font>";
//}

//}";
?>


<!--p align ='centre'></p-->
<?php
$_SESSION['adm_no']= $adm_no;
$_SESSION['name']= $name;
$_SESSION['ref_no']= $ref_nos;
?>





<img src='images/black.jpg' alt='scan' style='width:40%'>


<!--OBJECT data='auto_search2.php' type='text/html' style='margin: 0; width: 390px; height: 200px; padding 0px; text-align:left;'></OBJECT-->


<!--OBJECT data='charged_drugs.php' type='text/html' style='margin: 0; width: 350px; height: 200px; padding 0px; text-align:left;'></OBJECT-->




<?php
$_SESSION['adm_no']= $adm_no;
//echo"<h5>LIST OF VISITS ||";

//require('list_visits.php');

?>







<p align ='centre'>
<!--table align='center'><td align ='center'-->
<?php
//$ids ="uploads".'/'.$id.'s.jpg';
$ids ="uploads".'/'.$image_id.'s.jpg';

//echo $ids;

//echo"<img src=$ids alt='scan' style='width:100%'>";
?>









</p>
   </div>
   
   
</div>
<div style="clear:both"></div>
</form>











</div>
<div class="w3-container w3-teal">






  <!--p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p-->
</div>

</body>
</html>


