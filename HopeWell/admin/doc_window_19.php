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

<B>INVESTIGATION<br>
<?php

$ref_nos =$_SESSION['ref_no'];
$adm_no =$_SESSION['id'];
$edit =$_SESSION['edit']; 
//if ($edit=='' or $edit=='no'){
//    echo"<font color ='red'>You have no right to Edit. Kindly contact your Admin.......</font>";
//    die();
//}    


if (isset($_GET['add_next'])){ 
 
$adm_no =$_SESSION['adm_no'];
$name   =$_SESSION['name'];
$ref_no =$_SESSION['ref_no'];
$payer  =$_SESSION['payer'];

$sex =$_SESSION['sex'];
$age  =$_SESSION['age'];

$qty = 0; 
$item =$_SESSION['item'];
$price =$_SESSION['price'];
$short =$_SESSION['short'];
$glacc =$_SESSION['glaccount'];
$qty   =$_GET['result_qty'];
$_SESSION['delete_reason']='No';

$staff =substr($adm_no,0,5);

if ($staff=='STAFF'){
    $price =$_GET['result_three'];
}
//echo"S...".$staff.$adm_no;

if ($qty==0){
    $qty = 1;
}

echo 'QTY'.$qty;
$final = $qty*$price;

if ($qty==0){
    $qty = 1;
}

//echo 'QTY'.$qty;
$final = $qty*$price;
 
if ($payer==''){
    $query5= "INSERT INTO auto_transact VALUES('','$short','$item','$price','$qty','$final','$name','$date','$adm_no','pay','$ref_nos','')";
  $query6= "INSERT INTO ranges VALUES ('','$short','$item','$price','$age','$final','$name','$date','$adm_no','','$ref_no','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')";

}else{
   $query5= "INSERT INTO auto_transact_inv VALUES('','$short','$item','$price','$qty','$final','$name','$date','$adm_no','pay','$ref_nos','')";
   
   $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) 
VALUES ('$adm_no','$name','$date','$ref_no','$item','DB','$price','OPD','DB','$username','$date','1','$glacc')"; 

$query7= "INSERT INTO ranges VALUES ('','$short','$item','$price','$age','$final','$name','$date','$adm_no','','$ref_no','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')";

}
$result5 =mysql_query($query5);
$result9 =mysql_query($query9);
$result6 =mysql_query($query6);
$result7 =mysql_query($query7);

}



















$founds  =$_SESSION['founds'];

if ($founds=='Yes'){
    echo"<font color ='red'>******No Editing an old Invoice*****</font>";
}else{

require('auto_search.html');
}


echo"<OBJECT data='charged_tests.php' type='text/html' style='margin: 0; width: 100%; height: 700px; padding 0px; text-align:left;'></OBJECT>";
die();















if (isset($_GET['accounts3y'])){   
   //$ref_nos = $_GET['Pharmacy'];
   $query3= "UPDATE medicalfile SET status ='To Laboratory' WHERE ref_no ='$ref_nos'";
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
$qty = 0; 
$item =$_SESSION['item'];
$price =$_SESSION['price'];
$short =$_SESSION['short'];
$glacc =$_SESSION['glaccount'];
$qty   =$_GET['result_qty'];
$staff =substr($adm_no,0,5);

if ($staff=='STAFF'){
    $price =$_GET['result_three'];
}
//echo"S...".$staff.$adm_no;

if ($qty==0){
    $qty = 1;
}

echo 'QTY'.$qty;
$final = $qty*$price;
 
if ($payer==''){
    $query5= "INSERT INTO auto_transact VALUES('','$short','$item','$price','$qty','$final','$name','$date','$adm_no','','$ref_no','')";
  $query6= "INSERT INTO ranges VALUES ('','$short','$item','$price','1','$price','$name','$date','$adm_no','','$ref_no','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')";

}else{
   $query5= "INSERT INTO auto_transact_inv VALUES('','$short','$item','$price','$qty','$final','$name','$date','$adm_no','','$ref_no','')";
   
   $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) 
VALUES ('$adm_no','$name','$date','$ref_no','$item','DB','$price','OPD','DB','$username','$date','1','$glacc')"; 

$query7= "INSERT INTO ranges VALUES ('','$short','$item','$price','1','$price','$name','$date','$adm_no','','$ref_no','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')";

}
$result5 =mysql_query($query5);
$result9 =mysql_query($query9);
$result6 =mysql_query($query6);
$result7 =mysql_query($query7);

}




  echo"<table width ='100%'><td width ='50%' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)'>";
         $cdquery="SELECT Name FROM revenuef where gl_account ='Laboratory Services'";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM revenuef";
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;
         while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["Name"];     
            echo "<option>$cdTitle</option>";            
         }
         echo"</select>";
         echo"</td><td>";
         echo"<div id='txtHint'><b>.</b></div></td></table>";
         
 //echo"<table><tr><div id='txtHint'><b>.</b></div></tr></table>";        
         
?>




<OBJECT data='charged_tests.php' type='text/html' style='margin: 0; width: 100%; height: 200px; padding 0px; text-align:left;'></OBJECT>


<?php
echo"<br><table>";
echo 'Ref:'.$ref_no;
echo"<td><a href='doc_window_19.php?Laboratory=$ref_no&accounts3y=$adm_no'>To Laboratory</a>|</td>";
echo"</table><br>";

?>
