<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
?>



<?php
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
  }


if (isset($_GET['account3'])){ 
   $tooth = $_GET['account3'];
   $adm_no = $_GET['account3'];

   //$result3 = mysql_query($query3);
}


if (isset($_GET['accounts3']) OR isset($_GET['account3'])){    
   $check_date = date('y-md');
   if (isset($_GET['accounts3'])){
      $adm_no  = $_GET['accounts3'];
      $id_no   = $_GET['accounts'];
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
      $doctor  = " ";   
      $appointment = mysql_result($result,$i,"date");   
      $name        = mysql_result($result,$i,"name");   
      $adm_date    = mysql_result($result,$i,"date");  
      $adm_time    = " ";  
      $telephone   = "";  
      $status      = mysql_result($result,$i,"status");  
      $sex         = mysql_result($result,$i,"sex");
      $weight      = mysql_result($result,$i,"weight");
      $bed_no      = "";
      $height      = "";
      $temp         = mysql_result($result,$i,"temp");
      $b_p         = mysql_result($result,$i,"b_p");
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"payer");  
      $textarea    = "";
      $textarea2    = "";
      $tests       = "";
      $textarea3    = "";
      $last_update = "";
      $diag1       = mysql_result($result,$i,"diag1");  
      $diag2       = mysql_result($result,$i,"diag2");  
      $summary     = mysql_result($result,$i,"manage_summary");  
      $next_app    = mysql_result($result,$i,"next_app");  
      $pusername   = mysql_result($result,$i,"reporter");  

      $village     = "";
      $subloc      = "";
      $chief       = "";
      $subchief    = "";
      $ward  = "";
      $ref_nos     = "id";  

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



<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=300,width=850');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>


</head>
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">





<table><td width ='100'><input type="submit" name="Submit"  class="button" value="Save & Print" onclick="return popcontact5('print_opdsummary.php')"/></td></table>




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
   <!--div style="float:left; width: 50%"-->

<form action ="opd_treatment_summary.php" method ="GET">
<?php



   $adms_date = substr($date,0,11);
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
      $summary     = mysql_result($result,$i,"manage_summary");  
      $next_app    = mysql_result($result,$i,"next_app");  
      $pusername   = mysql_result($result,$i,"reporter");  

      $i++;
}



$company_identity =$company_identity; 
//$cdquery="SELECT client_id,patients_name FROM clients";
//$cdresult=mysql_query($cdquery) or die ("Query to get data //from firsttable failed: ".mysql_error());           
$date = date('y-m-d');
//<td>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
$address = "$company<br>$address1<br>$address2";

//echo"<table width ='100%'><tr><th width ='20' bgcolor ='black' align ='left'><font color ='white'>To do<th/><th width ='250' bgcolor ='black' align='left'><font color ='white'>$company , $address2<br>$address3</th><th width ='20' bgcolor ='black' align='left'><font color ='white'>Done</th></tr>";



echo"<table width ='100%'><tr><td align ='center'><h2>$address</h2></td></tr><tr><td align ='left'></td></tr><tr><td align ='left'></td></tr><tr><td align ='left'><h4>OPD TREATMENT SUMMARY</h4></td></tr></table>";


echo"<table width ='100%'><tr><th width ='20' align ='left' bgcolor ='black'><font color ='white'></th><th width ='1' align ='left' bgcolor ='black'><font color ='white'></th><th width ='250' bgcolor ='black' align='left'><font color ='white'></th><th width ='1' align ='left' bgcolor ='black'><font color ='white'></th><th width ='20' align='left' bgcolor ='black'><font color ='white'></th></tr>";







echo"<table>";

echo"<tr><td width ='200' align ='right'><b>In-Patient No.:</b></td><td width ='30'></td><td width='200' align='left'>$adm_no</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Name:</b></td><td width ='30'></td><td width='500' align='left'>$name</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Age:</b></td><td width ='30'></td><td width='500' align='left'>$age</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Sex:</b></td><td width ='30'></td><td width='500' align='left'>$sex</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Physical Add.:</b></td><td width ='30'></td><td width='500' align='left'>-</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Postal Add.:</b></td><td width ='30'></td><td width='500' align='left'>-</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Date :</b></td><td width ='30'></td><td width='500' align='left'>$adm_date</td></tr></table><br><br>";
echo"<table width ='100%'><tr><td align ='left'><b><u>DIAGNOSIS</u></b></td></tr><tr><td align='left'>$diag1<br>$diag2</td></tr></table><br><br>";

echo"<table width ='100%'><tr><td align ='left'><b><u>EXTEND OF INJURY OR PROBLEM</u></b></td></tr>";
echo"<tr><td align ='left'>$textarea</td></tr></table><br><br>";

$tests =$test1.','.$test2.','.$test3.','.$test4.',<br>'.$test5;

echo"<table width ='100%'><tr><td align ='left'><b><u>INVESTIGATIONS IF ANY</u></b></td></tr>";
echo"<tr><td align ='left'>$test1<br>$test2<br>$test3<br>$test4<br>$test5</td></tr>";
echo"</table><br><br>";


echo"<table width ='100%'><tr><td align ='left'><b><u>MANAGEMENT SUMMARY</u></b></td></tr>";
if ($summary==''){
   echo"<tr><td align ='left'><textarea rows='4' cols='150' name='textarea'></textarea></td></tr>";
}else{
   echo"<tr><td align ='left'>$summary</td></tr>";
}
echo"</table><br><br>";


echo"<table width ='300'><tr><td  width ='200' align ='left'><b>DATE OF REVISIT:</b></td><td width ='100' align ='left'><input type='date' id ='next_app' name='next_app' size='10' value ='$next_app'></td></tr></table>";
if ($pusername==''){
   $pusername =$username;
}

echo"<table width ='300'><tr><td  width ='200' align ='left'><b>REPORT COMPILRD BY:</b></td><td width ='100' align ='left'><input type='text' id ='reporter' name='reporter' size='10' value ='$pusername'></td></tr></table>";


$today =date('y-m-d');
$d=strtotime("$today");

$_SESSION['accounts_3'] = $adm_no;
$_SESSION['account_s'] = $id_no;


echo"<p align ='center'><input type='submit' name='save_cancel'  class='button' value='Back to Next Patient'/></p>";

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