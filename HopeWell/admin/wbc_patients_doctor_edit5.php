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
   //while ($row=mysql_fetch_array($hasil)) 
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

     


      $diag1       = mysql_result($result,$i,"diag1"); 
      $diag2       = mysql_result($result,$i,"diag2"); 
      $diag3       = mysql_result($result,$i,"diag3"); 

      $_SESSION['diag1'] = $diag1;
      $_SESSION['diag2'] = $diag2;
      $_SESSION['diag3'] = $diag3;
      $_SESSION['payer'] = $payer;

      $test1       = mysql_result($result,$i,"test1");  
      $test1_qty   = 1; 
      $test1_results  = mysql_result($result,$i,"test1_result"); 

      $test2       = mysql_result($result,$i,"test2");  
      $test2_qty   = 1; 
      $test2_results  = mysql_result($result,$i,"test2_result"); 

      $test3       = mysql_result($result,$i,"test3");  
      $test3_qty   = 1; 
      $test3_results  = mysql_result($result,$i,"test3_result"); 

      $test4       = mysql_result($result,$i,"test4");  
      $test4_qty   = 1; 
      $test4_results  = mysql_result($result,$i,"test4_result"); 

      $test5       = mysql_result($result,$i,"test5");  
      $test5_qty   = mysql_result($result,$i,"test5_qty"); 
      $test5_results  = mysql_result($result,$i,"test5_result"); 

      $drug1       = mysql_result($result,$i,"med1");  
      $drug1_qty   = mysql_result($result,$i,"med1_qty"); 
      $drug1_dx    = mysql_result($result,$i,"med1_dx");  
      $drug1_dx2   = mysql_result($result,$i,"med1_dx2");  
  
      $drug2       = mysql_result($result,$i,"med2");  
      $drug2_qty   = mysql_result($result,$i,"med2_qty"); 
      $drug2_dx    = mysql_result($result,$i,"med2_dx");  
      $drug2_dx2   = mysql_result($result,$i,"med2_dx2");  

      $drug3       = mysql_result($result,$i,"med3");  
      $drug3_qty   = mysql_result($result,$i,"med3_qty"); 
      $drug3_dx    = mysql_result($result,$i,"med3_dx"); 
      $drug3_dx2   = mysql_result($result,$i,"med3_dx2");  
 
      $drug4       = mysql_result($result,$i,"med4");  
      $drug4_qty   = mysql_result($result,$i,"med4_qty"); 
      $drug4_dx    = mysql_result($result,$i,"med4_dx"); 
      $drug4_dx2   = mysql_result($result,$i,"med4_dx2");  
 
      $drug5       = mysql_result($result,$i,"med5");  
      $drug5_qty   = mysql_result($result,$i,"med5_qty"); 
      $drug5_dx    = mysql_result($result,$i,"med5_dx");
      $drug5_dx2   = mysql_result($result,$i,"med5_dx2");  
  
      $drug6       = mysql_result($result,$i,"med6");  
      $drug6_qty   = mysql_result($result,$i,"med6_qty"); 
      $drug6_dx    = mysql_result($result,$i,"med6_dx");  
      $drug6_dx2   = mysql_result($result,$i,"med6_dx2");  

      $drug7       = mysql_result($result,$i,"med7");  
      $drug7_qty   = mysql_result($result,$i,"med7_qty"); 
      $drug7_dx    = mysql_result($result,$i,"med7_dx");  
      $drug7_dx2   = mysql_result($result,$i,"med7_dx2");  
      
      
      $_SESSION['med1_dx2'] = $drug1_dx2;
      $_SESSION['diag3'] = $diag3;
      $_SESSION['sign2'] = $sign2;
      $_SESSION['sign3'] = $sign3;
      $_SESSION['sign4'] = $sign4;
      $_SESSION['sign5'] = $sign5;
      
      $i++;
      
           }

$query= "SELECT * FROM hosp_clinic where adm_no ='$id' and name ='$name'";
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

<form action ="wbc_patients_register_doctor.php" method ="GET">



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






echo"<table width ='100%'>";
echo "<tr><td width ='20%' bgcolor ='black'><font color ='white'>BCG VACCINE : @ Birth<br>(Intra-dermal left fore arm)</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Date Given</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Date of Next Visit</td>
<td width ='1%' bgcolor ='green'></td>";

echo "<td width ='20%' bgcolor ='black'><font color ='white'>ORAL POLIO VACCINE (OPV<br></td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Date Given</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Date of Next Visit</td></tr>";



echo "<!--tr><td width ='50%' bgcolor ='black'><font color ='white'>$description</td><td></td><td></td><td></td></tr-->";

echo "<tr>

<td width ='15%' bgcolor =''>Dose :(0.05mls for Child below 1year)</td>";
echo "
</td><td><input type='text' id ='line1' name='line1' value ='$line1'></td><td><input type='text' id ='line2' name='line2'  value ='$line2'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>Birth Dose: @ birth or within 2 wks(OPV 0)</td>";
echo "
</td><td><input type='text' id ='line3' name='line3' value ='$line3'></td><td><input type='text' id ='line4' name='line4' value ='$line4'></td>
</tr>";

echo "<tr>



<td width ='15%' bgcolor =''>Dose :(0.01mls for Child above 1year)</td>";
echo "
</td><td><input type='text' id ='line5' name='line5' value ='$line5'></td><td><input type='text' id ='line6' name='line6'  value ='$line6'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>1st dose @ 6weeks(OPV 1)</td>";
echo "
</td><td><input type='text' id ='line7' name='line7' value ='$line7'></td><td><input type='text' id ='line8' name='line8' value ='$line8'></td>
</tr>";

echo "<tr>

<td width ='15%' bgcolor ='green'><font color ='yellow'>B.C.G - Scar Checked</td>";
echo "</td><td bgcolor ='green'><font color ='yellow'>Date Checked</td><td bgcolor ='green'><font color ='yellow'>Date B.C.G repeated</td>


<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>2nd dose @ 10weeks(OPV 2)</td>";
echo "</td><td><input type='text' id ='line9' name='line9' value ='$line9'></td><td><input type='text' id ='line10' name='line10' value ='$line10'></td>
</tr>";

echo "<tr>

<td width ='15%' bgcolor =''>Present </td>";
echo "</td><td><input type='text' id ='line11' name='line11'   value ='$line11'></td><td><input type='text' id ='line12' name='line12'  value ='$line12'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>3rd dose @ 14weeks(OPV 3)</td>";
echo "</td><td><input type='text' id ='line13' name='line13' value ='$line13'></td><td><input type='text' id ='line14' name='line14' value ='$line14'></td>
</tr>";

echo "<tr>

<td width ='15%' bgcolor =''>Absent </td>";
echo "</td><td><input type='text' id ='line15' name='line15' value ='$line15'></td><td><input type='text' id ='line16' name='line16'  value ='$line16'></td>

<td width ='1%' bgcolor =''></td>

<td width ='15%' bgcolor =''></td>
</tr>";

echo"</table>";

echo"<br><br><br>";



echo"<table width ='100%'>";
echo "<tr><td width ='20%' bgcolor ='black'><font color ='white'>DIPHTHERIA/PERTUSSIS/TETANUS<br>HEPATITS B/HAEMOPHILUS INFLUEZA Type B</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Date Given</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Date of Next Visit</td>
<td width ='1%' bgcolor ='green'></td>";

echo "<td width ='20%' bgcolor ='black'><font color ='white'>PNEUMOCOCCAL VACCINE<br></td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Date Given</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Date of Next Visit</td></tr>";



echo "<tr>

<td width ='15%' bgcolor ='white'>Dose :(0.05mls) Intra Muscular Left outer thigh</td>";
echo "</td><td></td><td></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor ='white'>Dose :(0.05mls) Intra Muscular Right outer thigh</td>";
echo "</td><td></td><td></td>
</tr>";

echo "<tr>



<td width ='15%' bgcolor =''>1st dose at 6 weeks</td>";
echo "</td><td><input type='text' id ='line17' name='line17' value ='$line17'></td><td><input type='text' id ='line18' name='line18'  value ='$line18'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>1st dose @ 6weeks</td>";
echo "</td><td><input type='text' id ='line109' name='line109' value ='$line109'></td><td><input type='text' id ='line19' name='line19' value ='$line19'></td>
</tr>";

echo "<tr>

<td width ='15%' bgcolor =''>2nd dose @ 10weeks</td>";
echo "</td><td><input type='text' id ='line20' name='line20' value ='$line20'></td><td><input type='text' id ='line21' name='line21' value ='$line21'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>2nd dose @ 10weeks</td>";
echo "</td><td><input type='text' id ='line22' name='line22' value ='$line22'></td><td><input type='text' id ='line23' name='line23' value ='$line23'></td>
</tr>";

echo "<tr>

<td width ='15%' bgcolor =''>3rd dose @ 14weeks</td>";
echo "</td><td><input type='text' id ='line24' name='line24' value ='$line24'></td><td><input type='text' id ='line25' name='line25' value ='$line25'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>3rd dose @ 14weeks</td>";
echo "</td><td><input type='text' id ='line26' name='line26' value ='$line26'></td><td><input type='text' id ='line27' name='line27' value ='$line27'></td>
</tr>";

echo"</table>";


echo"<br><br><br>";



echo"<table width ='100%'>";
echo "<tr><td width ='20%' bgcolor ='black'><font color ='white'>MEASLES VACCINE at 9 Months</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Date Given</td>";
echo "<td width ='1%' bgcolor ='green'></td>";

echo "<td width ='20%' bgcolor ='black'><font color ='white'>YELLOW FEVER VACCINE at 9 Months</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Date Given</td>";
echo "</tr>";



echo "<!--tr><td width ='50%' bgcolor ='black'><font color ='white'>$description</td><td></td><td></td><td></td></tr-->";

echo "<tr>

<td width ='15%' bgcolor =''>Dose :(0.05mls) Subcutaneously right upper arm</td>";
echo "</td><td><input type='text' id ='line28' name='line28' value ='$line28'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>Dose :(0.05mls) Intra Muscular Left uppr deltoid</td>";
echo "</td><td><input type='text' id ='line29' name='line29' value ='$line29'></td>
</tr>";

echo "<tr>";

echo "</table>";


echo"<br><br><br>";

echo"<b>Other Vaccines</b><br>";


echo"<table width ='100%'>";
echo "<tr><td width ='20%' bgcolor ='black'><font color ='white'>Vaccine</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'>Date Given</td>";
echo "<td width ='1%' bgcolor ='green'></td>";

echo "<td width ='20%' bgcolor ='black'><font color ='white'>ANY ADVERSE EVENTS FOLLOWING IMMUNIZATION(AEFI)</td>";
echo "<td width ='15%' bgcolor ='black'><font color ='white'></td>";
echo "</tr>";



echo "<!--tr><td width ='50%' bgcolor ='black'><font color ='white'>$description</td><td></td><td></td><td></td></tr-->";

echo "<tr>

<td width ='15%' bgcolor =''><input type='text' id ='line30' name='line30' value ='$line30'></td>";
echo "</td><td><input type='text' id ='line31' name='line31' value ='$line31'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>Date</td>";
echo "</td><td><input type='text' id ='line32' name='line32' value ='$line32'></td>
</tr>";

echo "<tr>";

echo "<tr>

<td width ='15%' bgcolor =''><input type='text' id ='line33' name='line33' value ='$line33'></td>";
echo "</td><td><input type='text' id ='line34' name='line34' value ='$line34'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>Describe</td>";
echo "</td><td><input type='text' id ='line35' name='line35' value ='$line35'></td>
</tr>";

echo "<tr>";

echo "<tr>

<td width ='15%' bgcolor =''><input type='text' id ='line36' name='line36' value ='$line36'></td>";
echo "</td><td><input type='text' id ='line37' name='line37' value ='$line37'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>ANTIGEN / VACCINE:</td>";
echo "</td><td><input type='text' id ='line38' name='line38' value ='$line38'></td>
</tr>";

echo "<tr>";

echo "<tr>

<td width ='15%' bgcolor =''><input type='text' id ='line39' name='line39' value ='$line39'></td>";
echo "</td><td><input type='text' id ='line40' name='line40' value ='$line40'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>BATCH NUMBER:</td>";
echo "</td><td><input type='text' id ='line41' name='line41' value ='$line41'></td>
</tr>";

echo "<tr>";

echo "<tr>

<td width ='15%' bgcolor =''><input type='text' id ='line42' name='line42' value ='$line42'></td>";
echo "</td><td><input type='text' id ='line43' name='line43' value ='$line43'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>MANUFACTURE DATE :</td>";
echo "</td><td><input type='text' id ='line44' name='line44' value ='$line44'></td>
</tr>";

echo "<tr>";

echo "<tr>

<td width ='15%' bgcolor =''><input type='text' id ='line45' name='line45' value ='$line45'></td>";
echo "</td><td><input type='text' id ='line46' name='line46' value ='$line46'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>EXPIRY DATE :</td>";
echo "</td><td><input type='text' id ='line108' name='line108' value ='$line108'></td>
</tr>";
echo "<tr>

<td width ='15%' bgcolor =''><input type='text' id ='line47' name='line47' value ='$line47'></td>";
echo "</td><td><input type='text' id ='line48' name='line48' value ='$line48'></td>

<td width ='1%' bgcolor ='green'></td>

<td width ='15%' bgcolor =''>MANUFACTURER'S NAME :</td>";
echo "</td><td><input type='text' id ='line49' name='line49' value ='$line49'></td>
</tr>";

echo "<tr>";

echo "<tr>";


echo "</table>";




echo"<br><br><br>";


echo"VITAMIN A CAPSULES FROM  MONTHS";

echo"<table width ='100%'>";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>VITAMIN A CAPSULE : Given orally <br>At 6 months or at first or thereafter</td>";

echo "<td width ='25%' bgcolor ='black'><font color ='white'>Tick Age Given</td>";
echo "<td width ='25%' bgcolor ='black'><font color ='white'>Date of Next Visit</td>";
echo "</tr>";


echo "</table>";

echo"<table width ='100%'>";
echo "<tr><td width ='25%'>Dose</td>";
echo "<td width ='25%'>Age</td>";

echo "<td width ='25%'><input type='text' id ='line50' name='line50' value ='$line50'></td>";
echo "<td width ='25%'><input type='text' id ='line51' name='line51' value ='$line51'></td>";
echo "</tr>";

echo "<tr><td width ='25%'>100,000IU</td>";
echo "<td width ='25%'>6 months</td>";

echo "<td width ='25%'><input type='text' id ='line52' name='line52' value ='$line52'></td>";
echo "<td width ='25%'><input type='text' id ='line53' name='line53' value ='$line53'></td>";
echo "</tr>";

echo "<tr><td width ='25%'>200,000IU</td>";
echo "<td width ='25%'>12 months(1 Year)</td>";

echo "<td width ='25%'><input type='text' id ='line54' name='line54' value ='$line54'></td>";
echo "<td width ='25%'><input type='text' id ='line55' name='line55' value ='$line55'></td>";
echo "</tr>";

echo "<tr><td width ='25%'>200,000IU</td>";
echo "<td width ='25%'>18 months (1 1/2years)</td>";

echo "<td width ='25%'><input type='text' id ='line56' name='line56' value ='$line56'></td>";
echo "<td width ='25%'><input type='text' id ='line57' name='line57' value ='$line57'></td>";
echo "</tr>";

echo "<tr><td width ='25%'>200,000IU</td>";
echo "<td width ='25%'>24 months (2years)</td>";

echo "<td width ='25%'><input type='text' id ='line58' name='line58' value ='$line58'></td>";
echo "<td width ='25%'><input type='text' id ='line59' name='line59' value ='$line59'></td>";
echo "</tr>";

echo "<tr><td width ='25%'>200,000IU</td>";
echo "<td width ='25%'>30 months (2 1/2years)</td>";

echo "<td width ='25%'><input type='text' id ='line60' name='line60' value ='$line60'></td>";
echo "<td width ='25%'><input type='text' id ='line61' name='line61' value ='$line61'></td>";
echo "</tr>";

echo "<tr><td width ='25%'>200,000IU</td>";
echo "<td width ='25%'>36 months (3years)</td>";

echo "<td width ='25%'><input type='text' id ='line62' name='line62' value ='$line62'></td>";
echo "<td width ='25%'><input type='text' id ='line63' name='line63' value ='$line63'></td>";
echo "</tr>";

echo "<tr><td width ='25%'>200,000IU</td>";
echo "<td width ='25%'>42 months (3 1/2years)</td>";

echo "<td width ='25%'><input type='text' id ='line64' name='line64' value ='$line64'></td>";
echo "<td width ='25%'><input type='text' id ='line65' name='line65' value ='$line65'></td>";
echo "</tr>";

echo "<tr><td width ='25%'>200,000IU</td>";
echo "<td width ='25%'>48 months (4years)</td>";

echo "<td width ='25%'><input type='text' id ='line66' name='line66' value ='$line66'></td>";
echo "<td width ='25%'><input type='text' id ='line67' name='line67' value ='$line67'></td>";
echo "</tr>";

echo "<tr><td width ='25%'>200,000IU</td>";
echo "<td width ='25%'>54 months (4 1/2years)</td>";

echo "<td width ='25%'><input type='text' id ='line68' name='line68' value ='$line68'></td>";
echo "<td width ='25%'><input type='text' id ='line69' name='line69' value ='$line69'></td>";
echo "</tr>";

echo "<tr><td width ='25%'>200,000IU</td>";
echo "<td width ='25%'>60 months (5years)</td>";

echo "<td width ='25%'><input type='text' id ='line70' name='line70' value ='$line70'></td>";
echo "<td width ='25%'><input type='text' id ='line71' name='line71' value ='$line71'></td>";
echo "</tr>";


echo "</table>";


echo"<br><br><br>";


echo"DEWORMING FROM 1 YEAR";

echo"<table width ='100%'>";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>DEWORMING <br>Given once every 6mnths to all children 1yr and above</td>";

echo "<td width ='25%' bgcolor ='black'><font color ='white'></td>";
echo "<td width ='25%' bgcolor ='black'><font color ='white'>Date of Next Visit</td>";
echo "</tr>";


echo "</table>";

echo"<table width ='100%'>";
echo "<tr><td width ='25%'>Age</td>";
echo "<td width ='25%'>Drug</td>";

echo "<td width ='25%'>Dosage</td>";
echo "<td width ='25%'><input type='text' id ='line72' name='line72' value ='$line72'></td>";
echo "</tr>";


echo "<tr>";
echo "<td width ='25%'>12 months(1 Year)</td>";

echo "<td width ='25%'><input type='text' id ='line73' name='line73' value ='$line73'></td>";
echo "<td width ='25%'><input type='text' id ='line74' name='line74' value ='$line74'></td>";
echo "<td width ='25%'><input type='text' id ='line75' name='line75' value ='$line75'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>18 months (1 1/2years)</td>";
echo "<td width ='25%'><input type='text' id ='line76' name='line76' value ='$line76'></td>";
echo "<td width ='25%'><input type='text' id ='line77' name='line77' value ='$line77'></td>";
echo "<td width ='25%'><input type='text' id ='line78' name='line78' value ='$line78'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>24 months (2years)</td>";
echo "<td width ='25%'><input type='text' id ='line79' name='line79' value ='$line79'></td>";
echo "<td width ='25%'><input type='text' id ='line80' name='line80' value ='$line80'></td>";
echo "<td width ='25%'><input type='text' id ='line81' name='line81' value ='$line81'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>30 months (2 1/2years)</td>";
echo "<td width ='25%'><input type='text' id ='line82' name='line82' value ='$line82'></td>";
echo "<td width ='25%'><input type='text' id ='line83' name='line83' value ='$line83'></td>";
echo "<td width ='25%'><input type='text' id ='line84' name='line84' value ='$line84'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>36 months (3years)</td>";
echo "<td width ='25%'><input type='text' id ='line85' name='line85' value ='$line85'></td>";
echo "<td width ='25%'><input type='text' id ='line86' name='line86' value ='$line86'></td>";
echo "<td width ='25%'><input type='text' id ='line87' name='line87' value ='$line87'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>42 months (3 1/2years)</td>";
echo "<td width ='25%'><input type='text' id ='line88' name='line88' value ='$line88'></td>";
echo "<td width ='25%'><input type='text' id ='line89' name='line89' value ='$line89'></td>";
echo "<td width ='25%'><input type='text' id ='line90' name='line90' value ='$line90'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>48 months (4years)</td>";
echo "<td width ='25%'><input type='text' id ='line91' name='line91' value ='$line91'></td>";
echo "<td width ='25%'><input type='text' id ='line92' name='line92' value ='$line92'></td>";
echo "<td width ='25%'><input type='text' id ='line93' name='line93' value ='$line93'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>54 months (4 1/2years)</td>";
echo "<td width ='25%'><input type='text' id ='line94' name='line94' value ='$line94'></td>";
echo "<td width ='25%'><input type='text' id ='line95' name='line95' value ='$line95'></td>";
echo "<td width ='25%'><input type='text' id ='line96' name='line96' value ='$line96'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>60 months (5years)</td>";
echo "<td width ='25%'><input type='text' id ='line97' name='line97' value ='$line97'></td>";
echo "<td width ='25%'><input type='text' id ='line98' name='line98' value ='$line98'></td>";
echo "<td width ='25%'><input type='text' id ='line99' name='line99' value ='$line99'></td>";
echo "</tr>";


echo"</table>";

echo"<br><br>";

echo"<table width ='100%'>";
echo "<tr><td width ='100%' bgcolor ='black'><font color ='white'>Development milestones</td></tr></table>";

echo"<table width ='100%'>";
echo "<tr><td width ='50%' bgcolor =''></td>";
echo "<td width ='25%' bgcolor =''>Age Achived</td>";
echo "<td width ='25%' bgcolor =''>Normal Limits</td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='50%'>Social Smile</td>";
echo "<td width ='25%'><input type='text' id ='line100' name='line100' value ='$line100'></td>";
echo "<td width ='25%'>4 - 6 weeks</td>";echo "</tr>";

echo "<tr>";
echo "<td width ='50%'>Head Holding/Control</td>";
echo "<td width ='25%'><input type='text' id ='line101' name='line101' value ='$line101'></td>";
echo "<td width ='25%'>1 - 3 months</td>";
echo "</tr>";


echo "<tr>";
echo "<td width ='50%'>Turn towards the origin of sound</td>";
echo "<td width ='25%'><input type='text' id ='line102' name='line102' value ='$line102'></td>";
echo "<td width ='25%'>2 - 3 months</td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='50%'>Extend hand to grasp a toy</td>";
echo "<td width ='25%'><input type='text' id ='line103' name='line103' value ='$line103'></td>";
echo "<td width ='25%'>2 - 3 months</td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='50%'>Sitting</td>";
echo "<td width ='25%'><input type='text' id ='line104' name='line104' value ='$line104'></td>";
echo "<td width ='25%'>5 - 9 months</td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='50%'>Standing</td>";
echo "<td width ='25%'><input type='text' id ='line105' name='line105' value ='$line105'></td>";
echo "<td width ='25%'>7 - 13 months</td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='50%'>Walking</td>";
echo "<td width ='25%'><input type='text' id ='line106' name='line106' value ='$line106'></td>";
echo "<td width ='25%'>12 - 18 months</td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='50%'>Talking</td>";
echo "<td width ='25%'><input type='text' id ='line107' name='line107' value ='$line107'></td>";
echo "<td width ='25%'>9 - 24 months</td>";
echo "</tr>";

echo "</table>";




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


