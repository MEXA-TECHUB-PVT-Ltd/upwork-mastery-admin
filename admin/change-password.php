<?php 
session_start();
if (!isset($_SESSION["admin_email"]) && !isset($_SESSION["admin_id"])) {
    header("location:login.php");
}
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uitheme.net/elomoas/password.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Mar 2023 08:18:09 GMT -->
<head>
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
                        <li><a href="index.php" class="nav-content-bttn open-font" data-tab="chats"><i class="feather-tv mr-3"></i><span>Dashboard</span></a></li>
                        <li class="flex-lg-brackets"><a href="manage-video.php" data-tab="archived" class="nav-content-bttn open-font"><i class="feather-video mr-3"></i><span>Video Of Courses</span></a></li>                        
                        <li><a href="manage-users.php" class="nav-content-bttn open-font" data-tab="favorites"><i class="feather-users mr-3"></i><span>Users</span></a></li>
                        <li><a href="manage-promo-code.php" class="nav-content-bttn open-font" data-tab="favorites"><i class="feather-gift mr-3"></i><span>Promo Code</span></a></li>
                        <li><a href="setting.php" class="active nav-content-bttn open-font" data-tab="favorites"><i class="feather-settings mr-3"></i><span>Settings</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navigation -->
        <!-- main content -->
        <div class="main-content">
        <?php include("../include/header.php")?>
            <div class="middle-sidebar-bottom bg-lightblue theme-dark-bg">
                <div class="middle-sidebar-left">
                    <div class="middle-wrap">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-lg">
                                <a href="default-settings.html" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></a>
                                <h4 class="font-xs text-white fw-600 ml-4 mb-0 mt-2">Change Password</h4>
                            </div>
                            <div class="card-body p-lg-5 p-4 w-100 border-0">
                                <form action="backend/user/change-password.php" method="post">
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss"  >Current Password</label>
                                                <input type="text" name="password" class="form-control">
                                            </div>        
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss"  >Change Password</label>
                                                <input type="text" name="new-password" class="form-control">
                                            </div>        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-gorup">
                                                <label class="mont-font fw-600 font-xssss"  >Confirm Change Password</label>
                                                <input type="text" name="confirm-password" class="form-control">
                                            </div>        
                                        </div>                                     
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mb-0">
                                            <button type="submit" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-lg d-inline-block">Save</button>
                                        </div>
                                    </div>

                                     
                                    </form>
                            </div>
                        </div>
                        <!-- <div class="card w-100 border-0 p-2"></div> -->
                    </div>
                </div>
        </div>
        <?php include("../include/footer.php")?>
    </div> 

    <?php include("../include/scripts.php")?>
<?php 
if (isset($_SESSION["message"])) {
	# code...
	?>
	<script>
$.toast({
            heading: 'Looks Good!',
            text: '<?php echo $_SESSION["message"]?>',
            position: 'top-right',
            loaderBg:'#878787',
            hideAfter: 3500
        });
	</script>
	<?php
	unset($_SESSION["message"]);
}

?>
		<?php 
if (isset($_SESSION["message_error"])) {
	# code...
	?>
	<script>
$.toast({
            heading: 'Opps! Failed',
            text: '<?php echo $_SESSION["message_error"]?>',
            position: 'top-right',
            loaderBg:'#fec107',
            icon: 'error',
            hideAfter: 3500
        });
	</script>
	<?php
	unset($_SESSION["message_error"]);
}
?>
</body>


<!-- Mirrored from uitheme.net/elomoas/password.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Mar 2023 08:18:09 GMT -->
</html>