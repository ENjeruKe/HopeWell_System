<?php
   session_start();
require('open_database.php');
require('../connect.php');
$company_identity = $_SESSION['company'];
$payer =$_SESSION['payer'];
$ref_nos= $_SESSION['ref_nos'];
$item_desc= $_SESSION['item_desc'];

?>



<?php

$date =date('Y-m-d');

if (isset($_GET['accountx'])){
   $line  = $_GET['accountx']; 
   $tesss  = $_GET['accountp2']; 
  //********************payer */
if($payer==''){
   $query13 ="UPDATE auto_transact SET selected ='pay' WHERE id='$line'";
   $result13 =mysql_query($query13);
}else{
   $query15= "UPDATE auto_transact_inv SET selected ='pay' WHERE id='$line'";
   $result15 =mysql_query($query15);
} 
//************************end */


$query17 ="UPDATE ranges SET selected ='yes' WHERE invoice_no='$ref_nos' and date ='$date' and description ='$tesss'";
$result17 =mysql_query($query17);

}
//------------------------------------------------------------------------------------------------------------------------
if (isset($_GET['accountx2'])){
   $line  = $_GET['accountx2']; 
   $tesss  = $_GET['accountp2']; 
   //********************payer */
if($payer==''){
   $query14= "UPDATE auto_transact SET selected ='' WHERE id='$line'";
   $result14 =mysql_query($query14);
}else{
   $query16= "UPDATE auto_transact_inv SET selected ='' WHERE id='$line'";
   $result16 =mysql_query($query16);
} 


//************************end */


$query17 ="UPDATE ranges SET selected ='' WHERE invoice_no='$ref_nos' and date ='$date' and description ='$tesss'";
$result17 =mysql_query($query17);

}
//-----------------------------------------------------------------------------------------------

if (isset($_GET['accounts3']) OR isset($_GET['accountso'])){    
   $check_date = date('y-m-d');
   $test1_result='';
   $test2_result='';
   $test3_result='';
   $test4_result='';
   $test5_result='';


   if (isset($_GET['accounts3']) OR isset($_GET['accountso'])){
      $adm_no  = $_GET['accounts3'];
      $ref_nos  = $_GET['accounts'];
      $xu  = $_GET['accountso'];
      $_SESSION['xu'] = $xu;
      $_SESSION['adm_no'] = $adm_no;

   $xu=   $_SESSION['xu'];
   $adm_no=   $_SESSION['adm_no'];

    //  $_SESSION['type'] = $type;     
  }


if($xu=='Outpatient'){

	$result = $db->prepare("SELECT * FROM medicalfile where ref_no ='$ref_nos'");
	//$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
      $id      =$row['adm_no'];          
      $doctor  =$row['doctor'];   
      $appointment =$row['date'];   
      $name        =$row['name'];   
      $date        =$row['date'];  
      $telephone   =$row['description'];  
      $status      =$row['status'];  
      $sex         =$row['sex'];
      $weight      =$row['weight'];
      $height      =$row['height'];
      $temp         =$row['temp'];
      $b_p         =$row['b_p'];
      $agex         =$row['age'];  
      $payer       =$row['gl_account']; 
     // $ref_nos       =$row['ref_no'];
  

   }

}else{
	$result = $db->prepare("SELECT * FROM ipmedicalfile where line_no ='$ref_nos'");
	//$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
      $id      =$row['adm_no'];          
      $doctor  =$row['doctor'];   
      $appointment =$row['date'];   
      $name        =$row['name'];   
      $date        =$row['date'];  
      $telephone   =$row['description'];  
      $status      =$row['status'];  
      $sex         =$row['sex'];
      $weight      =$row['weight'];
      $height      =$row['height'];
      $temp         =$row['temp'];
      $b_p         =$row['b_p'];
      $agex         =$row['age'];  
      $payer       =$row['gl_account']; 
    //  $ref_nos       =$row['line_no'];
}




}  



$axe =$agex;

if($axe < 100){
$age =$axe.' y';
}else{
$mtod =date("Y-m-d","$axe");
//$today =''
$today = date("Y-m-d");
$diff = date_diff(date_create($mtod), date_create($today));
//echo 'Age is '.$diff->format('%y'.'y '.'%m'.'m '.'%d'.'d');

$age=$diff->format('%y'.'y '.'%m'.'m '.'%d'.'d');
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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">





<body>
<!--div class="w3-container w3-teal">
  <h1>Update Triage Form | <font color ='yellow'>HMIS</font></h1>
</div>
<div class="w3-container"-->




<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 10px;
   /* height: 900px;  Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column {
        width: 50%;
    }
}
</style>




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


<!--div style="width: 100%;"-->
<div style="float:left; width: 100%">


<form action ="patients_register_lab.php" method ="GET">
<?php
//      $_SESSION['payer'] = $payer;


$company_identity =$company_identity; 
$date = date('y-m-d');
//<td>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
$_SESSION['ref_nos'] = $ref_nos;
$id_no =$ref_nos;
$_SESSION['payer'] = $payer;
//$id_no =$ref_nos;


echo"<table width ='100%' height ='100%'><tr><td width ='10%' align ='left'><b>Payer:</b></td><td width ='90%'>";

echo"<input type='text' id ='payer' name='payer'
value ='$payer' size='45%' readonly>";
echo"</td></tr></table>"; 

echo"<table width ='100%'><tr>";

echo"<td width ='10%'><b>Patient ID:</b></td><td width='10%' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='10' readonly></td><td width ='10%'><b>Name:</b></td><td width='30%' align='left'><input type='text' id ='customer' name='customer'
value ='$name' size='20%' readonly></td>";

echo"<td width ='5%'><b>Age.</td><td width='5%' align='left'><input type='text' id ='age' name='age'  
 value='$age' size='5%' readonly></td><td width ='5%'><b>Sex</td><td width='5%' align='left'><input type='text' id ='sex' name='sex'  
 value='$sex' size='5%' readonly></td></tr><tr><td width ='5%'><b>Weight:</b></td><td width='5%' align='left'><input type='text' id ='weight' name='weight' size='5%' value='$weight' ></td>";

echo"<td width ='5%'><b>Type.</td><td width='5%' align='left'><input type='text' id ='type' name='type' size='5%' value='$xu' ></td><td width ='5%'><b>Ref:</td><td width='5%' align='left'><input type='text' id ='height' name='height'  
 value='$ref_nos' size='5%' readonly></td></tr></table>";


//here
?>
<br>
<input type="submit" name="Submit"  class="button" value="Attach Scan" onclick="return popitup22('upload_form.php')"/>

<br>



<?php


echo "<br><br><table width ='100%'><th width ='40%' align ='left'><font color ='red'>Med. Test Requested</font></th><th width ='50%' align ='right'>";
echo"</th></table>";


if ($payer==''){
   $sql="SELECT * FROM  auto_transact WHERE invoice_no = '$ref_nos' and location<>'Drug'";
}else{
   $sql="SELECT * FROM  auto_transact_inv WHERE invoice_no = '$ref_nos' and location<>'Drug'";
}
$result = mysql_query($sql);
$found ='No';
echo "<table width ='100%'>
<tr>
<th width ='5%' bgcolor ='black'><font color ='white'>ID</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Date</th>
<th width ='35%' bgcolor ='black'><font color ='white'>Item Description</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Charged</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Paid</th>
<th width ='30%' bgcolor ='black'><font color ='white'>Results</th>
<th width ='30%' bgcolor ='black'><font color ='white'>Action</th>

</tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td width ='100'>" . $row['date'] . "</td>";
    
    echo "<td>" . $row['description'] . "</td>";
    $item_desc =  $row['description'];
    $bsc =  $row['description'];
    $tesss =  $row['description'];
    echo "<td align ='right'>".  $row['credit_rate']. "</td>";
    $price =  $row['credit_rate'];
    $paid  =  $row['balance'];

    $line=  $row['id'];
    $lin2=  $row['selected'];
    //$id = $line.'name';
   echo "<td align ='right'>".  $row['balance']. "</td>";

    $total =  $row['credit_rate'];
    $totals = $totals+$total-$paid;
 //   if ($paid >0 or $status=='Completed'){
 //      $selected = 'Yes';
 //      echo "<td>" ."Paid". "</td>";
 //   }
    $categorised ='No';
    
//else{

$myu = substr($item_desc,6,14);
 $str = $bsc;
 
if($item_desc=='Full Haemogram' || $item_desc=='full haemogram CASH' || $item_desc=='Full haemogram s' || $item_desc=='FULL HAEMOGRAM' ){
    $categorised ='Yes';
echo "<td><a href=javascript:popcontact2('fhb_ranges.php?accountss=$line&accounts33=$ref_nos&account3=$id')>Results InPut</a></td>";

}

if ($item_desc=='URINALYSIS'){
       $categorised ='Yes';
echo "<td><a href=javascript:popcontact2('urine_ranges.php?accountss=$line&accounts33=$ref_nos&account3=$id')>Results InPut</a></td>";
}

if ($item_desc=='INR test' or $item_desc=='PT/INR'){
       $categorised ='Yes';
echo "<td><a href=javascript:popcontact2('inr_ranges.php?accountss=$line&accounts33=$ref_nos&account3=$id')>Results InPut</a></td>";
}

if ($item_desc=='UECS' or $item_desc=='Lab UECS' or $item_desc=='RENAL FUNCTION TEST'){
       $categorised ='Yes';
echo "<td><a href=javascript:popcontact22('uecs_ranges.php?accountss=$line&accounts33=$ref_nos&account3=$id')>Results InPut</a></td>";
}

if ($item_desc=='LIPID PROFILE' or $item_desc=='Fasting Lipid Profile'){
       $categorised ='Yes';
echo "<td><a href=javascript:popcontact2('lp_ranges.php?accountss=$line&accounts33=$ref_nos&account3=$id')>Results InPut</a></td>";
}
$test =$item_desc;

if ($test=='LFTS' || $test=='LIVER FUNCTION TEST'){
       $categorised ='Yes';
echo "<td><a href=javascript:popcontact2('lft_ranges.php?accountss=$line&accounts33=$ref_nos&account3=$id')>Results InPut</a></td>";
}


if ($item_desc=='THYROID FUNCTION TEST'){
       $categorised ='Yes';
echo "<td><a href=javascript:popcontact2('tfp_ranges.php?accountss=$line&accounts33=$ref_nos&account3=$id')>Results InPut</a></td>";
}

if ($item_desc=='ANC Profile'){
       $categorised ='Yes';
echo "<td><a href=javascript:popcontact2('anc_ranges.php?accountss=$line&accounts33=$ref_nos&account3=$id')>Results InPut</a></td>";
}
$mm = substr($item_desc,0,13);

if ($item_desc=='STOOL FOR O/C' || $item_desc=='STOOL FOR O/C' ){
$categorised ='Yes';
echo "<td><a href=javascript:popcontact2('stool_ranges.php?accountss=$line&accounts33=$ref_nos&account3=$id')>Results InPut</a></td>";
}

if ($categorised=='No')
echo "<td><a href=javascript:popcontact2('ranges.php?accountss=$line&accounts33=$ref_nos&account3=$id')>Results InPut</a></td>";

$item_desc = $_SESSION['item_desc'];


//$line

if ($paid >0 or $status=='Completed'){
   $selected = 'Paid';
   echo "<td>" ."Paid". "</td>";
}else{

if ($lin2==''){//$aaa ='t6';
//$bbb ='t6';
echo"<td width ='60'><a href='patients_lab_edit.php?accountx=$line&accountp2=$tesss&accounts3=$adm_no&accounts=$ref_nos&accountso=$xu'>";

echo"<img src='ico\Delete.ico' alt='3g' style='width:50%'></a></td>";     
}else{

   echo"<td width ='60'><a href='patients_lab_edit.php?accountx2=$line&accountp2=$tesss&accounts3=$adm_no&accounts=$ref_nos&accountso=$xu'>";

   echo"<img src='ico\Add.ico' alt='3g' style='width:50%'></a></td>";     
      
}
}



//echo"<td><input id='' class='uniform_on' name='checkbox[]' type='checkbox' value='$line'></td>";


$done = $_SESSION['done'];

}
//echo"<td>$item_desc</td>";
 
//echo"<td><input id='' class='uniform_on' name='selector[]' type='checkbox' value=$id></td>";

echo "</tr>";

echo "</table>";


































echo"<form action ='patients_register_lab.php' method ='GET'>";
$payer = $_SESSION['payer'];
$_SESSION['payer'] = $payer;



?>


<br><br>

<?php  
//}


//}else{
//if ($payer=='1234'){
   //Check for Inv payment tests
   //----------------------------
 //  if ($test1<>''){
 //  echo"<tr><td><input type='text' id ='test1' name='test1' value='$test1' size='100' readonly><br>";
//   echo"<textarea rows='6' cols='100' id='test1_result' name='test1_result'>$test1_result</textarea></td></tr>";
//   }
   
   
   
   
  
   
?>







<!--You can now add drugs from pharmacy -->







<?php  



//}









echo"<br><br>";


echo"</table>";








echo"<br>";
?>



</div>


<!--div style="float:center;"-->
 <!--div style="float:left; width: 50%" align ="right"-->
 
<p align ='centre'></p>



<!--h2>Admission Details</h2-->

<?php
//End of Drugs
//------------


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
<div style="clear:both">
    



<?php
    
    echo"<table><tr><td width ='50'><b>Next point:</td><td width='30' align='left'></td><td></td>";
echo"<select id ='status' name='status' required>";
echo"<option value=''></option>";
echo"<option value='To Triage'>To Triage</option>";
echo"<option value='To cash office'>To cash office</option>";
echo"<option value='To Doctor'>To Doctor</option>";
echo"<option value='To Laboratory'>To Laboratory</option>";
echo"<option value='To Pharmacy'>To Pharmacy</option>";
echo"<option value='To Radiology'>To Radiology</option>";
echo"<option value='To Nutriton'>To Nutriton</option>";
echo"<option value='To WBC'>To WBC</option>";
echo"<option value='To Dental'>To Dental</option>";
echo"<option value='To Antenatal'>To Antenatal</option>";
echo"<option value='To Optical'>To Optical</option>";
echo"<option value='To Physio'>To Physiotherapy</option>";
echo"<option value='To Ward'>To Ward</option>";
echo"<option value='Completed'>Completed</option>";
echo"</select></td><td width ='30'></td><td width ='40'></td><td width ='20'><input type='submit' name='save_cancel'  class='button' value='Save'></td></tr>";
echo"</table>";
?>


    <h4><p align ='left'>Used Laboratory Items</p></h4>

<!--OBJECT data='lab_reduce.php' type='text/html' style='margin: 0; width: 100%; height: 200px; padding 0px; text-align:left;'></OBJECT-->
<OBJECT data='lab_auto_search2.php' type='text/html' style='margin: 0; width: 100%; height: 200px; padding 0px; text-align:left;'></OBJECT>

    
    
    
    
    
    
</div>
</form>











</div>
<!--div class="w3-container w3-teal">






  <!--p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p-->
</div-->

</body>
</html>