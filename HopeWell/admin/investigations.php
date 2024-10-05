<?php include 'includes/session.php'; ?>
<?php include 'includes/conn.php'; ?>


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
  	<?php include 'includes/lab.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	







<div>




<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="9%"> Adm No</th>
			<th width="15%"> Name</th>
			<th width="10%"> Phone No</th>
			<th width="9%"> App  Date</th>
			<th width="13%"> Status </th>
			<th width="13%"> Payer </th>
                <th width="10%"> Sex </th>
			<th width="10%"> Balance </th>
		</tr>
	</thead>

<!--table>

  <tr><td width ="100"><b>Adm No</td><td></td><td width ="200"><b>Name</td><td width ="100"><b>Phone No</td><td></td><td width ="100"><b>App  Date</td><td width ="100"><b>Status</td><td></td><td width ="100"><b>Payer</td><td width ="100"><b>Sex</td><td></td><td width ="100"><b>Balance</td></tr-->


<?php
$con=mysql_connect('localhost', 'root', 'v9p0CnfH60');
$db=mysql_select_db('newhmisc_trinity');
$date = date("y-m-d");

if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysql_query("select * from medicalfile where name like '%{$search}%' ");

if (mysql_num_rows($query) > 0) {
  while ($row = mysql_fetch_array($query)) {
       echo "<tr><td>".$row['adm_no']."</td>";
$desc = $row['name'];
$bb = $row['adm_no'];
$aa = $row['adm_no'];

//echo"<td>".$row['name']."</td>";



echo"<td width ='50' align ='left'><a href=javascript:popcontact2('patients_reg_edit.php?accounts3=$bb&account3=$aa&ref_no=$aa2')>$desc</a>";      
      echo"</td>";


echo"<td>".$row['telephone']."</td><td>".$row['date']."</td><td>".$row['status']."</td><td>".$row['payer']."</td><td>".$row['sex']."</td><td>".$row['image_id']."</td></tr>";
  }
}else{
    echo "No employee Found<br><br>";
  }

}else{                          //while not in use of search  returns all the values

   $query=mysql_query("select * from medicalfile where status ='To Laboratory' and date ='$date'");


  while ($row = mysql_fetch_array($query)) {
    echo "<tr><td>".$row['adm_no']."</td>";
$desc = $row['name'];
$bb = $row['adm_no'];
$aa = $row['adm_no'];

//echo"<td>".$row['name']."</td>";



echo"<td width ='50' align ='left'><a>$desc</a>";      
      echo"</td>";


echo"<td>".$row['telephone']."</td><td>".$row['date']."</td><td>".$row['status']."</td><td>".$row['payer']."</td><td>".$row['sex']."</td><td>".$row['image_id']."</td></tr>";

  }
}

mysql_close();
?>


</div>



      </section>
      <!-- right col -->
    
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



