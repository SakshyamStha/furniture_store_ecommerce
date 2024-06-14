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
            $user_id = $stmt->insert_id;
            $_SESSION['user_id'] = $user_id;
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
<?php

include('layouts/header.php');


?>



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
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label for="">Re-Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm password" required>
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















      <?php
  include('layouts/footer.php');
?>