<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>







<!DOCTYPE html>
<html lang="en">
  
<head>
<meta charset="utf-8">    
<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>    



﻿<?php
//session_start();
$_SESSION['discount']= $_GET['no_disc'];       
$company_identity = $_SESSION['company'];
//------------------__-----
$codes =$_SESSION['company'];

   //New changes
if (isset($_GET['accounts3'])){    
   $mydate =date('y-m-d');
   $adm_no  = $_GET['accounts3'];
   $inv_no  = $_GET['accounts'];
   $amount   = $_GET['accounts4'];
   $inv_no   = $_GET['accounts5'];
 
   //Get details of Receipt.
   //----------------------
   $query3 = "select * FROM auto_transact_inv WHERE invoice_no='$inv_no' and selected='Yes'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $patients_name   = mysql_result($result3,$i3,"gl_account");  
     $narration   = mysql_result($result3,$i3,"description");  
     $amount      = mysql_result($result3,$i3,"credit_rate");  
     $i3++;
     }

   //Asign the receipt No.
   //---------------------
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_rct");  
     $i3++;
     }

   $query3  = "select * FROM appointmentf WHERE adm_no ='$adm_no'" ;
   $result3 = mysql_query($query3) or die(mysql_error());
   $num3    = mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
       {       
       $acc_no    = mysql_result($result3,$i3,"payer");
       $db_account= mysql_result($result3,$i3,"payer");
       $i3++;
     }
   
   //$query9= "INSERT INTO receipts_tmp  VALUES('','$adm_no','$patients_name','','','','','$myDate','')";
   //$result9 =mysql_query($query9);
}

if (isset($_GET['save_cancel'])){

   //Go and save first
   //-------------------
   $date=$_GET['date'];
   $patients_name =$_GET['patient'];
   $adm_no =$_GET['adm_no'];
   $paids   =$_GET['amount'];
   $payer  =$_GET['db_accounts'];
   $payer=$_GET['tr_type'];
   $inv_no =$_GET['inv_no'];
   $status =$_GET['status'];
   $today  =date('y-m-d');
   $ref_no = $inv_no;
   $db_accounts  = $payer;
   $db_accounts2 = $payer;


   $query3 = "select * FROM medicalfile where ref_no ='$inv_no'";
   $result3 = mysql_query($query3) or die(mysql_error());
   $num3    = mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
      $type     = mysql_result($result3,$i3,"type");   
      $i3++;
    }

   //echo $type;

   //Get details of Receipt.
   //----------------------
   $query7= "SELECT * FROM auto_transact_inv WHERE invoice_no ='$inv_no' and selected='Yes' and credit_rate<>0" or die(mysql_error());
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
     $patientsname        = mysql_result($result7,$i7,"gl_account"); 
     $d_note= mysql_result($result7,$i7,"invoice_no"); 
     //$inv_no      = mysql_result($result7,$i7,"id"); 
     $credit_account ='PHARMACY DRUGS';
     //Now go and post entry in the auto-cash file
     //-------------------------------------------
   

     //$credit_account ='PATIENTS CONTROL ACCOUNT';
     $drugs ='Yes';
     $query3 = "select * FROM revenuef";
     $result3 = mysql_query($query3) or die(mysql_error());
     $num3    = mysql_numrows($result3) or die(mysql_error());
     $i3=0;
     while ($i3 < $num3)
     {
      $item_desc     = mysql_result($result3,$i3,"name");   
      if ($item_desc==$narration){
         $gledger_acc     = mysql_result($result3,$i3,"gl_account");   
         $credit_account= mysql_result($result3,$i3,"gl_account");   
         $drugs = 'No';
      }
      $i3++;
    }


 
   //Start updating
   //--------------   
   $debit_account = 'ACCOUNTS RECEIVABLES';

   //Update Balances if not paid in full
   //-----------------------------------
   $topay = 0;
   $tot_amt = $paid;
   $payment ='Payment:: '.$inv_no;
   $balance = $amount - $paid;

   //Now go and update medicalfile
   //-----------------------------   
   $payment = 'Payment:: '.$inv_no;
   if ($type=='Inpatient'){
      $query   = "INSERT INTO htransf VALUES('$adm_no','$patients_name','$date','$inv_no','$narration','DB',
'$paid','DB','$credit_account','IP/OPD','','','','','$qty_s','')";
      $result =mysql_query($query);
   }else{
      $query   = "INSERT INTO htransf VALUES('$adm_no','$patients_name','$date','$inv_no','$narration','DB',
'$paid','DB','$credit_account','IP/OPD','$inv_no','','','','$qty_s','')";
      $result =mysql_query($query);
   }

//Update all finalise invoices file if out-patient
//------------------------------------------------
   if ($type=='Outpatient'){
   $patients_name = $narration.' :-: '.$patients_name;   
   $query5= "INSERT INTO gltransf VALUES('','$date','$credit_account','$inv_no','DB','$patients_name','-$paid','admin','$company_identity')";
   $result5 =mysql_query($query5);

   $query= "INSERT INTO hdnotef VALUES('$adm_no','$patientsname','$date','$ref_no','','$inv_no','$paids','$paids','$payer','','')";
   $result =mysql_query($query);

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

     $credit_balance = $credit_balance -$paid;
     $query2= "UPDATE glaccountsf SET balance ='$credit_balance' WHERE account_name ='$credit_account'";
     $result2 =mysql_query($query2);
    } 
    //Cal-bracket for out-patient invoices
    //------------------------------------
   $i7++;
   }

 if ($type=='Outpatient'){
   //Now go and Debit G/L Accounts file / if out-patient only
   //--------------------------------------------------------
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

   $db_balance = $db_balance +$paids;
   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$debit_account'";
   $result2 =mysql_query($query2);


   //go and update invoices file
   //---------------------------
   $query5= "INSERT INTO dtransf 
   VALUES('$payer','$date','$patientsname','$ref_no','$adm_no','TRF','$paids','$paids','$username')";
   $result5 =mysql_query($query5);

   //Go and update gltransf
   //----------------------
   $patients_name = $narration.' :-: '.$patientsname;
   $query5= "INSERT INTO gltransf 
   VALUES('','$date','$debit_account','$ref_no','TRF','$patients_name','$paids','admin','$company_identity')";
   $result5 =mysql_query($query5);



   $payment ='Payment:: '.$inv_no;

   //go and update invoices file
   //---------------------------
   //Post in Dtransf
   //---------------
   $db_balance = 0;
   $query3 = "select * FROM debtorsfile WHERE account_name ='$payer'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;

   while ($i3 < $num3)
     {
     $db_balance   = mysql_result($result3,$i3,"os_balance");
     $i3++;
     }
   $db_balance = $db_balance +$paids;
   $query2= "UPDATE debtorsfile SET os_balance ='$db_balance' WHERE account_name ='$payer'";
   $result2 =mysql_query($query2);
 }
 //End of updating finalised invoice
 //---------------------------------
 $balance = $amount - $paid;
 $query= "UPDATE appointmentf SET status ='$status' WHERE adm_no ='$adm_no'";
 $result =mysql_query($query);

 $query= "UPDATE medicalfile SET status ='$status' WHERE ref_no ='$inv_no'";
 $result =mysql_query($query);


 //Now go and delete interim invoice entry coz it is finalized
 //-----------------------------------------------------------
 $query3 = "DELETE FROM hdnotef2 WHERE invoice_no= '$inv_no'";
 $result3 =mysql_query($query3) or die(mysql_error());


     //Print the receipt before deleting these stuff
     //---------------------------------------------
?>
   <script type='text/javascript'>
   function printpage()
  {
  window.print()
  }
  </script>

<script type='text/javascript'>
   function bills()
  {
  window.open('http://www.usedcarin...nadminlogin.php' 'FinanceAdminReportsLogin', 'width=545,height=326,resizable=yes,scrollbars=yes,status=yes');
  }
  </script>
 
 
<?php
   //No branch yet ----- $branch     = $_SESSION['branch']; 
 
   $date=$_GET['date'];
   $patients_name =$_GET['patient'];
   $adm_no =$_GET['adm_no'];
   $paid   =$_GET['paid'];
   $date    = $_GET["date"];
 
   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "select * FROM companyfile";
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



   

   //--echo"<font size ='5'>";
   echo"<table width='400' border='0' cellspacing='0' cellpadding='0'>";      
   echo"<tr><td width ='400' align ='center'><h3>PATIENT INVOICE</h4></td><tr>";
   echo"<tr><td align ='center'><h2>$company</h2></td></tr>";
   echo"<tr><td align ='center'>$address1</td></tr>";
   echo"<tr><td align ='center'>$address2</td></tr>";
   echo"<tr><td align ='center'>$address3</td></tr>";
   echo"</table><br>";

   echo"<div><h4>SALES INVOICE. SERVICE NO:<img src='space.jpg' style='width:20px;height:2px;'>$ref_no</h4></div><br>";
 //---------Sawa up to this point------------------
   echo"<div>Payer :<img src='space.jpg' style='width:20px;height:2px;'></b>$patients_name<img src='space.jpg' style='width:20px;height:2px;'>Date:<img src='space.jpg' style='width:5px;height:2px;'>$date</b><br>";
   //echo"<hr>";
  //echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";
echo"------------------------------------------------------------------------<b><br>";
   echo"Description <img src='space.jpg' style='width:100px;height:2px;'>";
   echo"Amount<img src='space.jpg' style='width:45px;height:2px;'>";
   echo"Qty<img src='space.jpg' style='width:30px;height:2px;'>";
   echo"Total<img src='space.jpg' style='width:10px;height:2px;'>";
   echo"</div>";
echo"------------------------------------------------------------------------<br>";

$query= "SELECT * FROM auto_transact_inv WHERE invoice_no ='$ref_no' and selected='Yes' and credit_rate <>0" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<table bgcolor ='black' border ='0' width ='400' width ='100%'>";
//-------Sawa -------------
$SQL = "select * FROM auto_transact_inv WHERE invoice_no ='$ref_no' and selected='Yes' and credit_rate <>0" ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {
         
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"gl_account");   
      $code   = mysql_result($result,$i,"sell_price");   
      $update = mysql_result($result,$i,"date");  
      $contact = 'RCT';
      $qty     = mysql_result($result,$i,"qty");
      $total   = mysql_result($result,$i,"credit_rate");

      $update2 = $code; 
      $tot = $tot +$total;
      $code   = number_format($code);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);

      echo"<tr bgcolor ='white'>";
      echo"<td width ='170' align ='left'>";      
      echo"$desc";
      echo"</td>";     
      echo"<td width ='50' align ='right'>$update2</td>";
      echo"<td width ='50' align ='right'>$qty</td>";
      echo"<td width ='50' align ='right'>$total</td>";
      //echo"<td width ='50' align ='right'></a></td>";
      echo"</font>";
      echo"</tr>";   
      $i++;         
     }

      echo"</table>";
echo"------------------------------------------------------------------------";
 echo"</font>";


//Sawa----------

$topay = $paids-$tot;
//echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";
echo"<table>";
echo"<tr><td width ='320' align ='right'><b>Total:</b></td><td width ='45'></td><td><b>$tot2</b></td></tr>";
echo"<tr><td width ='320' align ='right'><b>Amount Paid:</b></td><td width ='45'></td><td><b>$paids</b></td></tr>";
echo"<tr><td width ='320' align ='right'><b>Change:</b></td><td width ='45'></td><td><b>$topay</b></td></tr>";
echo "</table><br><br></b>";
//echo "For Wama Nursing Home<br>";
echo"<img src='images/image.bmp' style='width:370px;height:70px;'><br>";
echo"Your health is our priority Psalms 107:20 We treat but God Heals.";
//style='width:300px;height:50px;'><br>";
echo"<br>You were served by: ADMIN<br>";
echo"We wish you quick recovery";
echo "<input type=\"button\" value=\"Print\" onclick=\"printpage()\" />";

//Clear what has been paid
//------------------------
$query= "UPDATE auto_transact_inv SET credit_rate ='0' WHERE invoice_no ='$ref_no' and selected='Yes' and credit_rate >0";
$result =mysql_query($query);                                                         


    die();

   //End of saving
   //-------------
   $date = date('y/m/d');
   $client_no=' ';
   $patients_name=' ';
   $gender=' ';
   $age=' ';

   $history ="No medical history for the specified date";


     //echo"Put some details heare 6";


}





?>





<?php




// sql to create table
$sql = "CREATE TABLE receipts_tmp (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
location VARCHAR(30) NOT NULL,
description VARCHAR(100) NOT NULL,
sell_price INT(11),
qty INT(11),
credit_rate INT(11),
gl_account INT(11),
date TIMESTAMP)";



if (isset($_GET['add_next'])){
   $count = $_GET['accounts6']; 
   $query= "CREATE TEMPORARY TABLE receipts_tmp IF NOT EXISTS receipts_tmp (location varchar(100) NOT NULL,
   description varchar(200),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);
   //Initiolize the new entries
   //---------------------------
   $myDate = date('y/m/d');
   $location     = $_SESSION['company'];
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   $total        = $_GET["result_three"];
   //$count        = $num;
   $desc         = substr($description, -10);



   //get price for this item as you save it in temporary file
      

   //$query9= "INSERT INTO receipts_tmp  VALUES('','$location','$description','$amount','$qty','$total','$total','$myDate','')";
   //   $result9 =mysql_query($query9);

   $myDate =date('y-m-d');





}






if (isset($_GET['refresh'])){
   $date = date('y/m/d');
   //echo"Put some details heare 7";

}

if (isset($_GET['delete'])){
   $date = date('y/m/d');
   //End of printing receipt

   //$query3 = "DELETE FROM receipts_tmp WHERE description > ' '";
   //$result3 =mysql_query($query3) or die(mysql_error());
}




//if (isset($_GET['add_next2']))
if (isset($_GET['save_cancel3']))
   {
   $date=$_GET['date'];
   //Get the receipt No.
   
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





   $query = "select * FROM receipts_tmp" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;

   while ($i < $num)
      {
         
      $codes   = mysql_result($result,$i,"location");
  
      $desc    = mysql_result($result,$i,"description");
   
      $rate    = mysql_result($result,$i,"sell_price");
   
      $qty     = mysql_result($result,$i,"qty");
  
      $qty_s   = mysql_result($result,$i,"qty");
  
      $total   = mysql_result($result,$i,"gl_account");
      $item_desc = mysql_result($result,$i,"description");
  


      //Add Qty in file
      $query2 = "select * FROM stockfile WHERE search_name ='$desc' AND location ='$codes'" ;
      $result2 =mysql_query($query2) or die(mysql_error());
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num2 =mysql_numrows($result2) or die(mysql_error());
      $i2 =0;

      while ($i2 < $num2)
         {
         
         $qtys   = mysql_result($result2,$i2,"qty");
         $item_desc = mysql_result($result2,$i2,"description");
  
         $i2++;
 
      }
      $upd_qty = $qtys - $qty;

      $query3= "UPDATE stockfile SET qty ='$upd_qty' WHERE search_name ='$desc' AND location ='$codes'";
      $result3 =mysql_query($query3);


      $query4= "INSERT INTO st_trans VALUES('$codes','$item_desc','Sales','-$qty_s','Stock Sales','$date','ADMIN','$rate','$total','$ref_no','$adm_no','','','','','')";
      $result4 =mysql_query($query4);
      $i++;
 
   }
   $query3 = "DELETE * FROM receipts_tmp WHERE description<>' '" ;
   $result3 =mysql_query($query3) or die(mysql_error());


    //$query= mysql_query('DROP TABLE IF EXISTS phpgrid.sales');
    $query= "DROP TABLE IF EXISTS hmisglob_griddemo.receipts_tmp";
    $result =mysql_query($query);
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
    var no = document.getElementById('no_one').value;   
    var txt = document.getElementById('amount_one').value;
    txt2 = txt * no;
    document.getElementById("result_one").value = txt2;
}
</script>










<body>






<form action ="auto_save_invoice.php" method ="GET">
<?php

//New changes
if (isset($_GET['accounts57'])){ 
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM receipts_tmp WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());
    // echo"Put some details heare 9";

}












//For Next item button
//--------------------
if (isset($_GET['add_next'])){
   $date = date('y/m/d');
}














$company_identity =$_SESSION['company'];
            
 $cdquery="SELECT client_id,patients_name FROM clients";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            


$date = date('y-m-d');

// Accounts6 Not applicabel for now
//echo"</td><td width ='100'><input type='text' id ='amounts' name='amounts' size='10' value ='$price'></td><td width='120'>";
//----------------------------------------------
//echo"</td>";
//echo"<td width='50' align='right'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td>";


?>

<!--input type="text" id="result" size="20">
<input type="text" id="result2" size="20"-->




 <?php
//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
echo"<table>";
echo"<tr><td width ='100'><b>Ref No.</td><td width='50' align='left'><input type='text' id ='inv_no' name='inv_no' size='10' value ='$inv_no' readonly></td></tr>";

echo"<tr><td width ='100'><b>Receipt No.</td><td width='50' align='left'><input type='text' id ='jv_no' name='jv_no' size='10' value ='$ref_no' readonly></td></tr>";

echo"<tr><td width ='100'><b>Date:</td><td width='50' align='left'><input type='text' id ='date' name='date' size='10' value ='$mydate'></td></tr>";
echo"<tr><td width ='100'><b>Payer:</td><td width='50' align='left'><input type='text' id ='tr_type' name='tr_type' size='40' value ='$db_account' readonly></td></tr>";

//Select the trans type if cash,cheque,visa or any other
//------------------------------------------------------



$amounts =$_SESSION['amt_paid'];

echo"<tr><td width ='50'><b>Adm No:</b></td><td width='50' align='left'><input type='text' id ='adm_no' name='adm_no' size='20' value ='$adm_no' readonly></td></tr>";

echo"<tr><td width ='50'><b>Patients Name:</b></td><td width='50' align='left'><input type='text' id ='patient' name='patient' size='20' value ='$patients_name' readonly></td></tr>";

echo"<tr><td width ='50'><b>Narration</b></td><td width='50' align='left'><input type='text' id ='narration' name='narration' size='50' value ='$narration'></td></tr>";

echo"<tr><td width ='50'><b>Amount</b></td><td width='10' align='left'><input type='text' id ='amount' name='amount' size='10' value='$amounts' readonly></td></tr>";

echo"</table>";
//removed from here
//-----------------
//echo"<img src='ico/black.jpg' style='width:100%;height:1px;'>";   

      echo"</table>";
?>

<div class="container">
  <h1>
  <button type="submit" class="btn btn-success" name="save_cancel" id ="save_cancel">Save and Print</button></h1>
</div>
<br>

</form>

</body>
</html>















