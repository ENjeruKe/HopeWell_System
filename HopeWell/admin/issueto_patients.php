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


<br>

﻿<?php
//session_start();
//$_SESSION['adm_no'] = $_GET['accounts3'];
//$adm_no = $_SESSION['adm_no'];
//For save and print button
//------------------__-----
if (isset($_GET['save_cancel'])){
  
   //Go and save first
   //-------------------
   $date=$_GET['date'];
   $patients_name =$_GET['patients_name'];
   $adm_no =$_GET['adm_no'];
   $paid   =$_GET['paid'];
   $payer  =$_GET['db_accounts'];

   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");

   $db_accounts  = $payer;
   $db_accounts2 = $payer;
   //Get the receipt No.   
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_ref ='$ref_no2'";
     $result3 = mysql_query($query3);





   $query = "select * FROM sales" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $tot_amt =0;

   while ($i < $num)
      {         
      $codes   = mysql_result($result,$i,"location");  
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");
      $total   = mysql_result($result,$i,"gl_account");  
      $tot_amt = $tot_amt + $total;
      $desc    = trim($desc);
      $desc    = substr($desc, -10);

      //Add Qty in file
      $query2 = "select * FROM stockfile WHERE location ='$codes'" ;
      //search_name ='$desc' AND 
      $result2 =mysql_query($query2) or die(mysql_error());
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num2 =mysql_numrows($result2) or die(mysql_error());
      $i2 =0;
      while ($i2 < $num2)
         {
         $item_desc    = mysql_result($result2,$i2,"search_name");    
         $item_desc    = trim($item_desc);
         $item_desc    = substr($item_desc, -10);
         if ($item_desc==$desc){
            $qtys         = mysql_result($result2,$i2,"qty");
            $desc         = mysql_result($result2,$i2,"description");   
         }
         $i2++;
 
      }
      $qty2 = $qtys-$qty;


      $query3= "UPDATE stockfile SET qty ='$qty2' WHERE search_name ='$desc' AND location ='$codes'";
      $result3 =mysql_query($query3);

      $patient =$patients_name;
      $query4= "INSERT INTO st_trans VALUES('$codes','$desc','$patient','$qty_s','CASH RECEIPT','$date','ADMIN','$rate','$total','$ref_no','$adm_no')";
      $result4 =mysql_query($query4);
      //Now go and update the receipt file

      $i++;
 
   }

   //Update Balances if not paid in full
   //-----------------------------------
   $topay = $tot_amt - $paid;
   //if ($tot_amt > $paid){
   $query3 = "select * FROM clients WHERE adm_no ='$adm_no'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
       {
       $balance   = mysql_result($result3,$i3,"balance");
  
       $acc_no    = mysql_result($result3,$i3,"pay_account");

       $db_account= mysql_result($result3,$i3,"pay_account");
  
       $i3++;
     }
     $balance2 = $balance+$topay;
     $query= "UPDATE clients SET balance ='$balance2' WHERE adm_no ='$adm_no'";
     $result =mysql_query($query);



     //End of balance now go and update the debtorsf file
     //--------------------------------------------------
     //$accno = $db_account;
     if ($db_accounts=='' AND $topay > 0 ){ 
        $db_accounts  =  $patients_name;
        $bal_account  =  $adm_no;
     }


     //Now go and reduce the bill in htransf
     //--------------------------------------
     //--$balance = $balance+$topay;
     //--$query= "UPDATE client SET balance ='$balance' WHERE adm_no ='$adm_no'";
     //--$result =mysql_query($query);
     //End of balance now go and update the debtors transaction file
     //-------------------------------------------------------------

   //}

     //Update Sales summary file with or without balance
     //-------------------------------------------------
     $query5= "INSERT INTO receiptf VALUES('$codes','CASH SALE','$patient','$qty_s','CASH 
     RECEIPT','$date','ADMIN','$tot_amt','$paid','$ref_no','$topay','$adm_no')";
     $result5 =mysql_query($query5);

     $query= "UPDATE receiptf SET balance ='$topay' WHERE ref_no ='$ref_no'";
     $result =mysql_query($query);


     //--------------------------------------
     $query5= "INSERT INTO htransf VALUES('$adm_no','$patients_name','$date','$ref_no','CASH/CHQ RECEIPT','RC 
     ','-$tot_amt','RC ','RC ','IP/OPD',' ','ADMIN','','$date','1','$db_accounts')";
     $result5 =mysql_query($query5);
     //If balance is not Zero, pass entry in dtransf
     //---------------------------------------------

        if ($db_accounts2==''){
           $bal_account = $adm_no;
        }else{
           $query3 = "select * FROM debtorsfile WHERE account_name ='$db_accounts'" ;
           $result3 =mysql_query($query3) or die(mysql_error());
           $num3 =mysql_numrows($result3) or die(mysql_error());
           $i3=0;
           while ($i3 < $num3)
             {
             $balance     = mysql_result($result3,$i3,"os_balance");  
             $bal_account = mysql_result($result3,$i3,"accno");  
             $i3++;
           }
        }

     if ($topay > 0){
        $query5= "INSERT INTO dtransf VALUES('$bal_account','$date','$patients_name','$ref_no','$adm_no','TRF 
        ','$tot_amt','$topay',' ')";
        $result5 =mysql_query($query5);
     }

     if ($topay < 0){
        $query5= "INSERT INTO dtransf VALUES('$bal_account','$date','$patients_name','$ref_no','$adm_no','RC 
        ','$topay','$topay',' ')";
        $result5 =mysql_query($query5);
     }

   //Print the receipt before deleting these stuff
   //---------------------------------------------
?>
   <script type='text/javascript'>
   function printpage()
  {
  window.print()
  }
  </script>

<script type='text/javascript'>
   function bills()
  {
  window.open('http://www.usedcarin...nadminlogin.php' 'FinanceAdminReportsLogin', 'width=545,height=326,resizable=yes,scrollbars=yes,status=yes');
  }
  </script>
 
 
<?php
   //No branch yet ----- $branch     = $_SESSION['branch']; 
 
   $date=$_GET['date'];
   $patients_name =$_GET['patients_name'];
   $adm_no =$_GET['adm_no'];
   $paid   =$_GET['paid'];
   $date    = $_GET["date"];

   //Print Receit
   //$user = "hmisglobal";   
   //$pass = "jamboafrica";   
   //$database ="hmisglob_griddemo";   
   //$host = "localhost";   
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
   //mysql_select_db($database) or die ("Unable to select the database");

   
   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "select * FROM companyfile";
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



   

   //--echo"<font size ='5'>";
   echo"<table width='400' border='0' cellspacing='0' cellpadding='0'>";      
   echo"<tr><td width ='400' align ='center'><h3>CASH SALE RECEIPT</h4></td><tr>";
   echo"<tr><td align ='center'><h2>$company</h2></td></tr>";
   echo"<tr><td align ='center'>$address1</td></tr>";
   echo"<tr><td align ='center'>$address2</td></tr>";
   echo"<tr><td align ='center'>$address3</td></tr>";
   echo"</table><br>";

   echo"<div><h4>SALES RECEIPT. SERVICE NO:<img src='space.jpg' style='width:20px;height:2px;'>$ref_no</h4></div><br>";
 //---------Sawa up to this point------------------
   echo"<div>Payer :<img src='space.jpg' style='width:20px;height:2px;'></b>$patients_name<img src='space.jpg' style='width:20px;height:2px;'>Date:<img src='space.jpg' style='width:5px;height:2px;'>$date</b><br>";
   //echo"<hr>";
  //echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";
echo"------------------------------------------------------------------------<b><br>";
   echo"Description <img src='space.jpg' style='width:100px;height:2px;'>";
   echo"Amount<img src='space.jpg' style='width:45px;height:2px;'>";
   echo"Qty<img src='space.jpg' style='width:30px;height:2px;'>";
   echo"Total<img src='space.jpg' style='width:10px;height:2px;'>";
   echo"</div>";
  //echo"<img src='ico/black.jpg' style='width:400px;height:1px;'></b><br>";
echo"------------------------------------------------------------------------<br>";


$query= "SELECT * FROM st_trans WHERE ref_no ='$ref_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;


echo"<table bgcolor ='black' border ='0' width ='400'>";
//-------Sawa -------------
$SQL = "select * FROM st_trans WHERE ref_no ='$ref_no' " ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {
         
      //$codes   = mysql_result($result,$i,"acc_no");
  
      $desc    = mysql_result($result,$i,"description");
   
      $rate    = mysql_result($result,$i,"trans_desc");
   
      $code   = mysql_result($result,$i,"price");
   
      $update = mysql_result($result,$i,"date");
  
      $contact = mysql_result($result,$i,"type");
      $qty     = mysql_result($result,$i,"qty");
      $total   = mysql_result($result,$i,"total");

      $update2 = $code; 
      //-$update;
      $tot = $tot +$total;
      $code   = number_format($code);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);

      echo"<tr bgcolor ='white'>";
      echo"<td width ='170' align ='left'>";      
      echo"$desc";
      echo"</td>";     
      echo"<td width ='50' align ='right'>$update2</td>";
      echo"<td width ='50' align ='right'>$qty</td>";
      echo"<td width ='50' align ='right'>$total</td>";
      //echo"<td width ='50' align ='right'></a></td>";
      echo"</font>";
      echo"</tr>";   
      $i++;         
     }

      echo"</table>";
echo"------------------------------------------------------------------------";
 echo"</font>";


//Sawa----------


//echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";
echo"<table>";
echo"<tr><td width ='320' align ='right'><b>Total:</b></td><td width ='45'></td><td><b>$tot2</b></td></tr>";
echo"<tr><td width ='320' align ='right'><b>Amount Paid:</b></td><td width ='45'></td><td><b>$paid</b></td></tr>";
echo"<tr><td width ='320' align ='right'><b>Balance to Pay:</b></td><td width ='45'></td><td><b>$topay</b></td></tr>";
echo "</table><br><br></b>";
echo "For Wama Nursing Home<br>";
echo"<img src='images/image.bmp' style='width:370px;height:70px;'><br>";
echo"Your health is our priority Psalms 107:20 We treat but God Heals.";
//style='width:300px;height:50px;'><br>";
echo"<br>You were served by: ADMIN<br>";
echo"We wish you quick recovery";
echo "<input type=\"button\" value=\"Print\" onclick=\"printpage()\" />";
                                                         










   //End of printing receipt
   //-----------------------
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");


   $query3 = "DELETE FROM sales WHERE qty > 0";
   $result3 =mysql_query($query3) or die(mysql_error());


    //$query= mysql_query('DROP TABLE IF EXISTS phpgrid.sales');
    $query= "DROP TABLE IF EXISTS hmisglob_griddemo.sales";
    $result =mysql_query($query);
    die();

   //End of saving
   //-------------
   $date = date('y/m/d');
   $client_no=' ';
   $patients_name=' ';
   $gender=' ';
   $age=' ';

   $history ="No medical history for the specified date";


     echo"Put some details heare 6";


}





?>


<!DOCTYPE html>
<html lang="en">
  
<head>
    
<meta charset="utf-8">
    



<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
    



<!-- Le styles -->
    
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/bills-pop-up.js"></script>

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php






   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");

// Create connection
$conn = new mysqli($host, $user, $pass, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE sales (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
location VARCHAR(30) NOT NULL,
description VARCHAR(100) NOT NULL,
sell_price INT(11),
qty INT(11),
credit_rate INT(11),
gl_account INT(11),
date TIMESTAMP)";

if ($conn->query($sql) === TRUE) {
    //echo "Table MyGuests created successfully";
} else {
    //echo "Error creating table: " . $conn->error;
}


if (isset($_GET['add_next'])){
   $query= "CREATE TEMPORARY TABLE sales IF NOT EXISTS sales (location varchar(100) NOT NULL,
   description varchar(200),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);

   $location     = "BUSTANI";
   $description  = $_GET["item1"];
   $amount       = $_GET["amount"];
   $qty          = $_GET["no"];
   $total        = $_GET["result2"];


   $myDate = date('y/m/d');
   //$myfile =gethostname();
      
   $query= "INSERT INTO sales VALUES('','$location','$description','$amount','$qty','$total','$total','$myDate')";
   $result =mysql_query($query);



}






if (isset($_GET['refresh'])){
   $date = date('y/m/d');
   echo"Put some details heare 7";

}






//if (isset($_GET['add_next2']))
if (isset($_GET['save_cancel3']))
   {
   //$date=$_GET['date'];
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");

   //Get the receipt No.
   
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_ref ='$ref_no2'";
     $result3 = mysql_query($query3);





   $query = "select * FROM sales" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;

   while ($i < $num)
      {
         
      $codes   = mysql_result($result,$i,"location");
  
      $desc    = mysql_result($result,$i,"description");
   
      $rate    = mysql_result($result,$i,"sell_price");
   
      $qty     = mysql_result($result,$i,"qty");
  
      $qty_s   = mysql_result($result,$i,"qty");
  
      $total   = mysql_result($result,$i,"gl_account");
      $item_desc = mysql_result($result,$i,"description");
  


      //Add Qty in file
      $query2 = "select * FROM stockfile WHERE search_name ='$desc' AND location ='$codes'" ;
      $result2 =mysql_query($query2) or die(mysql_error());
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num2 =mysql_numrows($result2) or die(mysql_error());
      $i2 =0;

      while ($i2 < $num2)
         {
         
         $qtys   = mysql_result($result2,$i2,"qty");
         $item_desc = mysql_result($result2,$i2,"description");
  
         $i2++;
 
      }
      $upd_qty = $qtys - $qty;

      $query3= "UPDATE stockfile SET qty ='$upd_qty' WHERE search_name ='$desc' AND location ='$codes'";
      $result3 =mysql_query($query3);


      $query4= "INSERT INTO st_trans VALUES('$codes','$item_desc','Sales','-$qty_s','Stock Sales','$date','ADMIN','$rate','$total','$ref_no','$adm_no')";
      $result4 =mysql_query($query4);
      $i++;
 
   }




   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");


   $query3 = "DELETE * FROM sales WHERE description<>' '" ;
   $result3 =mysql_query($query3) or die(mysql_error());


    //$query= mysql_query('DROP TABLE IF EXISTS phpgrid.sales');
    $query= "DROP TABLE IF EXISTS hmisglob_griddemo.sales";
    $result =mysql_query($query);
}






















?>







<script>
function myFunction() {
    var no = document.getElementById("no");
    var option = no.options[no.selectedIndex].text;
    var txt = document.getElementById("amount").value;


    txt2 = txt * option;
    document.getElementById("result2").value = txt2;
}
</script>













<body>







<form action ="issueto_patients.php" method ="GET">
<?php

 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
 //Get the receipt No.



   //New changes
if (isset($_GET['accounts'])){ 
 


     echo"Put some details heare 9";

}



//For price search button
//-----------------------
if (isset($_GET['revenue_search1'])){
   $date = date('y/m/d');
 

            
   //$cdquery="SELECT date FROM medicalfile WHERE adm_no ='$client_no'";
   //$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());


   echo"Put some details heare 10";

}










//For Next item button
//--------------------
if (isset($_GET['add_next'])){
   $date = date('y/m/d');

 

   echo"Put some details heare 11";


}














$company_identity ='BUSTANI';
$location ='BUSTANI';

$item1 =' ';
$sql="SELECT * FROM stockfile WHERE search_name ='$item1'";
$result=mysql_query($sql);	 
$rows=mysql_fetch_array($result);

if (isset($_GET['revenue_search1'])){
   $item1 =$_GET['item1'];
   $item1 = trim($item1);
$item2 = trim($item1);
$item3 = trim($item1);


   //$company_identity=$_GET['company_identity'];
   //echo"1.$item1<br>";
$item2 = substr($item1, 0, -10);

   //echo"2.$item2<br>";
$item3 = substr($item3, -10);
 //echo"3.$item3";
   
   //$sql="SELECT * FROM stockfile WHERE substr(search_name,15,-1) ='$item3'";
   //$result=mysql_query($sql);	 
   //$rows=mysql_fetch_array($result);
   }




 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT client_id,patients_name FROM clients";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            


















$date = date('y-m-d');









echo"<table border = '0' border color = 'black'><td width ='100' align ='left'><input type='submit' name='revenue_search1'  class='button' value='Search'></td><td width ='300'>";

 if (!isset($_GET['revenue_search1'])){
    echo"<select id='item1' name='item1'>";        
    $price = 0;
 }
 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT search_name FROM stockfile WHERE location ='$company_identity'";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());

 if (isset($_GET['revenue_search1'])){

    //$user = "hmisglobal";   
    //$pass = "jamboafrica";   
    //$database = "hmisglob_griddemo";   
    //$host = "localhost";   

    //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
    //mysql_select_db($database) or die ("Unable to select the database");

   
   $query3 = "select * FROM stockfile";
   // &&WHERE substr(search_name,-10) ='$item1'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     //$price     = mysql_result($result3,$i3,"sell_price");  
     $item_desc = mysql_result($result3,$i3,"search_name");  
     $item_desc = substr($item_desc,-10);  
     if ($item_desc==$item3){
        $price     = mysql_result($result3,$i3,"sell_price");  
        $item_desc = mysql_result($result3,$i3,"search_name");  
        $item1     = mysql_result($result3,$i3,"search_name");  
//echo'$price';
     }
     $i3++;    
     }
    echo"<input type='text' name='item1' size='20' value ='$item1'>";
   }else{            
   while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["search_name"];     
   echo "<option>$cdTitle</option>";            
   }
}
 if (!isset($_GET['revenue_search1'])){
  echo"</select>";
}

echo"</td><td width ='100'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td width ='120'>";
//echo"</td>";
//echo"<td width='50' align='right'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td>";

echo"<select id='no' name='no' onchange='myFunction()'>";        
$cdquery="SELECT qty FROM table_qtys";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["qty"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";


?>

<!--input type="text" id="result" size="20">
<input type="text" id="result2" size="20"-->


<!--input type='text' id = 'result' name='result' size='10' onchange ='myFunction()'-->
<td width ='100'><input type='text' id ='result2' name='result2' size='10'></td><td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td></tr></table>
<!--/td><th width ='300'>Action</th><th width ='100'></th></table-->




<br>
<!--table width ='400' border='0' border color ='black'><td align ='left'><input type='submit' name='billing'  class='button' value='Add '></td></table-->
<!--/FORM-->

<!--table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' height='100' width='130'></td>
</table-->















 <?php
//Displaying items to be adjusted
/////////////////////////////////
echo"<table bgcolor ='red' border = '0' border color = 'black'><th width ='400' align ='left'>Item Description</th><th width ='100'>Price</th><th width ='120'>Qty</th><th width ='120'>Total</th><th width ='100'>Action</th></th></table>";

 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());
 //$connect = mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword)or die ("Unable to connect");
            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 $myfile =gethostname();








 $query= "SELECT * FROM sales " or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());
 $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;



                                                         
 echo"<table class='altrowstable' id='alternatecolor'>";

 $SQL = "select * FROM sales" ;
 $hasil=mysql_query($SQL, $connect);
 $id = 0;
 $nRecord = 1;
 $No = $nRecord;
 $tot = 0;
 $save ='No';
 $tot_amt =0;
 while ($row=mysql_fetch_array($hasil)) 
      {         
      $desc    = mysql_result($result,$i,"description");   
      $qty    = mysql_result($result,$i,"qty");   
      $price   = mysql_result($result,$i,"sell_price");   
      $total = mysql_result($result,$i,"gl_account");  
      $save ='Yes';
      $tot_amt = $tot_amt+$total;
      echo"<tr bgcolor ='white' border ='2' bordercolor='black'>";
      echo"<td width ='400' align ='left'>";      
echo"$desc";
      echo"</td>";      
echo"<td width ='100' align ='right'>";

      
echo"$price";

      echo"</td>";

      
echo"<td width ='120' align ='right'>";
      echo"$qty";

      echo"</td>";


      
echo"<td width ='120' align ='right'>";
      echo"$total";

      echo"</td>";



      $aa7=$row['description'];        
      $aa8=$row['id'];        

echo"<td width ='100' align ='right'><a href='issueto_patients.php?accounts=$aa8'>Delete<img src='ico/Info.ico' alt='Smiley face' height='12' width='12'></a></td>";


      




echo"</tr>";


      $i++;
  
       
}
echo"<img src='ico/black.jpg' style='width:950px;height:1px;'><br>";   

      echo"</table>";
      //if ($save=='Yes'){
         //echo"<br>";
         //echo"<form action ='stocks_adjustment.php'>";
         //echo"<table width ='400' border='0' border color ='black'><td align ='left'><input type='submit' name='billing'  class='button' value='Save and Print''></td></table></form>";
     //    }


      



echo"<img src='ico/black.jpg' style='width:950px;height:1px;'><br>";
echo"<font size ='20'><table><td width ='325'></td><td width ='100'></td><td><h4></h4></td><td width ='100' align ='right'></td><td width ='100'></td><td><h2>Total:</h2></td><td width ='100' align ='right'><h2>$tot_amt</h2></td></font>";
   
      //echo"</form'>";

      //To show totals here


      echo"</table>";





echo"<table><tr><td width='100' align='right'><b>Select the Patient to Bill </b></td></tr><tr><td>";
echo"<select id='patient' name='patient'>";        
$cdquery="SELECT patients_name FROM bedsfile ORDER BY patients_name ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["patients_name"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select>";
echo"</td></tr>";

echo"</table>";




?>

<!--table width ='400' border='0' border color ='red'><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save and Print'></td></table>
</form-->

<table width ='400' border='0' border color ='red'><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td><td><input type='submit' name='refresh'  class='button' value='Refresh Page '></td><td><input type='submit' name='delete'  class='button' value='Cancel Transaction'></td></table>
</form>


</body>
</html>

















<?php
die();


//For save and print button
//------------------__-----
if (isset($_GET['save_cancel'])){

   //Go and save first
   //-------------------
   $date=$_GET['date'];
   $patients_name =$_GET['patients_name'];
   $adm_no =$_GET['adm_no'];
   $paid   =$_GET['paid'];

   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");




   //Get the receipt No.   
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_ref ='$ref_no2'";
     $result3 = mysql_query($query3);





   $query = "select * FROM sales" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $tot_amt =0;

   while ($i < $num)
      {
         
      $codes   = mysql_result($result,$i,"location");
  
      $desc    = mysql_result($result,$i,"description");
   
      $rate    = mysql_result($result,$i,"sell_price");
   
      $qty     = mysql_result($result,$i,"qty");
  
      $qty_s   = mysql_result($result,$i,"qty");
  
      $total   = mysql_result($result,$i,"gl_account");
  
      $tot_amt = $tot_amt + $total;

      //Add Qty in file
      $query2 = "select * FROM stockfile WHERE description ='$desc' AND location ='$codes'" ;
      $result2 =mysql_query($query2) or die(mysql_error());
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num2 =mysql_numrows($result2) or die(mysql_error());
      $i2 =0;

      while ($i2 < $num2)
         {
         
         $qtys   = mysql_result($result2,$i2,"qty");
  
         $i2++;
 
      }
      $qty = $qty-$qtys;

      $query3= "UPDATE stockfile SET qty ='$qty' WHERE description ='$desc' AND location ='$codes'";
      $result3 =mysql_query($query3);

      $patient =$patients_name;
      $query4= "INSERT INTO st_trans VALUES('$codes','$desc','$patient','$qty_s','CASH RECEIPT','$date','ADMIN','$rate','$total','$ref_no')";
      $result4 =mysql_query($query4);
      //Now go and update the receipt file

      $i++;
 
   }


   //Update Balances if not paid in full
   //-----------------------------------
   $topay = $tot_amt - $paid;
   if ($tot_amt > $paid){
     $query3 = "select * FROM clients WHERE adm_no ='$adm_no'" ;
     $result3 =mysql_query($query3) or die(mysql_error());
     $num3 =mysql_numrows($result3) or die(mysql_error());
     $i3=0;
     while ($i3 < $num3)
       {
       $balance   = mysql_result($result3,$i3,"balance");
  
       $acc_no    = mysql_result($result3,$i3,"pay_account");

       $db_account= mysql_result($result3,$i3,"pay_account");
  
       $i3++;
     }
     $balance = $balance+$topay;
     $query= "UPDATE clients SET balance ='$balance' WHERE adm_no ='$adm_no'";
     $result =mysql_query($query);



     //End of balance now go and update the debtorsf file
     //--------------------------------------------------
     $found ='No';
     $db_balance =0;
     $query6 = "select * FROM debtorsfile" ;
     $result6 =mysql_query($query6) or die(mysql_error());
     $num6 =mysql_numrows($result6) or die(mysql_error());
     $i6=0;
     while ($i6 < $num6)
       {
       $accounts      = mysql_result($result6,$i6,"account_name");
  
       $db_balance    = mysql_result($result6,$i6,"os_balance");
  
       if ($accounts==$db_account){
          $db_balance = $db_balance+$topay;
          $found = 'Yes';
       }           
       $i6++;
     }
     $db_balance2 = $db_balance + $topay;
     if ($found=="Yes"){
        $query= "UPDATE debtorsfile SET os_balance ='$db_balance2' WHERE account_name ='$db_account'";
        $result =mysql_query($query);
     }else{
        $query= "INSERT INTO debtorsfile VALUES(' ','$patients_name','','','$db_balance2','')";
        $result =mysql_query($query);
     }


     //Now go and reduce the bill in htransf
     //--------------------------------------
     //--$balance = $balance+$topay;
     //--$query= "UPDATE client SET balance ='$balance' WHERE adm_no ='$adm_no'";
     //--$result =mysql_query($query);
     //End of balance now go and update the debtors transaction file
     //-------------------------------------------------------------
   }

     //Update Sales summary file with or without balance
     //-------------------------------------------------
     $query5= "INSERT INTO receiptf VALUES('$codes','CASH SALE','$patient','','CASH 
     RECEIPT','$date','ADMIN','$tot_amt','$paid','$ref_no','$topay')";
     $result5 =mysql_query($query5);

     $query= "UPDATE receiptf SET balance ='$topay' WHERE ref_no ='$ref_no'";
     $result =mysql_query($query);


     //--------------------------------------
     $query5= "INSERT INTO htransf VALUES('$adm_no','$patients_name','$date','$ref_no','CASH/CHQ RECEIPT','RC 
     ','-$tot_amt','RC ','RC ','IP/OPD',' ','ADMIN','','$date','1','$db_account')";
     $result5 =mysql_query($query5);

   //Print the receipt before deleting these stuff
   //---------------------------------------------
?>
   <script type='text/javascript'>
   function printpage()
  {
  window.print()
  }
  </script>

<?php
   //No branch yet ----- $branch     = $_SESSION['branch']; 
 
   $date=$_GET['date'];
   $patients_name =$_GET['patients_name'];
   $adm_no =$_GET['adm_no'];
   $paid   =$_GET['paid'];
   $date    = $_GET["date"];

   //Print Receit
   //$user = "hmisglobal";   
   //$pass = "jamboafrica";   
   //$database ="hmisglob_griddemo";   
   //$host = "localhost";   
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
   //mysql_select_db($database) or die ("Unable to select the database");

   
   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "select * FROM companyfile";
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



   

   //--echo"<font size ='5'>";
   echo"<table width='40%' border='0' cellspacing='0' cellpadding='0'>";      
   echo"<tr><td align ='center'><h3>CASH SALE RECEIPT</h4></td><tr>";
   echo"<tr><td align ='center'><h4>$company</h4></td></tr>";
   echo"<tr><td align ='center'>$address1</td></tr>";
   echo"<tr><td align ='center'>$address2</td></tr>";
   echo"<tr><td align ='center'>$address3</td></tr>";
   echo"</table><br>";

   echo"<div><h4>SALES RECEIPT. SERVICE NO:<img src='space.jpg' style='width:20px;height:2px;'>$ref_no</h4></div><br>";
 //---------Sawa up to this point------------------
   echo"<div>Payer :<img src='space.jpg' style='width:20px;height:2px;'></b>$patients_name<img src='space.jpg' style='width:20px;height:2px;'>Date:<img src='space.jpg' style='width:5px;height:2px;'>$date</b><br>";
   //echo"<hr>";
  //echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";
echo"----------------------------------------------------------------------<br><b>";
   echo"Description <img src='space.jpg' style='width:100px;height:2px;'>";
   echo"Amount<img src='space.jpg' style='width:45px;height:2px;'>";
   echo"Qty<img src='space.jpg' style='width:30px;height:2px;'>";
   echo"Total<img src='space.jpg' style='width:10px;height:2px;'>";
   echo"</div>";
  //echo"<img src='ico/black.jpg' style='width:400px;height:1px;'></b><br>";
echo"----------------------------------------------------------------------<br>";

$query= "SELECT * FROM st_trans WHERE ref_no ='$ref_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;


echo"<table bgcolor ='white' border ='0' width ='400'>";
//-------Sawa -------------
$SQL = "select * FROM st_trans WHERE ref_no ='$ref_no' " ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {
         
      //$codes   = mysql_result($result,$i,"acc_no");
  
      $desc    = mysql_result($result,$i,"description");
   
      $rate    = mysql_result($result,$i,"trans_desc");
   
      $code   = mysql_result($result,$i,"price");
   
      $update = mysql_result($result,$i,"date");
  
      $contact = mysql_result($result,$i,"type");
      $qty     = mysql_result($result,$i,"qty");
      $total   = mysql_result($result,$i,"total");

      $update2 = $code; 
      //-$update;
      $tot = $tot +$total;
      $code   = number_format($code);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);

      echo"<tr bgcolor ='white'>";
      echo"<td width ='170' align ='left'>";      
      echo"$desc";
      echo"</td>";     
      echo"<td width ='50' align ='right'>$update2</td>";
      echo"<td width ='50' align ='right'>$qty</td>";
      echo"<td width ='50' align ='right'>$total</td>";
      //echo"<td width ='50' align ='right'></a></td>";
      echo"</font>";
      echo"</tr>";   
      $i++;         
     }

      echo"</table>";
echo"----------------------------------------------------------------------";
 echo"</font>";


//Sawa----------


//echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";
echo"<table>";
echo"<td width ='320' align ='right'><b>Total:</b></td><td width ='45'></td><td><b>$tot2</b></td>";
echo "</table>";

//style='width:300px;height:50px;'><br>";
echo"<br>You were served by: ADMIN<br>";
echo"We wish you quick recovery";
echo "<input type=\"button\" value=\"Print\" onclick=\"printpage()\" />";
                                                         










   //End of printing receipt
   //-----------------------
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");


   $query3 = "DELETE FROM sales WHERE qty > 0";
   $result3 =mysql_query($query3) or die(mysql_error());


    //$query= mysql_query('DROP TABLE IF EXISTS phpgrid.sales');
    $query= "DROP TABLE IF EXISTS hmisglob_griddemo.sales";
    $result =mysql_query($query);
    die();

   //End of saving
   //-------------
   $date = date('y/m/d');
   $client_no=' ';
   $patients_name=' ';
   $gender=' ';
   $age=' ';

  
}





?>


<!DOCTYPE html>
<html lang="en">
  
<head>
    
<meta charset="utf-8">
    



<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
    



<!-- Le styles -->
    
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php






   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");

// Create connection
//$conn = new mysqli($host, $user, $pass, $database);
// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

// sql to create table
$sql = "CREATE TABLE sales (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
location VARCHAR(30) NOT NULL,
description VARCHAR(30) NOT NULL,
sell_price INT(11),
qty INT(11),
credit_rate INT(11),
gl_account INT(11),
date TIMESTAMP)";

//if ($conn->query($sql) === TRUE) {
    //echo "Table MyGuests created successfully";
//} else {
    //echo "Error creating table: " . $conn->error;
//}


if (isset($_GET['add_next'])){
   $query= "CREATE TEMPORARY TABLE sales IF NOT EXISTS sales (location varchar(100) NOT NULL,
   description varchar(100),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);

   $location     = "BUSTANI";
   $description  = $_GET["item1"];
   $amount       = $_GET["amount"];
   $qty          = $_GET["no"];
   $total        = $_GET["result2"];


   $myDate = date('y/m/d');
   //$myfile =gethostname();
      
   $query= "INSERT INTO sales VALUES('','$location','$description','$amount','$qty','$total','$total','$myDate')";
   $result =mysql_query($query);


}








//if (isset($_GET['add_next2']))
if (isset($_GET['save_cancel3']))
   {
   //$date=$_GET['date'];
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");

   //Get the receipt No.
   
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_ref ='$ref_no2'";
     $result3 = mysql_query($query3);





   $query = "select * FROM sales" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;

   while ($i < $num)
      {
         
      $codes   = mysql_result($result,$i,"location");
  
      $desc    = mysql_result($result,$i,"description");
   
      $rate    = mysql_result($result,$i,"sell_price");
   
      $qty     = mysql_result($result,$i,"qty");
  
      $qty_s   = mysql_result($result,$i,"qty");
  
      $total   = mysql_result($result,$i,"gl_account");
  


      //Add Qty in file
      $query2 = "select * FROM stockfile WHERE description ='$desc' AND location ='$codes'" ;
      $result2 =mysql_query($query2) or die(mysql_error());
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num2 =mysql_numrows($result2) or die(mysql_error());
      $i2 =0;

      while ($i2 < $num2)
         {
         
         $qtys   = mysql_result($result2,$i2,"qty");
  
         $i2++;
 
      }
      $qty = $qty+$qtys;

      $query3= "UPDATE stockfile SET qty ='$qty' WHERE description ='$desc' AND location ='$codes'";
      $result3 =mysql_query($query3);


      $query4= "INSERT INTO st_trans VALUES('$codes','$desc','ADJUSTMENT','$qty_s','Stock Adjustment','$date','ADMIN','$rate','$total','$ref_no')";
      $result4 =mysql_query($query4);
      $i++;
 
   }




   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");


   $query3 = "DELETE * FROM sales WHERE description<>' '" ;
   $result3 =mysql_query($query3) or die(mysql_error());


    //$query= mysql_query('DROP TABLE IF EXISTS phpgrid.sales');
    $query= "DROP TABLE IF EXISTS hmisglob_griddemo.sales";
    $result =mysql_query($query);
}






















?>







<script>
function myFunction() {
    var no = document.getElementById("no");
    var option = no.options[no.selectedIndex].text;
    var txt = document.getElementById("amount").value;


    txt2 = txt * option;
    document.getElementById("result2").value = txt2;
}
</script>













<body>







<form action ="issueto_patients.php" method ="GET">
<?php

 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";
 // $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
 //Get the receipt No.



   //New changes
if (isset($_GET['accounts'])){      
   echo"Put some details heare 3";

}



//For price search button
//-----------------------
if (isset($_GET['revenue_search1'])){
   echo"Put some details heare 4";
}










//For Next item button
//--------------------
if (isset($_GET['add_next'])){
   $date = date('y/m/d');

   echo"Put some details heare 5";

}














$company_identity ='BUSTANI';
$location ='BUSTANI';

$item1 =' ';
$sql="SELECT * FROM stockfile WHERE description ='$item1'";
$result=mysql_query($sql);	 
$rows=mysql_fetch_array($result);

if (isset($_GET['revenue_search1'])){
echo"here";
   $item1=$_GET['item1'];
   //$company_identity=$_GET['company_identity'];

   $sql="SELECT * FROM stockfile WHERE description ='$item1'";
   $result=mysql_query($sql);	 
   $rows=mysql_fetch_array($result);
   }



$date = date('y-m-d');

//Select the patient to charge
//----------------------------
echo"<h2>Stock Issue to Patients</h2><br>";
echo"<table border = '0' border color = 'red'><td width ='100' align ='left'><input type='submit' name='patient_search1'  class='button' value='Select Patient'></td><td width ='300'>";

 if (!isset($_GET['patient_search1'])){
    echo"<select id='patient1' name='patient1'>";        
    //$adm_no ='';
    //$patient1 =' ';
 }
 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT patients_name FROM clients ORDER BY patients_name";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());

 if (isset($_GET['patient_search1'])){
   $patient1 =$_GET['patient1'];
   $query3 = "select * FROM clients WHERE patients_name ='$patient1'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $adm_no       = mysql_result($result3,$i3,"adm_no");  
     $patient1     = mysql_result($result3,$i3,"patients_name");  
     $i3++;    
     }
    echo"</td><td><input type='text' name='patient1' size='40' value ='$patient1'></td>";
    echo"<td><input type='text' name='adm_no' size='20' value ='$adm_no'></td>";
   }else{            
   while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["patients_name"];     
   echo "<option>$cdTitle</option>";            
   }
}
echo"</table>";






//--------------Ebd of Patient Serach---------

echo"<table border = '0' border color = 'red'><td width ='100' align ='left'><input type='submit' name='revenue_search1'  class='button' value='Search'></td><td width ='300'>";

 if (!isset($_GET['revenue_search1'])){
    echo"<select id='item1' name='item1'>";        
    $price = 0;
 }
 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT description FROM stockfile WHERE location ='$company_identity'";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());

 if (isset($_GET['revenue_search1'])){
    $item1= $_get['item1'];
    //$user = "hmisglobal";   
    //$pass = "jamboafrica";   
    //$database = "hmisglob_griddemo";   
    //$host = "localhost";   

    //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
    //mysql_select_db($database) or die ("Unable to select the database");

   
   $query3 = "select * FROM stockfile WHERE description ='$item1'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $price     = mysql_result($result3,$i3,"sell_price");  
     $i3++;    
     }
    echo"<input type='text' name='item1' size='20' value ='$item1'>";
   }else{            
   while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["description"];     
   echo "<option>$cdTitle</option>";            
   }
}
 if (!isset($_GET['revenue_search1'])){
  echo"</select>";
}
echo"12345";

echo"</td><td width ='120'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td width ='120'>";
//echo"</td>";
//echo"<td width='50' align='right'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td>";
?>

<select id="no" name ="no" onchange="myFunction()">
	<option>0</option><option>1</option><option>2</option><option>3</option><option>4</option>
	<option>5</option><option>6</option><option>7</option><option>8</option><option>9</option>
	<option>10</option><option>11</option><option>12</option><option>13</option><option>14</option>
	<option>15</option><option>16</option><option>17</option><option>18</option><option>19</option>
	<option>20</option><option>21</option><option>22</option><option>23</option><option>24</option>
	<option>25</option><option>26</option><option>27</option><option>28</option><option>29</option>
	<option>30</option><option>31</option><option>32</option><option>33</option><option>34</option>
	<option>35</option><option>36</option><option>37</option><option>38</option><option>39</option>
	<option>40</option><option>41</option><option>42</option><option>43</option><option>44</option>
	<option>45</option><option>46</option><option>47</option><option>48</option><option>49</option>
	<option>50</option><option>51</option><option>52</option><option>53</option><option>54</option>


</select>
<!--input type="text" id="result" size="20">
<input type="text" id="result2" size="20"-->


<!--input type='text' id = 'result' name='result' size='10' onchange ='myFunction()'-->
<td width ='100'><input type='text' id ='result2' name='result2' size='10'></td><td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td></tr></table>
<!--/td><th width ='300'>Action</th><th width ='100'></th></table-->




<br>
<!--table width ='400' border='0' border color ='red'><td align ='left'><input type='submit' name='billing'  class='button' value='Add '></td></table-->
<!--/FORM-->

<!--table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' height='100' width='130'></td>
</table-->















 <?php
//Displaying items to be adjusted
/////////////////////////////////
echo"<table bgcolor ='red' border = '0' border color = 'red'><th width ='400' align ='left'>Item Description</th><th width ='100'>Price</th><th width ='120'>Qty</th><th width ='120'>Total</th><th width ='100'>Action</th></th></table>";

 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());
 //$connect = mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword)or die ("Unable to connect");
            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 $myfile =gethostname();








 $query= "SELECT * FROM sales " or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());
 $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;



                                                         
 echo"<table class='altrowstable' id='alternatecolor'>";

 $SQL = "select * FROM sales" ;
 $hasil=mysql_query($SQL, $connect);
 $id = 0;
 $nRecord = 1;
 $No = $nRecord;
 $tot = 0;
 $save ='No';
 $tot_amt =0;
 while ($row=mysql_fetch_array($hasil)) 
      {         
      $desc    = mysql_result($result,$i,"description");   
      $qty    = mysql_result($result,$i,"qty");   
      $price   = mysql_result($result,$i,"sell_price");   
      $total = mysql_result($result,$i,"gl_account");  
      $save ='Yes';
      $tot_amt = $tot_amt+$total;
      echo"<tr bgcolor ='white' border ='2' bordercolor='red'>";
      echo"<td width ='400' align ='left'>";
      
echo"$desc";

      echo"</td>";

      
echo"<td width ='100' align ='right'>";

      
echo"$price";

      echo"</td>";

      
echo"<td width ='120' align ='right'>";
      echo"$qty";

      echo"</td>";


      
echo"<td width ='120' align ='right'>";
      echo"$total";

      echo"</td>";



      $aa7=$row['description'];        
      

echo"<td width ='100' align ='right'><a href=''/>Delete<img src='ico/Info.ico' alt='Smiley face' height='12' width='12'></a></td>";


      




echo"</tr>";
   


      $i++;
  
       
}

      echo"</table>";


      




echo"<font size ='20'><table><td width ='325'></td><td width ='100'></td><td><h4>Total</h4></td><td width ='100' align ='right'>$tot_amt</td><td width ='100'></td><td><h4>Amount Paid:</h4></td><td width ='100' align ='right'><input type='text' name='paid' size='10' value ='$total'></td></font>";
   
      //echo"</form'>";

      //To show totals here


      echo"</table>";









?>

<table width ='400' border='0' border color ='red'><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save and Print'></td></table>
</form>



</body>
</html>




