<?php
session_start();
 require('open_database.php');
include 'includes/conn.php'; 

?>






<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">




﻿<?php
 $branch     = $_SESSION['company']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');



 if (isset($_GET['print'])){

   $date1  = $_GET['date1'];
   $date2  = $_GET['date2'];

   $date10  = $_GET['date10'];
   $date20  = $_GET['date20'];
   $time10  = $_GET['time10'];
   $time20  = $_GET['time20'];

   
   $time1  = $_GET['time1'];
   $time2  = $_GET['time2'];
   $time1a  = $_GET['time1'];
   $time2a  = $_GET['time2'];

   $date1x  = $date1.$time1;
   $date2x  = $date2.$time2;

   $date10x  = $date10.$time10;
   $date20x  = $date20.$time20;


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
   //echo"<font size ='2'>";
   echo"<table width ='100%'>";      
   echo"<tr><td align ='center'><font size='6'>$company</font></td></tr>";
   echo"<tr><td align ='center'><font size='6'>$address1</font></td></tr>";
   echo"<tr><td align ='center'><font size='6'>$address2</font></td></tr>";
   echo"<tr><td align ='center'><font size='6'>$address3</font></td></tr>";
   echo"</table><br>";

   echo"<h4>CASHIERS SHIFT REPORT <img src='space.jpg' style='width:20px;height:2px;'>"."Day shift from: ".$date1."<img src='space.jpg' style='width:3px;height:2px;'>".$time1."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date2."<img src='space.jpg' style='width:3px;height:2px;'>".$time2;
echo"&nbsp;&nbsp;&nbsp;";
echo"Nigh shift from: ".$date10."<img src='space.jpg' style='width:3px;height:2px;'>".$time10."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date20."<img src='space.jpg' style='width:3px;height:2px;'>".$time20;



//   echo"Dated from: ".$date1."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date2;

   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";





$today = date('y-m-d');
$mdate =date('y-m-d');

//$query  = "select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' ORDER BY date,ref_no" ;
$query ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and location<>'skip' ORDER BY date,ref_no" ;   

$result =mysql_query($query);
$num =mysql_numrows($result);





$tot =0;
$i = 0;
                                                         






?>

<?php
$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and location<>'skip' ORDER BY date,ref_no,trans_desc" ;   

$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;
$start_date = $date1.' '.$time1;
$end_date = $date2.' '.$time2;

$docno ='';

while ($row=mysql_fetch_array($hasil)) {
    $types = $row['trans_desc'];
    $dates = substr($row['date'],0,10);
    $times = substr($row['time'],0,8);
    $my_date = $dates.' '.$times;  
    echo"<font size ='2'>";
    if ($types=='Cash Receipts' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       
       $dates = $dates.' '.$times;
       
      $_SESSION['ref_no'] =$row['ref_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['type'];   
      $aa3=$row['trans_desc'];        
      $aa4=$row['type'];   
      $aa5=$row['description'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];        
       $paid = $row['total'];
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill = $tot_bill +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;

       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill);
       //echo "<td align ='right'>" . $tot_bill2. "</td>";
       //echo "</tr>";

         $i++;      
        }
     }
      //echo"</table>";
      //echo"<hr>";
      echo"<table border='0'>";   
      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);
?>







<?php



$SQL ="select * FROM hdnotef WHERE CONCAT(date,time) >='$date1x' AND CONCAT(date,time) <= '$date2x' ORDER BY date,invoice_no" ;   
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

      $_SESSION['ref_no'] =$row['invoice_no'];  
      $aa =$row['invoice_no'];        
      $aa2 ='INV';
      $aa3=$row['username'];        
      $aa4='INV';
      $aa5=$row['pay_account'];   
      $amounts=$row['tot_amount']; 

      $aak =substr($aa,0,1);
      $amounts = $row['tot_amount'];
      if ($aak =='K'){
      
      $SQL2 ="select invoice_no,sum(amount*qty) FROM htransf WHERE invoice_no='$aa'" ;   
      $hasil2=mysql_query($SQL2, $connect);
      while ($row=mysql_fetch_array($hasil2)) {
            $amounts = $row['sum(amount*qty)'];
      }
      }
              
       $paid = $amounts;
       if ($paid<=0){
           $paid = $paid*-1;
       }
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill = $tot_bill +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;
       $amountsx = $amountsx+$amounts;
       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill);
       

         $i++;      
       }
      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);
      
//Correct pending bills
//---------------------
$query = "SELECT date,ref_no FROM receiptf WHERE date >='$date1' AND date <= '$date2' GROUP BY ref_no"; 	 
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
$refs_no =$row['ref_no']; 
}







    $latss = 0;
    $xcv = 0;
    $latex = 0;
    $latess = 0;
    $latiss = 0;
    $latessx =0;
    
    
    $SQL ="SELECT * FROM pay_datacash WHERE  date >='$date1' AND date <= '$date2'" ;   

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
    $dates = substr($row['date'],0,10);
    $times = substr($row['time'],0,8);
    $my_date = $dates.' '.$times;  
    echo"<font size ='2'>";
    if ($types=='Cash Receipts' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq =$row['total'];
       $latss =$latss+$qq;
       
    }

        if ($types=='M-PESA' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2 =$row['total'];
       $xcv =$xcv+$qq2;
       
    }

        if ($types=='EFT' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2a =$row['total'];
       $latex =$latex+$qq2a;
       
    }
        if ($types=='CHEQUES' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2s =$row['total'];
       $latess =$latess+$qq2s;
       
    }
        if ($types=='BANK TRANSFER' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2sx =$row['total'];
       $latessx =$latessx+$qq2sx;
       
    }
}   
    


 $query3 = "TRUNCATE TABLE collection_summary";
 $result3 =mysql_query($query3);
 
echo " <table width ='100%'>";


//Get undeposited amount from gl
//------------------------------
   $query3 = "select * FROM gltransf where account_name='CASH COLLECTION A/C' AND date < '$date1'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $balance   = mysql_result($result3,$i3,"amount");
     $at_hand   = $at_hand+$balance;
     $i3++;
     }

//echo'To bank'.$at_hand;
//echo"-------------------------------------------------";
$query4= "INSERT INTO collection_summary VALUES
('','CASH AT HAND','$at_hand','','$at_hand','OPEN','1')";
$result4 =mysql_query($query4);


//echo "<tr><td width ='25%'></td><td width ='25%'><b>CASH SALES
//</b></td><td width ='25%'>Ksh $latss</td><td width ='25%'>
//</td></tr>";

$query4= "INSERT INTO collection_summary VALUES
('','CASH SALES','$latss','0','0','CASH','2')";
$result4 =mysql_query($query4);



//echo "<tr><td width ='25%'></td><td width ='25%'><b>M-PESA 
//SALES</b></td><td width ='25%'>Ksh $xcv</td><td width ='25%'>
//</td></tr>";

$query4= "INSERT INTO collection_summary VALUES
('','M-PESA SALES','$xcv','0','0','MPES','3')";
$result4 =mysql_query($query4);


//echo "<tr><td width ='25%'></td><td width ='25%'><b>EFT SALES
//</b></td><td width ='25%'>Ksh $latex</td><td width ='25%'>
//</td></tr>";

$query4= "INSERT INTO collection_summary VALUES
('','DEBIT/CREDIT CARDS','$latex','0','0','CARD','4')";
$result4 =mysql_query($query4);


//echo "<tr><td width ='25%'></td><td width ='25%'><b>CHEQUES 
//SALES</b></td><td width ='25%'>Ksh $latess</td><td width 
//='25%'></td></tr>";

$query4= "INSERT INTO collection_summary VALUES
('','CHEQUES SALES','$latess','0','0','CHEQ','5')";
$result4 =mysql_query($query4);



//echo "<tr><td width ='25%'></td><td width ='25%'><b>BANK //TRANSFER</b></td><td width ='25%'>Ksh $latessx</td><td width //='25%'></td></tr>";



//echo "<tr><td width ='25%'></td><td width ='25%'><b>CREDIT 
//SALES</b></td><td width ='25%'>Ksh $amountsx</td><td width 
//='25%'></td></tr>";


$query4= "INSERT INTO collection_summary VALUES
('','CREDIT SALES','$amountsx','0','0','CRED','6')";
$result4 =mysql_query($query4);


//-------------------------------
//Now Tabulate insurance accounts
//-------------------------------


$SQL ="select pay_account,date,time,sum(tot_amount) FROM hdnotef WHERE CONCAT(date,time) >='$date1x' AND CONCAT(date,time) <= '$date2x' GROUP BY pay_account" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
while ($row=mysql_fetch_array($hasil)) {
      $account=$row['pay_account'];   
      $amounts=$row['sum(tot_amount)']; 

$query4= "INSERT INTO collection_summary VALUES
('','$account','$amounts','','$amounts','CRED1','7')";
$result4 =mysql_query($query4);

}
//End of insurance tabulation
//---------------------------

$zaapo =$latss+$xcv+$latex+$latess+$latessx+$amountsx;

//echo "<tr><td width ='25%'></td><td width ='25%'><b>TOTAL 
//SALES</b></td><td width ='25%'>Ksh $zaapo</td><td width 
//='25%'></td></tr>";



$query4= "INSERT INTO collection_summary VALUES
('','TOTAL SALES','$zaapo','0','0','TOTA','8')";
$result4 =mysql_query($query4);


//Look for the number of clients in day shift
//-------------------------------------------
   $query = "SELECT adm_no,date,company FROM htransf WHERE CONCAT(date, company) >= '$date1x' and CONCAT(date, company) <='$date2x' GROUP BY adm_no"; 
      
   $result = mysql_query($query) or die(mysql_error());
   $tot_cred =0;
   $noss = 12;
   while($row = mysql_fetch_array($result)){
        $xx = $row['adm_no'];
        //echo".".$xx."<br>";
        $clients++;
   }


$query4= "INSERT INTO collection_summary VALUES
('','CLIENTS','$clients','','0','CLIE','9')";
$result4 =mysql_query($query4);

$query4= "INSERT INTO collection_summary VALUES
('','BANKING','0','','0','BANK','10')";
$result4 =mysql_query($query4);

//Bankings of the day
//-------------------
$SQL ="select * FROM gltransf WHERE date >='$date1' AND date <= '$date2' and narration='BANKING TO'" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;
$start_date = $date1.' '.$time1;
$end_date = $date2.' '.$time2;

$docno ='';
while ($row=mysql_fetch_array($hasil)) {
    $name = $row['account_name'];
    $narration = $row['narration'];
    $dates = $row['date'];
       
       $paid = $row['amount'];
       $tot_paid = $tot_paid +$paid;

//Now put expenses
//----------------
$query4= "INSERT INTO collection_summary VALUES
('','$name','$paid','','','BANK','11')";
$result4 =mysql_query($query4);

         $i++;      
     }
      


//Now go to collection by department
//----------------------------------



   //$query13 = "DROP TABLE summary IF EXISTS summary";
   $query13 = "DROP TABLE summary";
   $result13 =mysql_query($query13);
   
   //$query3 = "DROP TABLE summary2 IF EXISTS summary2";
   $query3 = "DROP TABLE summary2";
   $result3 =mysql_query($query3);
   
   $query3 = "CREATE TABLE summary SELECT location, inputby from receiptf where date >= '$date1' and date <='$date2'";
   $result3 = mysql_query($query3);
   
   //echo $date1x;
   //echo $date2x;
   
   //Get all receipts from receiptf and add invoices from htransf
   //------------------------------------------------------------
   $query32 = "CREATE TABLE summary2 SELECT location, inputby,total,date,time from receiptf where date >= '$date1' and date <='$date2'";
   
   //where date >= '$date1' and date <='$date2'";
   $result32 = mysql_query($query32);
   

//$query3 = "DELETE FROM summary2 WHERE total > 0";
 //  $result3 =mysql_query($query3);
  
   
//Now get info from htransf
//-------------------------
$sql3s="SELECT * FROM htransf where type ='DB' and invoice_no<>' ' and date >= '$date1' and date <='$date2'";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;

while ($i3s < $num3s)
      {
      $a0        = mysql_result($result3s,$i3s,"id"); 
      $a1        = mysql_result($result3s,$i3s,"trans2"); 
      $a2        = mysql_result($result3s,$i3s,"date");        
      $a3        = mysql_result($result3s,$i3s,"amount");        
      $a4        = mysql_result($result3s,$i3s,"username");  
      $a5        = mysql_result($result3s,$i3s,"company");  
   
   
$query5= "INSERT INTO summary2 (location, date, total, inputby, time) VALUES('$a1','$a2','$a3','$a4','$a5')";

   $result5 =mysql_query($query5); 
   
       $i3s++;
       //echo "No:".$i3++;
}
   
   //die();
   
   
   $date1z=$date1;
   $date2z=$date2;

   $tot_credx =0;   
   
//echo"<h4>From Date:&nbsp&nbsp$date1z&nbsp&nbspTo 
//Date&nbsp&nbsp$date2z</h4>";
//   echo"<table width ='100%' border ='1'><tr><th width ='80%' 
//bgcolor ='black' align ='left'><font color ='white'>Narration
//</th><th width ='20%' bgcolor ='black' align='center'><font 
//color ='white'>
//&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAmount
//</th></tr>";   
   
$sql3s="SELECT location, inputby FROM summary GROUP BY location";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;

while ($i3s < $num3s)
      {
      $department     = mysql_result($result3s,$i3s,"location"); 
      $usernamex        = mysql_result($result3s,   $i3s,"inputby");        
       
   //echo"<tr><th width ='20' align ='left'><font color ='blue'>
//<b>xxxx$usernamex</th><th width ='50'></th></tr>";   
   
   //$query = "SELECT location, inputby, sum(total) FROM receiptf WHERE date >= '$date1' and date <='$date2' and inputby ='$usernamex' GROUP BY location"//; 
   
   
   
   $query = "SELECT location, inputby,date,time, sum(total) FROM summary2 WHERE CONCAT(date, time) >= '$date1x' and CONCAT(date, time) <='$date2x' GROUP BY location"; 
   //and inputby ='$usernamex' 
   
   $result = mysql_query($query) or die(mysql_error());
   $tot_cred =0;
   // Print out result
   //-----------------
   $noss = 12;
   while($row = mysql_fetch_array($result)){
//	echo "<tr><td width ='300'>";
    //    echo $row['location'];
        $desc = $row['location'];
        $amount = $row['sum(total)'];
  //      echo"</td><td width = '10' align ='right'>"; 
  //         echo number_format($row['sum(total)']);
  //      echo"</td>"; 
  //      echo"</tr>";
        $tot_cred = $tot_cred+$amount;
        $tot_credx =$tot_credx+$amount;
        $categ =substr($desc,0,4);

        $query4= "INSERT INTO collection_summary VALUES
('','$desc','$amount','','0','$categ','$noss')";
$result4 =mysql_query($query4);
    
   }


$noss++;
   $tot_cred = $tot_cred;
   $yes_income = $tot_cred;
   $income =number_format($tot_cred);
 //echo"<tr><td></td><td align ='right'><font color ='black'>
//TOTAL SALES&nbsp&nbsp&nbsp$income</td></tr></font>";
   //echo 'Count'.$i3s;


        $query4= "INSERT INTO collection_summary VALUES
('','TOTAL SALES','$tot_cred','0','0','TOT2','$noss')";
$result4 =mysql_query($query4);
$noss++;
   $i3s = $i3s+1000;
   $i3s++;
}

//$noss =$noss+1;


//Now put expenses
//----------------
$query4= "INSERT INTO collection_summary VALUES
('','EXPENSES','0','','0','EXPE','$noss')";
$result4 =mysql_query($query4);

echo "</table>";









//---------------------------------------
//Now get information for Night shift
//---------------------------------------
//$query  = "select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' ORDER BY date,ref_no" ;
$query ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and location<>'skip' ORDER BY date,ref_no" ;   

$result =mysql_query($query);
$num =mysql_numrows($result);





$tot =0;
$i = 0;
                                                         





$noss++;
?>

<?php
$SQL ="select * FROM receiptf WHERE date >='$date10' AND date <= '$date20' and location<>'skip' ORDER BY date,ref_no,trans_desc" ;   

$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;
$start_date = $date10.' '.$time10;
$end_date = $date20.' '.$time20;

$docno ='';

while ($row=mysql_fetch_array($hasil)) {
    $types = $row['trans_desc'];
    $dates = substr($row['date'],0,10);
    $times = substr($row['time'],0,8);
    $my_date = $dates.' '.$times;  
    echo"<font size ='2'>";
    if ($types=='Cash Receipts' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       
       $dates = $dates.' '.$times;
       
      $_SESSION['ref_no'] =$row['ref_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['type'];   
      $aa3=$row['trans_desc'];        
      $aa4=$row['type'];   
      $aa5=$row['description'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];        
       $paid = $row['total'];
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill = $tot_bill +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;

       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill);
       //echo "<td align ='right'>" . $tot_bill2. "</td>";
       //echo "</tr>";

         $i++;      
        }
     }
      //echo"</table>";
      //echo"<hr>";
      //echo"<table border='0'>";   

      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);
?>







<?php
    $amountsx=0;



$SQL ="select * FROM hdnotef WHERE CONCAT(date,time) >='$date10x' AND CONCAT(date,time) <= '$date20x' ORDER BY date,invoice_no" ;   
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

      $_SESSION['ref_no'] =$row['invoice_no'];  
      $aa =$row['invoice_no'];        
      $aa2 ='INV';
      $aa3=$row['username'];        
      $aa4='INV';
      $aa5=$row['pay_account'];   
      $amounts=$row['tot_amount']; 

      $aak =substr($aa,0,1);
      $amounts = $row['tot_amount'];
      if ($aak =='K'){
      
      $SQL2 ="select invoice_no,sum(amount*qty) FROM htransf WHERE invoice_no='$aa'" ;   
      $hasil2=mysql_query($SQL2, $connect);
      while ($row=mysql_fetch_array($hasil2)) {
            $amounts = $row['sum(amount*qty)'];
      }
      }
              
       $paid = $amounts;
       if ($paid<=0){
           $paid = $paid*-1;
       }
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill = $tot_bill +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;
       $amountsx = $amountsx+$amounts;
       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill);
       

         $i++;      
       }
      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);
      
//Correct pending bills
//---------------------
$query = "SELECT date,ref_no FROM receiptf WHERE date >='$date10' AND date <= '$date20' GROUP BY ref_no"; 	 
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
$refs_no =$row['ref_no']; 
}







    $latss = 0;
    $xcv = 0;
    $latex = 0;
    $latess = 0;
    $latiss = 0;
    $latessx =0;
//echo 'Credit sales.............'.$amountsx;

    $SQL ="SELECT * FROM pay_datacash WHERE  date >='$date10' AND date <= '$date20'" ;   

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
    $dates = substr($row['date'],0,10);
    $times = substr($row['time'],0,8);
    $my_date = $dates.' '.$times;  
    echo"<font size ='2'>";
    if ($types=='Cash Receipts' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq =$row['total'];
       $latss =$latss+$qq;
       
    }

        if ($types=='M-PESA' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2 =$row['total'];
       $xcv =$xcv+$qq2;
       
    }

        if ($types=='EFT' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2a =$row['total'];
       $latex =$latex+$qq2a;
       
    }
        if ($types=='CHEQUES' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2s =$row['total'];
       $latess =$latess+$qq2s;
       
    }
        if ($types=='BANK TRANSFER' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2sx =$row['total'];
       $latessx =$latessx+$qq2sx;
       
    }
}   
    


// $query3 = "TRUNCATE TABLE collection_summary";
// $result3 =mysql_query($query3);
 
echo " <table width ='100%'>";

//$query4  = "UPDATE collection_summary SET night ='0' WHERE //identity='OPEN'";
//$result4 = mysql_query($query4);


//echo "<tr><td width ='25%'></td><td width ='25%'><b>CASH SALES
//</b></td><td width ='25%'>Ksh $latss</td><td width ='25%'>
//</td></tr>";

$query4  = "UPDATE collection_summary SET night ='$latss' WHERE identity='CASH'";
$result4 = mysql_query($query4);




//echo "<tr><td width ='25%'></td><td width ='25%'><b>M-PESA 
//SALES</b></td><td width ='25%'>Ksh $xcv</td><td width ='25%'>
//</td></tr>";

$query4  = "UPDATE collection_summary SET night ='$xcv' WHERE identity='MPES'";
$result4 = mysql_query($query4);


//echo "<tr><td width ='25%'></td><td width ='25%'><b>EFT SALES
//</b></td><td width ='25%'>Ksh $latex</td><td width ='25%'>
//</td></tr>";

$query4  = "UPDATE collection_summary SET night ='$latex' WHERE identity='CARD'";
$result4 = mysql_query($query4);


//echo "<tr><td width ='25%'></td><td width ='25%'><b>CHEQUES 
//SALES</b></td><td width ='25%'>Ksh $latess</td><td width 
//='25%'></td></tr>";

$query4  = "UPDATE collection_summary SET night ='$latess' WHERE identity='CHEQ'";
$result4 = mysql_query($query4);


//echo "<tr><td width ='25%'></td><td width ='25%'><b>BANK 
//TRANSFER</b></td><td width ='25%'>Ksh $latessx</td><td width 
//='25%'></td></tr>";


//echo "<tr><td width ='25%'></td><td width ='25%'><b>CREDIT 
//SALES</b></td><td width ='25%'>Ksh $amountsx</td><td width 
//='25%'></td></tr>";

$query4  = "UPDATE collection_summary SET night ='$amountsx' WHERE identity='CRED'";
$result4 = mysql_query($query4);



//Now Tabulate insurance accounts
//-------------------------------


$SQL ="select pay_account,date,time,sum(tot_amount) FROM hdnotef WHERE CONCAT(date,time) >='$date10x' AND CONCAT(date,time) <= '$date20x' GROUP BY pay_account" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
while ($row=mysql_fetch_array($hasil)) {
      $accounty=$row['pay_account'];   
      $amounts=$row['sum(tot_amount)']; 


$fhuy =' ';
$sql3s="SELECT * FROM collection_summary where description='$accounty'";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;
while ($i3s < $num3s)
      {
      $fhuy   = mysql_result($result3s,$i3s,"description"); 
 $i3s++;
}


if ($fhuy <>' '){
$query41  = "UPDATE collection_summary SET night ='$amounts' WHERE description='$fhuy'";
$result41 = mysql_query($query41);

//if ($result41){
//echo'Account'.$accounty;

}else{
$query41= "INSERT INTO collection_summary VALUES
('','$accounty','','$amounts','$amounts','CRED1','7')";
$result41 =mysql_query($query41);
}

}
//End of insurance tabulation
//---------------------------



$zaapo =$latss+$xcv+$latex+$latess+$latessx+$amountsx;

//echo "<tr><td width ='25%'></td><td width ='25%'><b>TOTAL 
//SALES</b></td><td width ='25%'>Ksh $zaapo</td><td width 
//='25%'></td></tr>";

$query4  = "UPDATE collection_summary SET night ='$zaapo' WHERE identity='TOTA'";
$result4 = mysql_query($query4);




//Look for the number of clients in day shift
//-------------------------------------------
   $query = "SELECT adm_no,date,company FROM htransf WHERE CONCAT(date, company) >= '$date10x' and CONCAT(date, company) <='$date20x' GROUP BY adm_no"; 
      
   $result = mysql_query($query) or die(mysql_error());
   $tot_cred =0;
   $noss = 12;
   while($row = mysql_fetch_array($result)){
        $xx = $row['adm_no'];
        //echo".".$xx."<br>";
        $clientsx++;
   }

$query4  = "UPDATE collection_summary SET night ='$clientsx' WHERE identity='CLIE'";
$result4 = mysql_query($query4);



//$query4= "INSERT INTO collection_summary VALUES
//('','BANKING','0','','0','BANK')";
//$result4 =mysql_query($query4);


//Now go to collection by department
//----------------------------------



   //$query13 = "DROP TABLE summary IF EXISTS summary";
   $query13 = "DROP TABLE summary";
   $result13 =mysql_query($query13);
   
   //$query3 = "DROP TABLE summary2 IF EXISTS summary2";
   $query3 = "DROP TABLE summary2";
   $result3 =mysql_query($query3);
   
   $query3 = "CREATE TABLE summary SELECT location, inputby from receiptf where date >= '$date10' and date <='$date20'";
   $result3 = mysql_query($query3);
   
   //echo $date10x;
   //echo $date20x;
   
   //Get all receipts from receiptf and add invoices from htransf
   //------------------------------------------------------------
   $query32 = "CREATE TABLE summary2 SELECT location, inputby,total,date,time from receiptf where date >= '$date10' and date <='$date20'";
   
$result32 = mysql_query($query32);
   
//Now get info from htransf
//-------------------------
$sql3s="SELECT * FROM htransf where type ='DB' and invoice_no<>' ' and date >= '$date10' and date <='$date20'";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;

while ($i3s < $num3s)
      {
      $a0        = mysql_result($result3s,$i3s,"id"); 
      $a1        = mysql_result($result3s,$i3s,"trans2"); 
      $a2        = mysql_result($result3s,$i3s,"date");        
      $a3        = mysql_result($result3s,$i3s,"amount");        
      $a4        = mysql_result($result3s,$i3s,"username");  
      $a5        = mysql_result($result3s,$i3s,"company");  
   
   
$query5= "INSERT INTO summary2 (location, date, total, inputby, time) VALUES('$a1','$a2','$a3','$a4','$a5')";

   $result5 =mysql_query($query5); 
   
       $i3s++;
       //echo "No:".$i3++;
}
   
   //die();
   
   
   $date1z=$date10;
   $date2z=$date20;

   $tot_credx =0;   
   
$sql3s="SELECT location, inputby FROM summary GROUP BY location";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;

while ($i3s < $num3s)
      {
      $department     = mysql_result($result3s,$i3s,"location"); 
      $usernamex        = mysql_result($result3s,   $i3s,"inputby");        
       
   //echo"<tr><th width ='20' align ='left'><font color ='blue'><b>xxxx$usernamex</th><th width ='50'></th></tr>";   
   
   //$query = "SELECT location, inputby, sum(total) FROM receiptf WHERE date >= '$date1' and date <='$date2' and inputby ='$usernamex' GROUP BY location"//; 
   
   
   
   $query = "SELECT location, inputby,date,time, sum(total) FROM summary2 WHERE CONCAT(date, time) >= '$date10x' and CONCAT(date, time) <='$date20x' GROUP BY location"; 
   
   
   
   
   
   
   $result = mysql_query($query) or die(mysql_error());
   $tot_cred =0;
   // Print out result
   //-----------------
   while($row = mysql_fetch_array($result)){
//	echo "<tr><td width ='300'>";
   //     echo $row['location'];
        $desc = $row['location'];
        $amount = $row['sum(total)'];
  //      echo"</td><td width = '10' align ='right'>"; 
  //         echo number_format($row['sum(total)']);
  //      echo"</td>"; 
  //      echo"</tr>";
        $tot_cred = $tot_cred+$amount;
        $tot_credx =$tot_credx+$amount;
        $categ =substr($desc,0,4);


$query4  = "UPDATE collection_summary SET night ='$amount' WHERE identity='$categ'";
$result4 = mysql_query($query4);

if ($query4) {
  //echo "Record updated successfully";
} else {
  $query4= "INSERT INTO collection_summary VALUES
('','$desc','0','','$amount','$categ')";
$result4 =mysql_query($query4);
}


   }
   $tot_cred = $tot_cred;
   $yes_income = $tot_cred;
   $income =number_format($tot_cred);
 //echo"<tr><td></td><td align ='right'><font color ='black'>
//TOTAL SALES&nbsp&nbsp&nbsp$income</td></tr></font>";
   //echo 'Count'.$i3s;


$query4  = "UPDATE collection_summary SET night ='$tot_cred' WHERE identity='TOT2'";
$result4 = mysql_query($query4);

   $i3s = $i3s+1000;
   $i3s++;
}


//---------------------
//Put Day time Expenses
//---------------------
$SQL ="select * FROM gltransf WHERE date >='$date1' AND date <= '$date2' and branch='EXPENSE' and account_name<>'COST OF GOODS SOLD' and account_name<>'CASH COLLECTION A/C'" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;
$start_date = $date1.' '.$time1;
$end_date = $date2.' '.$time2;
$noss = $noss+4;
$docno ='';
while ($row=mysql_fetch_array($hasil)) {
    $name = $row['account_name'];
    $narration = $row['narration'];
    $dates = $row['date'];
       
       $paid = $row['amount'];
       $tot_paid = $tot_paid +$paid;
$name2 =$name.'-'.$narration;


//Now put expenses
//----------------
$query4= "INSERT INTO collection_summary VALUES
('','$name2','$paid','','','EXPE','$noss')";
$result4 =mysql_query($query4);
$noss++;
         $i++;      
     }
      

//-----------------------
//Put Night time Expenses
//-----------------------
//$SQL ="select * FROM gltransf WHERE date >='$date10' AND date //<= '$date20' and branch='EXPENSE' and account_name<>'COST OF //GOODS SOLD' and account_name<>'CASH COLLECTION A/C'" ;   
//$hasil=mysql_query($SQL, $connect);
//$id = 0;
//$nRecord = 1;
//$No = $nRecord;
//$debit  = 0;
//$credit = 0;
//$tot_bill = 0;
//$tot_paid = 0;
//$start_date = $date10.' '.$time10;
//$end_date = $date20.' '.$time20;

//$docno ='';
//while ($row=mysql_fetch_array($hasil)) {
//    $name = $row['account_name'];
//    $narration = $row['narration'];
//    $dates = $row['date'];
//$name2 =$name.'-'.$narration;
       
//       $paid = $row['amount'];
//       $tot_paid = $tot_paid +$paid;

//Now put expenses
//----------------
//$query4= "INSERT INTO collection_summary VALUES
//('','$name2','0','$paid','0','EXPE','$noss')";
//$result4 =mysql_query($query4);

//         $i++;      
//     }
      



echo "</table>";

//End of Night
//------------
//Now do Maths of addition
//------------------------

$sql3s="SELECT * FROM collection_summary";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;
while ($i3s < $num3s)
      {
      $id   = mysql_result($result3s,$i3s,"id"); 
      $day   = mysql_result($result3s,$i3s,"day"); 
      $night = mysql_result($result3s,$i3s,"night");        
      $tots =$day+$night;
$query4  = "UPDATE collection_summary SET total ='$tots' WHERE id='$id'";
$result4 = mysql_query($query4);
$i3s++;
}

//Now go and print the report based on the table entries
//------------------------------------------------------
   $query = "SELECT * FROM collection_summary order by line";       
   $result = mysql_query($query) or die(mysql_error());
   $tot_cred =0;
   // Print out result
   //-----------------
$liquid = 0;
echo"<table width ='100%' border='0' bgcolor='black'>";
echo"<tr bgcolor='black'><td><font color='white'><b>DESCRIPTION</td><td align ='right'><font color='white'><b>DAY SHIFT</td align ='right'><td align ='right'><font color='white'><b>NIGHT SHIFT</td><td align ='right'><font color='white'><b>TOTAL</font></td></tr>";
   while($row = mysql_fetch_array($result)){
        $desc = $row['description'];
        $amount1 = $row['day'];
        $amount2 = $row['night'];
        $amount3 = $row['total'];
        $line = $row['line'];
        $identity = $row['identity'];
        if ($identity=='OPEN' || $identity=='CASH'){
           $liquid =$liquid+$amount3;
        }
        if ($identity=='BANK' || $identity=='EXPE'){
           $liquid =$liquid-$amount3;
        }

	   echo"<tr bgcolor='white'>";
        //echo"<td width ='10%'>";
        //echo $row['line'];
        //echo"</td>";
        if ($line == '7' || $line == '12' || $line == '16'){
           echo"<td width ='30%' align='right'>";
        }else{
           if ($identity == 'TOTA' or $identity == 'TOT2'){
               echo"<td width ='30%' bgcolor='black'><b><font    
               color ='white'>";
           }else{
               echo"<td width ='30%' bgcolor='white'><b><font    
               color ='black'>";
           }
        }
        

        echo $row['description'];
        echo"</b></td>";
        if ($identity == 'TOTA' or $identity == 'TOT2'){
               echo"<td width ='10%' bgcolor='black' align ='right'><b><font    
               color ='white'>";
           }else{
               echo"<td width ='10%' bgcolor='white' align ='right'><b><font    
               color ='black'>";
           }

        //echo"<td width = '10%' align ='right'>"; 
           echo number_format($row['day']);
        echo"</td>";

if ($identity == 'TOTA' or $identity == 'TOT2'){
               echo"<td width ='10%' bgcolor='black' align ='right'><b><font    
               color ='white'>";
           }else{
               echo"<td width ='10%' bgcolor='white' align ='right'><b><font    
               color ='black'>";
           }
 
        //echo"<td width = '10%' align ='right'>"; 
           echo number_format($row['night']);
        echo"</td>"; 

if ($identity == 'TOTA' or $identity == 'TOT2'){
               echo"<td width ='10%' bgcolor='black' align ='right'><b><font    
               color ='white'>";
           }else{
               echo"<td width ='10%' bgcolor='white' align ='right'><b><font    
               color ='black'>";
           }
        //echo"<td width = '10%' align ='right'>"; 
           echo number_format($row['total']);
if ($line == 600){
   echo"<br><br>";
}
           echo"</td>";
        echo"</tr>";
   }










	   echo"<tr bgcolor='black'>";
               echo"<td width ='30%'><b><font    
               color ='white'>";       
        echo "CLOSING BALANCE";
        echo"</b></td>";
        echo"<td width ='10%'><b><font color ='black'>";
        echo"</td>";
echo"<td width ='10%'><b><font color ='white'>";
 
//           echo number_format($liquid);
        echo"</td>"; 

               echo"<td width ='10%' align='right'><b><font    
               color ='white' >";
           echo number_format($liquid);
           echo"</td>";
        echo"</tr></table>";
echo"<br><br>";
echo"<br><br>";





      die();
}else{
}
?>








<!DOCTYPE html>
<html>
<title>HMIS Global</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"-->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<div class="w3-container w3-teal">
  <h1>Cash Collection Report | <font color ='red'></font></h1>
</div>
<!--img src="img_car.jpg" alt="Car" style="width:100%"-->
<div class="w3-container">
<p align ='right'><img src='chiromo-logo33.jpg' alt='statement' height='40' width='350'></p>

<style type="text/css">
html, 
body {
height: 100%;
}

body {
background-image: url(images/backgrounds.jpg);
background-repeat: no-repeat;
background-size: cover;
}
</style>







<?php
  echo"<br>";
  echo"<form action ='repo_endofday_report_summary.php' method ='GET'>";

  echo"<table><tr><td><font color='white'><h4>Day Shift</font></h4></td><td></td></tr>";
echo"<tr><td width ='50'><font color='white'>From Date:</td><td><input type='date' name='date1' value ='$date1' size='12' ></td>";
  echo"<td width='50'>";

echo"<input type='time' name='time1' size='12' ></td></tr>";
  
  echo"<tr><td width='50'><font color='white'>To Date:</td><td><input type='date' name='date2' value ='$date2' size='12'></td>";
  
  echo"<td width='50'>";

echo"<input type='time' name='time2' size='12' ></td></tr>";


  echo"<tr><td><h2>-</h2></td><td></td><td></td></tr>";

echo"<tr><td><font color='white'><h4>Night Shift</font></h4></td><td></td></tr>";
echo"<tr><td width ='50'><font color='white'>From Date:</td><td><input type='date' name='date10' value ='$date1' size='12' ></td>";
  echo"<td width='50'>";

echo"<input type='time' name='time10' size='12' ></td></tr>";
  
  echo"<tr><td width='50'><font color='white'>To Date:</td><td><input type='date' name='date20' value ='$date2' size='12'></td>";
  
  echo"<td width='50'>";

echo"<input type='time' name='time20' size='12' ></td></tr>";

  
  echo"<tr><td width='50'><input type='submit' name='print'  class='button' value='Print Report'></td><td></td></tr>";
echo"</FORM>";


$today = date('y/m/d');
//$today = $date-1;

?>
<table width ='20' border='0' height='220'></table>

</div>
<div class="w3-container w3-teal">
  <p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p>
</div>
</body>
</head>
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</html>

