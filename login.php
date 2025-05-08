<?php
session_start();
include "connection.php";

if (isset($_POST['btn'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];

    if (!$uname || !$password) {
        $_SESSION['error'] = "Username and password are required.";
        header("Location: add.php");
        exit();
    }

    // Simple query instead of prepared statement (Consider using prepared statements for better security)
    $result = $conn->query("SELECT id, username, email, password FROM customers WHERE username = '$uname'");

    if ($result && $row = $result->fetch_assoc()) {
        // Use password_verify() instead of re-hashing the password
        if (password_verify($password, $row['password'])) {
            
            session_regenerate_id(true);

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['logged_in'] = true;
            unset($_SESSION['error']);

            header("Location: dash.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid username or password.";
        }
    } else {
        $_SESSION['error'] = "User not found.";
    }

    header("Location: add.php");
    exit();
}
?>