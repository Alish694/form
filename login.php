<?php

session_start();


if (isset($_SESSION["user_login"]) || isset($_SESSION["user_login"]) == true) {
    header("Location: dashboard.php");
}


include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];



    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);




    // check email condition if user email is already in database 
    if (mysqli_num_rows($result) > 0) {


        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {

            $_SESSION["user_login"] = true;
            $_SESSION["username"] = $user["username"];

            
            header("Location: dashboard.php");
        } else {
            echo  '
            <div class="alert alert-danger" role="alert">
            Invalid Credanital
            </div>
            ';
        }

        echo var_dump(mysqli_fetch_assoc($result));
    } else {
        echo  '
            <div class="alert alert-danger" role="alert">
             User Not Found
            </div>
            ';
    }


    $conn->close();
}


?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .main {

            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: aliceblue;

        }

        form {
            width: 40%;
            height: 60vh;
            background-color: white;
            border-radius: 20px;
            display: flex;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            justify-content: center;
            gap: 40px;
            align-items: center;
            flex-direction: column;

        }

        .inputDiv {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
            width: 80%;
        }

        .inputDiv input {
            width: 70%;
            height: 40px;
            border-radius: 8px;
            padding: 0 5px;
            border: 1px solid gray;
            outline: none;
        }

        .inputDiv button {
            width: 40%;
            height: 40px;
            border: 8px;
            border: 1px solid gray;
            outline: none;
         
        }
    </style>
</head>

<body>


    <div class="main">

        <form action="login.php" method="POST">
            <h1>Login</h1>
            <div class="inputDiv">

                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">

                <button>Login</button>
            </div>
        </form>

    </div>














</body>

</html>












