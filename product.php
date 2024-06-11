<?php

include('server/connection.php');

if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];

     $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
     $stmt->bind_param("i",$product_id);

     $stmt->execute();


     $product = $stmt->get_result();





}else{
  header('location: index.php');
}





?>





<?php

include('layouts/header.php');


?>

      <section class="single-product my-5 pt-5">
        <div class="row mt-5">

          <?php
            while($row = $product->fetch_assoc()){
          ?>

          

            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $row['product_image']; ?>" id="mainImg">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img" alt="">
                    </div>
                </div>
            </div>

            

            <div class="col-lg-6 col-md-12 col-sm-12">
                <h6>Carpet</h6>
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2>Rs.<?php echo $row['product_price'];  ?></h2>

                <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" >
                  <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                  <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">

                      <input type="number" name="product_quantity" value="1"/>
                      <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>


                </form>
                
                <h4 class="mt-5 mb-5">Product Details</h4>
                <span><?php echo $row['product_description']; ?></span>
            </div>
           
            <?php  }  ?>
        </div>
      </section>

      <section id="related-products" class="my-5 pt-5">
        <div class="container text-center mt-5 py-5">
          <h3>Related Products</h3>
          <hr>
        </div>

        <div class="row mx-auto container">
          <div class="product text-center col-lg-3 col-md-4 col-sm-6">
            <img class="img-fluid mb-3"  src="assets/imgs/sofa2.jpg" alt="Sofa">
            <div class="star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>

            </div>
            <h5 class="p-name">Sofa</h5>
            <h4 class="p-price">Rs.35000</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div class="product text-center col-lg-3 col-md-4 col-sm-6">
            <img class="img-fluid mb-3"  src="assets/imgs/carpet2.jpg" alt="Sofa">
            <div class="star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>

            </div>
            <h5 class="p-name">Carpet</h5>
            <h4 class="p-price">Rs.5000</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div class="product text-center col-lg-3 col-md-4 col-sm-6">
            <img class="img-fluid mb-3"  src="assets/imgs/table4.jpg" alt="Sofa">
            <div class="star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>

            </div>
            <h5 class="p-name">Table</h5>
            <h4 class="p-price">Rs.3000</h4>
            <button class="buy-btn">Buy Now</button>
          </div>

          <div class="product text-center col-lg-3 col-md-4 col-sm-6">
            <img class="img-fluid mb-3"  src="assets/imgs/wall3.jpg" alt="Sofa">
            <div class="star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>

            </div>
            <h5 class="p-name">Wall Mirror</h5>
            <h4 class="p-price">Rs.3000</h4>
            <button class="buy-btn">Buy Now</button>
          </div>
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

    <script>
      var mainImg = document.getElementById("mainImg");
      var smallImg = document.getElementsByClassName("small-img");

      for(let i=0;i<4;i++){
        smallImg[i].onclick = function(){
        mainImg.src = smallImg[i].src;
      }
      }

      
    

    </script>  

  </body>
</html>