<?php
   session_start();
require('open_database.php');
$branch = $_SESSION['company'];
?>


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
      //$user = "root";
      //$pass = "";
      //$database = "phpgrid";
      //$host = "localhost";
      //$connect = mysql_connect($host,$user,"$pass")or die ("Unable to connect");
      //mysql_select_db($database) or die ("Unable to select the database");
      $total = 0;
      //Get the invoice No.
      //here
      $query3 = "select * FROM systemf" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $ref_no   = mysql_result($result3,$i3,"next_sup_inv"); 
        $i3++;
        }
        $ref_no2 = $ref_no +1;
        $query3  = "UPDATE systemf SET next_sup_inv ='$ref_no2'";
        $result3 = mysql_query($query3);

        //Get data from temp file and save
        $supplier         =$_GET['supplier'];
        $bed              =$_GET['bed'];
        //$ref_no        =$_GET['ref_no'];
        $date           =$_GET['date'];
        $mydate = date('y-m-d');



     //Now go and check in bedfile
     if ($supplier==$bed){
        $query0 = "select * FROM clients WHERE patients_name >='$supplier' AND patients_name <='$bed' AND bed_no<>' '" ;
     }else{
        $query0 = "select * FROM clients WHERE bed_no<>' '" ;
     }
     $result0 =mysql_query($query0) or die(mysql_error());
     $num0 =mysql_numrows($result0) or die(mysql_error());
     $i0=0;
     while ($i0 < $num0)
       {
       $id     = mysql_result($result0,$i0,"client_id");  
       $bed_no   = mysql_result($result0,$i0,"bed_no");   
       $patients_name    = mysql_result($result0,$i0,"patients_name");
       $account    = mysql_result($result0,$i0,"pay_account");
       $id_patient = $id.'-'.$patients_name;
   
//echo"$id_patient";

      //Now go and admit patient the Level in stocks file
      $query3 = "select * FROM bedsfile WHERE patients_name ='$id_patient'" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $ward     = mysql_result($result3,$i3,"ward");  
        $bed_no   = mysql_result($result3,$i3,"bed_no");   
        $recno    = mysql_result($result3,$i3,"client_id");
        $rate     = mysql_result($result3,$i3,"rate");
        $ref_no   = $bed_no.'/'.$mydate;   
        $ward_bed = $ward.$bed_no;
        $i3++;
      }

      //Now go and Check Bed Charge in Revenue file
      $query3 = "select * FROM revenuef WHERE name ='Bed Charge'" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $gledger ='Bed Income';
      $desc ='Daily Bed Charge -'.$ward_bed;
      $i3=0;
      while ($i3 < $num3)
        { 
        $gledger     = mysql_result($result3,$i3,"gl_account");  
        $i3++;
        }
      //Now go and post Bed Charge at the beds rate
      $query= "INSERT INTO h_transf VALUES('$id','$patients_name','$date','$ref_no','$desc','GBED','$rate','IP','$gledger','DB',' ','ADMIN',' ','$mydate','1','$account')";
      $result =mysql_query($query);

      $i0++;
      }

}

?>








<body>
<form action ="daily_bedcharge.php" method ="GET">
<?php


// $mysqlserver="localhost";
// $mysqlusername="root";
// $mysqlpassword="";

// $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());            
// $dbname = 'phpgrid';
// mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
 //Get the receipt No.
   
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


echo"<table width ='400' border='0' border color ='black'><tr><td width ='50' align ='right'><b>Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td></tr><tr><td width='100' align='right'><b>From Patient: </b></td><td>";
echo"<select id='supplier' name='supplier'>";        

// $mysqlserver="localhost";
// $mysqlusername="root";
// $mysqlpassword="";

// $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());            
// $dbname = 'phpgrid';
// mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT patients_name FROM clients WHERE bed_no<>' '";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["patients_name"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr>";

 echo"<tr><td width='100' align='right'><b>To Patient: </b></td><td>";
 echo"<select id='bed' name='bed'>";        
 $cdquery="SELECT patients_name FROM clients WHERE bed_no<>' '";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["patients_name"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr></table>";



?>

<table width ='400' border='0' border color ='black'><td width ='100'></td><td><input type='submit' name='billing'  class='button' value='Run Daily Bed Charge'></td></table>
</FORM>

<table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' height='70' width='80'></td>
</table>




</body>
</html>




