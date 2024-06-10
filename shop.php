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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/style.css">


    <style>
        .product img{
            width: 100%;
            height: auto;
            box-sizing: border-box;
            object-fit: cover;
        }

        .pagination a{
            color: coral;
        }

        .pagination li:hover a{
            color: white;
            background-color: coral;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
          <img src="assets/imgs/logo1.jpg" height="50" width="100" alt="Logo">
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


      <section id="search" class="my-5 py-5 ms-2 row mx-auto">
        <div class="container mt-5 py-5">
          <p>Search Products</p>
          <hr>
        </div>

              <form action="shop.php" method="POST">
                <div class = "row mx-auto container">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Category</p>
                      <div class="form-check">
                        <input class="form-check-input" value="sofa" type="radio" name="category" id="category_one">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Sofa
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" value="carpet" type="radio" name="category" id="category_one">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Carpet
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" value="table" type="radio" name="category" id="category_one">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Table
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" value="chair" type="radio" name="category" id="category_one">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Chair
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" value="lamp" type="radio" name="category" id="category_one">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Lamp
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" value="wall" type="radio" name="category" id="category_one">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Wall
                        </label>
                      </div>

                  </div>

                </div>

                <div class="row mx-auto container mt-5">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Price</p>
                    <input type="range" class="form-range w-50" min="1" max="100000" name="price" value="100" id="customRange2">
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
      <section id="shop" class="my-5 py-5 row mx-auto">
        <div class="container mt-5 py-5">
          <h3>Our Products</h3>
          
          <p>
            Here you can check out our products
          </p>
        </div>

        <div class="row mx-auto container">


          <?php while($row = $products->fetch_assoc()) {  ?>




          <div onclick="window.location.href='product.html'"; class="product text-center col-lg-3 col-md-4 col-sm-6">
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

          <nav aria-label="Page Navigation">
            <ul class="pagination mt-5 ">
                <li class="page-item"><a class="page-link" href="">Previous</a></li>
                <li class="page-item"><a class="page-link" href="">1</a></li>
                <li class="page-item"><a class="page-link" href="">2</a></li>
                <li class="page-item"><a class="page-link" href="">3</a></li>
                <li class="page-item"><a class="page-link" href="">Next</a></li>

            </ul>
          </nav>


        </div>
      </section>  






      <?php
  include('layouts/footer.php');
?>