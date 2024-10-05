<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>

<?PHP

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
      $adm_no     = mysql_result($result,$i,"next_adm");  
   }
   $adm_no ='IN/'. $adm_no;
   $date = date('y/m/d');
   

   if (isset($_GET['submit'])){
       $adm_no    =$_GET['adm_no'];
       $name      =$_GET['name'];
       $phone     =$_GET['telephone'];
       $bed_no    =$_GETT['bed_no'];
       $city      =$_GETPOST['kin'];
       $email     =$_GET['email'];
       $adm_date  =$_GET['adm_date'];
       $dis_date  =$_GET['dis_date'];
       $gender    =$_GET['sex'];
       $date      =$_GET['adm_date'];
       $street    =$_GET['sublocation'];
       $acc_name  =$_GET['payer'];
       $doc_name  =$_GET['account_doc'];
       $doctor    =$_GET['doctor'];
       $age       =$_GET['age'];
      $country   =$_GET['kin_tel'];
          $bed_no    =$_GET['bed_no'];
      $amount    = 0;
      //$adm_no    = $doctor.$adm_no;





 $i = 0;
 $SQL = "select * FROM companyfile" ;
 $hasil=mysql_query($SQL, $connect);
 $id = 0;
 $nRecord = 1;
 $No = $nRecord;

    $query5= "INSERT INTO next_refile VALUES('')";
     $result5 =mysql_query($query5);  
     $query3 = "select * FROM next_refile" ;
     $result3 =mysql_query($query3) or die(mysql_error());
     $num3 =mysql_numrows($result3) or die(mysql_error());
     $i3=0;
     while ($i3 < $num3)
          {
          $next_ref   = mysql_result($result3,$i3,"next_ref");  
          $i3++;
          }

     $hnext_ref = $next_ref;


 //while ($row=mysql_fetch_array($hasil)) 
 //  {         
  //   }



   //$adm_nos++;




   $query= "UPDATE companyfile SET next_adm ='$adm_nos'"; 
   $result =mysql_query($query);

     
   //Update the patients file with this new patient 

     $query= "INSERT INTO appointmentf VALUES('','$name','$phone','$email','$doctor','$date','$dis_date','',
'$bed_no','','$acc_name','','$age','$gender','','','','','','',
'$city','$country','$adm_no','','','','','','$bed_no','$street')";
      $result =mysql_query($query);


      //Now go and update the medical file to show todays visits
      $query= "INSERT INTO medicalfile (adm_no,gl_account,date,age,name,sex,type,status,ref_no,doctor,
time) VALUES ('$adm_no','$acc_name','$date','$age','$name','$sex','InPatient','Admitted','$next_ref','$doctor','$bed_no')"; 
$result =mysql_query($query);










echo "badoo";
//Go and admit the patient
//------------------------
$query3  = "UPDATE allbedsfile SET patients_name ='$name',adm_no ='$adm_no' WHERE bed_no ='$bed_no'";
$result3 = mysql_query($query3);

  }
?>
<?php


if (isset($_POST['edit'])){

   $acc_no    =$_POST['acc_no'];
   $account   =$_POST['account'];
   $contact   =$_POST['contact'];
   $type      =$_POST['type'];
   $tel       =$_POST['tel'];
   $comment   =$_POST['comment'];
   echo"$contact";

   $query= "UPDATE glaccountsf SET account ='$account',contact ='$contact',type ='$type',last_trans='CURDATE()',tel='$tel',comment='$comment' WHERE acc_no ='$acc_no'"; 
   $result =mysql_query($query);
  }
?>

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
			<li><a href="patients_reg_add.php"><i class="icon-list-alt icon-1x"></i>Admit Patient</a>                                     </li>
			<li><a href="discharge_patients.php"><i class="icon-list-alt icon-1x"></i>Discharge Patient</a>                                    </li>
			<li><a href="beds_register.php"><i class="icon-list-alt icon-1x"></i>Bed $ Wards Reg</a>                                    </li>
			<li><a href="nurses_station.php"><i class="icon-list-alt icon-1x"></i>Nurses Page</a>                                     </li>
			<!--li><a href="debit_notes2.php"><i class="icon-list-alt icon-1x"></i>Post Debit Note</a>                                     </li-->
			<li><a href="credit_notes2.php"><i class="icon-list-alt icon-1x"></i>Post Credit Note</a>                                    </li>


             <li><a href="bed_transfer.php"><i class="icon-list-alt icon-1x"></i>Bed Transfer</a>                                     </li>
			<!--li><a href="#"><i class="icon-list-alt icon-1x"></i>Post Credit Note</a-->                                    </li>
			<li><a href="#"><i class="icon-list-alt icon-1x"></i>Finalize Invoice</a>                                    </li>



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
	<div class="contentheader" align ='right'>
			<i class="icon-bar-chart"></i><font color ='green'>Bed Transfer</font>
			</div>
			<ul class="breadcrumb">
			<!--li><a href="index.php">Dashboard</a></li> /
			<li class="active">Sales Report</li-->
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="in_patient_register.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a><h1><font color ='white'>.</h1>




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



        <link rel="stylesheet" type="text/css" href="patients_reg_add_files/default.css">
    </head>


     
        <form method="GET" action="patients_reg_add.php" class="register">
            <h1>Registration</h1>
            <!--fieldset class="row1">
                <legend>Account Details
                </legend>
                <p>
                    <label>Email *
                    </label>
                    <input type="text">
                    <label>Repeat email *
                    </label>
                    <input type="text">
                </p>
                <p>
                    <label>Password*
                    </label>
                    <input type="text">
                    <label>Repeat Password*
                    </label>
                    <input type="text">
                    <label class="obinfo">* obligatory fields
                    </label>
                </p>
            </fieldset-->

            <fieldset class="row2">
                <legend>Personal Details
                </legend>
                <p>
                    <label>ADM No. *
    

               </label>
                    <?php                    
                    echo"<input class='long' type='text' name ='adm_no' value ='$adm_no' required>";
                    ?>
                </p>
                <p>
                    <label>Full Name *
                    </label>
                    <input class="long" type="text" name ="name" required>
                </p>
           
                <p>
                    <label>Phone *
                    </label>
                    <input maxlength="10" type="text" name ="phone" required>
                </p>
                <p>
                    <label class="optional">Residence
                    </label>
                    <input class="long" type="text" name ="sublocation">
                </p>
                <p>
                    <label>Kin*
                    </label>
                    <input class="long" type="text" name ="kin" required>
                </p>
                <p>
                    <label>Tel *
                    </label>
                    <input class="long" type="text" name ="kin_tel" required>
                </p>
                <p>
                    <label class="optional">E-mail:
                    </label>
                    <input class="long" value="e.g. xyz@bca.com" type="text" name ="email">

                </p>


                <p>
                    <label>Bed Rate *
                    </label>
                    <select name ="doctor" required>
                        <option value="2700">2700</option>
                        <option value="2800">2800</option>
                        <option value="3000">3000</option>
                        <option value="3100">3100</option>
                        <option value="3500">3500</option>
                        <option value="3600">3600</option>
                        <option value="5000">5000</option>
                    </select>
                </p>




                <!--p>
                    <label class="optional"></label>
                    <!--input class="long"   type="text" name ="acc_name"-->

                </p-->


<!-- Doctors Account here-->


          <p>
                <label class="optional">Doctor:  </label>
                 <!--input maxlength="10"   type="text" name ="acc_no"-->
               <select id="account_doc" name="doctor">        
               <?php                        
               $cdquery="SELECT account_name FROM doctorsfile";
               $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
               while ($cdrow=mysql_fetch_array($cdresult)) {
               $cdTitle=$cdrow["account_name"];
                   echo "<option>
                    $cdTitle
                   </option>";
            
               }                
               ?>    
              </select>
                </p>
<!-- End of Doctors A/c-->



<!-- Bed Number here-->


          <p>
                <label class="optional">Bed No:  </label>
                 <!--input maxlength="10"   type="text" name ="acc_no"-->
               <select id="bed_no" name="bed_no" required>        
               <?php                        
               $cdquery="SELECT bed_no FROM allbedsfile where adm_no ='' order by bed_no";
               $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
               while ($cdrow=mysql_fetch_array($cdresult)) {
               $cdTitle=$cdrow["bed_no"];
                   echo "<option>
                    $cdTitle
                   </option>";
            
               }                
               ?>    
              </select>
                </p>
<!-- End of Bed No -->



            </fieldset>



            <fieldset class="row3">
                <legend>Further Information
                </legend>


                <p>
                    <label class="optional">Admission Date
                    </label>
                    <?php
                    $date = date('y-m-d');
                    echo"<input maxlength='10' value='$date' type='text' name ='adm_date'>";
                    ?>
                </p>

                <p>
                    <label class="optional">Discharge Date                    </label>
                    <input maxlength="10" value="  /  /    " type="text" name ="dis_date">

                </p>



                <p>
                    <label>Bed No. *</label>
                    <input class="long" type="text" name ="bed_no">
                </p>

                <p>
                    <label>Gender *</label>
                    <input class="long" type="text" name ="gender">
                </p>

                <p>
                    <label>Age *</label>
                    <input class="year" size="4" maxlength="4" type="text" name ="age">
                </p>
                <!--p>


                </p-->
                <!--p>
                    <label>Children *
                    </label>
                    <input checked="checked" value="" type="checkbox" name ="child">
                </p-->


                <p>


                <label class="optional">Paying A/c. </label>
                 <!--input maxlength="10"   type="text" name ="acc_no"-->


               <select id="account" name="payer">
        
               <?php            
            
               $cdquery="SELECT account_name FROM debtorsfile";
               $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
               while ($cdrow=mysql_fetch_array($cdresult)) {
               $cdTitle=$cdrow["account_name"];
                   echo "<option>
                    $cdTitle
                   </option>";
            
               }
                
               ?>
    
              </select>



                </p>













            </fieldset>
            <fieldset class="row4">
                <!--legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input value="" type="checkbox">
                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
                <p class="agreement">
                    <input value="" type="checkbox">
                    <label>I want to receive personalized offers by your site</label>
                </p>
                <p class="agreement">
                    <input value="" type="checkbox">
                    <label>Allow partners to send me personalized offers and related services</label>
                </p-->
            </fieldset>
            <div><button name='submit' type='submit' class='button' id='contact-submit' data-submit='...Sending' >Submit</button></div>
            <!--div><input type="submit" name="Submit"  class="button" value="New Patient" /></div-->
            <!--input type="submit" name="Submit" class="button" onclick="return popitup('http://localhost/HGlobal/reg_add.html')">Register »</button-->
        </form>
    






</body></html>