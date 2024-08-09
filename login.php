

<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b494b1;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
        }

        .logo {
            height: 40px; /* Adjust as needed */
        }

        .profileh {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            text-align: center;
            flex: 1; /* Allows this to grow and take available space */
        }

        .logout-btn {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
        }

        .logout-btn .material-icons {
            height: 35px;
            width: 35px;
            background-color: rgb(143, 157, 201);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }

        .form-container {
            width: 90%;
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid black;
            box-shadow: 0 0 10px #3a082f;
            flex: 1;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #3a082f;
        }

        .form-container h3 {
            margin-bottom: 10px;
            color: #3a082f;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #3a082f;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background-color: #e573bb;
        }

        .form-container a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto; /* Pushes footer to the bottom */
        }

        .footer-content {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-icons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .footer-icons a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 16px;
        }

        .footer-icons a:hover {
            color: #e573bb;
        }

        .footer-icons span,
        .footer-icons i {
            font-size: 20px;
        }

        @media (max-width: 600px) {
            .profileh {
                font-size: 1.5rem;
            }

            .form-container {
                padding: 15px;
            }

            .footer-content {
                text-align: center;
            }

            .footer-icons {
                flex-direction: column;
                align-items: center;
            }

            .footer-icons a {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
   <?php include "header.php";   ?>
    <?php
					
		
    if(isset($_SESSION["statusd"])){
    
    echo "<div class='alert alert-danger my-3 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
    .$_SESSION['statusd']."</div>";
    unset($_SESSION['statusd']);
    }
    if(isset($_SESSION["statusp"])){
    
    echo "<div class='alert alert-primary my-3 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
    .$_SESSION['statusp']."</div>";
    unset($_SESSION['statusp']);
    }
    ?>
    <div class="form-container">
        <h1>Sign in</h1>
        <form action="./config.php" method="POST" class="form">
            <h3>Email</h3>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <h3>Password</h3>
            <input type="password" name="pass" id="password" placeholder="Enter your password" required>
            <p>Not registered yet? <a style="display: inline;" href="reg.php"><i>Register Here</i></a></p>
           <div class="d-flex justify-content-center"> <input type="submit" value="Login" name="login"></div>
        </form>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-icons">
                <a href="https://www.facebook.com" target="_blank">
                    <span class="material-icons">facebook</span> Facebook
                </a>
                <a href="https://www.instagram.com" target="_blank">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
                <a href="https://www.website.com" target="_blank">
                    <span class="material-icons">public</span> Website
                </a>
                <a href="mailto:email@example.com">
                    <span class="material-icons">email</span> Email
                </a>
            </div>
            <p>Your website All Rights Reserved</p>
        </div>
    </footer>
</body>
</html>
