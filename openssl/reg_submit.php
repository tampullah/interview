<?php 
session_start();

require_once "classes/Registration.php";
require_once "classes/Message.php";

$ema = new Message;

$reg = new Registration;

if(isset($_POST['btnsubmit'])){

    $name = $_POST['name'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];

    if(empty($name)||empty($email)||empty($phone)){
        $_SESSION['error']="All fields are required";
        header('location:registration.php');
        exit;
    }

    if(strlen($phone)!=11){
        $_SESSION['error']= "Phone Number must be 11 characters";
        header('location:registration.php');
        exit;
    }
    if(!is_numeric($phone)){
        $_SESSION['error']= "Please input a valid phone number";
        header('location:registration.php');
        exit;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)|| !preg_match("/@(gmail|yahoo).com/",$email)){
        $_SESSION['error']="Email should either be Gmail or Yahoomail";
        header('location:registration.php');
        exit;

    }
   
        $resp = $reg->register_user($name, $email, $phone);
        if($resp){
        $res = $ema->send_message_mailer($email);

        if($res==true){
            $_SESSION['feedback']= "Registration Successfull";
            header('location:registration.php');
            exit;
        }
       
        }else{
            $_SESSION['error']="Something went wrong, please try again later";
            header('location:registration.php');
            exit;
        }
    

    
}else{

    $_SESSION['error']="Please use the door";
    header('location:registration.php');
    exit;
}



?>