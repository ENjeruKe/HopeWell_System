<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>﻿


<!DOCTYPE html>
<html>
<title>HMIS Global | Paltech System Consultants</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<head>





<body>

<div class="w3-container w3-teal">
  <h4><font color ='red'>



<form action ="medical_form.php" method ="GET">
<?php
$mdate =date('y-m-d');
echo"<input type='submit' name='Submit'  class='button' value='Search Client'>";
echo"<input type='text' name='search' size='40'>Search by:";
echo"<select name ='search_by'>";
echo"<option value='Name'>Name</option>";
echo"<option value='Mobile'>Mobile</option>";
echo"<option value='Doctor'>Doctor</option>";
echo"<option value='Date'>Date</option></select>";
?>
</h4>
</FORM>
</div>
<!--img src="img_car.jpg" alt="Car" style="width:100%"-->

<div class="w3-container">

<img src='chiromo-logo2.jpg' alt='statement' height='40' width='150'>
<hr>
















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







<body>

<?php

  


$mleast =123552620;
$mdate =date('y-m-d');
$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Date'){
     $query = "select * FROM  appointmentf WHERE app_date LIKE '%$search%' ORDER BY name" ;
     $SQL = "select * FROM  appointmentf WHERE app_date LIKE '%$search%' ORDER BY name" ;
   }
   if ($search_by =='Mobile'){
     $query = "select * FROM  appointmentf WHERE telephone LIKE '%$search%' ORDER BY name" ;
     $SQL   = "select * FROM  appointmentf WHERE telephone LIKE '%$search%' ORDER BY name" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  appointmentf WHERE name LIKE '%$search%' ORDER BY name" ;
     $SQL   = "select * FROM  appointmentf WHERE name LIKE '%$search%' ORDER BY name" ;
   }
   if ($search_by =='Doctor'){
     $query = "select * FROM  appointmentf WHERE doctor LIKE '%$search%' ORDER BY name" ;
     $SQL   = "select * FROM  appointmentf WHERE doctor LIKE '%$search%' ORDER BY name" ;
   }
 }else{
   $query= "SELECT * FROM appointmentf ORDER BY app_date DESC" or die(mysql_error());
   $SQL  = "SELECT * FROM appointmentf ORDER BY app_date DESC" or die(mysql_error());
}


$result =mysql_query($query) or die(mysql_error());

$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;






      echo"<table width='860' border ='0' bgcolor ='green'> ";


$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"id");  
      $desc    = mysql_result($result,$i,"name");   
      $rate    = mysql_result($result,$i,"doctor");   
      $code   = mysql_result($result,$i,"payer");   
      $update = mysql_result($result,$i,"app_date");  
      $contact = mysql_result($result,$i,"appointment2");  
      $street  = mysql_result($result,$i,"status");
      $time    = mysql_result($result,$i,"start_time");
      $phone  = mysql_result($result,$i,"telephone");
      $info   = mysql_result($result,$i,"other_info");
      $age  = mysql_result($result,$i,"age");
      $sex  = mysql_result($result,$i,"sex");

      $codes2 = 0; 
      $update2 = $codes2; 
      //&& -$update;
      $tot = $tot +$update2;
      
      $update2 = number_format($update2);
      echo"<tr bgcolor ='white'>";
      $bb =$row['id'];        
      echo"<td width ='150' align ='left'>$desc";
      echo"</td>";            
      echo"<td width ='50'>";      
      echo"$phone";
      echo"</td>";      
      echo"<td width ='50'>";      
      echo"$update";
      echo"</td>";      
      echo"<td width ='50'>";      
      echo"$time";
      echo"</td>";      
      echo"<td width ='20'>";      
      echo"$sex";
      echo"</td>";      
      echo"<td width ='10'>";      
      echo"$age";
      echo"</td>";      
      echo"<td width ='100'>";
      echo"$rate";
      echo"</td>";

      $bb =$row['id'];        
      $aa =$row['id'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      $aa8=$row['payer'];
      $aa9=$row['app_date']; 
echo"<td width ='100' align ='right'><a href=javascript:popcontact506('doctors_form.php?accounts=$aa&accounts3=$bb')>$street<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a></td>";     

echo"<td width ='20' align ='right'>$info</td>";     
echo"</tr>";  
//</table>
//echo"<hr>"; 
      $i++;        
}
      echo"</table>";


echo"<table>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";     
      echo"</td>";      
echo"<td width ='200'>";
      echo"</td>";
echo"<td width ='150'><h4>";
      echo"</h4></td>";
echo"<td width ='100' align ='right'>";
echo"</td>";
echo"<td width ='120' align ='right'>";
echo"</td>";
echo"<td width ='100' align ='right'><h4></h4></td>";
echo"<td width ='50'></td>";

echo"</tr>";
      echo"</table>";
?>


</div>
<!--div class="w3-container w3-teal">
  <p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p>
</div-->

</body>
</html>


























































































﻿

