<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

 

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  
       <!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
<link href="dcss/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>




<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/cashier.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	

<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];



   
if (isset($_GET['accounts5'])){      
      $record =$_GET['accounts5'];
   $query3 = "DELETE FROM journals_tmp WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());
}

if (isset($_GET['save_cancel'])){

   //Go and save first
   //-------------------
   $date=$_GET['date'];
   $narration = $_GET['narration'];

   
   //Get the receipt No.   
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_journal");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_journal ='$ref_no2'";
     $result3 = mysql_query($query3);






   $query = "select * FROM journals_tmp WHERE description >' '" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $tot_amt =0;
   $ref_nox =substr($narration,0,6);
   $ref_no = $ref_no.'-'.$ref_nox;
   while ($i < $num)
      {         
      $codes   = mysql_result($result,$i,"location");  
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"credit_rate");  
      $amount = $qty;
      //Go and update gltransf
      //----------------------
      $query5= "INSERT INTO gltransf VALUES('','$date','$desc','$ref_no','JV','BANKING TO','$amount','$username','$codes')";
      $result5 =mysql_query($query5);
 


     //Now go and update G/L Accounts file
      //-----------------------------------

      //Get the receipt No.   
      $query3 = "select * FROM glaccountsf WHERE account_name ='$desc'" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $balance   = mysql_result($result3,$i3,"balance");
        $i3++;
        }

      $new_balance = $balance +$amount;

      $query2= "UPDATE glaccountsf SET balance ='$new_balance' WHERE account_name ='$desc'";
      $result2 =mysql_query($query2);

      $i++;

   }

     $desc ='CASH COLLECTION A/C';
     $amount = -$amount;
     $query5= "INSERT INTO gltransf VALUES('','$date','$desc','$ref_no','JV','BANKING FROM','$amount','$username','$codes')";
      $result5 =mysql_query($query5);
 


     //Now go and update G/L Accounts file
      //-----------------------------------

      //Get the receipt No.   
      $query3 = "select * FROM glaccountsf WHERE account_name ='$desc'" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $balance   = mysql_result($result3,$i3,"balance");
        $i3++;
        }

      $new_balance = $balance +$amount;

      $query2= "UPDATE glaccountsf SET balance ='$new_balance' WHERE account_name ='$desc'";
      $result2 =mysql_query($query2);

   
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
   echo"<tr><td align ='left'><h2>$company</h2></td></tr>";
   echo"<tr><td align ='left'>$address1</td></tr>";
   echo"<tr><td align ='left'>$address2</td></tr>";
   echo"<tr><td align ='left'>$address3</td></tr>";
   echo"<tr><td width ='400' align ='left'><h3><br><u>JOURNAL VOUCHER</u></h3></td><tr>";
   echo"</table>";

   echo"<div><h4>JOURNAL NO:<img src='space.jpg' style='width:20px;height:2px;'>$ref_no</h4></div><br>";
 //---------Sawa up to this point------------------
   echo"<div>Date :<img src='space.jpg' style='width:20px;height:2px;'></b>$date<img   
   src='space.jpg' style='width:20px;height:2px;'><br></div>";
   echo"<div>Narration :<img src='space.jpg' style='width:5px;height:2px;'>$narration</b><br>";
   //Draw line
   echo"<img src='ico/black.jpg' style='width:880px;height:1px;'><br>"; 

   echo"Account Name <img src='space.jpg' style='width:220px;height:2px;'>";
   echo"Narration <img src='space.jpg' style='width:220px;height:2px;'>";
   echo"Debit<img src='space.jpg' style='width:70px;height:2px;'>";
   echo"Credit<img src='space.jpg' style='width:30px;height:2px;'>";
   echo"</div>";
   //Draw line
   echo"<img src='ico/black.jpg' style='width:880px;height:1px;'><br>"; 

   $query= "SELECT * FROM journals_tmp WHERE description > ' '";
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   echo"<table bgcolor ='white' border ='0' width ='750'>";
   //-------Sawa -------------
   $SQL = "select * FROM journals_tmp WHERE description >' '" ;
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      {         
      $desc      = mysql_result($result,$i,"description");   
      $rate      = $narration;
      $code      = mysql_result($result,$i,"qty");   
      $update    = mysql_result($result,$i,"date");  
      $contact   = "JV";
      $qty       = mysql_result($result,$i,"qty");
      $total     = mysql_result($result,$i,"credit_rate");
      $update2 = $code; 
      $tot = $tot +$total;

      $code   = number_format($code);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);

      echo"<tr bgcolor ='white'>";
      echo"<td width ='170' align ='left'>";      
      echo"$desc";
      echo"</td>";     
      echo"<td width ='100' align ='left'>$rate</td>";
      echo"<td width ='50' align ='right'>$qty</td>";
      echo"<td width ='60' align ='right'>$total</td>";
      echo"</font>";
      echo"</tr>";   
      $i++;         
     }

      echo"</table>";
echo"<img src='ico/black.jpg' style='width:880px;height:1px;'><br>"; 
echo"</font>";
echo"<table>";
echo"<tr><td width ='0' align ='right'><b>Total:</b></td><td width ='45'></td><td><b>$tot2</b></td></tr>";
echo "</table></b>";
//echo"<br>You were served by: ADMIN<br>";
//echo"We wish you quick recovery";
//echo "<input type=\"button\" value=\"Print\" onclick=\"printpage()\" />";
                                                         










   //End of printing receipt
   //-----------------------
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");


   $query3 = "DELETE FROM journals_tmp WHERE description > ' '";
   $result3 =mysql_query($query3) or die(mysql_error());


    //$query= mysql_query('DROP TABLE IF EXISTS phpgrid.sales');
    //-----------------------------------------------------------
    //$query= "DROP TABLE IF EXISTS hmisglob_griddemo.journals_tmp";
    //$result =mysql_query($query);
    die();

   //End of saving
   //-------------
   $date = date('y/m/d');
   $client_no=' ';
   $patients_name=' ';
   $gender=' ';
   $age=' ';

   $history ="No medical history for the specified date";


     //echo"Put some details heare 6";


}





?>


  
<head>
    
<meta charset="utf-8">
    



    


<!-- Le styles -->
    

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
$sql = "CREATE TABLE journals_tmp (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
location VARCHAR(30) NOT NULL,
description VARCHAR(100) NOT NULL,
sell_price INT(11),
qty INT(11),
credit_rate INT(11),
gl_account INT(11),
date TIMESTAMP),line_no INT(11)";

//if ($conn->query($sql) === TRUE) {
    //echo "Table MyGuests created successfully";
//} else {
    //echo "Error creating table: " . $conn->error;
//}


if (isset($_GET['add_next'])){
   $count = $_GET['accounts6']; 
   $query= "CREATE TEMPORARY TABLE journals_tmp IF NOT EXISTS journals_tmp (location varchar(100) NOT NULL,
   description varchar(200),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11),line_no INT(11))";
   $result =mysql_query($query);
   //Initiolize the new entries
   //---------------------------
   $myDate = date('y/m/d');
   $location     = "BUSTANI";
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   $total        = $_GET["result_three"];
   //$count        = $num;
   $desc         = substr($description, -10);



   //get price for this item as you save it in temporary file
      

   $query9= "INSERT INTO journals_tmp  VALUES('','$location','$description','$amount','$qty','$total','$total','$myDate','')";
      $result9 =mysql_query($query9);

   $myDate =date('y-m-d');

}






if (isset($_GET['refresh'])){
   $date = date('y/m/d');
   //echo"Put some details heare 7";

}

if (isset($_GET['delete'])){
   $date = date('y/m/d');
   //End of printing receipt
   //-----------------------
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");

   $query3 = "DELETE FROM journals_tmp WHERE description > ' '";
   $result3 =mysql_query($query3) or die(mysql_error());
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





   $query = "select * FROM journals_tmp" ;
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
   //$connect = mysql_connect($host,$user,"$pass")or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");


   $query3 = "DELETE * FROM journals_tmp WHERE description >' '" ;
   $result3 =mysql_query($query3) or die(mysql_error());


    //$query= mysql_query('DROP TABLE IF EXISTS phpgrid.sales');
    //-------------------------------------------------------------
    //$query= "DROP TABLE IF EXISTS hmisglob_griddemo.journals_tmp";
    //$result =mysql_query($query);
}

//225077296-8605




















?>




<script>
function myFunction() {
    var no = document.getElementById('no').value;   
    alert(no); 

    var txt = document.getElementById('amount').value;

    alert(txt); 

    //var option = no.options[no.selectedIndex].text;

    txt2 = txt * no;
    document.getElementById("result2").value = txt2;
}
</script>











<script>
function showUser(str) {    
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getaccountb.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

















<script>
function function3() {
    var no = document.getElementById('no_three').value;   
    var txt = document.getElementById('amount_three').value;
    txt2 = txt * no;
    document.getElementById("result_three").value = txt2;
}
</script>

<script>
function function4() {
    var no = document.getElementById('no_4').value;   
    var txt = document.getElementById('amount_4').value;
    txt2 = txt * no;
    document.getElementById("result_4").value = txt2;
}
</script>

<script>
function function2() {
    var no = document.getElementById('no_two').value;   
    alert(no); 
    var txt = document.getElementById('amount_two').value;
    alert(txt); 
    txt2 = txt * no;
    document.getElementById("result_two").value = txt2;
}
</script>

<script>
function function1() {
 alert('here');
    var no = document.getElementById('no_one').value;   
    var txt = document.getElementById('amount_one').value;
    txt2 = txt * no;
    document.getElementById("result_one").value = txt2;
}
</script>












<!--body-->
<body>
<!-- background="images/background.jpg"-->







<form action ="post_banking.php" method ="GET">
<?php


   //New changes
if (isset($_GET['accounts5'])){ 
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM journals_tmp WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());



    // echo"Put some details heare 9";

}



//For price search button
//-----------------------
if (isset($_GET['revenue_search1'])){
   $date = date('y/m/d');
 

            
   //$cdquery="SELECT date FROM medicalfile WHERE adm_no ='$client_no'";
   //$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());


   //echo"Put some details heare 10";

}










//For Next item button
//--------------------
if (isset($_GET['add_next'])){
   $date = date('y/m/d');

 

  // echo"Put some details heare 11";


}














$company_identity ='BUSTANI';
//$location ='BUSTANI';
//$item1 =' ';
//$sql="SELECT * FROM stockfile WHERE search_name ='$item1'";
//$result=mysql_query($sql);	 
//$rows=mysql_fetch_array($result);
//if (isset($_GET['revenue_search1'])){
//   $item1 =$_GET['item1'];
//   $item1 = trim($item1);
//$item2 = trim($item1);
//$item3 = trim($item1);
//$item2 = substr($item1, 0, -10);
//$item3 = substr($item3, -10);

//   }




 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT client_id,patients_name FROM clients";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            


















$date = date('y-m-d');











// Accounts6 Not applicabel for now
//echo"</td><td width ='100'><input type='text' id ='amounts' name='amounts' size='10' value ='$price'></td><td width='120'>";
//----------------------------------------------
//echo"</td>";
//echo"<td width='50' align='right'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td>";


?>

<!--input type="text" id="result" size="20">
<input type="text" id="result2" size="20"-->




 <?php

      $mydate =date('y-m-d');
   //Asign the receipt No.
   //---------------------
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $next_jv   = mysql_result($result3,$i3,"next_journal");  
     $i3++;
     }

//Get undeposited amount from gl
//------------------------------
   $query3 = "select * FROM gltransf where account_name='CASH COLLECTION A/C'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $balance   = mysql_result($result3,$i3,"amount");
     $to_bank   = $to_bank+$balance;
     $i3++;
     }


//Displaying items to be adjusted
/////////////////////////////////
echo"<table><tr><td width ='100'><b>Vourcher No.</b></td><td width='50' align='left'><input type='text' id ='jv_no' name='jv_no' size='10' value ='$next_jv'></td><td></td><td></td></tr>";

echo"<tr><td width ='100'><b>JV. Date:</b></td><td width='50' align='left'><input type='text' id ='date' name='date' size='10' value ='$mydate'></td><td></td><td></td></tr>";

echo"<tr><td width ='50'><b>Narration</b></td><td width='30' align='left'><input type='text' id ='narration' name='narration' size='40'></td>";

$to_bank2 = number_format($to_bank);
echo"<td width ='50'><b>Un-banked</b></td><td width='30' align='left'><input type='text' id ='deposit' name='deposit' size='10' value ='$to_bank2' readonly></td></tr>";

echo"</table>";
echo"<table bgcolor ='green' border = '0' border color = 'black' width='100%'><font color='white'><th width ='50%' align ='left'>Account Description</th><th width ='15%'></th><th width ='10%'>Debit</th><th width ='10%'>Credit</th><th width ='5%'>Action</th></th></font>";

 $myfile =gethostname();


 $query= "SELECT * FROM journals_tmp ORDER BY id ASC" or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());
 $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;
                                                         
 //echo"<table class='altrowstable' id='alternatecolor'>";
 $company_identity ='BUSTANI';
 $SQL = "select * FROM journals_tmp ORDER BY id ASC" ;
 $hasil=mysql_query($SQL, $connect);
 $id = 0;
 $nRecord = 1;
 $No = $nRecord;
 $tot = 0;
 $save ='No';
 $tot_amt =0;
 $desc =' ';
 $tot_debit  = 0;
 $tot_credit = 0;
 while ($row=mysql_fetch_array($hasil)) 
      {               
      $desc    = mysql_result($result,$i,"description");   
      $qty    = mysql_result($result,$i,"qty");   
      $price   = mysql_result($result,$i,"sell_price");   
      $total = mysql_result($result,$i,"gl_account");
      $line  = mysql_result($result,$i,"line_no");
      $save ='Yes';
      $tot_debit  = $tot_debit+$qty;
      $tot_credit = $tot_credit+$total;

      $tot_amt = $tot_debit-$tot_credit;
      if ($desc > ' '){
         echo"<tr>";
         //echo"<td align ='left'></td>";
         echo"<td width ='50%'><input type='text' id ='s_desc_three' size ='60' name='s_desc_three' value 
        ='$desc'></td>";
      }else{
         echo"<tr >";
         //echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td>";
         echo"<td width ='50%' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)'>";
         $cdquery="SELECT account_name FROM glaccountsf";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM glaccountsf";
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;
         while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["account_name"];     
            echo "<option>$cdTitle</option>";            
         }
         echo"</select>";
         echo"</td>"; 
    }


    $aa8=$row['id'];
    $line_no    = $row['line_no'];
    $myfunction = $row['line_no'];
    $myfunction = 'function'.$row['line_no'];
    //To hide other cols if not add
    if ($desc > ' '){
       echo"<td width ='15%'></td>";
       echo"<td><input type='text' id ='s_no_three' name='s_no_three' size='10%' value ='$qty'></td>";
    echo"<td><input type='text' id ='s_result_three' name='s_result_three' size='10%' value 
    ='$total' ></td>";
    }

 
   
      $aa7=$row['description'];        
      $aa8=$row['id'];        
if ($desc > ' '){
echo"<td width ='5%' align ='right'><a href='post_banking.php?accounts5=$aa8'>Del<img src='ico/Info.ico' alt='Smiley face' height='12' width='12'></a></td>";
}else{
echo"<td width ='5%' align ='right'></td>";
}    
echo"</tr>";

      $i++;
  
       
}

echo"<img src='ico/black.jpg' style='width:1000px;height:1px;'><br>";   

      echo"</table>";
echo"<table><tr><div id='txtHint'><b>Account info will be listed here...</b></div></tr></table>";
   
echo"<img src='ico/black.jpg' style='width:1000px;height:1px;'>";
echo"<font size ='20'><table><td width ='0'></td><td><h3>";
if ($tot_amt > 0){
   echo"DB</h3>";
}else{
   echo"CR</h3>";
}
echo"</td><td width ='100' align ='right'></td><td width ='100'><h3>$tot_amt</h3></td><td></td><td width ='100' align ='right'></td></font>";
   
      echo"</table>";
?>

<table border='0' border color ='red'><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td></table>
</form>



</body>






      </section>
      <!-- right col -->
    </div>
  	<!--?php include 'includes/footer.php'; ?-->

</div>
<!-- ./wrapper -->

<!-- Chart Data -->

<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Late',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Ontime',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $ontime; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#00a65a'
  barChartData.datasets[1].strokeColor = '#00a65a'
  barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>



















