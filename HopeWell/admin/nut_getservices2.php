<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$today = $_SESSION['sys_date'];
$date = $_SESSION['sys_date'];
?>

<!--!DOCTYPE html>
<html>
<head>
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



<script>
function show1() {
   alert('good');
    var cho = document.getElementById('cho').value;   
    alert(cho); 

    var txt = document.getElementById('amount').value;

    alert(txt); 

    //var option = no.options[no.selectedIndex].text;

    txt2 = txt * no;
    document.getElementById("result2").value = txt2;
}
</script>


<body>



<script>
function show1() {
   alert('good');
    var cho = document.getElementById('cho').value;   
    alert(cho); 

    var txt = document.getElementById('amount').value;

    alert(txt); 

    //var option = no.options[no.selectedIndex].text;

    txt2 = txt * no;
    document.getElementById("result2").value = txt2;
}
</script>




<form action ="nut_getservices2.php" method ="GET">

<?php
$adm_no =$_SESSION['adm_no'];
$name   =$_SESSION['name'];
$ref_no =$_SESSION['ref_no'];
$payer  =$_SESSION['payer'];
//$date   =$_SESSION['old_date'];

$q = intval($_POST['q']); 
$q2 = $_GET['q'];

///echo $q2;
//$date = $_SESSION['sys_date'];
$sql="SELECT * FROM stockfile WHERE description = '".$q2."' ";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   $price         = $row['sell_price'];
   $short         = 'DRUGS';
   $short         = 'DRUGS';
   $qty           = $row['qty'];
   $unit          = $row['units'];
   $item          = $row['description'];
   $_SESSION['drug']= $item;
if (isset($_GET['add_cancels'])){ 


if ($payer==''){
$query5= "INSERT INTO auto_transact VALUES('','$short','$q2','$price','1','$price','$name','$date','$adm_no','','$ref_no','')";
}else{

$query5= "INSERT INTO auto_transact_inv VALUES('','$short','$q2','$price','1','$price','$name','$date','$adm_no','','$ref_no','')";
}
$result5 =mysql_query($query5);
}

}



if ($qty <0){
   echo "<font color='red'>Out of Stock......</font>";
   die();
}
//echo"<table><td><input name='qty' type='text' size ='1'></td><td><input name='units' type='text' size ='1' value ='$unit'></td><td><input name='freq' type='text' size ='1'></td><td><input name='days' type='text' size ='1'></td><td>Qty:<input name='total' type='text' size ='1' required></td><td><input type='submit' name='add_cancels'  class='button' value='Add'></table>";


echo"<!--table width='100%' border width='3'><td><font color ='red'><b>CHO:</b></font><input id= 'cho' name='cho' type='text' size ='2' onchange='show12()'></td><td with='5'></td><td>PRO:<input id= 'pro' name='pro' type='text' size ='2' onchange='show22()'></td><td width='5'><td>FAT:<input id= 'fat' name='fat' type='text' size ='2' onchange='show32()'></td><td width='5'></td><td>KCals:<input id= 'kal' name='kal' type='text' size ='2' readonly></td><td><input type='submit' name='add_cancels'  class='button' value='Add'></table-->";
?>
