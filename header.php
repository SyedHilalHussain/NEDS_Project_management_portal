<?php

$version = 41;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Voting Software</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image" href="logo.png">
  <link rel="stylesheet" href="assets/css/intake.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
        a{
          text-decoration: none;
          color: #333;
        }
        .nav-link{
            text-decoration: none;
            color: white;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: rgba(47, 46, 51, 1);
            flex-wrap: wrap;
        }

        .logo {
            height: 40px; /* Adjust as needed */
        }

        .nav-links {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
            color: white;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nav-links a:hover {
            color: #e573bb;
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
            max-width: 500px;
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
        .form-container input[type="date"],
        .form-container input[type="password"],
        .form-container textarea {
            width: calc(100% - 20px);
            padding: 13px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-container textarea {
            width: 95%;
            resize: vertical;
        }

        .form-container input[type="submit"] {
            width: 48%;
            display: inline;
            padding: 10px;
            background-color: #3a082f;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-container input[type="button"] {
            display: inline;
            width: 48%;
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
        .form-container input[type="button"]:hover {
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
            .logo {
                height: 30px;
            }

            .nav-links {
                flex-direction: column;
                gap: 10px;
            }

            .nav-links a {
                font-size: 14px;
                gap: 3px;
            }

            .logout-btn .material-icons {
                height: 10px;
                width: 10px;
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
                font-size: 14px;
                gap: 3px;
            }

            .footer-icons span,
            .footer-icons i {
                font-size: 18px;
            }
        }
    </style>
</head>

<div class="container-fluid my-0 w-100 px-0">
    <header class=" header my-0 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3  border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
      <img src="transparent new logo NED (1).png" width="60px" alt="Logo" class="logo">
       
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
                <span class="material-icons">home</span> Home
            </a>  </li>
        <li class="nav-item">
        <a class="nav-link" href="https://www.information.com">
                <i class="material-icons">info</i> About us
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="https://www.website.com">
                <span class="material-icons">settings</span> Services
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="mailto:email@example.com">
                <span class="material-icons">phone</span> Contact
            </a>
        </li>
      </ul>

     

      <?php  if(isset($_SESSION["email"])&&isset($_SESSION["name"]) ){ ?>
        <div class="col-md-2  justify-content-center align-items-center text-end"> <h6 class="text-light mb-0"><?php echo $_SESSION['name']   ?></h6></div>
        <div class="col-md-1  text-start">
        <button type="button" class="btn btn-outline-primary me-2"> <a href="logout.php" class="logout-btn">
            Logout
        </a></button>
        </div>
        <?php  } else { ?>
            <div class="col-md-3 text-end">
            <button type="button" class="btn btn-primary"> <a href="login.php" class="logout-btn">
          Log In
        </a></button>
        </div>
            <?php } ?>
       
       
     
    </header>
  </div>


</html>