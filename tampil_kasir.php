<?php include 'header.php'; ?>
<center><h3>Daftar Laundry Bunga</h3>
</center>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>USERNAME</th>
            <th>ROLE</th>
            <?php if ($_SESSION['role'] == "Admin") { ?>
                    <th><a href="tambah_kasir.php" class="btn btn-primary">TAMBAH KASIR</a>
                        
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
        $qry_kasir = mysqli_query($conn, "select * from user");
        $no = 0;
        while ($data_kasir = mysqli_fetch_array($qry_kasir)) {
            $no++; ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $data_kasir['nama'] ?></td>
                <td><?= $data_kasir['username'] ?></td>
                <td><?= $data_kasir['role'] ?></td>
                <?php if ($_SESSION['role'] == "Admin") { ?>
                    <td><a href="ubah_kasir.php?id_user=<?= $data_kasir['id_user'] ?>" class="btn btn-success">Ubah</a>
                        <a href="hapus_kasir.php?id_user=<?= $data_kasir['id_user'] ?>" class="btn btn-danger">Hapus</a>
                    </td>

                <?php } elseif ($_SESSION['role'] == "Kasir") { ?>
                    <td>
                        <a href="ubah_kasir.php?id_user=<?= $data_kasir['id_user'] ?>" class="btn btn-success">Ubah</a>
                    </td>
                <?php } ?>
                    
    <?php
                }
    ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>