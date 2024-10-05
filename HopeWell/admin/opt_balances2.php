
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
  	<?php include 'includes/cashier.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	


<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$username = $_SESSION['username'];

?>
<?php


if (isset($_GET['accounts3'])){
   //Now go and unfinalise this invoice
   //----------------------------------
   $invoice_no = $_GET['accounts3'];
   $query= "UPDATE htransf SET invoice_no ='' where invoice_no ='$invoice_no'";
   $result =mysql_query($query);

   $query= "DELETE from hdnotef where invoice_no ='$invoice_no'";
   $result =mysql_query($query);
   echo'<h4>Un-finalise successful.......</h4>';
}

if (isset($_GET['print'])){
   //Start printing TB
   //-----------------
   $from_date = $_GET['from_date'];
   $to_date   = $_GET['to_date'];
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");


   $date = date('d-m-y');
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
   echo"<table width ='700'>";      
   echo"<tr><td width ='700' align ='center'><b>$company</b></td></tr>";
   echo"<tr><td width ='700' align ='center'><b>$address1</b></td></tr>";
   echo"<tr><td width ='700' align ='center'><b>$address2</b></td></tr>";
   echo"<tr><td width ='700' align ='center'><b>$address3</b></td></tr></table>";
   echo"<br><br><table><tr><td width ='350'><h4>FINALISED INVOICES LIST</h4></td><td width ='500' align ='right'><b>Print Date:.$date</b></td></tr></table>";

   $query= "SELECT * FROM hdnotef WHERE inv_amount <>0 AND date >='$from_date' AND date <= '$to_date' ORDER BY date" or die(mysql_error());
   $SQL  = "SELECT * FROM hdnotef WHERE inv_amount <>0 AND date >='$from_date' AND date <= '$to_date' ORDER BY date" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;










//echo"<h4>FINALISED INVOICES LIST</h4>";
echo"FROM Date:.$from_date . TO Date:.$to_date";
echo"<hr>";
echo"<table>";
echo"<tr><th width ='100'>Date</th><th width ='300' align='left'>Patient Name </th><th width='100' align ='center'>Invoice No.</th><th width ='300' align='left'>Pay Account</th><th width = '100' aligh ='right'>Amount</th><th width ='100'></th</tr></table>";
echo"<hr>";
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
echo"<table>";
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"patients_name");   
      $rate    = " ";   
      $type       = mysql_result($result,$i,"invoice_no");   
      $last_trans = mysql_result($result,$i,"pay_account");  
      $balance    = mysql_result($result,$i,"inv_amount");    
      $update2 = $balance; 
      $tot = $tot +$update2;
      
      //$update = number_format($update);
      //$codes   = number_format($codes2);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);

      echo"<tr>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='300' align ='left'>";      
      echo"$desc";
      echo"</td>";            
      echo"<td width ='100' align ='center'>";      
      echo"$type";
      echo"</td>";      
      echo"<td width ='300' align ='left'>";
      echo"$last_trans";
      echo"</td>";
      echo"<td width ='100' align ='right'>";
      echo"$update2";
      echo"</td>";

echo"<td width ='100' align ='right'></td>";
      

echo"</tr>";   
      $i++;      
}
      echo"</table>";

echo"<hr>";
echo"<table>";   
      $tot = number_format($tot);
      echo"<td width ='100' align ='left'>";      
      echo"</td>";      
      echo"<td width ='300'>";
      echo"</td>";      
      echo"<td width ='100'>";      
      echo"</td>";      
      echo"<td width ='300' align ='right'><h4>Total Amount:</h4>";
      echo"</td>";      
//      echo"<td width ='100' align ='right'>";            
//      echo"</td>";      
      echo"<td width ='100' align ='right'><h4>$tot2</h4></td>";      
      echo"<td width ='100'></td>";    
      echo"</table>";
//echo"<hr>";
die();


}




































//End of printing TB
//------------------




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">







<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
</style>



























<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=300,width=850');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>


</head>
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">













<body background="images/background.jpg">
<form action ="opt_balances2.php" method ="GET">
<table>
<td><input type="submit" name="Submit"  class="button" value="Search Account"></td>
<?php



   


$mleast =123552620;
$mdate =date('y-m-d');
$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search    = $_GET['search'];
   $from_date = $_GET['from_date'];
   $to_date   = $_GET['to_date'];

   $search_by = $_GET['search_by'];
   if ($search_by =='Account'){
     $query = "select * FROM  opt_hdnotef WHERE pay_account LIKE '%$search%' ORDER BY pay_account" ;
     $SQL = "select * FROM  opt_hdnotef WHERE pay_account LIKE '%$search%' ORDER BY pay_account" ;
   }
   if ($search_by =='Date'){
     //$query = "select * FROM  hdnotef WHERE date LIKE '%$search%' ORDER BY date" ;
     //$SQL   = "select * FROM  hdnotef WHERE date LIKE '%$search%' ORDER BY date" ;
     $query = "select * FROM  opt_hdnotef WHERE date >= '$from_date' AND date <='$to_date' ORDER BY date" ;
     $SQL   = "select * FROM  opt_hdnotef WHERE date >= '$from_date' AND date <='$to_date' ORDER BY date" ;
   }
   if ($search_by =='Patient'){
     $query = "select * FROM  opt_hdnotef WHERE patients_name LIKE '%$search%' ORDER BY patients_name" ;
     $SQL   = "select * FROM  opt_hdnotef WHERE patients_name LIKE '%$search%' ORDER BY patients_name" ;
   }
 }else{
   $query= "SELECT * FROM opt_hdnotef WHERE inv_amount <>0 ORDER BY date" or die(mysql_error());
   $SQL  = "SELECT * FROM opt_hdnotef WHERE inv_amount <>0 ORDER BY date" or die(mysql_error());
}

$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;


$mdate =date('y-m-d');
$from_date = $mdate;
$to_date   = $mdate;

echo"<table><td><input type='text' name='search' size='50'>Search by:</td>";
echo"<td><select name ='search_by'>";
echo"<option value='Account'>Account</option>";
echo"<option value='Date'>Date</option>";
echo"<option value='Patient'>Patient</option></select></td><td width ='20'>From Date</td><td width ='20'>
<input type='text' name='from_date' size='10' value='$from_date'></td><td width ='20'>To Date</td><td width ='20'>
<input type='text' name='to_date' size='10' value='$to_date'></td>";
?>
<td><input type="submit" name="print"  class="button" value="Send to Printer"></td></table>
</FORM>
<?php





                                                         
echo"<table class='altrowstable' id='alternatecolor' border ='1' width ='100%'>";
echo"<tr><th width ='15%'>Date</th><th width ='30%'>Client Name </th><th width ='15%'>Invoice No.</th><th width ='20%'>Pay Account</th><th width ='10%'>Amount</th><th width ='10%'>Balance</th><th width ='5%'>Print</th</tr>";


$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"patients_name");   
      $rate    = " ";   
      $type       = mysql_result($result,$i,"invoice_no");   
      $last_trans = mysql_result($result,$i,"pay_account");  
      $balance    = mysql_result($result,$i,"inv_amount");    
      $balance1    = mysql_result($result,$i,"tot_amount");    
      $update2 = $balance; 
      $tot = $tot +$update2;
      
      //$update = number_format($update);
      //$codes   = number_format($codes2);
      $update2 = number_format($update2);
      $update3 = number_format($balance1);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='15%' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='30%' align ='left'>";      
      echo"$desc";
      echo"</td>";       
      $bb  =$row['invoice_no'];             
      $aa8 =$row['invoice_no'];             
      echo"<td width ='15%'>";      
      echo"<a href=javascript:popcontact3('pay_final_invoices.php?accounts=$aa8&accounts3=$aa8')>$type</a>";
      echo"</td>";      
      echo"<td width ='20%'>";
      echo"$last_trans";
      echo"</td>";
      echo"<td width ='10%' align ='right'>";
      echo"$update3";
      echo"</td>";
      echo"<td width ='10%' align ='right'>";
      echo"$update2";
      echo"</td>";

      $aa =$row['invoice_no'];        
      $aa8=$row['invoice_no'];
      $aa9= date('y-m-d');
      echo"<td width ='15%' align ='right'><a href=javascript:popcontact55('reprint_invoice.php?accounts=$aa8&accounts3=$aa8&accounts9=$aa9')>Print</a></td>";
      echo"</tr>";   
      $i++;      
}
      echo"</table>";
echo"<table>";
   


      $tot = number_format($tot);

      echo"<tr>";

      echo"<td width ='320' align ='left'>";      
      echo"</td>";      
      echo"<td width ='200'>";
      echo"</td>";      
      echo"<td width ='150'><h4>";      
      echo"</h4></td>";      
      echo"<td width ='100' align ='right'>";
      echo"</td>";      
      echo"<td width ='120' align ='right'>";            
      echo"</td>";      
      echo"<td width ='100' align ='right'><h4></h4></td>";      
      echo"<td width ='50'></td>";    
      echo"</tr>";  
      echo"</table>";




?>
</body>








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




