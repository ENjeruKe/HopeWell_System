<?php
   session_start();
require('open_database.php');

?>

<?php
echo"<form action ='stocks_grn.php' method ='GET'>";

$q = intval($_GET['q']);
$q = $_GET['q'];
$con = mysqli_connect('localhost','root','0710958791','wama');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//$q;

mysqli_select_db($con,"wama");
$sql="SELECT * FROM st_trans_lpo WHERE ref_no = '".$q."'";
$result = mysqli_query($con,$sql);
$found ='No';
while($row = mysqli_fetch_array($result)) {
    $description = $row['description'];
    $qty = $row['qty'];
    $date =$row['date'];
    $price = $row['price'];
    $total = $row['total'];
    $ref_no = $row['ref_no'];
    $supplier = $row['adm_no'];
    $vat = $row['vat'];
    $disc = $row['disc'];
    $tot_vat = $row['tot_vat'];
    $tot_disc = $row['tot_disc'];
    $net_tot = $row['net_total'];
    $total = $net_tot-$tot_vat+$tot_disc;

      $query4= "INSERT INTO stock_transfer VALUES('','$ref_no','$description','$price','$qty','','$total','$date','','$tot_vat','$tot_disc','$net_tot')";
      $result4 =mysql_query($query4);

}
echo"<input type='submit' name='refresh'  class='button' value='Refresh '>";
?>
