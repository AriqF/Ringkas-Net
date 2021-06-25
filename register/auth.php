<?php 

require_once '../Authentication/controllers/authController.php';

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
    header('location:../login/');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <link href="../src/css/signinStyle.css" type="text/css" rel="stylesheet"> 
    
        <!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Epilogue&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>Ringkas.Net - Verifikasi</title>
</head>
<body>

<!-- <form form class="form" action="reset_password.php" method="post"> -->
<div class="content">
            <div class="container" id="box" style="padding: 0; margin-top: 20px;">
                <div class="row">
                    <div class="col-md-6">
                        <!--Form Box-->
                        <?php if(isset($_SESSION['message'])): ?>
                            <div class="alert <?php echo $_SESSION['alert-class']; ?>">
                                <?php 
                                
                                echo $_SESSION['message']; 
                                unset($_SESSION['message']);
                                unset($_SESSION['alert-class']);
                                
                                ?> 
                            </div>
                         <?php endif; ?>
                        <div class="container" id="formBox">
                            <h2>Selamat Datang, <?php echo $_SESSION['username']; ?> </h2>
                            <hr style="border-top: 1px solid white; margin-bottom: 36px;">
                            <div class="w-100"></div>
                            <?php if(!$_SESSION['verified']): ?>
                                <div class="alert alert-warning">
                                    Anda belum memverifikasi email, silahkan cek email anda untuk verifikasi.
                                    Kami telah mengirimkan tautan verifikasi ke email 
                                    <strong><?php echo $_SESSION['email']; ?> </strong>
                                </div>
                    
                            <?php elseif($_SESSION['verified']): ?>

                                <a href="../user/dashboard" style="text-decoration: none;"><button class="btn btn-block btn-lg btn-primary">Masuk &#187</button></a>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                    <!--Image Box-->
                    <div class="col-md-6">
                        <div class="container" id="pictBox">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!--   </form> -->
      <script>
            document.getElementById("pictBox").style.backgroundImage = "url(../src/img/signin-img.jpg)";
        </script>
    
</body>
</html>