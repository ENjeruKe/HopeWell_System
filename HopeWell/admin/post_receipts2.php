<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$date = $_SESSION['sys_date'];
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
  
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>    



<?php
//$username =$_SESSION['username']; 
//$password =$_SESSION['password'];
echo"User: ".$username;
//session_start();
$_SESSION['discount']= $_GET['no_disc'];       
$company_identity = $_SESSION['company'];
//------------------__-----
$codes =$_SESSION['company'];



if (isset($_GET['accounts'])){    
   //$mydate = $_SESSION['sys_date'];
   $adm_no  = $_GET['accounts3'];
   $inv_no  = $_GET['accounts'];
   $amount   = $_GET['accounts4'];
   $payer =  $_SESSION['payer'];
   
}


if (isset($_GET['accounts3z'])){    
   if ($payer==''){
   $sql="SELECT * FROM  auto_transact WHERE invoice_no = '$ref_nos'  and description <>''";
   //and date ='$date'
   }else{
   $sql="SELECT * FROM  auto_transact_inv WHERE invoice_no = '$ref_nos' and description <>''";
   //and date ='$date' 
   }
   $result = mysql_query($sql);
   $found ='No';
   $selected='No';
   $totals = 0;
   while($row = mysql_fetch_array($result)) {
       $price =  $row['credit_rate'];
       $paid =  $row['balance'];
       $line=  $row['id'];
       $qty=  $row['qty'];
       $id = $line.'name';
       $all = $price*$qty;
       $total =  $row['credit_rate'];
       $totals = $totals+$total-$paid;
   }
}








   //New changes
if (isset($_GET['accounts3'])){    
   //$mydate = $_SESSION['sys_date'];
   $adm_no  = $_GET['accounts3'];
   $inv_no  = $_GET['accounts'];
   $amount   = $_GET['accounts4'];
   $payer =  $_SESSION['payer'];
   
   $query3  = "select * FROM appointmentf WHERE adm_no ='$adm_no'" ;
   $result3 = mysql_query($query3) or die(mysql_error());
   $num3    = mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
       {       
       $acc_no    = mysql_result($result3,$i3,"payer");
       $db_account= mysql_result($result3,$i3,"payer");
       $name= mysql_result($result3,$i3,"name");
       $payer =  mysql_result($result3,$i3,"payer");
   
       $i3++;
     }
     
  
   //Get details of Receipt.
   //----------------------
if ($payer==''){
   $query3 = "select * FROM auto_transact WHERE invoice_no='$inv_no'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   $amount2 = 0;
   while ($i3 < $num3)
     {
         
     
     $balance     = mysql_result($result3,$i3,"balance");  
     $mydate      = mysql_result($result3,$i3,"date");  
     $patients_name   = mysql_result($result3,$i3,"gl_account");  
     $narration   = mysql_result($result3,$i3,"description");  
     if ($balance==0){
        $amount      = mysql_result($result3,$i3,"credit_rate");  
        $amount2 = $amount2 +$amount;
     }
     $i3++;
     }
     

 }else{
   $query3 = "select * FROM auto_transact_inv WHERE invoice_no='$inv_no'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   $amount2 = 0;
   while ($i3 < $num3)
     {
     $balance     = mysql_result($result3,$i3,"balance");  
     $mydate      = mysql_result($result3,$i3,"date");  
     $patients_name   = mysql_result($result3,$i3,"gl_account");  
     $narration   = mysql_result($result3,$i3,"description");  
     if ($balance==0){
     $amount      = mysql_result($result3,$i3,"credit_rate");  
     $amount2 = $amount2 +$amount;
     }
     $i3++;
     }
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
       $name= mysql_result($result3,$i3,"name");
       $i3++;
     }
     
     
     
   
   //$query9= "INSERT INTO receipts_tmp  VALUES('','$adm_no','$patients_name','','','','','$myDate','')";
   //$result9 =mysql_query($query9);
}

if (isset($_GET['save_cancel'])){
   //Go and save first
   //-------------------
   $date = $_GET['date'];
   $date7 = $_GET['date'];

   //$_SESSION['sys_date'];
   $patients_name =$_GET['patient'];
   $name =$_GET['patient'];
   $adm_no =$_GET['adm_no'];
   $paids   =$_GET['amount'];
   $jaja   =$_GET['amount'];
   //$payer  =$_GET['db_accounts'];
   $tr_type=$_GET['tr_type'];
   $inv_no =$_GET['inv_no'];
   $ref_nos =$_GET['inv_no'];
   $ref_no =$_GET['inv_no'];
   $jojo = $_GET['inv_no'];
//------------------------------------------------------------------------------

   $cas_aa   =$_GET['amountp'];
   $cas_bb   =$_GET['color'];
   
   $totalamount_pay = $cas_aa + $cas_bb;
   

   $payer =  $_SESSION['payer'];
   $pil   =$_GET['dvPassport'];

   $cash_amount =$_GET['cash_amount'];
   $mpesa_amount =$_GET['mpesa_amount'];
   $mpesa_ref =$_GET['dvPassport'];
   $combined =$cash_amount+$mpesa_amount;
   //if ($tr_type=='Cash / M-pesa'){
   //       if ($paids<>$combined){
    //  echo "<font color ='red'>******Error in Amounts CASH + M-PESA does not Add up to the total Paid*****</font>";
    //   }
    //}
//echo $pil;


 $query3  = "select * FROM appointmentf WHERE adm_no ='$adm_no'" ;
   $result3 = mysql_query($query3) or die(mysql_error());
   $num3    = mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
       {       
       $acc_no    = mysql_result($result3,$i3,"payer");
       $db_account= mysql_result($result3,$i3,"payer");
       $name= mysql_result($result3,$i3,"name");
       $i3++;
     }
   
   if ($tr_type=='INVOICE' and $payer==''){
      echo"<h1>This is a cash paying patient. kindly chenge the payment mode and try again......</h1>";
      die();
   }
   $update_last =$inv_no;

   $status =$_GET['status'];
   //$today = $_SESSION['sys_date'];
   $today = $_GET['date'];
   $paid_s =$_GET['amountp'];
   $total_only  = $_SESSION['total_only'];
   $discount =$_GET['amountd'];

 //$time = date('y-m-d h:i:s a', time());
 $time = date("Y-m-d H:i:s");
 $time = $_SESSION["log_date"];
 $timew = date("H:i:s");





if ($tr_type =='Cash / M-pesa'){

   $query7= "INSERT INTO pay_datacash VALUES('','$location2','Cash / M-pesa','$patients_name','00','Cash Receipts','$date','$username','$cas_aa','$cas_aa','$jojo','0','$adm_no','$pil','$timew')";
   $result7 =mysql_query($query7);

   $query7a= "INSERT INTO pay_datacash VALUES('','$location2','Cash / M-pesa','$patients_name','00','M-PESA','$date','$username','$cas_bb','$cas_bb','$jojo','0','$adm_no','$pil','$timew')";
   $result7a =mysql_query($query7a);

    
}else{

   $query5a= "INSERT INTO pay_datacash VALUES('','$location2','$narration','$patients_name','00','$tr_type','$date','$username','$cas_aa','$cas_aa','$jojo','0','$adm_no','$pil','$timew')";
   $result5a =mysql_query($query5a);

    
}

 //Now go and update admit file
 //----------------------------
 $query5= "INSERT INTO logfile VALUES('$time','$name','$username','Cashier')";
 $result5 =mysql_query($query5);

   $db_accounts  = $payer;
   $db_accounts2 = $payer;
   //Get the receipt No.
   //-------------------   
   $query3 = "select * FROM next_refile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE next_refile SET next_ref ='$ref_no2'";
     $result3 = mysql_query($query3);
   //Get details of Receipt.
   //----------------------
   
      $inv_no =$_GET['inv_no'];
      $ref_nos =$_GET['inv_no'];
      $ref_no =$_GET['inv_no'];

if($total_only=='0'){
  $query5= "INSERT INTO auto_transact VALUES('','','Balance Paid','$paids','1','$paid_s','$patients_name','$date','$adm_no','Yes','$inv_no','0')";
   $result5 =mysql_query($query5);
}


if ($tr_type<>'INVOICE'){
   $query7= "SELECT * FROM auto_transact WHERE invoice_no ='$inv_no' and credit_rate<>0 and balance = 0 and description<>'Deposit Paid'" or die(mysql_error());
   //date ='$today' and 
}else{
   $query7= "SELECT * FROM auto_transact_inv WHERE invoice_no ='$inv_no' and credit_rate<>0 and balance = 0 and description<>'Deposit Paid'" or die(mysql_error());
   //and date ='$today'
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
     $inv_no      = mysql_result($result7,$i7,"id"); 
     $date = mysql_result($result7,$i7,"date"); 
     $credit_account ='PHARMACY DRUGS';
     //Now go and post entry in the auto-cash file
     //-------------------------------------------
     $credit_account ='PHARMACY DRUGS';
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
         $credit_account = mysql_result($result3,$i3,"gl_account");
         $drugs = 'No';
      }
      $i3++;
    }

   //Update the price of this service
   //--------------------------------
   
   $query22= "UPDATE revenuef SET cash_rate ='$price',credit_rate='$price' WHERE name ='$narration'";
   $result22 =mysql_query($query22);

   //Start updating
   //-------------- 
   if ($tr_type=='INVOICE'){
      $debit_account  ='ACCOUNTS RECEIVABLES';
      $payment ='TRF INVOICE :: '.$inv_nos;
   }else{  
      $debit_account  ='CASH COLLECTION A/C';
      $payment ='Payment:: '.$inv_nos;
   }
   //Update Balances if not paid in full
   //-----------------------------------
   $topay = 0;
   $tot_amt = $paid;


   //Update Sales summary file with or without balance
   //-------------------------------------------------
   if ($tr_type=='INVOICE'){
       //Dont post in cash register
   }else{
      if ($tr_type=='CASH/M-PESA RECEIPT'){
          //Now post cash amount
          //--------------------
          $query15= "INSERT INTO receiptf VALUES('','','$narration','$patients_name','$qty_s','Cash Receipts','$date','$username','$cash_amount','$cash_amount','$ref_no','0','$adm_no','$pil','$timew')";
          $result15 =mysql_query($query15);

          //Now post mpesa amount
          //---------------------
          $query15= "INSERT INTO receiptf VALUES('','','$narration','$patients_name','$qty_s','M-PESA','$date','$username','$mpesa_amount','$mpesa_amount','$ref_no','0','$adm_no','$pil','$timew')";
          $result15 =mysql_query($query15);
       }else{
          $query15= "INSERT INTO receiptf VALUES('','','$narration','$patients_name','$qty_s','$tr_type','$date','$username','$paid','$paid','$ref_no','0','$adm_no','$pil','$timew')";
          $result15 =mysql_query($query15);
       }
   }

   //Go and update gltransf
   //----------------------
   $patients_name = $narration.' :-: '.$patients_name;
   $patients_names =$_GET['patient'];
   
   $query5= "INSERT INTO gltransf    VALUES('','$date','$debit_account','$ref_no','RC','$patients_name','$paid','$username','CONTROL')";
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

   $db_balance = $db_balance +$paid;

   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$debit_account'";
   $result2 =mysql_query($query2);

if($total_only=='0'){
   $acc_type ='CONTROL';
}else{
   $acc_type ='INCOME';
}
   //Now go and credit the bank
   //--------------------------
   $query5= "INSERT INTO gltransf VALUES('','$date','$credit_account','$ref_no','RC','$patients_name','-$paid','admin','$acc_type')";
   $result5 =mysql_query($query5);
if ($tr_type<>'INVOICE'){
   $invoice_update ='';
}else{
   $invoice_update =$ref_no;
}
   $payment = 'Payment:: '.$inv_no;
if($total_only<>'0'){
   $query   = "INSERT INTO htransf () VALUES('','$adm_no','$patients_names','$date','$ref_no','$narration','DB',
'$paid','RC','$credit_account','IP/OPD','$invoice_update ','$username','','','$qty_s','')";
   $result =mysql_query($query);
}

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


   $i7++;
   }

   $payment ='Payment:: '.$inv_no;
   $balance   =$jaja - $totalamount_pay - $discount;
   $cashed   =$_GET['amountp'];
   $discount=$_GET['amountd'];

$receipt ='Payment';
if($total_only=='0'){ 
   $receipt ='Balance Paid';
}
  
$pay_date = date('y-m-d');
if ($tr_type=='INVOICE'){
   //Dont put a payment coz it is an invoice
   //Post in hdnotef, dtransf
   $patients_name =$_GET['patient'];
   $query5= "INSERT INTO hdnotef VALUES('$adm_no','$patients_name','$date','$ref_no','','','$paids','$paids','$payer','','$username')";
   $result5 =mysql_query($query5);
   //Now post in dtransf
   $query5= "INSERT INTO dtransf VALUES('$payer','$date','$patients_name','$ref_no','$adm_no','TRF','$paids','$paids','$username')";
   $result5 =mysql_query($query5);
}else{
    
$payment = 'Payment:: '.$inv_no;
   $query   = "INSERT INTO htransf() VALUES('','$adm_no','$patients_names','$date','$ref_no','$receipt','RC','-$totalamount_pay','RC','$credit_account','','','$username','','','$qty_s','')";
   $result =mysql_query($query);

if($discount<>'0'){
   $query   = "INSERT INTO htransf () VALUES('','$adm_no','$patients_names','$date','$ref_no','Discount Given','CR',
'-$discount','CR','Z-Discount','IP/OPD','$invoice_update ','$username','','','1','')";
   $result =mysql_query($query);
   //-------------------------------------------
   //Post a discount in receiptf
   //---------------------------
   $query5= "INSERT INTO receiptf VALUES('',$username','Discount given','$patients_names','1','$patients_name','$date','$tr_type','-$discount','-$discount','$ref_no','0','$adm_no','',)";
   $result5 =mysql_query($query5);
   
   
   //Update General Ledger Account
   //-----------------------------
   $query5= "INSERT INTO gltransf    VALUES('','$date','$debit_account','$ref_no','RC','$patients_name','-$discount','admin','CONTROL')";
   $result5 =mysql_query($query5);

   //Now go and Debit G/L Accounts file
   //-----------------------------------
   //Post Credit first
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

   $db_balance = $db_balance -$discount;
   

   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$debit_account'";
   $result2 =mysql_query($query2);

   //Now Post Debit first
   //--------------------
   $cr_account ='DISCOUNT GIVEN';
   //Update General Ledger Account
   //-----------------------------
   $query5= "INSERT INTO gltransf    VALUES('','$date','$cr_account','$ref_no','RC','$patients_name','$discount','admin','CONTROL')";
   $result5 =mysql_query($query5);

   //Now go and Debit G/L Accounts file
   //-----------------------------------
   //Post Credit first
   //----------------
   $db_balance = 0;
   $query3 = "select * FROM glaccountsf WHERE account_name ='$cr_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $db_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

   $db_balance = $db_balance +$discount;

   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$cr_account'";
   $result2 =mysql_query($query2);
}




   $query= "UPDATE appointmentf SET status ='$status',image_id='$balance' WHERE adm_no ='$adm_no'";
   $result =mysql_query($query);

   //if ($balance >0){
   $patients_name =$_GET['patient'];
   $query5= "INSERT INTO balancesf VALUES('','$codes','$narration','$patients_name','','$tr_type','$time','$username','$paids','$totalamount_pay','$ref_no','$balance','$adm_no')";
   $result5 =mysql_query($query5);
   //}

}
   $query= "UPDATE medicalfile SET status ='$status',qty ='$paids',line_no='$ref_no' WHERE adm_no ='$adm_no' and date ='$date7'";
   $result =mysql_query($query);

   //Now go and update balances file
   //-------------------------------


//Reduce stocks if any
//--------------------

if ($tr_type<>'INVOICE'){
      $iss_type ='CASH';
      $query = "select * FROM auto_transact where invoice_no = '$update_last' and sell_price<>0";
      //and location ='DRUGS'";
   }else{
      $iss_type ='ISP';
      $query = "select * FROM auto_transact_inv where invoice_no = '$update_last' and sell_price<>0";
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
       //if ($location =='DRUGS'){       
    if ($location =='DRUGS'){       
           $final_loc ='PHARMACY';
       }
       if ($location =='SURG'){       
           $final_loc ='MAIN STORE';
       }
    if ($location =='DRUGS' OR $location =='SURG'){         
         $price   = mysql_result($result,$i,"sell_price");
         $item    = mysql_result($result,$i,"description");
         $inv_ref = mysql_result($result,$i,"invoice_no");
         $qty     = mysql_result($result,$i,"qty");
         $med_cost = mysql_result($result,$i,"credit_rate");
         //$query2 = "select * FROM stockfile where description ='$item'" ;
         $query2 = "select * FROM stockfile where location ='$final_loc' and description ='$item'" ;
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
            //$query7= "UPDATE stockfile SET qty='$bal_level',sell_price ='$price' WHERE description ='$item'";
            $query7= "UPDATE stockfile SET qty='$bal_level' WHERE location ='$final_loc' and description ='$item'";
            $result7 =mysql_query($query7);
$query4= "INSERT INTO st_trans VALUES('','$final_loc','$item','$patients_names','-$qty','$iss_type','$date','$username','$price','$med_cost','$ref_nos','$adm_no','','','','','')";
      $result4 =mysql_query($query4);

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

}

      $i++;
   }
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
if ($tr_type=='INVOICE'){
 

      $ref_no = $ref_no;

   //$date = date('d-m-y');
   $date = $_SESSION["log_date"];
   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
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
      $address4    = mysql_result($result,$i,"address4");   
   }
   //echo"<font size ='2'>";

?>



    

</head>
<body> 
<!--background="images/background.jpg"-->


<?php
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 $go_on ='Yes';
$finalise='No';

if ($finalise=='No' OR $finalise=='Yes'){
   $finalise_date =$_GET['date'];

   //Checking if Invoice Exist
   $todays =date('y-m-d');
   //$query= "UPDATE companyfile SET today ='$finalise_date'"; 
   //$result =mysql_query($query);

   //echo $_SESSION['patient'];
   $mm =$_SESSION['patient'];
 
   $query= "SELECT * FROM htransf WHERE invoice_no ='$ref_no' and others2 = ''" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;


   $SQL= "SELECT * FROM htransf WHERE invoice_no ='$ref_no' and others2 =''" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $ok ='No';   
   while ($row=mysql_fetch_array($hasil)) 
   {  
      $patient     = mysql_result($result,$i,"patients_name");  
      if ($_SESSION['patient']==$patient){
         $patients      = mysql_result($result,$i,"patients_name");         
         $codes   = "";  
         $desc        = mysql_result($result,$i,"patients_name");  
         $pay_company = mysql_result($result,$i,"company");  
         $adm_no      = mysql_result($result,$i,"adm_no");  
         $reg_no      = mysql_result($result,$i,"adm_no");  
         $ok = 'Yes';          
      }
     $i++;      
   }




   $today = date('y/m/d');
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
     $address4    = mysql_result($result,$i,"address4");   
     $dis_dates    = mysql_result($result,$i,"today");   
     $next_invoice = mysql_result($result,$i,"next_invoice");
     }

   $query= "SELECT * FROM hdnotef where invoice_no ='$ref_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   echo"<table class='altrowstable' id='alternatecolor'>";
   $SQL= "SELECT * FROM hdnotef where invoice_no ='$ref_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
     {         
     $adm_no      = mysql_result($result,$i,"adm_no");  
     $patients_name    = mysql_result($result,$i,"patients_name");   
     $invs_date    = mysql_result($result,$i,"date");   
     $pay_accounts= mysql_result($result,$i,"pay_account");  
     $finalise_date = mysql_result($result,$i,"date");
     $adm_date2    = mysql_result($result,$i,"adm_date");   
     $dis_date2    = mysql_result($result,$i,"disch_date");   
     $nhif_no = mysql_result($result,$i,"branch");   
     $i++;
     }


   $query= "SELECT * FROM appointmentf where adm_no = '$adm_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;

   $SQL= "SELECT * FROM appointmentf where adm_no = '$adm_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
     {         
     $adm_no      = mysql_result($result,$i,"adm_no");  
     $patients_name    = mysql_result($result,$i,"name");   
     $adm_date    = mysql_result($result,$i,"adm_date");   
     $adms_date    = mysql_result($result,$i,"adm_date");   
     $bed_no    = mysql_result($result,$i,"bed_no");        
     $disch_date= mysql_result($result,$i,"dis_date");   
     $pay_account= mysql_result($result,$i,"payer"); 
     $companys= mysql_result($result,$i,"payer");
     $inv_adm_date = mysql_result($result,$i,"adm_date");   
     $inv_dis_date = mysql_result($result,$i,"dis_date");   
     $bed_rate = 0;
     $less_days = 0;
     }
     
     if ($finalise=='Yes'){

        if ($pay_account==''){
            echo"<br><br><br><br><br><br><table width ='800' border='0' border color ='black'><td width ='700'>   
            <h4>Kindly change the paying Account and try again.....</h4></td><td><input type='submit' 
         name='print23'  class='button' value='Refresh'></td></table>";
         //echo"</FORM><table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' 
         //height='100' width='130'></td></table>";
         die();
     }
    }

     $adm_date = strtotime($adm_date);
     $disch_date= strtotime($disch_date);
     $dis_dates= strtotime($dis_dates);
     
//echo $adm_date;
//echo $dis_dates;
$mm= $dis_dates - $adm_date;
//echo $mm;

$days = ($mm/86400);

//echo 'Inv1'.$ref_no;
//echo 'INV2'.$ref_nos;

//Close file for auto_transact now
//--------------------------------




$found ='No';   
//Check if posted then clear
//--------------------------
$query2= "select * from receiptf WHERE ref_no ='$inv_nos'";
$result2 =mysql_query($query2);
while($row = mysql_fetch_array($result2)){
	    $found = 'Yes';
}
if ($found=='Yes'){
   $query7  = "UPDATE auto_transact SET balance=auto_transact.credit_rate  WHERE invoice_no ='$inv_nos' and credit_rate<> 0";
   $result7 =mysql_query($query7);
}




//Clear what has been paid
   //------------------------
   if ($tr_type<>'INVOICE'){
      $query3  = "UPDATE auto_transact SET balance=auto_transact.credit_rate  WHERE invoice_no ='$inv_nos' and credit_rate<> 0 ";
   }else{
      $query3  = "UPDATE  auto_transact_inv SET balance=auto_transact_inv.credit_rate  WHERE invoice_no ='$inv_nos' and credit_rate<> 0";
   }
   $result3 =mysql_query($query3);
//---------------------------------

   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
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
      $address4    = mysql_result($result,$i,"address4");   

   }
   //echo"<font size ='2'>";
     
   echo"<table width ='100%'><td align ='center'><img src='images/heading.jpg' alt='statement' 
      height='200' width='800'></td></table><br><br>";
      
      
      echo"<h2><u>FINAL INVOICE</u></h2><br>";
      
echo "<hr>";


      $mydate = date('d-m-y');
      $inv_no =$ref_no;
      echo"<font size ='2'>";
      echo"<table width ='900'>"; 
      //if ($finalise=='Yes'){     
        echo"<tr><td align ='left' width ='350'><b><u>PATIENTS NAME</u></b></td><td width ='400' align ='right'><b>Invoice No:</b></td><td align 
      ='right'>";
         echo $ref_no;
      echo"</td></tr>";
      echo"<tr><td align ='left' width ='350'>$patients_name</td><td width ='400' align ='right'><b>Invoice Date:</b></td><td align ='right'>$mydate</td>  
      </tr>";
      echo"<tr><td align ='left' width ='350'></td><td width ='400' align ='right'><b>File No:</b></td><td align ='right'>$adm_no   
      </td></tr>";
$sDate = date("d-m-y",$adm_date);
$dDate = date("d-m-y",$disch_date);
      echo"<tr><td align ='left' width ='350'><b>Paying A/c</b><br>$companys</td><td width ='350' align ='left'></td>";
      if ($inv_dis_date=='0000-00-00 00:00:00'){
          //
      }else{
      echo"<td width ='400' align ='right'><b>Admited Date:</b></td><td align ='right'>$sDate</td></tr>";
      }
      if ($inv_dis_date=='0000-00-00 00:00:00'){
          //
      }else{
      echo"<tr><td width ='400' align ='right'><b>Discharge Date:</b></td><td align ='right'>";
          echo $mydis_date;
      }

      echo"</table>";
      $to ='  To  ';
      echo"<hr>";


echo"<div><b>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:170px;height:2px;'>";
echo"Ref No.<img src='space.jpg' style='width:120px;height:2px;'>";
echo"Qty<img src='space.jpg' style='width:54px;height:2px;'>";
echo"<img src='space.jpg' style='width:10px;height:2px;'>";
echo"Amount<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Total<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:1px;height:2px;'>";
echo"</b></div>";
echo"<hr>";

   $item_search ='';

   //use the revenue file to group items   
   //-------------------------------------

   //Search this item in htransf
   //---------------------------
      $today = date('y/m/d');
      $query= "SELECT * FROM htransf WHERE invoice_no ='$ref_no' and others2='' ORDER BY date" or 
      die(mysql_error());
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $tot =0;
      $i = 0;
      $SQL = "SELECT * FROM htransf WHERE invoice_no ='$ref_no' and others2 ='' ORDER BY date"  or die(mysql_error());

      $hasil=mysql_query($SQL, $connect);
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $desc2 =' ';
      $print='yes';
      //$rates = 0;
      $count = 0;
      $group_t = 0;
      $group_all  = 0;
      while ($row=mysql_fetch_array($hasil)) 
         { 
         $item_search  = mysql_result($result,$i,"trans2");         
         $trans_type  = mysql_result($result,$i,"trans_type");         
         $type  = mysql_result($result,$i,"type");         
         //if item found
         //-------------
         //if ($item==$item_search and 
         if ($type<>'RC'){
            //if (trans_type=='Yes'){
            $patient      = mysql_result($result,$i,"patients_name");         
            $codes   = "";  
            $desc        = mysql_result($result,$i,"patients_name");  
            $group       = mysql_result($result,$i,"trans_type");         
            $rate        = mysql_result($result,$i,"amount");   
            //$group_t     = mysql_result($result,$i,"amount");   
            $code        = mysql_result($result,$i,"invoice_no");   
            $update      = mysql_result($result,$i,"service");  
            $contact     = mysql_result($result,$i,"date"); 
            $amount      = mysql_result($result,$i,"amount");    
            $drug_rate        = mysql_result($result,$i,"amount");   
            $type        = '';
            //mysql_result($result,$i,"type");  
            $pay_company = mysql_result($result,$i,"company");  
            $adm_no      = mysql_result($result,$i,"adm_no");  
            $reg_no      = mysql_result($result,$i,"adm_no");  
            $qty         = mysql_result($result,$i,"qty");  
            $item_search2  = mysql_result($result,$i,"trans2");         
            $street  = " ";  
            $pay_mode= " ";  
            if ($qty=='0'){
               $qty = 1;
            }
            //$codes2 = $rate; 
            $codes2 = $rate;
            $rate   = $rate;
            $rate3  = $codes2/$qty;
            $amount = $amount; 
            $update2 = $codes2; 
            $tot = $tot +$update2;
            $update2 = number_format($update2);
            $rate = number_format($rate);
            $group_t       = $group_t + $amount;
            //$group_all     = $group_all + $amount;

            $desc2  = $desc;
            $rates  = $rates + $amount;
            $rates2 = $rates;
            $rates3 = number_format($rates2);        
            echo"<table class='altrowstable' id='alternatecolor'>";
            echo"<tr bgcolor ='white'>";
            echo"<td width ='100' align ='left'>";      
            echo"$contact";
            echo"</td>";
            echo"<td width ='300' align ='left'>";      
            echo"$update";
            echo"</td>";
            echo"<td width ='150' align ='left'>";      
            //if ($item_search2=='PHARMACY DRUGS'){
            //   echo $drug_rate."x"."$qty";
            //}else{
               echo"$code";
            //}
            echo"</td>";
            echo"<td width ='50' align ='left'>";      
            echo"$qty";
            echo"</td>";
            echo"<td width ='55' align ='right'>";      
            //if ($rate >0){
               echo"$rate3";
            //}
            //echo"$qty";
            echo"</td>";
            echo"<td width ='45' align ='right'>";      
            //if ($rate >0){
            //   echo"$rate";
            //}
            echo"</td>";
            echo"<td width ='50' align ='right'>";
            //if ($rate <0){
               echo"$rate";
            //}
            echo"</td>";
            echo"<td width ='100' align ='right'>$rates3</td>";
            echo"</tr>";
            $desc2 = $desc;         

           echo"</table>";
           //return here
           $group2= $group;
           $count++;
     //}
    }


         $i++;      
      }
      // Display the sub-total
      //----------------------


//Now go and put bed Charge
//--------------------------

//Convert them to timestamps.
$dis_date = date('y-m-d');


//$amount = $bed_rate*$days;
$mytot = $rates2;

$rates2 = $rates2;

$rate3s = number_format($mytot);
$amounts = number_format($amount);




      if ($finalise=='No'){ 
         //Viewing interim 
         $query= "SELECT * FROM htransf WHERE invoice_no ='$ref_no' and others2 ='' ORDER BY date";
         $result =mysql_query($query) or die(mysql_error());
         $num =mysql_numrows($result) or die(mysql_error());
         $tot =0;
         $i = 0;
         $SQL = "SELECT * FROM htransf WHERE invoice_no ='$ref_no' and others2 ='' ORDER BY date";
         $hasil=mysql_query($SQL, $connect);
         $id = 0;
         $nRecord = 1;
         $No = $nRecord;
         $desc2 =' ';
         $print='yes';
         //$rates = 0;
         $count = 0;
         $group_t = 0;
         $total_rc  = 0;
         while ($row=mysql_fetch_array($hasil)) 
            { 
            $type     = mysql_result($result,$i,"type");     
            if ($type =='RC'){
               $patient     = mysql_result($result,$i,"patients_name");         
               $codes   = "";  
               $desc        = mysql_result($result,$i,"patients_name");  
               $group       = mysql_result($result,$i,"trans_type");         
               $rate        = mysql_result($result,$i,"amount");   
               $see_rate        = mysql_result($result,$i,"amount");   
               $code        = mysql_result($result,$i,"doc_no");   
               $update      = mysql_result($result,$i,"service");  
               $contact     = mysql_result($result,$i,"date"); 
               $amount      = mysql_result($result,$i,"amount");    
               $type        = mysql_result($result,$i,"type");  
               $pay_company = mysql_result($result,$i,"company");  
               $adm_no      = mysql_result($result,$i,"adm_no");  
               $reg_no      = mysql_result($result,$i,"adm_no");  
               $qty         = mysql_result($result,$i,"qty");  
               $street  = " ";  
               $pay_mode= " ";  
               $codes2 = $rate; 
               $update2 = $codes2; 
               $tot = $tot +$update2;
               $total_rc = $total_rc + $amount;
               $update2 = number_format($update2);
               $rate = number_format($rate);
               $group_t       = $group_t + $amount;
               $desc2  = $desc;
               //$rates  = $rates + $amount;
               $rates  = $rate3s + $amount;
               $rates2 = $rates;
               $mytot  = $mytot+$see_rate;
               $rates3 = number_format($rates2);        
               $rates3a = number_format($mytot);        
               echo"<table class='altrowstable' id='alternatecolor'>";
               echo"<tr bgcolor ='white'>";
               echo"<td width ='100' align ='left'>";      
               echo"$contact";
               echo"</td>";
               echo"<td width ='300' align ='left'>";      
               echo"$update";
               echo"</td>";
               echo"<td width ='150' align ='left'>";      
               echo"$code";
               echo"</td>";
               echo"<td width ='50' align ='left'>";      
               echo"$type";
               echo"</td>";
               echo"<td width ='50' align ='right'>";      
               echo"";
               echo"</td>";
               echo"<td width ='50' align ='right'>";      
               //echo"$qty";
               echo"</td>";
               echo"<td width ='50' align ='right'>$rate</td>";
               echo"<td width ='100' align ='right'>$rates3a</td>";
               echo"</tr>";
            }
            $i++;
         }

      }else{
      //echo'Get the final Invoice copy from Re-print........';
      }
      $total_rc = number_format($total_rc);
      if ($total_rc <> 0){

         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         echo"<table border ='0'><td width ='800' align='right'><b>SUB-TOTAL</b></td><td width ='75' align ='right'><b>$total_rc</td></table>";
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";

         $group_t =0;
      }

     //End of no-chargables
     //-------------------- 

      $tot = number_format($tot);
 
      $rates3 = number_format($mytot);
      //$rates3 = $mytot;
      echo'<br><br><br>';
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         echo"<table border ='0'><td width ='800' align='right'><b>INVOICE TOTAL DUE</b></td><td width ='75' align ='right'><b>$rates3</td></table>";
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
echo"<br><br>";
      //Now go and get non-chargables
      //-----------------------------
//$query = "SELECT service, COUNT(qty) FROM htransf WHERE invoice_no =' ' AND patients_name ='$patient1' and trans_type<>'Yes' GROUP BY service"; 	 
//$result = mysql_query($query) or die(mysql_error());

//------------------------------
//Now update invoices file
//------------------------
$inv_amt_tot =$mytot;
echo'<br><br><br><br><br><br><br><br><br><br><br><br>';
echo'Patients Name ___________________________________________________Signature_________________________________________Date________/______/________';


$query2= "UPDATE htransf SET others2 ='Printed' WHERE doc_no ='$ref_no'";
   $result2 =mysql_query($query2);

die();

}







// Print out result
echo"<table><tr>";
while($row = mysql_fetch_array($result)){
	echo "<tr><td width ='300'>";
        echo $row['service'];
        echo"</td><td width = '10'>";
        echo $row['COUNT(qty)'];
        echo"</td></tr>";
}
echo"</table>";








//}







//End of =='INVOICE'
}
//else{








//echo $tr_type;
//New receipt format
//------------------

if ($tr_type<>'INVOICE'){



      $ref_no = $ref_no;

   //$date = date('d-m-y');
   $date = $_SESSION["log_date"];
   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
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
      $address4    = mysql_result($result,$i,"address4");   
   }
   //echo"<font size ='2'>";



 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 $go_on ='Yes';
$finalise='No';


if ($finalise=='No' OR $finalise=='Yes'){
   $finalise_date =$_GET['date'];

   //Checking if Invoice Exist
   $todays =date('y-m-d');
   //$query= "UPDATE companyfile SET today ='$finalise_date'"; 
   //$result =mysql_query($query);

   //echo $_SESSION['patient'];
   $mm =$_SESSION['patient'];
 
   $query= "SELECT * FROM receiptf WHERE ref_no ='$ref_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;


   $SQL= "SELECT * FROM receiptf WHERE ref_no ='$ref_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $ok ='No';   
   while ($row=mysql_fetch_array($hasil)) 
   {  
      $patient     = mysql_result($result,$i,"type");  
      if ($_SESSION['patient']==$patient){
         $patients      = mysql_result($result,$i,"type");         
         $codes   = "";  
         $desc        = mysql_result($result,$i,"type");  
         $pay_company = mysql_result($result,$i,"type");  
         $adm_no      = mysql_result($result,$i,"adm_no");  
         $reg_no      = mysql_result($result,$i,"adm_no");  
         $ok = 'Yes';          
      }
     $i++;      
   }




   $today = date('y/m/d');
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
     $address4    = mysql_result($result,$i,"address4");   
     $dis_dates    = mysql_result($result,$i,"today");   
     $next_invoice = mysql_result($result,$i,"next_invoice");
     }

   $query= "SELECT * FROM htransf where doc_no ='$ref_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   echo"<table class='altrowstable' id='alternatecolor'>";
   $SQL= "SELECT * FROM htransf where doc_no ='$ref_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
     {         
     $adm_no      = mysql_result($result,$i,"adm_no");  
     $patients_name    = mysql_result($result,$i,"type");   
     $invs_date    = mysql_result($result,$i,"date");   
     $pay_accounts= mysql_result($result,$i,"type");  
     $finalise_date = mysql_result($result,$i,"date");
     $adm_date2    = mysql_result($result,$i,"date");   
     $dis_date2    = mysql_result($result,$i,"date");   
     $nhif_no = '';   
     $i++;
     }


   $query= "SELECT * FROM appointmentf where adm_no = '$adm_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;

   $SQL= "SELECT * FROM appointmentf where adm_no = '$adm_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
     {         
     $adm_no      = mysql_result($result,$i,"adm_no");  
     $patients_name    = mysql_result($result,$i,"name");   
     $adm_date    = mysql_result($result,$i,"adm_date");   
     $adms_date    = mysql_result($result,$i,"adm_date");   
     $bed_no    = mysql_result($result,$i,"bed_no");        
     $disch_date= mysql_result($result,$i,"dis_date");   
     $pay_account= mysql_result($result,$i,"payer");   
     $inv_adm_date = mysql_result($result,$i,"adm_date");   
     $inv_dis_date = mysql_result($result,$i,"dis_date");   
     $bed_rate = 0;
     $less_days = 0;
     }
     
     if ($finalise=='Yes'){

        if ($pay_account==''){
            echo"<br><br><br><br><br><br><table width ='800' border='0' border color ='black'><td width ='700'>   
            <h4>Kindly change the paying Account and try again.....</h4></td><td><input type='submit' 
         name='print23'  class='button' value='Refresh'></td></table>";
         //echo"</FORM><table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' 
         //height='100' width='130'></td></table>";
         die();
     }
    }

     $adm_date = strtotime($adm_date);
     $disch_date= strtotime($disch_date);
     $dis_dates= strtotime($dis_dates);
     
//echo $adm_date;
//echo $dis_dates;
$mm= $dis_dates - $adm_date;
//echo $mm;

//echo 'Inv1'.$inv_no;
//echo 'Inv2'.$inv_nos;


$found ='No';   
//Check if posted then clear
//--------------------------
$query2= "select * from receiptf WHERE ref_no ='$inv_nos'";
$result2 =mysql_query($query2);
while($row = mysql_fetch_array($result2)){
	    $found = 'Yes';
}
if ($found=='Yes'){
   $query7  = "UPDATE auto_transact SET balance=auto_transact.credit_rate  WHERE invoice_no ='$inv_nos' and credit_rate<> 0";
   $result7 =mysql_query($query7);
}



//Close file for auto_transact now
//--------------------------------
//Clear what has been paid
   //------------------------
   if ($tr_type<>'INVOICE'){
      $query3  = "UPDATE auto_transact SET balance=auto_transact.credit_rate  WHERE invoice_no ='$inv_nos' and credit_rate<> 0";
   }else{
      $query3  = "UPDATE  auto_transact_inv SET balance=auto_transact_inv.credit_rate  WHERE invoice_no ='$inv_nos' and credit_rate<> 0";
   }
   $result3 =mysql_query($query3);
//---------------------------------



$days = ($mm/86400);

   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
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
      $address4    = mysql_result($result,$i,"address4");   

   }
   //echo"<font size ='2'>";
     
     
     
     
     
     
     
     
     
     
     
     
   echo"<table width ='100%'><td align ='center'><img src='images/heading.jpg' alt='statement' 
      height='200' width='800'></td></table><br><br>";
      
      echo"<h2><u>CASH RECEIPT</u></h2><br>";
      
      echo "<hr>";
      $mydate = date('d-m-y');
      $inv_no =$ref_no;
      echo"<font size ='2'>";
      echo"<table width ='900'>"; 
      //if ($finalise=='Yes'){     
         echo"<tr><td align ='left' width ='350'><b><u>PATIENTS NAME</u></b></td><td width ='400' align ='right'><b>Receipt No:</b></td><td align 
      ='right'>";
      if ($finalise=='Yes'){
         echo $inv_no;
      }else{
         echo $inv_no;
      }
      echo"</td></tr>";
      echo"<tr><td align ='left' width ='350'>$patients_name</td><td width ='400' align ='right'><b>Receipt Date:</b></td><td align ='right'>$finalise_date</td>  
      </tr>";
      echo"<tr><td align ='left' width ='350'></td><td width ='400' align ='right'><b>File No:</b></td><td align ='right'>$adm_no   
      </td></tr>";
$sDate = date("d-m-y",$adm_date);
$dDate = date("d-m-y",$disch_date);

      echo"<tr><td align ='left' width ='350'></td><td width ='400' align ='right'></td><td align ='right'></td></tr>";
      echo"<tr><td width ='350' align ='left'></td><td width ='400' align ='right'></td><td align ='right'>";
      echo"</b></td></tr>";

echo"<tr><td align ='left' width ='350'></td><td width ='400' align ='right'><b></b></td><td align ='right'></td></tr>";

      echo"</table>";
      $to ='  To  ';
      echo"<hr>";


echo"<div><b>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:170px;height:2px;'>";
echo"Ref No.<img src='space.jpg' style='width:120px;height:2px;'>";
echo"Qty<img src='space.jpg' style='width:54px;height:2px;'>";
echo"<img src='space.jpg' style='width:10px;height:2px;'>";
echo"Amount<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Total<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:1px;height:2px;'>";
echo"</b></div>";
echo"<hr>";

   $item_search ='';

   //use the revenue file to group items   
   //-------------------------------------

   //Search this item in htransf
   //---------------------------
      $today = date('y/m/d');
      $query= "SELECT * FROM htransf WHERE doc_no ='$ref_no' and others2 ='' ORDER BY date" or 
      die(mysql_error());
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $tot =0;
      $i = 0;
      $SQL = "SELECT * FROM htransf WHERE doc_no ='$ref_no' and others2 ='' ORDER BY date"  or die(mysql_error());

      $hasil=mysql_query($SQL, $connect);
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $desc2 =' ';
      $print='yes';
      //$rates = 0;
      $count = 0;
      $group_t = 0;
      $group_all  = 0;
      while ($row=mysql_fetch_array($hasil)) 
         { 
         $item_search  = mysql_result($result,$i,"trans2");         
         $trans_type  = mysql_result($result,$i,"trans_type");         
         $type  = mysql_result($result,$i,"type");         
         //if item found
         //-------------
         //if ($item==$item_search and 
         if ($type<>'RC'){
            //if (trans_type=='Yes'){
            $patient      = mysql_result($result,$i,"patients_name");         
            $codes   = "";  
            $desc        = mysql_result($result,$i,"patients_name");  
            $group       = mysql_result($result,$i,"trans_type");         
            $rate        = mysql_result($result,$i,"amount");   
            //$group_t     = mysql_result($result,$i,"amount");   
            $code        = mysql_result($result,$i,"invoice_no");   
            $update      = mysql_result($result,$i,"service");  
            $contact     = mysql_result($result,$i,"date"); 
            $amount      = mysql_result($result,$i,"amount");    
            $drug_rate        = mysql_result($result,$i,"amount");   
            $type        = '';
            //mysql_result($result,$i,"type");  
            $pay_company = mysql_result($result,$i,"company");  
            $adm_no      = mysql_result($result,$i,"adm_no");  
            $reg_no      = mysql_result($result,$i,"adm_no");  
            $qty         = mysql_result($result,$i,"qty");  
            $item_search2  = mysql_result($result,$i,"trans2");         
            $street  = " ";  
            $pay_mode= " ";  
            if ($qty=='0'){
               $qty = 1;
            }
            //$codes2 = $rate; 
            $codes2 = $rate;
            $rate   = $rate;
            $rate3  = $codes2/$qty;
            $amount = $amount; 
            $update2 = $codes2; 
            $tot = $tot +$update2;
            $update2 = number_format($update2);
            $rate = number_format($rate);
            $group_t       = $group_t + $amount;
            //$group_all     = $group_all + $amount;

            $desc2  = $desc;
            $rates  = $rates + $amount;
            $rates2 = $rates;
            $rates3 = number_format($rates2);        
            echo"<table class='altrowstable' id='alternatecolor'>";
            echo"<tr bgcolor ='white'>";
            echo"<td width ='100' align ='left'>";      
            echo"$contact";
            echo"</td>";
            echo"<td width ='300' align ='left'>";      
            echo"$update";
            echo"</td>";
            echo"<td width ='150' align ='left'>";      
            //if ($item_search2=='PHARMACY DRUGS'){
            //   echo $drug_rate."x"."$qty";
            //}else{
               echo"$code";
            //}
            echo"</td>";
            echo"<td width ='50' align ='left'>";      
            echo"$qty";
            echo"</td>";
            echo"<td width ='55' align ='right'>";      
            //if ($rate >0){
               echo"$rate3";
            //}
            //echo"$qty";
            echo"</td>";
            echo"<td width ='45' align ='right'>";      
            //if ($rate >0){
            //   echo"$rate";
            //}
            echo"</td>";
            echo"<td width ='50' align ='right'>";
            //if ($rate <0){
               echo"$rate";
            //}
            echo"</td>";
            echo"<td width ='100' align ='right'>$rates3</td>";
            echo"</tr>";
            $desc2 = $desc;         

           echo"</table>";
           //return here
           $group2= $group;
           $count++;
     //}
    }


         $i++;      
      }
      // Display the sub-total
      //----------------------


//Now go and put bed Charge
//--------------------------

//Convert them to timestamps.
$dis_date = date('y-m-d');


//$amount = $bed_rate*$days;
$mytot = $rates2;

$rates2 = $rates2;

$rate3s = number_format($mytot);
$amounts = number_format($amount);




      if ($finalise=='No'){ 
         //Viewing interim 
         $query= "SELECT * FROM htransf WHERE doc_no ='$ref_no' and others2 ='' ORDER BY date";
         $result =mysql_query($query) or die(mysql_error());
         $num =mysql_numrows($result) or die(mysql_error());
         $tot =0;
         $i = 0;
         $SQL = "SELECT * FROM htransf WHERE doc_no ='$ref_no' and others2 ='' ORDER BY date";
         $hasil=mysql_query($SQL, $connect);
         $id = 0;
         $nRecord = 1;
         $No = $nRecord;
         $desc2 =' ';
         $print='yes';
         //$rates = 0;
         $count = 0;
         $group_t = 0;
         $total_rc  = 0;
         while ($row=mysql_fetch_array($hasil)) 
            { 
            $type     = mysql_result($result,$i,"type");     
            if ($type =='RC'){
               $patient     = mysql_result($result,$i,"patients_name");         
               $codes   = "";  
               $desc        = mysql_result($result,$i,"patients_name");  
               $group       = mysql_result($result,$i,"trans_type");         
               $rate        = mysql_result($result,$i,"amount");   
               $see_rate        = mysql_result($result,$i,"amount");   
               $code        = mysql_result($result,$i,"doc_no");   
               $update      = mysql_result($result,$i,"service");  
               $contact     = mysql_result($result,$i,"date"); 
               $amount      = mysql_result($result,$i,"amount");    
               $type        = mysql_result($result,$i,"type");  
               $pay_company = mysql_result($result,$i,"company");  
               $adm_no      = mysql_result($result,$i,"adm_no");  
               $reg_no      = mysql_result($result,$i,"adm_no");  
               $qty         = mysql_result($result,$i,"qty");  
               $street  = " ";  
               $pay_mode= " ";  
               $codes2 = $rate; 
               $update2 = $codes2; 
               $tot = $tot +$update2;
               $total_rc = $total_rc + $amount;
               $update2 = number_format($update2);
               $rate = number_format($rate);
               $group_t       = $group_t + $amount;
               $desc2  = $desc;
               //$rates  = $rates + $amount;
               $rates  = $rate3s + $amount;
               $rates2 = $rates;
               $mytot  = $mytot+$see_rate;
               $rates3 = number_format($rates2);        
               $rates3a = number_format($mytot);        
               echo"<table class='altrowstable' id='alternatecolor'>";
               echo"<tr bgcolor ='white'>";
               echo"<td width ='100' align ='left'>";      
               echo"$contact";
               echo"</td>";
               echo"<td width ='300' align ='left'>";      
               echo"$update";
               echo"</td>";
               echo"<td width ='150' align ='left'>";      
               echo"$code";
               echo"</td>";
               echo"<td width ='50' align ='left'>";      
               echo"$type";
               echo"</td>";
               echo"<td width ='50' align ='right'>";      
               echo"";
               echo"</td>";
               echo"<td width ='50' align ='right'>";      
               //echo"$qty";
               echo"</td>";
               echo"<td width ='50' align ='right'>$rate</td>";
               echo"<td width ='100' align ='right'>$rates3a</td>";
               echo"</tr>";
            }
            $i++;
         }

      }else{
      //echo'Get the final Invoice copy from Re-print........';
      }
      $total_rc = $total_rc*-1;
      $total_rc = number_format($total_rc);
      if ($total_rc <> 0){

         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         echo"<table border ='0'><td width ='800' align='right'><b>TOTAL AMOUNT PAID</b></td><td width ='75' align ='right'><b>$totalamount_pay</td></table>";
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";

         $group_t =0;
      }

     //End of no-chargables
     //-------------------- 

      $tot = number_format($tot);
 
      $rates3 = number_format($mytot);
      //$rates3 = $mytot;
      echo'<br><br><br>';
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         echo"<table border ='0'><td width ='800' align='right'><b>BALANCE DUE</b></td><td width ='75' align ='right'><b>$balance</td></table>";
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
echo"<br><br>";
      //Now go and get non-chargables
      //-----------------------------
//$query = "SELECT service, COUNT(qty) FROM htransf WHERE invoice_no =' ' AND patients_name ='$patient1' and trans_type<>'Yes' GROUP BY service"; 	 
//$result = mysql_query($query) or die(mysql_error());

//------------------------------
//Now update invoices file
//------------------------
$inv_amt_tot =$mytot;
echo'<br><br><br><br><br><br><br><br><br><br><br><br>';
echo'Patients Name ___________________________________________________Signature_________________________________________Date________/______/________';

$query2= "UPDATE htransf SET others2 ='Printed' WHERE doc_no ='$ref_no'";
   $result2 =mysql_query($query2);

}


//here




// Print out result
echo"<table><tr>";
while($row = mysql_fetch_array($result)){
	echo "<tr><td width ='300'>";
        echo $row['service'];
        echo"</td><td width = '10'>";
        echo $row['COUNT(qty)'];
        echo"</td></tr>";
}
echo"</table>";



}     



//End of new receipt format
//------------------------
die()
//}


?>










<?php


   $date=$_GET['date'];
   $patients_name =$_GET['patient'];
   $adm_no =$_GET['adm_no'];
   $paid   =$_GET['amountp'];
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
      $address4    = mysql_result($result,$i,"address4");   
   }



   

   //--echo"<font size ='5'>";
   echo"<table width='400' border='0' cellspacing='0' cellpadding='0'>";      
   //echo"<tr><td width ='400' align ='center'><img src='logo_img2.jpg' style='width:250px;height:250px;'></td><tr>";
   echo"<tr><td align ='center'><h2>$company</h2></td></tr>";
   echo"<tr><td align ='center'>$address1</td></tr>";
   echo"<tr><td align ='center'>$address2</td></tr>";
   echo"<tr><td align ='center'>$address3</td></tr>";
   echo"<tr><td align ='center'>$address4</td></tr>";

   echo"</table><br>";

   echo"<div><h4>SALES RECEIPT. SERVICE NO:<img src='space.jpg' style='width:20px;height:2px;'>$ref_no</h4></div><br>";
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

$query= "SELECT * FROM auto_transact WHERE invoice_no ='$inv_nos' and selected='Yes' and credit_rate <>0 and balance = 0" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<table bgcolor ='black' border ='0' width ='400' width ='100%'>";
//-------Sawa -------------
$SQL = "select * FROM auto_transact WHERE invoice_no ='$inv_nos' and selected='Yes' and credit_rate <>0 and balance = 0" ;
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
echo"<tr><td width ='320' align ='right'><b>Amount Paid:</b></td><td width ='45'></td><td><b>$totalamount_pay</b></td></tr>";
echo"<tr><td width ='320' align ='right'><b>Balance:</b></td><td width ='45'></td><td><b>$balance</b></td></tr>";
echo "</table><br><br></b>";
echo "For Wama Nursing Home<br>";
echo"<img src='images/image.bmp' style='width:370px;height:70px;'><br>";
echo"Inspiring better health.";
//style='width:300px;height:50px;'><br>";
echo"<br>You were served by: ADMIN<br><br><br><br><br>";
echo"We wish you quick recovery";
echo "<input type=\"button\" value=\"Print\" onclick=\"printpage()\" />";

//Clear what has been paid
//------------------------
$found ='No';   
//Check if posted then clear
//--------------------------
$query2= "select * from receiptf WHERE ref_no ='$inv_nos'";
$result2 =mysql_query($query2);
while($row = mysql_fetch_array($result2)){
	    $found = 'Yes';
}
if ($found=='Yes'){
   $query7  = "UPDATE auto_transact SET balance=auto_transact.credit_rate  WHERE invoice_no ='$inv_nos' and credit_rate<> 0";
   $result7 =mysql_query($query7);
}
   
   if ($tr_type<>'INVOICE'){
      $query3  = "UPDATE auto_transact SET balance=auto_transact.credit_rate  WHERE invoice_no ='$inv_nos' and credit_rate<> 0";
       //and selected ='Yes'
   }else{
      $query3  = "UPDATE  auto_transact_inv SET balance=auto_transact_inv.credit_rate  WHERE invoice_no ='$inv_nos' and credit_rate<> 0";
      //and selected ='Yes'
   }
   $result3 =mysql_query($query3);


   $query3  = "DELETE FROM auto_transact WHERE invoice_no ='$inv_nos' and QTY= 0";
   $result3 =mysql_query($query3);




    die();

   //End of saving
   //-------------
   $date = $_SESSION['sys_date'];
   $client_no=' ';
   $patients_name=' ';
   $gender=' ';
   $age=' ';

   $history ="No medical history for the specified date";

     //echo"Put some details heare 6";


}

//}




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
   $mydate = $_SESSION['sys_date'];

   $location     = $_SESSION['company'];
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   $total        = $_GET["result_three"];
   //$count        = $num;
   $desc         = substr($description, -10);



   //get price for this item as you save it in temporary file
      

   $query9= "INSERT INTO receipts_tmp  VALUES('','$location','$description','$amount','$qty','$total','$total','$myDate','')";
      $result9 =mysql_query($query9);

$mydate = $_SESSION['sys_date'];





}






if (isset($_GET['refresh'])){
   $date = $_SESSION['sys_date'];
   //echo"Put some details heare 7";

}

if (isset($_GET['delete'])){
   $date = $_SESSION['sys_date'];
   //End of printing receipt

   $query3 = "DELETE FROM receipts_tmp WHERE description > ' '";
   $result3 =mysql_query($query3) or die(mysql_error());
}




//if (isset($_GET['add_next2']))
if (isset($_GET['save_cancel3']))
   {
   $date=$_GET['date'];
   //Get the receipt No.
   
   $query3 = "select * FROM next_refile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE next_refile SET next_ref ='$ref_no2'";
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
      $query2 = "select * FROM stockfile WHERE search_name ='$desc'";
      //AND location ='$codes'" ;
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

      $query3= "UPDATE stockfile SET qty ='$upd_qty',sell_price ='$rate' WHERE search_name ='$desc'"; 
      //AND location ='$codes'
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




<!--script>
function myFunction() {
    var paid = document.getElementById('amountp').value;   
    var tot  = document.getElementById('amount').value;
    var disc = document.getElementById('amountd').value;

    //var option = no.options[no.selectedIndex].text;
    tot2 = tot-disc-paid;
    document.getElementById("bamount").value = tot2;
}
</script>

<script>
function myFunction2() {
    var tot  = document.getElementById('amount').value;
    var disc = document.getElementById('amountd').value;
    tot3 = tot- disc;
    document.getElementById("amountp").value = tot3;
    //document.getElementById("bamount").value = tot3;
}
</script-->






<!--script>
function showUser2(str) {    
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
        xmlhttp.open("GET","mpesa-cash.php?q="+str,true);
        xmlhttp.send();
    }
}
</scri-->





<!--script>
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
        xmlhttp.open("GET","getbalance.php?q="+str,true);
        xmlhttp.send();
    }
}
</script-->

















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






<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript">
    $(function () {
        $("#ddlPassport").change(function () {
            if ($(this).val() == "M-PESA/CASH") {
                $("#dvPassport").show();
            } else {
                 $("#dvPassport").hide();
            }
        });
    });
</script>

<script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('color');
 if(val=='pick a color'||val=='Cash / M-pesa')
   element.style.display='block';
 else  
   element.style.display='none';
}

</script> 




<body>






<form action ="post_receipts2.php" method ="GET">
<?php

//New changes
if (isset($_GET['accounts5'])){ 
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM receipts_tmp WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());
    // echo"Put some details heare 9";

}


//For Next item button
//--------------------
if (isset($_GET['add_next'])){
$date = $_SESSION['sys_date'];
}














$company_identity =$_SESSION['company'];
            
 $cdquery="SELECT client_id,patients_name FROM clients";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            


$date = $_SESSION['sys_date'];

?>

<!--input type="text" id="result" size="20">
<input type="text" id="result2" size="20"-->




 <?php
//Displaying items to be adjusted
//$mydate = $_SESSION['sys_date'];
/////////////////////////////////
echo"<table>";
echo"<tr><td width ='100'><b>Ref No.</td><td width='50' align='left'><input type='text' id ='inv_no' name='inv_no' size='10' value ='$inv_no'></td></tr>";

echo"<tr><td width ='100'><b>Receipt No.</td><td width='50' align='left'><input type='text' id ='jv_no' name='jv_no' size='10' value ='$ref_no'></td></tr>";

echo"<tr><td width ='100'><b>Date:</td><td width='50' align='left'><input type='text' id ='date' name='date' size='10' value ='$mydate'></td></tr>";

//Select the trans type if cash,cheque,visa or any other
//------------------------------------------------------


if ($payer==''){
$sql="SELECT * FROM  auto_transact WHERE invoice_no = '$inv_no' and date ='$date' and description <>''";
}else{
$sql="SELECT * FROM  auto_transact_inv WHERE invoice_no = '$inv_no' and date ='$date' and description <>''";
}
$totals2 =0;
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
    $price =  $row['credit_rate'];
    $totals2 = $totals2+$price;
}

echo"<tr><td width ='100' align ='left'><b>Pay Mode:</b></td><td>";
echo"<select id='tr_type' name='tr_type'  onchange='CheckColors(this.value);' required>";
$cdquery="SELECT description FROM payment_modes order by description";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM payment_modes order by description";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["description"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";
echo"</td></tr>"; 
echo"<tr><td width ='20' align ='left'><b><font color='Red'>Mpesa/Cheque numbers</font></b></td><td>";
echo"<input type='text' id ='dvPassport' name='dvPassport' value =''></td></tr>";


//echo"<table width ='100%'><tr><div id='txtHint'>.</tr></table>";

echo"<tr>";
//<td width ='20' align ='left'><b><font color='Red'>Mpesa/Cheque numbers</font></b></td><td>";
//echo"<input type='text' id ='dvPassport' name='dvPassport' value =''></td></tr>";

//}else{
//echo"<tr><td width ='100' align ='left'><b>Type:</b></td><td>";
//echo"<input type='text' id ='tr_type' name='tr_type' size='30' value ='INVOICE' readonly></td></tr>";
//echo"<tr><td width ='100' align ='left'><b>Payer:</b></td><td>";
//echo"<font color ='red'>$payer</font></td></tr>";
//}
$amounts =$_SESSION['amt_paid'];
$total_only =$_SESSION['total_only'];

$query= "SELECT * FROM appointmentf where adm_no ='$adm_no'";
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($result)) 
   { 
   $prev_bals      = mysql_result($result,$i,"image_id");          
   $prev_bals = 0;
   $i++;
}
$amount2 = $amount2+$prev_bals;

if ($amount2<>$amounts){
   $amounts = $amount2;
}
//echo 'Amount:'.$totals2. 'Amounts: '.$amounts;
if ($username =='admin'){
echo"<tr><td width ='50'><b>Adm No:</b></td><td width='50' align='left'><input type='text' id ='adm_no' name='adm_no' size='20' value ='$adm_no'></td></tr>";

echo"<tr><td width ='50'><b>Patients Name:</b></td><td width='50' align='left'><input type='text' id ='patient' name='patient' size='20' value ='$patients_name'></td></tr>";

echo"<tr><td width ='50'><b>Narration</b></td><td width='50' align='left'><input type='text' id ='narration' name='narration' size='50' value ='$narration'></td></tr>";

echo"<tr><td width ='50'><b>Total:</b></td><td width='10' align='left'><input type='text' id ='amount' name='amount' size='10' value='$amounts' readonly></td></tr>";

echo"<tr><td width ='50'><b>Discount:</b></td><td width='10' align='left'><input type='text' id ='amountd' name='amountd' size='10' value='0' onchange='myFunction2()' required></td></tr>";

echo"<tr><td width ='50'><b>Paid :</b></td><td width='10' align='left'><input type='text' id ='amountp' name='amountp' size='10' value='$amounts' required><input type='text' id ='color' name='color' size='10' onchange='myFunction()'  style='display:none;'  placeholder ='Mpesa value'></td></tr>";

echo"<tr><td width ='50'><b>Balance:</b></td><td width='10' align='left'><input type='text' id ='bamount' name='bamount' size='10' value='0' readonly></td></tr>";
    
}else{
echo"<tr><td width ='50'><b>Adm No:</b></td><td width='50' align='left'><input type='text' id ='adm_no' name='adm_no' size='20' value ='$adm_no'></td></tr>";

echo"<tr><td width ='50'><b>Patients Name:</b></td><td width='50' align='left'><input type='text' id ='patient' name='patient' size='20' value ='$patients_name'></td></tr>";

echo"<tr><td width ='50'><b>Narration</b></td><td width='50' align='left'><input type='text' id ='narration' name='narration' size='50' value ='$narration'></td></tr>";

echo"<tr><td width ='50'><b>Total:</b></td><td width='10' align='left'><input type='text' id ='amount' name='amount' size='10' value='$amounts' readonly></td></tr>";

//echo"<tr><td width ='50'><b>Discount:</b></td><td width='10' align='left'><input type='text' id ='amountd' name='amountd' size='10' value='0' onchange='myFunction2()' readonly></td></tr>";

?>
<h5><font color='red'>After selection of cash / mpesa first box represents amount in cash and second box represents Mpesa figure as stated on it</font></h5>
<?

echo"<tr><td width ='50'><b>Paid :</b></td><td width='10' align='left'><input type='text' id ='amountp' name='amountp' size='10' value='$amounts' required><input type='text' id ='color' name='color' size='10' onchange='myFunction()'  style='display:none;'  placeholder ='Mpesa value'></td></tr>";

echo"<tr><td width ='50'><b>Balance:</b></td><td width='10' align='left'><input type='text' id ='bamount' name='bamount' size='10' value='0' readonly></td></tr>";

echo"<tr><td width ='50'><b>Co-pay Amount:</b></td><td width='10' align='left'><input type='text' id ='coamount' name='coamount' size='10' value='0'></td></tr>";




}
echo"<tr><td width ='50'><b>Status:</td><td width='50' align='left'>";
echo"<select id ='status' name='status' required>";
echo"<option value=''></option>";
echo"<option value='To Triage'>To Triage</option>";
echo"<option value='To cash office'>To cash office</option>";
echo"<option value='To Doctor'>To Doctor</option>";
echo"<option value='To Laboratory'>To Laboratory</option>";
echo"<option value='To Pharmacy'>To Pharmacy</option>";
echo"<option value='To Radiology'>To Radiology</option>";
echo"<option value='To Nutriton'>To Nutriton</option>";
echo"<option value='To WBC'>To WBC</option>";
echo"<option value='To Dental'>To Dental</option>";
echo"<option value='To Antenatal'>To Antenatal</option>";
echo"<option value='To Optical'>To Optical</option>";
echo"<option value='To Physio'>To Physiotherapy</option>";
echo"<option value='To Ward'>To Ward</option>";
echo"<option value='Completed'>Completed</option>";
echo"</select></td></tr>";

echo"</table>";
//removed from here
//-----------------
//echo"<img src='ico/black.jpg' style='width:100%;height:1px;'>";   

      echo"</table>";
      

?>
























<div class="container">
  <h1>
  <!--button type="submit" class="btn btn-success" name="save_cancel" id ="save_cancel">Save and Print</button></h1-->
  
  <button type="submit" class="btn btn-success" name="save_cancel" <?php echo isset($_POST["save_cancel"]) ? "disabled" : "";?>>Save and Print </button>
  
</div>
<br>

</form>

</body>
</html>