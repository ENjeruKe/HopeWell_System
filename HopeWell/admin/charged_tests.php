<?php
 session_start();
require('open_database.php');
$location = $_SESSION['company'];
$username =$_SESSION['username'];
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
$tod_q =date("Y-m-d H:i:s", strtotime("now"));
$adm_no =$_SESSION['adm_no'];
$ref_no =$_SESSION['ref_no'];
$payer  =$_SESSION['payer'];
$edit  =$_SESSION['edit'];
$delete_reason=$_SESSION['delete_reason'];
//echo"Delete?".$delete_reason;
if (isset($_GET['account3'])){ 
   $id    = $_GET['account3'];
   $service    = $_GET['account4'];
   $reason = $_GET['delete_reason'];
   $patient_q = $_GET['account5'];
   if ($delete_reason=='No'){
       echo"<form action ='charged_tests.php' method ='GET'>";
   echo"Why Delete this Entry:<input type='text' name='delete_reason' size='50' required>";
   echo"<input type='submit' name='account3'  class='button' value='Delete'>";
   $_SESSION['delete_reason']='Yes';
   $_SESSION['id_q'] =$id;
   $_SESSION['service_q'] =$service;
   $_SESSION['patient_q'] =$patient_q;
   }else{
   $_SESSION['delete_reason']='No';
   $id =$_SESSION['id_q'];
   $service =$_SESSION['service_q'];
   $patient_q =$_SESSION['patient_q'];
   if ($reason==''){
       echo"Kindly give a reason before you can complete this task.Close and try again.";
       die();
   }
   if ($payer==''){
   $sql="DELETE FROM auto_transact WHERE id ='$id'";
   }else{
   $sql="DELETE FROM auto_transact_inv WHERE id ='$id'";
   }
   $result = mysql_query($sql);
   //Now ho and save deleted entries
   //-------------------------------
   $query5= "INSERT INTO deleted_items VALUES('','$tod_q','$service','$username','$reason','$patient_q')";
   $result5 = mysql_query($query5);
   

   $sql2="DELETE FROM ranges WHERE gl_account ='$patient_q' and description ='$service' and invoice_no ='$ref_no' and date ='$date'";
   $result2 = mysql_query($sql2);

}
}

echo"<input type='submit' name='save_cancel'  class='button' value='Refresh Form'>";
if ($payer==''){
$sql="SELECT * FROM  auto_transact WHERE invoice_no ='$ref_no' and location <>'DRUGS' and location<>''";
}else{
$sql="SELECT * FROM  auto_transact_inv WHERE invoice_no ='$ref_no' and location <>'DRUGS' and location <>''";
}
$result = mysql_query($sql);
$found ='No';
echo "<table width ='100%'>
<tr>
<!--th width ='10' bgcolor ='black'><font color ='white'>ID</th-->
<th width ='60%' bgcolor ='black' align ='left'><font color ='white'>Item Description</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Amount</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Qty</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Total</th-->
<th width ='10%' bgcolor ='black'><font color ='white'>Action</th>
</tr>";
$count = 0;
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    //echo "<td>" . $row['id'] . "</td>";
    echo "<td width ='60%'>" . $row['description'] . "</td>";
    echo "<td width ='10%' align ='right'>".  $row['sell_price']. "</td>";
    echo "<td width ='10%' align ='right'>".  $row['qty']. "</td>";
    echo "<td width ='10%' align ='right'>".  $row['credit_rate']. "</td>";
    $price =  $row['credit_rate'];
    $paid  =  $row['balance'];

    $invoice=  $row['invoice_no'];
    $line=  $row['id'];
    $id = $line.'name';
    $ss = $row['description'];
    $vv = $row['gl_account'];
    
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
echo "<td width ='10%' align ='center'>".  'Paid'. "</td>";
    }else{
        
if ($edit=='' or $edit=='no'){
    echo"<font color ='red'>You have no right to Edit. Kindly contact your Admin.......</font>";
    die();
}else{      
        
       echo "<td align ='center'>" ."<a href='charged_tests.php?accountss=$line&accounts33=$price&account3=$id&account4=$ss&account5=$vv')>"."Delete"."</a>" . "</td>";
}    
 
    }
    echo "</tr>";
}
echo "</table>";
?>
</html>