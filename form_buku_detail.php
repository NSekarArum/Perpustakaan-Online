<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form Pengisian Buku Baru</title>
  </head>
  <body>
      <h1>Buku Baru</h1>

      <form class="" action="insert_buku_detail.php" method="post">
        <p>ID Buku :  <input type="text" name="id_buku" value=""> </p>
        <p>Nomor register :  <input type="text" name="no_register" value=""> </p>
        <p>Status tersedia :  <input type="text" name="status_tersedia" value=""> </p>
        <p>Dipinjam Oleh :  <input type="text" name="dipinjam_oleh" value=""> </p>
        <p><input type="submit" name="simpan" value="Simpan">
        <input type="reset" name="reset" value="Reset"></p>

      </form>
  </body>
</html>
