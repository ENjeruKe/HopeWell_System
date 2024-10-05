<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>



<?php



if (isset($_GET['accounts3']) OR isset($_GET['account3'])){    
   $check_date = date('y-m-d');
   $test1_result='';
   $test2_result='';
   $test3_result='';
   $test4_result='';
   $test5_result='';

   if (isset($_GET['accounts3'])){
      $adm_no  = $_GET['accounts3'];
      $id_no  = $_GET['accounts'];
      $_SESSION['id_no'] = $id_no;
      $_SESSION['adm_no'] = $adm_no;
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
      $doctor  = mysql_result($result,$i,"doctor");   
      $appointment = mysql_result($result,$i,"date");   
      $name        = mysql_result($result,$i,"name");   
      $date        = mysql_result($result,$i,"date");  
      $telephone   = mysql_result($result,$i,"description");  
      $status      = mysql_result($result,$i,"status");  
      $sex         = mysql_result($result,$i,"sex");
      $weight      = mysql_result($result,$i,"weight");
      $height      = mysql_result($result,$i,"height");
      $temp         = mysql_result($result,$i,"temp");
      $b_p         = mysql_result($result,$i,"b_p");
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"gl_account");  
      $textarea    = mysql_result($result,$i,"notes");  
      $sign1       = mysql_result($result,$i,"sign1");  
      $sign2       = mysql_result($result,$i,"sign2"); 
      $sign3       = mysql_result($result,$i,"sign3"); 
      $diag1       = mysql_result($result,$i,"diag1"); 
      $diag2       = mysql_result($result,$i,"diag2"); 
      $ref_nos     = mysql_result($result,$i,"ref_no"); 
      $test1       = mysql_result($result,$i,"test1");  
      $test1_qty   = mysql_result($result,$i,"test1_qty"); 
      $test1_result= mysql_result($result,$i,"test1_result"); 
      $test2       = mysql_result($result,$i,"test2");  
      $test2_qty   = mysql_result($result,$i,"test2_qty"); 
      $test2_result= mysql_result($result,$i,"test2_result"); 
      $test3       = mysql_result($result,$i,"test3");  
      $test3_qty   = mysql_result($result,$i,"test3_qty"); 
      $test3_result= mysql_result($result,$i,"test3_result"); 
      $test4       = mysql_result($result,$i,"test4");  
      $test4_qty   = mysql_result($result,$i,"test4_qty"); 
      $test4_result= mysql_result($result,$i,"test4_result"); 
      $test5       = mysql_result($result,$i,"test5");  
      $test5_qty   = mysql_result($result,$i,"test5_qty"); 
      $test5_result= mysql_result($result,$i,"test5_result"); 
     $seen_results = $test3_result.$test2_result.$test4_result.$test5_result.$test1_result;
      if ($seen_results<>''){
         $results ='Yes';
      }
      $available = 'No';
      //Now go and get prices and tabulate cost
      //---------------------------------------
      if ($payer==''){
         $query2 = "select * FROM auto_transact where invoice_no ='$ref_nos'" ;
      }else{
         $query2 = "select * FROM auto_transact_inv where invoice_no ='$ref_nos'" ;
      }
      $result2 =mysql_query($query2) or die(mysql_error());
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num2 =mysql_numrows($result2) or die(mysql_error());
      $i2 =0;
      $drug_total = 0;
      while ($i2 < $num2)
      {                  
         $item_id      = mysql_result($result2,$i2,"id");
         $item_desc    = mysql_result($result2,$i2,"description");
         $balance      = mysql_result($result2,$i2,"credit_rate");
         if ($test1 ==$item_desc){
            $test1     = $item_desc;
            $test1_paid= mysql_result($result2,$i2,"balance");
            $available = 'Yes';
         }
         if ($test2 ==$item_desc){
            $test2     = $item_desc;
            $test2_paid= mysql_result($result2,$i2,"balance");
            $available = 'Yes';
         }
         if ($test3 ==$item_desc){
            $test3     = $item_desc;
            $test3_paid= mysql_result($result2,$i2,"balance");
            $available = 'Yes';
         }
         if ($test4 ==$item_desc){
            $test4     = $item_desc;
            $test4_paid= mysql_result($result2,$i2,"balance");
            $available = 'Yes';
         }
         if ($test5 ==$item_desc){
            $test5     = $item_desc;
            $test5_paid= mysql_result($result2,$i2,"balance");
            $available = 'Yes';
         }
      $i2++;
      }
         if ($available == 'No'){
            //$query2 = "select * FROM auto_transact where line_no ='$adm_no' and date ='$date'" ;
            if ($payer==''){
               $query2 = "select * FROM auto_transact where invoice_no ='$ref_nos'" ;
            }else{
               $query2 = "select * FROM auto_transact_inv where invoice_no ='$ref_nos'" ;
            }
            $result2 =mysql_query($query2) or die(mysql_error());
            $id = 0;
            $nRecord = 1;
            $No = $nRecord;
            $num2 =mysql_numrows($result2) or die(mysql_error());
            $i2 =0;
            $drug_total = 0;
            while ($i2 < $num2)
            {                  
               $test1      = mysql_result($result2,$i2,"description");
               $item_desc    = mysql_result($result2,$i2,"description");
               $balance      = mysql_result($result2,$i2,"credit_rate");
               $i2++;
            }         
         }
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
<head>





<body>
<!--div class="w3-container w3-teal">
  <h1>Update Triage Form | <font color ='yellow'>HMIS</font></h1>
</div>
<div class="w3-container"-->










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

<form action ="patients_radiology.php" method ="GET">
<?php


$company_identity =$company_identity; 
$cdquery="SELECT id FROM appointmentf";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
$date = date('y-m-d');
//<td>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////

echo"<table width ='100%' height ='100%'><tr><td width ='100' align ='left'><b>Doctor:</b></td><td>";
echo"<select id='doc_account' name='doc_account'> readonly";
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

echo"<tr><td width ='50'><b>ID:</b></td><td width='30' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='10' readonly></td><td width ='50'><b>Name:</b></td><td width='50' align='left'><input type='text' id ='customer' name='customer'
value ='$name' size='40' readonly></td></tr><table>";
echo"<table>";
echo"<tr><td width ='30'><b>Age.</td><td width='30' align='left'><input type='text' id ='age' name='age'  
 value='$age' size='10' readonly></td><td width ='30'><b>Sex</td><td width='30' align='left'><input type='text' id ='sex' name='sex'  
 value='$sex' size='10' readonly></td><td width ='30'><b>Weight:</b></td><td width='30' align='left'><input type='text' id ='weight' name='weight' size='10' value='$weight' ></td>";

echo"<td width ='50'><b>Temp.</td><td width='20' align='left'><input type='text' id ='temp' name='temp' size='10' value='$temp' ></td><td width ='50'><b>B.P</td><td width='50' align='left'><input type='text' id ='b_p' name='b_p'  
 size='10' value='$b_p'></td><td width ='50'><b>Ref:</td><td width='50' align='left'><input type='text' id ='height' name='height'  
 value='$ref_nos' size='10' readonly></td></tr></table>";


//here



//echo"<h3>Tests Requested</h3>";
echo"<table width ='100%'><td width ='300' align ='left'><h3>Med.Test Request</h3></td><td width ='600' align ='center'>";
if ($results =='Yes'){
   echo"<a href=javascript:popcontact505('view_labresult.php?accounts3=$ref_nos')><h3>Print results</h3></a>";
}else{
   echo"<h3><font color ='red'>Results NOT ready</h3></font>";
}
echo"</td></table>";

//mysqli_select_db($con,"hmisglob_iscan");
$sql="SELECT * FROM  auto_transact WHERE line_no = '$adm_no' and date ='$date' and location='Xra'";
$result = mysql_query($sql);
$found ='No';
echo "<table width ='700'>
<tr>
<th width ='20' bgcolor ='black'><font color ='white'>ID</th>
<th width ='150' bgcolor ='black'><font color ='white'>Date</th>
<th width ='400' bgcolor ='black'><font color ='white'>Item Description</th>
<th width ='100' bgcolor ='black'><font color ='white'>Charged</th>
<th width ='100' bgcolor ='black'><font color ='white'>Paid</th>
<th width ='100' bgcolor ='black'><font color ='white'>Action</th>

</tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td width ='100'>" . $row['date'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td align ='right'>".  $row['credit_rate']. "</td>";
    $price =  $row['credit_rate'];
    $paid  =  $row['balance'];

    $line=  $row['id'];
    $id = $line.'name';
    echo "<td align ='right'>".  $row['balance']. "</td>";
    if ($paid >0){
        echo "<td>" ."Paid". "</td>";
    }else{
       echo "<td>" ."<a href=javascript:popcontact2('patients_lab_change.php?accountss=$line&accounts33=$price&account3=$id')>"."Edit"."</a>" . "</td>";
    }
    echo "</tr>";
}
echo "</table>";






echo"<form action ='patients_register_radiology.php' method ='GET'>";

echo"<table>";
if ($payer==''){
   //Check for cash payment tests
   //----------------------------
   if ($test1<>'' and $test1_paid >0){
   //echo"<tr><td><input type='text' id ='test1' name='test1' value='$test1' size='100' readonly>";
   echo"<tr><td><input type='text' id ='test1' name='test1' value='$test1' size='100' readonly><br>";
   echo"<textarea rows='6' cols='100' id='test1_result' name='test1_result'>$test1_result</textarea></td></tr>";
   }
   //if ($test1_paid >0){
   //echo"<br><textarea rows='6' cols='100' id='test1_result' name='test1_result'></textarea>";
   //}
   echo"</td></tr>";
   if ($test2<>'' and $test2_paid >0){
   //echo"<tr><td><input type='text' id ='test2' name='test2' value='$test2' size='100' readonly>";
   echo"<tr><td><input type='text' id ='test2' name='test2' value='$test2' size='100' readonly><br>";
   echo"<textarea rows='6' cols='100' id='test2_result' name='test2_result'>$test2_result</textarea></td></tr>";
   }
   //if ($test2_paid >0){
   //echo"<br><textarea rows='6' cols='100' id='test2_result' name='test2_result'></textarea></td></tr>";
   //}
   if ($test3<>'' and $test3_paid >0){
   echo"<tr><td><input type='text' id ='test3' name='test3' value='$test3' size='100' readonly><br>";
   echo"<textarea rows='6' cols='100' id='test3_result' name='test3_result'>$test3_result</textarea></td></tr>";
   }else{
   }
   if ($test4<>'' and $test4_paid >0){
   echo"<tr><td><input type='text' id ='test4' name='test4' value='$test4' size='100' readonly><br>";
   echo"<textarea rows='6' cols='100' id='test4_result' name='test4_result'>$test4_result</textarea></td></tr>";
   }else{
   }
   if ($test5<>'' and $test5_paid >0){
   echo"<tr><td><input type='text' id ='test5' name='test5' value='$test5' size='100' readonly><br>";
   echo"<textarea rows='6' cols='100' id='test5_result' name='test5_result' >$test5_result</textarea></td></tr>";
   }else{
   }
}else{
   //Check for Inv payment tests
   //----------------------------
   if ($test1<>''){
   echo"<tr><td><input type='text' id ='test1' name='test1' value='$test1' size='100' readonly><br>";
   echo"<textarea rows='6' cols='100' id='test1_result' name='test1_result'></textarea></td></tr>";
   }
   if ($test2<>''){
   echo"<tr><td><input type='text' id ='test2' name='test2' value='$test2' size='100' readonly><br>";
   echo"<textarea rows='6' cols='100' id='test2_result' name='test2_result'></textarea></td></tr>";
   }
   if ($test3<>''){
   echo"<tr><td><input type='text' id ='test3' name='test3' value='$test3' size='100' readonly><br>";
   echo"<textarea rows='6' cols='100' id='test3_result' name='test3_result'></textarea></td></tr>";
   }else{
   }
   if ($test4<>''){
   echo"<tr><td><input type='text' id ='test4' name='test4' value='$test4' size='100' readonly><br>";
   echo"<textarea rows='6' cols='100' id='test4_result' name='test4_result'></textarea></td></tr>";
   }else{
   }
   if ($test5<>''){
   echo"<tr><td><input type='text' id ='test5' name='test5' value='$test5' size='100' readonly><br>";
   echo"<textarea rows='6' cols='100' id='test5_result' name='test5_result'></textarea></td></tr>";
   }else{
   }
//End of invoices transactions
//----------------------------
}

echo"</table>";

echo"<table><tr><td width ='50'><b>Next point:</td><td width='30' align='left'></td><td></td><td></td></tr>";
echo"<tr><td width ='50'><select id ='status' name='status'>";
echo"<option value='To cash office'>To cash office</option>";
echo"<option value='To Doctor'>To Doctor</option>";
echo"<option value='To Radiology'>To Radiology</option>";
echo"<option value='To Specialist'>To Specialist</option>";
echo"</select></td><td width ='30'></td><td width ='40'></td><td width ='20'><input type='submit' name='save_cancel'  class='button' value='Save'></td></tr>";
echo"</table>";
echo"<br>";
?>

<br>
</div>


<!--div style="float:center;"-->
 <div style="float:left; width: 50%">

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
<div style="clear:both"></div>
</form>











</div>
<div class="w3-container w3-teal">






  <!--p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p-->
</div>

</body>
</html>