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


<br><br>


<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
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

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">








<?php





if (isset($_POST['submit'])){
   $date = date("y/m/d");
   $mm = TIME();
   //$acc_no= TIME(); 
   $acc_no  =$_POST['acc_no'];
   $acc_name=$_POST['name'];
   $type    =$_POST['type'];
   $contact =$_POST['contact'];
   $basic   =$_POST['per_day'];
   $deducted  =0;

   $basic2 = $basic;

    
   $query= "INSERT INTO appointmentf VALUES('$acc_no','$acc_name','','','','$deducted','$basic2','$date')";
   $result =mysql_query($query);
   echo"<h5>Unit A/c: ".$acc_no." Saved....</h5>";
  }

//0732435100 WWW.ANGAZAGROUP.CO.KE


if (isset($_POST['occupy'])){
   $date = date("y/m/d");
   $acc_no =$_POST['acc_no'];
   $name   =$_POST['name'];
   //$days   =$_POST['days'];
   $address=$_POST['contact'];
   $basic  =$_POST['basic'];
   
   $basic2 = $basic ;
   $deducted  =$basic2;

      
   $query= "UPDATE appointmentf SET contact ='$name',type ='$address',balance=0,last_trans= '$deducted' WHERE acc_no ='$acc_no'";
   $result =mysql_query($query);


   $query= "INSERT INTO debtorstrfile VALUES('$acc_no','$name','$basic','$basic2','$deducted','','$date')";
   $result =mysql_query($query);

   echo"<h5>Unit A/c: ".$name." Occupied....</h5>";
  }


if (isset($_POST['vacate'])){
   $date = date("y/m/d");
   $acc_no =$_POST['acc_no'];
   $name   =$_POST['name'];
   $days   =$_POST['days'];
   //$address=$_POST['contact'];
   $basic  =$_POST['basic'];
   
   $basic2 = $basic/24;
   $deducted  =$basic2*$days;

   $user = "root";
   $pass = "";
   $database = "busiacounty";
   $host = "localhost";
   $connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   mysql_select_db($database) or die ("Unable to select the database");
   
   $query= "UPDATE patientsf SET contact =' ',type=' ',per_day = 0,last_trans= '$deducted' WHERE acc_no ='$acc_no'";
   $result =mysql_query($query);


   $query= "INSERT INTO debtorstrfile VALUES('$acc_no','$name','$basic','$basic2','$deducted','$days','$date')";
   $result =mysql_query($query);

   echo"<h5>Unit A/c: ".$name." Vacated....</h5>";
  }



if (isset($_POST['billing']))
   {
  // $user = "root";
  // $pass = "";
 //  $database = "busiacounty";
 //  $host = "localhost";
   $connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   mysql_select_db($database) or die ("Unable to select the database");

   $query = "select * FROM patientsf WHERE contact <>' ' ORDER BY name" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $date =date('d-m-y');
   $mm =date('d-m-y');
   while ($i < $num)
      {
         
      $codes   = mysql_result($result,$i,"acc_no");
  
      $desc    = mysql_result($result,$i,"account");
   
      $rate    = mysql_result($result,$i,"type");
   
      $code   = mysql_result($result,$i,"per_day");
   
      $contact = mysql_result($result,$i,"contact");
  
 
      //$update2 = $update-$code ;
      //$tot = $tot +$update2;

      $query3 = "select * FROM systemf" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $ref_no   = mysql_result($result3,$i3,"next_ref");
  
        $i3++;
        }
        $ref_no2 = $ref_no +1;
        $query3  = "UPDATE systemf SET next_ref ='$ref_no2'";
        $result3 = mysql_query($query3);
   
      $query2= "INSERT INTO renttransfile VALUES('$codes','$desc','$contact','$rate','$ref_no','','$code',' ','$date','$mm')";
      $result2 =mysql_query($query2);
      $i++;
 
   }
}

?>







<body>
<form action ="issue_to_patients.php" method ="GET">
<input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
$mdate =date('y-m-d');
echo"<input type='text' name='search' size='50'>Search by:";
echo"<select name ='search_by'>";
//echo"<option value='Selection Option'>A Selection Option required</option>";
echo"<option value='Name'>Name</option>";
echo"<option value='Mobile'>Mobile</option>";
echo"<option value='Card'>Card</option></select>";
//echo"<input type='text' name='date' size='15' value ='$mdate'><br>";
?>
</FORM>
<?php

//$mleast =123552620;
//$mdate =date('y-m-d');
//$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Card'){
     $query = "select * FROM  appointmentf WHERE adm_no LIKE '%$search%' ORDER BY name" ;
     $SQL = "select * FROM  appointmentf WHERE adm_no LIKE '%$search%' ORDER BY name" ;
   }
   if ($search_by =='Mobile'){
     $query = "select * FROM  appointmentf WHERE phone LIKE '%$search%' ORDER BY name" ;
     $SQL   = "select * FROM  appointmentf WHERE phone LIKE '%$search%' ORDER BY name" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  appointmentf WHERE name LIKE '%$search%' ORDER BY name" ;
     $SQL   = "select * FROM  appointmentf WHERE name LIKE '%$search%' ORDER BY name" ;
   }
 }else{
   $query= "SELECT * FROM appointmentf WHERE bed_no<>'' ORDER BY adm_date DESC" or die(mysql_error());
   $SQL  = "SELECT * FROM appointmentf WHERE bed_no<>'' ORDER BY adm_date DESC" or die(mysql_error());
}

//substr($desc, -10);

$result =mysql_query($query) or die(mysql_error());

$num =mysql_numrows($result) or die(mysql_error());


//$dateValue = strtotime($date);
//
//$yr = date("Y", $dateValue); 
//$mon = date("m", $dateValue); 


$tot =0;

$i = 0;


                                                         
echo"<table class='altrowstable' id='alternatecolor' border ='1' width ='100%'>";
echo"<tr><th>File Number</th><th width ='400'>Patient Name </th><th>Phone No.</th><th>Sex</th><th width ='200'>Adm Date</th><th width ='300'>Pay Account</th><th>Billing</th></tr>";


$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"adm_no");  
      $desc    = mysql_result($result,$i,"name");   
      $rate    = mysql_result($result,$i,"sex");   
      $code   = mysql_result($result,$i,"payer");   
      $update = mysql_result($result,$i,"adm_date");  
      $contact = mysql_result($result,$i,"dis_date");  
      $street  = mysql_result($result,$i,"bed_no");
      $age    = mysql_result($result,$i,"age");
      $phone  = mysql_result($result,$i,"telephone");
  
      $codes2 = 0; 
      $update2 = $codes2; 
      //&& -$update;
      $tot = $tot +$update2;
      
      //$update = number_format($update);
      //$codes   = number_format($codes2);
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no']; 
      $aa =$row['name']; 
       
      //$cc =$row['adm_date']; 
      //$mm =substr($street,0,2);
 
      if (substr($street,0,2) =='NG'){
         echo"<td width ='60' align ='left' bgcolor ='green'>";
      }else{
         echo"<td width ='60' align ='left'>";
      }
echo"<a href=javascript:popcontact3('debit_notes.php?accounts3=$bb')>$codes</a>";      
      echo"</td>";
      if (substr($street,0,2) =='NG'){
         echo"<td width ='400' align ='left' bgcolor ='green'>";
      echo"<a href=javascript:popcontact5('patients2_reg_edit.php?accounts3=$bb&accounts=$bb')><font color ='white'>$desc</font><img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      }else{
         echo"<td width ='400' align ='left'>";
      echo"<a href=javascript:popcontact5('patients2_reg_edit.php?accounts3=$bb&accounts=$bb')>$desc<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      }
      echo"</td>";            
      //echo"<td width ='30'>";      
      if (substr($street,0,2) =='NG'){
         echo"<td width ='30' align ='left' bgcolor ='green'>";
      }else{
         echo"<td width ='30' align ='left'>";
      }
      echo"$phone";
      echo"</td>";      

      if (substr($street,0,2) =='NG'){
         echo"<td width ='20' align ='left' bgcolor ='green'>";
      }else{
         echo"<td width ='20' align ='left'>";
      }
      //echo"<td width ='20'>";
      echo"$rate";
      echo"</td>";

      if (substr($street,0,2) =='NG'){
         echo"<td width ='40' align ='left' bgcolor ='green'>";
      }else{
         echo"<td width ='40' align ='left'>";
      }
      //echo"<td width ='40'>";
      echo"$update";
      echo"</td>";

      //echo"<td width ='20'>";
      //echo"$street";
      //echo"</td>";

      if (substr($street,0,2) =='NG'){
         echo"<td width ='20' align ='left' bgcolor ='green'>";
      }else{
         echo"<td width ='20' align ='left'>";
      }
      //echo"<td width ='20'>";
      echo"$code";
      echo"</td>";
      
  
      
      

      $bb =$row['adm_no'];        
      $aa =$row['adm_no'];        
      $aa3=$row['age'];        
      $aa7=$row['phone'];         
      $aa8=$row['Name'];
      $aa9=$row['adm_date']; 
      
      
     $query3 = "select * FROM medicalfile where adm_no ='$bb'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
       {
          // $aa     = mysql_result($result3,$i,"ref_no");  
           
       $i3++;
     }    
      
      
 
     echo $aa;
      
      if (substr($street,0,2) =='NG'){
         echo"<td width ='20' align ='left' bgcolor ='green'>";
echo"<a href=javascript:popcontact6('post_receipts.php?accounts=$aa&accounts3=$bb')><font color ='white'>Pay</font><img src='ico/Profile.ico' alt='statement' height='12' width='12'></a></td>";
      }else{
         echo"<td width ='20' align ='left'>";
echo"<a href=javascript:popcontact6('post_receipts.php?accounts=$aa&accounts3=$bb')>Pay<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a></td>";
      }
      




      




echo"</tr>";
   

      $i++;
  
       
}

      echo"</table>";









      




echo"<table>";
   


      $tot = number_format($tot);

      echo"<tr>";

      echo"<td width ='320' align ='left'>";
      
//echo"$desc";

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

