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
  <table border="1" width="100%">
      <thead>
          <tr>
              <th>Nomor</th>
              <th>Nomor buku</th>
              <th>Judul buku</th>
              <th>Pengarang</th>
              <th>Penerbit</th>
              <th>Tahun terbit</th>
              <th>Jumlah copy</th>
              <th>Opsi</th>
          </tr>
      </thead>
      <tbody>

  <h2> <u>Buku yang sudah terdaftar </u> </h2>
  <a href="index.php"><i class="material-icons">skip_previous</i>Kembali kehalaman sebelumnya</a><br><br>
  <a href="form_buku.php">[+] Tambah Buku</a> &nbsp; &nbsp;
  <a href="cari_buku.php"><i class="material-icons">search</i>&nbsp;Cari Buku</a> &nbsp; &nbsp; &nbsp; &nbsp;<br><br>

<?php
if (isset($_POST['submit'])) {
    //tangkap judul dari form
    $kata_kunci = '%' . $_POST['kata_kunci'] . '%';

    //buat query untuk mengambil data koleksi Buku
    $sql = "select * from t_buku where judul_buku like '$kata_kunci' or
            pengarang like '$kata_kunci' or
            penerbit like '$kata_kunci'";;
} else {
    //Tampilkan semua Data
    $sql="SELECT * FROM t_buku";
}


//eksekusi
$hasil = mysqli_query ($conn, $sql);

//jika tidak ditemukan berikan Perpustakaan
if (mysqli_num_rows($hasil)==0) {
 echo "Data buku tidak ada...";
 return 0;
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
      echo "<td>".$data['kode_buku'] ."</td>";
      echo "<td>".$data['judul_buku'] ."</td>";
      echo "<td>".$data['pengarang'] ."</td>";
      echo "<td>".$data['penerbit'] ."</td>";
      echo "<td>".$data['tahun'] ."</td>";
      echo "<td>".$data['jml_copy'] ."</td>";

      //nomor bertambah 1
      $nomor++;

?>
<td>
  <a href="form_buku_edit_sekar.php?id='.$data['id'].'" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit">&nbsp;Edit</i></a>
  <a href="hapus_buku.php?id='.$data['id'].'" class="btn btn-danger btn-xs" onclick="return confirm(\'Yakin?\')"><i class="glyphicon glyphicon-trash">&nbsp;Hapus</i></a></td>
</tr>
<?php } ?>
