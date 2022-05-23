<?php
  session_start();
  include ('server.php');
  $errors = array();
  if(isset($_POST['signin'])){
    $em = mysqli_real_escape_string($conn, $_POST['myEmail']);
    $pwd = mysqli_real_escape_string($conn, $_POST['myPassword']);
    if (empty($em)) {
      array_push($errors, "Please enter your email");
      $_SESSION['error'] = $errors;
      header("location: login.php");
    }
    if (empty($pwd)) {
        array_push($errors, "Please enter your password");
        $_SESSION['error'] = $errors;
        header("location: login.php");
    }
    if(count($errors) == 0){
      $sqladmin =  "SELECT * FROM user_admin WHERE admin_email='$em' AND admin_password = '$pwd'";
      $result1 = mysqli_query($conn, $sqladmin);
      $numRow1 = mysqli_num_rows($result1);
      $sql = "SELECT * FROM customer WHERE email='$em' AND user_password = '$pwd'";
      $result2 = mysqli_query($conn, $sql);
      $numRow2 = mysqli_num_rows($result2);
      if ($numRow1 == 1) {
        $row1 = mysqli_fetch_assoc($result1);
         // if(password_verify($pwd, $row['user_password'])){
              $_SESSION['admin'] = true;
              $_SESSION['admin_email'] = $em;
              $_SESSION['success'] = 'You are now Login';
              header('Location: index.php');
          //}else {
            //array_push($errors,"Username or Password wrong");
            //$_SESSION['error'] = "Username or Password wrong";
            header("location: index.php");
          //}
      }elseif($numRow2 == 1){
        $row2 = mysqli_fetch_assoc($result2);
        // if(password_verify($pwd, $row['user_password'])){
             $_SESSION['email'] = $em;
             $_SESSION['success'] = 'You are now Login';
             $_SESSION['customer_id'] = $row2['customer_id'];
             $_SESSION['first_name'] = $row2['first_name'];
             $_SESSION['last_name'] = $row2['last_name'];
             $_SESSION['phone'] = $row2['phone'];
             header('Location: index.php');
         //}else {
           //array_push($errors,"Username or Password wrong");
           //$_SESSION['error'] = "Username or Password wrong";
           header("location: index.php");
         //}
      }
      else {
        array_push($errors,"Username or Password wrong");
        $_SESSION['error'] = $errors;
        header("location: login.php");
      }
    }
  }
