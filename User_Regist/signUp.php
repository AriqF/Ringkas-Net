<?php
 require_once 'controllers/authController.php'; 

 if(isset($_SESSION['uid'])){
    header("location: 404");
    }

 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Ringkas.Net</title>
        <?php
            include 'header-signin.php';
        ?>
        <form form class="form" action="signUp" method="post">
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
                                    <a href="signIn">saya sudah memiliki akun &#10003;</a>
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