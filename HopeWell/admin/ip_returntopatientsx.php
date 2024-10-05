<?php include 'includes/session.php'; ?>

<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
$store_select = $_SESSION['store_select'];
$_SESSION['company'] = $store_select;
if ($store_select<>''){
}else{
    echo"<p align ='center'><font color ='red'><h1>Kindly select the Store Location before you can proceed</p></font>";
    die();
}   
$issp0 = $_SESSION['issp0'];
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
  	<?php include 'includes/stocks.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
<?php
   session_start();
require('open_database.php');
$branch = $_SESSION['company'];
$username = $_SESSION['username'];

?>	




<?php
//echo"Issue No".$issp0;

//$issp0='';
if ($issp0==''){
   $tod =date("Y-m-d H:i:s", strtotime("now"));
   //echo"2";
   $tod = strtotime("now");
   //echo"Time".$tod;
   
   //echo"Time".$tod;
   $tablez = 'Z'.$tod;
   $_SESSION['mytable'] =$tablez;
   $issp0 = $_SESSION['issp0'];
   $query3 = "CREATE TABLE $tablez LIKE stock_issp";
   
//$query3 = "SELECT * INTO $tablez FROM 'stock_issp'";
//echo"4";
//echo"Table".$tablez;
   $result3 =mysql_query($query3) or die(mysql_error());
   $date =date('y-m-d');
   
   $query9= "INSERT INTO $tablez  VALUES('1','','','','0','0','0','$date','1')";
      $result9 =mysql_query($query9);
}else{
    $tablez = $_SESSION['mytable'];
    $issp0 = $_SESSION['issp0'];
}
//echo"Table".$tablez;


$company_identity = $_SESSION['company'];
$location1 = $_SESSION['company'];

//For save and print button the correct one
//-----------------------------------------
if (isset($_GET['save_cancel'])){
 

   //Go and save first
   //-------------------
   $cost_location = $_GET['patient'];
   $patient   = $_GET['patient2'];
   $date      = $_GET['date'];
   $issue     = $_GET['issue'];
   $gledger ='PHARMACY DRUGS';
   
   $_SESSION['issp0'] ='';

   //$chargable ='No';
   //Now go and Check Bed Charge in Revenue file
   $query3 = "select * FROM revenuef WHERE name ='MEDICATION'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $gledger ='Pharmacy Drugs';
   $i3=0;
   while ($i3 < $num3)
     {
     $gledger     = mysql_result($result3,$i3,"gl_account");  
     $g_id        = mysql_result($result3,$i3,"id");  
     $i3++;
   }

    $chargable   = 'yes';  
   




   //Now go and get name and file from the appointmentf file
   $query7 = "select * FROM appointmentf" ;
   $result7 =mysql_query($query7) or die(mysql_error());
   $num7 =mysql_numrows($result7) or die(mysql_error());
   $i7=0;

   while ($i7 < $num7)
     {
     $idno     = mysql_result($result7,$i7,"adm_no");  
     $pat_name   = mysql_result($result7,$i7,"name");   
     $pay_company= mysql_result($result7,$i7,"payer");   
     $ward_bed = $pat_name.'-'.$idno;
     if ($ward_bed==$patient){
        $adm_no     = mysql_result($result7,$i7,"adm_no");  
        $pat_name   = mysql_result($result7,$i7,"name");   
        $pay_company= mysql_result($result7,$i7,"payer");   
        $patient  = $pat_name;
        $idno    = $adm_no;
        //$adm_no    = $idno;      
     }
     $i7++;    
   }


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
     $ref_no ='K'.$ref_no;
     
     $query33  = "UPDATE companyfile SET next_ref ='$ref_no2'";
     $result33 = mysql_query($query33);



   $query5= "INSERT INTO next_issp VALUES('')";
   $result5 =mysql_query($query5);  
   $query3 = "select * FROM next_issp" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
       {
          $ref_no   = mysql_result($result3,$i3,"next_adm");  
          $i3++;
       }
       $ref_no ='K'.$ref_no;



   $query = "select * FROM $tablez WHERE description <>'' and qty<>0";
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
      $tot_amt = $tot_amt + $total;

//Medication
//----------
         //Reduce Qty in file if medication
         $query2 = "select * FROM stockfile WHERE description ='$desc' and location ='$store_select'" ;
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
         $query3= "UPDATE stockfile SET qty ='$qty' WHERE description ='$desc' and location ='$store_select'";
         $result3 =mysql_query($query3);


         $query4= "INSERT INTO st_trans VALUES('','$store_select','$desc','$patient',
'$qty_s','RTP','$date','$username','$rate','$total','$ref_no','$adm_no','','','','','')";
         $result4 =mysql_query($query4);



      if ($issue=='Package'){
          //dont save in the patients Bill
          //------------------------------
      }else{
      $query5= "INSERT INTO htransf 
      VALUES('','$adm_no','$patient','$date','$ref_no','$desc','CR','$rate','$chargable','$gledger','DB',' ','$username',' 
      ','$date','-$qty_s','')";
      $result5 =mysql_query($query5);
      }


      $debt_control = 'PHARMACY DRUGS';
      $gledger_gl = 'INVENTORY';
      $patientsz = $desc.':'.$patient;
      //Now go and pass a Debit entry in G/Ledger
      //-----------------------------------------   
      //$desc =$patient;
      $query8 = "select * FROM glaccountsf WHERE account_name='$gledger_gl'" ;
      $result8 =mysql_query($query8) or die(mysql_error());
      $num8 =mysql_numrows($result8) or die(mysql_error());
      $i8=0;
      while ($i8 < $num8)
        {
        $balances = mysql_result($result8,$i8,"balance"); 
        $type = mysql_result($result8,$i8,"type"); 
        $i8++;
        }
        $balance = $balances + $total;
        $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='$gledger_gl'";
        $result3 = mysql_query($query3);

       $query8= "INSERT INTO gltransf VALUES(' 
      ','$date','$gledger_gl','$ref_no','DB','$patientsz','$total','$username','$type')";
      $result8 =mysql_query($query8);
      



      //Now go and pass a Credit entry in G/Ledger
      
      $query8 = "select * FROM glaccountsf WHERE account_name='$debt_control'" ;
      $result8 =mysql_query($query8) or die(mysql_error());
      $num8 =mysql_numrows($result8) or die(mysql_error());
      $i8=0;
      while ($i8 < $num8)
           {
           $balances = mysql_result($result8,$i8,"balance"); 
           $type = mysql_result($result8,$i8,"type"); 
           $i8++;
           }
           $balance = $balances - $total;
           $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='$debt_control'";
           $result3 = mysql_query($query3);
      //}

      $query8= "INSERT INTO gltransf VALUES(' ','$date','$debt_control','$ref_no','CR','$patientsz',
     '-$total','$username','$type')";
      $result8 =mysql_query($query8);


      
      $i++;
   }








   //Delete entries from temp file
   //-----------------------------
   $query3 = "DELETE FROM $tablez WHERE qty > 0";
   $result3 =mysql_query($query3) or die(mysql_error());
   
   $query3 = "DELETE FROM $tablez WHERE location ='BUSTANI'";
   $result3 =mysql_query($query3) or die(mysql_error());

   $query3 = "DROP TABLE $tablez";
   $result3 =mysql_query($query3) or die(mysql_error());
   

}









if (isset($_GET['accounts5'])){      
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM $tablez WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());
}





?>






<!-- Le styles -->
    
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/bills-pop-up.js"></script>

	
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php



// sql to create table
$sql = "CREATE TABLE stock_issp (
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


if (isset($_GET['add_next'])){
//if (isset($_GET['accounts6'])){ 
   $count = $_GET['accounts6']; 

   $query= "CREATE TEMPORARY TABLE stock_issp IF NOT EXISTS stock_issp (location varchar(100) NOT NULL,
   description varchar(200),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);
   //Initiolize the new entries
   //---------------------------
   $myDate = date('y/m/d');
   $location     = $_SESSION['store_select'];
   //"BUSTANI";
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   $total        = $_GET["result_three"];
   $balances     = $_GET["balance"];
   $qtyszs     = $_GET["no_three"];
   
   
   //$count        = $num;
   //$desc         = substr($description, -10);



   //get price for this item as you save it in temporary file
      //here
   //if ($qtyszs > $balances){
       echo"<font color ='red'><h4>Low stock. Kindly check and try again. Available stock is:".$balances;
   //}else{
   $query9= "INSERT INTO $tablez  VALUES('','$location','$description','$amount','$qty','$total','$total','$myDate','')";
   $result9 =mysql_query($query9);
   //}
   $myDate =date('y-m-d');

   $query3 = "DELETE FROM $tablez WHERE description <>'' and qty = 0";
   $result3 =mysql_query($query3) or die(mysql_error());
   $_SESSION['issp0'] ='issp0';

}






if (isset($_GET['refresh'])){
   $date = date('y/m/d');
   //echo"Put some details heare 7";

}

if (isset($_GET['delete'])){
   $date = date('y/m/d');

   $query3 = "DELETE FROM $tablez WHERE qty > 0";
   $result3 =mysql_query($query3) or die(mysql_error());
   $_SESSION['issp0'] ='issp0';
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
        xmlhttp.open("GET","getpriceissp.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>




<script>
function showUser6(str) {    
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
        xmlhttp.open("GET","getlocation.php?q="+str,true);
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












<body >




<form action ="ip_returntopatientsx.php" method ="GET">
<?php


   //New changes
if (isset($_GET['accounts5'])){ 
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM $tablez WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $_SESSION['issp0'] ='issp0';


    // echo"Put some details heare 9";

}



//For price search button
//-----------------------
if (isset($_GET['revenue_search1'])){
   $date = date('y/m/d');

}


//For Next item button
//--------------------
if (isset($_GET['add_next'])){
   $date = date('y/m/d');

 $_SESSION['issp0'] ='issp0';

  // echo"Put some details heare 11";


}


$company_identity = $_SESSION['company'];
            
 $cdquery="SELECT id,name FROM appointmentf";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
$date = date('y-m-d');


?>


 <?php
 
 $store_select = $_SESSION['store_select'];
if ($store_select<>''){
   echo"<p align ='center'><font color ='red'><h1>Store Location: ".$store_select;
   echo"</p></font>";
}else{
    echo"<p align ='center'><font color ='red'><h1>Kindly select the Store Location before you can proceed</p></font>";
    die();
}   
//Displaying items to be adjusted
/////////////////////////////////
echo"<img src='ico/black.jpg' style='width:100%;height:1px;'><br>";   

echo"<table border = '0' width ='100%'>";
echo"<th width ='55%' bgcolor ='green'><font color ='white'><h4>Item Description</h4></font></th>";
echo"<th width ='10%' bgcolor ='green'><font color ='white'><h4>Price</h4></font></th>";
echo"<th width ='10%' bgcolor ='green'><font color ='white'><h4>Qty</h4></font></th>";
echo"<th width ='10%' bgcolor ='green'><font color ='white'><h4>Total</h4></font></th>";
echo"<th width ='10%' bgcolor ='green'><font color ='white'><h4>Action</h4></font></th></table>";

 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 $myfile =gethostname();


 $query7= "SELECT * FROM $tablez" or die(mysql_error());
 $result7 =mysql_query($query7) or die(mysql_error());
 $num7 =mysql_numrows($result7) or die(mysql_error());
 $tot =0;
 $i7 = 0;
                                                         
 echo"<table width='100%' border='0'>";
 $company_identity =$_SESSION['company'];
 $SQL = "select * FROM stockfile" ;
 $hasil=mysql_query($SQL, $connect);
 $id = 0;
 $nRecord = 1;
 $No = $nRecord;
 $tot = 0;
 $save ='No';
 $tot_amt =0;
 //while ($row=mysql_fetch_array($hasil)) 
   while ($i7 < $num7)
     {

      //{               
      $desc    = mysql_result($result7,$i7,"description");   
      $qty    = mysql_result($result7,$i7,"qty");   
      $price   = mysql_result($result7,$i7,"sell_price");   
      $total = mysql_result($result7,$i7,"gl_account");
      $line  = mysql_result($result7,$i7,"line_no");
      $aa8    = mysql_result($result7,$i7,"id");   
      $save ='Yes';
      $tot_amt = $tot_amt+$total;
      if ($desc > ' '){
         echo"<tr>";
         //echo"<td align ='left'></td>";
         echo"<td width ='55%'><input type='text' id ='s_desc_three' size ='90' name='s_desc_three' value 
        ='$desc'></td>";
      }else{
         echo"<tr>";
         //echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td>";
         echo"<td width ='400' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)'>";
         $cdquery="SELECT description FROM stockfile where location ='$store_select' ORDER BY description";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select description FROM stockfile";
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


    //$aa8=$row['id'];
    $line_no    = $row['line_no'];
    $myfunction = $row['line_no'];
    $myfunction = 'function'.$row['line_no'];
    if ($qty > 0){
        echo"<td width ='10%' align ='left'><input type='text' id ='s_amount_three' name='amount_three' size='10' value 
        ='$price'></td>";
        echo"<td width ='10%' align ='left'><input type='text' id ='s_no_three' name='s_no_three' size='10' value ='$qty'></td>";
        echo"<td width ='10%'><input type='text' id ='s_result_three' name='s_result_three' size='10' value 
        ='$total' style='text-align:left;'></td>";
    }else{
        //echo"<td><input type='text' id ='s_amount_three' name='s_amount_three' size='10' value 
        //='$price'></td>";
        //echo"<td><input type='text' id ='s_no_three' name='s_no_three' size='10' 
        //onchange='function33()'></td>";
        //echo"<td><input type='text' id ='s_result_three' name='s_result_three' size='10'></td>";
    }
  

 
   
      $aa7=$row['description'];        
      //$aa8=$row['id'];        
if ($qty <>0){
echo"<td width ='10%' align ='center'><a href='ip_returntopatientsx.php?accounts5=$aa8'>Del<img src='ico/Info.ico' alt='Smiley face' height='12' width='12'></a></td>";
}else{
echo"<td width ='10%' align ='right'></td>";
}
//echo"<td width ='10' align ='right'></td>";

//        echo"<a href='issuetopatients.php?accounts5=$aa8'>Del";


      




echo"</tr>";

      $i7++;
  
       
}

echo"<img src='ico/black.jpg' style='width:100%;height:1px;'><br>";   

      echo"</table>";
echo"<table><tr><div id='txtHint'><b>.</b></div></tr></table>";


      



echo"<img src='ico/black.jpg' style='width:100%;height:1px;'><br>";
echo"<font size ='20'><table><td width ='325'></td><td width ='100'></td><td><h2>Total:</h2></td><td width ='100' align ='right'></td><td width ='100'></td><td><h2>$tot_amt</h2></td><td width ='100' align ='right'></td></font>";
   
      //echo"</form'>";

      //To show totals here


      echo"</table>";





echo"<table>";
echo"<tr><td><b>Date</b></td><td><input type='text' name='date' size ='10' value='$date'></td></tr>";


echo"<tr><td><b>Patient : </b></td><td><select id='patient2' name='patient2'";        
$cdquery="SELECT name,adm_no FROM appointmentf where adm_date<>'0000-00-00 00:00:00' ORDER BY name ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["name"].'-'.$cdrow["adm_no"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select>";
echo"</td></tr>";
echo"<tr><td>Transaction Type</td><td>";
echo"<select id ='issue' name ='issue'>";
  echo"<option value='Medication'>Medication</option>";
  echo"<option value='Prescription'>Prescription</option>";
  echo"<option value='Package'>Package</option>";
echo"</select></td></tr>";
echo"<tr><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td>";

echo"<td align ='left'><input type='submit' name='delete'  class='button' value='Cancel Transaction'></td></td>";

echo"</tr></table>";




?>

</form>



</body>
</html>

















<?php




//For save and print button
//------------------__-----
if (isset($_GET['save_cancel77'])){
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





   $query = "select * FROM $tablez" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $tot_amt =0;
   $codes = $store_select;
   //$_SESSION['company'];
   while ($i < $num)
      {         
      //$codes   = mysql_result($result,$i,"location");  
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"gl_account");  
      $tot_amt = $tot_amt + $total;

      //Add Qty in file
      $query2 = "select * FROM $tablez WHERE description ='$desc' AND location ='$store_select'" ;
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

      $query3= "UPDATE stockfile SET qty ='$qty' WHERE description ='$desc' AND location ='$store_select'";
      $result3 =mysql_query($query3);

echo 'Location:'.$codes.$desc;

      $patient =$patients_name;
      $query4= "INSERT INTO st_trans VALUES('','$store_select','$desc','$patient','$qty_s','CASH RECEIPT','$date','ADMIN','$rate','$total','$ref_no')";
      $result4 =mysql_query($query4);
      //Now go and update the receipt file

      $i++;
 
   }


   //Update Balances if not paid in full
   //-----------------------------------
   $topay = $tot_amt - $paid;
   if ($tot_amt > $paid){
     $query3 = "select * FROM appointmentf WHERE adm_no ='$adm_no'" ;
     $result3 =mysql_query($query3) or die(mysql_error());
     $num3 =mysql_numrows($result3) or die(mysql_error());
     $i3=0;
     while ($i3 < $num3)
       {
       $balance   = mysql_result($result3,$i3,"balance");
  
       $acc_no    = mysql_result($result3,$i3,"payer");

       $db_account= mysql_result($result3,$i3,"payer");
  
       $i3++;
     }
     $balance = $balance+$topay;
     $query= "UPDATE appointmentf SET balance ='$balance' WHERE adm_no ='$adm_no'";
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







                                         








   
  
}





?>


<!DOCTYPE html>
<html lang="en">
  
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    

    



<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
    



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
$sql = "CREATE TABLE stock_issp (
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
   $query= "CREATE TEMPORARY TABLE stock_issp IF NOT EXISTS stock_issp (location varchar(100) NOT NULL,
   description varchar(100),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);

   $location     = $_SESSION['store_select'];
   //"BUSTANI";
   $description  = $_GET["item1"];
   $amount       = $_GET["amount"];
   $qty          = $_GET["no"];
   $total        = $_GET["result2"];
   $desc         = substr($description, -10);
   $balances     = $_GET["balance"];
   $qtyszs     = $_GET["no_three"];
   
   
   $myDate = date('y/m/d');
   //$myfile =gethostname();



   //get price for this item as you save it in temporary file
   $item_desc =" ";
   $query2 = "select * FROM stockfile WHERE substr(description, -10) ='$desc' and location ='$location'";
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

   //if ($qtyszs > $balances){
       //echo"<font color ='red'><h4>Low stock. Kindly check and try again ".$balances;
   //}else{
   $query= "INSERT INTO $tablez VALUES('','$location','$item_desc','$item_price','$qty','$total','$total','$myDate','')";
   $result =mysql_query($query);
   //}
   $query3 = "DELETE FROM $tablez WHERE description<>'' and qty = 0";
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


<form action ="ip_returntopatientsx.php" method ="GET">
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




