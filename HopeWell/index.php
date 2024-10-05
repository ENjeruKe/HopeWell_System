

<?php
//echo"System was down...Kindly call 0722536829 to report the system is back";
//die();
date_default_timezone_set("Africa/Nairobi"); 
ini_set('date.timezone','Africa/Nairobi');

$now = time();
$twoPm = mktime(14); // first argument is HOUR

//if ( $now < $twoPm ){
    // do this
  //echo 'My Time is....'.$now;
//}else{
 // echo 'Time is....'.$twoPm;
//}

include 'open_database.php';
include_once("z_db.php");
include 'includes/mysqli_connect.php';
require 'includes/session.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']))
{
$status = "OK"; //initial status
$msg="";
	$username=mysqli_real_escape_string($con,$_POST['username']); //fetching details through post method
     $password = mysqli_real_escape_string($con,$_POST['password']);

$_SESSION['username']  =$username ;
$_SESSION['password']= $password;
$aces2  = "no";
   $rec  = "no";
   $cas= "no";
   $vit = "no";
   $med = "no";
   $inve = "no";
   $pha = "no";
   $repo="no";
   $acc="no";
   $stk="no";
   $sets ="no";
   $doc = "no";
   $anc = "no";
   $nut="no";
   $wbc="no";
   $dent="no";
   $adms ="no";
   $rad ="no";
   $lab ="no";
   $theat ="no";
   $stmt ="no";
   $paym ="no";
   $invo ="no";
   $gl ="no";
   $blnc ="no";
   $in_p ="no";
   $reg_stk ="no";
   $repo_stk ="no";
   $trans_stk ="no";
   $co_stk ="no";
   $rec_stk ="no";
   $pds_stk ="no";
   $users ="no";
   $charts ="no";
   $receiv ="no";
   $payables ="no";
   $doc_reg ="no";
   $rev_reg ="no";
   $diag_reg ="no";
   $signs_reg ="no";
   $edit ="no";

    $found = "No";


if ( strlen($username) < 2 ){
$msg=$msg."Username must be more than 5 char legth<BR>";
$status= "NOTOK";}

if ( strlen($password) < 2 ){ //checking if password is greater then 8 or not
$msg=$msg."Password must be more than 5 char legth<BR>";
$status= "NOTOK";}

if($status=="OK"){

// Retrieve username and password from database according to user's input, preventing sql injection
$query ="SELECT * FROM systemfile2 WHERE (username = '" . mysqli_real_escape_string($con,$_POST['username']) . "') AND (password = '" . mysqli_real_escape_string($con,$_POST['password']) . "')";

if ($stmt = mysqli_prepare($con, $query)) {
   
    /* execute query */
    mysqli_stmt_execute($stmt);

    /* store result */
    mysqli_stmt_store_result($stmt);

    $num=mysqli_stmt_num_rows($stmt);
//echo "The user....".$num;

    /* close statement */
    mysqli_stmt_close($stmt);
}
//mysqli_close($con);
// Check username and password match

if (($num) >= 1) {

session_start();
        // Set username session variable
        $_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
 		
	$sql = "SELECT * FROM systemfile2 WHERE username = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
	
	
$_SESSION['debtors'] = $debtors;
$_SESSION['doctors'] = $doctors;
$_SESSION['stocks']  = $stocks;
$_SESSION['counselor'] = $counselor;
$_SESSION['suppliers'] = $suppliers;
$_SESSION['triage'] = $triage;
$_SESSION['gledger'] = $gledger;
$_SESSION['laboratory'] = $laboratory;
$_SESSION['pharmacy'] = $pharmacy;
$_SESSION['accounts'] = $accounts;
$_SESSION['nurses'] = $nurses;
$_SESSION['doctors_p'] = $doctors_p;
$_SESSION['cashier'] = $cashier;
$_SESSION['reception'] = $reception;
$_SESSION['pat_reg'] = $patients;
	

  $query3 = "select * FROM systemfile2 where username = '$username' and password='$password'" ;
  
 

   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;



   while ($i3 < $num3)
     {
     $name   = mysql_result($result3,$i3,"username");
     $pass   = mysql_result($result3,$i3,"password");
  
        $found ='Yes';
        $acess  = mysql_result($result3,$i3,"access_all");
        $aces2  = mysql_result($result3,$i3,"account");

        $rec= mysql_result($result3,$i3,"rec");
        $cas= mysql_result($result3,$i3,"cas");
        $vit = mysql_result($result3,$i3,"vit");
        $med  = mysql_result($result3,$i3,"med");
        $inve   = mysql_result($result3,$i3,"inve");
        $pha      = mysql_result($result3,$i3,"pha");
        $repo  = mysql_result($result3,$i3,"repo");
        $acc   = mysql_result($result3,$i3,"acc");
        $stk   = mysql_result($result3,$i3,"stk");
        $sets     = mysql_result($result3,$i3,"sets");
        $doc   = mysql_result($result3,$i3,"doc");
        $anc      = mysql_result($result3,$i3,"anc");
        $nut  = mysql_result($result3,$i3,"nut");
        $wbc   = mysql_result($result3,$i3,"wbc");
        $dent   = mysql_result($result3,$i3,"dent");
        $adms     = mysql_result($result3,$i3,"adms");
        $rad     = mysql_result($result3,$i3,"rad");
        $lab     = mysql_result($result3,$i3,"lab");
        $theat     = mysql_result($result3,$i3,"theat");
        $stmt     = mysql_result($result3,$i3,"stmt");
        $paym     = mysql_result($result3,$i3,"paym");
        $invo     = mysql_result($result3,$i3,"invo");
        $gl     = mysql_result($result3,$i3,"gl");
        $blnc     = mysql_result($result3,$i3,"blnc");
        $in_p     = mysql_result($result3,$i3,"in_p");
        $reg_stk     = mysql_result($result3,$i3,"reg_stk");
        $repo_stk     = mysql_result($result3,$i3,"repo_stk");
        $trans_stk     = mysql_result($result3,$i3,"trans_stk");
        $co_stk     = mysql_result($result3,$i3,"co_stk");
        $rec_stk     = mysql_result($result3,$i3,"rec_stk");
        $pds_stk     = mysql_result($result3,$i3,"pds_stk");
        $users     = mysql_result($result3,$i3,"users");
        $charts     = mysql_result($result3,$i3,"charts");
        $receiv     = mysql_result($result3,$i3,"receiv");
        $payables     = mysql_result($result3,$i3,"payables");
        $doc_reg     = mysql_result($result3,$i3,"doc_reg");
        $rev_reg     = mysql_result($result3,$i3,"rev_reg");
        $diag_reg     = mysql_result($result3,$i3,"diag_reg");
        $signs_reg     = mysql_result($result3,$i3,"signs_reg");
        $edit     = mysql_result($result3,$i3,"edit");
      
     $i3++;
     }




$_SESSION['aces2'] = $aces2;
		 
$_SESSION['rec'] = $rec;
$_SESSION['cas'] = $cas;
$_SESSION['vit']  = $vit;
$_SESSION['med'] = $med;
$_SESSION['inve'] = $inve;
$_SESSION['pha'] = $pha;
$_SESSION['repo'] = $repo;
$_SESSION['acc'] = $acc;
$_SESSION['stk'] = $stk;
$_SESSION['sets'] = $sets;
$_SESSION['doc'] = $doc;
$_SESSION['anc'] = $anc;
$_SESSION['nut'] = $nut;
$_SESSION['wbc'] = $wbc;
$_SESSION['dent'] = $dent;
$_SESSION['adms'] = $adms;
$_SESSION['rad'] = $rad;
$_SESSION['lab'] = $lab;
$_SESSION['theat'] = $theat;
$_SESSION['stmt'] = $stmt;
$_SESSION['paym'] = $paym;
$_SESSION['invo'] = $invo;
$_SESSION['gl'] = $gl;
$_SESSION['blnc'] = $blnc;
$_SESSION['in_p'] = $in_p;
$_SESSION['reg_stk'] = $reg_stk;
$_SESSION['repo_stk'] = $repo_stk;
$_SESSION['trans_stk'] = $trans_stk;
$_SESSION['co_stk'] = $co_stk;
$_SESSION['rec_stk'] = $rec_stk;
$_SESSION['pds_stk'] = $pds_stk;
$_SESSION['users'] = $users;
$_SESSION['charts'] = $charts;
$_SESSION['receiv'] = $receiv;
$_SESSION['payables'] = $payables;
$_SESSION['doc_reg'] = $doc_reg;
$_SESSION['rev_reg'] = $rev_reg;
$_SESSION['diag_reg'] = $diag_reg;
$_SESSION['signs_reg'] = $signs_reg;
$_SESSION['edit'] = $edit;	
	
	

        // Jump to secured page
		print "
				<script language='javascript'>
					window.location = 'admin/atttendance.php';
				</script>"; 


}



else{
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Username And Password Does Not Match Or Your Account Is Inactive.</div>"; //printing error if found in validation
				
}
    
}else {
        
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation
				
	 
}
}


?>

<!DOCTYPE html>
<html lang="en" class="app">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Medi +</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
<style type="text/css">html {
    overflow-y: scroll;
background: url(images/login2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

</style>


<script language="javascript" type="text/javascript">
var newwindow;
function popcontact505(url) {
	newwindow=window.open(url,'newwindow','height=400,width=600');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>




<!--div id="google_translate_element" align="right"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script-->



        
</head>
<body>
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
  <div class="container aside-xl"> <a class="navbar-brand block" href="index.php">Login</a>
    <section class="m-b-lg">
      <header class="wrapper text-center"> <strong>Sign in to to see stats</strong> </header>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
        <div class="list-group">
		<?php 
						if($_SERVER['REQUEST_METHOD'] == 'POST' && ($errormsg!=""))
						{
						print $errormsg;
						}
						?>
          <div class="list-group-item">
            <input type="text" placeholder="Username" class="form-control no-border" name="username" required>
          </div>
          <div class="list-group-item">
            <input type="password" placeholder="Password" class="form-control no-border" name="password" required>
          </div>
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
        <div class="text-center m-t m-b"><a href="#"><small style="color:#ffffff;">Forgot password?</small></a></div>
        <div class="line line-dashed"></div>
</form>
    </section>
    
   
  </div>
</section>
 
<!-- footer -->
<footer id="footer">
  <div class="text-center padder">
    <p> <small style="color:#ffffff;"><?php $query="SELECT footer from settings where sno=0"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$footer="$row[footer]";
	print $footer;
	}
  ?></small> </p>
  </div>
  

</footer>

<!-- / footer -->
<!-- Bootstrap -->
<!-- App -->
<script src="js/app.v1.js"></script><br><br>



    
     <li><a href=javascript:popcontact505('admin/clockin.php')><i class="fa fa-share-alt"></i> <span><img src='clockin.jpg' alt='Smiley face' height='10%' width='10%'></span></a></li><br>
        <li><a href=javascript:popcontact505('admin/test_sms.php')><i class="fa fa-send-o"></i> <span><img src='clockout.jpg' alt='Smiley face' height='10%' width='10%'></span></a></li>
        
<script src="js/app.plugin.js"></script>
</body>
 
</html>