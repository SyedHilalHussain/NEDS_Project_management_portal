<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity</title>
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
<body>
    <?php include "header.php"; ?>
    <?php
    require_once "database.php"; // Make sure this file contains the database connection code

    if (isset($_GET['projectId'])) {
        $projectId = $_GET['projectId'];

       
    } else {
        die("projectId is required");
    }
    ?>    

    <div class="form-container">
        <h1>Add Activity</h1>
        <form action="config.php" method="POST" class="form">
            <h3>Activity Name</h3>
            <input type="hidden" name="projectId" value="<?php echo $projectId;  ?>" >
            <input type="text" name="activityName" id="activityName" placeholder="Enter activity name" required>
            <h3>Activity Start Date</h3>
            <input type="date" name="activityStartDate" id="activityStartDate" placeholder="Enter start date" required>
            <h3>Activity End Date</h3>
            <input type="date" name="activityEndDate" id="activityEndDate" placeholder="Enter end date" required>
            <h3>Responsible Person Name</h3>
            <input type="text" name="responsibility" id="responsibility" placeholder="Enter Responsible Person Name" required>
            <h3>Notes</h3>
            <textarea cols="40" rows="3" placeholder="Enter your notes" name="notes" id="notes"></textarea>
           <div class="d-flex justify-content-center"> <input style="display: center;" type="submit" value="Submit" name="addactivity">
            <!-- <input style="display: inline;" class="btn btn-primary" type="button" value="Details" onclick="renderpage();"> -->
            </div>
        </form>
    </div>

    <?php include "footer.php"; ?>
   
    

    <script>
    // function renderpage(){
    //     window.location.href = "displayactivity.php"; 
    // }
</script>
</body>
</html>
