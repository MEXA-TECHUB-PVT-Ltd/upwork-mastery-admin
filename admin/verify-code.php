<?php 
session_start();
if (isset($_SESSION["admin_email"]) && isset($_SESSION["admin_id"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("../include/links.php")?>
</head>

<body class="color-theme-green">
    <div class="preloader"></div>
    <div class="main-wrap">
        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(images/login-bg-2.jpg);"></div>
            <div class="col-xl-7 vh-lg-100 align-items-center d-flex bg-white rounded-lg overflow-hidden">
                <div class="card shadow-none border-0 ml-auto mr-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Enter <br>OTP code</h2>                        
                        <form action="backend/user/verify-code.php" method="post">
                            <div class="form-group icon-input mb-1">
                                <input type="text" name="code" class="style2-input pl-5 form-control text-grey-900 font-xss ls-3">
                                <i class="font-sm ti-lock text-grey-500 pr-0"></i>
                            </div>
                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1"><button type="submit" name="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Submit</button></div>
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
if (isset($_SESSION["error_message"])) {
	# code...
	?>
	<script>
$.toast({
            heading: 'Opps! Failed',
            text: '<?php echo $_SESSION["error_message"]?>',
            position: 'top-right',
            loaderBg:'#fec107',
            icon: 'error',
            hideAfter: 3500
        });
	</script>
	<?php
	unset($_SESSION["error_message"]);
}
?>
</body>
</html>