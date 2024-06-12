<?php
include('header.php');


if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit();
}




   
  
    $stmt = $conn->prepare("SELECT * FROM orders");
  
    $stmt->execute();
  
    $orders = $stmt->get_result();
  
  



?>
    
    <div class="container">
        <div class="sidebar">
            <?php include 'sidemenu.php'; ?>
        </div>

        <div class="content">
            <!-- Your dashboard content here -->
            <h1>Dashboard</h1>
            <hr>
            <h2>Orders</h2>

            <?php if(isset($_GET['order_updated'])){?>
                <p class="text-center" style="color:green;"><?php echo $_GET['order_updated']; ?></p>
            <?php } ?>

            <?php if(isset($_GET['order_failed'])){?>
                <p class="text-center" style="color:red;"><?php echo $_GET['order_failed']; ?></p>
            <?php } ?>

           <div class = "table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">User Phone</th>
                            <th scope="col">User Address</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order) { ?>
                            <tr>
                                <td><?php echo $order['order_id'];  ?></td>
                                <td><?php echo $order['order_status'];  ?></td>
                                <td><?php echo $order['user_id'];  ?></td>
                                <td><?php echo $order['order_date'];  ?></td>
                                <td><?php echo $order['user_phone'];  ?></td>
                                <td><?php echo $order['user_address'];  ?></td>
                                <td><a class="btn btn-primary" href="edit_order.php?order_id=<?php echo $order['order_id'];  ?>">Edit</a></td>
                                <td><a class="btn btn-danger" href="">Delete</a></td>

                            </tr>


                        <?php } ?>
                    </tbody>

                </table>
           </div>



        </div>
       
    </div>
</body>
</html>
