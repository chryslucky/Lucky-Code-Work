<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Now || Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="image.png" type="image/png">
</head>
<body>
<?php
session_start(); 

if (isset($_SESSION['error'])) {
    echo "<p class='error-message'>Ooops! " . htmlspecialchars($_SESSION['error']) . "</p>";
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo "<p class='success-message'>" . htmlspecialchars($_SESSION['success']) . "</p>";
    unset($_SESSION['success']);
}
?>

<div class="container">
    <form action="login.php" method="post" id="loginform">
        <h2><img src="image.png" width="40px" height="40px" style="box-shadow: 0px 3px 10px white; border-radius: 7px; background: white;" alt="" id="img" onclick="document.location.href='add.php'"> Login Now</h2>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter Username:">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter Password:" autocomplete="off"><br><br>

        <button type="submit" name="btn">Login <img src="1.gif" alt="Icon"></button>
        <p>Don't have an account? <a href="#" id="showSignup">Sign Up</a></p>
    </form>

    <form action="send.php" method="post" id="signupform" class="hidden">
        <h2>Sign Up</h2>

        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" placeholder="Enter Your Full Name:">

        <label for="username_signup">Username:</label>
        <input type="text" id="username_signup" name="username" placeholder="Enter Your Username:">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email:">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter Your Password:">

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="cpassword" placeholder="Confirm Your Password:" autocomplete="off"><br><br>

        <p>Already have an account? <a href="#" id="showLogin">Back to Login</a></p><br>
        <button type="submit" name="btn_signup">Register <img src="guest-book.gif" alt="Icon"></button>
    </form>
</div>

<script src="script.js"></script>

</body>
</html>
