<?php
include 'koneksi.php';
$nomor_anggota=$_POST['nomor_anggota'];
$no_register=$_POST['no_register'];
$tanggal_pinjam=$_POST['tanggal_pinjam'];


//cari id anggota
$sql = mysqli_query ($conn,"select id from t_anggota where nomor_anggota='$nomor_anggota'");
$hasil = mysqli_fetch_array($sql);
$id_anggota = $hasil['id'];
echo $id_anggota . "<br>";

//cari id_buku_detail
$sql = mysqli_query ($conn, "select id from t_buku_detail where no_register='$no_register'");
$hasil = mysqli_fetch_array($sql);
$id_buku_detail = $hasil['id'];
echo $id_buku_detail. "<br>";

//nomor registrasi
$no_sirkulasi="rrr";
echo $no_sirkulasi . "<br>";

//batas pinjam
$tanggal_batas_pinjam = date('Y-m-d', strtotime('+7 days', strtotime($tanggal_pinjam)));
echo $tanggal_batas_pinjam;

//tambahkan data sirkulasi
$sql = "insert into sirkulasi (no_sirkulasi,id_anggota,id_buku_detail,tanggal_pinjam,tanggal_batas_pinjam) values ('$no_sirkulasi','$id_anggota','$id_buku_detail',
'$tanggal_pinjam','$tanggal_batas_pinjam')";
//eksekusi query
$eksekusi = mysqli_query($conn,$sql);

//jika eksekusi sukses
if ($eksekusi) {
    echo "Berhasil";
} else {
  echo mysqli_error($conn);
  return 0;
}

?>
