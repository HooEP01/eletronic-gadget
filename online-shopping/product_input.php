<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
    <title>SKYETECH</title>
    <style>
      body{
        background-color: #C2F5FF;
      }
    </style>
  </head>
  
  <body>
  <?php
    include('config.php');
   if(isset($_POST['submit'])){ 
      $product_name=$_POST['name'];
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
 // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
          $sql="insert into product values( null,
          '$product_name','$quantity','$brand','$price','$description','$image')";
      
          $result=$conn->query($sql);
          
          $conn->close();

          header("Location: product_report.php");
          exit();
    }
   ?>
  
	<div class="modal-dialog">
		<div class="modal-content">
			
			<form method="post" action="product_input.php" enctype="multipart/form-data">
				<div class="modal-header">						
					<h4 class="modal-title">Add Product</h4>
					<button type="button" class="close" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" class="form-control" name="name" required>
					</div>
					<div class="form-group">
						<label>Brand</label>
						<input type="text" class="form-control"name="brand" required>
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="description" required></textarea>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" class="form-control" name="price" required>
					</div>
					<div class="form-group">
						<label>Quantity</label>
						<input type="text" class="form-control" name="quantity" required>
					</div>	
					<div class="form-group">
						<label>Image File</label>
						<input type="file"  name="fileToUpload" id="fileToUpload">
					</div>						
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="submit" name="submit">
				</div>
			</form>
		</div>
	</div>
</div>

  </form>
</div>

  </body>
</html>
  