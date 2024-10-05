<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
?>



<?php

if (isset($_GET['accounts3'])){
   $adm_no  = $_GET['accounts3'];
   $id_no   = $_GET['accounts'];
}
$today = date('y/m/d');
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
     $today    = mysql_result($result,$i,"today");
  }


if (isset($_GET['accounts3'])){
   $check_date = date('y-md');
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
      $doctor  = " ";   
      $appointment = mysql_result($result,$i,"date");   
      $name        = mysql_result($result,$i,"name");   
      $adm_date    = mysql_result($result,$i,"date");
      $rct_no      = mysql_result($result,$i,"ref_no");

      $test1_cost = mysql_result($result,$i,"test1_cost");
      $test2_cost = mysql_result($result,$i,"test2_cost");
      $test3_cost = mysql_result($result,$i,"test3_cost");
      $test4_cost = mysql_result($result,$i,"test4_cost");
      $test5_cost = mysql_result($result,$i,"test5_cost");

      $drug1_cost = mysql_result($result,$i,"med1_cost");
      $drug2_cost = mysql_result($result,$i,"med2_cost");
      $drug3_cost = mysql_result($result,$i,"med3_cost");
      $drug4_cost = mysql_result($result,$i,"med4_cost");
      $drug5_cost = mysql_result($result,$i,"med5_cost");
      $drug6_cost = mysql_result($result,$i,"med6_cost");
      $drug7_cost = mysql_result($result,$i,"med7_cost");
      $amount = $test1_cost+$test2_cost+$test3_cost+$test4_cost+$test5_cost+$drug1_cost+$drug2_cost+$drug3_cost+$drug4_cost+$drug5_cost+$drug6_cost+$drug7_cost;
      $i++;
     }


   $SQL= "SELECT * FROM appointmentf where adm_no ='$adm_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   $query= "SELECT * FROM appointmentf where adm_no ='$adm_no'" or die(mysql_error());
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
      $name        = mysql_result($result,$i,"name");   
      $adm_date    = mysql_result($result,$i,"adm_date");
      $dis_date    = mysql_result($result,$i,"dis_date");
      $telephone    = mysql_result($result,$i,"telephone");  
      $status      = mysql_result($result,$i,"status");  
      $sex         = mysql_result($result,$i,"sex");
      $weight      = mysql_result($result,$i,"weight");
      $temp         = mysql_result($result,$i,"temp");
      $b_p         = mysql_result($result,$i,"b_p");
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"payer");  
      $village     = mysql_result($result,$i,"village");  
     $i++;
   }

}
?>



<!DOCTYPE html>
<html>
<title>HMIS Global | Paltech System Consultants</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"-->
<head>







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
    var no = document.getElementById('no_one').value;   
    var txt = document.getElementById('amount_one').value;
    txt2 = txt * no;
    document.getElementById("result_one").value = txt2;
}
</script>







<!--body background="images/background.jpg"-->
<body>









<div style="width: 100%;">
   <!--div style="float:left; width: 50%"-->

<form action ="print_opdsummary.php" method ="GET">
<?php



$company_identity =$company_identity; 
$date = date('y-m-d');
echo"<img src='images/white.jpg' alt='scan' width='12' height='360'>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
$address = "$company<br>$address1<br>$address2";

echo"<table width ='100%'><tr><td></td><td align ='center'>$company</td><td width ='50'></td><td align='right'>22333</td></tr>";

echo"<tr><td><img src='images/white.jpg' alt='scan' width='12' height='5'></td><td align ='right'></td><td width ='100'></td></tr>";

echo"<tr><td></td><td align ='center'>$address1</td><td></td><td align='right'>55555555</td></tr>";

echo"<tr><td><img src='images/white.jpg' alt='scan' width='12' height='4'></td><td align ='right'></td><td width ='100'></td></tr>";

echo"<tr><td></td><td align ='center'>4443948</td><td></td><td align='right'>66666</td></tr>";

echo"<tr><td><img src='images/white.jpg' alt='scan' width='12' height='50'></td><td align ='right'></td><td width ='100'></td></tr>";




$dob = $date-$age;
//echo $dob;
$dis_dates = $dis_date;

$adms_date = strtotime($adm_date);
if ($dis_dates ='0000-00-00 00:00:00'){
   $dis_date= strtotime($today);
   $dis_dates =$today;
}else{
   $dis_date= strtotime($dis_date);
}
$days = $dis_date-$adms_date;
$days = $days/86400;

echo"<table>";

echo"<tr><td width ='400' align ='left'><b></b></td><td width ='30'></td><td width='500' align='center'>$name</td></tr>";

echo"<tr><td><img src='images/white.jpg' alt='scan' width='12' height='5'></td><td align ='right'></td><td width ='100'></td></tr>";

echo"<tr><td width ='200' align ='left'><b></b></td><td width ='30'></td><td width='500' align='left'>$dob</td></tr>";

echo"<tr><td><img src='images/white.jpg' alt='scan' width='12' height='5'></td><td align ='right'></td><td width ='100'></td></tr>";

echo"<tr><td width ='200' align ='left'><b></b></td><td width ='30'></td><td width='200' align='center'>$telephone</td></tr>";

echo"<tr><td><img src='images/white.jpg' alt='scan' width='12' height='4'></td><td align ='right'></td><td width ='100'></td></tr>";

echo"<tr><td width ='200' align ='left'><b></b></td><td width ='30'></td><td width='500' align='center'>$rct_no</td></tr>";

echo"<tr><td><img src='images/white.jpg' alt='scan' width='12' height='5'></td><td align ='right'></td><td width ='100'></td></tr>";

echo"<tr><td width ='200' align ='left'><b></b></td><td width ='30'></td><td width='500' align='left'>-</td></tr>";

echo"<tr><td><img src='images/white.jpg' alt='scan' width='12' height='8'></td><td align ='right'></td><td width ='100'></td></tr>";

echo"<tr><td width ='200' align ='left'><b></b></td><td width ='30'></td><td width='500' align='center'>$village</td></tr>";

echo"<tr><td><img src='images/white.jpg' alt='scan' width='12' height='145'></td><td align ='right'></td><td width ='100'></td></tr>";


echo"<tr><td width ='200' align ='left'><b></b></td><td width ='30'></td><td width='500' align='center'>$adm_date</td></tr>";

echo"<tr><td><img src='images/white.jpg' alt='scan' width='12' height='5'></td><td align ='right'></td><td width ='100'></td></tr>";

echo"<tr><td width ='200' align ='left'><b></b></td><td width ='30'></td><td width='500' align='center'>$dis_dates</td></tr>";

echo"<tr><td><img src='images/white.jpg' alt='scan' width='12' height='5'></td><td align ='right'></td><td width ='100'></td></tr>";

echo"<tr><td width ='200' align ='left'><b></b></td><td width ='30'></td><td width='500' align='left'>$adm_no</td></tr></table>";

echo"<tr><td><img src='images/white.jpg' alt='scan' width='12' height='85'></td><td align ='right'></td><td width ='100'></td></tr></table>";

   $SQL= "SELECT * FROM hdnotef where invoice_no ='$rct_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   $query= "SELECT * FROM hdnotef where invoice_no ='$rct_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i2 = 0;
   $results ='No';
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($result)) 
      { 
      $amount      = mysql_result($result,$i2,"tot_amount");          
      $i2++;
   }


echo"<table width ='900' border='0'><tr><td align ='left'><img src='images/white.jpg' alt='scan' width='10' height='6'></td><td></td><td></td><td></td><td align='center'>'$days</td><td></td><td>$amount</td><td>$amount</td><td></td></tr></table><br>";


?>


<br><br>
</div>


<!--div style="float:center;"-->
 <!--div style="float:left; width: 50%"-->

<p align ='centre'></p>



<!--h2>Admission Details</h2-->
<?php



//echo"<table><tr><td>";
//if ($test1<>''){
//echo"<input type='text' id ='tests1' name='tests1' value='$test1' size='60'></td><td width='10' align='left'><!--input type='text' id ='test1_qty' //name='test1_qty' size='5' value='$test1_qty'--></td>";
//if ($test1_results<>''){
//echo"<td><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>Results</button>";


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