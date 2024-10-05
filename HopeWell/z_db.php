<?php
$con = new mysqli("localhost", "root", "v9p0CnfH60", "newhmisc_trinity");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>