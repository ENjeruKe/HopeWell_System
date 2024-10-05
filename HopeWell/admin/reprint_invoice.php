<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>


<?php
$finalise ='No';
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 $go_on ='Yes';
 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";
 $go_on = 'No';
 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
 $date = date('y-m-d');


$finalise ='No';

   //$finalise_date =$_GET['date'];
   $invoice_no = $_GET['accounts3'];
   //$user = "hmisglobal";   
   //$pass = "jamboafrica";   
   //$database = "hmisglob_griddemo";   
   //$host = "localhost";   
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
   //mysql_select_db($database) or die ("Unable to select the database");
   
   $mm = $_GET['accounts3'];
 
   $query= "SELECT * FROM htransf WHERE invoice_no ='$invoice_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;


   $SQL= "SELECT * FROM htransf WHERE invoice_no ='$invoice_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $ok ='No';   
   while ($row=mysql_fetch_array($hasil)) 
    {  
    $patient     = mysql_result($result,$i,"patients_name");  
    $reg_no      = mysql_result($result,$i,"adm_no");  
    $adm_no      = mysql_result($result,$i,"adm_no");  
    $i++;      
    }

   //Get invoice Date
   //----------------
   $SQL= "SELECT * FROM hdnotef WHERE invoice_no ='$invoice_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $result =mysql_query($SQL, $connect) or die(mysql_error());
   $id = 0;
   $i= 0;
   $nRecord = 1;
   $No = $nRecord;
   $ok ='No';   
   while ($row=mysql_fetch_array($hasil)) 
    {  
    $name           = mysql_result($result,$i,"patients_name");
    $companys           = mysql_result($result,$i,"pay_account");
    $mydate         = mysql_result($result,$i,"date");
    $myadm_date     = mysql_result($result,$i,"adm_date");
    $mydis_date     = mysql_result($result,$i,"disch_date");  
    $timew     = mysql_result($result,$i,"time");  
   // $less_days1 = mysql_result($result,$i,"days_out"); 
    
    $i++;      
    }

   //Get the numbet of Days used
   //---------------------------
   $query= "UPDATE companyfile SET adm_today ='$myadm_date', today ='$mydis_date'"; 
   $result =mysql_query($query);
   //-------------------------------
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

     $adm_date    = mysql_result($result,$i,"adm_today");   
     $disch_date= mysql_result($result,$i,"today");   
     }

   $next_invoice = $invoice_no;


   $query= "SELECT * FROM appointmentf where adm_no = '$adm_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   $nhif_no =' ';

   $SQL= "SELECT * FROM appointmentf where adm_no = '$adm_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
     {         
     $adm_no      = mysql_result($result,$i,"adm_no");  
   //$name    = mysql_result($result,$i,"patients_name");   
     //$adm_date    = mysql_result($result,$i,"adm_date");   
     $bed_no    = mysql_result($result,$i,"bed_no");        
     //$disch_date= mysql_result($result,$i,"disch_date");   
     //$companys= mysql_result($result,$i,"pay_account");   
     $inv_adm_date = mysql_result($result,$i,"adm_date");   
     $inv_dis_date = mysql_result($result,$i,"dis_date");   
  //   $bed_rate     = mysql_result($result,$i,"doctor");    
 //    $less_days = 0;
     $nhif_no = mysql_result($result,$i,"nhif_no");    
     }
     
     $adm_date = strtotime($adm_date);
     $disch_date= strtotime($disch_date);
     $patients = $patients_name;




     //$adm_date = strtotime($adm_date);
     //$disch_date= strtotime($disch_date);
     //$dis_dates= strtotime($dis_dates);
     


$mm= $disch_date - $adm_date;
$days = ($mm/86400);
if ($mm <0){
   $days = 0;
}
      //Now put the heading
      //-------------------
     // echo"<table width ='100%' border ='0' margin='0'><td align ='left'><img //src='king_david_hospital1a.jpg' alt='statement' width ='915'></td//></table>";      
      
 

  echo"<table width ='100%'><td align ='center'><img src='images/heading.jpg' alt='statement' 
      height='200' width='800'></td></table><br><br>";
      
      
      echo"<h2><u>FINAL INVOICE</u></h2><br>";
      
echo "<hr>";


    //  $mydate = date('d-m-y');
      $inv_no =$ref_no;
      echo"<font size ='2'>";
      echo"<table width ='900'>"; 
      //if ($finalise=='Yes'){     
        echo"<tr><td align ='left' width ='350'><b><u>PATIENTS NAME</u></b></td><td width ='400' align ='right'><b>Invoice No:</b></td><td align 
      ='right'>";
         echo $invoice_no;
      echo"</td></tr>";
      echo"<tr><td align ='left' width ='350'>$name</td><td width ='400' align ='right'><b>Invoice Date:</b></td><td align ='right'>$mydate&nbsp&nbsp$timew</td>  
      </tr>";
      echo"<tr><td align ='left' width ='350'></td><td width ='400' align ='right'><b>File No:</b></td><td align ='right'>$adm_no   
      </td></tr>";
$sDate = date("d-m-y",$adm_date);
$dDate = date("d-m-y",$disch_date);
      echo"<tr><td align ='left' width ='350'><b>Paying A/c</b><br>$companys</td><td width ='350' align ='right'><b>Membership No:</b></td>";
     // if ($inv_dis_date=='0000-00-00 00:00:00'){
          //
      //}else{
      echo"<td width ='400' align ='right'>$nhif_no</td><td align ='right'></td></tr>";
      //}
      if ($inv_dis_date=='0000-00-00 00:00:00'){
          //
      }else{
      echo"<tr><td width ='400' align ='right'><b>Discharge Date:</b></td><td align ='right'>";
          echo $mydis_date;
      }

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






   //Change to the old format use the revenue file to group items   
   //------------------------------------------------------------
//   $query3 = "SELECT * FROM glaccountsf" or die(mysql_error());
//   $result3 =mysql_query($query3) or die(mysql_error());
//   $num3 =mysql_numrows($result3) or die(mysql_error());
//   $tot =0;
//   $i3 = 0;
//   while ($i3 < $num3)
//      {
//      $item     = mysql_result($result3,$i3,"account_name");  
//      //Search this item in htransf
//      //---------------------------
      $today = date('y/m/d');
      $bbf = substr("$invoice_no",0,1);
      //echo 'hee-'.$bbf;
if($bbf=='K'){
    
    
//-------------------------------------------------------------------------


   $query3 = "DROP TABLE IF EXISTS newhmisc_trinity.xyz6";
   $result3 =mysql_query($query3) or die(mysql_error());
   
   $query3 = "CREATE TABLE xyz6 LIKE htransf";
   $result3 =mysql_query($query3) or die(mysql_error());


   $query13 = "insert into xyz6 select * from htransf where adm_no ='$adm_no' and invoice_no ='$invoice_no'";
   $result13 =mysql_query($query13) or die(mysql_error());


   //$query3 = "SELECT * FROM glaccountsf" or die(mysql_error());
   $query3 = "SELECT trans2 FROM xyz6 GROUP BY trans2" or die(mysql_error()); 
   //A33989
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $tot =0;
   $i3 = 0;
   while ($i3 < $num3)
      {
      $item     = mysql_result($result3,$i3,"trans2");  

//-------------------------------------------------------------------------
      $query= "SELECT * FROM htransf WHERE invoice_no ='$invoice_no'  ORDER BY trans2,date" or 
      die(mysql_error());
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
    //  $tot =0;
      $i = 0;
      $SQL = "SELECT * FROM htransf WHERE invoice_no ='$invoice_no' ORDER BY trans2,date"  or die(mysql_error());

      $hasil=mysql_query($SQL, $connect);
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $desc2 =' ';
      $print='yes';
      //$rates = 0;
      $ratesz = 0;
      $count = 0;
      $group_t = 0;
      $group_all  = 0;
      $found = 'No';
      $trans_type='Yes';
      while ($row=mysql_fetch_array($hasil)) 
         { 
             
             
             
         $item_search  = mysql_result($result,$i,"trans2");         
         $trans_type   = mysql_result($result,$i,"trans_type");         
         
         //if item found
         //-------------
         if ($item==$item_search and $trans_type<>'RC'){
         //if ($trans_type=='Yes'){
            $patient      = mysql_result($result,$i,"patients_name");         
            $codes   = "";  
            $desc        = mysql_result($result,$i,"patients_name");  
            $group       = mysql_result($result,$i,"trans_type");         
            $rate        = mysql_result($result,$i,"amount");   
            $drug_rate        = mysql_result($result,$i,"amount");   
            //$group_t     = mysql_result($result,$i,"amount");   
            $code        = mysql_result($result,$i,"doc_no");   
            $update      = mysql_result($result,$i,"service");  
            $contact     = mysql_result($result,$i,"date"); 
            $amount      = mysql_result($result,$i,"amount");    
            $type        = mysql_result($result,$i,"type");  
            $pay_company = mysql_result($result,$i,"company");  
            $ledger = mysql_result($result,$i,"ledger");  
            $adm_no      = mysql_result($result,$i,"adm_no");  
            $reg_no      = mysql_result($result,$i,"adm_no");  
            $qty         = mysql_result($result,$i,"qty");  
            $item_search2  = mysql_result($result,$i,"trans2");
            $inv_ref = mysql_result($result,$i,"invoice_no");
            $ref_codec =substr($inv_ref,0,1);
            if ($ref_codec=='K'){
            }else{
                $rate = $rate/$qty;
            }
//echo $item_search2;
     
            //$ratesz = $ratesz+$amount;
            
            $street  = " ";  
            $pay_mode= " ";  
            $codes2 = $rate; 
            if ($qty=='0'){
               $qty = 1;
            }
            //$ratesz = $amount;
         
            $codes2 = $rate*$qty;
            
            $ratesz = $ratesz + $codes2;
            //$amount = $amount; 
            $update2 = $codes2; 
            $tot = $tot +$update2;
            //$update2 = number_format($update2);
            //-----------------------------
            //$rate = number_format($rate);
            
            //$rate = number_format($codes2);
            $rates = $codes2;
            
            $group_t       = $group_t + $amount;
            //  $group_t       = $group_t + $amount;
          //$group_all     = $group_all + $amount;
            $found = 'Yes';
            $desc2  = $desc;
            $rates  = $rates + $amount;
            $rates2 = $rates;
            //$rates3 = number_format($rates2);        
            $rates3 = $rates;
            echo"<table class='altrowstable' id='alternatecolor'>";
            echo"<tr bgcolor ='white'>";
            echo"<td width ='100' align ='left'>";      
            echo"$contact";
            echo"</td>";
            echo"<td width ='300' align ='left'>";      
            echo"$update";
            echo"</td>";
            echo"<td width ='150' align ='left'>";      

echo $code;            

         // if ($item_search2=='PHARMACY DRUGS'){
         //      echo $rate."x"."$qty";
         //   }else{
         //      echo $rate."x"."$qty";
         //   }
            echo"</td>";
            echo"<td width ='50' align ='left'>";      
            echo"$type";
            echo"</td>";
            $rate3sq = number_format($codes2);
            echo"<td width ='55' align ='right'>";      
            if ($rate >0){
               echo"$rate3sq";
            }
            echo"</td>";
            echo"<td width ='45' align ='right'>";      
            echo"</td>";
            echo"<td width ='50' align ='right'>";
            if ($rate <0){
               echo"$rate3sq";
            }
            echo"</td>";
            $rate3ss = number_format($ratesz);
            echo"<td width ='100' align ='right'>$rate3ss</td>";
            echo"</tr>";            
            $desc2 = $desc;         
            echo"</table>";
            //return here
            $group2= $group;
            $count++;
       }
     //End bra-3

         $i++;      
     }
    //End bra-2

$group_t = $ratesz;

      // No Display of  sub-total even if zero
      //---------------------
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
         $group_t =0;
      }
  
//echo $tot;


     //We are moving to the next item in revenue file
     //------------------------------------------------
     //if it is the same item skip
     //---------------------------
     //}

//You can change this if need be for Chiromo format
//-------------------------------------------------
     $i3++;      
   }



//Now go and put bed Charge
//--------------------------

//Convert them to timestamps.
$dis_date = date('y-m-d');
//
//$date1Timestamp = strtotime($adm_date);
//$date2Timestamp = strtotime($dis_dates);

//echo $rates2;
//----------------------------


//Calculate the difference.
//$difference = $date2Timestamp - $date1Timestamp;
//$days = ($difference/86400);
//echo $days;
if ($less_days1<>0){
   $less_days =  $less_days1;
}
if ($bed_rate1<>0){
   $bed_rate = $bed_rate1;
}
$days = round($days);
$days = $days+1-$less_days;
$amount = $bed_rate*$days;
$mytot = $rates2+$amount;
$rates2 = $rates2+$amount;



//$mytot = $mytot+$amount;
$rate3s = number_format($mytot);
$amounts = number_format($amount);
//Testing to see echo $rates2;
//----------------------------

//here33
 if ($inv_dis_date=='0000-00-00 00:00:00'){
     //
}else{
            echo"<table class='altrowstable' id='alternatecolor'>";
            echo"<tr bgcolor ='white'>";
            echo"<!--td width ='100' align ='left'>";      
            //echo $dis_date;
            echo $mydis_date;
            echo"</td>";
            echo"<td width ='300' align ='left'>";      
            echo"Daily Bed Charge @".$bed_rate;
            echo"</td>";
            echo"<td width ='150' align ='left'>";      
            echo "x ".$days.' days';            
            echo"</td>";
            echo"<td width ='50' align ='left'>";      
            echo"";
            echo"</td>";
            echo"<td width ='50' align ='right'>";      
            echo $amounts;
            echo"</td>";
            echo"<td width ='50' align ='right'>";      
            //echo"$qty";
            echo"</td>";

            echo"<td width ='50' align ='right'></td>";
            echo"<td width ='100' align ='right'>$rate3s</td-->";
            echo"</tr></table>";
}            
//End of bed charge



      $rates3 = $mytot;
      //number_format($mytot);       
      //-----------------------------
//                  $tot = $tot +$update2;

      $tot = number_format($tot);
      echo'<br><br><br>';
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         echo"<table border ='0'><td width ='800' align='right'><b>INVOICE TOTAL DUE</b></td><td width ='75' align ='right'><b>$tot</td></table>";
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";




echo"Patient's Name _______________________________<br><br>";
echo"Signature.__________________________<br><br>";
echo"Date: _______/_____/___________";

}else{
  
    
    
    
          $query= "SELECT * FROM htransf WHERE invoice_no ='$invoice_no'  ORDER BY trans2,date" or 
      die(mysql_error());
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $tot =0;
      $i = 0;
      $SQL = "SELECT * FROM htransf WHERE invoice_no ='$invoice_no' ORDER BY trans2,date"  or die(mysql_error());

      $hasil=mysql_query($SQL, $connect);
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $desc2 =' ';
      $print='yes';
      //$rates = 0;
      $ratesz = 0;
      $count = 0;
      $group_t = 0;
      $group_all  = 0;
      $found = 'No';
      $trans_type='Yes';
      while ($row=mysql_fetch_array($hasil)) 
         { 
             
             
             
         $item_search  = mysql_result($result,$i,"trans2");         
         $trans_type   = mysql_result($result,$i,"trans_type");         
         
         //if item found
         //-------------
        // if ($item==$item_search and $trans_type<>'RC'){
         //if ($trans_type=='Yes'){
            $patient      = mysql_result($result,$i,"patients_name");         
            $codes   = "";  
            $desc        = mysql_result($result,$i,"patients_name");  
            $group       = mysql_result($result,$i,"trans_type");         
            $rate        = mysql_result($result,$i,"amount");   
            $drug_rate        = mysql_result($result,$i,"amount");   
            //$group_t     = mysql_result($result,$i,"amount");   
            $code        = mysql_result($result,$i,"doc_no");   
            $update      = mysql_result($result,$i,"service");  
            $contact     = mysql_result($result,$i,"date"); 
            $amount      = mysql_result($result,$i,"amount");    
            $type        = mysql_result($result,$i,"type");  
            $pay_company = mysql_result($result,$i,"company");  
            $ledger = mysql_result($result,$i,"ledger");  
            $adm_no      = mysql_result($result,$i,"adm_no");  
            $reg_no      = mysql_result($result,$i,"adm_no");  
            $qty         = mysql_result($result,$i,"qty");  
            $item_search2  = mysql_result($result,$i,"trans2");
            $inv_ref = mysql_result($result,$i,"invoice_no");
            $ref_codec =substr($inv_ref,0,1);
            if ($ref_codec=='K'){
            }else{
                $rate = $rate/$qty;
            }
//echo $item_search2;
     
            //$ratesz = $ratesz+$amount;
            
            $street  = " ";  
            $pay_mode= " ";  
            $codes2 = $rate; 
            if ($qty=='0'){
               $qty = 1;
            }
            //$ratesz = $amount;
         
            $codes2 = $rate*$qty;
            
            $ratesz = $ratesz + $codes2;
            //$amount = $amount; 
            $update2 = $codes2; 
            $tot = $tot +$update2;
            //$update2 = number_format($update2);
            //-----------------------------
            //$rate = number_format($rate);
            
            //$rate = number_format($codes2);
            $rates = $codes2;
            
            $group_t       = $group_t + $amount;
            //  $group_t       = $group_t + $amount;
          //$group_all     = $group_all + $amount;
            $found = 'Yes';
            $desc2  = $desc;
            $rates  = $rates + $amount;
            $rates2 = $rates;
            //$rates3 = number_format($rates2);        
            $rates3 = $rates;
            echo"<table class='altrowstable' id='alternatecolor'>";
            echo"<tr bgcolor ='white'>";
            echo"<td width ='100' align ='left'>";      
            echo"$contact";
            echo"</td>";
            echo"<td width ='300' align ='left'>";      
            echo"$update";
            echo"</td>";
            echo"<td width ='150' align ='left'>";  

       echo $code;

    
     //       if ($item_search2=='PHARMACY DRUGS'){
    ///           echo $rate."x"."$qty";
     //       }else{
     //          echo $rate."x"."$qty";
     //       }
            echo"</td>";
            echo"<td width ='50' align ='left'>";      
            echo"$qty";
            echo"</td>";
            $rate3sq = number_format($codes2);
            echo"<td width ='55' align ='right'>";      
            //if ($rate >0){
               echo"$rate";
           // }
            echo"</td>";
            echo"<td width ='90' align ='right'>";      
             if ($rate >0){
               echo"$rate3sq";
            }
           echo"</td>";
            echo"<td width ='50' align ='right'>";
            if ($rate <0){
               echo"$rate3sq";
            }
            echo"</td>";
            $rate3ss = number_format($ratesz);
            echo"<td width ='60' align ='right'>$rate3ss</td>";
            echo"</tr>";            
            $desc2 = $desc;         
            echo"</table>";
            //return here
            $group2= $group;
            $count++;
       //}
     //End bra-3

         $i++;      
     }
    //End bra-2

$group_t = $ratesz;

      // No Display of  sub-total even if zero
      //---------------------
//   if ($group_t <> 0){
         $mytot = $rates2;
         $group_t2 = number_format($group_t);
         //$rates2 = $rates2+$group_t;
         //echo $rates2;


//         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
//         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
//         echo"<table border ='0'><td width ='800' align='right'><b>$item_search2</b></td><td width ='95' align ='right'><b>$group_t2</td></table>";
//echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
 //        src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
 //        $group_t =0;
//}
  
//echo $tot;


     //We are moving to the next item in revenue file
     //------------------------------------------------
     //if it is the same item skip
     //---------------------------
     //}

//You can change this if need be for Chiromo format
//-------------------------------------------------
//     $i3++;      
 //  }



//Now go and put bed Charge
//--------------------------

//Convert them to timestamps.
$dis_date = date('y-m-d');
//
//$date1Timestamp = strtotime($adm_date);
//$date2Timestamp = strtotime($dis_dates);

//echo $rates2;
//----------------------------


//Calculate the difference.
//$difference = $date2Timestamp - $date1Timestamp;
//$days = ($difference/86400);
//echo $days;
if ($less_days1<>0){
   $less_days =  $less_days1;
}
if ($bed_rate1<>0){
   $bed_rate = $bed_rate1;
}
$days = round($days);
$days = $days+1-$less_days;
$amount = $bed_rate*$days;
$mytot = $rates2+$amount;
$rates2 = $rates2+$amount;



//$mytot = $mytot+$amount;
$rate3s = number_format($mytot);
$amounts = number_format($amount);
//Testing to see echo $rates2;
//----------------------------

//here33
 if ($inv_dis_date=='0000-00-00 00:00:00'){
     //
}else{
            echo"<table class='altrowstable' id='alternatecolor'>";
            echo"<tr bgcolor ='white'>";
            echo"<!--td width ='100' align ='left'>";      
            //echo $dis_date;
            echo $mydis_date;
            echo"</td>";
            echo"<td width ='300' align ='left'>";      
            echo"Daily Bed Charge @".$bed_rate;
            echo"</td>";
            echo"<td width ='150' align ='left'>";      
            echo "x ".$days.' days';            
            echo"</td>";
            echo"<td width ='50' align ='left'>";      
            echo"";
            echo"</td>";
            echo"<td width ='50' align ='right'>";      
            echo $amounts;
            echo"</td>";
            echo"<td width ='50' align ='right'>";      
            //echo"$qty";
            echo"</td>";

            echo"<td width ='50' align ='right'></td>";
            echo"<td width ='100' align ='right'>$rate3s</td-->";
            echo"</tr></table>";
}            
//End of bed charge



      $rates3 = $mytot;
      //number_format($mytot);       
      //-----------------------------
//                  $tot = $tot +$update2;

      $tot = number_format($ratesz);
      echo'<br><br><br>';
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         echo"<table border ='0'><td width ='800' align='right'><b>INVOICE TOTAL DUE</b></td><td width ='75' align ='right'><b>$tot</td></table>";
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";

echo'<br><br><br><br><br><br><br>';

echo'Patient/Guardians Name<br><br>__________________________________________Signature_________________________________________Date________/______/________';

    
    
    
}      



//}
die();
?>

<!--/body>
</html-->

















<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$invoice_nos =    $_SESSION["invoice_no"];
?>

<?php
$finalise ='No';
?>

<html>
    
</head>
<body> 


<?php
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 $go_on ='Yes';
 $go_on = 'No';
  
 $date = date('y-m-d');

//echo 'Reprinting'. $invoice_nos;

$finalise ='No';

   //$finalise_date =$_GET['date'];
   $invoice_no = $_GET['accounts3'];
  // echo $invoice_no; 
   $mm = $_GET['accounts3'];
   if ($invoice_nos<>''){
      $query= "SELECT * FROM htransf WHERE invoice_no ='$invoice_no'" or die(mysql_error());
   }else{
      $query= "SELECT * FROM htransf WHERE invoice_no ='$invoice_no'" or die(mysql_error());
   }
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
//echo'E1';
   if ($invoice_nos<>''){
      $SQL= "SELECT * FROM htransf WHERE invoice_no ='$invoice_no'" or die(mysql_error());
   }else{
      $SQL= "SELECT * FROM htransf WHERE invoice_no ='$invoice_no'" or die(mysql_error());
   }
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $ok ='No';   
   while ($row=mysql_fetch_array($hasil)) 
    {  
    $patient     = mysql_result($result,$i,"patients_name");  
    $reg_no      = mysql_result($result,$i,"adm_no");  
    $adm_no      = mysql_result($result,$i,"adm_no");  
    $invoice_no  = mysql_result($result,$i,"invoice_no");  
    $i++;      
    }

   $today = date('y/m/d');
   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
//echo'E2';
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
     }

     $company     = '';  
     $address1    = '';   
     $address2    = '';   
     $address3    = '';   

   $next_invoice = $invoice_no;

   $query= "SELECT * FROM appointmentf where adm_no = '$adm_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
//echo'E3';
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
     $bed_no    = mysql_result($result,$i,"bed_no");        
     $disch_date= mysql_result($result,$i,"disch_date");   
     $pay_account= mysql_result($result,$i,"payer");   
     $inv_adm_date = mysql_result($result,$i,"adm_date");   
     $inv_dis_date = mysql_result($result,$i,"dis_date");   

     }
     
     $show_it = 'Yes';
     $adm_date = strtotime($adm_date);
     $disch_date= strtotime($disch_date);
     if ($inv_dis_date=='0000-00-00 00:00:00'){
         $show_it = 'No';
     }
      //Now put the heading
      //-------------------
      echo"<p align ='center'><img src='chiromo-logo.jpg' alt='statement' height='120' width='600'>
      </p>";
      echo"<br><br><br>";
      echo"<h2><u><p align ='center'>FINAL INVOICE</p></u></h2>";
      $inv_no ='O'.$next_invoice;
      echo"<font size ='2'>";
      echo"<table width ='900' width ='2'>"; 
      echo"<tr><td align ='left'><b>Invoice No:</b></td><td width ='250' align ='left'>$inv_no</td><td width ='50'></td><td align ='left'><b>$company</b></td></tr>";
      echo"<tr><td align ='left' width ='50'><b>File No:</b></td><td width ='250' align ='left'>$adm_no</b></td><td width ='50'></td><td align ='left'><b></b></td></tr>";
      echo"<tr><td align ='left' width ='100'><b>Patients Name:</b></td><td width ='250' align ='left'>$patients_name</td><td width ='50'></td><td align ='left'><b>$address1</b>   
      </td></tr>";
      echo"<tr><td align ='left'><b>Paying A/c</b></td><td width ='250' align ='left'>$pay_account</b></td><td width ='50'></td><td align ='left'><b>$address2</b>
      </td></tr>";
      if ($show_it = 'No'){
          echo"<tr><td align ='left'><b>Inv Date : </b>"; 
      echo date("j F Y", $adm_date);
      echo"</td><td width ='250' align ='left'>";
      echo"</td><td width ='50'></td><td align ='left'></td></tr>";
      }else{
      echo"<tr><td align ='left'><b>Adm Date : </b>"; 
      echo date("j F Y", $adm_date);
      echo"</td><td width ='250' align ='left'><b>To -:</b>";
      echo date("j F Y", $disch_date);
      echo"</td><td width ='50'></td><td align ='left'><b>$address3</b></td></tr>";
      echo"<tr><td align ='left'><b>Bed No : $bed_no</b></td><td width ='250'></td><td width ='50'></td><td align ='left'></td></tr>";
      }
      echo"</table>";
      $to ='  To  ';
      
      echo"<hr>";


echo"<div><b>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:170px;height:2px;'>";
echo"Ref No.<img src='space.jpg' style='width:120px;height:2px;'>";
echo"Qty<img src='space.jpg' style='width:50px;height:2px;'>";
echo"<img src='space.jpg' style='width:10px;height:2px;'>";
echo"Debit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Credit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:1px;height:2px;'>";
echo"</b></div><br>";

echo"<hr>";

   $item_search ='';





//------here-----
   //use the revenue file to group items   
   //-------------------------------------
   


//--------------------------------------------------------------------   
//   $query3 = "SELECT * FROM glaccountsf" or die(mysql_error());
//$result3 =mysql_query($query3) or die(mysql_error());
//   $num3 =mysql_numrows($result3) or die(mysql_error());
//   $tot =0;
//   $i3 = 0;
//   while ($i3 < $num3)
//      {
//---------------------------------------------------------------------
//---------------
   $query3 = "DROP TABLE IF EXISTS selfcare_kingdavid.xyz6";
   $result3 =mysql_query($query3) or die(mysql_error());
   
   $query3 = "CREATE TABLE xyz6 LIKE htransf";
   $result3 =mysql_query($query3) or die(mysql_error());


   $query13 = "insert into xyz6 select * from htransf where adm_no ='$adm_no' and invoice_no ='$inv_no'";
   $result13 =mysql_query($query13) or die(mysql_error());


   //$query3 = "SELECT * FROM glaccountsf" or die(mysql_error());
   $query3 = "SELECT trans2 FROM xyz6 GROUP BY trans2" or die(mysql_error()); 
   //A33989
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $tot =0;
   $i3 = 0;
   while ($i3 < $num3)
      {
      //$item     = mysql_result($result3,$i3,"account_name");
      $item     = mysql_result($result3,$i3,"trans2");  
      //Search this item in htransf
      //---------------------------
      echo"Here".$item;
      
      $today = date('y/m/d');
      $query= "SELECT * FROM htransf WHERE adm_no ='$adm_no' and invoice_no ='$inv_no' and type <> 'RC' ORDER BY trans2,date" or 
      die(mysql_error());
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $tot =0;
      $i = 0;
      //$SQL = "SELECT * FROM htransf WHERE adm_no ='$adm_no' and invoice_no =' ' and type<>'RC' ORDER BY trans2,date"  or die(mysql_error());

      //$hasil=mysql_query($SQL, $connect);
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $desc2 =' ';
      $print='yes';
      //$rates = 0;
      $count = 0;
      $group_t = 0;
      $group_all  = 0;
      //while ($row=mysql_fetch_array($hasil))
      while ($row=mysql_fetch_array($result)) 
         { 
         $item_search  = mysql_result($result,$i,"trans2");         
         $trans_type  = mysql_result($result,$i,"trans_type");         
         $type  = mysql_result($result,$i,"type");         
         //if item found
         //--------------------------
        //Blocked this one 21/05/2019
        //---------------------------
         if ($item==$item_search and $type<>'RC'){
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
            $amounts      = mysql_result($result,$i,"amount");    
            $type        = mysql_result($result,$i,"type");  
            $pay_company = mysql_result($result,$i,"company");  
            $adm_no      = mysql_result($result,$i,"adm_no");  
            $reg_no      = mysql_result($result,$i,"adm_no");  
            $qty         = mysql_result($result,$i,"qty");  
            $item_search2  = mysql_result($result,$i,"trans2");         
            $street  = " ";  
            $pay_mode= " ";  
            $codes2 = $rate*$qty; 
            if ($update == 'BILL PAYMENT'){
               $amount = $amount*1;
            }else{
               $amount = $amount*$qty;
            }
            $update2 = $codes2; 
            $tot = $tot +$update2;
            //$update2 = number_format($update2);
            //-----------------------------------
            
            
            //$rate = number_format($rate);
            //----------------------------------
            
            
            
            $group_t       = $group_t + $amount;
            //$group_all     = $group_all + $amount;
            $found = 'Yes';
            $desc2  = $desc;
            $rates  = $rates + $amount;
            $rates2 = $rates;
            //$rates3 = number_format($rates2);  
            $rates3 = $rates2;
            
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
            echo $qty.'x'.$amounts;
            echo"</td>";
            echo"<td width ='55' align ='right'>";      
            if ($rate >0){
               echo"$amount";
            }
            echo"</td>";
            echo"<td width ='45' align ='right'>";      
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
       }
     //End bra-3

         $i++;      
     }
    //End bra-2
      // Display the sub-total even if zero
      //---------------------
      if ($found == 'Yes'){
         //$group_t <> 0)
         $group_t2 = number_format($group_t);
         $rates2 = $rates2+$group_t;
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         echo"<table border ='0'><td width ='800' align='right'><b>$item_search2</b></td><td width ='75' align ='right'><b>$group_t2</td></table>";
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         $group_t =0;
         $found = 'No';
     }
     //We are moving to the next item in revenue file
     //------------------------------------------------
     //if it is the same item skip
     //---------------------------
     //}

//End of Grouping
//---------------
     $i3++;      
   }
//---------------

//End bra-1



      if ($finalise=='No')
      { 
//bra-1a
         //Viewing interim 
         $query= "SELECT * FROM htransf WHERE invoice_no ='$invoice_no'  AND type ='RC' ORDER BY date";
         $result =mysql_query($query) or die(mysql_error());
         $num =mysql_numrows($result) or die(mysql_error());
         $tot =0;
         $i = 0;
         $SQL = "SELECT * FROM htransf WHERE invoice_no ='$invoice_no' AND type ='RC' ORDER BY date";
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
            $patient     = mysql_result($result,$i,"patients_name");         
            $codes   = "";  
            $desc        = mysql_result($result,$i,"patients_name");  
            $group       = mysql_result($result,$i,"trans_type");         
            $rate        = mysql_result($result,$i,"amount");   
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
            //$update2 = number_format($update2);
            
            
            
            //$rate = number_format($rate);
            
            $group_t       = $group_t + $amount;
            $desc2  = $desc;
            $rates  = $rates + $amount;
            $rates2 = $rates;
            $rates3 = number_format($rates2);     
           // $rates3 = $rate2;
            
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
            echo"<td width ='100' align ='right'>$rates3</td>";
            echo"</tr>";
            $i++;
         }
      }
      $total_rc = number_format($total_rc);
      //if ($total_rc <> 0){
      //   echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
      //   <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
      //   echo"<table border ='0'><td width ='800' align='right'><b>SUB-TOTAL</b></td><td width ='75' align ='right'>
//<b>$total_rc</td></table>";
      //   echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
      //   src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";

      //   $group_t =0;
      //}
      
      $query3  = "UPDATE dtransf SET amount ='$rates2',balance ='$rates2' WHERE doc_no ='$invoice_no'";
         $result3 = mysql_query($query3);     
       
      $tot = number_format($tot);
      echo'<br><br><br>';
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         echo"<table border ='0'><td width ='800' align='right'><b>INVOICE TOTAL DUE</b></td><td width ='75' align ='right'><b>$ratesz</td></table>";
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";


//}
?>

</body>
</html>