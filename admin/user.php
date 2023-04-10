<?php 
session_start();
if (!isset($_SESSION["admin_email"]) && !isset($_SESSION["admin_id"])) {
    header("location:login.php");
}
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("../include/links.php")?>
    <style>
        .border-0 {
    border: 0!important;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
}

section {
    padding: 120px 0;
    overflow: hidden;
    background: #fff;
}
.mb-2-3, .my-2-3 {
    margin-bottom: 2.3rem;
}

.section-title {
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 10px;
    position: relative;
    display: inline-block;
}
.text-primary {
    color: #ceaa4d !important;
}
.text-secondary {
    color: #15395A !important;
}
.font-weight-600 {
    font-weight: 600;
}
.display-26 {
    font-size: 1.3rem;
}

@media screen and (min-width: 992px){
    .p-lg-7 {
        padding: 4rem;
    }
}
@media screen and (min-width: 768px){
    .p-md-6 {
        padding: 3.5rem;
    }
}
@media screen and (min-width: 576px){
    .p-sm-2-3 {
        padding: 2.3rem;
    }
}
.p-1-9 {
    padding: 1.9rem;
}

.bg-secondary {
    background: #15395A !important;
}
@media screen and (min-width: 576px){
    .pe-sm-6, .px-sm-6 {
        padding-right: 3.5rem;
    }
}
@media screen and (min-width: 576px){
    .ps-sm-6, .px-sm-6 {
        padding-left: 3.5rem;
    }
}
.pe-1-9, .px-1-9 {
    padding-right: 1.9rem;
}
.ps-1-9, .px-1-9 {
    padding-left: 1.9rem;
}
.pb-1-9, .py-1-9 {
    padding-bottom: 1.9rem;
}
.pt-1-9, .py-1-9 {
    padding-top: 1.9rem;
}
.mb-1-9, .my-1-9 {
    margin-bottom: 1.9rem;
}
@media (min-width: 992px){
    .d-lg-inline-block {
        display: inline-block!important;
    }
}
.rounded {
    border-radius: 0.25rem!important;
}
    </style>
</head>

<body class="color-theme-green mont-font">

    <div class="preloader"></div>

    <div class="main-wrapper">

        <!-- navigation -->
        <nav class="navigation scroll-bar">
            <div class="container pl-0 pr-0">
                <div class="nav-content">
                    <div class="nav-top">
                        <a href="index.php"><span class="d-inline-block fredoka-font ls-3 fw-500 text-current font-xl logo-text mb-0">UpWork Mastery</span> </a>
                        <a href="#" class="close-nav d-inline-block d-lg-none"><i class="ti-close bg-grey mb-4 btn-round-sm font-xssss fw-700 text-dark ml-auto mr-2 "></i></a>
                    </div>
                    <div class="nav-caption fw-600 font-xssss text-grey-500"><span>HOME</span></div>
                    <ul class="mb-3">
                        <li class="logo d-none d-xl-block d-lg-block"></li>
                        <li><a href="index.php" class="nav-content-bttn open-font" data-tab="chats"><i class="feather-tv mr-3"></i><span>Dashboard</span></a></li>
                        <li class="flex-lg-brackets"><a href="manage-video.php" data-tab="archived" class="nav-content-bttn open-font"><i class="feather-video mr-3"></i><span>Video Of Courses</span></a></li>                        
                        <li><a href="manage-users.php" class="active nav-content-bttn open-font" data-tab="favorites"><i class="feather-users mr-3"></i><span>Users</span></a></li>
                        <li><a href="manage-promo-code.php" class="nav-content-bttn open-font" data-tab="favorites"><i class="feather-gift mr-3"></i><span>Promo Code</span></a></li>
                        <li><a href="setting.php" class="nav-content-bttn open-font" data-tab="favorites"><i class="feather-settings mr-3"></i><span>Settings</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navigation -->
        <!-- main content -->
        <div class="main-content">
        <?php include("../include/header.php")?>
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="card d-block w-100 border-0 shadow-xss rounded-lg overflow-hidden mb-3" style="background-image: url(images/bb-16.png);">
                        <div class="card-body p-lg-5 p-4 bg-black-08">
                            <div class="clearfix"></div>
<?php 

$id = $_GET["id"];
include_once("../include/db.php");
$conn=connect();
$sql = "SELECT * FROM users WHERE id = $id";
$run = pg_query($conn,$sql);
$result = pg_fetch_assoc($run);
$id = $result["id"];
$email = $result["email"];
$username = $result["username"];
$country = $result["country"];
$city = $result["city"];
$subscription = $result["subscription"];
$referral_code = $result["referral_code"];
$created_at = $result["created_at"];
$status = $result["status"];
$end_time4 = date("d-M Y", strtotime($created_at));
if ($subscription == 'subscribed') {
    $subscription = 'true';
    $sql2 = "SELECT * FROM subscriptions WHERE user_id = $id";
    $run2 = pg_query($conn,$sql2);
    $result2 = pg_fetch_assoc($run2);
    $client_secret=$result2["client_secret"];
    $secret=$result2["secret"];
}else{
    $subscription = 'false';
}
?>
                                <section class="bg-light">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 mb-4 mb-sm-5">
                                                <div class="card border-0">
                                                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                                                        <div class="row align-items-center">
                                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                                                            </div>
                                                            <div class="col-lg-6 px-xl-10">
                                                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                                                    <h3 class="h2 text-white mb-0"><?php echo $username?></h3>
                                                                </div>
                                                                <ul class="list-unstyled mb-1-9">
                                                                    
                                                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> <?php echo $email?></li>
                                                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">City:</span> <?php echo $city?></li>
                                                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Country:</span> <?php echo $country?></li>
                                                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Referral code:</span> <?php echo $referral_code?></li>
                                                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Subscription:</span> <?php echo $subscription?></li>
                                                                    <?php 
                                                                    if ($subscription == 'true') {
                                                                      ?>
                                                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Client Secret:</span> <?php echo $client_secret?></li>
                                                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Secret Key:</span> <?php echo $secret?></li>
                                                                    <?php
                                                                }?>
                                                                    <?php 
                                                                    if ($status == 'active' || $status == '') {
                                                                      ?>
                                                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600"><button type="button" onclick="confirmation(<?php echo $id?>)" class="btn btn-danger mt-1">block</button></li>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600"><button type="button" onclick="Active(<?php echo $id?>)" class="btn btn-primary mt-1">Active</button></li>
                                                                    <?php
                                                                }
                                                                ?>
                                                                    
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <?php include("../include/footer.php")?>
    </div> 


    

   

    <?php include("../include/scripts.php")?>
    <script>
    function confirmation(id){
        console.log(id);
        Swal.fire({
  title: 'Are you sure?',
  text: "want to block user!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, block it!'
}).then((result) => {
  if (result.isConfirmed) {
    var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        var raw = JSON.stringify({
          "id": id,
        });
        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
          };
          fetch("backend/user/block-user.php", requestOptions)
          .then((response) => response.json())
          .then((data) => {
            if(data.status){
            window.location = 'manage-users.php';
            }else{
                console.log(data.message);
            }
          })
          .catch((error) => {
            console.error('Error:', error);
          });
  }
})
}
</script>
    <script>
    function Active(id){
        console.log(id);
        Swal.fire({
  title: 'Are you sure?',
  text: "want to Active user!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Active it!'
}).then((result) => {
  if (result.isConfirmed) {
    var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        var raw = JSON.stringify({
          "id": id,
        });
        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
          };
          fetch("backend/user/active-user.php", requestOptions)
          .then((response) => response.json())
          .then((data) => {
            if(data.status){
            window.location = 'manage-users.php';
            }else{
                console.log(data.message);
            }
          })
          .catch((error) => {
            console.error('Error:', error);
          });
  }
})
}
</script>
</body>


</html>