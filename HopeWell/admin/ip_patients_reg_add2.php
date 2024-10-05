<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
?>


<?php
//date_default_timezone_set('Africa/Nairobi');
//$date_time = date('m/d/Y h:i:s a', time());
//Get the file No.   
//---------------
$query3 = "select * FROM companyfile" ;
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($i3 < $num3)
  {
  $adm_no   = mysql_result($result3,$i3,"next_adm");  
  $i3++;
  }

$tod  = date("y-m-d g:i:s", strtotime("now"));
$tod = strtotime("now");
$times =$tod-10800;
if (isset($_GET['save_cancel'])){ 
   //Get the file No.   
   //---------------
   $date=$_GET['date'];
   $walk_in=$_GET['walk_in'];
   $doctor = $_GET['doc_account'];
   $customer1 =$_GET['name1'];
   $customer2 =$_GET['name2'];
   $customer =$_GET['customer'];
   $telephone=$_GET['tel'];
   $email =$_GET['email'];
   $appointment =$_GET['date'];
   $customer =$customer1.' '.$customer2.' '.$customer;
   
   $customer = preg_replace('/\s+/', ' ', $customer);
   if ($email=='GOP'){
      $adm_no ='O'.$adm_no;
   }
   if ($email=='ANC'){
      $adm_no ='ANC'.$adm_no;
   }
   if ($email=='MAT'){
      $adm_no ='MAT'.$adm_no;
   }
   if ($email=='FP'){
      $adm_no ='FP'.$adm_no;
   }
   if ($email=='MCH'){
      $adm_no ='MCH'.$adm_no;
   }
   $kin =$_GET['kin'];
   $kin_tel =$_GET['kin_tel'];
   $pat_type =$_GET['pat_type'];
   $adm_date =$_GET['adm_date'];
   $dis_date =$_GET['dis_date'];
   $ward =$_GET['ward'];
   $bed_no =$_GET['bed_no'];
   $status =$_GET['status'];
   $payer =$_GET['db_account'];
   $textarea =$_GET['textarea'];
   $sex =$_GET['sex'];
   $age =$_GET['age'];
   $today =date('y-m-d');
   $today = $_SESSION["log_date"];
   $yob =$_GET['dob'];
   $service = $_GET['consfee'];
   $id_no   =$_GET['id_no'];
   $nextid_no   =$_GET['nextid_no'];
   $nhif_no     =$_GET['nhif_no'];
   $subchief    =$_GET['subchief'];
   $chief       =$_GET['chief'];
   $village     =$_GET['village'];
   $sublocation =$_GET['sublocation'];
   $charge =$_GET['charge'];
   $consultation =$_GET['consfee'];
   $pat_type='Outpatient';
   if (isset($_GET['walk_in'])){ 
      $pat_type='Walk-in';
   }
   $customer_prefix = substr($customer,0,1);
   $status ='To Ward';
   $query3 = "select * FROM bedsfile where adm_no ='$customer_prefix'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $adm_no   = mysql_result($result3,$i3,"next_no");  
     $i3++;
     }
     $ref_no2 = $adm_no +1;
     $next_ref= $ref_no +1;
     $query4  = "UPDATE bedsfile SET next_no ='$ref_no2' where adm_no ='$customer_prefix'";
     $result4 = mysql_query($query4);

   //Go and save first
   //-------------------


   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $next_ref   = mysql_result($result3,$i3,"next_ref");  
     $next_adm   = mysql_result($result3,$i3,"next_adm");  
     $next_anc   = mysql_result($result3,$i3,"next_wbc");  
     $next_mat   = mysql_result($result3,$i3,"next_mat");  
     $next_fp   = mysql_result($result3,$i3,"next_fp");  
     $next_ip   = mysql_result($result3,$i3,"next_ip");  

     $i3++;
     }
     $next_refs = $next_ref +1; 

     if ($email=='GOP'){
        $query5= "INSERT INTO next_opdf VALUES('')";
        $result5 =mysql_query($query5);  
        $query3 = "select * FROM next_opdf" ;
        $result3 =mysql_query($query3) or die(mysql_error());
        $num3 =mysql_numrows($result3) or die(mysql_error());
        $i3=0;
        while ($i3 < $num3)
          {
          $adm_no   = mysql_result($result3,$i3,"next_adm");  
          $adm_no   = 'GOP'.$adm_no;  
          $i3++;
          }
     }

     if ($email=='ANC'){
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

 
     if ($email=='MAT'){
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


     if ($email=='WBC'){
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

     if ($email=='FP'){
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

     if ($email=='IP'){
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

     if ($email=='PN'){
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

     if ($email=='RF'){
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

     if ($email=='PP'){
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



     if ($email=='HAT'){
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

     if ($email=='HYP'){
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


     if ($email=='DM'){
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


     $query4  = "UPDATE companyfile SET next_ref ='$next_refs'";
     $result4 = mysql_query($query4);

     if ($mail=='GOP'){
        $query4  = "UPDATE companyfile SET next_adm ='$next_adms'";
        $result4 = mysql_query($query4);
     }

     if ($mail=='ANC'){
        $query4  = "UPDATE companyfile SET next_wbc ='$next_adms'";
        $result4 = mysql_query($query4);
     }

     if ($mail=='MAT' or $mail=='MCH'){
        $query4  = "UPDATE companyfile SET next_mat ='$next_adms'";
        $result4 = mysql_query($query4);
     }

     if ($mail=='FP'){
        $query4  = "UPDATE companyfile SET next_fp='$next_adms'";
        $result4 = mysql_query($query4);
     }

     if ($mail=='IP'){
        $query4  = "UPDATE companyfile SET next_ip='$next_adms'";
        $result4 = mysql_query($query4);
     }

     //Asign visit Number
     //------------------
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
     //$next_ref = 'L'.$next_ref;
     //Go and dabit gltransf A/c
     //-------------------------
     //$adm_no = $customer_prefix.$adm_no;

     $today = $_SESSION["log_date"];
     $today = substr($today,0,10);
     $appointment = substr($today,0,10);
     $adm_date = substr($today,0,10);

   

 //Update appoinment file
 //----------------------
 $query5= "INSERT INTO auto_transact_app VALUES('','Lab','$telephone','$price','1','$price','$customer',
'$today','$adm_no','','$next_ref')";
     $result5 =mysql_query($query5);  
$add_new =0;
   //Now go and post entry in the auto-cash file
   //-------------------------------------------
   
if (isset($_GET['consfee'])){ 
   $consultation =$_GET['consfee'];
   $service =$_GET['consfee'];
   
   
   $query3 = "select * FROM revenuef WHERE name ='$consultation'" ;
   $result3 = mysql_query($query3);
   $num3    = mysql_numrows($result3);
   $i=0;
   while ($i < $num3)
     {
      $cash_price      = mysql_result($result3,$i,"cash_rate");          
      $credit_price    = mysql_result($result3,$i,"credit_rate");   
      $gledger_acc     = mysql_result($result3,$i,"gl_account");   
      $i++;
    }
   if ($payer==''){
      $price = $cash_price+$add_new;
   }else{
      $price = $credit_price+$add_new;
   }
   $service =$consultation;
   if ($gledger_acc =='DOCTORS FEE'){
       $doc_type =$consultation;
   }else{
       $doc_type ='GENERAL DR.';
   }
   
   $query5= "INSERT INTO appointmentf VALUES('','$customer','$telephone','$email','$doctor','$adm_date','',
'$ward','$bed_no','In-Ward','$payer','$doc_type','$age','$sex',
'$today','','$weight','$temp','$next_ref','$height','$kin','$kin_tel','$adm_no','$id_no','$nextid_no','$nhif_no','$next_ref','$times','$village','$yob')";
   $result5 =mysql_query($query5);  




 $query= "INSERT INTO medicalfile (location,adm_no,gl_account,date,age,name,sex,description,
sell_price,type,status,ref_no,doctor,next_app,dose7,type,test1_qty) VALUES ('New','$adm_no','$payer','$today','$age','$customer','$sex','CONSULTATION FEE','$price',
'$pat_type','$status','$next_ref','$time','$time',
'$times','Inpatient','$subchief')"; 
$result =mysql_query($query);



   
   if ($payer==''){
      $status ='To Ward';
      //Save here only if cash paying else save in invoices file
      //--------------------------------------------------------
     $query5= "INSERT INTO auto_transact VALUES('','Hosp','$service','$price','1','$price','$customer','$today','$adm_no','pay','$hnext_ref','')";
     $result5 =mysql_query($query5);  
     }else{
      $status ='To Ward';
     $query5= "INSERT INTO auto_transact_inv VALUES('','Hosp','$service','$price','1','$price','$customer','$today','$adm_no','pay','$hnext_ref','')";
     $result5 =mysql_query($query5);  
     }
    
 $query5= "INSERT INTO hdnotef2 VALUES('$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location',
'$username')";
 $result5 =mysql_query($query5);

//$walk_in

//Now go and update h_transf and hdnotef coz of insurance
//-------------------------------------------------------
//$query5= "INSERT INTO hdnotef VALUES('$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location',
//'$username')";
//$result5 =mysql_query($query5);

$query5= "INSERT INTO htransf VALUES('','$adm_no','$customer','$today','$next_ref','$service','DB','$price','$today','$gledger_acc','IP/OPD','','$username','','$today','1','$location')";
 $result5 =mysql_query($query5);


 //go and insert in beds file
 //--------------------------
 //if (isset($_GET['bed_no']) and $pat_type=='Inpatient'){
 //    $query4  = "UPDATE bedsfile SET adm_no ='$adm_no',patients_name='$customer' where bed_no ='$bed_no'";
 //    $result4 = mysql_query($query4);

//$time = date('y-m-d h:i:s a', time());
 $time = date("Y-m-d H:i:s");
$time = $_SESSION["log_date"];


 //Now go and update admit file
 //----------------------------
 $query5= "INSERT INTO logfile VALUES('$time','$customer','$username','Registration')";
 $result5 =mysql_query($query5);
}




 $query= "INSERT INTO medicalfile (location,adm_no,gl_account,date,age,name,sex,description,sell_price,type,status,ref_no,doctor,next_app,dose7,diag1) VALUES ('New','$adm_no','$payer','$today','$age','$customer','$sex','CONSULTATION FEE','$price','Inpatient','To Ward','$next_ref','$time','$time','$times','Admitted')"; 
$result =mysql_query($query);



//Now go and delete all records from next file files
//--------------------------------------------------
//$query3 = "DELETE FROM next_dmf WHERE next_adm > 0";
//$result3 =mysql_query($query3) or die(mysql_error());

//$query3 = "DELETE FROM next_hypf WHERE next_adm > 0";
//$result3 =mysql_query($query3) or die(mysql_error());

//$query3 = "DELETE FROM next_hatf WHERE next_adm > 0";
//$result3 =mysql_query($query3) or die(mysql_error());

//$query3 = "DELETE FROM next_ppf WHERE next_adm > 0";
//$result3 =mysql_query($query3) or die(mysql_error());

//$query3 = "DELETE FROM next_rff WHERE next_adm > 0";
//$result3 =mysql_query($query3) or die(mysql_error());

//$query3 = "DELETE FROM next_pnf WHERE next_adm > 0";
//$result3 =mysql_query($query3) or die(mysql_error());

//$query3 = "DELETE FROM next_ipf WHERE next_adm > 0";
//$result3 =mysql_query($query3) or die(mysql_error());

//$query3 = "DELETE FROM next_fpf WHERE next_adm > 0";
//$result3 =mysql_query($query3) or die(mysql_error());

//$query3 = "DELETE FROM next_mchf WHERE next_adm > 0";
//$result3 =mysql_query($query3) or die(mysql_error());

//$query3 = "DELETE FROM next_matf WHERE next_adm > 0";
//$result3 =mysql_query($query3) or die(mysql_error());

//$query3 = "DELETE FROM next_ancf WHERE next_adm > 0";
//$result3 =mysql_query($query3) or die(mysql_error());

//$query3 = "DELETE FROM next_opdf WHERE next_adm > 0";
//$result3 =mysql_query($query3) or die(mysql_error());



}
?>



<?php
if (isset($_GET['account3'])){ 
   $tooth = $_GET['account3'];
   $adm_no = $_GET['account'];
   //$result3 = mysql_query($query3);
}


if (isset($_GET['accounts3']) OR isset($_GET['account3'])){    
   if (isset($_GET['accounts3'])){
      $adm_no  = $_GET['accounts3'];
   }
   $SQL= "SELECT * FROM appointmentf where id ='$adm_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $query= "SELECT * FROM appointmentf where id ='$adm_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;

   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      { 
      $id      = mysql_result($result,$i,"id");          
      $doctor  = mysql_result($result,$i,"doctor");   
      $appointment = mysql_result($result,$i,"app_date");   
      $name        = mysql_result($result,$i,"name");   
      $date        = mysql_result($result,$i,"app_date");  
      $telephone   = mysql_result($result,$i,"telephone");  
      $status      = mysql_result($result,$i,"status");  
      $sex         = mysql_result($result,$i,"sex");  
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"payer");  
      $textarea    = mysql_result($result,$i,"other_info");  
      $time        = mysql_result($result,$i,"start_time");  
      $email       = mysql_result($result,$i,"email");  
      $image_id = mysql_result($result,$i,"image_id"); 

   }
}

?>



<!DOCTYPE html>
<html>







<!--title>HMIS Global | Paltech System Consultants</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<style type="text/css"-->

</style>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">





<body>
<!--div class="w3-container w3-teal">
  <h1>Registration Form | <font color ='red'>HMIS</font></h1>
</div-->
<!--img src="img_car.jpg" alt="Car" style="width:100%"-->
<div class="w3-container">







<!--CSS style starts from here -->
<style type="text/css">
.form-style-9{
	max-width: 950px;
	background: #FAFAFA;
	padding: 30px;
	margin: 50px auto;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid #305A72;
}
.form-style-9 ul{
	padding:0;
	margin:0;
	list-style:none;
}
.form-style-9 ul li{
	display: block;
	margin-bottom: 10px;
	min-height: 35px;
}
.form-style-9 ul li  .field-style{
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	padding: 8px;
	outline: none;
	border: 1px solid #B0CFE0;
	-webkit-transition: all 0.30s ease-in-out;
	-moz-transition: all 0.30s ease-in-out;
	-ms-transition: all 0.30s ease-in-out;
	-o-transition: all 0.30s ease-in-out;

}.form-style-9 ul li  .field-style:focus{
	box-shadow: 0 0 5px #B0CFE0;
	border:1px solid #B0CFE0;
}
.form-style-9 ul li .field-split{
	width: 49%;
}
.form-style-9 ul li .field-full{
	width: 100%;
}
.form-style-9 ul li input.align-left{
	float:left;
}
.form-style-9 ul li input.align-right{
	float:right;
}
.form-style-9 ul li textarea{
	width: 100%;
	height: 100px;
}
.form-style-9 ul li input[type="button"], 
.form-style-9 ul li input[type="submit"] {
	-moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
	-webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
	box-shadow: inset 0px 1px 0px 0px #3985B1;
	background-color: #216288;
	border: 1px solid #17445E;
	display: inline-block;
	cursor: pointer;
	color: #FFFFFF;
	padding: 8px 18px;
	text-decoration: none;
	font: 12px Arial, Helvetica, sans-serif;
}
.form-style-9 ul li input[type="button"]:hover, 
.form-style-9 ul li input[type="submit"]:hover {
	background: linear-gradient(to bottom, #2D77A2 5%, #337DA8 100%);
	background-color: #28739E;
}
</style>
<!--CSS style ends here -->




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
function myage2() {
    var d = document.getElementById('dobs').value;
    var n = document.getElementById('dobs').value;
    var age1 = document.getElementById('dob').value;   

    txt2 = n;
    document.getElementById("age").value = txt2;
}
</script>

<script>
function myage() {
    var d = new Date();
    var n = d.getFullYear();
    var age1 = document.getElementById('dob').value;   

    txt2 = n - age1;
    document.getElementById("age").value = txt2;
}
</script>









<script>
function showUser2(str) {    
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
    var mm = document.getElementById("email").value
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
        xmlhttp.open("GET","getnextadm.php?q="+str,true);
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
   <div style="float:left; width: 100%">
<h1>In Patient register</h1>
<form action ="ip_patients_reg_add2.php" method ="GET" class="form-style-9">
<?php


$company_identity =$company_identity; 
$cdquery="SELECT client_id,patients_name FROM clients";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());           
$date = date('y-m-d');
//<td>";




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////

//echo"<table width ='100%' height ='100%'><tr><td width ='100' align ='left'><b>Doctor:</b></td><td>";
//echo"<select id='doc_account' name='doc_account'>";
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

echo"<table width ='100%' border ='0'>";

//echo"<tr><td width ='50'><b><font color='green'>Reg. No:</font></b></td><td width='50' align='left'><input type='text' id ='id' name='id' value='$adm_no' size='20' readonly></td><td></td><td></td></tr>";
echo"<tr><td width ='50'><b><font color='green'>First Name:</font></b></td><td width='50' align='left'><input type='text' id ='name1' name='name1' size='30' class='field-style field-split align-left' required><font color='red'><b>*</b></font></td><td></td><td></td></tr>";
echo"<tr><td width ='50'><b><font color='green'>Second Name:</font></b></td><td width='50' align='left'><input type='text' id ='name2' name='name2' size='30' required></td><td></td><td></td></tr>";

echo"<tr><td width ='50'><font color='green'><b>Last Name:</b><font color ='yellow'>*</font></td><td width='50' align='left'><input type='text' id ='customer' name='customer' size='50' required></td><td></td><td></td></tr>";
echo"<tr><td width ='50'><font color='green'><b>YOB:</b><font color ='yellow'>*</font></td><td width='50' align='left'><input type='text' id ='dob' name='dob' size='20' onchange='myage()'></td><td width ='30'><b>Month/Days</td><td><input type='text' id ='dobs' name='dobs' size='10' onchange='myage2()'><td width='20' align='left'></td></tr>";

echo"<tr><td width ='100'><font color='green'><b>Age.</b><font color ='red'>*</font></td><td width='50' align='left'><input type='text' id ='age' name='age'  
 size='10' required></td><td width ='100'><b>Sex<font color ='red'>*</font></td><td width='50' align='left'>";



echo"<select id ='sex' name ='sex'>";
echo"<option value=''></option>";
echo"<option value='M'>M</option>";
echo"<option value='F'>F</option></select>";
echo"</td></tr>";



echo"<tr><td width ='100'><font color='green'><b>ID No.</b><font color ='red'>*</font></td><td width='50' align='left'><input type='text' id ='id_no' name='id_no' size='20' ></td><td width ='100'><b>NHIF No.</td><td width='50' align='left'><input type='text' id ='nhif_no' name='nhif_no'  
  size='20' ></td></tr>";


echo"<tr><td width ='50'><font color='green'><b>Telephone:</b></font></td><td width='50' align='left'><input type='text' id ='tel' name='tel'   size='20' ></td><td width ='50'><b><div id='txtHint'><b>Type</b></div></b></td><td width='50' align='left'>";
echo"<select id ='email' name ='email' onchange='showUser(this.value)' required>";
echo"<option value=''></option>";
echo"<option value='MAT'>MAT</option>";
echo"<option value='IP'>IP</option>";
echo"<option value='RF'>RF</option></select>";

echo"</td></tr>";



//<!--input type='text' id ='email' name='email'  size='30' //-->

//echo"<tr><td width ='50'><font color='green'><b>Village:</b></font></td><td width='50' align='left'><input type='text' id ='village' name='village' //size='40' readonly></td><td width ='50'><b>Sub-Location:</b></td><td width='40' align='left'><input type='text' id ='sublocation' name='sublocation'  //size='40' readonly></td></tr>";

//echo"<tr><td width ='50'><font color='green'><b>Sub-Chief:</b></font></td><td width='50' align='left'><input type='text' id ='subchief' name='subchief' //size='40' readonly></td><td width ='50'><b>Chief:</b></td><td width='40' align='left'><input type='text' id ='chief' name='chief'  size='40' readonly>//</td></tr>";

echo"<tr><td width ='100'><font color='green'><b>Next/Kin</font></td><td width='100' align='left'><input type='text' id ='kin' name='kin'  
 size='50' ></td><td><b>Residence:</b></td><td><input type='text' id ='village' name='village'  
 size='30' ></td></tr>";

echo"<tr><td width ='100'><font color='green'><b>Kin Tel:</font></td><td width='100' align='left'><input type='text' id ='kin_tel' name='kin_tel'  
  size='50' ></td><td width ='100'><b>ID No.</b><font color ='red'>*</font></td><td width='50' align='left'><input type='text' id ='nextid_no' name='nextid_no' size='20'></td></tr>";

$appointment =$_SESSION['sys_date'];
//$appointment = date('y-m-d');
echo"<tr><td width ='100'><font color='green'><b>Last Visit</font></td><td width='50' align='left'><input type='text' id ='date' name='date'  
 value='$appointment' size='10' ></td>";


echo"<td width ='100' align ='left' border ='3'><b>Paying A/c:</b></td><td>";
echo"<select id='db_account' name='db_account' required>";
$cdquery="SELECT account_name FROM debtorsfile order by account_name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM suppliersfile order by account_name";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";
echo"</td></tr>";


echo"<tr>";
echo"<td width ='100' align ='left' border ='3'><b>Consultation:</b></td><td>";
echo"<select id='consfee' name='consfee' required>";
$cdquery="SELECT name,gl_account FROM revenuef where (gl_account = 'DOCTORS FEE' or gl_account ='CONSULTATION INCOME') order by name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM suppliersfile order by account_name";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select></td>";
echo"<td><b>Insuarance Limit:</b></td><td><input type='text' id ='subchief' name='subchief'  
 size='30' ></td></tr>";


echo"<tr><td width ='50'></td><td width='50' align='left'></td><td></td><td></td></tr>";
echo"<tr><td width ='50'></td><td width='50' align='left'></td><td></td><td></td></tr>";

//echo"<tr><td width ='50'><font color='green'><b><font color ='red'>Walk in:</font></b></font></td><td width='50' align='left'><input type='checkbox' name='walk_in' id='walk_in' value ='bar'/></td><td></td><td></td></tr>";

echo"<tr><td width ='50'><font color='green'><b>Charge Consultation:</b></font></td><td width='50' align='left'><input type='checkbox' name='charge' id='charge' value ='charge' checked='checked' readonly></td><td></td><td></td></tr></table>";


?>




<?php

?>
<br><br>
<input type='submit' name='save_cancel'  class='button' value='Save'>
<input type="submit" name="Submit"  class="button" value="Attach Scan" onclick="return popitup22('upload_form.php')"/>

<!--/form-->

</div>
   <div style="float:center;">
<p align ='centre'></p>



<!--h2>Admission Details</h2-->
<?php
//echo"<table><tr><td width ='100'><b>Adm.Date </td><td width='50' align='left'><input type='date' id ='adm_date' name='adm_date' 
// value ='$date' size='10' ></td></tr>";

//echo"<tr><td width ='100'><b>Dis Date.</td><td width='50' align='left'><input type='date' id ='dis_date' name='dis_date' size='10' ></td></tr>";

//echo"<tr><td width ='100'><b>Ward.</td><td width='50' align='left'><input type='text' id ='ward' name='ward' size='40' ></td></tr>";

//echo"<tr><td width ='100' align ='left' border ='3'><b>Bed/Ward:</b></td><td>";
//echo"<select id='bed_no' name='bed_no'>";
//$cdquery="SELECT bed_no FROM bedsfile where patients_name =''";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//$query3 = "select * FROM bedsfile where patients_name =''";
//$result3 =mysql_query($query3) or die(mysql_error());
//$num3 =mysql_numrows($result3) or die(mysql_error());
//$i3=0;
//while ($cdrow=mysql_fetch_array($cdresult)) {
//      $cdTitle=$cdrow["bed_no"];     
//      echo "<option>$cdTitle</option>";            
//      }
//echo"</select>";
//echo"</td></tr>"; 



//echo"<tr><td width ='100'><b>Appt. Status:</td><td width='50' align='left'>";
//echo"<select id ='status' name='status'>";
//echo"<option value='To cash office'>To cash office</option>";
//echo"<option value='To Triage'>To Triage</option>";
//echo"<option value='To Laboratory'>To Laboratory</option>";
//echo"<option value='To Pharmacy'>To Pharmacy</option>";
//echo"<option value='To Doctor'>To Doctor</option>";
//echo"<option value='To Radiology'>To Radiology</option>";
//echo"<option value='To Specialist'>To Specialist</option>";
//echo"<option value='To Ward'>To Ward</option>";
//echo"<option value='Completed'>Completed</option>";
//echo"</select></td></tr>";


//Select the trans type if cash,cheque,visa or any other
//------------------------------------------------------
//echo"<tr><td width ='100' align ='left' border ='3'><b>Paying A/c:</b></td><td>";
//echo"<select id='db_account' name='db_account'>";
//$cdquery="SELECT account_name FROM debtorsfile";
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
//echo"</td></tr>"; 


//echo"<tr><td width ='50'></td><td width='10' align='left'><h5><font color ='blue'>Treatment</font></h5><textarea rows='10' cols='50' >$textarea</textarea>//</td></tr>";
echo"</table>";


?>







<p align ='centre'>
<table align='center'><td align ='center'>
<?php
//$ids ="uploads".'/'.$id.'s.jpg';
$ids ="uploads".'/'.$image_id.'s.jpg';

//echo $ids;

//echo"<img src=$ids alt='scan' style='width:100%'>";
?>









</p>
   </div>
</div>
<div style="clear:both"></div>
</form>











</div>
<div class="w3-container w3-teal">






  <!--p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p-->
</div>

</body>
</html>