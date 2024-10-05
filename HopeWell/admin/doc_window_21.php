<?php
session_start();
?>
<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  require('open_database.php');
  $today = date('Y-m-d');
  $year = date('Y');
  
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
  $store_select = 'PHARMACY';
  $payer  =$_SESSION['payer'];
  echo "Payer".$payer;
?>

<B>MEDICATION<br>






<?php

$ref_nos =$_SESSION['ref_no'];
$adm_no =$_SESSION['id'];
$edit =$_SESSION['edit']; 
//if ($edit=='' or $edit=='no'){
//    echo"<font color ='red'>You have no right to Edit. Kindly contact your Admin.......</font>";
//    die();
//} 

if (isset($_GET['account3'])){ 
   $id    = $_GET['account3'];
   if ($payer==''){
   $sql="SELECT * FROM  auto_transact WHERE id 
='$id'";
}else{
   $sql="SELECT * FROM  auto_transact_inv WHERE id 
='$id'";
}
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
    $item_name =  $row['description'];
    $ref_nno  =   $row['invoice_no'];
}



   if ($payer==''){
   $sql="DELETE FROM auto_transact WHERE id ='$id'";
   }else{
   $sql="DELETE FROM auto_transact_inv WHERE id ='$id'";
   }
   $result = mysql_query($sql);

   //Go and delete from temp file
   //----------------------------
   $sql="DELETE FROM auto_transact_tmp WHERE invoice_no ='$ref_nno' and description ='$item_name'";
   $result = mysql_query($sql);

}







if (isset($_GET['add_cancels'])){
   $payer = $_SESSION['payer'];
   $unit = $_GET['units'];
   $qty  = $_GET['qty'];
   $freq  = $_GET['freq'];
   $freq2  = $_GET['freq2'];
   $freq = $freq.':'.$freq2;
   $days = $_GET['days'];
   $total= $_GET['total'];
   $item = $_GET['dd_user_input2'];
   $date = $_SESSION['sys_date'];
   $adm_no = $_SESSION['adm_no'];
   $drug   = $_SESSION['drug'];
   $ref_no = $_SESSION['ref_no'];
   $price  = $_SESSION['price'];
   $name   = $_SESSION['name'];
   $dosage   = $_GET['dosage'];
   
   
   
   //Check if available stocks
   //-------------------------
   $sql="SELECT * FROM stockfile WHERE description = '$drug' and location ='$store_select' "; 
   $result = mysqli_query($con,$sql);
   while($row = mysqli_fetch_array($result)) {
      $instore = $row['qty'];
   }      


   $staff =substr($adm_no,0,5);

   if ($staff=='STAFF'){
       $price    = $_GET['three_price'];
   }
   $tt_price = $total*$price;
   if ($total <= $instore){
      //Go ahead only if stock balance if more than prescribed
      //------------------------------------------------------
      if ($payer==''){
         $query5= "INSERT INTO auto_transact VALUES('','DRUGS','$drug','$price','$total','$tt_price','$name','$date','$adm_no','pay','$ref_no','')";
      }else{
      $query5= "INSERT INTO auto_transact_inv VALUES('','DRUGS','$drug','$price','$total','$tt_price','$name','$date','$adm_no','pay','$ref_no','')";
     }
     $result5 =mysql_query($query5);
    
    
    
//Now go and update the qty in file
//---------------------------------

if ($payer==''){
$sql="UPDATE auto_transact credit_rate=auto_transact.sell_price*$qty WHERE description ='$drug' and date ='$date' and line_no = '$adm_no'";
}else{
$sql="UPDATE auto_transact_inv set credit_rate=auto_transact.sell_price*$qty WHERE description ='$drug' and date ='$date' and line_no = '$adm_no'";
}
$result = mysql_query($sql);

//Now go and update the total price
//---------------------------------
if ($payer==''){
   $sql2="SELECT * FROM  auto_transact WHERE date ='$date' and line_no = '$adm_no' and location ='DRUGS'";
}else{
   $sql2="SELECT * FROM  auto_transact_inv WHERE date ='$date' and line_no = '$adm_no' and location ='DRUGS'";
}
$result = mysql_query($sql2);
//$result3 =mysql_query($query3);

while($row = mysql_fetch_array($result)) {
    $qty =  $row['qty'];
    $price =$row['credit_rate'];
    $all_price = $qty*$price;
    $ids = $row['id'];
}

}else{
echo"<h2><font color ='red'>You have less stock in store........</h2></font>";
}

}
?>

















<?php


require('auto_search2.php');

//echo"<OBJECT data='auto_search2.php' type='text/html' style='margin: 0; width: 100%; height: 200px; padding 0px; text-align:left;'></OBJECT>";



//echo"<!--OBJECT data='charged_drugs.php' type='text/html' style='margin: 0; width: 100%px; height: 300px; padding 0px; text-align:left;'></OBJECT-->";

die();











echo'Refs:'.$ref_nos;
echo 'kk'.$_GET['accounts3y'];

if (isset($_GET['accounts3y'])){   
   //$ref_nos = $_GET['Pharmacy'];
   $query3= "UPDATE medicalfile SET status ='To Pharmacy' WHERE ref_no ='$ref_nos'";
   $result3 =mysql_query($query3);
}




//require('auto_search.html');
?>



<script>
function showUser(str) {   
     var no = document.getElementById('txtHint').value; 
    
     
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
        
        xmlhttp.open("GET","charge_services.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>


<?php

if (isset($_GET['add_next'])){ 
 
$adm_no =$_SESSION['adm_no'];
$name   =$_SESSION['name'];
$ref_no =$_SESSION['ref_no'];
$payer  =$_SESSION['payer'];
 
$item =$_SESSION['item'];
$price =$_SESSION['price'];
$short =$_SESSION['short'];
$glacc =$_SESSION['glaccount'];
 

   $staff =substr($adm_no,0,5);

   if ($staff=='STAFF'){
       $price =$_GET['result_three'];
   }
 
if ($payer==''){
   $query5= "INSERT INTO auto_transact VALUES('','$short','$item','$price','1','$price','$name','$date','$adm_no','','$ref_no','')";
}else{
   $query5= "INSERT INTO auto_transact_inv VALUES('','$short','$item','$price','1','$price','$name','$date','$adm_no','','$ref_no','')";
   $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) 
VALUES ('$adm_no','$name','$date','$ref_no','$item','DB','$price','OPD','DB','$username','$date','1','$glacc')"; 

}
$result5 =mysql_query($query5);
$result9 =mysql_query($query9);
 
 
}




 
         
 //echo"<table><tr><div id='txtHint'><b>.</b></div></tr></table>";        
         
?>




<!--OBJECT data='auto_search2.php' type='text/html' style='margin: 0; width: 100%; height: 320px; padding 0px; text-align:left;'></OBJECT-->


<!--OBJECT data='charged_drugs.php' type='text/html' style='margin: 0; width: 350px; height: 200px; padding 0px; text-align:left;'></OBJECT-->

<!--br><a href ='auto_display.php'><img src='images/backward22.jpg'></a-->

<?php
echo"<br><table>";
echo 'Ref:'.$ref_no;
echo"<td><a href='doc_window_21.php?Pharmacy=$ref_no&accounts3y=$adm_no'>To Pharmacy</a>|</td>";
echo"</table><br>";

?>



