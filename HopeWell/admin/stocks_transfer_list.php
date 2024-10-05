<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>







     
       <!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
<link href="dcss/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>

<script language="javascript" type="text/javascript">
var newwindow;
function popcontact505(url) {
	newwindow=window.open(url,'newwindow','height=800,width=900');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>

<?php
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
//$user = "hmisglobal";   
//$pass = "jamboafrica";   
//$database = "hmisglob_griddemo";   
//$host = "localhost";   
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
//mysql_select_db($database) or die ("Unable to select the database");
if (isset($_GET['print'])){
   //Get into printing if selected
   //-----------------------------
$date1 = $_GET['date1']; 
$date2 = $_GET['date2']; 
$search= $_GET['search']; 
$today = date('y/m/d');
 
if ($search==''){
$query  = "select * FROM st_trans WHERE trans_desc ='TRF' and >='$date1' and date <= '$date2' GROUP BY ref_no" ;
}else{
$query  = "select * FROM st_trans WHERE trans_desc ='TRF' and location='$search' and date >='$date1' and date <= '$date2' ORDER BY ref_no" ;
}
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;


echo"<th><h3>Stock Transfers List</h3></th></tr>";
//echo"<div><b>";
//echo"<hr>";
//echo"Date<img src='space.jpg' style='width:70px;height:2px;'>";

//echo"Supplier<img src='space.jpg' style='width:250px;height:2px;'>";


//echo"Item Description<img src='space.jpg' style='width:300px;height:2px;'>";
//echo"Narration<img src='space.jpg' style='width:150px;height:2px;'>";
//echo"Invoice#<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"Qty<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"Cost<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"Total<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"</b></div>";
//echo"<hr>";
//echo"Supplier<img src='space.jpg' style='width:250px;height:2px;'>";

      echo"<table width ='100%'>";
      echo"<td width ='5%' align ='left' bgcolor ='black'>";      
      echo"<font color ='white'>Date</font>";
      echo"</td>";
      echo"<td width ='25%' align ='left' bgcolor ='black'>";      
      echo"<font color ='white'>Supplier</font>";
      echo"</td>";
      echo"<td width ='25%' align ='left' bgcolor ='black'>";      
      echo"<font color ='white'>Item Description</font>";
      echo"</td>";
      echo"<td width ='10%' align ='left' bgcolor ='black'>";      
      echo"<font color ='white'>Narration</font>";
      echo"</td>";
      echo"<td width ='10%' align ='left' bgcolor ='black'>";      
      echo"<font color ='white'>Invoice #</font>";
      echo"</td>";
      echo"<td width ='6%' align ='right' bgcolor ='black'><font color ='white'>QTY</font></td>";
      echo"<td width ='10%' align ='right' bgcolor ='black'><font color ='white'>Cost</font></td>";
      echo"<td width ='10%' align ='right' bgcolor ='black'><font color ='white'>Total</font></td>";
echo"</table>";


echo"<table class='altrowstable' id='alternatecolor' border ='0' width ='100%'>";
if ($search==''){
$SQL  = "select * FROM supplierstrfile WHERE trans_desc ='TRF' and date >='$date1' and date <= '$date2' GROUP BY REF_NO" ;
}else{
$SQL  = "select * FROM st_trans WHERE trans_desc ='TRF' and location='$search' and date >='$date1' and date <= '$date2' GROUP BY ref_no" ;
}
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;

echo'Location'.$search;
while ($row=mysql_fetch_array($hasil)) 
      {         
     $codes   = mysql_result($result,$i,"date"); 
     $adm_no   = mysql_result($result,$i,"adm_no");   
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"price");   
      $code   = mysql_result($result,$i,"ref_no");   
      $update = mysql_result($result,$i,"type");  
      $contact = mysql_result($result,$i,"description");  
      $qty     = mysql_result($result,$i,"qty");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"trans_desc");  
      $total   = mysql_result($result,$i,"total");  

      $codes2 = $total; 
      $update2 = $codes2; 
      $price   = number_format($rate);
      $tot = $tot +$update2;
      $update2 = number_format($update2);
      $rate = number_format($total);
      $totss = $qty*$rate;
      //$totss =number_format($tots);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='5%' align ='left'>";      
      echo"$codes";
      echo"</td>";
      $adm_no= $row['adm_no'];
      echo"<td width ='25%' align ='left'>";      
      echo"$street";
      echo"</td>";
      echo"<td width ='25%' align ='left'>";      
      echo"$contact";
      echo"</td>";
      $code = $row['ref_no'];
      echo"<td width ='10%' align ='left'>";      
      echo"<a href=javascript:popcontact505('view_transfer.php?invoice=$code&qtys=$qty')><font color ='red'>$code</font></a>";
      echo"</td>";
      echo"<td width ='10%' align ='left'>";      
      echo"$update";
      echo"</td>";
      $bb =$row['acc_no'];              
      echo"<td width ='6%' align ='right'>$qty</td>";
      echo"<td width ='10%' align ='right'>$price</td>";
      $tot_1 = $qty*$price;
      //echo"<td width ='30' align ='right'></td>";
      //$totss = number_format($tot_1);
      $totss = $row['total'];
      echo"<td width ='10%' align ='right'>$totss</td>";
      $_SESSION['acc_no'] =$row['acc_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['payer']; 
      $aa3=$row['name'];        
      $aa4=$row['type'];   
      $aa5=$row['towards'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];              
      //echo"<td width ='100' align ='right'><a href='print_receipt.php?accounts=$aa2&account=$aa&contact=$aa3&type=$aa4&tel=$aa5&comment=$aa6&   date=$aa7'/></a></td>";
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
die();
}



   echo"<form action ='stocks_transfer_list.php' method ='GET'>";

   echo"<table><tr><td>Location:</td><td>";
   echo"<select id='search' name='search'>"; 
   $cdquery="SELECT * FROM st_locationf ORDER BY description";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   while ($cdrow=mysql_fetch_array($cdresult)) {
         $cdTitle=$cdrow["description"];
   echo "<option>$cdTitle</option>";            
   }
   echo"</select></td></tr>";

 echo"<tr><td>Date Range From</td><td><input type='date' name='date1' placeholder='dd-mm-yyyy' size='12' required></td></tr><tr><td> To 
Date</td><td><input type='date' name='date2' placeholder='dd-mm-yyyy' size='12' required></td></tr>";

echo"<tr><td><input type='submit' name='print'  class='button' value='Print Statement'></td></tr></table>";

echo"</FORM>";


?>