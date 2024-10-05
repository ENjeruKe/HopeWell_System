<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>


<?php
if (isset($_GET['account3'])){ 
   $tooth = $_GET['account3'];
   $adm_no = $_GET['account'];
   if ($tooth=='t1'){
      $query3  = "UPDATE appointmentf SET t1 ='No' where id='$adm_no'";
   }
   if ($tooth=='t2'){
      $query3  = "UPDATE appointmentf SET t2 ='No' where id='$adm_no'";
   }
   if ($tooth=='t3'){
      $query3  = "UPDATE appointmentf SET t3 ='No' where id='$adm_no'";
   }
   if ($tooth=='t4'){
      $query3  = "UPDATE appointmentf SET t4 ='No' where id='$adm_no'";
   }
   if ($tooth=='t5'){
      $query3  = "UPDATE appointmentf SET t5 ='No' where id='$adm_no'";
   }
   if ($tooth=='t6'){
      $query3  = "UPDATE appointmentf SET t6 ='No' where id='$adm_no'";
   }
   if ($tooth=='t7'){
      $query3  = "UPDATE appointmentf SET t7 ='No' where id='$adm_no'";
   }
   if ($tooth=='t8'){
      $query3  = "UPDATE appointmentf SET t8 ='No' where id='$adm_no'";
   }
   if ($tooth=='t9'){
      $query3  = "UPDATE appointmentf SET t9 ='No' where id='$adm_no'";
   }
   if ($tooth=='t10'){
      $query3  = "UPDATE appointmentf SET t10 ='No' where id='$adm_no'";
   }
   if ($tooth=='t11'){
      $query3  = "UPDATE appointmentf SET t11 ='No' where id='$adm_no'";
   }
   if ($tooth=='t12'){
      $query3  = "UPDATE appointmentf SET t12 ='No' where id='$adm_no'";
   }
   if ($tooth=='t13'){
      $query3  = "UPDATE appointmentf SET t13 ='No' where id='$adm_no'";
   }
   if ($tooth=='t14'){
      $query3  = "UPDATE appointmentf SET t14 ='No' where id='$adm_no'";
   }
   if ($tooth=='t15'){
      $query3  = "UPDATE appointmentf SET t15 ='No' where id='$adm_no'";
   }
   if ($tooth=='t18'){
      $query3  = "UPDATE appointmentf SET t18 ='No' where id='$adm_no'";
   }
   if ($tooth=='t19'){
      $query3  = "UPDATE appointmentf SET t19 ='No' where id='$adm_no'";
   }
   if ($tooth=='t20'){
      $query3  = "UPDATE appointmentf SET t20 ='No' where id='$adm_no'";
   }
   if ($tooth=='t21'){
      $query3  = "UPDATE appointmentf SET t21 ='No' where id='$adm_no'";
   }
   if ($tooth=='t22'){
      $query3  = "UPDATE appointmentf SET t22 ='No' where id='$adm_no'";
   }
   if ($tooth=='t23'){
      $query3  = "UPDATE appointmentf SET t23 ='No' where id='$adm_no'";
   }
   if ($tooth=='t24'){
      $query3  = "UPDATE appointmentf SET t24 ='No' where id='$adm_no'";
   }
   if ($tooth=='t25'){
      $query3  = "UPDATE appointmentf SET t25 ='No' where id='$adm_no'";
   }
   if ($tooth=='t26'){
      $query3  = "UPDATE appointmentf SET t26 ='No' where id='$adm_no'";
   }
   if ($tooth=='t27'){
      $query3  = "UPDATE appointmentf SET t27 ='No' where id='$adm_no'";
   }
   if ($tooth=='t28'){
      $query3  = "UPDATE appointmentf SET t28 ='No' where id='$adm_no'";
   }
   if ($tooth=='t29'){
      $query3  = "UPDATE appointmentf SET t29 ='No' where id='$adm_no'";
   }
   if ($tooth=='t30'){
      $query3  = "UPDATE appointmentf SET t30 ='No' where id='$adm_no'";
   }
   if ($tooth=='t31'){
      $query3  = "UPDATE appointmentf SET t31 ='No' where id='$adm_no'";
   }
   if ($tooth=='t32'){
      $query3  = "UPDATE appointmentf SET t32 ='No' where id='$adm_no'";
   }

   $result3 = mysql_query($query3);
}

$doctor  = ''; 
$appointment = ''; 
$name        = ''; 
$date        = ''; 
$telephone   = ''; 
$status      = ''; 
$sex         = ''; 
$age         = ''; 
$payer       = ''; 
$textarea    = ''; 
$time        = ''; 
$email       = ''; 
$t1 = 'No'; 
$t2 = 'No'; 
$t3 = 'No'; 
$t4 = 'No'; 
$t5 = 'No'; 
$t6 = 'No'; 
$t7 = 'No'; 
$t8 = 'No'; 
$t9 = 'No'; 
$t10 = 'No'; 
$t11 = 'No'; 
$t12 = 'No'; 
$t13 = 'No'; 
$t14 = 'No'; 
$t15 = 'No'; 
$t16 = 'No'; 
$t17 = 'No'; 
$t18 = 'No'; 
$t19 = 'No'; 
$t20 = 'No'; 
$t21 = 'No'; 
$t22 = 'No'; 
$t23 = 'No'; 
$t24 = 'No'; 
$t25 = 'No'; 
$t26 = 'No'; 
$t27 = 'No'; 
$t28 = 'No'; 
$t29 = 'No'; 
$t30 = 'No'; 
$t31 = 'No'; 
$t32 = 'No'; 
if (isset($_GET['accounts3']) OR isset($_GET['account3'])){    
   if (isset($_GET['accounts3'])){
      $adm_no  = $_GET['accounts3'];
   }
   $SQL= "SELECT * FROM appointmentf where id ='$adm_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   $query= "SELECT * FROM appointmentf where id ='$adm_no'" or die(mysql_error());
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
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"payer");  
      $textarea    = mysql_result($result,$i,"other_info");  
      $time        = mysql_result($result,$i,"start_time");  
      $email       = mysql_result($result,$i,"email");  
$t1 = mysql_result($result,$i,"t1");
$t2 = mysql_result($result,$i,"t2"); 
$t3 = mysql_result($result,$i,"t3"); 
$t4 = mysql_result($result,$i,"t4");
$t5 = mysql_result($result,$i,"t5"); 
$t6 = mysql_result($result,$i,"t6"); 
$t7 = mysql_result($result,$i,"t7"); 
$t8 = mysql_result($result,$i,"t8"); 
$t9 = mysql_result($result,$i,"t9"); 
$t10 = mysql_result($result,$i,"t10"); 
$t11 = mysql_result($result,$i,"t11"); 
$t12 = mysql_result($result,$i,"t12"); 
$t13 = mysql_result($result,$i,"t13"); 
$t14 = mysql_result($result,$i,"t14"); 
$t15 = mysql_result($result,$i,"t15"); 
$t16 = mysql_result($result,$i,"t16"); 
$t17 = mysql_result($result,$i,"t17"); 
$t18 = mysql_result($result,$i,"t18"); 
$t19 = mysql_result($result,$i,"t19"); 
$t20 = mysql_result($result,$i,"t20"); 
$t21 = mysql_result($result,$i,"t21"); 
$t22 = mysql_result($result,$i,"t22");
$t23 = mysql_result($result,$i,"t23");
$t24 = mysql_result($result,$i,"t24"); 
$t25 = mysql_result($result,$i,"t25"); 
$t26 = mysql_result($result,$i,"t26");
$t27 = mysql_result($result,$i,"t27");
$t28 = mysql_result($result,$i,"t28"); 
$t29 = mysql_result($result,$i,"t29"); 
$t30 = mysql_result($result,$i,"t30");
$t31 = mysql_result($result,$i,"t31");
$t32 = mysql_result($result,$i,"t32"); 
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
<div class="w3-container w3-teal">
  <h1>Doctors's Medical Form | <font color ='red'>Astradental</font></h1>
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
   <div style="float:left; width: 50%">

<form action ="post_inv_supplier.php" method ="GET">
<?php


























$cdquery="SELECT client_id,patients_name FROM clients";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
$date = date('y-m-d');
//<td>";




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

echo"<tr><td width ='50'><b>Custom ID:</b></td><td width='50' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='10' readonly></td></tr>";

echo"<tr><td width ='50'><b>Customer:</b></td><td width='50' align='left'><input type='text' id ='name' name='name'   
value ='$name' size='50' readonly></td></tr>";
echo"<tr><td width ='50'><b>Telephone:</b></td><td width='50' align='left'><input type='text' id ='tel' name='tel'  value ='$telephone' size='20' readonly></td></tr>";

echo"<tr><td width ='50'><b>E-mail:</b></td><td width='50' align='left'><input type='text' id ='email' name='email'  value ='$email' size='30' readonly></td></tr>";

echo"<tr><td width ='100'><b>Appointment.</td><td width='50' align='left'><input type='date' id ='date' name='date'  
 value='$appointment' size='10' readonly></td></tr>";


echo"<tr><td width ='100'><b>Start time.</td><td width='50' align='left'><input type='text' id ='time1' name='time1' 
 value ='$date' size='10' readonly></td></tr>";

echo"<tr><td width ='100'><b>End time.</td><td width='50' align='left'><input type='text' id ='time2' name='time2' size='10' readonly></td></tr>";

echo"<tr><td width ='100'><b>Appointment2.</td><td width='50' align='left'><input type='date' id ='date2' name='date2' size='10' readonly></td></tr>";

echo"<tr><td width ='100'><b>Appt. Status:</td><td width='50' align='left'><input type='text' id ='status' name='status' value ='$status' size='10' readonly></td></tr>";

echo"<tr><td width ='100'><b>Payer:</td><td width='50' align='left'><input type='text' id ='payer' name='payer' value ='$payer' size='40' readonly></td></tr>";

echo"<tr><td width ='50'></td><td width='10' align='left'><h5><font color ='blue'>Treatment</font></h5><textarea rows='5' cols='50' >$textarea</textarea></td></tr>";
echo"</table>";


?>


</form>

</div>
   <div style="float:center;">

<p align ='centre'></p>

<table border='0'><tr>
<?php
if ($t1=='No'){
?>
<td width='60'><img src='uploads\1b.jpg' alt='1b' style='width:100%'></td>

<?php
}else{
?>
<td width='60'><img src='uploads\1g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the first tooth--->
<?php
if ($t2=='No'){
?>
<td width='60'><img src='uploads\2b.jpg' alt='1b' style='width:100%'></td>

<?php
}else{
?>
<td width='60'><img src='uploads\2g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-2-->
<?php
if ($t3=='No'){
?>
<td width='60'><img src='uploads\3b.jpg' alt='1b' style='width:100%'></td>

<?php
}else{
?>
<td width='60'><img src='uploads\3g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-3-->
<?php
if ($t4=='No'){
?>
<td width='60'><img src='uploads\4b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\4g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-4-->
<?php
if ($t5=='No'){
?>
<td width='60'><img src='uploads\5b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\5g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-5-->
<?php
if ($t6=='No'){
?>
<td width='60'><img src='uploads\6b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\6g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-6-->
<?php
if ($t7=='No'){
?>
<td width='60'><img src='uploads\7b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\7g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-7-->
<?php
if ($t8=='No'){
?>
<td width='60'><img src='uploads\8b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\8g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-8-->
<?php
if ($t9=='No'){
?>
<td width='60'><img src='uploads\9b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\9g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-9-->
<?php
if ($t10=='No'){
?>
<td width='60'><img src='uploads\10b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\10g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-10-->
<?php
if ($t11=='No'){
?>
<td width='60'><img src='uploads\11b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\11g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-11-->
<?php
if ($t12=='No'){
?>
<td width='60'><img src='uploads\12b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\12g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-12-->
<?php
if ($t13=='No'){
?>
<td width='60'><img src='uploads\13b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\13g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-13-->
<?php
if ($t14=='No'){
?>
<td width='60'><img src='uploads\14b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\14g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-14-->
<?php
if ($t15=='No'){
?>
<td width='60'><img src='uploads\15b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\15g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-16-->
<td width='60'><img src='uploads\16.jpg' alt='1b' style='width:100%'></td>

<tr>


<?php
$aaa ='t1';
$bbb ='t1';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\1.jpg' alt='1g' style='width:100%'></a></td>     

<?php
$aaa ='t2';
$bbb ='t2';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\2.jpg' alt='2g' style='width:100%'></a></td>     

<?php
$aaa ='t3';
$bbb ='t3';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\3.jpg' alt='3g' style='width:100%'></a></td>     

<?php
$aaa ='t4';
$bbb ='t4';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\4.jpg' alt='3g' style='width:100%'></a></td>     

<?php
$aaa ='t5';
$bbb ='t5';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\5.jpg' alt='3g' style='width:100%'></a></td>     

<?php
$aaa ='t6';
$bbb ='t6';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\6.jpg' alt='3g' style='width:100%'></a></td>     

<?php
$aaa ='t7';
$bbb ='t7';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\7.jpg' alt='3g' style='width:100%'></a></td>     

<?php
$aaa ='t8';
$bbb ='t8';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\8.jpg' alt='3g' style='width:100%'></a></td>     

<?php
$aaa ='t9';
$bbb ='t9';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\9.jpg' alt='3g' style='width:100%'></a></td>     

<?php
$aaa ='t10';
$bbb ='t10';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\10.jpg' alt='3g' style='width:100%'></a></td>     

<?php
$aaa ='t11';
$bbb ='t11';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\11.jpg' alt='3g' style='width:100%'></a></td>     

<?php
$aaa ='t12';
$bbb ='t12';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\12.jpg' alt='3g' style='width:100%'></a></td>     

<?php
$aaa ='t13';
$bbb ='t13';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\13.jpg' alt='3g' style='width:100%'></a></td>     

<?php
$aaa ='t14';
$bbb ='t14';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\14.jpg' alt='3g' style='width:100%'></a></td>  

<?php
$aaa ='t15';
$bbb ='t15';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\15.jpg' alt='3g' style='width:100%'></a></td>     
<td width='60'><img src="uploads\16l.jpg" alt="1g" style="width:100%"></td></tr>






<tr>
<?php
$aaa ='t32';
$bbb ='t32';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\32.jpg' alt='32g' style='width:100%'></a></td>     

<?php
$aaa ='t31';
$bbb ='t31';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\31.jpg' alt='31g' style='width:100%'></a></td>     

<?php
$aaa ='t30';
$bbb ='t30';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\30.jpg' alt='30g' style='width:100%'></a></td>     

<?php
$aaa ='t29';
$bbb ='t29';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\29.jpg' alt='29g' style='width:100%'></a></td>     

<?php
$aaa ='t28';
$bbb ='t28';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\28.jpg' alt='29g' style='width:100%'></a></td>     

<?php
$aaa ='t27';
$bbb ='t27';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\27.jpg' alt='29g' style='width:100%'></a></td>     

<?php
$aaa ='t26';
$bbb ='t26';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\26.jpg' alt='29g' style='width:100%'></a></td>     

<?php
$aaa ='t25';
$bbb ='t25';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\25.jpg' alt='29g' style='width:100%'></a></td>     

<?php
$aaa ='t24';
$bbb ='t24';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\24.jpg' alt='29g' style='width:100%'></a></td>     

<?php
$aaa ='t23';
$bbb ='t23';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\23.jpg' alt='29g' style='width:100%'></a></td>     

<?php
$aaa ='t22';
$bbb ='t22';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\22.jpg' alt='29g' style='width:100%'></a></td>     

<?php
$aaa ='t21';
$bbb ='t21';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\21.jpg' alt='29g' style='width:100%'></a></td>     

<?php
$aaa ='t20';
$bbb ='t20';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\20.jpg' alt='20g' style='width:100%'></a></td>     

<?php
$aaa ='t19';
$bbb ='t19';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\19.jpg' alt='29g' style='width:100%'></a></td>     

<?php
$aaa ='t18';
$bbb ='t18';
echo"<td width ='60'><a href='doctors_form.php?account=$adm_no&account3=$bbb'>";
?>
<img src='uploads\18.jpg' alt='18g' style='width:100%'></a></td>     

<td width='60'><a href='a'><img src="uploads\17l.jpg" alt="1g" style="width:100%"></a></td></tr>

<tr>


<?php
if ($t32=='No'){
?>
<td width='60'><img src='uploads\32b.jpg' alt='1b' style='width:100%'></td>

<?php
}else{
?>
<td width='60'><img src='uploads\32g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the first tooth--->
<?php
if ($t31=='No'){
?>
<td width='60'><img src='uploads\31b.jpg' alt='1b' style='width:100%'></td>

<?php
}else{
?>
<td width='60'><img src='uploads\31g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-2-->
<?php
if ($t30=='No'){
?>
<td width='60'><img src='uploads\30b.jpg' alt='1b' style='width:100%'></td>

<?php
}else{
?>
<td width='60'><img src='uploads\30g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-3-->
<?php
if ($t29=='No'){
?>
<td width='60'><img src='uploads\29b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\29g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-4-->
<?php
if ($t28=='No'){
?>
<td width='60'><img src='uploads\28b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\28g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-5-->
<?php
if ($t27=='No'){
?>
<td width='60'><img src='uploads\27b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\27g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-6-->
<?php
if ($t26=='No'){
?>
<td width='60'><img src='uploads\26b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\26g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-7-->
<?php
if ($t25=='No'){
?>
<td width='60'><img src='uploads\25b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\25g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-8-->
<?php
if ($t24=='No'){
?>
<td width='60'><img src='uploads\24b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\24g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-9-->
<?php
if ($t23=='No'){
?>
<td width='60'><img src='uploads\23b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\23g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-10-->
<?php
if ($t22=='No'){
?>
<td width='60'><img src='uploads\22b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\22g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-11-->
<?php
if ($t21=='No'){
?>
<td width='60'><img src='uploads\21b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\21g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-12-->
<?php
if ($t20=='No'){
?>
<td width='60'><img src='uploads\20b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\20g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-13-->
<?php
if ($t19=='No'){
?>
<td width='60'><img src='uploads\19b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\19g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<!------------------End of the tooth-14-->
<?php
if ($t18=='No'){
?>
<td width='60'><img src='uploads\18b.jpg' alt='1b' style='width:100%'></td>
<?php
}else{
?>
<td width='60'><img src='uploads\18g.jpg' alt='1g' style='width:100%'></td>
<?php
}
?>
<td width='60'><img src="uploads\17.jpg" alt="1g" style="width:100%"></td></tr>


</table><br>

<p align ='centre'>
<table align='center'><tr><td align ='center'>Format: 07xxxxxxxxs.jpg</td></tr><td align='centre'>
<?php
//$ids ="uploads".'/'.$id.'s.jpg';
$ids ="uploads".'/'.$image_id.'s.jpg';

//echo $ids;

echo"<img src=$ids alt='scan' style='width:100%'>";
?>
</td></tr></table>
<input type='submit' name='save_cancel'  class='button' value='Save'>
<input type="submit" name="Submit"  class="button" value="Attach Scan" onclick="return popitup22('upload_form.php')"/>
</p>
   </div>
</div>
<div style="clear:both"></div>











</div>
<div class="w3-container w3-teal">
  <p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p>
</div>

</body>
</html>