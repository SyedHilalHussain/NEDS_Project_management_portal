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

    if(isset($_GET['activityId'])&&isset($_GET['projectId'])){
        $activityId = $_GET['activityId'];
        $projectId = $_GET['projectId'];

    } else {
        die("activityId is required");
    }
    ?>    

        <form action="config.php" method="post">
        <input type="hidden" name="projectId" value="<?php echo $projectId  ?>">
          
        <input type="hidden" name="activityId" value="<?php echo $activityId  ?>">
        <label for="sactivityName">Sub-Activity Name: </label>
            <div class="form-group">
                <input type="text" class="form-control" name="sactivityName" placeholder="Enter Your Sub-Activity Name:" required>
            </div>
            <label for="sactivityStartDate">Sub-Activity Start Date: </label>
            <div class="form-group">
                <input type="date" class="form-control" name="sactivityStartDate" placeholder="Enter Sub-Activity Start Date:" required>
            </div>
            <label for="sactivityEndDate">Sub-Activity End Date: </label>
            <div class="form-group">
                <input type="date" class="form-control" name="sactivityEndDate" placeholder="Enter Sub-Activity End Date:"  required>
            </div>
            <label for="sresponsibility">Responsible Person Name: </label>
            <div class="form-group">
                <input type="text" class="form-control" name="sresponsibility" placeholder="Enter Responsible Person Name:" required>
            </div>
            <label for="snotes">Notes: </label>
            <div class="form-group">
                <textarea type="text" class="form-control" name="snotes" placeholder="Enter Your Sub-Activity Notes:"  required></textarea>
            </div>
            <div style="display:flex; flex-direction: row;align-items: center;justify-content: space-between;">
                <div class="form-btn">
                    <input style="width: 150px;" type="submit" class="btn btn-primary" value="Save" name="AddSubactivity"crequired>
                </div>
                <div class="form-btn">
                    <a style="width: 150px;" class="btn btn-primary" href="detail.php">Details</a>
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
