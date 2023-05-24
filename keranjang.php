<?php
include "header.php";

?>
<h2>Keranjang</h2>
<form action="checkout.php" method="post">
<table class="table table-hover striped">
    <thead>
        <style>
        </style>
        <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    
    <tbody>

        <?php
        foreach (@$_SESSION['cart'] as $key_paket => $val_paket) : ?>
            <tr>
                <td>
                    <?= ($key_paket + 1) ?>
                </td>
                <td>
                    <input type="hidden" name="id_paket" value="<?= $val_paket['id_paket'] ?>">
                    <input type="hidden" name="jenis" value="<?= $val_paket['jenis'] ?>">
                    <?= $val_paket['jenis'] ?>
                </td>
                <td>
                    <input type="hidden" name="qty" value="<?= $val_paket['qty'] ?>">
                    <?= $val_paket['qty'] ?>
                </td>
                <td>
                    <?= $val_paket['harga'] ?>
                </td>
                <td>
                    <a href="hapus_cart.php?id=<?= $key_paket ?>" class="btn btn-danger"><strong>X</strong></a>
                </td>
            </tr>

        <?php endforeach ?>


    </tbody>
</table>

    <button type="submit" name="pesan" class="btn btn-success" value="pesan">Pesan</button>
    <a href="tampil_paket.php" class="btn btn-primary" role="button">Tambah</a>
</form>
<?php
include "footer.php";
?>