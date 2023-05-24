<?php include 'header.php'; ?>
<center><h3>Daftar Paket Laundry</h3>
</center>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA PAKET</th>
            <th>HARGA</th>
            <?php if ($_SESSION['role'] == "Admin") { ?>
                    <th><a href="tambah_paket.php" class="btn btn-primary">TAMBAH PAKET</a>
                        
                    </th>

                <?php } elseif ($_SESSION['role'] == "Kasir") { ?>
                    <th>
                        AKSI
                    </th>
                <?php } ?>
            
        </tr>
    </thead>
    <tbody>
        <?php
        include "koneksi.php";
        $qry_paket = mysqli_query($conn, "select * from paket");
        $no = 0;
        while ($data_paket = mysqli_fetch_array($qry_paket)) {
            $no++; ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $data_paket['jenis'] ?></td>
                <td>IDR <?= $data_paket['harga'] ?></td>
                <?php if ($_SESSION['role'] == "Admin") { ?>

                    <td><a href="ubah_paket.php?id_paket=<?= $data_paket['id_paket'] ?>" class="btn btn-success">Ubah</a>
                        <a href="hapus_paket.php?id_paket=<?= $data_paket['id_paket'] ?>" class="btn btn-danger">Hapus</a>
                    </td>

                <?php } elseif ($_SESSION['role'] == "Kasir") { ?>
                    <td>
                        <a href="ubah_paket.php?id_paket=<?= $data_paket['id_paket'] ?>" class="btn btn-success">Ubah</a>
                    </td>

                <?php } elseif ($_SESSION['role'] == "Member") { ?>
                    <td>
                        <a href="pesan_paket.php?id_paket=<?= $data_paket['id_paket'] ?>" class="btn btn-primary">Pesan</a>
                    </td>
            </tr>
    <?php
                }
            }
    ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>