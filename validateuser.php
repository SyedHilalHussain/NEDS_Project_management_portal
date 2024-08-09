<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location:./logout.php");
}else if(isset($_SESSION['email']) && $_SESSION['user_type']==1 ){
    header("Location:./logout.php");
}

?>