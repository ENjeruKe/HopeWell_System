<?php
   session_start();
require('open_database.php');
$branch = $_SESSION['company'];
$today = $_SESSION['sys_date'];
?>


<?php




if (isset($_GET['print'])){

$finalise ='Start';   
if (isset($_GET['print'])){
   $finalise ='No';
   $_SESSION['patient'] = $_GET['supplier'];
   $patient1 = $_SESSION['patient'];
   $branch   = $_SESSION['company'];
   //Checking if Invoice Exist
}

if (isset($_GET['finalise'])){
   $finalise ='Yes';   
   $_SESSION['patient'] = $_GET['supplier'];
   $patient1 = $_SESSION['patient'];
   $old_inv  = $_GET['old_inv'];
}

//if ($finalise=='No' OR $finalise=='Yes'){
   $finalise_date =$_GET['date'];
//Run though the file and group services

$query3 = "select * FROM htransf where patients_name ='$patient1'" ;
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($i3 < $num3){
  $adm_no = mysql_result($result3,$i3,"adm_no");  
  $patient = mysql_result($result3,$i3,"patients_name");  
  $item   = mysql_result($result3,$i3,"service");  
  $ref_nov= mysql_result($result3,$i3,"doc_no");  
  $mtrans2= mysql_result($result3,$i3,"trans2");  

  if ($mtrans2==''){  
   $query33 = "select * FROM revenuef where name='$item'" ;
$result33 =mysql_query($query33) or die(mysql_error());
$num33 =mysql_numrows($result33) or die(mysql_error());
$i33=0;
while ($i33 < $num33)
  {
  $account   = mysql_result($result33,$i33,"gl_account");  
  $auto      = mysql_result($result33,$i33,"auto");  
  $i33++;
  }

  $query0  = "UPDATE htransf SET trans2 ='$account' where doc_no ='$ref_nov' and service ='$item'";
     $result0 = mysql_query($query0);
  }

  //skip to next item
  //-----------------
  $i3++;
  }

//The Hospital
//------------
$query= "SELECT * FROM companyfile" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;

   echo"<table class='altrowstable' id='alternatecolor'>";
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
     $next_invoice = mysql_result($result,$i,"next_invoice");
     }

echo"<table width ='100%'><tr><td align ='center'><h2>$company</h2></td></tr>";
echo"<tr><td align ='center'>$address1</td></tr>";
echo"<tr><td align ='center'>$address2</td></tr>";
echo"<tr><td align ='center'>$address3</td></tr></table><br><br>";

$query3 = "select * FROM appointmentf where adm_no ='$adm_no'" ;
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($i3 < $num3){
  $adm_no = mysql_result($result3,$i3,"adm_no");  
  $name   = mysql_result($result3,$i3,"patients_name");  
  $payer  = mysql_result($result3,$i3,"payer");  
  $_SESSION['payer']= $payer;
  $adm_date= mysql_result($result3,$i3,"adm_date");  
  $dis_date= mysql_result($result3,$i3,"dis_date");  
  $i3++;
}

$amount = 0;
if ($dis_date=='0000-00-00 00:00:00'){
   $today = $_SESSION['sys_date'];
   $dis_time = date("y-m-d g:i:s", strtotime("$today"));
   $dis_date = $dis_time;
}
$adm_dates = strtotime("$adm_date");
$dis_dates = strtotime("$dis_time");
//echo 'Admited'.$adm_dates;
//echo 'Discharge'.$dis_time;

$mm = $dis_dates-$adm_dates;
$days = ($mm/86400);
//echo 'Days'.$days;
if ($days<=0){
   $days = 1;
}
//Now go and get non-chargables
//-----------------------------
echo"<table width ='100%'><tr>";
echo"<td width ='40'>Date</td><td width ='5'></td><td>$date</td>";
echo"<td width ='40'>Name</td><td width ='5'></td><td width ='200'>$patient</td>";
echo"<td width ='60'>IP No.</td><td width ='5'></td><td>$adm_no</td></table>";

echo"<table width ='100%' border ='1' ><tr>";
echo"<th width ='50' align ='left' bgcolor ='black'><font color ='white'>BILL HEAD</th><th width ='30' align ='center' bgcolor ='black' bgcolor ='black'><font color ='white'>PRICE</th><th width ='30' align ='center' bgcolor ='black'><font color ='white'>QTY</th><th width ='30' align ='center' bgcolor ='black'><font color ='white'>TOTAL</font></th></tr>";

$query = "SELECT service,trans2,amount,others2 FROM htransf WHERE invoice_no =' ' AND patients_name ='$patient1' and others2<>''"; 	 
$result = mysql_query($query) or die(mysql_error());
//echo"<table width ='500'><tr>";
while($row = mysql_fetch_array($result)){
	echo "<tr><td width ='300'>";
        echo $row['service'];
        echo"</td><td align ='right' width ='30'>";
        echo $row['amount'];
        $method1 = $row['others2'];
        $charged= $row['amount'];
        echo"</td><td align ='right' width ='30'>";
        if ($method1=='Daily'){
           $amount1 = $charged*$days;
           echo $days;
        }else{
           $amount1 = $charged*1;
           echo '1';
        }
        echo"</td><td align ='right' width ='30'>";
        echo $amount1;
        $amount = $amount + $amount1;
        echo"</td></tr>";
}
$query = "SELECT service,trans2, sum(amount) FROM htransf WHERE invoice_no =' ' AND patients_name ='$patient1' and others2 ='' GROUP BY trans2"; 	 
$result = mysql_query($query) or die(mysql_error());
$date = $_SESSION['sys_date'];
// Print out result
//echo"</tr></table>";
//echo"<table width ='500'><tr>";
while($row = mysql_fetch_array($result)){
     	   echo "<tr><td width ='300'>";
        echo $row['trans2'];
        echo"</td><td align ='right' width ='30' align ='right'>";
        echo $row['sum(amount)'];
        echo"</td><td width ='30'></td>";
        echo"<td width ='30' align ='right'>";
        echo $row['sum(amount)'];
        $amount = $amount + $row['sum(amount)'];
        echo"</td></tr>";
}

echo "<tr><td width ='300'>";
echo '<b>TOTAL INVOICE AMOUNT</b><br>';
echo"</td><td align ='right'>";
echo"</td><th width ='10'></th><td align ='right'>";
echo "<b>";
echo $amount;
echo "<b>";
echo"</td></tr>";

echo"</table><br>";
$payer =  $_SESSION['payer'];

echo"<h3><u>HOSPITAL INVOICE</h3></u><br>";
echo '<b>INVOICED TO:'.$payer;
echo"</b><br>";
echo"<table><tr>";
echo"<td>DOA</td><td width ='10'></td><td>$adm_date</td><td width ='10'></td>";
echo"<td>DOD</td><td width ='10'></td><td>$dis_date</td><td width ='10'></td>";
echo"<td>INV No.</td><td width ='10'></td><td>$invoice_no</td></table>";

echo"<table width ='500'><tr>";
echo"<td><b>BILL AMOUNT</b></td><td width ='10'></td><td>$amount</td></tr>";
echo"<tr><td>DISCOUNT TO MATCH REBATE RATE</td><td width ='5'></td><td>0</td></tr>";
echo"<tr><td>NET INVOICE AMOUNT</td><td width ='5'></td><td>$amount</td></tr>";
echo"<tr><td>PLEASE PAY THE AMOUNT</td><td width ='5'></td><td>$amount</td></tr></table><br><br>";

echo"PREPARED BY....................................<br><br>";
echo"CONFIRMED BY....................................<br><br>";
die();
}
?>





















<html>
<form action ="summary_bill.php" method ="GET">
<?php
$go_on='Yes';
if ($finalise=='Start'){
    echo"<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title><div class='navbar navbar-inverse navbar-fixed-top'>";      
    echo"<div class='navbar-inner'>";                  
    echo"<a class='btn btn-navbar' data-toggle='collapse' data-target='.nav-collapse'><span class='icon-bar'></span><span class='icon-bar'></span><span class='icon-bar'></span></a>";
    echo"<a class='brand' href='#'>Medi+ V10 (HMIS Global)</a><div class='nav-collapse collapse'><p class='navbar-text pull-right'><a target='_blank' href='http://www.hmisglobal.com' class='navbar-link'>www.hmisglobal.com</a></p>";

          echo"</div></div></div></div>";
    echo"<link rel=StyleSheet href='popups/header.css' type='text/css' media='screen'>";
    echo"<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet'>";

}
?>
    

</head>
<body> 
<!--background="images/background.jpg"-->


<?php
 $date2 = $_SESSION['sys_date'];
 $date1 = $_SESSION['sys_date'];
 $go_on ='Yes';
//if ($go_on=='Yes'){
//if (! isset($_GET['print'])){
//if (!isset($_GET['print']) OR !isset($_GET['finalise'])){
 $go_on = 'Yes';    
 $date = $_SESSION['sys_date'];



 echo"<table width ='400' border='0' border color ='black'><tr><td width ='100' align ='right'><b>Print Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td></tr><tr><td width='150' align='right'><b>From Patient: </b></td><td>";
 echo"<select id='supplier' name='supplier'>";                    
 $cdquery="SELECT name FROM appointmentf where adm_date<>'0000-00-00 00:00:00' order by name";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["name"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr>";

 echo"<tr><td width='100' align='right'><b>To Patient: </b></td><td>";
 echo"<select id='bed' name='bed'>";        
 $cdquery="SELECT name FROM appointmentf where app_date = '$date' order by name";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["name"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr>";
echo"<tr><td width ='100' align ='right'><b>Old Inv No: </b></td><td><input type='text' name='old_inv' size='10'></td></tr></table>";

echo"<br><br><br><br><br><br><br><br><br><br><br>";
echo"<table width ='400' border='0' border color ='black'><td width ='100'></td><td><input type='submit' name='print'  class='button' value='Print Preview'></td><td><input type='submit' name='finalise'  class='button' value='Finalise Now'></td></table>";
echo"</FORM><table width ='400'><td align ='center'></td></table>";

//}

?>

</body>
</html>