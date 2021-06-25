<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!--My css-->
    <link href="src/index.css" rel="stylesheet">
    
    <!--google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">


    <title>Man-Go</title>
    <script>

    </script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(17, 17, 17, 0.75);">
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="User_Regist/login.php">Log In</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Languange
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropdown">
              <a class="dropdown-item bg-transparent" href="id.index.php" id="dropdownItem">Bahasa</a>
              <a class="dropdown-item bg-transparent" href="index.php" id="dropdownItem">English</a>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
          </li>
        </ul>
        
      </div>
    </nav>


    <header class="pagehead"></div>
      <div class="container h-100">

        <div class="row h-100 align-items-center">
          <div class="col-12 text-center">
            <h1 class="font-weight-semibold ml3">Belajar Bahasa Jepang dengan Mudah dan Gratis!</h1>
            <p class="lead">Teman terbaik untuk anda yang berniat mempelajari Bahasa Jepang</p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" id="startbtn">
              Mulai
            </button>
            <div class="w-100"></div>
            <button type="button" class="btn btn-primary" onclick="scrollWin(0,780)" id="startbtn2">
              Jelajahi Selengkapnya &#187
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header" id="modal">
                    <h5 class="modal-title" id="exampleModalLabel">Man-Go Asking..</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-left" id="modal">
                    Sudah Memiliki Akun?
                  </div>
                  <div class="modal-footer">
                    <a href="User_Regist/index1.php" style="color: white;" ><button type="button" class="btn btn-secondary">Ya, sudah</button></a>
                    <a href="User_Regist/signup.php" style="color: white;"><button type="button" class="btn btn-primary">Belum, saya ingin daftar</button></a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
    </header>

    <div class="container">
      <div class="row" id="page2row">
          <div class="col-sm-4">
              <img src="src/img/mascot.png" id="mascot3"> 
          </div>
          <div class="col-sm-8">
              <h3 class="text-left">Belajar Dengan Metode Terbaik dan Terbaru</h3>
              <p class="lead">Metode Kami merupakan metode yang sangat mudah untuk dipelajari bahkan untuk pemula sekalipun </p>
          </div>

      </div>
      <hr>
      <div class="row" id="page2row">
          <div class="col-sm-4">
              <img src="src/img/readbook.png" id="mascot3"> <!--mascot read book-->
          </div>
          <div class="col-sm-8">
              <h3 class="text-left">Ayo Belajar Bersama Man-Go, Kami Memiliki:</h3>
              <li>
                Akses Modul Seumur Hidup
              </li>
              <li>
                Kanji Per-Part dan All-In
              </li>
              <li>
                Cara Mudah dan Tips Mempelajarinya
              </li>
              <li>
                Konsep Penguasaan JLPT
              </li>
              </ul>
          </div>
      </div>
      <hr>
      <div class="row" id="page2row">
          <div class="col-sm-4">
              <img src="src/img/anywhere.png" id="mascot3"> <!--mascot learn anywhere-->
          </div>
          <div class="col-sm-8">
              <h3 class="text-left">Belajar Dimana Saja dan Kapan Saja</h3>
              <p class="lead">Tentu Akan Membuat Kamu Lebih Produktif Dengan Web Responsive Man-Go</p>
          </div>

      </div>
      <hr>
  </div>
  <div style="margin-bottom: 80px;"></div>


  <!-- Footer -->
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">Tentang Kami</h5>
        <p>Website ini dibuat dengan tujuan memenuhi tugas mata kuliah Pemograman Web</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Tim Kami</h5>

        <ul class="list-unstyled">
          <li>
            <a href="https://github.com/AriqF">Ariq Fachry R</a>           
          </li>
          <li>
            <a href="#!">Balqis A</a> 
          </li>
          <li>
            <a href="#!">Farhan Dwi Amugerah</a>         
          </li>
          <li>
            <a href="#!">M. Alif Hidayatullah</a>         
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">


      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Jurusan Informatika Universitas Negeri Suarabaya</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
    

  
  </body>
  <script src="node_modules/animejs/lib/anime.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
  <script src="src/index.js"></script>
</html>
