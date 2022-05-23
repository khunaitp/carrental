<?php
@include('server.php');
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
   <link rel="stylesheet" href="css/history.css">

</head>

<body>
   <?php include 'header.php' ?>

   <?php
   $customer_id = $_SESSION['customer_id'];
   $select = mysqli_query($conn, "SELECT * FROM rental WHERE customer_id=$customer_id");
   ?>

   <br><br>
   <h1 class="center">History</h1>
   <h2 class="center"><?php echo $_SESSION['first_name']; ?></h2>

   <div class="product-display">
      <table class="product-display-table table-center">
         <thead>
            <tr>
               <th>rental ID</th>
               <th>car code</th>
               <th>amount</th>
               <th>pickup date</th>
               <th>drop date</th>
            </tr>
         </thead>
         <?php while ($row = mysqli_fetch_assoc($select)) { ?>
            <tr>
               <td><?php echo $row['rental_id']; ?></td>
               <td><?php echo $row['car_id']; ?></td>
               <td><?php echo $row['amount']; ?></td>
               <td><?php echo $row['pickup_date']; ?></td>
               <td><?php echo $row['drop_date']; ?></td>
            </tr>
         <?php } ?>
      </table>
   </div>
   </div>

</body>

</html>