<?php
 session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>
<html>
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/bills-pop-up.js"></script>

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">




<form action ="" method ="GET">


<?php
$date = date('y-m-d');
$adm_no =$_SESSION['adm_no'];
$ref_no =$_SESSION['ref_no'];
$payer  =$_SESSION['payer'];
$sex  =$_SESSION['sex'];
$age  =$_SESSION['age'];

if (isset($_GET['account3'])){ 
   $id    = $_GET['account3'];
   $sql="DELETE FROM auto_diagnosis WHERE id ='$id'";
   $result = mysql_query($sql);
}

echo"<input type='submit' name='save_cancel'  class='button' value='Refresh Form'>";
$sql="SELECT * FROM  auto_diagnosis WHERE invoice_no ='$ref_no'";
$result = mysql_query($sql);
$found ='No';
echo "<table width ='100%'>
<tr>
<!--th width ='10' bgcolor ='black'><font color ='white'>ID</th-->
<th width ='90%' bgcolor ='black' align ='left'><font color ='white'>Item Description</th>
<!--th width ='30%' bgcolor ='black'><font color ='white'>Amount</th-->
<!--th width ='10' bgcolor ='black'><font color ='white'>Paid</th-->
<th width ='10%' bgcolor ='black'><font color ='white'>Action</th>
</tr>";
$count = 0;
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    //echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    //echo "<td align ='right'>".  $row['credit_rate']. "</td>";
    $price =  $row['credit_rate'];
    $paid  =  $row['balance'];

    $invoice=  $row['invoice_no'];
    $line=  $row['id'];
    $id = $line.'name';
    //echo "<td align ='right'>".  $row['balance']. "</td>";
    if ($paid >0){
        if ($count==1){
            $ext ='a';
        }      
        if ($count==2){
            $ext ='b';
        }      
        if ($count==3){
            $ext ='c';
        }      
        if ($count==4){
            $ext ='d';
        }      
        if ($count==5){
            $ext ='e';
        }      
        $invoice = $invoice.$ext;
        $count++; 
        //echo "<td align ='right'>"."<a //href=javascript:popcontact('view_scans.php?accounts3=
//$invoice&ref_no=$invoice')>View results</a>"
//."</td>";
echo "<td align ='center'>".  'Paid'. "</td>";
    }else{
       echo "<td align ='center'>" ."<a href='charged_diagnosis.php?accountss=$line&accounts33=$price&account3=$id')>"."Delete"."</a>" . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
</html>