<?php
   session_start();
require('open_database.php');

   //Check for inpatient and activate them in medical file
   //-----------------------------------------------------
   $date     =date('y-m-d');

   $query = "select * FROM companyfile" ;
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $i=0;
   while ($i < $num)
     {     
     $update   = mysql_result($result,$i,"update");
     $i++;
    }
   if ($update == $date){
      //Dont check inpatients
   }else{
   $query3 = "select * FROM allbedsfile where patients_name<>' '" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {     
     $adm_no   = mysql_result($result3,$i3,"adm_no");
     $name     = mysql_result($result3,$i3,"patients_name");


     //Get paying a/c
     //-------------
     $query4 = "select * FROM appointmentf where adm_no = '$adm_no'" ;
     $result4 =mysql_query($query4) or die(mysql_error());
     $num4 =mysql_numrows($result4) or die(mysql_error());
     $i4=0;
     while ($i4 < $num4)
     {
     $payer   = mysql_result($result4,$i4,"payer");  
     $age     = mysql_result($result4,$i4,"age");  
     $sex    = mysql_result($result4,$i4,"sex");  
     $i4++;
     }

     //Asign the receipt No.
     //---------------------
     $query6 = "select * FROM companyfile" ;
     $result6 =mysql_query($query6) or die(mysql_error());
     $num6 =mysql_numrows($result6) or die(mysql_error());
     $i6=0;
     while ($i6 < $num6)
       {
       $ref_no   = mysql_result($result6,$i6,"next_ref");  
       $i6++;
     }
     $ref_no2 = $ref_no +1;
     $query7  = "UPDATE companyfile SET next_ref ='$ref_no2'";
     $result7 = mysql_query($query7);
     //update medicalfile
     //------------------
     $query= "INSERT INTO medicalfile (adm_no,date,name,type,ref_no,gl_account,age,sex) VALUES ('$adm_no','$date','$name','Inpatient','$ref_no','$payer','$age','$sex')"; 
     $result =mysql_query($query);

     $i3++;
    }

     $query7  = "UPDATE companyfile SET update ='$date'";
     $result7 = mysql_query($query7);
  }
?>
