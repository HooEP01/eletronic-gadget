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
    <link rel="stylesheet" href="" />
    <title>SKYETECH</title>
  </head>
<body>
<?php
include('config.php');

if(isset($_GET['id'])){ //if received id from other page
	
	$id=$_GET['id'];
	$sql="select name from product where product.id='$id'";

	$result=$conn->query($sql);
}
?>
		<?php
						if ($result->num_rows > 0) {    
							while($row = $result->fetch_assoc()) {
								//display result
					
								$customer_id=$row['customer_id'];
								$name=$row['name'];
								$to_address=$row['to_address'];
								$to_city=$row['to_city'];
								$to_zip=$row['to_zip'];
                $to_state=$row['to_state'];
                $quantity=$row['quantity'];
					?>

        <form action="product_buy.php" method="post">
          <input type="submit"  value="BUY NOW" name="submit" class="btn-login"/>
        </form>
</body>
</html>