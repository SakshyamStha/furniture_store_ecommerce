<?php
include('header.php');
?>

<?php


?>


<div class="container">
        <div class="sidebar">
            <?php include 'sidemenu.php'; ?>
        </div>

        <div class="content">
            <!-- Your dashboard content here -->
            <h1>Dashboard</h1>
            <hr>
            <h2>Add Product</h2>
           <div class = "table-responsive">
           
                <div class = "mx-auto">
                    <form id="create-form" enctype="multipart/form-data" method="POST" action="create_product.php">
                        <p style="color:red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                        <div class="form-group mt-2">

                        
                           
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" required id="product_name" placeholder="Title">
                        </div>
                            
                        <div class="form-group mt-2">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" required id="product_desc" placeholder="Description">
                        </div>
                        <div class="form-group mt-2">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" required id="product_price" placeholder="Price">
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
                            <input type="text" class="form-control" name="color" required id="product_color" placeholder="Color">
                        </div>

                        <div class="form-group mt-2">
                            <label>Image 1</label>
                            <input type="file" class="form-control" name="image1" required id="image1" placeholder="image1">
                        </div>

                        <div class="form-group mt-2">
                            <label>Image 2</label>
                            <input type="file" class="form-control" name="image2" required id="image2" placeholder="image2">
                        </div>

                        <div class="form-group mt-2">
                            <label>Image 3</label>
                            <input type="file" class="form-control" name="image3" value="<?php echo $product['product_color'] ?>" required id="image3" placeholder="image3">
                        </div>

                        <div class="form-group mt-2">
                            <label>Image 4</label>
                            <input type="file" class="form-control" name="image4" required id="image4" placeholder="image4">
                        </div>

                        <div class="form-group mt-2">
                            <label>Special Offer</label>
                            <input type="number" class="form-control" name="offer" required id="product-offer" placeholder="Sale%">
                        </div>
                        
                        <div class="form-group mt-2">
                            <input type="submit" class="btn btn-primary" name="create_product"  value="Create">
                        </div>

                    </form>

                </div>


           </div>



        </div>
       
    </div>
</body>
</html>
