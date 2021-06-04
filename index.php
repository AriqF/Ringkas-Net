<?php  

	session_start();	
    require 'User_Regist/config/db.php';
?>

<html>
    <head>
        <title>Ringkas.Net - Dimana Inspirasi Ringkas Bisa Didapatkan</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- icon -->
        <link rel="icon" type="image/png" href="src/img/logo-ringkasnet.png">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <!--My css-->
        <link href="src/css/indexStyle.css" type="text/css" rel="stylesheet"> 
        <link href="src/css/navbarStyle.css" type="text/css" rel="stylesheet"> 
        <link href="src/css/animation.css" type="text/css" rel="stylesheet"> 
        
        <!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Benne&family=Overpass&family=Poppins&display=swap" rel="stylesheet">

        <script src="https://kit.fontawesome.com/babb4f3fd7.js" crossorigin="anonymous"></script>
    </head>
    <body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-family: 'Benne', serif; font-size:22px; letter-spacing:1px">Ringkas.Net</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about" onclick="aboutBoxAnim()">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#trending" onclick="serviceBoxAnim()">Sedang Populer</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#blog" onclick="blogBoxAnim()">Blog</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact" onclick="contactBoxAnim()">Kontak</a></li>
                        <?php  
                            $url = "User_Regist/controllers/Logout.php";     
                            ?>

                           <?php if ( !isset($_SESSION["uid"])) { ?>
                                <li class="nav-item"><a class="nav-link" href="User_Regist/signIn">Masuk</a></li>
                            

                            <?php }else{ ?>
                                <li class="nav-item"><a class="nav-link" href="User_Regist/controllers/Logout">Keluar</a></li>
                            <?php } ?>
                        
                        </li>
                        <?php if ( !isset($_SESSION["uid"])) { ?>
                            <li class="nav-item"><a class="nav-link" href="User_Regist/signUp">Daftar</a></li>
                        

                        <?php }else{ ?>
                        <?php } ?>
                        
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="pagehead">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 text-center">
                        <h1 class="font-weight-semibold ml3 fadeInUp">Sebuah Blog Dimana Inspirasi Datang</h1>
                        <hr class="divider light my-4">
                        <p class="subHeader fadeInDown">Ringkas.Net Ialah Sebuah Blog Dimana User Dapat Menulis Dan Berbagi Inspirasi Satu Dengan Lainnya</p>
                        <a href="#about" class="btn btn-xl js-scroll-trigger" role="button" id="btn_about">Tentang Kami</a>
                    </div>
                </div>
            </div>
        </header>
        
        <!--about-->
        <section class="about" id="about" style="padding-top: 60px; padding-bottom:80px">
            <div class="container" >
                <div class="row align-items-center">
                    <div class="col-12 align-middle text-center">
                        <h2 class="text-white mt-0">Semua Inspirasi Perlu Ringkas!</h2>
                        <hr class="divider light my-4" style="border-color:white">
                        <p class="mb-4" style="color: #EEEAEA;">Inspirasi Tidak Bisa Menulis Dengan Sendirinya, <br> Ayo Mulai Menulis dan Berbagi Inspirasi Sekarang!</p>
                        <button type="button" class="btn btn-xl" id="btn_getStart" onclick="showAlert()">Mulai</button>
                    </div>
                </div>
            </div>
        </section>
        <?php
            $query = mysqli_query($conn, "SELECT * FROM blog");
            $popular = mysqli_query($conn, "SELECT * FROM blog ORDER BY views DESC LIMIT 8"); 
        ?>
        <section class="page-section" id="trending">
            <div class="container-fluid" id="trendingBox">
                <div class="px-lg-5">
                    <h2 class="text-center mt-0"><i class="fas fa-chart-line iheader"></i> Sedang Populer</h2>
                    <hr class="divider my-4" style="margin-bottom: 16px;"/>  
                    <div class="row">
                        <?php if (mysqli_num_rows($popular)){ ?>
                            <?php while ($rowpopular = mysqli_fetch_array($popular)){ ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4 anim">
                            <div class="p-2 bd-highlight"><i class="fas fa-user-tie"></i> <?php echo $rowpopular['penulis'] ?></div>
                            <div class="p-2 bd-highlight">
                                    <h5 class="font-weight-bold"><a href="User_Regist/guest-read-blog?id=<?php echo $rowpopular['id_blog']; ?>" class="title"><?php echo $rowpopular['judul']; ?></a></h5>
                                </div>
                            <div class="p-2 bd-highlight">
                                <p class="desc"><?php echo substr($rowpopular['isi_blog'], 0, 50); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
        
                    </div> <!--row div-->
                </div> <!--px-lg-5 div-->
            </div> <!--container-fluid-->
        </section>

        <section class="foryou" id="foryou" style="padding-top: 60px; padding-bottom:30px">
            <div class="container" >
                <div class="row align-items-center">
                    <div class="col-12 align-middle text-center">
                        <h2 class="text-white mt-0">Perlu Lebih Banyak Lagi?</h2>
                        <hr class="divider light my-4" style="border-color:white">
                        <p class="mb-4" style="color: #EEEAEA;">Jangan Khawatir! Kami Akan Selalu Menghadirkan Beragam <br> Informasi Ringkas Untuk Anda..</p>
                    
                    </div>
                </div>
            </div>
        </section>

    <!--Blog--> 
    <!--query all blog here-->
    <section class="page-section" id="blog" style="padding-top: 40px; padding-bottom:20px">
        <div class="container-fluid">
            <div class="px-lg-5" id="blogBox">
                <h2 class="text-center mt-0"><i class="fas fa-lightbulb iheader"></i> Inspirasi Ringkas</h2>
                <hr class="divider my-4" style="margin-bottom: 6px;"/> 
                <div class="row justify-content-md-center" style="margin-top:40px; margin-bottom:40px">
                    <form class="form-inline" action="" method="POST">
                        <div class="form-group mb-2">
                        <input name="cari" autocomplete="off" class="form-control mr-sm-2" type="search" placeholder="Cari Blog" aria-label="Search"> 
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <button name="btn-cari"class="btn btn-outline-info my-2 my-sm-0" type="submit" id="search_icon" style="width: fit-content;"><i class="fas fa-search"></i></button>    
                        </div>
                    </form>
                </div>
                <div class="row">
                <?php
                    // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                    $query = "SELECT * FROM blog ORDER BY id_blog ASC;";
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
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4 anim">
                            <div class="p-2 bd-highlight"><i class="fas fa-user-tie"></i> <?php echo $row['penulis']; ?></div>
                            <div class="p-2 bd-highlight">
                                <h5 class="font-weight-bold"><a href="User_Regist/guest-read-blog?id=<?php echo $row['id_blog']; ?>" class="title"><?php echo $row['judul']; ?></a></h5>
                            </div>
                            <div class="p-2 bd-highlight">
                                <p class="desc"><?php echo substr($row['isi_blog'], 0, 50);?></p>
                            </div>
                        </div>
                    <?php
                        $ID++; //untuk nomor urut terus bertambah 1
                    }

                    ?>


                </div> <!--row div-->
            </div> <!--px-lg-5 div-->
        </div> <!--container-fluid-->
    </section>

        <!--Contact-->
        <section class="page-section" id="contact" style="padding-top: 70px; padding-bottom:70px">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-8 text-center">
                        <h2 class="mt-0" id="contactHead">Let's Get In Touch!</h2>
                        <hr class="divider my-4" />
                        <p class="mb-5" id="contactLead" style="color: #D7CCCC;">Punya Pertanyaan, Kritik, Dan Saran Untuk Kami? Kami Akan Selalu Menanti Pesan-Pesan Dari Anda Melalui Kontak Dibawah!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 icontact"></i>
                        <div>+62-238-83-122</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 icontact"></i>
                        <a class="d-block text-decoration-none" style="color: white;">netringkas@gmail.com</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="bg-light py-3">
            <div class="container">
                <div class="small text-center text-muted">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    Project Ringkas-Net
                </div>
            </div>
        </footer>

    <!--anime js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <!--sweet alert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!--cdn-->
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

    <script>
        function showAlert(){
            Swal.fire({
                icon: 'question',
                title: 'Sudah Memiliki Akun?',
                showDenyButton: true,
                confirmButtonText: `Sudah`,
                denyButtonText: `Belum`,
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "User_Regist/signIn";
                } else if (result.isDenied) {
                    Swal.fire({
                    icon: 'question',
                    title: 'Ingin Mendaftar?',
                    showCancelButton: true,
                    confirmButtonText: `Daftar`,
                    CancelButtonText: `Nanti Saja`,
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "User_Regist/signUp";
                    } 
                    })
                }
                })
        }  
        //function box animation when nav-item clicked
        function serviceBoxAnim(){
            var element = document.getElementById("trendingBox");
            element.classList.add("fadeInDown");
        }
        function aboutBoxAnim(){
            var element = document.getElementById("about");
            element.classList.add("fadeInUp");
        }
        function blogBoxAnim(){
            var elementHead = document.getElementById("blogBox");
            elementHead.classList.add("fadeInUp");
        }  
        function contactBoxAnim(){
            var elementHead = document.getElementById("contactHead");
            var elementLead = document.getElementById("contactLead");
            elementHead.classList.add("fadeInUp");
            elementLead.classList.add("fadeInDown");
        }     
    </script>
    <!--my JS-->
    <script src="src/js/scroll-trigger.js"></script>
    </body>
</html>
    