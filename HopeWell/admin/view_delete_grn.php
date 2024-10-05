<?php
   session_start();
require('open_database.php');
$branch = $_SESSION['company'];

?>

<html>
<script>
function function3() {
    //alert ('here....');
    var no = document.getElementById('qty').value;   
    //var txt = document.getElementById('amount_three').value;
    var txtz = document.getElementById('cost').value;
    
    //txt2 = txt * no;
    txt2 = txtz/no;
    
    //document.getElementById("result_three").value = txt2;
    document.getElementById("one_cost").value = txt2;
}
</script>


<?php
 $go_on='Yes';
// if ($go_on=='Yes'){    
//if (! isset($_GET['print'])){
    echo"<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title><div class='navbar navbar-inverse navbar-fixed-top'>";      
    echo"<div class='navbar-inner'>";                  
    echo"<a class='btn btn-navbar' data-toggle='collapse' data-target='.nav-collapse'><span class='icon-bar'></span><span class='icon-bar'></span><span class='icon-bar'></span></a>";
    echo"<a class='brand' href='#'>Medi+ V10 (HMIS Global)</a><div class='nav-collapse collapse'><p class='navbar-text pull-right'><a target='_blank' href='http://www.hmisglobal.com' class='navbar-link'>www.hmisglobal.com</a></p>";

          echo"</div></div></div></div>";
    echo"<link rel=StyleSheet href='popups/header.css' type='text/css' media='screen'>";
    echo"<link href='bootstrap/css/bootstrap.min.css' rel='stylesheet'>";
    
    
    
    
if (isset($_GET['save'])){
   //Get into printing if selected
   //-----------------------------
   $cost = $_GET['cost'];
   $qty = $_GET['qty'];
   $costx = $_GET['one_cost'];
   $id = $_GET['id'];
   
  //Delete entries from temp file
   //-----------------------------
   $query3 = "DELETE FROM st_trans WHERE id='$id'";
   $result3 =mysql_query($query3) or die(mysql_error());
   
      echo"<h1>Data deleted successfully...</h1>";
      die();

}

$id   = $_GET['invoice']; 
$cost = $_GET['total']; 
$qty= $_GET['count']; 
$invoicex= $_GET['invoice'];    
$pricex= $_GET['price'];      
    
    
    

//}

echo"<form action ='view_delete_grn.php' method ='GET'>";



echo"<table>";
echo"<tr><td>Ref No:</td><td><input type='text' name='id' value='$id' readonly></td></tr>";
echo"<tr><td>Cost:</td><td><input type='text' id='cost' name='cost' value='$cost' readonly></td></tr>";
echo"<tr><td>QTY:</td><td><input type='text' id='qty' name='qty' value='$qty' onchange='function3()' readonly></td></tr>";
echo"<tr><td>Each @ Cost:</td><td><input type='text' id='one_cost' name='one_cost' value='$pricex' readonly></td></tr>";

echo"<tr><td></td><td><input type='submit' name='save'  class='button' value='Delete'></td></tr></table>";

echo"</FORM>";









?>
    
