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
	include('header.php');

	 if(isset($_POST['update'])){
    /*receive Update*/
	$order_id=$_POST['order_id'];
	$product_id=$_POST['product_id'];
	$customer_id=$_POST['customer_id'];
    $to_address=$_POST['to_address'];
    $to_city=$_POST['to_city'];
    $to_zip=$_POST['to_zip'];
	$to_state=$_POST['to_state'];
	$quantity=$_POST['quantity'];
	$price=$_POST['price'];

	$sql="update orderproduct SET product_id='$product_id',customer_id='$customer_id',to_address='$to_address',to_city='$to_city', 
	to_zip='$to_zip', to_state='$to_state', quantity='$quantity', price='$price' where order_id='$order_id'";
	
    $result=$conn->query($sql);	
}

if(isset($_POST['cancel'])){
	$sql= " select * from orderproduct".$keyword;
	$result=$conn->query($sql);
}


$sql= " select * from orderproduct";
$result=$conn->query($sql);

  ?>

  <div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title" style="background-color: #8349F5">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Order</b></h2>
					</div>
					<div class="col-sm-6">
						<!--ADD-->
						<a href="order_input.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>ADD ORDER</span></a>
						<a href="orderName.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>PRODUCT&CUSTOMER NAME</span></a>
					</div>
				</div>
			</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
						<th>OrderID</th>
						<th>CustomerID</th>
						<th>ProductID</th>	
						<th>Address</th>
						<th>City</th>
						<th>Zip</th>
						<th>State</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if($result->num_rows > 0) {    
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
										<tr>
											<td><?php echo $order_id; ?></td>
											<td><?php echo $customer_id; ?></td>
											<td><?php echo $product_id; ?></td>
											<td style="max-width:250px"><?php echo $to_address; ?></td>
											<td style="max-width:100px"><?php echo $to_city; ?> </td>
											<td  ><?php echo $to_zip; ?></td>
											<td><?php echo $to_state; ?></td>
											<td><?php echo $quantity; ?></td>
											<td><?php echo $price; ?></td>
											<td>
												<a href="order_edit.php?edit=<?php echo $order_id; ?>" name="edit" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
												<a href="order_edit.php?delete=<?php echo $order_id; ?>" name="delete" class="delete" ><i class="material-icons" data-toggle="tooltip" title="Delete" onClick="return confirm('confirm Delete')">&#xE872;</i></a>
											</td>
										</tr>
					
									<?php
								} //end while loop
							}	// end if statement
							?>
		        	</tbody>
		    	</table>
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