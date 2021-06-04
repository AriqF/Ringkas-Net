<!doctype html>
<head>
  	<title>Ringkas.Net - Profil</title>
    <?php
        $currentPage = 'user_profile';
        include 'header-user.php';

        // Forgot Pass
        $email = $_SESSION['email'];
        if (isset($_POST['forgot-pass'])) {
        $mail = $_POST['mail'];

        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = "<font color='red'; > Email Address Is Invalid </font>";
        }
        if (empty($email)) {
            $errors['mail'] = "<font color='red'; > Email Required </font>";
        }
        if (count($errors) === 0) {
            $sql = "SELECT * FROM user WHERE email='$email' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);
            $token = $user['token'];
            SendPasswordResetLink($email, $token);
        }
    }
    ?>
        <header class="pagehead" id="user_write">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-semibold ml3 fadeInUp" style="margin-top: 50px;">User Profile | <?php echo $_SESSION['username']; ?></h1>
                    <hr class="text-divider mx-auto" style="margin-bottom: 15px;">
                    <h4 class="subtitle fadeInDown"></h4>
                    <p class="subHeader fadeInDown"></p> 
                </div>
            </div>
        </div>
    </header>
    <section class="page-section" id="boxForm">
        <div class="container-fluid">
            <div class="container">
                <h3 style="margin-bottom: 12px" class="align-items-center fadeInUp">Data Profil</h3>
                <p style="font-size: 14px;"></p>
                <hr class="text-divider mx-1">
                <?php 
                    $dateofbirth = strtotime($_SESSION['dateofbirth']);

                ?>
                <form method="POST" enctype="multipart/form-data">
                    <label class="label control-label">Nama Lengkap</label>
                    <input type="text" class="form-control mb-3" name="namalengkap" value="<?php echo $_SESSION['namalengkap']; ?>" readonly>
                    <div class="row">
                        <div class="col">
                            <label class="label control-label">Email</label>
                            <input type="text" class="form-control mb-3" name="email" value="<?php echo $_SESSION['email']; ?>" readonly>
                        </div>
                        <div class="col">
                            <label class="label control-label">Username</label>
                            <input type="text" class="form-control mb-3" name="username" value="<?php echo $_SESSION['username']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="label control-label">Tanggal Lahir</label> <!--masih ngebug-->
                            <input type="text" class="form-control" name="dateofbirth" value="<?php echo date('Y-m-d', $_SESSION['dateofbirth']); ?>" readonly>
                        </div>
                        <div class="col">
                            <label class="label control-label">Nomor Handphone</label>
                            <input type="text" class="form-control mb-3" name="phone_number" value="<?php echo $_SESSION['phone_number']; ?>" readonly>
                        </div>
                    </div>
                    <button name="submit-btn" type="submit" class="btn btn-upload" data-toggle="modal" data-target="#exampleModal">
                        Perbarui
                    </button>
                </form>

                <h3 class="fadeInDown" style="margin-bottom:20px; margin-top:30px;">Perbarui Password</h3>
                <hr class="text-divider mx-1">
                <p>Untuk memberbarui password anda dan memastikan bahwa itu anda, <br>silahkan klik tombol dan menuju ke halaman penggantian password </p>
                <form action="" method="POST">
                    <button name="forgot-pass" onclick="runAlert()" type="submit" class="btn btn-renew" data-toggle="modal" data-target="#exampleModal"><input type="text" class="form-control" name="mail"  value="<?php echo $_SESSION['email']; ?> " hidden>
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </section>

    <?php 
        include'function-scroll-trigger.php';
    ?>
    <script>
        document.getElementById("user_write").style.backgroundImage = "url(../src/img/user-profile.jpg)";
    </script>
    <!--import sweet alert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
     <script>
        function runAlert(){
        Swal.fire(
        'Silahkan cek email anda!',
        'Kami telah mengirim link untuk mereset password anda.',
        'success'
        ).then(function(){
            window.location.replace("user-profile");
        })
        };
    </script>
</body>
</html> 