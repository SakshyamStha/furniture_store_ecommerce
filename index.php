<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
          <img src="assets/imgs/logo1.jpg" height="50px" width="100px" alt="">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-btns" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="index.php#Categories">Category</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>

              <li class="nav-item">
                <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="account.php"><i class="fa-solid fa-user"></i></a>
              </li>
              
              

          </div>
        </div>
    </nav>

      <!--Home-->
    <section id="home">
        <div class="container">
          <br>
            <h5>NEW ARRIVALS</h5>
            <h1><span>Unleash Your Style</span> Unveil Your Home</h1>
            <p>Best prices<br>this season.</p>
            <button>Shop Now</button>
        </div>

    </section>
    
      <!--Categories-->
    <section id ="category" class="container">
        <div class="container text-center mt-5 py-5">
          <h3>Our Top Categories</h3>
          <hr>
          <p>
            Here you can check out our top categories
          </p>
        </div>
        <div class="row">
          <a href="shop.php">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/carpet1.jpg" alt="Carpet">
          </a>
          <a href="">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/chair1.jpg" alt="Carpet">
          </a>
          <a href="">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/lamp1.jpg" alt="Carpet">
          </a>
          <a href="">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/sofa1.jpg" alt="Carpet">
          </a>
          
    
          </div>

    </section>
<br>

      <section id="new" class="w-100">
        <div class="row p-0 m-0">

          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/1.jpg" alt="">
            <div class="details">
              <h2>Awesome decors</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>

          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/2.jpg" alt="">
            <div class="details">
              <h2>Awesome decors</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>

          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/3.jpg" alt="">
            <div class="details">
              <h2>Awesome decors</h2>
              <button class="text-uppercase">Shop Now</button>
            </div>
          </div>

        </div>

      </section>

      <!--Features-->
      <section id="featured" class="my-5 pt-5">
        <div class="container text-center mt-5 py-5">
          <h3>Our Featured Products</h3>
          <hr>
          <p>
            Here you can check out our featured products
          </p>
        </div>

        <div class="row mx-auto container-fluid">

        <?php include('server/get_featured_products.php');  ?>

        <?php
          while($row=$featured_products->fetch_assoc()){

          
        ?>


          <div class="product text-center col-lg-3 col-md-4 col-sm-6">
            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'];?>" alt="carpet1">
            <div class="star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              
            </div>
            <h5 class="p-name"><?php echo $row['product_name'];     ?></h5>
            <h4 class="p-price"><?php echo $row['product_price'];     ?></h4>
            <a href="<?php echo "product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
          </div>

          <?php  }  ?>
        </div>
        </section>

      
      

      <!--banner-->
      <section id="banner" class="my-5 py-5">
        <div class="container">
          <h4>SALE</h4>
          <h1>UP to 30% OFF</h1>
          <button class="text-uppercase">Shop Now</button>
        </div>

      </section>

      <!--footer-->
      <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img src="assets/imgs/logo1.jpg" height="60px" width="100px" alt="">
            <p class="pt-3">
              We provide the best products for affordable prices
            </p>
          </div>

          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
           <h5 class="pb-2">
            Featured
           </h5>
           <ul class="text-uppercase">
              <li><a href="">Sofa</a></li>
              <li><a href="">Table</a></li>
              <li><a href="">Carpet</a></li>
              <li><a href="">Wall</a></li>
              <li><a href="">Lamp</a></li>
              <li><a href="">Chair</a></li>
           </ul>
          </div>

          <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">
              Contact Us
            </h5>
            <div>
              <h6 class="text-uppercase">Address</h6>
              <p>Samakhushi,Kathmandu</p>
            </div>
            <div>
              <h6 class="text-uppercase">Phone</h6>
              <p>+977 9841491234</p>
            </div>
            <div>
              <h6 class="text-uppercase">Email</h6>
              <p>halo1@email.com</p>
            </div>
          </div>
          
          <div class="footer-two col-lg-3 col-md-6 col-sm-12">
            <div class="row container mx-auto">
              <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
              <a href="#"><i class="fab fa-facebook"></i></a><br>
              <a href="#"><i class="fab fa-instagram"></i></a><br>
              <a href="#"><i class="fab fa-twitter"></i></a><br>
              </div>
            </div>
          </div>  

        </div>

        <div class="copyright mt-5">
          <div class="row container mx-auto">
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
              <img src="assets/imgs/payment.png" height="77%" width="88%"  alt="">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4 text-nowrap mb-2">
              <p>Halo @ 2024 All Rights Reserved</p>
            </div>
          </div>
        </div>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>