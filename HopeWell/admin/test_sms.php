
<?php
session_start();
require('open_database.php');
?>
<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

 

     
       <!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
<link href="dcss/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>




<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      

<form action ="test_sms.php" method ="GET">
<!--form action ="http://www.hmisglobal.com/test_sms.php" method ="GET">
<!--table width ='240' align ='center' border ='0'><td align ='center'>
<OBJECT data="clock.html" type="text/html" style="margin: 0; width: 170px; height: 170px; padding 0px; text-align:left;"></OBJECT></td></table-->




<?php
$found ='No';
if (isset($_GET['Submit'])){
   $pname = $_GET['user_account'];
   $ppassword = $_GET['password2'];
   $textarea  = $_GET['textarea'];

   $found ='No';
   $query3 = "select * FROM systemfile2 where username ='$pname'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {     
     $clockname   = mysql_result($result3,$i3,"username");
     $clockpass   = mysql_result($result3,$i3,"password");
     if ($clockpass==$ppassword){
        $found ='Yes';
     }

     $i3++;
     }
     if($found=='No'){
       echo 'Invalid Staff Account';
     }

}
?>

<?php
date_default_timezone_set('Africa/Nairobi');
$date_time = date('m/d/Y h:i:s a', time());
//echo $date_time;
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
if($found=='Yes'){
$to = "benardwere@gmail.com,info@selfcare.co.ke";
$message = 'Staff Name: '.$clockname.' Date: '.$date_time.''.$textarea.'\r\n';
//$message .= ' '.'www.selfcare.co.ke/kiragu/sms_reply.php';
$date = date('y-m-d');

//$subject = "Clock-out";
//$headers = $subject;

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= 'Clock-out' . "\r\n";


mail($to,$subject,$message,$headers);
//$query= "INSERT INTO clock_in VALUES('$clockname','$date',NOW(),'$ip')";
$query= "INSERT INTO clock_in VALUES('$clockname','$date',NOW(),'$ip','$textarea','OUT')";
$result =mysql_query($query);







echo"<font color ='red'>........Success.........</font>";
}



echo"<table>";
echo"<tr><td width ='100' align ='left'><b>User Name:</b></td><td>";
echo"<select id='user_account' name='user_account'>";
$cdquery="SELECT username FROM systemfile2";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM systemfile2";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["username"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";
echo"</td></tr>"; 
echo"<tr><td width ='100'><b>Password:</td><td width='50' align='left'><input id='password2' name='password2' required='required' type='password' placeholder='' size ='14' /></td></tr>";
echo"<tr><td><b>Work summary</b></td><td>";
echo"<textarea rows='10' cols='40' id='textarea' name='textarea' required></textarea></td></tr></table>"; 






?> 
<br>
<table width ='240' align ='center' border ='0'><td align ='center'>
<input type="submit" name="Submit"  class="button" value="Clock Out">
</td></table>
<!--IFRAME SRC="clock.html" style="align: center; margin: 0px; width: 170px; height: 170px; padding 0px;"-->
<!--img src='chiromo-logo2.jpg' alt='statement' height='100' width='600'-->
      </section>
      <!-- right col -->
    </div>
  	<!--?php include 'includes/footer.php'; ?-->

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