<?php 
   if (isset($_GET['projectId'])) {
    $projectId = $_GET['projectId']; 
  }else{
    header("Location:detail.php");
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Activity and Sub-Activity</title>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<style>
    .btn{
       padding: .25rem!important;
       font-size: 12px!important;
    }
        .subactivity-row td {
            background-color: #e9f7ff!important; /* Light blue background for subactivities */
        }
        .subactivity-row td {
            padding-left: 30px!important; /* Indent subactivity rows */
        }
    </style>
<body>
<?php
    include "header.php";  ?>
    <div class="container my-5">
    <?php
   
    // Database connection parameters
    require_once "database.php";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query
    $sql = "SELECT 
    activity.projectId,
    activity.activityId, 
    activity.activityName, 
    activity.activityStartDate, 
    activity.activityEndDate, 
    activity.responsibility, 
    activity.notes, 
    subactivity.subactivityId, 
    subactivity.sactivityName, 
    subactivity.sactivityStartDate, 
    subactivity.sactivityEndDate, 
    subactivity.sresponsibility, 
    subactivity.snotes 
    FROM activity LEFT JOIN subactivity ON activity.activityId = subactivity.activityId Where activity.projectId = $projectId";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">Activity ID</th>
                        <th scope="col">Activity Name</th>
                        <th scope="col">Activity Start Date</th>
                        <th scope="col">Activity End Date</th>
                        <th scope="col">Responsibility</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            $activityId = htmlspecialchars($row['activityId']);
            $activityName = htmlspecialchars($row['activityName']);
            $activityStartDate = htmlspecialchars($row['activityStartDate']);
            $activityEndDate = htmlspecialchars($row['activityEndDate']);
            $responsibility = htmlspecialchars($row['responsibility']);
            $notes = htmlspecialchars($row['notes']);
            $subactivityId = htmlspecialchars($row['subactivityId']);
            $sactivityName = htmlspecialchars($row['sactivityName']);
            $sactivityStartDate = htmlspecialchars($row['sactivityStartDate']);
            $sactivityEndDate = htmlspecialchars($row['sactivityEndDate']);
            $sresponsibility = htmlspecialchars($row['sresponsibility']);
            $snotes = htmlspecialchars($row['snotes']);
            
            // Display the main activity row
            echo '<tr>
                    <th scope="row">' . $activityId . '</th>
                    <td>' . $activityName . '</td>
                    <td>' . $activityStartDate . '</td>
                    <td>' . $activityEndDate . '</td>
                    <td>' . $responsibility . '</td>
                    <td>' . $notes . '</td>
                    <td>
                      <button class="btn btn-primary"><a href="update_activity.php?updateid=' . $activityId . '&projectId=' . $projectId . '" style="text-decoration:none;" class="text-light">Update</a></button>
                       <button class="btn btn-danger"><a href="delete_activity.php?deleteid=' . $activityId . '" style="text-decoration:none;" class="text-light">Delete</a></button>
                        <button class="btn btn-success"><a href="subactivityform.php?activityId=' . $activityId . '" style="text-decoration:none;" class="text-light">Add SubActivity</a></button>
                    </td>
                </tr>';
            
            // Display the subactivity row if it exists
            if (!empty($subactivityId)) {
                echo '<tr class="subactivity-row">
                        <td><i class="bi bi-caret-right-fill"></i></td>
                        <td>' . $sactivityName . '</td>
                        <td>' . $sactivityStartDate . '</td>
                        <td>' . $sactivityEndDate . '</td>
                        <td>' . $sresponsibility . '</td>
                        <td>' . $snotes . '</td>
                        <td>
                            <button class="btn btn-primary btn-small">
                                <a href="update_subactivity.php?updateid=' . $subactivityId . '" style="text-decoration:none;" class="text-light">Update</a>
                            </button>
                            <button class="btn btn-danger btn-small">
                                <a href="delete_subactivity.php?deleteid=' . $subactivityId . '" style="text-decoration:none;" class="text-light">Delete</a>
                            </button>
                        </td>
                    </tr>';
            }
        }

        echo '</tbody></table>';
    } else {
        echo "No results found.";
    }

    // Close connection
    $conn->close();
    ?>
    </div>

    
  <?php include "footer.php"; ?>

</body>
</html>