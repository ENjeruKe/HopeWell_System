<?php
   session_start();
require('open_database.php');
   $query = "select * FROM companyfile where company<>''" ;
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $i=0;
   while ($i < $num)
    {
     $last_date   = mysql_result($result,$i,"last_date");
    $i++;
    }
$query3 = "select * FROM allbedsfile where visit_no<>''" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {     
     $adm_no   = mysql_result($result3,$i3,"adm_no");
     $name     = mysql_result($result3,$i3,"patients_name");
     $ref_no   = mysql_result($result3,$i3,"visit_no");
     
     //Asign the receipt No.
     //---------------------

   $SQL= "select * FROM nursesfile3 where ref_no ='$ref_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $query= "select * FROM nursesfile3 where ref_no ='$ref_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   $results ='No';
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      { 
       $ref_nos   = mysql_result($result,$i,"ref_no");  
       $names     = mysql_result($result,$i,"name");  
       $adm_no   = mysql_result($result,$i,"adm_no");         
     }
     //update nursesfile
     //-----------------

    $query4= "INSERT INTO nursesfile3 VALUES('','$adm_no','$names','$ref_nos','','','','','','','','','','$last_date','','','','','','','','','','','')";
      $result4 =mysql_query($query4);



     $i3++;
    }

?>

