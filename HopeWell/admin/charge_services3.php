<?php
session_start();
 require('open_database.php');

?>


<script>
function function3() {
    var no = document.getElementById('no_three').value;   
    var txt = document.getElementById('amount_three').value;
    txt2 = txt * no;
    document.getElementById("result_three").value = txt2;
}
</script>



<?php
//$q = intval($_GET['q']); 
$q2 = $_GET['q'];

$q = intval($_POST['q']); 
$q2 = $_GET['q'];
$mm = substr($q2,0,20);



$adm_no =$_SESSION['adm_no'];
$name   =$_SESSION['name'];
$ref_no =$_SESSION['ref_no'];
$payer  =$_SESSION['payer'];

$staff =substr($adm_no,0,5);

//$query3 = "SELECT * FROM revenuef where name like '$mm%'" or die(mysql_error());
if($payer ==''){
$query3 = "SELECT * FROM revenuef where name = '$q2'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $tot =0;
   $i3 = 0;
   while ($i3 < $num3)
      {
      $item     = mysql_result($result3,$i3,"name");  
      $price    =mysql_result($result3,$i3,"cash_rate");  
      $short    =mysql_result($result3,$i3,"gl_account");  
      $glacc    =mysql_result($result3,$i3,"gl_account");  
      $short    =substr($short,0,3);
      $item_price = mysql_result($result3,$i3,"cash_rate");  
      //Search this item in htransf
      //---------------------------
      $i3++;
      }

$_SESSION['item'] = $item;
$_SESSION['price'] = $price;
$_SESSION['short'] = $short;
$_SESSION['glaccount'] = $glacc;

}else{

$query3 = "SELECT * FROM revenuef where name = '$q2'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $tot =0;
   $i3 = 0;
   while ($i3 < $num3)
      {
      $item     = mysql_result($result3,$i3,"name");  
      $price    =mysql_result($result3,$i3,"credit_rate");  
      $short    =mysql_result($result3,$i3,"gl_account");  
      $glacc    =mysql_result($result3,$i3,"gl_account");  
      $short    =substr($short,0,3);
      $item_price = mysql_result($result3,$i3,"credit_rate");  
      //Search this item in htransf
      //---------------------------
      $i3++;
      }

$_SESSION['item'] = $item;
$_SESSION['price'] = $price;
$_SESSION['short'] = $short;
$_SESSION['glaccount'] = $glacc;
    
}



$_SESSION['account_type'] = $account_type;
echo"<form action ='proce_21.php' method ='GET'>";
 echo"<table border = '0'><tr><td width ='400'><input type='text' id ='s_desc_three' name='s_desc_three' size ='35' value ='$q2' readonly></td></tr>";
if ($staff=='STAFF'){
    echo"<tr><td><input type='text' id ='result_three' name='result_three' size='10' value = '$item_price'></td></tr>";
}else{   
   echo"<tr><td><input type='text' id ='result_three' name='result_three' size='10' value = '$item_price' readonly></td></tr>";
}   
 echo"<tr><td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td></tr></table></form>";

 

//echo "</table>";
//mysqli_close($con);
?>
