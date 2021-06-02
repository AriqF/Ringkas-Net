<?php  
    require_once 'controllers/authController.php'; 
    $data_blog = query("SELECT d.id_blog, d.uid, d.judul, d.penulis, d.isi_blog, d.gambar FROM blog AS d JOIN user AS u GROUP BY d.judul ORDER BY id_blog ASC;");
    $adminCurrentPage = 'users_data';
?>
<!doctype html>
<html lang="id">
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
                        <th scope="col">ID blog</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Isi Blog</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>

                    <?php $i = 1 ; ?>

                    <?php foreach ($akun as $row) : ?> 
                    
                    <tbody>
                      <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td class="align-middle text-center"><?= $row["id_blog"]; ?></td>
                        <td class="align-middle text-center"><?= $row["penulis"]; ?></td>
                        <td class="align-middle text-center"><?= $row["judul"]; ?></td>
                        <td class="align-middle text-center"><?= $row["isi_blog"]; ?></td>
                        <td class="align-middle text-center"><?= $row["gambar"]; ?></td>
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