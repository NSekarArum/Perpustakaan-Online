<?php
require '../peminjaman.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM sirkulasi,t_anggota,t_buku_detail,t_buku
          WHERE
          no_sirkulasi LIKE '%keyword%' OR
          nama LIKE '%keyword%' OR
          no_register LIKE '%keyword%' OR
          judul_buku LIKE '%keyword%'
          ";
$sirkulasi = query($query);
?>
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
            <th width="20%">Opsi</th>
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
    <a href="form_peminjaman_edit.php?id='.$data['id'].'" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit">&nbsp;Edit</i></a>
    <a href="hapus_peminjaman.php?id='.$data['id'].'" class="btn btn-danger btn-xs" onclick="return confirm(\'Yakin?\')"><i class="glyphicon glyphicon-trash">&nbsp;Hapus</i></a></td>
  </tr>
<?php } ?>
</table>
