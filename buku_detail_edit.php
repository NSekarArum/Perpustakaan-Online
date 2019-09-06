<?php
  //buka koneksi
  include "koneksi.php";

  //cetak semua data hihihi
  //jgn lupa ditutup loh klo dah beres
  //print_r ($_POST);

  //jika tombol simpan ditekan
  if ($_POST['simpan']) {

      //catat semua var
      $id= $_POST['id'];
      $id_buku = $_POST['id_buku'];
      $no_register = $_POST['no_register'];
      $status_tersedia = $_POST['status_tersedia'];
      $dipinjam_oleh= $_POST['dipinjam_oleh'];

      //buat query untuk menyimpan Data
      $sql = "update t_buku_detail
              set id_buku = '$id_buku',
                  no_register = '$no_register',
                  status_tersedia = '$status_tersedia',
                  dipinjam_oleh = '$dipinjam_oleh'
              where id = '$id'";

      //eksekusi
      $hasil = mysqli_query ($conn, $sql);

      if ($hasil) {
         echo "Mantap djiwa .....<br>";
         echo "<a href='buku_detail.php'> Lihat Data </a>";
      } else {
        echo mysqli_error($conn);

      }
  }
 ?>
