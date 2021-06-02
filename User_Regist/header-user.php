<?php

require_once 'controllers/authController.php'; 

// verify user token
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
}

// verify user token from forgot password
if (isset($_GET['password-token'])) {
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
}
//user not login
if (!isset($_SESSION['uid'])) {
    header('location:signIn');
    exit();
}

// agar selain user tidak bisa akses
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if($_SESSION['usertype'] == "0"){
header("location: 404");
}

?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- icon -->
    <link rel="icon" type="image/png" href="../src/img/logo-ringkasnet.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!--My css-->
    <link href="../src/css/userStyle.css" type="text/css" rel="stylesheet"> 
    <link href="../src/css/navbarStyle.css" type="text/css" rel="stylesheet"> 
    <link href="../src/css/animation.css" type="text/css" rel="stylesheet"> 
    
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Benne&family=Overpass&family=Poppins&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/babb4f3fd7.js" crossorigin="anonymous"></script>

    <!-- Add Ckeditor -->
    <script src="../src/ckeditor/ckeditor.js"></script>
    
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-family: 'Benne', serif; font-size:22px; letter-spacing:1px">Ringkas.Net</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if($currentPage =='user_home'){echo 'active';}?>" href="user-dashboard">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php if($currentPage =='user_write_blog' || $currentPage == 'user_blog'){echo 'active';}?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blog Saya
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item <?php if($currentPage =='user_write_blog'){echo 'active';}?>" href="user-write-blog">Menulis</a>
                            <a class="dropdown-item <?php if($currentPage =='user_blog'){echo 'active';}?>" href="user-blog">Blog Saya</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($currentPage =='user_profile'){echo 'active';}?>" href="user-profile">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($currentPage =='user_rate'){echo 'active';}?>" href="user-feedback">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index1?logout=1">Keluar</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script>
            $(".nav .nav-link").on("click", function(){
            $(".nav").find(".active").removeClass("active");
            $(this).addClass("active");
            });
        </script>