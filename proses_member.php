<?php
if($_POST){

    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $alamat=$_POST['alamat'];
    $jk=$_POST['jk'];
    $telp=$_POST['telp'];
    $password=$_POST['password'];
    
    
    if(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='member.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='member.php';</script>";
    } elseif(empty($alamat)){
        echo "<script>alert('alamat tidak boleh kosong');location.href='member.php';</script>";
    } elseif(empty($jk)){
        echo "<script>alert('jenis kelamin tidak boleh kosong');location.href='member.php';</script>";
    } elseif(empty($telp)){
        echo "<script>alert('telpon tidak boleh kosong');location.href='member.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='member.php';</script>";
    } else {
        
        include "koneksi.php";
        $insertmember=mysqli_query($conn,"insert into member (nama, username, alamat, jk, telp, password) value ('".$nama."','".$username."','".$alamat."','".$jk."','".$telp."','".$password."')") or die(mysqli_error($conn));

        if($insertmember){
            echo "<script>alert('Sukses menambahkan member');location.href='member.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan member');location.href='member.php';</script>";
        }
    }
}
?>