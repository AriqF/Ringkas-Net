<?php
    require 'config/db.php';

  // membuat variabel untuk menampung data dari form
  $judul      = $_POST['judul'];
  $penulis    = $_POST['penulis'];
  $isi_blog   = $_POST['isi_blog'];
  $gambar     = $_FILES['gambar']['name']; 
  $uid        = $_POST['uid'];


  if (empty($judul)|| empty($penulis) || empty($isi_blog) || empty($gambar)){
    echo "<script>alert('Form wajib diisi dengan lengkap!');</script>"; 
  }
  //cek dulu jika ada gambar produk jalankan coding ini
  if($gambar != "" ) {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x)); //manipulasi sebuah string menjadi huruf kecil.
    $file_tmp = $_FILES['gambar']['tmp_name'];  
    list($width, $height, $type, $attr) = getimagesize($file_tmp); 
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
          if(in_array($ekstensi, $ekstensi_diperbolehkan) === true && $width === 1920 && $height === 1080)  {     
                  move_uploaded_file($file_tmp, 'image/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                    $query = "INSERT INTO blog (uid, judul, penulis, isi_blog, gambar) VALUES ('$uid', '$judul','$penulis', '$isi_blog', '$nama_gambar_baru')";
                    $result = mysqli_query($conn, $query);
                    // periska query apakah ada error
                    if(!$result){
                      echo "<script>alert('Upload gagal');window.location='user-write-blog';</script>";
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                            " - ".mysqli_error($conn));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil ditambah.');window.location='user-blog';</script>";
                    }

              }
              elseif($width != 1920 || $height != 1080){
                echo "<script>alert('Gambar harus memiliki dimensi 1920x1080!');window.location='user-write-blog';</script>";
              }

              else {     
                //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='user-write-blog';</script>";
              }
  } else {
    $query = "INSERT INTO blog (uid, judul, penulis, isi_blog, gambar) VALUES ('$uid', '$judul', '$penulis', '$isi_blog', '$', null)";
                    $result = mysqli_query($conn, $query);
                    // periska query apakah ada error
                    if(!$result){
                      echo "<script>alert('Upload gagal');window.location='user-write-blog';</script>";
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                            " - ".mysqli_error($conn));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil ditambah.');window.location='user-blog';</script>";
                    }
  }
?>
