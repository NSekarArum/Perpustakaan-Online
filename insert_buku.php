<?php
  //print_r ($_POST);

  //ambil semua data
  //dari form
  $kode_buku   = $_POST['kode_buku'];
  $judul_buku    = $_POST['judul_buku'];
  $pengarang    = $_POST['pengarang'];
  $penerbit     = $_POST['penerbit'];
  $tahun        = $_POST['tahun'];
  $jml_copy  = $_POST['jml_copy'];

  //jika nomor_buku kosong
  //maka isi kembali formnya
  if (empty($kode_buku)) {
    echo "Data yang dimasukkan tidak valid! <br>";
    echo "<a href='form_buku.php'>Isi Buku Kembali </a>";

    //agar keluar (berhenti)
    return 0;
  }

  //jika tombol simpan ditekan
  if (isset($_POST['simpan'])) {

    //siapkan query
    $sql = "insert into t_buku (kode_buku,judul_buku,pengarang,
    penerbit,tahun,jml_copy) values ('$kode_buku','$judul_buku','$pengarang',
    '$penerbit','$tahun','$jml_copy')";

    //buka koneksi
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pkl_pertemuan_3";
    $conn = mysqli_connect($servername, $username, $password, $database);

    //eksekusi query
    $eksekusi = mysqli_query($conn,$sql);

    //jika eksekusi sukses
    //maka larikan ke daftar_buku2
    if ($eksekusi) {
        header("location: daftar_buku_sekar.php");
    } else {
      echo mysqli_error($conn);
      return 0;
    }

  }

 ?>
