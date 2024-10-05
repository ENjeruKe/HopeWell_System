<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Print Receipt</title>

<script type="text/javascript">


function printpage()
  {
  window.print()
  }
</script>

<?php
   
   
   
   
   
   
   
   
   
   $tr_type ='CASH RECEIPT';
   
   
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

$query2= "UPDATE htransf SET others2 ='Printed' WHERE doc_no ='$ref_no'";
   $result2 =mysql_query($query2);

}


   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
?>

</body>
</html>
