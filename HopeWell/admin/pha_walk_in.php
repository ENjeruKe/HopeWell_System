<?php
   session_start();
require('open_database.php');
$branch = $_SESSION['company'];

?>
<?php
if (isset($_GET['accounts3'])){
   $_SESSION["rct_adm_no"] = $_GET['accounts3'];
   $adm_no     = $_SESSION["rct_adm_no"];

  //Now go and get name and file from the clients file
  $query7 = "select * FROM appointmentf where adm_no = '$adm_no'" ;
  $result7 =mysql_query($query7) or die(mysql_error());
  $num7 =mysql_numrows($result7) or die(mysql_error());
  $i7=0;
  while ($i7 < $num7)
    {
    $patient_name   = mysql_result($result7,$i7,"name");   
    $pay_company= mysql_result($result7,$i7,"payer");   
    $i7++;    
   }
   $_SESSION["rct_patient"] = $patient_name;
}
?>
﻿<?php
$company_identity = $_SESSION['company'];
$location1 = $_SESSION['company'];
$patient    = $_SESSION["rct_patient"];
$adm_no     = $_SESSION["rct_adm_no"];

//For save and print button the correct one
//-----------------------------------------
if (isset($_GET['save_cancel'])){

   echo"<body background='images/background.jpg'>";
   //Go and save first
   //-------------------
   //$payee  =   $_GET['patient'];
   $payee  =   '';
   $doctor  =  '';

   $patient   = $_GET['patient2'];
   $date      = $_GET['date'];
   $issue     = $_GET['issue'];
   $today =date('y-m-d');

   //Get the receipt No.   
   $query3 = "select * FROM medicalfile where type ='Walk-in' and date ='$today'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"ref_no");  
     $name  = mysql_result($result3,$i3,"name");  
     $adm_no  = mysql_result($result3,$i3,"adm_no");  
     $search_no =$name.'-'.$adm_no;
        if ($search_no==$patient){
           $patient = mysql_result($result3,$i3,"name");  
           $adm_no  = mysql_result($result3,$i3,"adm_no");  
           $ref_no   = mysql_result($result3,$i3,"ref_no");  
        }
     $i3++;
     }

   $query = "select * FROM pha_walkin WHERE description <>''" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $tot_amt =0;
   $codes = $_SESSION['company'];   
   while ($i < $num)
      {         
      //$codes   = mysql_result($result,$i,"location");  
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"gl_account");  
      //$tot_amt = $tot_amt + $total;
 
    //Update appoinment file
    //----------------------
    $query5= "INSERT INTO auto_transact VALUES('','DRUGS','$desc','$total','$qty','$total','$patient',
'$today','$adm_no','','$ref_no','')";
     $result5 =mysql_query($query5);        
      $i++;
   }


   //Delete entries from temp file
   //-----------------------------
   $query3 = "DELETE FROM pha_walkin WHERE qty > 0 and description <>''";
   $result3 =mysql_query($query3) or die(mysql_error());

   echo"<p align ='center'><h4>Data sent successfully</h4></p>";
}









if (isset($_GET['accounts5'])){      
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM pha_walkin WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());



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


// sql to create table
$sql = "CREATE TABLE pha_walkin (
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

   $query= "CREATE TEMPORARY TABLE pha_walkin IF NOT EXISTS pha_walkin (location varchar(100) NOT NULL,
   description varchar(200),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);
   //Initiolize the new entries
   //---------------------------
   $myDate = date('yy/m/d');
   $location     = "BUSTANI";
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   $total        = $_GET["result_three"];
   //$count        = $num;
   //$desc         = substr($description, -10);



   //get price for this item as you save it in temporary file
      

   $query9= "INSERT INTO pha_walkin  VALUES('','$location','$description','$amount','$qty','$total','$total','$myDate','')";
      $result9 =mysql_query($query9);

   $myDate =date('yy-m-d');

}






if (isset($_GET['refresh'])){
   $date = date('y/m/d');
   //echo"Put some details heare 7";

}

if (isset($_GET['delete'])){
   $date = date('y/m/d');
 
   $query3 = "DELETE FROM pha_walkin WHERE qty > 0";
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
        xmlhttp.open("GET","getpriceissp2_walkin.php?q="+str,true);
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












<body background="images/background.jpg">







<form action ="pha_walk_in.php" method ="GET">
<?php



   //New changes
if (isset($_GET['accounts5'])){ 
   $record =$_GET['accounts5'];
echo"$record";
   $query3 = "DELETE FROM pha_walkin WHERE id ='$record'";
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














$company_identity = $_SESSION['company'];




           
 $cdquery="SELECT id,name FROM appointmentf";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            


















$date = date('y-m-d');
//$date = date_format($date,"Y/m/d");










// Accounts6 Not applicabel for now
//echo"</td><td width ='100'><input type='text' id ='amounts' name='amounts' size='10' value ='$price'></td><td width='120'>";
//----------------------------------------------
//echo"</td>";
//echo"<td width='50' align='right'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td>";


?>

<!--input type="text" id="result" size="20">
<input type="text" id="result2" size="20"-->


<p align ='right'><img src='chiromo-logo33.jpg' alt='statement' height='40' width='350'></p>
<!--img src='chiromo-logo2.jpg' alt='statement' height='50' width='400'-->

 <?php
//Displaying items to be adjusted
/////////////////////////////////
echo"<table bgcolor ='red' border = '0' border color = 'black' width ='100%'><th width ='400' align ='left'>Item Description</th><th width ='100'>Price</th><th width ='120'>Qty</th><th width ='120'>Total</th><th width ='100'>Action</th></th></table>";
 $myfile =gethostname();


 $query= "SELECT * FROM pha_walkin " or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());
 $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;
                                                         
 echo"<table class='altrowstable' id='alternatecolor'>";
 $company_identity =$_SESSION['company'];
 $SQL = "select * FROM pha_walkin" ;
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
         $cdquery="SELECT description FROM stockfile order by description";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM stockfile order by description";
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
 if ($desc > ' '){
    echo"<td width ='100' align ='right'><a href='pha_walk_in.php?accounts5=$aa8'>Del<img src='ico/Info.ico' 
alt='Smiley face' height='12' width='12'></a></td>";
}else{
    echo"<td width ='100' align ='right'></td>";
}
//echo"<td width ='10' align ='right'></td>";

//        echo"<a href='issuetopatients.php?accounts5=$aa8'>Del";


      




echo"</tr>";

      $i++;
  
       
}

echo"<img src='images/black.jpg' style='width:1000px;height:1px;'><br>";   

      echo"</table>";
echo"<table><tr><div id='txtHint'><b>Person info will be listed here...</b></div></tr></table>";


      



echo"<img src='images/black.jpg' style='width:1000px;height:1px;'><br>";
echo"<font size ='20'><table><td width ='325'></td><td width ='100'></td><td><h2>Total:</h2></td><td width ='100' align ='right'></td><td width ='100'></td><td><h2>$tot_amt</h2></td><td width ='100' align ='right'></td></font>";
   
      //echo"</form'>";

      //To show totals here


      echo"</table>";





//----------
// $query= "SELECT * from medicalfile " or die(mysql_error());
// $result =mysql_query($query) or die(mysql_error());
// $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;
                                                         
// $company_identity =$_SESSION['company'];
// $SQL = "select * FROM medicalfile" ;
// $hasil=mysql_query($SQL, $connect);
// $id = 0;
// $nRecord = 1;
// $No = $nRecord;
 $tot = 0;
 $save ='No';
 $tot_amt =0;
// while ($row=mysql_fetch_array($hasil)) 
//      {               
//      $today    = mysql_result($result,$i,"date");
//      }

//--------------

//$date = strtotime($date); 
//$new_date = date('d-m-y', $date);
//$date = $new_date;


echo"<table>";
echo"<tr><td><b>Date</b></td><td><input type='text' name='date' size ='10' value='$date'></td></tr>";
echo"<tr><td width='100' align='left'><b>Payer </b></td><td>";
echo"<select id='patient2' name='patient2'>";        
$cdquery="SELECT name,adm_no FROM medicalfile where type ='Walk-in' and date ='$today'";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["name"].'-'.$cdrow["adm_no"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select></td></tr>";
//echo"</td><tr><td><b>Patient : </b></td><td>";
//echo"<tr><td><b>Patient Name: </b></td><td><input type='text' name='patient2' size ='40' required></td></tr>";


//echo"<tr><td>Transaction Type</td><td>";
//echo"<select id ='issue' name ='issue'>";
//  echo"<option value='Cash Receipts'>Cash Receipts</option>";
//  echo"<option value='Cheque Receipts'>Cheque Receipts</option>";
//  echo"<option value='M-Pesa'>M-Pesa</option>";
//  echo"<option value='EFT Receipts'>EFT Receipts</option>";
//  echo"<option value='INVOICE'>INVOICE</option>";
echo"</select></td></tr>";
echo"<tr><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td>";

//echo"<td align ='left'><input type='submit' name='delete'  class='button' value='Cancel Transaction'></td></td>";

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

<?php







                                         








   
  
//}





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
$sql = "CREATE TABLE pha_walkin (
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
   $query= "CREATE TEMPORARY TABLE pha_walkin IF NOT EXISTS pha_walkin (location varchar(100) NOT NULL,
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
   $desc         = substr($description, -10);

   $myDate = date('y/m/d');
   //$myfile =gethostname();



   //get price for this item as you save it in temporary file
   $item_desc =" ";
   $query2 = "select * FROM stockfile WHERE substr(search_name, -10) ='$desc'";
   //location ='$location'" ;
   $result2 =mysql_query($query2) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num2 =mysql_numrows($result2) or die(mysql_error());
   $i2 =0;

   while ($i2 < $num2)
      {
      $item_desc    = mysql_result($result2,$i2,"description");
      $item_price   = mysql_result($result2,$i2,"sell_price");
      //}
      $i2++;
   }

      
   $query= "INSERT INTO pha_walkin VALUES('','$location','$item_desc','$item_price','$qty','$total','$total','$myDate','')";
   $result =mysql_query($query);


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

<body background="images/background.jpg">


<form action ="pha_walk_in.php" method ="GET">
<?php

//For price search button
//-----------------------
if (isset($_GET['revenue_search1'])){
   //echo"Put some details heare 4";
}










//For Next item button
//--------------------
if (isset($_GET['add_next'])){
   $date = date('y/m/d');
}














$company_identity = $_SESSION['company'];

$location = $_SESSION['company'];




$date = date('y-m-d');




 
echo"</table>";


?>



</form>



</body>
</html>




