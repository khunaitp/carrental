<?php include('server.php');
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $(".toggle").on("click", function() {
                if ($(".item").hasClass("active")) {
                    $(".item").removeClass("active");
                } else {
                    $(".item").addClass("active");
                }
            });
        });
    </script>
</head>

<body></body>
<nav>
    <ul class="menu">
        <img src="https://creazilla-store.fra1.digitaloceanspaces.com/cliparts/1795470/tire-clipart-sm.png" class="rotate" alt="" width="50x" height="50px">
        <h1 class="logo f flogo">NanSi</h1>
        <li class="item"><a href="index.php" class="glow-on-hover">Home</a></li>
        <li class="item"><a href="about.php" class="glow-on-hover">About</a></li>
        <?php
        if (isset($_SESSION['email'])) {
            echo '<div class="welcome">Welcome ' . $_SESSION['first_name'] . '</div>
                <li class="item"><a href="history.php">History</a></li>
                <li class="item button1"><a href="logout.php">Logout</a></li>
                <li class="toggle"><span class="bars"></span></li>';
        } elseif (isset($_SESSION['admin']) && isset($_SESSION['admin_email'])) {
            echo '<div class="welcome">Welcome Admin ' . $_SESSION['admin_email'] . '</div>
                <li class="item button"><a href="admin_page.php">Admin</a></li>
                <li class="item button1"><a href="logout.php">Logout</a></li>
                <li class="toggle"><span class="bars"></span></li>';
        } else {
            echo '<li class="item button"><a href="login.php">Log In</a></li>
            <li class="item button secondary"><a href="register.php">Sign Up</a></li>
            <li class="toggle"><span class="bars"></span></li>';
        }
        ?>
    </ul>
</nav>
</body>

</html>