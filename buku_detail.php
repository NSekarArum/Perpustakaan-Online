<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title> Perpustakaan Buku detail</title>
    <style>
    th {
      background-color: pink;
    }
    </style>
</head>

<body>
  <h1><u>Buku Detail</u></h1>
<table border="1" width="60%">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>ID buku</th>
            <th>Nomor register</th>
            <th>Status tersedia buku</th>
            <th>Dipinjam oleh</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
<?php

    //buat link
    //agar bisa mengisi lagi
    echo "<a href='form_buku_detail.php'> Tambah Lagi </a><br><br>";
    echo "<a href='cari_buku_detail.php'> Cari buku detail </a><br><br>";
    if (isset($_POST['submit'])) {
        //tangkap judul dari form
        $no_register =   $_POST['no_register'] ;

        //buat query untuk mengambil data koleksi Buku
        $sql = "select * from t_buku_detail where
                no_register = '$no_register'";;
    } else {
        //Tampilkan semua Data
        $sql="SELECT * FROM t_buku_detail";
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
          echo "<td>". $data['id_buku'] . "</td>";
          echo "<td>". $data['no_register'] . "</td>" ;
          echo "<td>". $data['status_tersedia'] . "</td>" ;
          echo "<td>". $data['dipinjam_oleh'] . "</td>" ;

          //nomor bertambah 1
          $nomor++;

    	  echo '<td><a href="form_buku_detail_edit.php?id='.$data['id'].'">Edit</a> / <a href="hapus_buku_detail.php?id='.$data['id'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';
    	  echo "</tr>";
}
?>
