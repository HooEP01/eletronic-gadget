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
    $sql= "select orderproduct.*, customer.name, product.product_name from
    (( orderproduct inner join customer on orderproduct.customer_id=customer.customer_id) 
    inner join product on orderproduct.product_id=product.product_id)";

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
						<a href="order.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>BACK</span></a>
					</div>
				</div>
			</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
						<th>OrderID</th>
						<th>CustomerName</th>
						<th>ProductName</th>	
						<th>Address</th>
						<th>City</th>
						<th>Zip</th>
						<th>State</th>
						<th>Quantity</th>
						<th>Price</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if($result->num_rows > 0) {    
								while($row = $result->fetch_assoc()) {
									//display result
									$order_id=$row['order_id'];
									$product_name=$row['product_name'];
									$name=$row['name'];
									$to_address=$row['to_address'];
									$to_city=$row['to_city'];
									$to_zip=$row['to_zip'];
									$to_state=$row['to_state'];
									$quantity=$row['quantity'];
									$price=$row['price'];
									?>
										<tr>
											<td><?php echo $order_id; ?></td>
											<td><?php echo $name; ?></td>
											<td><?php echo $product_name; ?></td>
											<td><?php echo $to_address; ?></td>
											<td><?php echo $to_city; ?> </td>
											<td  ><?php echo $to_zip; ?></td>
											<td><?php echo $to_state; ?></td>
											<td><?php echo $quantity; ?></td>
											<td><?php echo $price; ?></td>
											
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