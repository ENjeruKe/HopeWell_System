<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];

?>


<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<head>





<body>
<div class="w3-container w3-teal">
  <h1>Client's Details | <font color ='red'>Astradental</font></h1>
</div>
<!--img src="img_car.jpg" alt="Car" style="width:100%"-->
<div class="w3-container">










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
   <div style="float:left; width: 70%">

<form action ="post_inv_supplier.php" method ="GET">
<?php


























$company_identity =$company_identity;

 
 $cdquery="SELECT client_id,patients_name FROM clients";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            


$date = date('y-m-d');
//<td>";


?>





 <?php


//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////

echo"<table width ='100%' height ='100%'><tr><td width ='100' align ='left'><b>Doctor:</b></td><td>";
echo"<select id='doc_account' name='doc_account'>";
$cdquery="SELECT account_name FROM doctorsfile";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM suppliersfile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";
echo"</td></tr></table>"; 
echo"<font color ='red'>............................................................</font>";

echo"<table>";

echo"<tr><td width ='50'><b>Custom ID:</b></td><td width='50' align='left'><input type='text' id ='narration' name='narration' size='10' readonly></td></tr>";

echo"<tr><td width ='50'><b>Customer:</b></td><td width='50' align='left'><input type='text' id ='narration' name='narration' size='50' readonly></td></tr>";
echo"<tr><td width ='50'><b>Telephone:</b></td><td width='50' align='left'><input type='text' id ='tel' name='tel' size='20' required></td></tr>";

echo"<tr><td width ='50'><b>E-mail:</b></td><td width='50' align='left'><input type='text' id ='email' name='email' size='30'></td></tr>";

echo"<tr><td width ='100'><b>Appointment.</td><td width='50' align='left'><input type='date' id ='date' name='date' size='10' readonly></td></tr>";

echo"<tr><td width ='100'><b>Start time.</td><td width='50' align='left'><input type='text' id ='time1' name='time1' size='10' required></td></tr>";

echo"<tr><td width ='100'><b>End time.</td><td width='50' align='left'><input type='text' id ='time2' name='time2' size='10' required></td></tr>";

echo"<tr><td width ='100'><b>Appointment2.</td><td width='50' align='left'><input type='date' id ='date2' name='date2' size='10' required></td></tr>";

echo"<tr><td width ='100'><b>Appt. Status:</td><td width='50' align='left'>";
//<input type='text' id ='date' name='date' size='10' value ='$mydate'>


echo"<select>";
echo"<option value='Scheduled'>Scheduled</option>";
echo"<option value='Confirmed'>Confirmed</option>";
echo"<option value='Canceled'>Canceled</option>";
echo"<option value='No-Show'>No-Show</option>";
echo"<option value='Checked in'>Checked in</option>";
echo"<option value='Completed'>Completed</option>";
echo"</select></td></tr>";


//Select the trans type if cash,cheque,visa or any other
//------------------------------------------------------

echo"<tr><td width ='100' align ='left' border ='3'><b>Paying A/c:</b></td><td>";
echo"<select id='db_account' name='db_account'>";
$cdquery="SELECT account_name FROM debtorsfile";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM suppliersfile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";
echo"</td></tr>"; 


echo"<tr><td width ='50'></td><td width='10' align='left'><h4>Other Information</h4><textarea rows='5' cols='50'></textarea></td></tr>";
echo"</table>";



      //echo"</table>";
?>


</form>

</div>
   <div style="float:center;">

<p align ='centre'></p>
<table><td><img src="dental-before.jpg" alt="Car" style="width:100%"></td></table><br>

<!--p align ='centre'></p-->
<table><td><img src="dental-after.jpg" alt="Car" style="width:100%">
</td></table>
<input type='submit' name='save_cancel'  class='button' value='Save'>
<input type="submit" name="Submit"  class="button" value="Attach Scan" onclick="return popitup22('upload_form.php')"/>

   </div>
</div>
<div style="clear:both"></div>











</div>
<div class="w3-container w3-teal">
  <p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p>
</div>

</body>
</html>