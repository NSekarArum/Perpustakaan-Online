<?php
  //print_r ($_POST);

  //ambil semua data
  //dari form
  $nomor_anggota   = $_POST['nomor_anggota'];
  $nama        = $_POST['nama'];


  //jika nomor_buku kosong
  //maka isi kembali formnya
  if (empty($nomor_anggota)) {
    echo "Data yang dimasukkan tidak valid! <br>";
    echo "<a href='form_anggota.php'>Isi Buku Kembali </a>";

    //agar keluar (berhenti)
    return 0;
  }

  //jika tombol simpan ditekan
  if (isset($_POST['simpan'])) {

    //siapkan query
    $sql = "insert into t_anggota (nomor_anggota,nama) values ('$nomor_anggota','$nama')";

    //buka koneksi
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pkl_pertemuan_3";
    $conn = mysqli_connect($servername, $username, $password, $database);

    //eksekusi query
    $eksekusi = mysqli_query($conn,$sql);

    //jika eksekusi sukses
    //maka larikan ke anggota1
    if ($eksekusi) {
        header("location: anggota.php");
    } else {
      echo mysqli_error($conn);
      return 0;
    }

  }

 ?>
