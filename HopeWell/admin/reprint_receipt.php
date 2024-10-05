<?php
session_start();
require('open_database.php');
$branch = $_SESSION['company'];
$username = $_SESSION['username'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Print Receipt</title>

<script type="text/javascript">


function printpage()
  {
  window.print()
  }
</script>

<?php
   if (isset($_GET['account'])){         
      //$account = $_GET["accounts"];
      //$acc_no  = $_GET["account"];
      //$amount  = $_GET["comment"];
      $payer   = $_GET["accounts"];
      $ref_no  = $_GET["account"];
      $date    = $_GET["date"];


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


$query= "SELECT * FROM receiptf WHERE ref_no ='$ref_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<table bgcolor ='black'  border ='0' width ='100%'>";
                                                         
$SQL = "select * FROM receiptf WHERE ref_no ='$ref_no' " ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
echo"<font size ='4'>";
while ($row=mysql_fetch_array($hasil)) 
      {
      $payer    = mysql_result($result,$i,"type");  
      $date  = mysql_result($result,$i,"date");
      $time  = mysql_result($result,$i,"time");
  
     $i++;
}


//--echo"<font size ='5'>";
echo"<div><h3>REPRINTED RECEIPT</h3></div><br>";
   echo"<table width='100%' border='0' cellspacing='0' cellpadding='0'>";      
   //echo"<tr><td width ='400' align ='center'><img src='logo_img.jpg' style='width:250px;height:250px;'></td><tr>";
    echo"<tr><td align ='left'><h1>$company</h1></td></tr>";
   echo"<tr><td align ='left'>$address1</td></tr>";
   echo"<tr><td align ='left'>$address2</td></tr>";
   echo"<tr><td align ='left'>$address3</td></tr>";
   echo"<tr><td align ='left'>$address4</td></tr>";
   echo"</table><br>";


   

 

  //echo"<div><u><b>SALES RECEIPT. SERVICE NO:<img src='space.jpg' style='width:20px;height:2px;'>$ref_no</b></u></div><br>";
    echo"<div><h4>SALES RECEIPT. SERVICE NO:<img src='space.jpg' style='width:20px;height:2px;'>$ref_no</h4></div><br>";
 //---------Sawa up to this point------------------
   echo"<div>Payer :<img src='space.jpg' style='width:20px;height:2px;'></b>$payer<img src='space.jpg' style='width:20px;height:2px;'>Date:<img src='space.jpg' style='width:5px;height:2px;'>$date<img src='space.jpg' style='width:10px;height:2px;'>$time</b><br>";
   //echo"<hr>";
  //echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";



  echo"------------------------------------------------------------<b><br>";
  echo"<table bgcolor ='' border ='' width ='100%'>";
     echo"<tr><th width ='50%' align ='center'>Description";
 
     echo"<th width ='20%' align ='center'>Price</th>";

     echo"<th width ='10%' align ='center'>Qty </th>";
     
   //  echo"<th width ='10%'>Qty </th>";
    
     echo"<th width ='20%' align ='center'>Total</th></tr></table>";
     
  echo"------------------------------------------------------------<br>";
 
$query= "SELECT * FROM receiptf WHERE ref_no ='$ref_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<table bgcolor ='black'  border ='0' width ='100%'>";
                                                         
$SQL = "select * FROM receiptf WHERE ref_no ='$ref_no' " ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
echo"<font size ='4'>";
while ($row=mysql_fetch_array($hasil)) 
      {
         
      $codes   = mysql_result($result,$i,"ref_no");  
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"type");   
      $code   = mysql_result($result,$i,"total");   
      $update = mysql_result($result,$i,"date");  
      $contact = mysql_result($result,$i,"adm_no");
     $qty = mysql_result($result,$i,"qty");
  
 
      $update2 = $code; 
      //-$update;
      $tot = $tot +$update2;
      $code   = number_format($code);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);
      
           
      echo"<tr bgcolor ='white'>";
      echo"<td width ='50%' align ='left'>";      
      echo"$desc";
      echo"</td>";     
      echo"<td width ='20%' align ='center'>$update2</td>";
      echo"<td width ='10%' align ='center'>$qty</td>";
      echo"<td width ='20%' align ='center'>$code</td>";
      //echo"<td width ='50' align ='right'></a></td>";
      echo"</font>";
      echo"</tr>";   
 

   

      $i++;
  
       
}

      echo"</table>";


echo"------------------------------------------------------------";
//End of print receipt
   echo"</font>";
}

echo"<table>";
echo"<tr><td width ='320' align ='right'><b>Total:</b></td><td width ='45'></td><td><b>$tot2</b></td></tr>";
echo "</table><br><br></b>";
echo "For $company<br>";
echo"<img src='images/image.bmp' style='width:370px;height:50px;'><br>";
echo"Quality Service Low Cost Health care.";
//style='width:300px;height:50px;'><br>";
echo"<br>Receipt Reprinted by: $username<br><br><br>";
echo"-------------------------------------------------------------------<br><br><br>";
//echo"<img src='space.jpg' style='width:60px;height:2px;'><img src='ico/rct_security.jpg' style='width:300px;height:50px;'><br>";
//echo"<img src='images/image.bmp' style='width:370px;height:100px;'><br>";
//echo"<br>You were served by: $username<br>";
//echo"We wish you quick recovery";
//echo "<input type=\"button\" value=\"Printed\" onclick=\"printpage()\" />";
?>