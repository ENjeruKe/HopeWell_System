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
  	<!--?php include 'includes/medic.php'; ?-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<html>
 

<body>
<!--div class="w3-container w3-teal">
  <h3>Medical Form | <font color ='yellow'>Well Baby Clinic</font></h3>
</div-->
<!--img src="img_car.jpg" alt="Car" style="width:100%"-->
<div class="w3-container" align ="right">

<script language="javascript" type="text/javascript">
<!--
var newwindow;
function popitup(url) {
	newwindow=window.open(url,'newwindow','height=570,width=850');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
function popitup2(url) {
	newwindow=window.open(url,'newwindow','height=600,width=1000');
	if (window.focus) {newwindow.focus()}
	return false;
}

function popitup22(url) {
	newwindow=window.open(url,'newwindow','height=300,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}

function popitup3(url) {
	newwindow=window.open(url,'newwindow','height=600,width=1000');
	if (window.focus) {newwindow.focus()}
	return false;
}

function closeWin(url) {
    newwindow.close();   // Closes the new window
}


function myFunction() {
    var myWindow = window.open("patients_receipt.php", "", "width=1000, height=600");
}
</script>


<style>
#header {
    line-height:30px;
    background-color:white;
    height:20px;
    width:900px;
    float:left;
    padding:2px;	      
}

#hd2 {
    background-color:blue;
    color:white;
    text-align:left;
    padding:5px;
}

#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:450px;
    width:100px;
    float:left;
    padding:5px;	      
}

#nav1 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:100px;
    float:left;
    padding:5px;	      
}

#nav2 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:200px;
    float:left;
    padding:5px;	      
}

#nav3 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:100px;
    float:left;
    padding:5px;	      
}

#nav4 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:150px;
    float:left;
    padding:5px;	      
}

#nav4a {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:100px;
    float:left;
    padding:5px;	      
}

#nav5 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:75px;
    float:left;
    padding:5px;	      
}

#nav6 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:60px;
    float:left;
    padding:5px;	      
}
#nav7 {
    line-height:20px;
    background-color:blue;
    color:blue;
    height:20px;
    width:20px;
    float:left;
    padding:5px;	      
}

#nav8 {
    line-height:20px;
    background-color:blue;
    color:blue;
    height:20px;
    width:5px;
    float:left;
    padding:5px;	      
}

#section {
    height:350px;
    width:900px;
    float:left;
    padding:10px;	 	 
}
#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}
</style>
</head>





<!--div id="section"-->
<a href ='dent.php'><h4>Refresh Page</h4></a>
<OBJECT data="dental_patients_register_doctor.php" type="text/html" style="margin: 0%; width: 100%; height: 650px; padding 0px; text-align:left;"></OBJECT>
<!--/div-->



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

