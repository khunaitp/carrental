<?php
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['reg_user'])) {
        $myFirstname = mysqli_real_escape_string($conn, $_POST['myFirstname']);
        $myLastname = mysqli_real_escape_string($conn, $_POST['myLastname']);
        $myPhone = mysqli_real_escape_string($conn, $_POST['myPhone']);
        $myEmail = mysqli_real_escape_string($conn, $_POST['myEmail']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if (empty($myFirstname)) {
            array_push($errors, "Please enter your firstname");
        }
        if (empty($myLastname)) {
            array_push($errors, "Please enter your lastname");
        }
        if (empty($myPhone)) {
            array_push($errors, "Please enter your phone number");
        }
        if (empty($myEmail)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match.");
        }

        //เช็คว่ามีuserนี้ในระบบรึยัง
        $user_check_query = "SELECT * FROM customer WHERE email = '" . $myEmail. "'";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result) { //user exists
            if ($result['myEmail'] === $myEmail) {
                array_push($errors, "This account already exists");
            }
        }
        //no errors, then add new user
        if (count($errors) == 0) {
            //$options = array("cost"=>4);
            //$hashPassword = password_hash($password_1,PASSWORD_BCRYPT,$options);
            $sql = "INSERT INTO customer (first_name, last_name, phone, email, user_password) VALUES ('" .
                   $myFirstname . "','" . $myLastname . "','" . $myPhone . "','"  . $myEmail . "','" .  $password_1 . "')";
            echo $sql;
            mysqli_query($conn, $sql);

            //$_SESSION['email'] = $myEmail;
            header('location: login.php'); //redirect ไป login
        }
    }
?>