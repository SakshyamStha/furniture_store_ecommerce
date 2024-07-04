<?php

include('layouts/header.php');


?>



      <!--Home-->
    <section id="home">
        <div class="container">
          <br>
            <h5 style="color: #2f1b12">HALO HOME DECOR</h5>
            <h1 style="color: #2f1b12"><span>Transform Your Home</span> Reflect Your Style</h1>
            <p>Best prices<br>this season.</p>
            <button onclick=openshop()>Shop Now</button>
        </div>

    </section>
    
      <!--Categories-->
    <section id ="category" class="container">
        <div class="container text-center mt-5 py-5">
          <h3 style="font-size: 35px; color: #2f1b12">Our Top Categories</h3>
          <hr><br>
          <p>
            Here you can check out our top categories
          </p>
        </div>
        <div class="container" style="display: flex; justify-content: space-between; width: 100%; flex-wrap: nowrap;">
        <div class="photo" style="flex: 1; margin: 10px; text-align: center;">
            <img src="assets/imgs/lamp1.jpg" alt="Photo 1" style="width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <button onclick="openshop()"; style="padding: 10px 20px; font-size: 16px; color: #fff; background-color: #714423; border: none; transition: background-color 0.3s ease; margin-top: 10px;">Lighting</button>
        </div>
        <div class="photo" style="flex: 1; margin: 10px; text-align: center;">
            <img src="assets/imgs/chair1.jpg" alt="Photo 2" style="width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <button onclick="openshop()"; style="padding: 10px 20px; font-size: 16px; color: #fff; background-color:  #714423; border: none;  cursor: pointer; transition: background-color 0.3s ease; margin-top: 10px;">Chair</button>
        </div>
        <div class="photo" style="flex: 1; margin: 10px; text-align: center;">
            <img src="assets/imgs/sofa1.jpg" alt="Photo 3" style="width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <button onclick="openshop()"; style="padding: 10px 20px; font-size: 16px; color: #fff; background-color: #714423;  border: none;  cursor: pointer; transition: background-color 0.3s ease; margin-top: 10px;">Sofa</button>
        </div>
        <div class="photo" style="flex: 1; margin: 10px; text-align: center;">
            <img src="assets/imgs/carpet2.jpg" alt="Photo 4" style="width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <button onclick="openshop()"; style="padding: 10px 20px; font-size: 16px; color: #fff; background-color:  #714423; border: none; cursor: pointer; transition: background-color 0.3s ease; margin-top: 10px;">Carpets</button>
        </div>
    </div>
    </div>
        <div class="container" style="display: flex; justify-content: space-between; width: 80%; flex-wrap: nowrap;">
        <div class="photo" style="flex: 1; margin: 10px; text-align: center;">
            <img src="assets/imgs/table2.jpg" alt="Photo 1" style="width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <button onclick="openshop()"; style="padding: 10px 20px; font-size: 16px; color: #fff; background-color:  #714423; border: none; cursor: pointer; transition: background-color 0.3s ease; margin-top: 10px;">Table</button>
        </div>
        <div class="photo" style="flex: 1; margin: 10px; text-align: center;">
            <img src="assets/imgs/wall1.jpg" alt="Photo 2" style="width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <button onclick="openshop()"; style="padding: 10px 20px; font-size: 16px; color: #fff; background-color:  #714423; border: none; cursor: pointer; transition: background-color 0.3s ease; margin-top: 10px;">Wall Decor</button>
        </div>
        <div class="photo" style="flex: 1; margin: 10px; text-align: center;">
            <img src="assets/imgs/ass1.jpg" alt="Photo 2" style="width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <button onclick="openshop()"; style="padding: 10px 20px; font-size: 16px; color: #fff; background-color:  #714423; border: none;  cursor: pointer; transition: background-color 0.3s ease; margin-top: 10px;">Accessories</button>
        </div>
</div>


    </section> 
<br>

      <section id="new" class="w-100">
        <div class="row p-0 m-0">

          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/1.jpg" alt="">
            <div class="details">
              <h2>Discover Timeless Elegance</h2>
             
            </div>
          </div>

          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/2.jpg" alt="">
            <div class="details">
              <h2>Elevate Your Space with Exceptional Quality</h2>
              <button class="text-uppercase" onclick="openshop()">Shop Now</button>
            </div>
          </div>

          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/3.jpg" alt="">
            <div class="details">
              <h2>Your Dream Home Awaits, Visit Us Now!"</h2>
              
            </div>
          </div>

        </div>
      </section>
      <!--Features-->
      <section id="featured" class="my-1 pt-1">
        <div class="container text-center mt-5 py-5">
          <h3 style="font-size: 35px; color: #2f1b12">Our Featured Products</h3>
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
          <h1>Budget-Friendly Deals!</h1>
          <button class="text-uppercase" onclick="openshop()">Shop Now</button>
        </div>

      </section>



      <script>
        function openshop(){
          window.open('shop.php','_blank');
        }
      </script>

   

<?php
  include('layouts/footer.php');
?>