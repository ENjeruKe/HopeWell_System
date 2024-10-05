<?php 
  session_start;
  include 'includes/conn.php'; 
?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/account/gl.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Collection Report</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Select Year: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2015; $i<=2165; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->
<?php

include 'includes/conn.php'; 
  $and = 'AND YEAR(date) = '.$year;
  $months = array();
  $xc = array();
  $late = array();
  $lates = array();
  $lat = array();
  $last = array();

  for( $m = 1; $m <= 12; $m++ ) {
  
    $sql = "SELECT SUM(total) as sale FROM receiptf WHERE MONTH(date) = '$m' AND trans_desc ='Cash Receipts' $and";
    $query = $conn->query($sql);
    $ontime = $query->fetch_assoc();
    $xcv = $ontime['sale'];
    array_push($xc, $xcv);

    $sql = "SELECT SUM(total) as sale FROM receiptf WHERE MONTH(date) = '$m' AND trans_desc ='M-PESA' $and";
    $query = $conn->query($sql);
    $ontime2 = $query->fetch_assoc();
    $latex = $ontime2['sale'];
    array_push($late, $latex);
 
    $sql = "SELECT SUM(total) as sale FROM receiptf WHERE MONTH(date) = '$m' AND trans_desc ='CHEQUES' $and";
    $query = $conn->query($sql);
    $ontime3 = $query->fetch_assoc();
    $latess = $ontime3['sale'];
    array_push($lates, $latess);

    $sql = "SELECT SUM(total) as sale FROM receiptf WHERE MONTH(date) = '$m' AND trans_desc ='EFT' $and";
    $query = $conn->query($sql);
    $ontime4 = $query->fetch_assoc();
    $latss = $ontime4['sale'];
    array_push($lat, $latss);

    $sql = "SELECT SUM(inv_amount) as sale FROM hdnotef WHERE MONTH(date) = '$m' AND pay_account<>'' $and";
    $query = $conn->query($sql);
    $ontime5 = $query->fetch_assoc();
    $las = $ontime5['sale'];
    array_push($last, $las);

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
 
//    echo 'y'.$xc.'m';


  }
  //array($xc = $ontime['sale']);
 
  $months = json_encode($months);
  $late = json_encode($late);
//  echo '3y2'.$xc.'3m2';
  $xc = json_encode($xc);
 $lates = json_encode($lates);
 $lat = json_encode($lat);
 $last = json_encode($last);
?>
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
        label               : 'Cash',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : <?php echo $xc; ?>
      },
      {
        label               : 'M-PESA',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Cheques',
        fillColor           : 'rgba(12,28,37)',
        strokeColor         : 'rgba(12,28,37)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $lates; ?>
      }
      ,
      {
        label               : 'EFT',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#000000',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $lat; ?>
      }
      ,
      {
        label               : 'Invoices',
        fillColor           : 'rgba(255,0,0)',
        strokeColor         : 'rgba(255,0,0)',
        pointColor          : '#000000',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $last; ?>
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
    barStrokeWidth          : 3,
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
    window.location.href = 'gl.php?year='+$(this).val();
  });
});
</script>
</body>
</html>
