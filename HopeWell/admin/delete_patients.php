<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



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
			<li><a href="debtors_register.php"><i class="icon-list-alt icon-1x"></i>Acc Receivables</a></li>

		<li><a href="suppliers_register.php"><i class="icon-list-alt icon-1x"></i>Account Payables</a></li>

		
		<li><a href="doctors_register.php"><i class="icon-list-alt icon-1x"></i></i>Doctors Register</a></li>

		<li><a href="revenue_register.php"><i class="icon-list-alt icon-1x"></i>Revenue Code</a></li>

		<!--li><a href="beds_register.php"><i class="icon-list-alt icon-1x"></i>Beds Register</a></li-->

		<li><a href="disease_register.php"><i class="icon-list-alt icon-1x"></i>Diagnosis Register</a></li>
          <li><a href="gl_accounts_register.php"><i class="icon-list-alt icon-1x"></i>GL Acc Register</a></li>

		<li><a href="symptoms_register.php"><i class="icon-list-alt icon-1x"></i>Signs $ Symp Reg</a></li>

				<li><a href="delete_patients.php"><i class="icon-list-alt icon-1x"></i>Delete Wrong Pat</a></li>



			<!--li><a href="#"><i class="icon-bar-chart icon-1x"></i>Balance Sheet</a>                </li>
         <li><a href="invoices.php"><i class="icon-list-alt icon-1x"></i>Invoices</a>          </li>
			<li><a href="#"><i class="icon-bar-chart icon-1x"></i>Finalized Invoices</a>                </li-->


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
			<i class="icon-bar-chart"></i>  Reports
			</div>
			<ul class="breadcrumb">
			<!--li><a href="index.php">Dashboard</a></li> /
			<li class="active">Sales Report</li-->
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>



   <head>
<META HTTP-EQUIV="refresh" CONTENT="20">

<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
</style>


<?php


if (isset($_GET['accounts3'])){      
   $delete =$_GET['accounts3'];
   $query3 = "DELETE FROM appointmentf WHERE adm_no ='$delete'";
   $result3 =mysql_query($query3) or die(mysql_error());

   $query3 = "DELETE FROM medicalfile WHERE adm_no ='$delete'";
   $result3 =mysql_query($query3) or die(mysql_error());
}
?>
























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















<body>
<!--br><br>
<input type="submit" name="Submit"  class="button" value="New Patient" onclick="return popcontact('patients_reg_add2.php')"/><br>

<input type="submit" name="Submit"  class="button" value="Print Invoice" onclick="return popcontact('reprints_invoice.php')"/><br>
<input type="submit" name="Submit"  class="button" value="Post Invoice " onclick="return popcontact('posts_invoice.php')"/><br--><br>

<form action ="delete_patients.php" method ="GET">
<table align ='right'><input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
$mdate =date('y-m-d');
echo"<input type='text' name='search' size='50'>Search by:";
echo"<select name ='search_by'>";
echo"<option value='Name'>Name</option>";
echo"<option value='Card'>Card</option>";
echo"<option value='Mobile'>Mobile</option>";
echo"<option value='Doctor'>Doctor</option></select>";
?>
</FORM>
</td></table>


<?php
$yes =$_SESSION["repeat"];
//date_default_timezone_set('Africa/Nairobi');
//$date_time = date('m/d/Y h:i:s a', time());
if (isset($_GET['save_cancel'])){
   //Go and save first
   //-------------------
   if($yes =='Yes'){ 
      $adm_no=$_GET['id'];
      $date=$_GET['date'];
      $walk_in=$_GET['walk_in'];
      $doctor = $_GET['doc_account'];
      $customer =$_GET['customer'];
      $telephone=$_GET['tel'];
      $email =$_GET['email'];
      $appointment =$_GET['date'];
      $adm_date =$_GET['adm_date'];
      $dis_date =$_GET['dis_date'];
      $kin =$_GET['kin'];
      $kin_tel =$_GET['kin_tel'];
      $status =$_GET['status'];
      $payer =$_GET['db_account'];
      $ward =$_GET['ward'];
      $bed_no =$_GET['bed_no'];
      $id_no   =$_GET['id_no'];
      $nextid_no   =$_GET['nextid_no'];
      $nhif_no     =$_GET['nhif_no'];
      $subchief    =$_GET['subchief'];
      $chief       =$_GET['chief'];
      $village     =$_GET['village'];
      $sublocation =$_GET['sublocation'];
      $yes =' ';
      $bill_no = ' ';
      $textarea =$_GET['textarea'];
      $service = $_GET['service'];
      $sex =$_GET['sex'];
      $age =$_GET['age'];
      $today =date('y-m-d');
      $type ='Outpatient';
      if (isset($_GET['walk_in'])){ 
         $type='Walk-in';
      }
      if ($payer==''){
         $status ='To cash office';
      }else{
         $status ='To Doctor';
      }
      $query3 = "select * FROM companyfile" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $ref_no   = mysql_result($result3,$i3,"next_ref");  
        $bill_no   = mysql_result($result3,$i3,"next_ref");  
        $i3++;
        }
        $next_ref= $ref_no +1;

        $query4  = "UPDATE companyfile SET next_ref ='$next_ref'";
        $result4 = mysql_query($query4);
        $bill_no ='L'.$bill_no;

      //Go and dabit gltransf A/c
      //-------------------------
      $query5= "UPDATE appointmentf SET 
name ='$customer',telephone='$telephone',email='$email',doctor='$doctor',app_date='$appointment',kin='$kin',
kin_tel='$kin_tel',adm_date='$adm_date',dis_date='$dis_date',status='$status',payer='$payer',other_info='$textarea',age='$age',sex='$sex',image_id='$telephone',ward='$ward',
bed_no='$bed_no',nextid_no='$nextid_no',nhif_no='$nhif_no',subchief='$subchief',chief='$chief',village='$village',sublocation ='$sublocation',b_p ='$bill_no',
id_no ='$id_no' WHERE adm_no ='$adm_no'";

   $result5 =mysql_query($query5);  

if (isset($_GET['service'])){
   $query3 = "select * FROM revenuef WHERE name ='$service'" ;
   $result3 = mysql_query($query3) or die(mysql_error());
   $num3    = mysql_numrows($result3) or die(mysql_error());
   $i=0;
   while ($i < $num3)
     {
     $cash_price      = mysql_result($result3,$i,"cash_rate");          
     $credit_price    = mysql_result($result3,$i,"credit_rate");   
     $gledger_acc     = mysql_result($result3,$i,"gl_account");   
     $i++;
   }
   if ($payer==''){
      $price = $cash_price;
   }else{
      $price = $cash_price;
   }
   $_SESSION["repeat"] = ' ';
   $yes =$_SESSION["repeat"];
   $upd_gledger_acc     = substr($upd_gledger_acc,0,3);   

   $query2 = "select * FROM medicalfile where date = '$today'" ;
   $result2 =mysql_query($query2) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num2 =mysql_numrows($result2) or die(mysql_error());
   $i2 =0;
   $insert ='Yes';
   $drug_total = 0;
   while ($i2 < $num2)
   {                  
      $adm_no_find   = mysql_result($result2,$i2,"adm_no");
      if ($adm_no ==$adm_no_find){
         $insert ='No';
      }
   $i2++;
   }

   if ($insert=='Yes'){
      $query= "INSERT INTO medicalfile (location,adm_no,gl_account,date,age,name,sex,description,sell_price,type,status,ref_no) VALUES ('Review','$adm_no','$payer','$appointment','$age','$customer','$sex','Follow up consultation','$price','$type','$status','$next_ref')"; 
  $result =mysql_query($query);

   if ($payer==''){
      $status ='To Cash Office';
      //This is a credit sale and no need to save in cash file
      //------------------------------------------------------
   $query5= "INSERT INTO auto_transact VALUES('','$upd_gledger_acc','$service','$price','1','$price','$customer',
'$today','$adm_no','','$next_ref','')";
   $result5 =mysql_query($query5);  
   }else{
   $status =' ';
   $query5= "INSERT INTO auto_transact_inv VALUES('','$upd_gledger_acc','$service','$price','1','$price','$customer',
'$today','$adm_no','','$next_ref','')";
   $result5 =mysql_query($query5);  
   }
  }
   $query5= "UPDATE medicalfile SET gl_account='$payer' WHERE adm_no ='$adm_no' and date ='$today'";
   $result5 =mysql_query($query5);  

   $query5= "UPDATE appointmentf SET status='$status' WHERE adm_no ='$adm_no'";
   $result5 =mysql_query($query5); 
 
   //Now go and update h_transf and hdnotef coz of insurance
   //-------------------------------------------------------
   //$next_ref ='L'.$next_ref;
   $query5= "INSERT INTO hdnotef2 VALUES('$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location','$username')";
   $result5 =mysql_query($query5);

}
 

}
//End of session
//--------------
}
?>




<?php
$mleast =123552620;
$mdate =date('y-m-d');
//$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Card'){
     $query = "select * FROM  appointmentf WHERE adm_no = '$search' ORDER BY app_date desc" ;
     $SQL = "select * FROM  appointmentf WHERE adm_no = '$search' ORDER BY app_date desc" ;
   }
   if ($search_by =='Mobile'){
     $query = "select * FROM  appointmentf WHERE telephone LIKE '%$search%' ORDER BY app_date desc" ;
     $SQL   = "select * FROM  appointmentf WHERE telephone LIKE '%$search%' ORDER BY app_date desc" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  appointmentf WHERE name LIKE '%$search%' ORDER BY name,app_date desc" ;
     $SQL   = "select * FROM  appointmentf WHERE name LIKE '%$search%' ORDER BY name,app_date desc" ;
   }
 }else{
   $query= "SELECT * FROM appointmentf where app_date = '$mdate' ORDER BY app_date DESC" or die(mysql_error());
   $SQL  = "SELECT * FROM appointmentf where app_date = '$mdate' ORDER BY app_date DESC" or die(mysql_error());
}


$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;




                                                         
echo"<table class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='10'>Adm No.</th><th>Click to Edit Client's info.</th><th width ='50'>Phone No.</th><th>Sex</th><th>App.Date</th><th>Status.</th><th>Pay Account</th><th>Age</th><th>Doctor</th><th>Admit Date</th><th>Discharged</th></tr>";


$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"adm_no");  
      $desc    = mysql_result($result,$i,"name");   
      $rate    = mysql_result($result,$i,"sex");   
      $code   = mysql_result($result,$i,"payer");   
      $update = mysql_result($result,$i,"app_date");  
      $temp   = mysql_result($result,$i,"temp");  
      $street  = mysql_result($result,$i,"status");
      $age    = mysql_result($result,$i,"age");
      $b_p    = mysql_result($result,$i,"b_p");
      $weight = mysql_result($result,$i,"weight");
      $phone  = mysql_result($result,$i,"telephone");
      $doctor = mysql_result($result,$i,"doctor");
      $adm_date = mysql_result($result,$i,"adm_date");
      $status = mysql_result($result,$i,"status");
      $dis_date = mysql_result($result,$i,"dis_date");

      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];        
      $bp =$row['b_p'];  

      echo"<td width ='10' align ='left'><a href='delete_patients.php?accounts3=$bb'>$codes</td>";
      echo"<td width ='200' align ='left'>";
echo"$desc";

      echo"</td>";            
      echo"<td width ='30'>";      
      echo"$phone";
      echo"</td>";      
      echo"<td width ='20'>";
      echo"$rate";
      echo"</td>";
      echo"<td width ='100'>";
      echo"$update";
      echo"</td>";
      echo"<td width ='50'>";
      echo"$street";
      echo"</td>";
      echo"<td width ='200'>";
      echo"$code</a></td>"; 
      $bb =$row['adm_no'];        
      $aa =$row['adm_no'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      $aa8=$row['name'];
      $b_p=$row['b_p'];
      $aa9=$row['app_date']; 
      $today = date('y-m-d');
echo"<td width ='40' align ='right'>$age</td>";
     echo"<td width ='100'>";
      echo"$doctor";
      echo"</td>"; 

         echo"<td width ='100'>
$adm_date</a></td>"; 
     echo"<td width ='100'>";
      if ($status=='Discharged'){
         //echo"<td width ='100'><a href=javascript:popcontact('cash_issuetopatients.php?accounts=$aa&accounts3=$bb')>Pay</a></td>"; 
         echo"$dis_date";
      }else{
          //
      } 
       echo"</td>"; 
 
      //}








echo"</tr>";
   

      $i++;
  
       
}

      echo"</table>";









      




echo"<table>";
   


      $tot = number_format($tot);

      echo"<tr>";

      echo"<td width ='320' align ='left'>";
      
//echo"$desc";

      echo"</td>";

      
echo"<td width ='200'>";
      echo"</td>";
echo"<td width ='150'><h4>";
      echo"</h4></td>";
echo"<td width ='100' align ='right'>";
echo"</td>";
echo"<td width ='120' align ='right'>";
echo"</td>";
echo"<td width ='100' align ='right'><h4></h4></td>";
echo"<td width ='50'></td>";




      




echo"</tr>";
   




      echo"</table>";




?>
</body>
</html>

