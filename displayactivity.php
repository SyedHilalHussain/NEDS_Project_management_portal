<?php
session_start();
require "validatelogin.php";
require_once "database.php";

if (isset($_GET['projectId'])) {
    $projectId = $_GET['projectId'];
    $uservalidate=mysqli_fetch_assoc(mysqli_query($conn,"SELECT user_id FROM projects WHERE projectId = '$projectId'"));

    if(isset($_SESSION['user_id'])&& ($_SESSION['user_id']!=$uservalidate['user_id'])){
        header("Location:logout.php");
    }
    $sqlprojectname = "SELECT projectName FROM projects WHERE projectId = $projectId";
    $row = mysqli_query($conn, $sqlprojectname);
    $projectname = mysqli_fetch_assoc($row);
} else {
    header("Location:logout.php");
    exit;
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
    <style>
        .btn {
            padding: .25rem !important;
            font-size: 12px !important;
        }

        .subactivity-row td {
            background-color: #e9f7ff !important;
            /* Light blue background for subactivities */
        }

        .subactivity-row td {
            padding-left: 30px !important;
            /* Indent subactivity rows */
        }
    </style>
</head>

<body>
    <?php include "header.php";

    ?>
    <div class="container my-5">
        <div class="row  text-center">
            <div>
                <h2> <?php echo $projectname['projectName'] ?></h2>
            </div>
        </div>
        <?php

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query
        $sql = "SELECT 
    activity.projectId,
    activity.activityId,
    activity.status,
    activity.serial_number, 
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
    subactivity.sub_serial_number,
    subactivity.snotes 
    FROM activity 
    LEFT JOIN subactivity 
    ON activity.activityId = subactivity.activityId 
    WHERE activity.projectId = '$projectId' and activity.status=1";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $activities = [];

            while ($row = mysqli_fetch_assoc($result)) {
                $activityId = $row['activityId'];

                if (!isset($activities[$activityId])) {
                    $activities[$activityId] = [
                        'projectId' => $row['projectId'],
                        'activityId' => $row['activityId'],
                        'activityName' => $row['activityName'],
                        'activityStartDate' => $row['activityStartDate'],
                        'activityEndDate' => $row['activityEndDate'],
                        'responsibility' => $row['responsibility'],
                        'notes' => $row['notes'],
                        'serial_number' => $row['serial_number'],
                        'subactivities' => []
                    ];
                }

                if ($row['subactivityId']) {
                    $activities[$activityId]['subactivities'][] = [
                        'subactivityId' => $row['subactivityId'],
                        'sactivityName' => $row['sactivityName'],
                        'sactivityStartDate' => $row['sactivityStartDate'],
                        'sactivityEndDate' => $row['sactivityEndDate'],
                        'sresponsibility' => $row['sresponsibility'],
                        'snotes' => $row['snotes'],
                        'sub_serial_number' => $row['sub_serial_number'],
                    ];
                }
            }

            echo '<table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">Sequence</th>
                    <th scope="col">Activity/Subactivity Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Responsibility</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            
            <tbody>
             ';

            $activity_sequence = 0;

            foreach ($activities as $activity) {
                $activity_sequence++;
                echo '<tr>
                <th scope="row">' . $activity_sequence . '</th>
                <td>' . htmlspecialchars($activity['activityName']) . '</td>
                <td>' . htmlspecialchars($activity['activityStartDate']) . '</td>
                <td>' . htmlspecialchars($activity['activityEndDate']) . '</td>
                <td>' . htmlspecialchars($activity['responsibility']) . '</td>
                <td>' . htmlspecialchars($activity['notes']) . '</td>
                <td>
                    <button class="btn btn-primary"><a href="update_activity.php?updateid=' . $activity['activityId'] . '&projectId=' . $activity['projectId'] . '" style="text-decoration:none;" class="text-light">Update</a></button>
                    <button class="btn btn-danger"><a href="delete.php?activityid=' . $activity['activityId'] . '&projectId=' . $activity['projectId'] . '" style="text-decoration:none;" class="text-light">Delete</a></button>
                    <button class="btn btn-success"><a href="subactivityform.php?activityId=' . $activity['activityId'] . '&projectId=' . $activity['projectId'] . '" style="text-decoration:none;" class="text-light">Add SubActivity</a></button>
                </td>
            </tr>';

                $subactivity_sequence = 0;

                foreach ($activity['subactivities'] as $subactivity) {
                    $subactivity_sequence++;
                    $full_sequence = $activity_sequence . '.' . $subactivity_sequence;

                    echo '<tr class="subactivity-row">
                    <td>' . $full_sequence . '</td>
                    <td>' . htmlspecialchars($subactivity['sactivityName']) . '</td>
                    <td>' . htmlspecialchars($subactivity['sactivityStartDate']) . '</td>
                    <td>' . htmlspecialchars($subactivity['sactivityEndDate']) . '</td>
                    <td>' . htmlspecialchars($subactivity['sresponsibility']) . '</td>
                    <td>' . htmlspecialchars($subactivity['snotes']) . '</td>
                    <td>
                        <button class="btn btn-primary btn-small"><a href="update_subactivity.php?subactivityId=' . $subactivity['subactivityId'] . '&projectId=' . $activity['projectId'] . '&activityId='.$activity['activityId'].'" style="text-decoration:none;" class="text-light">Update</a></button>
                        <button class="btn btn-danger btn-small"><a href="delete.php?subactivityid=' . $subactivity['subactivityId'] . '&projectId=' . $activity['projectId'] . '&activityId='.$activity['activityId'].'&activityserial='.$activity['serial_number'].'" style="text-decoration:none;" class="text-light">Delete</a></button>
                      </td>
                </tr>';
                }
            }

            echo '

                  <tr> <td colspan="7" center><button class="btn btn-success"><a href="activity.php?projectId=' . $projectId . '" style="text-decoration:none;" class="text-light">Add Activity</a></button></td></tr>
      
            </tbody></table>';
        } else {
            echo "<tr>No results found</tr>";
        }

        // Close connection
        $conn->close();
        ?>

    </div>
    <?php include "footer.php"; ?>
</body>

</html>