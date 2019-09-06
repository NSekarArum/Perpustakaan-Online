<?php

include "koneksi.php";

if (isset($_POST['submit'])) {
    //tangkap judul dari form
    $kata_kunci = '%' . $_POST['kata_kunci'] . '%';

    //buat query untuk mengambil data koleksi Buku
    $sql = "select * from t_anggota where nomor_anggota like '$kata_kunci' or
            nama like '$kata_kunci'";;
} else {
    //Tampilkan semua Data
    $sql="SELECT * FROM t_anggota";
}

//eksekusi query
$eksekusi = mysqli_query($conn,$sql);

//jika eksekusi sukses
//maka larikan ke daftar_buku2
if ($eksekusi) {
    header("location: anggota.php");
} else {
  echo mysqli_error($conn);
  return 0;
}

//jika tidak ditemukan berikan Perpustakaan
if (mysqli_num_rows($hasil)==0) {
 echo "Data anggota yang sudah terdaftar tidak ada...";
 return 0;
}

?>
