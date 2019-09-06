<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Perpustakaan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  th {
    background-color: pink;
  }
  </style>
</head>
<body>
<table border="1" width="80%">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nomor anggota</th>
            <th>Nama anggota</th>
            <th width="20%">Opsi</th>
        </tr>
    </thead>
    <tbody>

<h2> <u>Anggota yang sudah terdaftar </u></h2>
<a href="index.php"><i class="material-icons">skip_previous</i>Kembali kehalaman sebelumnya</a><br><br>
<a href="form_anggota.php">[+] Tambah anggota</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="cari_anggota.php"><i class="material-icons">search</i>Cari anggota</a><br><br>


<?php
if (isset($_POST['submit'])) {
    //tangkap judul dari form
    $nomor_anggota = $_POST['nomor_anggota'];

    //buat query untuk mengambil data koleksi Buku
    $sql = "select * from t_anggota where nomor_anggota = '$nomor_anggota'";;
} else {
    //Tampilkan semua Data
    $sql="SELECT * FROM t_anggota";
}


//eksekusi
$hasil = mysqli_query ($conn, $sql);

//jika tidak ditemukan berikan Pesan
if (mysqli_num_rows($hasil)==0) {
 echo "Data anggota tidak ada...";

}



      //nilai awal penomoran
      $nomor=1;

    //eksekusi query dengan pengulangan
    while ($data = mysqli_fetch_array($hasil))
    {
      //tampilkan hasil eksekusi
      $id = $data['id'];

      echo "<tr>";
      echo "<td>".$nomor . "</td>";
      echo "<td>".$data['nomor_anggota'] ."</td>";
      echo "<td>".$data['nama'] ."</td>";


            //nomor bertambah 1
            $nomor++;

    ?>
  <td>
    <a href="form_anggota_edit.php?id='.$data['id'].'" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit">&nbsp;Edit</i></a>
    <a href="hapus_anggota.php?id='.$data['id'].'" class="btn btn-danger btn-xs" onclick="return confirm(\'Yakin?\')"><i class="glyphicon glyphicon-trash">&nbsp;Hapus</i></a></td>
  </tr>
<?php } ?>
