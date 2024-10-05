<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>



<?php
if (isset($_GET['account3'])){ 
   $tooth = $_GET['account3'];
   $adm_no = $_GET['account'];
   //$result3 = mysql_query($query3);
}


if (isset($_GET['accounts3']) OR isset($_GET['account3'])){    
   $check_date = date('y-md');
   if (isset($_GET['accounts3'])){
      $adm_no  = $_GET['accounts3'];
      $id_no  = $_GET['accounts'];
   }
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

      $_SESSION['sign1'] = $sign1;
      $_SESSION['sign2'] = $sign2;
      $_SESSION['sign3'] = $sign3;
      $_SESSION['sign4'] = $sign4;
      $_SESSION['sign5'] = $sign5;


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
<head>




<!-- boot traps here -->
<script type='text/javascript'
  src='http://code.jquery.com/jquery-2.0.2.js'></script>
<link rel="stylesheet" type="text/css"
  href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<script type='text/javascript'
  src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css"
  href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
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
   <div style="float:left; width: 50%">

<form action ="patients_register_doctor.php" method ="GET">
<?php


$company_identity =$company_identity; 
$cdquery="SELECT client_id,patients_name FROM clients";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
$date = date('y-m-d');
//<td>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////

echo"<table width ='100%' height ='100%'><font color ='blue'>";
echo"<tr><td width ='50'><b>Pay A/c:</b></td><td width='30' align='left'><input type='text' id ='payer' name='payer' value='$payer' size='50' readonly></td><td width ='10'><b>Ref:</b></td><td width='10' align='left'><input type='text' id ='ref_no' name='ref_no' value='$ref_nos' size='10' readonly>";
echo"</td></tr></table>"; 
echo"<font color ='red'><b>.........................................................................................................................</b></font>";

echo"<table>";

echo"<tr><td width ='50'><b>ID:</b></td><td width='30' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='10' readonly></td><td width ='50'><b>Name:</b></td><td width='50' align='left'><input type='text' id ='customer' name='customer'
value ='$name' size='40' readonly></td></tr><table>";
echo"<table>";
echo"<tr><td width ='30'><b>Age.</td><td width='30' align='left'><input type='text' id ='age' name='age'  
 value='$age' size='10' readonly></td><td width ='30'><b>Sex</td><td width='30' align='left'><input type='text' id ='sex' name='sex'  
 value='$sex' size='10' readonly></td><td width ='30'><b>Weight:</b></td><td width='30' align='left'><input type='text' id ='weight' name='weight' size='10' value='$weight' ></td></tr>";

echo"<tr><td width ='50'><b>Temp.</td><td width='20' align='left'><input type='text' id ='temp' name='temp' size='10' value='$temp' ></td><td width ='50'><b>B.P</td><td width='50' align='left'><input type='text' id ='b_p' name='b_p'  
 size='10' value='$b_p'></td><td width ='50'><b>P/R</td><td width='50' align='left'><input type='text' id ='height' name='height'  
 value='$height' size='10' ></td></tr></table>";



echo"<b>Signs & Symptoms</h3><br>";
echo"<OBJECT data='auto_search_signs.php' type='text/html' style='margin: 0; width: 550px; height: 200px; padding 0px; text-align:left;'></OBJECT>";



if ($textarea<>''){
echo"<h3>Medical Notes</h3>";
echo"<textarea rows='10' cols='70' name='textarea'>$textarea</textarea>";
}else{
echo"<textarea rows='10' cols='70' name='textarea'></textarea>";
}

echo"<OBJECT data='auto_search_diag.php' type='text/html' style='margin: 0; width: 550px; height: 200px; padding 0px; text-align:left;'></OBJECT>";



echo"<br>";

echo"<table><td>";
echo"<b>Send To:</td><td width='30' align='left'>";
echo"<select id ='status' name='status'>";
echo"<option value='To cash office'>To cash office</option>";
echo"<option value='To Triage'>To Triage</option>";
echo"<option value='To Laboratory'>To Laboratory</option>";
echo"<option value='To Pharmacy'>To Pharmacy</option>";
echo"<option value='To Doctor'>To Doctor</option>";
echo"<option value='To Radiology'>To Radiology</option>";
echo"<option value='To Specialist'>To Specialist</option>";
echo"<option value='To Ward'>To Ward</option>";
echo"<option value='Completed'>Completed</option>";
echo"</select></td>";
echo"<td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Changes'></td></table>";

?>


<br><br>
</div>


<!--div style="float:center;"-->
 <div style="float:left; width: 50%">

<p align ='centre'></p>



<!--h2>Admission Details</h2-->
<?php
echo"<table width ='100%'><td width ='300' align ='left'><h3>Med.Test Request</h3></td><td width ='100' align ='center'>";
if ($results =='Yes'){
   echo"<a href=javascript:popcontact505('view_labresult.php?accounts3=$ref_nos')><h3>View results</h3></a>";
}else{
   echo"<h3><font color ='red'>Results NOT ready</h3></font>";
}
echo"</td><td>|</td><td><a href=javascript:popcontact3('discharge_patients.php?accounts=$adm_no')><h3>Discharge</h3></a></td></table>";
//}";
?>


<!--p align ='centre'></p-->
<?php
$_SESSION['adm_no']= $adm_no;
$_SESSION['name']= $name;
$_SESSION['ref_no']= $ref_nos;
?>


<?php
echo"<table width ='100%'><td>";
require('auto_search.html');
echo"</td></table>";
?>

<!--b>Requested Tests</b-->


<OBJECT data='charged_tests.php' type='text/html' style='margin: 0; width: 500px; height: 200px; padding 0px; text-align:left;'></OBJECT>



<img src='images/black.jpg' alt='scan' style='width:50%'>


<OBJECT data='auto_search2.php' type='text/html' style='margin: 0; width: 600px; height: 200px; padding 0px; text-align:left;'></OBJECT>


<OBJECT data='charged_drugs.php' type='text/html' style='margin: 0; width: 600px; height: 200px; padding 0px; text-align:left;'></OBJECT>




<?php
//Listing Visits
$_SESSION['adm_no']= $adm_no;
echo"<h3><u>LIST OF VISITS</h3></u>";
//require('list_visits.php');

//echo"<OBJECT data='list_visits.php' type='text/html' style='margin: 0; width: 600px; height: 200px; padding 0px; text-align:left;'></OBJECT>";



 $adm_no = $_SESSION['adm_no'];

  $query = "select * FROM  medicalfile WHERE adm_no ='$adm_no' ORDER BY date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE adm_no ='$adm_no' ORDER BY date desc";
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $dates = $row['date'];        
      $bb =$row['adm_no'];        
      $aa =$row['id'];   
      $aa2 =$row['ref_no'];

      echo"<td width ='200' align ='left'><a href=javascript:popcontact4('view_patient_visits.php?accounts3=$bb&accounts=$aa&ref_no=$aa2')>$dates<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>|";
}


?>


<p align ='centre'>
<!--table align='center'><td align ='center'-->









</p>
   </div>
</div>
<div style="clear:both"></div>
</form>


<?php
$ref_nos = $_SESSION['ref_no'];
echo '<u>Nurses Progress information</u><br>';
echo"<OBJECT data='nurses_notes.php' type='text/html' style='margin: 0; width: 100%; height: 600px; padding 0px; text-align:left;'></OBJECT>";
?>


<div style="width:100%;"> <!-- Main Div -->
Vital progress Graph</u><br>
<div style="float:left; width:50%;">
<OBJECT data='http://192.168.1.2/chart/graph.php' type='text/html' style='margin: 0; width: 100%; height: 340px; padding 0px; text-align:left;'></OBJECT>
</div>
<div style="float:left; width:50%; margin-left:0px;">
<OBJECT data='http://192.168.1.2/chart/graph2.php' type='text/html' style='margin: 0; width: 100%; height: 340px; padding 0px; text-align:left;'></OBJECT>
</div>

<div style="float:left; width:50%;">
<OBJECT data='http://192.168.1.2/chart/graph3.php' type='text/html' style='margin: 0; width: 100%; height: 340px; padding 0px; text-align:left;'></OBJECT>
</div>
<div style="float:left; width:50%; margin-left:0px;">
<OBJECT data='http://192.168.1.2/chart/graph4.php' type='text/html' style='margin: 0; width: 100%; height: 340px; padding 0px; text-align:left;'></OBJECT>
</div>



<?php
//echo '<u>Vital progress Graph</u><br>';
//echo"<OBJECT data='http://localhost/chart/graph.php' type='text/html' style='margin: 0; width: 100%; height: 340px; padding 0px; text-align:left;'></OBJECT>";
//echo"<OBJECT data='http://localhost/chart/graph2.php' type='text/html' style='margin: 0; width: 100%; height: 340px; padding 0px; text-align:left;'></OBJECT>";
?>









</div>
<div class="w3-container w3-teal">






  <!--p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p-->
</div>

</body>
</html>


