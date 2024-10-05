
<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
  $username = $_SESSION['username'];
   $branch = $_SESSION['branch'];
?>

 

<?php
   session_start();
require('open_database.php');
$location = $_SESSION['branch'];

?>

<?php
//session_start();
$_SESSION['discount']= $_GET['no_disc'];       
$company_identity = $_SESSION['branch'];
//echo $company_identity;
//For save and print button
//------------------__-----
$codes =$_SESSION['branch'];
//echo"Branch".$codes;

//Asign the receipt No.
//---------------------
$query3 = "select * FROM companyfile" ;
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($i3 < $num3)
  {
  $ref_no   = mysql_result($result3,$i3,"next_rct");  
  $i3++;
  }

if (isset($_GET['accountsspay'])){      
   $record =$_GET['accountsspay'];
   $topay =$_GET['accounts33'];
   
   $mydate =date('y-m-d');
   $adm_no  = $_GET['accounts3'];


   //Asign the receipt No.
   //---------------------
   $query3 = "select * FROM dtransf where id ='$record'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"doc_no");  
     $payer    = mysql_result($result3,$i3,"acc_no");  
     $balance   = mysql_result($result3,$i3,"balance");  
     $mydate = mysql_result($result3,$i3,"date");  
     $i3++;
     }

   if ($topay==0){
       echo"<p align ='center'><h1><br><br><br>";
       die('Invoice already cleared....');
       echo"</p></h1>";
   }   
}

if (isset($_GET['save_cancel'])){
   //Go and save first
   //-------------------
   //$date=$_GET['date'];
   //$patients_name =$_GET['patient'];
   //$adm_no =$_GET['adm_no'];
   $paid   =$_GET['amount'];
   $jv_no  =$_GET['jv_no'];
   //$payer  =$_GET['db_account'];
   //$payer_account  =$_GET['pay_account'];
   //$tr_type=$_GET['tr_type'];
   //$narration= $_GET['jv_no'];
   //$pay_inv= $_GET['jv_no2'];
  
   //$debit_account  ='CASH COLLECTION A/C';
   //$credit_account ='ACCOUNTS RECEIVABLES';
   //$db_accounts  = $payer;
   //$db_accounts2 = $payer;
   
    $ref_no = $_GET['jv_no'];
  
   $timew = date("H:i:s");
   //Update Balances if not paid in full
   //-----------------------------------
   $topay = 0;
   $tot_amt = $paid;

     
   $query3 = "UPDATE debtorstrfile_allocate2 set inputby = '$paid' WHERE id ='$ref_no'";
   $result3 =mysql_query($query3) or die(mysql_error());
   
   echo"<h3>Transaction saved successfully.........</h3>";
   die();

}
     //Print the receipt before deleting these stuff
     //---------------------------------------------
?>
   


 <?php
 echo"<form action ='part_pay_allocation.php' method ='GET'>";
//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
echo"<table width ='100%' align ='right'>";
echo"<tr><td width ='100'><b>Ref No.</td><td width='50' align='left'><input type='text' id ='jv_no' name='jv_no' size='10' value ='$record' readonly></td></tr>";
echo"<tr><td width ='100'><b>Invoice No.</td><td width='50' align='left'><input type='text' id ='jv_no2' name='jv_no2' value='$ref_no' required></td></tr>";

echo"<tr><td width ='100'><b>Date:</td><td width='50' align='left'><input type='text' id ='date' name='date' size='10' value ='$mydate' required></td></tr>";

//Select the trans type if cash,cheque,visa or any other
//------------------------------------------------------


echo"<tr><td><b>Pay Account: </b></td><td><input type='text' id ='jv_no2' name='jv_no2' value='$payer' readonly><td>";
echo"</td></tr></select>";  


echo"<tr><td width ='50'><b>Invoice Balance</b></td><td width='10' align='left'><input type='text' id ='amount1' name='amount1' size='10' value ='$balance' readonly></td></tr>";

echo"<tr><td width ='50'><b>Amount Paid</b></td><td width='10' align='left'><input type='text' id ='amount' name='amount' size='10' value ='0' required></td></tr>";
echo"</table><br>";
//removed from here
//-----------------
//echo"<img src='ico/black.jpg' style='width:680px;height:1px;'>";   

      echo"</table><br><br><br><br>";
echo"<table width ='400' border='0' border color ='red'><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save & Print Receipt '></td></table>";      
//echo"<img src='ico/black.jpg' style='width:680px;height:1px;'>";   
//echo"<table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' height='50' width='70'>";

      echo"</table><br><br><br><br>";
?>


</form>

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



