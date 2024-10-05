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
echo'<B>HISTORY OF PRESENTING ILLNESS (H.P.I)</b><br>';
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
      $med1_dx2       = mysql_result($result,$i,"med2_dx2"); 
  }
echo"<form action ='auto_display.php' method ='GET'>";
$_SESSION['update'] ='2';
echo"<textarea rows='21' cols='100%' name='textarea'>$med1_dx2</textarea>";
echo"<br><input type='submit' name='_back'  class='button' value='Save & Back'>";
?>
