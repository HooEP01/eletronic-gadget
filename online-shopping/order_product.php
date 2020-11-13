<?php
session_start();
?>
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

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>SKYETECH</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!--importance-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="./table_style.css">
    <title>view</title>
  </head>
  <body>
  <?php
  include('config.php');

  if(isset($_GET['id'])){
	$product_id=$_GET['id'];
	$sql= " select product.* ,brand.brand_name from product left join brand on product.brand=brand.brand_id where product_id=$product_id";
	$result=$conn->query($sql);
  }

   if(isset($_POST['submit'])){
	   
	   $product_id=$_POST['product_id'];
	   $customer_id=$_POST['customer_id'];
	   $to_address=$_POST['to_address'];
       $to_city=$_POST['to_city'];
       $to_zip=$_POST['to_zip'];
	   $to_state=$_POST['to_state'];
	   $quantity=$_POST['quantity'];
	   $price=$_POST['price'];
	   
	   if($quantity==0){
		 header("Location: http://localhost/online-shopping/home.php");
	   }else{
		$total=$price * $quantity;
		$price=$total;
	   $sql="insert into orderproduct values( null,'$customer_id'
          ,'$product_id','$to_address','$to_city','$to_zip','$to_state','$quantity','$price')";
		$result=$conn->query($sql);
	
	 header("Location: http://localhost/online-shopping/cart.php");
	exit();
	   }
   }
?>


  <div class="modal-dialog">
		<div class="modal-content">
    <form method="post" action="order_product.php" >
    <?php
		if ($result->num_rows > 0) {    
			while($row = $result->fetch_assoc()) {
		  $product_id=$row['product_id'];
		  $image=$row['image'];
		  $description=$row['description'];
		  $product_name=$row['product_name'];
		  $brand=$row['brand'];
		  $brand_name=$row['brand_name'];
          $price=$row['price'];
          $quantity=$row['quantity'];		
		?><img src="images/<?php echo $image; ?>" width="100%">
		<input type="hidden" name="product_id" value="<?php echo $product_id;?>">
		<input type="hidden" name="customer_id" value="<?php echo $_SESSION['customer']; ?>">
		
		<input type="hidden" name="to_address" value="1">
		<input type="hidden" name="to_city" value="1">
		<input type="hidden" name="to_zip" value="1">
		<input type="hidden" name="to_state" value="1">
			
				<div class="modal-header">						
					<h4 class="modal-title">Add Product</h4>
					<button type="button" class="close" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<label for="id">Product Name</label>
						<input type="text" class="form-control" name="product_name" value="<?php echo $product_name;?>" readonly>
						</div>	
					<div class="modal-body">
						<label>Brand</label>
						<input type="text" class="form-control" name="brand" value="<?php echo $brand_name;?>" readonly>
					</div>	
	
					<div class="modal-body">
						<label for="id">Product Description</label>
						<textarea type="text" class="form-control" readonly><?php echo $description;?></textarea>
					</div>	
					<div class="modal-body">
						<label>Price</label>
						<input type="text" class="form-control" name="price" value="<?php echo $price;?>" readonly >
					</div>
					<div class="modal-body">
						<label>Buy Quantity</label>
						<input type="text" class="form-control" name="quantity" value="<?php echo $quantity;?>" >
					</div>	
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Submit" name="submit">
				</div>
				<div>
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