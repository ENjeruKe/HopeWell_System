<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$date = $_SESSION['smart_date'];
echo $date;
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


<form action ="auto_search.html" method ="GET">

<?php
$adm_no =$_SESSION['adm_no'];
$name   =$_SESSION['name'];
$ref_no =$_SESSION['ref_no'];
$payer  =$_SESSION['payer'];

$q = intval($_POST['q']); 
$q2 = $_GET['q'];
//echo $payer;

//echo $q2;
$date = $_SESSION['smart_date'];
$sql="SELECT * FROM revenuef WHERE name = '".$q2."' ";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   $price         = $row['cash_rate'];
   $short         = $row['gl_account'];
   $glacc         = $row['gl_account'];
   $short         = substr($short,0,3);
   $item          = $row['Name'];
if ($payer==''){
   $query5= "INSERT INTO auto_transact VALUES('','$short','$q2','$price','1','$price','$name','$date','$adm_no','','$ref_no','')";
}else{
   $query5= "INSERT INTO auto_transact_inv VALUES('','$short','$q2','$price','1','$price','$name','$date','$adm_no','','$ref_no','')";
   $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) 
VALUES ('$adm_no','$name','$date','$ref_no','$q2','DB','$price','OPD','DB','$username','$date','1','$glacc')"; 

}
$result5 =mysql_query($query5);
$result9 =mysql_query($query9);


}



?>
<!--/body>
</html-->