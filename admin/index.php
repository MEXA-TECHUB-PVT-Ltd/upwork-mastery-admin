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
<meta charset="UTF-8">
<meta charset="UTF-8">
<?php include("../include/links.php")?>
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
                        <li><a href="index.php" class="active nav-content-bttn open-font" data-tab="chats"><i class="feather-home mr-3"></i><span>Dashboard</span></a></li>
                        <li class="flex-lg-brackets"><a href="manage-video.php" data-tab="archived" class="nav-content-bttn open-font"><i class="feather-video mr-3"></i><span>Video Of Courses</span></a></li>                        
                        <li><a href="manage-users.php" class="nav-content-bttn open-font" data-tab="favorites"><i class="feather-users mr-3"></i><span>Users</span></a></li>
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
                    <div class="row">
                    <?php
include_once("../include/db.php");
$conn=connect();
$sql = "SELECT * FROM users";
$run = pg_query($conn,$sql);
$users = pg_num_rows($run);
// total Subscription
$sql2 = "SELECT * FROM subscriptions";
$run2 = pg_query($conn,$sql2);
$subscriptions = pg_num_rows($run2);
// total video
$sql3 = "SELECT * FROM videos";
$run3 = pg_query($conn,$sql3);
$video = pg_num_rows($run3);

    ?>
                        <div class="col-lg-4 pt-4 mb-3">
                            <div class="card mb-4 d-block w-100 shadow-xss rounded-lg p-4 border-0 text-center">
                                <h4 class="fw-700 font-xs mt-3 mb-1">Total User</h4>
                                <div class="clearfix"></div>
                                <ul class="list-inline border-0 mt-4">
                                    <li class="list-inline-item text-center mr-4"><h4 class="fw-700 font-md"><?php echo $users?></h4></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-4 mb-3">
                            <div class="card mb-4 d-block w-100 shadow-xss rounded-lg p-4 border-0 text-center">
                                <h4 class="fw-700 font-xs mt-3 mb-1">Total Subscription</h4>
                                <div class="clearfix"></div>
                                <ul class="list-inline border-0 mt-4">
                                    <li class="list-inline-item text-center mr-4"><h4 class="fw-700 font-md"><?php echo $subscriptions?></h4></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-4 mb-3">
                            <div class="card mb-4 d-block w-100 shadow-xss rounded-lg p-4 border-0 text-center">
                                <h4 class="fw-700 font-xs mt-3 mb-1">Total Videos</h4>
                                <div class="clearfix"></div>
                                <ul class="list-inline border-0 mt-4">
                                    <li class="list-inline-item text-center mr-4"><h4 class="fw-700 font-md"><?php echo $video?></h4></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        <div class="col-lg-12 pt-0 mb-3">
                        <h2 class="fw-400 font-lg d-block">Course <b>Videos</b></h2>
                    </div>
                    <div class="row">

                        
<?php
$sql4 = "SELECT * FROM videos";
$run4 = pg_query($conn,$sql4);
while($result4 = pg_fetch_assoc($run4)){
    $id = $result4["id"];
    $title = $result4["title"];
    $link = $result4["link"];
    $description = $result4["description"];
parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
  // Output: C4kxS1ksqtw
?>
                            <div class="col-lg-3 pt-2">
                                <div style="height:320px" class="card course-card w300 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                                    <div class="card-image w-100 mb-3">
                                        <a href="cource-detail.php?id=<?php echo $id?>" class="video-bttn position-relative d-block"><img src="https://img.youtube.com/vi/<?php echo $my_array_of_vars['v']?>/0.jpg" alt="image" class="w-100"></a>
                                    </div>
                                    <div class="card-body pt-0">
                                        <h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="#" class="float-right" data-toggle="modal" data-target="#Modaledit" onclick='loadEdit("<?php echo $id?>")'><i class="feather-edit text-grey-500 font-xs"></i></a><a href="#" class="float-right mr-2" onclick="confirmation(<?php echo $id?>)"><i class="feather-trash text-danger-500 font-xs"></i></a><a href="cource-detail.php?id=<?php echo $id?>" class="text-dark text-grey-900"><?php echo $title?></a></h4>
                                    </div>
                                </div>
                            </div>
<?php
}
?>
                    </div>
                </div>
            </div>            
        </div>
        <?php include("../include/footer.php")?>
    </div> 
    <?php include("../include/scripts.php")?>
</body>


</html>