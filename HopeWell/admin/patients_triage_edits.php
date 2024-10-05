<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>


<?php
if (isset($_GET['save_cancel'])){  
   //Go and save first
   //-------------------
   $adm_no=$_GET['id'];
   $date=$_GET['date'];
   $doctor = $_GET['doc_account'];
   $customer =$_GET['customer'];
   $status =$_GET['status'];
   $height =$_GET['height'];
   $weight =$_GET['weight'];
   $temp =$_GET['temp'];
   $b_p =$_GET['b_p'];
   $today =date('y-m-d');

   //Go and dabit gltransf A/c
   //-------------------------
   $query5= "UPDATE appointmentf SET weight ='$weight',temp='$temp',b_p='$b_p',height='$height',status='$status' WHERE adm_no ='$adm_no'";
   $result5 =mysql_query($query5);  
  
   $query= "UPDATE medicalfile SET weight ='$weight',temp='$temp',b_p='$b_p',height='$height',status='$status' WHERE adm_no ='$adm_no'";
   $result =mysql_query($query);
}
?>



<?php
if (isset($_GET['account3'])){ 
   $tooth = $_GET['account3'];
   $adm_no = $_GET['account'];
   //$result3 = mysql_query($query3);
}


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
      $appointment = mysql_result($result,$i,"app_date");   
      $name        = mysql_result($result,$i,"name");   
      $date        = mysql_result($result,$i,"app_date");  
      $telephone   = mysql_result($result,$i,"telephone");  
      $status      = mysql_result($result,$i,"status");  
      $sex         = mysql_result($result,$i,"sex");
      $weight      = mysql_result($result,$i,"weight");
      $height      = mysql_result($result,$i,"height");
      $b_p         = mysql_result($result,$i,"b_p");
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"payer");  
      $textarea    = mysql_result($result,$i,"other_info");  
      $time        = mysql_result($result,$i,"bed_no");  
      $email       = mysql_result($result,$i,"email");  
      $image_id = mysql_result($result,$i,"image_id"); 

   }
}

?>



<!DOCTYPE html>
<html>
<title>HMIS Global | Paltech System Consultants</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<head>





<body>
<!--div class="w3-container w3-teal">
  <h1>Update Triage Form | <font color ='yellow'>HMIS</font></h1>
</div-->
<!--img src="img_car.jpg" alt="Car" style="width:100%"-->
<!--div class="w3-container"-->










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
   <div style="float:left; width: 50%">

<form action ="patients_triage_edits.php" method ="GET">
<?php


























$company_identity =$company_identity; 
$cdquery="SELECT client_id,patients_name FROM clients";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
$date = date('y-m-d');
//<td>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////

//echo"<br><br><table width ='100%' height ='100%'><tr><td width ='100' align ='left'><b>Doctor:</b></td><td>";
//echo"<select id='doc_account' name='doc_account'> readonly";
//$cdquery="SELECT account_name FROM doctorsfile";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//$query3 = "select * FROM suppliersfile";
//$result3 =mysql_query($query3) or die(mysql_error());
//$num3 =mysql_numrows($result3) or die(mysql_error());
//$i3=0;
//while ($cdrow=mysql_fetch_array($cdresult)) {
//      $cdTitle=$cdrow["account_name"];     
//      echo "<option>$cdTitle</option>";            
//      }
//echo"</select>";
//echo"</td></tr></table>"; 
//echo"<font color ='red'>............................................................</font>";

echo"<table width ='100%'>";

echo"<tr><td width ='50'><b>Reg. No:</b></td><td width='50' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='10' readonly></td></tr>";

echo"<tr><td width ='50'><b>Patient:</b></td><td width='50' align='left'><input type='text' id ='customer' name='customer'   
value ='$name' size='50' readonly></td></tr>";
echo"<tr><td width ='100'><b>Age.</td><td width='50' align='left'><input type='text' id ='age' name='age'  
 value='$age' size='10' readonly></td></tr>";

echo"<tr><td width ='100'><b>Sex</td><td width='50' align='left'><input type='text' id ='sex' name='sex'  
 value='$sex' size='10' readonly></td></tr>";

echo"<tr><td width ='50'><b>Weight:</b></td><td width='50' align='left'><input type='text' id ='weight' name='weight' size='30' ></td></tr>";

echo"<tr><td width ='100'><b>Temp.</td><td width='100' align='left'><input type='text' id ='temp' name='temp'  
 size='40' ></td></tr>";
echo"<tr><td width ='100'><b>B.P</td><td width='100' align='left'><input type='text' id ='b_p' name='b_p'  
 size='50' ></td></tr>";

echo"<tr><td width ='100'><b>Pulse</td><td width='50' align='left'><input type='text' id ='height' name='height'  
 value='$height' size='10' ></td></tr>";

echo"<tr><td width ='100'></td><td width='50' align='left'></td></tr>";
echo"<tr><td width ='100'></td><td width='50' align='left'></td></tr>";
echo"<tr><td width ='100'></td><td width='50' align='left'></td></tr>";

echo"<tr><td width ='100'><b>Go to:</td><td width='50' align='left'>";
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
echo"</select></td></tr>";
echo"<tr><td width ='100'></td><td width='50' align='left'></td></tr>";
echo"<tr><td width ='100'></td><td width='50' align='left'></td></tr>";
echo"<tr><td width ='100'></td><td width='50' align='left'></td></tr>";
echo"<tr><td width ='100'></td><td><input type='submit' name='save_cancel'  class='button' value='Save'></td></tr></table>";



?>

<!--/form-->

</div>
   <div style="float:center;">
<p align ='centre'></p>



<!--h2>Admission Details</h2-->
<?php
//echo"<table><tr><td width ='100'><b>Adm.Date </td><td width='50' align='left'><input type='date' id ='adm_date' name='adm_date' 
// value ='$date' size='10' readonly></td></tr>";

//echo"<tr><td width ='100'><b>Dis Date.</td><td width='50' align='left'><input type='date' id ='dis_date' name='dis_date' size='10' readonly></td></tr>";

//echo"<tr><td width ='100'><b>Ward.</td><td width='50' align='left'><input type='text' id ='ward' name='ward' size='40' readonly ></td></tr>";
//echo"<tr><td width ='100'><b>Bed No.</td><td width='50' align='left'><input type='text' id ='bed_no' name='bed_no' size='40' readonly ></td></tr>";







?>







<p align ='centre'>
<table align='center'><td align ='center'>
<?php
//$ids ="uploads".'/'.$id.'s.jpg';
$ids ="uploads".'/'.$image_id.'s.jpg';


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