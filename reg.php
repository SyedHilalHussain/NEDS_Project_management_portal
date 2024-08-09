<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b494b1;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            margin: 0;
            padding: 0;
        }

        .upperbox {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: rgba(47, 46, 51, 1);
            position: relative;
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
            border-radius: 5px;
            height: 35px;
            width: 35px;
            background-color: rgb(143, 157, 201);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            width: 90%;
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid black;
            box-shadow: 0 0 10px #3a082f;
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
            padding: 5px 0;
            margin-top: auto;
        }

        .footer-content {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .footer-icons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-bottom: 5px;
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

            .logout-btn .material-icons {
                height: 30px;
                width: 30px;
                font-size: 24px;
            }

            .form-container {
                padding: 15px;
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
					
    if(isset($_SESSION['statusp'])){
    
    echo "<div class='alert alert-primary my-3 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
    .$_SESSION['statusp']."</div>";
    unset($_SESSION['statusp']);
    }
    if(isset($_SESSION["statusd"])){
    
    echo "<div class='alert alert-danger my-3 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
    .$_SESSION['statusd']."</div>";
    unset($_SESSION['statusd']);
                                    }
    ?>
    <div class="form-container">
        <h1>Create Your Account</h1>
        <form action="registrationcode.php" method="POST" class="form">
            <h3>Name</h3>
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <h3>Email</h3>
            <input type="text" name="email" id="email" placeholder="Enter your email" required>
            <h3>Password</h3>
            <input type="password" name="pass" id="password" placeholder="Enter your password" required>
            <h3>Confirm Password</h3>
            <input type="password" name="conpass" id="confirm_password" placeholder="Confirm your password" required>
            <p>Already registered? <a style="display: inline;" href="login.php"><i>Login Here</i></a></p>
            <div class="d-flex justify-content-center">   <input type="submit" value="Sign Up" name="signup"></div>
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



    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="./assets/js/script.js?v=<?php echo $version ?>"></script>
  <script type="text/javascript" src="./assets/js/jquery-3.6.0.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>

</body>
</html>
