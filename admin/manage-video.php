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
                        <li class="flex-lg-brackets"><a href="manage-video.php" data-tab="archived" class="active nav-content-bttn open-font"><i class="feather-video mr-3"></i><span>Video Of Courses</span></a></li>                        
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
                        <div class="col-lg-12 pt-4 mb-3">
                            <a href="#" class="bg-primary-gradiant border-0 text-white fw-600 mt-3 text-uppercase font-xssss float-right rounded-lg d-inline-block p-2 lh-34 text-center rs-0 w200" data-toggle="modal" data-target="#Modallogin">ADD VIDEO</a>
                        </div>
                    </div>
                    <div class="row">

                        
<?php
include_once("../include/db.php");
$conn=connect();
$sql = "SELECT * FROM videos";
$run = mysqli_query($conn,$sql);
while($result = mysqli_fetch_assoc($run)){
    $id = $result["id"];
    $title = $result["title"];
    $link = $result["link"];
    $description = $result["description"];
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
        <!-- main content -->
        <div class="app-footer border-0 shadow-lg">
            <a href="index.php" class="nav-content-bttn nav-center"><i class="feather-home"></i></a>
            <a href="default-follower.html" class="nav-content-bttn"><i class="feather-package"></i></a>
            <a href="default-live-stream.html" class="nav-content-bttn" data-tab="chats"><i class="feather-layout"></i></a>            
            <a href="#" class="nav-content-bttn sidebar-layer"><i class="feather-layers"></i></a>
            <a href="setting.php" class="nav-content-bttn"><img src="../assets/images/female-profile.png" alt="user" class="w30 shadow-xss"></a>
        </div>

        <div class="app-header-search">
            <form class="search-form">
                <div class="form-group searchbox mb-0 border-0 p-1">
                    <input type="text" class="form-control border-0" placeholder="Search...">
                    <i class="input-icon">
                        <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                    </i>
                    <a href="#" class="ml-1 mt-1 d-inline-block close searchbox-close">
                        <i class="ti-close font-xs"></i>
                    </a>
                </div>
            </form>
        </div>
    </div> 
     <!-- Modal Add -->
     <div class="modal bottom fade" style="overflow-y: scroll;" id="Modallogin" tabindex="-1" role="dialog">
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
    </div>
     <!-- Modal edit -->
     <div class="modal bottom fade" style="overflow-y: scroll;" id="Modaledit" tabindex="-1" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
                <div class="modal-body p-3 d-flex align-items-center bg-none">
                    <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                        <div class="card-body rounded-0 text-left p-3">
                            <h5 class="fw-700 display1-size display2-md-size mb-4">Edit Video</h5>
                            <form action="backend/manage-video/edit-video.php" method="post">
                                <div class="form-group icon-input mb-3">
                                    <input type="text" id="title" name="title" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-600" placeholder="Title">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="text" id="link" name="link" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="Youtube Video Link">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <textarea name="description" id="description" style="width: 100%;height: 200px; resize:vertical;" rows="5" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="Description"></textarea>
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="hidden" id="id" name="id" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="Youtube Video Link">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <button type="submit" class="bg-primary-gradiant border-0 text-white fw-600 mt-3 text-uppercase font-xssss float-right rounded-lg d-inline-block p-2 lh-34 text-center rs-0 w200">Edit</button>
                                    <button type="button" data-dismiss="modal" class="bg-secoundry-gradiant border-0 text-mute fw-600 mt-3 text-uppercase font-xssss float-right rounded-lg d-inline-block p-2 pl-2 lh-34 text-center rs-0 w200" >Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
<?php include("../include/scripts.php")?>
  <script>
    function confirmation(id){
        console.log(id);
        Swal.fire({
  title: 'Are you sure?',
  text: "want to delete!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
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
          fetch("backend/manage-video/delete-video.php", requestOptions)
          .then((response) => response.json())
          .then((data) => {
            if(data.status){
            window.location = 'manage-video.php';
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
            function loadEdit(id) {
        $.ajax({
            url: "backend/manage-video/get-video-by-id.php",
            method: "POST",
            data: {id: id},
            success: function (response) {
                response = JSON.parse(response);
                $('#title').val(response.title);
                $('#link').val(response.link);
                $('#description').val(response.description);
                $('#id').val(response.id);
 // And finally you can this function to show the pop-up/dialog
 $("#Modaledit").modal();
            }
        });
    }
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