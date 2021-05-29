<!doctype html>
<head>
  	<title>User Dashboard</title>
    <?php
        $currentPage = 'user_home';
        include 'header-user.php';
    ?>
    <header class="pagehead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-semibold ml3 fadeInUp" style="margin-top: 50px;">Selamat Datang Kembali, <?php echo $_SESSION['username']; ?> </h1>
                    <hr class="divider light my-4" style="margin-bottom: 15px;">
                    <h4 class="subtitle fadeInDown"><?php echo date("l") . ", " . date("Y/m/d"); ?></h4>
                    <a href="#" class="btn btn-xl" role="button" id="btn_write">Mulai Menulis</a>
                    <p class="subHeader fadeInDown"></p>
                    
                </div>
            </div>
        </div>
    </header>
    <!--Trending-->
    <section class="page-section" id="trending" style="padding-top: 60px;">
        <div class="container-fluid" id="trendingBox">
            <div class="px-lg-5">
                <h2 class="text-center mt-0"><i class="fas fa-chart-line iheader"></i> Sedang Populer</h2>
                <hr class="divider my-4" style="margin-bottom: 16px;"/>  
                <div class="row">
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
                </div> <!--row div-->
            </div> <!--px-lg-5 div-->
        </div> <!--container-fluid-->
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
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 anim">
                        <div class="p-2 bd-highlight"><i class="fas fa-user-tie"></i> Kang Buncis</div>
                        <div class="p-2 bd-highlight">
                            <h5 class="font-weight-bold"><a href="#" class="title">Monitor Terbaik Untuk Coding</a></h5>
                        </div>
                        <div class="p-2 bd-highlight">
                            <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                        </div>
                    </div>
                </div> <!--row div-->
            </div> <!--px-lg-5 div-->
        </div> <!--container-fluid-->
    </section>
    <?php
        include'footer.php';
    ?>
    <!--anime js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="../src/js/scroll-trigger.js"></script>
    </body>
</html>       