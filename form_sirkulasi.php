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
</head>
<body>

<h2>Form pelanggan</h2>
<div class="container">
<form class="" action="insert_sirkulasi.php" method="post">
    <div class="row">
      <div class="col-25">
        <label>Nomor anggota :</label>
      </div>
      <div class="col-75">
        <input type="text" name="nomor_anggota" placeholder="Masukkan nomor anggota">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Nomor registrasi :</label>
      </div>
      <div class="col-75">
        <input type="text" name="no_register" placeholder="Masukkan nomor register">
      </div>
    </div>
        <div class="row">
      <div class="col-25">
      <label>Tanggal pinjam : </label>
      </div>
      <div class="col-75">
        <input type="date" name="tanggal_pinjam" placeholder="Tanggal pinjam">
      </div>
    </div>
    <br><br><input type="reset" name="reset" value="reset">&nbsp;&nbsp;&nbsp;
    <input type="submit" name="simpan" value="submit">
    </div></div>
  </form>
</div>

</body>
</html>
