<?php
	session_start();

	include 'includes/mysqli_connect.php';
	include 'open_database.php';
	require 'includes/session.php';
	var_dump($_SESSION);
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$time_a = $_POST['time'];
		$status = $_POST['status'];

$time_a =date('H:i:s');

		$sql = "SELECT * FROM systemfile2 WHERE username = '$username' and password ='$password'";
		$query = $conn->query($sql);
  // echo"<embed src='sound/access_granted.mp3' controller='true' autoplay='true' autostart='True' width='0' height='0' />";


   //$a == 1 && $b == 1
		if($query->num_rows <1){
			$_SESSION['error'] = 'Cannot find account with the username';
			header('location: ../index.php');
		}else{
		// $_SESSION['username'] ='$username';

   $_SESSION['username']=$username;   
   $_SESSION['password']=$password; 
   


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




 		    header('location:admin/atttendance.php');
}

}




?>