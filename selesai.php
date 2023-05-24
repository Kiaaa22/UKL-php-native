<?php 
if($_GET['id']){
    include "koneksi.php";
    $id_transaksi=$_GET['id'];
    $cek_terlambat=mysqli_query($conn, "select * from transaksi where id_transaksi = '".$id_transaksi."' ");
    $dt_bayar=mysqli_fetch_array($cek_terlambat);
    if(strtotime($dt_bayar['tgl'])<=strtotime(date('Y-m-d'))){
        $denda=0;
    } else{
        $harga_denda_perhari=1000;
        $tgl = new DateTime();
        $tgl_bayar = new DateTime($dt_bayar['tgl_sampai']); 
        $selisih_hari = $tgl->diff($tgl_bayar)->d;
        mysqli_query($conn, "insert into transaksi (denda) value('".$denda."')");
    }
    if($dt_bayar['status']=='Baru'){
        mysqli_query($conn,"update transaksi set status='Proses' where id_transaksi='".$id_transaksi."'");
    }else if($dt_bayar['status']=='Proses'){
        mysqli_query($conn,"update transaksi set status='Selesai' where id_transaksi='".$id_transaksi."'");
    }else if($dt_bayar['status']=='Selesai'){
        mysqli_query($conn,"update transaksi set status='Diambil' where id_transaksi='".$id_transaksi."'");
    }
    header('location: histori_laundry_old.php');
}
?>