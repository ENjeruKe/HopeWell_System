


<!DOCTYPE html>
<html lang="en">
  
<head>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>
</head>

<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
			 <li><a href="stocks_register.php"><i class="icon-dashboard icon-1x"></i>Stoct Item Reg</a></li> 
			<li><a href="stocks_location.php"><i class="icon-group icon-1x"></i>Store Locations</a>  </li>             
			<li><a href="stock_transfer.php"><i class="icon-group icon-1x"></i>Stock Transfer</a>  </li>             
			<li><a href="consumer_dept.php"><i class="icon-list-alt icon-1x"></i>Consumer Dept</a>                                     </li>
			<li><a href="stock_take.php"><i class="icon-group icon-1x"></i>Stock take Returns</a>                                    </li>
			<li><a href="stock_adjustment2.php"><i class="icon-group icon-1x"></i>Stock Adjustment</a>                                    </li>
			<li><a href="stock_request.php"><i class="icon-bar-chart icon-1x"></i>Internal Requisition</a>                </li>
                   <li><a href="stocks_reports.php"><i class="icon-bar-chart icon-1x"></i>Stock Reports</a>                </li>
                 

					<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul>     
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-bar-chart"></i> Sales Report
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Sales Report</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>

<?php



if (isset($_GET['billing']))
   {
      $account =' ';
      $user = "root";
      $pass = "";
      $database = "phpgrid";
      $host = "localhost";
      $connect = mysql_connect($host,$user,"$pass")or die ("Unable to connect");
      mysql_select_db($database) or die ("Unable to select the database");
      $total = 0;
      //Get the invoice No.
      //here
      $query3 = "select * FROM systemf" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $ref_no   = mysql_result($result3,$i3,"next_sup_inv"); 
        $i3++;
        }
        $ref_no2 = $ref_no +1;
        $query3  = "UPDATE systemf SET next_sup_inv ='$ref_no2'";
        $result3 = mysql_query($query3);

        //Get data from temp file and save
        $supplier         =$_GET['supplier'];
        $amount           =$_GET['amount'];
        $ref_no        =$_GET['ref_no'];
        $date           =$_GET['date'];
        if (isset($_GET['account']))
           {
           $account        =$_GET['account'];
           $desc           =$_GET['account'];
        }else{
           $account        =' ';
           $desc           =$_GET['supplier'];
        }
        $patient        =$_GET['patient'];

        $mydate = date('y-m-d');

   //Now go and get name and file from the clients file
   $query3 = "select * FROM clients" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $idno     = mysql_result($result3,$i3,"client_id");  
     $pat_name   = mysql_result($result3,$i3,"patients_name");   
     $pay_company= mysql_result($result3,$i3,"pay_account");   
     $ward_bed = $pat_name.'-'.$idno;
     if ($ward_bed==$patient){
        $patient  = $pat_name;
        $idno    = $idno;
        $adm_no    = $idno;
      
     }
     $i3++;    
   }
   //$query  = "UPDATE clients SET pay_account ='$account',adm_date ='$date',disch_date =' ',bed_no ='$bed' WHERE patients_name ='$update_bed' AND client_id ='$update_ward'";
   //$result = mysql_query($query);

   //echo"$adm_no";

   //Now go and Check Bed Charge in Revenue file
   $query3 = "select * FROM revenuef WHERE name ='$supplier'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $gledger ='Bed Income';
   $i3=0;
   while ($i3 < $num3)
     {
     $gledger     = mysql_result($result3,$i3,"gl_account");  
     $i3++;
   }

   //Now go and post Bed Charge at the beds rate
   $query= "INSERT INTO h_transf VALUES('$adm_no','$patient','$date','$ref_no','$desc','','$amount','IP','$gledger','DB',' ','ADMIN',' ','$mydate','1','$pay_company')";
   $result =mysql_query($query);

}

?>







<body>
<form action ="" method ="GET">
<?php


 $mysqlserver="localhost";
 $mysqlusername="root";
 $mysqlpassword="";

 $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());            
 $dbname = 'phpgrid';
 mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
 //Get the receipt No.

$company_identity ='BUSTANI';
$item1 =' ';
$sql="SELECT * FROM stocksfile WHERE description ='$item1'";
$result=mysql_query($sql);	 
$rows=mysql_fetch_array($result);

if (isset($_GET['revenue_search1'])){
   $item1=$_GET['item1'];
   $company_identity=$_GET['company_identity'];

   $sql="SELECT * FROM stocksfile WHERE description ='$item1'";
   $result=mysql_query($sql);	 
   $rows=mysql_fetch_array($result);
   }






$date = date('y-m-d');

echo"<br><br>";
echo"<table width ='900' border='0' border color ='black'>";

echo"<tr><td width='100' align='right'><b>Store : </b></td><td>";
echo"<select id='company_identity' name='company_identity'>";        
$cdquery="SELECT company_identity FROM systemf";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["company_identity"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr>";
echo"<tr><td width ='100' align ='right'><b>Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td></tr></table>";

//echo"<table width = '900' border = '1' border color = 'black'><th width ='100'>Line No.</th><th width ='600'>Item Description</th><th width ='100'>Action</th><th width ='100'>Unit Cost</th><th width ='50'>Qty</th><th width ='100'>Total</th></table>";


//echo"<div><b>";
echo"<hr>";
echo"L & Action<img src='space.jpg' style='width:45px;height:2px;'>";
echo"Item Description<img src='space.jpg' style='width:250px;height:2px;'>";
echo"Cost Price.<img src='space.jpg' style='width:150px;height:2px;'>";
echo"Quantity<img src='space.jpg' style='width:150px;height:2px;'>";
echo"Total Cost<img src='space.jpg' style='width:10px;height:2px;'>";
//echo"</b></div>";
echo"<hr>";





echo"<table width = '900' border = '0' border color = 'black'>";
echo"<tr><td width='100' align='right'>1.)</td>";
echo"<td width='100' align='right'><td width ='10'><input type='submit' name='revenue_search'  class='button' value='Search'></td><td>";

 if (!isset($_GET['revenue_search1'])){
    echo"<select id='item1' name='item1'>";        
 }
 $mysqlserver="localhost";
 $mysqlusername="root";
 $mysqlpassword="";

 $link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: ".mysql_error());            
 $dbname = 'phpgrid';
 mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT description FROM stocksfile WHERE location ='$company_identity'";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());

 if (isset($_GET['revenue_search1'])){
     echo"<input type='text' name='item1' size='20' value ='$item1'>";
   }else{            
   while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["description"];
   echo "<option>$cdTitle</option>";            
   }
}
 if (!isset($_GET['revenue_search1'])){
  echo"</select>";
}
echo"</td>";

echo"<td width='50' align='right'><input type='text' name='amount' size='10' ></td><td>";
$mm = $rows['gl_account'];
?>
<input type='text' name='amount' size='10' value ="<?php echo $rows['credit_rate'];?>">
<?php
echo"</td>";

echo"<td width ='100'><input type='text' name='amount' size='10'></td><td align ='left'><input type='submit' name='billing'  class='button' value='Add '></td></tr></table>";

//Item Two









?>
<br>
<!--table width ='400' border='0' border color ='black'><td align ='left'><input type='submit' name='billing'  class='button' value='Add '></td></table-->
</FORM>

<table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' height='100' width='130'></td>
</table>




</body>
</html>




