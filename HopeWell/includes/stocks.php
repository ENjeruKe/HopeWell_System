<?php
 include 'open_database.php';
?>

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

$username =$_SESSION['username']; 
$password =$_SESSION['password'];
$store_select = $_SESSION['store_select'];

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

    
                
if ($reg_stk=='yes'){                           
       echo"<li><a href='rster.php'><i class='fa fa-eraser'></i><span>Register</span></a></li>";
 }else{           
       echo"<li><a href='#'><i class='fa fa-eraser'></i><span>Register</span></a></li>";
}


if ($repo_stk=='yes'){                
       echo"<li><a href='ripo.php'><i class='fa fa-eraser'></i><span>Reports</span></a>  </li>";
 }else{           
       echo"<li><a href='#'><i class='fa fa-eraser'></i><span>Reports</span></a>  </li>";
}

if ($trans_stk=='yes'){                
       echo"<li><a href='transfe.php'><i class='fa fa-eraser'></i><span>Transfers</span></a>  </li>";
 }else{           
       echo"<li><a href='#'><i class='fa fa-eraser'></i><span>Transfers</span></a>  </li>";
}

if ($co_stk=='yes'){                
       echo"<li><a href='counts.php'><i class='fa fa-eraser'></i><span>Counts</span></a>  </li></li>";
 }else{           
       echo"<li><a href='#'><i class='fa fa-eraser'></i><span>Counts</span></a>  </li>";
}


if ($rec_stk=='yes'){                
       echo"<li><a href='stocks_lpo.php'><i class='fa fa-eraser'></i><span>Local Purchase Order</span></a>  </li>";
 }else{           
       echo"<li><a href='#'><i class='fa fa-eraser'></i><span>Local Purchase Order</span></a>  </li>";
}

if ($rec_stk=='yes'){                
       echo"<li><a href='stocks_grnx.php'><i class='fa fa-eraser'></i><span>Receive Goods</span></a>  </li>";
       echo"<li><a href='stocks_grn.php'><i class='fa fa-eraser'></i><span>Receive Goods (NON-DRUGS ITEM)</span></a>  </li>";
       echo"<li><a href='stocks_grt.php'><i class='fa fa-eraser'></i><span>Goods returned to Supplier</span></a>  </li>";
 }else{           
       echo"<li><a href='#'><i class='fa fa-eraser'></i><span>Receive Goods</span></a>  </li>";
       echo"<li><a href='#'><i class='fa fa-eraser'></i><span>Goods returned to Supplier</span></a>  </li>";
}

if ($pds_stk=='yes'){                
       echo"<li><a href='drug_statement.php'><i class='fa fa-eraser'></i><span>Patients Drg Statement</span></a></li>";
 }else{           
       echo"<li><a href='#'><i class='fa fa-eraser'></i><span>Patients Drug Statement</span></a></li>";
}

echo"<li><a href='ip_issuetopatientsx.php'><i class='fa fa-eraser'></i><span>Issue to Patients</span></a></li>";
echo"<li><a href='ip_returntopatientsx.php'><i class='fa fa-eraser'></i><span>Returns from Patients</span></a></li>";

echo"<li><a href='issuetoconsumer.php'><i class='fa fa-eraser'></i><span>Issue to Consumer Dept</span></a></li>";
echo"<li><a href='returnfromconsumer.php'><i class='fa fa-eraser'></i><span>Returns from Consumer Dept</span></a></li>";
echo"<li><a href='stocks_grnx_report.php'><i class='fa fa-eraser'></i><span>Expired Drugs by Date</span></a></li>";


?>






          
	                 
                      
	    
	    
	    
			    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>