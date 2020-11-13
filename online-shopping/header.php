<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
   
    <link
      rel="stylesheet"
      href="path/to/font-awesome/css/font-awesome.min.css"
    />


    <style>
    
      .align {
        margin: auto;
      }
      nav {
        background-color: #fff;
      }

body {
  background:  #C2F5FF;
}

</style>
    <title>SKYETECH</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#">SKYETECH 2020</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="align">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"
                >HOME<span class="sr-only" >(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">SHOP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">CONTACT</a>
            </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
                >GENERATE REPORT</a>

              <div class="dropdown-menu">
                <a class="dropdown-item" href="product_report.php">PRODUCT REPORT</a>
                <a class="dropdown-item" href="customer_report.php">CUSTOMER REPORT</a>
                <a class="dropdown-item" href="order_report.php">ORDER REPORT</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">PRODUCT SELL</a>
              </div>
</div>
            </li>
          </ul>
        </div>
     
        <form  action="product.php" method="post">
          <input 
            class="form-control mr-sm-2" type="search" placeholder="Search"
            aria-label="search"
            name="search_product"
          />
          
        </form>

      </div>
    </nav>

  </body>
</html>
