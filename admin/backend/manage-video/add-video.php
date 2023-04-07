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
        if (createVideo($data)) {
            $_SESSION["message"] = "Video Created Successfully";
            header("location:../../manage-video.php");
        }else{
            $_SESSION["message"] = "failed to create video";
            header("location:../../manage-video.php");
        }
    }else {
        $_SESSION["message_error"] = "All Data Needed";
            header("location:../../manage-video.php");
    }
    }else{
        $_SESSION["message_error"] = "All data needed";
        header("location:../../manage-video.php");
    }
}else{
    $_SESSION["message_error"] = "Server error";
    header("location:../../manage-video.php");
    }
?>