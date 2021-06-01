<!doctype html>
<head>
  	<title>Edit Blog </title>
    <?php
        $currentPage = 'user_write_blog'; //rubah sesuai dgn nama halaman, dan tambahkan juga dalam navbar di file header
        include 'header-user.php';
        // mengecek apakah di url ada nilai GET id
        if (isset($_GET['id'])) {
            // ambil nilai id dari url dan disimpan dalam variabel $id
            $id = ($_GET['id']);

            // menampilkan data dari database yang mempunyai id=$id
            $query = "SELECT * FROM blog WHERE id_blog='$id'";
            $result = mysqli_query($conn, $query);
            // jika data gagal diambil maka akan tampil error berikut
            if(!$result){
            die ("Query Error: ".mysqli_errno($conn).
                " - ".mysqli_error($conn));
            }
            // mengambil data dari database
            $data = mysqli_fetch_assoc($result);
            // apabila data tidak ada pada database maka akan dijalankan perintah ini
            if (!count($data)) {
                echo "<script>alert('Data tidak ditemukan pada database');window.location='admin-gallery-data';</script>";
            }
        } else {
            // apabila tidak ada data GET id pada akan di redirect ke admin-unggah
            echo "<script>alert('Masukkan data id.');window.location='admin-gallery-data';</script>";
        }    
    ?>

<header class="pagehead" id="user_write">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-semibold ml3 fadeInUp" style="margin-top: 50px;">Perubahan Inspirasi? <?php echo $_SESSION['username']; ?> </h1>
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
                <h2 style="margin-bottom: 12px" class="align-items-center fadeInDown">Inspirasi Apa Yang Ingin Anda Ubah?</h2>
                <p style="font-size: 14px;"></p>
                <hr class="divider mx-1" style="border-top: 3px solid orange">
                <form method="POST" action="function-user-edit-blog" enctype="multipart/form-data">
                    <input name="id" type="text" class="form-control mb-3" value="<?php echo $data['id_blog']; ?>" hidden>  
                    <label class="label control-label">Judul Blog</label>
                    <input type="text" class="form-control mb-3" name="judul" placeholder="Judul ringkas dari blog anda.." value="<?php echo $data['judul']; ?>" maxlength="">
                    <label class="label control-label">Penulis</label>
                    <input readonly type="text" class="form-control mb-3" name="penulis" value="<?php echo $data['penulis']; ?>" maxlength="">
                    <label class="label control-label">Isi Blog</label>
                    <textarea id="description" rows="5" class="form-control mb-3" name="isi_blog" placeholder="Tuangkan inspirasi ringkas anda disni" style="margin-bottom: 10px;"><?php echo $data['isi_blog']; ?></textarea> <br>
                    <label for="imageUpload">Unggah Gambar Blog</label>
                    <div class="w-100"></div>
                    <img src="image/<?php echo $data['gambar']; ?>" class="rounded float-start" style="width: 120px;margin-bottom: 15px;">
                    <input name="gambar" type="file"  class="form-control-file mb-2" id="exampleFormControlFile1" style="cursor: pointer;">                      
                    <button name="submit-btn" type="submit" class="btn btn-upload" data-toggle="modal" data-target="#exampleModal">
                        Ubah
                    </button>
                </form>
            </div>
        </div>
    </section>

    
    <?php 
        include'function-scroll-trigger.php';
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //merubah background pada div id, hapus komen jika ingin menggunakan script ini
        //document.getElementById("user_write").style.backgroundImage = "url(../src/img/user-write-img.jpg)";
/*         $(document).ready(function() {
            Swal.fire(
                'Panduan Merubah Blog',
                'Jika terdapat tag HTML seperti "< p > < /p >", anda bisa menhiraukan tag tersebut. Terkecuali jika anda ingin merubah bersama dengan tag HTML nya',
                'question'
            )
        }); */

    </script>
    <script>
        // replace <textarea id="editor1"> with a ckeditor
        // instance ,using default config
        CKEDITOR.replace('description');
    </script>
</body>
</html>