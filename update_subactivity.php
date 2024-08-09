<?php  session_start();     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "header.php"; ?>
    <div class="container-fluid my-5">
    <div class="row justify-content-center">
    <div class="col-md-6 bg-dark p-5 text-light rounded-4">
    <?php
					
		
                    if(isset($_SESSION["statusd"])){
                    
                    echo "<div class='alert alert-danger my-1 text-center' role='alert' style='padding: 4px; border-radius:15px;'>"
                    .$_SESSION['statusd']."</div>";
                    unset($_SESSION['statusd']);
                    }
                    if(isset($_SESSION["statusp"])){
                    
                    echo "<div class='alert alert-primary my-1 text-center' role='alert' style='padding: 4px; border-radius:15px;'>"
                    .$_SESSION['statusp']."</div>";
                    unset($_SESSION['statusp']);
                    }
                    ?>
    <?php
    require_once "database.php"; // Make sure this file contains the database connection code
   
   
    if (isset($_GET['subactivityId']) && isset($_GET['activityId'])&&isset($_GET['projectId'])) {
        $subactivityId = $_GET['subactivityId'];
        $activityId=$_GET['activityId'];
        $projectId=$_GET['projectId'];
      
        
        
        // Fetch the record based on updateid
        $sql = "SELECT * FROM subactivity WHERE subactivityId = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $subactivityId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Assign fetched values to variables
            $sactivityName = $row['sactivityName'];
            $sactivityStartDate = $row['sactivityStartDate'];
            $sactivityEndDate = $row['sactivityEndDate'];
            $sresponsibility = $row['sresponsibility'];
            $snotes = $row['snotes'];
           // $activityId = $row['activityId'];
        } else {
            echo "<div class='alert alert-danger'>No record found for the given ID.</div>";
        }
    }
    ?>    

<form action="config.php" method="post">
            <label for="sactivityName">Sub Activity Name: </label>
            <input type="hidden" name="subactivityId" value="<?php echo $subactivityId  ?>">
            <input type="hidden" name="projectId" value="<?php echo $projectId  ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="sactivityName" value="<?php echo htmlspecialchars($sactivityName); ?>" placeholder="Enter Your Activity Name:" required>
            </div>
            <label for="sactivityStartDate">Sub Activity Start Date: </label>
            <div class="form-group">
                <input type="date" class="form-control" name="sactivityStartDate" value="<?php echo htmlspecialchars($sactivityStartDate); ?>" placeholder="Enter Activity Start Date:" required>
            </div>
            <label for="sactivityEndDate">Sub Activity End Date: </label>
            <div class="form-group">
                <input type="date" class="form-control" name="sactivityEndDate" value="<?php echo htmlspecialchars($sactivityEndDate); ?>" placeholder="Enter Activity End Date:" required>
            </div>
            <label for="sresponsibility">Sub Activity Responsible Person Name: </label>
            <div class="form-group">
                <input type="text" class="form-control" name="sresponsibility" value="<?php echo htmlspecialchars($sresponsibility); ?>" placeholder="Enter Responsible Person Name:" required>
            </div>
            <label for="notes">Sub Activity Notes: </label>
            <div class="form-group">
                <textarea class="form-control" name="snotes" placeholder="Enter Your Notes:" required><?php echo htmlspecialchars($snotes); ?></textarea>
            </div>
            <input type="hidden" name="activityId" value="<?php echo htmlspecialchars($activityId); ?>">
            <div style="display:flex; flex-direction: row; align-items: center; justify-content: space-between;">
                <div class="form-btn">
                    <input style="width: 150px;" type="submit" class="btn btn-primary" value="Update" name="updatesubactivity">
                </div>
                <div class="form-btn">
                    <a style="width: 150px;" class="btn btn-primary" href="displaysubactivity.php">Details</a>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>


    <?php    
include 'footer.php';

?>
</body>
</html>
