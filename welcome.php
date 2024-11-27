<?php
session_start();

if (isset($_SESSION['user_id']) == true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
      body {
    display: flex; 
    flex-direction: column; 
    justify-content: center;
    align-items: center; 
    height: 100vh;
    margin: 0; 
    font-family: Arial, sans-serif; 
    background-color: #f4f4f4; 
    text-align: center; 
}

.logout-btn {
    padding: 10px 20px; 
    background-color: #f0f0f0; 
    text-decoration: none; 
    border-radius: 5px; 
    font-size: 16px; 
    color: #333; 
    transition: background-color 0.3s ease; 
    margin-bottom: 20px; 
}
.logout-btn:hover {
    background-color: red; 
}

    </style>
</head>
<body>

    <p>You have successfully logged in.</p>
    <a href="logout.php" class="logout-btn">Logout</a>
</body>
</html>