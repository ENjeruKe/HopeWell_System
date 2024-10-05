<?php
// PHP Grid database connection settings
define("PHPGRID_DBTYPE","Mysql"); // or mysqli
define("PHPGRID_DBHOST","localhost");
define("PHPGRID_DBUSER","root");
define("PHPGRID_DBPASS","v9p0CnfH60");
define("PHPGRID_DBNAME","newhmisc_trinity");

// Automatically make db connection inside lib
define("PHPGRID_AUTOCONNECT",0);

// Basepath for lib
define("PHPGRID_LIBPATH",dirname(__FILE__).DIRECTORY_SEPARATOR."lib".DIRECTORY_SEPARATOR);
