<?php
        $currentPage = 'user_read_blog'; //rubah sesuai dgn nama halaman, dan tambahkan juga dalam navbar di file header
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
        $title = $data['judul'];
  ?>
<!doctype html>
<head>
  	<title><?php echo $title; ?></title>
    <link href="../src/css/blogStyle.css" type="text/css" rel="stylesheet"> 
    <header class="blog-header text-center">
        <h1 class="blog-title"><?php echo $data['judul']; ?></h1>
        <p class="lead" style="font-size: 16px;"><span style="color: #24C157; font-size: 17px;"><?php echo $data['penulis']; ?></span> &#8231; 22/01/87</p>
        <hr class="divider">
    </header>
    <div class="page-section blog-page">

        <div class="container">
            <img src="image/<?php echo $data['gambar']; ?>" class="img-fluid rounded">
            <p class="blog-content">
                <?php echo $data['isi_blog']; ?>
            </p>
        </div>
    </div>  
    <?php 
        include'function-scroll-trigger.php';
    ?>
    <script>
         document.getElementById("img-block").style.backgroundImage = "url(../src/img/signin-img.jpg)";
        //merubah background pada div id, hapus komen jika ingin menggunakan script ini
        //document.getElementById("user_write").style.backgroundImage = "url(../src/img/user-write-img.jpg)";
    </script>
</body>
</html>