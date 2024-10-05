<?php


$connect = mysqli_connect("localhost", "root", "v9p0CnfH60", "newhmisc_trinity");

$mmm2 = date("Y-m-d");

$query = "SELECT * FROM medicalfile WHERE status ='To Doctor' and date ='$mmm2' ORDER BY id DESC";
$result = mysqli_query($connect, $query);
$output = '';
//echo $mmm2;

while($row = mysqli_fetch_array($result))
{
    
 //  echo 'mama';
 $output .= '
 <div class="alert alert_default">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p><strong>'.$row["name"].'</strong><br>
   <small><em>'.$row["adm_no"].'</em></small><br>
   <small><em>Pending</em></small>
  </p>
 </div>
 ';
 
    echo"<embed src='Simple-marimba-notification-melody.mp3' controller='true' autoplay='true' autostart='True' width='0' height='0' />";
   

}
//$update_query = "UPDATE comments SET comment_status = 1 WHERE comment_status = 0";
//mysqli_query($connect, $update_query);
echo $output;

?>