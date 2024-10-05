<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>



728/17

<?php
echo"<form action ='sms_patients.php' method ='GET'>";
if (isset($_GET['submit'])){ 

   $mydate =date('y-m-d');
   $date   =$_GET['date'];
   $message = $_GET['comment'];
   $app_date= $_GET['app_date'];

   $query3 = "select * FROM appointmentf where nhif_no ='$app_date'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   $first ='yes';
   $numbers ='';
   while ($i3 < $num3)
     {
     $recipients2   = mysql_result($result3,$i3,"telephone");  
     $name          = mysql_result($result3,$i3,"name");  
     if ($first=='yes'){
        $recipients = '+254'.$recipients2;
     }else{
        $recipients2 = ",+254".$recipients2;
        $recipients = $recipients.$recipients2;
        $first ='no';
     }
     $numbers = $numbers.','.'+254'.$recipients2;
     $i3++;
     }
     if ($recipients ==''){
        echo"<h4>No Patient with correct telephone number. Please update and try again....</h4>";  
        echo"<a href='sms_patients.php'>Go Back....</a>";
        die();
     }
   
//     echo $numbers;
     $recipients=$numbers;

    // Be sure to include the file you've just downloaded
    require_once('AfricasTalkingGateway.php');
    // Specify your login credentials
    $username   = "benardwere";
    $apikey     = "2ad49f22d58c8bb9ec73cc32eb4c87d051f1afa19253311c8f8f95991f31e629";
    // Specify the numbers that you want to send to in a comma-separated list
    // Please ensure you include the country code (+254 for Kenya in this case)
    //$recipients = $_SESSION['sms_contacts'];
    // And of course we want our recipients to know what we really do
    //----- automated $message    = "Testing API from Africa Talking testing 2";
    //$message =$m'Dear Patient, We wish to kindly remind you of your appoinment with Dr.'.$doctor.' on '.$date.' He/She will be in office 
    //between '.$time1.' - '.$time3. ' and '.$time2.' - '.$time4.' Thank you. For Dr. F.Njenga and Nguithi Associates';
    
    // Create a new instance of our awesome gateway class
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    // Any gateway error will be captured by our custom Exception class below, 
    // so wrap the call in a try-catch block
    try 
    { 
      // Thats it, hit send and we'll take care of the rest. 
      $results = $gateway->sendMessage($recipients, $message);
    
//Block Error messages and showing the clients SMS cost
//-----------------------------------------------------            
//      foreach($results as $result) {
//        // status is either "Success" or "error message"
//        echo " Number: " .$result->number;
//        echo " Status: " .$result->status;
//        echo " MessageId: " .$result->messageId;
//        echo " Cost: "   .$result->cost."\n";
//      }
//-----------------------------------------------------
    }
    catch ( AfricasTalkingGatewayException $e )
    {
      echo "Encountered an error while sending: ".$e->getMessage();
    }
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Appointments Ledger </title>
<head>




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






<script>
function book_suggestion()
{
var book = document.getElementById("book").value;
var xhr;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
var data = "book_name=" + book;
     xhr.open("GET", "getappointment.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(data);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
       //alert(xhr.responseText);	   
	  document.getElementById("suggestion").innerHTML = xhr.responseText;
      } else {
        alert('There was a problem with the request.');
      }
     }
	}
}
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
















<br><br><br>









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
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getappointment.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>



</head>
<body>
<a href="javascript:popcontact('patient_register.php')"><span>Book Appointment</span></a><br>
<!--a href="javascript:popcontact('revenue_register.php')"><span>Print Appointments</span></a-->
<br><br>
Appointment: <input type='date' name='date' size ='10' onchange='showUser(this.value)'>
</form>
<br><br>
<div id="txtHint"><b>Person info will be listed here...</b></div>




<?php
//date_default_timezone_set('Africa/Nairobi');
//$date_time = date('m/d/Y h:i:s a', time());
if (isset($_GET['save_cancel'])){

   //Go and save first
   //------------------
   $adm_no=$_GET['id'];
   $date=$_GET['date'];
   $doctor = $_GET['doc_account'];
   $customer =$_GET['customer'];
   $telephone=$_GET['tel'];
   $email =$_GET['email'];
   $appointment =$_GET['date'];
   $adm_date =$_GET['adm_date'];
   $dis_date =$_GET['dis_date'];
   $kin =$_GET['kin'];
   $kin_tel =$_GET['kin_tel'];
   $status =$_GET['status'];
   $payer =$_GET['db_account'];
   $ward =$_GET['ward'];
   $bed_no =$_GET['bed_no'];

   $id_no   =$_get['id_no'];
   $nextid_no   =$_get['nextid_no'];
   $nhif_no     =$_get['nhif_no'];
   $subchief    =$_get['subchief'];
   $chief       =$_get['chief'];
   $village     =$_get['village'];
   $sublocation =$_get['sublocation'];

   //$textarea =$_GET['textarea'];
   $service = $_GET['service'];
   $sex =$_GET['sex'];
   $age =$_GET['age'];
   $today =date('y-m-d');
   $type ='Outpatient';
   if ($payer==''){
      $status ='To cash office';
   }else{
      $status ='';
   }

   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");  
     $i3++;
     }
     $next_ref= $ref_no +1;

     $query4  = "UPDATE companyfile SET next_ref ='$next_ref'";
     $result4 = mysql_query($query4);


   //Go and dabit gltransf A/c
   //-------------------------
$query5= "UPDATE appointmentf SET 
name ='$customer',telephone='$telephone',email='$email',doctor='$doctor',app_date='$today',kin='$kin',
kin_tel='$kin_tel',adm_date='$adm_date',dis_date='$dis_date',status='$status',payer='$payer',other_info='$textarea',age='$age',sex='$sex',image_id='$telephone',ward='$ward',bed_no='$bed_no',nextid_no ='$nextid_no',nhif_no ='$nhif_no',subchief='$subchief',chief='$chief',village='$village',sublocation ='$sublocation',id_no ='$id_no' WHERE adm_no ='$adm_no'";

   $result5 =mysql_query($query5);  

if (isset($_GET['service'])){
   $query3 = "select * FROM revenuef WHERE name ='$service'" ;
   $result3 = mysql_query($query3) or die(mysql_error());
   $num3    = mysql_numrows($result3) or die(mysql_error());
   $i=0;
   while ($i < $num3)
     {
     $cash_price      = mysql_result($result3,$i,"cash_rate");          
     $credit_price    = mysql_result($result3,$i,"credit_rate");   
     $gledger_acc     = mysql_result($result3,$i,"gl_account");   
     $i++;
   }
   if ($payer==''){
      $price = $cash_price;
   }else{
      $price = $cash_price;
   }
   
   $query2 = "select * FROM medicalfile where date = '$today'" ;
   $result2 =mysql_query($query2) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num2 =mysql_numrows($result2) or die(mysql_error());
   $i2 =0;
   $insert ='Yes';
   $drug_total = 0;
   while ($i2 < $num2)
   {                  
      $adm_no_find   = mysql_result($result2,$i2,"adm_no");
      if ($adm_no ==$adm_no_find){
         $insert ='No';
      }
   $i2++;
   }
   if ($insert=='Yes'){
      $query= "INSERT INTO medicalfile (adm_no,gl_account,date,age,name,sex,description,sell_price,type,status,ref_no) VALUES ('$adm_no','$payer','$today','$age','$customer','$sex','Follow up consultation','$price','$type','$status','$next_ref')"; 
  $result =mysql_query($query);

   if ($payer==''){
      $status ='To Cash Office';
      //This is a credit sale and no need to save in cash file
      //------------------------------------------------------
   $query5= "INSERT INTO auto_transact VALUES('','$company_identity','$service','$price','1','$price','$customer',
'$today','$adm_no','','$next_ref')";
   $result5 =mysql_query($query5);  
   }else{
   $status =' ';
   $query5= "INSERT INTO auto_transact_inv VALUES('','$company_identity','$service','$price','1','$price','$customer',
'$today','$adm_no','','$next_ref')";
   $result5 =mysql_query($query5);  
   }
  }
   $query5= "UPDATE medicalfile SET status='$status' WHERE ref_no ='$next_ref'";
   $result5 =mysql_query($query5);  

   $query5= "UPDATE appointmentf SET status='$status' WHERE adm_no ='$adm_no'";
   $result5 =mysql_query($query5);  
   //Now go and update h_transf and hdnotef coz of insurance
   //-------------------------------------------------------

 $query5= "INSERT INTO hdnotef VALUES('$adm_no','$customer','$today','$next_ref','$today','','$price','$price','$payer','$location',
'$username')";
 $result5 =mysql_query($query5);

}
 

}
?>




<?php
$mleast =123552620;
$mdate =date('y-m-d');


$tot =0;
$i = 0;

                                                         

?>
</body>
</html>

