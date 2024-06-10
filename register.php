<?php

    session_start();

    include('server/connection.php');

    if(isset($_SESSION['logged_in'])){
      header('location: account.php');
      exit;
    }

   
    if(isset($_POST['register'])){
      
     $name =  $_POST['name'];
     $email =  $_POST['email'];
     $password =  $_POST['password'];
     $confirmPassword =  $_POST['confirmPassword'];


    if($password !== $confirmPassword){
      header('location: register.php?error=passwords donot match.');
     }

    else if(strlen($password) < 8)
     {
      header('location: register.php?error= password should atleast be of 8 characters.');
     }
     

     
    else{
      //to check if email is available
      $stmt1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email=?");

      $stmt1->bind_param('s',$email);
      $stmt1->execute();
      $stmt1->bind_result($num_rows);
      $stmt1->store_result();
      $stmt1->fetch();
 
      //if email is already there
      if($num_rows != 0){
       header('location: register.php?error=email already taken!');
      }
      else{
        //create a new user
          $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
          VALUES (?,?,?)");

          $stmt->bind_param('sss',$name,$email,md5($password));

          if($stmt->execute()){
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $name;
            $_SESSION['logged_in'] = true;
            header('location: account.php?register_success=You registered successfully');
          }
          else{
            header('location: register.php?error=couldnot create an accoint at the moment.');
          }
      }
 
    }
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


      <!--register-->
      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">
                --Register--
            </h2>
            <hr class="mx-auto">

        </div>

        <div class="mx-auto container">
            <form id="register-form" method="POST" action="register.php">
              <p style = "color:red;"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="password">
                </div>
                <div class="form-group">
                    <label for="">Re-Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm password">
                </div>

                <div class="form-group">
                   <input type="submit" class="btn" id="register-btn" name="register" value="Register">
                </div>
                <div class="form-group">
                    <a id="login-url" href="login.php" class="btn" href="">Do you have an Account? Login</a>
                </div>
            </form>
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