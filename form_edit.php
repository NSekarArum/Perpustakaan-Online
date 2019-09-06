<?php

//melewatkan kriteria data yang akan di edit, misalnya : ID
//masukkan id data
$id=$_GET['id']; 

include "koneksi.php";

// cari dan buat query untuk ambil data dari database 
$sql = "SELECT * FROM t_anggota WHERE id='$id'";

//dapat hasil
$hasil = mysqli_query($conn, $sql);

//jika data tidak ada maka tampilkan pesan
if (mysqli_num_rows($hasil)==0){
	echo "Maaf data tidak ditemukan...";
	return 0;
}

//ambil data
$data = mysqli_fetch_array($hasil);

//masukkan data ke variabel
$nomor_anggota = $data['nomor_anggota'];
$nama = $data['nama'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form edit </title>
    <style>
table#tabel, #table th, #tabel tr, #tabel td{
border:0px;
border-collapse:collapse;
}
	</style>
	</head>	
<body>

      <form class="" action="edit_proses.php" method="post">
  <table id="tabel"> 
  <tr><td><input type="hidden" name="id" value="<?php echo $id;?>">
        <p>Nomor Anggota :  <input type="text" name="nomor_anggota" value="<?php echo $nomor_anggota; ?>" /> </p></td></tr>
  <tr><td>
        <p>Nama Anggota  :  <input type="text" name="nama" value="<?php echo $nama; ?>" /> </p></td></tr>
  <tr><td>
  
  
        <p><input type="submit" name="simpan" value="Simpan">
        <input type="reset" name="reset" value="Reset"></p></td></tr>

      </form>
  </body>
</html>
