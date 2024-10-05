<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>﻿

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

 

     
 




<body>

<div class="w3-container w3-teal">
<font color ='red'>


<table width ='100%'>
<form action ="" method ="GET">
<?php
$mdate =date('y-m-d');
echo'Search by??';
echo"<input type='text' name='search' size='15'>Search by:";
echo"<select name ='search_by'>";
echo"<option value='Name'>Name</option>";
echo"<option value='Date'>Date</option></select>";
?>
</FORM>
</table>


<div class="w3-container">

<hr>
















<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/bills-pop-up.js"></script>

	
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php









if (isset($_GET['refresh'])){
   $date = date('y/m/d');
}

?>







<script>
function myFunction() {
    var no = document.getElementById('no').value;   
    alert(no); 

    var txt = document.getElementById('amount').value;

    alert(txt); 

    //var option = no.options[no.selectedIndex].text;

    txt2 = txt * no;
    document.getElementById("result2").value = txt2;
}
</script>











<script>
function showUser(str) {    
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getaccount.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

















<script>
function function3() {
    var no = document.getElementById('no_three').value;   
    var txt = document.getElementById('amount_three').value;
    txt2 = txt * no;
    document.getElementById("result_three").value = txt2;
}
</script>

<script>
function function4() {
    var no = document.getElementById('no_4').value;   
    var txt = document.getElementById('amount_4').value;
    txt2 = txt * no;
    document.getElementById("result_4").value = txt2;
}
</script>

<script>
function function2() {
    var no = document.getElementById('no_two').value;   
    alert(no); 
    var txt = document.getElementById('amount_two').value;
    alert(txt); 
    txt2 = txt * no;
    document.getElementById("result_two").value = txt2;
}
</script>

<script>
function function1() {
 alert('here');
    var no = document.getElementById('no_one').value;   
    var txt = document.getElementById('amount_one').value;
    txt2 = txt * no;
    document.getElementById("result_one").value = txt2;
}
</script>












<!--body background="images/background.jpg"-->
<body>







<body>

<?php



$mleast =123552620;
$mdate =date('y-m-d');
$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Date'){
     $query = "select * FROM  clock_in WHERE date LIKE '%$search%' ORDER BY date,staff_name ASC" ;
     $SQL = "select * FROM  clock_in WHERE date LIKE '%$search%' ORDER BY date,staff_name ASC" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  clock_in WHERE staff_name LIKE '%$search%' ORDER BY date desc" ;
     $SQL   = "select * FROM  clock_in WHERE staff_name LIKE '%$search%' ORDER BY date desc" ;
   }
 }else{
   $query= "SELECT * FROM clock_in ORDER BY date desc" or die(mysql_error());
   $SQL  = "SELECT * FROM clock_in ORDER BY date desc" or die(mysql_error());
}


$result =mysql_query($query) or die(mysql_error());

$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;






      echo"<table width='100%' border ='0' bgcolor ='green'> ";


$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = '';  
      $desc    = mysql_result($result,$i,"staff_name");   
      $rate    = '';   
      $code   = mysql_result($result,$i,"ok");  
      $update = mysql_result($result,$i,"date");  
      $contact = '';  
      $street  = '';
      $time    = mysql_result($result,$i,"time");
      $phone  = mysql_result($result,$i,"work");
      $type  = mysql_result($result,$i,"type");
      
      $info   = '';
      $age  = '';
      $sex  = '';

      $codes2 = 0; 
      $update2 = $codes2; 
      //&& -$update;
      $tot = $tot +$update2;
      
      $update2 = number_format($update2);
      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];        
      if ($phone==''){
         $change ='';
         echo"<td width ='100' align ='left' bgcolor ='green'><font color='white'>$desc</font>";
      }else{
         $change ='No';
         echo"<td width ='100' align ='left' bgcolor ='black'><font color ='white'>$desc</font>";
      }
      echo"</td>";            
      echo"<td width ='50'>";      
      if ($phone==''){
         $phones ='Clock-in';
      }else{
         $phones ='Clock-out';
      }
      echo"$phones";
      echo"</td>";      
      echo"<td width ='60'>";      
      echo"$update";
      echo"</td>";      
      if ($change==''){
         echo"<td width ='50' bgcolor ='green'><font color='white'>$time</font>";      
      }else{
         echo"<td width ='50' bgcolor ='black'><font color='white'>$time</font>";      
      }
      echo"</td>";      
      echo"<td width ='20'>";      
      echo"$code";
      echo"</td>";      
      echo"<td width ='100'>";      
      echo"$phone";
      echo"</td>";      
      echo"<td width ='100'>";
      echo"$rate";
      echo"</td>";

      $bb =$row['id'];        
      $aa =$row['id'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      $aa8=$row['payer'];
      $aa9=$row['app_date']; 

//echo"<td width ='20' align ='right'>$info</td>";     

     
echo"</tr>";  
//</table>
//echo"<hr>"; 
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
<!--a href="http:homebase.php"><h3>Back Home</h3></a-->

</div>
<!--div class="w3-container w3-teal">
  <p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p>
</div-->

</body>      </section>
      <!-- right col -->
    </div>
  	

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