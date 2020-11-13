
<!DOCTYPE html>
<html>
<title>SKYETECH PRODUCT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body class="w3-light-grey w3-content" style="max-width:1600px">
<?php 
include('config.php');
include('header_home.php');
if(isset($_SESSION['customer'])){
  
   $customer_id=$_SESSION['customer'];
   $sql="select name from customer where customer.customer_id=$customer_id";
   $result=$conn->query($sql);
}	
?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:20px">

  <!-- Header -->
  <div id="portfolio">
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
      <br>
    <h1><b>Electronic Accessories</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span> 
      <button class="w3-button w3-black">ALL</button>
      <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i>Keyboard</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-photo w3-margin-right"></i>Mouse</button>
      <button class="w3-button w3-white w3-hide-small"><i class="fa fa-map-pin w3-margin-right"></i>Earphone</button>
    </div>
    </div>
</div>
  <?php
  include('config.php');
  
  $sql= "select product.* ,brand.brand_name from product left join brand on product.brand=brand.brand_id";
  $result=$conn->query($sql);
  ?>
  <?php
						if ($result->num_rows > 0) {    
              for($i=0;$i<3;$i++){
                ?>
                <div class="w3-row-padding">
                <?php
                for($j=0;$j<3;$j++){

                while($row = $result->fetch_assoc()) {
								//display result
								$product_id=$row['product_id'];
								$product_name=$row['product_name'];
								$description=$row['description'];
								$brand_name=$row['brand_name'];
								$price=$row['price'];
                $quantity=$row['quantity'];
                $image=$row['image'];
                ?>
                <!-- Photo Grid-->
                  <div class="w3-third w3-container w3-margin-bottom">
              <img src="images/<?php echo $image; ?>" alt="Norway" style="width:100%" class="w3-hover-opacity">
                <a href="product_page.php?id=<?php echo $product_id;?>"/>  
                    <div class="w3-container w3-white">
                      <p><b><?php echo $product_name;?></b></p>
                      <p>RM<?php echo $price; ?></p>
                     <a href="order_product.php?id=<?php echo $product_id; ?>" class="btn btn-warning">Buy Now</a>
                    </div>
                  </div>
                  
                  <?php
                }
              }
					?>   </div>
		<?php
							} //end while loop
						}	// end if statement
					?>

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>


<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
