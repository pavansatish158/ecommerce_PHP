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
	<div id='comment_box'>
		<lable><b>User reviews:</b></lable>
	   <lable>Name:</lable>
	   <b><?php echo $row['name'];?></b>
	   <lable>  Rated </lable>
	   <b><?php echo $row['rating'];?></b> stars<br>
	   <lable> comments: </lable>
	   <b><?php echo $row['comments'];?></b>
	</div>
<?php
   }
   exit();
   }
   
   
   
   
     ?>