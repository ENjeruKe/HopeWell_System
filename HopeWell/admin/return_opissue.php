<?php
   session_start();
require('open_database.php');
$branch = $_SESSION['company'];

?>

<html>
<script>
function function3() {
    //alert ('here....');
    var no = document.getElementById('qty').value;   
    //var txt = document.getElementById('amount_three').value;
    var txtz = document.getElementById('cost').value;
    
    //txt2 = txt * no;
    txt2 = txtz/no;
    
    //document.getElementById("result_three").value = txt2;
    document.getElementById("one_cost").value = txt2;
}
</script>


<?php
 $go_on='Yes';
// if ($go_on=='Yes'){    
//if (! isset($_GET['print'])){
    echo"<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title><div class='navbar navbar-inverse navbar-fixed-top'>";      
    echo"<div class='navbar-inner'>";                  
    echo"<a class='btn btn-navbar' data-toggle='collapse' data-target='.nav-collapse'><span class='icon-bar'></span><span class='icon-bar'></span><span class='icon-bar'></span></a>";
    echo"<a class='brand' href='#'>Medi+ V10 (HMIS Global)</a><div class='nav-collapse collapse'><p class='navbar-text pull-right'><a target='_blank' href='http://www.hmisglobal.com' class='navbar-link'>www.hmisglobal.com</a></p>";

          echo"</div></div></div></div>";
    echo"<link rel=StyleSheet href='popups/header.css' type='text/css' media='screen'>";
    echo"<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet'>";
    
    
    
    
if (isset($_GET['save'])){
   //Get into printing if selected
   //-----------------------------
   $cost = $_GET['cost'];
   $qty = $_GET['qty'];
   $costx = $_GET['one_cost'];
   $id = $_GET['id'];
   
   $cdquery="SELECT * FROM htransf WHERE id ='$id'";
   $cdresult=mysql_query($cdquery);
   $query3 = "SELECT * FROM htransf WHERE id ='$id'";
   $result3 =mysql_query($query3);
   $num3 =mysql_numrows($result3);
   $i3=0;
   while ($cdrow=mysql_fetch_array($cdresult)) {
       $adm_no=$cdrow["adm_no"];
       $inv_no =$cdrow["doc_no"];
       $idsx=$cdrow["id"];
       $i3++;
   }
   
  // echo'...1'.$cost;
   $query3  = "select * FROM appointmentf WHERE adm_no ='$adm_no'" ;
   $result3 = mysql_query($query3) or die(mysql_error());
   $num3    = mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
       {       
       $acc_no    = mysql_result($result3,$i3,"payer");
       $db_account= mysql_result($result3,$i3,"payer");
       $name= mysql_result($result3,$i3,"name");
       $payer= mysql_result($result3,$i3,"payer");
       $i3++;
     }
   
   $founds ='No';
   $query3  = "select * FROM receiptf WHERE ref_no ='$inv_no'" ;
   $result3 = mysql_query($query3) or die(mysql_error());
   $num3    = mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
       {       
       $founds ='Yes';
       $i3++;
     }
   
   
   
   
   $update_last =$inv_no;

   $status ='';
   //$today = $_SESSION['sys_date'];
   $today = date('y-m-d');
   $paid_s =0;
   $total_only  = $costx;
   $discount =0;

 //$time = date('y-m-d h:i:s a', time());
 $time = date("Y-m-d H:i:s");
 $time = $_SESSION["log_date"];
 $timew = date("H:i:s");
//echo'...2'.$inv_no;
 //Now go and update admit file
 //----------------------------
 $query5= "INSERT INTO logfile VALUES('$time','$customer','$username','Return from patients')";
 $result5 =mysql_query($query5);

//echo"2";
 $db_accounts  = $payer;
 $db_accounts2 = $payer;
 $ref_no   = $inv_no;
 $date =date('y-m-d'); 
      $ref_nos =$inv_no;
      
 $query7  = "select * FROM htransf WHERE id ='$idsx'" ;
 $result7 = mysql_query($query7) or die(mysql_error());
 $num7    = mysql_numrows($result7) or die(mysql_error());
 $tot7 =0;
 $i7 = 0;
 while ($i7 < $num7)
     {
     $narration   = mysql_result($result7,$i7,"service");  
     $amount      = mysql_result($result7,$i7,"amount"); 
     $adm_nox      = mysql_result($result7,$i7,"adm_no"); 
     $paid        = mysql_result($result7,$i7,"amount"); 
     $price       = mysql_result($result7,$i7,"amount"); 
     $qty_s       = mysql_result($result7,$i7,"qty"); 
     $patients_name        = mysql_result($result7,$i7,"patients_name"); 
     $patients_names        = mysql_result($result7,$i7,"patients_name"); 
     $trans2        = mysql_result($result7,$i7,"trans2"); 
     
     $inv_nos     = mysql_result($result7,$i7,"doc_no"); 
     $inv_no      = mysql_result($result7,$i7,"doc_no"); 
     $date = mysql_result($result7,$i7,"date"); 
     $i7++;
     //Now go and post entry in the auto-cash file
     //-------------------------------------------
    }


     //$query4 ="INSERT INTO st_trans (`id`, `location`, `description`, `type`, `qty`, `trans_desc`, `date`, `inputby`, `price`, `total`, `ref_no`, `adm_no`, `vat`, `disc`, `tot_vat`, `tot_disc`, `net_total`) 
     //VALUES ('', 'PHARMACY', '$narration', '$patients_names', '$qty', 'RTP', '$date', '$username', '$cost', '$costx', '$inv_no', '$adm_nox', '', '', '', '', '$price')";

     $query4= "INSERT INTO st_trans VALUES('','PHARMACY','$narration','$patients_names','$qty','RTP','$date','$username','$price','$price','$inv_no','$adm_nox','','','','','$price')";
     $result4 =mysql_query($query4);
      
  //   echo'...3';
     $drugs ='Yes';
     $narrationx=$narration;
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
   //echo"5";
   if ($founds=='Yes'){
       $tr_type ='CASH RECEIPTS';
   }
   //Start updating
   //-------------- 
   $debit_account ='PHARMACY DRUGS';
   if ($tr_type=='INVOICE'){
      $credit_account  ='ACCOUNTS RECEIVABLES';
      $payment ='TRF INVOICE :: '.$inv_nos;
   }else{  
      $credit_account  ='CASH COLLECTION A/C';
      $payment ='Payment:: '.$inv_nos;
   }
   //Update Balances if not paid in full
   //-----------------------------------
   $topay = 0;
   $tot_amt = $paid;
//echo'...4';

   //Update Sales summary file with or without balance
   //-------------------------------------------------
   if ($tr_type=='INVOICE'){
       //Dont post in cash register
   }else{
      if ($tr_type=='CASH/M-PESA RECEIPT'){
          //Now post cash amount
          //--------------------
          $query15= "INSERT INTO receiptf VALUES('','','$narration','$patients_name','$qty_s','Cash Receipts','$date','$username','-$cash_amount','-$cash_amount','$ref_no','0','$adm_no','$pil','$timew')";
          $result15 =mysql_query($query15);

          //Now post mpesa amount
          //---------------------
          $query15= "INSERT INTO receiptf VALUES('','','$narration','$patients_name','$qty_s','M-PESA','$date','$username','-$mpesa_amount','-$mpesa_amount','$ref_no','0','$adm_no','$pil','$timew')";
          $result15 =mysql_query($query15);
       }else{
          $query15= "INSERT INTO receiptf VALUES('','','$narration','$patients_name','$qty_s','$tr_type','$date','$username','-$paid','-$paid','$ref_no','0','$adm_no','$pil','$timew')";
          $result15 =mysql_query($query15);
       }
   }

   //Go and update gltransf
   //----------------------
   $patients_name = $narration.' :-: '.$patients_name;
   
   $query5= "INSERT INTO gltransf    VALUES('','$date','$debit_account','$ref_no','RC','$patients_name','$paid','$username','CONTROL')";
   $result5 =mysql_query($query5);

//echo'...5';
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
   //Now go and credit the bank -1
   //--------------------------
   $query5= "INSERT INTO gltransf VALUES('','$date','$credit_account','$ref_no','RC','$patients_name','-$paid','admin','$acc_type')";
   $result5 =mysql_query($query5);
if ($tr_type<>'INVOICE'){
   $invoice_update ='';
}else{
   $invoice_update =$ref_no;
}
  
  //echo'...6';
   $payment = 'Payment:: '.$inv_no;
if($total_only<>'0'){
   $query   = "INSERT INTO htransf () VALUES('','$adm_no','$name','$date','$ref_no','$narration','CR',
'-$price','RC','$trans2','IP/OPD','$invoice_update ','$username','','','$qty','')";
   $result =mysql_query($query);
}
$amountsx =$price*-1;

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
//echo'...7';

   //$i7++; need no loop
   //-------------------
   //}

   $payment ='Payment:: '.$inv_no;
   $balance   =0;
   $cashed   =$paid;
   $discount=0;

$receipt ='Payment';

$pay_date = date('y-m-d');
if ($tr_type=='INVOICE'){
   //Dont put a payment coz it is an invoice
   //Post in hdnotef, dtransf
   $patients_name =$_GET['patient'];
   //$query5= "INSERT INTO hdnotef VALUES('','$adm_no','$patients_name','$date','$ref_no','','','$paids','$paids','$payer','','$username')";
   $result5 =mysql_query($query5);
   //Now post in dtransf
   $query5= "INSERT INTO dtransf VALUES('$payer','$date','$name','$ref_no','$adm_no','TRF','$amountsx','$amountsx','$username')";
   $result5 =mysql_query($query5);
}


//echo'...8';
   //Reduce stocks if any
   //--------------------
   $iss_type = 'RTP';
   $query2 = "select * FROM stockfile where location ='PHARMACY' and description ='$narrationx'" ;
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
            $bal_level = $level+$qty;
            $i2++;
            }
            $query7= "UPDATE stockfile SET qty='$bal_level' WHERE location ='PHARMACY' and description ='$narrationx'";
            $result7 =mysql_query($query7);
           //--------------------------------
           
           


 //echo'...9';
 
 
   //echo"14";
//Tabulate the cost price of each item sold
//-----------------------------------------
$med_cost = $med_cost*0.67;
//Debit cost of goods sold in g/l -2
//-------------------------------
$patients_name =$item.'::'. $patients_names;
$credit_account ='COST OF GOODS SOLD';
$debit_account ='INVENTORY';
$query5= "INSERT INTO gltransf    VALUES('','$date','$debit_account','$ref_no','CR','$patients_name','$price','$username','EXPENSE')";
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
   //echo"15";
   while ($i3 < $num3)
     {
     $db_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

   $db_balance = $db_balance +$med_cost;
//echo'...10';
   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$debit_account'";
   $result2 =mysql_query($query2);

   $acc_type ='CONTROL';
   //Now go and credit the bank
   //--------------------------
   $query5= "INSERT INTO gltransf VALUES('','$date','$credit_account','$ref_no','RC','$patients_name','-$price','$username','$acc_type')";
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
  // echo"16";
     $credit_balance = $credit_balance -$med_cost;

     $query2= "UPDATE glaccountsf SET balance ='$credit_balance' WHERE account_name ='$credit_account'";
     $result2 =mysql_query($query2);
     
     echo"<br><br><br><br><br><h1>Return saved successfully.................</h1>";
die();
}
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
     

//}

$id   = $_GET['invoice']; 
$cost = $_GET['total']; 
$qty= $_GET['count']; 
$invoicex= $_GET['invoice'];    
$pricex= $_GET['price'];      
    
$cdquery="SELECT * FROM htransf WHERE id ='$id'";
$cdresult=mysql_query($cdquery);
$query3 = "SELECT * FROM htransf WHERE id ='$id'";
$result3 =mysql_query($query3);
$num3 =mysql_numrows($result3);
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
$servicex=$cdrow["service"];
$i3++;
}    

//}

echo"<form action ='return_opissue.php' method ='GET'>";



echo"<table>";
echo"<tr><td>Ref No:</td><td><input type='text' name='id' value='$id' readonly></td></tr>";
echo"<tr><td>Item Name:</td><td><input type='text' id='cost' name='cost' value='$servicex' readonly></td></tr>";
echo"<tr><td>QTY:</td><td><input type='text' id='qty' name='qty' value='$qty' onchange='function3()' readonly></td></tr>";
echo"<tr><td>Amt Paid:</td><td><input type='text' id='one_cost' name='one_cost' value='$pricex' readonly></td></tr>";

echo"</table><font color ='red'>Kindly confirm and be sure of the changes you are about to make before you can click</font>";

echo"<input type='submit' name='save'  class='button' value='Save changes'>";

echo"</FORM>";









?>
    
