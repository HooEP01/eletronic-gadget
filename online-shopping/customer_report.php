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
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
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
  $sql= "SELECT * from customer";
  $result=$conn->query($sql);

  if(isset($_POST['update'])){
    /*receive Update*/
	$customer_id=$_POST['customer_id'];
	$name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
	$state=$_POST['state'];
	  
	$sql="update customer SET name='$name',phone='$phone',email='$email',address='$address',city='$city', 
	zip='$zip', state='$state' where customer_id='$customer_id'";
	
    $result=$conn->query($sql);	
}

if(isset($_POST['cancel'])){
	$sql= " select * from customer".$keyword;
	$result=$conn->query($sql);
}

$keyword="";
if(isset($_POST['search_product'])){
	$keyword=$_POST['search_product'];
	$keyword=" where customer.name like '%$keyword%' or customer.phone like '%$keyword%'";
}
$sql= " select * from customer".$keyword;
$result=$conn->query($sql);

  ?>
  <div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title" style="background-color:#089E8F">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Customer</b></h2>
					</div>
					<div class="col-sm-6">
						<!--ADD-->
						<a href="customer_input.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add Product</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
		            <th>ID</th>
					<th>Name</th> 
					<th>Phone Number</th>
		            <th>Email</th>
		            <th>Address</th>
		            <th>City</th>
					<th>Zip</th>
					<th>State</th>
					<th>Action</th>
		        </tr>
		    </thead>
		        <tbody>	
					<?php
						if ($result->num_rows > 0) {    
							while($row = $result->fetch_assoc()) {
								//display result
								$customer_id=$row['customer_id'];
								$name=$row['name'];
								$phone=$row['phone'];
								$email=$row['email'];
								$address=$row['address'];
								$city=$row['city'];
								$zip=$row['zip'];
                                $state=$row['state'];
								
					?>
		            <tr>
		                <td><?php echo $customer_id; ?></td>
						<td><?php echo $name; ?></td>
                        <td><?php echo $phone; ?></td>
						<td style="max-width:200px"><?php echo $email; ?></td>
						<td style="max-width:170px"><?php echo $address; ?></td>
						<td style="max-width:60px"><?php echo $city; ?></td>
		                <td><?php echo $zip; ?></td>
                        <td><?php echo $state; ?></td>
						<td>
							<a href="customer_edit.php?edit=<?php echo $customer_id; ?>" name="edit" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="customer_edit.php?delete=<?php echo $customer_id; ?>" name="delete" class="delete" ><i class="material-icons" data-toggle="tooltip" title="Delete" onClick="return confirm('confirm Delete')">&#xE872;</i></a>
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
  </body>
</html>