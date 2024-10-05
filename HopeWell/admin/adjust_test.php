<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];

$company = $_SESSION['company'];
$branch = $_SESSION['company'];
$username = $_SESSION['username'];

$location1 = $_SESSION['company'];
//For save and print button the correct one
//-----------------------------------------
      $query2 = "select * FROM stockt2 WHERE description >' '" ;
      $result2 =mysql_query($query2) or die(mysql_error());
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num2 =mysql_numrows($result2) or die(mysql_error());
      $i2 =0;
      while ($i2 < $num2)
         {         
         $location   = mysql_result($result2,$i2,"location");  
         $desc   = mysql_result($result2,$i2,"description");  
      
      $query3= "UPDATE stockfile SET REORDER ='7' WHERE description ='$desc' AND location ='$location'";
      $result3 =mysql_query($query3);
      
         $i2++;
         }
      

?>




