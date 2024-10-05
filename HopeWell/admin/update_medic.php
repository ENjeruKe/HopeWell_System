
<?php
session_start();
require('open_database.php');
$username = $_SESSION['username'];
$date =$_SESSION['sys_date'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>General Ledger Accounts </title>
   <head>
<META HTTP-EQUIV="refresh" CONTENT="10">
<?php

   //Now go and admit patient in beds file

   $query34  = "select * FROM medicalfile WHERE ref_no <>''" ;
   $result34 = mysql_query($query34) or die(mysql_error());
   $num34   = mysql_numrows($result34) or die(mysql_error());
   $i34=0;
   while ($i34 < $num34)
       {       
       $az   = mysql_result($result34,$i34,"notes");
     $bz   = mysql_result($result34,$i34,"drug2_issued");
     $cz   = mysql_result($result34,$i34,"drug3_issued");
     $dz   = mysql_result($result34,$i34,"drug4_issued");
     $ez   = mysql_result($result34,$i34,"drug5_issued");
     $fz   = mysql_result($result34,$i34,"drug6_issued");
     $gz   = mysql_result($result34,$i34,"drug4_issued");
     $hz   = mysql_result($result34,$i34,"drug7_issued");
     $iz   = mysql_result($result34,$i34,"dose1");
     $jz   = mysql_result($result34,$i34,"dose2");
     $kz   = mysql_result($result34,$i34,"dose3");
     $lz   = mysql_result($result34,$i34,"dose4");
     $mz   = mysql_result($result34,$i34,"dose5");
     $nz   = mysql_result($result34,$i34,"dose6");
     $oz   = mysql_result($result34,$i34,"dose7");
     $pz   = mysql_result($result34,$i34,"sign4");
     $qz   = mysql_result($result34,$i34,"dose5");
     $inv_no   = mysql_result($result34,$i34,"ref_no");

//die($inv_no);
//--------------------------Selecting from Medical file-----------------------------------------------------

$bara =$az.'<br>'.$bz.'<br>'.$cz.'<br>'.$dz.'<br>'.$ez.'<br>'.$fz.'<br>'.$gz.'<br>'.$hz.'<br>'.$iz.'<br>'.$jz.'<br>'.$kz.'<br>'.$lz.'<br>'.$mz.'<br>'.$nz.'<br>'.$oz.'<br>'.$pz;

//-------------insertining into newprescription------------------

   $query2z= "UPDATE newprescription SET History ='$bara' ,DoctorNotes ='$bara' WHERE OpNo ='$inv_no'";
   $result2z =mysql_query($query2z);

     $i34++;
     }

echo $inv_no;
?>


</html>


