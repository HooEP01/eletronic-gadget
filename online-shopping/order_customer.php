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

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!--importance-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="./table_style.css">
    <title>SKYETECH</title>
  </head>
  <body>
  <?php
  include('config.php');

	
    $customer_id=$_SESSION['customer'];
	$sql="select name,address, state, zip, city from customer where customer_id=$customer_id";
	$result=$conn->query($sql);
  

   if(isset($_POST['buy'])){
	$to_address=$_POST['address'];
    $to_state=$_POST['state'];
    $to_zip=$_POST['zip'];
    $to_city=$_POST['city'];
	$sql="update orderproduct set to_address='$to_address',to_state='$to_state',to_zip='$to_zip',to_city='$to_city' where order_id='$_order_id'";
	$result=$conn ->query($sql);

 	header("Location: http://localhost/online-shopping/home.php");
	exit();
   }
  ?>

 
  <div class="modal-dialog">
		<div class="modal-content">
    <form method="post" action="order_customer.php" >
    <?php
		if ($result->num_rows > 0) {    
			while($row = $result->fetch_assoc()) {
			$name=$row['name'];
			$address=$row['address'];
            $city=$row['city'];
            $zip=$row['zip'];
            $state=$row['state'];	
		  
		?>
		<div class="modal-header">						
					<h4 class="modal-title">Add Product</h4>
					<button type="button" class="close" aria-hidden="true">&times;</button>
        </div>
      <div class="modal-body">
			<label for="id">Customer info</label>
		  	<input type="text" class="form-control" name="name" value="<?php echo $name;?>" readonly>
			</div>				
			<div class="modal-body">
				<label>Address</label>
					<input type="text" class="form-control" name="address"value="<?php echo $address;?>" >
				</div>
					<div class="modal-body">
						<label>City</label>
						<input type="text" class="form-control" name="city" value="<?php echo $city;?>" >
					</div>	
					<div class="modal-body">
						<label>Zip</label>
						<input type="text" class="form-control" name="zip"value="<?php echo $zip;?>" >
					</div>
					<div class="modal-body">
						<label>State</label>
						<input type="text" class="form-control" name="state" value="<?php echo $state;?>" >
                    </div>	
				<div class="modal-body">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Update" name="buy">
				</div>
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