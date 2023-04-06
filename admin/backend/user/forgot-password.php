<?php
session_start();
// debuger
ini_set("display_errors",1);
// Headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-type:application/json; charst= UTF-8");

// file include
include_once("../../../include/db.php");
include_once("../../function/Admin.php");
$data = new stdClass();
$data->conn=connect();

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if (isset($_POST["email"])) {
    $data->email=$_POST["email"];
    $data->code = random_int(1000, 9999);
    if(!empty($row=searchByEmail($data))){
        $data->body = " Hi Admin, Your Code is:$data->code";
        $data->subject = "Reset Password";
        if (sendMail($data)) {
        // Storing Code
        $_SESSION["code"] = $data->code;
        $_SESSION["email_code"]=$data->email;
        header("location:../../verify-code.php");
        }else{
            $_SESSION["message"] = "failed to send email";
            header("location:../../forgot-password.php");
        }
    }else{
        $_SESSION["message_error"] = "This email is not register";
        header("location:../../forgot-password.php");
    }

    }else{
        $_SESSION["message_error"] = "Please enter code";
        header("location:../../forgot-password.php");
    }
}else{
    $_SESSION["message_error"] = "Server error";
    header("location:../../forgot-password.php");
    }
?>