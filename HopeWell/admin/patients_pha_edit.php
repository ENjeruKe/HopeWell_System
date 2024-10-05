<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$date = $_SESSION['sys_date'];

?>


<?php


if (isset($_GET['accountx'])){
   $line  = $_GET['accountx']; 
   //********************payer */
if($payer==''){
   $query13= "UPDATE auto_transact SET selected ='pay' WHERE id='$line'";
   $result13 =mysql_query($query13);
}else{
   $query13= "UPDATE auto_transact_inv SET selected ='pay' WHERE id='$line'";
   $result13 =mysql_query($query13);
} 
//************************end */
}

if (isset($_GET['accountx2'])){
   $line  = $_GET['accountx2']; 
   //********************payer */
if($payer==''){
   $query13= "UPDATE auto_transact SET selected ='' WHERE id='$line'";
   $result13 =mysql_query($query13);
}else{
   $query13= "UPDATE auto_transact_inv SET selected ='' WHERE id='$line'";
   $result13 =mysql_query($query13);
} 
//************************end */
}



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
      $_SESSION['refresh'] = $id_no;
      $_SESSION['adm_no'] = $adm_no;
      $_SESSION['inv_no'] = $inv_no;
   }
   if (isset($_GET['accepted'])){
      $pay_now ='Yes';
   }else{
      $pay_now ='no';
   }

   //Go and get previous balance
   //---------------------------
   $SQL= "SELECT * FROM appointmentf where adm_no ='$adm_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   $query= "SELECT * FROM appointmentf where adm_no ='$adm_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      { 
      $prev_bal      = mysql_result($result,$i,"image_id");          
      $i++;
   }

   $_SESSION['prev_bal']=$prev_bal;

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
      $diag3       = mysql_result($result,$i,"diag3"); 
      $notes       = mysql_result($result,$i,"notes"); 

      $_SESSION['payer'] = $payer;
      $_SESSION['diag1'] = $diag1;
      $_SESSION['diag2'] = $diag2;
      $_SESSION['diag3'] = $diag3;
      $_SESSION['notes'] = $notes;
      $_SESSION['ref_nos'] = $ref_nos;

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

    $gggh   = mysql_result($result,$i,"drug7_issued"); 

      $available = 'No';
      //Now go and get prices and tabulate cost
      //---------------------------------------
      //echo 'Ref No.'.$ref_nos;

      if ($payer==''){
         $query2 = "select * FROM auto_transact where invoice_no ='$ref_nos' and description <>''" ;
//and location ='DRUGS' 
      }else{
         $query2 = "select * FROM auto_transact_inv where invoice_no ='$ref_nos' and description <>''" ;
//and location ='DRUGS' 
      }
      //$query2 = "select * FROM auto_transact where line_no ='$adm_no' and date ='$date'" ;
      $selected ='No';
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
         $selected     = mysql_result($result2,$i2,"selected");
      
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

<form action ="patients_register_pha.php" method ="GET">


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
   $date = $_SESSION['sys_date'];

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
function showUser3(str) {    
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
        xmlhttp.open("GET","getstatus.php?q="+str,true);
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

<!--form action ="patients_register_pha.php" method ="GET"-->
<?php


$company_identity =$company_identity; 
$cdquery="SELECT client_id,patients_name FROM clients";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
//$date = date('y-m-d');
//<td>";

$_SESSION['adm_no']= $adm_no;
$_SESSION['name']= $name;
$_SESSION['ref_no']= $ref_nos;

//require('auto_search.html');



//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
$_SESSION['payer'] = $payer;

echo"<table>";
echo"<tr><td width ='50'><b>ID:</b></td><td width='30' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='10' readonly></td></tr><td width ='50'><b>Name:</b></td><td width='50' align='left'><input type='text' id ='customer' name='customer'
value ='$name' size='70' readonly></td><td width='15'>Date:</td><td width='15' align='left'><input type='text' id ='date' name='date'
value ='$mydate' size='10' readonly></td></tr>";
echo"<tr><td width='50'><b>Payer</b></td><td width='50' align='left'><font color ='red'>$payer</font></td><td><font color ='red'><b>Balance:</b></td><td><b>$prev_bal</b></td></tr></table><br><br>";
//<input type='text' id ='payer' name='payer' value='$payer' size='50' readonly>
echo"<table>";
echo"<tr><td width ='30'><b>Age.</td><td width='5' align='left'><input type='text' id ='age' name='age'  
 value='$age' maxlength ='3' readonly></td><td width ='30'><b>Sex</td><td width='30' align='left'><input type='text' id ='sex' name='sex'  
 value='$sex' size='10' readonly></td><td width ='30'><b>Weight:</b></td><td width='30' align='left'><input type='text' id ='weight' name='weight' size='10' value='$weight' ></td>";

echo"<td width ='50'><b>Temp.</td><td width='20' align='left'><input type='text' id ='temp' name='temp' size='10' value='$temp' ></td><td width ='50'><b>B.P</td><td width='50' align='left'><input type='text' id ='b_p' name='b_p'  
 size='10' value='$b_p'></td><td width ='50'><b>Ref:</td><td width='50' align='left'><input type='text' id ='height' name='height'  
 value='$ref_nos' size='10' readonly></td></tr></table>";

$results =$available;
$id_no =$_SESSION['refresh'];
$adm_no =$_SESSION['adm_no'];
$inv_no =$_SESSION['inv_no'];

echo"<br><table width ='850'><td width ='300' align='left'>Doctors Prescription</td><td width ='100'></td><td width ='400' align='right'>";
//if ($results =='Yes'){
//   echo"<a href=javascript:popcontact505('view_prescription.php?accounts3=$ref_nos')>Print Prescription</a>";
//}else{
   echo"<h3><font color ='red'><a href ='patients_pha_edit.php?accounts3=$adm_no&accounts=$id_no&accepted=$id_no'>Get Totals</a></h3></font>";
//}
echo"</th></table>";
$total =0;




if ($payer==''){
$sql="SELECT * FROM  auto_transact WHERE invoice_no = '$ref_nos' and date ='$date' and description <>'' and location ='DRUGS'";
//and location='DRUGS' 
}else{
$sql="SELECT * FROM  auto_transact_inv WHERE invoice_no = '$ref_nos' and date ='$date' and description <>'' and location ='DRUGS'";
}
$result = mysql_query($sql);
$found ='No';
$selected='No';
echo "<table width ='900'>
<tr>
<th width ='20' bgcolor ='black'><font color ='white'>ID</th>
<th width ='150' bgcolor ='black'><font color ='white'>Date</th>
<th width ='400' bgcolor ='black'><font color ='white'>Item Description</th>
<th width ='90' bgcolor ='black'><font color ='white'>Charged</th>
<th width ='90' bgcolor ='black'><font color ='white'>Qty</th>
<th width ='90' bgcolor ='black'><font color ='white'>Total</th>
<th width ='90' bgcolor ='black'><font color ='white'>Paid</th>
<th width ='100' bgcolor ='black'><font color ='white'>Action</th>
<th width ='100' bgcolor ='black'><font color ='white'>Status</th>";
if ($payer<>''){
//echo"<th width ='100' bgcolor ='black'><font color ='white'>*Pay*</th>";
}
echo"</tr>";
$totals = 0;
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    $available ='Yes';
    $lin2=  $row['selected'];
    $selected = $row['selected'];
    $old_date = $row['date'];
    echo "<td>" . $row['id'] . "</td>";
    echo "<td width ='100'>" . $row['date'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
//here
    echo "<td align ='right'>".  $row['sell_price']. "</td>";
    $price =  $row['credit_rate'];
    $paid =  $row['balance'];
    $line=  $row['id'];
    $qty=  $row['qty'];
    $id = $line.'name';
    $all = $price*$qty;
    //$total = $total+$all;
    echo "<td align ='right'>".  $row['qty']. "</td>";
    echo "<td align ='right'>".  $row['credit_rate']. "</td>";
    echo "<td align ='right'>".  $row['balance']. "</td>";
    
    $total =  $row['credit_rate'];

if($lin2=='pay'){    
    $totals = $totals+$total-$paid;
}else{
   //---------------
}


    if ($paid >0 or $status=='Completed'){
       $selected = 'Yes';
       echo "<td>" ."Paid". "</td>";
    }else{
        echo "<td>" ."<a href=javascript:popcontact2('patients_pha_change.php?accountss=$line&accounts33=$price&account3=$id')>".'Edit'."</a>" . "</td>";
        if ($payer<>''){
        //echo "<td>" ."<a href ='patients_pha_edit.php?accounts3v=$adm_no&accountsv=$id_no&acceptedv=$id_no'>".'To Pay'."</a>" . "</td>";
        }
//echo "<td>" ."Dispense". "</td>";
    }

    if ($paid >0 or $status=='Completed'){
      $selected = 'Yes';
      echo "<td>" ."<font color='violet'>Issued</font>". "</td>";
    }else{  
    if ($lin2==''){//$aaa ='t6';
      //$bbb ='t6';
      echo"<td width ='60'><a href='patients_pha_edit.php?accountx=$line&accounts3=$adm_no&accounts4=$ref_nos&accounts=$id_no'>";
      
      echo"<img src='ico\Delete.ico' alt='3g' style='width:20%'></a></td>";     
      }else{
      
         echo"<td width ='60'><a href='patients_pha_edit.php?accountx2=$line&accounts3=$adm_no&accounts4=$ref_nos&accounts=$id_no'>";
      
         echo"<img src='ico\Add.ico' alt='3g' style='width:20%'></a></td>";     
            
      }
   }
    echo "</tr>";
}
echo "</table>";

//}
echo"</table>";


$sql="SELECT * FROM  auto_transact_tmp WHERE invoice_no = '$ref_nos' and date ='$date' and location='DRUGS' and description <>''";
$result = mysql_query($sql);
$found ='No';
//$selected='No';
echo "<table width ='900'>
<tr>
<th width ='20' bgcolor ='black'><font color ='white'>ID</th>
<th width ='400' bgcolor ='black'><font color ='white'>Item Description</th><th width ='400' bgcolor ='black'><font color ='white'>Prescription</th></tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td width ='100' align ='left'>" . $row['description'] . "</td>";
    echo "<td align ='left'>".  $row['gl_account']. "</td>";

    echo "</tr>";
}
echo "</table><br><br>";
$_SESSION['old_date'] = $old_date;
if ($payer==''){
   $prev_bal = $_SESSION['prev_bal'];
}else{
   $prev_bal = 0;
}
if ($pay_now =='Yes'){
   $_SESSION['amt_paid'] =$totals+$prev_bal;
   $_SESSION['total_only'] =$totals;
   if ($payer==''){
      //$query= "UPDATE auto_transact set selected ='Yes' where invoice_no ='$ref_nos'" or die(mysql_error());
   }else{
      //$query= "UPDATE auto_transact_inv set selected ='Yes' where invoice_no ='$ref_nos'" or die(mysql_error());
   }
   $result =mysql_query($query) or die(mysql_error());   
echo"<table width ='900' border ='0'><td width ='20%'></td><td width ='20%'></td><td width ='20%' align ='right'><h2><font color ='red'>Total:</font></td><td width ='20%' align ='right'><h2><font color ='blue'>$totals</font></h2></td><td width ='20%' align ='center'>";
echo"<a href='patients_register_pha.php?accounts33=$ref_nos&accounts43=$adm_no&accounts44=$totals'><!--h2>Save</h2--></a>

<!--button type='submit' class='btn btn-success' name='save_cancel' id ='save_cancel'>Save</button--></td></table>";




echo"<!--table><tr><td width ='50'><b>Send to:</td><td width='50' align='left'>";
echo"<select id ='status' name='status' onchange='showUser3(this.value)'>";
echo"<option value=''></option>";
echo"<option value='To Pharmacy'>To Pharmacy</option>";
echo"<option value='To Cash Office'>To Cash Office</option>";
echo"<option value='To Triage'>To Triage</option>";
echo"<option value='To Laboratory'>To Laboratory</option>";
echo"<option value='To Doctor'>To Doctor</option>";
echo"<option value='To Radiology'>To Radiology</option>";
echo"<option value='To Specialist'>To Specialist</option>";
echo"<option value='To Ward'>To Ward</option>";
echo"<option value='Completed'>Completed</option>";echo"</select></td></tr>";

echo"<tr><div id='txtHint'><b>here</b></div></tr></table-->";
}

//echo"<b>Status:</td><td width='50' align='left'>";
//echo"<select id ='status' name='status'>";
//echo"<option value='To cash office'>Dispense Drugs</option>";
//echo"<option value='Completed'>Completed</option>";
//echo"</select>";













echo"<br>";


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

$sql="SELECT * FROM  st_trans WHERE ref_no = '$ref_nos' and (trans_desc ='ISP' or trans_desc ='CASH'";
$result = mysql_query($sql);
//while($row = mysql_fetch_array($result)) {
//  $issued ='Yes';
  
//}

if ($issued=='Yes'){
   echo"<font color ='red'><h2>Drugs already issued...</h2></font>";
   die();
}
?>
<div class="container">
<?php

//if ($appointment==$dates){
//   if ($payer<>'' or $selected=='Yes'){

//      echo"<h1><button type='submit' class='btn btn-success' name='save_cancel' id ='save_cancel'>Save Changes</button></h1></div>";


//   }
   //if ($payer<>''){
   //   echo"<h1><button type='submit' class='btn btn-success' name='save_cancel' id ='save_cancel'>Save Changes</button></h1></div>";
   //}
//}

$notes =$_SESSION['notes'];
$diag11 =$_SESSION['diag1'];
$diag21 =$_SESSION['diag2'];
$diag31 =$_SESSION['diag3'];

$check_diag =$diag1.$diag2.$diag3;
if ($check_diag==''){
   $diag1 = substr($notes,0,100);
   $diag2 = substr($notes,100,100);
   $diag3 = substr($notes,200,100);
}
echo"<h4><u>History / Notes</h4></u><br>";
echo "<u>Prescription</u><br>";
echo $gggh;
echo"<br><hr>";
echo $notes;


?>
<br>
</div>



<?php
echo"<br><table>";

echo"<td><a href='patients_register_pha.php?Cash=$ref_nos&accounts3y=$adm_no'>Send to Cash Office</a>|</td>";


echo"<td><a href='patients_register_pha.php?Pharm=$ref_nos&accounts3y=$adm_no'>Send to Pharmacy</a>|</td>";

echo"<td><a href='patients_register_pha.php?Laboratory=$ref_nos&accounts3y=$adm_no'>Send to Laboratory</a>|</td>";
echo"<td><a href='patients_register_pha.php?Radiology=$ref_nos&accounts3y=$adm_no'>Send to Radilogy</a>|</td>";
echo"<td><a href='patients_register_pha.php?Triage=$ref_nos&accounts3y=$adm_no'>Send to Triage</a>|</td>";
echo"<td><a href='patients_register_pha.php?Doctor=$ref_nos&accounts3y=$adm_no'>Send to Doctor</a>|</td>";
echo"<td><a href='patients_register_pha.php?Completed=$ref_nos&accounts3y=$adm_no'>Completed</a>|</td>";
echo"</table><br>";

?>

<!--div style="float:center;"-->
 <div style="float:left; width: 50%">

<p align ='centre'></p>



<!--h2>Admission Details</h2-->

<?php
//End of Drugs
//------------
?>
<!--You can now add drugs from pharmacy -->
<OBJECT data='auto_search2.php' type='text/html' style='margin: 0; width: 600px; height: 200px; padding 0px; text-align:left;'></OBJECT>






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


<?php
//echo $diag1;
//echo'<br><hr>';
//echo $diag2;
//echo'<br><hr>';
//echo $diag3;
//echo'<br><hr>';
?>









</body>
</html>