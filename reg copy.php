<?php
$conn = mysqli_connect("localhost", "root", "", "problem_db") or die("connection failed");
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail1($e1,$m1,$message,$subject){
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'syedhilalkhan64@gmail.com';                     //SMTP username
        $mail->Password   = 'wcbdqepssuxalidy';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('syedhilalkhan64@gmail.com', 'Problem Identifier');
        $mail->addAddress($e1,$m1);     //Add a recipient
        
    
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject =$subject;
        $email_template=$message;
        $mail->Body    = $email_template;
        
    
        $mail->send();
        return true;
       
    } catch (Exception $e) {
        echo " Email Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }


}





if (isset($_POST['signup'])) {



    $e1 = 'msohailahmed@yahoo.com';
    $m1 = 'Account Verification';
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, password_hash($_POST['pass'], PASSWORD_BCRYPT));
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";

    $namelength = strlen($name);
    $sql = "SELECT email FROM user WHERE email='{$email}'";
    $message = "The Following Student Want Registeration
     Name=$name
     Email=$email
     Please Log In To Verify His Account
     Click Here --><a href='http://test.emuem.org/voting_sw/login.php'>Log In</a>
 ";
 $sub = 'EMAIL Verification From NEDSCHOLARS';
    if ($namelength > 20) {
        $_SESSION['statusd'] = "Name must be less than 20 characters!";
        header('Location:registeration.php');
    } else if (!preg_match($pattern, $email)) {
        $_SESSION['statusd'] = "Invalid Email!";
        header('Location:registeration.php');
    } else if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {

        $_SESSION['statusd'] = "Email is already Registered!";
        header('Location:registeration.php');
    } else {
        $sql1 = "INSERT INTO user(name,email,password)
            VALUES('{$name}','{$email}','{$pass}')" or die("query fail ed");

        if (mysqli_query($conn, $sql1)) {
            sendemail1($e1, $m1, $message,$sub);
            
            $_SESSION['statusp'] = "ACOUNT REGISTERED SUCCESSFULLY WAIT 48 HOURS FOR VERIFICATION!";
            header('Location:registeration.php');
        } else {
            $_SESSION['statusd'] = "REGISTRATION FAILED!";
            header('Location:registeration.php');
        }
    }
}
