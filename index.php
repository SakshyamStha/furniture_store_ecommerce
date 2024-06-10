<?php

include('layouts/header.php');


?>



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

   

<?php
  include('layouts/footer.php');
?>