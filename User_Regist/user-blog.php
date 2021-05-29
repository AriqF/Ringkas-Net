<!doctype html>
<head>
  	<title>Ringkas.Net - Blog Saya</title>
    <?php
        $currentPage = 'user_blog';
        include 'header-user.php';
    ?>
    <header class="pagehead" id="user_write">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-semibold ml3 fadeInUp" style="margin-top: 50px;">Lorem Ipsum Lor Sit amet</h1>
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
                            <th scope="col">Judul</th>
                            <th scope="col">Isi Blog</th>
                            <th scope="col">Gambar</th>                                
                            <th scope="col">Aksi</th>                    
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center">Menulislah!</td>
                            <td class="align-middle text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</td> <!--<td><.? php echo substr($row['deskripsi'], 0, 20); ?.>...</td> -->
                            <td style="text-align: center;"><img src="../src/img/signin-img.jpg" class="img-fluid img-thumbnail w-50"></td>
                            <td class="align-middle text-center">
                                <a href="#" style="text-decoration:none"><button name="edit-pass-btn" type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" style="margin-top: 10px; border-radius: 5px; width:fit-content">Hapus</button></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle text-center">Membacalah!</td>
                            <td class="align-middle text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</td> <!--<td><.? php echo substr($row['deskripsi'], 0, 20); ?.>...</td> -->
                            <td style="text-align: center;"><img src="../src/img/signup-img.jpg" class="img-fluid img-thumbnail w-50"></td>
                            <td class="align-middle text-center">
                                <a href="#" style="text-decoration:none"><button name="edit-pass-btn" type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" style="margin-top: 10px; border-radius: 5px; width:fit-content">Hapus</button></a>
                            </td>
                        </tr>
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