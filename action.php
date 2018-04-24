<?php session_start();
   // errors displaying
           ini_set('display_errors', 1);
           ini_set('display_startup_errors', 1);
           error_reporting(E_ALL);
   
   $servername = "localhost";
   $username = "root";
   $password = "root";
   $db = "ecommerce";
   
   // Create connection
   $con = mysqli_connect($servername, $username, $password,$db);
   
   // Check connection
   if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
   }
   $product_id="";
   $product_cat="";
   $product_desc="";
   $product_title="";
   $product_price="";
   $product_image="";
   $product_imagefront ="";
   $product_imageback="";
   $product_imageside="";
   
   
   // on scroll auto loading function
   
   if(isset($_POST['scroll'])){  
    if(isset($_POST["limit"], $_POST["start"]))
   {
   
   $con = mysqli_connect($servername, $username, $password,$db);
   $sql = "SELECT * FROM products ORDER BY product_id ASC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
   $run_query = mysqli_query($con, $sql);
   while($row = mysqli_fetch_array($run_query))
   {
            $product_id = $row["product_id"];
                $product_desc = $row["product_desc"];
                $product_title = $row["product_title"];
                $product_price = $row["product_price"];
                $product_image = $row["product_image"]; 
   echo '
   <form action="product_viewer.php" method="get">
                                <div class="col-md-3 col-sm-3 col-xs-12 image-main-section">
                                    <div class="row img-part">
                                      <div class="col-md-12 col-sm-12 colxs-12 img-section">
                                      <input type="hidden" name="product_id" value="'.$row['product_id'].'">
                                        <img class="img-responsive" style="width:100px;height:135px;" src="product_images/'.$row['product_image'].'"/>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12 image-title">
                                        <h3>'.$row['product_title'].'</h3>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12 image-description">
                                        <p>Price:₹'.$row['product_price'].'</p>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input name="view" type="submit" id="product" class="btn btn-success add-cart-btn" value="Quick view"></button>
                                      </div>
                                    </div>
                                  </div>
                                  </form>
   ';
   }
   exit();
   }
   }
   // all categories display
    if(isset($_POST['allcategories'])){  
   $con = mysqli_connect($servername, $username, $password,$db);
   $sql = "SELECT * FROM products ORDER BY product_id ASC";
   $run_query = mysqli_query($con, $sql);
   while($row = mysqli_fetch_array($run_query))
   {
            $product_id = $row["product_id"];
                $product_desc = $row["product_desc"];
                $product_title = $row["product_title"];
                $product_price = $row["product_price"];
                $product_image = $row["product_image"]; 
   echo '
   <form action="product_viewer.php" method="get">
                                <div class="col-md-3 col-sm-3 col-xs-12 image-main-section">
                                    <div class="row img-part">
                                      <div class="col-md-12 col-sm-12 colxs-12 img-section">
                                      <input type="hidden" name="product_id" value="'.$row['product_id'].'">
                                        <img class="img-responsive" style="width:100px;height:135px;" src="product_images/'.$row['product_image'].'"/>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12 image-title">
                                        <h3>'.$row['product_title'].'</h3>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12 image-description">
                                        <p>Price:₹'.$row['product_price'].'</p>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input name="view" type="submit" id="product" class="btn btn-success add-cart-btn" value="Quick view"></button>
                                      </div>
                                    </div>
                                  </div>
                                  </form>
   ';
   }
   exit();
   
   }
   
   // ratings and reviews
   if(isset($_POST['done'])){
   $product_id=mysqli_escape_string($con,$_POST['prod_id']);
   $comment_name=mysqli_escape_string($con,$_POST['username']);
   $comment=mysqli_escape_string($con,$_POST['comment_text']);
   $rating=mysqli_escape_string($con,$_POST['rating_val']);
   
   $sql="INSERT INTO `ratings`(`product_id`,`name`, `comments`, `rating`) VALUES ($product_id,'$comment_name','$comment',$rating)";
   $run_query = mysqli_query($con, $sql);
   exit();
   }
   
   
   // ratings & reviews display
   if(isset($_POST['display'])){
   $product_id=mysqli_escape_string($con,$_POST['prod_id']);  
   $result=mysqli_query($con,"SELECT * FROM ratings WHERE product_id='$product_id' ORDER BY  id  DESC LIMIT 5 ");
   
   while ($row=mysqli_fetch_array($result)) {
   # code...
   ?>
<div id='comment_box' class='panel panel-success'>
   <div class="panel-heading"><label>Name:</label>
      <b><?php echo $row['name'];?></b> <label>Rated</label>
      <b><?php echo $row['rating'];?></b> stars
   </div>
   <div class="panel-body">
      <label>Comments: </label>
      <p><?php echo $row['comments'];?></p>
   </div>
</div>
<?php
   }
   exit();
   }
   
   if(isset($_POST['categories'])){
    if(isset($_POST["product_cat"])){
      $product_cat=mysqli_escape_string($con,$_POST['product_cat']);
      $con = mysqli_connect($servername, $username, $password,$db);
      // ".$_POST["product_cat"]"
   $sql = "SELECT  a.*, b.* FROM products a INNER JOIN categories b ON a.product_cat=b.cat_id WHERE a.productsubcat_id=".$_POST['product_cat']."";
   $run_query = mysqli_query($con, $sql);
   while($row = mysqli_fetch_array($run_query))
   {
            $product_id = $row["product_id"];
            $product_cat=$row["product_cat"];
                $product_desc = $row["product_desc"];
                $product_title = $row["product_title"];
                $product_price = $row["product_price"];
                $product_image = $row["product_image"]; 
   echo '
   <form action="product_viewer.php" method="get">
                                <div class="col-md-3 col-sm-3 col-xs-12 image-main-section">
                                    <div class="row img-part">
                                      <div class="col-md-12 col-sm-12 colxs-12 img-section">
                                      <input type="hidden" name="product_id" value="'.$row['product_id'].'">
                                        <img class="img-responsive" style="width:100px;height:135px;" src="product_images/'.$row['product_image'].'"/>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12 image-title">
                                        <h3>'.$row['product_title'].'</h3>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12 image-description">
                                        <p>Price:₹'.$row['product_price'].'</p>
                                      </div>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input name="view" type="submit" id="product" class="btn btn-success add-cart-btn" value="Quick view"></button>
                                      </div>
                                    </div>
                                  </div>
                                  </form>
   ';
   }
   exit();
   }
   
   }
    if(isset($_POST['category'])){
      ?>
<ul id="parent">
   <li class="categoriesli" onclick="makeAJAXPost()">All Categories</li>
   <?php 
      $result = mysqli_query($con, "SELECT cat_id, cat_title FROM categories WHERE c_id = 0");
      while($row = mysqli_fetch_assoc($result)) { ?>
   <div id="categorydiv_<?php echo $row['cat_id']; ?>" onclick="showSubCat(<?php echo $row['cat_id']; ?>)">
      <li id="category_<?php echo $row['cat_id']; ?>" ><?php echo $row['cat_title']; ?><span class="glyphicon glyphicon-triangle-bottom"></span></li>
   </div>
   <li style="padding: 0px;" class="subcategory">
      <ul id="items" onclick="item(event);">
         <?php 
            $result1 = mysqli_query($con, "SELECT c_id, cat_id, cat_title FROM categories WHERE c_id = '".$row['cat_id']."'");
            while($rows = mysqli_fetch_assoc($result1)) { ?>
         <div  id="subcatdiv_<?php echo $rows['cat_id']; ?>" class="subcategory_<?php echo $rows['c_id']; ?>"  style="display:none;">
            <li id="subcategory_<?php echo $rows['cat_id']; ?>"  class="c" value="<?php echo $rows['cat_id']; ?>"><?php echo $rows['cat_title']; ?></li>
         </div>
         <?php }  ?>
      </ul>
   </li>
   <?php } ?>
</ul>
<?php
   exit();
   
   }
   // search feature
   if(isset($_POST['search'])){
    if(isset($_POST['keywords'])){
      $keywords=mysqli_escape_string($con,$_POST['keywords']);
      $con = mysqli_connect($servername, $username, $password,$db);
      // ".$_POST["product_cat"]"
   $sql = "SELECT  a.product_id,a.product_image,a.product_cat,a.product_title,a.product_desc,a.product_price FROM products a LEFT JOIN categories b ON b.cat_id=a.product_cat WHERE b.cat_title LIKE '%{$keywords}%' OR  a.product_title LIKE '%{$keywords}%'";
   $run_query = mysqli_query($con, $sql);
   $num_rows= mysqli_num_rows($run_query);
   if($num_rows>0){
    ?>
<div class="alert alert-success">Found <?php echo $num_rows;?> results.</div>
<?php
   while($row = mysqli_fetch_array($run_query))
   {
      ?>
<form action="product_viewer.php" method="get">
   <div class="col-md-3 col-sm-3 col-xs-12 image-main-section">
      <div class="row img-part">
         <div class="col-md-12 col-sm-12 colxs-12 img-section">
            <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
            <img class="img-responsive" style="width:100px;height:135px;" src="product_images/<?php echo $row['product_image'];?>"/>
         </div>
         <div class="col-md-12 col-sm-12 col-xs-12 image-title">
            <h3><?php echo $row['product_title'];?></h3>
         </div>
         <div class="col-md-12 col-sm-12 col-xs-12 image-description">
            <p>Price:₹<?php echo $row['product_price'];?></p>
         </div>
         <div class="col-md-12 col-sm-12 col-xs-12">
            <input name="view" type="submit" id="product" class="btn btn-success add-cart-btn" value="Quick view"></button>
         </div>
      </div>
   </div>
</form>
<?php 
   }
       }
       else{?>
<div class="col-md-3 col-sm-3 col-xs-12 image-main-section">NO search results found</div>
<?php }
   exit();
   }
   }
   
     ?>
