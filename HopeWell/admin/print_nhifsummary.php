<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
?>



<?php
if (isset($_GET['accounts3'])){
   $adm_no  = $_GET['accounts3'];
   $ref_no  = $_GET['ref_no'];

   $id_no   = $_GET['accounts'];
   $_SESSION['id_no']= $id_no;
   $_SESSION['ref_nof']= $ref_no;
}

if (isset($_GET['ref_noz'])){
   $m_ref_no = $_SESSION['ref_nof'];
   $query2= "UPDATE medicalfile SET line_no ='Notified' where ref_no ='$m_ref_no'";
   $result2 =mysql_query($query2);
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
      $adm_no  = mysql_result($result,$i,"adm_no");          

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
      $pusername   = mysql_result($result,$i,"reporter");  
      $check_no    = mysql_result($result,$i,"ref_no");  
      $textarea    = "";
      $textarea2    = "";
      $tests       = "";
      $textarea3    = "";
      $last_update = "";
      $diag1       = mysql_result($result,$i,"diag1");  
      $diag2       = mysql_result($result,$i,"diag2");  
      $summary     = mysql_result($result,$i,"manage_summary");  
      $next_app    = mysql_result($result,$i,"next_app");  

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
//Get info from patients file
//---------------------------
$query0= "SELECT * FROM appointmentf where adm_no ='$adm_no'" or die(mysql_error());
$result0 =mysql_query($query0) or die(mysql_error());
$num =mysql_numrows($result0) or die(mysql_error());
$tot =0;
$i = 0;
$SQL= "SELECT * FROM appointmentf where adm_no ='$adm_no'" or die(mysql_error());
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
  {         
     $nhif_no     = mysql_result($result0,$i,"nhif_no");  
     $id_noo       = mysql_result($result0,$i,"id_no");  
     $village       = mysql_result($result0,$i,"village");  
     $telephone = mysql_result($result0,$i,"telephone");
  }
if ($nhif_no==''){
   $nhif_no ='***N/S***';
}
}
?>



<!DOCTYPE html>
<html>
<title>HMIS Global | Paltech System Consultants</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"-->
<head>




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
    var no = document.getElementById('no_one').value;   
    var txt = document.getElementById('amount_one').value;
    txt2 = txt * no;
    document.getElementById("result_one").value = txt2;
}
</script>







<!--body background="images/background.jpg"-->
<body>

<!--frameset cols="50%,50%">
   <frame src="print_nhifsummary.php" />
   <frame src="197.248.31.211/nhifwww-mas/hosp-app/opc/list_visits.html" />
</frameset-->



<div style="width: 100%;">
   <div style="float:left; width: 50%">

<form action ="print_opdsummary.php" method ="GET">
<?php


$id_no = $_SESSION['id_no'];
echo 'ID N2'.$id_no;
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
$date = date('y-m-d');




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
$address = "$company<br>$address1<br>$address2";
//echo"<table width ='100%'><tr><th width ='20' bgcolor ='black' align ='left'><font color ='white'>To do<th/><th width ='250' bgcolor ='black' align='left'><font color ='white'>$company , $address2<br>$address3</th><th width ='20' bgcolor ='black' align='left'><font color ='white'>Done</th></tr>";



//echo"<table width ='100%'><tr><td align ='center'><h2>$address</h2></td></tr><tr><td align ='left'></td></tr><tr><td align ='left'></td></tr><tr><td align ='left'><h4>OPD TREATMENT SUMMARY</h4></td></tr></table>";




//echo"<table width ='100%'><tr><th width ='20' align ='left' bgcolor ='black'><font color ='white'></th><th width ='1' align ='left' bgcolor ='black'><font color ='white'></th><th width ='250' bgcolor ='black' align='left'><font color ='white'></th><th width ='1' align ='left' bgcolor ='black'><font color ='white'></th><th width ='20' align='left' bgcolor ='black'><font color ='white'></th></tr>";







echo"<table>";

echo"<tr><td width ='200' align ='left'><b>In-Patient No.:</b></td><td width ='30'></td><td width='200' align='left'>$adm_no</td></tr>";
echo"<tr><td width ='200' align ='left'><b>Name:</b></td><td width ='30'></td><td width='500' align='left'>$name</td></tr>";
echo"<tr><td width ='200' align ='left'><b>Age:</b></td><td width ='30'></td><td width='500' align='left'>$age</td></tr>";
echo"<tr><td width ='200' align ='left'><b>Sex:</b></td><td width ='30'></td><td width='500' align='left'>$sex</td></tr>";
echo"<tr><td width ='200' align ='left'><b>Telephone:</b></td><td width ='30'></td><td width='500' align='left'>$telephone</td></tr>";
echo"<tr><td width ='200' align ='left'><b>Physical Add.:</b></td><td width ='30'></td><td width='500' align='left'>$village</td></tr>";
echo"<tr><td width ='200' align ='left'><b>Postal Add.:</b></td><td width ='30'></td><td width='500' align='left'>-</td></tr>";
echo"<tr><td width ='200' align ='left'><b>Date :</b></td><td width ='30'></td><td width='500' align='left'>$adm_date</td></tr>";
echo"<tr><td width ='200' align ='left'><b>NHIF No :</b></td><td width ='30'>$nhif_no</td><td width='500' align='left'>ID.No.:$id_noo</td></tr></table><br><br>";

echo"<table width ='100%'><tr><td align ='left'><b><u>DIAGNOSIS</u></b></td></tr><tr><td align='left'>$diag1<br>$diag2</td></tr></table><br>";
$textarea_a = substr($textarea,0,100);
$textarea_b = substr($textarea,100,100);
$textarea_c = substr($textarea,200,100);
$textarea_d = substr($textarea,300,100);
$textarea_e = substr($textarea,400,100);

echo"<table width ='100%'><tr><td align ='left'><b><u>EXTEND OF INJURY OR PROBLEM</u></b></td></tr>";
echo"<tr><td align ='left'>$textarea_a<br>$textarea_b<br>$textarea_c<br>$textarea_d<br>$textarea_e</td></tr></table><br><br>";

$tests =$test1.','.$test2.','.$test3.','.$test4.',<br>'.$test5;

echo"<table width ='100%'><tr><td align ='left'><b><u>INVESTIGATIONS IF ANY</u></b></td></tr>";
echo"<tr><td align ='left'>$test1<br>$test2<br>$test3<br>$test4<br>$test5</td></tr>";
echo"</table><br>";


echo"<table width ='100%' border ='0'><td>";
//Get test cost
//-------------
$sql="SELECT * FROM  auto_transact_inv WHERE invoice_no = '$check_no'";
$result = mysql_query($sql);
$found ='No';
echo "<table width ='600'>
<tr>
<th width ='20' bgcolor ='black'><font color ='white'>ID</th>
<th width ='100' bgcolor ='black'><font color ='white'>Date</th>
<th width ='350' bgcolor ='black'><font color ='white'>Item Description</th>
<th width ='100' bgcolor ='black'><font color ='white'>Charged</th>
<!--th width ='100' bgcolor ='black'><font color ='white'>Paid</th-->
<!--th width ='100' bgcolor ='black'><font color ='white'>Action</th-->

</tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td width ='100'>" . $row['date'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td align ='right'>".  $row['credit_rate']. "</td>";
    $price =  $row['credit_rate'];
    $paid  =  $row['balance'];
    $_SESSION['ref_nog']= $row['invoice_no'];
    $line=  $row['id'];
    $id = $line.'name';
    //echo "<td align ='right'>".  $row['balance']. "</td>";
    //if ($paid >0){
    //    echo "<td>" ."Paid". "</td>";
    //}else{
    //   echo "<td>" ."<a href=javascript:popcontact2('patients_lab_change.php?accountss=$line&accounts33=$price&account3=$id')>"."Edit"."</a>" . "</td>";
    //}
    echo "</tr>";
}
echo "</table>";
echo"</td><td></td></table><br>";
//End of investigation
//--------------------

$atextarea_a = substr($summary,0,100);
$atextarea_b = substr($summary,100,100);
$atextarea_c = substr($summary,200,100);
$atextarea_d = substr($summary,300,100);
$atextarea_e = substr($summary,400,100);

echo"<table width ='100%'><tr><td align ='left'><b><u>MANAGEMENT SUMMARY</u></b></td></tr>";
echo"<tr><td align ='left'>$atextarea_a<br>$atextarea_b<br>$atextarea_c<br>$atextarea_d<br>$atextarea_e</td></tr>";
echo"</table><br>";






echo"<table width ='300'><tr><td  width ='200' align ='left'><b>DATE OF REVISIT:</b></td><td width ='100' align ='left'>$next_app</td></tr></table>";


echo"<table width ='300'><tr><td  width ='200' align ='left'><b>REPORT COMPILRD BY:</b></td><td width ='100' align ='left'>$pusername</td></tr></table>";


$today =date('y-m-d');
$d=strtotime("$today");


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
<!--div style="clear:both">
</div-->
</form>


 <div style="float:left; width: 50%">

 <OBJECT data='http://197.248.31.211/nhifwww-mas/hosp-app/opc/list_visits.html' type='text/html' style='margin: 0; width: 100%; height: 700px; padding 0px; text-align:left;'>
</OBJECT>

<?php
//echo"<table width='100%'><td><a href=javascript:popcontact2('patients_pha_change.php?accountss=$ref_no&accounts33=$ref_noz&account3=$ref_no')></a>Update Claim</h3></a></td><td align ='center'><h3><font color ='red'><a href='print_nhifsummary.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no'>Click here to  Notify</h3></a></td></font></table>";
echo "<table><td>" ."<a href=javascript:popcontact2('update_claim.php?accountss=$line&accounts33=$price&account3=$id')>".'<h3>Update Claim</h3>'."</a>" . "</td><td width ='100'></td>";
echo"<td align ='center'><h3><font color ='red'><a href='print_nhifsummary.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no'>Click here to  Notify</h3></a></td></font></table>";
?>
</div>
<div class="w3-container w3-teal">






  <!--p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p-->
</div>

</body>
</html>