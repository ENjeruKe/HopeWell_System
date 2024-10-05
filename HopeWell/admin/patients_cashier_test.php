<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$username =$_SESSION['username'];
$mdate = $_SESSION['sys_date'];
//echo'User:'.$username;
?>

,hjgjghgghgghjghjgjghjghjgjhghjgjhg


<?php

if (isset($_GET['Laboratory'])){   
   $ref_nos = $_GET['Laboratory'];
   $query3= "UPDATE medicalfile SET status ='To Laboratory' WHERE ref_no ='$ref_nos'";
   $result3 =mysql_query($query3);
}

if (isset($_GET['Radiology'])){   
   $ref_nos = $_GET['Radiology'];
   $query3= "UPDATE medicalfile SET status ='To Radiology' WHERE ref_no ='$ref_nos'";
   $result3 =mysql_query($query3);
}
if (isset($_GET['Triage'])){   
   $ref_nos = $_GET['Triage'];
   $query3= "UPDATE medicalfile SET status ='To Triage' WHERE ref_no ='$ref_nos'";
   $result3 =mysql_query($query3);
}
if (isset($_GET['Completed'])){   
   $ref_nos = $_GET['Completed'];
   $query3= "UPDATE medicalfile SET status ='Completed' WHERE ref_no ='$ref_nos'";
   $result3 =mysql_query($query3);
}

if (isset($_GET['Doctor'])){   
   $ref_nos = $_GET['Doctor'];
   $query3= "UPDATE medicalfile SET status ='To Doctor' WHERE ref_no ='$ref_nos'";
   $result3 =mysql_query($query3);
}




if (isset($_GET['accounts44'])){
   $inv_no = $_GET['accounts33'];
   //Go and save first
   //-------------------
   $date = $_GET['date'];
   $date7 = $_GET['date'];
   $patients_name =$_GET['patient'];
   $adm_no =$_GET['accounts43'];
   $paids   =$_GET['amount'];
   //$payer  =$_GET['db_accounts'];
   $tr_type=$_GET['tr_type'];
   //$inv_no =$_GET['inv_no'];
   $payer =  $_SESSION['payer'];
   $update_last =$inv_no;




   $query7= "SELECT * FROM medicalfile WHERE ref_no ='$inv_no'";
   $result7 =mysql_query($query7) or die(mysql_error());
   $num7 =mysql_numrows($result7) or die(mysql_error());

   $tot =0;
   $i7 = 0;

   while ($i7 < $num7)
     {
     $pay_account = mysql_result($result7,$i7,"gl_account"); 
     $patients_name3 =mysql_result($result7,$i7,"name"); 

     $i7++;
    }

   if ($pay_account ==''){
       $tr_type ='CASH RECEIPT';
   }else{
       $tr_type='INVOICE';
   }





   $status =$_GET['status'];
   //$today = $_SESSION['sys_date'];
   $today = $_GET['date'];
   $paid_s =$_GET['amountp'];
   $total_only  = $_SESSION['total_only'];
   $discount =$_GET['amountd'];

   //$time = date('y-m-d h:i:s a', time());
   $time = date("Y-m-d H:i:s");
   $time = $_SESSION["log_date"];

   //Now go and update admit file
   //----------------------------
   $query5= "INSERT INTO logfile VALUES('$time','$customer','$username','Laboratory')";
   $result5 =mysql_query($query5);



   $db_accounts  = $payer;
   $db_accounts2 = $payer;
   //Get the receipt No.
   //-------------------   
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_ref ='$ref_no2'";
     $result3 = mysql_query($query3);
     //Get details of Receipt.
     //----------------------




   if ($tr_type<>'INVOICE'){
      $query7= "SELECT * FROM auto_transact WHERE invoice_no ='$inv_no' and selected='Yes' and credit_rate<>0 and balance = 0" or die(mysql_error());
   }else{
      $query7= "SELECT * FROM auto_transact_inv WHERE invoice_no ='$inv_no' and selected='Yes' and credit_rate<>0 and balance = 0" or die(mysql_error());
   }
   $result7 =mysql_query($query7) or die(mysql_error());
   $num7 =mysql_numrows($result7) or die(mysql_error());

   $tot =0;
   $i7 = 0;
   

   while ($i7 < $num7)
     {
     $narration   = mysql_result($result7,$i7,"description");  
     $amount      = mysql_result($result7,$i7,"credit_rate"); 
     $paid        = mysql_result($result7,$i7,"credit_rate"); 
     $price       = mysql_result($result7,$i7,"sell_price"); 
     $qty_s       = mysql_result($result7,$i7,"qty"); 
     $patients_name        = mysql_result($result7,$i7,"gl_account"); 
     $inv_nos     = mysql_result($result7,$i7,"invoice_no"); 

     //$inv_no      = mysql_result($result7,$i7,"id"); 
     $credit_account ='PHARMACY DRUGS';
     //Now go and post entry in the auto-cash file
     //-------------------------------------------
     $credit_account ='PHARMACY DRUGS';
     $drugs ='Yes';
      $i7++;
    }

   //Update the price of this service
   //--------------------------------
   
  

   $patients_names =$_GET['patient'];
   $date = $_SESSION["log_date"];
   $date = substr($date,0,10);

  
   $query= "UPDATE appointmentf SET status ='$status',image_id='$balance' WHERE adm_no ='$adm_no'";
   $result =mysql_query($query);

  $status =$_SESSION['status'];
 
 echo $status;


   $query= "UPDATE medicalfile SET status ='$status' WHERE  ref_no='$inv_no'";
   $result =mysql_query($query);


//Reduce stocks if any
//--------------------

   if ($tr_type<>'INVOICE'){
      $iss_type ='CASH';
      $query = "select * FROM auto_transact where invoice_no = '$inv_no' and sell_price<>0";
      //and location ='DRUGS'";
   }else{
      $iss_type ='ISP';
      $query = "select * FROM auto_transact_inv where invoice_no = '$inv_no' and sell_price<>0";
      //and location ='DRUGS'";
   }

   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;

   while ($i < $num)
      {           
       $location   = mysql_result($result,$i,"location");
//   if ($location =='DRUGS'){       
         $price   = mysql_result($result,$i,"sell_price");
         $item    = mysql_result($result,$i,"description");
         $inv_ref = mysql_result($result,$i,"invoice_no");
         $qty     = mysql_result($result,$i,"qty");
         $med_cost = mysql_result($result,$i,"credit_rate");

         $query2 = "select * FROM stockfile where description ='$item'" ;
         $result2 =mysql_query($query2) or die(mysql_error());
         $id = 0;
         $nRecord = 1;
         $No = $nRecord;
         $num2 =mysql_numrows($result2) or die(mysql_error());
         $i2 =0;
         $drug_total = 0;
         while ($i2 < $num2)
            {                  
            $level     = mysql_result($result2,$i2,"qty");
            $cost_price= mysql_result($result2,$i2,"cost_price");
            $bal_level = $level-$qty;
            $i2++;
            }
            $query7= "UPDATE stockfile SET qty='$bal_level',sell_price ='$price' WHERE description ='$item'";
            $result7 =mysql_query($query7);
$query4= "INSERT INTO st_trans VALUES('$location','$item','$patients_names',
'-$qty','$iss_type','$date','$username','$price','$med_cost','$ref_nos','$adm_no','','','','','')";
      $result4 =mysql_query($query4);



//Htransf
//-------
$query9   = "INSERT INTO htransf() VALUES('','$adm_no','$patients_name3','$date','$ref_no','$item','DB','$price','DB','PHARMACY DRUGS','','','','','','$qty','')";
   $result9 =mysql_query($query9);





//Tabulate the cost price of each item sold
//-----------------------------------------
$med_cost = $med_cost*0.67;
//Debit cost of goods sold in g/l
//-------------------------------
$patients_name =$item.'::'. $patients_names;
$debit_account ='COST OF GOODS SOLD';
$credit_account ='INVENTORY';
$query5= "INSERT INTO gltransf    VALUES('','$date','$debit_account','$ref_no','RC','$patients_name','$med_cost','$username','EXPENSE')";
   $result5 =mysql_query($query5);

   //Now go and Debit G/L Accounts file
   //-----------------------------------
   //Post Debit first
   //----------------
   $db_balance = 0;
   $query3 = "select * FROM glaccountsf WHERE account_name ='$debit_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;

   while ($i3 < $num3)
     {
     $db_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

   $db_balance = $db_balance +$med_cost;

   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$debit_account'";
   $result2 =mysql_query($query2);

   $acc_type ='CONTROL';
   //Now go and credit the bank
   //--------------------------
   $query5= "INSERT INTO gltransf VALUES('','$date','$credit_account','$ref_no','RC','$patients_name','-$med_cost','$username','$acc_type')";
   $result5 =mysql_query($query5);

   //Now go and update G/L Accounts file
   //-----------------------------------
   $query3 = "select * FROM glaccountsf WHERE account_name ='$credit_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $credit_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

     $credit_balance = $credit_balance -$med_cost;

     $query2= "UPDATE glaccountsf SET balance ='$credit_balance' WHERE account_name ='$credit_account'";
     $result2 =mysql_query($query2);
$i++;
echo $i;

//}

     // $i++;
   }

     //Print the receipt before deleting these stuff
     //---------------------------------------------
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>HMIS | Doctors Page </title>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
<!-- -->
function popitup(url) {
	newwindow=window.open(url,'name','height=300,width=450');
	if (window.focus) {newwindow.focus()}
	return false;
}


function popitups(url) {
	newwindow=window.open(url,'name','height=600,width=550');
	if (window.focus) {newwindow.focus()}
	return false;
}

<!-- // -->
</script>


</head>




<body>
<a href=javascript:popitup('pha_walk_in.php')><b>Walk in Patient</b><br><br><a href=javascript:popitups('post_db_receipts.php')><b>Debtors Receipts</b></a></a><br>
<form action ="patients_cashier.php" method ="GET">
<input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
$mdate =date('y-m-d');
echo"<input type='text' name='search' size='50'>Search by:";
echo"<select name ='search_by'>";
//echo"<option value='Selection Option'>A Selection Option required</option>";
echo"<option value='Name'>Name</option>";
echo"<option value='Date'>Date</option>";
echo"<option value='File number'>File number</option>";
echo"<option value='Doctor'>Doctor</option></select>";
//echo"<input type='text' name='date' size='15' value ='$mdate'><br>";
?>
</FORM>
<!--/td></table><br-->
<?php

   

$mmdate = date('y-m-d');
$mleast =123552620;
$mdate =date('y-m-d');
$mdate = $_SESSION['sys_date'];
//$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Doctor'){
     $query = "select * FROM  medicalfile WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
     $SQL = "select * FROM  medicalfile WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
   }
   if ($search_by =='Diagnosis'){
     $query = "select * FROM  medicalfile WHERE diag1,diag2,diag3 LIKE '%$search%' ORDER BY date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE diag1,diag2,diag3 LIKE '%$search%' ORDER BY date desc" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  medicalfile WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
   }
   if ($search_by =='Date'){
     $mmdate = $search;
     $_SESSION['smart_date']=$mmdate;
     $query = "select * FROM  medicalfile WHERE date = '$search' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE date = '$search' ORDER BY name,date desc" ;
   }
   if ($search_by =='File number'){
     $query = "select * FROM  medicalfile WHERE adm_no = '$search' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE adm_no = '$search' ORDER BY name,date desc" ;
   }   
 }else{
   $query= "SELECT * FROM medicalfile where status ='To cash office' and (date ='$mdate' or time<>'') ORDER BY dose7" or die(mysql_error());
   $SQL  = "SELECT * FROM medicalfile where status ='To cash office' and (date ='$mdate' or time<>'') ORDER BY dose7" or die(mysql_error());
}


$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;




                                                         
echo"<table width ='100%' class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='10'>ID</th><th>Click to Edit Patient's Vitals.</th><th>Age</th><th>Sex</th><th>App.Date</th><th>Temp</th><th>Pay Account</th><th>B.P</th></tr>";


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
      $update = mysql_result($result,$i,"date");  
      $contact = mysql_result($result,$i,"weight");  
      $street  = mysql_result($result,$i,"temp");
      $age    = mysql_result($result,$i,"age");
      $status    = mysql_result($result,$i,"status");
      $time   = mysql_result($result,$i,"time");
      $doctor = mysql_result($result,$i,"b_p");
      $height = mysql_result($result,$i,"height");
      $account = mysql_result($result,$i,"gl_account");

      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);
      

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];        
      $aa =$row['id'];   
      $aa4 =$row['invoice_no'];

      echo"<td width ='10' align ='left'>";      
      if ($mdate==$mmdate){
         echo $codes;
      }else{
    echo"<a href='patients_pha_add_service.php?accounts3=$bb&accounts=$aa&accounts4=$mmdate'>$codes<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      }
      echo"</td>";
      echo"<td width ='200' align ='left'><a href='../kingdavid/admin/patients_cashier_edit_test.php?accounts3=$bb&accounts=$aa&accounts4=$aa4'>$desc<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      echo"</td>";            
      echo"<td width ='30'>";      
      echo"$age";
      echo"</td>";      
      echo"<td width ='20'>";
      echo"$rate";
      echo"</td>";
//      echo"<td width ='60'>";
//      echo"$update";
//      echo"</td>";
      echo"<td width ='60'><a href='fix_errors.php?accounts=$aa'>$update</a></td>";      
      echo"<td width ='50'>";
      if ($status=='Completed'){
         echo"<font color ='red'>$status";
      }else{
      echo"<a href=javascript:popitup('change_account.php?accounts=$aa')>$status</a>";
      }
      echo"</font>";

      echo"</td>";
      echo"<td width ='200'>$account</td>";
      $bb =$row['id'];        
      $aa =$row['id'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      //$aa8=$row['Name'];
      $aa9=$row['app_date']; 
      //echo"<td width ='40' align ='right'>$contact</td>";
      echo"<td width ='40'>";
      echo"$doctor";
      echo"</td>"; 




      




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

