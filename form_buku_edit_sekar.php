<?php
  //buka koneksi
  include "koneksi.php";
  //masukkan id data yang akan diedit
  $id=$_GET['id'];

  //buat query untuk mencari data sesuai kriteria
  $sql="select * from t_buku where id='$id'";

  //dapat hasil
  $hasil = mysqli_query($conn, $sql);

  //jika data tidak ada maka tampilkan pesan
  if (mysqli_num_rows($hasil)==0) {
      echo "Data tidak ada!";
      return;
  }

  //ambil data
  $data = mysqli_fetch_array($hasil);

  //masukkan data ke variabel
  $kode_buku = $data['kode_buku'];
  $judul_buku = $data['judul_buku'];
  $pengarang = $data['pengarang'];
  $penerbit= $data['penerbit'];
  $tahun= $data['tahun'];
  $jml_copy= $data['jml_copy'];
?>

<!DOCTYPE html>
<html>
<head>
<style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;

}

input[type=submit]:hover {
    background-color: grey;
}

input[type=reset] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 200px;
}

input[type=reset]:hover {
    background-color: grey;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>

  <!--tampilkan variabel di form
 -->
  <form class="" action="buku_edit_sekar.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="container">
      <form class="" action="insert_buku.php" method="post">
          <div class="row">
            <div class="col-25">
              <label>Nomor buku : </label>
            </div>
            <div class="col-75">
              <input type="text" name="kode_buku" value="<?php echo $kode_buku; ?>" required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Judul buku :</label>
            </div>
            <div class="col-75">
              <input type="text" name="judul_buku" value="<?php echo $judul_buku; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Pengarang :</label>
            </div>
            <div class="col-75">
              <input type="text" name="pengarang" value="<?php echo $pengarang; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Penerbit :</label>
            </div>
            <div class="col-75">
              <input type="text" name="penerbit" value="<?php echo $penerbit; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Tahun :</label>
            </div>
            <div class="col-75">
              <input type="text" name="tahun" value="<?php echo $tahun; ?>"><br>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Jumlah copy :</label>
            </div>
            <div class="col-75">
              <input type="number" name="jml_copy" value="<?php echo $jml_copy; ?>">
            </div>
            <br><br><input type="submit" name="reset" value="reset">&nbsp;&nbsp;
            <input type="submit" name="simpan" value="submit">&nbsp;&nbsp;
          </div>

  </form>
</body>
</html>
