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
    header('location:login');
    exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ringkas.Net - Verifikasi</title>
        <?php
            include 'header-signin.php';
        ?>
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

                                <a href="dashboard_user" style="text-decoration: none;"><button class="btn btn-block btn-lg btn-primary">Masuk &#187</button></a>
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