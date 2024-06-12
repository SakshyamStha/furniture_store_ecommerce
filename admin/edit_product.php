<?php
include('header.php');
?>

<?php

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
        
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
    $stmt->bind_param('i',$product_id);
    $stmt->execute();

    $products = $stmt->get_result();

}else if(isset($_POST['edit_btn'])){

    $product_id = $_POST['product_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $offer = $_POST['offer'];
    $color = $_POST['color'];
    $category = $_POST['category'];

    $stmt = $conn->prepare("UPDATE products SET product_name=?, product_description=?, product_price=?, 
                                   product_special_offer=?, product_color=?, product_category=? WHERE product_id=?");
    $stmt->bind_param('ssssssi',$title,$description,$price,$offer,$color,$category,$product_id);
   if($stmt->execute()){
    header('location: products.php?edit_success_message = Product has been updated successfully');
   }else{
    header('location: products.php?edit_failure_message = Error occured, try again');
   }


}else{
    header('location: products.php');
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
                    <form id="edit-form" method="POST" action="edit_product.php">
                        <p style="color:red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                        <div class="form-group mt-2">

                        <?php foreach($products as $product){ ?>
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $product['product_name'] ?>" required id="product_name" placeholder="Title">
                        </div>
                        <div class="form-group mt-2">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" value="<?php echo $product['product_description'] ?>" required id="product_desc" placeholder="Description">
                        </div>
                        <div class="form-group mt-2">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" value="<?php echo $product['product_price'] ?>" required id="product_price" placeholder="Price">
                        </div>
                        <div class="form-group mt-2">
                            <label>Category</label>
                            <select name="category" class="form-select" required>
                                <option value="sofa">Sofa</option>
                                <option value="chair">Chair</option>
                                <option value="table">Table</option>
                                <option value="lamp">Lamp</option>
                                <option value="wall">Wall</option>
                                <option value="carpet">Carpet</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label>Color</label>
                            <input type="text" class="form-control" name="color" value="<?php echo $product['product_color'] ?>" required id="product_color" placeholder="Color">
                        </div>
                        <div class="form-group mt-2">
                            <label>Special Offer</label>
                            <input type="number" class="form-control" name="offer" value="<?php echo $product['product_special_offer'] ?>" required id="product-offer" placeholder="Sale%">
                        </div>
                        <?php } ?>
                        <div class="form-group mt-2">
                            <input type="submit" class="btn btn-primary" name="edit_btn"  value="Edit">
                        </div>

                    </form>

                </div>


           </div>



        </div>
       
    </div>
</body>
</html>
