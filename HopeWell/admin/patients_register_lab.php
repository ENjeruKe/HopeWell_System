<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$mdate = $_SESSION['sys_date'];
$username = $_SESSION['username'];

?>



<?php



if (isset($_GET['save_cancel'])){  
   $test1_result  ='';
   $test2_result  ='';
   $test3_result  ='';
   $test4_result  ='';
   $test5_result  ='';

   //Go and save first
   //-------------------
   $adm_no=$_GET['id'];
   $date=$_GET['date'];
   $doctor = $_GET['doc_account'];
   $customer =$_GET['customer'];
   $status =$_GET['status'];
   $height =$_GET['height'];
   $payer =$_GET['payer'];
   $ref_nos =$_GET['height'];
   $weight =$_GET['weight'];
   $temp =$_GET['temp'];
   $b_p =$_GET['b_p'];
   $today =date('y-m-d');
   $sex =$_GET['sex'];
   $age =$_GET['age'];



 //  $done =$_GET['done'];
   $done2 =$line;

//$done = $_SESSION['done'];



//echo '$ref_nos';



//$time = date('y-m-d h:i:s a', time());
 $time = date("Y-m-d H:i:s");


 //Now go and update admit file
 //----------------------------
 $query5= "INSERT INTO logfile VALUES('$time','$customer','$username','Laboratory')";
 $result5 =mysql_query($query5);



//----------------------------
 $tim = date('H:i:s');
$tie = date('Y-m-d');

$query9= "INSERT INTO track VALUES ('','$customer','$username','$tim','$tie','Laboratory')"; 
  $result9 =mysql_query($query9);   



   $test1 =$_GET['test1'];
   $test2 =$_GET['test2'];
   $test3 =$_GET['test3'];
   $test4 =$_GET['test4'];
   $test5 =$_GET['test5'];
   $results =$test1.','.$test2.','.$test3.','.$test4.','.$test5;
   if ($status==''){
      //Go and update the receipts file on whare need to be paid for.
      //------------------------------------------------------------
   }else{
//Now save in htransf
//------------------- 
$payer = $_SESSION['payer'];
if ($payer=''){
   $sql="SELECT * FROM  auto_transact WHERE invoice_no ='$ref_nos' and location='Lab' and selected='pay'";
}else{
   $sql="SELECT * FROM  auto_transact_inv WHERE invoice_no ='$ref_nos' and location='Lab' and selected='pay'";
}
$result = mysql_query($sql);
$i =0;
while($row = mysql_fetch_array($result)) {
    $adm_no = $row['line_no'];
    $item = $row['description'];
    $amount=$row['credit_rate'];
    $price =  $row['sell_price'];
    $paid  =  $row['balance'];
    $customer = $row['gl_account']; 
    $inv_no = $row['invoice_no']; 
    $date   = $row['date']; 
    $rev   = $row['location']; 
 
 
    $query5= "INSERT INTO htransf VALUES('','$adm_no','$customer','$date','$inv_no','$item','DB','$price','$rev','','IP/OPD','','$username','','$date','1','$location')";
    $result5 =mysql_query($query5);
    
    
    
    $query7= "UPDATE ranges SET selected ='yes' WHERE description='$item' and date='$date' and invoice_no ='$ref_nos'";
    $result7 =mysql_query($query7);
    

}
 
$i+++



  
$sql="SELECT * FROM  auto_transact_lab WHERE invoice_no ='$ref_nos' and balance ='0'";
$result = mysql_query($sql);
echo 'Invoice.'.$ref_nos;


while($row = mysql_fetch_array($result)) {
    $id =$row['id'];
    $adm_no = $row['line_no'];
    $item = $row['description'];
    $amount=$row['credit_rate'];
    $price =  $row['sell_price'];
    $paid  =  $row['balance'];
    $used=  $row['qty'];
    $customer = $row['gl_account']; 
    $inv_no = $row['invoice_no']; 
    $date   = $row['date']; 
    $rev   = $row['location']; 
    $sql2="SELECT * FROM  stocklab WHERE description ='$item'";
    $result2 = mysql_query($sql2);
    while($row = mysql_fetch_array($result2)) {
        $balance = $row['qty'];
    }
    $balance = $balance -$used;
    

    $query3= "UPDATE stocklab SET qty ='$balance' WHERE description='$item'";
    $result3 =mysql_query($query3);

    $query3= "UPDATE auto_transact_lab SET balance ='25' WHERE description='$item'";
    $result3 =mysql_query($query3);
}    
    
    
    
    
    
    
    
      if (isset($_GET['test1_result'])){
         $test1_result  =$_GET['test1_result'];
         $query3= "UPDATE medicalfile SET test1 ='$test1',test1_result='$test1_result' WHERE ref_no ='$ref_nos'";
         $result3 =mysql_query($query3);
      }
      if (isset($_GET['test2_result'])){
         $test2_result  =$_GET['test2_result'];
         $query3= "UPDATE medicalfile SET test2 ='$test2',test2_result='$test2_result' WHERE ref_no ='$ref_nos'";
         $result3 =mysql_query($query3);
      }
      if (isset($_GET['test3_result'])){
         $test3_result  =$_GET['test3_result'];
         $query3= "UPDATE medicalfile SET test3 ='$test3',test3_result='$test3_result' WHERE ref_no ='$ref_nos'";
         $result3 =mysql_query($query3);
      }
      if (isset($_GET['test4_result'])){
         $test4_result  =$_GET['test4_result'];
         $query3= "UPDATE medicalfile SET test4 ='$test4',test4_result='$test4_result' WHERE ref_no ='$ref_nos'";
         $result3 =mysql_query($query3);
      }
      if (isset($_GET['test5_result'])){
         $test5_result  =$_GET['test5_result'];
         $query3= "UPDATE medicalfile SET test5 ='$test5',test5_result='$test5_result' WHERE ref_no ='$ref_nos'";
         $result3 =mysql_query($query3);   
      } 


      
      $query3= "UPDATE medicalfile SET status='$status' WHERE ref_no ='$ref_nos'";
      $result3 =mysql_query($query3);    
      
      if ($results<>''){     
         $query3= "UPDATE admitfile SET tests_and _results='$results' WHERE adm_no ='$adm_no'";
         $result3 =mysql_query($query3);    
      }

      $payer = $_SESSION['payer'];
      //Ref. point the next time this patient visits the hospital. Dont delete them
      //-------------------------------------------------------------------------
      //if ($payer<>''){
      //   $sql="DELETE FROM  auto_transact_inv where line_no = '$adm_no' and location ='Lab'";
      //   $result = mysql_query($sql);
      //}

   }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>HMIS | Doctors Page </title>
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
<a href=javascript:popcontact505('lab_walk_in.php')><b>Walk in Patient</b></a><br>
<table align ='right'><td align ='right'>
<form action ="patients_register_lab.php" method ="GET">
<input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
$mdate =date('y-m-d');
echo"<input type='text' name='search' size='50'>Search by:";
echo"<select name ='search_by'>";
//echo"<option value='Selection Option'>A Selection Option required</option>";
echo"<option value='Name'>Name</option>";
echo"<option value='Mobile'>Mobile</option>";
echo"<option value='Doctor'>Doctor</option></select>";
//echo"<input type='text' name='date' size='15' value ='$mdate'><br>";
?>
</FORM>
</td></table><br>
<?php

   


$mleast =123552620;
$mdate =date('y-m-d');
$mdate = $_SESSION['sys_date'];
//$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Doctor'){
     $query = "select * FROM  medicalfile WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
     $SQL = "select * FROM  medicalfile WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
   }
   if ($search_by =='Diagnosis'){
     $query = "select * FROM  medicalfile WHERE diag1,diag2,diag3 LIKE '%$search%' ORDER BY date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE diag1,diag2,diag3 LIKE '%$search%' ORDER BY date desc" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  medicalfile WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
   }
   if ($search_by =='Date'){
     $query = "select * FROM  medicalfile WHERE date = '$search' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE date = '$search' ORDER BY name,date desc" ;
   }
 }else{



   
   $query= "SELECT * FROM medicalfile where status ='To Laboratory' and (date ='$mdate' or type ='Inpatient') ORDER BY date DESC";
   $SQL  = "SELECT * FROM medicalfile where status ='To Laboratory'and (date ='$mdate' or type ='Inpatient') ORDER BY date DESC";
 
   
}

//echo $status;

$result =mysql_query($query);
$num =mysql_numrows($result);




$tot =0;

$i = 0;




                                                         
echo"<table width ='100%' class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='10'>ID</th><th>Click to Edit Patient's Vitals.</th><th>Age</th><th>Sex</th><th>App.Date</th><th>Temp</th><th>Pay Account</th><th>Weight</th><th>B.P</th><th>Type</th></tr>";


$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {               
      $codes   = mysql_result($result,$i,"adm_no");  
      $desc    = mysql_result($result,$i,"name");   
      $rate    = mysql_result($result,$i,"sex");   
      $code   = mysql_result($result,$i,"payer");   
      $update = mysql_result($result,$i,"date");  
      $contact = mysql_result($result,$i,"weight");  
      $street  = mysql_result($result,$i,"temp");
      $age    = mysql_result($result,$i,"age");
      $time   = mysql_result($result,$i,"time");
      $doctor = mysql_result($result,$i,"b_p");
      $height = mysql_result($result,$i,"height");
      $status = mysql_result($result,$i,"type");
    //  $status = $_SESSION['status'];
      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];        
      $aa =$row['ref_no'];   
      $aaa =$row['id'];   
      $xu =$row['type'];   

//      echo"<td width ='10' align ='left'>$codes";      
      echo"<td width ='10'>$codes</a></td>";      
      echo"<td width ='200' align ='left'><a href='patients_lab_edit.php?accounts3=$bb&accounts=$aa&accountso=$xu'>$desc<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      echo"</td>";            
      echo"<td width ='30'>";      
      echo"$age";
      echo"</td>";      
      echo"<td width ='10'>";
      echo"$rate";
      echo"</td>";
      echo"<td width ='70'>";
      echo"$update";
      echo"</td>";
      echo"<td width ='50'>";
      echo"$street";
      echo"</td>";
      echo"<td width ='200'>";
      echo"$code";
      echo"</td>";

      $bb =$row['id'];        
      $aa =$row['id'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      //$aa8=$row['Name'];
      $aa9=$row['app_date']; 
      echo"<td width ='40' align ='right'>$contact</td>";
      echo"<td width ='40'>";
      echo"$doctor";
      echo"</td>"; 
      if ($status=='Inpatient'){
         $color ='green';
      }else{
         $color ='red';
      }
      echo"<td bgcolor ='$color' width ='40' align ='right'>$status</td>";




      



   //   echo '11mer,here11';


echo"</tr>";
   

      $i++;
  
 
//echo '22mer,here22';
      
}
//}
$query2= "SELECT * FROM ipmedicalfile where status ='To Laboratory' and date ='$mdate' ORDER BY date DESC" or die(mysql_error());
$SQL2  = "SELECT * FROM ipmedicalfile where status ='To Laboratory'and date ='$mdate' ORDER BY date DESC" or die(mysql_error());

$result2 =mysql_query($query2) or die(mysql_error());
$num2 =mysql_numrows($result2) or die(mysql_error());

echo 'mer,here';



$tot2 =0;

$i2 = 0;

$hasil2=mysql_query($SQL2, $connect);
$id2 = 0;
$nRecord2 = 1;
$No2 = $nRecord2;
while ($row=mysql_fetch_array($hasil2)) 
      {               
      $codes   = mysql_result($result2,$i2,"adm_no");  
      $desc    = mysql_result($result2,$i2,"name");   
      $rate    = mysql_result($result2,$i2,"sex");   
      $code   = mysql_result($result2,$i2,"payer");   
      $update = mysql_result($result2,$i2,"date");  
      $contact = mysql_result($result2,$i2,"weight");  
      $street  = mysql_result($result2,$i2,"temp");
      $age    = mysql_result($result2,$i2,"age");
      $time   = mysql_result($result2,$i2,"time");
      $doctor = mysql_result($result2,$i2,"b_p");
      $height = mysql_result($result2,$i2,"height");
      $status = mysql_result($result2,$i2,"type");

      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];        
      $aa =$row['ref_no'];   
      $aaa =$row['id'];   
      $xu =$row['type'];   

//      echo"<td width ='10' align ='left'>$codes";      
      echo"<td width ='10' bgcolor='green'><font color ='white'>$codes</font></a></td>";      
      echo"<td width ='200' bgcolor='green' align ='left'><a href='patients_lab_edit.php?accounts3=$bb&accounts=$aa&accountso=$xu'><font color ='white'>$desc</font><img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      echo"</td>";            
      echo"<td width ='30' bgcolor='green'>";      
      echo"<font color ='white'>$age</font>";
      echo"</td>";      
      echo"<td width ='20' bgcolor='green'>";
      echo"<font color ='white'>$rate</font>";
      echo"</td>";
      echo"<td width ='60' bgcolor='green'>";
      echo"<font color ='white'>$update</font>";
      echo"</td>";
      echo"<td width ='50' bgcolor='green'>";
      echo"<font color ='white'>$street</font>";
      echo"</td>";
      echo"<td width ='200' bgcolor='green'>";
      echo"<font color ='white'>$code</font>";
      echo"</td>";

      $bb =$row['id'];        
      $aa =$row['id'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      //$aa8=$row['Name'];
      $aa9=$row['app_date']; 
      echo"<td width ='40' align ='right' bgcolor='green'><font color ='white'>$contact</font></td>";
      echo"<td width ='40' bgcolor='green'>";
      echo"<font color ='white'>$doctor</font>";
      echo"</td>"; 
      echo"<td width ='40' align ='right' bgcolor='green'><font color ='white'>$status</font></td>";




      




echo"</tr>";
   

      $i++;
  
       
}
      echo"</table>";









      




echo"<table>";
   


      $tot = number_format($tot);

      echo"<tr>";

      echo"<td width ='320' align ='left'>";
      
//echo"$desc";

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


