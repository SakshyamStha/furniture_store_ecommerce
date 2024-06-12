<?php
include('header.php');


if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php');
    exit();
}




   
  
    $stmt = $conn->prepare("SELECT * FROM products");
  
    $stmt->execute();
  
    $products = $stmt->get_result();
  
  



?>
    
    <div class="container">
        <div class="sidebar">
            <?php include 'sidemenu.php'; ?>
        </div>

        <div class="content">
            <!-- Your dashboard content here -->
            <h1>Dashboard</h1>
            <hr>
            <h2>Products</h2>
           <div class = "table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Product Id</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Product Offer</th>
                            <th scope="col">Product Category</th>
                            <th scope="col">Product Color</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $product) { ?>
                            <tr>
                                <td><?php echo $product['product_id'];  ?></td>
                                <td><img src="<?php echo "../assets/imgs/". $product['product_image'];  ?>" style="width:70px; height:70px; " ></td>
                                <td><?php echo $product['product_name'];  ?></td>
                                <td>Rs.<?php echo $product['product_price'];  ?></td>
                                <td><?php echo $product['product_special_offer'];  ?>%</td>
                                <td><?php echo $product['product_category'];  ?></td>
                                <td><?php echo $product['product_color'];  ?></td>
                                <td><a class="btn btn-primary" href="edit_product.php?product_id=<?php echo $product['product_id']; ?>">Edit</a></td>
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
