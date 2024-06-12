<?php
include('header.php');
?>
<?php

include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
  header('location: index.php');
  exit;
}

if(isset($_POST['login_btn'])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email = ? AND admin_password = ? LIMIT 1");

  $stmt->bind_param('ss',$email,$password);

  if($stmt->execute()){
    $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);

    $stmt->store_result();

        if($stmt->num_rows()==1){
          $stmt->fetch();

          $_SESSION['admin_id'] = $admin_id;
          $_SESSION['admin_name'] = $admin_name;
          $_SESSION['admin_email'] = $admin_email;
          $_SESSION['admin_logged_in'] = true;

          header('Location: index.php?login_success=logged+in+successfully!');
          exit();

        }
        else{
          header('location: login.php?error=coulnot verify your account!');

        }

  }else{
    //error 
    header('location: login.php?error=something went wrong!');
  }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="login-container">
        <form class="login-form" method="POST" action="login.php">
            <h2>Login</h2>
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
           
 	   <input type="submit" class="btn btn-primary" name="login_btn" value="Login">
        </form>
    </div>
</body>
</html>

