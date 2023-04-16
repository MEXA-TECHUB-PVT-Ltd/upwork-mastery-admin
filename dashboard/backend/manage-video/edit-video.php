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
    if (isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["link"])) {
    $data->link=$_POST["link"];
    $data->id=$_POST["id"];
    $data->title=$_POST["title"];
    $data->description=$_POST["description"];
        if (UpdateVideo($data)) {
            $_SESSION["message"] = "Video updated Successfully";
            header("location:../../videos.php");
        }else{
            $_SESSION["message"] = "failed to update video";
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