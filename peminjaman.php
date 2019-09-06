<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Perpustakaan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  th {
    background-color: pink;
  }
  </style>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/script1.js"></script>
</head>
<body>

  <h2> <u>Peminjaman</u></h2>
  <a href="index.php"><i class="material-icons">skip_previous</i>Kembali kehalaman sebelumnya</a><br><br>
  <a href="form_sirkulasi_baru.php">[+] Tambah Peminjaman</a>&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="cari_peminjaman.php">Cari peminjaman</a>



    <form action="" method="post">
        Masukkan Nomor register : <br>
        <input type="text" name="no_register" value="" id="keyword"><br>
        <button type="submit" name="submit" id="tombol-cari">Cari</button>
    </form>
    <br>

  <div id="container">
<table border="1" width="80%">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nomor sirkulasi</th>
            <th>Nomor anggota</th>
            <th>Nama anggota</th>
            <th>Nomor register buku</th>
            <th>Judul buku</th>
            <th>Tanggal pinjam</th>
            <th>Tanggal batas pinjam</th>
            <th>Tanggal kembali</th>
            <th>Denda</th>
            <th width="10%">Opsi</th>
        </tr>
    </thead>
    <tbody>

<?php

    //Tampilkan semua Data
    $sql= mysqli_query($conn, "SELECT*
          FROM sirkulasi,
               t_anggota,
               t_buku_detail,
               t_buku
          WHERE sirkulasi.id_anggota=t_anggota.id and sirkulasi.id_buku_detail=t_buku_detail.id and t_buku_detail.id_buku=t_buku.id");

      //nilai awal penomoran
      $nomor=1;

    //eksekusi query dengan pengulangan
    while ($data = mysqli_fetch_array($sql))
    {
      //tampilkan hasil eksekusi
      $id = $data['id'];

      echo "<tr>";
      echo "<td>".$nomor . "</td>";
      echo "<td>".$data['no_sirkulasi'] ."</td>";
      echo "<td>".$data['nomor_anggota'] ."</td>";
      echo "<td>".$data['nama'] ."</td>";
      echo "<td>".$data['no_register'] ."</td>";
      echo "<td>".$data['judul_buku'] ."</td>";
      echo "<td>".$data['tanggal_pinjam'] ."</td>";
      echo "<td>".$data['tanggal_batas_pinjam'] ."</td>";
      echo "<td>".$data['tanggal_kembali'] ."</td>";
      echo "<td>".$data['denda'] ."</td>";

            //nomor bertambah 1
            $nomor++;

    ?>
  <td>
    <a href="simpan_sir_baru.php?id='.$data['id'].'" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit">&nbsp;Edit</i></a>
    <a href="hapus_peminjaman.php?id='.$data['id'].'" class="btn btn-danger btn-xs" onclick="return confirm(\'Yakin?\')"><i class="glyphicon glyphicon-trash">&nbsp;Hapus</i></a></td>
  </tr>
  <?php } ?>
</table>
</div>
</body>
</html>
