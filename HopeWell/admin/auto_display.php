<?php
   session_start();
require('open_database.php');
//require('get_medicals.php');
$location = $_SESSION['company'];
$date = $_SESSION['smart_date'];
$med_id  = $_SESSION['id'];
$ids  = $_SESSION['adm_no'];

?>


<?php
$update_1 =$_GET['update'];
$update_txt =$_GET['textarea'];
$update = $_SESSION['update'];
//echo $update;
//echo $update_txt;
//echo $med_id;
if (isset($_GET['_back'])){    
   if ($update=='23'){
        $query= "update medicalfile set med1_dx2 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }
   if ($update=='22'){
        $query= "update medicalfile set diag3 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }
   if ($update=='18'){
        $query= "update medicalfile set sign4 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }
   if ($update=='17'){
        $query= "update medicalfile set dose7 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }
   if ($update=='16'){
        $query= "update medicalfile set dose6 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }
   if ($update=='15'){
        $query= "update medicalfile set dose5 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }         
 if ($update=='14'){
        $query= "update medicalfile set dose4 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }
   if ($update=='13'){
        $query= "update medicalfile set dose3 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }            
   if ($update=='12'){
        $query= "update medicalfile set dose2 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }          
   if ($update=='11'){
        $query= "update medicalfile set dose1 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }
   if ($update=='10'){
        $query= "update medicalfile set med7_dx2 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }            
   if ($update=='9'){
        $query= "update medicalfile set med6_dx2 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }          
   if ($update=='8'){
        $query= "update medicalfile set med5_dx2 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }          
   if ($update=='7'){
        $query= "update medicalfile set med4_dx2 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }       
   if ($update=='6'){
        $query= "update medicalfile set med3_dx2 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }
   if ($update=='5'){
        $query= "update appointmentf set other_info ='$update_txt' where adm_no = '$ids'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }            
   if ($update=='4'){
        $query= "update appointmentf set village ='$update_txt' where adm_no = '$ids'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }      
   if ($update=='3'){
        $query= "update appointmentf set sublocation ='$update_txt' where adm_no = '$ids'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }
  if ($update=='1'){
        $query= "update medicalfile set notes ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }           
   if ($update=='2'){
        $query= "update medicalfile set med2_dx2 ='$update_txt' where id = '$med_id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   }          
}else{
 //echo 'Here...'.$update_txt;   
}   
?>

<form action ="" method ="GET">    
<a href ='doc_window_1.php' style='text-decoration:none'>>>CHIEF COMPLAINT (C.O)
</a><hr>
<a href ='doc_window_2.php' style='text-decoration:none'>>>HISTORY OF PRESENTING ILLNESS (H.P.I)</a><hr>
<a href ='doc_window_3.php' style='text-decoration:none'>>>PAST MEDICAL HISTORY (P.M.H)
</a><hr>
<a href ='doc_window_4.php' style='text-decoration:none'>>>OBS / GYN HISTORY
</a><hr>
<a href ='doc_window_5.php' style='text-decoration:none'>>>FAMILY SOCIAL HISTORY
</a><hr>
<a href ='doc_window_6.php' style='text-decoration:none'>>>GENERAL EXAMINATION
</a><hr>
<a href ='doc_window_7.php' style='text-decoration:none'>>>SYSTEMIC EXAMINATION
</a><hr>
<a href ='doc_window_8.php' style='text-decoration:none'>>>CENTRAL NERVOUS SYSTEM (C.N.S)
</a><hr>
<a href ='doc_window_9.php' style='text-decoration:none'>>>RESPIRATORY SYSTEM (R.S)
</a><hr>
<a href ='doc_window_10.php' style='text-decoration:none'>>>CARDIOVASCULAR SYSTEM
</a><hr>
<a href ='doc_window_11.php' style='text-decoration:none'>>>PA ABDOMINAL EXAMINATION
</a><hr>
<a href ='doc_window_12.php' style='text-decoration:none'>>>MASCULAR-SKELETAL SYSTEM
</a><hr>
<a href ='doc_window_13.php' style='text-decoration:none'>>>EYE EXAMINATION
</a><hr>
<a href ='doc_window_14.php' style='text-decoration:none'>>>EAR, NOSE & THROAT EXAMINATION (E.N.T)
</a><hr>
<a href ='doc_window_15.php' style='text-decoration:none'>>>BREAST EXAMINATION
</a><hr>
<a href ='doc_window_16.php' style='text-decoration:none'>>>SKIN EXAMINATION
</a><hr>
<a href ='doc_window_17.php' style='text-decoration:none'>>>OTHER EXAMINATION
</a><hr>
<a href ='doc_window_18.php' style='text-decoration:none'>>>IMPRESSION
</a><hr>
<a href ='doc_window_19.php' style='text-decoration:none'>>>INVESTIGATION
</a><hr>
<a href ='doc_window_20.php' style='text-decoration:none'>>>FINAL DIAGNOSIS
</a><hr>
<a href ='doc_window_21.php' style='text-decoration:none'>>>MANAGEMENT TREATMENT
</a><hr>
<a href ='doc_window_22.php' style='text-decoration:none'>>>RECOMANDATIONS
</a><hr>
<a href ='doc_window_23.php' style='text-decoration:none'>>>FOLLOW-UP
</a><hr>



</table>
<input type='submit' name='_back'  class='button' value='Back'>
</body>
</html>

