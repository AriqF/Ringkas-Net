<?php
    require_once '../Authentication/controllers/authController.php'; 

    //user not login
    if (!isset($_SESSION['uid'])) {
        header('location:../login/');
        exit();
    }

    // agar user tidak bisa akses
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    if($_SESSION['usertype'] == "1"){
    header("location: 404");
    }
?>

<html>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- icon -->
    <link rel="icon" type="image/png" href="../src/img/logo-ringkasnet.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!--My css-->
    <link href="../src/css/userStyle.css" type="text/css" rel="stylesheet"> 
    <link href="../src/css/navbarStyle.css" type="text/css" rel="stylesheet"> 
    <link href="../src/css/animation.css" type="text/css" rel="stylesheet"> 
    
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Benne&family=Overpass&family=Poppins&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/babb4f3fd7.js" crossorigin="anonymous"></script>
    
    </head>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-family: 'Benne', serif; font-size:22px; letter-spacing:1px">Ringkas.Net</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0"> 
                        <li class="nav-item"><a class="nav-link" href="javascript:window.history.go(-1);">Kembali</a></li>
                        <li class="nav-item"><a class="nav-link" href="../Authentication/controllers/Logout">Keluar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<?php

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
                echo "<script>alert('Data tidak ditemukan pada database');window.location='user-dashboard';</script>";
            }
        } else {
            // apabila tidak ada data GET id pada akan di redirect ke admin-unggah
            echo "<script>alert('Masukkan data id.');window.location='user-dashboard';</script>";
        }        
        $title = $data['judul'];

        // Popular post
        $row_detail = mysqli_query($conn, "SELECT * FROM blog WHERE id_blog='$id'");
        mysqli_query($conn, "UPDATE blog SET views= views + 1 WHERE id_blog='$id'");
  ?>
<!doctype html>
<head>
  	<title><?php echo $title; ?></title>
    <link href="../src/css/blogStyle.css" type="text/css" rel="stylesheet"> 
    <header class="blog-header text-center">
        <h1 class="blog-title"><?php echo $data['judul']; ?></h1>
        <p class="lead" style="font-size: 16px;"><span style="color: #24C157; font-size: 17px;"><?php echo $data['penulis']; ?></span> &#8231; <?php

        if ($data['modified'] === NULL) {
            $blog_date = date('d/m/Y', strtotime($data['created'])); 
            echo $blog_date;
        }
        else{
            $blog_date = date('d/m/Y', strtotime($data['modified'])); 
            echo $blog_date; 
        }
    
          ?> 
        </p>
        <hr class="divider">
    </header>
    <div class="page-section blog-page">

        <div class="container">
            <img src="../Authentication/image/<?php echo $data['gambar']; ?>" class="img-fluid rounded">
            <p class="blog-content">
                <?php echo $data['isi_blog']; ?>
            </p>
        </div>
    </div>  
    <?php 
        include'../user/function-scroll-trigger.php';
    ?>
    <script>
         document.getElementById("img-block").style.backgroundImage = "url(../src/img/signin-img.jpg)";
        //merubah background pada div id, hapus komen jika ingin menggunakan script ini
        //document.getElementById("user_write").style.backgroundImage = "url(../src/img/user-write-img.jpg)";
    </script>
</body>
</html>