<?php

require_once '../Authentication/controllers/authController.php'; 
if(isset($_SESSION['uid'])){
    header("location: 404");
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
    <title>Masuk Ringkas.Net</title>
</head>
<body>
<form form class="form" action="" method="post">
        <div class="content">
            <div class="container slideBoxAnim" id="box" style="padding: 0; margin-top: 20px;">
                <div class="row">
                    <div class="col-md-6">
                        <!--Form Box-->
                        <div class="container" id="formBox">
                            <h2 style="font-weight:bold; letter-spacing:1.5px;">Login Forms</h2>
                            <p style="font-size: 16px;">Login dan berbagilah inspirasi!</p>
                            <?php if (count($errors) > 0): ?>
                                     <div class="alert alert-danger">
                                        <?php foreach($errors as $error): ?>
                                        <li><?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                     </div>
                            <?php endif; ?>
                            <hr style="margin-bottom: 36px;">
                            
                            <div class="w-100"></div>
                            <form>
                                <label class="label control-label">Username atau Email</label>
                                <input type="text" class="form-control" name="username" placeholder="username" value="<?php echo $username; ?>">
                                <label class="label control-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="password">

                                <input type="hidden" class="form-control" name="usertype" value="1">

                                <div class="col text-center" style="margin-top: 210px;">
                                    <br>
                                    <a href="../register/">saya belum memiliki akun</a> <a href="../forgot-password/"> / lupa password?</a>
                                    <div class="w-100"></div>
                                    <button name="login-btn" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="startbtn" style="margin-top: 10px;">
                                        Masuk
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
            document.getElementById("pictBox").style.backgroundImage = "url(../src/img/signin-img.jpg)";
        </script>
    
</body>
</html>