<?php
session_start();
 require('open_database.php');

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>



<?php
$q = intval($_GET['q']); 
$q2 = $_GET['q'];
$email = $_GET['q'];;

     if ($email=='GOP'){
        $query3 = "select * FROM next_opdf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'GOP'.$adm_no;  
          $i3++;
          }
     }

     if ($email=='OVC'){
          $query3 = "select * FROM next_ovcf" ;
          $result3 =mysql_query($query3) or die(mysql_error());
          $num3 =mysql_numrows($result3) or die(mysql_error());
          $i3=0;
          while ($i3 < $num3)
            {
            $adm_no   = mysql_result($result3,$i3,"next_adm");  
            $adm_no   = 'OVC'.$adm_no;  
            $i3++;
            }
       }

 

     if ($email=='STAFF-OP'){
        $query3 = "select * FROM next_staffop" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'STAFFOP'.$adm_no;  
          $i3++;
          }
     }


     if ($email=='STAFF-IP'){
        $query3 = "select * FROM next_staffip" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'STAFFIP'.$adm_no;  
          $i3++;
          }
     }

     if ($email=='ANC'){
        $query3 = "select * FROM next_ancf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'ANC'.$adm_no;  
          $i3++;
          }
     }

 
     if ($email=='MAT'){
        $query3 = "select * FROM next_matf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'MAT'.$adm_no;  
          $i3++;
          }
     }


     if ($email=='WBC'){
        $query3 = "select * FROM next_mchf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'WBC'.$adm_no;  
          $i3++;
          }
     }

     if ($email=='FP'){
        $query3 = "select * FROM next_fpf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'FP'.$adm_no;  
          $i3++;
          }
     }


     if ($email=='WK'){
        $query3 = "select * FROM next_wkf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'WK-'.$adm_no;  
          $i3++;
          }
     }

     if ($email=='IP'){
        $query3 = "select * FROM next_ipf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'IP'.$adm_no;  
          $i3++;
          }
     }

     if ($email=='PN'){
        $query3 = "select * FROM next_pnf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'PN'.$adm_no;  
          $i3++;
          }
     }

     if ($email=='RF'){
        $query3 = "select * FROM next_rff" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'RF'.$adm_no;  
          $i3++;
          }
     }

     if ($email=='PP'){
        $query3 = "select * FROM next_ppf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'PP'.$adm_no;  
          $i3++;
          }
     }


     if ($email=='HAT'){
        $query3 = "select * FROM next_hatf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'HAT'.$adm_no;  
          $i3++;
          }
     }

     if ($email=='HYP'){
        $query3 = "select * FROM next_hypf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'HYP'.$adm_no;  
          $i3++;
          }
     }


     if ($email=='DM'){
        $query3 = "select * FROM next_dmf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'DM'.$adm_no;  
          $i3++;
          }
     }
echo"<font color ='red'><b>$adm_no</b></font>";
?>
</body>
</html>