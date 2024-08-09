<?php
include "database.php";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize variables
$activityId = "";
$activityName = "";
$activityStartDate = "";
$activityEndDate = "";
$responsibility = "";
$notes = "";
$projectId = "";

// Check if updateid is set in the URL
if (isset($_GET['updateid'])) {
    $activityId = $_GET['updateid'];
    $projectId=$_GET['projectId'];
  
    
    
    // Fetch the record based on updateid
    $sql = "SELECT * FROM activity WHERE activityId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $activityId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Assign fetched values to variables
        $activityName = $row['activityName'];
        $activityStartDate = $row['activityStartDate'];
        $activityEndDate = $row['activityEndDate'];
        $responsibility = $row['responsibility'];
        $notes = $row['notes'];
       // $projectId = $row['projectId'];
    } else {
        echo "<div class='alert alert-danger'>No record found for the given ID.</div>";
    }
}

// Check if the form is submitted

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Update Activity Record</title>
</head>
<body>
<?php include("header.php"); ?>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-dark p-5 text-light rounded-4">
        <form action="config.php" method="post">
            <input type="hidden" name="activityId" value="<?php echo $activityId  ?>">
            <label for="activityName">Activity Name: </label>
            <div class="form-group">
                <input type="text" class="form-control" name="activityName" value="<?php echo htmlspecialchars($activityName); ?>" placeholder="Enter Your Activity Name:" required>
            </div>
            <label for="activityStartDate">Activity Start Date: </label>
            <div class="form-group">
                <input type="date" class="form-control" name="activityStartDate" value="<?php echo htmlspecialchars($activityStartDate); ?>" placeholder="Enter Activity Start Date:" required>
            </div>
            <label for="activityEndDate">Activity End Date: </label>
            <div class="form-group">
                <input type="date" class="form-control" name="activityEndDate" value="<?php echo htmlspecialchars($activityEndDate); ?>" placeholder="Enter Activity End Date:" required>
            </div>
            <label for="responsibility">Responsible Person Name: </label>
            <div class="form-group">
                <input type="text" class="form-control" name="responsibility" value="<?php echo htmlspecialchars($responsibility); ?>" placeholder="Enter Responsible Person Name:" required>
            </div>
            <label for="notes">Notes: </label>
            <div class="form-group">
                <textarea class="form-control" name="notes" placeholder="Enter Your Notes:" required><?php echo htmlspecialchars($notes); ?></textarea>
            </div>
            <input type="hidden" name="projectId" value="<?php echo htmlspecialchars($projectId); ?>">
            <div style="display:flex; flex-direction: row; align-items: center; justify-content: center;">
                <div class="form-btn">
                    <input style="width: 150px;" type="submit" class="btn btn-primary" value="Update" name="updateactivity">
                </div>
                <!-- <div class="form-btn">
                    <a style="width: 150px;" class="btn btn-primary" href="displayactivity.php">Details</a>
                </div> -->
            </div>
        </form>
        </div>
        </div>
    </div>
</body>
</html>

