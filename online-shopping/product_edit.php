<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="" />
    <title>SKYETECH</title>
  </head>
   <style>
      body{
        background-color: #C2F5FF;
      }
    </style>
  <body>
   <?php
    include('config.php');
     if(isset($_GET['delete'])){
         $id=$_GET['delete'];
         $sql="delete from product where product_id=$id";
         $result=$conn->query($sql);
         header("Location: http://localhost/online-shopping/product_report.php");
         exit();
     }
     if(isset($_GET['edit'])){ //if received id from other page
	
      $id=$_GET['edit'];
      $sql= "select product.* ,brand.brand_name from product left join brand on product.brand=brand.brand_id where product.product_id='$id'";
      $result=$conn->query($sql);
    }

     if(isset($_POST['id'])){ 
      $product_id=$_POST['product_id'];
      $product_name=$_POST['product_name'];
      $quantity=$_POST['quantity'];
      $brand=$_POST['brand'];
      $price=$_POST['price'];
      $description=$_POST['description'];
      //upload image 
      $image=basename($_FILES["fileToUpload"]["name"]);
      $target_dir = "images/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
          $sql="insert into product values( '$id',
          '$product_name','$quantity','$brand','$price','$description','$image')";
      
          $result=$conn->query($sql);
          
          $conn->close();
    }
   ?>
<div class="modal-dialog">
		<div class="modal-content">
    <form method="post" action="product_report.php"  enctype="multipart/form-data">
    <?php
			if ($result->num_rows > 0) {    
				while($row = $result->fetch_assoc()) {
					//display result
					$product_id=$row['product_id'];
          $product_name=$row['product_name'];
          $description=$row['description'];
          $quantity=$row['quantity'];
          $brand_name=$row['brand_name'];
          $price=$row['price'];
          
					$image=$row['image'];			
		?>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Product</h4>
					<button type="button" class="close" aria-hidden="true">&times;</button>
        </div>
      <div class="modal-body">
			  <label for="id">Product ID</label>
		  	<input type="text" class="form-control" name="product_id" value="<?php echo $product_id;?>" readonly>
	  	</div>	
				<div class="modal-body">					
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" class="form-control" name="product_name" value="<?php echo $product_name;?>" >
					</div>
					<div class="form-group">
						<label>Brand</label>
						<input type="text" class="form-control"name="brand" value="<?php echo $brand_name;?>" >
					</div>
					<div class="form-group">
						<label>Description</label>
            <textarea class="form-control" name="description"><?php echo $description;?>" 
          </textarea>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" class="form-control" name="price"value="<?php echo $price;?>" >
					</div>
					<div class="form-group">
						<label>Quantity</label>
						<input type="text" class="form-control" name="quantity" value="<?php echo $quantity;?>" >
					</div>	
					<div class="form-group">
						<label>Image File</label>
						<input type="file"  name="fileToUpload" id="fileToUpload" value="images/<?php echo $image;?>" >
					</div>						
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Update" name="update">
				</div>
			</form>
		</div>
	</div>
  	<?php
				} //end while loop
			}	// end if statement
		?>
</form>
</div>

  </body>
</html>
