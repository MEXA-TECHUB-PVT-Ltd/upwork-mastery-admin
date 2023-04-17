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
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="row">
            <div class="col-6">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 style="color:#14a800" class="h2">Profile</h1>
              </div>
          </div>
          <div class="col-6">
          <div class="row">
            <div class="col-lg-12 pt-4 mb-3 d-flex justify-content-end">
                <button href="#" class="border-0 fw-600 btn btn-primary " data-toggle="modal" data-target="#Modallogin">Update Profile</button>
                <button href="#" class="border-0 fw-600 btn btn-primary mx-3" data-toggle="modal" data-target="#Modallogin">Update Password</button>
            </div>
        </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <div class="mb-5">
                                        <input type="email" placeholder="Username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-5">
                                        <input type="text" placeholder="Email" class="form-control"  id="exampleInputPassword1">
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-5">
                                        <input type="date" placeholder="Date Of Birth" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                      </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="mb-5">
                                        <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                          </form>
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