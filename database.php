<?php 
$hostName="emuem001.mysql.guardedhost.com";
$dbUser="emuem001_pms";
$dbPassword="x*v5uMQz^9h6";
$dbName="emuem001_pms";
$conn=mysqli_connect($hostName,$dbUser,$dbPassword,$dbName);
if(!$conn){
    die("Something went wrong". mysqli_connect_error());
}
?>



