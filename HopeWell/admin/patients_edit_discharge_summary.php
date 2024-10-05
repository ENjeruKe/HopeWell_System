<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
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
   $SQL= "SELECT * FROM dischargef where id_no ='$id_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   //$query= "SELECT * FROM admitfile where adm_no ='$adm_no'" or die(mysql_error());
   $query= "SELECT * FROM dischargef where id_no ='$id_no'" or die(mysql_error());
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
      $textarea3    = mysql_result($result,$i,"tests_and_results");
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



$company_identity =$company_identity; 
$cdquery="SELECT client_id,patients_name FROM clients";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
$date = date('y-m-d');
//<td>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
$address = "$company<br>$address1<br>$address2";

//echo"<table width ='100%'><tr><th width ='20' bgcolor ='black' align ='left'><font color ='white'>To do<th/><th width ='250' bgcolor ='black' align='left'><font color ='white'>$company , $address2<br>$address3</th><th width ='20' bgcolor ='black' align='left'><font color ='white'>Done</th></tr>";



echo"<table width ='100%'><tr><td align ='center'><h2>$address</h2></td></tr><tr><td align ='left'></td></tr><tr><td align ='left'></td></tr><tr><td align ='left'><h4>DISCHARGE SUMMARY /REFERRAL NOTE</h4></td></tr></table>";




echo"<table width ='100%'><tr><th width ='20' align ='left' bgcolor ='black'><font color ='white'></th><th width ='1' align ='left' bgcolor ='black'><font color ='white'></th><th width ='250' bgcolor ='black' align='left'><font color ='white'></th><th width ='1' align ='left' bgcolor ='black'><font color ='white'></th><th width ='20' align='left' bgcolor ='black'><font color ='white'></th></tr>";







echo"<table>";

echo"<tr><td width ='200' align ='right'><b>In-Patient No.:</b></td><td width ='30'></td><td width='200' align='left'>$adm_no</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Name:</b></td><td width ='30'></td><td width='500' align='left'>$name</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Age:</b></td><td width ='30'></td><td width='500' align='left'>$age</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Sex:</b></td><td width ='30'></td><td width='500' align='left'>$sex</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Physical Add.:</b></td><td width ='30'></td><td width='500' align='left'>-</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Postal Add.:</b></td><td width ='30'></td><td width='500' align='left'>-</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Date of Admission.:</b></td><td width ='30'></td><td width='500' align='left'>$adm_date</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Date of Discharge/Referral:</b></td><td width ='30'></td><td width='500' align='left'>$dis_date</td></tr>";
echo"<tr><td width ='200' align ='right'><b>Ward/Bed No.:</b></td><td width ='30'></td><td width='500' align='left'>$bed_no</td></tr>";

echo"<tr><td width ='200' align ='right'><b>Discharged/Referred by:</b></td><td width ='30'></td><td width='500' align='left'></td></tr>";
echo"<tr><td width ='200' align ='right'><b>Discharge on any condition:</b></td><td width ='30'></td><td width='500' align='left'> as routine/ on request/ against medical advice</td></tr>";
echo"<tr><td width ='200' align ='right'><b>DIAGNOSIS:</b></td><td width ='30'></td><td width='500' align='left'>$diag1,$diag2</td></tr></table><br><br>";

echo"<table width ='100%'><tr><td align ='left'><b>PRESENTING COMPLAINTS PLUS CONDITION ON ADMISSION:</b></td></tr>";
echo"<tr><td align ='left'>$textarea</td></tr></table><br><br>";


echo"<table width ='100%'><tr><td align ='left'><b>INVESTIGATIONS:</b></td></tr>";
echo"<tr><td align ='left'><textarea rows='4' cols='150' name='textarea3'>$textarea3</textarea></td></tr>";
echo"</table><br><br>";


echo"<table width ='100%'><tr><td align ='left'><b>MANAGEMENT SUMMARY:</b></td></tr>";
if ($summary==''){
   echo"<tr><td align ='left'><textarea rows='4' cols='150' name='textarea2'></textarea></td></tr>";
}else{
   echo"<tr><td align ='left'>$summary</td></tr>";
}
echo"</table>";


echo"<table width ='100%'><tr><td align ='left'><b>PATIENTS CONDITION ON DISCHARGE OR REFERRAL:</b></td></tr>";
echo"<tr><td align ='left'><textarea rows='4' cols='150' name='textarea2'>$textarea2</textarea></td></tr></table>";


echo"<h3><u>HOME DRUGS AND ADVICE</u></h3>";
echo"<OBJECT data='auto_search22.php' type='text/html' style='margin: 0; width: 600px; height: 200px; padding 0px; text-align:left;'></OBJECT>";

echo"<table width ='100%'><tr><td  width ='100' align ='left'><b>DATE OF REVISIT:</b></td></tr><tr><td width ='100' align ='left'><input type='date' id ='revisit' name='revisit' size='10' >$revisit</td></tr></table>";



echo"<table width ='100%'><tr><td align ='left'><b>REPORT COMPILRD BY:</b></td></tr>";
echo"<tr><td align ='left'><textarea rows='4' cols='150' name='textarea2'>$compiler</textarea></td></tr></table>";







































$today =date('y-m-d');
$d=strtotime("$today");





//echo"<br><br>";
echo"<p align ='center'><input type='submit' name='save_cancel'  class='button' value='Save Changes'><input type='submit' name='save_cancel'  class='button' value='Save & Print'></p>";

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