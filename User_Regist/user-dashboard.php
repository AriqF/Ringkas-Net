<!doctype html>
<head>
  	<title>Ringkas.Net - Dashboard</title>
    <?php
        $currentPage = 'user_home';
        include 'header-user.php';
        $day = strval(date("l"));  
        switch($day){
            case 'Monday':
                $day = 'Senin';
                break;
            case 'Tuesday':
                $day = 'Selasa';
                break;
            case 'Wednesday':
                $day = 'Rabu';
                break;
            case 'Thursday':
                $day = 'Kamis';
                break;
            case 'Friday':
                $day = 'Jumat';
                break;
            case 'Saturday':
                $day = 'Sabtu';
                break;
            case 'Sunday':
                $day = 'Minggu';
                break;
            default:
                $day = 'End Of The Day';
        }
        $date = date("d/m/Y");

        // Popular post
        $id = ($_GET['id']);
        $query = mysqli_query($conn, "SELECT * FROM blog");
        $popular = mysqli_query($conn, "SELECT * FROM blog ORDER BY views DESC LIMIT 8"); 

    ?>
    <header class="pagehead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-semibold ml3 fadeInUp" style="margin-top: 50px;">Selamat Datang Kembali, <?php echo $_SESSION['username']; ?> </h1>
                    <hr class="divider light my-4" style="margin-bottom: 15px;">
                    <h4 class="subtitle fadeInDown"><?php echo $day . ", " . $date ?></h4>
                    <a href="user-write-blog" class="btn btn-xl" role="button" id="btn_write">Mulai Menulis</a>
                    <p class="subHeader fadeInDown"></p>               
                </div>
            </div>
        </div>
    </header>
    <!--Trending-->
    <section class="page-section" id="boxTrending">
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
                                <h5 class="font-weight-bold"><a href="user-read-blog?id=<?php echo $rowpopular['id_blog']; ?>" class="title"><?php echo $rowpopular['judul']; ?></a></h5>
                            </div>
                        <div class="p-2 bd-highlight">
                            <p class="desc"><?php echo substr($rowpopular['isi_blog'], 0, 50); ?></p>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
                    <!-- <div class="col-xl-3 col-lg-4 col-md-6 mb-4 anim">
                        <div class="p-2 bd-highlight"><i class="fas fa-user-tie"></i> Kang Buncis</div>
                        <div class="p-2 bd-highlight">
                            <h5 class="font-weight-bold"><a href="#" class="title">Monitor Terbaik Untuk Coding</a></h5>
                        </div>
                        <div class="p-2 bd-highlight">
                            <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 anim">
                        <div class="p-2 bd-highlight"><i class="fas fa-user-tie"></i> Kang Buncis</div>
                        <div class="p-2 bd-highlight">
                            <h5 class="font-weight-bold"><a href="#" class="title">Monitor Terbaik Untuk Coding</a></h5>
                        </div>
                        <div class="p-2 bd-highlight">
                            <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 anim">
                        <div class="p-2 bd-highlight"><i class="fas fa-user-tie"></i> Kang Buncis</div>
                        <div class="p-2 bd-highlight">
                            <h5 class="font-weight-bold"><a href="#" class="title">Monitor Terbaik Untuk Coding</a></h5>
                        </div>
                        <div class="p-2 bd-highlight">
                            <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 anim">
                        <div class="p-2 bd-highlight"><i class="fas fa-user-tie"></i> Kang Buncis</div>
                        <div class="p-2 bd-highlight">
                            <h5 class="font-weight-bold"><a href="#" class="title">Monitor Terbaik Untuk Coding</a></h5>
                        </div>
                        <div class="p-2 bd-highlight">
                            <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div> -->
                    </div>
                </div> <!--row div-->
            </div> <!--px-lg-5 div-->
        </div> <!--container-fluid-->
    </section>

    <!--Blog--> 
    <!--query all blog here-->
    <section class="page-section" id="boxBlog" style="padding-top: 40px; padding-bottom:20px">
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
                                <h5 class="font-weight-bold"><a href="user-read-blog?id=<?php echo $row['id_blog']; ?>" class="title"><?php echo $row['judul']; ?></a></h5>
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
    <?php
        include'footer.php';
    ?>

    </body>
</html>       