<h1><font face="Arial"> Daftar Buku</font></h1>
<h3>Perpustakaan SMKN 1 Katapang</h3>

<a href='cari_buku2.php'> Cari Buku </a><br>

<?php
    //koneksi
    include "koneksi.php";

    //cetak semua var PDOStatement
    //print_r ($_POST);
    //return 0;

    //tangkap kriteria
    if (isset($_POST['submit'])) {

      //tangkap judul dari form
      $kata_kunci = '%' . $_POST['kata_kunci'] . '%';

     //buat query untuk mengambil data koleksi Buku
     $sql = "select * from t_buku where judul_buku like '$kata_kunci' or
                       pengarang like '$kata_kunci' or
                       penerbit like '$kata_kunci'";

     //eksekusi
     $hasil = mysqli_query ($conn, $sql);
     //jika tidak ditemukan berikan Perpustakaan
     if (mysqli_num_rows($hasil)==0) {
       echo "Data buku tidak ada...";
       return 0;
     }

     //klo ada, tampilkan deh semua data buku
    while ($data = mysqli_fetch_array($hasil))
    {
      //tampilkan hasil eksekusi
      $xid = $data['id'];
      echo "<br>";
      echo "<b>ID Buku</b>    : " . $data['id'] . "<br>" ;
      echo "Nomor Buku : " . $data['kode_buku'] . "<br>"  ;
      echo "Judul      : " . $data['judul_buku'] . "<br>"  ;
      echo "Pengarang  : " . $data['pengarang'] . "<br>"  ;
      echo "Penerbit   : " . $data['penerbit'] . "<br>"  ;
      echo "Tahun      : " . $data['tahun'] . "<br>"  ;
      echo "Jumlah Copy: " . $data['jml_copy'] . "<br>"  ;
      echo "--------------------------------------------------------";
      echo "<br>";}

}

 ?>
