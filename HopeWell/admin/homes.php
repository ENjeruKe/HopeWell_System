<?php 
 require('open_database.php');

//$sql = "DROP TABLE LIKE '%Z1%'";
 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }


$username =$_SESSION['username']; 
$password =$_SESSION['password'];
$_SESSION['issp0']='';
?>

 
 <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
  <style>
  #alert_popover
  {
   display:block;
   position:absolute;
   bottom:50px;
   left:50px;
  }
  .wrapper {
    display: table-cell;
    vertical-align: bottom;
    height: auto;
    width:200px;
  }
  .alert_default
  {
   color: #333333;
   background-color: #f2f2f2;
   border-color: #cccccc;
  }
  </style>
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
       <!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
<link href="dcss/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>




<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	<div class="container-fluid">
      
		<div class="span9">
			
			<div id="mainmain">
			    
			    
			    
			    <!--font color="red"><b>Kindly remember to close your shift once you are done with your shift thank you</b></font><br-->

<?php




//include 'open_database.php';

   $rec  = "no";
   $cas= "no";
   $vit = "no";
   $med = "no";
   $inve = "no";
   $pha = "no";
   $repo="no";
   $acc="no";
   $stk="no";
   $sets ="no";
   $doc = "no";
   $anc = "no";
   $nut="no";
   $wbc="no";
   $dent="no";
   $adms ="no";
   $rad ="no";
   $lab ="no";
   $theat ="no";
   $stmt ="no";
   $paym ="no";
   $invo ="no";
   $gl ="no";
   $blnc ="no";
   $in_p ="no";
   $reg_stk ="no";
   $repo_stk ="no";
   $trans_stk ="no";
   $co_stk ="no";
   $rec_stk ="no";
   $pds_stk ="no";
   $users ="no";
   $charts ="no";
   $receiv ="no";
   $payables ="no";
   $doc_reg ="no";
   $rev_reg ="no";
   $diag_reg ="no";
   $signs_reg ="no";
   $edit ="no";




    $found = "No";
   

  $query3 = "select * FROM systemfile2 where username = '$username' and password='$password'" ;
  
 

   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;



   while ($i3 < $num3)
     {
     $name   = mysql_result($result3,$i3,"username");
     $pass   = mysql_result($result3,$i3,"password");
  
        $found ='Yes';
        $acess  = mysql_result($result3,$i3,"access_all");

        $rec= mysql_result($result3,$i3,"rec");
        $cas= mysql_result($result3,$i3,"cas");
        $vit = mysql_result($result3,$i3,"vit");
        $med  = mysql_result($result3,$i3,"med");
        $inve   = mysql_result($result3,$i3,"inve");
        $pha      = mysql_result($result3,$i3,"pha");
        $repo  = mysql_result($result3,$i3,"repo");
        $acc   = mysql_result($result3,$i3,"acc");
        $stk   = mysql_result($result3,$i3,"stk");
        $sets     = mysql_result($result3,$i3,"sets");
        $doc   = mysql_result($result3,$i3,"doc");
        $anc      = mysql_result($result3,$i3,"anc");
        $nut  = mysql_result($result3,$i3,"nut");
        $wbc   = mysql_result($result3,$i3,"wbc");
        $dent   = mysql_result($result3,$i3,"dent");
        $adms     = mysql_result($result3,$i3,"adms");
        $rad     = mysql_result($result3,$i3,"rad");
        $lab     = mysql_result($result3,$i3,"lab");
        $theat     = mysql_result($result3,$i3,"theat");
        $stmt     = mysql_result($result3,$i3,"stmt");
        $paym     = mysql_result($result3,$i3,"paym");
        $invo     = mysql_result($result3,$i3,"invo");
        $gl     = mysql_result($result3,$i3,"gl");
        $blnc     = mysql_result($result3,$i3,"blnc");
        $in_p     = mysql_result($result3,$i3,"in_p");
        $reg_stk     = mysql_result($result3,$i3,"reg_stk");
        $repo_stk     = mysql_result($result3,$i3,"repo_stk");
        $trans_stk     = mysql_result($result3,$i3,"trans_stk");
        $co_stk     = mysql_result($result3,$i3,"co_stk");
        $rec_stk     = mysql_result($result3,$i3,"rec_stk");
        $pds_stk     = mysql_result($result3,$i3,"pds_stk");
        $users     = mysql_result($result3,$i3,"users");
        $charts     = mysql_result($result3,$i3,"charts");
        $receiv     = mysql_result($result3,$i3,"receiv");
        $payables     = mysql_result($result3,$i3,"payables");
        $doc_reg     = mysql_result($result3,$i3,"doc_reg");
        $rev_reg     = mysql_result($result3,$i3,"rev_reg");
        $diag_reg     = mysql_result($result3,$i3,"diag_reg");
        $signs_reg     = mysql_result($result3,$i3,"signs_reg");
        $edit     = mysql_result($result3,$i3,"edit");
      
     $i3++;
     }

		 
$_SESSION['rec'] = $rec;
$_SESSION['cas'] = $cas;
$_SESSION['vit']  = $vit;
$_SESSION['med'] = $med;
$_SESSION['inve'] = $inve;
$_SESSION['pha'] = $pha;
$_SESSION['repo'] = $repo;
$_SESSION['acc'] = $acc;
$_SESSION['stk'] = $stk;
$_SESSION['sets'] = $sets;
$_SESSION['doc'] = $doc;
$_SESSION['anc'] = $anc;
$_SESSION['nut'] = $nut;
$_SESSION['wbc'] = $wbc;
$_SESSION['dent'] = $dent;
$_SESSION['adms'] = $adms;
$_SESSION['rad'] = $rad;
$_SESSION['lab'] = $lab;
$_SESSION['theat'] = $theat;
$_SESSION['stmt'] = $stmt;
$_SESSION['paym'] = $paym;
$_SESSION['invo'] = $invo;
$_SESSION['gl'] = $gl;
$_SESSION['blnc'] = $blnc;
$_SESSION['in_p'] = $in_p;
$_SESSION['reg_stk'] = $reg_stk;
$_SESSION['repo_stk'] = $repo_stk;
$_SESSION['trans_stk'] = $trans_stk;
$_SESSION['co_stk'] = $co_stk;
$_SESSION['rec_stk'] = $rec_stk;
$_SESSION['pds_stk'] = $pds_stk;
$_SESSION['users'] = $users;
$_SESSION['charts'] = $charts;
$_SESSION['receiv'] = $receiv;
$_SESSION['payables'] = $payables;
$_SESSION['doc_reg'] = $doc_reg;
$_SESSION['rev_reg'] = $rev_reg;
$_SESSION['diag_reg'] = $diag_reg;
$_SESSION['signs_reg'] = $signs_reg;
$_SESSION['edit'] = $edit;


if ($rec=='yes'){
    echo"<a href='patient_register_main.php'><i class='icon-group icon-2x'></i><h4><font color ='blue'>Reception</font></h4></a>";  
}else{       
    echo"<a href='#'><i class='icon-group icon-2x'></i><h4><font color ='blue'>Reception</font></h4></a>";        
}
            
            
if ($cas=='yes'){            
   echo"<a href='acc.php'><i class='icon-money icon-2x'></i><h4><font color ='blue'>Cashier</font></h4></a>";           
}else{  
    echo"<a href='#'><i class='icon-money icon-2x'></i><h4><font color ='blue'>Cashier</font></h4></a>"; 
}

if ($vit=='yes'){ 
    echo"<a href='vital.php'><i class='icon-stethoscope icon-2x'></i><h4><font color ='blue'>Vitals</font></h4></a>";      
}else{
    echo"<a href='#'><i class='icon-stethoscope icon-2x'></i><h4><font color ='blue'>Vitals</font></h4></a>";
}


if ($med=='yes'){ 
echo"<a href='doctors.php'><i class='icon-user-md icon-2x'></i><h4><font color ='blue'>Medical</font></h4></a>";     
}else{
echo"<a href='#'><i class='icon-user-md icon-2x'></i><h4><font color ='blue'>Medical</font></h4></a>"; 
}


if ($inve=='yes'){
    echo"<a href='investigations.php'><i class='icon-search icon-2x'></i><h4><font color ='blue'>Investigations</font></h4></a>";
}else{     
    echo"<a href='#'><i class='icon-search icon-2x'></i><h4><font color ='blue'>Investigations</font></h4></a>";
} 
   
if ($pha=='yes'){   
    echo"<a href='patients_pharmacy.php'><i class='icon-medkit icon-2x'></i><h4><font color ='blue'>Pharmacy</font></h4></a>";
}else{
     echo"<a href='#'><i class='icon-medkit icon-2x'></i><h4><font color ='blue'>Pharmacy</font></h4></a>";
}

if ($acc=='yes'){
    echo"<a href='accounts.php'><i class='icon-credit-card icon-2x'></i><h4><font color ='blue'>Accounts Dept</font></h4></a>";
}else{     
     echo"<a href='accounts.php'><i class='icon-credit-card icon-2x'></i><h4><font color ='blue'>Accounts Dept</font></h4></a>";
}


if ($repo=='yes'){
   echo"<a href='reports.php'><i class='fa-bar-chart icon-2x'></i><h4><font color ='blue'>Reports</font></h4></a>";
}else{   
    echo"<a href='#'><i class='fa-bar-chart icon-2x'></i><h4><font color ='blue'>Reports</font></h4></a>";
}    
if ($stk=='yes'){
    echo"<a href='stock_ledger.php'><i class='fa-hospital-o icon-2x'></i><h4><font color ='blue'>Stocks</font></h4></a>";
}else{
     echo"<a href='#'><i class='fa-hospital-o icon-2x'></i><h4><font color ='blue'>Stocks</font></h4></a>";
}

//additions by loyce
//------------------
if ($acc=='yes'){
    echo"<a href='accounts.php'><i class='icon-credit-card icon-2x'></i><h4><font color ='blue'>Dental Department</font></h4></a>";
}else{     
     echo"<a href='accounts.php'><i class='icon-credit-card icon-2x'></i><h4><font color ='blue'>Dental Department</font></h4></a>";
}


if ($repo=='yes'){
   echo"<a href='reports.php'><i class='fa-bar-chart icon-2x'></i><h4><font color ='blue'>Physiotherapy</font></h4></a>";
}else{   
    echo"<a href='#'><i class='fa-bar-chart icon-2x'></i><h4><font color ='blue'>Physiotherapy</font></h4></a>";
}    
if ($stk=='yes'){
    echo"<a href='stock_ledger.php'><i class='fa-hospital-o icon-2x'></i><h4><font color ='blue'>Optical</font></h4></a>";
}else{
     echo"<a href='#'><i class='fa-hospital-o icon-2x'></i><h4><font color ='blue'>Optical</font></h4></a>";
}



?>

<div class="clearfix"></div>
</div>
</div>
</div>






 <div  align="center">
   <img src="../signature_1.gif" alt="img" height="150" width="450">  	</div>

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
