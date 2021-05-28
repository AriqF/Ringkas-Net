<?php require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reset Password Ringkas.Net</title>
        <?php
            include 'header-signin.php';
        ?>
        <form form class="form" action="reset-password" method="post">
        <div class="content">
            <div class="container slideBoxAnim" id="box" style="padding: 0; margin-top: 20px;">
                <div class="row">
                    <div class="col-md-6">
                        <!--Form Box-->
                        <div class="container" id="formBox">
                            <h2 style="font-weight:bold; letter-spacing:1.5px;">Reset Password</h2>
                            <?php if (count($errors) > 0): ?>
                                     <div class="alert alert-danger">
                                        <?php foreach($errors as $error): ?>
                                        <li><?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                     </div>
                            <?php endif; ?>
                            <p style="font-size: 14px;">Ketikkan password baru anda!</p>
                            <hr style="margin-bottom: 36px;">
                            <div class="w-100"></div>
                            <form>
                                <label class="label control-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="password">
                                <label class="label control-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="passwordConf" placeholder="re-type password">
                                <div class="col text-center" style="margin-top: 240px;">

                               <button name="reset-password-btn" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="startbtn" style="margin-top: 10px;">
                                        Reset
                                    </button>
                                </div>
                            </form>
                            
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
        </form>
        <script>
            document.getElementById("pictBox").style.backgroundImage = "url(../src/img/forgotpass-img.jpg)";
        </script>
    </body>
</html>