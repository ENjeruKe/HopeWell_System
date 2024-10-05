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
$location = $_SESSION['company'];
?>


 </body>

<?php
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');


$today = date('y/m/d');
$query= "SELECT * FROM companyfile" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;



//echo"<table class='altrowstable' id='alternatecolor'>";
//$SQL= "SELECT * FROM companyfile" or die(mysql_error());
//$hasil=mysql_query($SQL, $connect);
//$id = 0;
//$nRecord = 1;
//$No = $nRecord;
//while ($row=mysql_fetch_array($hasil)) 
//   {         
//      $company     = mysql_result($result,$i,"company");  
//      $address1    = mysql_result($result,$i,"address1");   
//      $address2    = mysql_result($result,$i,"address2");   
//      $address3    = mysql_result($result,$i,"address3");   
//   }
//   echo"<font size ='4'>";
//   echo"<table width ='500'>";      
//   echo"<tr><td align ='left'><b>$company</b></td></tr>";
//   echo"<tr><td align ='left'><b>$address1</b></td></tr>";
//   echo"<tr><td align ='left'><b>$address2</b></td></tr>";
//   echo"<tr><td align ='left'><b>$address3</b></td></tr>";
//   echo"</table><br>";
//   echo"<b>Beds List & Occupancy Report</b><img //src='space.jpg' style='width:20px;height:2px;'>";
//   //echo"<img src='ico/black.jpg' //style='width:500px;height:1px;'><br>";

















$today = date('y/m/d');
$query= "SELECT * FROM allbedsfile where bed_no<>''" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<div><b>";
echo"<hr>";
echo"Bed No.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Adm No.<img src='space.jpg' style='width:70px;height:2px;'>";
echo"Patient Name<img src='space.jpg' style='width:190px;height:2px;'>";
echo"Daily Rate<img src='space.jpg' style='width:50px;height:2px;'>";
echo"</b></div>";
echo"<hr>";

echo"<table class='altrowstable' id='alternatecolor' border ='0'>";

$SQL= "SELECT * FROM allbedsfile where bed_no<>''" or die(mysql_error());
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$occupied = 0;
$vacant = 0;
while ($row=mysql_fetch_array($hasil)) 
      { 
//echo"<hr>";       
 
      $codes   = "";  
      $desc    = mysql_result($result,$i,"adm_no");   
      $rate    = mysql_result($result,$i,"patients_name");   
      $code   = mysql_result($result,$i,"bed_no");   
      $update = mysql_result($result,$i,"rate");  
      $contact = " ";  
      $street  = " ";  
      $pay_mode= " ";  

      $codes2 = $rate; 
      $codes3 = $update; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      echo"<tr>";
      echo"<td width ='100' align ='left'>";            
      echo"$code";
      echo"</td>";
      if ($rate  ==""){
         $vacant = $vacant + 1;
      }else{
         $occupied = $occupied + 1;
      }
    echo"<td width ='50' align ='left'>";      
      echo"$desc";
      echo"</td>";

      echo"<td width ='70'></td>";
      echo"<td width ='170' align ='left'>";      
      echo"$rate";
      echo"</td>";

      echo"<td width ='100' align ='left'>";      
      echo"$contact";
      echo"</td>";

      echo"<td width ='100' align ='right'>";      
      echo"$update";      
      echo"</td>";
      echo"</tr>";
      $i++;      
     }
      echo"</table>";
      echo"<hr>";
      echo"<table width ='150'>";
      echo"<tr><td width ='100' align ='right'><h4><u>Statistics</u></h4></td><td></td></tr>";
      echo"<tr><td width ='100' align ='right'>Total Beds:</td><td  width ='50' align ='right'>$i</td></tr>";
      echo"<tr><td width ='100' align ='right'>Occupied:</td><td width ='50' align ='right'>$occupied</td></tr>";
      echo"<tr><td width ='100' align ='right'>Vacant:</td><td width ='50' align ='right'>$vacant</td></tr></table>";


?>










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



