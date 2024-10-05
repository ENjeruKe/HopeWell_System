<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$payer = $_SESSION['payer'];
$today = $_SESSION['sys_date'];
$old_date = $_SESSION['old_date'];
?>


<?php

if (isset($_GET['account3'])){ 
   $id    = $_GET['account3'];
   if ($payer==''){
   $sql="SELECT * FROM  auto_transact_lab WHERE id 
='$id'";
}else{
   $sql="SELECT * FROM  auto_transact_lab WHERE id 
='$id'";
}
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) {
    $item_name =  $row['description'];
    $ref_nno  =   $row['invoice_no'];
}



   if ($payer==''){
   $sql="DELETE FROM auto_transact_lab WHERE id ='$id'";
   }else{
   $sql="DELETE FROM auto_transact_lab WHERE id ='$id'";
   }
   $result = mysql_query($sql);

   //Go and delete from temp file
   //----------------------------
   $sql="DELETE FROM auto_transact_tmp WHERE invoice_no ='$ref_nno' and description ='$item_name'";
   $result = mysql_query($sql);

}

if (isset($_GET['add_cancels'])){
    
   $unit = $_GET['units'];
   $qty  = $_GET['qty'];
   $freq  = $_GET['freq'];
   $days = $_GET['days'];
   $total= $_GET['total'];
   $item = $_GET['dd_user_input2'];
   $date = $_SESSION['sys_date'];
   $adm_no = $_SESSION['adm_no'];
   $drug   = $_SESSION['drug'];
   $ref_no = $_SESSION['ref_no'];
   //echo $total;
   
   //$date = $_SESSION['old_date'];
   //if ($date=='0000-00-00'){
   //   $date = $sys_date;
   //}
   $info = $qty.'-'.$unit.'x'.$freq.'x'.$days;
   //$cost = $total*
//$query5= "INSERT INTO auto_transact_tmp VALUES('','DRUGS','$drug','1','1','','$info','$date','$adm_no','','$ref_no','')";
$result5 =mysql_query($query5);
//Now go and update the qty in file
//---------------------------------

if ($payer==''){
$sql="UPDATE auto_transact_lab set qty ='$total' WHERE description ='$drug' and date ='$date' and line_no = '$adm_no' and balance ='0'";
}else{
$sql="UPDATE auto_transact_lab set qty ='$total' WHERE description ='$drug' and date ='$date' and line_no = '$adm_no'and balance ='0'";
}
$result = mysql_query($sql);

//Now go and update the total price
//---------------------------------
if ($payer==''){
   $sql2="SELECT * FROM  auto_transact_lab WHERE date ='$date' and line_no = '$adm_no' and location ='ITEM'";
}else{
   $sql2="SELECT * FROM  auto_transact_lab WHERE date ='$date' and line_no = '$adm_no' and location ='ITEM'";
}
$result = mysql_query($sql2);
//$result3 =mysql_query($query3);

while($row = mysql_fetch_array($result)) {
    $qty =  $row['qty'];
    $price =$row['credit_rate'];
    $all_price = $qty*$price;
    $ids = $row['id'];
 
//Disabled this because it was causing big amounts in totals
//---------------------------------------------------------- 
if ($payer==''){
//$sql="UPDATE auto_transact set sell_price ='$all_price' WHERE id ='$ids'";
}else{
//$sql="UPDATE auto_transact_inv set sell_price ='$all_price' WHERE id ='$ids'";
}
//$result = mysql_query($sql);
//End of disabling is here
//------------------------

//$i3++;
}


}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--title>Autocomplete search in PHP, Mysql, Json, Autosuggestion search in PHP, Jquery UI</title-->
<!--meta name="description" content="This is a programming code for auto complete search in PHP, Mysql, Json or Facebook like Autosuggestion. This is a auto Complete Search tutorial developed in php, mysql and jQuery UI. Here I use Json to get response from database. After getting search data user can navigate to respective URL by href link in json."/-->
<!--meta name="keywords" content="Auto complete search, jQuery UI Autocomplete Search, PHP Autocomplete, Auto complete, Facebook Like auto complete, Facebook like Auto suggestion, Autosuggestion, Search, Search in PHP, autocomplete search, autocomplete search in Json, json, php, mysql, online demo, download code, rss, codeing, code, php programming, programming, php demo, jquery demo, discussdesk programming blog, discussdesk, jquery tutorial, technology"/-->

<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->

<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
<script src="jquery.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.8.2.custom.min.js"></script> 
<link href="css.css" rel="stylesheet" type="text/css" />

<script type="text/javascript"> 
$(function() {

$("#dd_user_input2").autocomplete({
source: "global_lab.php?cityId=28",
minLength: 2,
select: function(event, ui) {
var getUrl = ui.item.id;
if(getUrl != '#') {
location.href = getUrl;
}
},

html: true, 

open: function(event, ui) {
$(".ui-autocomplete").css("z-index", 1000);
}
});

});
</script>




<script>
function showUser(str) { 
    if (str == "") {
      document.getElementById("txtHint2").innerHTML = "";
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
      document.getElementById("txtHint2").innerHTML = xmlhttp.responseText;
            }
        };

    //var no = document.getElementById('dd_user_input').value;   

        xmlhttp.open("GET","getlabservices2.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>



<style>
.cnt_left {
    border: 1px solid #EEEEEE;
    padding-right: 20px;
    width: 660px;
	height:250px;
}
.cnt_right {
    width: 316px;
	border: 1px solid #EEEEEE;
	height: 250px;
}
.floatL {
	float:left;
}
.floatR {
	float:right;
}
.container{width:1000px;margin:auto;}
.home_link{padding:10px;}
.home_link a {
    color: #0D92E1;
    font: bold 23px arial;
    text-decoration:underline;
}
.main_subs{ border:1px solid #0D92E1;  background:#F3F3F3; height:180px;}
.main_subs p{padding:5px 0 0 5px; color:#0D92E1; font: bold 18px arial,tahoma;}
.subs_email{font: normal 12px arial,tahoma; padding: 26px 0 0 35px;}
.in_subs{padding:5px 0 0 5px; color:#0D92E1; font: bold 18px arial,tahoma;}
.in_subs input{padding:5px 0 0 5px; color:#ccc; font: normal 15px arial,tahoma;}
</style>
</head>
<body>


<table>
<form onsubmit="return false;">
<td><input id="dd_user_input2" type="text" size ='35' class="search_form3" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';" value="Type your drugs Here" onchange="showUser(this.value)"
/></td>
</form>
<td>
<div id='txtHint2'><b>Qty used...</b></div></td></table>


</div>
<!--div class="cnt_right floatR">
<div class="main_subs">
<p>Subscribe for our Latest articles</p>

<form onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=discussdesk', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" target="popupwindow" method="post" action="http://feedburner.google.com/fb/a/mailverify">
<div class="in_subs"><input type="text" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';" value="Enter your email address:" name="email" style="width:258px; height:30px; float:left; border: 2px double #DDDDDD;"></div>
<input type="hidden" name="uri" value="discussdesk">
<input type="hidden" value="en_US" name="loc">
<input type="submit" value="Subscribe" style="font: 17px arial,tahoma;height: 39px;margin: 10px 9px 4px;width: 142px;" class="gsc-search-button"></form>
</div>
</div-->

</div>
</div>






<?php
$date = $_SESSION['sys_date'];
//echo 'Adm No'. $adm_no;
$adm_no =$_SESSION['adm_no'];
$ref_no =$_SESSION['ref_no'];
$payer =$_SESSION['payer'];

echo"<input type='submit' name='save_cancel'  class='button' value='Refresh Form'>";
if ($payer==''){
$sql="SELECT * FROM  auto_transact_lab WHERE invoice_no ='$ref_no' and location ='ITEM'";
}else{
$sql="SELECT * FROM  auto_transact_lab WHERE invoice_no ='$ref_no' and location ='ITEM'";
}
$result = mysql_query($sql);
$found ='No';
echo "<table width ='100%'>
<tr>
<!--th width ='10' bgcolor ='black'><font color ='white'>ID</th-->
<th width ='100' bgcolor ='black' align ='left'><font color ='white'>Item Description</th>
<th width ='10' bgcolor ='black'><font color ='white'>Qty</th>
<!--th width ='10' bgcolor ='black'><font color ='white'>Paid</th-->
<th width ='5' bgcolor ='black'><font color ='white'>Action</th>

</tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    //echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td align ='right'>".  $row['qty']. "</td>";
    $price =  $row['credit_rate'];
    $paid  =  $row['balance'];

    $line=  $row['id'];
    $id = $line.'name';
    //echo "<td align ='right'>".  $row['balance']. "</td>";
    if ($paid >0){
        echo "<td>" ."Paid". "</td>";
    }else{
       echo "<td>" ."<a href='lab_reduce.php?accountss=$line&accounts33=$price&account3=$id')>"."Delete"."</a>" . "</td>";
    }
    echo "</tr>";
}
echo "</table>";




























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




</body>
</html>
