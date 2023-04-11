<?php 
session_start();
if (isset($_SESSION["admin_email"]) && isset($_SESSION["admin_id"])) {
    header("location:index.php");
}
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../include/links.php")?>
</head>
<body class="color-theme-green">
    <div class="preloader"></div>
    <div class="main-wrap">
        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(include/images/login-bg.jpg);"></div>
            <div class="col-xl-7 vh-lg-100 align-items-center d-flex bg-white rounded-lg overflow-hidden">
                <div class="card shadow-none border-0 ml-auto mr-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-3">Login into <br>your account</h2>
                        <form action="backend/user/login.php" method="post">
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-email text-grey-500 pr-0"></i>
                                <input type="email" name="email" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-600">                        
                            </div>
                            <div class="form-group icon-input mb-1">
                                <input type="Password" name="password" class="style2-input pl-5 form-control text-grey-900 font-xss ls-3">
                                <i class="font-sm ti-lock text-grey-500 pr-0"></i>
                            </div>
                            <div class="form-check text-left mb-3">
                                <input type="checkbox" class="form-check-input mt-2" id="exampleCheck1">
                                <label class="form-check-label font-xsss text-grey-500" for="exampleCheck1">Remember me</label>
                                <a href="forgot-password.php" class="fw-600 font-xsss text-grey-700 mt-2 mb-2 float-right">Forgot your Password?</a>
                            </div>
                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1"><button type="submit" name="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Login</button></div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
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

</html>