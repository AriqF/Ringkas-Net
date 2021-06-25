<?php  
    require_once '../Authentication/controllers/authController.php'; 
    $akun = query("SELECT * FROM user WHERE usertype = 1");
    $adminCurrentPage = 'users_data';
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
                        <th class="align-middle text-center" scope="col">uid</th>
                        <th class="align-middle text-center" scope="col">Username</th>
                        <th class="align-middle text-center" scope="col">Nama Lengkap</th>
                        <th class="align-middle text-center" scope="col">E-mail</th>
                        <th class="align-middle text-center" scope="col">Tanggal Lahir</th>
                        <th class="align-middle text-center" scope="col">No. Telp</th>
                        <th class="align-middle text-center" scope="col">Hak Akses</th>
                        <th class="align-middle text-center" scope="col">Aksi</th>
                      </tr>
                    </thead>

                    <?php $i = 1 ; ?>

                    <?php foreach ($akun as $row) : 
                      if($row["usertype"] == '0'){
                        $usertype = 'admin';
                      }
                      else if($row["usertype"] == '1'){
                        $usertype = 'user';
                      }
                      
                      ?> 
                    
                    
                    <tbody>
                      <tr>
                        <th class="align-middle text-center" scope="row"><?= $i; ?></th>
                        <td class="align-middle text-center"><?= $row["uid"]; ?></td>
                        <td class="align-middle text-center"><?= $row["username"]; ?></td>
                        <td class="align-middle text-center"><?= $row["namalengkap"]; ?></td>
                        <td class="align-middle text-center"><?= $row["email"]; ?></td>
                        <td class="align-middle text-center"><?= $row["dateofbirth"]; ?></td>
                        <td class="align-middle text-center"><?= $row["phone_number"]; ?></td>
                        <td class="align-middle text-center"><?= $usertype; ?></td>
                        <td class="align-middle text-center">
                          <a href="function-admin-delete-user?id=<?php echo $row['uid']; ?>" style="text-decoration:none" onclick="return confirm('Anda yakin akan menghapus data ini?')">
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