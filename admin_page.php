<?php

@include('server.php');
//session_start(); 

if (isset($_POST['add_product'])) {

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
      $message[] = 'please fill out all';
   } else {
      $insert = "INSERT INTO car(carcode, rental_rate, brand, model, transmission, seat, car_status, car_pic) VALUES('" . $product_code . "','"  . $product_price . "','"  . $product_brand . "','"  . $product_model . "','"  .
         $product_transmission . "','"  . $product_seat . "','" . $product_status . "','" . $product_image . "')";

      $upload = mysqli_query($conn, $insert);

      if ($upload) {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      } else {
         $message[] = 'could not add the product';
      }
   }
};

if (isset($_GET['delete'])) {
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM car WHERE id = $id");
   header('location: admin_page.php');
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/adminstyle.css">

</head>

<body>

   <?php include 'header.php' ?>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<span class="message">' . $message . '</span>';
      }
   }
   ?>

   <div class="container">
      <div class="admin-product-form-container">
         <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>add new car</h3>
            <input type="text" placeholder="enter carcode" name="product_code" class="box" required>
            <input type="text" placeholder="enter brand" name="product_brand" class="box" required>
            <input type="text" placeholder="enter model" name="product_model" class="box" required>
            <input type="number" placeholder="enter seat" name="product_seat" class="box" required>
            <input type="text" placeholder="enter transmission" name="product_transmission" class="box" required>
            <input type="number" placeholder="enter rental rate" name="product_price" class="box" required>
            <div class="form-group">
               <label class="col-sm-4 control-label">Status</label>
               <div class="col-sm-8">
                  <label class="radio-inline"> <input type="radio" name="product_status" id="ava0" value="0" checked>Available</label>
                  <label class="radio-inline"> <input type="radio" name="product_status" id="ava1" value="1">Not available</label>
               </div>
            </div>
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box" required>
            <input type="submit" class="btn" name="add_product" value="add car">
         </form>
      </div>

      <?php
      $select = mysqli_query($conn, "SELECT * FROM car");
      ?>

      <div class="product-display">
         <table class="product-display-table">
            <thead>
               <tr>
                  <th>car image</th>
                  <th>car code</th>
                  <th>car brand</th>
                  <th>car model</th>
                  <th>seat</th>
                  <th>transmission</th>
                  <th>car price</th>
                  <th>status</th>
                  <th>action</th>
               </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
               <tr>
                  <td><img src="image/<?php echo $row['car_pic']; ?>" height="100" alt=""></td>
                  <td><?php echo $row['carcode']; ?></td>
                  <td><?php echo $row['brand']; ?></td>
                  <td><?php echo $row['model']; ?></td>
                  <td><?php echo $row['seat']; ?></td>
                  <td><?php echo $row['transmission']; ?></td>
                  <td><?php echo $row['rental_rate']; ?></td>
                  <td><?php echo $row['car_status']; ?></td>
                  <td>
                     <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
                     <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
                  </td>
               </tr>
            <?php } ?>
         </table>
      </div>
   </div>

</body>

</html>