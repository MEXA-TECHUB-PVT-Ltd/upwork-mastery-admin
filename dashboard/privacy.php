<?php 
session_start();
if (!isset($_SESSION["admin_email"]) && !isset($_SESSION["admin_id"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upwork Mastery</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/js/jquery-toast-plugin/dist/jquery.toast.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.php">
    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
.rectangle {
  height: 100%;
  width: 100%;
  border-radius:7px;
  border: 2px solid #969AA8;
  vertical-align:middle;
  justify-content:center;
  align-items: center;
  padding: 10px;
}

      </style>
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
<header style="background:#ffffff" class="navbar navbar-light sticky-top flex-md-nowrap p-0 shadow">
<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><img style="height: 60px;" src="assets/image/logo.png" alt="logo"></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
    <li class="nav-item dropdown mx-3">
        <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i style="color:#14a800" class="fa-solid fa-user"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><a class="dropdown-item" href="backend/user/logout.php">Logout</a></li>
        </ul>
      </li>      
    </div>
  </div>
</header>
  <div class="container-fluid ">
    <div class="row mt-120">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse shadow">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link mt-5" aria-current="page" href="index.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="users.php">
                <span data-feather="users"></span>
                Users
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="videos.php">
                <span data-feather="video"></span>
                Videos
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bookmark"></span>
                Promo Codes
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="terms-and-conditions.php">
                <span data-feather="folder"></span>
                Terms And Conditions
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Licence.php">
                <span data-feather="file"></span>
                License Agreement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="bookmark"></span>
                Privacy Policy
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3 mb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 style="color: #14a800;" class="h2">Privacy Policy</h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-lg-12 pt-4 mb-3 d-flex justify-content-end">
                    <button style="  border-radius: 30px;
  background-color:var(--primary);
  border:none;
  font-weight: 500;
  outline: none;
  font-size: 15px;
  padding:7px 30px;
  transition: 0.5s;" href="#" onclick="loadEdit3()" class="border-0 fw-600 btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-plus"></i> Add</button>
                </div>
            </div>
        </div>
        <?php
include_once("../include/db.php");
$conn=connect();
$sql = "SELECT * FROM privacy_policy ORDER BY status ASC";
$run = pg_query($conn,$sql);
while($result = pg_fetch_assoc($run)){

if (!empty($result["policy"])) {
    $id = $result["id"];
    $terms_and_condition = $result["policy"];
    $created_at = $result["created_at"];
    $status =$result["status"];
    $end_time4 = date("d-M Y", strtotime($created_at));
}else {
    $terms_and_condition = '';
}
if ($status == 'active') {
?>
      <div class="row mt-4">
        <div class="col-md-8">
            <div class="header">
                <h4>Active Privacy Policy</h4>
            </div>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <div class="tag">
                <span style="background:#affda5; color: #14a800; border-radius: 15px ; padding:5px;">active</span>
            </div>
            <div class="icon-b">
            <a class=" mx-2 mt-2 mb-2 mx-3" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis-vertical"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" onclick="loadEdit(<?php echo $id?>)" data-bs-toggle="modal" data-bs-target="#Modaledit" href="#"><i class="text-primary fa-solid fa-pen-to-square"></i> Update</a></li>
                    <li><a class="dropdown-item" onclick="confirmation(<?php echo $id?>)" href="#"><i class="text-danger fa-solid fa-trash"></i> Delete</a></li>
                </ul>
            </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12">
            <div class="rectangle"> 
                <?php echo $terms_and_condition?>
            </div>
        </div>
      </div>
      <?php
}else {
    ?>
<div class="row mt-4">
        <div class="col-md-8">
            <div class="header">
                <h4>Last Updated <span style="font-size:15px;">(<?php echo $end_time4?>)</span></h4>
            </div>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <div class="tag">
                <span style="background:#bdbec3; color: #525357; border-radius: 15px ; padding:5px;">inactive</span>
            </div>
            <div class="icon-b">
            <a class=" mx-2 mt-2 mb-2 mx-3" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis-vertical"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" onclick="loadEdit(<?php echo $id?>)" data-bs-toggle="modal" data-bs-target="#Modaledit" href="#"><i class="text-primary fa-solid fa-pen-to-square"></i> Update</a></li>
                    <li><a class="dropdown-item" onclick="confirmation(<?php echo $id?>)" href="#"><i class="text-danger fa-solid fa-trash"></i> Delete</a></li>
                </ul>
            </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12">
            <div class="rectangle"> 
                <?php echo $terms_and_condition?>
            </div>
        </div>
      </div>
    <?php
}
}
?>
      
    </main>  
    <!-- Modal -->
<div class="modal fade" id="Modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Privacy Policy</h1>
        <button style="box-shadow: none;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="backend/user/update-privacy_policy.php" method="post">
      <div class="modal-body">
        <div class="input-group mb-3">
            <select name="status" style="box-shadow: none;" class="form-select" aria-label="Default select example">
                <option value="inactive">Inactive</option>
                <option value="active">Active</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <textarea id="termscondition" name="terms_and_condition"></textarea>
        </div>
        <div class="input-group mb-3">
            <input style="box-shadow: none;"  type="hidden" id="id" name="id" class="form-control" placeholder="Link Of Youtube">
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center mt-3">
        <button style="  border-radius: 30px;
  background-color:var(--primary);
  border:none;
  font-weight: 500;
  outline: none;
  font-size: 15px;
  padding:7px 30px;
  transition: 0.5s;" type="submit" class="btn btn-primary">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Privacy Policy</h1>
        <button style="box-shadow: none;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="backend/user/privacy_policy.php" method="post">
      <div class="modal-body">
      <div class="input-group mb-3">
            <select name="status" style="box-shadow: none;" class="form-select" aria-label="Default select example">
                <option value="inactive">Inactive</option>
                <option value="active">Active</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <textarea name="terms_and_condition"></textarea>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center mt-3">
        <button style="  border-radius: 30px;
  background-color:var(--primary);
  border:none;
  font-weight: 500;
  outline: none;
  font-size: 15px;
  padding:7px 30px;
  transition: 0.5s;" type="submit" class="btn btn-primary ">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script src="assets/js/jquery-toast-plugin/dist/jquery.toast.min.js"></script> 
<script src="https://cdn.tiny.cloud/1/yo9e1ts5xtf3knyjm2uck5okrzzgtapaef9txyy5qk62bfyp/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    function loadEdit3(){
        tinymce.init({
      selector: 'textarea',
      height:900,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
    }
  </script>
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
          fetch("backend/user/delete-privacy.php", requestOptions)
          .then((response) => response.json())
          .then((data) => {
            if(data.status){
            window.location = 'privacy.php';
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
            url: "backend/user/get-policy-by-id.php",
            method: "POST",
            data: {id: id},
            success: function (response) {
                response = JSON.parse(response);
                console.log(response);
                $('#termscondition').val(response.policy);
                $('#id').val(response.id);
                tinymce.init({
      selector: 'textarea',
      height:900,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
 // And finally you can this function to show the pop-up/dialog
 $("#Modaledit").modal();
            }
        });
    }
  </script>
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