<?php
session_start();
 require('open_database.php');
 $location = $_SESSION['company'];

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 0px solid black;
    padding: 1px;
}

th {text-align: left;}
</style>


<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">

<script language="javascript" type="text/javascript">
var newwindow;
function popcontact59(url) {
	newwindow=window.open(url,'newwindow','height=500,width=400');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>

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
   $credit_account =$_GET['credit_account'];
   $narration =$tr_type.''.$cheque_no;
   $debit_account ='Doctors Control Account';
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


   //Get account to credit
   //---------------------
   $balancez=0;
   $cr_amount = 0;
   $query = "select * FROM htransf_allocate WHERE qty <>0" ;
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
      $pay     = mysql_result($result,$i,"qty");  
      $balance = mysql_result($result,$i,"amount");  
      $tot_amt = $tot_amt + $pay;
      $new_bal = $balance-$pay;     
      $cr_amount = $cr_amount + $pay;
      $account_name = mysql_result($result,$i,"doc_no");      
      $mydates =date('y-m-d');
      if ($balance <0){
         $balancez = $balancez+$balance;
      }
      $query2= "UPDATE dtransf SET balance ='$new_bal' WHERE id ='$id'";
      $result2 =mysql_query($query2);

     $i++;
     }
     //Receipts are posted seperately thus will not post it here
     //---------------------------------
     $query5= "INSERT INTO dtransf VALUES('','$account_name','$mydates','Payment on Allocation','$ref_no','Pay','Pay','$tot_amt','$balancez','$username')";
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

   $sup_balance = $sup_balance -$tot_amt;
   $query2= "UPDATE debtorsfile SET os_balance ='$sup_balance' WHERE account_name ='$account_name'";
   $result2 =mysql_query($query2);




      //Go and update gltransf
      //----------------------
      $query5= "INSERT INTO gltransf VALUES('','$mydates','$debit_account','$ref_no','Pay','$account_name','$tot_amt','$username','')";
      $result5 =mysql_query($query5);

    


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
   $query5= "INSERT INTO gltransf VALUES('','$mydates','$credit_account','$ref_no','Pay','$account_name','-$cr_amount','admin','')";
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

   $query= "SELECT * FROM debtorstrfile_allocate WHERE qty >0";
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   echo"<table bgcolor ='white' border ='0' width ='100%'>";
   //-------Sawa -------------
   $SQL = "select * FROM debtorstrfile_allocate WHERE qty >0" ;
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      {         
      $desc      = mysql_result($result,$i,"description");   
      $rate      = mysql_result($result,$i,"doc_no");   
      $code      = mysql_result($result,$i,"qty");   
      $update    = mysql_result($result,$i,"date");  
      $contact   = "PAY";
      $qty       = mysql_result($result,$i,"qty");
      $total     = mysql_result($result,$i,"qty");
      $update2 = $code; 
      $tot = $tot +$total;
      $code   = number_format($code);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);

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
                                                         
                                                        


   $query3 = "DELETE FROM debtorstrfile_allocate WHERE qty >0";
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
 $query3 = "DELETE FROM htransf_allocate where doc_no<>''";
 $result3 =mysql_query($query3) or die(mysql_error());
}else{
}
if (isset($_GET['accountsspay'])){      
   $record =$_GET['accountsspay'];
   $topay =$_GET['accounts33'];

   $query3 = "UPDATE htransf_allocate set qty = '$topay' WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());

   echo"<form action ='getreturnee.php' method ='GET'>";

   echo"<table>"; 

   echo"<tr>";
   echo"<td width ='50' align ='left'><b>Paying A/c:</b></td><td>";
   echo"<td width='10' align='left'><input type='text' id ='cheque_no' 
   name='cheque_no' size='10' ></td>";
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
   $topay =0;

   $query3 = "UPDATE debtorstrfile_allocate set qty = '$topay' WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());




   echo"<table>";


   

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
         echo"<td width ='400' align ='left'><td width='10' align='left'><input type='text' id ='cheque_no' 
   name='cheque_no' size='10'  onchange='showUser(this.value)'></td>";
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

//$con = mysqli_connect('localhost','root','0710958791','wama3');
//if (!$con) {
//    die('Could not connect: ' . mysqli_error($con));
//}

//mysqli_select_db($con,"wama3");
//Copy entries to allocation file
//--------------------------------
$sql ="INSERT INTO htransf_allocate SELECT * FROM htransf WHERE amount<>0 and doc_no= '".$q."' and trans2= 'PHARMACY DRUGS' and type= 'DB'";
$result = mysqli_query($con,$sql);

$query3 = "DELETE FROM htransf_allocate WHERE doc_no =''";
$result3 =mysql_query($query3) or die(mysql_error());
//here

echo "<table>
<tr>
<th bgcolor ='black'><font color ='white' width ='200'>Narration</th>
<th bgcolor ='black'><font color ='white' width ='50'>Date</th>
<th bgcolor ='black'><font color ='white' width ='100'>Doc.No</th>
<th bgcolor ='black'><font color ='white' width ='50'>Type</th>
<th bgcolor ='black'><font color ='white' width ='50'>Amount</font></th>
<th bgcolor ='black'><font color ='white' width ='30'>Qty</font></th>
<th bgcolor ='black'><font color ='white' width ='30'>Action</font></th>
</tr>";
$tot_amt = 0;
$sql2="SELECT * FROM htransf_allocate";
$result2 = mysqli_query($con,$sql2);
while($row = mysqli_fetch_array($result2)) {
    echo "<tr>";
    $id = $row['id'];
    $paid = $row['qty'];
    $balance = $row['balance'];
    $amount = $row['amount'];
    $balances = $row['balance'];
    $service = $row['service'];
    
    $tot_amt = $tot_amt+$paid;
    echo "<td>".$row['service']."</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['doc_no'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td align ='right'>" . $row['amount'] . "</td>";
    echo "<td align ='right'>" .$row['qty']. "</td>";
    
    if ($paid == $balance){
    echo "<td>" ."<a href='getreturnee.php?accountssno=$id&accounts33=$balance')>"."Undo"."</a>" . "</td>";
    }else{
    //echo "<td>" ."<a href='getreturnee.php?accountsspay=$id&accounts33=$balance')>"."Return"."</a>" . "</td>";
    echo"<td><a href=javascript:popcontact59('return_opissue.php?invoice=$id&count=$paid&price=$amount')><font color ='red'><b>Return</b></font></a></td>";

    }
    echo "</tr>";
}
echo "</table>";
//mysqli_close($con);
?>


<?php
echo"<table><tr></tr></table>";
   
echo"<img src='ico/black.jpg' style='width:600px;height:1px;'>";
echo"<table border ='2' width ='100%'><td></td><td><b>";

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