<?php
include('header.php');
?>

<?php

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
        
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id=?");
    $stmt->bind_param('i',$order_id);
    $stmt->execute();

    $order = $stmt->get_result();

}else if(isset($_POST['edit_order'])){

    $order_status = $_POST['order_status'];
    $order_id = $_POST['order_id'];


    $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
    $stmt->bind_param('si',$order_status,$order_id);

   if($stmt->execute()){
    header('location: index.php?order_updated = Order has been updated successfully');
   }else{
    header('location: index.php?order_failed = Error occured, try again');
   }


}else{
    header('location: index.php');
    exit;
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
            <h2>Edit Product</h2>
           <div class = "table-responsive">
           
                <div class = "mx-auto">
                    <form id="edit-order-form" method="POST" action="edit_order.php">

                    <?php
                        foreach($order as $r){
                    ?>
                        <p style="color:red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                        <div class="form-group my-3">
                            <label">Order Id</label>
                            <p class="my-4"><?php echo $r['order_id'];?></p>
                        </div>

                        <div class="form-group mt-3">
                            <label">Order Price</label>
                            <p class="my-4"><?php echo $r['order_cost'];?></p>
                        </div>

                        <input type="hidden" name="order_id" value="<?php echo $r['order_id'];?>">

                        <div class="form-group my-3">
                            <label">Order Status</label>
                            <select name="order_status" class="form-select" required>
                             
                                <option value="Not Paid" <?php if($r['order_status']=='Not Paid'){echo "selected";} ?>   >Not Paid</option>
                                <option value="paid"<?php if($r['order_status']=='paid'){echo "selected";} ?>>Paid</option>
                                <option value="shipped"<?php if($r['order_status']=='shipped'){echo "selected";} ?>>Shipped</option>
                                <option value="delivered"<?php if($r['order_status']=='delivered'){echo "selected";} ?>>Delivered</option>
                            </select>
                        </div>

                        <div class="form-group my-3">
                            <label">Order Date</label>
                            <p class="my-4"><?php echo $r['order_date'];?></p>
                        </div>

                        <div class="form-group my-3">
                            <input type="submit" name="edit_order" class="btn btn-primary" value="Edit">
                        </div>

                        <?php } ?>
                    </form>

                </div>


           </div>



        </div>
       
    </div>
</body>
</html>
