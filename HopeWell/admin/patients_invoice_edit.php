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
      $diag1       = mysql_result($result,$i,"diag1"); 
      $diag2       = mysql_result($result,$i,"diag2"); 

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
      $test5_results  = mysql_result($result,$i,"test5_results"); 

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
 value='$sex' size='10' readonly></td><td width ='30'><b></b></td><td width='30' align='left'><!--input type='text' id ='weight' name='weight' size='10' value='$weight' --></td></tr>";

echo"<tr><td width ='50'></td><td width='20' align='left'><!--input type='text' id ='temp' name='temp' size='10' value='$temp' --></td><td width ='50'></td><td width='50' align='left'><!--input type='text' id ='b_p' name='b_p'  
 size='10' value='$b_p'--></td><td width ='50'><b></td><td width='50' align='left'><!--input type='text' id ='height' name='height'  
 value='$height' size='10' --></td></tr></table>";



echo"<b>Med.Test Request</h3><br>";
echo"<table><tr><td>";
if ($test1<>''){
echo"<input type='text' id ='tests1' name='tests1' value='$test1' size='60' readonly></td><td width='10' align='left'><!--input type='text' id ='test1_qty' name='test1_qty' size='5' value='$test1_qty'--></td>";
if ($test1_results<>''){
echo"<td><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>Results</button>";
?>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog"><div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
<?php echo"<h4 class='modal-title'>$test1</h4>";?>
</div><div class="modal-body"><?php echo"<p>$test1_results</p>";?>
</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>



<?php
echo"</td></tr>";
}
}else{
echo"<select id='test1' name='test1'>";
$cdquery="SELECT name FROM revenuef";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM revenuef";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td><td width='10' align='left'><!--input type='text' id ='test1_qty' name='test1_qty' size='5' --></td></tr>";
}

echo"<tr><td>";
if ($test2<>''){
echo"<input type='text' id ='tests2' name='tests2' value='$test2' size='60' readonly></td><td width='10' align='left'><!--input type='text' id ='test2_qty' name='test2_qty' size='5' value='$test2_qty'--></td>";
if ($test2_results<>''){
echo"<td><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal2'>Results</button>";
?>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog"><div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
<?php echo"<h4 class='modal-title'>$test2</h4>";?>
</div><div class="modal-body"><?php echo"<p>$test2_results</p>";?>
</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>
<?php
echo"</td></tr>";
}
}else{
echo"<select id='test2' name='test2'>";
$cdquery="SELECT name FROM revenuef";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM revenuef";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td><td width='10' align='left'><!--input type='text' id ='test2_qty' name='test2_qty' size='5' --></td></tr>";
}
echo"<tr><td>";

if ($test3<>''){
echo"<input type='text' id ='tests3' name='tests3' value='$test3' size='60' readonly></td><td width='10' align='left'><!--input type='text' id ='test3_qty' name='test3_qty' size='5' value='$test3_qty'--></td>";
if ($test3_results<>''){
echo"<td><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal3'>Results</button>";
?>
<div id="myModal3" class="modal fade" role="dialog"><div class="modal-dialog">
<div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
<?php echo"<h4 class='modal-title'>$test3</h4>";?>
</div><div class="modal-body"><?php echo"<p>$test3_results</p>";?>
</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>
<?php
echo"</td></tr>";
}
}else{
echo"<select id='test3' name='test3'>";
$cdquery="SELECT name FROM revenuef";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM revenuef";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td><td width='10' align='left'><!--input type='text' id ='test3_qty' name='test3_qty' size='5' --></td></tr>";
}
//echo"<tr><td>b>Signs & Symptoms</h3>";
echo"<tr><td>";
if ($test4<>''){
echo"<input type='text' id ='tests4' name='tests4' value='$test4' size='60' readonly></td><td width='10' align='left'><!--input type='text' id ='test4_qty' name='test4_qty' size='5' value='$test4_qty'--></td>";
if ($test4_results<>''){
echo"<td><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal4'>Results</button>";
?>
<div id="myModal4" class="modal fade" role="dialog"><div class="modal-dialog">
<div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>
<?php echo"<h4 class='modal-title'>$test4</h4>";?>
</div><div class="modal-body"><?php echo"<p>$test4_results</p>";?>
</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>
<?php
echo"</td></tr>";
}
}else{
echo"<select id='test4' name='test4'>";
$cdquery="SELECT name FROM revenuef";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM revenuef";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td><td width='10' align='left'><!--input type='text' id ='test4_qty' name='test4_qty' size='5' --></td></tr>";
}
//echo"<tr><td>b>Signs & Symptoms</h3>";
echo"<tr><td>";
if ($test5<>''){
echo"<input type='text' id ='tests5' name='tests5' value='$test5' size='60' readonly></td><td width='10' align='left'><!--input type='text' id ='test5_qty' name='test5_qty' size='5' value='$test5_qty'--></td>";
if ($test5_results<>''){
echo"<td><a href=javascript:popcontact5('view_labresult.php?accounts3=$bb')>Results</a></td></tr>";
}
}else{
echo"<select id='test5' name='test5'>";
$cdquery="SELECT name FROM revenuef";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM revenuef";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td><td width='10' align='left'><!--input type='text' id ='test5_qty' name='test5_qty' size='5' --></td></tr>";
}





echo"<br><br>";
echo"<p align ='center'><input type='submit' name='save_cancel'  class='button' value='Save Changes'></p>";

?>


<br><br>
</div>


<!--div style="float:center;"-->
 <div style="float:left; width: 50%">

<p align ='centre'></p>



<!--h2>Admission Details</h2-->
<?php






//Now go and get the drugs
//------------------------
echo"<table><tr><td><h3>Medication </h3></td><td align='center'></td><td align='center'></td><td align ='center'></td></font></b></tr>";
echo"<tr><td><font color ='red'><b>Select the Drug</td><td align='center'><font color ='red'><b>Qty</td><td align='center'><font color ='red'><b>Freq.</td><td align ='center'><font color ='red'><b>Days</td></font></b></tr>";

echo"<tr><td>";
if ($drug1<>''){
echo"<input type='text' id ='drugz1' name='drugz1' value='$drug1' size='50' readonly><td width='10' align='left'><input type='text' id ='drug1_qty' name='drug1_qty' size='5' value='$drug1_qty' ></td><td width='5' align='left'><input type='text' id ='drug1_dx' name='drug1_dx' size='5' value='$drug1_dx'></td><td width='5' align='left'><input type='text' id ='drug1_dx2' name='drug1_dx2' size='5' value='$drug1_dx2'></td></tr>";
}else{
echo"<select id='drugs1' name='drugs1'>";
$cdquery="SELECT description FROM stockfile";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM stockfile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["description"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td><td width='10' align='left'><input type='text' id ='drug1_qty' name='drug1_qty' size='5' ></td><td width='10' align='left'><input type='text' id ='drug1_dx' name='drug1_dx' size='5' ></td><td width='5' align='left'><input type='text' id ='drug1_dx2' name='drug1_dx2' size='5' value='$drug1_dx2'></td></tr>";
}
//echo"<b>Signs & Symptoms</h3>";
echo"<tr><td>";
if ($drug2<>''){
echo"<input type='text' id ='drugz2' name='drugz2' value='$drug2' size='50' readonly><td width='5' align='left'><input type='text' id ='drug2_qty' name='drug2_qty' size='5' value='$drug2_qty' ></td><td width='5' align='left'><input type='text' id ='drug2_dx' name='drug2_dx' size='5' value='$drug2_dx'></td><td width='5' align='left'><input type='text' id ='drug2_dx2' name='drug2_dx2' size='5' value='$drug2_dx2'></td></tr>";
}else{
echo"<select id='drugs2' name='drugs2'>";
$cdquery="SELECT description FROM stockfile";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM stockfile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["description"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td><td width='10' align='left'><input type='text' id ='drug2_qty' name='drug2_qty' size='5' ></td><td width='10' align='left'><input type='text' id ='drug2_dx' name='drug2_dx' size='5' ></td><td width='5' align='left'><input type='text' id ='drug2_dx2' name='drug2_dx2' size='5' value='$drug2_dx2'></td></tr>";
}
//echo"<tr><td>b>Signs & Symptoms</h3>";
echo"<tr><td>";
if ($drug3<>''){
echo"<input type='text' id ='drugz3' name='drugz3' value='$drug3' size='50' readonly><td width='5' align='left'><input type='text' id ='drug3_qty' name='drug3_qty' size='5' value='$drug3_qty' ></td><td width='5' align='left'><input type='text' id ='drug3_dx' name='drug3_dx' size='5' value='$drug3_dx'></td><td width='5' align='left'><input type='text' id ='drug3_dx2' name='drug3_dx2' size='5' value='$drug3_dx2'></td></tr>";
}else{
echo"<select id='drugs3' name='drugs3'>";
$cdquery="SELECT description FROM stockfile";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM stockfile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["description"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td><td width='10' align='left'><input type='text' id ='drug3_qty' name='drug3_qty' size='5' ></td><td width='5' align='left'><input type='text' id ='drug3_dx' name='drug3_dx' size='5' ></td><td width='5' align='left'><input type='text' id ='drug3_dx2' name='drug3_dx2' size='5' value='$drug3_dx2'></td></tr>";
}
//echo"<tr><td>b>Signs & Symptoms</h3>";
echo"<tr><td width ='40'>";
if ($drug4<>''){
echo"<input type='text' id ='drugz4' name='drugz4' value='$drug4' size='50' readonly><td width='5' align='left'><input type='text' id ='drug4_qty' name='drug4_qty' size='5' value='$drug4_qty' ></td><td width='5' align='left'><input type='text' id ='drug4_dx' name='drug4_dx' size='5' value='$drug4_dx'></td><td width='5' align='left'><input type='text' id ='drug4_dx2' name='drug4_dx2' size='5' value='$drug4_dx2'></td></tr>";
}else{
echo"<select id='drugs4' name='drugs4' onchange='showUser(this.value)'>";
$cdquery="SELECT description FROM stockfile";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM stockfile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["description"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td><td width='10' align='left'><input type='text' id ='drug4_qty' name='drug4_qty' size='5' ></td><td width='5' align='left'><input type='text' id ='drug4_dx' name='drug4_dx' size='5' ></td><td width='5' align='left'><input type='text' id ='drug4_dx2' name='drug4_dx2' size='5' value='$drug4_dx2'></td></tr>";
}
//echo"<tr><td>b>Signs & Symptoms</h3>";
echo"<tr><td width ='40'>";
if ($drug5<>''){
echo"<input type='text' id ='drugz5' name='drugz5' value='$drug5' size='50' readonly><td width='10' align='left'><input type='text' id ='drug5_qty' name='drug5_qty' size='5' value='$drug5_qty' ></td><td width='5' align='left'><input type='text' id ='drug5_dx' name='drug5_dx' size='5' value='$drug5_dx'></td><td width='5' align='left'><input type='text' id ='drug5_dx2' name='drug5_dx2' size='5' value='$drug5_dx2'></td></tr>";
}else{
echo"<select id='drugs5' name='drugs5'>";
$cdquery="SELECT description FROM stockfile";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM stockfile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["description"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td><td width='10' align='left'><input type='text' id ='drug5_qty' name='drug5_qty' size='5' ></td><td width='5' align='left'><input type='text' id ='drug5_dx' name='drug5_dx' size='5' ></td><td width='5' align='left'><input type='text' id ='drug5_dx2' name='drug5_dx2' size='5' value='$drug5_dx2'></td></tr>";
}
//echo"<tr><td>b>Signs & Symptoms</h3>";
echo"<tr><td width ='40'>";
if ($drug6<>''){
echo"<input type='text' id ='drugz6' name='drugz6' value='$drug6' size='50' readonly><td width='5' align='left'><input type='text' id ='drug6_qty' name='drug6_qty' size='5' value='$drug6_qty' ></td><td width='5' align='left'><input type='text' id ='drug6_dx' name='drug6_dx' size='5' value='$drug6_dx'></td><td width='5' align='left'><input type='text' id ='drug6_dx2' name='drug6_dx2' size='5' value='$drug6_dx2'></td></tr>";
}else{
echo"<select id='drugs6' name='drugs6'>";
$cdquery="SELECT description FROM stockfile";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM stockfile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["description"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td><td width='10' align='left'><input type='text' id ='drug6_qty' name='drug6_qty' size='5' ></td><td width='5' align='left'><input type='text' id ='drug6_dx' name='drug6_dx' size='5' ></td><td width='5' align='left'><input type='text' id ='drug6_dx2' name='drug6_dx2' size='5' value='$drug6_dx2'></td></tr>";
}
//echo"<tr><td>b>Signs & Symptoms</h3>";
echo"<tr><td width ='40'>";
if ($drug7<>''){
echo"<input type='text' id ='drugz7' name='drugz7' value='$drug7' size='50' readonly><td width='5' align='left'><input type='text' id ='drug7_qty' name='drug7_qty' size='5' value='$drug7_qty' ></td><td width='5' align='left'><input type='text' id ='drug7_dx' name='drug7_dx' size='5' value='$drug7_dx'></td><td width='5' align='left'><input type='text' id ='drug7_dx2' name='drug7_dx2' size='5' value='$drug7_dx2'></td></tr>";
}else{
echo"<select id='drugs7' name='drugs7'>";
$cdquery="SELECT description FROM stockfile";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM stockfile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["description"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td><td width='5' align='left'><input type='text' id ='drug7_qty' name='drug7_qty' size='5' ></td><td width='5' align='left'><input type='text' id ='drug7_dx' name='drug7_dx' size='5' ></td><td width='5' align='left'><input type='text' id ='drug7_dx2' name='drug7_dx2' size='5' value='$drug7_dx2'></td></tr>";
}
//End of Drugs
//------------
echo"<tr><td width ='50'><b>Appt. Status:</td><td width='30' align='left'></td><td></td><td></td></tr>";
echo"<tr><td width ='50'><select id ='status' name='status'>";
echo"<option value='To cash office'>To cash office</option>";
echo"<option value='To Triage'>To Triage</option>";
echo"<option value='To Laboratory'>To Laboratory</option>";
echo"<option value='To Pharmacy'>To Pharmacy</option>";
//echo"<option value='To Doctor'>To Doctor</option>";
echo"<option value='To Radiology'>To Radiology</option>";
echo"<option value='To Specialist'>To Specialist</option>";
echo"<option value='To Ward'>To Ward</option>";
echo"<option value='Completed'>Completed</option>";
echo"</select></td><td width='5' align='left'><!--input type='text' id ='temp' name='temp' size='5' --></td><td></td><td></td><td></td></tr>";
echo"</table>";
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