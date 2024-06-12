<?php

include('server/connection.php');


if(isset($_POST['search'])){
  //returns the searched product

          $category = $_POST['category'];
          $price = $_POST['price'];


          $stmt = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=?");

          $stmt->bind_param("si",$category,$price);

          $stmt->execute();


          $products = $stmt->get_result();




}else{
      //returns all products
        $stmt = $conn->prepare("SELECT * FROM products");

        $stmt->execute();


        $products = $stmt->get_result();

}













?>

<?php

include('layouts/header.php');


?>

   

      <section id="search" class="my-5 py-0 ms-2 ">
        <div class="container mt-5 py-2">
          <p>Search Products</p>
          <hr>
        </div>

              <form action="shop.php" method="POST">
                <div class = "row mx-auto container">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Category</p>
                      <div class="form-check">
                        <input class="form-check-input" value="sofa" type="radio" name="category" id="category_one" <?php if(isset($category)){echo 'checked';}?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                          Sofa
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" value="carpet" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=='carpet'){echo 'checked';}?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                          Carpet
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" value="table" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=='table'){echo 'checked';}?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                          Table
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" value="chair" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=='chair'){echo 'checked';}?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                          Chair
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" value="lamp" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=='lamp'){echo 'checked';}?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                          Lighting
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" value="wall" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=='wall'){echo 'checked';}?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                          Wall Decor
                        </label>
                      </div>

                  </div>

                </div>

                <div class="row mx-auto container mt-5">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Price</p>
                    <input type="range" class="form-range w-50" min="1" max="100000" name="price" value="<?php if(isset($price)){echo $price;}else{echo "100";}?>" id="customRange2">
                    <div class="w-50">
                      <span style="float:left;">1</span>
                      <span style="float:right;">50000</span>

                    </div>

                  </div>

                </div>

                <div class="form-group my-3 mx-3">
                  <input type="submit" name="search" value="Search" class="btn btn-primary" id="">
                </div>
              </form>



      </section>



      <!--shop-->
      <section id="shop" class="my-5 py-0 row mx-auto">
        <div class="container mt-5 py-0">
          <h3>Our Products</h3>
          
          <p>
            Here you can check out our products
          </p>
        </div>

        <div class="row mx-auto container">


          <?php while($row = $products->fetch_assoc()) {  ?>




          <div class="product text-center col-lg-3 col-md-4 col-sm-6">
            <img class="img-fluid mb-3"  src="assets/imgs/<?php echo $row['product_image']; ?>" alt="Sofa">
            <div class="star">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price">Rs.<?php echo $row['product_price']; ?></h4>
            <a class="btn shop-buy-btn" href="<?php echo "product.php?product_id=". $row['product_id']; ?>">Buy Now</a>
          </div>

            <?php } ?>

          

        </div>
      </section>  






      <?php
  include('layouts/footer.php');
?>