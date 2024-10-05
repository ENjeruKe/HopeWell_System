<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>
 








<?php

 require('open_database.php');

 $branch     = $_SESSION['branch']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 if (isset($_GET['print'])){
    $search = $_GET['search'];
    $date1  = $_GET['date1'];
    $date2  = $_GET['date2'];

   echo"<h2><u>DEBTORS STATEMENT OF ACCOUNT</u></h2>";

echo $search;


   //--------------------------------------------
   $query= "SELECT * FROM debtorsfile WHERE account_name ='$search' ORDER BY account_name" or die(mysql_error());
   $result =mysql_query($query);
   $num =mysql_numrows($result);
   $tot =0;

   $i = 0;
   $SQL = "SELECT * FROM debtorsfile WHERE account_name ='$search' ORDER BY account_name" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   while ($row=mysql_fetch_array($hasil)) 
   {         
      $acc_no      = mysql_result($result,$i,"accno");  
      $acc_no2      = mysql_result($result,$i,"client_id");  
      $acc_name    = mysql_result($result,$i,"account_name");  
      $caddress1    = mysql_result($result,$i,"telephone_no");   
      $caddress2    = mysql_result($result,$i,"address");   
   }

   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query);
   $num =mysql_numrows($result);
   $tot =0;

   $i = 0;
   $SQL = "select * FROM companyfile" ;
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
   }
   echo"<font size ='2'>";
   echo"<table width ='100%'>";      
   echo"<tr><td align ='left'><b>$acc_no</b></td><td width ='50%'></td><td align ='right'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>$acc_name</b></td><td width ='50%'></td><td align ='right'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>$caddress2</b></td><td width ='50%'></td><td align ='right'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>$caddress1</b></td><td width ='50%'></td><td align ='right'><b>$address3</b></td></tr>";
   echo"</table><br>";
   $to ='  To  ';
   echo"Report Date Range From :.$date1.  $to. $date2";
   $query  = "select * FROM dtransf WHERE trim(acc_no) = '$search' AND date >='$date1' AND date <= '$date2' ORDER BY date"; 
   //OR acc_no = '$acc_no2' OR acc_no = '$acc_name' 
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());





$tot =0;
$i = 0;
                                                         
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Adm No.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:250px;height:2px;'>";
echo"Ref No.<img src='space.jpg' style='width:40px;height:2px;'>";
echo"Type<img src='space.jpg' style='width:50px;height:2px;'>";
echo"<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Debit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Credit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:1px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
if (isset($_GET['search'])){
   $search = $_GET['search'];
   //$SQL ="select * FROM dtransf WHERE acc_no = '$acc_no' AND date >='$date1' AND date <= '$date2' ORDER BY date" ;   
   $SQL = "select * FROM dtransf WHERE trim(acc_no) = '$search'  AND date >='$date1' AND date <= '$date2' ORDER BY date"; 
// OR acc_no = '$acc_no2' OR acc_no = '$acc_name'

 }else{
  $SQL= "SELECT * FROM dtransf ORDER BY date" or die(mysql_error());
}
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
echo"<font size ='1'>";
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"balance");   
      $code   = mysql_result($result,$i,"doc_no");   
      $update = mysql_result($result,$i,"adm_no");  
      $contact = mysql_result($result,$i,"description");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"type");  
      $total   = mysql_result($result,$i,"balance");  
      $amount   = mysql_result($result,$i,"amount");  
      $qty     = 0;

      $codes2 = $rate; 
      $update2 = $codes2;
      $update3 = $amount;
      
      $tot = $tot +$total;
      $update2 = number_format($update2);
      $update3 = number_format($update3);
      
      $tot2 = number_format($tot);
      $rate = number_format($rate);
      if ($total <>0) {
      echo"<tr>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='100' align ='left'>";      
      echo strtoupper("$update");
      //strtolower
      echo"</td>";
      echo"<td width ='380' align ='left'>";      
      echo strtoupper("$contact");
      echo"</td>";

      echo"<td width ='60' align ='left'>";      
      echo strtoupper("$code");
      echo"</td>";

      echo"<td width ='50' align ='left'>";      
      echo strtoupper("$desc");
      echo"</td>";

      echo"<td width ='50' align ='right'>";
      //echo"$update3";
      echo"</td>";  

      $bb =$row['acc_no'];                    
      echo"<td width ='50' align ='right'>";
      if ($amount > 0){
         echo"$update3";
      }
      echo"</td>";
      $aa =$row['doc_no'];        
      //$aa2 =$row['payer'];   
      $aa3=$row['description'];        
      $aa4=$row['type'];   
      //$aa5=$row['towards'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];

    
      echo"<td width ='60' align ='right'>";
      if ($amount < 0){
         echo"$update3";
      }
      echo"</td>";              
      echo"<td width ='50' align ='right'>";
      //echo"$update2";
      echo"</td>";              

      echo"<td width ='60' align ='right'>";
      echo strtolower("$tot2");
echo"</td></tr>";
}
      $i++;      
     }
      echo"</table>";
      echo"<hr>";
      echo"<table border='0'>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='200'>";
      echo"</td>";      
      echo"<td width ='150'><b>";      
      echo"Total";      
      echo"</b></td>";      
      echo"<td width ='70' align ='right'>";      
      //echo"$debit";
      echo"</td>";      
      echo"<td width ='30' align ='right'>";      
      //echo"$credit";
      echo"</td>";      
      //echo"<td width ='70' align ='right'></td>";      
      echo"<td width ='50' align ='right'></td>";      
      echo"<td width ='50' align ='right'><b>$tot</b></td>";
      echo"</tr>";   
      echo"</table>";
      echo"<hr>";

}else{

?>
















<link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>
</head>

<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
                            <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
	<li><a href="in_pat_billing.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-list-alt icon-1x"></i>In Patient A/c</a>  </li>             
	<li><a href="post_payment_doctors.php"><i class="icon-list-alt icon-1x"></i>Payment to Doctors</a>                                     </li>
	<li><a href="post_payment_supplier.php"><i class="icon-list-alt icon-1x"></i>Payment to Supplier</a>                                     </li>
	<li><a href="petty_cash_acc.php"><i class="icon-list-alt icon-1x"></i>Petty Cash</a>                                    </li>
	<li><a href="post_db_receipts.php"><i class="icon-list-alt icon-1x"></i>Debtors Receipts</a>                                    </li>
	<li><a href="debtors_statement2.php"><i class="icon-list-alt icon-1x"></i>Debtors Statement</a>                                    </li>
	<li><a href="doctors_statement.php"><i class="icon-list-alt icon-1x"></i>Doctors Statement</a>                                    </li>
	<li><a href="suppliers_statement.php"><i class="icon-list-alt icon-1x"></i>Suppliers Statement</a>                                    </li>
	<li><a href="#"><i class="icon-bar-chart icon-1x"></i>Balance Sheet</a>                </li>
         <li><a href="invoices.php"><i class="icon-list-alt icon-1x"></i>Invoices</a>          </li>
         <li><a href="#"><i class="icon-bar-chart icon-1x"></i>Finalized Invoices</a>                </li>
         <li><a href="stocks_grn.php"><i class="icon-list-alt icon-1x"></i>Recved Frm Supp</a>          </li>
	   <li><a href="stocks_grt.php"><i class="icon-bar-chart icon-1x"></i>Returns To Supplier</a>                </li>



					<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul>     
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-bar-chart"></i> Sales Report
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Sales Report</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>











<?php


 
   echo"<h1>Debtors Statement of Account</h1><br><br>";
   echo"<form action ='debtors_statement2.php' method ='GET'>";
   echo"<input type='submit' name='print'  class='button' value='Print Report'>";
   //echo"<input type='text' name='search' size='30'>


   echo"<select id='search' name='search'>"; 
   $cdquery="SELECT account_name FROM debtorsfile ORDER BY account_name";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   while ($cdrow=mysql_fetch_array($cdresult)) {
         $cdTitle=$cdrow["account_name"];
   echo "<option>$cdTitle</option>";            
   }
   echo"</select><br>";





 echo"Date Range From : <input type='text' name='date1' value ='$date1' size='12' > To Date: <input type='text' name='date2' value ='$date2' size='12'><br>";
//echo"<input type='submit' name='print'  class='button' value='Print'>";
echo"</FORM>";


$today = date('y/m/d');
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $date1  = $_GET['date1'];
   $date2  = $_GET['date2'];
   $query  = "select * FROM dtransf WHERE description LIKE '%$search%' AND date >='$date1' AND date <= '$date2' ORDER BY date" ;
 }else{
   $query= "SELECT * FROM dtransf WHERE balance > 0 and type='TRF' ORDER BY acc_no,date" or die(mysql_error());
}
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

//echo"<table bgcolor ='black' border ='0'>";

                                                         
//echo"<table class='altrowstable' id='alternatecolor'>";
//echo"<tr><th>Date</th><th>Payer Description </th><th width ='300'>Servis Description</th><th>Amount</th><th>Action</th></tr>";
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Adm No.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:100px;height:2px;'>";
echo"Ref No.<img src='space.jpg' style='width:40px;height:2px;'>";
echo"Type<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Debit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Credit<img src='space.jpg' style='width:30px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:1px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


//echo"<table class='altrowstable' id='alternatecolor' border //
//='0'>";
echo"<table width ='100%'>";
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $SQL ="select * FROM dtransf WHERE description LIKE '%$search%' AND date >='$date1' AND date <= '$date2' ORDER BY date" ;
   //"select * FROM receiptf WHERE towards LIKE '%$search%' ORDER BY date" ;
   
 }else{
   $SQL= "SELECT * FROM dtransf WHERE acc_no ='NHIF' and type='TRF' ORDER BY acc_no,date" or die(mysql_error());
}
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;


while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"balance");   
      $code   = mysql_result($result,$i,"doc_no");   
      $update = mysql_result($result,$i,"adm_no");  
      $contact = mysql_result($result,$i,"description");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"type");  
      $total   = mysql_result($result,$i,"balance");  
      $qty     = 0;

      $codes2 = $total; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);
      $rate = number_format($total);
      echo"<tr'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='70' align ='left'>";      
      echo"$update";
      echo"</td>";
      echo"<td width ='300' align ='left'>";      
      echo"$contact";
      echo"</td>";

      echo"<td width ='50' align ='left'>";      
      echo"$code";
      echo"</td>";
      echo"<td width ='50' align ='left'></td>";
      echo"<td width ='50' align ='left'>";      
      echo"$desc";
      echo"</td>";    
      echo"<td width ='50' align ='right'>";
      if ($pay_mode=='TRF' OR $pay_mode=='INV'){
         echo"$update2";
      }
      echo"</td>";  

      echo"<td width ='50' align ='right'>";
      if ($pay_mode=='TRF' OR $pay_mode=='INV'){
      }else{
         echo"$update2";
      }
      echo"</td>";
      echo"<td width ='50' align ='left'></td>";
  
      $bb =$row['acc_no'];                    
      $_SESSION['acc_no'] =$row['acc_no'];  
      $aa =$row['doc_no'];        
      $aa2 =$row['desc'];   
      $aa3=$row['desc'];        
      $aa4=$row['type'];   
      $aa5=$row['adm_no'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];              
      echo"<td width ='100' align ='right'>$tot</td>";
echo"</tr>";
      $i++;      
     }
      echo"</table>";
echo"<hr>";
      echo"<table>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='700' align ='left'></td>";
      echo"<td width ='150'><h4></td>";      
      echo"Total";      
      echo"</h4></td>";      
      echo"<td width ='100' align ='right'><h4>$tot</h4></td>";      
      echo"</tr>";   
      echo"</table>";
}
?>
