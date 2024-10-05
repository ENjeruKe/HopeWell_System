<?php
session_start();
 require('open_database.php');
include 'includes/conn.php'; 
?>





<?php
 $branch     = $_SESSION['company']; 





// if (isset($_GET['print'])){

//$_SESSION['dt1'] = $_GET['date1'];
//$_SESSION['dt2'] = $_GET['date2'];
//$_SESSION['tm1'] = $_GET['time1'];
//$_SESSION['tm2'] = $_GET['time2'];


//$_SESSION['dt10'] = $_GET['date10'];
//$_SESSION['dt20'] = $_GET['date20'];
//$_SESSION['tm10'] = $_GET['time10'];
//$_SESSION['tm20'] = $_GET['time20'];

   $date1  = $_SESSION['dt1'];
   $date2  = $_SESSION['dt2'];

   $start_dte  = substr($date1,0,8).'01';
   $end_dte= $date2;
   

   $date10  = $_SESSION['dt10'];
   $date20  = $_SESSION['dt20'];
   $time10  = $_SESSION['tm10'];
   $time20  = $_SESSION['tm20'];
   $carry  = ' ';

   
   $time1  = $_SESSION['tm1'];
   $time2  = $_SESSION['tm2'];
   $time1a  = $_SESSION['tm1'];
   $time2a  = $_SESSION['tm2'];

   $date1x  = $date1.$time1;
   $date2x  = $date2.$time2;

   $date1 = $start_dte;
   $date2 = $end_dte;
   $date1x = $start_dte.$time1;
   $date2x = $end_dte.$time2;

   $date10x  = $date10.$time10;
   $date20x  = $date20.$time20;


   $date1xu  = $date1.' '.$time1.':00';
   $date2xu = $date2.' '.$time2.':00';

   $date10xu  = $date10.' '.$time10.':00';
   $date20xu  = $date20.' '.$time20.':00';


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
    if ($types=='Cash Receipts'){
// and $my_date >=$start_date and $my_date <=$end_date
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

         $i++;      
        }
     }
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
    


 $query3 = "TRUNCATE TABLE collection_summary2";
 $result3 =mysql_query($query3);
 

$query4= "INSERT INTO collection_summary2 VALUES
('','CASH SALES','$latss','0','0','CASH','2')";
$result4 =mysql_query($query4);

$query4= "INSERT INTO collection_summary2 VALUES
('','CASH SALES','$latss','0','0','CASH','16')";
$result4 =mysql_query($query4);


$query4= "INSERT INTO collection_summary2 VALUES
('','M-PESA SALES','$xcv','0','0','MPES','3')";
$result4 =mysql_query($query4);

$query4= "INSERT INTO collection_summary2 VALUES
('','DEBIT/CREDIT CARDS','$latex','0','0','CARD','4')";
$result4 =mysql_query($query4);

$query4= "INSERT INTO collection_summary2 VALUES
('','CHEQUES SALES','$latess','0','0','CHEQ','5')";
$result4 =mysql_query($query4);


$query4= "INSERT INTO collection_summary2 VALUES
('','CREDIT SALES','$amountsx','0','0','CRED','6')";
$result4 =mysql_query($query4);


$zaapo =$latss+$xcv+$latex+$latess+$latessx+$amountsx;
//Tabulate total sales
//----------------------
$query4= "INSERT INTO collection_summary2 VALUES
('','TOTAL SALES','$zaapo','0','0','TOTA','7')";
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

$query4= "INSERT INTO collection_summary2 VALUES
('','$account','$amounts','','$amounts','CRED1','8')";
$result4 =mysql_query($query4);

}
//End of insurance tabulation
//---------------------------








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


$query4= "INSERT INTO collection_summary2 VALUES
('','CLIENTS','$clients','','0','CLIE','22')";
$result4 =mysql_query($query4);



$query4= "INSERT INTO collection_summary2 VALUES
('','BANKING','0','','0','BANK','10')";
$result4 =mysql_query($query4);


//Check for dates from here
//-------------------------
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
$query4= "INSERT INTO collection_summary2 VALUES
('','$name','$paid','','','BANK','11')";
$result4 =mysql_query($query4);

         $i++;      
     }
      


//Now go to collection by department
//----------------------------------


   $query13 = "DROP TABLE summary";
   $result13 =mysql_query($query13);
   
   $query3 = "DROP TABLE summary2";
   $result3 =mysql_query($query3);
   
   $query3 = "CREATE TABLE summary SELECT location, inputby from receiptf where date >= '$date1' and date <='$date2'";
   $result3 = mysql_query($query3);
   
   //Get all receipts from receiptf and add invoices from htransf
   //------------------------------------------------------------
   $query32 = "CREATE TABLE summary2 SELECT location, inputby,total,date,time from receiptf where date >= '$date1' and date <='$date2'";
   
   $result32 = mysql_query($query32);
   
   
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
   
   
$sql3s="SELECT location, inputby FROM summary GROUP BY location";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;

while ($i3s < $num3s)
      {
      $department     = mysql_result($result3s,$i3s,"location"); 
      $usernamex        = mysql_result($result3s,   $i3s,"inputby");        
       
   $query = "SELECT location, inputby,date,time, sum(total) FROM summary2 WHERE CONCAT(date, time) >= '$date1x' and CONCAT(date, time) <='$date2x' GROUP BY location"; 
   
   $result = mysql_query($query) or die(mysql_error());
   $tot_cred =0;
   // Print out result
   //-----------------
   $noss = 12;
   while($row = mysql_fetch_array($result)){
        $desc = $row['location'];
        $amount = $row['sum(total)'];
        $tot_cred = $tot_cred+$amount;
        $tot_credx =$tot_credx+$amount;
        $categ =substr($desc,0,4);

        $query4= "INSERT INTO collection_summary2 VALUES
('','$desc','$amount','','0','$categ','$noss')";
$result4 =mysql_query($query4);
    
   }


$noss++;
   $tot_cred = $tot_cred;
   $yes_income = $tot_cred;
   $income =number_format($tot_cred);


        $query4= "INSERT INTO collection_summary2 VALUES
('','TOTAL SALES','$tot_cred','0','0','TOT2','$noss')";
$result4 =mysql_query($query4);
$noss++;
   $i3s = $i3s+1000;
   $i3s++;
}

//Now put expenses
//----------------
$query4= "INSERT INTO collection_summary2 VALUES
('','EXPENSES','0','','0','EXPE','$noss')";
$result4 =mysql_query($query4);


//---------------------------------------
//Now get information for Night shift
//---------------------------------------
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
    if ($types=='Cash Receipts'){
// and $my_date >=$start_date and $my_date <=$end_date
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
         $i++;      
        }
     }

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
    


$query4  = "UPDATE collection_summary2 SET night ='$latss' WHERE identity='CASH'";
$result4 = mysql_query($query4);


$query4  = "UPDATE collection_summary2 SET night ='$xcv' WHERE identity='MPES'";
$result4 = mysql_query($query4);

$query4  = "UPDATE collection_summary2 SET night ='$latex' WHERE identity='CARD'";
$result4 = mysql_query($query4);

$query4  = "UPDATE collection_summary2 SET night ='$latess' WHERE identity='CHEQ'";
$result4 = mysql_query($query4);

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
$sql3s="SELECT * FROM collection_summary2 where description='$accounty'";
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
$query41  = "UPDATE collection_summary2 SET night ='$amounts' WHERE description='$fhuy'";
$result41 = mysql_query($query41);


}else{
$query41= "INSERT INTO collection_summary2 VALUES
('','$accounty','','$amounts','$amounts','CRED1','8')";
$result41 =mysql_query($query41);
//8 here
}

}
//End of insurance tabulation
//---------------------------



$zaapo =$latss+$xcv+$latex+$latess+$latessx+$amountsx;

$query4  = "UPDATE collection_summary2 SET night ='$zaapo' WHERE identity='TOTA'";
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

$query4  = "UPDATE collection_summary2 SET night ='$clientsx' WHERE identity='CLIE'";
$result4 = mysql_query($query4);


//Now go to collection by department
//----------------------------------
   $query13 = "DROP TABLE summary";
   $result13 =mysql_query($query13);
   
   $query3 = "DROP TABLE summary2";
   $result3 =mysql_query($query3);
   
   $query3 = "CREATE TABLE summary SELECT location, inputby from receiptf where date >= '$date10' and date <='$date20'";
   $result3 = mysql_query($query3);
      
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
          
   $query = "SELECT location, inputby,date,time, sum(total) FROM summary2 WHERE CONCAT(date, time) >= '$date10x' and CONCAT(date, time) <='$date20x' GROUP BY location"; 
   
   $result = mysql_query($query) or die(mysql_error());
   $tot_cred =0;
   // Print out result
   //-----------------
   while($row = mysql_fetch_array($result)){
        $desc = $row['location'];
        $amount = $row['sum(total)'];
        $tot_cred = $tot_cred+$amount;
        $tot_credx =$tot_credx+$amount;
        $categ =substr($desc,0,4);


$query4  = "UPDATE collection_summary2 SET night ='$amount' WHERE identity='$categ'";
$result4 = mysql_query($query4);

if ($query4) {
  //echo "Record updated successfully";
} else {
  $query4= "INSERT INTO collection_summary2 VALUES
('','$desc','0','','$amount','$categ')";
$result4 =mysql_query($query4);
}


   }
   $tot_cred = $tot_cred;
   $yes_income = $tot_cred;
   $income =number_format($tot_cred);


$query4  = "UPDATE collection_summary2 SET night ='$tot_cred' WHERE identity='TOT2'";
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
$name2 =$narration.'-'.$name;


//Now put expenses
//----------------
$query4= "INSERT INTO collection_summary2 VALUES
('','$name2','$paid','','','EXPE','$noss')";
$result4 =mysql_query($query4);
$noss++;
         $i++;      
     }
      

     
//End of Night
//------------
//Now do Maths of addition
//------------------------

$sql3s="SELECT * FROM collection_summary2";
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
$query4  = "UPDATE collection_summary2 SET total ='$tots' WHERE id='$id'";
$result4 = mysql_query($query4);
$i3s++;
}





//Now go and print the report based on the table entries
//------------------------------------------------------
   $query = "delete FROM collection_summary2 where identity='TOT2'";       
   $result = mysql_query($query) or die(mysql_error());


   $query = "delete FROM collection_summary2 where description='EXPENSE'";       
   $result = mysql_query($query) or die(mysql_error());


   $query = "update collection_summary2 set line =15,description='BAL B/F' where identity='OPEN'";       
   $result = mysql_query($query) or die(mysql_error());

   $query = "update collection_summary2 set line =16 where identity='BANK'";       
   $result = mysql_query($query) or die(mysql_error());

   $query = "update collection_summary2 set line =18 where identity='EXPE'";       
   $result = mysql_query($query) or die(mysql_error());

   $query = "update collection_summary2 set description=' ',day='',night='',total='' where identity='TOT2'";       
   $result = mysql_query($query) or die(mysql_error());

   //Get total for insurance and departments the you can run the report
   //------------------------------------------------------------------
   $insure_d = 0;
   $insure_n = 0;
   $depart_d = 0;
   $depart_n = 0;

   $sql3s="SELECT * FROM collection_summary2 where (line ='8' or line='12')";
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
   
   $query4= "INSERT INTO collection_summary2 VALUES ('','','$insure_d','$insure_n','$insure_a','CRED1','9')";
   $result4 =mysql_query($query4);

   $query4= "INSERT INTO collection_summary2 VALUES ('','','$depart_d','$depart_n','$depart_a','DEPART','13')";
   $result4 =mysql_query($query4);



   $query = "SELECT * FROM collection_summary2 order by line,identity";       
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
//die();
//----------------------------------------------------------------------------
//Check from here
//----------------------------------------------------------------------------


//}


?>
