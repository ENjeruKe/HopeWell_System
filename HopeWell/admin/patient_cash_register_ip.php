


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






   $user = "root";
   $pass = "";
   $database = "phpgrid";
   $host = "localhost";
   $connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   mysql_select_db($database) or die ("Unable to select the database");

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
description VARCHAR(30) NOT NULL,
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








if (isset($_GET['add_next2']))
   {
   $date=$_GET['date'];
   $user = "root";
   $pass = "";
   $database = "phpgrid";
   $host = "localhost";
   $connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   mysql_select_db($database) or die ("Unable to select the database");

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




   $user = "root";
   $pass = "";
   $database = "phpgrid";
   $host = "localhost";
   $connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   mysql_select_db($database) or die ("Unable to select the database");


   $query3 = "DELETE FROM sales WHERE description<>' '" ;
   $result3 =mysql_query($query3) or die(mysql_error());


    mysql_query('DROP TABLE IF EXISTS `phpgrid`.`sales`');
//    $query= "DROP TABLE IF EXISTS sales";
//    $result =mysql_query($query);
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







<form action ="patient_cash_register.php" method ="GET">
<?php

 $mysqlserver="localhost";
 $mysqlusername="root";
 $mysqlpassword="";

 $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());            
 $dbname = 'phpgrid';
 mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
 //Get the receipt No.



   //New changes
if (isset($_GET['accounts'])){
   $client_no=$_GET['accounts'];
   $query3="SELECT * FROM clients WHERE client_id ='$client_no'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $patients_name= mysql_result($result3,$i3,"patients_name");  
     $age          = mysql_result($result3,$i3,"age");  
     $gender       = mysql_result($result3,$i3,"gender");  
     $client_no    = mysql_result($result3,$i3,"adm_no");  
     $i3++;
   }

            
   $cdquery="SELECT date FROM medicalfile WHERE adm_no ='$client_no'";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());


   echo"<table></td><td width ='50'>File:</td><td width ='30'>";
   echo"<input type='text' name='adm_no' size='10' value ='$client_no'></td>";

   echo"<td width ='20'>Name: </td><td width ='30'><input type='text' name='patients_name' size='30' value ='$patients_name'></td>";

   echo"<td width ='10'>Age: </td><td width ='10'><input type='text' name='age' size='10' value ='$age'></td>";
   echo"<td width ='10'>Sex: </td><td width ='10'><input type='text' name='age' size='10' value ='$gender'></table>";
}















$company_identity ='BUSTANI';
$location ='BUSTANI';

$item1 =' ';
$sql="SELECT * FROM stockfile WHERE description ='$item1'";
$result=mysql_query($sql);	 
$rows=mysql_fetch_array($result);

if (isset($_GET['revenue_search1'])){
   $item1=$_GET['item1'];
   //$company_identity=$_GET['company_identity'];

   $sql="SELECT * FROM stockfile WHERE description ='$item1'";
   $result=mysql_query($sql);	 
   $rows=mysql_fetch_array($result);
   }




 $mysqlserver="localhost";
 $mysqlusername="root";
 $mysqlpassword="";

 $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());            
 $dbname = 'phpgrid';
 mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT client_id,patients_name FROM clients";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            


















$date = date('y-m-d');

echo"<br><br>";
echo"<table width ='800' border='0' border color ='black'></tr>";
echo"<tr><td width ='50' align ='left'><b>Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td><td width ='100'>Patients Name:</td><td width ='100'>";
echo"<select id='supplier' name='supplier'>";        
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["client_id"].'-'.$cdrow["patients_name"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";

echo"</td></tr></table>";






//echo"<table width = '800' border = '0' border color = 'black'>";
//echo"<tr>";
//echo"<td width='100' align='right'></td><td>";

echo"<table border = '0' border color = 'black'><td width ='100' align ='left'><input type='submit' name='revenue_search1'  class='button' value='Search'></td><td width ='300'>";

 if (!isset($_GET['revenue_search1'])){
    echo"<select id='item1' name='item1'>";        
    $price = 0;
 }
 $mysqlserver="localhost";
 $mysqlusername="root";
 $mysqlpassword="";

 $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());            
 $dbname = 'phpgrid';
 mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT description FROM stockfile WHERE location ='$company_identity'";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());

 if (isset($_GET['revenue_search1'])){

    $user = "root";   
    $pass = "";   
    $database = "phpgrid";   
    $host = "localhost";   

    $connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
    mysql_select_db($database) or die ("Unable to select the database");

   
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
echo"</td><td width ='120'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td width ='120'>";
//echo"</td>";
//echo"<td width='50' align='right'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td>";
?>

<select id="no" name ="no" onchange="myFunction()">
	<option>0</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
</select>
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

 $mysqlserver="localhost";
 $mysqlusername="root";
 $mysqlpassword="";

 $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());
 $connect = mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword)or die ("Unable to connect");
            
 $dbname = 'phpgrid';
 mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
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

      echo"<tr bgcolor ='black' border ='2' bordercolor='white'>";

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
      //if ($save=='Yes'){
         //echo"<br>";
         //echo"<form action ='stocks_adjustment.php'>";
         //echo"<table width ='400' border='0' border color ='black'><td align ='left'><input type='submit' name='billing'  class='button' value='Save and Print''></td></table></form>";
     //    }



      




echo"<table><td width ='600'></td><td><h4>Total</h4></td><td width ='100' align ='right'><h4>$tot_amt</h4></td>";
   


      //To show totals here


      echo"</table>";









?>

<table width ='400' border='0' border color ='black'><td align ='left'><input type='submit' name='add_next2'  class='button' value='Save and Print'></td></table>
</form>



</body>
</html>




