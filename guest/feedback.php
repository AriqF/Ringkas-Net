<!doctype html>
<head>
  	<title>Ringkas.net - FeedBack</title>
<?php
    include'header-guest.php';
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
                <form method="POST" class="rating" action="function-guest-feedback" id="rateForm" enctype="multipart/form-data">
                    <div class="text-center">
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" style="cursor:pointer" name="rating" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="customRadio1">Sangat Buruk</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="rating" class="custom-control-input" value="2">
                                <label class="custom-control-label" for="customRadio2">Buruk</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="rating" class="custom-control-input" value="3">
                                <label class="custom-control-label" for="customRadio3">Netral</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio4" name="rating" class="custom-control-input" value="4">
                                <label class="custom-control-label" for="customRadio4">Baik</label>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio5" name="rating" class="custom-control-input" value="5">
                                <label class="custom-control-label" for="customRadio5">Sangat Baik</label>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <label class="label control-label" style="margin-top: 20px;"><span id="comments">Komentar</span></label>
                    <textarea type="text" class="form-control mb-3" name="komentar" id="box_comments" rows="3" placeholder="Komentar anda mengenai sistem kami?"></textarea>
                    <button name="submit-btn" type="submit" class="btn btn-upload">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </section>
  
    <?php 
        include'../user/function-scroll-trigger.php';
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //document.getElementById("user_write").style.backgroundImage = "url(../src/img/user-write-img.jpg)";
        $(':radio').change(function() {
            /* console.log('New star rating: ' + this.value); */
            switch(this.value){
                case "1":
                    document.getElementById("box_comments").placeholder  = "Masalah apa yang anda dapatkan dalam menggunakan sistem kami?";
                    break;
                case "2":
                    document.getElementById("box_comments").placeholder  = "Masalah apa yang anda dapatkan dalam menggunakan sistem kami?";
                    break;
                case "3":
                    document.getElementById("box_comments").placeholder  = "Apa ada hal yang harus kami tingkatkan?";
                    break;
                case "4":
                    document.getElementById("box_comments").placeholder  = "Apa ada hal yang harus kami tingkatkan?";
                    break;
                case "5":
                    document.getElementById("box_comments").placeholder  = "Ceritakan Pengalaman Terbaik Anda..";
                    break;
                default:
                    document.getElementById("box_comments").placeholder  = "Komentar anda mengenai sistem kami?";
            }
        });
        document.getElementById("user_write").style.backgroundImage = "url(../src/img/user-feedback-img.jpg)";
    </script>
</body>