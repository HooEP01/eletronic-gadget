<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
    <title>Buy Product</title>
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
      $name=$_POST['name'];
      $phone=$_POST['phone'];
      $email=$_POST['email'];
      $address=$_POST['address'];
      $city=$_POST['city'];
      $zip=$_POST['zip'];
      $state=$_POST['state'];
      $password=$_POST['password'];
  
          $sql="insert into customer values( null,
          '$name','$phone','$email','$address','$city','$zip','$state','$password')";
      
          $result=$conn->query($sql);
          
          $conn->close();

          header("Location: customer_report.php");
          exit();
   }
   ?>
  
	<div class="modal-dialog">
		<div class="modal-content">
			
			<form method="post" action="customer_input.php">
				<div class="modal-header">						
					<h4 class="modal-title">Add Customer</h4>
					<button type="button" class="close" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Customer Name</label>
						<input type="text" class="form-control" name="name" required>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control"name="phone" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<textarea class="form-control" name="email" required></textarea>
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="address" required>
					</div>
					<div class="form-group">
						<label>City</label>
						<input type="text" class="form-control" name="city" required>
					</div>	
					<div class="form-group">
						<label>Zip</label>
						<input type="text" class="form-control" name="zip" required>
                    </div>	
                    <div class="form-group">
						<label>State</label>
						<input type="text" class="form-control" name="state" required>
                    </div>	
                           <div class="form-group">
						<label>Password</label>
						<input type="text" class="form-control" name="password" required>
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
  