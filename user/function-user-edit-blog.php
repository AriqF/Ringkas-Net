<?php
    require '../Authentication/config/db.php';

    // membuat variabel untuk menampung data dari form

    if (isset($_POST['id']) || isset($_POST['judul']) || isset($_POST['penulis']) || isset($_POST['isi_blog']) || isset($_POST['gambar'])) {
    $judul      = $_POST['judul'];
    $penulis    = $_POST['penulis'];
    $isi_blog   = $_POST['isi_blog'];
    $gambar     = $_FILES['gambar']['name']; 
    $id         = $_POST['id'];

    //cek dulu jika ada gambar produk jalankan coding ini
    if($gambar != "") {
      $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
      $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
      $ekstensi = strtolower(end($x)); //manipulasi sebuah string menjadi huruf kecil.
      $file_tmp = $_FILES['gambar']['tmp_name'];   
      $angka_acak     = rand(1, 999);
      list($width, $height, $type, $attr) = getimagesize($file_tmp); 
      $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
          if(in_array($ekstensi, $ekstensi_diperbolehkan) === true && $width === 1920 && $height === 1080)  {     
                  move_uploaded_file($file_tmp, '../User_Regost/image/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                    $query = "UPDATE blog SET judul = '$judul', penulis = '$penulis', isi_blog = '$isi_blog', gambar = '$nama_gambar_baru'";
                    $query .= "WHERE id_blog = '$id'";
                    $result = mysqli_query($conn, $query);
                    // periska query apakah ada error
                    if(!$result){
                      echo "<script>alert('Upload gagal');window.location='edit-blog';</script>";
                        die ("Query gagal dijalankan: ".mysqli_errno($conn).
                            " - ".mysqli_error($conn));
                    } 
                    else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='my-blog';</script>";
                    }
            } 
            elseif($width != 1920 || $height != 1080){
                echo "<script>alert('Gambar harus memiliki dimensi 1920x1080!');window.location='edit-blog';</script>";
              }
            else {     
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='edit-blog';</script>";
            }
    } 
    else {
        $query = "UPDATE blog SET judul = '$judul', penulis = '$penulis', isi_blog = '$isi_blog'";
        $query .= "WHERE id_blog = '$id'";
        $result = mysqli_query($conn, $query);
        // periska query apakah ada error
        if(!$result){
          echo "<script>alert('Upload gagal');window.location='edit-blog';</script>";
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                " - ".mysqli_error($conn));
        } else {
          //tampil alert dan akan redirect ke halaman index.php
          //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='my-blog';</script>";
        }
      }
    }