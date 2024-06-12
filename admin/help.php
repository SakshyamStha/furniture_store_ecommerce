<?php
include('header.php');


if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit();
}

?>
    
    <div class="container">
        <div class="sidebar">
            <?php include 'sidemenu.php'; ?>
        </div>

        <div class="content">
            <!-- Your dashboard content here -->
            <h1>Dashboard</h1>
            <hr>
            <h2>Admin Account</h2>

           <p>
            Please contact <b><?php echo $_SESSION['admin_email']; ?></b> for help.
           </p>



        </div>
       
    </div>
</body>
</html>
