
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
  	<?php include 'includes/account/inv.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	

<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>
<?php

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
   echo"<br><br><table><tr><td width ='350'><h4>UN-FINALISED INVOICES LIST</h4></td><td width ='500' align ='right'><b>Print Date:.$date</b></td></tr></table>";











echo"FROM Date:.$from_date . TO Date:.$to_date";
echo"<hr>";
echo"<table border ='0'>";
echo"<tr><th width ='100'>Date</th><th width ='300'>Patient Name </th><th>Adm No.</th><th width ='300'>Pay Account</th><th>Amount</th><th></th</tr></table>";
echo"<hr>";

$query="SELECT date,patients_name,adm_no,pay_account,invoice_no, sum(inv_amount) as total_amount FROM hdnotef2 WHERE patients_name<>'' AND date <= '$to_date' AND date >= '$from_date' group by invoice_no";
$result = mysql_query($query) or die(mysql_error());
$tot = 0;
echo"<table border ='0'>";
while($row = mysql_fetch_array($result)){
$amount = $row[total_amount];
$amount2 =number_format($amount);
echo "<tr ><td width='100'>$row[date]</td><td width='300'>$row[patients_name]</td><td>$row[adm_no]</td><td width ='300'>$row[pay_account]</td><td align ='right'>$amount2</td><td align ='right'>$row[invoice_no]</td></tr>";
$tot = $tot+ $row[total_amount];
}
echo "</table>";




echo"<hr>";
echo"<table>";   
      $tot2 = number_format($tot);
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




































?>










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

	
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">













<body background="images/background.jpg">
<form action ="list_unfinal_invoices.php" method ="GET">
<table>
<td><input type="submit" name="Submit"  class="button" value="Search Account"></td>
<?php



   
//$user = "hmisglobal";   
//$pass = "jamboafrica";   
//$database = "hmisglob_griddemo";   
//$host = "localhost";   
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
//mysql_select_db($database) or die ("Unable to select the database");


if (isset($_GET['from_date'])){
   $from_date = $_GET['from_date'];
   $to_date   = $_GET['to_date'];
}else{
$mdate =date('y-m-d');
$mdate ='2016-04-27';
$mdate =date('y-m-d');
$from_date = $mdate;
$to_date   = $mdate;
}
$mleast =123552620;

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





                                                         
echo"<table class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='100'>Date</th><th width ='300'>Patient Name </th><th>Adm No.</th><th width ='300'>Pay Account</th><th>Amount</th><th>Invoice</th</tr>";

//$query="SELECT date,patients_name,adm_no,pay_account,invoice_no, sum(inv_amount) as total_amount FROM hdnotef2 WHERE patients_name<>'' AND date <= '$to_date' AND date >= '$from_date' group by adm_no";
$query="SELECT date,gl_account,line_no,invoice_no, sum(credit_rate) as total_amount FROM auto_transact WHERE description<>'Direct without Consultation' and balance=0 and gl_account<>'' AND date <= '$to_date' AND date >= '$from_date' group by invoice_no";
$result = mysql_query($query);

//echo "<table>";
while($row = mysql_fetch_array($result)){
$aa = $row[date];
$bb = $row[adm_no];
$bp = $row[invoice_no];
echo "<tr ><td>$row[date]</td><td>$row[gl_account]</td><td>$row[line_no]</td><td>CASH PAYING PATIENTS</td><td align ='right'>$row[total_amount]</td>";
echo"<td align ='right'>"."<a href=javascript:popcontact('issuetopatients.php?accounts=$aa&accounts3=$bb&accounts4=$bp')>".$row['invoice_no']."</a></td></tr>";
}




//$query="SELECT date,patients_name,adm_no,pay_account,invoice_no, sum(inv_amount) as total_amount FROM hdnotef2 WHERE patients_name<>'' AND date <= '$to_date' AND date >= '$from_date' group by adm_no";
$query="SELECT date,gl_account,line_no,doc_no,invoice_no, sum(credit_rate) as total_amount FROM auto_transact_inv WHERE description<>'Direct without Consultation' and balance=0 and gl_account<>'' AND date <= '$to_date' AND date >= '$from_date' group by invoice_no";
$result = mysql_query($query);

//echo "<table>";
while($row = mysql_fetch_array($result)){
$aa = $row[date];
$bb = $row[adm_no];
$bp = $row[invoice_no];
echo "<tr ><td>$row[date]</td><td>$row[gl_account]</td><td>$row[line_no]</td><td>INVOICE PATIENTS</td><td align ='right'>$row[total_amount]</td>";
echo"<td align ='right'>"."<a href=javascript:popcontact('issuetopatients.php?accounts=$aa&accounts3=$bb&accounts4=$bp')>".$row['invoice_no']."</a></td></tr>";
}



//$query="SELECT date,patients_name,adm_no,pay_account,invoice_no, sum(inv_amount) as total_amount FROM hdnotef2 WHERE patients_name<>'' AND date <= '$to_date' AND date >= '$from_date' group by adm_no";
$query="SELECT date,patients_name,adm_no,doc_no, sum(amount) as total_amount FROM htransf WHERE ledger<>'IP/OPD' and invoice_no=' ' AND date <= '$to_date' AND date >= '$from_date' group by adm_no";
$result = mysql_query($query);

//echo "<table>";
while($row = mysql_fetch_array($result)){
    
$aa = $row[date];
$bb = $row[adm_no];
$ass = substr($bb,0,3);
if ($ass=='GOP'){

}else{
$bp = $row[invoice_no];
echo "<tr ><td>$row[date]</td><td>$row[patients_name]</td><td>$row[adm_no]</td><td>ADMITED PATIENTS</td><td align ='right'>$row[total_amount]</td>";
echo"<td align ='right'>"."<a href=javascript:popcontact('issuetopatients.php?accounts=$aa&accounts3=$bb&accounts4=$bp')>".$row['doc_no']."</a></td></tr>";
}
}

//<a href=javascript:popcontact('issuetopatients.php?accounts=$aa&accounts3=$bb&accounts4=$bp')>".$row['invoice_no']."</a>" 

echo "</table>";

die();

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
      $update2 = $balance; 
      $tot = $tot +$update2;
      
      //$update = number_format($update);
      //$codes   = number_format($codes2);
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      echo"<td width ='60' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='250' align ='left'>";      
      echo"$desc";
      echo"</td>";            
      echo"<td width ='60'>";      
      echo"$type";
      echo"</td>";      
      echo"<td width ='20'>";
      echo"$last_trans";
      echo"</td>";
      echo"<td width ='20' align ='right'>";
      echo"$update2";
      echo"</td>";

      $bb =$row['invoice_no'];        
      $aa =$row['invoice_no'];        
      $aa8=$row['invoice_no'];
      $aa9= date('y-m-d');

echo"<td width ='100' align ='right'><a href=javascript:popcontact55('reprint_invoice.php?accounts=$aa8&accounts3=$aa8&accounts9=$aa9')>$type<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a></td>";
      

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




