<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$payer = $_SESSION['payer'];
//$today = $_SESSION['sys_date'];
//$old_date = $_SESSION['old_date'];
?>


<?php

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
    $id3  =   $row['id'];
}



   if ($payer==''){
   $sql2="DELETE FROM auto_transact WHERE id ='$id'";
   $result2 = mysql_query($sql2);
   }else{
   $sql4="DELETE FROM auto_transact_inv WHERE id ='$id'";
   $result4 = mysql_query($sql4);
   }

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
   //$date = $_SESSION['old_date'];
   //if ($date=='0000-00-00'){
   //   $date = $sys_date;
   //}
   $info = $qty.'-'.$unit.'x'.$freq.'x'.$days;
   $cost = $total*
$query5= "INSERT INTO auto_transact_tmp VALUES('','DRUGS','$drug','1','1','','$info','$date','$adm_no','','$ref_no','')";
$result5 =mysql_query($query5);
//Now go and update the qty in file
//---------------------------------

if ($payer==''){
$sql="UPDATE auto_transact set qty ='$total' WHERE description ='$drug' and date ='$date' and line_no = '$adm_no'";
}else{
$sql="UPDATE auto_transact_inv set qty ='$total' WHERE description ='$drug' and date ='$date' and line_no = '$adm_no'";
}
$result = mysql_query($sql);

//Now go and update the total price
//---------------------------------
if ($payer==''){
   $sql2="SELECT * FROM  auto_transact WHERE date ='$date' and line_no = '$adm_no' and location ='SURG'";
}else{
   $sql2="SELECT * FROM  auto_transact_inv WHERE date ='$date' and line_no = '$adm_no' and location ='SURG'";
}
$result = mysql_query($sql2);
//$result3 =mysql_query($query3);

while($row = mysql_fetch_array($result)) {
    $qty =  $row['qty'];
    $price =$row['credit_rate'];
    $all_price = $qty*$price;
    $ids = $row['id'];



   //$num3 =mysql_numrows($result3) or die(mysql_error());
   //$i3=0;
   //while ($i3 < $num3)
   //  {     
   //      $qty     = mysql_result($result3,$i3,"qty");
   //      $price   = mysql_result($result3,$i3,"credit_rate");
   //      $all_price = $qty*$price;
   //      $ids     = mysql_result($result3,$i3,"id");
 
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
source: "surgicals_global_search2.php?cityId=28",
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

        xmlhttp.open("GET","surgicals_getservices2.php?q="+str,true);
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

<!--166/011 doctors of 09
517/17 david lagat drug screen-->
<?php
$founds  =$_SESSION['founds'];

if ($founds=='Yes'){
    echo"<font color ='red'>******No Editing of Surgicals to an old Invoice*****</font>";
}else{
    ?>
<table>
<form onsubmit="return false;">
<td><input id="dd_user_input2" type="text" size ='25' class="search_form3" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';" value="Type your drugs Here" onchange="showUser(this.value)"
/></td>
</form>
<?php
}
?>
<div id='txtHint2'><b>Qty...</b></div></td></table>


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
//$date = $_SESSION['sys_date'];
//echo 'Adm No'. $adm_no;
//$adm_no =$_SESSION['adm_no'];
//$ref_no =$_SESSION['ref_no'];
//$payer =$_SESSION['payer'];

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
       echo"<form action ='surgical_auto_serch2.php' method ='GET'>";
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
      
      // die();
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
   }
}
echo"<input type='submit' name='save_cancel'  class='button' value='Refresh Form'>";
if ($payer==''){
$sql="SELECT * FROM  auto_transact WHERE invoice_no ='$ref_no' and location ='SURG'";
}else{
$sql="SELECT * FROM  auto_transact_inv WHERE invoice_no ='$ref_no' and location ='SURG'";
}
$result = mysql_query($sql);
$found ='No';
echo "<table width ='100%'>
<tr>
<!--th width ='10' bgcolor ='black'><font color ='white'>ID</th-->
<th width ='60%' bgcolor ='black' align ='left'><font color ='white'>Item Description</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Amount</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Qty</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Total</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Action</th>

</tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    //echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td width ='10%' align ='right'>".  $row['sell_price']. "</td>";
    echo "<td width ='10%' align ='right'>".  $row['qty']. "</td>";
    echo "<td width ='10%' align ='right'>".  $row['credit_rate']. "</td>";
    $price =  $row['credit_rate'];
    $paid  =  $row['balance'];

    $line=  $row['id'];
    $id = $line.'name';


    $invoice=  $row['invoice_no'];
    $line=  $row['id'];
    $id = $line.'name';
    $ss = $row['description'];
    $vv = $row['gl_account'];
 
    //echo "<td align ='right'>".  $row['balance']. "</td>";
    if ($paid >0){
        echo "<td width ='10%'>" ."Paid". "</td>";
    }else{
       echo "<td width ='10%'>" ."<a href='surgicals_auto_serch2.php?accountss=$line&accounts33=$price&account3=$id&account4=$ss&account5=$vv')>"."Delete"."</a>" . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>




</body>
</html>
