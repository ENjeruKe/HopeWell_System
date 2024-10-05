<?php
 //		    header('location:http://paltechsystemconsultants.co.ke/kingdavids/kingdavid/admin/index.php');
 //		die();    

/* Database config */
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= 'v9p0CnfH60';
$db_database	= 'newhmisc_trinity'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>