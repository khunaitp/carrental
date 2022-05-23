<?php
session_start();
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="https://getbootstrap.com/docs/5.1/examples/sign-in/signin.css" rel="stylesheet">
    <link rel="icon" href="https://creazilla-store.fra1.digitaloceanspaces.com/cliparts/1795470/tire-clipart-sm.png">
    <title>login</title>

</head>

<body>
    <a href="index.php">
        <button class="button1">
            <div class="shadow"></div>
            <div class="edge"></div>
            <div class="front bt">Home</div>
        </button>
    </a>

    <div class="text-center container body1">
        <main class="form-signin">
            <h1 class="bt"><br>Sign In</h1>
            <form action="login_db.php" method="POST">
                <!-- <//?php if (isset($_SESSION['error'])) : ?>
                <div class="error">
                    <h3></h3>
                        <? //php 
                        //echo $_SESSION['error'];
                        //unset($_SESSION['error']);
                        ?>
                    </h3>
                </div>
              <?php //endif 
                ?> -->
                <div class="form-floating">
                    <input type="email" class="form-control" id="myEmail" name="myEmail" placeholder="name@example.com">
                    <label for="floatingInput bt">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="myPassword" name="myPassword" placeholder="Password">
                    <label for="floatingPassword bt">Password</label>
                </div>
                <?php
                if (isset($_SESSION['error'])) {
                    foreach ($_SESSION['error'] as $errors) {
                        echo '<div class="error">' . $errors . '</div>' . "\n";
                    }
                    session_destroy();
                }
                ?>
                <br>
                <button class="button2 bt arrow" type="submit" name="signin">Sign in</button>
            </form>
            <p class="fs-5 text-muted">
            </p>
            <div class="hint-text">Don't have an account? <a href="register.php">Sign up</a></div>
        </main>
    </div>
</body>

</html>