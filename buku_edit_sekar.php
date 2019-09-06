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
      $kode_buku= $_POST['kode_buku'];
      $judul_buku= $_POST['judul_buku'];
      $pengarang= $_POST['pengarang'];
      $penerbit= $_POST['penerbit'];
      $tahun= $_POST['tahun'];
      $jml_copy= $_POST['jml_copy'];


      //buat query untuk menyimpan Data
      $sql = "update t_buku
              set kode_buku = '$kode_buku',
                  judul_buku = '$judul_buku',
                  pengarang = '$pengarang',
                  penerbit ='$penerbit',
                  tahun='$tahun',
                  jml_copy='$jml_copy'
              where id = '$id'";

      //eksekusi
      $hasil = mysqli_query ($conn, $sql);

      if ($hasil) {
         echo "Mantap djiwa .....<br>";
         echo "<a href='daftar_buku_sekar.php'> Lihat Data </a>";
      } else {
        echo mysqli_error($conn);

      }
  }
 ?>
