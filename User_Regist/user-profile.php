<!doctype html>
<head>
  	<title>User Dashboard</title>
    <?php
        $currentPage = 'user_profile';
        include 'header-user.php';
        $dateofbirth = $_SESSION['dateofbirth'];
        $user_dateofbirth = strtotime( $dateofbirth);
        $mysqldatex = date( 'Y-m-d', $dateofbirth )
    ?>
        <header class="pagehead" id="user_write">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-semibold ml3 fadeInUp" style="margin-top: 50px;">Ada Inspirasi Apa Hari ini?, <?php echo $_SESSION['username']; ?> </h1>
                    <hr class="divider light my-4" style="margin-bottom: 15px;">
                    <h4 class="subtitle fadeInDown">"Inspirasi Tidak Akan Menjadi Inspirasi Jika Tidak Ditulis"</h4>
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
                <hr class="divider mx-1 light">
                <form method="POST" action="admin-unggah-proses" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="dateofbirth" value="<?php echo $mysqldatex ?>" readonly>
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
                <hr style="border-top: 1px solid black; margin-bottom:20px; margin-top:30px">
                <h3 class="fadeInDown">Perbarui Password</h3>
                <hr class="divider light mx-1">
                <p>Untuk memberbarui password anda dan memastikan bahwa itu anda, <br>silahkan klik tombol dan menuju ke halaman penggantian password </p>
                <button name="submit-btn" type="submit" class="btn btn-renew" data-toggle="modal" data-target="#exampleModal">
                    Kirim
                </button>
            </div>
        </div>
    </section>

    <?php 
        include'function-scroll-trigger.php';
    ?>
    <script>
        document.getElementById("user_write").style.backgroundImage = "url(../src/img/user-profile.jpg)";
    </script>
</body>
</html> 