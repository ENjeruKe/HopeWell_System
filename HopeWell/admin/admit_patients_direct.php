<?php
session_start();
require('open_database.php');
$username = $_SESSION['username'];
$date =$_SESSION['sys_date'];

$adm_time = date("y-m-d g:i:s", strtotime("$date"));
$adm_date = $adm_time;


   //-
   $adm_times = substr($adm_time,9,7);

?>




<!DOCTYPE html>
<html lang="en">
  
<?php

$date =$_SESSION['sys_date'];

$adm_time = date("y-m-d g:i:s", strtotime("$date"));
$adm_date = $adm_time;

if (isset($_GET['accounts']))
   {
      //Get the invoice No.
      $adm_no = $_GET['accounts'];    
      $ref_no        =$_GET['accounts3'];
  
   $query3 = "select * FROM appointmentf where adm_no = '$adm_no'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $name     = mysql_result($result3,$i3,"name");  
     $payer    = mysql_result($result3,$i3,"payer");
     $bed_no   = mysql_result($result3,$i3,"bed_no");
     $ref_no   = mysql_result($result3,$i3,"subchief");
     $i3++;
   }
   if ($payer==''){
      $payer =$name;
   }




   $stops ='No';
   if ($payer==''){
      $stops='Yes';
      echo"<h4><font color ='red'>Please update Paying Account before you can admit the patient...</h4></font>";
      die();
   }
   if ($stop =='Yes'){
      $stops='Yes';
      echo"<h4><font color ='red'>Patient already admited....</font></h4>";
      die();
   }
   if ($bed_no <>''){
      $stops='Yes';
      echo"<h4><font color ='red'>Patient already admited....</font></h4>";
      die();
   }

}

if (isset($_GET['billing']))
   {
      $total = 0;
      //Get the invoice No.
      //here

        //Get data from temp file and save
        $supplier         =$_GET['supplier'];
        $bed              =$_GET['bed'];
        $adm_no           =$_GET['adm_no'];
        $ref_no        =$_GET['ref_no'];
        $date           =$_GET['date'];
        $account        =$_GET['account'];
        $comp           =$_GET['comp'];


        $payer = $account;

$mydate =$_SESSION['sys_date'];

   $stop ='No';

   //Now go and admit patient in beds file
   $query3 = "select * FROM allbedsfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $admited_no   = mysql_result($result3,$i3,"adm_no");   
     if (admited_no==$adm_no){
        $stop ='Yes';
     }
     $i3++;
   }
   //Now go and admit patient in beds file
   $query3 = "select * FROM allbedsfile where bed_no ='$bed'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     //$ward     = mysql_result($result3,$i3,"ward");  
     $bed_no   = mysql_result($result3,$i3,"bed_no");   
     $recno    = mysql_result($result3,$i3,"client_id");
     $rate     = mysql_result($result3,$i3,"rate");
     $ward_bed = $bed_no;
     $update_bed  = $bed_no;      
     $i3++;
   }
   $query  = "UPDATE allbedsfile SET patients_name ='$supplier',adm_no ='$adm_no',visit_no ='$ref_no' WHERE bed_no ='$update_bed'";
   $result = mysql_query($query);

$date =$_SESSION['sys_date'];
$adm_time = date("y-m-d g:i:s", strtotime("$date"));
$adm_date = $adm_time;
   $query3 = "select * FROM appointmentf where adm_no ='$adm_no'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $bed_no   = mysql_result($result3,$i3,"bed_no");   
     $age      =  mysql_result($result3,$i3,"age");   
     $sex      =  mysql_result($result3,$i3,"sex");   
     $b_p      =  mysql_result($result3,$i3,"b_p");   
     $temp     =  mysql_result($result3,$i3,"temp");   
     $weight   =  mysql_result($result3,$i3,"weight");   
     $payer    =  mysql_result($result3,$i3,"payer");   
     $telephone=  mysql_result($result3,$i3,"telephone");   
     $i3++;
   }
   

   //Now go and activate account in medical file
   //-------------------------------------------
   $query3 = "select * FROM medicalfile WHERE ref_no ='$ref_no'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   $exist ='No';
   while ($i3 < $num3)
     {
     $adm_nos   = mysql_result($result3,$i3,"adm_no");
     //if ($adm_nos==$adm_no){
        $exist = 'Yes';
        $invoice   = mysql_result($result3,$i3,"ref_no");
        $diagnosis1= mysql_result($result3,$i3,"diag1");
        $diagnosis2= mysql_result($result3,$i3,"diag2");
        $test1= mysql_result($result3,$i3,"test1");
        $test2= mysql_result($result3,$i3,"test2");
        $test3= mysql_result($result3,$i3,"test3");
        $test4= mysql_result($result3,$i3,"test4");
        $test5= mysql_result($result3,$i3,"test5");
        $notes= mysql_result($result3,$i3,"notes");
     //}
     $i3++;
     }
   //if ($exist=='Yes'){
      $query= "UPDATE medicalfile SET type ='Inpatient',status='To Ward',diag1='Admitted',diag2='$update_bed' WHERE ref_no ='$invoice'";
      $result =mysql_query($query);

   //}
$date =$_SESSION['sys_date'];
$adm_time = date("y-m-d g:i:s", strtotime("$date"));
$adm_date = $adm_time;




   //-
   $adm_times = substr($adm_time,9,7);
   //Now go and Check Bed Charge in Revenue file
   if ($notes==''){
      $notes = $comp;
   }
   $tests = $test1.','.$test2.','.$test3.','.$test4.','.$test5;
   $query= "INSERT INTO admitfile VALUES('','$adm_no','$supplier','$adm_date','$bed','$payer','$age','$sex','$b_p','$temp','$weight','$telephone','','$notes','','','','','$tests','$diagnosis1','$diagnosis2','$adm_time','$adm_times','','','$ref_no','','','','','')";
   $result =mysql_query($query);

   $query  = "UPDATE appointmentf SET adm_date ='$adm_date',dis_date =' ',bed_no ='$bed',status='In-Ward',ward='$ref_no' WHERE adm_no ='$adm_no'";
   $result = mysql_query($query);
//Nurses file
//-----------
    $query4= "INSERT INTO nursesfile3 VALUES('','$adm_no','$supplier','$ref_no','','','','','','','','','','$date','$notes','','','','','','','','','','')";
      $result4 =mysql_query($query4);

   
   //Now go and post Bed Charge at the beds rate
   //-------------------------------------------
  //$query3 = "select * FROM revenuef WHERE auto ='Daily' or auto ='Once'" ;
  //This is for Ahmadiyya Hospital - Mumias
  //-----------------------------------------
  $query3 = "select * FROM revenuef WHERE name = 'Daily Bed Charges'" ;
  $result3 =mysql_query($query3) or die(mysql_error());
  $num3 =mysql_numrows($result3) or die(mysql_error());
  $gledger ='Bed Income';
  $i3=0;
  while ($i3 < $num3)
     {
     $gledger     = mysql_result($result3,$i3,"gl_account");  
     $desc        = mysql_result($result3,$i3,"name");  
     $rate        = mysql_result($result3,$i3,"cash_rate");  
     $auto        = mysql_result($result3,$i3,"auto");  

     //Get ref no from company file
     //----------------------------
      $query33 = "select * FROM companyfile" ;
      $result33 =mysql_query($query33) or die(mysql_error());
      $num33 =mysql_numrows($result33) or die(mysql_error());
      $i33=0;
      while ($i33 < $num33)
        {
        $ref_noz   = mysql_result($result33,$i33,"next_sup_inv"); 
        $i33++;
        }
        $ref_no2 = $ref_noz +1;
        $query33  = "UPDATE companyfile SET next_sup_inv ='$ref_no2'";
        $result33 = mysql_query($query3);
     //Now put in htransf
     //------------------    
     $query= "INSERT INTO htransf VALUES ('','$adm_no','$supplier','$date','$ref_noz','$desc','DB','$rate','IP','$gledger','DB',' ','$username','$auto','$mydate','1','$payer')";
     $result =mysql_query($query);

     $i3++;
   }

}

?>








<body>
<form action ="admit_patients_direct.php" method ="GET">
<?php

echo"<table width ='400' border='0' border color ='black'><tr><td width='50' align='right'><b>Ref No.: </b></td><td><input type='text' name='ref_no' size='20' value ='$ref_no' readonly></td></tr><tr><td width ='50' align ='right'><b>Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td></tr><tr><td width='100' align='right'><b>Patient: </b></td><td><input type='text' name='supplier' size='40' value='$name' readonly></td></tr>";
echo"<tr><td width='100' align='right'><b>Adm No: </b></td><td><input type='text' name='adm_no' size='20' value='$adm_no' readonly></td></tr>";

echo"<tr><td width='100' align='right'><b>Bed No: </b></td><td>";
echo"<select id='bed' name='bed' required>";        
$cdquery="SELECT bed_no FROM allbedsfile WHERE patients_name=' '";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["bed_no"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr>";

echo"<tr><td width='100' align='right'><b>Paying A/c </b></td><td><input type='text' name='account' size='40' value='$payer' readonly></td></tr>";

echo"<tr><td width ='600' align ='left'><b>Condition</b>
</td><td><textarea rows='10' cols='30' id='comp' name='comp'></textarea></td></tr>";
echo"</table>";
?>
<br>
<?php

if($stops=='Yes'){
  //
}else{
echo"<table width ='400' border='0' border color ='black'><td width ='100'></td><td><input type='submit' name='billing'  class='button' value='Admit Patient'></td></table>";
}
?>
</FORM>





</body>
</html>




