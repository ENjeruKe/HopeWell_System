<?php include 'includes/session.php'; ?>
<?php 
$store_select = $_SESSION['store_select'];
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
  
?>

 

     
       <!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
<link href="dcss/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>




<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/stocks/count.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	



 <?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>

<?php

$codes =$_SESSION['company'];
$date = $_SESSION['sys_date'];
$codes =$_SESSION['username'];
if ($username=='Admin' or $username=='admin'){
}else{
    echo"<h1><font color ='red'>File access Denied...... contact system administrator....</h1></font>";
    die();
}
    





//For save and print button
//------------------__-----
if (isset($_GET['save_cancel'])){
   //Go and save first
   //-------------------
   $date=$_GET['date'];
   $patients_name =$_GET['patients_name'];
   $adm_no =$_GET['adm_no'];
   $paid   =$_GET['paid'];
   $store  =$_GET['patient'];

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


   $query = "select * FROM stock_adj WHERE qty >0" ;
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
      $query2 = "select * FROM stockfile WHERE description ='$desc' and location ='$store'" ;
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
      $qty = $qtys+$qty_s;
      $query3= "UPDATE stockfile SET qty ='$qty' WHERE description ='$desc' and location ='$store'";
      $result3 =mysql_query($query3);
      //$patient =$patients_name;

  $store =$_GET['patient'];
      $query4= "INSERT INTO st_trans VALUES('','$store','$desc','Stock Adjustment','$qty_s','ADJ','$date','ADMIN','$rate','$total','$ref_no','','','','','','')";
      $result4 =mysql_query($query4);
      //Now go and update the receipt file

      //$i++;
   




//Tabulate the cost price of each item sold
//-----------------------------------------
$med_cost = $total;
//Debit cost of goods sold in g/l
//-------------------------------
$patients_name =$desc;
$debit_account ='INVENTORY';
$credit_account ='STOCK ADJUSTMENT';
$query5= "INSERT INTO gltransf    VALUES('','$date','$debit_account','$ref_no','ADJ','$patients_name','$med_cost','$username','CONTROL')";
   $result5 =mysql_query($query5);

   //Now go and Debit G/L Accounts file
   //-----------------------------------
   //Post Debit first
   //----------------
   $db_balance = 0;
   $query3 = "select * FROM glaccountsf WHERE account_name ='$debit_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
echo'here6';
   while ($i3 < $num3)
     {
     $db_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

   $db_balance = $db_balance +$med_cost;

   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$debit_account'";
   $result2 =mysql_query($query2);

   $acc_type ='CONTROL';
   //Now go and credit the bank
   //--------------------------
   $query5= "INSERT INTO gltransf VALUES('','$date','$credit_account','$ref_no','ADJ','$patients_name','-$med_cost','$username','$acc_type')";
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

     $credit_balance = $credit_balance -$med_cost;

     $query2= "UPDATE glaccountsf SET balance ='$credit_balance' WHERE account_name ='$credit_account'";
     $result2 =mysql_query($query2);
$i++;
}

//Delete entries from temp file
//-----------------------------
   $query3 = "DELETE FROM stock_adj WHERE qty > 0";
   $result3 =mysql_query($query3) or die(mysql_error());

}





























   //New changes
if (isset($_GET['accounts5'])){      
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM stock_adj WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());


}

if (isset($_GET['save_cancel8'])){  
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





   $query = "select * FROM stock_adj" ;
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
      $query4= "INSERT INTO st_trans VALUES('','$codes','$desc','$patient','$qty_s','CASH RECEIPT','$date','ADMIN','$rate','$total','$ref_no','$adm_no','','','','','')";
      $result4 =mysql_query($query4);
      //Now go and update the receipt file

      $i++;
 
   }

   



    
 
   //Delete from temp file
   //---------------------

   $query3 = "DELETE FROM stock_adj WHERE qty > 0";
   $result3 =mysql_query($query3) or die(mysql_error());


?>
  
 


<?php
   








   





}


?>






<!DOCTYPE html>
<html lang="en">  
<?php
// sql to create table
$sql = "CREATE TABLE stock_adj (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
location VARCHAR(30) NOT NULL,
description VARCHAR(100) NOT NULL,
sell_price INT(11),
qty INT(11),
credit_rate INT(11),
gl_account INT(11),
date TIMESTAMP)";


if (isset($_GET['add_next'])){
//if (isset($_GET['accounts6'])){ 
   $count = $_GET['accounts6']; 

   $query= "CREATE TEMPORARY TABLE stock_adj IF NOT EXISTS stock_adj (location varchar(100) NOT NULL,
   description varchar(200),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);
   //Initiolize the new entries
   //---------------------------
   $myDate = date('y/m/d');
   $location     = $_SESSION['company'];
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   $total        = $_GET["result_three"];
   //$count        = $num;
   $desc         = substr($description, -10);
   $units        = $_GET["units_three"];
   $search_id    = $_GET["search_id"];


   //get price for this item as you save it in temporary file
      

   $query9= "INSERT INTO stock_adj  VALUES('','$units','$description','$amount','$qty','$total','$total','$search_id','')";
      $result9 =mysql_query($query9);

   $myDate =date('y-m-d');

   $query3 = "DELETE FROM stock_adj WHERE description<>'' and qty = 0";
   $result3 =mysql_query($query3) or die(mysql_error());

 

}






if (isset($_GET['refresh'])){
$date = $_SESSION['sys_date'];
   //echo"Put some details heare 7";

}

if (isset($_GET['delete'])){
$date = $_SESSION['sys_date'];
   $query3 = "DELETE FROM stock_adj WHERE qty > 0";
   $result3 =mysql_query($query3) or die(mysql_error());
}

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
        xmlhttp.open("GET","getpriceadj.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>



<script>
function showUser3(str) {    
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
        xmlhttp.open("GET","select_store.php?q="+str,true);
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

<!--body-->








<form action ="stock_adjustment2.php" method ="GET">
<?php

   //New changes
if (isset($_GET['accounts5'])){ 
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM stock_adj WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());


   $query3 = "DELETE FROM stock_adj WHERE description<>'' and qty = 0";
   $result3 =mysql_query($query3) or die(mysql_error());

    // echo"Put some details heare 9";

}



//For price search button
//-----------------------
if (isset($_GET['revenue_search1'])){
$date = $_SESSION['sys_date'];
 

            
   //$cdquery="SELECT date FROM medicalfile WHERE adm_no ='$client_no'";
   //$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());


   //echo"Put some details heare 10";

}










//For Next item button
//--------------------
if (isset($_GET['add_next'])){
$date = $_SESSION['sys_date'];

 

  // echo"Put some details heare 11";


}




$company_identity =$_SESSION['company'];
            
 $cdquery="SELECT client_id,patients_name FROM clients";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            

$date = $_SESSION['sys_date'];





?>


<!-- --------------------------------------------------------here -->
<!--p align ='right'><img src='chiromo-logo33.jpg' alt='statement' height='40' width='350'></p--> 

<!--------------------------------------------------------------here-->





 <?php

echo"<font color ='red'><b>Dispensing store:".$store_select;
echo"<br></font>You can change the store by simply changing 'From store' then click on Stock Adjustment";

//Displaying items to be adjusted
/////////////////////////////////
echo"<table bgcolor ='red' border = '0' border color = 'black' width ='100%'><th width ='5%' align ='right' bgcolor ='black'><font color ='white'>Id</th><th width ='65%' align ='left' bgcolor ='black'><font color ='white'>Item Description</th><th width ='10%' align ='right' bgcolor ='black'><font color ='white'>Cost Price</th><th width ='10%' align ='center' bgcolor ='black'><font color ='white'>Qty</th><th width ='10%' align ='right' bgcolor ='black'><font color ='white'>Total</th><th width ='5%' align ='right' bgcolor ='black'><font color ='white'>Action</th></th></table>";

 $myfile =gethostname();


 $query= "SELECT * FROM stock_adj " or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());
 $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;
                                                         
 echo"<table class='altrowstable' id='alternatecolor'>";
 $company_identity =$_SESSION['company'];
 $SQL = "select * FROM stock_adj" ;
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
      $line  = mysql_result($result,$i,"line_no");
      $units  = mysql_result($result,$i,"location");
      $search_id  = mysql_result($result,$i,"search_id");

      $save ='Yes';
      $tot_amt = $tot_amt+$total;
      if ($desc > ' '){
         echo"<tr>";
         echo"<td width ='5%'></td>";

         echo"<td width ='60%'><input type='text' id ='s_desc_three' size ='80' name='s_desc_three' value 
        ='$desc'></td>";
      }else{
         echo"<tr>";
         echo"<td width ='5%'></td>";
         echo"<td width ='60%' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)'>";
         $cdquery="SELECT description FROM stockfile where location ='$store_select' order by description";

         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM stockfile where location ='$store_select'";
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;
         while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["description"];     
            echo "<option>$cdTitle</option>";            
         }
         echo"</select>";
         echo"</td>"; 
    }


    $aa8=$row['id'];
    $line_no    = $row['line_no'];
    $myfunction = $row['line_no'];
    $myfunction = 'function'.$row['line_no'];
    if ($qty > 0){
        echo"<td width ='10%'><input type='text' id ='s_amount_three' name='amount_three' size='10' value 
        ='$price'></td>";

        //echo"<td><input type='text' id ='s_units_three' //name='units_three' size='10' value 
        //='$units'></td>";

        echo"<td width ='10%'><input type='text' id ='s_no_three' name='s_no_three' size='10' value ='$qty'></td>";
        echo"<td width ='10%'><input type='text' id ='s_result_three' name='s_result_three' size='10' value 
        ='$total'></td>";
    }else{
        echo"<td><!--input type='text' id ='s_amount_three' name='s_amount_three' size='10' value 
        ='$price'--></td>";
        echo"<td><!--input type='text' id ='s_no_three' name='s_no_three' size='10' 
        onchange='function33()'--></td>";
        echo"<td><!--input type='text' id ='s_result_three' name='s_result_three' size='10'--></td>";
    }
  

 
   
      $aa7=$row['description'];        
      $aa8=$row['id'];        
if ($qty<>0){
   echo"<td width ='100' align ='right'><a href='stock_adjustment2.php?accounts5=$aa8'>Del<img src='ico/Info.ico' alt='Smiley face'   height='12' width='12'></a></td>";
}
//echo"<td width ='10' align ='right'></td>";




      




echo"</tr>";

      $i++;
  
       
}

echo"<img src='ico/black.jpg' style='width:100%;height:1px;'><br>";   

      echo"</table>";
echo"<table><tr><div id='txtHint'><b>.</b></div></tr></table>";


      



echo"<img src='ico/black.jpg' style='width:100%;height:1px;'><br>";
echo"<font size ='20'><table><td width ='325'></td><td width ='100'></td><td></td><td width ='100' align ='right'><h2>Total:</h2></td><td width ='100'></td><td><h2>$tot_amt</h2></td><td width ='100' align ='right'></td></font>";   
      //echo"</form'>";
      //To show totals here
      echo"</table>";

?>





<?php
echo"<table bgcolor ='blue' border = '0' border color = 'black'><th width ='400' align ='left'></th><th width ='100'></th><th width ='120'></th><th width ='120'></th><th width ='100'></th></th></table>";

echo"<table width ='800'><tr><td><b>Store:</b></td><td>";
echo"<select id='patient' name='patient' onchange='showUser3(this.value)'>";        
$cdquery="SELECT description FROM st_locationf ORDER BY description ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["description"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select>";
echo"</td></tr>";
echo"<tr><td><b>Reason</b>";
echo"</td><td><input type='text' name='reason' size ='30'></td></tr>";
echo"<tr><td><b>Date</b></td><td><input type='text' name='date' size ='10' value='$date'></td></tr>";
echo"</table>";

?>

<table width ='400' border='0' border color ='red' width ='100%'><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td><td><input type='submit' name='refresh'  class='button' value='Refresh Page '></td><td><input type='submit' name='delete'  class='button' value='Cancel Transaction'></td></table>
</form>




</body>
</html>

















<?php
//die();


//For save and print button
//------------------__-----
if (isset($_GET['save_cancel'])){
   //Go and save first
   //-------------------
   $date=$_GET['date'];
   $patients_name =$_GET['patients_name'];
   $adm_no =$_GET['adm_no'];
   $paid   =$_GET['paid'];
   $store  =$_GET['patient'];
   


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



   $query = "select * FROM stock_adj WHERE description <>''" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $tot_amt =0;

   while ($i < $num)
      {
         
      //$codes   = mysql_result($result,$i,"location");
      $desc    = mysql_result($result,$i,"description");
      $rate    = mysql_result($result,$i,"sell_price");
      $qty     = mysql_result($result,$i,"qty");
      $qty_s   = mysql_result($result,$i,"qty");
      $total   = mysql_result($result,$i,"gl_account");
      $search_id = mysql_result($result,$i,"search_id");

      $tot_amt = $tot_amt + $total;
      //Add Qty in file
      $query2 = "select * FROM stockfile WHERE id ='$search_id' AND location ='$store'" ;
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
      $qty = $qtys-$qty_s;

      $query3= "UPDATE stockfile SET qty ='$qty' WHERE id ='$search_id' AND location ='$store'";
      $result3 =mysql_query($query3);


      $patient =$patients_name;
      $query4= "INSERT INTO st_trans VALUES('','$codes','$store','Stock Adjustment','$qty_s','ADJ','$date','ADMIN','$rate','$total','$ref_no','','','','','')";
      $result4 =mysql_query($query4);
      //Now go and update the receipt file

      $i++;
 
   }

   //Now go and delete the posted transactions
   //-----------------------------------------
   $query3 = "DELETE FROM stock_adj WHERE qty > 0";
   $result3 =mysql_query($query3) or die(mysql_error());

?>
 




<?php

   
  
}




?>



  
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    



<!-- Le styles -->
    
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php






// sql to create table
$sql = "CREATE TABLE stock_adj (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
location VARCHAR(30) NOT NULL,
description VARCHAR(30) NOT NULL,
sell_price INT(11),
qty INT(11),
credit_rate INT(11),
gl_account INT(11),
date TIMESTAMP,
line_no INT(3)";

//if ($conn->query($sql) === TRUE) {
    //echo "Table MyGuests created successfully";
//} else {
    //echo "Error creating table: " . $conn->error;
//}


if (isset($_GET['add_next'])){
   $query= "CREATE TEMPORARY TABLE stock_adj IF NOT EXISTS stock_adj (location varchar(100) NOT NULL,
   description varchar(100),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);

   $location     = $_SESSION['company'];
   $description  = $_GET["item1"];
   $amount       = $_GET["amount"];
   $qty          = $_GET["no"];
   $total        = $_GET["result2"];
   $desc         = substr($description, -10);
   $descs        = $_GET["s_desc_three"];
   $units        = $_GET["units_three"];
   $search_id    = $_GET["search_id"];


   $query2 = "select * FROM stockfile WHERE id ='$search_id'";
   $result2 =mysql_query($query2) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num2 =mysql_numrows($result2) or die(mysql_error());
   $i2 =0;
   while ($i2 < $num2)
      {

      $item_desc    = mysql_result($result2,$i2,"search_name");
      $item_price   = mysql_result($result2,$i2,"cost_price");
      $i2++;
   }

      
   $query= "INSERT INTO stock_adj VALUES('','$units','$description','$item_price','$qty','$total','$total','$search_id','')";
   $result =mysql_query($query);

   $query3 = "DELETE FROM stock_adj WHERE description<>'' and qty = 0";
   $result3 =mysql_query($query3) or die(mysql_error());


}



?>







<script>
function myFunction() {
    var no = document.getElementById("no").value;
    var option = no.options[no.selectedIndex].text;
    var txt = document.getElementById("amount").value;


    txt2 = txt * option;
    document.getElementById("result2").value = txt2;
}
</script>
















<body>







<form action ="stock_adjustment2.php" method ="GET">
<?php

 
//For price search button
//-----------------------
if (isset($_GET['revenue_search1'])){
   //echo"Put some details heare 4";
}










//For Next item button
//--------------------
if (isset($_GET['add_next'])){
   $date = $_SESSION['sys_date'];

   //echo"Put some details heare 5";

}














$company_identity =$_SESSION['company'];
$location =$_SESSION['company'];



$date = $_SESSION['sys_date'];






?>























      </section>
      <!-- right col -->
    </div>  	
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







