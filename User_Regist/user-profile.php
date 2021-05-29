<!doctype html>
<head>
  	<title>User Dashboard</title>
    <?php
        $currentPage = 'user_profile';
        include 'header-user.php';
    ?>
    <!--for testing only, delete later-->
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

</body>
</html> 