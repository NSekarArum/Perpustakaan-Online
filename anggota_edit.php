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
      $nomor_anggota= $_POST['nomor_anggota'];
      $nama= $_POST['nama'];


      //buat query untuk menyimpan Data
      $sql = "update t_anggota
              set nomor_anggota = '$nomor_anggota',
                  nama = '$nama'
              where id = '$id'";

      //eksekusi
      $hasil = mysqli_query ($conn, $sql);

      if ($hasil) {
         echo "Mantap djiwa .....<br>";
         echo "<a href='anggota.php'> Lihat Data </a>";
      } else {
        echo mysqli_error($conn);

      }
  }
 ?>
