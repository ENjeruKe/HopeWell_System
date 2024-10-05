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
  $qq = $_GET['qtys'];
  
  //Now go and update the suppliers account
   //---------------------------------------   
   
   
     if ($qq >0){
     $query = "select * FROM st_trans WHERE ref_no ='$invoice' and trans_desc ='TRF' and qty >0" ;
     }else{
         $query = "select * FROM st_trans WHERE ref_no ='$invoice' and trans_desc ='TRF' and qty <0" ;
     }
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
      $location2    = mysql_result($result,$i,"type");  
      $location1    = mysql_result($result,$i,"location");  
      $i++;
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
  echo"<p align ='centre'><h3><u>STOCK TRANSFER NOTE</u></h3></p>";

   echo"<table width ='100%'><h1>";      
   if ($qq >0){
   echo"<tr><td align ='left'><b>Receiving store</b></td><td align ='left'><b>$location1</b></td><td width ='100'></td><td align ='right' width ='350'></td></tr>";
   }else{
       echo"<tr><td align ='left'><b>Issueing store</b></td><td align ='left'><b>$location1</b></td><td width ='100'></td><td align ='right' width ='350'></td></tr>";
   }
   echo"<tr><td align ='left'><b>.........</b></td><td align ='left'><b></b></td><td width ='100'></td><td align ='right' width ='350'><b></b></td></tr>";
   if ($qq <0){
   echo"<tr><td align ='left'><b>Receiving store</b></td><td align ='left'><b>$location2</b></td><td width ='100'></td><td align ='right' width ='350'><b></b></td></tr>";
   }else{
          echo"<tr><td align ='left'><b>Issuing store</b></td><td align ='left'><b>$location2</b></td><td width ='100'></td><td align ='right' width ='350'><b></b></td></tr>";
   }
   echo"<tr><td align ='left'>............</td><td align ='left'></td><td width ='100'></td><td align ='right' width ='350'></td></tr>";
   echo"<tr><td></td><td align ='left'></td><td width ='50'></td><td align ='right'></td></tr>";
   echo"</table><br>";
   $to ='  To  ';
  


 
echo"<h2>Ref NO:".$invoice."</h2>";
echo"<table width ='100%'><tr><th width ='200' bgcolor ='black' align ='left'><font color ='white'>Item Description</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>@cost</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>Qty</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>Total</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>Discount</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>Net Total</th></tr>";
   
 //  echo'qty'.$qq;  
     if ($qq >0){
     $query = "select * FROM st_trans WHERE ref_no ='$invoice' and description <>'' and trans_desc ='TRF' and qty >0" ;
     }else{
         $query = "select * FROM st_trans WHERE ref_no ='$invoice' and description <>'' and trans_desc ='TRF' and qty <0" ;
     }
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
      $today   = mysql_result($result,$i,"date");  
      $loc   = mysql_result($result,$i,"location");  
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"total");  
      $tot_vat = mysql_result($result,$i,"tot_vat");  
      $tot_disc= mysql_result($result,$i,"tot_disc");  
      $net_total= mysql_result($result,$i,"total"); 
      $vat      = mysql_result($result,$i,"credit_rate"); 
      $disc     = mysql_result($result,$i,"disc"); 
      $net     = mysql_result($result,$i,"net_total"); 
 
      $tot_amt = $tot_amt + $total;
      $mnet_total= $mnet_total+$net_total;
      $mtot_disc = $mtot_disc+$tot_disc;
      $net_totals = $net_totals +$net;

      if ($desc<>''){
   echo"<tr><td width ='200' align ='left'>$desc</td><td width ='50' align ='right'>$rate</td><td width ='50' align ='right'>$qty</td><td width ='50' align ='right'>$total</td><td width ='50' align ='right'>$tot_disc</td><td width ='50' align ='right'>$net</td></tr>";
      }
   $i++;
  }
   echo"<tr><th width ='200' align ='left'></th><th width ='50' align ='left'></th><th width ='50' align ='left'></th><th width ='50' align ='right'></th><th width ='100' align ='right'></th></tr>";
   echo"<tr><th width ='200' align ='left'></th><th width ='50' align ='left'></th><th width ='50' align ='left'></th><th width ='50' align ='right'></th><th width ='100' align ='right'></th></tr>";
//echo"<hr>";
echo"<tr><th width ='200'></th><th width ='50'></th><th width ='50'  align='right'><font color ='black'>TOTAL</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>$tot_amt</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>$mtot_disc</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>$net_totals</th></tr></table>";




   echo"<table><tr><th width ='200' align ='left'>Date received:</th><th width ='100' align ='left'>$today</th></tr>";
   if ($qq >0){
   echo"<table><tr><th width ='200' align ='left'>Receiving Store:</th><th width ='100' align ='left'>$loc</th></tr>";
   }else{
       echo"<table><tr><th width ='200' align ='left'>Issuing Store:</th><th width ='100' align ='left'>$loc</th></tr>";
   }
   echo"<tr><th width ='200' align ='left'>Received by:</th><th width ='100' align ='left'>________________________________</th></tr>";
   echo"<tr><th width ='200' align ='left'>Checked & Approved by:</th><th width ='100' align ='left'>________________________________</th></tr></table>";
echo"<br><br><br><br>";
echo"Official Stamp";



 
 
 
 
 
 
 
 
 
 
 
?>


