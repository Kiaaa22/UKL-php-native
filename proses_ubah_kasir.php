<?php
if($_POST){
    $id_user=$_POST['id_user'];
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password = $_POST['password'];

    if(empty($nama)){
        echo "<script>alert('Nama tidak boleh kosong');location.href='ubah_kasir.php';</script>";
    } elseif(empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='ubah_kasir.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('Password tidak boleh kosong');location.href='ubah_kasir.php';</script>";
    }

    else {
        include "koneksi.php";
        if(empty($nama)){
            $update=mysqli_query($conn,"update data set nama='".$nama."',username='".$username."' " ) or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update kasir');location.href='tampil_kasir.php';</script>";
            } else {
                echo "<script>alert('Gagal update kasir');location.href='ubah_kasir.php?id_user=".$id_user."';</script>";
            }
        } else {
            
            $update=mysqli_query($conn,"update data set nama='".$nama."', harga='".$username."' 
            where id_user ='". $id_user. "' ") or die(mysqli_error($conn));
            
            if($update){
                echo "<script>alert('Sukses update data kasir');location.href='home.php';</script>";
            } else {
                echo "<script>alert('Gagal update data kasir');location.href='ubah_kasir.php?id_user=".$id_user."';</script>";
            }
        }
        
    } 
}
?>