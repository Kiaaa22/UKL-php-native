<div class="bg_histori">
    <?php
    // session_start();
    include "header.php";

    
    ?>
    <center>
    <h3>History Pesanan Laundry</h3><br>
    </center>
    <table class="table table-hover table-striped">
        <thead>
            <style>
            </style>
            <th>NO</th>
            <?php if ($_SESSION['role'] != "Member") { ?>
                <th>
                    Id Member
                </th>
            <?php } ?>
            <th>Tanggal Pesan</th>
            <th>Tanggal Bayar</th>
            <th>Jenis Paket</th>
            <th>Status</th>
            <th>Status Bayar</th>
            <th>Aksi</th>
        </thead>
        <tbody> 
            <?php
            include "koneksi.php";
            if ($_SESSION['role'] == "Kasir") {
                $qry_histori = mysqli_query($conn, "select * from transaksi order by id_transaksi desc");
            } elseif ($_SESSION['role'] == "Member") {
                $id_member = $_SESSION['id_member'];
                $qry_histori = mysqli_query($conn, "select * from transaksi where id_member ='" . $id_member . "' order by id_transaksi desc");
            } elseif ($_SESSION['role'] == "Admin") {
                $qry_histori = mysqli_query($conn, "select * from transaksi order by id_transaksi desc");
            }
            $no = 0;
            while ($dt_histori = mysqli_fetch_array($qry_histori)) {
                $no++;

                //menampilkan laundry yang dipesan 
                $laundry_dipesan = "<ul>";
                $qry_paket = mysqli_query($conn, "select transaksi.id_member,transaksi.tgl, transaksi.tgl_bayar, paket.jenis, transaksi.status, transaksi.dibayar FROM transaksi join detail_transaksi on transaksi.id_transaksi = detail_transaksi.id_transaksi join paket on detail_transaksi.id_paket = paket.id_paket where transaksi.id_transaksi = '".$dt_histori['id_transaksi']."';");
                while ($dt_paket = mysqli_fetch_array($qry_paket)) {
                    $laundry_dipesan .= "<li>" . $dt_paket['jenis'] . "</li>";
                }
                $laundry_dipesan .= "</ul>";
                //menampilkan status sudah bayar atau belum
                $qry_cek_bayar = mysqli_query($conn, "select * from transaksi where id_transaksi = '" . $dt_histori['id_transaksi'] . "'");
                    
                if (mysqli_num_rows($qry_cek_bayar) > 0) {
                    $dt_transaksi = mysqli_fetch_array($qry_cek_bayar);
                    if($_SESSION['role']!='Member'){
                        if($dt_transaksi['status']=='Baru'){
                            $button_selesai = "<a href='selesai.php?id=".$dt_histori['id_transaksi']."' class='btn btn-warning' onclick='return confirm(\"Apakah anda yakin?\")'>Proses</a>";
                        }else if($dt_transaksi['status']=='Proses'){
                            $button_selesai = "<a href='selesai.php?id=".$dt_histori['id_transaksi']."' class='btn btn-warning' onclick='return confirm(\"Apakah anda yakin?\")'>Selesai</a>";
                        }else if($dt_transaksi['status']=='Selesai'){
                            $button_selesai = "<a href='selesai.php?id=".$dt_histori['id_transaksi']."' class='btn btn-warning' onclick='return confirm(\"Apakah anda yakin?\")'>Diambil</a>";
                        }else if($dt_transaksi['status']=='Diambil'){
                            $button_selesai = "";
                        }
                    }
                    if ($dt_histori['dibayar'] == "belum_bayar") {
                        ?>
                            <a href="ubah_status_pembayaran.php?id_transaksi=<?= $dt_histori['id_transaksi'] ?> "><button class="btn btn-success btn-sm">Lunas</button></a> 
                        <?php
                        $button_bayar = "<a href='dibayar.php?id=".$dt_histori['id_transaksi']."' class='btn btn-warning' onclick='return confirm(\"Apakah anda yakin?\")'>Dibayar</a>";
                    }
                } 

            ?>
                <tr>
                    <td><?= $no ?></td>
                    <!-- <td><?= $dt_histori['id_member'] ?></td> -->
                    <td><?= $dt_histori['tgl'] ?></td>
                    <td><?= $dt_histori['tgl_bayar'] ?></td>
                    <td><?= $laundry_dipesan ?></td>
                    <td><?= $dt_histori['status'] ?></td>
                    <td><?= $dt_histori['dibayar'] ?></td>
                    <?php if ($_SESSION['role'] != "Member" ) { ?>
                        <td><?= $button_selesai ?></td>
                    <?php } ?>
                    <?php if ($dt_histori['dibayar']=="Belum_bayar" ) { ?>
                        <td><?= $button_bayar ?></td>
                    <?php } ?>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    include "footer.php";
    ?>
</div>