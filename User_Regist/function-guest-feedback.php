<?php
    require 'config/db.php';

    $rating  = $_POST['rating'];
    $komentar = $_POST['komentar'];
    $username = "guest";

   
    $query = "INSERT INTO rating (rating, komentar, nama_penilai) VALUES ('$rating', '$komentar', '$username')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($conn).
            " - ".mysqli_error($conn));
    } else {
        echo "<script>alert('Terima Kasih Atas Feedback Anda!');window.location='../index';</script>";
    }
?>