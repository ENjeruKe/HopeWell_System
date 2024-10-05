<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  require('open_database.php');
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

<B>NUTRITION PRESCRIPTION<br>
<?php
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
        
        xmlhttp.open("GET","charge_nutrients.php?q="+str,true);
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




<OBJECT data='nut_auto_search2.php' type='text/html' style='margin: 0; width: 100%; height: 320px; padding 0px; text-align:left;'></OBJECT>


<!--OBJECT data='charged_drugs.php' type='text/html' style='margin: 0; width: 350px; height: 200px; padding 0px; text-align:left;'></OBJECT-->

<br><a href ='auto_display.php'><img src='images/backward22.jpg'></a>