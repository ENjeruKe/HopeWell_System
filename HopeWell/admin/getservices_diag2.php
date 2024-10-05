<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
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


<!--form action ="auto_search.html" method ="GET"-->

<?php
$adm_no =$_SESSION['adm_no'];
$name   =$_SESSION['name'];
$ref_no =$_SESSION['ref_no'];
$payer  =$_SESSION['payer'];

$q = intval($_POST['q']); 
$q2 = $_GET['q'];

echo $q2;
$date = date('y-m-d');
$query5= "UPDATE medicalfile SET diag2 = '$q2' WHERE ref_no ='$ref_no'";
$result5 =mysql_query($query5);  



?>
<!--/body>
</html-->