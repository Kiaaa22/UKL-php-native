<?php
include "header.php";
include "koneksi.php";
$qry_detail_paket = mysqli_query($conn, "select * from paket where id_paket = '" . $_GET['id_paket'] . "'");
$dt_paket = mysqli_fetch_array($qry_detail_paket);

?>
<h2>Pesan Paket</h2>
<div class="row">
    <div class="col-md-8">
        <form action="proses_pesan_paket.php?id_paket=<?= $dt_paket['id_paket'] ?>" method="post">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td>Id Member </td>
                        <td><?=$_SESSION['id_member']?></td>
                    </tr>
                    <tr>
                        <td>Nama Paket</td>
                        <td><?= $dt_paket['jenis'] ?></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><input type="number" name="harga" value="<?= $dt_paket['harga'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Jumlah Kilo</td>
                        <td><input type="number" name="qty" value="1"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" name="pesan" class="btn btn-success" value="pesan">Pesan</button>
                            <button type="submit" name="tambah" class="btn btn-primary" value="tambah">Tambah</button>
                        </td>
                        <a href="tampil_paket.php?" class="btn btn-dark" style="float:right;">X</a>
                    </tr>
                </thead>
            </table>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>