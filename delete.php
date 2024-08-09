<?php 
include "database.php";

if(isset($_GET['projectid'] )){
    $projectId = $_GET['projectid'];
    
    $sql = "Update  projects set status=0 WHERE projectId = ?";
 
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){
        
        mysqli_stmt_bind_param($stmt, "s", $projectId);
        if(mysqli_stmt_execute($stmt)){
            $_SESSION['statusp'] = "Project Deleted Successfully!";
            header('Location:detail.php');
            exit(); 
        } else {
            $_SESSION['statusd'] = "Process Failed!". mysqli_error($conn);
            header('Location: detail.php');
        }
    } else {
        die("Error preparing statement: " . mysqli_error($conn));
    }
}elseif (isset($_GET['subactivityid']) && isset($_GET['projectId'])&&isset($_GET['activityId'])&&isset($_GET['activityserial'])) {
    $subactivityId = $_GET['subactivityid'];
    $projectId = $_GET['projectId'];
    $activityId=$_GET['activityId'];
    $activitySerial=$_GET['activityserial'];

    // Delete the subactivity
    $sql = "DELETE FROM subactivity WHERE subactivityId = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $subactivityId);
        if (mysqli_stmt_execute($stmt)) {
            // Fetch the related activityId for renumbering
            $sqlGetActivityId = "SELECT activityId FROM subactivity WHERE subactivityId = ?";
            $stmtGetActivityId = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmtGetActivityId, $sqlGetActivityId)) {
                mysqli_stmt_bind_param($stmtGetActivityId, "s", $subactivityId);
                mysqli_stmt_execute($stmtGetActivityId);
                mysqli_stmt_bind_result($stmtGetActivityId, $activityId);
                mysqli_stmt_fetch($stmtGetActivityId);
                function renumberSubactivities($conn, $activityId, $activitySerial) {
                    $sql = "SELECT subactivityId FROM subactivity WHERE activityId = '$activityId' ORDER BY sub_serial_number ASC";
                    $result = mysqli_query($conn, $sql);
                    $subSerial = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $subactivityId = $row['subactivityId'];
                        $newSubSerial = $activitySerial + $subSerial / 10.0;
                        mysqli_query($conn, "UPDATE subactivity SET sub_serial_number = $newSubSerial WHERE subactivityId = $subactivityId");
                        $subSerial++;
                    }
                }
                // Renumber subactivities after deletion
                renumberSubactivities($conn, $activityId, $activitySerial);
            }

            $_SESSION['statusp'] = "Subactivity Deleted Successfully!";
            header("Location: displayactivity.php?projectId=$projectId");
            exit();
        } else {
            $_SESSION['statusd'] = "Process Failed!";
            header("Location: displayactivity.php?projectId=$projectId");
        }
    } else {
        die("Error preparing statement: " . mysqli_error($conn));
    }
} elseif (isset($_GET['activityid']) && isset($_GET['projectId'])) {
    $activityId = $_GET['activityid'];
    $projectId = $_GET['projectId'];

    // Soft delete the activity (updating the status to 0)
    $sql = "UPDATE activity SET status = 0 WHERE activityId = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $activityId);
        if (mysqli_stmt_execute($stmt)) {
            function renumberActivitiesAndSubactivities($conn, $projectId) {
                // Renumber activities
                $sql = "SELECT activityId FROM activity WHERE projectId = '$projectId' AND status=1 ORDER BY serial_number ASC";
                $result = mysqli_query($conn, $sql);
                $newSerial = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $activityId = $row['activityId'];
                    mysqli_query($conn, "UPDATE activity SET serial_number = $newSerial WHERE activityId = $activityId");
                    // Renumber subactivities
                    // renumberSubactivities($conn, $activityId, $newSerial);
                    $newSerial++;
                }
            }
            // Renumber activities and their subactivities after deletion
            renumberActivitiesAndSubactivities($conn, $projectId);

            $_SESSION['statusd'] = "Activity Deleted Successfully!";
            header("Location: displayactivity.php?projectId=$projectId");
            exit();
        } else {
            $_SESSION['statusd'] = "Process Failed!";
            header("Location: displayactivity.php?projectId=$projectId");
        }
    } else {
        die("Error preparing statement: " . mysqli_error($conn));
    }
}

?>
