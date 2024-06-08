<?php

session_start();

if(isset($_POST['add_to_cart'])){
  
    if(isset($_SESSION['cart'])){

      $products_array_ids = array_column($_SESSION['cart'],"product_id");
      if(!in_array($_POST['product_id'],$products_array_ids) ){
        $product_id = $_POST['product_id'];  

        $product_array = array(
                            'product_id' => $_POST['product_id'],
                            'product_name' => $_POST['product_name'],
                            'product_price' => $_POST['product_price'],
                            'product_image' => $_POST['product_image'],
                            'product_quantity' => $_POST['product_quantity']
        );

        $_SESSION['cart'][$product_id] = $product_array;


      }else{

        echo '<script>alert("Product has been added to the cart!");</script>';
        //echo '<script>window.location="index.php";</script>';
      }


    }else{

       $product_id = $_POST['product_id'];
       $product_name = $_POST['product_name'];
       $product_price = $_POST['product_price'];
       $product_image = $_POST['product_image'];
       $product_quantity = $_POST['product_quantity'];

       $product_array = array(
                          'product_id' => $product_id,
                          'product_name' => $product_name,
                          'product_price' => $product_price,
                          'product_image' => $product_image,
                          'product_quantity' => $product_quantity
       );

       $_SESSION['cart'][$product_id] = $product_array;

    }


}elseif(isset($_POST['remove_product'])){

  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);






}else{
    header('location: index.php');
}



?>



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

      <!--Cart-->
      <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Your Cart</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>


            <?php foreach($_SESSION['cart'] as $key => $value){   ?>


            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['product_image'];  ?>" alt="">
                        <div>
                            <p><?php echo $value['product_name'];  ?></p>
                            <small><span>Rs.</span><?php echo $value['product_price'];  ?></small>
                            <br>

                            <form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                                <input type="submit" name="remove_product" class="remove-btn" value="Remove" >
                            </form>
                        </div>
                    </div>
                </td>

                <td>
                    <input type="number" value="<?php echo $value['product_quantity'];  ?>"/>
                    <a class="edit-btn">Edit</a>

                </td>

                <td>
                    <span>Rs.</span>
                    <span class="product-price"><?php echo $value['product_price'];  ?></span>
                </td>
            </tr>

            <?php } ?>

        </table>

        <div class="cart-total">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>Rs.35000</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>Rs.35000</td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <button class="btn checkout-btn">Checkout</button>
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