
<!DOCTYPE html>
<html lang="en">
  
<head>
    
<meta charset="utf-8">
    
<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
    
<div class="navbar navbar-inverse navbar-fixed-top">
      
<div class="navbar-inner">                  
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
<a class="brand" href="#">Medi+ V10 (HMIS Global)</a><div class="nav-collapse collapse"><p class="navbar-text pull-right"><a target="_blank" href="http://www.hmisglobal.com" class="navbar-link"><h1>Medi+ V10 (HMIS Global) | Property Manager</h1></a></p>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>







<!-- Le styles -->
    
<!--link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"-->
    
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

      $tenant=$_GET['tenant'];
      $telephone=$_GET['telephone'];
      $email=$_GET['email'];
      $leaseperiod=$_GET['leaseperiod'];
      $rent_due=$_GET['rentdue'];
      $landlord=$_GET['landlord'];
      $expiry=$_GET['expiry'];
      $paymode=$_GET['paymode'];
      $house=$_GET['house'];
      $location=$_GET['location'];
      $nextpay=$_GET['nextpay'];


      $account =' ';
      $user = "root";
      $pass = "";
      $database = "busiacounty";
      $host = "localhost";
      $connect = mysql_connect($host,$user,"$pass")or die ("Unable to connect");
      mysql_select_db($database) or die ("Unable to select the database");
      $total = 0;
      //Get the invoice No.
      //here

   //Now go and post Bed Charge at the beds rate
   $query= "INSERT INTO propertyf VALUES('','$tenant','$house','$telephone','$email','$leaseperiod','$rent_due','$landlord','$expiry','$paymode','$location','$nextpay')";
   $result =mysql_query($query);

}

?>








<body>
<form action ="" method ="GET">
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







   
 $query3 = "select * FROM systemf" ;
 $result3 = mysql_query($query3) or die(mysql_error());
 $num3 = mysql_numrows($result3) or die(mysql_error());
 $i3=0;
 while ($i3 < $num3)
  {
  $ref_no   = mysql_result($result3,$i3,"next_sup_inv");
  $i3++;
  }
  $ref_no = $ref_no;
  //$query3  = "UPDATE systemf SET next_ref ='$ref_no2'";
  //$result3 = mysql_query($query3);
  //Will update next ref when saving this transaction

$date = date('y-m-d');


echo"<table width ='700' border='0' border color ='black'><tr><td width='100' align='right'><b>TenantsName: </b></td><td><input type='text' name='tenant' size='50' ></td></tr><tr><td width ='50' align ='right'><b>Telephone No: </b></td><td><input type='text' name='telephone' size='50' ></td></tr><tr><td width ='50' align ='right'><b>E-mail A/c: </b></td><td><input type='text' name='email' size='50' ></td></tr>";
echo"<td width='50' align='right'><b>Lease Period: </b></td><td><input type='text' name='leaseperiod' size='20'></td><td><input type='submit' name='revenue_search'  class='button' value='Tabulate'></td></tr>";
echo"<td width='50' align='right'><b>Rent Due: </b></td><td><input type='text' name='rentdue' size='20' ></td></tr>";
echo"<td width='100' align='right'><b>LandLord: </b></td><td><input type='text' name='landlord' size='20'></td><td><h3>Other Details</h3></td></tr></table><br>";

echo"<hr>";
echo"<table width ='700' border ='0'><td width='100'><b>Lease Expiry: </b></td>";
echo"<td width='100' border='1' align='right'><b>Pay Mode: </b></td>";
echo"<td width='100' align='right'><b>House No: </b></td>";
echo"<td width='100' align='right'><b>Location: </b></td>";
echo"<td width='100' align='right'><b>Next Payment: </b></td></table>";
echo"<hr>";

echo"<table width ='700' border ='0'><td width ='50' align='left'><input type='text' name='expiry' size='10' ></td>";
echo"<td width ='50' align='right'><input type='text' name='paymode' size='10' ></td>";
echo"<td width ='50' align='right'><input type='text' name='house' size='10' ></td>";
echo"<td width ='50' align='right'><input type='text' name='location' size='10' ></td>";
echo"<td width ='50' align='right'><input type='text' name='nextpay' size='10' ></td>";

echo"</table>";

?>
<table width ='400' border='0' border color ='black'><td align ='left'><input type='submit' name='billing'  class='button' value='Save '></td></table>
</FORM>


<div id="section">

<OBJECT data="property_register_s.php" type="text/html" style="margin: 0%; width: 900px; height: 200px;"></OBJECT>
</div>


</body>
</html>




