<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form Pengisian Buku Baru</title>
    <style>
table#tabel, #table th, #tabel tr, #tabel td{
border:0px;
border-collapse:collapse;
}
	</style>
	</head>
<body>

      <form class="" action="insert_anggota.php" method="post">
  <table id="tabel">
  <tr><td>
        <p>Nomor Anggota :  <input type="text" name="nomor_anggota" value="" required> </p></td></tr>
  <tr><td>
        <p>Nama Anggota  :  <input type="text" name="nama" value=""> </p></td></tr>
  <tr><td>
        <p><input type="submit" name="simpan" value="Simpan">
        <input type="reset" name="reset" value="Reset"></p></td></tr>

      </form>
  </body>
</html>
