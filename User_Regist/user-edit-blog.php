<!doctype html>
<head>
  	<title>Edit Blog </title>
    <?php
        $currentPage = 'user_write_blog'; //rubah sesuai dgn nama halaman, dan tambahkan juga dalam navbar di file header
        include 'header-user.php';

    ?>

<header class="pagehead" id="user_write">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-semibold ml3 fadeInUp" style="margin-top: 50px;">Ada Inspirasi Apa Hari ini?, <?php echo $_SESSION['username']; ?> </h1>
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
                <h2 style="margin-bottom: 12px" class="align-items-center fadeInDown">Perubahan Inspirasi?</h2>
                <p style="font-size: 14px;"></p>
                <hr class="divider mx-1" style="border-top: 3px solid orange">
                <form method="POST" action="function-user-write-blog" enctype="multipart/form-data">
                    <input name="uid" type="text" class="form-control mb-3" value="<?php echo $_SESSION['uid']; ?>" hidden>  
                    <label class="label control-label">Judul Blog</label>
                    <input required type="text" class="form-control mb-3" name="judul" placeholder="Judul ringkas dari blog anda.." value="<?php echo $data['judul']; ?>" maxlength="">
                    <label class="label control-label">Penulis</label>
                    <input readonly type="text" class="form-control mb-3" name="penulis" value="<?php echo $data['penulis']; ?>" maxlength="">
                    <label class="label control-label">Isi Blog</label>
                    <textarea required id="description" rows="5" class="form-control mb-3" name="isi_blog" placeholder="Tuangkan inspirasi ringkas anda disni" style="margin-bottom: 10px;" value="<?php echo $data['isi_blog']; ?>"></textarea> <br>
                    <label for="imageUpload">Unggah Gambar Blog</label>
                    <input required name="gambar" type="file"  class="form-control-file mb-2" id="exampleFormControlFile1" style="cursor: pointer;">                      
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
    <script>
        //merubah background pada div id, hapus komen jika ingin menggunakan script ini
        //document.getElementById("user_write").style.backgroundImage = "url(../src/img/user-write-img.jpg)";
    </script>
</body>
</html>