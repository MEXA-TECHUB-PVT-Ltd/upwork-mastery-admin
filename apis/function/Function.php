<?php 
require_once "../../libraries/vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
// Auth Api Function
function CreateUser($data){
    $query = "INSERT INTO users (email,password) VALUES ('$data->email','$data->password')";
    $insert = pg_query($data->conn, $query);
        if($insert){
            return true;
        }
        return false;
}
function searchByEmail($data){
    $query = "SELECT * FROM users WHERE email='$data->email'";
    $result = pg_query($data->conn, $query);
    if ($result) {
        return pg_fetch_assoc($result);
    }
    return array();
    }
function searchById($data){
    $query = "SELECT * FROM users WHERE id='$data->id'";
    $result = pg_query($data->conn, $query);
    if ($result) {
        return pg_fetch_assoc($result);
    }
    return array();
    }
function GetUserStatus($data){
    $query4 = "SELECT * FROM users WHERE id='$data->id'";
    $result4 = pg_query($data->conn, $query4);
    if ($result4) {
        $row5 = pg_fetch_assoc($result4);
        $status = $row5["status"];
        if ($status == null || $status == 'active') {
            $return = "Active";
            return array(
                "status" => true,
                "user" => $return
            );
        }else {
            $return = "Inactive";
            return array(
                "status" => true,
                "user" => $return
            );
        }
        
    }
    return array();
    }
    function updatePassword($data){
        $query = "UPDATE users SET
        password = '$data->password'
        WHERE email = '$data->email'";
        $upload = pg_query($data->conn, $query);
        if($upload){
            return true;
        }
            return false;
        }
    function saveOTP($data){
        $query = "UPDATE users SET
        OTP = '$data->code'
        WHERE email = '$data->email'";
        $upload = pg_query($data->conn, $query);
        if($upload){
            return true;
        }
            return false;
        }
    function resetOTP($data){
        $query = "UPDATE users SET
        otp = null
        WHERE email = '$data->email'";
        $upload = pg_query($data->conn, $query);
        if($upload){
            return true;
        }
            return false;
        }
    function updateProfile($data){
        $query = "UPDATE users SET
        username = '$data->username',
        referral_code = '$data->referral_code',
        city = '$data->city',
        country = '$data->country'
        WHERE id = '$data->id'";
        $upload = pg_query($data->conn, $query);
        if($upload){
            return true;
        }
            return false;
        }
        function sendMail($data){
            //SMTP Settings
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "ventureoffical123@gmail.com"; //enter you email address
            $mail->Password = 'bpvlxqxuetmtregm'; //enter you email password
            $mail->Port = 465;
            $mail->SMTPSecure = "ssl";
            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom("noreply@gmail.com");
            $mail->addAddress($data->email); //enter you email address
            $mail->Subject = ("$data->subject");
            $mail->Body = $data->body;
            if ($mail->send()) {
               return true;
           }
       }
        // Promo Code
function GetPromoCode($data){
    $query = "SELECT * FROM promo_codes";
    $result = pg_query($data->conn, $query);
    if ($result) {
        $row = array();
        while($data = pg_fetch_assoc($result)){
            $row[] = [
                'status'=>true,
                'data'=>[
                    'id'=>$data["id"],
                    'promo_code'=>$data["code"],
                    'expire_date'=>$data["expire_date"],
                    'discount'=>$data["discount"],
                    'created_at'=>$data["created_at"],
                ]
                
            ];
        }
        return $row;;
    }
    return array();
    }
function GetTermsAndCondition($data){
$query = "SELECT terms_and_condition FROM admin";
$result = pg_query($data->conn, $query);
if ($result) {
    $data = pg_fetch_assoc($result);
        $row = [
            'status'=>true,
            'TermsAndCondition'=>$data["terms_and_condition"]
        ];
    }
    return $row;;
}
function GetPrivacyPolicy($data){
$query = "SELECT privacy_policy FROM admin";
$result = pg_query($data->conn, $query);
if ($result) {
    $data = pg_fetch_assoc($result);
        $row = [
            'status'=>true,
            'privacy_policy'=>$data["privacy_policy"]
        ];
    }
    return $row;;
}
function GetVideos($data){
    $query = "SELECT * FROM videos";
    $result = pg_query($data->conn, $query);
    if ($result) {
        $row = array();
        while($data = pg_fetch_assoc($result)){
            $row[] = [
                'status'=>true,
                'data'=>[
                    'id'=>$data["id"],
                    'title'=>$data["title"],
                    'link'=>$data["link"],
                    'description'=>$data["description"],
                    'created_at'=>$data["created_at"],
                ]
                
            ];
        }
        return $row;;
    }
    return array();
    }
function GetVideoById($data){
    $query = "SELECT * FROM videos WHERE id =$data->id";
    $result = pg_query($data->conn, $query);
    if ($result) {
        $data = pg_fetch_assoc($result);
        $row = [
            'status'=>true,
            'data'=>[
                'id'=>$data["id"],
                'title'=>$data["title"],
                'link'=>$data["link"],
                'description'=>$data["description"],
                'created_at'=>$data["created_at"],
            ]
        ];
        }
        return $row;;
    }
function payament($data){
$query = "INSERT INTO payment (user_id,amount,token) VALUES ('$data->user_id','$data->amount','$data->token')";
$insert = pg_query($data->conn, $query);
if($insert){
    return true;
}
    return false;
}
function createSUbscription($data){
$query = "INSERT INTO subscriptions (user_id,customer_id,client_secret,secret,amount,currency) VALUES ('$data->user_id','$data->customer_id','$data->client_secret','$data->secret','$data->amount','$data->currency')";
$insert = pg_query($data->conn, $query);
if($insert){
    $query2 = "UPDATE users SET
    subscription = 'subscribed'
    WHERE id = '$data->user_id'";
    $upload2 = pg_query($data->conn, $query2);
    if($upload2){
        return true;
    }
}
return false;
}
?>