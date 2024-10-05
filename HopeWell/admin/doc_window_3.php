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
echo'<B>PAST MEDICAL HISTORY (P.M.H)<br>';
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
      $sign4       = mysql_result($result,$i,"med2_dx2"); 
  }
  
//Now go and get history data from appointmentf
//---------------------------------------------
$SQL= "SELECT * FROM appointmentf where adm_no ='$id'" or die(mysql_error());
$hasil=mysql_query($SQL);

$query= "SELECT * FROM appointmentf where adm_no ='$id'" or die(mysql_error());
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
      $ids      = mysql_result($result,$i,"adm_no");          
      $sign4       = mysql_result($result,$i,"sublocation"); 
  }
  
echo"<form action ='auto_display.php' method ='GET'>";
$_SESSION['update'] ='3';
$_SESSION['adm_no'] =$ids;
echo"<textarea rows='21' cols='100%' name='textarea'>$sign4</textarea>";
echo"<br><input type='submit' name='_back'  class='button' value='Save & Back'>";  
?>