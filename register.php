<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SignUp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/registerstyle.css">
</head>

<body>
    <a href="index.php">
        <button class="button1">
            <div class="shadow"></div>
            <div class="edge"></div>
            <div class="front bt">Home</div>
        </button>
    </a>

    <div class="signup-form">
        <form action="register_db.php" method="post">
            <h2>Sign Up</h2>
            <p>Please fill in this form to create an account!</p>
            <hr>
            <div class="form-group">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="myFirstname" placeholder="First Name"
                            required></div>
                    <div class="col"><input type="text" class="form-control" name="myLastname" placeholder="Last Name"
                            required></div>
                </div>
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" name="myPhone" placeholder="Phone" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="myEmail" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password_1" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password_2" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="reg_user" class="button2 arrow">Sign Up</button>
            </div>
            <div class="hint-text">Already have an account? <a href="login.php">Login here</a></div>
        </form>

    </div>

</body>

</html>