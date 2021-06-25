<?php

require_once '../Authentication/controllers/authController.php'; 

if(isset($_SESSION['uid'])){
    header("location: ../404");
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
    <title>Daftar Ringkas.Net</title>
</head>
<body>
<form form class="form" action="" method="post">
        <div class="content">
            <div class="container slideBoxAnim" id="box" style="padding: 0; margin-top: 20px;">
                <div class="row">
                    <div class="col-md-6">
                        <!--Form Box-->
                        <div class="container" id="formBox">
                            <h2 style="font-weight:bold; letter-spacing:1.5px;">Sign Up Forms</h2>
                            <p style="font-size: 14px;">Daftar dan mulailah menginspirasi!</p>
                            <?php if (count($errors) > 0): ?>
                                             <div class="alert alert-danger">
                                                <?php foreach($errors as $error): ?>
                                                <li><?php echo $error; ?></li>
                                                <?php endforeach; ?>
                                             </div>
                            <?php endif; ?>
                            <hr style="margin-bottom: 15px;">
                            <form>
                                <label class="label control-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="namalengkap" placeholder="nama lengkap">

                                <label class="label control-label">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="username">
                                
                                <label class="label control-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="email">
                                <div class="row">
                                    <div class="col-6 ">
                                    <label class="label control-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="dateofbirth">
                                    </div>
                                    <div class="col-6 ">
                                        <label class="label control-label">Nomor Handphone</label>
                                        <input type="number" class="form-control" name="phone_number" placeholder="+62xxxxxx">

                                    </div>
                                </div>

                                <label class="label control-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="password">
                                <label class="label control-label">Confirm Password</label>
                                <input type="password" class="form-control" name="passwordConf" placeholder="confirm password">

                              
                                <input type="hidden" class="form-control" name="usertype" value="1">

                                <div class="col text-center" style="margin-top: 15px;">
                                    <a href="../login/">saya sudah memiliki akun &#10003;</a>
                                    <div class="w-100"></div>
                                    <button name="signup-btn" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="startbtn" style="margin-top: 10px;">
                                        Daftar
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
            document.getElementById("pictBox").style.backgroundImage = "url(../src/img/signup-img.jpg)";
        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            Swal.fire(
            'Ketentuan Daftar',
            '<ul> <li>Isilah nama lengkap anda dengan benar </li>  <li>Pastikan Username yang anda buat <i>unik</i></li> <li>Isilah email anda dengan benar yang belum pernah terdaftar pada website ini </li> <li>Isilah Tanggal Lahir anda dengan benar </li> <li>Isilah Nomor Telepon anda dengan benar </li> <li>Pastikan menggunakan password dengan kombinasi yang kuat </li></ul>',
            'question'
            )
        });
    </script>
    
</body>
</html>