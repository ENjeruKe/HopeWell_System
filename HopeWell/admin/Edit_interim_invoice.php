<?php
   session_start();
require('open_database.php');
$branch = $_SESSION['company'];
$username =$_SESSION['username'];
?>
<?php

if ($username=='admin' or $username=='Admin'){
}else{
  echo'<h3>File Access denied</h3>';
  die();
}
if (isset($_GET['accounts5'])){      
   $record5 =$_GET['accounts5'];
   $record4 =$_GET['accounts4'];
   $record3 =$_GET['accounts3'];

   $query3 = "DELETE FROM htransf WHERE adm_no ='$record4' AND doc_no ='$record5' AND amount ='$record3'";
   $result3 =mysql_query($query3) or die(mysql_error());

  $query3 = "DELETE FROM gltransf WHERE ref_no ='$record5'";
   $result3 =mysql_query($query3) or die(mysql_error());
   
}



$finalise ='Start';   
if (isset($_GET['print'])){
   $finalise ='No';
   $_SESSION['patient'] = $_GET['supplier'];
   $patient1 = $_SESSION['patient'];
   $branch   = $_SESSION['company'];
   //Checking if Invoice Exist
}

if (isset($_GET['finalise'])){
   $finalise ='Yes';   
   $_SESSION['patient'] = $_GET['supplier'];
   $patient1 = $_SESSION['patient'];
}

?>

<html>
<form action ="Edit_interim_invoice.php" method ="GET">
<?php
$go_on='Yes';
if ($finalise=='Start'){
    echo"<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title><div class='navbar navbar-inverse navbar-fixed-top'>";      
    echo"<div class='navbar-inner'>";                  
    echo"<a class='btn btn-navbar' data-toggle='collapse' data-target='.nav-collapse'><span class='icon-bar'></span><span class='icon-bar'></span><span class='icon-bar'></span></a>";
    echo"<a class='brand' href='#'>Medi+ V10 (HMIS Global)</a><div class='nav-collapse collapse'><p class='navbar-text pull-right'></p>";

          echo"</div></div></div></div>";
    echo"<link rel=StyleSheet href='popups/header.css' type='text/css' media='screen'>";
    echo"<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet'>";

}
?>
    

</head>
<body> 
<!--background="images/background.jpg"-->


<?php
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 $go_on ='Yes';
//if ($go_on=='Yes'){
//if (! isset($_GET['print'])){
//if (!isset($_GET['print']) OR !isset($_GET['finalise'])){
if ($finalise=='Start'){
 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";
 $go_on = 'No';
 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
   
 $date = date('y-m-d');


 echo"<table width ='400' border='0' border color ='black'><tr><td width ='100' align ='right'><b>Print Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td></tr><tr><td width='150' align='right'><b>From Patient: </b></td><td>";
 echo"<select id='supplier' name='supplier'>";                    
 $cdquery="SELECT name FROM appointmentf order by name";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["name"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr>";

 echo"<tr><td width='100' align='right'><b>To Patient: </b></td><td>";
 echo"<select id='bed' name='bed'>";        
 $cdquery="SELECT name FROM appointmentf order by name";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["name"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr></table>";
echo"<br><br><br><br><br><br><br><br><br><br><br>";
echo"<table width ='100%' border='0' border color ='black'><td width ='20%' align ='right'><input type='submit' name='print'  class='button' value='Proceed.....'></td><td width ='10%'></td><td width ='70%'><a href ='home.php'><h1>Go to Dashboard</h1></a>
</td></table>";
echo"</FORM><table width ='400'><td align ='center'></td></table>";

}

if ($finalise=='No' OR $finalise=='Yes'){
   $finalise_date =$_GET['date'];

   //Checking if Invoice Exist
   $todays =date('y-m-d');
   $query= "UPDATE companyfile SET today ='$todays'"; 
   $result =mysql_query($query);

   //echo $_SESSION['patient'];
   $mm =$_SESSION['patient'];
   $patient_name2 = $_GET['supplier'];
   
   $query= "SELECT * FROM htransf WHERE invoice_no =''" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;


   $SQL= "SELECT * FROM htransf WHERE patients_name = '$patient_name2'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $ok ='No';   
   while ($row=mysql_fetch_array($hasil)) 
   {  
      $patient     = mysql_result($result,$i,"patients_name");  
      //if ($_SESSION['patient']==$patient){
         $patients      = mysql_result($result,$i,"patients_name");         
         $codes   = "";  
         $desc        = mysql_result($result,$i,"patients_name");  
         $pay_company = mysql_result($result,$i,"company");  
         $adm_no      = mysql_result($result,$i,"adm_no");  
         $reg_no      = mysql_result($result,$i,"adm_no");  
         $ok = 'Yes';          
      //}
      //if ($patient2==$patient){
      //   $ok = 'Yes';          
      //}
     $i++;      
   }
  
//echo 'Adm:'.$adm_no;




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
     $dis_dates    = mysql_result($result,$i,"today");   
     $next_invoice = mysql_result($result,$i,"next_invoice");
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
     $disch_date= mysql_result($result,$i,"app_date");   
     $pay_account= mysql_result($result,$i,"payer");   
     $inv_adm_date = mysql_result($result,$i,"adm_date");   
     $inv_dis_date = mysql_result($result,$i,"app_date");   
     $bed_rate = mysql_result($result,$i,"doctor"); 
     $less_days = 0; 
     }
     
     if ($finalise=='Yes'){
        if ($disch_date=='0000-00-00 00:00:00'){
            echo"<br><br><br><br><br><br><table width ='800' border='0' border color ='black'><td width ='700'>
            <h4>Patient NOT yet discharged, please discharge and try again.....</h4></td><td><input type='submit' 
         name='print23'  class='button' value='Refresh'></td></table>";
         //echo"</FORM><table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' 
         //height='100' width='130'></td></table>";
         die();
        }

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

      //Now put the heading
      //------------------      
//echo"<table width ='100%' border ='0' margin='0'><td align ='left'><img src='images/letter_head2.jpg' alt='statement' width ='915'></td></table>";

      if ($finalise=='Yes'){
         //echo"<h1><u><p align ='center'>FINAL INVOICE</p></u></h1>";
      }else{
         //echo"<h1><u><p align ='center'>INTERIM INVOICE</p></u></h1>";
      }
      $mydate = date('d-m-y');
      $inv_no ='O'.$next_invoice;
      echo"<font size ='2'>";
      echo"<table width ='900'>"; 
      //if ($finalise=='Yes'){     
         echo"<tr><td align ='left' width ='350'><b><u>PATIENTS NAME</u></b></td><td width ='400' align ='right'><b>Invoice No:</b></td><td align 
      ='right'>";
      if ($finalise=='Yes'){
         echo $inv_no;
      }else{
         //
      }
      echo"</td></tr>";
      echo"<tr><td align ='left' width ='350'>$patient_name2</td><td width ='400' align ='right'><b>Invoice Date:</b></td><td align ='right'>$mydate</td>  
      </tr>";
      echo"<tr><td align ='left' width ='350'></td><td width ='400' align ='right'><b>File No:</b></td><td align ='right'>$adm_no   
      </td></tr>";
$sDate = date("d-m-y",$adm_date);
$dDate = date("d-m-y",$disch_date);

      echo"<tr><td align ='left' width ='350'><b>Paying A/c</b></td><td width ='400' align ='right'><b>Admited Date:</b></td><td align ='right'>$sDate</td></tr>";
      echo"<tr><td width ='350' align ='left'>$pay_account</td><td width ='400' align ='right'><b>Discharge Date:</b></td><td align ='right'>";
      if ($inv_dis_date=='0000-00-00 00:00:00'){
         echo' Not Discharged';
      }else{
         echo $dDate;
      }
      echo"</b></td></tr>";
      echo"</table>";
      $to ='  To  ';
      echo"<hr>";


echo"<div><b>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:170px;height:2px;'>";
echo"Ref No.<img src='space.jpg' style='width:120px;height:2px;'>";
echo"Type<img src='space.jpg' style='width:50px;height:2px;'>";
echo"<img src='space.jpg' style='width:10px;height:2px;'>";
echo"Debit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Credit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:1px;height:2px;'>";
echo"</b></div>";
echo"<hr>";

   $item_search ='';

   //use the revenue file to group items   
   //-------------------------------------
//   $query3 = "SELECT * FROM glaccountsf" or die(mysql_error());
//   $result3 =mysql_query($query3) or die(mysql_error());
//   $num3 =mysql_numrows($result3) or die(mysql_error());
//   $tot =0;
//   $i3 = 0;
//   while ($i3 < $num3)
//      {
//      $item     = mysql_result($result3,$i3,"account_name");  
      //Search this item in htransf
      //---------------------------
      $today = date('y/m/d');
      $query= "SELECT * FROM htransf WHERE invoice_no =' ' AND patients_name ='$patient1' ORDER BY date" or 
      die(mysql_error());
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $tot =0;
      $i = 0;
      $SQL = "SELECT * FROM htransf WHERE invoice_no =' ' AND patients_name ='$patient1' ORDER BY date"  or die(mysql_error());

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
         //if item found
         //-------------
 //        if ($item==$item_search and $trans_type=='Yes'){
            //if (trans_type=='Yes'){
            $patient      = mysql_result($result,$i,"patients_name");         
            $codes   = "";  
            $desc        = mysql_result($result,$i,"patients_name");  
            $group       = mysql_result($result,$i,"trans_type");         
            $rate        = mysql_result($result,$i,"amount");   
            //$group_t     = mysql_result($result,$i,"amount");   
            $code        = mysql_result($result,$i,"doc_no");   
            $update      = mysql_result($result,$i,"service");  
            $contact     = mysql_result($result,$i,"date"); 
            $amount      = mysql_result($result,$i,"amount");    
            $type        = mysql_result($result,$i,"type");  
            $pay_company = mysql_result($result,$i,"company");  
            $adm_no      = mysql_result($result,$i,"adm_no");  
            $reg_no      = mysql_result($result,$i,"adm_no");  
            $qty         = mysql_result($result,$i,"qty");  
            $item_search2  = mysql_result($result,$i,"trans2");         
            $street  = " ";  
            $pay_mode= " ";  
            $codes2 = $rate; 
            $update2 = $codes2; 
            $tot = $tot +$update2;
            $update2 = number_format($update2);
            $rate = number_format($rate);
            $group_t       = $group_t + $amount;
            //$group_all     = $group_all + $amount;

            $aa5=$row['adm_no'];        
            $aa8=$row['doc_no'];        
            $aa7=$row['amount'];        

            $desc2  = $desc;
            $rates  = $rates + $amount;
            $rates2 = $rates;
            $rates3 = number_format($rates2);        
            echo"<table class='altrowstable' id='alternatecolor'>";
            echo"<tr bgcolor ='white'>";
            echo"<td width ='100' align ='left'>";      
            echo"$contact";
            echo"</td>";
            //echo"<td width ='300' align ='left'>";      
            echo"<td width ='300' align ='left'>$update</a></td>";
            //echo"$update";
            //echo"</td>";
            echo"<td width ='150' align ='left'><a href='Edit_interim_invoice.php?accounts5=$aa8&accounts3=$aa7&accounts4=$aa5'>$code</a>";
            echo"</td>";
            echo"<td width ='50' align ='left'>";      
            echo"$type";
            echo"</td>";
            echo"<td width ='55' align ='right'>";      
            if ($rate >0){
               echo"$rate";
            }
            //echo"$qty";
            echo"</td>";
            echo"<td width ='45' align ='right'>";      
            //if ($rate >0){
            //   echo"$rate";
            //}
            echo"</td>";
            echo"<td width ='50' align ='right'>";
            if ($rate <0){
               echo"$rate";
            }

            echo"</td>";
            echo"<td width ='100' align ='right'>$rates3</td>";
            echo"</tr>";
            $desc2 = $desc;         

           echo"</table>";
           //return here
           $group2= $group;
           $count++;
     //}
//    }


         $i++;      
      }
      // Display the sub-total
      //----------------------
 //     if ($group_t <> 0){
 //        $mytot = $rates2;
 //        $group_t2 = number_format($group_t);
 //        $rates2 = $rates2+$group_t;
         //echo"$rates2";


 //        echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
 //        <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
 //        echo"<table border ='0'><td width ='800' align='right'><b>$item_search2</b></td><td width ='75' align ='right'><b>$group_t2</td></table>";
 //        echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
 //        src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";








//         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
//         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr>";
//         echo"<tr><td width ='600'></td><td><b>$item_search2<img src='space.jpg' 
//         style='width:60px;height:2px;'>$group_t2</td></tr>";
//         echo"<tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
//         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         $group_t =0;
//      }
     //We are moving to the next item in revenue file
     //------------------------------------------------
     //if it is the same item skip
     //---------------------------
     //}

//     $i3++;      
//   }





//Now go and put bed Charge
//--------------------------

//Convert them to timestamps.
$dis_date = date('y-m-d');

//$date1Timestamp = strtotime($adm_date);
//$date2Timestamp = strtotime($dis_dates);


//Calculate the difference.
//$difference = $date2Timestamp - $date1Timestamp;
//$days = ($difference/86400);
$days = round($days);
$days = $days-$less_days;

$amount = $bed_rate*$days;
$rates2 = $rates2+$amount;

$mytot = $mytot+$amount;
$rate3s = number_format($mytot);
$amounts = number_format($amount);

        
        
        
        
        
        
            
            
            
            
            
            
            
            
            
            
      //}else{
      //echo'Get the final Invoice copy from Re-print........';
      //}
      $total_rc = number_format($total_rc);
      if ($total_rc <> 0){

         //echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         //<img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         //echo"<table border ='0'><td width ='800' align='right'><b>SUB-TOTAL</b></td><td width ='75' align ='right'><b>$total_rc</td></table>";
         //echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         //src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";


//         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
//         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr>";
//         echo"<tr><td width ='600'></td><td><b>Sub-Total<img src='space.jpg' 
//         style='width:60px;height:2px;'>$total_rc</td></tr>";
//         echo"<tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
//         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         $group_t =0;
      }

     //End of no-chargables
     //-------------------- 
      if ($finalise=='Yes'){ 
         $totals = $rates2;
         //Update invoice no field in h_transf and carry balance to dtransf
         $query3  = "UPDATE htransf SET invoice_no ='$inv_no',company ='$branch' WHERE invoice_no =' ' AND adm_no    
         ='$adm_no'";
         $result3 = mysql_query($query3);
         



         $query3= "SELECT * FROM htransf WHERE invoice_no ='$inv_no'";    
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $tot =0;
         $i3 = 0;
         $inv_amt_tot=0;
         while ($i3 < $num3)
          {
            $inv_amt = mysql_result($result3,$i3,"amount");  
            $inv_amt_tot = $inv_amt_tot + $inv_amt;
            $i3++;      
           }
         echo "Amount: ".$inv_amt_tot;

         $query4= "INSERT INTO hdnotef 
VALUES('$adm_no','$patient','$finalise_date','$inv_no','$inv_adm_date','$inv_dis_date','$inv_amt_tot','$inv_amt_tot',
'$pay_account','$branch','ADMIN')";
      $result4 =mysql_query($query4);

      if ($inv_amt_tot <>0){
         $desc =$adm_no.' '.$patient;
         $query4= "INSERT INTO dtransf
         VALUES('$pay_account','$finalise_date','$desc','$inv_no','$adm_no','TRF','$inv_amt_tot','$inv_amt_tot','ADMIN')";
         $result4 =mysql_query($query4);

         $query2 = "select * FROM debtorsfile WHERE account_name ='$pay_account'" ;
         $result2 =mysql_query($query2) or die(mysql_error());
         $id = 0;
         $nRecord = 1;
         $No = $nRecord;
         $num2 =mysql_numrows($result2) or die(mysql_error());
         $i2 =0;
         while ($i2 < $num2)
            {         
            $qtys   = mysql_result($result2,$i2,"os_balance");  
            $i2++;
         }
         $balance = $qtys+$inv_amt_tot;
         $query3  = "UPDATE debtorsfile SET os_balance ='$balance' WHERE account_name ='$pay_account'";
         $result3 = mysql_query($query3);         
         }

         //Increase the next invoice number
         $query2 = "select * FROM companyfile WHERE company <>' '" ;
         $result2 =mysql_query($query2) or die(mysql_error());
         $id = 0;
         $nRecord = 1;
         $No = $nRecord;
         $num2 =mysql_numrows($result2) or die(mysql_error());
         $i2 =0;
         while ($i2 < $num2)
            {         
            $next_invoice   = mysql_result($result2,$i2,"next_invoice");  
            $i2++;
         }
         $next_invoice = $next_invoice+1;
         $query3  = "UPDATE companyfile SET next_invoice ='$next_invoice' WHERE company <>' '";
         $result3 = mysql_query($query3);
      }

      //echo"<hr>";
      //The bottom line
      //echo"<table>";   
      $tot = number_format($tot);
      //echo"<tr>";
      //echo"<td width ='320' align ='left'>";

      //echo"</td>";      
      //echo"<td width ='200'>";
      //echo"</td>";      
      //echo"<td width ='150'><b>";      
      
      //echo"</b></td>";      
      //echo"<td width ='100' align ='right'>";      
      //echo"</td>";      
      //echo"<td width ='200' align ='right'>";      
      //echo"Invoice Total Due";      
      //echo"</td>";      
      //echo"<td width ='100' align ='right'><b>$rates3</b></td>";      
      //echo"<td width ='50'></td>";
      //echo"</tr>";   
      //echo"</table>";
      //echo"<hr>";
//echo $mytot;
//echo"<br>";
//echo $rates3;
$rates3 = number_format($mytot);
      //$rates3 = $mytot;
      
      //Now go and get non-chargables
      //-----------------------------
//$query = "SELECT service, COUNT(qty) FROM htransf WHERE invoice_no =' ' AND patients_name ='$patient1' and trans_type<>'Yes' GROUP BY service"; 	 
//$result = mysql_query($query) or die(mysql_error());

// Print out result
//echo"<table><tr>";
//while($row = mysql_fetch_array($result)){
	//echo "<tr><td width ='300'>";
      //  echo $row['service'];
    //    echo"</td><td width = '10'>";
     //   echo $row['COUNT(qty)'];
     //   echo"</td></tr>";
//}
//echo"</table>";




echo"<a href ='home.php'><h1>Go to Dashboard</h1></a>";




}
?>

</body>
</html>