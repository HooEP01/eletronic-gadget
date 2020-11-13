<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>SKYETECH</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!--importance-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="./table_style.css">
<style>
h2{
	color: #fff;
}

</style>
</style>
</head>
<body>
<?php 
include('config.php');
include('header.php');
if(isset($_POST['update'])){
    /*receive Update*/
	$product_id=$_POST['product_id'];
	$product_name=$_POST['product_name'];
	$brand=$_POST['brand'];
	$quantity=$_POST['quantity'];
	$price=$_POST['price'];
	$description=$_POST['description'];

     if(basename($_FILES["fileToUpload"]["name"])!=""){
		$image=basename($_FILES["fileToUpload"]["name"]);
		$sql="update product SET product_name='$product_name',brand='$brand',quantity='$quantity',price='$price',description='$description',image='$image' where product_id='$product_id'";
		
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

		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 2000000) {
		  echo "Sorry, your file is too large.";
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
		
	}
	else{
		$sql="update product SET product_name='$product_name',brand='$brand',quantity='$quantity',price='$price',description='$description' where product_id='$product_id'";
	}
	
    $result=$conn->query($sql);	
}


$keyword="";
if(isset($_POST['search_product'])){
	$keyword=$_POST['search_product'];
	$keyword=" where product.product_name like '%$keyword%' or product.description like '%$keyword%'";
}
$sql= " select product.* ,brand.brand_name from product left join brand on product.brand=brand.brand_id".$keyword;
$result=$conn->query($sql);


?>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper" >
			<div class="table-title" style="background-color:#0099B8">
				<div class="row">
					<div class="col-sm-6">
						<h2 style="color: white">Manage <b>Product</b></h2>
					</div>
					<div class="col-sm-6">
						<!--ADD-->
						<a href="product_input.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add Product</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>NAME</th>
						<th>BRAND</th>
						<th>DESCRIPTION</th>
						<th>PRICE</th>
						<th>QUANTITY</th>
						<th>IMAGE FILE</th>
						<th>IMAGE </th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if ($result->num_rows > 0) {    
							while($row = $result->fetch_assoc()) {
								//display result
								$product_id=$row['product_id'];
								$product_name=$row['product_name'];
								$description=$row['description'];
								$brand_name=$row['brand_name'];
								$price=$row['price'];
								$quantity=$row['quantity'];
								$image=$row['image'];
					?>
					<tr>
						<td><?php echo $product_id; ?></td>
		                <td><?php echo $product_name; ?></td>
						<td><?php echo $brand_name; ?></td>
                        <td><?php echo $description; ?></td>
						<td><?php echo $price; ?></td>
		                <td><?php echo $quantity; ?></td>
						<td><?php echo $image; ?></td>
						<td><img src="images/<?php echo $image; ?>" width="100%"><td>
							<a href="product_edit.php?edit=<?php echo $product_id; ?>" name="edit" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="product_edit.php?delete=<?php echo $product_id; ?>" name="delete" class="delete" ><i class="material-icons" data-toggle="tooltip" title="Delete" onClick="return confirm('confirm Delete')">&#xE872;</i></a>
						</td>
					</tr>	
					<?php
							}
						}?>			
				</tbody>
			</table>
		</div>
	</div>  
</div>

 
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
 
</body>
</html>