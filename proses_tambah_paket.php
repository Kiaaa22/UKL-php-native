<?php
if($_POST){
    $id_paket=$_POST['id_paket'];
    $jenis=$_POST['jenis'];
    $harga=$_POST['harga'];
    
    
    if(empty($jenis)){
        echo "<script>alert('Jenis tidak boleh kosong');location.href='tambah_paket.php';</script>";
    } elseif(empty($harga)){
        echo "<script>alert('Harga tidak boleh kosong');location.href='tambah_paket.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into paket (id_paket, jenis, harga) value ('".$id_paket."','".$jenis."','".$harga."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan Paket');location.href='tambah_paket.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan Paket');location.href='tambah_paket.php';</script>";
        }
    }
}
?>