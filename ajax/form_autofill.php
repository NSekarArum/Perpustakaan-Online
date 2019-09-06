<DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Cobaan</title>
</head>
<body>
<table>
    <tr><td>Nomor Anggota</td><td><input type="text" id="nomor_anggota" onkeyup="autofill()"></td></tr>
    <tr><td>Nama</td><td><input type="text" id="nama"></td></tr>
    <tr><td>Alamat</td><td><input type="text" id="alamat"></td></tr>
</table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        function autofill(){            
            var nomor_anggota = $("#nomor_anggota").val();
            //alert (nomor_anggota);
            $.ajax ({
                url : 'autofill-ajax.php',
                data : 'nomor_anggota='+nomor_anggota,
            }).success (function(data){
                var json = data,
                obj = JSON.parse(json);
                $("#nama").val(obj.nama);
            });
        }
     </script>
</body>
</html>
