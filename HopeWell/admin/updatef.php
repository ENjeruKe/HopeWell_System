<?php
 //$date2 = date('y-m-d');
 //$date1 = date('y-m-d');
 $user = "root";   
 $pass = "v9p0CnfH60";   
 $database = "newhmisc_trinity";   
 $host = "localhost";   
 
 $connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
 mysql_select_db($database) or die ("Unable to select the database");

      $query = "select * FROM appointmentf WHERE id <>' '" ;
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $i=0;
   while ($i < $num)
       {
      $adm_no   = mysql_result($result,$i,"adm_no");
      $tell   = mysql_result($result,$i,"telephone");
     // $description   = mysql_result($result,$i,"description");
     // $id   = mysql_result($result,$i,"id");
      //$bed_no   = mysql_result($result,$i,"bed_no");
     // $rate   = mysql_result($result,$i,"Rate");
     // $name   = mysql_result($result,$i,"Patients_Name");



    //  echo $adm_date.'-'.$adm_no.'-'.$payer.'-'.$adm_no.'-'.$name.'<br>';
  echo $adm_no.'-'.$tell.'<br>';
      //$query3= "INSERT INTO admitfile VALUES ('','$adm_no','$name','$adm_date','$bed_no','$payer','','$rate','In Ward')";
      //$result3 =mysql_query($query3) or die(mysql_error());

      $query3= "UPDATE medicalfile SET credit_rate ='$tell' where adm_no='$adm_no' and credit_rate=''";
      $result3 =mysql_query($query3) or die(mysql_error());

//$query3a= "UPDATE admitfile SET rate ='$bed' where adm_no='$adm_no'";
//$result3a =mysql_query($query3a) or die(mysql_error());


       $i++;
     }

?>                                                   
