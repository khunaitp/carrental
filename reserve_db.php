<?php
    include('server.php');

    if(isset($_POST['reserve'])){
        $customer_id = $_POST['customer_id'];
        $id = $_GET['rent'];
        $pickup_date = $_POST['pickup_date'];
        $drop_date = $_POST['drop_date'];
        $amount = $_POST['amount'];

        if(empty($pickup_date) || empty($drop_date)){
            $message[] = 'please fill out all';
         }else{
            $insert = "INSERT INTO rental(customer_id, car_id, amount, pickup_date, drop_date) 
                        VALUES('" . $customer_id . "','"  . $id . "','"  . $amount . "','"  . $pickup_date . "','"  . 
                        $drop_date. "')";

            mysqli_query($conn, $insert);

            $update = "UPDATE car SET car_status = 1 WHERE id = '" . $id . "'";
            mysqli_query($conn, $update);

            header("location: index.php");
         }
    }
    
?>