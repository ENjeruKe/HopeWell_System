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
?>

<?php
$id_no  = $_SESSION['id'];
$SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;
$results ='No';
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
  { 
      $id      = mysql_result($result,$i,"adm_no");          
      $name        = mysql_result($result,$i,"name"); 
      $diag3       = mysql_result($result,$i,"diag3"); 
  }
echo'<B>RECOMANDATIONS<br>';
echo"<form action ='auto_display.php' method ='GET'>";
$_SESSION['update'] ='22';
echo"<textarea rows='21' cols='100%' name='textarea'>$diag3</textarea>";
echo"<br><input type='submit' name='_back'  class='button' value='Save & Back'>";
?>
