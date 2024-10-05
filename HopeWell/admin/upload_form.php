<?php
if (isset($_POST['upload']))
   {
        //turn on php error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {             
            $name     = $_FILES['file']['name'];
            $tmpName  = $_FILES['file']['tmp_name'];
            $error    = $_FILES['file']['error'];
            $size     = $_FILES['file']['size'];
            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));
           
            switch ($error) {
                case UPLOAD_ERR_OK:
                    $valid = true;
                    //validate file extensions
                    if ( !in_array($ext, array('jpg','jpeg','png','gif','doc','pdf')) ) {
                        $valid = false;
                        $response = 'Invalid file extension.';
                    }
                    //validate file size
                    if ( $size/1024/1024 > 2 ) {
                        $valid = false;
                        $response = 'File size is exceeding maximum allowed size.';
                    }
                    //upload file
                    if ($valid) {
                        $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'uploads' . DIRECTORY_SEPARATOR. $name;
                        move_uploaded_file($tmpName,$targetPath);
                        header( 'Location: upload_form.php' ) ;
                        exit;
                    }
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $response = 'The uploaded file was only partially uploaded.';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $response = 'No file was uploaded.';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $response = 'File upload stopped by extension. Introduced in PHP 5.2.0.';
                    break;
                default:
                    $response = 'Unknown error';
                break;
            }
 
            echo $response;
        }

}
        ?>




<!DOCTYPE html>
<html lang="en">
  <head>







<meta charset="utf-8">
    
<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
    
<div class="navbar navbar-inverse navbar-fixed-top">
      
<div class="navbar-inner">                  
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
<a class="brand" href="#">Medi+ V10 (HMIS Global)</a><div class="nav-collapse collapse"><p class="navbar-text pull-right"><a target="_blank" href="http://www.hmisglobal.com" class="navbar-link">www.hmisglobal.com</a></p>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>







<!-- Le styles -->
    
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
<style type="text/css">
	body {
		padding-top: 0px;
		padding-bottom: 40px;
	}
	.sidebar-nav {
		padding: 9px 0;
	}
	.nav
	{
		margin-bottom:10px;
	}	
	.accordion-inner a {
		font-size: 13px;
		font-family:tahoma;
	}
	.alert {
		padding:8px 14px 8px 14px;
	}
    </style>


















    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--title>PHP File Uploader</title-->
 
    <!-- Bootstrap core CSS -->
    <link href="boostrap/css/bootstrap.min.css" rel="stylesheet">
    
  </head>
 
  <body>
 
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <!--div class="navbar-header"-->
          <!--a class="navbar-brand" href="index.php">PHP File Uploader</a-->
        <!--/div-->
      </div>
    </div>
 
 
    <div class="container">
 
          <div class="row">
            <div class="col-lg-12">
               <form class="well" action="upload_form.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="file">Select a file to upload</label>
                    <input type="file" name="file">
                    <p class="help-block">Only jpg,jpeg,png and gif file with maximum size of 1 MB is allowed.</p>
                  </div>
                  <input type="submit" name ="upload" class="btn btn-lg btn-primary" value="Upload">
                </form>
            </div>
          </div>
    </div> <!-- /container -->
 
  </body>
</html>
