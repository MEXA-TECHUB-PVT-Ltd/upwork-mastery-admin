<?php
session_start();
// debuger
ini_set("display_errors",1);
// Headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Content-type:application/json; charst= UTF-8");

// file include
include_once("../../include/db.php");
include_once("../function/Function.php");
$data = new stdClass();
$data->conn=connect();

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $data2 = json_decode(file_get_contents("php://input"));
    if (isset($data2->email)) {
    $data->email=$data2->email;
    $data->code = random_int(1000, 9999);
    if(!empty($row=searchByEmail($data))){
        $data->body = " Hi Admin, Your Code is:$data->code";
        $data->subject = "Reset Password";
        if (sendMail($data)) {
        // Storing Code
        if (saveOTP($data)) {
                http_response_code(200);
                echo json_encode(array(
                "status"=>true,
                "message"=>"Email Has been sent. Kindly Check your Email. Code: $data->code"
            ));
        }
        }else{
            http_response_code(200);
            echo json_encode(array(
            "status"=>false,
            "message"=>"failed To Send Email"
        ));

        }
    }else{
        $_SESSION["message_error"] = "This email is not register";
        header("location:../forgot-password.php");
    }

    }else{
        $_SESSION["message_error"] = "Please enter code";
        header("location:../forgot-password.php");
    }
}else{
    $_SESSION["message_error"] = "Server error";
    header("location:../forgot-password.php");
    }
?>