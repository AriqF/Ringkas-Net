<!doctype html>
<head>
  	<title>Ringkas.Net - Blog Saya</title>
    <?php
        $currentPage = 'user_blog';
        include 'header-user.php';
        $uid = $_SESSION['uid'];
    ?>
    <header class="pagehead" id="user_write">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-semibold ml3 fadeInUp" style="margin-top: 50px;">List dari Blog kamu, <?php echo $_SESSION['username']; ?></h1>
                    <hr class="divider light my-4" style="margin-bottom: 15px;">
                    <h4 class="subtitle fadeInDown">"Inspirasi Tidak Akan Menjadi Inspirasi Jika Tidak Ditulis"</h4>
                    <p class="subHeader fadeInDown"></p> 
                </div>
            </div>
        </div>
    </header>
    <section class="page-section" id="boxTable">
        <div class="container-fluid">
                <div class="row justify-content-md-center" style="margin-bottom:40px">
                    <form class="form-inline" action="" method="POST">
                        <div class="form-group mb-2">
                            <input name="cari" autocomplete="off" class="form-control mr-sm-2" type="search" placeholder="Cari Blog" aria-label="Search"> 
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <button name="btn-cari"class="btn btn-outline-info my-2 my-sm-0" type="submit" id="search_icon" style="width: fit-content;"><i class="fas fa-search"></i></button>    
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                <table class="table table-striped table-image">
                    <thead >
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
                           $query = "SELECT d.id_blog, d.uid, d.judul, d.penulis, d.isi_blog, d.gambar FROM blog AS d JOIN user AS u ON d.uid = $uid GROUP BY d.judul ORDER BY id_blog ASC;";
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
                            <td style="text-align: center;"><img src="../Authentication/image/<?php echo $row['gambar']; ?>" class="img-fluid img-thumbnail"></td>
                            
                            <td>
                                <a href="edit-blog?id=<?php echo $row['id_blog']; ?>" style="text-decoration:none"> <button name="edit-pass-btn" type="submit" class="btn btn-success btnGal" data-toggle="modal" data-target="#exampleModal" style="margin-top: 10px; border-radius: 5px; width:fit-content" >Edit</button></a>
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
    </section>
    <?php 
        include'function-scroll-trigger.php';
    ?>
    <script>
        document.getElementById("user_write").style.backgroundImage = "url(../src/img/user-think.jpg)";
    </script>
</body>
</html>