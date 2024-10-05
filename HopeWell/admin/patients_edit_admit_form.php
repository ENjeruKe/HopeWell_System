<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$date = $_SESSION['sys_date'];
?>



<?php
$today = $_SESSION['sys_date'];
$query= "SELECT * FROM companyfile" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

//echo"<table class='altrowstable' id='alternatecolor'>";
$SQL= "SELECT * FROM companyfile" or die(mysql_error());
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
  {         
     $company     = mysql_result($result,$i,"company");  
     $address1    = mysql_result($result,$i,"address1");   
     $address2    = mysql_result($result,$i,"address2");   
     $address3    = mysql_result($result,$i,"address3");   
     $next_invoice = mysql_result($result,$i,"next_ip");
  }


if (isset($_GET['account3'])){ 
   $tooth = $_GET['account3'];
   $adm_no = $_GET['account'];
   //$result3 = mysql_query($query3);
}


if (isset($_GET['accounts3']) OR isset($_GET['account3'])){    
   $check_date = date('y-md');
   if (isset($_GET['accounts3'])){
      $adm_no  = $_GET['accounts3'];
      $id_no   = $_GET['accounts'];
   }
   //$SQL= "SELECT * FROM admitfile where adm_no ='$adm_no'" or die(mysql_error());
   $SQL= "SELECT * FROM admitfile where id_no ='$id_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   //$query= "SELECT * FROM admitfile where adm_no ='$adm_no'" or die(mysql_error());
   $query= "SELECT * FROM admitfile where id_no ='$id_no'" or die(mysql_error());
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
      $doctor  = " ";   
      $appointment = mysql_result($result,$i,"adm_date");   
      $name        = mysql_result($result,$i,"patients_name");   
      $adm_date    = mysql_result($result,$i,"adm_date");  
      $adm_time    = mysql_result($result,$i,"adm_time");  
      $telephone   = mysql_result($result,$i,"telephone");  
      $status      = mysql_result($result,$i,"status");  
      $sex         = mysql_result($result,$i,"sex");
      $weight      = mysql_result($result,$i,"weight");
      $bed_no      = mysql_result($result,$i,"bed_no");
      $height      = "";
      $temp         = mysql_result($result,$i,"temp");
      $b_p         = mysql_result($result,$i,"b_p");
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"payer");  
      $textarea    = mysql_result($result,$i,"history");
      $textarea2    = mysql_result($result,$i,"complains");
      $tests       = mysql_result($result,$i,"tests_and_results");
      $last_update = mysql_result($result,$i,"last_updated");
      $diag1       = mysql_result($result,$i,"provisional_diag");
      $diag2       = mysql_result($result,$i,"final_diag");
      $village     = mysql_result($result,$i,"village");
      $subloc      = mysql_result($result,$i,"sub_loc");
      $chief       = mysql_result($result,$i,"chief");
      $subchief    = mysql_result($result,$i,"sub_chief");
      $ward  = substr($bed_no,0,4);

      $ref_nos     = "id_no";  

 //echo "Diag...:".$diag1;



     $i++;
   }
      if ($textarea<>''){
         $results ='Yes';
      }
   $check_diag1 = $diag1;
   $check_diag2 = $diag2;

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
   $date = $_SESSION['sys_date'];
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

<form action ="patients_fill_admission.php" method ="GET">
<?php





   $adms_date = substr($adm_date,0,11);
   $SQL= "SELECT * FROM medicalfile where adm_no ='$adm_no' and date = '$adms_date'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   $query= "SELECT * FROM medicalfile where adm_no ='$adm_no' and date = '$adms_date'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;

   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      { 
      $test1       = mysql_result($result,$i,"test1");  
      $test1_results  = mysql_result($result,$i,"test1_result"); 
      $test2       = mysql_result($result,$i,"test2");  
      $test2_results  = mysql_result($result,$i,"test2_result"); 
      $test3       = mysql_result($result,$i,"test3");  
      $test3_results  = mysql_result($result,$i,"test3_result"); 
      $test4       = mysql_result($result,$i,"test4");  
      $test4_results  = mysql_result($result,$i,"test4_result"); 
      $test5       = mysql_result($result,$i,"test5");  
      $test5_results  = mysql_result($result,$i,"test5_result"); 
      $textarea = mysql_result($result,$i,"notes"); 
      $diag1       = mysql_result($result,$i,"diag1");  
      $diag2       = mysql_result($result,$i,"diag2");  

      $i++;
}

echo $diag1;


$company_identity =$company_identity; 
$cdquery="SELECT client_id,patients_name FROM clients";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
$date = $_SESSION['sys_date'];
//<td>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
$today = $_SESSION['sys_date'];

$d=strtotime("$today");
//echo "Today is ".date("Y-m-d g:i:s a", $d) . "<br>";
//date("Y-m-d g:i:s a", $d);

//echo"Time posted: .the_time('g:i a')";
//print date("y-m-d g:i:s", strtotime("now"));

echo"<table width ='100%' height ='100%'><font color ='blue'>";
echo"<tr><td width ='50'><b>DATE OF ADMISSION:</b></td><td width='50' align='left'><input type='text' id ='id' name='id' value='$adm_date' size='10' readonly></td><td width ='10'>TIME:</td><td width='10' align='left'><input type='text' id ='id' name='id' value='$adm_time' size='10' readonly></td></tr>";

echo"<tr><td width ='50'><b>BED NO:</b></td><td width='50' align='left'><input type='text' id ='id' name='id' value='$bed_no' size='10' readonly></td><td width ='10'>WARD:</td><td width='10' align='left'><input type='text' id ='id' name='id' value='$ward' size='10' readonly></td></tr>";

echo"<tr><td width ='50'><b>DATE OF DISCHARGE:</b></td><td width='50' align='left'><input type='text' id ='id' name='id' value='date' size='10' readonly></td><td width ='10'>TIME:</td><td width='10' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='10' readonly></td></tr>";

echo"<tr><td width ='50'><b>DATE OF RELEASE:</b></td><td width='50' align='left'><input type='text' id ='id' name='id' value='$date' size='10' readonly></td><td width ='10'>TIME:</td><td width='10' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='10' readonly></td></tr>";


echo"</table><br>"; 
//echo"<font color ='red'><hr></font>";

echo $diag1;

if ($textarea<>''){
echo"<h4>PAST HISTORY/CONDITION ON ADMISSION</h4>";
echo"<textarea rows='5' cols='70' name='textarea'>$textarea</textarea>";
}else{
echo"<textarea rows='5' cols='70' name='textarea'></textarea>";
}
echo"<br><br>";


echo"<b><font color ='black'>Provisional Diagnosis</b></font>";
if ($diag1<>''){
echo"<input type='text' id ='diag1' name='diag1' value='$diag1' size='74'>";
}else{
echo"<select id='diag1' name='diag1'>";
$cdquery="SELECT name FROM diseasefile";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM diseasefile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select><br>";
}

echo"<b><font color ='black'>Final Diagnosis</b></font>";

if ($diag2<>''){
echo"<input type='text' id ='diag2' name='diag2' value='$diag2' size='74'>";
}else{
echo"<select id='diag2' name='diag2'>";
$cdquery="SELECT name FROM diseasefile";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM diseasefile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select><br><br>";
}










//echo"<b>Signs & Symptoms</h3><br>";
//if ($sign1<>''){
//echo"<input type='text' id ='symptom1' name='symptom1' value='$sign1' size='74' readonly>";
//}else{
//echo"<select id='symptom1' name='symptom1'>";
//$cdquery="SELECT name FROM symptomsf";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//$query3 = "select * FROM symptomsf";
//$result3 =mysql_query($query3) or die(mysql_error());
//$num3 =mysql_numrows($result3) or die(mysql_error());
//$i3=0;
//while ($cdrow=mysql_fetch_array($cdresult)) {
//      $cdTitle=$cdrow["name"];     
//      echo "<option>$cdTitle</option>";            
//      }
//echo"</select><br>";
//}
//echo"<b>Signs & Symptoms</h3>";
//if ($sign2<>''){
//echo"<input type='text' id ='symptom2' name='symptom2' value='$sign2' size='74' readonly>";
//}else{
//echo"<select id='symptom2' name='symptom2'>";
//$cdquery="SELECT name FROM symptomsf";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//$query3 = "select * FROM symptomsf";
//$result3 =mysql_query($query3) or die(mysql_error());
//$num3 =mysql_numrows($result3) or die(mysql_error());
//$i3=0;
//while ($cdrow=mysql_fetch_array($cdresult)) {
//      $cdTitle=$cdrow["name"];     
//      echo "<option>$cdTitle</option>";            
//      }
//echo"</select><br>";
//}
//echo"<b>Signs & Symptoms</h3>";
//if ($sign3<>''){
//echo"<input type='text' id ='symptom3' name='symptom3' value='$sign3' size='74' readonly>";
//}else{
//echo"<select id='symptom3' name='symptom3'>";
//$cdquery="SELECT name FROM symptomsf";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//$query3 = "select * FROM symptomsf";
//$result3 =mysql_query($query3) or die(mysql_error());
//$num3 =mysql_numrows($result3) or die(mysql_error());
//$i3=0;
//while ($cdrow=mysql_fetch_array($cdresult)) {
//      $cdTitle=$cdrow["name"];     
//      echo "<option>$cdTitle</option>";            
//      }
//echo"</select>";
//}





//echo"<br><br>";
echo"<p align ='center'><input type='submit' name='save_cancel'  class='button' value='Save Changes'><input type='submit' name='save_cancel'  class='button' value='Save & Print'></p>";

?>


<br><br>
</div>


<!--div style="float:center;"-->
 <div style="float:left; width: 50%">

<p align ='centre'></p>



<!--h2>Admission Details</h2-->
<?php


echo"<table width ='100%'><tr><th width ='300' align ='left'><h3>ADMISSION FORM</h3></td></tr>";



echo"</table>";
//echo"<hr>";
//echo"<br>";





echo"<table>";

echo"<tr><td width ='50'><b>Ref No:</b></td><td width='30' align='left'><input type='text' id ='ref_no' name='ref_no' value='$id_no' size='10' readonly></td></tr>";
echo"<tr><td width ='50'><b>File No.:</b></td><td width='30' align='left'><input type='text' id ='adm_no' name='adm_no' value='$adm_no' size='10' readonly></td></tr>";
echo"<tr><td width ='50'><b>Name:</b></td><td width='50' align='left'><input type='text' id ='customer' name='customer'
value ='$name' size='80' readonly></td></tr><table>";
echo"<table>";
echo"<tr><td width ='30'><b>Age.</td><td width='30' align='left'><input type='text' id ='age' name='age'  
 value='$age' size='10' readonly></td><td width ='30'><b>Sex</td><td width='30' align='left'><input type='text' id ='sex' name='sex'  
 value='$sex' size='10' readonly></td><td width ='30'><b>H/R:</b></td><td width='30' align='left'><input type='text' id ='weight' name='weight' size='10' value='$weight' ></td><td></td></tr>";

echo"<tr><td width ='50'><b>Temp.</td><td width='20' align='left'><input type='text' id ='temp' name='temp' size='10' value='$temp' ></td><td width ='50'><b>B.P</td><td width='50' align='left'><input type='text' id ='b_p' name='b_p'  
 size='10' value='$b_p'></td><td width ='50'><b>R/R</td><td width='50' align='left'><input type='text' id ='height' name='height' value='$height' size='10' ></td><td></td></tr>";


echo"<tr bgcolor ='green'><td width ='50'><b>Village</td><td width='20' align='left'><input type='text' id ='village' name='village' size='10' value='$village' ></td><td width ='50'><b>Sub-location</td><td width='50' align='left'><input type='text' id ='subloc' name='subloc'  
 size='10' value='$subloc'></td><td width ='50'><b>Sub-chief</td><td width='50' align='left'><input type='text' id ='subchief' name='subchief'  
 value='$subchief' size='10' ></td><td width ='50'><b>Chief</td><td width='50' align='left'><input type='text' id ='chief' name='chief'  
 value='$chief' size='10' ></td></tr></table>";


echo"<h3>Presenting complains with duration:</h3>";
echo"<textarea rows='8' cols='70' name='textarea2'>$textarea2</textarea>";





$textarea3 = "$test1 :-$test1_results.....,$test2 :- $test2_results......,$test3 :- $test3_results.....,$test4 :- $test4_results.....,$test5 :- $test5_results";

//Here

//Go and update admit file if empty test requested on in pats
//-----------------------------------------------------------
$diags =$check_diag1.$check_diag2;
if ($diags==''){
   $query  = "UPDATE  admitfile SET provisional_diag ='$diag1',final_diag ='$diag2' WHERE id_no ='$id_no'";
   $result = mysql_query($query);
}

if ($tests==''){
   $query  = "UPDATE  admitfile SET tests_and_results ='$textarea3' WHERE id_no ='$id_no'";
   $result = mysql_query($query);
}



echo"<br><br><table width ='100%'><td width ='300' align ='left'><h4>Tests Requested</h4></td><td width ='600' align ='center'>";
if ($textarea3 <>''){
   echo"<a href=javascript:popcontact505('ipview_labresults.php?accounts3=$adm_no&accounts=$date')><h3>Print results</h3></a>";
}else{
   echo"<h4><font color ='red'>Results NOT ready</h4></font>";
}
echo"</td></table>";
echo"<textarea rows='8' cols='70' name='textarea3'>$textarea3</textarea>";
//}";

$test1 ='';
$test2 ='';
$test3 ='';
$test4 ='';
$test5 ='';

echo"<table><tr><td>";
if ($test1<>''){
echo"<input type='text' id ='tests1' name='tests1' value='$test1' size='60'></td><td width='10' align='left'><!--input type='text' id ='test1_qty' name='test1_qty' size='5' value='$test1_qty'--></td>";
if ($test1_results<>''){
//echo"<td><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>Results</button>";
?>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog"><div class="modal-dialog">
<!-- Modal content-->
<--div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
<!--?php echo"<h4 class='modal-title'>$test1</h4>";?-->
!--</div><div class="modal-body"><?php echo"<p>$test1_results</p>";?>
</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div-->



<?php
//echo"</td></tr>";
//}
//}else{
//echo"<select id='test1' name='test1'>";
//$cdquery="SELECT name FROM revenuef where gl_account='Laboratory Services'";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//$query3 = "select * FROM revenuef where gl_account='Laboratory Services'";
//$result3 =mysql_query($query3) or die(mysql_error());
//$num3 =mysql_numrows($result3) or die(mysql_error());
//$i3=0;
//while ($cdrow=mysql_fetch_array($cdresult)) {
//      $cdTitle=$cdrow["name"];     
//      echo "<option>$cdTitle</option>";            
//      }
//echo"</select></td><td width='10' align='left'><!--input type='text' id ='test1_qty' name='test1_qty' size='5' --></td></tr>";
//}

//echo"<tr><td>";
//if ($test2<>''){
//echo"<input type='text' id ='tests2' name='tests2' value='$test2' size='60'></td><td width='10' align='left'><!--input type='text' id ='test2_qty' //name='test2_qty' size='5' value='$test2_qty'--></td>";
//if ($test2_results<>''){
////echo"<td><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal2'>Results</button>";
?>

<!--div id="myModal2" class="modal fade" role="dialog"><div class="modal-dialog">
<div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button-->
<!--?php echo"<h4 class='modal-title'>$test2</h4>";?>
</div><div class="modal-body"><?php echo"<p>$test2_results</p>";?>
</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div-->
<?php
echo"</td></tr>";
}
}else{
//echo"<select id='test2' name='test2'>";
//$cdquery="SELECT name FROM revenuef where gl_account='Laboratory Services'";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//$query3 = "select * FROM revenuef where gl_account='Laboratory Services'";
//$result3 =mysql_query($query3) or die(mysql_error());
//$num3 =mysql_numrows($result3) or die(mysql_error());
//$i3=0;
//while ($cdrow=mysql_fetch_array($cdresult)) {
//      $cdTitle=$cdrow["name"];     
//      echo "<option>$cdTitle</option>";            
//      }
//echo"</select></td><td width='10' align='left'><!--input type='text' id ='test2_qty' name='test2_qty' size='5' --></td></tr>";
}
echo"<tr><td>";

if ($test3<>''){
//echo"<input type='text' id ='tests3' name='tests3' value='$test3' size='60' readonly></td><td width='10' align='left'><!--input type='text' id //='test3_qty' name='test3_qty' size='5' value='$test3_qty'--></td>";
if ($test3_results<>''){
////echo"<td><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal3'>Results</button>";
?>
<!--div id="myModal3" class="modal fade" role="dialog"><div class="modal-dialog">
<div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button-->
<!--?php echo"<h4 class='modal-title'>$test3</h4>";?>
</div><div class="modal-body"><?php echo"<p>$test3_results</p>";?>
</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div-->
<?php
echo"</td></tr>";
}
}else{
//echo"<select id='test3' name='test3'>";
//$cdquery="SELECT name FROM revenuef where gl_account='Laboratory Services'";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//$query3 = "select * FROM revenuef where gl_account ='Laboratory Services'";
//$result3 =mysql_query($query3) or die(mysql_error());
//$num3 =mysql_numrows($result3) or die(mysql_error());
//$i3=0;
//while ($cdrow=mysql_fetch_array($cdresult)) {
//      $cdTitle=$cdrow["name"];     
//      echo "<option>$cdTitle</option>";            
//      }
//echo"</select></td><td width='10' align='left'><!--input type='text' id ='test3_qty' name='test3_qty' size='5' --></td></tr>";
}
echo"<tr><td>";
echo"<tr><td>";
if ($test4<>''){
//echo"<input type='text' id ='tests4' name='tests4' value='$test4' size='60' readonly></td><td width='10' align='left'><!--input type='text' id //='test4_qty' name='test4_qty' size='5' value='$test4_qty'--></td>";
if ($test4_results<>''){
////echo"<td><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal4'>Results</button>";
?>
<!--div id="myModal4" class="modal fade" role="dialog"><div class="modal-dialog">
<div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button-->
<!--?php echo"<h4 class='modal-title'>$test4</h4>";?-->


<!--/div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div-->
<?php
echo"</td></tr>";
}
}else{
//echo"<select id='test4' name='test4'>";
//$cdquery="SELECT name FROM revenuef where gl_account='Laboratory Services'";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//$query3 = "select * FROM revenuef where gl_account ='Laboratory Services'";
//$result3 =mysql_query($query3) or die(mysql_error());
//$num3 =mysql_numrows($result3) or die(mysql_error());
//$i3=0;
//while ($cdrow=mysql_fetch_array($cdresult)) {
//      $cdTitle=$cdrow["name"];     
//      echo "<option>$cdTitle</option>";            
//      }
//echo"</select></td><td width='10' align='left'><!--input type='text' id ='test4_qty' name='test4_qty' size='5' --></td></tr>";
}
//echo"<tr><td>b>Signs & Symptoms</h3>";
echo"<tr><td>";
if ($test5<>''){
//echo"<input type='text' id ='tests5' name='tests5' value='$test5' size='60' readonly></td><td width='10' align='left'><!--input type='text' id //='test5_qty' name='test5_qty' size='5' value='$test5_qty'--></td>";
if ($test5_results<>''){
//echo"<td><a href=javascript:popcontact505('view_labresult.php?accounts3=$ref_nos')></a></td></tr>";
}
}else{
//echo"<select id='test5' name='test5'>";
//$cdquery="SELECT name FROM revenuef where gl_account='Laboratory Services'";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//$query3 = "select * FROM revenuef where gl_account ='Laboratory Services'";
//$result3 =mysql_query($query3) or die(mysql_error());
//$num3 =mysql_numrows($result3) or die(mysql_error());
//$i3=0;
//while ($cdrow=mysql_fetch_array($cdresult)) {
//      $cdTitle=$cdrow["name"];     
//      echo "<option>$cdTitle</option>";            
//      }
//echo"</select></td><td width='10' align='left'><!--input type='text' id ='test5_qty' name='test5_qty' size='5' --></td></tr>";
}
//Now go and get the drugs
//------------------------












//End of Drugs
//------------
//echo"<tr><td width ='50'><b>Appt. Status:</td><td width='30' align='left'></td><td></td><td></td></tr>";
//echo"<tr><td width ='50'><select id ='status' name='status'>";
//echo"<option value='To Triage'>To Triage</option>";
//echo"<option value='To Laboratory'>To Laboratory</option>";
//echo"<option value='To Pharmacy'>To Pharmacy</option>";
//echo"<option value='To Doctor'>To Doctor</option>";
//echo"<option value='To Radiology'>To Radiology</option>";
//echo"<option value='To Specialist'>To Specialist</option>";
//echo"<option value='To Ward'>To Ward</option>";
//echo"<option value='Completed'>Completed</option>";
//echo"</select></td><td width='5' align='left'><!--input type='text' id ='temp' name='temp' size='5' --></td><td></td><td></td><td></td></tr>";
//echo"</table>";

//echo"<input type='submit' name='save_cancel'  class='button' value='Save'>";
//echo"<br>";

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