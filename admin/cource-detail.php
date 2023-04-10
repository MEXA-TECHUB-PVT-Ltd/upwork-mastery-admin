<?php 
include_once("../include/db.php");
$conn=connect();
$id = $_GET["id"];
$sql = "SELECT * FROM videos WHERE id =$id";
$run = pg_query($conn,$sql);
$result = pg_fetch_assoc($run);
    $id = $result["id"];
    $title = $result["title"];
    $link = $result["link"];
    $description = $result["description"];
parse_str( parse_url( $link, PHP_URL_QUERY ), $my_array_of_vars );
$videoid = $my_array_of_vars['v'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uitheme.net/elomoas/default-course-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Mar 2023 07:57:56 GMT -->
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
                        <div class="col-xl-8 col-xxl-9">
                            <div class="card border-0 mb-0 rounded-lg overflow-hidden">
                                <div class="player shadow-none">
                                    <div id="player"></div>
                                </div>
                            </div>
                            <div class="card d-block border-0 rounded-lg overflow-hidden dark-bg-transparent bg-transparent mt-4 pb-3">
                                <div class="row">
                                    <div class="col-10"><h2 class="fw-700 font-md d-block lh-4 mb-2"><?php echo $title?></h2></div>
                                </div>
                            </div>
                            <div class="card d-block border-0 rounded-lg overflow-hidden p-4 shadow-xss mb-5 mt-4">
                                <h2 class="fw-700 font-sm mb-3 mt-1 pl-1 mb-3">Description</h2>
                                <p class="font-xssss fw-500 lh-28 text-grey-600 mb-0 pl-2"><?php echo $description?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <?php include("../include/footer.php")?>
    </div> 
   
    <?php include("../include/scripts.php")?>
  
    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '450',
          width: '820',
          videoId: '<?php echo $videoid?>',
          playerVars: {
            playsinline: 1,
            rel: 0, 
            showinfo: 0, 
            ecver: 2,
            iv_load_policy: 3 // Disable video suggestions when paused
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>
</body>


<!-- Mirrored from uitheme.net/elomoas/default-course-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Mar 2023 07:58:15 GMT -->
</html>