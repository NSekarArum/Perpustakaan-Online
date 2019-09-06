<?php
  print_r ($_POST);

  //ambil semua data
  //dari form
$servername = "localhost";
    $username = "root";
    $password = "";
    $database = "perpustakaan";
    $conn = mysqli_connect($servername, $username, $password, $database);

  $no_sirkulasi   = $_POST['no_sirkulasi'];
  $id_anggota    = $_POST['id_anggota'];
  $id_buku    = $_POST['id_buku'];
  $tanggal_pinjam     = $_POST['tanggal_pinjam'];
  $tanggal_batas_pinjam        = $_POST['tanggal_batas_pinjam'];
  $tanggal_kembali  = $_POST['tanggal_kembali'];
  $Denda = $_POST['denda'];

  //jika nomor_buku kosong
  //maka isi kembali formnya
  if (empty($no_sirkulasi)) {
    echo "Data yang dimasukkan tidak valid! <br>";
    echo "<a href='form_sirkulasi.php'>Isi Buku Kembali </a>";

    //agar keluar (berhenti)
    return 0;
  }

  //jika tombol simpan ditekan
  if (isset($_POST['simpan'])) {

    //siapkan query
$query = "INSERT INTO sirkulasi values('','$_POST[no_sirkulasi]','$_POST[id_anggota]','$_POST[id_buku]','$_POST[tanggal_pinjam]','$_POST[tanggal_batas_pinjam]','$_POST[tanggal_kembali]','$_POST[denda]')";

//eksekusi query
    $eksekusi = mysqli_query($conn,$query);

    //jika eksekusi sukses
    //maka larikan ke daftar_buku2
    if ($eksekusi) {
        header("location: sirkulasi1.php");
    } else {
      echo mysqli_error($conn);
      return 0;
    }

  }
 ?>
