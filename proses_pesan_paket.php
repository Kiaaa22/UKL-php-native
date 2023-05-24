<?php
session_start();
include "koneksi.php";
var_dump($_POST);

if ($_POST['pesan']) {
    $qry_get_paket = mysqli_query($conn, "select * from paket where id_paket = '" . $_POST['id_paket'] . "'");
    $dt_paket = mysqli_fetch_array($qry_get_paket);
    $qty = $_POST['jumlah_kilo'];
    $cart[] = array(
        'id_paket' => $dt_paket['id_paket'],
        'jenis_paket' => $dt_paket['jenis'],
        'harga' => $dt_paket['harga']
    );
    if (count($cart) > 0) {
        $lama_pesanan = 2; //satuan hari
        $tgl_selesai = date('Y-m-d', mktime(0, 0, 0, date('m'), (date('d') + $lama_pesanan), date('Y')));
        mysqli_query($conn, "insert into transaksi (id_member,tgl,tgl_selesai) value('" . $_SESSION['id_member'] . "','" . date('Y-m-d') . "','" . $tgl_selesai . "')");
        $id = mysqli_insert_id($conn);
        foreach ($cart as $key_produk => $val_paket) {
            mysqli_query($conn, "insert into detail_transaksi (id_transaksi,id_paket,qty) value('" . $id . "','" . $_POST['id_paket'] . "','" . $qty . "')");
        }
        echo '<script>alert("Anda berhasil memesan laundry");location.href="histori_laundry_old.php"</script>';
    } else {
        echo "yeyy";
    }
}

if ($_POST['tambah']) {
    $qry_get_paket = mysqli_query($conn, "select * from paket where id_paket = '" . $_GET['id_paket'] . "'");
    $dt_paket = mysqli_fetch_array($qry_get_paket);
    var_dump($dt_paket);
    $_SESSION['cart'][] = array(
        'id_paket' => $dt_paket['id_paket'],
        'jenis' => $dt_paket['jenis'],
        'harga' => $_POST['harga'] * $_POST['qty'],
        'qty' => $_POST['qty']
    );
    header('location: keranjang.php ');
}
