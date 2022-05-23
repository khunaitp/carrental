<?php

@include('server.php');

$id = $_GET['edit'];

if (isset($_POST['update_product'])) {

   $product_code = $_POST['product_code'];
   $product_price = $_POST['product_price'];
   $product_brand = $_POST['product_brand'];
   $product_model = $_POST['product_model'];
   $product_transmission = $_POST['product_transmission'];
   $product_seat = $_POST['product_seat'];
   $product_status = $_POST['product_status'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'image/' . $product_image;

   if (empty($product_code) || empty($product_price) || empty($product_brand) || empty($product_model) || empty($product_transmission) || empty($product_seat) || empty($product_image)) {
      $message[] = 'please fill out all!';
   } else {

      $update_data = "UPDATE car SET carcode='" . $product_code . "', rental_rate=" . $product_price . ", 
         car_pic='" . $product_image . "', brand='" . $product_brand . "', model='" . $product_model . "', 
         seat=" . $product_seat . ", transmission='" . $product_transmission . "', car_status=" . $product_status . " WHERE id ='" . $id . "'";
      $upload = mysqli_query($conn, $update_data);

      if ($upload) {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:admin_page.php');
      } else {
         $$message[] = 'please fill out all!';
      }
   }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/adminstyle.css">
</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<span class="message">' . $message . '</span>';
      }
   }
   ?>

   <div class="container">
      <div class="admin-product-form-container centered">

         <?php
         $select = mysqli_query($conn, "SELECT * FROM car WHERE id = $id");
         while ($row = mysqli_fetch_assoc($select)) {
         ?>

            <form action="" method="post" enctype="multipart/form-data">
               <h3 class="title">Update Car</h3>
               <input type="text" class="box" name="product_code" value="<?php echo $row['carcode']; ?>" placeholder="enter new car code">
               <input type="text" class="box" name="product_brand" value="<?php echo $row['brand']; ?>" placeholder="enter new car brand">
               <input type="text" class="box" name="product_model" value="<?php echo $row['model']; ?>" placeholder="enter new car model">
               <input type="number" min="4" class="box" name="product_seat" value="<?php echo $row['seat']; ?>" placeholder="enter new car seats">
               <input type="text" class="box" name="product_transmission" value="<?php echo $row['transmission']; ?>" placeholder="enter new car transmission">
               <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['rental_rate']; ?>" placeholder="enter new car rental rate">
               <div class="form-group">
                  <label class="col-sm-4 control-label">Status</label>
                  <div class="col-sm-8">
                     <label class="radio-inline"> <input type="radio" name="product_status" id="ava0" value="0" checked>Available</label>
                     <label class="radio-inline"> <input type="radio" name="product_status" id="ava1" value="1">Not available</label>
                  </div>
               </div>
               <input type="file" class="box" name="product_image" accept="image/png, image/jpeg, image/jpg">
               <input type="submit" value="update car" name="update_product" class="btn">
               <a href="admin_page.php" class="btn">go back</a>
            </form>

         <?php }; ?>

      </div>
   </div>

</body>

</html>