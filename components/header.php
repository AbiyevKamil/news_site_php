<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <!-- Meta -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <!-- favicon -->
  <link rel="icon" sizes="16x16" href="public/assets/img/favicon.png" />

  <!-- Title -->
  <title>News Site</title>

  <!-- Font Google -->
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet" />
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS Plugins -->
  <link rel="stylesheet" href="public/assets/css/all.css" />
  <link rel="stylesheet" href="public/assets/css/elegant-font-icons.css" />
  <link rel="stylesheet" href="public/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="public/assets/css/owl.carousel.css" />
  <!-- main style -->
  <link rel="stylesheet" href="public/assets/css/style.css" />
  <link rel="stylesheet" href="public/assets/css/custom.css" />
  <link rel="stylesheet" href="public/assets/css/site.css" />
</head>

<body>
  <!--loading -->
  <div class="loading">
    <div class="circle"></div>
  </div>
  <!--/-->

  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <!--logo-->
      <div class="logo">
        <a href="index.php">
          <img src="public/assets/img/logo-dark.png" alt="" class="logo-dark" />
          <img src="public/assets/img/logo-white.png" alt="" class="logo-white" />
        </a>
      </div>
      <!--/-->

      <!--navbar-collapse-->
      <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav ml-auto mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"> Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php"> Contact </a>
          </li>
          <?php if (isset($_SESSION["uid"])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="addNews.php">Add News</a>
            </li>
          <?php } ?>
        </ul>
      </div>
      <!--/-->

      <?php
      if (!isset($_SESSION['uid'])) {
      ?>
        <!--navbar-right-->
        <div class="navbar-right ml-auto">
          <div class="">
            <ul style="padding: 0 !important" class="navbar-nav d-flex flex-row align-items-center justify-content-center">
              <li class="nav-item m-0">
                <a class="nav-link m-0" href="login.php"> Login </a>
              </li>
              <li class="nav-item m-0 mr-3">
                <a class="nav-link" href="register.php"> Register </a>
              </li>
            </ul>
          </div>
          <div class="theme-switch-wrapper">
            <label class="theme-switch" for="checkbox">
              <input type="checkbox" id="checkbox" />
              <div class="slider round"></div>
            </label>
          </div>
          <div class="search-icon">
            <i class="icon_search"></i>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      <?php
      } else {
      ?>
        <!--navbar-right-->
        <div class="navbar-right ml-auto">
          <div class="">
            <ul style="padding: 0 !important" class="navbar-nav d-flex flex-row align-items-center justify-content-center">
              <li class="nav-item m-0">
                <form method="POST" action="auth/logout.php">
                  <button class="mr-3 btn btn-sm btn-danger" type="submit">Logout</button>
                </form>
              </li>
              <li class="nav-item m-0 mr-3">
                <a class="nav-link" href="profile.php"> <?= $_SESSION['username'] ?></a>
              </li>
            </ul>
          </div>
          <div class="theme-switch-wrapper">
            <label class="theme-switch" for="checkbox">
              <input type="checkbox" id="checkbox" />
              <div class="slider round"></div>
            </label>
          </div>
          <div class="search-icon">
            <i class="icon_search"></i>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      <?php
      }
      ?>
  </nav>
  <!--/-->
</body>

</html>
</body>

</html>