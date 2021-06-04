<?php  
    require_once 'controllers/authController.php'; 
    $akun = query("SELECT * FROM rating");
    $adminCurrentPage = 'rating_data';
?>
<!doctype html>
<html lang="id">
<head>
  	<title>Admin - Data Pengguna</title>
    <?php
        include 'header-admin.php';
    ?>
    <!--Page Content-->
    <div id="content" class="p-4 p-md-5 pt-5">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <h2>Data Pengguna</h2>
                <table class="table table-striped">
                <thead>
                      <tr>
                        <th class="align-middle text-center" scope="col">No</th>
                        <th class="align-middle text-center" scope="col">Rating</th>
                        <th class="align-middle text-center" scope="col">Komentar</th>
                        <th class="align-middle text-center" scope="col">Nama Penilai</th>
                        <th class="align-middle text-center" scope="col">Timestamps</th>
                        <th class="align-middle text-center" scope="col">Aksi</th>
                      </tr>
                    </thead>

                    <?php $i = 1 ; ?>

                    <?php foreach ($akun as $row) : ?> 
                    
                    <tbody>
                      <tr>
                        <th class="align-middle text-center" scope="row"><?= $i; ?></th>
                        <td class="align-middle text-center"><?= $row["rating"]; ?></td>
                        <td class="align-middle text-center"><?= $row["komentar"]; ?></td>
                        <td class="align-middle text-center"><?= $row["namapenilai"]; ?></td>
                        <td class="align-middle text-center"><?= $row["timestamp"]; ?></td>
                        <td class="align-middle text-center">
                          <a href="#" style="text-decoration:none" onclick="return confirm('Anda yakin akan menghapus data ini?')" >
                                <button name="edit-pass-btn" type="submit" class="btn btn-danger btn-action" data-toggle="modal" data-target="#exampleModal">Hapus</button>
                            </a> 
                        </td>
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