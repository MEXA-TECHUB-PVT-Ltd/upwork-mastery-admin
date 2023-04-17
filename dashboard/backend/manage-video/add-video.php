<?php
session_start();
// file include
include_once("../../../include/db.php");
include_once("../../function/Admin.php");
$data = new stdClass();
$data->conn=connect();
if($_SERVER['REQUEST_METHOD'] === "POST"){
    if (isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["link"])) {
    if (!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["link"])) {
    $data->link=$_POST["link"];
    $data->description=$_POST["description"];
    $data->title=$_POST["title"];
    if (filter_var($data->link, FILTER_VALIDATE_URL)) {
        if (createVideo($data)) {
            $_SESSION["message"] = "Video Created Successfully";
            header("location:../../videos.php");
        }else{
            $_SESSION["message_errors"] = "failed to create video";
            header("location:../../videos.php");
        }
        }else {
            $_SESSION["message_error"] = "Url Is not valid";
            header("location:../../videos.php");
        }
    }else {
        $_SESSION["message_error"] = "All Data Needed";
            header("location:../../videos.php");
    }
    }else{
        $_SESSION["message_error"] = "All data needed";
        header("location:../../videos.php");
    }
}else{
    $_SESSION["message_error"] = "Server error";
    header("location:../../videos.php");
    }
?>