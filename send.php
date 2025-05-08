<?php
include "connection.php";
session_start();

if (isset($_POST['btn_signup'])) {
    $name = $_POST['fullname'];
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Simple validation
    if (!$name || !$uname || !$email || !$password || !$cpassword) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: add.php");
        exit();
    }

    // Check username existence
    $result = $conn->query("SELECT username FROM customers WHERE username = '$uname'");
    if ($result && $result->num_rows > 0) {
        $_SESSION['error'] = "Username already exists!";
        header("Location: add.php");
        exit();
    }

    // Simple password match check
    if ($password !== $cpassword) {
        $_SESSION['error'] = "Passwords do not match.";
        header("Location: add.php");
        exit();
    }

    // No password hashing for simplicity
    $sql = "INSERT INTO customers (fullname, username, email, password) VALUES ('$name', '$uname', '$email', '$password')";

    if ($conn->query($sql)) {
        $_SESSION['success'] = "Registration successful!";
        header("Location: add.php");
        exit();
    } else {
        $_SESSION['error'] = "Registration failed.";
        header("Location: add.php");
        exit();
    }
}
?>
