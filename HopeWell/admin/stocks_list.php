<?php
   session_start();
require('open_database.php');
$branch = $_SESSION['company'];

?>

<html>
<form action ="stocks_list.php" method ="GET">
<?php
 $go_on='Yes';
// if ($go_on=='Yes'){    
if (! isset($_GET['print'])){
    echo"<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title><div class='navbar navbar-inverse navbar-fixed-top'>";      
    echo"<div class='navbar-inner'>";                  
    echo"<a class='btn btn-navbar' data-toggle='collapse' data-target='.nav-collapse'><span class='icon-bar'></span><span class='icon-bar'></span><span class='icon-bar'></span></a>";
    echo"<a class='brand' href='#'>Medi+ V10 (HMIS Global)</a><div class='nav-collapse collapse'><p class='navbar-text pull-right'><a target='_blank' href='http://www.hmisglobal.com' class='navbar-link'>www.hmisglobal.com</a></p>";

          echo"</div></div></div></div>";
    echo"<link rel=StyleSheet href='popups/header.css' type='text/css' media='screen'>";
    echo"<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet'>";

}
?>
    

</head>










<?php
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 $go_on ='Yes';
//if ($go_on=='Yes'){
if (! isset($_GET['print'])){
 $mysqlserver="localhost";
 $mysqlusername="root";
 $mysqlpassword="0710958791";
 $go_on = 'No';
 $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());            
 $dbname = 'hmisglob_ahmadiyya4';
 mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
   
 $date = date('y-m-d');


 echo"<table width ='400' border='0' border color ='black'><tr><td width ='100' align ='right'><b>Print Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td></tr><tr><td width='150' align='right'><b>From Patient: </b></td><td>";
 echo"<select id='supplier' name='supplier'>";        

 $mysqlserver="localhost";
 $mysqlusername="root";
 $mysqlpassword="jamboafrica";

 $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());            
 $dbname = 'hmisglob_ahmadiyya4';
 mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT company_identity FROM systemf";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["company_identity"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr>";

 echo"<tr><td width='100' align='right'><b>To Patient: </b></td><td>";
 echo"<select id='bed' name='bed'>";        
 $cdquery="SELECT company_identity FROM systemf";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["company_identity"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr></table>";

echo"<table width ='400' border='0' border color ='black'><td width ='100'></td><td><input type='submit' name='print'  class='button' value='Print Preview'></td></table>";
echo"</FORM><table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' height='100' width='130'></td></table>";

}elseif (isset($_GET['printd'])){
 //$date2 = date('y-m-d');
 //$date1 = date('y-m-d');

 $user = "root";   
 $pass = "jamboafrica";   
 $database = "hmisglob_ahmadiyya4";   
 $host = "localhost";   
 $connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
 mysql_select_db($database) or die ("Unable to select the database");
   $query= "SELECT * FROM systemf" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "select * FROM systemf" ;
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
   }
   echo"<font size ='4'>";
   echo"<table width ='500'>";      
   echo"<tr><td align ='left'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>$address3</b></td></tr>";
   echo"</table><br>";
   echo"<h4><u>Stocks Listing</u></h4><img src='space.jpg' style='width:20px;height:2px;'>";
   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";



 $today = date('y/m/d');

$query= "SELECT * FROM stocksfile" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());





$tot =0;
$i = 0;
                                                         
echo"<div><b>";
echo"<hr>";
echo"Location<img src='space.jpg' style='width:250px;height:2px;'>";
echo"Item Description<img src='space.jpg' style='width:200px;height:2px;'>";
echo"Cost Price.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Seling Price<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:100px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor'>";
$SQL= "SELECT * FROM stocksfile ORDER BY description" or die(mysql_error());
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"location");   
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"cost_price");   
      $code   = mysql_result($result,$i,"sell_price");   
      $update = mysql_result($result,$i,"level");  
      $contact = $update*$rate;  
      $street  = " ";  
      $pay_mode= " ";  


      $tot = $tot +$update2;
      $update2 = number_format($update2);
      $rate = number_format($rate);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='200' align ='left'>";      
      echo"$desc";
      echo"</td>";
      echo"<td width ='300' align ='left'>";      
      echo"$contact";
      echo"</td>";
      
      echo"<td width ='100' align ='right'>";
      echo"</td>";              
      echo"<td width ='100' align ='right'>$update<img src='ico/Profile.ico' alt='statement' height='12' width='12'></td>";
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
      echo"<td width ='100' align ='right'>";      
      echo"$debit";
      echo"</td>";      
      echo"<td width ='120' align ='right'>";      
      echo"$credit";
      echo"</td>";      
      echo"<td width ='100' align ='right'><h4>$tot</h4></td>";      
      echo"<td width ='50'></td>";
      echo"</tr>";   
      echo"</table>";
      echo"<hr>";

}

else{


 $user = "root";   
 $pass = "jamboafrica";   
 $database = "hmisglob_ahmadiyya4";   
 $host = "localhost";   
$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
mysql_select_db($database) or die ("Unable to select the database");

$supplier         =$_GET['supplier'];
$bed         =$_GET['bed'];









$today = date('y/m/d');
$query= "SELECT * FROM systemf" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;



echo"<table class='altrowstable' id='alternatecolor'>";
$SQL= "SELECT * FROM systemf" or die(mysql_error());
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
   }
   echo"<font size ='4'>";
   echo"<table width ='500'>";      
   echo"<tr><td align ='left'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>$address3</b></td></tr>";
   echo"</table><br>";
   if ($supplier==$bed){
      $locations =$supplier;
   }else{
      $locations ="All Branches";
   }
   echo"<b>Stock Item List <img src='space.jpg' style='width:10px;height:2px;'>($locations)</b><img src='space.jpg' style='width:400px;height:2px;'>Printed On: <img src='space.jpg' style='width:10px;height:2px;'>$today";
   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";

















$today = date('y/m/d');
$query= "SELECT * FROM stocksfile" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<div><b>";
echo"<hr>";
echo"Location<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Item Description<img src='space.jpg' style='width:265px;height:2px;'>";
echo"Cost Price.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Seling Price<img src='space.jpg' style='width:40px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Value<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"Last Update<img src='space.jpg' style='width:50px;height:2px;'>";

echo"</b></div>";
echo"<hr>";

echo"<table class='altrowstable' id='alternatecolor'>";
if ($supplier==$bed){
   $SQL= "SELECT * FROM stocksfile WHERE location ='$supplier' ORDER BY description" or die(mysql_error());
}else{
$SQL= "SELECT * FROM stocksfile ORDER BY description" or die(mysql_error());
}
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;


while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"location");    
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"cost_price");   
      $code   = mysql_result($result,$i,"Sell_price");   
      $update = mysql_result($result,$i,"level");  
      $trans_dte = mysql_result($result,$i,"last_trans");  

      $contact = $update*$rate;  
      $street  = " ";  
      $pay_mode= " ";  

      $codes2 = $rate; 
      $update2 = $codes2; 
      $tot = $tot +$contact;


      $update2 = number_format($update);
      $rate2 = number_format($rate);
      $code2 = number_format($code);
      $contact2 = number_format($contact);


      echo"<tr bgcolor ='white'>";
      echo"<td width ='150' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='400' align ='left'>";      
      echo"$desc";
      echo"</td>";
      echo"<td width ='100' align ='right>";      
      echo"</td>";
      echo"<td width ='70' align ='left'>";      
      echo"$rate2";
      echo"</td>";
      echo"<td width ='70' align ='right'>";      
      echo"$code2";
      echo"</td>";
      echo"<td width ='70' align ='right'>";      
      echo"$update2";
      echo"</td>";
      echo"<td width ='100' align ='right'>";      
      echo"$contact2";
      echo"</td>";
      echo"</tr>";
      $i++;      
     }
      echo"</table>";
      echo"<hr>";
      //The bottom line
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
      echo"<td width ='100' align ='right'>";      
      echo"</td>";      
      echo"<td width ='100' align ='right'>";      
      echo"</td>";      
      echo"<td width ='70' align ='right'><h4>$tot</h4></td>";      
      echo"<td width ='20'></td>";
      echo"</tr>";   
      echo"</table>";
}
?>
</body>
</html>