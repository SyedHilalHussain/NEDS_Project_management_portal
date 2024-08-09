<?php session_start();
require_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
            padding: 10px 10px;
            background-color: rgba(47, 46, 51, 1);
            flex-wrap: wrap;
        }

        .logo {
            height: 40px;
            /* Adjust as needed */
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

        .background-container {
            position: relative;
            width: 100%;
            height: 400px;
            /* Adjust height as needed */
            background-image: url('data:image/jpeg;base64,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');
            background-size: cover;
            background-position: center;
            opacity: 0.7;
        }

        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .background-overlay h4,
        .background-overlay h2 {
            margin: 0;
        }

        .background-overlay h4 {
            display: grid;
            place-items: center;

            text-align: center;
            font-family: "Montserrat", sans-serif;
            text-transform: uppercase;
            font-size: 50px;
            -webkit-text-fill-color: transparent;
            -webkit-text-stroke: 4px rgb(23, 1, 18);
            margin: 1%;
        }

        .background-overlay h2 {
            display: grid;
            place-items: center;
            font-size: 30px;
            color: black;

            display: inline;
            padding: auto;
        }



        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
            /* Pushes footer to the bottom */
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

        .box {


            border: 2px solid #333;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #efdee7;
            box-shadow: 0 3px 7px rgba(0, 0, 0, 0.1);
            transition: transform 0.5s, box-shadow 0.5s;
            margin: 3%;
            padding: 2%;
        }

        .box img {
            width: 400px;
            height: 200px;
        }

        .box p {
            margin-top: 20px;
            font-size: 1.2em;
            color: #333;
        }

        .box:hover {
            transform: scale(1.1);
            box-shadow: 0 3px 7px rgba(0, 0, 0, 0.2);
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-30px);
            }

            60% {
                transform: translateY(-15px);
            }
        }

        .box:hover {
            animation: bounce 1s;
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

    <div class="background-container  container-fluid">
        <div class="background-overlay row">
            <div class="col-md-10">
                <h4>Welcome</h4>
                
                <div style="text-align: center;justify-content: center;" class="details">
                    <?php if (isset($_SESSION["email"]) && isset($_SESSION['user_id'])) {
$userid = $_SESSION['user_id'];
                        $sql = "Select * from projects where status=1 and user_id=$userid";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0) {
                         ?>
                        <div class="table-responsive">
                        <h2><b>Your Projects</b></h2>
                            <table class="table table-light border">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Project ID</th>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Team Leader</th>
                                        <th scope="col">Team Member</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col" colspan="3">Operations</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $projectId = $row['projectId'];
                                            $projectName = $row['projectName'];
                                            $teamLeader = $row['teamLeader'];
                                            $teamMember = $row['teamMember'];
                                            $description = $row['description'];
                                            $startDate = $row['startDate'];
                                            $endDate = $row['endDate'];

                                            echo '<tr>
                     <th scope="row">' . $projectId . '</th>
                     <td><a href="displayactivity.php?projectId=' . $projectId . '">' . $projectName . '</a></td>
                     <td><a href="displayactivity.php?projectId=' . $projectId . '">' . $teamLeader . '</a></td>
                     <td><a href="displayactivity.php?projectId=' . $projectId . '">' . $teamMember . '</a></td>
                     <td><a href="displayactivity.php?projectId=' . $projectId . '">' . $description . '</a></td>
                     <td><a href="displayactivity.php?projectId=' . $projectId . '">' . $startDate . '</a></td>
                     <td><a href="displayactivity.php?projectId=' . $projectId . '">' . $endDate . '</a></td>
                     <td><button class="btn btn-primary"><a href="update.php?updateid=' . $projectId . '" style="text-decoration:none;" class="text-light">Update</a></button></td>
                     <td><button class="btn btn-danger"><a href="delete.php?projectid=' . $projectId . '" style="text-decoration:none;" class="text-light">Delete</a></button></td>
                   
                     </tr>';
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <?php  } ?>
                        <h2>Add Project</h2>
                        <a style="display: inline;" href="addproject.php">
                            <span style="background-color: #859eb9; border-radius: 5px;" class="material-icons">add</span>
                        </a>
                    <?php     }  ?>
                </div>
            </div>
        </div>
    </div>
    <h2>Some Popular Projects</h2>
    <div class="content">
        <div style="display: flex; margin: 2%;" class="section1">
            <div class="box">
                <img src="data:image/jpeg;base64,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" alt="Image 1">
                <h3>Design and Optimization of Explainable Neuromorphic Hardware for Edge Computing</h3>
                <p>This project, led by Alishba Masood under the supervision of Dr. Muhammad Khurram in the Computer & Information Systems Engineering department, focuses on creating neuromorphic hardware that can perform edge computing tasks efficiently. The research emphasizes making the hardware's decision-making process transparent and explainable, which is crucial for understanding and trusting AI systems in real-time applications.</p>
            </div>
            <div class="box">
                <img src="data:image/jpeg;base64,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" alt="Image 2">
                <h3>Investigation for the Effect of Welding Parameters on Joint Strength Fabricated by Friction Stir Welding Process</h3>
                <p>Engr. Assad Anis, under the guidance of Dr. Muhammad Shakaib and Dr. Muhammad Sohail Hanif in the Mechanical Engineering department, investigates how different welding parameters impact the strength of joints created through the friction stir welding process. The study aims to optimize welding conditions to enhance joint quality and durability, offering insights into the mechanical properties of welded materials.</p>
            </div>
        </div>
        <div style="display: flex; margin: 2%;" class="section2">
            <div class="box">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPSX_Dcn_ZuQrTFwxA-M6zJI7eKDvJCE2EUQ&s" alt="Image 3">
                <h3>Development and Performance Evaluation of Li-Air Batteries Using MXene Based Materials for Cathodes</h3>
                <p>Engr. Zain Shahid, with the supervision of Dr. Zahoor-Ul-Hussain Awan and Faaz Dr. Ahmed Butt in the Mechanical Engineering department, explores the development of lithium-air batteries utilizing MXene-based materials for the cathodes. This research focuses on evaluating the performance and efficiency of these advanced materials, potentially leading to more efficient and durable energy storage solutions.</p>
            </div>
            <div class="box">
                <img src="data:image/jpeg;base64,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" alt="Image 4">
                <h3>Influence of Different Morphologies of Manganese-based Cathode Material for Lithium-air Batteries – An Experimental and Predictive Analysis Based Study.</h3>
                <p>This project, led by [Principal Investigator's Name] in the Mechanical Engineering department, investigates how different morphologies of manganese-based cathode materials affect the performance of lithium-air batteries. Through a combination of experimental work and predictive analysis, the study aims to identify the most efficient morphologies for enhancing battery capacity, stability, and overall performance.</p>
            </div>
        </div>
    </div>
    <section style="background-color: white;" id="cta">
        <h2>Join Our Community</h2>
        <p>Stay updated with the latest projects and news. Subscribe to our youtube channel!</p>
        <a href="https://www.youtube.com/results?search_query=nedscholars"> Subscribe now</a>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>