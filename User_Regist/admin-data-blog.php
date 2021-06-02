<?php  
    require_once 'controllers/authController.php'; 
    $data_blog = query("SELECT d.id_blog, d.uid, d.judul, d.penulis, d.isi_blog, d.gambar FROM blog AS d JOIN user AS u GROUP BY d.judul ORDER BY id_blog ASC;");
    $adminCurrentPage = 'data_blog';
?>
<!doctype html>
<html lang="id">
<head>
  	<title>Admin - Data Blog</title>
    <?php
        include 'header-admin.php';
    ?>
    <!--Page Content-->
    <div id="content" class="p-4 p-md-5 pt-5">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <h2>Data Blog</h2>
                <table class="table table-striped">
                <thead>
                      <tr>
                        <th class="align-middle text-center" scope="col">No</th>
                        <th class="align-middle text-center" scope="col">ID blog</th>
                        <th class="align-middle text-center" scope="col">Penulis</th>
                        <th class="align-middle text-center" scope="col">Judul</th>
                        <th class="align-middle text-center" scope="col">Isi Blog</th>
                        <th class="align-middle text-center" scope="col">Gambar</th>
                        <th class="align-middle text-center" scope="col">Aksi</th>
                      </tr>
                    </thead>

                    <?php $i = 1 ; ?>

                    <?php foreach ($data_blog as $row) : ?> 
                    
                    <tbody>
                      <tr>
                        <th class="align-middle text-center" scope="row"><?= $i; ?></th>
                        <td class="align-middle text-center"><?= $row["id_blog"]; ?></td>
                        <td class="align-middle text-center"><?= $row["penulis"]; ?></td>
                        <td class="align-middle text-center"><?= $row["judul"]; ?></td>
                        <td class="align-middle text-center"><?= substr($row["isi_blog"], 0, 50); ?></td>
                        <td class="align-middle text-center"><img src="image/<?php echo $row['gambar']; ?>" class="img-thumbnail img-fluid w-50"> </td>
                        <td class="align-middle text-center">
                            <a href="#" style="text-decoration:none"> 
                                <button name="edit-pass-btn" type="submit" class="btn btn-success btn-action" data-toggle="modal" data-target="#exampleModal" style="padding: 6px 23px">Edit</button>
                            </a>    
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