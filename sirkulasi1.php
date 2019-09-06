<?php include "koneksi.php"; ?><!DOCTYPE html>
<html>
<head>
    <title> sirkulasi</title>
    <style>
    th {
      background-color: pink;
    }
    </style>
</head>

<body>
<table border="1">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nomor sirkulasi</th>
            <th>Nama anggota</th>
            <th>Nomor register buku</th>
            <th>Judul buku</th>
            <th>Tanggal pinjam</th>
			      <th>Tanggal batas pinjam</th>
            <th>Tanggal kembali</th>
            <th>Denda</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>

<h2> Buku Detail </h2>
<h4> ================================= </h4>
//buat link
//agar bisa mengisi lagi
<a href='form_sirkulasi.php'> [+] Tambah Lagi </a><br><br>
<a href="cari_anggota.php">Cari anggota</a>
<?php

    if (isset($_POST['submit'])) {
        //tangkap judul dari form
        $kata_kunci = '%' . $_POST['kata_kunci'] . '%';

        //buat query untuk mengambil data koleksi Buku
        $sql = "select * from sirkulasi where  like '$kata_kunci' or
                nama like '$kata_kunci'";;
    } else {
        //Tampilkan semua Data
        $sql="SELECT * FROM t_anggota,t_buku_detail,t_buku";
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
          echo "<td>".$data['nomor_sirkulasi'] ."</td>";
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

        echo '<td><a href="form_anggota_edit.php?id='.$data['id'].'">Edit</a> / <a href="hapus_anggota.php?id='.$data['id'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';
        echo "</tr>";
      }

?>
</body>
</html>
