<?php
include 'connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        
   
        $name = mysqli_real_escape_string($conn, trim($_POST['name']));
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $password = mysqli_real_escape_string($conn, $_POST['password']);

       
        if (empty($name) || empty($email) || empty($password)) {
            die("All fields are required!");
        }

      
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format!");
        }

       
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
          
            $stmt->bind_param("sss", $name, $email, $hashed_password);

           
            if ($stmt->execute()) {
            
                header("Location: login.php");
                exit();
            } else {
               
                die("Error: " . $stmt->error);
            }
            $stmt->close();
        } else {
           
            die("Error: " . $conn->error);
        }

       
        $conn->close();
    } else {
        die("All fields are required!");
    }
}
?>
