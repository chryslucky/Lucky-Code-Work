<?php
session_start();
include "connection.php";

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: add.php");
    exit();
}

$username = $_SESSION['user'];
$email = $_SESSION['email'];
$id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User (<?php echo htmlspecialchars($username); ?>) Dashboard</title>
    <link rel="icon" href="image.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
              font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
              background: linear-gradient(135deg, aliceblue, blue);

              background-attachment: fixed;
              display: flex;
              flex-direction: column;
           animation: gradient 0.3s ease infinite;
}

@keyframes gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(135deg, rgb(72, 112, 246), rgb(101, 35, 208));
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 20px;
        }
        .sidebar h2 {
            margin-bottom: 30px;
            font-size: 22px;
            text-align: center;
            color:rgb(93, 255, 223);
        }
       
        .sidebar a {
            display: block;
            color: #ecf0f1;
            text-decoration: none;
            padding: 15px 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            transition: background 0.2s;
            font-weight: bolder;
            letter-spacing: 1px;
            font-size: 18px;
        }
        .sidebar a:hover {
            background:rgb(24, 50, 77);
        }
        .sidebar i {
            margin-right: 10px;
        }

        /* Logout Form */
        .logout-form {
            display: inline;
        }
        
        /* Logout Button */
        .logout-btn {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 10px 10px;
            background-color: aqua;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
            text-align: center;
            justify-content: center;
            margin-top: 20px;
            font-weight: bolder;
            letter-spacing: 1px;
        }
        
        .logout-btn:hover {
            background-color: #1abc9c;
            transform: scale(1.02);
            color: white;
        }
        
        
        .logout-btn img {
            width: 30px;
            height: 30px;
            border-radius: 4px;
        }

        /* Main Content */
        .main {
            margin-left: 250px;
            padding: 40px;
            flex: 1;
        }

        .main h1 {
            font-size: 32px;
            color: #2c3e50;
            margin-bottom: 20px;
            display: flex;
            gap: 20px;
        }
        .main h1 p{
            color: blue;
            font-size: 35px;
            position: relative;
        }

        .profile-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .profile-card h2 {
            color: #333;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main {
                margin-left: 0;
                padding: 20px;
            }
            .logout-btn {
                padding: 12px 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>My Dashboard</h2>
        <a href="#"><i class="fas fa-home"></i> Dashboard</a>
        <a href="#"><i class="fas fa-user"></i> Profile</a>
        <a href="#"><i class="fas fa-cog"></i> Settings</a>
        
        <form action="logout.php" method="post" class="logout-form">
            <button type="submit" class="logout-btn">
                <img src="icons8-logout.gif" alt="Logout Icon">
                <span>Logout</span>
            </button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main">
        <h1>Welcome, <p><?php echo htmlspecialchars($username); ?> 👋</p></h1>

        <div class="profile-card">
            <h2>Your Profile</h2>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Status:</strong> Logged In</p>
            
        </div>
    </div>
</body>
</html>