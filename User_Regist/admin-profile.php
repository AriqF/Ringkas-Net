<?php  
    require_once 'controllers/authController.php'; 
    $adminCurrentPage = 'profile-admin';
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
            </div>
        </div>
    </div> 
    <!--end of page content-->

<script src="../src/js/adminScript.js"></script>
</body>
</html>