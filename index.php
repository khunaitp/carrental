<?php include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>NanSi</title>
  <link rel="icon" href="https://creazilla-store.fra1.digitaloceanspaces.com/cliparts/1795470/tire-clipart-sm.png">
</head>

<body>

  <?php include 'header.php' ?>

  <?php
  $select = mysqli_query($conn, "SELECT * FROM car WHERE car_status = 0");
  ?>

  <br><br><br>

  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <!-- while loop -->
      <?php while ($row = mysqli_fetch_assoc($select)) { ?>
        <div class="col">
          <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
              <h4 class="my-0 fw-normal"><?php echo $row['brand'] . " " . $row['model']; ?></h4> <!-- จะใส่ model กับ brand 2 อัน-->
            </div>
            <div class="card-body">
              <img src="image/<?php echo $row['car_pic']; ?>" alt="demo" class="responsive">
              <h1 class="card-title pricing-card-title">
                <?php echo $row['rental_rate']; ?>
                <small class="text-muted fw-light"> Baht/Day</small>
              </h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>
                  Carcode: <?php echo $row['carcode']; ?> <br>
                  Transmission: <?php echo $row['transmission']; ?> <br>
                  Seats: <?php echo $row['seat']; ?> <br> </li>
              </ul>
              <?php
              if (isset($_SESSION['email'])) {
                echo '<a class="w-100 btn btn-lg btn-outline-info" href="reserve.php?rent=' . $row['id'] . '">Reserve</a>';
              } elseif (isset($_SESSION['admin']) && isset($_SESSION['admin_email'])) {
                echo '<a href="" class="w-100 btn btn-lg btn-outline-info">Reserve</a>';
              } else {
                echo '<a href="login.php" class="w-100 btn btn-lg btn-outline-info">Reserve</a>';
              }
              ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <?php include 'footer.php' ?>
</body>

</html>