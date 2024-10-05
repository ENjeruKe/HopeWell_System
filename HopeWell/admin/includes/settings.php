<script language="javascript" type="text/javascript">
var newwindow;
function popcontact505(url) {
	newwindow=window.open(url,'newwindow','height=600,width=1000');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
  <div class="user-panel">
        <div class="pull-left">
        <p><a><i class=" text-success"></i> <?php echo $username; ?></a></p><br>
          
        </div>
        <div class="pull-left info">
          <!--p><?php echo $user['firstname'].' '.$user['lastname']; ?></p-->
          <br><a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">MANAGE</li>
  <?php         
          
          
 include 'open_database.php';


$username =$_SESSION['username']; 
$password =$_SESSION['password'];


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

$issp0     ='';
$_SESSION['issp0'] = $issp0;

 if ($users=='yes'){                
       echo" <li><a href='user_permissions1.php'><i class='fa fa-circle-o'></i><span>Users</span></a></li>";
 }else{           
     echo" <li><a href='#'><i class='fa fa-circle-o'></i><span>Users</span></a></li>";
 }     
if ($charts=='yes'){                           
       echo"  <li><a href='gl_accounts2.php'><i class='fa fa-circle-o'></i><span>Chart of Accounts</span></a></li>";
 }else{           
       echo"  <li><a href='#'><i class='fa fa-circle-o'></i><span>Chart of Accounts</span></a></li>";
}
if ($receiv=='yes'){                
       echo" <li><a href='debtors_register.php'><i class='fa fa-circle-o'></i><span>Account receivables</span></a></li>";
 }else{           
       echo"  <li><a href='#'><i class='fa fa-circle-o'></i><span> Account receivables</span></a></li>";
}
if ($payables=='yes'){                
       echo"  <li><a href='suppliers_register.php'><i class='fa fa-circle-o'></i><span>Account payables</span></a></li>";
 }else{           
       echo"  <li><a href='#'><i class='fa fa-circle-o'></i><span>Accounts Payables</span></a></li>";
}
if ($doc_reg=='yes'){                
       echo" <li><a href='doctors_register.php'><i class='fa fa-circle-o'></i><span>Doctors register</span></a></li>";
 }else{           
       echo"   <li><a href='#'><i class='fa fa-circle-o'></i><span>Doctors Register</span></a></li>";
}
if ($rev_reg=='yes'){                
       echo"  <li><a href='revenue_register.php'><i class='fa fa-circle-o'></i><span>Revenue register</span></a></li>";
 }else{           
       echo"  <li><a href='#'><i class='fa fa-circle-o'></i><span>Revenue Register</span></a></li>";
}
if ($diag_reg=='yes'){                
       echo"  <li><a href='disease_register.php'><i class='fa fa-circle-o'></i><span>Diagnosis Register</span></a></li>";
 }else{           
       echo"  <li><a href='#'><i class='fa fa-circle-o'></i><span>Diagnosis Register</span></a></li>";
}
if ($signs_reg=='yes'){                
       echo"  <li><a href='symptoms_register.php'><i class='fa fa-circle-o'></i><span>Signs & Symptoms Reg</span></a></li>";
 }else{           
       echo"  <li><a href='#'><i class='fa fa-circle-o'></i><span>Signs & Symptoms Reg</span></a></li>";
}


if ($edit=='yes'){                
       echo" <li><a href='edit_interim_invoice2.php'><i class='fa fa-circle-o'></i><span>Edit Interim Invoice by name</span></a></li>";
 }else{           
       echo" <li><a href='#'><i class='fa fa-circle-o'></i><span>Edit Interim Invoice by name</span></a></li>";
}


if ($edit=='yes'){                
       echo" <li><a href='Edit_interim_invoice2.php'><i class='fa fa-circle-o'></i><span>Edit Interim Invoice by File No.</span></a></li>";
 }else{           
       echo" <li><a href='#'><i class='fa fa-circle-o'></i><span>Edit Interim Invoice by File No</span></a></li>";
}

 if ($users=='yes'){                
       echo" <li><a href='deleted_items.php'><i class='fa fa-circle-o'></i><span>Deleted Items</span></a></li>";
 }else{           
     echo" <li><a href='#'><i class='fa fa-circle-o'></i><span>Deleted Items</span></a></li>";
 }     

if ($users=='yes'){                
       echo" <li><a href='beds_register.php'><i class='fa fa-circle-o'></i><span>Beds Register</span></a></li>";
 }else{           
     echo" <li><a href='#'><i class='fa fa-circle-o'></i><span>Beds Register</span></a></li>";
 }
 
 
 if ($users=='yes'){                
       echo" <li><a href=javascript:popcontact505('staff_clock.php')><i class='fa fa-circle-o'></i><span>Clock In/Out Log</span></a></li>";
 }else{           
     echo" <li><a href='#'><i class='fa fa-circle-o'></i><span>Clock In/Out Log</span></a></li>";
 }
?>
             </ul>
    </section>
    <!-- /.sidebar -->
  </aside>