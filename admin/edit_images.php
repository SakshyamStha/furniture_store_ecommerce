<?php
include('header.php');
?>

<?php
if (isset($_GET['product_id']) && isset($_GET['product_name'])) {
    $product_id = $_GET['product_id'];
    $product_name = $_GET['product_name'];
} else {
    header('Location: products.php');
    exit; // It's good practice to call exit after a header redirect
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
        <h2>Update Product Images</h2>
        <div class="table-responsive">
            <div class="mx-auto">
                <form id="edit-image-form" enctype="multipart/form-data" method="POST" action="update_images.php">
                    <p style="color:red;"><?php if (isset($_GET['error'])) { echo $_GET['error']; } ?></p>

                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $product_name; ?>">

                    <div class="form-group mt-2">
                        <label>Image 1</label>
                        <input type="file" class="form-control" name="image1" required id="image1" placeholder="Image 1">
                    </div>

                    <div class="form-group mt-2">
                        <label>Image 2</label>
                        <input type="file" class="form-control" name="image2" required id="image2" placeholder="Image 2">
                    </div>

                    <div class="form-group mt-2">
                        <label>Image 3</label>
                        <input type="file" class="form-control" name="image3" required id="image3" placeholder="Image 3">
                    </div>

                    <div class="form-group mt-2">
                        <label>Image 4</label>
                        <input type="file" class="form-control" name="image4" required id="image4" placeholder="Image 4">
                    </div>

                    <div class="form-group mt-2">
                        <input type="submit" class="btn btn-primary" name="update_images" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
