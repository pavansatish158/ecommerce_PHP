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
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
               <div class="search-container">
                  <input type="text" placeholder="Search by categoeries,names" name="keywords" id="keywords" autocomplete="off">
                  <button type="submit" id="search"><i class="fa fa-search"></i></button>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div id="mySidenav" class="sidenav" style="margin-top:50px;">
               <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
               <div id="accordion">
                  <div id="cat_data"></div>
                  <div id="subcat_data"></div>
               </div>
            </div>
            <div id="main" style="margin-top:50px;">
               <span style="font-size:18px;cursor:pointer;" data-toggle="collapse" onclick="openNav()" >&#9776; Categories</span>
               <div class="panel panel-info" style="margin-top:50px;">
                  <div class="panel-heading">Products</div>
                  <div class="panel-body">
                     <div id="load_data"></div>
                     <!-- results appear here dynamically through ajax--> 
                     <div id="load_data_message"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="panel-footer">&copy;All Rights Reserved 2018</div>
      </div>
      <script type="text/javascript">
         function openNav() {
         document.getElementById("mySidenav").style.width = "180px";
         document.getElementById("main").style.marginLeft = "180px";
         }
         
         function closeNav() {
         document.getElementById("mySidenav").style.width = "0";
         document.getElementById("main").style.marginLeft= "0";
         }
         
         
         
         function showSubCat(id) {
         $(".subcategory_"+id).toggle();
         }
         
         function toggleSubCat(id) {
         $("#uparrow_"+id).toggle();
         $('#downarrow_'+id).toggle();
         $(".subcatli").not(".subcatli_"+id).hide();
         $(".subcatli_"+id).toggle();
         }
               // product categoery wise list items
                 function item(event) {
         var target = event.target || event.srcElement;
         // alert(event.target.getAttribute('value'));
         var product_cat=event.target.getAttribute('value');
         var action = 'inactive';
                       
                 $.ajax({
                       url: "action.php",
                       method: "POST",
                       async:false,
                       
                       data: {
                             "categories": 1,
                             "product_cat":product_cat
                       },
                       cache:false,
                       success: function (data) {
                             $('#load_data').html(data);
                              if (data !== '') {
                         // alert("no data");
                         $('#load_data_message').html("<lable class='btn'>End of results.</lable>");
                         action = 'active';
                         }
                       }
         
                 });
                }
         
                      // on search submission
                   $("#search").click(function() {
               var keywords = $("#keywords").val();
                   if(keywords.trim()==''){   /*If the fields are blank*/
                     alert("Please give input");
                   }
                   else{
                $.ajax({
                  type:"POST",
                  url:"action.php",
                  async:false,
                  data:{
                    "search":1,
                    "keywords": keywords
                  },
                  success:function(data) {
                    $('#load_data').html(data);
                    
                  }
                })
              }
              });
                   // all categories display
                   function makeAJAXPost(){
         var action = 'inactive';
         
         function load_display_data() {
         $.ajax({
           url: "action.php",
           method: "POST",
           data: {
             "allcategories": 1
           },
           cache: false,
           success: function (data) {
             $('#load_data').html(data);
           }
         });
         }
         
         if (action == 'inactive') {
         action = 'active';
         load_display_data();
         }
         
         }
         
      </script>
   </body>
</html>