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
    <link rel="stylesheet" href="assets/js/jquery-toast-plugin/dist/jquery.toast.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
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
  margin-left: 80px;
}
      </style>
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
            <li><a class="dropdown-item" href="#">Logout</a></li>
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
              <a class="nav-link active" href="#">
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
              <a class="nav-link" href="promo-code.php">
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
                <div class="card" style="width: 13rem;">
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
                
                      <div class="user-initial text-uppercase"><?php echo $firstLetter?></div>
                    <div class="card-body">
                      <h5 style="color:#14a800" class="card-title text-center"><?php echo $Username?></h5>
                      <h6 class="card-text"><?php echo $email?></h6>
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script src="assets/js/jquery-toast-plugin/dist/jquery.toast.min.js"></script> 
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