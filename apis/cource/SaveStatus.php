<?php
session_start();
// debuger
ini_set("display_errors",1);
// Headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-type:application/json; charst= UTF-8");

// file include
include_once("../../include/db.php");
include_once("../function/Function.php");
$data = new stdClass();
$data->conn=connect();
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET["video_id"]) && isset($_GET["user_id"])) {
        $data->user_id=$_GET["user_id"];
        $data->video_id=$_GET["video_id"];
    if (GetSavedStatus($data)) {
        http_response_code(200);
        echo json_encode(array(
            "status"=>true,
        "message"=> "video status is save."
    ));
    }else{
        http_response_code(200);
        echo json_encode(array(
            "status"=>false,
            "message"=>"video is not save"
        ));
     }
     }else {
        http_response_code(200);
        echo json_encode(array(
            "status"=>false,
            "message"=>"All Data Needed"
        ));
     }
}else{
    http_response_code(503);
echo json_encode(array(
    "status"=>false,
    "message"=>"Server Error"
));
}
?>