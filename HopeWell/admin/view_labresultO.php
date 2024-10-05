<?php
session_start();
?>
﻿<?php
 require('open_database.php');

 $branch     = $_SESSION['branch']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 if (isset($_GET['accounts3'])){
    $ref_no = $_GET['accounts3'];
   $SQL= "SELECT * FROM medicalfile where ref_no ='$ref_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   $query= "SELECT * FROM medicalfile where ref_no ='$ref_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;

   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      { 
      $id      = mysql_result($result,$i,"adm_no");          
      $adm_no  = mysql_result($result,$i,"adm_no");          
      $doctor  = mysql_result($result,$i,"doctor");   
      $appointment = mysql_result($result,$i,"date");   
      $name        = mysql_result($result,$i,"name");   
      $date        = mysql_result($result,$i,"date");  
      $telephone   = mysql_result($result,$i,"description");  
      $status      = mysql_result($result,$i,"status");  
      $sex         = mysql_result($result,$i,"sex");
      $weight      = mysql_result($result,$i,"weight");
      $height      = mysql_result($result,$i,"height");
      $temp         = mysql_result($result,$i,"temp");
      $b_p         = mysql_result($result,$i,"b_p");
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"gl_account");  
      $textarea    = mysql_result($result,$i,"notes");  
      $ref_nos     = mysql_result($result,$i,"ref_no");  
      $time        = '';  
      $email       = '';  
      $image_id = ''; 
      $sign1       = mysql_result($result,$i,"sign1");  
      $sign2       = mysql_result($result,$i,"sign2"); 
      $sign3       = mysql_result($result,$i,"sign3"); 
      $diag1       = mysql_result($result,$i,"diag1"); 
      $diag2       = mysql_result($result,$i,"diag2"); 

      $test1       = mysql_result($result,$i,"test1");  
      $test1_qty   = 1; 
      $test1_results  = mysql_result($result,$i,"test1_result"); 
      $test2       = mysql_result($result,$i,"test2");  
      $test2_qty   = 1; 
      $test2_results  = mysql_result($result,$i,"test2_result"); 
      $test3       = mysql_result($result,$i,"test3");  
      $test3_qty   = 1; 
      $test3_results  = mysql_result($result,$i,"test3_result"); 

      $test4       = mysql_result($result,$i,"test4");  
      $test4_qty   = 1; 
      $test4_results  = mysql_result($result,$i,"test4_result"); 

      $test5       = mysql_result($result,$i,"test5");  
      $test5_qty   = mysql_result($result,$i,"test5_qty"); 
      $test5_results  = mysql_result($result,$i,"test5_result"); 

      $drug1       = mysql_result($result,$i,"med1");  
      $drug1_qty   = mysql_result($result,$i,"med1_qty"); 
      $drug1_dx    = mysql_result($result,$i,"med1_dx");  
      $drug1_dx2   = mysql_result($result,$i,"med1_dx2");  
  
      $drug2       = mysql_result($result,$i,"med2");  
      $drug2_qty   = mysql_result($result,$i,"med2_qty"); 
      $drug2_dx    = mysql_result($result,$i,"med2_dx");  
      $drug2_dx2   = mysql_result($result,$i,"med2_dx2");  

      $drug3       = mysql_result($result,$i,"med3");  
      $drug3_qty   = mysql_result($result,$i,"med3_qty"); 
      $drug3_dx    = mysql_result($result,$i,"med3_dx"); 
      $drug3_dx2   = mysql_result($result,$i,"med3_dx2");  
 
      $drug4       = mysql_result($result,$i,"med4");  
      $drug4_qty   = mysql_result($result,$i,"med4_qty"); 
      $drug4_dx    = mysql_result($result,$i,"med4_dx"); 
      $drug4_dx2   = mysql_result($result,$i,"med4_dx2");  
 
      $drug5       = mysql_result($result,$i,"med5");  
      $drug5_qty   = mysql_result($result,$i,"med5_qty"); 
      $drug5_dx    = mysql_result($result,$i,"med5_dx");
      $drug5_dx2   = mysql_result($result,$i,"med5_dx2");  
  
      $drug6       = mysql_result($result,$i,"med6");  
      $drug6_qty   = mysql_result($result,$i,"med6_qty"); 
      $drug6_dx    = mysql_result($result,$i,"med6_dx");  
      $drug6_dx2   = mysql_result($result,$i,"med6_dx2");  

      $drug7       = mysql_result($result,$i,"med7");  
      $drug7_qty   = mysql_result($result,$i,"med7_qty"); 
      $drug7_dx    = mysql_result($result,$i,"med7_dx");  
      $drug7_dx2   = mysql_result($result,$i,"med7_dx2");  
   $i++;
   }
   //will get information from patients master file later
   //----------------------------------------------------

   //--------------------------------------------
   $query= "SELECT * FROM appointmentf WHERE adm_no ='$adm_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "SELECT * FROM medicalfile WHERE adm_no ='$adm_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   while ($row=mysql_fetch_array($hasil)) 
   {         
      $acc_no      = mysql_result($result,$i,"adm_no");  
      $acc_no2      = mysql_result($result,$i,"adm_no");  
      $acc_name    = mysql_result($result,$i,"name");  
      $caddress1    = mysql_result($result,$i,"telephone");   
      $caddress2    = mysql_result($result,$i,"payer");   
      $sex          = mysql_result($result,$i,"sex");   

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
   echo"<p align ='centre'><h3><u>MEDICAL TESTS RESULTS</u></h3></p>";

   echo"<table width ='100%'><h1>";      
   echo"<tr><td align ='left'><b>Patients Name</b></td><td align ='left'><b>$acc_name</b></td><td width ='100'></td><td align ='right' width ='350'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>Address</b></td><td align ='left'><b>$caddress2</b></td><td width ='100'></td><td align ='right' width ='350'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>Telephone</b></td><td align ='left'><b>$caddress1</b></td><td width ='100'></td><td align ='right' width ='350'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>Payableby</b></td><td align ='left'><b>$caddress1</b></td><td width ='100'></td><td align ='right' width ='350'><b>$address3</b></td></tr>";
   echo"<tr><td>Gender:</td><td align ='left'><b>$sex</b></td><td width ='50'></td><td align ='right'><b>$address4</b></td></tr>";
   echo"</table><br>";
   $to ='  To  ';
  

 

echo"<table width ='100%'><tr><th width ='20' bgcolor ='black' align ='left'><font color ='white'>Test Requested</th><th width ='150' bgcolor ='black' align='left'><font color ='white'>Results</th></tr>";
if ($test1<>''){
   echo"<tr><td width ='150' align ='left'>$test1</td><td width ='550' align ='left'><textarea rows='10' cols='100' style='border:dotted 1px orange;'>$test1_results</textarea></td></tr>";
}
if ($test2<>''){
echo"<tr><td width ='150' align ='left'>$test2</td><td width ='550' align ='left'><textarea rows='10' cols='100' style='border:dotted 1px orange;'>$test2_results</textarea></td></tr>";
}
//if ($test3<>''){
//echo"<tr><td width ='150' align ='left'>$test3</td><td width //='550' align ='left'><texarea rows='10' cols='100' //style='border:dotted 1px orange;'>$test3_results</textarea>
//</td></tr>";
//}
if ($test3<>''){
   echo"<tr><td width ='150' align ='left'>$test3</td><td width ='550' align ='left'><textarea rows='10' cols='100' style='border:dotted 1px orange;'>$test3_results</textarea></td></tr>";
}
if ($test4<>''){
   echo"<tr><td width ='150' align ='left'>$test4</td><td width ='550' align ='left'><textarea rows='10' cols='100' style='border:dotted 1px orange;'>$test4_results</textarea></td></tr>";
}

if ($test5<>''){
echo"<tr><td width ='150' align ='left'>$test5</td><td width ='550' align ='left'><textarea rows='10' cols='100' style='border:dotted 1px orange;'>$test5_results</textarea></td></tr>";
}
echo"</table>";
echo"<hr><br><br>";
}
echo"Prepare by:_______________________________________________ Date:.$today.<br>";
echo"Doctor:___________________________________________________<br><br><br>";

?>