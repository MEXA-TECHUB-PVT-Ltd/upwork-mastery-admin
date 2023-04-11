<?php 
session_start();
if (!isset($_SESSION["admin_email"]) && !isset($_SESSION["admin_id"])) {
    header("location:login.php");
}
include_once("../include/db.php");
$conn=connect();
$sql = "SELECT * FROM terms_conditions where status = 'active'";
$run = pg_query($conn,$sql);
$result = pg_fetch_assoc($run);
if (!empty($result["terms_and_condition"])) {
    $terms_and_condition = $result["terms_and_condition"];
}else {
    $terms_and_condition = '';
}
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../include/links.php");?>
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
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12">
                            <div class="card p-4 mb-4 border-0 shadow-xss rounded-lg">
                                <div class="card-body">
                                    <form action="backend/user/terms_and_condition.php" method="post">
                                        <textarea name="terms_and_condition"><?php echo $terms_and_condition?></textarea>
                                        <button type="submit" class="btn btn-primary mt-4 float-right">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card course-card  p-3 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                                <div class="card-image w-100 mb-3">
                                    <table class="table display responsive product-overview mb-30" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>terms_and_condition</th>
                                                <th>status</th>
                                                <th>created_at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
$sql2 = "SELECT * FROM terms_conditions";
$run2 = pg_query($conn,$sql2);
$count = 1;
while($result2 = pg_fetch_assoc($run2)){
    $id = $result2["id"];
    $terms_and_condition = $result2["terms_and_condition"];
    $status = $result2["status"];
    $created_at = $result2["created_at"];
    $end_time4 = date("d-M Y", strtotime($created_at));
                                            ?>
                                        <tr>
                                            <td><?php echo $count  ?></td>
                                            <td><a href="#" data-toggle="modal" data-target="#Modallogin" onclick='loadEdit("<?php echo $id?>")'><i class="feather-edit text-grey-500 font-xs"></i></a></td>
                                            <td><?php echo $status  ?></td>
                                            <td><?php echo $end_time4  ?></td>
                                            <td>
                                                <a href="#" class="ml-4"><i class="feather-check text-primary font-xs"></i></a>
                                                <a href="#" class="ml-4" onclick="confirmation(<?php echo $id?>)"><i class="feather-x text-danger font-xs"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $count++;
}
?>
                                        </tbody>
                                    </table>
                                </div> 
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>

            <?php include("../include/footer.php")?>
    <!-- Modal Add -->
    <!-- <div class="modal bottom fade" style="overflow-y: scroll;" id="Modallogin" tabindex="1" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
                <div class="modal-body p-3 d-flex align-items-center bg-none">
                    <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                        <div class="card-body rounded-0 text-left p-3">
                            <h5 class="fw-700 display1-size display2-md-size mb-4">Add Video</h5>
                            <form action="backend/manage-video/add-video.php" method="post">
                                <div class="form-group icon-input mb-3">
                                    <input type="text" name="title" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-600" placeholder="Title">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="text" name="link" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="Youtube Video Link">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <textarea name="description" style="width: 100%;height: 200px; resize:vertical;" rows="5" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="Description"></textarea>
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <button type="submit" class="bg-primary-gradiant border-0 text-white fw-600 mt-3 text-uppercase font-xssss float-right rounded-lg d-inline-block p-2 lh-34 text-center rs-0 w200">Add</button>
                                    <button type="button" data-dismiss="modal" class="bg-secoundry-gradiant border-0 text-mute fw-600 mt-3 text-uppercase font-xssss float-right rounded-lg d-inline-block p-2 pl-2 lh-34 text-center rs-0 w200" >Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div> -->
    </div> 
    
    <?php include("../include/scripts.php");?>

    <script src="https://cdn.tiny.cloud/1/yo9e1ts5xtf3knyjm2uck5okrzzgtapaef9txyy5qk62bfyp/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
      height:900,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>
      <script src="vendor/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
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