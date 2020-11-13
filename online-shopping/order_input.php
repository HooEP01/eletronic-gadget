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
      $customer_id=$_POST['customer_id'];
      $product_id=$_POST['product_id'];
      $to_address=$_POST['to_address'];
      $to_city=$_POST['to_city'];
      $to_zip=$_POST['to_zip'];
      $to_state=$_POST['to_state'];
      $quantity=$_POST['quantity'];
      $price=$_POST['price'];

          $sql="insert into orderproduct values( null,
          '$customer_id','$product_id','$to_address','$to_city','$to_zip','$to_state','$quantity','$price')";
      
          $result=$conn->query($sql);
          
          $conn->close();

          header("Location: order_report.php");
          exit();
   }
   ?>
  
	<div class="modal-dialog">
		<div class="modal-content">
			
			<form method="post" action="order_input.php">
				<div class="modal-header">						
					<h4 class="modal-title">add Order</h4>
					<button type="button" class="close" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
                    		<div class="form-group">
					<label>Product id</label>
						<input type="text" class="form-control" name="product_id" required>
					</div>				
					<div class="form-group">
						<label>Customer id</label>
						<input type="text" class="form-control" name="customer_id" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="to_address" required>
					</div>
					<div class="form-group">
						<label>City</label>
						<input type="text" class="form-control" name="to_city" required>
					</div>	
					<div class="form-group">
						<label>Zip</label>
						<input type="text" class="form-control" name="to_zip" required>
                    </div>	
                    <div class="form-group">
						<label>State</label>
						<input type="text" class="form-control" name="to_state" required>
                    </div>	
                           <div class="form-group">
						<label>Quantity</label>
						<input type="int" class="form-control" name="quantity" required>
                    </div>	
                     <div class="form-group">
						<label>Price</label>
						<input type="int" class="form-control" name="price" required>
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
  