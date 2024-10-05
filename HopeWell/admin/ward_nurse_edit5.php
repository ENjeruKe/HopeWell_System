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
   
   $SQL= "SELECT * FROM nurses where id ='$id_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   $query= "SELECT * FROM nurses where id ='$id_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   $results ='No';
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

while ($i < $num)
   //while ($row=mysql_fetch_array($hasil)) 
      { 
      $id      = mysql_result($result,$i,"adm_no");          
  //    $doctor  = mysql_result($result,$i,"doctor");   
      $appointment = mysql_result($result,$i,"date");   
      $name        = mysql_result($result,$i,"name");   
      $date        = mysql_result($result,$i,"date");  
   //   $telephone   = mysql_result($result,$i,"description");  
      $status      = mysql_result($result,$i,"status");  
      $sex         = mysql_result($result,$i,"sex");
    //  $weight      = mysql_result($result,$i,"weight");
    //  $height      = mysql_result($result,$i,"height");
    //  $temp         = mysql_result($result,$i,"temp");
     // $b_p         = mysql_result($result,$i,"b_p");
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"payer");  
     // $textarea    = mysql_result($result,$i,"notes");  
      $ref_nos     = mysql_result($result,$i,"ref");  
      $time        = '';  
      $email       = '';  
      $image_id = ''; 
  
      
      
      $_SESSION['med1_dx2'] = $drug1_dx2;
      $_SESSION['diag3'] = $diag3;
      $_SESSION['sign2'] = $sign2;
      $_SESSION['sign3'] = $sign3;
      $_SESSION['sign4'] = $sign4;
      $_SESSION['sign5'] = $sign5;
      
      $i++;
      
           }

$query= "SELECT * FROM nurses where adm_no ='$id' and name ='$name'";
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

//   $line1 =mysql_result($result,$i,'line1');
//   $line2 =mysql_result($result,$i,'line2');
//   $line3 =mysql_result($result,$i,'line3');
//   $line4 =mysql_result($result,$i,'line4');
//   $line5 =mysql_result($result,$i,'line5');
//   $line6 =mysql_result($result,$i,'line6');
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
function bmi() {
    var d = document.getElementById('height').value;
    var n = document.getElementById('weight').value;
    alert(n);

    txt2 = n/d*d;
    document.getElementById("bmi").value = txt2;
}
</script>



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

<form action ="admitted_patients_register_doctor.php" method ="GET">



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
 value='$sex' size='10' readonly></td><td width ='10%'><b>Weight:</b></td><td width='20%' align='left'><input type='text' id ='weight' name='weight' size='10' value='$weight' onchange='bmi()'></td></tr>";

echo"<tr><td width ='10%'><b>Temp.</td><td width='20%' align='left'><input type='text' id ='temp' name='temp' size='10' value='$temp' ></td><td width ='10%'><b>B.P</td><td width='20%' align='left'><input type='text' id ='b_p' name='b_p'  
 size='10' value='$b_p'></td><td width ='10%'><b>Height</td><td width='20%' align='left'><input type='text' id ='height' name='height'  
 value='$height' size='10' onchange='bmi()'></td><td width ='10%'><b>BMI</td><td width='20%' align='left'><input type='text' id ='bmi' name='bmi'  
  size='10' ></td></tr></table><br>";
echo"<hr>";

echo"<table width='100%'><td width='30%'>";
echo"<a href=javascript:popcontact7('doc_window_19.php?accounts=$adm_no&accounts3=$ref_nos')><img src='investigate.jpg' alt='scan' style='width:60%'></a></td><td width='30%'>";
echo"<a href=javascript:popcontact7('doc_window_21.php?accounts=$adm_no&accounts3=$ref_nos')><img src='medication.jpg' alt='scan' style='width:60%'></a></td><td width='30%'>";
echo"<a href=javascript:popcontact7('doc_window_23.php?accounts=$adm_no&accounts3=$ref_nos')><img src='folloup.jpg' alt='scan' style='width:60%'></a></td><td width='30%'></td><table>";






echo"<table>";





echo"<br><br>";

echo"<font color ='Orange'>ASSESSMENT DATA";

echo"<br><br>";



echo"<table width ='100%'>";
echo "<tr><td width ='100%' bgcolor ='black'><font color ='white'>Patients Complaints</td>";


echo "</table>";

echo"<table>";
echo "<tr>";
echo"<td><textarea rows='3' cols='145' id='line7' name='line7'>$line7</textarea></td></tr>";
echo "</tr>";
echo"</table>";



echo"<table width ='100%'>";
echo "<tr><td width ='100%' bgcolor ='black'><font color ='white'>Nurses Observation</td>";


echo "</table>";

echo"<table>";
echo "<tr>";
echo"<td><textarea rows='3' cols='145' id='line8' name='line8'>$line8</textarea></td></tr>";
echo "</tr>";
echo"</table>";


echo"<br><br>";

echo"<font color ='Orange'>Diagnostic Statement";

echo"<br><br>";



echo"<table width ='100%'>";
echo "<tr><td width ='100%' bgcolor ='black'><font color ='white'>State Of Diagnosis</td>";


echo "</table>";

echo"<table>";
echo "<tr>";
echo"<td><textarea rows='3' cols='145' id='line9' name='line9'>$line9</textarea></td></tr>";
echo "</tr>";
echo"</table>";



echo"<table width ='100%'>";
echo "<tr><td width ='100%' bgcolor ='black'><font color ='white'>Nursing Diagnosis Not Doctors</td>";


echo "</table>";

echo"<table>";
echo "<tr>";
echo"<td><textarea rows='3' cols='145' id='line10' name='line10'>$line10</textarea></td></tr>";
echo "</tr>";
echo"</table>";


echo"<br><br>";

echo"<font color ='Orange'>Goal";

echo"<br><br>";



echo"<table width ='100%'>";
echo "<tr><td width ='100%' bgcolor ='black'><font color ='white'>Goal</td>";


echo "</table>";

echo"<table>";
echo "<tr>";
echo"<td><textarea rows='3' cols='145' id='line11' name='line11'>$line11</textarea></td></tr>";
echo "</tr>";
echo"</table>";


echo"<br><br>";

echo"<font color ='Orange'>Measurable Outcome Criteria";

echo"<br><br>";



echo"<table width ='100%'>";
echo "<tr><td width ='100%' bgcolor ='black'><font color ='white'>Outcome</td>";


echo "</table>";

echo"<table>";
echo "<tr>";
echo"<td><textarea rows='3' cols='145' id='line12' name='line12'>$line12</textarea></td></tr>";
echo "</tr>";
echo"</table>";


echo"<br><br>";

echo"<font color ='Orange'>Interventions";

echo"<br><br>";



echo"<table width ='100%'>";
echo "<tr><td width ='100%' bgcolor ='black'><font color ='white'>Nursing Actions</td>";


echo "</table>";

echo"<table>";
echo "<tr>";
echo"<td><textarea rows='3' cols='145' id='line13' name='line13'>$line13</textarea></td></tr>";
echo "</tr>";
echo"</table>";


echo"<table width ='100%'>";
echo "<tr><td width ='100%' bgcolor ='black'><font color ='white'>Rationable</td>";


echo "</table>";

echo"<table>";
echo "<tr>";
echo"<td><textarea rows='3' cols='145' id='line14' name='line14'>$line14</textarea></td></tr>";
echo "</tr>";
echo"</table>";



echo"<br><br>";

echo"<font color ='Orange'>Evaluation";

echo"<br><br>";



echo"<table width ='100%'>";
echo "<tr><td width ='100%' bgcolor ='black'><font color ='white'>Evaluation</td>";


echo "</table>";

echo"<table>";
echo "<tr>";
echo"<td><textarea rows='3' cols='145' id='line15' name='line15'>$line15</textarea></td></tr>";
echo "</tr>";
echo"</table>";







echo"</td></table>";

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


