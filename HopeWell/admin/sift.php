<?
require ('../connect.php');
require ('open_database.php');
include ('../timezone.php'); 
?>

<!--?php include 'includes/session.php'; ?-->
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/ssm.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


     
       <!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
<link href="dcss/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>

<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">

      

<div>
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>




<?php

//echo $db;
      $result = $db->prepare("SELECT * FROM attendance WHERE status<>'' ORDER BY employee_id DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			<div style="text-align:center;">
			Total Number Shifts: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>



</div>
<input type="text" name="filter" style="height:35px; margin-top: -1px;" value="" id="filter" placeholder="Search Shift.........." autocomplete="off" />
<!--a rel="facebox" href="class_add.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add class</button></a--><br><br>


<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th> User </th>
			<th> Date In </th>
			<th> Time In </th>
			<th> Date Out </th>
			<th> Time Out </th>
			<th> Department </th>
			<!--th> Start </th>
			<th> End </th-->
			<th> Collection </th>
                <th> Status </th>
			<!--th> Phone No </th>
			<th width="120"> Action </th-->
		</tr>
	</thead>
	<tbody>
		
			<?php
				$result = $db->prepare("SELECT * FROM attendance WHERE status<>'' ORDER BY employee_id ASC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">

                <td><?php echo $row['employee_id']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['time_in']; ?></td>
			<td><?php echo $row['out_dte']; ?></td>
			<td><?php echo $row['time_out']; ?></td>
                <td><?php echo $row['status']; ?></td>
<?
$ac =$row['date'];
$as =$row['time_in'];
$ad =$row['out_dte'];
$ax =$row['time_out'];
$ab =$row['employee_id'];
$_SESSION['ab'] =$ab;
$_SESSION['ad'] =$ad;
$_SESSION['ac'] =$ac;
$_SESSION['as'] =$as;

$acc =$row['num_hr'];

$pop =$row['id'];


?>
			<td>
<?php

//echo $ab;

//$wp =0;
$we =0;
//$i =0;
$amount=0;

if ($ad =='0000-00-00' && $ax =='00:00:00' ){
 $ad =date('Y-m-d');
 $ax =date('H:i:s');

 $date1  = $ac.' '.$as;
 $date2 =$ad.' '.$ax;
  //$ax =substr($ax,0,7);
// $as =substr($as,0,7);

 //echo $ax;


$SQL2= "select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and inputby='$ab' ORDER BY date,ref_no,trans_desc,time" or die(mysql_error());
$hasil2=mysql_query($SQL2);

$query2= "select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and inputby='$ab' ORDER BY date,ref_no,trans_desc,time" or die(mysql_error());
$result2 =mysql_query($query2) or die(mysql_error());
//$numx =mysql_numrows($result2) or die(mysql_error());
//$tot =0;

while ($row=mysql_fetch_array($hasil2)) 
  { 
        $we =$row['total'];
        $wq =$row['inputby'];
        $op =$row['time'];

        $amount = $amount+$we;
 }
 //$i2++;

 //echo substr($op,0,7);

 //echo $op;  
 
//echo $ad.''.$ax.''.$ac.''.$as;
 
}else{
  $date1  = $ac.' '.$as;
  $date2 =$ad.' '.$ax;


  $SQL2= "select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and inputby='$ab' ORDER BY date,ref_no,trans_desc,time" or die(mysql_error());
  $hasil2=mysql_query($SQL2);
  
  $query2= "select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and inputby='$ab' ORDER BY date,ref_no,trans_desc,time" or die(mysql_error());
  $result2 =mysql_query($query2) or die(mysql_error());
  //$numx =mysql_numrows($result2) or die(mysql_error());
  //$tot =0;
  $i2 = 0;
  
  while ($row=mysql_fetch_array($hasil2)) 
    { 
          $we =$row['total'];
          $wq =$row['inputby'];
          $op =$row['time'];

          $amount = $amount+$we;
        
   }
   //$i2++;
   
}
//----------------------------closed-----------------------------------------------
//----------------------------------------------------------------------------   




//echo $wp.'m';
echo $amount;

//echo $amountp;
//echo $amount;
// echo $rows['sum(total)']; 




?>
</td>







<?php

echo"<td><a href=javascript:popcontact7('sift3.php?accounts3=$pop')>$acc</td>";
//&accounts4=$ac&accounts5=$as&accounts6=$ad&accounts7=$ax
?>

			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "class_delete.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>

</div>


      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

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
        label               : 'Borrow',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : <?php echo $borrow; ?>
      },
      {
        label               : 'Return',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $return; ?>
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

