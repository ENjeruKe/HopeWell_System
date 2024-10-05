<?php include 'includes/session.php'; ?>
<?php 
  require('open_database.php');
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
  $supplier =$_GET['supplier'];
  $invoice = $_GET['invoice'];
 
  //Now go and update the suppliers account
   //---------------------------------------   
   
   
   
     $query = "select * FROM lpo_trans WHERE ref_no ='$invoice'" ;
     $result =mysql_query($query) or die(mysql_error());
     $id = 0;
     $nRecord = 1;
     $No = $nRecord;
     $num =mysql_numrows($result) or die(mysql_error());
     $i =0;
     $tot_amt =0;
     $mnet_total=0;
     $codes = $_SESSION['company'];
     $mtot_disc =0;
     while ($i < $num)
      {         
      $supplier    = mysql_result($result,$i,"adm_no");   
      $i++;
      }
      
   $query2 = "select * FROM suppliersfile WHERE account_name ='$supplier'" ;
   $result2 =mysql_query($query2) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num2 =mysql_numrows($result2) or die(mysql_error());
   $i2 =0;
   while ($i2 < $num2)
         {         
         $balance   = mysql_result($result2,$i2,"os_balance");  
         $acc_no      = mysql_result($result2,$i2,"id");  
         $acc_no2      = mysql_result($result2,$i2,"id");  
         $acc_name    = mysql_result($result2,$i2,"account_name");  
         $caddress1    = mysql_result($result2,$i2,"telephone_no");   
         $caddress2    = mysql_result($result2,$i2,"address");   
         $contact      = mysql_result($result2,$i2,"contact");   
         $i2++;
      }
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
   echo"<p align ='centre'><h3><u>LOCAL PURCHASE ORDER</u></h3></p>";
   echo"<p align ='left'><h4>LPO No: $invoice</h4>";
   echo"<p align ='left'><h4>ENROLMENT NO: 2979</h4>";
   
   echo"<table width ='100%'><h1>";      
   echo"<tr><td align ='left'><b>Supplier Name:</b></td><td align ='left'><b>$acc_name</b></td><td width ='100'></td><td align ='right' width ='350'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>Address:</b></td><td align ='left'><b>$caddress1</b></td><td width ='100'></td><td align ='right' width ='350'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>Telephone:</b></td><td align ='left'><b>$caddress2</b></td><td width ='100'></td><td align ='right' width ='350'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>Contact:</b></td><td align ='left'><b>$contact</b></td><td width ='100'></td><td align ='right' width ='350'><b>$address3</b></td></tr>";
   echo"<tr><td></td><td align ='left'></td><td width ='50'></td><td align ='right'><b>$address4</b></td></tr>";
   echo"</table><br>";
   $to ='  To  ';
  

 echo"Dear Sir/Madam.<br><br> Kindly supply us with the following items. Thank you.<br><br>";

echo"<table width ='100%'><tr><th width ='30%' bgcolor ='black' align ='left'><font color ='white'>Item Description</th><th width ='15%' bgcolor ='black' align='right'><font color ='white'>Availabe</th><th width ='15%' bgcolor ='black' align='right'><font color ='white'>Qty</th><th width ='10%' bgcolor ='black' align='right'><font color ='white'>Price</th><th width ='10%' bgcolor ='black' align='right'><font color ='white'>Total</th><th width ='10%' bgcolor ='black' align='right'><font color ='white'>Net</th></tr>";
     //$query = "update stock_lpo_tmp set total =gl_account-tot_disc+tot_vat WHERE description <>''" ;
     //$result =mysql_query($query) or die(mysql_error());

     $query = "select * FROM lpo_trans WHERE ref_no ='$invoice'" ;
     $result =mysql_query($query) or die(mysql_error());
     $id = 0;
     $nRecord = 1;
     $No = $nRecord;
     $num =mysql_numrows($result) or die(mysql_error());
     $i =0;
     $tot_amt =0;
     $mnet_total=0;
     
     $tot_bill = 0;
     $tot_paid = 0;
     $tot_bill2= 0;
      
     $codes = $_SESSION['company'];
     $mtot_disc =0;
     while ($i < $num)
      {         
      //$codes   = mysql_result($result,$i,"location");  
      $desc    = mysql_result($result,$i,"description");   
      $disc    = mysql_result($result,$i,"ref_no");   
      $qty    = mysql_result($result,$i,"price");   
      $rate     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"total"); 
      $balance  = mysql_result($result,$i,"vat"); 
      $tot_vat = mysql_result($result,$i,"tot_vat");  
      $tot_disc= mysql_result($result,$i,"tot_disc");  
      $net_total= mysql_result($result,$i,"total"); 
      $date= mysql_result($result,$i,"real_date"); 
      $vat      = ''; 
      $disc     = ''; 
      $inputby= mysql_result($result,$i,"inputby");  
      $tot_amt = $tot_amt + $total;
      $mnet_total= $mnet_total+$net_total;
      $mtot_disc = $mtot_disc+$tot_disc;
      $dca = $qty*$rate;




// echo "<td align ='right'>" . number_format($row['total']) . "</td>";
       $paid = $dca;
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill = $tot_bill +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;

       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill);

      if ($desc<>''){
   echo"<tr><td width ='30%' align ='left'>$desc</td><td width ='15%' align ='right'>$balance</td><td width ='15%' align ='right'>$qty</td><td width ='10%' align ='right'>$rate</td><td width ='10%' align ='right'>$dca</td><td width ='10%' align ='right'>$tot_bill2</td></tr>";
      }
   $i++;
  }
   echo"<tr><th width ='350' align ='left'></th><th width ='50' align ='left'></th><th width ='50' align ='left'></th><th width ='50' align ='right'></th><th width ='100' align ='right'></th></tr>";
   echo"<tr><th width ='350' align ='left'></th><th width ='50' align ='left'></th><th width ='50' align ='left'></th><th width ='50' align ='right'></th><th width ='100' align ='right'></th></tr>";
//echo"<hr>";
echo"<tr><th width ='350'></th><th width ='50'></th><th width ='50'  align='right'><font color ='black'>TOTAL</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>$tot_bill2</th--></tr></table>";
echo"****End****<br>";

echo"<br><br><br>";

   echo"<table><tr><th width ='250' align ='left'>Date prepared:</th><th width ='50' align ='left'>$date</th></tr>";
   echo"<tr><th width ='250' align ='left'>Ordered by:</th><th width ='50' align ='left'>$inputby</th></tr>";
   echo"<tr><th width ='250' align ='left'>Checked & Approved by:</th><th width ='50' align ='left'>________________________________</th></tr></table>";
echo"<br><br><br><br>";
echo"Official Stamp";
?>


