<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$mdate = $_SESSION['sys_date'];
?>



<?php

$mdate = $_SESSION['sys_date'];
if (isset($_GET['save_cancel'])){  
   //Go and save first
   //-----------------
   $adm_no=$_GET['id'];
   $date=$_GET['date'];
   $doctor = $_GET['doc_account'];
   $customer =$_GET['customer'];
   $status =$_GET['status'];
   $height =$_GET['height'];
   $weight =$_GET['weight'];
   $temp =$_GET['temp'];
   $b_p =$_GET['b_p'];
   //$today =date('y-m-d');
   $today = $_SESSION['sys_date'];
   $sex =$_GET['sex'];
   $age =$_GET['age'];
   $diag1 =$_GET['diag1'];
   $diag2 =$_GET['diag2'];
   $test1 =$_GET['test1'];
   $textarea =$_GET['textarea'];
   $textarea2 =$_GET['textarea2'];
   $complain  =$_GET['textarea2'];


   $query2= "UPDATE admitfile SET location ='$location',doctor='$doctor',weight='$weight',temp='$temp',b_p='$b_p',height='$height',sign1='$sign1',sign2='$sign2',sign3 ='$sign3',notes='$textarea' WHERE adm_no ='$adm_no' and date='$today'";
   $result2 =mysql_query($query2);


 //End of Invoice transactions
 //---------------------------
}


   $grand_total = $test_total+$drug_total;


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>HMIS | ADMISSION FORM : Page </title>
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
<form action ="nurses_station_pg2.php" method ="GET">
<input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
//$mdate =date('y-m-d');
echo"<input type='text' name='search' size='50' >Search by:";
echo"<select name ='search_by'>";
//echo"<option value='Selection Option'>A Selection Option required</option>";
echo"<option value='Name'>Name</option>";
echo"<option value='Date'>Date</option>";
echo"<option value='Mobile'>Mobile</option>";
echo"<option value='Doctor'>Doctor</option></select>";
?>
</FORM>
</td></table><br>
<?php

   
//To remove on the server version
//-------------------------------
   $query = "select * FROM companyfile where company<>''" ;
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $i=0;
   while ($i < $num)
    {
     $mdate   = mysql_result($result,$i,"last_date");
    $i++;
    }

$mleast =123552620;
//$mdate =date('y-m-d');
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Name'){
     $query = "select * FROM nursesfile3 WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
     $SQL   = "select * FROM nursesfile3 WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
   }
   if ($search_by =='Date'){
     $query = "select * FROM nursesfile3 where date ='$search' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  nursesfile3 where date ='$search' ORDER BY name,date desc" ;
   }

 }else{
   $query= "SELECT * FROM nursesfile3 where date ='$mdate' and status=''" or die(mysql_error());
   $SQL  = "SELECT * FROM nursesfile3 where date ='$mdate' and status=''" or die(mysql_error());
}

$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;




                                                         
echo"<table width ='100%' class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='10'>IP Number</th><th>Patients Name</th></tr>";

$hasil=mysql_query($SQL, $connect);
$id = 0;
$i=0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($result)) 
      {         
      $id      = mysql_result($result,$i,"id");  
      $codes   = mysql_result($result,$i,"adm_no");  
      $desc    = mysql_result($result,$i,"name");   
      $rate    = '';   
      $code   = '';   
      $update = mysql_result($result,$i,"date");  
      $contact = '';  
      $street  = '';
      $age    = '';
      $aa =$row['id'];   
      $adm_no   = "";
      //mysql_result($result,$i,"bed_no");;
      $doctor = '';
      $height = date('y-m-d');
      //mysql_result($result,$i,"last_updated");
      $dis_date = '0000-00-00';
      //mysql_result($result,$i,"dis_date");


 $query3 = "select * FROM appointmentf" ;
 $result3 =mysql_query($query3) or die(mysql_error());
 $num3 =mysql_numrows($result3) or die(mysql_error());
 $i3=0;
 while ($i3 < $num3){ 
    $adm_no   = mysql_result($result3,$i3,"adm_no");
    if ($adm_no ==$codes){
       $bed_no   = mysql_result($result3,$i3,"bed_no");
    }
$i3++;
}



      $ref_nos= " ";
      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];              
      $aa2 =$row['ref_no'];

      echo"<td width ='10' align ='left'>$codes";      
      echo"</td>";

      echo"<td width ='300' align ='left'><a href=javascript:popcontact4('nurses_station_pg3.php?accounts3=$bb&accounts=$aa&ref_no=$aa2')>$desc<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      echo"</td>";            
     
      //echo"<td width ='30'>";      
      //echo"$age";
      //echo"</td>";      
      //echo"<td width ='20'>";
      //echo"$rate";
      //echo"</td>";
      //echo"<td width ='100'>";
      //echo"$bed_no";
      //echo"</td>";
      //echo"<td width ='200'>";
      //echo"$update";
      //echo"</td>";
      //echo"<td width ='300'>";
      //echo"$code";
      //echo"</td>";

      $bb =$row['id_no'];        
      $aa =$row['id_no'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      $aa9=$row['adm_date']; 




      




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

