
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
  	<?php include 'includes/account/pay.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	



<?php
session_start();
 require('open_database.php');


   //New changes
if (isset($_GET['accounts5'])){      
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM payment_supplier_tmp WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());


}

if (isset($_GET['save_cancel'])){

   //Go and save first
   //-------------------
   $date=$_GET['date'];
   $narration = $_GET['narration'];
   $tr_type   = $_GET['tr_type'];
   $credit_account= $_GET['tr_type'];
   $cheque_no = $_GET['cheque_no'];
 
   //Get the receipt No.   
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_vch");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_vch ='$ref_no2'";
     $result3 = mysql_query($query3);


   //Get account to credit
   //---------------------
   //$query = "select * FROM payment_modes WHERE description = '$tr_type'" ;
   //$result =mysql_query($query) or die(mysql_error());
   //$id = 0;
   //$nRecord = 1;
   //$No = $nRecord;
   //$num =mysql_numrows($result) or die(mysql_error());
   //$i =0;
   //$tot_amt =0;
   //$credit_account ='Cash Collection Account';
   $debit_account ='ACCOUNTS PAYABLES';

   //while ($i < $num)
   //   {         
   //   $credit_account   = mysql_result($result,$i,"gl_account");  
   //   $i++;
   //   }

   $cr_amount = 0;
   $query = "select * FROM payment_supplier_tmp WHERE description >' '" ;
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
      $total   = mysql_result($result,$i,"credit_rate");  

      $amount = $total;
      $cr_amount = $cr_amount + $amount;

      $mydates =date('y-m-d');
      //Go and save in the suppliers file
      //---------------------------------
      $query5= "INSERT INTO supplierstrfile VALUES('$codes','$desc','$date','$ref_no','$narration','Pay','-$amount','SUP','$cheque_no','admin',' ','$mydates','0','$desc','0')";
      $result5 =mysql_query($query5);

   //Now go check balances in master file
   //------------------------------------
   $query3 = "select * FROM suppliersfile WHERE account_name ='$desc'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   $sup_balance = 0;
   while ($i3 < $num3)
     {
     $sup_balance   = mysql_result($result3,$i3,"os_balance");
     $i3++;
     }

   $sup_balance = $sup_balance -$amount;
   $query2= "UPDATE suppliersfile SET os_balance ='$sup_balance' WHERE account_name ='$desc'";
   $result2 =mysql_query($query2);




      //Go and update gltransf
      //----------------------
      $query5= "INSERT INTO gltransf VALUES('','$date','$debit_account','$ref_no','Pay','$desc','$amount','admin','$codes')";
      $result5 =mysql_query($query5);

      $i++;

   }


   //Now go and Debit G/L Accounts file
   //-----------------------------------
   //Post Debit first
   //----------------
   $db_balance = 0;
   $query3 = "select * FROM glaccountsf WHERE account_name ='$debit_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $db_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

   $db_balance = $db_balance +$cr_amount;

   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$debit_account'";
   $result2 =mysql_query($query2);



   //Now go and credit the bank
   //--------------------------
   $query5= "INSERT INTO gltransf VALUES('','$date','$credit_account','$ref_no','Pay','$desc','-$cr_amount','admin','$codes')";
   $result5 =mysql_query($query5);
   //Now go and update G/L Accounts file
   //-----------------------------------

   $query3 = "select * FROM glaccountsf WHERE account_name ='$credit_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $credit_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

     $credit_balance = $credit_balance -$cr_amount;

      $query2= "UPDATE glaccountsf SET balance ='$credit_balance' WHERE account_name ='$credit_account'";
      $result2 =mysql_query($query2);

      //Will clear the file after printing the voucher
      //----------------------------------------------

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
   echo"<table width='600' border='0' cellspacing='0' cellpadding='0'>";      
   echo"<tr><td align ='left'><h2>$company</h2></td></tr>";
   echo"<tr><td align ='left'>$address1</td></tr>";
   echo"<tr><td align ='left'>$address2</td></tr>";
   echo"<tr><td align ='left'>$address3</td></tr>";
   echo"<tr><td width ='600' align ='left'><h3><br><u>PAYMENT VOUCHER </u></h3></td><tr>";
   echo"</table>";

   echo"<div><h4>VOUCHER NO:<img src='space.jpg' style='width:20px;height:2px;'>$ref_no</h4></div><br>";
 //---------Sawa up to this point------------------
   echo"<div>Date :<img src='space.jpg' style='width:20px;height:2px;'></b>$date<img   
   src='space.jpg' style='width:20px;height:2px;'><br></div>";
   echo"<div>Account Credited :<img src='space.jpg' style='width:5px;height:2px;'>$credit_account</b><br>";
   //Draw line
   echo"<img src='ico/black.jpg' style='width:750px;height:1px;'><br>"; 

   echo"Account Name <img src='space.jpg' style='width:200px;height:2px;'>";
   echo"Narration <img src='space.jpg' style='width:200px;height:2px;'>";
   //echo"<img src='space.jpg' style='width:70px;height:2px;'>";
   echo"Amount<img src='space.jpg' style='width:20px;height:2px;'>";
   echo"</div>";
   //Draw line
   echo"<img src='ico/black.jpg' style='width:750px;height:1px;'><br>"; 

   $query= "SELECT * FROM payment_supplier_tmp WHERE description > ' '";
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   echo"<table bgcolor ='white' border ='0' width ='750'>";
   //-------Sawa -------------
   $SQL = "select * FROM payment_supplier_tmp WHERE description >' '" ;
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
      echo"<td width ='100' align ='left'>";      
      echo"$desc";
      echo"</td>";     
      echo"<td width ='50' align ='left'>$rate</td>";
      echo"<td width ='30' align ='right'>$total</td>";
      echo"<td width ='40' align ='right'></td>";
      echo"</font>";
      echo"</tr>";   
      $i++;         
     }

      echo"</table>";
echo"<img src='ico/black.jpg' style='width:750px;height:1px;'><br>"; 
echo"</font>";
echo"<table>";
echo"<tr><td width ='0' align ='right'><b>Total:</b></td><td width ='45'></td><td><b>$tot2</b></td></tr>";
echo"<tr><td width ='0' align ='right'><b>Prepared by:</b></td><td width ='45'></td><td>____________________</td></tr>";
echo"<tr><td width ='0' align ='right'><b>Authorised by:</b></td><td width ='45'></td><td>____________________</td></tr>";

echo"<tr><td width ='0' align ='right'><b>Received by:</b></td><td width ='45'></td><td>____________________</td></tr>";

echo "</table></b>";
                                                         
                                                         










   //End of printing receipt
   //-----------------------
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");


   $query3 = "DELETE FROM payment_supplier_tmp WHERE description > ' '";
   $result3 =mysql_query($query3) or die(mysql_error());


    //$query= mysql_query('DROP TABLE IF EXISTS phpgrid.sales');
    //$query= "DROP TABLE IF EXISTS hmisglob_griddemo.payment_supplier_tmp";
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


<?php

// Create connection
$conn = new mysqli($host, $user, $pass, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE payment_supplier_tmp (
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
   $count = $_GET['accounts6']; 
   $query= "CREATE TEMPORARY TABLE payment_supplier_tmp IF NOT EXISTS payment_supplier_tmp (location varchar(100) NOT NULL,
   description varchar(200),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
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
      

   $query9= "INSERT INTO payment_supplier_tmp  VALUES('','$location','$description','$amount','$qty','$total','$total','$myDate','')";
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

   $query3 = "DELETE FROM payment_supplier_tmp WHERE description > ' '";
   $result3 =mysql_query($query3) or die(mysql_error());
}




//if (isset($_GET['add_next2']))
if (isset($_GET['save_cancel3']))
   {
   $date=$_GET['date'];
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





   $query = "select * FROM payment_supplier_tmp" ;
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


   $query3 = "DELETE * FROM payment_supplier_tmp WHERE description<>' '" ;
   $result3 =mysql_query($query3) or die(mysql_error());


    //$query= mysql_query('DROP TABLE IF EXISTS phpgrid.sales');
    //$query= "DROP TABLE IF EXISTS hmisglob_griddemo.payment_supplier_tmp";
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
        xmlhttp.open("GET","getsupplier.php?q="+str,true);
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












<body> 
<!--background="images/background.jpg"-->







<form action ="post_payment_supplier.php" method ="GET">
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
if (isset($_GET['accounts5'])){ 
   $record =$_GET['accounts5'];
//echo"$record";
   $query3 = "DELETE FROM payment_supplier_tmp WHERE id ='$record'";
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











// Accounts6 Not applicabel for now
//echo"</td><td width ='100'><input type='text' id ='amounts' name='amounts' size='10' value ='$price'></td><td width='120'>";
//----------------------------------------------
//echo"</td>";
//echo"<td width='50' align='right'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td>";


?>

<!--input type="text" id="result" size="20">
<input type="text" id="result2" size="20"-->




 <?php

   //$mysqlserver="localhost";
   //$mysqlusername="hmisglobal";
   //$mysqlpassword="jamboafrica";

   //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
  //".mysql_error());
   //$connect = mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword)or die ("Unable to connect");
            
   //$dbname = 'hmisglob_griddemo';
   //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());

   $mydate =date('y-m-d');
   //Asign the receipt No.
   //---------------------
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $next_jv   = mysql_result($result3,$i3,"next_vch");  
     $i3++;
     }
//Displaying items to be adjusted
/////////////////////////////////


echo"<img src='ico/black.jpg' style='width:100%;height:1px;'>";
echo"<table bgcolor ='red' border = '0' border color = 'black' width ='100%'><th width ='85%' align ='left'>Account Description</th><th width ='10%' align='right'>Amount</th><th width ='5%' align ='right'>Action</th></th></table>";




 $myfile =gethostname();


 $query= "SELECT * FROM payment_supplier_tmp ORDER BY id ASC" or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());
 $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;
                                                         
 echo"<table class='altrowstable' id='alternatecolor' width ='100%'>";
 $company_identity ='BUSTANI';
 $SQL = "select * FROM payment_supplier_tmp ORDER BY id ASC" ;
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

      $tot_amt = $tot_debit+$tot_credit;
      if ($desc > ' '){
         echo"<tr>";
         echo"<td width ='55%'><input type='text' id ='s_desc_three' size ='50' name='s_desc_three' value 
        ='$desc'></td>";
      }else{
         echo"<tr>";
         //echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td>";
         echo"<td width ='85%' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)'>";
         $cdquery="SELECT account_name FROM suppliersfile";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM suppliersfile";
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
    if ($desc > ' '){
    echo"<td width ='10%' align ='right'></td>";
    echo"<td><input type='text' id ='s_result_three' name='s_result_three' size='10' value 
    ='$total'></td>";
    }

 
   
      $aa7=$row['description'];        
      $aa8=$row['id'];        
if ($desc==''){
echo"<td width ='5%' align ='right'></td>";
}else{
echo"<td width ='5%' align ='right'><a href='post_payment_supplier.php?accounts5=$aa8'>Del<!--img src='ico/Info.ico' alt='Smiley face' height='12' width='12'--></a></td>";
}    
echo"</tr>";

      $i++;
  
       
}

echo"<img src='ico/black.jpg' style='width:100%;height:1px;'><br>";   

      echo"</table>";
echo"<table><tr><div id='txtHint'>..</div></tr></table>";
   
echo"<img src='ico/black.jpg' style='width:100%;height:1px;'>";
echo"<font size ='20'><table width ='100%'><td width ='70%'></td><td width ='20%'><h3>";
if ($tot_amt > 0){
   echo"Total Paid:</h3>";
}else{
   echo"Total Paid:</h3>";
}
echo"</td><td width ='10%'><h3>$tot_amt</h3></td></font>";
   
      echo"</table>";







echo"<table><tr><td width ='100%'><b>Vourcher</b></td><td width='50' align='left'><input type='text' id ='jv_no' name='jv_no' size='10' value ='$next_jv'></td></tr><tr><td width ='100'><b>Pay Date:</b></td><td width='50' align='left'><input type='text' id ='date' name='date' size='10' value ='$mydate'></td></tr>";


echo"<tr>";
echo"<td width ='50' align ='left'><b>Debit A/c:</b></td><td>";
//echo"<select id='tr_type' name='tr_type'>";
//$cdquery="SELECT description FROM payment_modes";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//$query3 = "select * FROM payment_modes";
//$result3 =mysql_query($query3) or die(mysql_error());
//$num3 =mysql_numrows($result3) or die(mysql_error());
//$i3=0;
//while ($cdrow=mysql_fetch_array($cdresult)) {
//      $cdTitle=$cdrow["description"];     
//      echo "<option>$cdTitle</option>";            
//      }
//echo"</select>";


echo"<select id='tr_type' name='tr_type'>";
$cdquery="SELECT account_name FROM glaccountsf where type ='BANK'";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM glaccountsf where type ='BANK'";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";



echo"</td><td width ='50'><b>Cheque:</b></td><td width='10' align='left'><input type='text' id ='cheque_no' name='cheque_no' size='10' ></td></tr>"; 







echo"<tr><td width ='50'><b>Narration</b></td><td width='50' align='left'><input type='text' id ='narration' name='narration' size='47' value ='Payment Voucher'></td></tr>";
echo"</table>";











?>




<table border='0' border color ='red'><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td><td><input type='submit' name='delete'  class='button' value='Cancel Transaction'></td></table>
<!--table width ='500'><td align ='center'><img src='images/healthcare.png' alt='statement' height='100' width='130'-->
</form>



</body>
</html>

















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



