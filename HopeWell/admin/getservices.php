<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$date = $_SESSION['sys_date'];
?>

<!--!DOCTYPE html>
<html>
<head-->
<!--style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 0px solid black;
    padding: 5px;
}

th {text-align: left;}
</style-->
</head>
<body>



<form action ="doc_window_19.php" method ="GET">

<?php
$adm_no =$_SESSION['adm_no'];
$name   =$_SESSION['name'];
$ref_no =$_SESSION['ref_no'];
$payer  =$_SESSION['payer'];

$q = intval($_POST['q']); 
$q2 = $_GET['q'];
echo 'Payer'.$payer; 

$staff =substr($adm_no,0,5);

//echo $q2;
$date = $_SESSION['sys_date'];


if ($payer ==''){


$sql="SELECT * FROM revenuef WHERE name = '".$q2."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   $price         = $row['cash_rate'];
   $short         = $row['gl_account'];
   $glacc         = $row['gl_account'];
   $short         = substr($short,0,3);
   $item          = $row['Name'];
   
   
   
   
   $_SESSION['item'] = $item;
   $_SESSION['price'] = $price;
   $_SESSION['short'] = $short;
   $_SESSION['glaccount'] = $glacc;
   


$_SESSION['account_type'] = $account_type;

echo"<form action ='doc_window_19.php' method ='GET'>";

 echo"<table border = '0'><tr><td width ='400'>Service Description:</td><td><input type='text' id ='s_desc_three' name='s_desc_three' size ='35' value ='$q2' readonly></td></tr>";
if ($staff=='STAFF'){
   echo"<tr><td width ='50'>Price:</td><td><input type='text' id ='result_three' name='result_three' size='10' value = '$price' ></td></tr>";
}else{
    echo"<tr><td width ='50'>Price:</td><td><input type='text' id ='result_three' name='result_three' size='10' value = '$price' readonly></td></tr>";
}
echo"<tr><td>Quantity:</td><td><input type='text' name='result_qty' size='10' value = '1' required></td></tr>";

 echo"<tr><td></td><td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td></table></form>";


}


}else{
    
//echo 'Payer'.$payer; 
    
$sql="SELECT * FROM revenuef WHERE name = '".$q2."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   $price         = $row['credit_rate'];
   $short         = $row['gl_account'];
   $glacc         = $row['gl_account'];
   $short         = substr($short,0,3);
   $item          = $row['Name'];
   $price2         = $row['credit_rate'];
   
   
   
   $_SESSION['item'] = $item;
   $_SESSION['price'] = $price;
   $_SESSION['short'] = $short;
   $_SESSION['glaccount'] = $glacc;
   

   $payerx = substr($payer,0,4);
   echo 'Payers:'.$payerx;
   if ($payerx == 'NHIF' or $payerx=='KWS ' or $payerx=='NAIV'){
       //Price remains credit_rate
       $price         = $row['credit_rate'];
   }else{
       $price = $row['corp_rate'];
   }
   
   if ($price <=0){
       $price = $price2;
   }

$_SESSION['account_type'] = $account_type;

echo"<form action ='doc_window_19.php' method ='GET'>";

 echo"<table border = '0'><tr><td width ='400'>Service Description:</td><td><input type='text' id ='s_desc_three' name='s_desc_three' size ='35' value ='$q2' readonly></td></tr>";
if ($staff=='STAFF'){
   echo"<tr><td width ='50'>Price:</td><td><input type='text' id ='result_three' name='result_three' size='10' value = '$price' ></td></tr>";
}else{
    echo"<tr><td width ='50'>Price:</td><td><input type='text' id ='result_three' name='result_three' size='10' value = '$price' readonly></td></tr>";
}
echo"<tr><td>Quantity:</td><td><input type='text' name='result_qty' size='10' value = '1' required></td></tr>";

 echo"<tr><td></td><td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td></table></form>";


}


    
}
?>
<!--/body>
</html-->