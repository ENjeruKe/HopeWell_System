
<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

 

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  
       <!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
<link href="dcss/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>




<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/report.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	



<?php
   session_start();
require('open_database.php');
$branch = $_SESSION['company'];
?>
<?php
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


<form action ="patient_statement.php" method ="GET">
    

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




 echo"<table width ='400' border='0' border color ='black'><tr><td width ='100' align ='right'><b>Print Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td></tr><tr><td width='150' align='right'><b>File No: </b></td><td><input type='text' name='adm_no' size='20'>";
 
echo"</td></tr></table>";
echo"<br><br>";
echo"<table width ='400' border='0' border color ='black'><td width ='100'></td><td><input type='submit' name='print'  class='button' value='Print Preview'></td><td><input type='submit' name='finalise'  class='button' value='Finalise Now'></td></table>";
echo"</FORM><table width ='400'><td align ='center'></td></table>";

}

if ($finalise=='No' OR $finalise=='Yes'){
   $finalise_date =$_GET['date'];
   $adm_no        =$_GET['adm_no'];
 



   //Checking if Invoice Exist
   $todays =date('y-m-d');
   $query= "UPDATE companyfile SET today ='$finalise_date'"; 
   $result =mysql_query($query);

   //echo $_SESSION['patient'];
   $mm =$_SESSION['patient'];
 
   $query= "SELECT * FROM htransf WHERE adm_no = '$adm_no' and invoice_no =''" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;


   $SQL= "SELECT * FROM htransf WHERE adm_no ='$adm_no' and invoice_no =''" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $ok ='No';   
   $patients =$_SESSION['patient'];
   //echo $patients;
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




   if ($ok=="No"){      
      echo"No Transaction in the given range";
      echo"<table width ='400' border='0' border color ='black'><td width ='100'></td><td><input type='submit' 
      name='print2'  class='button' value='Refresh'></td></table>";
      echo"</FORM><table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' 
      height='100' width='130'></td></table>";
      die();
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
     $disch_date= mysql_result($result,$i,"dis_date");   
     $pay_account= mysql_result($result,$i,"payer");   
     $inv_adm_date = mysql_result($result,$i,"adm_date");   
     $inv_dis_date = mysql_result($result,$i,"dis_date");   
     $bed_rate = mysql_result($result,$i,"doctor"); 
//     $less_days = mysql_result($result,$i,"out_days"); 
     }
 // echo $patients_name;
//echo"<br>";
//echo $adm_date;
//echo"<br>";
   



     if ($finalise=='Yes'){
        if ($disch_date=='0000-00-00 00:00:00'){
            $disch_date = date('y-m-d');
            //echo"<br><br><br><br><br><br><table width ='800' border='0' border //color ='black'><td width ='700'>
            //<h4>Patient NOT yet discharged, please discharge and try again//.....</h4></td><td><input type='submit' 
         //name='print23'  class='button' value='Refresh'></td></table>";
         //echo"</FORM><table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' 
         //height='100' width='130'></td></table>";
         //die();
        }

        if ($pay_account==''){
            $pay_account = $patients_name;
            //echo"<br><br><br><br><br><br><table width ='800' border='0' border //color ='black'><td width ='700'>   
            //<h4>Kindly change the paying Account and try again.....</h4></td//><td><input type='submit' 
         //name='print23'  class='button' value='Refresh'></td></table>";
         //echo"</FORM><table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' 
         //height='100' width='130'></td></table>";
         //die();
     }
    }

//echo $adm_date;

     $adm_date = strtotime($adm_date);
     $disch_date= strtotime($disch_date);
     $dis_dates= strtotime($dis_dates);
     
//echo $adm_date;
//echo $dis_dates;
$mm= $dis_dates - $adm_date;
//echo $mm;

$days = ($mm/86400);
$days = $days++;

      //Now put the heading
      //------------------      
//echo"<table width ='100%' border ='0' margin='0'><td align ='center'><img src='images/letter_head2.jpg' alt='statement' width ='400' height ='80'></td></table>";
      if ($finalise=='Yes'){
         //echo"<h1><u><p align ='center'>FINAL INVOICE</p></u></h1>";
      }else{
         //echo"<h1><u><p align ='center'>INTERIM INVOICE</p></u></h1>";
      }
      $mydate = date('d-m-y');
      $inv_no ='K'.$next_invoice;
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
      echo"<tr><td align ='left' width ='350'>$patients</td><td width ='400' align ='right'><b>Invoice Date:</b></td><td align ='right'>$finalise_date</td>  
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
//      echo"<hr>";


echo"<table width ='100%'><td><img src='images/black-1.jpg' style='width:900px;height:2px;'></td></table>";
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
echo"<table width ='100%'><td><img src='images/black-1.jpg' style='width:900px;height:2px;'></td></table>";

//echo"<hr>";

   $item_search ='';

   //use the revenue file to group items   
   //-------------------------------------
//Start from here
//---------------
   $query3 = "SELECT * FROM glaccountsf" or die(mysql_error());
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $tot =0;
   $i3 = 0;
   while ($i3 < $num3)
      {
      $item     = mysql_result($result3,$i3,"account_name");  
      //Search this item in htransf
      //---------------------------
      $today = date('y/m/d');
      $query= "SELECT * FROM htransf WHERE adm_no ='$adm_no' and invoice_no =' ' ORDER BY trans2,date" or 
      die(mysql_error());
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $tot =0;
      $i = 0;
      $SQL = "SELECT * FROM htransf WHERE adm_no ='$adm_no' and invoice_no =' ' ORDER BY trans2,date"  or die(mysql_error());

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
         if ($item==$item_search and $type<>'RC'){
         //if ($trans_type=='Yes' and $type<>'RC'){
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
            $drug_rate        = mysql_result($result,$i,"amount");   
            $type        = mysql_result($result,$i,"type");  
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
            if ( $type=='RC'){
                $qty = 1;
            }
            //$codes2 = $rate; 
            $codes2 = $rate*$qty;
            $rate   = $rate*$qty;
            $amount = $amount*$qty; 
            $update2 = $codes2; 
            $tot = $tot +$update2;
            $update2 = number_format($update2);
            $ratess = number_format($rate);
            $group_t       = $group_t + $amount;
            //$group_all     = $group_all + $amount;

            $desc2  = $desc;
            $rates  = $rates + $amount;
            $rates2 = $rates;
            $rates3 = number_format($rates2);        
            echo"<table class='altrowstable' id='alternatecolor'>";
            echo"<tr'>";
            echo"<td width ='100' align ='left'>";      
            echo"$contact";
            echo"</td>";
            echo"<td width ='300' align ='left'>";      
            echo"$update";
            echo"</td>";
            echo"<td width ='150' align ='left'>";      
           // if ($item_search2=='PHARMACY DRUGS' or $item_search2=='Pharmacy Drugs'){
               echo $drug_rate."x"."$qty";
            //}else{
            //   echo"$code";
            //}
            echo"</td>";
            echo"<td width ='100' align ='left'>";      
            echo"$type";
            echo"</td>";
            echo"<td width ='60' align ='right'>";      
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
            echo"<td width ='60' align ='right'>";
            if ($rate <0){
               echo"$rate";
            }
            echo"</td>";
            
            echo"<td width ='30' align ='right'></td>";
            
            echo"<td width ='50' align ='right'>$rates3</td>";
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
//----------------------------
//Here again
//----------------------------
     if ($group_t <> 0){
         $mytot = $rates2;
         $group_t2 = number_format($group_t);
         //$rates2 = $rates2+$group_t;
         //echo $rates2;


         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         echo"<table border ='0'><td width ='800' align='right'><b>$item_search2</b></td><td width ='95' align ='right'><b>$group_t2</td></table>";
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";








         //echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         //<img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr>";
         //echo"<tr><td width ='600'></td><td><b>$item_search2<img src='space.jpg' 
         //style='width:60px;height:2px;'>$group_t2</td></tr>";
         //echo"<tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         //src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         $group_t =0;
      }
     //We are moving to the next item in revenue file
     //------------------------------------------------
     //if it is the same item skip
     //---------------------------
     //}

     $i3++;      
   }



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
$days = $days+1;
//echo $days;



//$amount = $bed_rate*$days;
//$mytot = $rates2+$amount;

//$rates2 = $rates2+$amount;

//$mytot = $mytot+$amount;
//$rate3s = number_format($mytot);
//$amounts = number_format($amount);

//            echo"<table class='altrowstable' id='alternatecolor'>";
//            echo"<tr'>";
//            echo"<td width ='100' align ='left'>";      
//            echo $dis_date;
//            echo"</td>";
//            echo"<td width ='300' align ='left'>";      
//            echo"Daily Bed Charge @".$bed_rate;
//            echo"</td>";
//            echo"<td width ='150' align ='left'>";      
//            echo " x ".$days." days";
//            //$bed_rate;            
//            echo"</td>";
//            echo"<td width ='50' align ='left'>";      
//            echo"";
//            echo"</td>";
//            echo"<td width ='50' align ='right'>";      
//            echo $amounts;
//            echo"</td>";
//            echo"<td width ='50' align ='right'>";      
//            //echo"$qty";
//            echo"</td>";

//            echo"<td width ='50' align ='right'></td>";
//            echo"<td width ='100' align ='right'>$rate3s</td>";
//            echo"</tr></table>";
//End of bed charge
//------------------

      if ($finalise=='No'){ 
         //Viewing interim 
         $query= "SELECT * FROM htransf WHERE adm_no ='$adm_no' and invoice_no =' ' ORDER BY    
         date";
         $result =mysql_query($query) or die(mysql_error());
         $num =mysql_numrows($result) or die(mysql_error());
         $tot =0;
         $i = 0;
         $SQL = "SELECT * FROM htransf WHERE adm_no ='$adm_no' and invoice_no =' ' ORDER BY 
         date";
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
               echo"<tr'>";
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
      echo'Get the final Invoice copy from Re-print........';
      }
      $total_rc = number_format($total_rc);
      if ($total_rc <> 0){

         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         echo"<table border ='0'><td width ='800' align='right'><b>SUB-TOTAL</b></td><td width ='75' align ='right'><b>$total_rc</td></table>";
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";


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
         VALUES('','$pay_account','$finalise_date','$desc','$inv_no','$adm_no','TRF','$inv_amt_tot','$inv_amt_tot','ADMIN')";
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
      echo'<br><br><br>';
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         echo"<table border ='0'><td width ='800' align='right'><b>INVOICE TOTAL DUE</b></td><td width ='75' align ='right'><b>$rates3</td></table>";
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
echo"<br><br>";
      //Now go and get non-chargables
      //-----------------------------
//Block summaries
//---------------
//$query = "SELECT service, COUNT(qty) FROM htransf WHERE invoice_no =' ' AND patients_name ='$patient1' and //trans_type<>'Yes' GROUP BY service"; 	 
//$result = mysql_query($query) or die(mysql_error());

// Print out result
//-----------------
//echo"<table><tr>";
//while($row = mysql_fetch_array($result)){
//	echo "<tr><td width ='300'>";
//        echo $row['service'];
//        echo"</td><td width = '10'>";
//        echo $row['COUNT(qty)'];
//        echo"</td></tr>";
//}
//echo"</table>";









}
?>

</body>
</html>













      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->

<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Late',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Ontime',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $ontime; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#00a65a'
  barChartData.datasets[1].strokeColor = '#00a65a'
  barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>




