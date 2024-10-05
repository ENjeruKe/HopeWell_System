<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
//$adm_no   = $_SESSION['adm_no'];
//$long_ref_no   = $_SESSION['long_ref_no'];

?>
﻿<?php
//$user = "hmisglobal";
//$pass = "jamboafrica";
//$database = "hmisglob_griddemo";
//$host = "localhost";
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
//mysql_select_db($database) or die ("Unable to select the database");
if (isset($_GET['accounts3'])){
   $patient = $_GET['accounts3'];
   $GLOBALS['adm_no'] = $_GET['accounts3'];
   $aa = ($_GET['accounts3']);
   $adm_no = $_SESSION['accounts3']; 
}else{
   $aa     = $_SESSION['adm_no']; 
   $adm_no = $_SESSION['adm_no']; 
   //$_GET['adm_no'];
   $long_ref_no = $_SESSION['long_ref_no'];
   //$_GET['long_ref_no'];
}


if (isset($_GET['accounts5'])){      
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM stock_issp_long WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());
}

//For save and print button the correct one
//-----------------------------------------
if (isset($_GET['save_cancel'])){
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
   //Now get entries from tmp_long presc file
   $query = "select * FROM stock_issp_long WHERE qty > 0" ;
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
      $balance = mysql_result($result,$i,"credit_rate"); 
      $adm_no  = mysql_result($result,$i,"adm_no"); 
      $date    = mysql_result($result,$i,"date"); 
      $my_id   = mysql_result($result,$i,"id"); 

      $tot_amt = $tot_amt + $total;
      //Get patients Name
      $query3 = "select * FROM clients WHERE adm_no ='$aa'" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
       {
       $patient   = mysql_result($result3,$i3,"patients_name");
       $i3++;
      }

      //Reduce Qty in file if medication
      $query2  = "select * FROM stockfile WHERE description ='$desc' AND location ='$codes'" ;
      $result2 = mysql_query($query2) or die(mysql_error());
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num2 =mysql_numrows($result2) or die(mysql_error());
      $i2 =0;
      while ($i2 < $num2)
         {         
         $qtys   = mysql_result($result2,$i2,"qty");  
         $rate   = mysql_result($result2,$i2,"sell_price");   
         $i2++;
      }
      $qty = $qtys-$qty_s;
      $query3= "UPDATE stockfile SET qty ='$qty' WHERE description ='$desc' AND location ='$codes'";
      $result3 =mysql_query($query3);
      $total = $qty_s*$rate;
      $query4= "INSERT INTO st_trans VALUES('$codes','$desc','$patient','-$qty_s','ISP','$date','ADMIN','$rate','$total','$ref_no','$adm_no')";
      $result4 =mysql_query($query4);
      //update long term presc file with balances
      //-----------------------------------------
      $query4= "UPDATE st_trans_long SET qty ='$balance' WHERE id ='$my_id'";      
      $result4 =mysql_query($query4);
      $i++;
   }

   //Delete entries from temp file
   //-----------------------------
   $query3 = "DELETE FROM stock_issp_long WHERE qty > 0";
   $result3 =mysql_query($query3) or die(mysql_error());

}







if (isset($_GET['add_next'])){
echo'iam here';
   $query= "CREATE TEMPORARY TABLE stock_issp_long IF NOT EXISTS stock_issp_long (location varchar(100) NOT NULL,
   description varchar(100),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);
   $location = $_SESSION['company'];
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   $item_price   = $_GET["amount_three"];
   $total        = $_GET["result_three"];
   $desc         = $description;
   //$adm_no       = $_GET["adm_no"];
   //$long_ref_no  = $_GET["long_ref_no"];

   //, -10);


echo $long_ref_no;

   $myDate = date('y/m/d');
  




      
   $query= "INSERT INTO stock_issp_long VALUES('$long_ref_no','$location','$desc','$item_price','$qty','$total','$total','$myDate','','','$adm_no')";
   $result =mysql_query($query);


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
//$conn = new mysqli($host, $user, $pass, $database);
// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

// sql to create table
$sql = "CREATE TABLE stock_issp_long (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
location VARCHAR(30) NOT NULL,
description VARCHAR(100) NOT NULL,
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


if (isset($_GET['add_next7'])){
//if (isset($_GET['accounts6'])){ 
   $count = $_GET['accounts6']; 

   $query= "CREATE TEMPORARY TABLE stock_issp_long IF NOT EXISTS stock_issp_long (location varchar(100) NOT NULL,
   description varchar(200),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);
   //Initiolize the new entries
   //---------------------------
   $myDate = date('y/m/d');
   $location = $_SESSION['company'];
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   $total        = $_GET["result_three"];
   //$count        = $num;
   //$desc         = substr($description, -10);



   //get price for this item as you save it in temporary file
      

   $query9= "INSERT INTO stock_issp_long  VALUES('{$_SESSION['home']}','$location','$description','$amount','$qty','$total','$total','$myDate','')";
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

   $query3 = "DELETE FROM stock_issp_long WHERE qty > 0";
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
        xmlhttp.open("GET","getpriceissplong.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

















<script>
function function3() {
    var no = document.getElementById('no_three').value;   
    var txt = document.getElementById('amount_three').value;
    txt2 = txt - no;
    document.getElementById("result_three").value = txt2;
}
</script>

<script>
function function4() {
    var no = document.getElementById('no_4').value;   
    var txt = document.getElementById('amount_4').value;
    txt2 = txt - no;
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












<body background="images/background.jpg">







<form action ="issuetopatientslong.php" method ="GET">
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
   $query3 = "DELETE FROM stock_issp_long WHERE id ='$record'";
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
if (isset($_GET['add_next30'])){
   $date = date('y/m/d');

 

  // echo"Put some details heare 11";


}














$company_identity = $_SESSION['company'];


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


<h2>Long term prescription | Issue to Patients</h2><img src='chiromo-logo2.jpg' alt='statement' height='50' width='400'>

 <?php
//Displaying items to be adjusted
/////////////////////////////////
echo"<table bgcolor ='red' border = '0' border color = 'black'><th width ='400' align ='left'>Item Description</th><th width ='100'>Qty</th><th width ='120'>Issue</th><th width ='120'>Balance</th><th width ='100'>Action</th></th></table>";

 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";
 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());
 //$connect = mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword)or die ("Unable to connect");
            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 $myfile =gethostname();


 $query= "UPDATE st_trans_long SET adm_no ='$aa' WHERE id = 1" or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());

 $query= "SELECT * FROM stock_issp_long " or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());
 $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;
                                                         
 echo"<table class='altrowstable' id='alternatecolor'>";
 $company_identity =$_SESSION['company'];

 $SQL = "select * FROM stock_issp_long" ;
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


      $save ='Yes';
      $tot_amt = $tot_amt+$total;
      if ($desc > ' '){
         echo"<tr bgcolor ='white' border ='2' bordercolor='black'>";
         //echo"<td align ='left'></td>";
         echo"<td width ='400'><input type='text' id ='s_desc_three' size ='45' name='s_desc_three' value 
        ='$desc'></td>";
      }else{
         echo"<tr bgcolor ='white' border ='2' bordercolor='black'>";
         //echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td>";
         echo"<td width ='400' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)'>";

         $cdquery="SELECT description,adm_no FROM st_trans_long WHERE adm_no ='$aa'";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM st_trans_long";
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;
         while ($cdrow=mysql_fetch_array($cdresult)) {
            //$cdTitle=$cdrow["description"];     
            $cdTitle=$cdrow["description"].'-'.$cdrow["adm_no"];
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
        echo"<td><input type='text' id ='s_no_three' name='no_three' size='10' value ='$qty'></td>";
        echo"<td><input type='text' id ='s_result_three' name='result_three' size='10' value 
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
      $aa9=$row['adm_no'];        

echo"<td width ='100' align ='right'><a href='issuetopatientslong.php?accounts5=$aa8&accounts3=$aa9'>Del<img src='ico/Info.ico' alt='Smiley face' height='12' width='12'></a></td>";
//echo"<td width ='10' align ='right'></td>";

//        echo"<a href='issuetopatients.php?accounts5=$aa8'>Del";


      




echo"</tr>";

      $i++;
  
       
}

echo"<img src='ico/black.jpg' style='width:950px;height:1px;'><br>";   

      echo"</table>";
echo"<table><tr><div id='txtHint'><b>Person info will be listed here...</b></div></tr></table>";


      



echo"<img src='ico/black.jpg' style='width:950px;height:1px;'><br>";
echo"<font size ='20'><table><td width ='325'></td><td width ='100'></td><td><h2>Total:</h2></td><td width ='100' align ='right'></td><td width ='100'></td><td><h2>$tot_amt</h2></td><td width ='100' align ='right'></td></font>";
   
      //echo"</form'>";

      //To show totals here


      echo"</table>";





echo"<table>";
echo"<tr><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td>";

echo"<td align ='left'><input type='submit' name='delete'  class='button' value='Cancel Transaction'></td>";

echo"</tr></table>";




?>

</form>



</body>
</html>

















   <script type='text/javascript'>
   function printpage()
  {
  window.print()
  }
  </script>


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
$sql = "CREATE TABLE stock_issp_long (
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

<body background="images/background.jpg">


<form action ="issuetopatientslong.php" method ="GET">
<?php

 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 

//For price search button
//-----------------------
if (isset($_GET['revenue_search1'])){
   //echo"Put some details heare 4";
}










//For Next item button
//--------------------
if (isset($_GET['add_next40'])){
   $date = date('y/m/d');
}














$company_identity =$_SESSION['company'];
//$location ='BUSTANI';



$date = date('y-m-d');




 
echo"</table>";


?>



</form>



</body>
</html>




