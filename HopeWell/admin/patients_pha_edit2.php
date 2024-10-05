<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>



<?php
if (isset($_GET['account3'])){ 
   $tooth = $_GET['account3'];
   $adm_no = $_GET['account'];
   //$result3 = mysql_query($query3);
}


if (isset($_GET['accounts3']) OR isset($_GET['account3'])){    
   $check_date = date('y-m-d');
   if (isset($_GET['accounts3'])){
      $adm_no  = $_GET['accounts3'];
      $inv_no  = $_GET['accounts4'];
      $id_no  = $_GET['accounts'];
   }
   $SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   $query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;

   $issued_1 ='';
   $issued_2 ='';
   $issued_3 ='';
   $issued_4 ='';
   $issued_5 ='';
   $issued_6 ='';
   $issued_7 ='';
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
      $ref_nos     = mysql_result($result,$i,"ref_no"); 
      $textarea    = mysql_result($result,$i,"notes");  
      $sign1       = mysql_result($result,$i,"sign1");  
      $sign2       = mysql_result($result,$i,"sign2"); 
      $sign3       = mysql_result($result,$i,"sign3"); 
      $diag1       = mysql_result($result,$i,"diag1"); 
      $diag2       = mysql_result($result,$i,"diag2"); 


      $dose1       = mysql_result($result,$i,"dose1");  
      $dose2       = mysql_result($result,$i,"dose2"); 
      $dose3       = mysql_result($result,$i,"dose3"); 
      $dose4       = mysql_result($result,$i,"dose4"); 
      $dose5       = mysql_result($result,$i,"dose5"); 
      $dose6       = mysql_result($result,$i,"dose6"); 
      $dose7       = mysql_result($result,$i,"dose7"); 

      $test1       = mysql_result($result,$i,"med1");  
      $test1_qty   = mysql_result($result,$i,"med1_qty"); 
      $test1_dx    = mysql_result($result,$i,"med1_dx"); 
      $test1_dx2   = mysql_result($result,$i,"med1_dx2"); 

      $test2       = mysql_result($result,$i,"med2");  
      $test2_qty   = mysql_result($result,$i,"med2_qty");
      $test2_dx    = mysql_result($result,$i,"med2_dx");  
      $test2_dx2   = mysql_result($result,$i,"med2_dx2"); 

      $test3       = mysql_result($result,$i,"med3");  
      $test3_qty   = mysql_result($result,$i,"med3_qty");
      $test3_dx    = mysql_result($result,$i,"med3_dx");  
      $test3_dx2   = mysql_result($result,$i,"med3_dx2"); 

      $test4       = mysql_result($result,$i,"med4");  
      $test4_qty   = mysql_result($result,$i,"med4_qty");
      $test4_dx    = mysql_result($result,$i,"med4_dx"); 
      $test4_dx2   = mysql_result($result,$i,"med4_dx2"); 

      $test5       = mysql_result($result,$i,"med5");  
      $test5_qty   = mysql_result($result,$i,"med5_qty");
      $test5_dx    = mysql_result($result,$i,"med5_dx"); 
      $test5_dx2   = mysql_result($result,$i,"med5_dx2"); 

      $test6       = mysql_result($result,$i,"med6");  
      $test6_qty   = mysql_result($result,$i,"med6_qty"); 
      $test6_dx    = mysql_result($result,$i,"med6_dx"); 
      $test6_dx2   = mysql_result($result,$i,"med6_dx2"); 
      $type        = mysql_result($result,$i,"type"); 
      $test7       = mysql_result($result,$i,"med7");  
      $test7_qty   = mysql_result($result,$i,"med7_qty"); 
      $test7_dx    = mysql_result($result,$i,"med7_dx"); 
      $test7_dx2   = mysql_result($result,$i,"med7_dx2"); 


      $paid_1      = mysql_result($result,$i,"drug1_issued");  
      if ($paid_1=='Yes'){
         $test1 ='';
         $issued_1 ='Issued';
      }
      $paid_2      = mysql_result($result,$i,"drug2_issued"); 
      if ($paid_2=='Yes'){
         $test2 ='';
         $issued_2 ='Issued';
      }
      $paid_3      = mysql_result($result,$i,"drug3_issued"); 
      if ($paid_3=='Yes'){
         $test3 ='';
         $issued_3 ='Issued';
      }
      $paid_4      = mysql_result($result,$i,"drug4_issued"); 
      if ($paid_4=='Yes'){
         $test4 ='';
         $issued_4 ='Issued';
      }
      $paid_5      = mysql_result($result,$i,"drug5_issued"); 
      if ($paid_5=='Yes'){
         $test5 ='';
         $issued_5 ='Issued';
      }
      $paid_6      = mysql_result($result,$i,"drug6_issued"); 
      if ($paid_6=='Yes'){
         $test6 ='';
         $issued_6 ='Issued';
      }
      $paid_7      = mysql_result($result,$i,"drug7_issued"); 
      if ($paid_7=='Yes'){
         $test7 ='';
         $issued_7 ='Issued';
      }

      $available = 'No';
      //Now go and get prices and tabulate cost
      //---------------------------------------
      if ($payer==''){
         $query2 = "select * FROM auto_transact where invoice_no ='$ref_nos' and location ='DRUGS' and balance<>0" ;
      }else{
         $query2 = "select * FROM auto_transact_inv where invoice_no ='$ref_nos'" ;
      }
      //$query2 = "select * FROM auto_transact where line_no ='$adm_no' and date ='$date'" ;
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
         $ifpha        = mysql_result($result2,$i2,"location");
         $balance      = mysql_result($result2,$i2,"credit_rate");
         if ($test1 ==$item_desc){
            $test1     = $item_desc;
            $test1     = mysql_result($result2,$i2,"description");
            $test1_paid= mysql_result($result2,$i2,"balance");
            $available = 'Yes';
         }
         if ($test2 ==$item_desc){
            $test2     = $item_desc;
            $test2     = mysql_result($result2,$i2,"description");
            $test2_paid= mysql_result($result2,$i2,"balance");
            $available = 'Yes';
         }
         if ($test3 ==$item_desc){
            $test3     = $item_desc;
            $test3     = mysql_result($result2,$i2,"description");
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
            $test5     = mysql_result($result2,$i2,"description");
            $test5_paid= mysql_result($result2,$i2,"balance");
            $available = 'Yes';
         }
         if ($test6 ==$item_desc){
            $test6     = $item_desc;
            $test6     = mysql_result($result2,$i2,"description");
            $test6_paid= mysql_result($result2,$i2,"balance");
            $available = 'Yes';
         }
         if ($test7 ==$item_desc){
            $test7     = $item_desc;
            $test7     = mysql_result($result2,$i2,"description");
            $test7_paid= mysql_result($result2,$i2,"balance");
            $available = 'Yes';
         }
       

         if ($type=='Walk-in'){
            if ($i2==0){
               $test1    = mysql_result($result2,$i2,"description"); 
               $test1_qty   = mysql_result($result2,$i2,"qty");
               $test1_paid= mysql_result($result2,$i2,"balance");
               $available = 'Yes';
            }
            if ($i2==1){
               $test2    = mysql_result($result2,$i2,"description"); 
               $test2_qty   = mysql_result($result2,$i2,"qty");
               $test2_paid= mysql_result($result2,$i2,"balance");
               $available = 'Yes';
            }
            if ($i2==2){
               $test3    = mysql_result($result2,$i2,"description"); 
               $test3_qty   = mysql_result($result2,$i2,"qty");
               $test3_paid= mysql_result($result2,$i2,"balance");
               $available = 'Yes';
            }
            if ($i2==3){
               $test4    = mysql_result($result2,$i2,"description"); 
               $test4_qty   = mysql_result($result2,$i2,"qty");
               $test4_paid= mysql_result($result2,$i2,"balance");
               $available = 'Yes';
            }
            if ($i2==4){
               $test5    = mysql_result($result2,$i2,"description"); 
               $test5_qty   = mysql_result($result2,$i2,"qty");
               $test5_paid= mysql_result($result2,$i2,"balance");
               $available = 'Yes';
            }
            if ($i2==5){
               $test6    = mysql_result($result2,$i2,"description"); 
               $test6_qty   = mysql_result($result2,$i2,"qty");
               $test6_paid= mysql_result($result2,$i2,"balance");
               $available = 'Yes';
            }
            if ($i2==6){
               $test7    = mysql_result($result2,$i2,"description"); 
               $test7_qty   = mysql_result($result2,$i2,"qty");
               $test7_paid= mysql_result($result2,$i2,"balance");
               $available = 'Yes';
            }
         }

      $i2++;
      }

         if ($available == 'No'){
            if ($payer==''){
               $query2 = "select * FROM auto_transact where invoice_no ='$ref_nos'" ;
            }else{
               $query2 = "select * FROM auto_transact_inv where invoice_no ='$ref_nos'" ;
            }
            //$query2 = "select * FROM auto_transact where line_no ='$adm_no' and date ='$date'" ;
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

  <meta charset="utf-8">
  <!--meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->



<body>
<!--div class="w3-container w3-teal">
  <!--h1>Update Triage Form | <font color ='yellow'>HMIS</font></h1-->
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
function showUser(str) {    
    if (str == "") {
        document.getElementById("test1").innerHTML = "";
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
                document.getElementById("test1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","get_qty.php?q="+str,true);
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

<form action ="patients_register_pha.php" method ="GET">
<?php


$company_identity =$company_identity; 
$cdquery="SELECT client_id,patients_name FROM clients";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
//$date = date('y-m-d');
//<td>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////

//echo"<table width ='100%' height ='100%'><tr><td width ='100' align ='left'><b></b></td><td>";
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

echo"<table>";
echo"<tr><td width ='50'><b>ID:</b></td><td width='30' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='10' readonly></td></tr><td width ='50'><b>Name:</b></td><td width='50' align='left'><input type='text' id ='customer' name='customer'
value ='$name' size='70' readonly></td><td width='15'>Date:</td><td width='15' align='left'><input type='text' id ='date' name='date'
value ='$mydate' size='10' readonly></td></tr><table></tr>";
echo"<tr><td width='50'><b>Payer</b></td><td width='50' align='left'><input type='text' id ='payer' name='payer' value='$payer' size='50' readonly></td><td></td><td></td></tr></table><br><br>";

echo"<table>";
echo"<tr><td width ='30'><b>Age.</td><td width='5' align='left'><input type='text' id ='age' name='age'  
 value='$age' maxlength ='3' readonly></td><td width ='30'><b>Sex</td><td width='30' align='left'><input type='text' id ='sex' name='sex'  
 value='$sex' size='10' readonly></td><td width ='30'><b>Weight:</b></td><td width='30' align='left'><input type='text' id ='weight' name='weight' size='10' value='$weight' ></td>";

echo"<td width ='50'><b>Temp.</td><td width='20' align='left'><input type='text' id ='temp' name='temp' size='10' value='$temp' ></td><td width ='50'><b>B.P</td><td width='50' align='left'><input type='text' id ='b_p' name='b_p'  
 size='10' value='$b_p'></td><td width ='50'><b>Ref:</td><td width='50' align='left'><input type='text' id ='height' name='height'  
 value='$ref_nos' size='10' ></td></tr></table>";

$results =$available;

echo"<br><table width ='850'><td width ='300' align='left'>Doctors Prescription</td><td width ='100'></td><td width ='400' align='right'>";
if ($results =='Yes'){
   echo"<a href=javascript:popcontact505('view_prescription.php?accounts3=$ref_nos')>Print Prescription</a>";
}else{
   echo"<h3><font color ='red'>No Prescription</h3></font>";
}
echo"</th></table>";

//mysqli_select_db($con,"hmisglob_iscan");
$sql="SELECT * FROM  auto_transact WHERE line_no = '$adm_no' and date ='$date' and location='DRUGS'";
$result = mysql_query($sql);
$found ='No';
echo "<table width ='900'>
<tr>
<th width ='20' bgcolor ='black'><font color ='white'>ID</th>
<th width ='150' bgcolor ='black'><font color ='white'>Date</th>
<th width ='400' bgcolor ='black'><font color ='white'>Item Description</th>
<th width ='90' bgcolor ='black'><font color ='white'>Charged</th>
<th width ='90' bgcolor ='black'><font color ='white'>Paid</th>
<th width ='100' bgcolor ='black'><font color ='white'>Action</th>

</tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    $available ='Yes';
    echo "<td>" . $row['id'] . "</td>";
    echo "<td width ='100'>" . $row['date'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td align ='right'>".  $row['credit_rate']. "</td>";
    $price =  $row['credit_rate'];
    $paid =  $row['balance'];
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









if ($available == 'No'){
   echo"<h3>No Prescription or All Medicine for the given patient were given out.....</h3>";
   die();
}

echo"<table><br><br>";
echo"<tr><td>Drug Name</td><td>Qty</td><td>Freq.</td><td>Days</td><td>Dosage</td></tr>";
if ($payer==''){
   //Display if cash and have been paid for
   //--------------------------------------
   if ($test1<>''){
   echo"<tr><td><input type='text' id ='test1' name='test1' value='$test1' size='60' readonly></td><td><input type='text' id ='test1_qty' name='test1_qty' value='$test1_qty' size='10' readonly></td><td><input type='text' id ='test1_dx' name='test1_dx' value='$test1_dx' size='5' readonly></td><td><input type='text' id ='test1_dx2' name='test1_dx2' value='$test1_dx2' size='5' readonly></td><td>$issued_1</td><td><input type='text' name='dose1' value='$dose1' size='20'></td></tr>";
}
if ($test2<>''){
echo"<tr><td><input type='text' id ='test2' name='test2' value='$test2' size='60' readonly></td><td><input type='text' id ='test2_qty' name='test2_qty' value='$test2_qty' size='10' readonly></td><td><input type='text' id ='test2_dx' name='test2_dx' value='$test2_dx' size='5' readonly></td><td><input type='text' id ='test2_dx2' name='test2_dx2' value='$test2_dx2' size='5' readonly></td><td>$issued_2</td><td><input type='text' name='dose2' value='$dose2' size='20'></td></tr>";
}
if ($test3<>''){
echo"<tr><td><input type='text' id ='test3' name='test3' value='$test3' size='60' readonly></td><td><input type='text' id ='test3_qty' name='test3_qty' value='$test3_qty' size='10' readonly></td><td><input type='text' id ='test3_dx' name='test3_dx' value='$test3_dx' size='5' readonly></td><td><input type='text' id ='test3_dx2' name='test3_dx2' value='$test3_dx2' size='5' readonly></td><td>$issued_3</td><td><input type='text' name='dose3' value='$dose3' size='20'></td></tr>";
}else{
}
if ($test4<>''){
echo"<tr><td><input type='text' id ='test4' name='test4' value='$test4' size='60' readonly></td><td><input type='text' id ='test4_qty' name='test4_qty' value='$test4_qty' size='10' readonly></td><td><input type='text' id ='test4_dx' name='test4_dx' value='$test4_dx' size='5' readonly></td><td><input type='text' id ='test4_dx2' name='test4_dx2' value='$test4_dx2' size='5' readonly></td><td>$issued_4</td><td><input type='text' name='dose4' value='$dose4' size='20'></td></tr>";
}else{
}
if ($test5<>''){
echo"<tr><td><input type='text' id ='test5' name='test5' value='$test5' size='60' readonly></td><td><input type='text' id ='test5_qty' name='test5_qty' value='$test5_qty' size='10' readonly></td><td><input type='text' id ='test5_dx' name='test5_dx' value='$test5_dx' size='40' readonly></td><td><input type='text' id ='test5_dx2' name='test5_dx2' value='$test5_dx2' size='5' readonly></td><td>$issued_5</td><td><input type='text' name='dose5' value='$dose5' size='20'></td></tr>";
}else{
}
if ($test6<>''){
echo"<tr><td><input type='text' id ='test6' name='test6' value='$test6' size='60' readonly></td><td><input type='text' id ='test6_qty' name='test6_qty' value='$test6_qty' size='10' readonly></td><td><input type='text' id ='test6_dx' name='test6_dx' value='$test6_dx' size='5' readonly></td><td><input type='text' id ='test6_dx2' name='test6_dx2' value='$test6_dx2' size='5' readonly></td><td>$issued_6</td><td><input type='text' name='dose6' value='$dose6' size='20'></td></tr>";
}else{
}
if ($test7<>''){
echo"<tr><td><input type='text' id ='test7' name='test7' value='$test7' size='60' readonly></td><td><input type='text' id ='test7_qty' name='test7_qty' value='$test7_qty' size='10' readonly></td><td><input type='text' id ='test7_dx' name='test7_dx' value='$test7_dx' size='5' readonly></td><td><input type='text' id ='test7_dx2' name='test7_dx2' value='$test7_dx2' size='5' readonly></td><td>$issued_7</td><td><input type='text' name='dose7' value='$dose7' size='20'></td></tr>";
}else{
}
}else{
//Now Display fo credit payment
//-----------------------------
   if ($test1<>''){
   echo"<tr><td><input type='text' id ='test1' name='test1' value='$test1' size='60' readonly></td><td><input type='text' id ='test1_qty' name='test1_qty' value='$test1_qty' size='10' readonly></td><td><input type='text' id ='test1_dx' name='test1_dx' value='$test1_dx' size='5' readonly></td><td><input type='text' id ='test1_dx2' name='test1_dx2' value='$test1_dx2' size='5' readonly></td></tr>";
}
if ($test2<>''){
echo"<tr><td><input type='text' id ='test2' name='test2' value='$test2' size='60' readonly></td><td><input type='text' id ='test2_qty' name='test2_qty' value='$test2_qty' size='10' readonly></td><td><input type='text' id ='test2_dx' name='test2_dx' value='$test2_dx' size='5' readonly></td><td><input type='text' id ='test2_dx2' name='test2_dx2' value='$test2_dx2' size='5' readonly></td></tr>";
}
if ($test3<>''){
echo"<tr><td><input type='text' id ='test3' name='test3' value='$test3' size='60' readonly></td><td><input type='text' id ='test3_qty' name='test3_qty' value='$test3_qty' size='10' readonly></td><td><input type='text' id ='test3_dx' name='test3_dx' value='$test3_dx' size='5' readonly></td><td><input type='text' id ='test3_dx2' name='test3_dx2' value='$test3_dx2' size='5' readonly></td></tr>";
}else{
}
if ($test4<>''){
echo"<tr><td><input type='text' id ='test4' name='test4' value='$test4' size='60' readonly></td><td><input type='text' id ='test4_qty' name='test4_qty' value='$test4_qty' size='10' readonly></td><td><input type='text' id ='test4_dx' name='test4_dx' value='$test4_dx' size='5' readonly></td><td><input type='text' id ='test4_dx2' name='test4_dx2' value='$test4_dx2' size='5' readonly></td></tr>";
}else{
}
if ($test5<>''){
echo"<tr><td><input type='text' id ='test5' name='test5' value='$test5' size='60' readonly></td><td><input type='text' id ='test5_qty' name='test5_qty' value='$test5_qty' size='10' readonly></td><td><input type='text' id ='test5_dx' name='test5_dx' value='$test5_dx' size='5' readonly></td><td><input type='text' id ='test5_dx2' name='test5_dx2' value='$test5_dx2' size='5' readonly></td></tr>";
}else{
}
if ($test6<>''){
echo"<tr><td><input type='text' id ='test6' name='test6' value='$test6' size='60' readonly></td><td><input type='text' id ='test6_qty' name='test6_qty' value='$test6_qty' size='10' readonly></td><td><input type='text' id ='test6_dx' name='test6_dx' value='$test6_dx' size='5' readonly></td><td><input type='text' id ='test6_dx2' name='test6_dx2' value='$test6_dx2' size='5' readonly></td></tr>";
}else{
}
if ($test7<>''){
echo"<tr><td><input type='text' id ='test7' name='test7' value='$test7' size='60' readonly></td><td><input type='text' id ='test7_qty' name='test7_qty' value='$test7_qty' size='10' readonly></td><td><input type='text' id ='test7_dx' name='test7_dx' value='$test7_dx' size='40' readonly></td><td><input type='text' id ='test7_dx2' name='test7_dx2' value='$test7_dx2' size='5' readonly></td></tr>";
}else{
}





}
echo"</table>";



echo"<br>";
echo"<b>Status:</td><td width='50' align='left'>";
echo"<select id ='status' name='status'>";
echo"<option value='To cash office'>To cash office</option>";
//echo"<option value='To Radiology'>To Radiology</option>";
//echo"<option value='To Specialist'>To Specialist</option>";
echo"<option value='To Ward'>To Ward</option>";
echo"<option value='Completed'>Completed</option>";
echo"</select>";

      //Get the invoice No.
      $query3 = "select * FROM companyfile" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $dates     = mysql_result($result3,$i3,"dates"); 
        $i3++;
        }

//echo $dates;
//echo $appointment;

?>
<div class="container">
<?php
if ($appointment==$dates){
  echo"<h1><button type='submit' class='btn btn-success' name='save_cancel' id ='save_cancel'>Save Changes</button></h1></div>";
}
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