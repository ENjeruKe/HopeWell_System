<?php
session_start();
 require('open_database.php');

?>






<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	
	<title>STOCK REPORT - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">




<?php
 $branch     = $_SESSION['company']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');



 if (isset($_GET['print'])){

   $name  = $_GET['name'];
  


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
   }
   echo"<font size ='2'>";
   echo"<table width ='500'>";      
   echo"<tr><td align ='left'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>$address3</b></td></tr>";
   echo"</table><br>";

   echo"<!--h4>STOCK LEVEL REPORT<img src='space.jpg' style='width:20px;height:2px;'>"."Dated from: ".$date1."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date2;
echo"</h4>";
$query  = "select * FROM stockfile WHERE location ='$name' ORDER BY description" ;
$result =mysql_query($query);
 

?>
<table width ='100%'>
<tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Description of Service</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr--><table>
<hr>

<table width ='100%' class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
  
		<tr>
			<th width ='10%'> Location </th>
			<th width ='20%'> Description </th>
			<th width ='10%' style="text-align: right;"> Selling Price </th>
			<th width ='10%' style="text-align: right;"> Qty </th>
			<th width ='10%' style="text-align: right;"> Units </th>
			<th width ='10%' style="text-align: right;"> Cost Price </th>
			<th width ='10%' style="text-align: right;"> Total Sell Price </th>
			<th width ='10%' style="text-align: right;"> Total Cost Price </th>
			<th width ='10%' style="text-align: right;"> Total Profit </th>
		
        </tr>
	</thead>


	<tbody>
	
	
	
	
	

		
			<?php
				include('includes/connect.php');
				$result = $db->prepare("select * FROM stockfile WHERE location ='$name' ORDER BY description");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				    $bata = $row['qty'];
				    $bate = $row['sell_price'];
				    $bati = $row['cost_price'];
				    $bat = $bata*$bate;
				    $bet = $bata*$bati;
				    $but = $bat-$bet;
				    
			?>
			<tr class="record">
			<td style="text-align: left;"><?php echo $row['location']; ?></td>
			<td style="text-align: left;"><?php echo $row['description']; ?></td>
			<td style="text-align: right;"><?php echo $row['sell_price']; ?></td>
			<td style="text-align: right;"><?php echo $row['qty']; ?></td>
			<td style="text-align: right;"><?php echo $row['units']; ?></td>
			<td style="text-align: right;"><?php echo $row['cost_price']; ?></td>
			<td style="text-align: right;"><?php echo $bat; ?></td>
			<td style="text-align: right;"><?php echo $bet; ?></td>
			<td style="text-align: right;"><?php echo $but; ?></td>
						</tr>
			<?php
			
			
		//	      echo "<td align ='right'>" . number_format($row['total']) . "</td>";
       $paid = $but;
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill = $tot_bill +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;

       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill);

       $paid2 = $bet;
       $codes22 = $paid2; 
       $update22 = $codes2; 
       $tot_bill2a = $tot_bill2a +$paid2;
       $tot2      = $tot2 +$total2;
       $tot_paid2 = $tot_paid2 +$paid2;

       $update22 = number_format($update22);
       $rate2 = number_format($paid2);
       $tot_bill22 = number_format($tot_bill2a);


       $paid2a = $bat;
       $codes22a = $paid2a; 
       $update22a = $codes2a; 
       $tot_bill2aa = $tot_bill2aa +$paid2a;
       $tot2a      = $tot2a +$total2a;
       $tot_paid2a = $tot_paid2a +$paid2a;

       $update22a = number_format($update22a);
       $rate2a = number_format($paid2a);
       $tot_bill22a = number_format($tot_bill2aa);



				}
				
				
				
				
				
				
				
			?>
		
	</tbody>
<hr>
</table>
<hr><table width ='100%' class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
  
		<tr>
			<th width ='10%'>  </th>
			<th width ='20%'>  </th>
			<th width ='10%' style="text-align: right;"></th>
			<th width ='10%' style="text-align: right;">  </th>
			<th width ='10%' style="text-align: right;">  </th>
			<th width ='10%' style="text-align: right;">  </th>
			<th width ='10%' style="text-align: right;">  Run** Total Sell Price </th>
			<th width ='10%' style="text-align: right;">Run** Total Cost Price </th>
			<th width ='10%' style="text-align: right;">Running Total Profit </th>
		
        </tr>
	</thead>


	<tbody>

<tr>
    
			<tr class="record">
			<td style="text-align: left;"></td>
			<td style="text-align: left;"></td>
			<td style="text-align: right;"></td>
			<td style="text-align: right;"></td>
			<td style="text-align: right;"></td>
			<td style="text-align: right;"></td>
			<td style="text-align: right;"><?php echo $tot_bill22a; ?></td>
			<td style="text-align: right;"><?php echo $tot_bill22; ?></td>
			<td style="text-align: right;"><?php echo $tot_bill2; ?></td>
						</tr>
    
</tr>

</table>





<?php die();
				}
			?>
		










<!DOCTYPE html>
<html>
<title>HMIS Global</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<div class="w3-container w3-teal">
  <h1>STOCK REPORT | <font color ='red'></font></h1>
</div>
<!--img src="img_car.jpg" alt="Car" style="width:100%"-->
<div class="w3-container">
<p align ='right'><img src='chiromo-logo33.jpg' alt='statement' height='40' width='350'></p>

<style type="text/css">
html, 
body {
height: 100%;
}

body {
background-image: url(images/backgrounds.jpg);
background-repeat: no-repeat;
background-size: cover;
}
</style>











<?php
  echo"<br>";
  echo"<form action ='stock_rpt.php' method ='GET'>";
  echo"<span>Location : </span>";
echo"<select id='name' name='name' >";        
$cdquery="SELECT description FROM st_locationf ORDER BY description ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["description"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select><br>";

echo"<input type='submit' name='print'  class='button' value='Print Report'>";
echo"</FORM>";


$today = date('y/m/d');
//$today = $date-1;

?>
<table width ='20' border='0' height='220'></table>

</div>
<div class="w3-container w3-teal">
  <p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p>
</div>
</body>
</head>
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	
	<title>STOCK REPORT - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</html>

