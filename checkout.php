<?php 
session_start();
include "koneksi.php";
$cart=@$_SESSION['cart'];
$id_member = $_SESSION['id_member'];
if(count($cart)>0 and $id_member != NULL){
    $tgl_bayar=2; //satuanhari
    $tgl_harus_bayar=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$tgl_bayar),date('Y')));
    mysqli_query($conn, "insert into transaksi(id_member, tgl, batas_waktu, tgl_bayar, status, dibayar, id_user) value ('".$id_member."','".date('Y-m-d')."','".$tgl_harus_bayar."','".date('Y-m-d')."','baru','belum_dibayar','".$_SESSION['id_user']."')");
    $id=mysqli_insert_id($conn);
    foreach($cart as $key_produk => $val_produk){
        mysqli_query($conn, "insert into detail_transaksi(id_transaksi,id_paket,qty) value ('".$id."','".$val_produk['id_paket']."','".$val_produk['qty']."')");
    }
    unset($_SESSION['cart']);
echo '<script>alert("Pembelian berhasil");location.href="histori_laundry_old.php"</script>';
}else{
    // echo '<script>alert("Belum diisi semua");location.href="pesan.php"</script>';
}
?>