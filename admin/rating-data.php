<?php  
    require_once '../Authentication/controllers/authController.php'; 
    $akun = query("SELECT * FROM rating");
    $adminCurrentPage = 'rating_data';
?>
<!doctype html>
<html lang="id">
<head>
  	<title>Admin - Data Feedback</title>
    <?php
        include 'header-admin.php';
    ?>
    <!--Page Content-->
    <div id="content" class="p-4 p-md-5 pt-5">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <h2>Data Feedback</h2>
                <table class="table table-striped">
                <thead>
                      <tr>
                        <th class="align-middle text-center" scope="col">No</th>
                        <th class="align-middle text-center" scope="col">Rating</th>
                        <th class="align-middle text-center" scope="col">Komentar</th>
                        <th class="align-middle text-center" scope="col">Nama Penilai</th>
                        <th class="align-middle text-center" scope="col">Timestamps</th>
                      </tr>
                    </thead>

                    <?php $i = 1 ; ?>

                    <?php foreach ($akun as $row) : ?> 
                    
                    <tbody>
                      <tr>
                        <th class="align-middle text-center" scope="row"><?= $i; ?></th>
                        <td class="align-middle text-center"><?= $row["rating"]; ?></td>
                        <td class="align-middle text-center"><?= $row["komentar"]; ?></td>
                        <td class="align-middle text-center"><?= $row["nama_penilai"]; ?></td>
                        <td class="align-middle text-center"><?= $row["timestamp"]; ?></td>
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