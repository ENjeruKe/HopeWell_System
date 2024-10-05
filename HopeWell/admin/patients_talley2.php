<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

 

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  
       <!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
<link href="dcss/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>




<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/repo/gr.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	


<?php
session_start();
 require('open_database.php');
 include('../connect.php');

?>
<?php
 $branch     = $_SESSION['company']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');



 if (isset($_GET['print'])){

   $date1  = $_GET['date1'];
   $date2  = $_GET['date2'];


   $date2.' 99.99.99';
   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;



   $i = 0;
   $SQL = "select * FROM companyfile" ;
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   while ($row=mysql_fetch_array($hasil)) 
   {         
      $company     = mysql_result($result,$i,"company");  
      $address1    = mysql_result($result,$i,"address1");   
      $address2    = mysql_result($result,$i,"address2");   
      $address3    = mysql_result($result,$i,"address3");   
   }
   echo"<font size ='2'>";
   echo"<table width ='500'>";      
   echo"<tr><td align ='left'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>$address3</b></td></tr>";
   echo"</table><br>";

   echo"<h4>PATIENTS TALLEY SHEET <img src='space.jpg' style='width:20px;height:2px;'>"."Dated from: ".$date1."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date2;
echo"</h4>";
//   echo"Dated from: ".$date1."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date2;

   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";





$today = date('y-m-d');
$mdate =date('y-m-d');
$date1  = $_GET['date1'];
$date2  = $_GET['date2'];
//$query  = "select * FROM receiptf WHERE date >='$date1' AND //date <= '$date2' ORDER BY date,ref_no" ;
//$result =mysql_query($query) or die(mysql_error());
//$num =mysql_numrows($result) or die(mysql_error());


$tot =0;
$i = 0;
                                                         
?>
<table width ='100%'>
<tr>
<th bgcolor ='black' width ='50'><font color ='white'>IP No</th>
<th bgcolor ='black' width ='250' align ='left'><font color ='white'>Patients Name</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No</th>
<th bgcolor ='black' width ='20' align ='left'><font color ='white'>Episod</th>
<th bgcolor ='black' width ='10'><font color ='white'>Age</th>
<th bgcolor ='black' width ='10'><font color ='white'>Sex</th>
<th bgcolor ='black' width ='100' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Type</th>
</tr>
<?php
$SQL ="select * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' ORDER BY date,ref_no" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;

$news = 0;
$review=0;
$below_5=0;
$above_5=0;
$male =0;
$out =0;
$female=0;
$admited=0;
$f=0;
$m=0;
$f2=0;
$m2=0;
$Nf=0;
$Nm=0;
$Af=0;
$Am=0;
$Pf=0;
$Pm=0;

$docno ='';





while ($row=mysql_fetch_array($hasil)) {
    echo "<tr>";
    echo "<td>" . $row['adm_no'] . "</td>";
    echo "<td width ='300'>" . $row['name'] . "</td>";
    echo "<td>" . $row['ref_no'] . "</td>";
    echo "<td width ='20'>" . $row['location'] . "</td>";
    echo "<td align ='right'>" . $row['age'] . "</td>";
    echo "<td align ='left'>" . $row['sex'] . "</td>";
    echo "<td align ='left'>" . $row['gl_account'] . "</td>";
    echo "<td align ='left'>" . $row['type'] . "</td>";
    echo "</tr>";
    $sex = $row['sex'];
    $age = $row['age'];
    $new = $row['location'];
    $type= $row['type'];

    if ($sex=='M'){
       $male = $male +1;
    
    }
    if ($sex=='F'){
         $female = $female +1;
} 
    if ($sex=='M' and $age <=5){
       $m = $m +1;   
    }

    if ($sex=='F' and $age <=5){
       $f = $f +1;   
    }
    if ($sex=='M' and $age >5){
       $m2 = $m2 +1;
    
    }
    if ($sex=='F' and $age >5){
       $f2 = $f2 +1;
    
    }
   if ($sex=='M' and $new=='New'){
       $Nm = $Nm +1;
    
    }

   if ($sex=='F' and $new=='New'){
       $Nf = $Nf +1;
    
    }

if ($sex=='F' and $review=='old'){
       $Nf = $Nf +1;
    
    }

if ($sex=='F' and $type=='Inpatient'){
       $Af = $Af +1;
    
    }

if ($sex=='M' and $type=='Inpatient'){
       $Am = $Am +1;
    
    }
if ($sex=='F' and $type=='Outpatient'){
       $Pf = $Pf +1;
    
    }

if ($sex=='M' and $type=='Outpatient'){
       $Pm = $Pm +1;
    
    }




    if ($type=='Inpatient'){
       $admited = $admited +1;
    }else{
       $out = $out +1;
    }

    if ($new=='New'){
       $news = $news +1;
    }else{
       $review = $review +1;
    }

    if ($age <= 5){
       $below_5 = $below_5 +1;
    }else{
       $above_5 = $above_5 +1;
    }


     $i++;      
    }
    echo"</table>";




      echo"<hr>";
      echo"<table border='0'>";   
      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);

      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='300'>";
      echo"Total";      
      echo"</td>";      
      //echo"<td width ='70'align ='right'><b>$tot_bill";      
      echo"</b></td>";      
      //echo"<td width ='70' align ='right'>$tot_bill2";      
      echo"</td>";      
      echo"<td width ='200' align ='right'>";      
      echo"</td>";          
      echo"<td width ='70' align ='right'><b>$i</b></td>";      
      echo"</tr>";   
      echo"</table>";
      echo"<hr>";
      echo"<table border=0><tr><td><h3><u>Talley Summary</u></h3></td><td></td></tr>";
      
      echo"<tr><th><b>Type</th>";
      echo"<th width ='100' align ='right'><b> Total Count </th>";
      echo"<th width ='70' align ='right'><b> Males </th>";
      echo"<th width ='70' align ='right'><b> Females </th></tr>";

//------------------checking on results------------------------
$rowcount3 = 0;
$rowcount2 = 0;
$rowcount4 = 0;
$rowcount5 = 0;
$rowcount6 = 0;
$rowcount7 = 0;
$rowcount8 = 0;
$rowcount9 = 0;
$rowcount10 = 0;
$rowcount11 = 0;
$rowcount11 = 0;
$rowcount12 = 0;
$rowcount13 = 0;
$rowcount14 = 0;
$rowcount15 = 0;
$rowcount16 = 0;
$rowcount17 = 0;
$rowcount18 = 0;
$rowcount19 = 0;


$result14 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND location ='New' AND id >1");
$result14->execute();
$rowcount14 = $result14->rowcount();

$result15 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND location ='Review' AND id >1");
$result15->execute();
$rowcount15 = $result15->rowcount();

//----------------New-------------------------------------------------------
$result16 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='M' AND location ='New' AND id >1");
$result16->execute();
$rowcount16 = $result16->rowcount();


$result17 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='F' AND location ='New' AND id >1");
$result17->execute();
$rowcount17 = $result17->rowcount();

//----------------Reveiw-------------------------------------------------------
$result18 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='M' AND location ='Review'  AND id >1");
$result18->execute();
$rowcount18 = $result18->rowcount();


$result19 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='F' AND location ='Review' AND id >1");
$result19->execute();
$rowcount19 = $result19->rowcount();


//--------------------------------------------------------------



      echo"<tr><th><b>1. New Patients:</th><th width ='70' align ='left'>$rowcount14</th>";
      echo"<th width ='70' align ='right'>$rowcount16</th>";
      echo"<th width ='70' align ='right'>$rowcount17</th></tr>";




      echo"<tr><th><b>2. Review Patients:</th><th width ='70' align ='right'>$rowcount15</th>";
      echo"<th width ='70' align ='right'>$rowcount18</th>";
      echo"<th width ='70' align ='right'>$rowcount19</th></tr>";
      

//------------------checking on results------------------------

$result3 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND age <5 AND id >1");
$result3->execute();
$rowcount3 = $result3->rowcount();

$result2 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND age >5 AND id >1");
$result2->execute();
$rowcount2 = $result2->rowcount();

//----------------Below 5-------------------------------------------------------
$result4 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='M' AND age <5 AND id >1");
$result4->execute();
$rowcount4 = $result4->rowcount();


$result5 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='F' AND age <5 AND id >1");
$result5->execute();
$rowcount5 = $result5->rowcount();

//----------------Above 5-------------------------------------------------------
$result6 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='M' AND age >=5 AND id >1");
$result6->execute();
$rowcount6 = $result6->rowcount();


$result7 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='F' AND age >=5 AND id >1");
$result7->execute();
$rowcount7 = $result7->rowcount();


//--------------------------------------------------------------

      echo"<tr><th><b>3. Below 5yrs:</th><th width ='70' align ='right'>$rowcount3</th>";
      echo"<th width ='70' align ='right'>$rowcount4</th>";
      echo"<th width ='70' align ='right'>$rowcount5</th></tr>";
      


      echo"<tr><th><b>4. Above 5yrs:</th><th width ='70' align ='right'>$rowcount2</th>";
      echo"<th width ='70' align ='right'>$rowcount6</th>";
      echo"<th width ='70' align ='right'>$rowcount7</th></tr>";


      //----------------Out patients & Inpatients-------------------------------------------------------

      $result8 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND type ='Outpatient' AND id >1");
      $result8->execute();
      $rowcount8 = $result8->rowcount();
      
      $result9 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND type ='Inpatient' AND id >1");
      $result9->execute();
      $rowcount9 = $result9->rowcount();
      
//----------------------------------------------------------------------------------------------------------

$result10 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='M' AND type ='Outpatient' AND id >1");
$result10->execute();
$rowcount10 = $result10->rowcount();


$result11 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='F' AND type ='Outpatient' AND id >1");
$result11->execute();
$rowcount11 = $result11->rowcount();


//----------------------------------------------------------------------------------------------------------

$result12 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='M' AND type ='Inpatient' AND id >1");
$result12->execute();
$rowcount12 = $result12->rowcount();


$result13 = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='F' AND type ='Inpatient' AND id >1");
$result13->execute();
$rowcount13 = $result13->rowcount();


//--------------------------------------------------------------

 

      echo"<tr><th><b>7. Admited:</th><td>$rowcount9</th>";
      echo"<th width ='70' align ='right'>$rowcount12</th>";
      echo"<th width ='70' align ='right'>$rowcount13</th></tr>";

      echo"<tr><th><b>8. Out Patient:</th><th>$rowcount8</th>";
      echo"<th width ='70' align ='right'>$rowcount10</th>";
      echo"<th width ='70' align ='right'>$rowcount11</th></tr>";


$coun =0;
$sirs =0;
$mdm =0;




$resul = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND id >1");
$resul->execute();
$coun = $resul->rowcount();

//----------------New-------------------------------------------------------
$resu = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='M' AND id >1");
$resu->execute();
$sirs = $resu->rowcount();


$res = $db->prepare("SELECT * FROM medicalfile WHERE date >='$date1' AND date <= '$date2' AND sex ='F' AND id >1");
$res->execute();
$mdm = $res->rowcount();

//--------------------------------------------------


    echo"<tr><th><b>Total :</th><th>$coun</th><th>$sirs</th><th>$mdm</th></tr>";


//echo"<br><br><br>";
      die();
}else{
}
?>








<!DOCTYPE html>
<html>






<?php
  echo"<form action ='patients_talley2.php' method ='GET'>";
  echo"<table><tr><td width ='50'>From Date:</td><td><input type='date' name='date1' value ='$date1' size='12' ></td></tr>";
  echo"<tr><td width='50'>To Date:</td><td><input type='date' name='date2' value ='$date2' size='12'></td><tr>";
  echo"<tr><td width='50'><input type='submit' name='print'  class='button' value='Print Report'></td><td></td></tr>";
echo"</FORM>";


$today = date('y/m/d');
//$today = $date-1;

?>
<table width ='20' border='0' height='220'></table>

</div>
<!--div class="w3-container w3-teal">
  <p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p-->
</div>
</body>
</html>







      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->

<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Late',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Ontime',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $ontime; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#00a65a'
  barChartData.datasets[1].strokeColor = '#00a65a'
  barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>



