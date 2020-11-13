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
    <title>Profile</title>
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
         $sql="delete from customer where customer_id=$id";
         $result=$conn->query($sql);
         header("Location: http://localhost/online-shopping/customer_report.php");
         exit();
     }
     if(isset($_GET['edit'])){ //if received id from other page
	
      $id=$_GET['edit'];
      $sql= "select * from customer where customer_id='$id'";
      $result=$conn->query($sql);
    }

     if(isset($_POST['id'])){ 
      $customer_id=$_POST['customer_id'];
      $name=$_POST['name'];
      $phone=$_POST['phone'];
      $email=$_POST['email'];
      $address=$_POST['address'];
      $city=$_POST['city'];
      $zip=$_POST['zip'];
      $state=$_POST['state'];
      $password=$_POST['password'];
      
          $sql="insert into customer values( '$customer_id',
          '$name','$phone','$email','$address','$city','$zip','$state','$password')";
      
          $result=$conn->query($sql);
          
          $conn->close();
    }

    
   ?>
<div class="modal-dialog">
		<div class="modal-content">
    <form method="post" action="customer_report.php">
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
                    $password=$row['password'];
		?>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Customer info</h4>
					<button type="button" class="close" aria-hidden="true">&times;</button>
        </div>
      <div class="modal-body">
			  <label for="id">Product ID</label>
		  	<input type="text" class="form-control" name="customer_id" value="<?php echo $customer_id;?>" readonly>
	  	</div>	
				<div class="modal-body">					
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" class="form-control" name="name" value="<?php echo $name;?>" >
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control"name="phone" value="<?php echo $phone;?>" >
					</div>
					<div class="form-group">
						<label>Email</label>
                        <input type="text" class="form-control"name="email" value="<?php echo $email;?>" >
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="address"value="<?php echo $address;?>" >
					</div>
					<div class="form-group">
						<label>City</label>
						<input type="text" class="form-control" name="city" value="<?php echo $city;?>" >
					</div>	
						<div class="form-group">
						<label>Zip</label>
						<input type="text" class="form-control" name="zip"value="<?php echo $zip;?>" >
					</div>
					<div class="form-group">
						<label>State</label>
						<input type="text" class="form-control" name="state" value="<?php echo $state;?>" >
                    </div>	
                    	<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" value="<?php echo $password;?>" >
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
