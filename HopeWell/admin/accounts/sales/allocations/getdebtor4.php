<?php
session_start();
 require('open_database.php');
 $location = $_SESSION['company'];

?>
<!DOCTYPE html>
<html>
<head>
<!--style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 0px solid black;
    padding: 1px;
}

th {text-align: left;}
</style-->
</head>
<body>

<?php











if (isset($_GET['save_cancel'])){
   //Go and save first
   //-------------------
   echo '1';
   $my_balance =$_SESSION['all_balance'];
   $date=$_GET['date'];
   $narration = $_GET['narration'];
   $tr_type   = $_GET['tr_type'];
   $cheque_no = $_GET['cheque_no'];
   $credit_account ='Accounts Receivables';
   //$_GET['credit_account'];
   $narration =$tr_type.''.$cheque_no;
   $debit_account ='CASH COLLECTION A/C';
   //Get the receipt No.   
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_vch");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_vch ='$ref_no2'";
     $result3 = mysql_query($query3);

    $query5= "INSERT INTO 0_debtor_trans_no VALUES('')";
	$result5 =mysql_query($query5);  
	$query3 = "select * FROM 0_debtor_trans_no" ;
	$result3 =mysql_query($query3) or die(mysql_error());
	$num3 =mysql_numrows($result3) or die(mysql_error());
	$i3=0;
	while ($i3 < $num3)
		 {
		 $next_refz   = mysql_result($result3,$i3,"next_ref");  
		 $i3++;
		 }

   $ref_no = $next_refz;
   //Get account to credit
   //---------------------
   $balancez=0;
   $cr_amount = 0;
   $query = "select * FROM debtorstrfile_allocate WHERE alloc >0" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $tot_amt =0;
   echo '2.1';
   while ($i < $num)
      {         
      $id   = mysql_result($result,$i,"trans_no");  
      $pay     = mysql_result($result,$i,"alloc");  
      $balance = mysql_result($result,$i,"ov_amount");  
      $tot_amt = $tot_amt + $pay;
      $new_bal = $balance-$pay;     
      $cr_amount = $cr_amount + $pay;
      $account_name = mysql_result($result,$i,"debtor_no");      
      $mydates =date('y-m-d');
     
     $query2= "UPDATE 0_debtor_trans SET alloc ='$pay' WHERE debtor_no ='$account_name' and trans_no ='$id' and ov_amount ='$balance'";
     $result2 =mysql_query($query2);

     $i++;
     }
     //Receipts are posted seperately thus will not post it here
     



    //	$query5= "INSERT INTO 0_debtor_trans_no VALUES('')";
	//	$result5 =mysql_query($query5);  
	//	$query3 = "select * FROM 0_debtor_trans_no" ;
	//	$result3 =mysql_query($query3) or die(mysql_error());
	//	$num3 =mysql_numrows($result3) or die(mysql_error());
	//	$i3=0;
	//	while ($i3 < $num3)
	//		 {
	//		 $next_refz   = mysql_result($result3,$i3,"next_ref");  
	//		 $i3++;
	//		 }
		
	//	$hnext_refz = $next_refz;


         $desc =$patient;
         
         
  $query6= "INSERT INTO 0_debtor_trans (trans_no, type, version, debtor_no, branch_code, tran_date, due_date, reference, tpe, order_, ov_amount, ov_gst, ov_freight, ov_freight_tax, ov_discount, alloc, prep_amount, rate, ship_via, dimension_id, dimension2_id, payment_terms, tax_included) 
  VALUES ('$ref_no', '2', '0', '$account_name', '$account_name', '$mydates', '$mydates', '$next_refz', '0', '0', '$cr_amount', '0', '0', '0', '0', '$cr_amount', '0', '1', NULL, '0', '0', NULL, '0')";
  $result6 =mysql_query($query6);  
        

   $hnext_refz =$ref_no;
   $desc ='Allocation'.$ref_no;
   //Now go and pass a Debit entry in G/Ledger if NOT ECT
   //----------------------------------------------------
   $query5 = "select * FROM 0_chart_master WHERE account_name='$debit_account'" ;
   $result5 =mysql_query($query5) or die(mysql_error());
   $num5 =mysql_numrows($result5) or die(mysql_error());
   $i5=0;
   while ($i5 < $num5)
        {
        $account_code = mysql_result($result5,$i5,"account_code");
        $account_type = mysql_result($result5,$i5,"account_type"); 
        $i5++;
        }
   $query= "INSERT INTO 0_gl_trans (counter, type, type_no, tran_date, account, memo_, amount, dimension_id, dimension2_id, person_type_id, person_id) 
      VALUES ('', '2', '$hnext_refz', '$date', '$account_code', '$desc', '$cr_amount', '0', '0','2','$account_name')";
      $result =mysql_query($query);
   

   $query5 = "select * FROM 0_chart_master WHERE account_name='$credit_account'" ;
   $result5 =mysql_query($query5) or die(mysql_error());
   $num5 =mysql_numrows($result5) or die(mysql_error());
   $i5=0;
   while ($i5 < $num5)
        {
        $account_code = mysql_result($result5,$i5,"account_code");
        $account_type = mysql_result($result5,$i5,"account_type"); 
        $i5++;
        }
   $query= "INSERT INTO 0_gl_trans (counter, type, type_no, tran_date, account, memo_, amount, dimension_id, dimension2_id, person_type_id, person_id) 
      VALUES ('', '2', '$hnext_refz', '$date', '$account_code', '$desc', '-$cr_amount', '0', '0','2','$account_name')";
      $result =mysql_query($query);

      //Will clear the file after printing the voucher
      //----------------------------------------------

?>





   <script type='text/javascript'>
   function printpage()
  {
  window.print()
  }
  </script>

<script type='text/javascript'>
   function bills()
  {
  window.open('http://www.usedcarin...nadminlogin.php' 'FinanceAdminReportsLogin', 'width=545,height=326,resizable=yes,scrollbars=yes,status=yes');
  }
  </script>
 
 
<?php
   //No branch yet ----- $branch     = $_SESSION['branch']; 
    
    
    

    $query5= "SELECT * FROM 0_debtors_master where debtor_no ='$account_name'";
	$result5 =mysql_query($query5);  
	$num5 =mysql_numrows($result5) or die(mysql_error());
	$i5=0;
	while ($i5 < $num5)
		 {
	     $account_name   = mysql_result($result5,$i5,"name");  
		 $i5++;
		 }
		    
    
    
   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "select * FROM companyfile";
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   while ($row=mysql_fetch_array($hasil)) 
   {         
      $company     = mysql_result($result,$i,"company");  
      $address1    = mysql_result($result,$i,"address1");   
      $address2    = mysql_result($result,$i,"address2");   
      $address3    = mysql_result($result,$i,"address3");   
   }
   //--echo"<font size ='5'>";
   echo"<table width='400' border='0' cellspacing='0' cellpadding='0'>";      
   echo"<tr><td align ='left'><h2>$company</h2></td></tr>";
   echo"<tr><td align ='left'>$address1</td></tr>";
   echo"<tr><td align ='left'>$address2</td></tr>";
   echo"<tr><td align ='left'>$address3</td></tr>";
   echo"<tr><td width ='400' align ='left'><h3><br><u>RECEIPT/REMITANCE</u></h3></td><tr>";
   echo"</table>";

   echo"<div><h4>REMITANCE NO:<img src='space.jpg' style='width:20px;height:2px;'>$ref_no</h4></div><br>";
 //---------Sawa up to this point------------------
   echo"<div>Date :<img src='space.jpg' style='width:20px;height:2px;'></b>$mydates<img   
   src='space.jpg' style='width:20px;height:2px;'><br></div>";
   echo"<div>Account Debited :<img src='space.jpg' style='width:5px;height:2px;'>$credit_account</b><br>";
   //Draw line
   echo"<img src='ico/black.jpg' style='width:800px;height:1px;'><br>"; 

   echo"Account Name :<img src='space.jpg' style='width:5px;height:2px;'>$account_name<br>";
   echo"Narration : <img src='space.jpg' style='width:5px;height:2px;'>$narration<br>";
   //echo"<img src='space.jpg' style='width:70px;height:2px;'>";
   echo"Amount Paid:<img src='space.jpg' style='width:10px;height:2px;'>$cr_amount</b><br>";
   echo"<img src='ico/black.jpg' style='width:800px;height:1px;'><br>"; 


echo "<table width ='50%'>
<tr>
<th bgcolor ='black'><font color ='white' width ='30%'>Narration</th>
<th bgcolor ='black'><font color ='white' width ='10%'>Doc. /Invoice No</th>
<th bgcolor ='black'><font color ='white' width ='10%'>Amount Paid</font></th>
</tr>";

   //echo"Invoice Details <img src='space.jpg' style='width:200px;height:2px;'>";
   //echo"Narration / Rrf No.<img src='space.jpg' style='width:200px;height:2px;'>";
   //echo"Amount<img src='space.jpg' style='width:20px;height:2px;'>";
   //echo"</div>";
   //Draw line
   //echo"<img src='ico/black.jpg' style='width:800px;height:1px;'><br>"; 

   $query= "SELECT * FROM debtorstrfile_allocate WHERE alloc >0";
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   //echo"<table bgcolor ='white' border ='0' width ='50%'>";
   //-------Sawa -------------
   $SQL = "select * FROM debtorstrfile_allocate WHERE alloc >0" ;
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      {         
      $desc      = 'Allocation/Invoice';   
      $rate      = mysql_result($result,$i,"reference");   
      $code      = mysql_result($result,$i,"alloc");   
      $update    = mysql_result($result,$i,"tran_date");  
      $contact   = "PAY";
      $qty       = mysql_result($result,$i,"alloc");
      $total     = mysql_result($result,$i,"alloc");
      $update2 = $code; 
      $tot = $tot +$total;
      $code   = number_format($code);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);
      $total = number_format($update2);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$desc";
      echo"</td>";     
      echo"<td width ='50' align ='left'>$rate</td>";
      echo"<td width ='30' align ='right'>$total</td>";
      echo"<td width ='10' align ='right'></td>";
      echo"</font>";
      echo"</tr>";   
      $i++;         
     }

      echo"</table>";
echo"<img src='ico/black.jpg' style='width:800px;height:1px;'><br>"; 
echo"</font>";
echo"<table>";
echo"<tr><td width ='0' align ='right'><b>Total:</b></td><td width ='45'></td><td><b>$tot2</b></td></tr>";
echo"<tr><td width ='0' align ='right'><b>Prepared by:</b></td><td width ='45'></td><td>____________________</td></tr>";
echo"<tr><td width ='0' align ='right'><b>Authorised by:</b></td><td width ='45'></td><td>____________________</td></tr>";

echo"<tr><td width ='0' align ='right'><b>Received by:</b></td><td width ='45'></td><td>____________________</td></tr>";

echo "</table></b>";
                                                         
                                                        


   $query3 = "DELETE FROM debtorstrfile_allocate WHERE alloc >0";
   $result3 =mysql_query($query3) or die(mysql_error());




echo"<a href='http://www.selfcare.co.ke/hosp_demo/admin/accounts/admin/dashboard.php?sel_app=system'>Exit</a>";
    die();

   //End of saving
   //-------------
   $date = date('y/m/d');
   $client_no=' ';
   $patients_name=' ';
   $gender=' ';
   $age=' ';
     //echo"Put some details heare 6";


}



























$q = intval($_GET['q']);
$q = $_GET['q'];
//echo $q;

$allocate ='No';
$mydate =date('y-m-d');
//Asign the receipt No.
//---------------------
$query3 = "select * FROM companyfile" ;
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($i3 < $num3)
     {
     $next_jv   = mysql_result($result3,$i3,"next_vch");  
     $i3++;
     }

if (isset($_GET['q'])){
 $query3 = "DELETE FROM debtorstrfile_allocate where debtor_no<>''";
 $result3 =mysql_query($query3) or die(mysql_error());
}else{
}
if (isset($_GET['accountsspay'])){      
   $record =$_GET['accountsspay'];
   $topay =$_GET['accounts33'];
   $allocate ='Yes';
   $query3 = "UPDATE debtorstrfile_allocate set alloc = '$topay' WHERE trans_no ='$record' and ov_amount ='$topay'";
   $result3 =mysql_query($query3) or die(mysql_error());

   echo"<form action ='getdebtor4.php' method ='GET'>";

   echo"<table><tr><td width ='100'><b>Vourcher No.</b></td><td width='50' align='left'><input type='text' id ='jv_no' 
   name='jv_no' size='10' value ='$next_jv'></td></tr><tr><td width ='100'><b>Pay Date:</b></td><td width='50' 
   align='left'><input type='text' id ='date' name='date' size='10' value ='$mydate'></td></tr>";


   echo"<tr>";
   echo"<td width ='50' align ='left'><b>Pay Mode:</b></td><td>";
   echo"<select id='tr_type' name='tr_type'>";
   $cdquery="SELECT description FROM payment_modes";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   $query3 = "select * FROM payment_modes";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["description"];     
      echo "<option>$cdTitle</option>";            
      }
   echo"</select>";
   echo"</td><td width ='50'></td><td width='10' align='left'></td></tr>"; 

   echo"<tr>";
   echo"<td width ='50' align ='left'><b>Paying A/c:</b></td><td>";
   echo"<select id='credit_account' name='credit_account'>";
   $cdquery="SELECT account_name FROM glaccountsf where type ='BANK'";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   $query3 = "select * FROM glaccountsf";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];     
      echo "<option>$cdTitle</option>";            
      }
   echo"</select>";
   echo"</td><td width ='50'><b>Chq No:</b></td><td width='10' align='left'><input type='text' id ='cheque_no' 
   name='cheque_no' size='10' ></td></tr>"; 



 $myfile =gethostname();


 $query= "SELECT * FROM payment_supplier_tmp ORDER BY id ASC" or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());
 $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;
                                                         
 echo"<table class='altrowstable' id='alternatecolor'>";
 $company_identity ='BUSTANI';
 $SQL = "select * FROM payment_supplier_tmp ORDER BY id ASC" ;
 $hasil=mysql_query($SQL, $connect);
 $id = 0;
 $nRecord = 1;
 $No = $nRecord;
 $tot = 0;
 $save ='No';
 $tot_amt =0;
 $desc =' ';
 $tot_debit  = 0;
 $tot_credit = 0;
 while ($row=mysql_fetch_array($hasil)) 
      {               
      $desc    = mysql_result($result,$i,"description");   
      $qty    = mysql_result($result,$i,"qty");   
      $price   = mysql_result($result,$i,"sell_price");   
      $total = mysql_result($result,$i,"gl_account");
      $line  = mysql_result($result,$i,"line_no");
      $save ='Yes';
      $tot_debit  = $tot_debit+$qty;
      $tot_credit = $tot_credit+$total;

      $tot_amt = $tot_debit+$tot_credit;
      if ($desc > ' '){
         echo"<tr bgcolor ='white' border ='0'>";
         //echo"<td align ='left'></td>";
         echo"<td width ='400'><input type='text' id ='s_desc_three' size ='45' name='s_desc_three' value 
        ='$desc'></td>";
      }else{
         echo"<tr bgcolor ='white' border ='0'>";
         //echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td>";
         echo"<td width ='400' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)'>";
         $cdquery="SELECT account_name FROM debtorsfile";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM debtorsfile";
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;
         while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["account_name"];     
            echo "<option>$cdTitle</option>";            
         }
         echo"</select>";
         echo"</td>"; 
    }
    $aa8=$row['id'];
    $line_no    = $row['line_no'];
    $myfunction = $row['line_no'];
    $myfunction = 'function'.$row['line_no'];
    echo"<td width ='50'></td>";
    echo"<td></td>";
    echo"<td></td>";
      $aa7=$row['description'];        
      $aa8=$row['id'];        

echo"<td width ='100' align ='right'></td>";
    
echo"</tr>";

      $i++;
  
       
}
echo"<div id='txtHint'><b>Account info will be listed here...</b></div>";
echo"<img src='ico/black.jpg' style='width:700px;height:1px;'><br>";   

echo"</table>";








}

if (isset($_GET['accountssno'])){      
   $record =$_GET['accountssno'];
   $topays =$_GET['accounts33'];
   $topay =0;
   $allocate ='Yes';
   $query3 = "UPDATE debtorstrfile_allocate set alloc = '$topay' WHERE trans_no ='$record' and alloc ='$topays'";
   $result3 =mysql_query($query3) or die(mysql_error());


   //$query3 = "UPDATE debtorstrfile_allocate set qty = '$topay' WHERE id ='$record'";
   //$result3 =mysql_query($query3) or die(mysql_error());


   echo"<table><tr><td width ='100'><b>Vourcher No.</b></td><td width='50' align='left'><input type='text' id ='jv_no' 
   name='jv_no' size='10' value ='$next_jv'></td></tr><tr><td width ='100'><b>Pay Date:</b></td><td width='50' 
   align='left'><input type='text' id ='date' name='date' size='10' value ='$mydate'></td></tr>";


   echo"<tr>";
   echo"<td width ='50' align ='left'><b>Pay Mode:</b></td><td>";
   echo"<select id='tr_type' name='tr_type'>";
   $cdquery="SELECT description FROM payment_modes";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   $query3 = "select * FROM payment_modes";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["description"];     
      echo "<option>$cdTitle</option>";            
      }
   echo"</select>";
   echo"</td><td width ='50'><b>Chq No:</b></td><td width='10' align='left'><input type='text' id ='cheque_no' 
   name='cheque_no' size='10' ></td></tr>"; 



 $myfile =gethostname();


 $query= "SELECT * FROM payment_supplier_tmp ORDER BY id ASC" or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());
 $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;
                                                         
 echo"<table class='altrowstable' id='alternatecolor'>";
 $company_identity ='BUSTANI';
 $SQL = "select * FROM payment_supplier_tmp ORDER BY id ASC" ;
 $hasil=mysql_query($SQL, $connect);
 $id = 0;
 $nRecord = 1;
 $No = $nRecord;
 $tot = 0;
 $save ='No';
 $tot_amt =0;
 $desc =' ';
 $tot_debit  = 0;
 $tot_credit = 0;
 while ($row=mysql_fetch_array($hasil)) 
      {               
      $desc    = mysql_result($result,$i,"description");   
      $qty    = mysql_result($result,$i,"qty");   
      $price   = mysql_result($result,$i,"sell_price");   
      $total = mysql_result($result,$i,"gl_account");
      $line  = mysql_result($result,$i,"line_no");
      $save ='Yes';
      $tot_debit  = $tot_debit+$qty;
      $tot_credit = $tot_credit+$total;

      $tot_amt = $tot_debit+$tot_credit;
      if ($desc > ' '){
         echo"<tr bgcolor ='white' border ='0'>";
         //echo"<td align ='left'></td>";
         echo"<td width ='400'><input type='text' id ='s_desc_three' size ='45' name='s_desc_three' value 
        ='$desc'></td>";
      }else{
         echo"<tr bgcolor ='white' border ='0'>";
         //echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td>";
         echo"<td width ='400' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)'>";
         $cdquery="SELECT account_name FROM debtorsfile";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM debtorsfile";
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;
         while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["account_name"];     
            echo "<option>$cdTitle</option>";            
         }
         echo"</select>";
         echo"</td>"; 
    }
    $aa8=$row['id'];
    $line_no    = $row['line_no'];
    $myfunction = $row['line_no'];
    $myfunction = 'function'.$row['line_no'];
    echo"<td width ='50'></td>";
    echo"<td></td>";
    echo"<td></td>";
      $aa7=$row['description'];        
      $aa8=$row['id'];        

   echo"<td width ='100' align ='right'></td>";
    
   echo"</tr>";

      $i++;
  
          
   }
   echo"<div id='txtHint'><b>Account info will be listed here...</b></div>";
   echo"<img src='ico/black.jpg' style='width:700px;height:1px;'><br>";   

   echo"</table>";


}


$con = mysqli_connect('localhost','selfcare','v9p0CnfH60','selfcare_demo');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"selfcare_demo");

//echo "2".$q;
$sql2="SELECT * FROM 0_debtors_master where name = '".$q."'";
$result2 = mysqli_query($con,$sql2);
while($row = mysqli_fetch_array($result2)) {
    $acc_no = $row['debtor_no'];
}
//echo "Account:".$acc_no;
//Copy entries to allocation file
//--------------------------------
if ($allocate =='No'){
//$sql ="INSERT INTO debtorstrfile_allocate SELECT * FROM 0_debtor_trans WHERE balance<>0 and debtor_no= '".$q."'";
$sql ="INSERT INTO debtorstrfile_allocate SELECT * FROM 0_debtor_trans WHERE debtor_no= '$acc_no' and type = 10 and alloc = 0";
$result = mysqli_query($con,$sql);
}
$query2= "UPDATE 0_debtor_trans SET prep_amount = debtorstrfile_allocate.ov_amount WHERE ov_amount >0";
$result2 =mysql_query($query2);

$query3 = "DELETE FROM debtorstrfile_allocate WHERE debtor_no =''";
$result3 =mysql_query($query3) or die(mysql_error());


echo "<table width ='100%'>
<tr>
<th bgcolor ='black'><font color ='white' width ='30%'>Narration</th>
<th bgcolor ='black'><font color ='white' width ='15%'>Date</th>
<th bgcolor ='black'><font color ='white' width ='10%'>Doc.No</th>
<th bgcolor ='black'><font color ='white' width ='10%'>Type</th>
<th bgcolor ='black'><font color ='white' width ='15%'>Amount</font></th>
<th bgcolor ='black'><font color ='white' width ='10%'>Action</font></th>
<th bgcolor ='black'><font color ='white' width ='10%'>Paid</font></th>
</tr>";
$tot_amt = 0;
$sql2="SELECT * FROM debtorstrfile_allocate";
$result2 = mysqli_query($con,$sql2);
while($row = mysqli_fetch_array($result2)) {
    echo "<tr>";
    $id = $row['trans_no'];
    $paid = $row['alloc'];
    $paids = $row['ov_amount'];
    $balance = $row['prep_amount'];

    $tot_amt = $tot_amt+$paid;
    echo "<td>Customer Invoice</td>";
    echo "<td>" . $row['tran_date'] . "</td>";
    echo "<td>" . $row['reference'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td align ='right'>" . $row['ov_amount'] . "</td>";
    if ($paid == $paids){
       echo "<td>" ."<a href='getdebtor4.php?accountssno=$id&accounts33=$paids')>"."Undo"."</a>" . "</td>";
    }else{
       echo "<td>" ."<a href='getdebtor4.php?accountsspay=$id&accounts33=$paids')>"."Pay"."</a>" . "</td>";
    }
    echo "<td align ='right'>" .$row['alloc']. "</td>";
    echo "</tr>";
}
echo "</table>";
//mysqli_close($con);
?>


<?php
//echo "3";
echo"<table><tr></tr></table>";
   
echo"<img src='ico/black.jpg' style='width:600px;height:1px;'>";
echo"<table border ='0' width ='100%'><td></td><td><b>";

$tot_amt_bal = $tot_amt;
$_SESSION['all_balance'] = $tot_amt_bal;
echo $tot_bal;

echo"</td><td width ='100' align ='right'></td><td width ='100'></td><td width ='100'><td><b>Total Paid:</b></td><td width ='100' align ='right'><b>$tot_amt</b></td></td></font>";
   
      echo"</table>";
?>
<table border='0' border color ='red'><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td><td><input type='submit' name='delete'  class='button' value='Cancel Transaction'></td></table>
</form>
</body>
</html>