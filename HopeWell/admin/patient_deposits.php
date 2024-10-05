<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>General Ledger Accounts </title>
<head>

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















<body>
<table align ='right'><td align ='right'>
<form action ="patient_deposits.php" method ="GET">
<input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
$mdate =date('y-m-d');
echo"<input type='text' name='search' size='50'>Search by:";
echo"<select name ='search_by'>";
echo"<option value='Name'>Name</option>";
echo"<option value='Mobile'>Mobile</option>";
echo"<option value='Doctor'>Doctor</option></select>";
?>
</FORM>
</td></table>


<?php
//date_default_timezone_set('Africa/Nairobi');
//$date_time = date('m/d/Y h:i:s a', time());
if (isset($_GET['save_cancel'])){

   //Go and save first
   //-------------------
   $adm_no=$_GET['id'];
   $date=$_GET['date'];
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

   $id_no   =$_get['id_no'];
   $nextid_no   =$_get['nextid_no'];
   $nhif_no     =$_get['nhif_no'];
   $subchief    =$_get['subchief'];
   $chief       =$_get['chief'];
   $village     =$_get['village'];
   $sublocation =$_get['sublocation'];

   //$textarea =$_GET['textarea'];
   $service = $_GET['service'];
   $sex =$_GET['sex'];
   $age =$_GET['age'];
   $today =date('y-m-d');
   $type ='Outpatient';
   if ($payer==''){
      $status ='To cash office';
   }else{
      $status ='';
   }

   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");  
     $i3++;
     }
     $next_ref= $ref_no +1;

     $query4  = "UPDATE companyfile SET next_ref ='$next_ref'";
     $result4 = mysql_query($query4);


   //Go and dabit gltransf A/c
   //-------------------------
$query5= "UPDATE appointmentf SET 
name ='$customer',telephone='$telephone',email='$email',doctor='$doctor',app_date='$today',kin='$kin',
kin_tel='$kin_tel',adm_date='$adm_date',dis_date='$dis_date',status='$status',payer='$payer',other_info='$textarea',age='$age',sex='$sex',image_id='$telephone',ward='$ward',bed_no='$bed_no',nextid_no ='$nextid_no',nhif_no ='$nhif_no',subchief='$subchief',chief='$chief',village='$village',sublocation ='$sublocation',id_no ='$id_no' WHERE adm_no ='$adm_no'";

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
      $query= "INSERT INTO medicalfile (adm_no,gl_account,date,age,name,sex,description,sell_price,type,status,ref_no) VALUES ('$adm_no','$payer','$today','$age','$customer','$sex','Follow up consultation','$price','$type','$status','$next_ref')"; 
  $result =mysql_query($query);

   if ($payer==''){
      $status ='To Cash Office';
      //This is a credit sale and no need to save in cash file
      //------------------------------------------------------
   $query5= "INSERT INTO auto_transact VALUES('','$company_identity','$service','$price','1','$price','$customer',
'$today','$adm_no','','$next_ref')";
   $result5 =mysql_query($query5);  
   }else{
   $status =' ';
   $query5= "INSERT INTO auto_transact_inv VALUES('','$company_identity','$service','$price','1','$price','$customer',
'$today','$adm_no','','$next_ref')";
   $result5 =mysql_query($query5);  
   }
  }
   $query5= "UPDATE medicalfile SET status='$status' WHERE ref_no ='$next_ref'";
   $result5 =mysql_query($query5);  

   $query5= "UPDATE appointmentf SET status='$status' WHERE adm_no ='$adm_no'";
   $result5 =mysql_query($query5);  
   //Now go and update h_transf and hdnotef coz of insurance
   //-------------------------------------------------------

 $query5= "INSERT INTO hdnotef VALUES('$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location',
'$username')";
 $result5 =mysql_query($query5);

}
 

}
?>




<?php
$mleast =123552620;
$mdate =date('y-m-d');
//$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Doctor'){
     $query = "select * FROM  appointmentf WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
     $SQL = "select * FROM  appointmentf WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
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
   $query= "SELECT * FROM appointmentf ORDER BY app_date DESC" or die(mysql_error());
   $SQL  = "SELECT * FROM appointmentf ORDER BY app_date DESC" or die(mysql_error());
}


$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;




                                                         
echo"<table class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='10'>Adm No.</th><th bgcolor='black'><font color ='white'>Click to Pay Deposit</font></th><th>Phone No.</th><th>Sex</th><th>App.Date</th><th>Status.</th><th>Pay Account</th><th>Age</th><th>Admitted</th><th>Discharged</th></tr>";


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
      $contact = mysql_result($result,$i,"temp");  
      $street  = mysql_result($result,$i,"status");
      $age    = mysql_result($result,$i,"age");
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

      echo"<td width ='10' align ='left'>$codes</td>";
      echo"<td width ='200' align ='left'><a href=javascript:popcontact6('ip_post_receipts.php?accounts3=$bb&accounts=$bb')>$desc<img src='ico/Profile.ico' alt='statement' 
height='12' width='12'></a>";

      //echo"$desc";
      echo"</td>";            
      echo"<td width ='30'>";      
      echo"$phone";
      echo"</td>";      
      echo"<td width ='20'>";
      echo"$rate";
      echo"</td>";
      echo"<td width ='60'>";
      echo"$update";
      echo"</td>";
      echo"<td width ='50'>";
      echo"$street";
      echo"</td>";
      echo"<td width ='200'>";
      echo"$code";
      echo"</td>";

      $bb =$row['adm_no'];        
      $aa =$row['adm_no'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      $aa8=$row['name'];
      $aa9=$row['app_date']; 

echo"<td width ='40' align ='right'>$age</td>";
      if ($status=='In-Ward'){
echo"<td width ='100' bgcolor ='green'><font color ='white'>$adm_date</font></td>"; 
      }else{
echo"<td width ='100'>$adm_date</td>"; 
     }
     if ($status=='Discharged'){
   echo"<td width ='100' bgcolor ='blue'><font color ='white'>$dis_date</font></td>"; 
     }else{
   echo"<td width ='100'>$dis_date</td>"; 
     }


      




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

