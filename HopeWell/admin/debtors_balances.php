<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

 

	

<?php
//session_start();
require('open_database.php');
// $username =$_SESSION['username'];
// $database =$_SESSION['database'];



if (isset($_GET['print'])){
   //Start printing TB
   //-----------------
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");


   $date = date('d-m-y');
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
   echo"<table width ='700'>";      
   echo"<tr><td width ='700' align ='center'><b>$company</b></td></tr>";
   echo"<tr><td width ='700' align ='center'><b>$address1</b></td></tr>";
   echo"<tr><td width ='700' align ='center'><b>$address2</b></td></tr>";
   echo"<tr><td width ='700' align ='center'><b>$address3</b></td></tr></table>";
   echo"<br><br><table><tr><td width ='350' align ='left'><b>DEBTORS BALANCES</b></td><td width ='500' align ='right'><b>Print Date:.$date</b></td></tr></table>";

   $query= "SELECT * FROM debtorsfile WHERE account_name > '' ORDER BY account_name " or die(mysql_error());
   $SQL  = "SELECT * FROM debtorsfile WHERE account_name > '' ORDER BY account_name " or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;











echo"<hr>";
   echo"<table>";
   echo"<tr><th>A/c No.</th><th width='10'></th><th width ='300' align='left'>Account Name </th><th width='200'>Account Type</th><th width = '100'></th><th>Debit</th><th width = '100'></th><th>Credit</th>   
   </tr></table>";
echo"<hr>";

$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$db_total = 0;
$cr_total = 0;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
echo"<table>";

      $codes   = mysql_result($result,$i,"client_id");  
      $desc    = mysql_result($result,$i,"account_name");   
      $rate    = " ";   
      $type       = mysql_result($result,$i,"telephone_no");   
      $last_trans = mysql_result($result,$i,"address");  
      $balance    = mysql_result($result,$i,"os_balance");    
      $update2 = $balance; 
      $tot = $tot +$update2;
      
      //$update = number_format($update);
      //$codes   = number_format($codes2);
      $balances  = number_format($balance);

      $update2 = number_format($update2);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='60' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='400' align ='left'>";      
      echo"$desc";
      echo"</td>";            
      echo"<td width ='200'>";      
      echo"$type";
      echo"</td>";      
      echo"<td width = '20'></td>";
      echo"<td width ='100' align ='right'>";
      if ($balance > 0){
         echo"$update2";
         $db_total = $db_total+$balance;
      }
      echo"</td>";
      echo"<td width = '20'></td>";

      echo"<td width ='100' align ='right'>";
      if ($balance < 0){
         echo"$update2";
         $cr_total = $cr_total+$balance;
      }
      echo"</td>";
      echo"<td width ='100' align ='right'></td>";
      

      echo"</tr>";   
echo"</table>";
echo"<hr>";   


      $i++;      
}
//      echo"</table>";
echo"<table>";


      $tot = number_format($tot);
      $cr_total = number_format($cr_total);
      $db_total = number_format($db_total);

      echo"<table><tr>";
      echo"<table>";
      echo"<tr bgcolor ='white'>";
      echo"<td width ='60' align ='left'>";      
      echo"</td>";
      echo"<td width ='400' align ='left'>";      
      echo"</td>";            
      echo"<td width ='200'>";      
      echo"</td>";      
      echo"<td width = '20'></td>";
      echo"<td width ='100' align ='right'>Total Balance";
      echo"</td>";
      echo"<td width = '20'></td>";
      echo"<td width ='100' align ='right'>";
      echo"$tot";
      echo"</td>";
      echo"<td width ='100' align ='right'></td>";      
      echo"</tr></table><hr>";
die();


}




































//End of printing TB
//------------------




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>General Ledger Accounts </title>
<head>

<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
</style>



























<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=300,width=850');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>


</head>
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">









<?php
$mdate =date('y-m-d');



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
   //echo"<font size ='20'>";
   echo"<table width ='100%'>";      
   echo"<tr><td width ='100%' align ='center'><b><font size='5'>$company</font></b></td></tr>";
   echo"<tr><td width ='100%' align ='center'><b>$address1</b></td></tr>";
   echo"<tr><td width ='100%' align ='center'><b>$address2</b></td></tr>";
   echo"<tr><td width ='100%' align ='center'><b>$address3</b></td></tr></table></font>";






echo"<hr>";
echo"<table width ='100%'><tr><td align ='center' width ='80%'><h1>Aged Debtors Balances</h1></td></tr>
<tr><td align ='left'><h3>Print date</h3>:>>$mdate</td></tr>";
?>

</table>

<!--body background="images/background.jpg">
<form action ="debtors_balances.php" method ="GET">
<table>
<td><input type="submit" name="Submit"  class="button" value="Search Account"></td>
<?php
$mdate =date('y-m-d');
echo"<td><input type='text' name='search' size='50'>Search by:</td>";
echo"<td><select name ='search_by'>";
echo"<option value='Account'>Account</option>";
echo"<option value='Date'>Date</option>";
echo"<option value='Record'>Record</option></select></td>";
?>
<td><input type="submit" name="print"  class="button" value="Send to Printer"></td></table>
</FORM-->
<?php





   



   

$mleast =123552620;
$mdate =date('y-m-d');
$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Record'){
     $query = "select * FROM  debtorsfile WHERE client_id LIKE '%$search%' ORDER BY account_name" ;
     $SQL = "select * FROM  debtorsfile WHERE client_id LIKE '%$search%' ORDER BY account_name" ;
   }
   if ($search_by =='Date'){
     $query = "select * FROM  debtorsfile WHERE register_date LIKE '%$search%' ORDER BY account_name" ;
     $SQL   = "select * FROM  debtorsfile WHERE register_date LIKE '%$search%' ORDER BY account_name" ;
   }
   if ($search_by =='Account'){
     $query = "select * FROM  debtorsfile WHERE account_name LIKE '%$search%' ORDER BY account_name" ;
     $SQL   = "select * FROM  debtorsfile WHERE account_name LIKE '%$search%' ORDER BY account_name" ;
   }
 }else{
   $query= "SELECT * FROM debtorsfile WHERE account_name > '' ORDER BY account_name" or die(mysql_error());
   $SQL  = "SELECT * FROM debtorsfile WHERE account_name > '' ORDER BY account_name" or die(mysql_error());
}

$result =mysql_query($query) or die(mysql_error());

$num =mysql_numrows($result) or die(mysql_error());

$tot =0;

$i = 0;



      $all_c =0;
      $all_t =0;
      $all_s = 0;
      $all_n =0;
      $all_o =0;
      $all_to =0;

                                                         
echo"<table class='altrowstable' id='alternatecolor' border ='1' width ='100%'>";
echo"<tr><th width ='5%'>A/c ID.</th><th width ='20%'>Account Name </th><th width ='5%'>Type</th><th width ='10%'>0 - 30</th><th width ='10%'>Over 30</th><th width ='10%'>Over 60</th><th width ='10%'>Over 90</th><th width ='10%'>Over 120</th><th width ='10%'>Total</th></tr>";


$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"id");  
      $desc    = mysql_result($result,$i,"account_name");   
$curr = 0;
$thirty = 0;
$sixty = 0;
$ninty = 0;
$over = 0;
$total = 0;


      //Now go and bring in the transaction file
      //-----------------------------------------     
        $query3 = "select * FROM dtransf where acc_no ='$desc'" ;
        $result3 =mysql_query($query3);
        $num3 =mysql_numrows($result3);
        $i3=0;


        while ($i3 < $num3)
          {
          $balance   = mysql_result($result3,$i3,"balance");  
          $date   = mysql_result($result3,$i3,"date"); 
 
 
          $mwezi = date('Y-m-d', strtotime("-30 days"));
          $msixty = date('Y-m-d', strtotime("-60 days"));
          $mninety = date('Y-m-d', strtotime("-90 days"));
          $monetwe = date('Y-m-d', strtotime("-120 days"));
          if ($date >= $mwezi){
             $curr = $curr + $balance;
          //echo"Date".$mwezi;
          }

          if ($date < $mwezi and $date >= $msixty){
             $thirty = $thirty + $balance;
                //      echo"Date".$msixty;
          }

          if ($date < $msixty and $date >= $mninety){
             $sixty = $sixty + $balance;
          }

          if ($date < $mninety and $date >= $monetwe){
             $ninty = $ninty + $balance;
          }


          if ($date < $monetwe){
             $over = $over + $balance;
          }


          $total =$curr+$thirty+$sixty+$ninty+$over;
          $i3++;
          }


      $all_c =$all_c+$curr;
      $all_t =$all_t+$thirty;
      $all_s = $all_s+$sixty;
      $all_n =$all_n+$ninty;
      $all_o =$all_o+$over;
      $all_to =$all_to+$total;
   
  
      $update2 = $balance; 
      $tot = $tot +$update2;
      
      //$update = number_format($update);
      //$codes   = number_format($codes2);
      $update2 = number_format($update2);

      $curr = number_format($curr);
      $thirty = number_format($thirty);
      $sixty = number_format($sixty);
      $ninty = number_format($ninty);
      $over = number_format($over);
      $total = number_format($total);

      echo"<tr bgcolor ='white'>";
      echo"<td width ='60' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='250' align ='left'>";      
      echo"$desc";
      echo"</td>";            
      echo"<td width ='60'>";      
      echo"DB";
      echo"</td>";      
      echo"<td width ='50' align ='right'>$curr</td>";
      echo"<td width ='50' align ='right'>$thirty</td>";
      echo"<td width ='50' align ='right'>$sixty</td>";
      echo"<td width ='50' align ='right'>$ninty</td>";
      echo"<td width ='50' align ='right'>$over</td>";
      echo"<td width ='50' align ='right'>$total</td>";

echo"</tr>";   
      $i++;      
}


      $all_c = number_format($all_c);
      $all_t = number_format($all_t);
      $all_s = number_format($all_s);
      $all_n = number_format($all_n);
      $all_o = number_format($all_o);
      $all_to = number_format($all_to);


      echo"<tr bgcolor ='white'>";
      echo"<td width ='60' align ='left'>";      
      echo"";
      echo"</td>";
      echo"<td width ='250' align ='left'>";      
      echo"<h3>Total</h3>";
      echo"</td>";            
      echo"<td width ='60'>";      
      echo"";
      echo"</td>";      
      echo"<td width ='50' align ='right'><h3>$all_c</h3></td>";
      echo"<td width ='50' align ='right'><h3>$all_t</h3></td>";
      echo"<td width ='50' align ='right'><h3>$all_s</h3></td>";
      echo"<td width ='50' align ='right'><h3>$all_n</h3></td>";
      echo"<td width ='50' align ='right'><h3>$all_o</h3></td>";
      echo"<td width ='50' align ='right'><h3>$all_to</h3></td></tr>";

      echo"</table>";
echo"<table>";
   


      $tot = number_format($tot);

      echo"<tr>";

      echo"<td width ='320' align ='left'>";      
      echo"</td>";      
      echo"<td width ='200'>";
      echo"</td>";      
      echo"<td width ='150'><h4>";      
      echo"</h4></td>";      
      echo"<td width ='100' align ='right'>";
      echo"</td>";      
      echo"<td width ='120' align ='right'>";            
      echo"</td>";      
      echo"<td width ='100' align ='right'><h4></h4></td>";      
      echo"<td width ='50'></td>";    
      echo"</tr>";  
      echo"</table>";




?>
</body>
</html>

</body>
</html>


