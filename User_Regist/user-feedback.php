<!doctype html>
<head>
  	<title>Ringkas.net - FeedBack</title>
    <?php
        $currentPage = 'user_rate'; 
        include 'header-user.php';
    ?>
    <header class="pagehead" id="user_write">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-semibold ml3 fadeInUp" style="margin-top: 50px;">Bantu Kami Agar Kami Bisa Mengembangkan <br> Sistem Kami Dengan Lebih Baik</h1>
                    <hr class="text-divider mx-auto" style="margin-bottom: 15px;">
                    <p class="subHeader fadeInDown"></p> 
                </div>
            </div>
        </div>
    </header>

    <section class="page-section" id="boxForm">
        <div class="container-fluid">
            <div class="container">
                <h3 style="margin-bottom: 12px" class="align-items-center fadeInUp text-center">Bagaimana Pengalaman Anda Menggunakan Sistem Kami?</h3>
                <p style="font-size: 14px;"></p>
                <hr class="divider mx-auto">
                <form method="POST" class="rating" id="rateForm" enctype="multipart/form-data">
                    <div class="text-center">
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" style="cursor:pointer" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Sangat Buruk</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Buruk</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio3">Netral</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio4">Baik</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio5">Sangat Baik</label>
                            </div>
                        </div>

                    </div>

                    <div class="w-100"></div>
                    <label class="label control-label" style="margin-top: 20px;">Komentar</label>
                    <textarea type="text" class="form-control mb-3" name="komentar" rows="3"></textarea>
                    <div class="custom-control custom-checkbox" style="margin-top: 12px;">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" style="cursor:pointer" name="anonymSend" value="true">
                        <label class="custom-control-label" for="defaultChecked2" id="keeptxt">Kirim sebagai anonim</label>
                    </div>
                    <button name="submit-btn" type="submit" class="btn btn-upload" data-toggle="modal" data-target="#exampleModal">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </section>

    
    <?php 
        include'function-scroll-trigger.php';
    ?>
    <script>
        //document.getElementById("user_write").style.backgroundImage = "url(../src/img/user-write-img.jpg)";
        $(':radio').change(function() {
            console.log('New star rating: ' + this.value);
        });
        document.getElementById("user_write").style.backgroundImage = "url(../src/img/user-feedback-img.jpg)";
    </script>
</body>
</html>