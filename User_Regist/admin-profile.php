<?php  
    require_once 'controllers/authController.php'; 
    $adminCurrentPage = 'profile-admin';
    $uid = $_SESSION['uid'];
    $queryDate = query("SELECT dateofbirth FROM user WHERE uid='$uid'");
    foreach ($queryDate as $row) :
        $userBirth = date( 'd-m-Y', strtotime($row["dateofbirth"]));
    endforeach;

    $uid = $_SESSION['uid'];
        $queryDate = query("SELECT dateofbirth FROM user WHERE uid='$uid'");
        foreach ($queryDate as $row) :
            $userBirth = date( 'd-m-Y', strtotime($row["dateofbirth"]));
        endforeach;
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

<!doctype html>
<html lang="id">
<head>
  	<title>Admin - Profile</title>
    <?php
        include 'header-admin.php';
    ?>
    <!--Page Content-->
    <div id="content" class="p-4 p-md-5 pt-5">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <h2>Admin Profile</h2>
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
                            <input type="text" class="form-control mb-3" name="username" value="<?php echo $_SESSION['username']; ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="label control-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" name="dateofbirth" value="<?php echo $userBirth; ?>" readonly>
                        </div>
                        <div class="col">
                            <label class="label control-label">Nomor Handphone</label>
                            <input type="text" class="form-control mb-3" name="phone_number" value="<?php echo $_SESSION['phone_number']; ?>" readonly>
                        </div>
                    </div>
                    <h3 class="fadeInDown" style="margin-bottom:20px; margin-top:30px;">Perbarui Password</h3>
                    <hr class="text-divider mx-1">
                    <p>Untuk memberbarui password anda dan memastikan bahwa itu anda, <br>silahkan klik tombol dan menuju ke halaman penggantian password </p>
                    <button name="forgot-pass" onclick="runAlert()" type="submit" class="btn-renew" data-toggle="modal" data-target="#exampleModal"><input type="text" class="form-control" name="mail"  value="<?php echo $_SESSION['email']; ?> " hidden>
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </div> 
    <!--end of page content-->

<script src="../src/js/adminScript.js"></script>
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