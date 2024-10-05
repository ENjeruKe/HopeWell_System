<!DOCTYPE html>
<html lang="en">
  
<head>
    
<meta charset="utf-8">
    
<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
    
<div class="navbar navbar-inverse navbar-fixed-top">
      
<div class="navbar-inner">                  
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
<a class="brand" href="#">Medi+ V10 (HMIS Global)</a><div class="nav-collapse collapse"><p class="navbar-text pull-right"><a target="_blank" href="http://www.hmisglobal.com" class="navbar-link">www.hmisglobal.com</a></p>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>







<!-- Le styles -->
    
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
<style type="text/css">
	body {
		padding-top: 0px;
		padding-bottom: 40px;
	}
	.sidebar-nav {
		padding: 9px 0;
	}
	.nav
	{
		margin-bottom:10px;
	}	
	.accordion-inner a {
		font-size: 13px;
		font-family:tahoma;
	}
	.alert {
		padding:8px 14px 8px 14px;
	}
    </style>





<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php



if (isset($_GET['billing']))
   {
      $account =' ';
      $user = "root";
      $pass = "";
      $database = "phpgrid";
      $host = "localhost";
      $connect = mysql_connect($host,$user,"$pass")or die ("Unable to connect");
      mysql_select_db($database) or die ("Unable to select the database");
      $total = 0;
      //Get the invoice No.
      //here
      $query3 = "select * FROM companyfile" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $ref_no   = mysql_result($result3,$i3,"next_sup_inv"); 
        $i3++;
        }
        $ref_no2 = $ref_no +1;
        $query3  = "UPDATE companyfile SET next_sup_inv ='$ref_no2'";
        $result3 = mysql_query($query3);

        //Get data from temp file and save
        $supplier         =$_GET['supplier'];
        $amount           =$_GET['amount'];
        $ref_no        =$_GET['ref_no'];
        $date           =$_GET['date'];
        if (isset($_GET['account']))
           {
           $account        =$_GET['account'];
           $desc           =$_GET['account'];
        }else{
           $account        =' ';
           $desc           =$_GET['supplier'];
        }
        $patient        =$_GET['patient'];

        $mydate = date('y-m-d');

   //Now go and get name and file from the clients file
   $query3 = "select * FROM clients" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $idno     = mysql_result($result3,$i3,"client_id");  
     $pat_name   = mysql_result($result3,$i3,"patients_name");   
     $pay_company= mysql_result($result3,$i3,"pay_account");   
     $ward_bed = $pat_name.'-'.$idno;
     if ($ward_bed==$patient){
        $patient  = $pat_name;
        $idno    = $idno;
        $adm_no    = $idno;
      
     }
     $i3++;    
   }
   //$query  = "UPDATE clients SET pay_account ='$account',adm_date ='$date',disch_date =' ',bed_no ='$bed' WHERE patients_name ='$update_bed' AND client_id ='$update_ward'";
   //$result = mysql_query($query);


   //Now go and Check Bed Charge in Revenue file
   $query3 = "select * FROM revenuef WHERE name ='$supplier'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $gledger ='Bed Income';
   $i3=0;
   while ($i3 < $num3)
     {
     $gledger     = mysql_result($result3,$i3,"gl_account");  
     $i3++;
   }
   //$amount = -$amount;
   //Now go and post Bed Charge at the beds rate
   $query= "INSERT INTO htransf VALUES('$adm_no','$patient','$date','$ref_no','$desc','','-$amount','IP','$gledger','CR',' ','ADMIN',' ','$mydate','1','$pay_company')";
   $result =mysql_query($query);

}

?>








<body>
<form action ="credit_notes.php" method ="GET">
<?php


 $mysqlserver="localhost";
 $mysqlusername="root";
 $mysqlpassword="";

 $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());            
 $dbname = 'phpgrid';
 mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
 //Get the receipt No.


$code2 =' ';
$sql="SELECT * FROM revenuef WHERE name ='$code2'";
$result=mysql_query($sql);	 
$rows=mysql_fetch_array($result);

if (isset($_GET['revenue_search'])){
   $code2=$_GET['supplier'];
   $sql="SELECT * FROM revenuef WHERE name ='$code2'";
   $result=mysql_query($sql);	 
   $rows=mysql_fetch_array($result);
   }







   
 $query3 = "select * FROM companyfile" ;
 $result3 = mysql_query($query3) or die(mysql_error());
 $num3 = mysql_numrows($result3) or die(mysql_error());
 $i3=0;
 while ($i3 < $num3)
  {
  $ref_no   = mysql_result($result3,$i3,"next_sup_inv");
  $i3++;
  }
  $ref_no = $ref_no;
  //$query3  = "UPDATE companyfile SET next_ref ='$ref_no2'";
  //$result3 = mysql_query($query3);
  //Will update next ref when saving this transaction

$date = date('y-m-d');


echo"<table width ='400' border='0' border color ='black'><tr><td width='50' align='right'><b>Ref No.: </b></td><td><input type='text' name='ref_no' size='20' value ='$ref_no'></td></tr><tr><td width ='50' align ='right'><b>Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td></tr><tr><td width='100' align='right'><b>Service Off.: </b></td><td>";
 if (!isset($_GET['revenue_search'])){
    echo"<select id='supplier' name='supplier'>";        
 }
 $mysqlserver="localhost";
 $mysqlusername="root";
 $mysqlpassword="";

 $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());            
 $dbname = 'phpgrid';
 mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT name FROM revenuef";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());

 if (isset($_GET['revenue_search'])){
     echo"<input type='text' name='supplier' size='20' value ='$code2'>";
   }else{            
   while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["name"];
   echo "<option>$cdTitle</option>";            
   }
}
 if (!isset($_GET['revenue_search'])){
  echo"</select>";
}
echo"</td><td><input type='submit' name='revenue_search'  class='button' value='Search'></td></tr>";
echo"<tr><td width='100' align='right'><b>Rate: </b></td><td>";
$mm = $rows['gl_account'];
?>
<input type='text' name='amount' size='20' value ="<?php echo $rows['credit_rate'];?>">

<?php
echo"</td></tr>";

if (isset($_GET['revenue_search']) AND $mm=='Consultants Income') {
   echo"<tr><td width='100' align='right'><b>Doctors A/c </b></td><td>";
   echo"<select id='account' name='account'>";        
   $cdquery="SELECT account_name FROM doctorsfile";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
    while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];
      echo "<option>$cdTitle</option>";            
      }
     echo"</select>";
   echo"</td></tr>";
} 

echo"<tr><td width='100' align='right'><b>Select Patient: </b></td><td>";
echo"<select id='patient' name='patient'>";        
$cdquery="SELECT patients_name,client_id FROM clients ORDER BY patients_name ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["patients_name"].'-'.$cdrow["client_id"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select>";
echo"</td></tr>";

echo"</table>";

?>
<br>
<table width ='400' border='0' border color ='black'><td align ='center'><input type='submit' name='billing'  class='button' value='Save '></td></table>
</FORM>

<table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' height='100' width='130'></td>
</table>




</body>
</html>




