<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$username = $_SESSION['username'];
?>

<?php



//session_start();
$_SESSION['discount']= $_GET['no_disc'];       
$company_identity = $_SESSION['company'];
//echo $company_identity;
//For save and print button
//------------------__-----
$codes =$_SESSION['company'];

   //New changes
if (isset($_GET['accounts3'])){    
    
    
      $mydate =date('y-m-d');
      $adm_no  = $_GET['accounts3'];
      $aa  = $_GET['accounts'];
     // echo $aa;

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



   $query3 = "select * FROM appointmentf WHERE adm_no ='$adm_no'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
       {
       $patients_name   = mysql_result($result3,$i3,"name");  
       $acc_no    = mysql_result($result3,$i3,"payer");
       $db_account= mysql_result($result3,$i3,"payer");
       $i3++;
     }
   $narration  = $adm_no.'-'.$patients_name;

   $query9= "INSERT INTO receipts_tmp  VALUES('','$adm_no','$patients_name','','','','','$myDate','')";
   $result9 =mysql_query($query9);
}

if (isset($_GET['save_cancel'])){
  
  
   
   //Go and save first
   //-------------------
   $date=$_GET['date'];
   $patients_name =$_GET['patient'];
   $adm_no =$_GET['adm_no'];
   $payer  =$_GET['db_accounts'];
   $tr_type=$_GET['tr_type'];
   $aftercare=$_GET['aftercare'];

   $cas_aa   =$_GET['amount'];
   $cas_bb   =$_GET['color'];


  $paid   =$cas_aa+$cas_bb;
 

   $debit_account  ='CASH COLLECTION A/C';
   $credit_account ='INPATIENT DEPOSIT';


   $db_accounts  = $payer;
   $db_accounts2 = $payer;
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



 //Asign receiptf number
     //------------------
     $query5= "INSERT INTO next_iprefile VALUES('')";
     $result5 =mysql_query($query5);  
     $query3 = "select * FROM next_iprefile" ;
     $result3 =mysql_query($query3) or die(mysql_error());
     $num3 =mysql_numrows($result3) or die(mysql_error());
     $i3=0;
     while ($i3 < $num3)
          {
          $next_ref   = mysql_result($result3,$i3,"next_ref");  
          $i3++;
          }

     $hnext_ref = $next_ref;
     $ref_no = 'I'.$next_ref;

   //Update Balances if not paid in full
   //-----------------------------------
   $topay = 0;
   $tot_amt = $paid;
   //if ($tot_amt > $paid){
   $query3 = "select * FROM appointmentf WHERE adm_no ='$adm_no'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;

   $balance   = 0;  
   while ($i3 < $num3)
       {
       $acc_no    = mysql_result($result3,$i3,"payer");
       $db_account= mysql_result($result3,$i3,"payer");  
       $i3++;
     }
     $balance2 = $balance+$topay;
     $query= "UPDATE clients SET balance ='$balance2' WHERE adm_no ='$adm_no'";
     $result =mysql_query($query);
   
   $timew =date('H:i:s');

     if ($aftercare==''){
        $desc22 =$tr_type;
        $regs  ="IP/OPD";
     }else{
        $desc22 ="AFTER CARE";
        $regs  ="AFTER CARE";
     }


     //Update Sales summary file with or without balance
     //-------------------------------------------------
     $query15= "INSERT INTO receiptf VALUES('','','IN PATIENT PAY','$patients_name','$qty_s','$desc22','$date','$username','$paid','$paid','$ref_no','$paid','$adm_no','','$timew')";
     $result15 =mysql_query($query15);




if ($tr_type =='Cash / M-pesa'){

   $query7= "INSERT INTO pay_datacash VALUES('','$location2','Cash / M-pesa','$patients_name','00','Cash Receipts','$date','$username','$cas_aa','$cas_aa','$jojo','0','$adm_no','$pil','$timew')";
   $result7 =mysql_query($query7);

   $query7a= "INSERT INTO pay_datacash VALUES('','$location2','Cash / M-pesa','$patients_name','00','M-PESA','$date','$username','$cas_bb','$cas_bb','$jojo','0','$adm_no','$pil','$timew')";
   $result7a =mysql_query($query7a);

    
}else{

   $query5a= "INSERT INTO pay_datacash VALUES('','$location2','$desc22','$patients_name','00','$tr_type','$date','$username','$cas_aa','$cas_aa','$jojo','0','$adm_no','$pil','$timew')";
   $result5a =mysql_query($query5a);

    
}


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
     $type   = mysql_result($result3,$i3,"type");
      $i3++;
     }

   $db_balance = $db_balance +$paid;

   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$debit_account'";
   $result2 =mysql_query($query2);

  //----------------------
   $query5= "INSERT INTO gltransf 
   VALUES('','$date','$debit_account','$ref_no','IP-RC','$patients_name','$paid','$username','$type')";
   $result5 =mysql_query($query5);

   

 
     //--------------------------------------
     $query  = "INSERT INTO htransf VALUES('','$adm_no','$patients_name','$date','$ref_no','$tr_type','RC','-$paid','Yes','RC','$regs','','','','','','')";
     $result =mysql_query($query);

   //-----------------------------------
   //Now go and update G/L Accounts file
   //-----------------------------------
   $query3 = "select * FROM glaccountsf WHERE account_name ='$credit_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $credit_balance   = mysql_result($result3,$i3,"balance");
     $type   = mysql_result($result3,$i3,"type");
     $i3++;
     }

     $credit_balance = $credit_balance -$paid;

     $query2= "UPDATE glaccountsf SET balance ='$credit_balance' WHERE account_name ='$credit_account'";
     $result2 =mysql_query($query2);
   //-------------------------
   //Now go and credit the bank
   //-------------------------
   $query5= "INSERT INTO gltransf VALUES('','$date','$credit_account','$ref_no','IP-RC','$patients_name','-$paid','$username','$type')";
   $result5 =mysql_query($query5);





   //-Print Receipt-----------------------------------------------------
   //-------------------------------------------------------------------
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
      $query= "SELECT * FROM htransf WHERE doc_no ='$ref_no' and others2 ='' ORDER BY trans2,date" or 
      die(mysql_error());
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $tot =0;
      $i = 0;
      $SQL = "SELECT * FROM htransf WHERE doc_no ='$ref_no' and others2 ='' ORDER BY trans2,date"  or die(mysql_error());

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
         echo"<table border ='0'><td width ='800' align='right'><b>TOTAL AMOUNT PAID</b></td><td width ='75' align ='right'><b>$total_rc</td></table>";
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
         echo"<table border ='0'><td width ='800' align='right'><b>BALANCE DUE</b></td><td width ='75' align ='right'><b>$rates3</td></table>";
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



//-----------------------------------------------------------------------------
//-----------------------------------------------------------------------------


}

























































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
 
<script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('color');
 if(val=='pick a color'||val=='Cash / M-pesa')
   element.style.display='block';
 else  
   element.style.display='none';
}

</script> 

 
<!DOCTYPE html>
<html lang="en">
  
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    

    



<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
    



<!-- Le styles -->
    
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/bills-pop-up.js"></script>

	
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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






if (isset($_GET['refresh'])){
   $date = date('y/m/d');
   //echo"Put some details heare 7";

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


      $query4= "INSERT INTO st_trans VALUES('$codes','$item_desc','Sales','-$qty_s','Stock Sales','$date','ADMIN','$rate','$total','$ref_no','$adm_no')";
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





<form action ="post_receipts.php" method ="GET">
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
   $date = date('y/m/d');
}


 $company_identity =$_SESSION['company'];

            
 $cdquery="SELECT client_id,patients_name FROM clients";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            


$date = date('y-m-d');



?>



 <?php
//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
echo"<table>";
echo"<tr><td width ='100'><b>Receipt No.</td><td width='50' align='left'><input type='text' id ='jv_no' name='jv_no' size='10' value ='$ref_no'></td></tr>";

echo"<tr><td width ='100'><b>Date:</td><td width='50' align='left'><input type='text' id ='date' name='date' size='10' value ='$mydate'></td></tr>";

//Select the trans type if cash,cheque,visa or any other
//------------------------------------------------------

echo"<tr><td width ='100' align ='left'><b>Type:</b></td><td>";
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



echo"<tr><td width ='50'><b>Adm No:</b></td><td width='50' align='left'><input type='text' id ='adm_no' name='adm_no' size='20' value ='$adm_no'></td></tr>";

echo"<tr><td width ='50'><b>Patients Name:</b></td><td width='50' align='left'><input type='text' id ='patient' name='patient' size='20' value ='$patients_name'></td></tr>";

echo"<tr><td width ='50'><b>Narration</b></td><td width='50' align='left'><input type='text' id ='narration' name='narration' size='50' value ='$narration'></td></tr>";

echo"<tr><td width ='50'><b>Amount</b></td><td width='10' align='left'><input type='text' id ='amount' name='amount' size='10' required><input type='text' id ='color' name='color' size='10' onchange='myFunction()'  style='display:none;'  placeholder ='Mpesa value'></td></tr>";

//echo"<tr><td width ='50'><b><font color ='red'>After Care?</font></b></font></td><td width='50' align='left'><input type='checkbox' name='aftercare' id='aftercare' value ='bar'/></td></tr>";


echo"</table>";
//removed from here
//-----------------
echo"<img src='ico/black.jpg' style='width:680px;height:1px;'>";   

      echo"</table>";
echo"<table width ='400' border='0' border color ='red'><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save & Print Receipt '></td></table>";      

//echo"<img src='ico/black.jpg' style='width:680px;height:1px;'>";   
//echo"<table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' height='50' width='70'>";

      echo"</table>";
?>


</form>

</body>
</html>