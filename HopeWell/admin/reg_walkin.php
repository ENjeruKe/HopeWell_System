<?php
   session_start();
   require('open_database.php');
   require('includes/header.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
?>




<?php
if (isset($_POST['save_cancel'])){ 
    //Get the file No.   
    //---------------
    $first=$_POST['first'];
    $second=$_POST['second'];
    $third=$_POST['third'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $dateOfBirth=$_POST['dob'];
    $empid=$_POST['empid'];
//    $date=$_POST['date'];
//    $walk_in=$_POST['walk_in'];



//$tod =date("Y-m-d", strtotime("now"));


$bod = strtotime("$dob");
//echo $bod;
//$mtod =date("Y-m-d","$tod");


//$today = date("Y-m-d");
//$diff = date_diff(date_create($mtod), date_create($today));
//echo 'Age is '.$diff->format('%y'.'y '.'%m'.'m '.'%d'.'d');

//$ad=$diff->format('%y'.'y '.'%m'.'m '.'%d'.'d');

// $ad;

//die();
$name =$first.' '.$second.' '.$third;
if ($empid=='OVC'){
    $query5= "INSERT INTO next_ovcf VALUES('')";
    $result5 =mysql_query($query5);  
    $query3 = "select * FROM next_ovcf" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
      {
      $adm_no   = mysql_result($result3,$i3,"next_adm");  
      $adm_no   = 'OVC'.$adm_no;  
      $i3++;
      }
 }

 if ($empid=='ANC'){
    $query5= "INSERT INTO next_ancf VALUES('')";
    $result5 =mysql_query($query5);  
    $query3 = "select * FROM next_ancf" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
      {
      $adm_no   = mysql_result($result3,$i3,"next_adm");  
      $adm_no   = 'ANC'.$adm_no;  
      $i3++;
      }
 }


 if ($empid=='MAT'){
    $query5= "INSERT INTO next_matf VALUES('')";
    $result5 =mysql_query($query5);  
    $query3 = "select * FROM next_matf" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
      {
      $adm_no   = mysql_result($result3,$i3,"next_adm");  
      $adm_no   = 'MAT'.$adm_no;  
      $i3++;
      }
 }


 if ($empid=='WBC'){
    $query5= "INSERT INTO next_mchf VALUES('')";
    $result5 =mysql_query($query5);  
    $query3 = "select * FROM next_mchf" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
      {
      $adm_no   = mysql_result($result3,$i3,"next_adm");  
      $adm_no   = 'WBC'.$adm_no;  
      $i3++;
      }
 }

 if ($empid=='FP'){
    $query5= "INSERT INTO next_fpf VALUES('')";
    $result5 =mysql_query($query5);  
    $query3 = "select * FROM next_fpf" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
      {
      $adm_no   = mysql_result($result3,$i3,"next_adm");  
      $adm_no   = 'FP'.$adm_no;  
      $i3++;
      }
 }

 if ($empid=='IP'){
    $query5= "INSERT INTO next_ipf VALUES('')";
    $result5 =mysql_query($query5);  
    $query3 = "select * FROM next_ipf" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
      {
      $adm_no   = mysql_result($result3,$i3,"next_adm");  
      $adm_no   = 'IP'.$adm_no;  
      $i3++;
      }
 }

 if ($empid=='PN'){
    $query5= "INSERT INTO next_pnf VALUES('')";
    $result5 =mysql_query($query5);  
    $query3 = "select * FROM next_pnf" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
      {
      $adm_no   = mysql_result($result3,$i3,"next_adm");  
      $adm_no   = 'PN'.$adm_no;  
      $i3++;
      }
 }

 if ($empid=='RF'){
    $query5= "INSERT INTO next_rff VALUES('')";
    $result5 =mysql_query($query5);  
    $query3 = "select * FROM next_rff" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
      {
      $adm_no   = mysql_result($result3,$i3,"next_adm");  
      $adm_no   = 'RF'.$adm_no;  
      $i3++;
      }
 }

 if ($empid=='PP'){
    $query5= "INSERT INTO next_ppf VALUES('')";
    $result5 =mysql_query($query5);  
    $query3 = "select * FROM next_ppf" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
      {
      $adm_no   = mysql_result($result3,$i3,"next_adm");  
      $adm_no   = 'PP'.$adm_no;  
      $i3++;
      }
 }



 if ($empid=='HAT'){
    $query5= "INSERT INTO next_hatf VALUES('')";
    $result5 =mysql_query($query5);  
    $query3 = "select * FROM next_hatf" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
      {
      $adm_no   = mysql_result($result3,$i3,"next_adm");  
      $adm_no   = 'HAT'.$adm_no;  
      $i3++;
      }
 }

 if ($empid=='HYP'){
    $query5= "INSERT INTO next_hypf VALUES('')";
    $result5 =mysql_query($query5);  
    $query3 = "select * FROM next_hypf" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
      {
      $adm_no   = mysql_result($result3,$i3,"next_adm");  
      $adm_no   = 'HYP'.$adm_no;  
      $i3++;
      }
 }


 if ($empid=='DM'){
    $query5= "INSERT INTO next_dmf VALUES('')";
    $result5 =mysql_query($query5);  
    $query3 = "select * FROM next_dmf" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
      {
      $adm_no   = mysql_result($result3,$i3,"next_adm");  
      $adm_no   = 'DM'.$adm_no;  
      $i3++;
      }
 }



//--------------------------------ref_no--------------------------------------------
$query5= "INSERT INTO next_wkfile VALUES('')";
$result5 =mysql_query($query5);  
$query3 = "select * FROM next_wkfile" ;
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($i3 < $num3)
     {
     $next_ref   = mysql_result($result3,$i3,"next_ref");  
     $i3++;
     }

$hnext_ref = $next_ref;
//--------------------------------------------------

$date =date('Y-m-d');

$mel =date('y');
$hnext_ref =$hnext_ref.'/'.$mel;

//--------------------------------------to appointmentf--------------------------------------------

$query1= "INSERT INTO appointmentf (adm_no,name,age,sex,app_date) VALUES 
('$adm_no','$name','$bod','$gender','$date')";
$result1 =mysql_query($query1);  

//--------------------------------------to medicalfile---------------------------------------------

$query2= "INSERT INTO medicalfile (adm_no,date,age,name,sex,description,type,status,ref_no) VALUES ('$adm_no','$date','$bod','$name','$gender','Walk In Client','Walk-in','','$hnext_ref')"; 
$result2 =mysql_query($query2);

//--------------------------------------------------------------------------------------------------


}







?>
      
	




<body>
<!--div class="w3-container w3-teal">
  <h1>Update Triage Form | <font color ='yellow'>HMIS</font></h1>
</div-->
<!--img src="img_car.jpg" alt="Car" style="width:100%"-->
<!--div class="w3-container"-->










<script language="javascript" type="text/javascript">
var newwindow;
function popitup22(url) {
	newwindow=window.open(url,'newwindow','height=300,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>





<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/bills-pop-up.js"></script>

	<meta charset="utf-8" />
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
function showUser(str) { 

      var mm = document.getElementById("empid").value

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
       
        xmlhttp.open("POST","getnextadm.php?q="+str,true); 
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









<div style="width: 100%;">
  

<form action ="reg_walkin.php" method ="POST">
<?php


























$company_identity =$company_identity; 
$cdquery="SELECT client_id,patients_name FROM clients";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
$date = date('y-m-d');
//<td>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////

//echo"<br><br><table width ='100%' height ='100%'><tr><td width ='100' align ='left'><b>Doctor:</b></td><td>";
//echo"<select id='doc_account' name='doc_account'> readonly";
//$cdquery="SELECT account_name FROM doctorsfile";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//$query3 = "select * FROM suppliersfile";
//$result3 =mysql_query($query3) or die(mysql_error());
//$num3 =mysql_numrows($result3) or die(mysql_error());
//$i3=0;
//while ($cdrow=mysql_fetch_array($cdresult)) {
//      $cdTitle=$cdrow["account_name"];     
//      echo "<option>$cdTitle</option>";            
//      }
//echo"</select>";
//echo"</td></tr></table>"; 
//echo"<font color ='red'>............................................................</font>";




?>


<div class="vali-form-group">
          <div class="col-md-3 control-label">
              <label class="control-label">Adm No*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              

              <!--- New------------------------------------------------- -->

<?php 




             echo"<div id='txtHint' name='empid' title='Employee ID' class='form-control' 'placeholder='Employee ID' required=''></div>";
             
             
      
             echo"<select id ='empid' name ='empid' onchange='showUser(this.value)'>
<option value=''></option>
<option value='OVC'>OVC</option>
<option value='ANC'>ANC</option>
<option value='MAT'>MAT</option>
<option value='WBC'>WBC</option>
<option value='IP'>IP</option>";
echo"<!--option value='PN'>PN</option>";
echo"<option value='RF'>RF</option>";
echo"<option value='PP'>PP</option>";
echo"<option value='HAT'>HAT</option>";
echo"<option value='HYP'>HYP</option>";
echo"<option value='DM'>DM</option>";
echo"<option value='FP'>FP</option--></select>";
?>
 
           </div>

           <div class="col-md-4 control-label">
              
              </div>
  
  
              <div class="col-md-4 control-label">
                
              </div>
  
              
              </div>
  
                 <div class="clearfix"> </div><br>
<div class="vali-form-group">



<div class="col-md-4 control-label">
              <label class="control-label">First Name</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-mobile" aria-hidden="true"></i>
              </span>
              <input type="text" name="first" title="First Name"  class="form-control" placeholder="First Name" min="10" maxlength="10">
              </div>
            </div>


            <div class="col-md-4 control-label">
              <label class="control-label">Second Name</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-mobile" aria-hidden="true"></i>
              </span>
              <input type="text" name="second" title="Second Name" class="form-control" placeholder="Second Name" min="10" maxlength="10">
              </div>
            </div>


            <div class="col-md-4 control-label">
              <label class="control-label">Third Name</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-mobile" aria-hidden="true"></i>
              </span>
              <input type="text" name="third" title="Third Name" class="form-control" placeholder="Third Name" min="10" maxlength="10">
              </div>
            </div>

            
            </div>
            <div class="clearfix"> </div>



            <div class="vali-form-group">
            <div class="col-md-4 control-label">
              <label class="control-label">Gender*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-mobile" aria-hidden="true"></i>
              </span>
              <select id ='gender' name ='gender' required>
<option value=''></option>
<option value='M'>M</option>
<option value='F'>F</option>
<!--option value='MAT'>MAT</option>
<option value='WBC'>WBC</option>
<option value='IP'>IP</option-->";
<!--option value='PN'>PN</option>";
echo"<option value='RF'>RF</option>";
echo"<option value='PP'>PP</option>";
echo"<option value='HAT'>HAT</option>";
echo"<option value='HYP'>HYP</option>";
echo"<option value='DM'>DM</option>";
echo"<option value='FP'>FP</option--></select>
              <!--input type="text" name="mnumber" title="Date" value="<?php echo $date; ?>" class="form-control" placeholder="Mobile Number" min="10" maxlength="10"-->
              </div>
            </div>


            <!--div class="col-md-4 control-label">
              <label class="control-label">Age</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-mobile" aria-hidden="true"></i>
              </span>
              <input type="text" name="age" title="age" value="<?php echo $sex; ?>" class="form-control" placeholder="Age" min="10" maxlength="10">
              </div>
            </div-->


            <div class="col-md-4 control-label">
              <label class="control-label">Date of Birth</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-mobile" aria-hidden="true"></i>
              </span>
              <input type="date" name="dob" title="Age" class="form-control" placeholder="Mobile Number" min="10" maxlength="10">
              </div>
            </div>

            
            </div>
            <div class="clearfix"> </div><br><br>

<div class="vali-form-group">
<div class="col-md-4 control-label">
&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='save_cancel'  class='button' value='Save'>  
              </div>
  
              
              </div>
  
              <div class="clearfix"> </div>
  
<!--/form-->

</div>

<br><br>
<OBJECT data="ppp_walkin.php" type="text/html" style="margin: 0%; width: 100%; height: 670px; padding 0px; text-align:left;"></OBJECT>




   <div style="float:center;">
<p align ='centre'></p>



<!--h2>Admission Details</h2-->
<?php
//echo"<table><tr><td width ='100'><b>Adm.Date </td><td width='50' align='left'><input type='date' id ='adm_date' name='adm_date' 
// value ='$date' size='10' readonly></td></tr>";

//echo"<tr><td width ='100'><b>Dis Date.</td><td width='50' align='left'><input type='date' id ='dis_date' name='dis_date' size='10' readonly></td></tr>";

//echo"<tr><td width ='100'><b>Ward.</td><td width='50' align='left'><input type='text' id ='ward' name='ward' size='40' readonly ></td></tr>";
//echo"<tr><td width ='100'><b>Bed No.</td><td width='50' align='left'><input type='text' id ='bed_no' name='bed_no' size='40' readonly ></td></tr>";







?>
</body>
</html>

