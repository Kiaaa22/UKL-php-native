<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
    <style>
        * {
            margin: 10px;
        }
    </style>
</head>

<body>
    <?php
    include "koneksi.php";
    $qry_get_kasir = mysqli_query($conn, "select * from user where id_user = '" . $_GET['id_user'] . "'");
    $dt_kasir = mysqli_fetch_array($qry_get_kasir);
    ?>
    <div class="col-md rounded bg-light" style="box-shadow: 4px 4px 5px -4px;padding:10px">
        <h3>Ubah Kasir</h3>
        <form action="proses_ubah_kasir.php" method="post" enctype="multipart/form-data">
        Nama :
        <input type="text" name="nama" value="" class="form-control">
        Username :
        <input type="text" name="username" value="" class="form-control">
        Password :
        <input type="text" name="password" value="" class="form-control">
            <input type="submit" name="simpan" value="Ubah kasir" class="btn btn-dark mt-3">
            <a href="tampil_kasir.php?" class="btn btn-dark" style="float:right;">Kembali</a>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>