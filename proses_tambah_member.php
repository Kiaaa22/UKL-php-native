<?php
if($_POST){
    $id_user=$_POST['id_user'];
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    
    
    if(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='tambah_member.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_member.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_member.php';</script>";
    } elseif(empty($role)){
        echo "<script>alert('role tidak boleh kosong');location.href='tambah_member.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into user (id_user, nama, username, password, role) value ('".$id_user."','".$nama."','".$username."','".$password."','".$role."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan user');location.href='tambah_member.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan user');location.href='tambah_member.php';</script>";
        }
    }
}
?>