<?php
// configuration
include('../connect.php');
require('open_database.php');
// new data
$id = $_POST['memi'];
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];
$a4 = $_POST['a4'];
$a5 = $_POST['a5'];
$a6 = $_POST['a6'];
$a7 = $_POST['a7'];
$a8 = $_POST['a8'];
$a9 = $_POST['a9'];
$a10 = $_POST['a10'];
$a11 = $_POST['a11'];
$a12 = $_POST['a12'];
$a13 = $_POST['a13'];
$a14 = $_POST['a14'];
$a15 = $_POST['a15'];
$a16 = $_POST['a16'];
$a17 = $_POST['a17'];
$a18 = $_POST['a18'];
$a19 = $_POST['a19'];
$a20 = $_POST['a20'];
$a21 = $_POST['a21'];
$a22 = $_POST['a22'];
$a23 = $_POST['a23'];
$a24 = $_POST['a24'];
$a25 = $_POST['a25'];
$a26 = $_POST['a26'];
$a27 = $_POST['a27'];
$a28 = $_POST['a28'];
$a29 = $_POST['a29'];
$a30 = $_POST['a30'];
$a31 = $_POST['a31'];
$a32 = $_POST['a32'];
$a33 = $_POST['a33'];
$a34 = $_POST['a34'];
$a35 = $_POST['a35'];
$a36 = $_POST['a36'];
$a37 = $_POST['a37'];
$a38 = $_POST['a38'];
$a39 = $_POST['a39'];
$a40 = $_POST['a40'];
$a41 = $_POST['a41'];
$a42 = $_POST['a42'];
$a43 = $_POST['a43'];
$a44 = $_POST['a44'];
$a45 = $_POST['a45'];


$query = "UPDATE systemfile2 SET username='$a1', password='$a2', account='$a3', access_all='$a4', rec='$a5', cas='$a6', vit='$a7', med='$a8', inve='$a9', pha='$a10', repo='$a11', acc='$a12', stk='$a13', sets='$a14', doc='$a15', anc='$a16', nut='$a17', wbc='$a18', dent='$a19', adms='$a20', rad='$a22', lab='$a21', theat='$a23', stmt='$a24', paym='$a25', invo='$a26', gl='$a27', blnc='$a28', in_p='$a29', reg_stk='$a30', repo_stk='$a31', trans_stk='$a32', co_stk='$a33', rec_stk='$a34', pds_stk='$a35', users='$a36', charts='$a37', receiv='$a38', payables='$a39', doc_reg='$a40', rev_reg='$a41', diag_reg='$a42', signs_reg='$a43', edit='$a44', name='$a45' WHERE id='$id'";
$result =mysql_query($query) or die(mysql_error());

header("location: user_permissions1.php");

?>

