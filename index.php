<?php include('action.php'); 
   // session_start();
      // errors displaying
              ini_set('display_errors', 1);
              ini_set('display_startup_errors', 1);
              error_reporting(E_ALL);
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <!-- meta-data -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="PHP-ecommerce">
      <meta name="author" content="Pavan Satish Reddy Kutha">
      <title>ecommerce</title>
      <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script type="text/javascript" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="./assets/js/magnifier.js"></script>
      <script src="./assets/js/script.js"></script>
   </head>
   <body>
      <div class="navbar navbar-inverse navbar-fixed-top">
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
               <span class="sr-only">navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a href="#" class="navbar-brand">Ecommerce</a>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
               <ul class="nav navbar-nav">
                  <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                  <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Products</a></li>
               </ul>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="panel panel-info" style="margin-top:50px;">
               <div class="panel-heading">Products</div>
               <div class="panel-body">
                  <div id="load_data"><!-- results appear here dynamically through ajax--></div>
                    <div id="load_data_message"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="panel-footer">&copy;All Rights Reserved 2018</div>
   </body>
</html>