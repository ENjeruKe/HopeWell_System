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

<B>FINAL DIAGNOSIS<br>
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
        
        xmlhttp.open("GET","charge_diagnosis.php?q="+str,true);
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

$sex  =$_SESSION['sex'];
$age  =$_SESSION['age'];

$item_d =$_SESSION['disease'];
$price =0;
$short ='';
$glacc ='';
 

   $query5= "INSERT INTO auto_diagnosis VALUES('','$short','$item_d','$sex','1','$age','$name','$date','$adm_no','','$ref_no','')";
$result5 =mysql_query($query5);

 
}




  echo"<table width ='100%'><td width ='50%' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)' required>";
         $cdquery="SELECT Name FROM diseasefile";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM diseasefile";
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




<OBJECT data='charged_diagnosis.php' type='text/html' style='margin: 0; width: 100%; height: 200px; padding 0px; text-align:left;'></OBJECT>


<!--br><a href ='auto_display.php'><img src='images/backward22.jpg'></a-->