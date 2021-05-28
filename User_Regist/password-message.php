<?php require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pesan Reset Password Ringkas.Net</title>
        <?php
            include 'header-signin.php';
        ?>
        <!-- <form form class="form" action="reset_password.php" method="post"> -->
        <body>
        <div class="content">
            <div class="container" id="box" style="padding: 0; margin-top: 20px;">
                <div class="row">
                    <div class="col-md-6">
                        <!--Form Box-->
                        <div class="container" id="formBox">
                            <h2>Cek Email anda</h2>
                            <hr style="border-top: 1px solid white; margin-bottom: 36px;">
                            <div class="w-100"></div>
                                <div class="alert alert-warning">
                                    Email telah dikirimkan untuk mereset password anda.
                                </div>
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
         <script>
            document.getElementById("pictBox").style.backgroundImage = "url(../src/img/forgotpass-img.jpg)";
        </script>
    </body>
</html>