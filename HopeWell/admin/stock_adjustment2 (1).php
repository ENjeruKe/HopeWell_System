<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>

<?php

$codes =$_SESSION['company'];
$date = $_SESSION['sys_date'];







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
      $query2 = "select * FROM stockfile WHERE description ='$desc'" ;
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
      $query3= "UPDATE stockfile SET qty ='$qty' WHERE description ='$desc'";
      $result3 =mysql_query($query3);
      //$patient =$patients_name;
      $query4= "INSERT INTO st_trans VALUES('$store','$desc','Stock Adjustment','$qty_s','ADJ','$date','ADMIN','$rate','$total','$ref_no','','','','','','')";
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
      $query4= "INSERT INTO st_trans VALUES('$codes','$desc','$patient','$qty_s','CASH RECEIPT','$date','ADMIN','$rate','$total','$ref_no','$adm_no','','','','','')";
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
<head>    
<meta charset="utf-8">   
<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
<style type="text/css">
html, 
body {
height: 100%;
}

body {
background-image: url(images/backgrounds.jpg);
background-repeat: no-repeat;
background-size: cover;
}
</style>

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
<p align ='right'><img src='chiromo-logo33.jpg' alt='statement' height='40' width='350'></p> 

<!--------------------------------------------------------------here-->





 <?php



//Displaying items to be adjusted
/////////////////////////////////
echo"<table bgcolor ='red' border = '0' border color = 'black' width ='100%'><th width ='350' align ='left'>Item Description</th><th width ='50' align ='right'>Price</th><th width ='50' align ='right'></th><th width ='50' align ='center'>Qty</th><th width ='50' align ='right'>Total</th><th width ='50' align ='right'>Action</th></th></table>";

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
         echo"<tr bgcolor ='white' border ='2' bordercolor='black'>";
         echo"<td width ='5'><input type='text' id ='search_id' size ='5' name='search_id' value 
        ='$search_id' readonly></td>";

         echo"<td width ='450'><input type='text' id ='s_desc_three' size ='45' name='s_desc_three' value 
        ='$desc'></td>";
      }else{
         echo"<tr bgcolor ='white' border ='2' bordercolor='black'>";
         echo"<td width ='5'><input type='text' id ='search_id' size ='5' name='search_id' value 
        ='XXX' readonly></td>";
         echo"<td width ='450' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)'>";
         $cdquery="SELECT description FROM stockfile order by description";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM stockfile";
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
        echo"<td><input type='text' id ='s_amount_three' name='amount_three' size='10' value 
        ='$price'></td>";

        //echo"<td><input type='text' id ='s_units_three' //name='units_three' size='10' value 
        //='$units'></td>";

        echo"<td><input type='text' id ='s_no_three' name='s_no_three' size='10' value ='$qty'></td>";
        echo"<td><input type='text' id ='s_result_three' name='s_result_three' size='10' value 
        ='$total'></td>";
    }else{
        echo"<td><input type='text' id ='s_amount_three' name='s_amount_three' size='10' value 
        ='$price'></td>";
        echo"<td><input type='text' id ='s_no_three' name='s_no_three' size='10' 
        onchange='function33()'></td>";
        echo"<td><input type='text' id ='s_result_three' name='s_result_three' size='10'></td>";
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

echo"<img src='ico/black.jpg' style='width:800px;height:1px;'><br>";   

      echo"</table>";
echo"<table><tr><div id='txtHint'><b>Transaction info will be listed here...</b></div></tr></table>";


      



echo"<img src='ico/black.jpg' style='width:800px;height:1px;'><br>";
echo"<font size ='20'><table><td width ='325'></td><td width ='100'></td><td></td><td width ='100' align ='right'><h2>Total:</h2></td><td width ='100'></td><td><h2>$tot_amt</h2></td><td width ='100' align ='right'></td></font>";   
      //echo"</form'>";
      //To show totals here
      echo"</table>";

?>





<?php
echo"<table bgcolor ='blue' border = '0' border color = 'black'><th width ='400' align ='left'></th><th width ='100'></th><th width ='120'></th><th width ='120'></th><th width ='100'></th></th></table>";

echo"<table width ='800'><tr><td><h3> </h3></td><td>";
echo"<select id='patient' name='patient' >";        
$cdquery="SELECT description FROM st_locationf ORDER BY description ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["description"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select>";
echo"</td><td><h3>Reason</h3>";
echo"</td><td><input type='text' name='reason' size ='30'></td>";
echo"<td><h3>Date</h3></td><td><input type='text' name='date' size ='10' value='$date'></td></tr>";
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
         
      $codes   = mysql_result($result,$i,"location");
      $desc    = mysql_result($result,$i,"description");
      $rate    = mysql_result($result,$i,"sell_price");
      $qty     = mysql_result($result,$i,"qty");
      $qty_s   = mysql_result($result,$i,"qty");
      $total   = mysql_result($result,$i,"gl_account");
      $search_id = mysql_result($result,$i,"search_id");

      $tot_amt = $tot_amt + $total;
      //Add Qty in file
      $query2 = "select * FROM stockfile WHERE id ='$search_id' AND location ='$codes'" ;
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

      $query3= "UPDATE stockfile SET qty ='$qty' WHERE id ='$search_id' AND location ='$codes'";
      $result3 =mysql_query($query3);


      $patient =$patients_name;
      $query4= "INSERT INTO st_trans VALUES('$codes','$desc','Stock Adjustment','$qty_s','ADJ','$date','ADMIN','$rate','$total','$ref_no','','','','','')";
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








</body>
</html>




