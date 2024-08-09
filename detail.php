
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Details of Project</title>
</head>
<body>
  <?php include("header.php"); ?>
  
    <div class="container my-5">
    <?php
					
		
          if(isset($_SESSION["statusd"])){
          
          echo "<div class='alert alert-danger my-1 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
          .$_SESSION['statusd']."</div>";
          unset($_SESSION['statusd']);
          }
          if(isset($_SESSION["statusp"])){
          
          echo "<div class='alert alert-primary my-1 text-center' role='alert' style='padding: 5px; border-radius:15px;'>"
          .$_SESSION['statusp']."</div>";
          unset($_SESSION['statusp']);
          }
          ?>
  
 
    </div>

    <?php include 'footer.php'; ?>     
</body>
</html>