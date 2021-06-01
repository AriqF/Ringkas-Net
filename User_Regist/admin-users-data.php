<?php  
    require_once 'controllers/authController.php'; 
    $akun = query("SELECT * FROM user");
    $adminCurrentPage = 'users_data';
?>
<!doctype html>
<html lang="en">
<head>
  	<title>Admin Dashboard</title>
    <?php
        include 'header-admin.php';
    ?>
    <!--Page Content-->
    <div id="content" class="p-4 p-md-5 pt-5">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <h2>Account</h2>
                <table class="table table-striped">
                <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>

                    <?php $i = 1 ; ?>

                    <?php foreach ($akun as $row) : ?> 
                    
                    <tbody>
                      <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $row["namalengkap"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["usertype"]; ?></td>
                        <td>Hapus</a></td>
                      </tr>
                    </tbody>

                    <?php $i++; ?>
                    <?php endforeach ; ?>
                </table>
            </div>
        </div>
    </div> 
    <!--end of page content-->

<script src="../src/js/adminScript.js"></script>
</body>
</html>