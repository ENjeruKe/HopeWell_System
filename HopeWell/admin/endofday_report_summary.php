<?php
session_start();
 require('open_database.php');
include 'includes/conn.php'; 
$tim= $timew = date("H:i:s");
//echo'Time'.$tim;
?>






<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">




<?php
 $branch     = $_SESSION['company']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');



 if (isset($_GET['print'])){

//Asign sessions for the monthly 
//-------------------------------
$_SESSION['dt1'] = $_GET['date1'];
$_SESSION['dt2'] = $_GET['date2'];
$_SESSION['tm1'] = $_GET['time1'];
$_SESSION['tm2'] = $_GET['time2'];


$_SESSION['dt10'] = $_GET['date10'];
$_SESSION['dt20'] = $_GET['date20'];
$_SESSION['tm10'] = $_GET['time10'];
$_SESSION['tm20'] = $_GET['time20'];
//------------------------------------
//Now go and call the monthly php file
//------------------------------------
include 'endofday_reportx.php'; 
//-------------------------------------


   $date1  = $_GET['date1'];
   $date2  = $_GET['date2'];

   $date10  = $_GET['date10'];
   $date20  = $_GET['date20'];
   $time10  = $_GET['time10'];
   $time20  = $_GET['time20'];
   $carry  = $_GET['cfb'];

   
   $time1  = $_GET['time1'];
   $time2  = $_GET['time2'];
   $time1a  = $_GET['time1'];
   $time2a  = $_GET['time2'];

   $date1x  = $date1.$time1;
   $date2x  = $date2.$time2;

   $date10x  = $date10.$time10;
   $date20x  = $date20.$time20;

   $date1xu  = $date1.' '.$time1.':00';
   $date2xu = $date2.' '.$time2.':00';

   $date10xu  = $date10.' '.$time10.':00';
   $date20xu  = $date20.' '.$time20.':00';


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

   echo"<b>CASHIERS SHIFT REPORT <img src='space.jpg' style='width:20px;height:2px;'>"."Day shift from: ".$date1."<img src='space.jpg' style='width:3px;height:2px;'>".$time1."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date2."<img src='space.jpg' style='width:3px;height:2px;'>".$time2;
echo"&nbsp;&nbsp;&nbsp;";
echo"Night shift from: ".$date10."<img src='space.jpg' style='width:3px;height:2px;'>".$time10."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date20."<img src='space.jpg' style='width:3px;height:2px;'>".$time20;



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

//echo"Dates".$date1x. $date2x;



//**Tabulate credit sales
//-----------------------
$amountsx =0;
$SQL ="select pay_account,date,time,sum(tot_amount) FROM hdnotef WHERE CONCAT(date,time) >='$date1x' AND CONCAT(date,time) <= '$date2x' GROUP BY pay_account" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
while ($row=mysql_fetch_array($hasil)) {
      $account=$row['pay_account'];   
      $amounts=$row['sum(tot_amount)']; 

       $amountsx = $amountsx+$amounts;

//$query4= "INSERT INTO collection_summary VALUES
//('','$account','$amounts','','$amounts','CRED1','8','')";
//$result4 =mysql_query($query4);

}
//End of insurance tabulation
//---------------------------


$date1xx =date('y-m-d');
//$SQL ="select * FROM hdnotef WHERE CONCAT(date,time) >='$date1x' AND CONCAT(date,time) <= '$date2x' ORDER BY date,invoice_no" ;   
$SQL ="select * FROM hdnotef WHERE CONCAT(date,time) ='$date1xx' AND CONCAT(date,time) <= '$date2x' ORDER BY date,invoice_no" ;   
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
      echo'Amount'.$aa5.$amounts."<br>";
      $aak =substr($aa,0,1);
      $amounts = $row['tot_amount'];
      //if ($aak =='K'){
      
      //$SQL2 ="select invoice_no,sum(amount*qty) FROM htransf WHERE invoice_no='$aa'" ;   
      //$hasil2=mysql_query($SQL2, $connect);
      //while ($row=mysql_fetch_array($hasil2)) {
      //      $amounts = $row['sum(amount*qty)'];
      //}
      //}
              
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
   $query3 = "select * FROM gltransf where account_name='CASH COLLECTION A/C' AND date <= '$date1'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $balance   = mysql_result($result3,$i3,"amount");
     $at_hand   = $at_hand+$balance;
     $i3++;
     }



   $query = "SELECT amount FROM gl_bf where date ='$date1'";       
   $result = mysql_query($query) or die(mysql_error());
   while($row = mysql_fetch_array($result)){
        //$xx = $row['total'];
        $at_hand = $row['amount'];
   }

//echo'To bank'.$at_hand;
//echo"-------------------------------------------------";
$query4= "INSERT INTO collection_summary VALUES
('','CASH AT HAND','$at_hand','','$at_hand','OPEN','1','')";
$result4 =mysql_query($query4);


//echo "<tr><td width ='25%'></td><td width ='25%'><b>CASH SALES
//</b></td><td width ='25%'>Ksh $latss</td><td width ='25%'>
//</td></tr>";

$query4= "INSERT INTO collection_summary VALUES
('','CASH SALES','$latss','0','0','CASH','2','')";
$result4 =mysql_query($query4);

$query4= "INSERT INTO collection_summary VALUES
('','CASH SALES','$latss','0','0','CASH','16','')";
$result4 =mysql_query($query4);


//echo "<tr><td width ='25%'></td><td width ='25%'><b>M-PESA 
//SALES</b></td><td width ='25%'>Ksh $xcv</td><td width ='25%'>
//</td></tr>";

$query4= "INSERT INTO collection_summary VALUES
('','M-PESA SALES','$xcv','0','0','MPES','3','')";
$result4 =mysql_query($query4);


//echo "<tr><td width ='25%'></td><td width ='25%'><b>EFT SALES
//</b></td><td width ='25%'>Ksh $latex</td><td width ='25%'>
//</td></tr>";

$query4= "INSERT INTO collection_summary VALUES
('','DEBIT/CREDIT CARDS','$latex','0','0','CARD','4','')";
$result4 =mysql_query($query4);


//echo "<tr><td width ='25%'></td><td width ='25%'><b>CHEQUES 
//SALES</b></td><td width ='25%'>Ksh $latess</td><td width 
//='25%'></td></tr>";

$query4= "INSERT INTO collection_summary VALUES
('','CHEQUES SALES','$latess','0','0','CHEQ','5','')";
$result4 =mysql_query($query4);



//echo "<tr><td width ='25%'></td><td width ='25%'><b>BANK //TRANSFER</b></td><td width ='25%'>Ksh $latessx</td><td width //='25%'></td></tr>";



//echo "<tr><td width ='25%'></td><td width ='25%'><b>CREDIT 
//SALES</b></td><td width ='25%'>Ksh $amountsx</td><td width 
//='25%'></td></tr>";


$query4= "INSERT INTO collection_summary VALUES
('','CREDIT SALES','$amountsx','0','0','CRED','6','')";
$result4 =mysql_query($query4);


$zaapo =$latss+$xcv+$latex+$latess+$latessx+$amountsx;
//Tabulate total sales
//----------------------
$query4= "INSERT INTO collection_summary VALUES
('','TOTAL SALES','$zaapo','0','0','TOTA','7','')";
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
('','$account','$amounts','','$amounts','CRED1','8','')";
$result4 =mysql_query($query4);

}
//End of insurance tabulation
//---------------------------


//echo "<tr><td width ='25%'></td><td width ='25%'><b>TOTAL 
//SALES</b></td><td width ='25%'>Ksh $zaapo</td><td width 
//='25%'></td></tr>";





//Look for the number of clients in day shift
//-------------------------------------------
//echo"Visits".$date1xu.$date2xu;
$clients =0;
//   $query = "SELECT patients_name,adm_no,date,company FROM htransf WHERE CONCAT(date, company) >= '$date1x' and CONCAT(date, company) <='$date2x' and company<>' ' GROUP BY adm_no"; 
$query = "SELECT date,patient FROM logfile WHERE date >= '$date1xu' and date <='$date2xu' GROUP BY patient";       
   $result = mysql_query($query) or die(mysql_error());
   $tot_cred =0;
   $noss = 12;
   while($row = mysql_fetch_array($result)){
        //$xx = $row['adm_no'];
        $xxx = $row['patient'];
	$xxxx = $row['date'];
        //echo " ".$xxx.$xxxx."<br>";
        $clients++;
   }


$query4= "INSERT INTO collection_summary VALUES
('','CLIENTS','$clients','','0','CLIE','22','')";
$result4 =mysql_query($query4);

$query4= "INSERT INTO collection_summary VALUES
('','BANKING','0','','0','BANK','10','')";
$result4 =mysql_query($query4);


 echo "<br><br>";

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
$clients =0;
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
('','$name','$paid','','','BANK','11','')";
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
   
//   die();
   
   
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
('','$desc','$amount','','0','$categ','$noss','')";
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
('','TOTAL SALES','$tot_cred','0','0','TOT2','$noss','')";
$result4 =mysql_query($query4);
$noss++;
   $i3s = $i3s+1000;
   $i3s++;
}

//$noss =$noss+1;


//Now put expenses
//----------------
$query4= "INSERT INTO collection_summary VALUES
('','EXPENSES','0','','0','EXPE','$noss','')";
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
('','$accounty','','$amounts','$amounts','CRED1','8','')";
$result41 =mysql_query($query41);
//8 here
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
$clientsx=0;
   //$query = "SELECT adm_no,date,company FROM htransf WHERE CONCAT(date, company) >= '$date10x' and CONCAT(date, company) <='$date20x' and company<>' ' GROUP BY adm_no"; 
 $query = "SELECT date,patient FROM logfile WHERE date >= '$date10xu' and date <='$date20xu' group by patient";       
  $result = mysql_query($query) or die(mysql_error());
   $tot_cred =0;
   $noss = 12;
   while($row = mysql_fetch_array($result)){
        //$xx = $row['adm_no'];
        //echo".".$xx."<br>";
        //$xx = $row['adm_no'];
        $xxx = $row['patient'];
	$xxxx = $row['date'];
        //echo " ".$xxx.$xxxx."<br>";
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
('','$desc','0','','$amount','$categ','','')";
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
$SQL ="select * FROM gltransf WHERE date >='$date1' AND date <= '$date2' and type='Pay' and account_name<>'COST OF GOODS SOLD' and account_name='CASH COLLECTION A/C'" ;   
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
    $name  = $row['inputby'];
       
       $paid = $row['amount'];
       $tot_paid = $tot_paid +$paid;
//$name2 =$name.'-'.$narration;
$name2 =$narration.'-'.$name;


//Now put expenses
//----------------
$query4= "INSERT INTO collection_summary VALUES
('','$name2','$paid','','','EXPE','$noss','')";
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
$sql3s="SELECT * FROM collection_summary2 where line <=7";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;
while ($i3s < $num3s)
      {
      $needed   = mysql_result($result3s,$i3s,"total"); 
      $identity   = mysql_result($result3s,$i3s,"identity"); 

$query4  = "UPDATE collection_summary SET monthly ='$needed' WHERE identity='$identity'";
$result4 = mysql_query($query4);
$i3s++;
}



//Income by departments
//---------------------
$sql3s="SELECT * FROM collection_summary2 where line =22";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;
while ($i3s < $num3s)
      {
      $needed   = mysql_result($result3s,$i3s,"total"); 
      $identity   = mysql_result($result3s,$i3s,"identity"); 

$query4  = "UPDATE collection_summary SET monthly ='$needed' WHERE identity='$identity'";
$result4 = mysql_query($query4);
$i3s++;
}



//Income by departments
//---------------------
$sql3s="SELECT * FROM collection_summary2 where line =12";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;
while ($i3s < $num3s)
      {
      $needed   = mysql_result($result3s,$i3s,"total"); 
      $identity   = mysql_result($result3s,$i3s,"identity"); 

$query4  = "UPDATE collection_summary SET monthly ='$needed' WHERE identity='$identity'";
$result4 = mysql_query($query4);
$i3s++;
}


//Total for departments
//---------------------
$sql3s="SELECT * FROM collection_summary2 where line =13";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;
while ($i3s < $num3s)
      {
      $needed   = mysql_result($result3s,$i3s,"total"); 
      $identity   = mysql_result($result3s,$i3s,"identity"); 

$query4  = "UPDATE collection_summary SET monthly ='$needed' WHERE identity='$identity'";
$result4 = mysql_query($query4);
$i3s++;
}


//Monthly Total for insurances
//----------------------------
$sql3s="SELECT * FROM collection_summary2 where line =8";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;
while ($i3s < $num3s)
      {
      $needed   = mysql_result($result3s,$i3s,"total"); 
      $identitys   = mysql_result($result3s,$i3s,"description"); 




   $sql3sx="SELECT * FROM collection_summary WHERE description='$identitys'";
   $result3sx = mysql_query($sql3sx);
   $num3sx =mysql_numrows($result3sx);
   if ($num3sx=='0'){
      $query4= "INSERT INTO collection_summary VALUES ('','$identitys','','','','CRED1','8','$needed')";
      $result4 =mysql_query($query4);
   }else{
      $query4  = "UPDATE collection_summary SET monthly ='$needed' WHERE description='$identitys'";
      $result4 = mysql_query($query4);
   }

$i3s++;
}

//--------------------------------------
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
   //$query = "delete FROM collection_summary where identity='CRED1'";       
   //$result = mysql_query($query) or die(mysql_error());

//   $query = "delete FROM collection_summary where identity='CLIE'";       
 //  $result = mysql_query($query) or die(mysql_error());


   $query = "delete FROM collection_summary where identity='TOT2'";       
   $result = mysql_query($query) or die(mysql_error());


   $query = "delete FROM collection_summary where description='EXPENSE'";       
   $result = mysql_query($query) or die(mysql_error());


   $query = "update collection_summary set line =15,description='BAL B/F' where identity='OPEN'";       
   $result = mysql_query($query) or die(mysql_error());

   $query = "update collection_summary set line =16 where identity='BANK'";       
   $result = mysql_query($query) or die(mysql_error());

   $query = "update collection_summary set line =18 where identity='EXPE'";       
   $result = mysql_query($query) or die(mysql_error());

   $query = "update collection_summary set description=' ',day='',night='',total='' where identity='TOT2'";       
   $result = mysql_query($query) or die(mysql_error());

   //Get total for insurance and departments the you can run the report
   //------------------------------------------------------------------
   $insure_d = 0;
   $insure_n = 0;
   $depart_d = 0;
   $depart_n = 0;

   $sql3s="SELECT * FROM collection_summary where (line ='8' or line='12')";
   $result3s = mysql_query($sql3s);
   $num3s =mysql_numrows($result3s);
   $found ='No';
   $i3s =0;
   while ($i3s < $num3s)
      {
      $id   = mysql_result($result3s,$i3s,"id"); 
      $day   = mysql_result($result3s,$i3s,"day"); 
      $night = mysql_result($result3s,$i3s,"night");    
      $line = mysql_result($result3s,$i3s,"line");    
    
      if ($line==8){
         $insure_d = $insure_d +$day;
         $insure_n = $insure_n +$night;
      }else{
         $depart_d = $depart_d +$day;
         $depart_n = $depart_n +$night;
      }
   $i3s++;
   }
   $insure_a = $insure_d +$insure_n;
   $depart_a = $depart_d +$depart_n;
   
   $query4= "INSERT INTO collection_summary VALUES ('','','$insure_d','$insure_n','$insure_a','CRED1','9','')";
   $result4 =mysql_query($query4);

   $query4= "INSERT INTO collection_summary VALUES ('','','$depart_d','$depart_n','$depart_a','DEPART','13','')";
   $result4 =mysql_query($query4);



   $query = "SELECT * FROM collection_summary order by line,identity";       
   $result = mysql_query($query) or die(mysql_error());
   $tot_cred =0;
   // Print out result
   //-----------------
$banked1=0;
$banked2=0;

$banked1=0;
$banked2=0;

$expenses1=0;
$expenses2=0;

$cash1 = 0;
$cash2 = 0;

$tot_ins = 0;
$count = 0;
$liquid = 0;
$insure_said='No';
$items_said='No';
echo"<table width ='100%' border='0' bgcolor='black'>";
echo"<tr bgcolor='black'><td align='center'><font color='white'><b>DESCRIPTION</td><td align ='right'><font color='white'><b>DAY SHIFT</td align ='right'><td align ='right'><font color='white'><b>NIGHT SHIFT</td><td align ='right'><font color='white'><b>TOTAL</font></td><td width ='10%' align ='right'><font color='white'><b>MONTHLY</font></td></tr>";
   while($row = mysql_fetch_array($result)){
        $desc = $row['description'];
        $amount1 = $row['day'];
        $amount2 = $row['night'];
        $amount3 = $row['total'];
        $sales1 = $sales1 +$amount1;
        $sales2 = $sales2 +$amount2;
        $monthlys = $row['monthly'];
        $monthlys = number_format($monthlys);

        if ($line == '15' ){
           $bal_bf1 = $row['total'];
           $bal_bf2 = $row['total'];
        }


        $line = $row['line'];
        $je = $row['identity'];

        $identity = $row['identity'];
        if ($identity=='OPEN' || $identity=='CASH'){
           $liquid =$liquid+$amount3;
        }
        if ($identity=='BANK' || $identity=='EXPE'){
           $liquid =$liquid-$amount3;
        }

        $clients_sum =$amount3;
        $amount1 = number_format($amount1);
        $amount2 = number_format($amount2);
        $amount3 = number_format($amount3);

        //sales
        if ($line<7){
           echo"<tr bgcolor='white'>";
           echo"<td width ='10%'>";
           echo $row['description'];
           $monthly = $row['monthly'];
           $monthly = number_format($monthly);
           echo"</font></td><td align='right'>$amount1</td><td align='right'>$amount2</td><td align='right'>$amount3</td><td width ='10%' bgcolor ='white' align='right'><font color ='black'>$monthly</font></td></tr>";
        }    

        if ($line == '2' ){
           $cash1 =$cash1+$amount1;
           $cash2 =$cash2+$amount2;
        }


        if ($line == '16' ){
           $banked1 =$banked1+$amount1;
           $banked2 =$banked2+$amount2;
        }


        if ($line == '18' ){
           $expenses1 =$expenses1+$amount1;
           $expenses2 =$expenses2+$amount2;
        }

        if ($line == '7' ){
           echo"<tr bgcolor='white'>";
           echo"<td width ='10%' bgcolor ='black' align ='right'><font color ='white'><h3>";
           echo $row['description'];
           $monthly = $row['monthly'];
           $monthly = number_format($monthly);
           echo"</h3></td><td bgcolor ='black' align='right'><font color ='white'><h3>$amount1</font></td><td bgcolor ='black' align='right'><font color ='white'><h3>$amount2</font></td><td bgcolor ='black' align='right'><font color ='white'><h3>$amount3</font></h3></td><td bgcolor ='black' align='right'><font color ='white'><h3>$monthly</h3></font></td></tr>";
        }    
   

        if ($line == '8' ){
           if ($insure_said=='No'){
           echo"<tr bgcolor='white'>";
           echo"<td width ='10%' bgcolor ='black' align ='center'><font color ='white'><h3>";
           echo '**INSURANCE**';
           echo"</h3></td><td bgcolor ='black'></td><td bgcolor ='black'></td><td bgcolor ='black'></td><td bgcolor ='black' align='right'><font color ='white'></font></td></tr>";
           $insure_said='Yes';           
           $tot_insd = $tot_insd+$amount1;
           $tot_insn = $tot_insn+$amount2;
           }
           echo"<tr bgcolor='white'>";
           echo"<td width ='10%' align ='left'>";
           echo $row['description'];
           echo"</td><td align='right'>$amount1</td align='right'><td align='right'>$amount2</td><td align='right'>$amount3</td><td bgcolor ='white' align='right'>$monthlys<font color ='black'></font></td></tr>";
        }    

 
        if ($line == '9' ){
           echo"<tr bgcolor='yellow'>";
           echo"<td width ='10%' align ='right'><font color ='black'>INSURANCE TOTAL";
           echo"</td><td align='right'>$insure_d</td align='right'><td align='right'>$insure_n</td><td align='right'>$insure_a</font></td><td align='right'><font color ='black'></font></td></tr>";
        }    



        if ($line == '12' ){
           if ($items_said=='No'){
           echo"<tr bgcolor='white'>";
           echo"<td width ='10%' bgcolor ='black' align ='center'><font color ='white'><h3>";
           echo '**DEPARTMENTS**';
           echo"</h3></td><td bgcolor ='black'><fo</td><td bgcolor ='black'></td><td bgcolor ='black'></td><td bgcolor ='black' align='right'><font color ='white'></font></td></tr>";
           $items_said='Yes';
           }
//else{
           echo"<tr bgcolor='white'>";
           echo"<td width ='10%' align ='left'>";
           echo $row['description'];
           $monthly= $row['monthly'];
           $monthly = number_format($monthly);
           echo"</td><td align='right'>$amount1</td><td align='right'>$amount2</td><td align='right'>$amount3</td><td bgcolor ='white' align='right'><font color ='black'>$monthly</font></td></tr>";
        }    

        if ($line == '13' ){
           echo"<tr bgcolor='yellow'>";
           $monthly= $row['monthly'];
           $monthly = number_format($monthly);
           echo"<td width ='10%' align ='right'><font color ='black'>DEPARTMENTAL TOTAL";
           echo"</td><td align='right'>$depart_d</td align='right'><td align='right'>$depart_n</td><td align='right'>$depart_a</font></td><td align='right'><font color ='black'>$monthly</font></td></tr>";
        }    

          
   }    








	   echo"<tr bgcolor='black'>";
               echo"<td width ='30%'><b><font    
               color ='black'>";       
        echo"</b></td>";
        echo"<td width ='10%'><b><font color ='black'>";
        echo"</td>";
echo"<td width ='10%'><b><font color ='white'>";
        echo"</td>"; 

               echo"<td width ='10%' align='right'><b><font    
               color ='white' >";
           echo"</td><td bgcolor ='black' align='right'><font color ='white'><h3></font></h3></td>";
        echo"</tr></table>";
echo"<br><br>";
echo"<br><br>";







   $xx=0;
   $query = "SELECT identity,total FROM collection_summary where identity ='BANK'";       
   $result = mysql_query($query) or die(mysql_error());
   while($row = mysql_fetch_array($result)){
        //$xx = $row['total'];
        $xx = $xx+$row['total'];
   }


   $xx2=0;
   $query = "SELECT identity,total FROM collection_summary where identity ='EXPE'";       
   $result = mysql_query($query) or die(mysql_error());
   while($row = mysql_fetch_array($result)){
        //$xx = $row['total'];
        $xx2 = $xx2+$row['total'];
   }


   $xx3=0;
   $query = "SELECT identity,total FROM collection_summary where line ='2'";       
   $result = mysql_query($query) or die(mysql_error());
   while($row = mysql_fetch_array($result)){
        //$xx = $row['total'];
        $xx3 = $xx3+$row['total'];
   }





           echo"<table width ='100%' border ='0'>";
           echo"<td width ='100%' align ='left'>";
           echo 'BALANCE B/F';
           echo"</td><td></td><td>$at_hand</td></table><br>";

           echo"<table width ='100%'>";
           echo"<td width ='50%' align ='left'>";
           echo 'CASH SALES';
           echo"</td><td width ='20%'></td><td width='30%' align='right'>$xx3</td></table>";



           echo"<table width ='100%'>";
           echo"<td width ='50%' align ='left'>";
           echo 'BANKED';
           echo"</td><td width ='20%'></td><td width='30%' align='right'>$xx</td></table>";

           echo"<table width ='100%'>";
           echo"<tr><td width ='50%' align ='left'>";
           echo '<u>EXPENSES</u>';
           echo"</td><td width ='20%' align='right'></td><td width='30%' align='right'>$xx2</td></tr>";
           $query = "SELECT description,identity,total FROM collection_summary where identity ='EXPE' and total<>0";       
           $result = mysql_query($query) or die(mysql_error());
           while($row = mysql_fetch_array($result)){
                $xxa = $row['description'];
                $xxb = $row['total'];

                echo"<tr><td width ='50%'>$xxa</td><td width ='20%' align='right'>$xxb</td><td width ='30%'></td></tr>";
           }
           echo"</table>";

           $xx2 = $xx2*-1;
//echo 'Open'.$at_hand;
//echo 'sales'.$xx3;
//echo 'banked'.$xx;
//echo 'expenses'.$xx2;
//$aa = $at_hand+$xx3;
//$aaa = $xx+$xx2;

//echo 'Final'.$aa;
//echo 'Final2'.$aaa;
//$aaax = $aa-$xxa;

//echo 'Final3'.$aaax;


           echo"<table width ='100%'>";
           echo"<td width ='100%' align ='left' bgcolor ='black'>";
           echo "<font color ='white'>CLOSING BALANCE</font>";
           $closing =$at_hand+$xx3-$xx-$xx2;
           echo"</td><td width ='20%' bgcolor ='black'></td><td width='30%' align='right' bgcolor ='black'><font color ='white'>$closing</font></td></table>";

  

   $sql3s="SELECT * FROM gl_bf where date ='$date20'";
   $result3s = mysql_query($sql3s);
   $num3s =mysql_numrows($result3s);
   
//   echo"Records".$num3s.$date20.$carry;
   if ($carry<>' '){   
   if ($num3s=='0'){
      $query4= "INSERT INTO gl_bf VALUES ('','$date20','$closing')";
      $result4 =mysql_query($query4);
   }else{
   $query = "update gl_bf set amount ='$closing' where date='$date20'";       
   $result = mysql_query($query) or die(mysql_error());
   }
   }
   


//Get monthly total visits
//------------------------
   $query = "SELECT * FROM collection_summary where line ='22'";       
   $result = mysql_query($query) or die(mysql_error());
   while($row = mysql_fetch_array($result)){
       $amount3x =$row['monthly'];
   }
 $amount3x = $amount3x +$clients_sum;

if ($line == '22' ){           
           //echo"<table width ='100%'>";
           //echo"<td width ='20%' align ='left' bgcolor ='yellow'>";
           //echo "<font color ='black'><b>Total Clients</h4></font>";
           $closing =$at_hand+$xx3-$xx-$xx2;
           //echo"</td><td width ='20%' bgcolor ='yellow'><b>$amount1</b></td><td width ='20%' bgcolor ='yellow'><b>$amount2</b</td><td width='20%' align='right' bgcolor ='yellow'><font color ='black'><h4>$amount3</b></font></td><td width='20%' align='right' bgcolor ='yellow'><font color ='black'><b>$amount3x</b></font></td></table>";



         echo"<table width ='100%'><tr bgcolor='yellow'>";
           echo"<td width ='30%' align ='right'><font color ='black'><b>TOTAL CLIENTS</b></td>";
           echo"<td width ='10%' align='right'><b>$amount1</b></td>";
           echo"<td width ='10%' align='right'><b>$amount2</b></td>";
           echo"<td width ='10%' align='right'><b>$amount3</b></font></td>";
           echo"<td width ='10%' align='right'><font color ='black'><b>$amount3x</b></font></td></tr></table>";


}



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
  echo"<form action ='endofday_report_summary.php' method ='GET'>";

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


  echo"<tr><td width='50'><font color='white'>Carry forward Balance:</td><td><input type='checkbox' name='cfb' value ='1' ></td>";
  
  echo"<td width='50'>";

echo"</td></tr>";


  
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

