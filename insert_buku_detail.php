<?php
  //print_r ($_POST);

  //ambil semua data
  //dari form
  $id_buku                = $_POST['id_buku'];
  $no_register            = $_POST['no_register'];
  $status_tersedia        = $_POST['status_tersedia'];
  $dipinjam_oleh          = $_POST['dipinjam_oleh'];


  //jika id_buku kosong
  //maka isi kembali formnya
  if (empty($id_buku)) {
    echo "Data yang dimasukkan tidak valid! <br>";
    echo "<a href='form_buku_detail.php'>Isi Buku detail kembali </a>";

    //agar keluar (berhenti)
    return 0;
  }

  //jika tombol simpan ditekan
  if (isset($_POST['simpan'])) {

    //siapkan query
    $sql = "insert into t_buku_detail (id_buku,no_register,status_tersedia,dipinjam_oleh) values ('$id_buku','$no_register','status_tersedia','dipinjam_oleh')";

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
        header("location: buku_detail.php");
    } else {
      echo mysqli_error($conn);
      return 0;
    }

  }

 ?>
