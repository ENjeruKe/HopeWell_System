
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

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





if (isset($_POST['submit'])){
   $date = date("y/m/d");
   $mm = TIME();
   //$acc_no= TIME(); 
   $acc_no  =$_POST['acc_no'];
   $acc_name=$_POST['acc_name'];
   $type    =$_POST['type'];
   $contact =$_POST['contact'];
   $basic   =$_POST['per_day'];
   $deducted  =0;

   $basic2 = $basic;

   $user = "root";
   $pass = "";
   $database = "busiacounty";
   $host = "localhost";
   $connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   mysql_select_db($database) or die ("Unable to select the database");
   
   $query= "INSERT INTO suppliersfile VALUES('$acc_no','$acc_name','','','','$deducted','$basic2','$date')";
   $result =mysql_query($query);
   echo"<h5>Unit A/c: ".$acc_no." Saved....</h5>";
  }

//0732435100 WWW.ANGAZAGROUP.CO.KE


if (isset($_POST['occupy'])){
   $date = date("y/m/d");
   $acc_no =$_POST['acc_no'];
   $name   =$_POST['acc_name'];
   //$days   =$_POST['days'];
   $address=$_POST['contact'];
   $basic  =$_POST['basic'];
   
   $basic2 = $basic ;
   $deducted  =$basic2;

   $user = "root";
   $pass = "";
   $database = "busiacounty";
   $host = "localhost";
   $connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   mysql_select_db($database) or die ("Unable to select the database");
   
   $query= "UPDATE suppliersfile SET contact ='$name',type ='$address',balance=0,last_trans= '$deducted' WHERE acc_no ='$acc_no'";
   $result =mysql_query($query);


   $query= "INSERT INTO debtorstrfile VALUES('$acc_no','$name','$basic','$basic2','$deducted','','$date')";
   $result =mysql_query($query);

   echo"<h5>Unit A/c: ".$name." Occupied....</h5>";
  }


if (isset($_POST['vacate'])){
   $date = date("y/m/d");
   $acc_no =$_POST['acc_no'];
   $name   =$_POST['acc_name'];
   $days   =$_POST['days'];
   //$address=$_POST['contact'];
   $basic  =$_POST['basic'];
   
   $basic2 = $basic/24;
   $deducted  =$basic2*$days;

   $user = "root";
   $pass = "";
   $database = "busiacounty";
   $host = "localhost";
   $connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   mysql_select_db($database) or die ("Unable to select the database");
   
   $query= "UPDATE suppliersfile SET contact =' ',type=' ',per_day = 0,last_trans= '$deducted' WHERE acc_no ='$acc_no'";
   $result =mysql_query($query);


   $query= "INSERT INTO debtorstrfile VALUES('$acc_no','$name','$basic','$basic2','$deducted','$days','$date')";
   $result =mysql_query($query);

   echo"<h5>Unit A/c: ".$name." Vacated....</h5>";
  }



if (isset($_POST['billing']))
   {
   $user = "root";
   $pass = "";
   $database = "busiacounty";
   $host = "localhost";
   $connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   mysql_select_db($database) or die ("Unable to select the database");

   $query = "select * FROM suppliersfile WHERE contact <>' ' ORDER BY acc_no" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $date =date('d-m-y');
   $mm =date('d-m-y');
   while ($i < $num)
      {
         
      $codes   = mysql_result($result,$i,"acc_no");
  
      $desc    = mysql_result($result,$i,"account");
   
      $rate    = mysql_result($result,$i,"type");
   
      $code   = mysql_result($result,$i,"per_day");
   
      $contact = mysql_result($result,$i,"contact");
  
 
      //$update2 = $update-$code ;
      //$tot = $tot +$update2;

      $query3 = "select * FROM systemf" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $ref_no   = mysql_result($result3,$i3,"next_ref");
  
        $i3++;
        }
        $ref_no2 = $ref_no +1;
        $query3  = "UPDATE systemf SET next_ref ='$ref_no2'";
        $result3 = mysql_query($query3);
   
      $query2= "INSERT INTO renttransfile VALUES('$codes','$desc','$contact','$rate','$ref_no','','$code',' ','$date','$mm')";
      $result2 =mysql_query($query2);
      $i++;
 
   }
}

?>







<body>

<!--form action ="http://localhost/payable_register_s.php" method ="POST">
<input type="submit" name="Submit"  class="button" value="Search Account">
<input type="text" name="search" size="50"><br>
</FORM-->

<?php

   
$user = "root";
   
$pass = "";
   
$database = "busiacounty";
   
$host = "localhost";

   
$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   
mysql_select_db($database) or die ("Unable to select the database");

   











if (isset($_POST['search'])){
   $search = $_POST['search'];
   $query = "select * FROM propertyf WHERE tenent LIKE '%$search%' ORDER BY account" ;
 }else{
   $query= "SELECT * FROM propertyf ORDER BY tenant" or die(mysql_error());

}
$result =mysql_query($query) or die(mysql_error());

$num =mysql_numrows($result) or die(mysql_error());

$tot =0;

$i = 0;





//echo"<table bgcolor ='black' border ='0'>";

                                                         

echo"<table class='altrowstable' id='alternatecolor'>";
echo"<tr><th>House</th><th>Tenants Name </th><th>Telephone</th><th>E-mail</th><th width ='100'>Next Pay</th><th>Expiry</th><th>Balance</th><th>Action</th></tr>";


if (isset($_POST['search'])){
   $search = $_POST['search'];
   $SQL = "select * FROM propertyf WHERE tenant LIKE '%$search%' ORDER BY tenant";
 }else{
    $SQL     = "select * FROM propertyf ORDER BY tenant" ;
 }
$hasil   = mysql_query($SQL, $connect);
$id      = 0;
$nRecord = 1;
$No      = $nRecord;






while ($row=mysql_fetch_array($hasil)) 
      {
         
      $codes   = mysql_result($result,$i,"house");
  


      $desc    = mysql_result($result,$i,"tenant");
   
      $rate    = mysql_result($result,$i,"telephone");
   
      $code   = mysql_result($result,$i,"rent_due");
   
      $update = mysql_result($result,$i,"landlord");
  
      $contact = mysql_result($result,$i,"location");
  


      $expiry = mysql_result($result,$i,"expiry");
  

      
$next_pay = mysql_result($result,$i,"next_pay");
  


      $email    = mysql_result($result,$i,"email");
  


      




echo"</tr>";
    
      $update2 = $code -$code;
//      $tot = $tot +$update2;
//      $code   = number_format($code);
//      $update2 = number_format($update2);
      echo"<tr bgcolor ='white'>";

      echo"<td width ='100' align ='left'>";
      
echo"$codes";

      echo"</td>";

      echo"<td width ='300' align ='left'>";
      
echo"$desc";

      echo"</td>";

      
echo"<td width ='150'>";

      
echo"$rate";

      echo"</td>";

      
echo"<td width ='150'>";
      echo"$email";

      echo"</td>";

      
echo"<td width ='160'>";
      echo"$next_pay";

      echo"</td>";

      
echo"<td width ='150'>";
      echo"$expiry";

      echo"</td>";


      

echo"<td width ='100' align ='right'>$update2</td>";


//      $_SESSION['house'] =$row['house'];  

      $aa =$row['paymode'];        
      $aa2 =$row['tenant'];   
      $aa3=$row['telephone'];        
      $aa4=$row['landlord'];   
      $aa5=$row['email'];   
      $aa6=$row['expiry'];        
      $aa7=$row['next_pay'];        

      

echo"<td width ='100' align ='right'><a href='http://localhost/HGlobal/add_payable_S_account.php?accounts=$aa2&account=$aa&contact=$aa3&type=$aa4&tel=$aa5&comment=$aa6&acc_no=$aa7'>Edit</a></td>";



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

      //echo"Total Salary Paid:";      
      echo"</td>";

      
echo"<td width ='150'><h4>";
      
echo"Total O/S Balance:";      
      echo"</h4></td>";

      
echo"<td width ='100' align ='right'>";
      //echo"Total Salary Paid:";
      
echo"</td>";
      

echo"<td width ='120' align ='right'>";
      
//echo"";
      
echo"</td>";
      

echo"<td width ='100' align ='right'><h4>$tot</h4></td>";

      

echo"<td width ='50'></td>";




      




echo"</tr>";
   




      echo"</table>";




?>
</body>
</html>



