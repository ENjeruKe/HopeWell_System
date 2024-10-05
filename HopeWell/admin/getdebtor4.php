<?php
session_start();
 require('open_database.php');
 $location = $_SESSION['company'];

?>
<!DOCTYPE html>
<html>
<head>




<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=300,width=850');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>

<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">


</head>




<body>

<?php











if (isset($_GET['save_cancel'])){

   //Go and save first
   //-------------------
   $my_balance =$_SESSION['all_balance'];
   $date=$_GET['date'];
   $narration = $_GET['narration'];
   $tr_type   = $_GET['tr_type'];
   $cheque_no = $_GET['cheque_no'];
   $credit_account =$_GET['item1x'];
   $narration =$tr_type.''.$cheque_no;
   $debit_account ='ACCOUNTS RECEIVABLES';
   $ref_no   = $_GET['jv_no'];

   //Get account to credit
   //---------------------
   $balancez=0;
   $cr_amount = 0;
   $query = "select * FROM debtorstrfile_allocate2 WHERE inputby <>0" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $tot_amt =0;
   while ($i < $num)
      {         
      $id   = mysql_result($result,$i,"id");  
      $pay     = mysql_result($result,$i,"inputby");  
      $balance = mysql_result($result,$i,"balance"); 
      $save_desc = mysql_result($result,$i,"description"); 

      $tot_amt = $tot_amt + $pay;
      $new_bal = $balance-$pay;     
      $cr_amount = $cr_amount + $pay;
      $account_name = mysql_result($result,$i,"acc_no");      
      $mydates =date('y-m-d');
      if ($balance <0){
         $balancez = $balancez+$pay;
      }
      $query2= "UPDATE dtransf SET adm_no ='$ref_no',balance ='$new_bal' WHERE id ='$id'";
      $result2 =mysql_query($query2);

     $i++;
     }
     $tot_amt = $tot_amt*-1;
     //Receipts are posted seperately thus will not post it here
     //---------------------------------
     $query5= "INSERT INTO dtransf VALUES('','$account_name','$mydates','$narration','$ref_no','$ref_no','Pay','$tot_amt','$balancez','$username')";
     $result5 =mysql_query($query5) or die(mysql_error());

   //Now go check balances in master file
   //------------------------------------
   $query3 = "select * FROM debtorsfile WHERE account_name ='$account_name'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   $sup_balance = 0;
   while ($i3 < $num3)
     {
     $sup_balance   = mysql_result($result3,$i3,"os_balance");
     $i3++;
     }

   $sup_balance = $sup_balance+$tot_amt;
   $query2= "UPDATE debtorsfile SET os_balance ='$sup_balance' WHERE account_name ='$account_name'";
   $result2 =mysql_query($query2);

   $tots_amt = $tot_amt;

   $tot_amt = $tot_amt*-1;

      //Go and update gltransf
      //----------------------
      $query5= "INSERT INTO gltransf VALUES('','$mydates','$debit_account','$ref_no','Alloc','$account_name','-$tot_amt','$username','CONTROL')";
      $result5 =mysql_query($query5);

    
   $timew = date("H:i:s");
   //Now go and Debit G/L Accounts file
   //-----------------------------------
   //Post Debit first
   //----------------
   $db_balance = 0;
   $query3 = "select * FROM glaccountsf WHERE account_name ='$debit_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $db_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

   $db_balance = $db_balance +$tot_amt;

   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$debit_account'";
   $result2 =mysql_query($query2);


   //Now go and credit the bank
   //--------------------------
   $query5= "INSERT INTO gltransf VALUES('','$mydates','$credit_account','$ref_no','Alloc','$account_name','$cr_amount','$username','INCOME')";
   $result5 =mysql_query($query5);
   //Now go and update G/L Accounts file
   //-----------------------------------

   $query3 = "select * FROM glaccountsf WHERE account_name ='$credit_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $credit_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

     $credit_balance = $credit_balance -$tot_amt;

      $query2= "UPDATE glaccountsf SET balance ='$credit_balance' WHERE account_name ='$credit_account'";
      $result2 =mysql_query($query2);


     //Now go and post a receipt in receiptf if it is a cash allocation
     //----------------------------------------------------------------
     echo 'Type: '.$tr_type;
      if ($tr_type =='Cash Receipts'){
         $query15= "INSERT INTO receiptf VALUES('','$save_desc','Allocation receipt','$save_desc','1','$tr_type','$mydates','$username','$tot_amt','$tots_amt','$ref_no','0','$ref_no','','$timew')";
         $result15 =mysql_query($query15);

         $query15= "INSERT INTO pay_datacash VALUES('','$save_desc','Allocation receipt','$save_desc','1','$tr_type','$mydates','$username','$tot_amt','$tots_amt','$ref_no','0','$ref_no','','$timew')";
         $result15 =mysql_query($query15);

      }
      //Will clear the file after printing the voucher
      //----------------------------------------------

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
   echo"Amount Paid:<img src='space.jpg' style='width:10px;height:2px;'>$balancez</b><br>";
   echo"<img src='ico/black.jpg' style='width:800px;height:1px;'><br>"; 


   echo"Invoice Details <img src='space.jpg' style='width:200px;height:2px;'>";
   echo"Narration / Rrf No.<img src='space.jpg' style='width:200px;height:2px;'>";
   echo"Amount<img src='space.jpg' style='width:20px;height:2px;'>";
   echo"</div>";
   //Draw line
   echo"<img src='ico/black.jpg' style='width:800px;height:1px;'><br>"; 

   $query= "SELECT * FROM debtorstrfile_allocate2 WHERE inputby >0";
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   echo"<table bgcolor ='white' border ='0' width ='100%'>";
   //-------Sawa -------------
   $SQL = "select * FROM debtorstrfile_allocate2 WHERE inputby >0" ;
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      {         
      $desc      = mysql_result($result,$i,"description");   
      $rate      = mysql_result($result,$i,"doc_no");   
      $code      = mysql_result($result,$i,"inputby");   
      $update    = mysql_result($result,$i,"date");  
      $contact   = "PAY";
      $qty       = mysql_result($result,$i,"inputby");
      $total     = mysql_result($result,$i,"inputby");
      $update2 = $code; 
      $tot = $tot +$total;
      $code   = number_format($code);
      $update2 = number_format($update2);


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
      $tot2 = number_format($tot);
      echo"</table>";
echo"<img src='ico/black.jpg' style='width:800px;height:1px;'><br>"; 
echo"</font>";
echo"<table>";
echo"<tr><td width ='0' align ='right'><b>Total:</b></td><td width ='45'></td><td><b>$tot2</b></td></tr>";
echo"<tr><td width ='0' align ='right'><b>Prepared by:</b></td><td width ='45'></td><td>____________________</td></tr>";
echo"<tr><td width ='0' align ='right'><b>Authorised by:</b></td><td width ='45'></td><td>____________________</td></tr>";

echo"<tr><td width ='0' align ='right'><b>Received by:</b></td><td width ='45'></td><td>____________________</td></tr>";

echo "</table></b>";
                                                         
                                                        


   $query3 = "DELETE FROM debtorstrfile_allocate2 WHERE inputby >0";
   $result3 =mysql_query($query3) or die(mysql_error());


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
 $query3 = "TRUNCATE TABLE debtorstrfile_allocate2";
 $result3 =mysql_query($query3) or die(mysql_error());
 
    $sql ="INSERT INTO debtorstrfile_allocate2 SELECT * FROM dtransf WHERE balance  >0 and acc_no<>' ' and acc_no= '".$q."'";
    $result = mysqli_query($con,$sql);
   $all_bal = 0;
   $query3 = "select balance,acc_no FROM debtorstrfile_allocate2" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $all_bals   = mysql_result($result3,$i3,"balance");  
     $all_bal = $all_bal + $all_bals;
     $i3++;
     }

     $_SESSION['all_bals']=$all_bal;

}else{
    echo"<a href='debtors_allocation.php'>Refresh Page</a>";
}
if (isset($_GET['accountsspay'])){      
   $record =$_GET['accountsspay'];
   $topay =$_GET['accounts33'];
   
   $all_bal = $all_bal-$topay;
   $query3 = "UPDATE debtorstrfile_allocate2 set inputby = '$topay' WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());

   echo"<form action ='getdebtor4.php' method ='GET'>";

   echo"<table><tr><td width ='100'><b>Vourcher No.</b></td><td width='50' align='left'><input type='text' id ='jv_no' 
   name='jv_no' size='10' value ='$next_jv'></td></tr><tr><td width ='100'><b>Pay Date:</b></td><td width='50' 
   align='left'><input type='text' id ='date' name='date' size='10' value ='$mydate'></td></tr>";

   $tot_balx = $_SESSION['all_bals'] -$all_bal;

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
   
   echo"</td><td width ='50'></td><td width='10' align='left'></td></tr>"; 



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
//      $qty    = mysql_result($result,$i,"inputby");   
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
         $cdquery="SELECT account_name FROM debtorsfile order by account_name";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM debtorsfile order by account_name";
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
echo"<img src='ico/black.jpg' style='width:100%;height:2px;'><br>";   

echo"</table>";








}

if (isset($_GET['accountssno'])){      
   $record =$_GET['accountssno'];
   $topay =0;

   $query3 = "UPDATE debtorstrfile_allocate2 set inputby = '$topay' WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());




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
//      $qty    = mysql_result($result,$i,"inputby");   
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

$con = mysqli_connect('localhost','root','v9p0CnfH60','newhmisc_trinity');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$all_bal=$all_bal*-1;   
echo"<table width ='100%'><td width ='20%'><a href='getdebtor4.php?accountsspay=100x&accounts33=100000'>Refresh Figures</a></td><td width ='80%' align='right'><h3>Amt. Paid:</h3></td><td width='20%' align='left'>$all_bal</td></tr>"; 


//mysqli_select_db($con,"selfcare_kiragu");
//Copy entries to allocation file
//--------------------------------


//tabitha mburu
//rencon ismail - 

echo "<table width ='100%' border='1' bgcolor ='silver'>
<tr>
<th bgcolor ='black'><font color ='white' width ='30%'>Narration</th>
<th bgcolor ='black'><font color ='white' width ='10%'>Date</th>
<th bgcolor ='black'><font color ='white' width ='5%'>Doc.No</th>
<th bgcolor ='black'><font color ='white' width ='5%'>Type</th>
<th bgcolor ='black'><font color ='white' width ='10%'>Amount</font></th>
<th bgcolor ='black'><font color ='white' width ='5%'></font></th>
<th bgcolor ='black'><font color ='white' width ='5%'>Pay</font></th>
<th bgcolor ='black'><font color ='white' width ='5%'>Part Pay</font></th>
<th bgcolor ='black'><font color ='white' width ='5%'>Paid</font></th>
</tr>";
$tot_amt = 0;
$sql2="SELECT * FROM debtorstrfile_allocate2  order by date DESC";
$result2 = mysqli_query($con,$sql2);
while($row = mysqli_fetch_array($result2)) {
    echo "<tr bgcolor ='black'>";
    $id = $row['id'];
    $paid = $row['inputby'];
    $balance = $row['balance'];

    $tot_amt = $tot_amt+$paid;
    echo "<td bgcolor ='white'><font color ='black'>".$row['description']."</td>";
    echo "<td bgcolor ='white'><font color ='black'>" . $row['date'] . "</td>";
    echo "<td bgcolor ='white'><font color ='black'>" . $row['doc_no'] . "</td>";
    echo "<td bgcolor ='white'><font color ='black'>" . $row['type'] . "</td>";
    echo "<td align ='right' bgcolor ='white'><font color ='black'>" . $row['balance'] . "</td>";
    echo "<td align ='right' width ='5%' bgcolor ='white'></td>";
    if ($paid == $balance){
    echo "<td bgcolor ='white'><font color ='black'>" ."<a href='getdebtor4.php?accountssno=$id&accounts33=$balance')>"."Undo"."</a>" . "</td>";
    }else{
    echo "<td bgcolor ='white'><font color ='black'>" ."<a href='getdebtor4.php?accountsspay=$id&accounts33=$balance')>"."Pay"."</a>" . "</td>";
    }
    
    if ($paid == $balance){
        
        
    echo "<td bgcolor ='white'><font color ='black'>" ."<a href=javascript:popcontact3('part_pay_allocation.php?accountssno=$id&accounts33=$balance')>"."Undo"."</a>" . "</td>";
    }else{
    echo "<td bgcolor ='white'><font color ='black'>" ."<a href=javascript:popcontact3('part_pay_allocation.php?accountsspay=$id&accounts33=$balance')>"."Pay"."</a>" . "</td>";
    }
    
    echo "<td align ='right' bgcolor ='white'><font color ='black'>" .$row['inputby']. "</td>";
    echo "</tr>";
}
echo "</table>";
//mysqli_close($con);
?>


<?php
echo"<table><tr></tr></table>";
   
echo"<img src='ico/black.jpg' style='width:100%;height:1px;'>";
echo"<table border ='0' width ='100%'><td></td><td><b>";

$tot_amt_bal = $tot_amt;
$_SESSION['all_balance'] = $tot_amt_bal;
echo $tot_bal;

echo"</td><td width ='100' align ='right'></td><td width ='100'></td><td width ='100'><td></td><td width ='100' align ='right'><h3>Total Paid:</b></td><td><b>$tot_amt</b></td></font>";
   
      echo"</table>";
      
      
      
      echo"<font color ='red'><h3>SELECT BANK ACCOUNT TO CREDIT</h3></font><table width='50%'>";
         echo"<td width ='50%' align ='left'>";
         echo"<select id='item1x' name='item1x'>";
         $cdquery="SELECT account_name FROM glaccountsf where type ='BANK'";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM glaccountsf where type ='BANK'";
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;
         while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["account_name"];     
            echo "<option>$cdTitle</option>";            
         }
         echo"</select>";
         echo"</td></table>"; 

    
      
?>
<table border='0' border color ='red'><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td><td><input type='submit' name='delete'  class='button' value='Cancel Transaction'></td></table>
</form>
</body>
</html>