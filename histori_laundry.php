<?php
include 'header.php'; ?>
<!DOCTYPE html>
<style>

</style>
<body>
    <h2 align="center"><strong>Histori Pemesanan Laundry</strong></h2>
    <table   
    
    class="table table-secondary table-striped">
        <br>
        <thead>
            <tr>
                <th>NO</th>
                <th> Nama Member</th>
                <th> Nama User</th>
                <th>Paket Laundry - Qty - Harga</th>
                <th>Total Harga</th>
                <th>Status Bayar</th>
                <th>Status Paket</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $qry_histori = mysqli_query(
                $conn,'select transaksi.*, member.nama, user.nama from transaksi join user ON user.id_user = transaksi.id_user join member ON member.id_member = transaksi.id_member order by id_transaksi desc');
            $no = 0;
            while ($dt_histori = mysqli_fetch_array($qry_histori)) {
                $total = 0;
                $no++;
                $paket_dipesan = '<ol>';
                $qry_paket = mysqli_query($conn,"select * from  detail_transaksi join paket on paket.id_paket=detail_transaksi.id_paket where id_transaksi = '" .$dt_histori['id_transaksi'] ."'");
                while ($dt_paket = mysqli_fetch_array($qry_paket)) {
                    $subtotal = 0;
                    $subtotal += $dt_paket['harga'] * $dt_paket['qty'];
                    $paket_dipesan .=
                        "<li class = 'paket'>" .
                        $dt_paket['jenis'] .
                        '&nbsp;&nbsp;-&nbsp;&nbsp;' .
                        $dt_paket['qty'] .
                        '&nbsp;&nbsp;-&nbsp;&nbsp;' .
                        'Rp. ' .
                        number_format($subtotal, 2, ',', '.') .
                        '' .
                        '</li>';
                    $total += $dt_paket['harga'] * $dt_paket['qty'];
                    $button_cetak_detail =
                        "<a href='detail_transaksi.php?id=" .
                        $dt_histori['id_transaksi'] .
                        "' class='btn btn-warning'>Cetak Detail</a>";
                }
                $paket_dipesan .= '</ol>';
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $dt_histori['nama_member'] ?></td>
                    <td><?= $dt_histori['nama_user'] ?></td>
                    <td><?= $paket_dipesan ?></td>
                    <td> <?php echo 'Rp. ' .
                        number_format($total, 2, ',', '.') .
                        ''; ?>
                    </td>
                
                    <?php if (
                        $dt_histori['status_bayar'] == 'sudah_dibayar'
                    ) { ?>
                    <td>
                        <?= $dt_histori['status_bayar'] ?></td>
                    <?php } ?>
                    <td><?= $dt_histori['status_order'] ?></td>
                    <td>
                        <?php if (
                            $dt_histori['status_bayar'] == 'belum_dibayar'
                        ) { ?>
                            <a 
                            href="/laundry/tambah-ubah/ubah_status.php?id_transaksi=<?= $dt_histori[
                                'id_transaksi'
                            ] ?> "><button class="btn btn-primary">Lunas</button></a> |
                        <?php } else { ?>
                        
                            <img src="selesai.png" alt=""> |
                        <?php } ?>
                        <?php if ($dt_histori['status_order'] == 'baru') { ?>
                            <a href="/laundry/tambah-ubah/ubah_status_paket.php?id_transaksi=<?= $dt_histori[
                                'id_transaksi'
                            ] ?>&status_order=proses"><button class="btn btn-primary">Diproses</button></a>
                        <?php } elseif (
                            $dt_histori['status_order'] == 'proses'
                        ) { ?>
                            <a href="/laundry/tambah-ubah/ubah_status_paket.php?id_transaksi=<?= $dt_histori[
                                'id_transaksi'
                            ] ?>&status_order=selesai"><button class="btn btn-primary">Selesai</button></a>
                        <?php } elseif (
                            $dt_histori['status_order'] == 'selesai'
                        ) { ?>
                            <a href="/laundry/tambah-ubah/ubah_status_paket.php?id_transaksi=<?= $dt_histori[
                                'id_transaksi'
                            ] ?>&status_order=diambil"><button class="btn btn-primary">Diambil</button></a>
                        <?php } elseif (
                            $dt_histori['status_order'] == 'diambil'
                        ) { ?><img src="selesai.png" alt="">|
                        <?php if ($dt_histori['status_bayar'] == 'sudah_dibayar') { ?>
                    <?= $button_cetak_detail ?>
                        <?php }} ?>
                    </td>
                </tr>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
        <a href="hapus_histori.php" onclick="return confirm('Apakah anda ingin menghapus semua history?')" class="btn btn-secondary"> Hapus Histori</a>
</body>

</html>