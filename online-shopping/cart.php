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
<title>SKYETECH CART</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--importance-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="./table_style.css">
    <title>view</title>
</head>
  <body>

  	 <?php
    include('config.php');
    include('header_home.php');
    
	 if(isset($_POST['buy'])){
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

	$customer_id=$_SESSION['customer'];
    $sql= "select orderproduct.*, customer.name, product.product_name, product.image from
    (( orderproduct inner join customer on orderproduct.customer_id=customer.customer_id) 
    inner join product on orderproduct.product_id=product.product_id) where customer.customer_id=$customer_id";

	$result=$conn->query($sql);
    ?>

  <div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title" style="background-color:  #A57AFA">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Order</b></h2>
					</div>
					<div class="col-sm-6">
						<!--ADD-->
						<a href="home.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Buy More</span></a>
					</div>
				</div>
			</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
						<th>OrderID</th>
						<th>CustomerName</th>
                        <th>ProductName</th>
                        <th>Quantity</th>	
                        <th>Price</th>  
						
                         <th>image</th>
                         
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
                                    $price=$row['price'];
                                    $quantity=$row['quantity'];
                                    $to_address=$row['to_address'];
                                    
                                    $image=$row['image'];
									?>
										<tr>
											<td><?php echo $order_id; ?></td>
											<td><?php echo $name; ?></td>
											<td><?php echo $product_name; ?></td>
                      <td><?php echo $quantity; ?></td>
											<td><?php echo $price; ?></td>
											<td><img src="images/<?php echo $image; ?>" width="100%"><td>  
                                        <?php
                                        if($to_address=='1'){
                                        ?>
                                            <td>
                                        <a href="cart_edit.php?edit=<?php echo $order_id; ?>" name="edit" class="edit" ><i class="fas fa-shopping-cart" data-toggle="tooltip" title="buy" style="color : green"></i></a>
							            <a href="cart_edit.php?delete=<?php echo $order_id; ?>" name="delete" class="delete" ><i class="fas fa-trash-alt" data-toggle="tooltip" title="Delete" onClick="return confirm('confirm Delete')"></i></a>
                                            </td>
                                        <?php 
                                        }else{
                                        ?>
                                            <td>
                                        <button type="button" class="btn btn-primary">Bought</button>
                                            </td>
                                        <?php
                                        }
                                        ?>
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