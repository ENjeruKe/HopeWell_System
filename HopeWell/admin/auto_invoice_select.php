<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>



<?php
if (isset($_GET['accounts3'])){  
   if (!isset($_GET['accounts2'])){    
      $adm_no  = $_GET['accounts3'];
      $inv_no  = $_GET['accounts'];
      $tot2    = $_GET['accounts4'];
      $selecteds    = $_GET['accounts5'];


      //check if invoice already finalised
      //-------------------   ------------
      $query3 = "select * FROM dtransf";
      $result3 = mysql_query($query3) or die(mysql_error());
      $num3    = mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      $types ='TRF';
      while ($i3 < $num3)
        {
         $doc_no     = mysql_result($result3,$i3,"doc_no");   
         $type       = mysql_result($result3,$i3,"type");   
         if ($type=='TRF' and $doc_no==$selecteds){
            echo"<br><br><br><br><br><br><br><br><br>";
            echo"<font color ='red'><h1>Invoice already finalised.............</font></h1><br>Kindly check with accounts Department or get help from your IT Department.<br><br><a href ='auto_invoice_select.php'><font color ='white'>Go back. Thank you.</a></font>";
            die();
         }
         $i3++;
       }

      if (!isset($_SESSION['total_tabulate'])){
         $_SESSION['total_tabulate'] = $_GET['accounts4'];
      }else{
         //$tot2 = $_SESSION['total_tabulate'] + $_GET['accounts4'];
         //$_SESSION['total_tabulate'] = $tot2;
      }
     $_SESSION['get_adm'] = $_GET['accounts3'];
     $_SESSION['get_inv'] = $_GET['accounts5'];
     $query3  = "UPDATE  auto_transact_inv SET selected='Yes' WHERE invoice_no ='$selecteds' and credit_rate<>0";
     $result3 = mysql_query($query3);
   }else{
     $inv_no  = $_GET['accounts3'];
     $adm_no  = $_GET['accounts2'];

     $query3  = "UPDATE  auto_transact_inv SET selected=' ' WHERE id ='$inv_no'";
     $result3 = mysql_query($query3);
      //$tot2    = -$tot2;
      if (!isset($_SESSION['total_tabulate'])){
         //$_SESSION['total_tabulate'] = -$_GET['accounts4'];
      }else{
         $tot2 = $_SESSION['total_tabulate'] - $_GET['accounts4'];
         //$_SESSION['total_tabulate'] = $tot2;
         if ($tot2 <= 0){
            $tot2 = 0;
            //$_SESSION['total_tabulate'] =0;
         }
      }
   }
     $query3  = "select * FROM auto_transact_inv WHERE line_no ='$adm_no'" ;
     $result3 = mysql_query($query3) or die(mysql_error());
     $num3    = mysql_numrows($result3) or die(mysql_error());
     $i3=0;
     $tot2=0;
     while ($i3 < $num3)
       {       
       $selected  = mysql_result($result3,$i3,"selected");  
       if ($selected=='Yes'){
          $amounts   = mysql_result($result3,$i3,"credit_rate");  
          $tot2 = $tot2+$amounts;
       }
       $i3++;
     }     
     //echo 'Amount:'.$tot2;
}

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















<body>
<table align ='right'><td align ='right'>
<form action ="auto_invoice_select.php" method ="GET">
<input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
$mdate =date('y-m-d');
echo"<input type='text' name='search' size='50'>Search by:";
echo"<select name ='search_by'>";
//echo"<option value='Selection Option'>A Selection Option required</option>";
echo"<option value='Adm No.'>Adm No.</option>";
echo"<option value='Name'>Name</option>";
echo"<option value='Mobile'>Mobile</option></select>";
//echo"<input type='text' name='date' size='15' value ='$mdate'><br>";
?>
</FORM>
</td></table>
<?php

   


$mleast =123552620;
$mdate =date('y-m-d');
//$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Adm No.'){
     $query = "select * FROM  auto_transact_inv WHERE line_no ='$search' and credit_rate <> 0 ORDER BY date desc" ;
     $SQL = "select * FROM  auto_transact_inv WHERE line_no = '$search' and credit_rate <> 0 ORDER BY date desc" ;
   }
   if ($search_by =='Mobile'){
     $query = "select * FROM  auto_transact_inv WHERE gl_account LIKE '%$search%' ORDER BY date desc" ;
     $SQL   = "select * FROM  auto_transact_inv WHERE gl_account LIKE '%$search%' ORDER BY date desc" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  auto_transact_inv WHERE gl_account LIKE '%$search%' and credit_rate <> 0 and date ='$mdate' ORDER BY gl_account,date desc" ;
     $SQL   = "select * FROM  auto_transact_inv WHERE gl_account LIKE '%$search%' and credit_rate <> 0 and date ='$mdate' ORDER BY gl_account,date desc" ;
   }
 }else{
   $query= "SELECT * FROM auto_transact_inv where credit_rate <> 0 ORDER BY invoice_no" or die(mysql_error());
   $SQL  = "SELECT * FROM auto_transact_inv where credit_rate <> 0 ORDER BY invoice_no" or die(mysql_error());
}


$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;




                                                         
echo"<table class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='10'>Adm No.</th><th width ='200'>Patients Name</th><th>Date</th><th width ='100'>Item Description</th><th>@Price</th><th width ='10'>Qty</th><th>Total<br>Pay</th></tr>";

$total = 0;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"invoice_no");  
      $desc    = mysql_result($result,$i,"gl_account");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $code   = mysql_result($result,$i,"description");   
      $update = mysql_result($result,$i,"date");  
      $contact = mysql_result($result,$i,"sell_price");  
      $street  = mysql_result($result,$i,"credit_rate");
      $select  = mysql_result($result,$i,"selected");
      $age    = mysql_result($result,$i,"qty");
      $phone  = " ";
      $doctor = "";
      $total  = $total+$street;
      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['id'];        
      $selects =$row['selected'];        
      if ($selects<>'Yes'){
         echo"<td width ='50' align ='left'>$codes";      
      }else{
         echo"<td width ='50' align ='left' bgcolor ='green'>$codes";      
      }
      echo"</td>";
      if ($selects<>'Yes'){
         echo"<td width ='300' align ='left'>$desc";
      }else{
         echo"<td width ='300' align ='left' bgcolor ='green'>$desc";
      }
      echo"</td>";          
      if ($selects<>'Yes'){  
         echo"<td width ='100'>$update";
      }else{
         echo"<td width ='100' bgcolor ='green'>$update";
      }
      echo"</td>";
      if ($selects<>'Yes'){  
         echo"<td width ='300'>$code";
      }else{
         echo"<td width ='300' bgcolor ='green'>$code";
      }
      echo"</td>";
      if ($selects<>'Yes'){  
         echo"<td width ='40'>$rate";
      }else{
         echo"<td width ='40' bgcolor ='green'>$rate";
      }
      echo"</td>";

      $bb =$row['line_no'];        
      $aa =$row['id'];        
      $aa3=$row['credit_rate'];
      $aa5=$row['invoice_no'];
      $select=$row['selected'];

      if ($select=='Yes'){
echo"<td width ='40' align ='right'><a href='auto_invoice_select.php?accounts3=$aa&accounts2=$bb&accounts4=$aa3'>$age.Del</a>   
</td>";
}else{
      echo"<td width ='40' align ='right'><a href='auto_invoice_select.php?accounts3=$aa&accounts2=$bb&accounts4=$aa3&accounts5=$aa5'>$age</a><font color ='red'>Sel</font></td>";
}
   
      //echo"</td>";

      $aa9=$row['app_date']; 


if ($select==''){
echo"<td width ='60' align ='right'><a href='auto_invoice_select.php?accounts=$aa&accounts3=$bb&accounts4=$aa3&accounts5=$aa5'>$street.Add</a></td>";
}else{
echo"<td width ='60' align ='right'><a href='auto_invoice_select.php?accounts=$aa&accounts3=$bb&accounts4=$aa3&accounts5=$aa5'>$street.Add</a></td>";
}  



      




echo"</tr>";
   

      $i++;
  
       
}

      echo"</table>";









      




echo"<table>";
   


      $tot = number_format($total);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";      
      echo"</td>";

$cc  = $_SESSION['get_adm'];
$_SESSION['amt_paid'] =$tot2;
$aa5  = $_SESSION['get_inv'];
      
echo"<td width ='200'>";
      echo"</td>";
echo"<td width ='150' align='right'><h4>";
      echo"</td>";
echo"<td width ='100' align ='right'>";
echo"</td>";
echo"<td width ='120' align ='right'>Total Amount:</td>";
echo"<td width ='100' align ='right'></td>";
if ($tot2==0){
   echo"<td width ='50'>$tot</h4></td>";
}else{    
//echo"<td width ='100' align ='right'><a href=javascript:popcontact61('post_receipts.php?accounts=$aa&accounts3=$cc&//accounts4=$tot2')>$tot2 Pay</a></td>";
echo"<td width ='100' align ='right'><a href='auto_save_invoice.php?accounts=$aa&accounts3=$cc&accounts4=$tot2&accounts5=$aa5'>$tot2 Pay</a></td>";

}




      




echo"</tr>";
   




      echo"</table>";




?>
</body>
</html>

