<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SKYETECH</title>
    <!-- Bootstrap CDN-->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <!-- Font Awesome CDN-->
    <script src="https://kit.fontawesome.com/23412c6a8d.js"></script>

    <!--Custom StyleSheet-->
    <style>

      /*import font from google font*/
@import url("https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Roboto:ital@1&display=swap");

:root {
  --light-gray: #022431a1;
  --primary-color: #0099B8 ;
  --border: #07006918;
  --text-color: #ff686b;
  --roboto: "Roboto", sans-serif;
  --Nunito-sans: "Nunito-sans";
}
.primary-color {
  color: var(--primary-color);
}
.bg-primary-color {
  background-color: var(--primary-color) !important;
}
.text-color {
  color: var(--text-color);
}

.font-roboto {
  font-family: var(--Nunito-sans);
}
/*header*/
header {
  background-color: var(--primary-color);
  font-family: var(--Nunito-sans);
}


    </style>

    <!--slider-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    
  </head>
  <body>
      <?php
      include('config.php');
      if(isset($_SESSION['customer'])){
             $customer=$_SESSION['customer'];
             $sql= "select name from customer where customer_id=$customer";
             $result=$conn->query($sql);
      }
      ?>
    <!--header-->
    <header>
      <div class="container"> 
        <!--each element in new row-->
        <div class="row">
          <!--12 column width to this division dask-->
          <div class="col-md-4 col-sm-12 col-12">
            <div class="btn-group">
              <button
                class="btn btn-border dropdown-toggle my-md-4 my-2 text-white"
                data-toggle="dropdown"
                aris-haspopup="true"
                aris-expanded="false"
              >
                USD
            </button>
            <div class="dropdown-menu">
            <a href="#" class="dropdown-item">ERU-Euro</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12 text-center">
            <h2 class="my-md-3 site-title text-white">SKYETECH</h2>
          </div>
          <div class="col-md-4 col-12 text-right">
            <p class="my-md-4 header-links ">
            <?php
	            if ($result->num_rows > 0) {    
					while($row = $result->fetch_assoc()) {
						$name=$row['name'];
            ?>
            <a href="#" class="px-2" style="color:white">Welcome: <?php echo $name ?></a>
            <a href="login.php" class="px-1" style="color:white">log out</a>
            <?php
                }
            }
            else{
            ?>

              <a href="login.php" class="px-2" style="color:white">Sign In</a>
              <a href="sign_up.php" class="px-1" style="color:white">Create an Account</a>
              <?php
              }
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">HOME</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
           
          <li class="nav-item">
            <a class="nav-link" href="home.php">SHOP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">CART</a>
          </li> 
          <li class="nav-item">
              <a class="nav-link" href="#">FEATURES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">COLLECTION</a>
            </li>
          </ul>
        </div>
        <div class="navbar-nav">
          <li class="nav-item border rounded-circle mx-2 search-icon">
            <i class="fas fa-search p-2"></i>
          </li>
          <li class="nav-item border rounded-circle mx-2 search-icon">
            <i class="fas fa-shopping-basket p-2"></i>
          </li>
        </div>
      </nav>
    </div>
    </header>
</body>
</html>