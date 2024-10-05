<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
?>
?

<?php

if (isset($_GET['submit'])){
   $adm_no   = $_GET['adm_no'];
   $patients_name    = $_GET['patients_name'];
   $gender    = $_GET['gender'];
   $pay_account   = $_GET['pay_account'];
   $adm_date    = $_GET['adm_date'];
   $disch_date  = $_GET['disch_date'];
   $bed_no     = $_GET['bed_no'];
   $phone     =$_GET['phone'];
   $city      =$_GET['city'];
   $e_mail    =$_GET['e_mail'];
   $country   =$_GET['country'];
   $doc_name   =$_GET['account_doc'];
   $doctor    =$_GET['doctor'];
   $street    =$_GET['street'];
   $age       =$_GET['age'];
   $adm_date  =$_GET['adm_date'];
   $dis_date  =$_GET['disch_date'];
   $out       =$_GET['out'];



   



   $query= "UPDATE clients SET patients_name ='$patients_name',phone ='$phone',city ='$city',gender='$gender',pay_account='$pay_account',adm_date='$adm_date',disch_date='$dis_date',doctor ='$doctor',country ='$country',e_mail ='$e_mail',age ='$age',next_add ='$street',remarks='$doc_name',out_days='$out',bed_no='$bed_no' WHERE adm_no ='$adm_no'"; 
   $result =mysql_query($query);

 $query= "UPDATE htransf SET patients_name ='$patients_name' WHERE adm_no ='$adm_no'"; 
 $result =mysql_query($query);

 if ($bed_no<>''){
 $query3  = "UPDATE bedsfile SET patients_name ='',adm_no ='' WHERE adm_no ='$adm_no'";
   $result3 = mysql_query($query3);

 $query3  = "UPDATE bedsfile SET patients_name ='$patients_name',adm_no ='$adm_no' WHERE bed_no ='$bed_no'";
   $result3 = mysql_query($query3);
}

  }
?>

<?PHP
if (isset($_GET['accounts'])){
   $client_no =$_GET['accounts'];
   $adm_no =$_GET['accounts3'];
   $query = "select * FROM clients WHERE adm_no = '$adm_no'" ;
   $result =mysql_query($query) or die(mysql_error());

   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;


   $SQL = "select * FROM clients WHERE adm_no = '$adm_no'" ;
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      {         
      $adm_no   = mysql_result($result,$i,"adm_no");  
      $patients_name    = mysql_result($result,$i,"patients_name");   
      $gender    = mysql_result($result,$i,"gender");   
      $pay_account   = mysql_result($result,$i,"pay_account");   
      $adm_date = mysql_result($result,$i,"adm_date");  
      $disch_date = mysql_result($result,$i,"disch_date");  
      $street     = mysql_result($result,$i,"next_add");  
      $bed_no     = mysql_result($result,$i,"bed_no");  
      $phone     =mysql_result($result,$i,"phone");  
      $city      =mysql_result($result,$i,"city");  
      $e_mail     =mysql_result($result,$i,"e_mail"); 
      $doc_name     =mysql_result($result,$i,"remarks");  
      $country     =mysql_result($result,$i,"country");  
      $doctor    =mysql_result($result,$i,"doctor");  
      $age       =mysql_result($result,$i,"age");
      $out       =mysql_result($result,$i,"out_days");

    }
}else{

      $adm_no   = '';
      $patients_name    = '';
      $gender    = '';
      $pay_account   = '';
      $adm_date = '';
      $disch_date = '';
      $bed_no     = '';
      $phone     ='';
      $city      ='';
      $e_mail     ='';
      $country     ='';      
      $doctor    ='';
      $age       ='';
      $street    ='';
      $doc_name  ='';
      $out  =0;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
        <title>HMIS - Global: Patients Register</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="patients_reg_add_files/default.css">
    </head>
    <body> 

     
        <form enctype="multipart/form-data" method="get" action="patients_reg_edit.php" class="register">
            <h1>Edit Registration</h1>
            <!--fieldset class="row1">
                <legend>Account Details
                </legend>
                <p>
                    <label>Email *
                    </label>
                    <input type="text">
                    <label>Repeat email *
                    </label>
                    <input type="text">
                </p>
                <p>
                    <label>Password*
                    </label>
                    <input type="text">
                    <label>Repeat Password*
                    </label>
                    <input type="text">
                    <label class="obinfo">* obligatory fields
                    </label>
                </p>
            </fieldset-->

            <fieldset class="row2">
                <legend>Personal Details
                </legend>
                <p>
                    <label>ADM No. *
                    </label>
                    <?php
                    echo"<input class='long' type='text' name ='adm_no' value ='$adm_no' readonly>";
                    ?>
                </p>
                <p>
                    <label>Full Name *
                    </label>
                    <?php
                    echo"<input class='long' type='text' name ='patients_name' value ='$patients_name'>";
                    ?>
                </p>
           
                <p>
                    <label>Phone *
                    </label>
                    <?php
                    echo"<input maxlength='10' type='text' name ='phone' value ='$phone'>";
                    ?>
                </p>
                <p>
                    <label class="optional">Residence
                    </label>
                    <?php
                    echo"<input class='long' type='text' name ='street' value ='$street'>";
                    ?>
                </p>
                <p>
                    <label>Kin *
                    </label>
                    <?php
                    echo"<input class='long' type='text' name ='city' value ='$city'>";
                    ?>
                </p>
                <p>
                    <label>Tel *
                    </label>

                    <?php
                    echo"<input class='long' type='text' name ='country' value ='$country'>";
                    ?>
                </p>
                <p>
                    <label class="optional">E-mail:
                    </label>
                    <?php
                    echo"<input class='long' value='$e_mail' type='text' name ='e_mail'>";
                    ?>
                </p>


                <p>
                    <label>Bed Rate:*
                    </label>
                    <?php
                    echo"<input class='long'   type='text' name ='doctor' value ='$doctor'>";
                    ?>
                </p>




                <p>
                    <label class="optional"></label>
                    <!--input class="long"   type="text" name ="acc_name"-->

                </p>

               <p>
                    <label>Doctor:*
                    </label>
                    <?php
                    echo"<input class='long'   type='text' name ='account_doc' value ='$doc_name'>";
                    ?>
                </p>




<!-- Bed Number here-->
          <p>
                <label class="optional">Bed No:  </label>
                 <!--input maxlength="10"   type="text" name ="acc_no"-->
               <select id="bed_noc" name="bed_no">        
               <?php                        
               $cdquery="SELECT bed_no FROM bedsfile where adm_no ='' order by bed_no";
               $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
               while ($cdrow=mysql_fetch_array($cdresult)) {
               $cdTitle=$cdrow["bed_no"];
                   echo "<option>
                    $cdTitle
                   </option>";
            
               }                
               ?>    
              </select>
                </p>
<!-- End of Bed No -->





            </fieldset>



            <fieldset class="row3">
                <legend>Further Information
                </legend>


                <p>
                    <label class="optional">Admission Date
                    </label>
                    <?php
                    echo"<input maxlength='10' value='$adm_date' type='text' name ='adm_date'>";
                    ?>
                </p>

                <p>
                    <label class="optional">Discharge Date                    </label>
                    <?php
                    echo"<input maxlength='10' value='$disch_date' type='text' name ='disch_date'>";
                    ?>
                </p>


                <p>
                    <label>Gender *</label>
                 <?php
                 echo"<input class='lon' size ='10' type='text' name ='gender' value ='$gender' required>";
                 ?>
                </p>
                <p>
                    <label>Age *
                    </label>
                    <?php
                    echo"<input class='year' size='4' maxlength='4' type='text' name='age' value ='$age' required>";
                    ?>
                </p>


                <p>
                    <label>Days out:
                    </label>
                    <?php
                    echo"<input class='year' size='2' maxlength='2' type='text' name='out' value ='$out'>";
                    ?>
                </p>


                <!--p>


                </p-->


                <p>


                <label class="optional">Paying A/c. </label>
                <select id="pay_account" name="pay_account">
               <?php            
               //$mysqlserver="localhost";
               //$mysqlusername="hmisglobal";
               //$mysqlpassword="jamboafrica";
               //$link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql //server: ".mysql_error());
            
               //$dbname = 'hmisglob_griddemo';
               //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: //".mysql_error());
            
               $cdquery="SELECT account_name FROM debtorsfile";
               $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
               while ($cdrow=mysql_fetch_array($cdresult)) {
               $cdTitle=$cdrow["account_name"];
                   echo "<option>$cdTitle</option>";            
               }
                

                 ?>        
              </select>



                </p>













            </fieldset>
            <fieldset class="row4">
                <!--legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input value="" type="checkbox">
                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
                <p class="agreement">
                    <input value="" type="checkbox">
                    <label>I want to receive personalized offers by your site</label>
                </p>
                <p class="agreement">
                    <input value="" type="checkbox">
                    <label>Allow partners to send me personalized offers and related services</label>
                </p-->
            </fieldset>




            <div><button name='submit' type='submit' class='button' id='contact-submit' data-submit='...Sending' >Save Changes</button></div>
            <!--div><input type="submit" name="Submit"  class="button" value="New Patient" /></div-->
            <!--input type="submit" name="Submit" class="button" onclick="return popitup('http://localhost/HGlobal/reg_add.html')">Register »</button-->
        </form>
    






</body></html>