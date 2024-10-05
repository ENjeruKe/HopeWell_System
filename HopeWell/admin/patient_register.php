<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$mdate =$_SESSION['sys_date'];
$username =$_SESSION['username'];
?>

<?php
if (isset($_GET['save_cancel1'])){
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
      $payer =$_GET['payer'];
      $ward =$_GET['ward'];
      $bed_no =$_GET['bed_no'];
      $id_no   =$_GET['id_no'];
      $nextid_no   =$_GET['nextid_no'];
      $nhif_no     =$_GET['nhif_no'];
      $subchief    =$_GET['subchief'];
      $chief       =$_GET['chief'];
      //$nhif_no     =$_GET['chief'];
      $village     =$_GET['village'];
      $yob         =$_GET['dob'];
      $sublocation =$_GET['sublocation'];
      $yes =' ';
      $bill_no = ' ';
      $textarea =$_GET['textarea'];
      $service = $_GET['service'];
      $sex =$_GET['sex'];
      $age =$_GET['age'];
      if ($service==''){
         $service = "CONSULTATION FEE";
      }
      $today =$_SESSION['sys_date'];
      $appointment =date('y-m-d');


      $type ='Outpatient';
      if (isset($_GET['walk_in'])){ 
         $type='Walk-in';
      }
        $status ='To cash office';
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
        $nexts_ref= $ref_no +1;

        $query4  = "UPDATE companyfile SET next_ref ='$next_ref'";
        $result4 = mysql_query($query4);
        $bill_no ='L'.$bill_no;


      //Asign visit Number
      //------------------


        $query5= "INSERT INTO next_refile VALUES('')";
        $result5 =mysql_query($query5);  
        
        $query3 = "select * FROM next_refile" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $next_ref   = mysql_result($result3,$i3,"next_ref");  
          $i3++;
          }
  
  $time = date("Y-m-d H:i:s");
 $time = $_SESSION["log_date"];
 $timew = date("H:i:s");
 $adm_date = date("Y-m-d H:i:s");
 
      //Go and dabit gltransf A/c
      //-------------------------
      $query5= "UPDATE appointmentf SET 
name='$customer',telephone='$telephone',email='$email',doctor='$doctor',app_date='$appointment',kin='$kin',
kin_tel='$kin_tel',adm_date='$adm_date',dis_date='$dis_date',status='$status',payer='$payer',other_info='$textarea',age='$age',sex='$sex',ward='$ward',bed_no='$bed_no',nextid_no='$nextid_no',nhif_no='$nhif_no',subchief='$next_ref',chief='$times',village='$village',sublocation ='$yob',b_p ='$bill_no',
id_no ='$id_no' WHERE adm_no ='$adm_no'";

$result5 =mysql_query($query5);  
if ($service<>''){
    //isset($_GET['service'])){
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
   $insert ='Yes';
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
$today = $_SESSION["log_date"];
$today = substr($today,0,10);
$appointment = substr($today,0,10);

         $status ='To cash office';


//$insert ='Yes';
   if ($insert=='Yes'){
   //   $query28= "INSERT INTO medicalfile (location,adm_no,gl_account,date,age,name,sex,description,sell_price,type,status,ref_no,doctor,dose7) VALUES ('Review','$adm_no','$payer','$appointment','$age','$customer','$sex','Follow up consultation','$price','$type','$status','$next_ref','$doctor','$times')"; 
    //  $result28 =mysql_query($query28);
      if ($payer==''){
         //This is a credit sale and no need to save in cash file
         //------------------------------------------------------
   $query5= "INSERT INTO auto_transact VALUES('','Lab','$service','$price','1','$price','$customer','$today','$adm_no','pay','$next_ref','')";
   $result5 =mysql_query($query5);  
   }else{
//   $status ='To Triage';
   $query5= "INSERT INTO auto_transact_inv VALUES('','Lab','$service','$price','1','$price','$customer',
'$today','$adm_no','pay','$next_ref','')";
   $result5 =mysql_query($query5);  
   }
  }
   $query5= "UPDATE medicalfile SET dose7='$times',gl_account='$payer',doctor='$doctor' WHERE adm_no ='$adm_no' and date ='$today'";
   $result5 =mysql_query($query5);  

   $query5= "UPDATE appointmentf SET chief ='$times',status='$status' WHERE adm_no ='$adm_no'";
   $result5 =mysql_query($query5); 
   //Now go and update h_transf and hdnotef coz of insurance
   //-------------------------------------------------------
   //$next_ref ='L'.$next_ref;
   $query5= "INSERT INTO hdnotef2 VALUES('$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location','$username')";
   $result5 =mysql_query($query5);


if (isset($_GET['optical'])){ 
 $query5= "INSERT INTO opt_hdnotef VALUES('','$adm_no','$customer','$today','$next_ref','$today','','0','0','$payer','$location','$username')";
 $result5 =mysql_query($query5);
  }


 if (isset($_GET['physio'])){ 
  //  $status ='To Physiotherapy';
 $query5= "INSERT INTO phy_hdnotef VALUES('','$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location','$username')";
 $result5 =mysql_query($query5);
  }
  
  
  if (isset($_GET['dental'])){ 
  //  $status ='To Dental';
 $query5= "INSERT INTO dent_hdnotef VALUES('','$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location','$username')";
 $result5 =mysql_query($query5);
  }
//$time = date('y-m-d h:i:s a', time());
 $time = $_SESSION["log_date"];
//date("Y-m-d H:i:s");


 //Now go and update admit file
 //----------------------------
 $query5= "INSERT INTO logfile VALUES('$time','$customer','$username','Review')";
 $result5 =mysql_query($query5);

  //addede to introduce record number instead of visit number
  //---------
   $query2 = "select * FROM medicalfile where adm_no = '$adm_no' and date= '$today'" ;
   $result2 =mysql_query($query2) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num2 =mysql_numrows($result2) or die(mysql_error());
   $i2 =0;
   while ($i2 < $num2)
   {                  
      $record_no = mysql_result($result2,$i2,"id");
      $query5= "UPDATE medicalfile SET ref_no='$record_no' WHERE id ='$record_no'";     
      $result5 =mysql_query($query5);  
   $i2++;
   }

   //$query5= "UPDATE auto_transact SET invoice_no='$record_no' WHERE line_no ='$adm_no' and date ='$today'";     
   //$result5 =mysql_query($query5);  

   //$query5= "UPDATE auto_transact_inv SET invoice_no='$record_no' WHERE line_no ='$adm_no' and date ='$today'";     
   //$result5 =mysql_query($query5);  


}
 

}
//End of session
//--------------


//echo "<table width ='100%'><br><br><br><br><br><br><td align //='center'><img src='text.gif' alt='Girl in a jacket'></td>//</table>";
//die();
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>General Ledger Accounts </title>
   <head>
<META HTTP-EQUIV="refresh" CONTENT="40">

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















<!--table align ='right'><td>
<input type="submit" name="Submit"  class="button" value="Verify NHIF  Patients" onclick="return popcontact('http://197.248.31.211/nhifwww-mas/hosp-app/index.html')"/></td><td>

<input type="submit" name="Submit"  class="button" value="New Patient" onclick="return popcontact('patients_reg_add2.php')"/></td><td>

<input type="submit" name="Submit"  class="button" value="Receipts" onclick="return popcontact5('auto_receipt.php')"/></td><td>

<input type="submit" name="Submit"  class="button" value="Print Invoice" onclick="return popcontact('reprints_invoice.php')"/></td><td>
<input type="submit" name="Submit"  class="button" value="Post Invoice " onclick="return popcontact('posts_invoice.php')"/></td><td width ='60'></td></table--><br><br>

<a href=javascript:popcontact505('lab_walk_in.php')><b>Bill Walk in Patient</b></a><br>

<?
echo"<table width='100%'><td width ='33.3333%' align ='center' bgcolor ='blue'><a href=javascript:popitup('reg_walkin.php')><b><font color ='white'><b>Walkin Registration Point</font></b></a></td><td width ='33.3333%' align ='center' bgcolor ='white'><a href=javascript:popitup('lab_walk_in.php')><b><font color ='red'><b>Walkin Services / Procedures </font></b></a></td><td width ='33.3333%' align ='center' bgcolor ='blue'><a href=javascript:popitup('pha_walk_in.php')><b><font color ='white'><b>Walkin Drug Point</font></b></a></td>";
echo"</table>";
?>



<form action ="patient_register.php" method ="GET">
<table align ='right'><input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
//$mdate =date('y-m-d');
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
$tod  = date("y-m-d g:i:s", strtotime("now"));
$tod = strtotime("now");
$times =$tod-10800;








$yes =$_SESSION["repeat"];
$yes ='Yes';
//$good ='Yes';
//date_default_timezone_set('Africa/Nairobi');
$date_time = date('m/d/Y h:i:s a', time());
//echo 'Time:'.$date_time;


if (isset($_GET['edit_cancel'])){
   //Go and save first
   //-------------------
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
      $input_date     =$_GET['input_date'];
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
         $status ='To cash office';
      $query3 = "select * FROM companyfile" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $ref_no   = mysql_result($result3,$i3,"next_ref");  
        $bill_no   = mysql_result($result3,$i3,"next_ref");  
        $rct_no   = mysql_result($result3,$i3,"next_rct");  
        $i3++;
        }
        $next_ref= $ref_no +1;
        $next_rct= $rct_no +1; 
    
      //Go and dabit gltransf A/c
      //-------------------------
$adm_date = date('m/d/Y h:i:s a', time());
 $appointment = date('y-m-d');
 $time = date("Y-m-d H:i:s");
 $time = $_SESSION["log_date"];
 $timew = date("H:i:s");
 $adm_date = date("Y-m-d H:i:s");


      $query5= "UPDATE appointmentf SET 
name='$customer',telephone='$telephone',email='$email',doctor='$doctor',app_date='$appointment',kin='$kin',
kin_tel='$kin_tel',adm_date='$adm_date',dis_date='$dis_date',status='$ref_no',payer='$payer',other_info='$textarea',age='$age',sex='$sex',image_id='$telephone',ward='$ward',
bed_no='$bed_no',nextid_no='$nextid_no',nhif_no='$nhif_no',subchief='$subchief',chief='$chief',village='$village',sublocation ='$sublocation',b_p ='$bill_no',
id_no ='$id_no' WHERE adm_no ='$adm_no'";

   $result5 =mysql_query($query5);  
   
   
  

}





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
      $payer =$_GET['payer'];
      $ward =$_GET['ward'];
      $bed_no =$_GET['bed_no'];
      $id_no   =$_GET['id_no'];
      $nextid_no   =$_GET['nextid_no'];
      $nhif_no     =$_GET['nhif_no'];
      $subchief    =$_GET['subchief'];
      $chief       =$_GET['chief'];
      //$nhif_no     =$_GET['chief'];
      $village     =$_GET['village'];
      $yob         =$_GET['dob'];
      $sublocation =$_GET['sublocation'];
      $postdated   =$_GET['postdated'];
      $yes =' ';
      $bill_no = ' ';
      $textarea =$_GET['textarea'];
      $service = $_GET['service'];
      $sex =$_GET['sex'];
      $age =$_GET['age'];
      if ($service==''){
         $service = "CONSULTATION FEE";
      }
      $today =$_SESSION['sys_date'];
      $appointment =date('y-m-d');


      $type ='Outpatient';
      if (isset($_GET['walk_in'])){ 
         $type='Walk-in';
      }
         $status ='To cash office';
      $query3 = "select * FROM companyfile" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
//        $ref_no   = mysql_result($result3,$i3,"next_ref");  
        $bill_no   = mysql_result($result3,$i3,"next_ref");  
        $i3++;
        }
 //       $next_ref= $ref_no +1;

        $query4  = "UPDATE companyfile SET next_ref ='$next_ref'";
        $result4 = mysql_query($query4);
        $bill_no ='L'.$bill_no;

//echo 'a'.$next_ref;
      //Asign visit Number
      //------------------
        $query5= "INSERT INTO next_refile VALUES('')";
        $result5 =mysql_query($query5);  
        $query3 = "select * FROM next_refile" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $next_ref   = mysql_result($result3,$i3,"next_ref");  
          $i3++;
          }

$time = date("Y-m-d H:i:s");
 $time = $_SESSION["log_date"];
 $timew = date("H:i:s");
 $adm_date = date("Y-m-d H:i:s");
 
      //Go and dabit gltransf A/c
      //-------------------------
      $query5= "UPDATE appointmentf SET 
name='$customer',telephone='$telephone',email='$email',doctor='$doctor',app_date='$appointment',kin='$kin',
kin_tel='$kin_tel',adm_date='$adm_date',dis_date='$dis_date',status='$status',payer='$payer',other_info='$textarea',age='$age',sex='$sex',ward='$ward',bed_no='Postdated',nextid_no='$nextid_no',nhif_no='$nhif_no',subchief='$next_ref',chief='$times',village='$village',sublocation ='$yob',b_p ='$bill_no',
id_no ='$id_no' WHERE adm_no ='$adm_no'";
$result5 =mysql_query($query5);  

if ($service<>''){
    //isset($_GET['service'])){
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
   $insert ='Yes';
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
$today = $_SESSION["log_date"];
$today = substr($today,0,10);
$appointment = substr($today,0,10);

echo 'c'.$next_ref;

//$insert ='Yes';
   if ($insert=='Yes'){
  
  
   if (isset($_GET['optical'])){ 
 $query5= "INSERT INTO opt_hdnotef VALUES('','$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location','$username')";
 $result5 =mysql_query($query5);
  }
  
   if (isset($_GET['physio'])){ 
 //   $status ='To Physiotherapy';
 $query5= "INSERT INTO phy_hdnotef VALUES('','$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location','$username')";
 $result5 =mysql_query($query5);
  }
  
  
   if (isset($_GET['postdated'])){ 
 //   $status ='To Physiotherapy';
 $query5= "INSERT INTO postdated_invf VALUES('','$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location','$username')";
 $result5 =mysql_query($query5);
  }
  
  
  if (isset($_GET['dental'])){ 
//    $status ='To Dental';
 $query5= "INSERT INTO dent_hdnotef VALUES('','$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location','$username')";
 $result5 =mysql_query($query5);
  }
       
      // echo 'cod'.$next_ref;
       
      $query= "INSERT INTO medicalfile (location,adm_no,gl_account,date,age,name,sex,description,sell_price,type,status,ref_no,doctor,dose7,sign1) VALUES ('Review','$adm_no','$payer','$appointment','$age','$customer','$sex','Follow up consultation','$price','$type','$status','$next_ref','$doctor','$times','$telephone')"; 
      $result =mysql_query($query);
      
      
      
 $query= "INSERT INTO newprescription (prescid,TransDate,Type,PatId,Patname,OPNo,StartTime) VALUES ('$next_ref','$today','Revisit','$adm_no','$customer','$next_ref','$timew')"; 
$result =mysql_query($query);
      $status ='To cash office';
   
      
      if ($payer==''){
         //This is a credit sale and no need to save in cash file
       echo 'd'.$next_ref;
         //------------------------------------------------------
   $query5= "INSERT INTO auto_transact VALUES('','Lab','$service','$price','1','$price','$customer','$today','$adm_no','pay','$next_ref','')";
   $result5 =mysql_query($query5);  
   }else{
  $query5= "INSERT INTO auto_transact_inv VALUES('','Lab','$service','$price','1','$price','$customer',
'$today','$adm_no','pay','$next_ref','')";
   $result5 =mysql_query($query5);  

   }
  }
   $query5= "UPDATE medicalfile SET dose7='$times',gl_account='$payer',doctor='$doctor' WHERE adm_no ='$adm_no' and date ='$today'";
   $result5 =mysql_query($query5);  


   $query5= "UPDATE appointmentf SET chief ='$times',status='$status' WHERE adm_no ='$adm_no'";
   $result5 =mysql_query($query5); 
   //Now go and update h_transf and hdnotef coz of insurance
   //-------------------------------------------------------
   //$next_ref ='L'.$next_ref;
   $query5= "INSERT INTO hdnotef2 VALUES('$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location','$username')";
   $result5 =mysql_query($query5);

//Blocked since it is pasted up
//-----------------------------
//if (isset($_GET['optical'])){ 
// $query5= "INSERT INTO opt_hdnotef VALUES('','$adm_no','$customer','$today'//,'$next_ref','$today','','$price','$price','$payer','$location'//,'$username')";
 //$result5 =mysql_query($query5);
//  }
//---------------------------


//$time = date('y-m-d h:i:s a', time());
 $time = $_SESSION["log_date"];
//date("Y-m-d H:i:s");


 //Now go and update admit file
 //----------------------------
 $query5= "INSERT INTO logfile VALUES('$time','$customer','$username','Review')";
 $result5 =mysql_query($query5);


   //Disabled this coz of pending records
   //------------------------------------
   //addede to introduce record number instead of visit number
   //---------
   //$query2 = "select * FROM medicalfile where adm_no = '$adm_no' and date= '$today'" ;
   //$result2 =mysql_query($query2) or die(mysql_error());
   //$id = 0;
   //$nRecord = 1;
   //$No = $nRecord;
   //$num2 =mysql_numrows($result2) or die(mysql_error());
   //$i2 =0;
   //while ($i2 < $num2)
   //{                  
   //      $record_no = mysql_result($result2,$i2,"id");
   //      $query5= "UPDATE medicalfile SET ref_no='$next_ref' WHERE id ='$record_no'";     
   //      $result5 =mysql_query($query5);  
   //$i2++;
   //}



}
 

}
//End of session
//--------------
}
?>




<?php
$mdate =$_SESSION['sys_date'];
//echo 'Date:'.$mdate;

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
   $query= "SELECT * FROM appointmentf where app_date = '$mdate'";
   $SQL  = "SELECT * FROM appointmentf where app_date = '$mdate'";
   //or (status<>'Completed' and id >= 4780) ORDER BY CHIEF" or die(mysql_error())
   //or (status<>'Completed' and id >= 4780) ORDER BY CHIEF" or die(mysql_error())
}
//or (status<>'Completed' and id > 3940)

$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;



$query3 = "select * FROM companyfile" ;
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($i3 < $num3)
  {
  $todays   = mysql_result($result3,$i3,"today");  
  $i3++;
  }
                                                         
echo"<table class='altrowstable' id='alternatecolor' border ='1' width ='100%'>";
echo"<tr><th width ='10'>Adm No.</th><th>Click to Edit Client's info.</th><th width ='50'>Phone No.</th><th>Sex</th><th>App.Date</th><th>Status/ Admit.</th><th>Doctor</th><th>Pay Account</th><th>Age</th><th>Ref</th></tr>";

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
      $balance = mysql_result($result,$i,"image_id");
      $bed_no = mysql_result($result,$i,"bed_no");

      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];        
      $bp =$row['b_p'];  
      $adm_no =$row['adm_no'];

      echo"<td width ='10%' align ='left'><a href=javascript:popcontact3('debit_notes.php?accounts3=$bb')>$codes</td>";
      echo"<td width ='20%' align ='left'><a href='patients_reg_edit.php?accounts3=$bb&accounts=$bb'>$desc</a>";
      //echo"$desc";
      $aa9=$row['app_date']; 
      echo"</td>";            
      echo"<td width ='10%'>";      
      echo"$phone";
      echo"</td>";      
      echo"<td width ='5%'>";
      echo"$rate";
      echo"</td>";
      echo"<td width ='10%'>";
      echo"$update";
      echo"</td>";
      if ($bed_no<>''){
         $color ='green';
      }else{
      }
      echo"<td bgcolor ='$color' width ='10%'>";
      if ($todays==$aa9 and $status=='In-Ward' and $bed_no==''){
echo"<a href=javascript:popcontact3('admit_patients_direct.php?accounts=$adm_no&accounts3=$ref_nos')>$street</a>";
      }else{
      echo"$street";
      }
      $color ='';
      echo"</td>";
      echo"<td width ='15%'>";
      echo"$doctor";
      echo"</td>"; 

      echo"<td width ='30%'>";
      echo"<!--a href=javascript:popcontact('issuetopatients.php?accounts=$aa&accounts3=$bb&accounts4=$bp')-->$code<!--/a--></td>"; 
      $bb =$row['adm_no'];        
      $aa =$row['adm_no'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      $aa8=$row['name'];
      $b_p=$row['b_p'];
      $today =$_SESSION['sys_date'];

   $axe =$aa3;

   if($axe < 100){
   $age =$axe.' y';
   }elseif ($axe > 100){
   $mtod =date("Y-m-d","$axe");
   //$today =''
   $today = $date;
   $diff = date_diff(date_create($mtod), date_create($today));
   //echo 'Age is '.$diff->format('%y'.'y '.'%m'.'m '.'%d'.'d');
   
   $age=$diff->format('%y'.' y '.'%m'.' m '.'%d'.'d');
   }else{
 $mtod =date("Y-m-d","$axe");
   //$today =''
   $today = $date;
   $diff = date_diff(date_create($mtod), date_create($today));
   //echo 'Age is '.$diff->format('%y'.'y '.'%m'.'m '.'%d'.'d');
   
   $age=$diff->format('%y'.' y '.'%m'.' m '.'%d'.'d');
  
}


echo"<td width ='5%' align ='right'>$age</td>";
echo"<td width ='2%' align ='right'></td>";
 
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

