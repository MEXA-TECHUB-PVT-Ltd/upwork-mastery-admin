<?php 
session_start();
if (!isset($_SESSION["admin_email"]) && !isset($_SESSION["admin_id"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("include/links.php");?>
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
        .user-initial {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: #14a800;
  color: #fff;
  font-size: 24px;
  font-weight: bold;
  text-align: center;
  line-height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-left: 100px;
}
.confirm-button-class {
  background-color: #14a800 !important;
  color: #14a800 !important;
  border: 1px solid #14a800 !important;
}
.title-class {
  font-size: 15px !important;
}
.icon-class {
  font-size: 10px !important;
}
.confirm-button-class .swal2-icon svg {
  width: 12px !important;
  height: 12px !important;
}
.swal2-actions .swal2-confirm {
  background-color: #14a800 !important;
  color: white !important;
  border: none !important;
  box-shadow: none !important;
}
.swal2-actions .swal2-cancel {
  background-color: #fff !important;
  color: #14a800 !important;
  border: 1px solid #14a800 !important;
  box-shadow: none !important;
}
.swal2-confirm:focus, .swal2-cancel:focus {
  box-shadow: none !important;
  border: 1px solid #14a800;
}
.swal2-actions button:hover {
  border: none !important;
}
      </style>
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
<?php include("include/header.php");?>
  <div class="container-fluid ">
    <div class="row mt-120">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse shadow">
        <div class="position-sticky pt-3">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-1" href="index.php"><img style="height: 50px;" src="assets/image/logo.png" alt="logo"></a>
          <ul class="nav flex-column">
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Menu</span>
                <a class="link-secondary" href="#" aria-label="Add a new report"></a>
              </h6>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="users.php">
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
              <a class="nav-link" href="privacy.php">
                <span data-feather="bookmark"></span>
                Privacy Policy
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 mt-3 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 style="color: #14a800;" class="h2">Users</h1>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- Example single danger button -->
<div class="btn-group">
  
</div>
            <div class="row">
              <?php 
              
include_once("../include/db.php");
$conn=connect();
$sql = "SELECT * FROM users ORDER BY created_at ASC";
$run = pg_query($conn,$sql);
$count = 1;
while($result = pg_fetch_assoc($run)){
    $id = $result["id"];
    $Username = $result["username"];
    $email = $result["email"];
    $status = $result["status"];
$firstLetter = substr($Username, 0, 1); // "H"
?>
              <div class="col-md-3 mt-3">
                <div class="card" style="width: 300px;">
                <div class="row">
                  <div class="col-6">
                    <?php if ($status == 'block') {
                      ?>
                    <div><i class="text-danger fa-solid fa-ban"></i></div>
                    <?php 
                    }
                    ?>
                  </div>
                  <div class="col-6 text-end">
                  <a class=" mx-2 mt-2 mb-2" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis-vertical"></i>
                </a>
                <ul class="dropdown-menu">
                      <?php 
                      if ($status == 'active') {
                        ?>
                        <li><a class="dropdown-item" onclick="confirmation(<?php echo $id?>)" href="#"><i class="text-danger fa-solid fa-ban"></i> Block</a></li>
                      <?php
                  }else{
                      ?>
                        <li><a class="dropdown-item" onclick="Active(<?php echo $id?>)" href="#"><i class="text-primary fa-solid fa-check"></i> Active</a></li>
                      <?php
                  }
                  ?>
                </ul>
                  </div>
                </div>
                
                      <div class="user-initial text-uppercase text-center"><?php echo $firstLetter?></div>
                    <div class="card-body">
                      <h5 style="color:#14a800" class="card-title text-center"><?php echo $Username?></h5>
                      <h6 class="card-text text-center"><?php echo $email?></h6>
                    </div>
                  </div>
              </div>
              <?php
}
?>
            </div>
          </div>
      </div>
    </main>
    </div>
    </div>
<?php include("include/scripts.php");?>
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
            window.location = 'users.php';
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
    function confirmation(id){
        console.log(id);
        Swal.fire({
  title: 'Conformation',
  text: "Do You Want To Block User",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Block'
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
            window.location = 'users.php';
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