<?php
	session_start();
	include 'includes/connect.php';
	include 'open_database.php';

$aces2 = $_SESSION['aces2'];
$username = $_SESSION['username'];
$_SESSION['date'] = $date;

$found ='No';
$time_a =date('H:i:s');
$date =date('Y-m-d');
  





$result = $db->prepare("SELECT * FROM attendance WHERE employee_id ='$username' and time_out='00:00:00'");
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
        $username   =$row['employee_id'];
        $date   = $row['date'];
        $aces2   = $row['status'];
        $pass   = $row['num_hr'];
        $time_b   = $row['time_out'];
   

        $found ='Yes';
     
     
     
      }


//echo $found;

 // $query3 = "SELECT * FROM attendance WHERE employee_id ='$username' and time_out='00:00:00'" ;
//$result3 =mysql_query($query3) or die(mysql_error());
 //  $num3 =mysql_numrows($result3);
 //  $i3=0;
 //  while ($i3 < $num3)
 //    {
 //    $username   = mysql_result($result3,$i3,"employee_id");
 //    $date   = mysql_result($result3,$i3,"date");
  //   $aces2   = mysql_result($result3,$i3,"status");
 //    $pass   = mysql_result($result3,$i3,"num_hr");
 //    $time_b   = mysql_result($result3,$i3,"time_out");

 // $found ='Yes';

  //     $i3++;
 //    }


if ($found =='No'){

  $query37= "INSERT INTO attendance VALUES('','$username','$date','$time_a','$aces2','','','Active','','')";
  $result37 =mysql_query($query37);

 // die();
header('location:home.php');


}else{

  $query3= "UPDATE attendance SET num_hr='Continues' where employee_id ='$username' and out_dte='0000-00-00' and time_out='00:00:00' and status<>''";
  $result3 =mysql_query($query3);

header('location:home.php');
}



?>



