<?php

    include('../server/connection.php');

    if(isset($_POST['update_images'])){

        $product_name = $_POST['product_name'];
        $product_id = $_POST['product_id'];
        


        $image1 = $_FILES['image1']['tmp_name'];
        $image2 = $_FILES['image2']['tmp_name'];
        $image3 = $_FILES['image3']['tmp_name'];
        $image4 = $_FILES['image4']['tmp_name'];
       // $file_name = $_FILES['image1']['name'];


        $image_name1 = $product_name."1.jpeg";
        $image_name2 = $product_name."2.jpeg";
        $image_name3 = $product_name."3.jpeg";
        $image_name4 = $product_name."4.jpeg";


        move_uploaded_file($image1,"../assets/imgs/".$image_name1);
        move_uploaded_file($image2,"../assets/imgs/".$image_name2);
        move_uploaded_file($image3,"../assets/imgs/".$image_name3);
        move_uploaded_file($image4,"../assets/imgs/".$image_name4);


        $stmt = $conn->prepare("UPDATE products SET product_image=?,product_image2=?,
                                    product_image3=?,product_image4=? WHERE product_id=?");
                                  

        $stmt->bind_param('ssssi', $image_name1,$image_name2,$image_name3,$image_name4,$product_id);

         if($stmt->execute()){

                header('location:products.php?images_updated=Images has been updated successfully');
                                        
         }else{
                header('location:products.php?images_failed=Images could not be updated.');
         }


    }

?>