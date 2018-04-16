<?php include ('action.php');?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>product_viewer</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/js-image-zoom@0.4.1/js-image-zoom.js" type="application/javascript"></script>
      <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
      <script src="./assets/js/magnifier.js"></script>
      <script src="./assets/js/script.js"></script>
      <style type="text/css">
         .starRating input { display:none; }
         .starRating label { 
         width: 18px; 
         height: 16px; 
         display: inline-block;
         text-indent: -9999px; /* hide the label text off screen */
         background: url("http://designmoo.com/wp-content/uploads/2011/01/rating_stars.png") -155px -32px;
         }
         .starRating label.on { 
         background-position: -155px -76px;
         }
         #comment_box  {
         margin-bottom: 10px;
         }
         #comment_box label{
         color: blue;
         }
      </style>
   </head>
   <body style="background:#dadde1;">
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
      <div style="">
         <?php
            if(isset($_GET['view'])){
                $product_id = (isset($_GET['product_id'])) ? intval($_GET['product_id']): null;
                $sql = "SELECT * FROM products WHERE product_id='$product_id'";
                  $run_query = mysqli_query($con,$sql);
                  // print_r($product_id);
                  // exit;
                  while($row=mysqli_fetch_array($run_query)){
                  $product_id = $row["product_id"];
                  $product_desc = $row["product_desc"];
                  $product_title = $row["product_title"];
                  $product_price = $row["product_price"];
                  $product_image = $row["product_image"];
                  $product_imagefront = $row["product_imagefront"]; 
                  $product_imageback = $row["product_imageback"];
                  $product_imageside = $row["product_imageside"];
                  
                                              
                  }
            }   
              
                              ?>
         <div class="container" style="margin-top:50px;">
            <div class="panel panel-info">
               <div class="panel-heading">Product Details</div>
               <div class="panel-body" style="height: 900px !important;">
                  <div class="col-md-12">
                     <div class="col-md-1"  >
                        <div class="img-container">
                           <img src="product_images/<?php echo $product_imagefront;?>"  id="front" alt="image" title="Images">
                        </div>
                        <div class="img-container"><img src="product_images/<?php echo $product_imageback;?>" id="back" alt="image" title="Images"></div>
                        <div class="img-container"><img src="product_images/<?php echo $product_imageside;?>"  id="side" alt="image" title="Images"></div>
                        <div class="img-container"><img  id="full" alt="image" src="product_images/<?php echo $product_image;?>"></div>
                     </div>
                     <div class="col-md-5">
                        <div id="mainDiv" class="onZoom">
                           <div class="main-img-container active"><img id="img" data-toggle="magnify" src="product_images/<?php echo $product_image;?>"   />
                              <img id="imgfront" data-toggle="magnify" src="product_images/<?php echo $product_imagefront;?>" style="display:none"/>
                              <img id="imgback" data-toggle="magnify" src="product_images/<?php echo $product_imageback;?>" style="display:none"/>
                              <img id="imgside" data-toggle="magnify" src="product_images/<?php echo $product_imageside;?>" style="display:none"/>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <ul class="nav nav-tabs">
                           <li class="active"><a data-toggle="tab" href="#prod">Product Description</a></li>
                           <li><a data-toggle="tab" href="#size">Select Size</a></li>
                           <li><a data-toggle="tab" href="#rating">User Ratings</a></li>
                        </ul>
                        <div class="tab-content">
                           <div id="prod" class="tab-pane fade in active">
                              <p><b style="color:#576fc0;"><?php echo $product_title;?></b></p>
                              <p>Description:<?php echo $product_desc;?></p>
                              <p><b style="color:#ea8f18;">Price:</b><b style="color:#f14307;">₹<?php echo $product_price;?></b></p>
                           </div>
                           <div id="size" class="tab-pane fade">
                              <select id="what" class="form-control selectpicker show-tick" tab-index="-98" style="width:26%;">
                                 <option disabled selected style="display:none;">--Select Size--</option>
                                 <option>Small</option>
                                 <option>Medium</option>
                                 <option>Large</option>
                              </select>
                           </div>
                           <div id="rating" class="tab-pane fade">
                              <input type="hidden" name="product_id"  id="product_id" value="<?php echo $product_id?>">
                              <fieldset>
                                 <h3>Rate this product</h3>
                                 <div class="control-group" id="rating">
                                    <table class="controls rating" id="rating">
                                       <tr>
                                          <td>
                                             <label><input type="radio" name="rating" id="rating" value="1" />1</label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="rating" id="rating" value="2" />2</label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="rating" id="rating" value="3" />3</label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="rating"  id="rating" value="4" />4</label>
                                          </td>
                                          <td>
                                             <label><input type="radio" name="rating" id="rating" value="5" />5</label>
                                          </td>
                                       </tr>
                                    </table>
                                 </div>
                                 <input type="text" name="name" value="" id="name" placeholder="your name" ><br><br>
                                 <textarea id="comments" name="comments" rows="3" placeholder="comments"cols="35" style="resize: none;font-size: 13px;"></textarea>
                                 </p>
                                 <input name="submit" type="submit" value="post review" id="submit_review"></p>
                              </fieldset>
                              
                              <div id="displayArea"></div>
                              <!-- comments diplaying throgh ajax -->
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript">
         // on review submission
              $("#submit_review").click(function() {
         
           var comment_name = $("#name").val(); 
           var comment = $("#comments").val();
           var rating=$("input[name='rating']:checked").val();
           var product_id=$("#product_id").val();
           // alert("");
         
           $.ajax({
             type:"POST",
             url:"action.php",
             async:false,
             data:{
               "done":1,
               "username": comment_name,
               "comment_text":comment,
               "rating_val":rating,
               "prod_id":product_id
             },
             success:function(data) {
               alert("Review posted successfully!");
               displayFromDatabase();
               $("#name").val('');
               $("#comments").val('');
               // $("input[name='rating']:checked").val('');
               function unselect(){
                 var rating=$("input[name='rating']");
                 if($(this).attr('checked')){
                 $(this).removeAttr('checked');
                 $(this).prop('checked',false);
                 $(this).find('label').removeClass('on');
               }
             }
         
             }
           })
         });
         
         // display comments
         function displayFromDatabase(){
           var product_id=$("#product_id").val();
           $.ajax({
             url:"action.php",
             type:"POST",
             async:false,
             data:{
               "display":1,
               "prod_id":product_id
         
         
             },
             success: function(d){
               $("#displayArea").html(d);
             }
           });
         }
            
      </script>
   </body>
</html>