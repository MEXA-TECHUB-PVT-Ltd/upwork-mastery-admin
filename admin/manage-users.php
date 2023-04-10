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
                    <!-- <div class="row">
                        <div class="col-lg-12 pt-4 mb-3">
                            <a href="#" class="bg-primary-gradiant border-0 text-white fw-600 mt-3 text-uppercase font-xssss float-right rounded-lg d-inline-block p-2 lh-34 text-center rs-0 w200" data-toggle="modal" data-target="#Modallogin">ADD User</a>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card course-card  p-3 shadow-xss border-0 rounded-lg overflow-hidden mr-1 mb-4">
                                <div class="card-image w-100 mb-3">
                                    <table class="table display responsive product-overview mb-30" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>email</th>
                                                <th>country</th>
                                                <th>city</th>
                                                <th>referral_code</th>
                                                <th>created_at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
include_once("../include/db.php");
$conn=connect();
$sql = "SELECT * FROM users";
$run = pg_query($conn,$sql);
$count = 1;
while($result = pg_fetch_assoc($run)){
    $id = $result["id"];
    $email = $result["email"];
    $country = $result["country"];
    $city = $result["city"];
    $referral_code = $result["referral_code"];
    $created_at = $result["created_at"];
    $end_time4 = date("d-M Y", strtotime($created_at));
                                            ?>
                                        <tr>
                                            <td><?php echo $count  ?></td>
                                            <td><?php echo $email  ?></td>
                                            <td><?php echo $country  ?></td>
                                            <td><?php echo $city?></td>
                                            <td><?php echo $referral_code  ?></td>
                                            <td><?php echo $end_time4  ?></td>
                                            <td>
                                                <!-- <a href="#" data-toggle="modal" data-target="#Modaledit" onclick='loadEdit("<?php echo $id?>")'><i class="feather-edit text-grey-500 font-xs"></i></a> -->
                                                <a href="user.php?id=<?php echo $id?>" class="ml-4"><i class="feather-eye text-secondary font-xs"></i></a>
                                                <a href="#" class="ml-4" onclick="confirmation(<?php echo $id?>)"><i class="feather-trash text-danger font-xs"></i></a>
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
        </div>
        <?php include("../include/footer.php")?>

    </div> 
    <!-- Modal Add -->
    <div class="modal bottom fade" style="overflow-y: scroll;" id="Modallogin" tabindex="-1" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
                <div class="modal-body p-3 d-flex align-items-center bg-none">
                    <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                        <div class="card-body rounded-0 text-left p-3">
                            <h5 class="fw-700 display1-size display2-md-size mb-4">Add User</h5>
                            <form action="backend/user/add-user.php" method="post">
                                <div class="form-group icon-input mb-3">
                                    <input type="text" name="email" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-600" placeholder="Email">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="password" name="password" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="Password">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="text" name="city" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="City">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="text" name="country" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="Country">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="text" name="referral_code" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="Referral Code">                        
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
                            <h5 class="fw-700 display1-size display2-md-size mb-4">Edit User</h5>
                            <form action="backend/user/edit-user.php" method="post">
                                <div class="form-group icon-input mb-3">
                                    <input type="text" id="email" name="email" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-600" placeholder="Email">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="password" id="" name="password" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="Password">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="text" id="city" name="city" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="City">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="text" id="country" name="country" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="Country">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="text" id="referral_code" name="referral_code" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="Referral Code">                        
                                </div>
                                <div class="form-group icon-input mb-3">
                                    <input type="hidden" id="id" name="id" class="style2-input pl-5 form-control text-grey-900 font-xsss fw-400" placeholder="Referral Code">                        
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
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
          fetch("backend/user/delete-user.php", requestOptions)
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
    function loadEdit(id) {
$.ajax({
    url: "backend/user/get-user-by-id.php",
    method: "POST",
    data: {id: id},
    success: function (response) {
        response = JSON.parse(response);
        $('#email').val(response.email);
        $('#city').val(response.city);
        $('#country').val(response.country);
        $('#referral_code').val(response.referral_code);
        $('#id').val(response.id);
// And finally you can this function to show the pop-up/dialog
$("#Modaledit").modal();
    }
});
}
  </script>
</body>


</html>