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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
      </style>
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
<?php include("include/header.php");?>
  <div class="container-fluid ">
    <div class="row mt-120">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse shadow">
        <div class="position-sticky pt-3">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-1" href="#"><img style="height: 50px;" src="assets/image/logo.png" alt="logo"></a>
          <ul class="nav flex-column">
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Menu</span>
                <a class="link-secondary" href="#" aria-label="Add a new report"></a>
              </h6>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
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
      
      <?php
include_once("../include/db.php");
$conn=connect();
$sql = "SELECT * FROM users";
$run = pg_query($conn,$sql);
$users = pg_num_rows($run);
$sql2 = "SELECT * FROM subscriptions";
$run2 = pg_query($conn,$sql2);
$subscriptions = pg_num_rows($run2);
// total video
$sql3 = "SELECT * FROM videos";
$run3 = pg_query($conn,$sql3);
$video = pg_num_rows($run3);
?>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 style="color: #14a800;" class="h2">Dashboard</h1>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-6 px-md-6 mt-2">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="title"><h3>Total Users</h3></div>
                  </div>
                  <div class="card-icon col-3">
                    <img src="assets/image/Group 3156.png" alt="icon">
                  </div>
                  <div class="totals">
                    <h4><?php echo $users?></h4>
                  </div>
                  </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 col-lg-6 px-md-6 mt-2">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="title"><h3>Total Videos</h3></div>
                  </div>
                  <div class="card-icon col-3">
                    <img src="assets/image/Group 3156.png" alt="icon">
                  </div>
                  <div class="totals">
                  <h4><?php echo $video?></h4>
                  </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <h4>Course Video</h4>
        </div>
        <div class="row">
          <div class="col-md-7">
            <div class="row">
              <?php
            $sql = "SELECT * FROM videos";
            $run = pg_query($conn,$sql);
            while($result = pg_fetch_assoc($run)){
                $id = $result["id"];
                $title = $result["title"];
                $link = $result["link"];
                $description = $result["description"];
            parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
?>
              <div class="col-md-4 mt-3">
                <div class="card" style="width: 14rem;">
                  <img src="https://img.youtube.com/vi/<?php echo $my_array_of_vars['v']?>/0.jpg" class="card-img-top" alt="thumbnail">
                  <div class="card-body" style="height:200px">
                    <h6 style="color:#14a800" class="card-title"><?php echo $title?></h6>
                    <?php

$words = explode(" ", $description);
if (count($words) > 10) {
  $description = implode(" ", array_slice($words, 0, 10)) . "...";
?>
                    <p id="description" class="card-text"><?php echo $description?></p>
<?php
}else {
  ?>
                    <p id="description" class="card-text"><?php echo $description?></p>
  <?php
}
?>
                  </div>
                </div>
              </div>

              <?php 

            }
            ?>
            </div>
          </div>
          <div class="col-md-5 mt-3">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                  <h5>Users</h5>
                  </div>
                  <div class="col-8">
                  <div class="btn-toolbar mb-2 mb-md-0 justify-content-end">
                  <button type="button" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                  </button>
                </div>
                  </div>
                </div>
                <canvas class="my-4  w-100" id="myChart" width="500px" height="240"></canvas>
              </div>
            </div>
          </div>
      </div>
      </main>  
    </div>
    </div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>