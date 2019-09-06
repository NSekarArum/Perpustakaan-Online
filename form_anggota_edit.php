<?php
  //buka koneksi
  include "koneksi.php";
  //masukkan id data yang akan diedit
  $id=$_GET['id'];

  //buat query untuk mencari data sesuai kriteria
  $sql="select * from t_anggota where id='$id'";

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
  $nomor_anggota = $data['nomor_anggota'];
  $nama = $data['nama'];
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
  <form class="" action="anggota_edit.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="container">
        <form class="" action="insert_anggota.php" method="post">
            <div class="row">
              <div class="col-25">
              <label>Nomor anggota : </label>
            </div>
            <div class="col-75">
              <input type="text" name="nomor_anggota" value="<?php echo $nomor_anggota; ?>" required>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label>Nama anggota :</label>
            </div>
            <div class="col-75">
              <input type="text" name="nama" value="<?php echo $nama; ?>">
          <br><br><input type="reset" name="reset" value="reset">&nbsp;&nbsp;&nbsp;
          <input type="submit" name="simpan" value="submit">
          </div>
        </div>
  </form>
</body>
</html>
