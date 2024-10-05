<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>
<?php
if (isset($_GET['accounts3'])){
   $patient = $_GET['accounts3'];
   $GLOBALS['adm_no'] = $_GET['accounts3'];
   $aa = ($_GET['accounts3']);
}

//$user = "hmisglobal";   
//$pass = "jamboafrica";   
//$database = "hmisglob_griddemo";   
//$host = "localhost";   
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
//mysql_select_db($database) or die ("Unable to select the database");


$query3 = "select * FROM clients WHERE adm_no ='$adm_no'" ;
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($i3 < $num3)
  {
  $patients_name   = mysql_result($result3,$i3,"patients_name");
  $adm_date        = mysql_result($result3,$i3,"adm_date");
  $disch_date      = mysql_result($result3,$i3,"disch_date");
  $db_account      = mysql_result($result3,$i3,"pay_account");  
  $i3++;
}


$today = date('y/m/d');
$query  = "select * FROM st_trans_long WHERE adm_no ='$aa' ORDER BY date" ;
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;



echo"<th><h3>Long Term Prescription Report</h3></th></tr>";
echo"<div><b>";
echo"<table>";
echo"<tr><td>Patients Adm No:</td><td width ='10'></td><td>$aa</td></tr>";
echo"<tr><td>Patients Name  :</td><td width ='10'></td><td>$patients_name</td></tr>";
echo"<tr><td><u><b>Admissions </u></b></td><td></td><td></td></tr>";
echo"<tr><td>Adm. Date. : $adm_date</td><td>Disch Date.: $disc_date</td></tr>";

echo"</table>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Item Description<img src='space.jpg' style='width:340px;height:2px;'>";
echo"Original<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:50px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
$SQL ="select * FROM st_trans_long WHERE adm_no ='$aa' ORDER BY date" ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;


while ($row=mysql_fetch_array($hasil)) 
      {         
     $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"price");   
      $code   = mysql_result($result,$i,"ref_no");   
      $update = mysql_result($result,$i,"type");  
      $contact = mysql_result($result,$i,"description");  
      $qty     = mysql_result($result,$i,"qty");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"trans_desc");  
      $total   = mysql_result($result,$i,"total");  
      $original= mysql_result($result,$i,"orig_qty");  

      $codes2 = $total; 
      $update2 = $codes2; 
      $price   = number_format($rate);
      $tot = $tot +$update2;
      $update2 = number_format($update2);
      $rate = number_format($total);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='380' align ='left'>";      
      echo"$contact";
      echo"</td>";
      $bb =$row['acc_no'];              
      echo"<td width ='100' align ='right'>$original</td>";
      echo"<td width ='100' align ='right'>$qty</td>";
//      echo"<td width ='30' align ='right'></td>";
//      echo"<td width ='60' align ='right'>$update2</td>";
      $_SESSION['acc_no'] =$row['acc_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['payer']; 
      $aa3=$row['name'];        
      $aa4=$row['type'];   
      $aa5=$row['towards'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];              
      echo"<td width ='100' align ='right'><a href='print_receipt.php?accounts=$aa2&account=$aa&contact=$aa3&type=$aa4&tel=$aa5&comment=$aa6&   date=$aa7'/></a></td>";
echo"</tr>";
      $i++;      
     }
      echo"</table>";
echo"<hr>";
//}
die();

//Now go and show summary
//-----------------------

 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 //echo"<h1>Patient Bill</h1><br><br>";
//$user = "hmisglobal";   
//$pass = "jamboafrica";   
//$database = "hmisglob_griddemo";   
//$host = "localhost";   
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
//mysql_select_db($database) or die ("Unable to select the database");

$today = date('y/m/d');
$query  = "select * FROM receiptf WHERE adm_no ='$adm_no' ORDER BY date" ;
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<th>Patient Statement</th></tr>";
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:60px;height:2px;'>";
echo"Payer<img src='space.jpg' style='width:180px;height:2px;'>";
echo"Description <img src='space.jpg' style='width:150px;height:2px;'>";
echo"Total<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Paid<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:50px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
$SQL ="select * FROM receiptf WHERE adm_no ='$adm_no' ORDER BY date" ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;



while ($row=mysql_fetch_array($hasil)) 
      {         
     $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"price");   
      $code   = mysql_result($result,$i,"ref_no");   
      $update = mysql_result($result,$i,"type");  
      $contact = mysql_result($result,$i,"description");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"trans_desc");  
      $total   = mysql_result($result,$i,"total");  
      $balance   = mysql_result($result,$i,"balance");  

      $codes2 = $total; 
      $update2 = $codes2; 
      $tot = $tot +$balance;
      $update2 = number_format($update2);
      $bals    = number_format($balance);
      $price   = number_format($rate);
      $rate = number_format($total);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='200' align ='left'>";      
      echo"$desc";
      echo"</td>";
      echo"<td width ='220' align ='left'>";      
      echo"$contact";
      echo"</td>";
      $bb =$row['acc_no'];              
      echo"<td width ='60' align ='right'>$price</td>";
      echo"<td width ='70' align ='right'>$update2</td>";
      echo"<td width ='20' align ='right'></td>";

      echo"<td width ='60' align ='right'>$bals</td>";
      $_SESSION['acc_no'] =$row['acc_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['payer']; 
      $aa3=$row['name'];        
      $aa4=$row['type'];   
      $aa5=$row['towards'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];              
      echo"<td width ='100' align ='right'><a href='print_receipt.php?accounts=$aa2&account=$aa&contact=$aa3&type=$aa4&tel=$aa5&comment=$aa6&   date=$aa7'/></a></td>";
echo"</tr>";
      $i++;      
     }
      echo"</table>";
echo"<hr>";
      echo"<table>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='200'>";
      echo"</td>";      
      echo"<td width ='150'><h4>";      
      echo"Total";      
      echo"</h4></td>";      
      echo"<td width ='70' align ='right'><h4>$tot</h4></td>";      
      echo"</tr>";   
      echo"</table>";
//}
?>