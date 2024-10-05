<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>


    <?php
echo"<form action ='africa_talking_index.php' method ='GET'>";
if (isset($_GET['submit'])){    
   $mydate =date('y-m-d');
   $date  = $_GET['date'];
   $time1  = $_GET['time1'];
   $time2   = $_GET['time2'];
   $time3  = $_GET['time3'];
   $time4   = $_GET['time4'];
   $message = $_GET['textarea'];
   $doctor = $_GET['doctor'];

    // Be sure to include the file you've just downloaded
    require_once('AfricasTalkingGateway.php');
    // Specify your login credentials
    $username   = "benardwere";
    $apikey     = "2ad49f22d58c8bb9ec73cc32eb4c87d051f1afa19253311c8f8f95991f31e629";
    // Specify the numbers that you want to send to in a comma-separated list
    // Please ensure you include the country code (+254 for Kenya in this case)
    $recipients = $_SESSION['sms_contacts'];
    // And of course we want our recipients to know what we really do
    //----- automated $message    = "Testing API from Africa Talking testing 2";
    $message ='Dear Patient, We wish to kindly remind you of your appoinment with Dr.'.$doctor.' on '.$date.' He/She will be in office between '.$time1.' - '.$time3. ' and '.$time2.' - '.$time4.' Thank you. For Dr. F.Njenga and Nguithi Associates';
    
    // Create a new instance of our awesome gateway class
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    // Any gateway error will be captured by our custom Exception class below, 
    // so wrap the call in a try-catch block
    try 
    { 
      // Thats it, hit send and we'll take care of the rest. 
      $results = $gateway->sendMessage($recipients, $message);
                
      foreach($results as $result) {
        // status is either "Success" or "error message"
        echo " Number: " .$result->number;
        echo " Status: " .$result->status;
        echo " MessageId: " .$result->messageId;
        echo " Cost: "   .$result->cost."\n";
      }
    }
    catch ( AfricasTalkingGatewayException $e )
    {
      echo "Encountered an error while sending: ".$e->getMessage();
    }
}

echo"<table width ='100%'><td align ='center'><h1><font color ='blue'>Automatic Patients SMS</h1></font></td></table><br>";
echo"<tr>";

echo"<table><tr><td width ='100'><b>Doctor:</td><td width='50' align='left'><input id='doctor' name='doctor' required='required' type='text' placeholder='' size ='30' /></td><td width ='250'></td><td width ='50'></td></tr>";
echo"<tr><td width ='100'><b>App. Date:</td><td width='50' align='left'><input id='date' name='date' required='required' type='date' placeholder='' size ='15' /></td></tr></table>";
echo"<table><tr><td width ='100'></td><td width='100' align='left'><b><u>Morning Time</u></td><td width ='250'></td><td width='100' align='left'><b><u><font color ='red'>Afternoon </u></font></td></tr></table>";

echo"<table><tr><td width ='100'><b>From:</td><td width='50' align='left'><input id='time1' name='time1' required='required' type='text' placeholder='' size ='15' /></td><td width ='250'></td><td width='50' align='left'><input id='time2' name='time2' required='required' type='text' placeholder='' size ='15' /></td></tr>";
echo"<tr><td width ='100'><b>To:</td><td width='50' align='left'><input id='time3' name='time3' required='required' type='text' placeholder='' size ='15' /></td><td width ='250'></td><td width='50' align='left'><input id='time4' name='time4' required='required' type='text' placeholder='' size ='15' /></td></tr></table><br>";

echo"<h2>Reminder Notes:</h2>";
echo"<textarea rows='10' cols='80' id='textarea' name='textarea'>Kinly write your success for the day here</textarea>"; 

echo'<br>';
echo"<table width ='240' align ='center' border ='0'><td align ='center'><input type='submit' name='submit'  class='button' value='SEND SMS'></td></table>";

    // DONE!!! 