<?php 
if($_GET['id']){
    include "koneksi.php";
    $id_transaksi=$_GET['id'];
    $cek_terlambat=mysqli_query($conn, "select * from transaksi where id_transaksi = '".$id_transaksi."' ");
    $dt_bayar=mysqli_fetch_array($cek_terlambat);
    if($dt_bayar['dibayar']=='Belum_bayar'){
        mysqli_query($conn,"update transaksi set dibayar='Dibayar' where id_transaksi='".$id_transaksi."'");
    }
    header('location: histori_laundry_old.php');
}
?>