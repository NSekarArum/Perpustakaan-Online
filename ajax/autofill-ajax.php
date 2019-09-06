<?php
include 'koneksi.php';
$nomor_anggota = $_GET ['nomor_anggota'];
$sql = mysqli_query($conn,"select * from t_anggota where nomor_anggota='$nomor_anggota'");
$hasil = mysqli_fetch_array($sql);

//print_r ($hasil);
echo json_encode($hasil);
?>