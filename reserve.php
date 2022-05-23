<?php
    include('reserve_db.php');
?>

<!doctype html>
<html lang="en">
<?php
    include('server.php'); 
    $id = $_GET['rent'];
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.1/examples/checkout/form-validation.css" rel="stylesheet">

    <!-- Link with reserve.css -->
    <link rel="stylesheet" href="css/reservestyle.css">

    <title>Reserve</title>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Reservation</h2>
                <p class="lead">Rent a car in just a few taps</p>
            </div>
            <?php
        if(isset($message)){
          foreach($message as $message){
              echo '<span class="message">'.$message.'</span>';
          }
        }
      ?>
            <br>
            <form method="POST">
                <?php
         $select = mysqli_query($conn, "SELECT * FROM car WHERE id = $id");
         while ($row = mysqli_fetch_assoc($select)) {
      ?>
                <div class="row g-5 bg-light detail">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-danger">Car Information</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0"><?php echo $row['brand'] . " " . $row['model']; ?></h6>
                                    <span class="text-muted">Carcode:
                                        <?php echo $row['carcode']; ?><br><?php echo $row['seat']; ?>
                                        Seats<br><?php echo $row['transmission']; ?> Transmission<span>
                                </div>
                                <span class="text-muted">฿<?php echo $row['rental_rate']; ?>/Day</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <img src="image/<?php echo $row['car_pic']; ?>" alt="demo" class="responsive">
                                </div>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0">Pick up Date</h6>
                                </div>
                                <input type="date" id="pickup_date" name="pickup_date" required>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0">Drop Date</h6>
                                </div>
                                <input type="date" id="drop_date" name="drop_date" onchange="getDays()" required>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0">Pick up and Drop location</h6>
                                    <span class="text-muted">Suwanabhumi Airport</span>
                                </div>
                            </li>
                        </ul>

                        <ul class="list-group mb-3"></ul>
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <h6 class="my-0" style="color:red">Total paid</h6>
                                <span>THB <input style="color:red" id="days" name="amount" readonly></span>
                                <input name="customer_id" type="hidden" value="<?php echo $_SESSION['customer_id'] ?>">
                            </div>

                        </li>
                    </div>
                    <script>
                    function getDays() {
                        var rate = "<?php echo $row['rental_rate']; ?>";
                        var start_date = new Date(document.getElementById('pickup_date').value);
                        var end_date = new Date(document.getElementById('drop_date').value);
                        //Here we will use getTime() function to get the time difference
                        var time_difference = end_date.getTime() - start_date.getTime();
                        //Here we will divide the above time difference by the no of miliseconds in a day
                        var days_difference = time_difference / (1000 * 3600 * 24);
                        //alert(days);
                        document.getElementById('days').value = rate * (days_difference + 1);
                    }
                    </script>

                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-2">Driver's details</h4>
                        <small class="text-muted">Important: Kindly make sure the Driver's name should
                            match the name on the Driver's License. Please check the correction of your information
                            below before submitting the reservation.</small>

                        <div class="row g-3">
                            <div class="col-12">
                                <label for="firstName" class="form-label"><br><b>Full Name:</b></label>
                                <label for="firstName" class="form-label">
                                    <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?> </label>
                            </div>

                            <div class="col-12">
                                <label for="firstName" class="form-label"><b>Email:</b></label>
                                <label for="email" class="form-label"><?php echo $_SESSION['email']; ?></label>
                            </div>

                            <div class="col-12">
                                <label for="firstName" class="form-label"><b>Phone:</b></label>
                                <label for="phone" class="form-label"><?php echo $_SESSION['phone']; ?></label>
                            </div>
                        </div>

                        <ul class="list-group mb-3"></ul>
                        <li class="list-group-item d-flex justify-content-between" style="background-color: #FCF3CF" ;>
                            <div style="color:#7D6608">
                                We will contact this phone number within 15 minutes after the booking is complete.
                                If you have any questions, you can contact us later.
                            </div>
                        </li>

                        <hr class="my-4">
                        <a class="w-100 btn btn-lg btn-secondary" href="index.php">Back to Home</a>
                        <br><br>
                        <button class="w-100 btn btn-lg btn-danger" type="submit" name="reserve">Confirm
                            Booking</button>
            </form>
            <br><br>

    </div>

    <?php }; ?>
    </div>
    </main>
    </div>

    <br><br><br><br>

    <?php include 'footer.php' ?>

    <script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://getbootstrap.com/docs/5.1/examples/checkout/form-validation.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</body>

</html>