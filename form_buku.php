<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form Pengisian Buku Baru</title>
  </head>
  <body>
      <h1>Buku Baru</h1>

      <form class="" action="insert_buku.php" method="post">
        <p>Nomor Buku :  <input type="text" name="kode_buku" value=""> </p>
        <p>Judul :  <input type="text" name="judul_buku" value=""> </p>
        <p>Pengarang :  <input type="text" name="pengarang" value=""> </p>
        <p>Penerbit :  <input type="text" name="penerbit" value=""> </p>
        <p>Tahun Terbit :  <input type="text" name="tahun" value=""> </p>
        <p>Jumlah Copy :  <input type="text" name="jml_copy" value=""> </p>
        <p><input type="submit" name="simpan" value="Simpan">
        <input type="reset" name="reset" value="Reset"></p>

      </form>
  </body>
</html>
