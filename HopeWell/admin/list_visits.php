<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>

<?php
 $adm_no = $_SESSION['adm_no'];
  $query = "select * FROM  medicalfile WHERE adm_no ='$adm_no' ORDER BY date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE adm_no ='$adm_no' ORDER BY date desc";
$result =mysql_query($query);
$num =mysql_numrows($result);
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $dates = $row['date'];        
      $bb =$row['adm_no'];        
      $aa =$row['id'];   
      $aa2 =$row['ref_no'];

      echo"<td width ='200' align ='left'><a href=javascript:popcontact4('view_patient_visits.php?accounts3=$bb&accounts=$aa&ref_no=$aa2')>$dates<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>|";
}


?>