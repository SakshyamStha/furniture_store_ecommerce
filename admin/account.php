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

           <div class = "table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Admin Id</th>
                            <th scope="col">Admin Name</th>
                            <th scope="col">Admin Email</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                                <td><?php echo $_SESSION['admin_id'];  ?></td>
                                <td><?php echo $_SESSION['admin_name'];  ?></td>
                                <td><?php echo $_SESSION['admin_email'];  ?></td>
                                
                            </tr>


                       
                    </tbody>

                </table>
           </div>



        </div>
       
    </div>
</body>
</html>
