<?php
   session_start();
?>

<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php';
  require('open_database.php');
  $username =$_SESSION['username'];
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

<?php
//--------------------------------
//Now go and save this appointment
//--------------------------------
$textarea =$_GET['save_back'];
$update = $_SESSION['update'];
//echo 'Update:'.$textarea;
$date = $_GET['date'];

if(isset($_GET['save_back'])){
   //if ($update=='23'){ 
   $comment =$_GET['textarea'];
   $department =$_GET['department'];
   $customer = $_SESSION['patient'];
   $adm_no =$_SESSION['adm_no'];
   $ref_nos =$_SESSION['ref_no'];
   $today = date('y-m-d');
   $query5= "INSERT INTO book_appointments VALUES('','$department','$customer','$username','$today','$date','$adm_no','$ref_nos','$comment')";
 $result5 =mysql_query($query5);
   //}
}
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
      $med1_dx2       = mysql_result($result,$i,"med1_dx2"); 
      $ref_no         = mysql_result($result,$i,"ref_no"); 
  }
echo'<B>FOLLOW-UP<br>';
echo"<form action ='doc_window_23.php' method ='GET'>";
echo"<table width ='100%'><td>Appointment Date :<input id= 'date' name='date' type='date' size ='10'></td></table>";

$_SESSION['update'] ='23';
$_SESSION['patient'] =$name;
$_SESSION['adm_no'] =$id;
$_SESSION['ref_no'] =$ref_no;

echo"<textarea rows='21' cols='100%' name='textarea'>$med1_dx2</textarea>";



echo"<b>Department:</b>";
echo"<select id ='department' name='department' required>";
echo"<option value=''></option>";
echo"<option value='Pharmacy'>Pharmacy</option>";
echo"<option value='Triage'>Triage</option>";
echo"<option value='Laboratory'>Laboratory</option>";
echo"<option value='Doctor'>Doctor</option>";
echo"<option value='Radiology'>Radiology</option>";
echo"<option value='Nutriton'>Nutriton</option>";
echo"<option value='WBC'>WBC</option>";
echo"<option value='Dental'>Dental</option>";
echo"<option value='Antenatal'>Antenatal</option>";

echo"<br><input type='submit' name='save_back' value='Save & Back'>";
?>
