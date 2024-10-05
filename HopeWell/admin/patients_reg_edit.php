<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$today = $_SESSION['sys_date'];
$appointment = $_SESSION['sys_date'];
?>

<?php

//$con=mysql_connect('localhost', 'root', '0710958791');
//$db=mysql_select_db('test');






if (isset($_GET['account3'])){ 
   $tooth = $_GET['account3'];
   $adm_no = $_GET['account'];
   //$result3 = mysql_query($query3);
}

$_SESSION["repeat"] = "Yes";

if (isset($_GET['accounts3']) OR isset($_GET['account3'])){    
   if (isset($_GET['accounts3'])){
      $adm_no  = $_GET['accounts3'];
   }
   $SQL= "SELECT * FROM appointmentf where adm_no ='$adm_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   $query= "SELECT * FROM appointmentf where adm_no ='$adm_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;

   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      { 
      $id      = mysql_result($result,$i,"id");          
      $doctor  = mysql_result($result,$i,"doctor");   
      //$appointment = mysql_result($result,$i,"app_date");   
      $name        = mysql_result($result,$i,"name");   
      $date        = mysql_result($result,$i,"app_date");  
      $last_date = mysql_result($result,$i,"app_date");  
      $telephone   = mysql_result($result,$i,"telephone");  
      $status      = mysql_result($result,$i,"status");  
      $sex         = mysql_result($result,$i,"sex");  
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"payer");  
      $textarea    = mysql_result($result,$i,"other_info");  
      $adm_date    = mysql_result($result,$i,"adm_date");  
      $dis_date    = mysql_result($result,$i,"dis_date");  

      $time        = mysql_result($result,$i,"temp");  
      $ward        = mysql_result($result,$i,"bed_no");  
      $bed_no      = mysql_result($result,$i,"bed_no");  
      $id_no      = mysql_result($result,$i,"id_no");  
      $nhif_no      = mysql_result($result,$i,"nhif_no");  
      $nextid_no  = mysql_result($result,$i,"nextid_no");  
      $subchief     = mysql_result($result,$i,"subchief");  
      $chief        = mysql_result($result,$i,"chief");  
      $village      = mysql_result($result,$i,"village");  
      $sublocation  = mysql_result($result,$i,"sublocation");  

      $email       = mysql_result($result,$i,"email");  
      $image_id = mysql_result($result,$i,"image_id"); 
      $kin = mysql_result($result,$i,"kin"); 
      $kin_tel = mysql_result($result,$i,"kin_tel"); 


   }
}

?>



<!DOCTYPE html>
<html>
<title>HMIS Global | Paltech System Consultants</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"-->
<head>





<body>
<!--div class="w3-container w3-teal">
  <h1>Admission Form | <font color ='red'>HMIS</font></h1>
</div-->
<!--img src="img_car.jpg" alt="Car" style="width:100%"-->
<!--div class="w3-container"-->





<script>
function myage2() {
    var d = document.getElementById('dobs').value;
    var n = document.getElementById('dobs').value;
    var age1 = document.getElementById('dob').value;   

    txt2 = n;
    document.getElementById("age").value = txt2;
}
</script>


<script>
function myage() {
    var d = new Date();
    var n = d.getFullYear();
    var age1 = document.getElementById('dob').value;   

    txt2 = n - age1;
    document.getElementById("age").value = txt2;
}
</script>


<script>
function myaccount() {
    var payer = document.getElementById('db_account').value;   

    //txt2 = n - age1;
    document.getElementById("payer").value = payer;
}
</script>



<script language="javascript" type="text/javascript">
var newwindow;
function popitup22(url) {
	newwindow=window.open(url,'newwindow','height=300,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}





</script>





<!--script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/bills-pop-up.js"></script>

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"-->
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
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getaccount.php?q="+str,true);
        xmlhttp.send();
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
   <div style="float:left; width: 100%">

<form action ="patient_register.php" method ="GET">
<?php


























$company_identity =$company_identity; 
//$cdquery="SELECT client_id,patients_name FROM clients";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
$date = $_SESSION['sys_date'];
//<td>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
//echo"r>";
echo"<table width ='100%' border ='0'>";

echo"<tr><td width ='50'><b>Reg. No:</font></b></td><td width='50' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='20' readonly></td><td></td><td></td></tr>";

echo"<tr><td width ='50'><b>Patient:</b><font color ='yellow'>*</font></td><td width='50' align='left'><input type='text' id ='customer' name='customer' size='50' value ='$name' required></td><td></td><td></td></tr>";


echo"<tr><td width ='100'><b>YOB.</b><font color ='red'>*</font></td><td width='50' align='left'><input type='text' id ='dob' name='dob' size='10' onchange='myage()'></td><td width ='100'><b>Month/Days</td><td width='50' align='left'><input type='text' id ='dobs' name='dobs' size='10' onchange='myage2()'</td></tr>";

echo"<tr><td width ='100'><b>Age.</b><font color ='red'>*</font></td><td width='50' align='left'><input type='text' id ='age' name='age'  
 size='10' value ='$age' required></td><td width ='100'><b>Sex<font color ='red'>*</font></td><td width='50' align='left'><input type='text' id ='sex' name='sex'  
  size='10' value ='$sex'></td></tr>";

echo"<tr><td width ='100'><b>ID No.</b><font color ='red'>*</font></td><td width='50' align='left'><input type='text' id ='id_no' name='id_no' size='20' value='$id_no'></td><td width ='100'><b>NHIF No.</td><td width='50' align='left'><input type='text' id ='nhif_no' name='nhif_no' value='$nhif_no'></td></tr>";


echo"<tr><td width ='50'><b>Telephone:</b></font></td><td width='50' align='left'><input type='text' id ='tel' name='tel' size='20' value='$telephone'></td><td width ='50'><b>E-mail:</b></td><td width='50' align='left'><input type='text' id ='email' name='email'  size='30' value ='$email'></td></tr>";

//echo"<tr><td width ='50'><b>Village:</b></font></td><td width='50' align='left'><input type='text' id ='village' name='village' size='40' //value='$village'></td><td width ='50'><b>Sub-Location:</b></td><td width='40' align='left'><input type='text' id ='sublocation' name='sublocation'  //size='40' value='$sublocation'></td></tr>";

echo"<tr><td width ='50'><b>Adm Date:</b></font></td><td width='50' align='left'><input type='text' id ='adm_date' name='adm_date' size='20' value='$adm_date'></td><td width ='50'><b>Dis Date:</b></td><td width='40' align='left'><input type='text' id ='dis_date' name='dis_date'  size='20' value='$dis_date'></td></tr>";

echo"<tr><td width ='100'><b>Next/Kin</font></td><td width='100' align='left'><input type='text' id ='kin' name='kin'  
 size='50' value ='$kin'></td><td><b>Residence:</b></td><td><input type='text' id ='village' name='village'  
 size='30' value ='$village'></td></tr>";

echo"<tr><td width ='100'><b>Kin Tel:</font></td><td width='100' align='left'><input type='text' id ='kin_tel' name='kin_tel'  
  size='50' value='$kin_tel'></td><td width ='100'><b>ID No.</b><font color ='red'>*</font></td><td width='50' align='left'><input type='text' id ='nextid_no' name='nextid_no' size='20' value ='$nextid_no'></td></tr>";


//$appointment = date('y-m-d');
echo"<tr><td width ='100'><b>Last Visit</font></td><td width='50' align='left'><input type='text' id ='date' name='date'  
 value='$last_date' size='10' ></td>";


echo"<td width ='100' align ='left' border ='3'><b>Paying A/c:</b></td><td>";
echo"<select id='db_account' name='db_account' onchange ='myaccount()'>";
$cdquery="SELECT account_name FROM debtorsfile order by account_name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM debtorsfile order by account_name";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";
echo"</td>";

echo"<td width ='50'></td><td width='50' align='left'>
</td><td></td><td></td></tr>";


echo"<td width ='100' align ='left' border ='3'><b>Doctor:</b></td><td>";
echo"<select id='doc_account' name='doc_account' required>";
$cdquery="SELECT account_name FROM doctorsfile";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM doctorsfile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";
echo"</td>";
echo"<td width ='10'><font color ='red'><b>Old Scheme:</b></font></td><td><input type='text' id ='payer' name='payer'  
 size='50' value ='$payer' readonly></td><td></td><td></td></tr>";


echo"<tr><td width ='50'></td><td width='50' align='left'></td><td></td><td></td></tr>";

echo"<tr><td width ='100' align ='left' border ='3'><b>Service</b></td><td>";
echo"<select id='service' name='service' required>";
$cdquery="SELECT name FROM revenuef order by name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM revenuef order by name";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";
echo"</td><td></td><td></td></tr>";
echo"<tr><td width ='50'><font color='white'><b><font color ='red'>Walk in:</font></b></font></td><td width='50' align='left'><input type='checkbox' name='walk_in' id='walk_in' value ='bar'/></td><td></td><td></td></tr>";
echo"<tr><td width ='50'><font color='green'><b>Optical:</b></font></td><td width='50' align='left'><input type='checkbox' name='optical' id='optical' value ='bar'></td><td></td><td></td></tr>";
echo"<tr><td width ='50'><font color='green'><b>Physiotherapy:</b></font></td><td width='50' align='left'><input type='checkbox' name='physio' id='physio' value ='bar'></td><td></td><td></td></tr>";
echo"<tr><td width ='50'><font color='green'><b>Dental:</b></font></td><td width='50' align='left'><input type='checkbox' name='dental' id='dental' value ='bar'></td><td></td><td></td></tr>";
echo"<tr><td width ='50'><font color='green'><b>Post Dated:</b></font></td><td width='50' align='left'><input type='checkbox' name='postdated' id='postdated' value ='bar'></td><td></td><td></td></tr></table>";

//echo"<tr><td width ='50'><font color='white'><b>Charge Consultation:</b></font></td><td width='50' align='left'><input type='checkbox' name='charge' //id='charge' value ='charge' checked='checked' /></td><td></td><td></td></tr></table>";


?>



<br>
<?php
$_SESSION['adm_no']= $adm_no;
echo"<h5>LIST OF VISITS ||";

require('list_visits.php');

?>
<br><br>
<input type='submit' name='save_cancel'  class='button' value='Save'>
<!--input type="submit" name="Submit"  class="button" value="Attach Scan" onclick="return popitup22('upload_form.php')"/-->
<input type="submit" name="edit_cancel"  class="button" value="Edit"/>


<!--/form-->

</div>
   <div style="float:center;">
<p align ='centre'></p>











<p align ='centre'>
<table align='center'><td align ='center'>
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