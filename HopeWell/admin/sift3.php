<?php
session_start();
 require('open_database.php');
 require('includes/connect.php');

?>






<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">




﻿<?php
 $branch     = $_SESSION['company']; 
 //$date2 = date('y-m-d');
 //$date1 = date('y-m-d');


if (isset($_GET['account3'])){ 
   $pop = $_GET['accounts3'];
   $ac = $_GET['accounts4'];
   $as = $_GET['accounts5'];
   $ad = $_GET['accounts6'];
   $ax = $_GET['accounts7'];

   //$result3 = mysql_query($query3);
}


if (isset($_GET['accounts3']) OR isset($_GET['account3'])){    
   $check_date = date('y-m-d');
   if (isset($_GET['accounts3'])){
   $pop = $_GET['accounts3'];
   $ac = $_GET['accounts4'];
   $as = $_GET['accounts5'];
   $ad = $_GET['accounts6'];
   $ax = $_GET['accounts7'];
   }





   $result = $db->prepare("SELECT * FROM attendance WHERE id='$pop'");
   $result->execute();
   for($i=0; $row = $result->fetch(); $i++){
      $ac =$row['date'];
      $as =$row['time_in'];
      $ad =$row['out_dte'];
      $ax =$row['time_out'];
      $ab =$row['employee_id'];


   }

   if ($ad =='0000-00-00' && $ax =='00:00:00' ){
      $ad =date('Y-m-d');
      $ax =date('H:i:s');
   }  

  // $as =substr($as,0,5);
  // $ax =substr($ax,0,5);
  // $pp =$ac.' '.$as;
  // $dc =$ad.' '.$ax;

   //$as =$as.':00';
   //$ax =$ax.':00';
//   echo $pp;
//   echo $dc;

$date1  = $ac.' '.$as;
//$date2  = $_GET['date2'];
$date2 =$ad.' '.$ax;


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
}
echo"<font size ='2'>";
echo"<table width ='500'>";      
echo"<tr><td align ='left'><b>$company</b></td></tr>";
echo"<tr><td align ='left'><b>$address1</b></td></tr>";
echo"<tr><td align ='left'><b>$address2</b></td></tr>";
echo"<tr><td align ='left'><b>$address3</b></td></tr>";
echo"</table><br>";

echo"<h4>CASHIERS SHIFT REPORT <img src='space.jpg' style='width:20px;height:2px;'>"."Dated from: ".$date1."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date2;
echo"</h4>";
echo"<h4>Printed For User : <img src='space.jpg' style='width:20px;height:2px;'>".$ab;
//   echo"Dated from: ".$date1."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date2;

//echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";





$today = date('y-m-d');
$mdate =date('y-m-d');
//$date1  = $_GET['date1'];
//$date2  = $_GET['date2'];

$query  = "select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and inputby='$ab' ORDER BY date,ref_no" ;
$result =mysql_query($query);
$num =mysql_numrows($result);





$tot =0;
$i = 0;
                                                      






?>
<table width ='100%'>
<tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Description of Service</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr>
<hr>
<u>CASH RECEIPTS</u><br>

<?php
//$date2 = $date2.' 24:00:00';
$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and inputby='$ab' ORDER BY date,ref_no,trans_desc" ;   

$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;

$docno ='';

while ($row=mysql_fetch_array($hasil)) {
 $types = $row['trans_desc'];
 echo"<font size ='2'>";
 if ($types=='Cash Receipts'){
    $dates =$row['date'].' '.$row['time'];
    echo "<tr>";
    echo "<td>" . $dates . "</td>";
    echo "<td width ='350'>" . $row['type'] . "</td>";
    //echo "<td>" . $row['ref_no'] . "</td>";

   $_SESSION['ref_no'] =$row['ref_no'];  
   $aa =$row['ref_no'];        
   $aa2 =$row['type'];   
   $aa3=$row['trans_desc'];        
   $aa4=$row['type'];   
   $aa5=$row['description'];   
   $aa6=$row['type'];        
   $aa7=$row['date'];        
   //echo"<td width ='100' align ='right'></td>";





    echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";

    echo "<td>" . $row['description'] . "</td>";
    echo "<td align ='right'>" . number_format($row['total']) . "</td>";
    $paid = $row['total'];
    $codes2 = $paid; 
    $update2 = $codes2; 
    $tot_bill = $tot_bill +$paid;
    $tot      = $tot +$total;
    $tot_paid = $tot_paid +$paid;

    $update2 = number_format($update2);
    $rate = number_format($paid);
    $tot_bill2 = number_format($tot_bill);
    //echo strtolower("$tot_bill2");
    echo "<td align ='right'>" . $tot_bill2. "</td>";
    echo "</tr>";

      $i++;      
     }
  }
   echo"</table>";
   echo"<hr>";
   echo"<table border='0'>";   
   $tot_bill = number_format($tot_bill);
   $tot_paid = number_format($tot_paid);
   $tot = number_format($tot);
   echo"<tr>";
   echo"<td width ='320' align ='left'>";
   echo"</td>";      
   echo"<td width ='300'>";
   echo"</td>";      
   //echo"<td width ='70'align ='right'><b>$tot_bill";      
   echo"</b></td>";      
   //echo"<td width ='70' align ='right'>$tot_bill2";      
   echo"</td>";      
   echo"<td width ='200' align ='center'>";      
   echo"Total";      
   echo"</td>";          
   echo"<td width ='70' align ='right'><b>$tot_bill2</b></td>";      
   echo"</tr>";   
   echo"</font>";
   echo"</table>";
?>

<u>EFT RECEIPTS</u><br>
<table width ='100%'>
<!--tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Description of Service</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr-->
<?php
$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and inputby='$ab' ORDER BY date,ref_no,trans_desc" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;
$tot_bill2= 0;
$docno ='';

while ($row=mysql_fetch_array($hasil)) {
 $types = $row['trans_desc'];
 echo"<font size ='2'>";
 if ($types=='EFT'){
   $dates =$row['date'].' '.$row['time'];
   echo "<tr>";
   echo "<td>" . $dates . "</td>";
   echo "<td width ='350'>" . $row['type'] . "</td>";




   $_SESSION['ref_no'] =$row['ref_no'];  
   $aa =$row['ref_no'];        
   $aa2 =$row['type'];   
   $aa3=$row['trans_desc'];        
   $aa4=$row['type'];   
   $aa5=$row['description'];   
   $aa6=$row['type'];        
   $aa7=$row['date'];        
   //echo"<td width ='100' align ='right'></td>";





    echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";


    echo "<td>" . $row['description'] . "</td>";
    //echo "<td align ='right'>" . $row['total'] . "</td>";
    echo "<td align ='right'>" . number_format($row['total']) . "</td>";
    $paid = $row['total'];
    $codes2 = $paid; 
    $update2 = $codes2; 
    $tot_bill = $tot_bill +$paid;
    $tot      = $tot +$total;
    $tot_paid = $tot_paid +$paid;

    $update2 = number_format($update2);
    $rate = number_format($paid);
    $tot_bill2 = number_format($tot_bill);
    //echo strtolower("$tot_bill2");
    echo "<td align ='right'>" . $tot_bill2. "</td>";
    echo "</tr>";









      $i++;      
     }
  }
   echo"</table>";
   echo"<hr>";
   echo"<table border='0'>";   
   $tot_bill = number_format($tot_bill);
   $tot_paid = number_format($tot_paid);
   $tot = number_format($tot);
   echo"<tr>";
   echo"<td width ='320' align ='left'>";
   echo"</td>";      
   echo"<td width ='300'>";
   echo"</td>";      
   //echo"<td width ='70'align ='right'><b>$tot_bill";      
   echo"</b></td>";      
   //echo"<td width ='70' align ='right'>$tot_bill2";      
   echo"</td>";      
   echo"<td width ='200' align ='center'>";      
   echo"Total";      
   echo"</td>";          
   echo"<td width ='70' align ='right'><b>$tot_bill2</b></td>";      
   echo"</tr>";   
   echo"</font>";
   echo"</table>";





?>







<u>M-PESA RECEIPTS</u><br>
<table width ='100%'>
<!--tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Description of Service</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr-->
<?php
$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and inputby='$ab' ORDER BY date,ref_no,trans_desc" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;
$tot_bill2= 0;
$docno ='';

while ($row=mysql_fetch_array($hasil)) {
 $types = $row['trans_desc'];
 echo"<font size ='2'>";
 if ($types=='M-PESA'){
   $dates =$row['date'].' '.$row['time'];
   echo "<tr>";
   echo "<td>" . $dates . "</td>";
   echo "<td width ='350'>" . $row['type'] . "</td>";




   $_SESSION['ref_no'] =$row['ref_no'];  
   $aa =$row['ref_no'];        
   $aa2 =$row['type'];   
   $aa3=$row['trans_desc'];        
   $aa4=$row['type'];   
   $aa5=$row['description'];   
   $aa6=$row['type'];        
   $aa7=$row['date'];        
   //echo"<td width ='100' align ='right'></td>";





    echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";


    echo "<td>" . $row['description'] . "</td>";
    //echo "<td align ='right'>" . $row['total'] . "</td>";
    echo "<td align ='right'>" . number_format($row['total']) . "</td>";
    $paid = $row['total'];
    $codes2 = $paid; 
    $update2 = $codes2; 
    $tot_bill = $tot_bill +$paid;
    $tot      = $tot +$total;
    $tot_paid = $tot_paid +$paid;

    $update2 = number_format($update2);
    $rate = number_format($paid);
    $tot_bill2 = number_format($tot_bill);
    //echo strtolower("$tot_bill2");
    echo "<td align ='right'>" . $tot_bill2. "</td>";
    echo "</tr>";









      $i++;      
     }
  }
   echo"</table>";
   echo"<hr>";
   echo"<table border='0'>";   
   $tot_bill = number_format($tot_bill);
   $tot_paid = number_format($tot_paid);
   $tot = number_format($tot);
   echo"<tr>";
   echo"<td width ='320' align ='left'>";
   echo"</td>";      
   echo"<td width ='300'>";
   echo"</td>";      
   //echo"<td width ='70'align ='right'><b>$tot_bill";      
   echo"</b></td>";      
   //echo"<td width ='70' align ='right'>$tot_bill2";      
   echo"</td>";      
   echo"<td width ='200' align ='center'>";      
   echo"Total";      
   echo"</td>";          
   echo"<td width ='70' align ='right'><b>$tot_bill2</b></td>";      
   echo"</tr>";   
   echo"</font>";
   echo"</table>";





?>









<u>CHEQUES</u><br>
<table width ='100%'>
<!--tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Description of Service</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr-->
<?php
$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and inputby='$ab' ORDER BY date,ref_no,trans_desc" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill3 = 0;
$tot_paid = 0;
$tot_bill2= 0;
$docno ='';

while ($row=mysql_fetch_array($hasil)) {
 $types = $row['trans_desc'];
 echo"<font size ='2'>";
 if ($types=='CHEQUES'){
   $date =$row['date'].' '.$row['time'];
   echo "<tr>";
   echo "<td>" . $dates . "</td>";
    echo "<td width ='350'>" . $row['type'] . "</td>";
    //echo "<td align ='left' width ='100'>" . $row['ref_no'] . "</td>";

   $_SESSION['ref_no'] =$row['ref_no'];  
   $aa =$row['ref_no'];        
   $aa2 =$row['type'];   
   $aa3=$row['trans_desc'];        
   $aa4=$row['type'];   
   $aa5=$row['description'];   
   $aa6=$row['type'];        
   $aa7=$row['date'];        
   //echo"<td width ='100' align ='right'></td>";





    echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";
    echo "<td>" . $row['description'] . "</td>";
    //echo "<td align ='right'>" . $row['total'] . "</td>";
    echo "<td align ='right'>" . number_format($row['total']) . "</td>";
    $paid = $row['total'];
    $codes2 = $paid; 
    $update2 = $codes2; 
    $tot_bill3 = $tot_bill3 +$paid;
    $tot      = $tot +$total;
    $tot_paid = $tot_paid +$paid;

    $update2 = number_format($update2);
    $rate = number_format($paid);
    $tot_bill2 = number_format($tot_bill3);
    //echo strtolower("$tot_bill2");
    echo "<td align ='right'>" . $tot_bill2. "</td>";
    echo "</tr>";

      $i++;      
     }
  }
   echo"</table>";
   echo"<hr>";
   echo"<table border='0'>";   
   $tot_bill = number_format($tot_bill);
   $tot_paid = number_format($tot_paid);
   $tot = number_format($tot);
   echo"<tr>";
   echo"<td width ='320' align ='left'>";
   echo"</td>";      
   echo"<td width ='300'>";
   echo"</td>";      
   //echo"<td width ='70'align ='right'><b>$tot_bill";      
   echo"</b></td>";      
   //echo"<td width ='70' align ='right'>$tot_bill2";      
   echo"</td>";      
   echo"<td width ='200' align ='center'>";      
   echo"Total";      
   echo"</td>";          
   echo"<td width ='70' align ='right'><b>$tot_bill2</b></td>";      
   echo"</tr>";   
   echo"</font>";
   echo"</table>";
?>



<!--//Get Invoices
//---------- -->
<u>INVOICES</u><br>
<table width ='100%'>
<!--tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Patient</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr-->
<?php
$SQL ="select * FROM hdnotef WHERE date >='$date1' AND date <= '$date2' ORDER BY date,invoice_no" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;
$tot_bill2= 0;
$docno ='';

while ($row=mysql_fetch_array($hasil)) {
 //$types = $row['inputby'];
 echo"<font size ='2'>";
 //if ($types=='M-PESA'){
    echo "<tr>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td width ='350'>" . $row['patients_name'] . "</td>";




   $_SESSION['ref_no'] =$row['invoice_no'];  
   $aa =$row['invoice_no'];        
   $aa2 ='INV';
   //$row['type'];   
   $aa3=$row['username'];        
   $aa4='INV';
   //$row['type'];   
   $aa5=$row['pay_account'];   
   //$aa6=$row['type'];        
   //$aa7=$row['date'];        
   //echo"<td width ='100' align ='right'></td>";





    echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";


    echo "<td>" . $row['pay_account'] . "</td>";
    //echo "<td align ='right'>" . $row['total'] . "</td>";
    echo "<td align ='right'>" . number_format($row['tot_amount']) . "</td>";
    $paid = $row['tot_amount'];
    $codes2 = $paid; 
    $update2 = $codes2; 
    $tot_bill = $tot_bill +$paid;
    $tot      = $tot +$total;
    $tot_paid = $tot_paid +$paid;

    $update2 = number_format($update2);
    $rate = number_format($paid);
    $tot_bill2 = number_format($tot_bill);
    //echo strtolower("$tot_bill2");
    echo "<td align ='right'>" . $tot_bill2. "</td>";
    echo "</tr>";









      $i++;      
     //}
  }
   echo"</table>";
   echo"<hr>";
   echo"<table border='0'>";   
   $tot_bill = number_format($tot_bill);
   $tot_paid = number_format($tot_paid);
   $tot = number_format($tot);
   echo"<tr>";
   echo"<td width ='320' align ='left'>";
   echo"</td>";      
   echo"<td width ='300'>";
   echo"</td>";      
   //echo"<td width ='70'align ='right'><b>$tot_bill";      
   echo"</b></td>";      
   //echo"<td width ='70' align ='right'>$tot_bill2";      
   echo"</td>";      
   echo"<td width ='200' align ='center'>";      
   echo"Total";      
   echo"</td>";          
   echo"<td width ='70' align ='right'><b>$tot_bill2</b></td>";      
   echo"</tr>";   
   echo"</font>";
   echo"</table>";









   echo"<hr>";
   die();
}