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

// agar user tidak bisa akses
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if($_SESSION['usertype'] == "1"){
header("location: 404");
}

?>
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
	<link href="../src/css/adminStyle.css" type="text/css" rel="stylesheet"> 

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/babb4f3fd7.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
			<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
        <div class="p-4">
            <h1><a href="index.html" class="logo">Ringkas.Net <span>Dimana Inspirasi Berada</span></a></h1>
			<hr style="border-top: 1px solid white; margin-bottom: 12px;">
			<h4 style="color: white;">Selamat Datang!</h4>
			<p class="sign"><?php echo $_SESSION['username']; ?></p> <!--add username-->
			
	        <ul class="list-unstyled components mb-5">
	          <li class="<?php if($adminCurrentPage == 'admin_dashboard'){echo 'active';}?>">
                <a href="admin-dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
	          </li>
	          <li>
                <a href="#"><i class="fas fa-newspaper"></i> Blogs</a>
	          </li>
	          <li>
                <a href="#"><i class="fas fa-folder-open"></i> Data Blog</a>
	          </li>
	          <li class="<?php if($adminCurrentPage == 'users_data'){echo 'active';}?>">
                <a href="admin-users-data"><i class="fas fa-users"></i> Data Pengguna</a>
	          </li>
	          <li>
                <a href="#"><i class="fas fa-star-half-alt"></i> Data Penilaian</a>
	          </li>
	          <li>
                <a href="#"><i class="fas fa-id-card"></i> Profil</a>
	          </li>
			  <li>
                <a href="index1?logout=1"><i class="fas fa-sign-out-alt"></i> Keluar</a>
	          </li>
	        </ul>
        </div>
    </nav>  