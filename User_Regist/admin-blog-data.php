<?php  
    require_once 'controllers/authController.php'; 
    $akun = query("SELECT * FROM user");
    $adminCurrentPage = 'blog_data';
?>
<!doctype html>
<html lang="en">
<head>
  	<title>Blog Data</title>
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
                        <th scope="col">Nomor</th>
                        <th scope="col">Judul</th>
                        <!-- <th scope="col">Penulis</th> -->
                        <th scope="col">Isi Blog</th>
                        <th scope="col">Gambar</th>        
                        <th scope="col">Aksi</th>   
                      </tr>
                    </thead>                    
                    <tbody>
                      <?php

                            // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                            $query = "SELECT * FROM blog ORDER BY id_blog ASC";
                            $result = mysqli_query($conn, $query);
                            if (isset($_POST['cari'])) {
                                $result = mysqli_query($conn,"SELECT * FROM blog WHERE judul LIKE '%".$_POST['cari']."%' OR penulis LIKE '%".$_POST['cari']."%'"  );
                            }
                            //mengecek apakah ada error ketika menjalankan query
                            if(!$result){
                                die ("Query Error: ".mysqli_errno($conn).
                                " - ".mysqli_error($conn));
                            }
                            //perulangan untuk element tabel dari data mahasiswa
                            $ID = 1; //variabel untuk membuat nomor urut
                            // hasil query akan disimpan dalam variabel $data dalam bentuk array kemudian dicetak dengan perulangan while
                          
                            while($row = mysqli_fetch_assoc($result))
                            {
                      ?>
                      <tr>
                            <td class="align-middle text-center"><?php echo $ID; ?></td>
                            <td class="align-middle text-center"><?php echo $row['judul']; ?></td>
                            <td hidden class="align-middle text-center"><?php echo $row['penulis']; ?></td>
                            <td class="align-middle text-center"><?php echo substr($row['isi_blog'], 0, 50);?></td>
                            <td style="text-align: center; "><img src="image/<?php echo $row['gambar']; ?>" class="img-fluid img-thumbnail"></td>
                            
                            <td>
                                <a href="user-edit-blog?id=<?php echo $row['id_blog']; ?>" style="text-decoration:none"> <button name="edit-pass-btn" type="submit" class="btn btn-success btnGal" data-toggle="modal" data-target="#exampleModal" style="margin-top: 10px; border-radius: 5px; width:fit-content" >Edit</button></a>
                                <a href="function-user-delete-blog?id=<?php echo $row['id_blog']; ?>" style="text-decoration:none" onclick="return confirm('Anda yakin akan menghapus data ini?')" ><button name="edit-pass-btn" type="submit" class="btn btn-danger btnGal" data-toggle="modal" data-target="#exampleModal" style="margin-top: 10px; border-radius: 5px; width:fit-content">Hapus</button></a> 
                            </td>
                           
                      </tr>
                      <?php
                                $ID++; //untuk nomor urut terus bertambah 1
                            }

                      ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
    <!--end of page content-->

<script src="../src/js/adminScript.js"></script>
</body>
</html>