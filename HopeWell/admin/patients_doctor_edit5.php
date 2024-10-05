<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];

echo"....here...";
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
   while ($row=mysql_fetch_array($hasil)) 
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
      $test1_qty   = mysql_result($result,$i,"test1_qty"); 
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
      
      
      
      $seen_results = $test3_results.$test2_results.$test4_results.$test5_results.$test1_results;
      if ($seen_results<>''){
         $results ='Yes';
      }
   }
   //get information from medicalfile
   //--------------------------------


}

?>



<!DOCTYPE html>
<html>
<title>HMIS Global | Paltech System Consultants</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"-->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">
.container { width: 600px; border: 3px solid #f7c; }
.textareaContainer {
    display: block;
    border: 3px solid #38c;
    padding: 10px;
}
textarea { width: 100%; margin: 0; padding: 0; border-width: 0; }
</style>



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

<form action ="patients_register_doctor.php" method ="GET">
<?php


$company_identity =$company_identity; 
$cdquery="SELECT client_id,patients_name FROM clients";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
$date = date('y-m-d');
//<td>";


//here3
//
$_SESSION['founds']='No';
 $SQL= "SELECT * FROM hdnotef where invoice_no ='$ref_nos'";
   $hasil=mysql_query($SQL, $connect);

   $query= "SELECT * FROM hdnotef where invoice_no ='$ref_nos'";
   $result =mysql_query($query);
   $num =mysql_numrows($result);
   $tot =0;
   $i = 0;
   $results ='No';
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      { 
      $founds      = 'Yes'; 
      $_SESSION['founds']='Yes';
      }

//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
echo"<table width ='100%' border ='0'><font color ='blue'>";
echo"<tr><td width ='5%'><b>Pay A/c:</b></td><td width='30%' align='left'><input type='text' id ='payer' name='payer' value='$payer' size='45' readonly></td><td width ='5%'><b>Ref:</b></td><td width='5%' align='left'><input type='text' id ='ref_no' name='ref_no' value='$ref_nos' size='9' readonly>";
echo"</td>";
echo"<td width ='15%' align ='center' bgcolor ='green'><a href=javascript:popcontact505('view_labresult.php?accounts3=$ref_nos')><b><font color ='white'>View Lab Results</font></b></a></td>";
echo"<td width ='15%' bgcolor ='red' align ='center'><a href=javascript:popcontact3('admit_patients.php?accounts3=$ref_nos&accounts=$adm_no&date=$appointment')><b><font color ='white'><b>Admit Patient</font></b></a></td><td width ='15%' bgcolor ='blue'  align ='center'><a href=javascript:popcontact3('discharge_patients.php?accounts3=$ref_nos&accounts=$adm_no')><font color ='white'><b>Discharge</font></b></a></td></tr></table>";

echo"<font color ='red'><b><hr></b></font>";

echo"<table width ='100%'>";

echo"<tr><td width ='5%'><b>ID:</b></td><td width='20%' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='10' readonly></td><td width ='10%'><b>Name:</b></td><td width='20%' align='left'><input type='text' id ='customer' name='customer'
value ='$name' size='42' readonly></td>"; 

if ($test1_qty == '0'){

    
}else{

echo "<td width ='100%' align='center'><font color ='red'><b> LIMIT SET - $test1_qty </b></font></td> </tr>";

}


echo"<tr><td width ='10%'><b>Age.</td><td width='20%' align='left'><input type='text' id ='age' name='age'  
 value='$age' size='10' readonly></td><td width ='10%'><b>Sex</td><td width='20%' align='left'><input type='text' id ='sex' name='sex'  
 value='$sex' size='10' readonly></td><td width ='10%'><b>Weight:</b></td><td width='20%' align='left'><input type='text' id ='weight' name='weight' size='10' value='$weight' ></td></tr>";

echo"<tr><td width ='10%'><b>Temp.</td><td width='20%' align='left'><input type='text' id ='temp' name='temp' size='10' value='$temp' ></td><td width ='10%'><b>B.P</td><td width='20%' align='left'><input type='text' id ='b_p' name='b_p'  
 size='10' value='$b_p'></td><td width ='10%'><b>P/R</td><td width='20%' align='left'><input type='text' id ='height' name='height'  
 value='$height' size='10' ></td></tr></table>";


if ($test1_qty == '0'){

    
}else{
    
     echo "<table><tr><td width ='100%' align='center'><font color ='red'><b> LIMIT SET - $test1_qty </b></font></td></tr></table>";

}

echo "You can view previous visits at the bottom of the page";

echo"<hr>";


//echo"<OBJECT data='auto_display.php' type='text/html' style='margin: 0; width: 100%; height: 100px; padding 0px; text-align:left;'></OBJECT>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_1.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo"<table width='100%' border ='1'><td width='15%'>";
echo"<a href=javascript:popcontact7('doc_window_19.php?accounts=$adm_no&accounts3=$ref_nos')><img src='investigate.jpg' alt='scan' style='width:100%'></a></td><td width='15%'>";


echo"<a href=javascript:popcontact7('proce_21.php?accounts=$adm_no&accounts3=$ref_nos')><img src='pro.jpg' alt='scan' style='width:100%'></a></td><!--td width='15%'>";

echo"<a href=javascript:popcontact7('rad_21.php?accounts=$adm_no&accounts3=$ref_nos')><img src='rad.jpg' alt='scan' style='width:100%'></a></td--><td width='15%'>";

echo"<a href=javascript:popcontact7('doc_window_21.php?accounts=$adm_no&accounts3=$ref_nos')><img src='medication.jpg' alt='scan' style='width:100%'></a></td><td width='15%'>";

echo"<a href=javascript:popcontact7('aller.php?accounts=$adm_no&accounts3=$ref_nos')><img src='aller.jpg' alt='scan' style='width:100%'></a></td><td width='15%'>";


//echo"<a href=javascript:popcontact7('doc_window_23.php?accounts=$adm_no&accounts3=$ref_nos')><img src='folloup.jpg' alt='scan' style='width:100%'></a></td><!--td width='15%'></td--><table><br><B>CHIEF COMPLAINT (C.O)<br>";
echo"<a href=javascript:popcontact7('dental_21.php?accounts=$adm_no&accounts3=$ref_nos')><img src='dental.jpg' alt='scan' style='width:100%'></a></td><!--td width='15%'></td--><B>CHIEF COMPLAINT (C.O)</td><td width='15%'>";

echo"<a href=javascript:popcontact17('view_history.php?accounts=$adm_no&accounts3=$ref_nos')><img src='history.jpg' alt='scan' style='width:100%'></a></td><!--td width='15%'></td--><table><br><B>CHIEF COMPLAINT (C.O)<br>";


$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$med1_dx2 ='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $med1_dx2       = mysql_result($result,$i,"notes"); 
  }
echo"<textarea rows='6' cols='100%' name='textarea1'>$med1_dx2</textarea><br>";

//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_2.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>"; done-----
echo'<B><BR>HISTORY OF PRESENTING ILLNESS (H.P.I)</b><br>';
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$med1_dx2 = '';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $med1_dx2       = mysql_result($result,$i,"drug2_issued"); 
  }
echo"<textarea rows='6' cols='100%' name='textarea2'>$med1_dx2</textarea><br>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_3.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo'<br><B>PAST MEDICAL HISTORY (P.M.H)<br>';
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4 ='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"drug3_issued"); 
  }
  
//Now go and get history data from appointmentf
//---------------------------------------------
$SQL= "SELECT * FROM appointmentf where adm_no ='$id'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM appointmentf where adm_no ='$id'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
  { 
      $ids      = mysql_result($result,$i,"adm_no");          
      $sign4       = mysql_result($result,$i,"sublocation"); 
  }
  
$_SESSION['adm_no'] =$ids;
echo"<textarea rows='6' cols='100%' name='textarea3'>$sign4</textarea><br>";

//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_4.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo'<br><B>OBS / GYN HISTORY<br>';
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4 ='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"drug4_issued"); 
  }
  
//Now go and get history data from appointmentf
//---------------------------------------------
$SQL= "SELECT * FROM appointmentf where adm_no ='$id'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM appointmentf where adm_no ='$id'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
  { 
      $ids      = mysql_result($result,$i,"adm_no");          
      $sign4       = mysql_result($result,$i,"village"); 
  }
  
$_SESSION['adm_no'] =$ids;
echo"<textarea rows='6' cols='100%' name='textarea4'>$sign4</textarea><br>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_5.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo'<br><B>FAMILY SOCIAL HISTORY<br>';
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$sign4='';
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"drug5_issued"); 
  }
  
//Now go and get history data from appointmentf
//---------------------------------------------
$SQL= "SELECT * FROM appointmentf where adm_no ='$id'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM appointmentf where adm_no ='$id'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
  { 
      $ids      = mysql_result($result,$i,"adm_no");          
      $sign4       = mysql_result($result,$i,"other_info"); 
  }
  
//echo"<form action ='patients_register_doctor.php' method ='GET'>";
//$_SESSION['update'] ='5';
$_SESSION['adm_no'] =$ids;
echo"<textarea rows='6' cols='100%' name='textarea5'>$sign4</textarea><br>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_6.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo'<br><B>GENERAL EXAMINATION<br>';
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $ref_noz = mysql_result($result,$i,"ref_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"drug6_issued"); 
  }
//echo"<form action ='patients_register_doctor.php' method ='GET'>";
//$_SESSION['update'] ='6';
echo"<textarea rows='6' cols='100%' name='textarea6'>$sign4</textarea><br>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_7.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo'<br><B>SYSTEMIC EXAMINATION<br>';
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_8.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo'<br><B>CENTRAL NERVOUS SYSTEM (C.N.S)<br>';
$id_no  = $_SESSION['id'];
$_SESSION['ref_no'] =$ref_noz;
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"drug4_issued"); 
  }
echo"<textarea rows='3' cols='100%' name='textarea8'>$sign4</textarea><br>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_9.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo'<br><B>RESPIRATORY SYSTEM (R.S)<br>';
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4 ='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"drug3_issued"); 
  }
echo"<textarea rows='3' cols='100%' name='textarea9'>$sign4</textarea><br>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_10.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo'<br><B>CARDIOVASCULAR SYSTEM<br>';
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"drug7_issued"); 
  }
//echo"<form action ='patients_register_doctor.php' method ='GET'>";
//$_SESSION['update'] ='10';
echo"<textarea rows='3' cols='100%' name='textarea10'>$sign4</textarea><br>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_11.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo'<br><B>PA ABDOMINAL EXAMINATION<br>';
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"dose1"); 
  }
echo"<textarea rows='3' cols='100%' name='textarea11'>$sign4</textarea><br>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_12.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo'<br><B>MASCULAR-SKELETAL SYSTEM<br>';
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"dose2"); 
  }
//echo"<form action ='patients_register_doctor.php' method ='GET'>";
//$_SESSION['update'] ='12';
echo"<textarea rows='3' cols='100%' name='textarea12'>$sign4</textarea><br>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_13.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"dose3"); 
  }
echo'<br><B>EYE EXAMINATION<br>';
echo"<textarea rows='3' cols='100%' name='textarea13'>$sign4</textarea><br>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_14.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"dose4"); 
  }
echo'<br><B>EAR, NOSE & THROAT EXAMINATION (E.N.T)';
//echo"<form action ='patients_register_doctor.php' method ='GET'>";
//$_SESSION['update'] ='14';
echo"<textarea rows='3' cols='100%' name='textarea14'>$sign4</textarea>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_15.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";

$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"dose5"); 
  }
echo'<br><B>BREAST EXAMINATION<br>';
echo"<textarea rows='3' cols='100%' name='textarea15'>$sign4</textarea><br>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_16.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"dose6"); 
  }

echo'<br><B>SKIN EXAMINATION<br>';
//echo"<form action ='patients_register_doctor.php' method ='GET'>";
//$_SESSION['update'] ='16';
echo"<textarea rows='3' cols='100%' name='textarea16'>$sign4</textarea>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_17.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";
echo"<table width ='100%'><td width ='100%'>";
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"dose7"); 
  }

echo'<br><B>OTHER EXAMINATION<br>';
echo"<textarea rows='6' cols='100%' name='textarea17'>$sign4</textarea></td></table>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_18.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";

echo"<table width ='100%'><td width ='100%'>";
$id_no  = $_SESSION['id'];
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
$sign4='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"sign4"); 
  }

echo'<br><B>IMPRESSION<br>';
//echo"<form action ='patients_register_doctor.php' method ='GET'>";
//$_SESSION['update'] ='18';
echo"<textarea rows='6' cols='100%' name='textarea18'>$sign4</textarea>";
echo"</td></table>";
//-----------------------------------------------------------------------------






echo"<table width='100%' border ='1'><td width='15%'>";
echo"<a href=javascript:popcontact7('doc_window_19.php?accounts=$adm_no&accounts3=$ref_nos')><img src='investigate.jpg' alt='scan' style='width:100%'></a></td><td width='15%'>";


echo"<a href=javascript:popcontact7('proce_21.php?accounts=$adm_no&accounts3=$ref_nos')><img src='pro.jpg' alt='scan' style='width:100%'></a></td><!--td width='15%'>";

echo"<a href=javascript:popcontact7('rad_21.php?accounts=$adm_no&accounts3=$ref_nos')><img src='rad.jpg' alt='scan' style='width:100%'></a></td--><td width='15%'>";

echo"<a href=javascript:popcontact7('doc_window_21.php?accounts=$adm_no&accounts3=$ref_nos')><img src='medication.jpg' alt='scan' style='width:100%'></a></td><td width='15%'>";

echo"<a href=javascript:popcontact7('aller.php?accounts=$adm_no&accounts3=$ref_nos')><img src='aller.jpg' alt='scan' style='width:100%'></a></td><td width='15%'>";


//echo"<a href=javascript:popcontact7('doc_window_23.php?accounts=$adm_no&accounts3=$ref_nos')><img src='folloup.jpg' alt='scan' style='width:100%'></a></td><!--td width='15%'></td--><table><br><B>CHIEF COMPLAINT (C.O)<br>";
echo"<a href=javascript:popcontact7('dental_21.php?accounts=$adm_no&accounts3=$ref_nos')><img src='dental.jpg' alt='scan' style='width:100%'></a></td><!--td width='15%'></td--><B>CHIEF COMPLAINT (C.O)</td><td width='15%'>";

echo"<a href=javascript:popcontact17('view_history.php?accounts=$adm_no&accounts3=$ref_nos')><img src='history.jpg' alt='scan' style='width:100%'></a></td><!--td width='15%'></td--><table><br><B>PAST MEDICAL HISTORY<br>";








echo"<OBJECT data='doc_window_20.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";


echo'<br><B>MEDICAL PRESCRIPTION<br>';
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$sign4='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $sign4       = mysql_result($result,$i,"drug7_issued"); 
  }
echo"<textarea rows='3' cols='100%' name='textarea7' required>$sign4</textarea><br>";



$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$diag3='';
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $diag3       = mysql_result($result,$i,"diag3"); 
  }
echo"<B><font color ='red'>RECOMANDATIONS<br><br></font>";
//echo"<form action ='patients_register_doctor.php' method ='GET'>";
//$_SESSION['update'] ='22';
echo"<textarea rows='4' cols='100%' name='textarea22'>$diag3</textarea>";
//------------------------------------------------------------------------------
//echo"<OBJECT data='doc_window_23.php' type='text/html' style='margin: 0; width: 100%; height: 152px; padding 0px; text-align:left;'></OBJECT>";

echo"<table width ='100%'><td width ='100%'>";
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
$med1_dx2='';
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $med1_dx2       = mysql_result($result,$i,"drug1_issued"); 
  }
  
//echo'<br><B>FOLLOW-UP<br>';
//echo"<form action ='patients_register_doctor.php' method ='GET'>";
//$_SESSION['update'] ='23';
//echo"<textarea rows='6' cols='100%' name='textarea23'>$med1_dx2</textarea>";
//echo"<br><input type='submit' name='_back'  class='button' value='Save & Back'>";


echo"</td></table>";

echo"<br>";

echo"<table><td>";
echo"<b>Send To:</td><td width='30' align='left'>";
echo"<select id ='status' name='status' required>";
echo"<option value=''></option>";
echo"<option value='To Triage'>To Triage</option>";
echo"<option value='To cash office'>To cash office</option>";
echo"<option value='To Doctor'>To Doctor</option>";
echo"<option value='To Laboratory'>To Laboratory</option>";
echo"<option value='To Pharmacy'>To Pharmacy</option>";
echo"<option value='To Radiology'>To Radiology</option>";
echo"<option value='To Nutriton'>To Nutriton</option>";
echo"<option value='To WBC'>To WBC</option>";
echo"<option value='To Dental'>To Dental</option>";
echo"<option value='To Antenatal'>To Antenatal</option>";
echo"<option value='To Optical'>To Optical</option>";
echo"<option value='To Physio'>To Physiotherapy</option>";
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
//$_SESSION['adm_no']= $adm_no;
//$_SESSION['name']= $name;
//$_SESSION['ref_no']= $ref_nos;

$_SESSION['adm_no']= $adm_no;
$_SESSION['name']= $name;
$_SESSION['ref_no']= $ref_nos;
$_SESSION['age']= $age;
$_SESSION['sex']= $sex;

?>





<img src='images/black.jpg' alt='scan' style='width:40%'>


<!--OBJECT data='auto_search2.php' type='text/html' style='margin: 0; width: 390px; height: 200px; padding 0px; text-align:left;'></OBJECT-->


<!--OBJECT data='charged_drugs.php' type='text/html' style='margin: 0; width: 350px; height: 200px; padding 0px; text-align:left;'></OBJECT-->




<?php
$_SESSION['adm_no']= $adm_no;
echo"<h5>LIST OF VISITS ||";

require('list_visits.php');

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

