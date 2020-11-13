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
     <style>
      body{
        background-color: #C2F5FF;
      }
    </style>
  </head>

  <body>
   <?php
    include('config.php');
     if(isset($_GET['delete'])){
         $id=$_GET['delete'];
         $sql="delete from orderproduct where order_id=$id";
         $result=$conn->query($sql);
         header("Location: http://localhost/online-shopping/order_report.php");
         exit();
     }
     if(isset($_GET['edit'])){ //if received id from other page
	
      $id=$_GET['edit'];
      $sql= "select * from orderproduct where order_id='$id'";
      $result=$conn->query($sql);
    }

     if(isset($_POST['id'])){ 
     
        $order_id=$row['order_id'];
        $product_id=$row['product_id'];
		$customer_id=$row['customer_id'];
		$to_address=$row['to_address'];
	    $to_city=$row['to_city'];
		$to_zip=$row['to_zip'];
        $to_state=$row['to_state'];							
        $quantity=$row['quantity'];
		$price=$row['price'];  
      
          $sql="insert into orderproduct values( '$product_id','$customer_id',
          '$to_address','$to_city','$to_zip','$to_state','$quantity','$price')";
      
          $result=$conn->query($sql);
          
          $conn->close();
    }

    
   ?>
<div class="modal-dialog">
		<div class="modal-content">
    <form method="post" action="order_report.php">
    <?php
			if ($result->num_rows > 0) {    
				while($row = $result->fetch_assoc()) {
                    //display result
                    $order_id=$row['order_id'];
                    $product_id=$row['product_id'];
				          	$customer_id=$row['customer_id'];
                    $to_address=$row['to_address'];
                    $to_city=$row['to_city'];
                    $to_zip=$row['to_zip'];
                    $to_state=$row['to_state'];
                    $quantity=$row['quantity'];
                    $price=$row['price'];
		?>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Order</h4>
					<button type="button" class="close" aria-hidden="true">&times;</button>
        </div>
      <div class="modal-body">
			  <label for="id">Order ID</label>
		  	<input type="text" class="form-control" name="order_id" value="<?php echo $order_id;?>" readonly>
	  	</div>	
					<div class="modal-body">	
                    		<div class="form-group">
					<label>Product id</label>
						<input type="text" class="form-control" name="product_id" required value="<?php echo $product_id?>">
					</div>				
					<div class="form-group">
						<label>Customer id</label>
						<input type="text" class="form-control" name="customer_id" value="<?php echo $customer_id?>"required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="to_address" value="<?php echo $to_address?>" required>
					</div>
					<div class="form-group">
						<label>City</label>
						<input type="text" class="form-control" name="to_city" value="<?php echo $to_city?>" required>
					</div>	
					<div class="form-group">
						<label>Zip</label>
						<input type="text" class="form-control" name="to_zip" value="<?php echo $to_zip?>" required>
                    </div>	
                    <div class="form-group">
						<label>State</label>
						<input type="text" class="form-control" name="to_state" value="<?php echo $to_state?>" required>
                    </div>	
                           <div class="form-group">
						<label>Quantity</label>
						<input type="int" class="form-control" name="quantity" value="<?php echo $quantity?>"required>
                    </div>	
                     <div class="form-group">
						<label>Price</label>
						<input type="int" class="form-control" name="price" value="<?php echo $price?>" required>
                    </div>
				</div>
												
				
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" name="cancel" value="Cancel"> 
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
