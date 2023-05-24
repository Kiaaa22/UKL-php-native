<?php 
    if($_POST){
        
        $username=$_POST['username'];
        $password=$_POST['password'];
        $role=$_POST['role'];
    
        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        } else {
            include "koneksi.php";
            
            if($role == "Member"){
                $qry_member=mysqli_query($conn,"select * from member where username = '".$username."' and password = '".$password."'");
                if(mysqli_num_rows($qry_member)>0){
                $dt_member=mysqli_fetch_array($qry_member);
                session_start();
                $_SESSION['id_member']=$dt_member['id_member'];
                $_SESSION['nama']=$dt_member['nama'];
                $_SESSION['role']= "Member";
                $_SESSION['status_login']=true;
                header("location: home.php");
                }else {
                    echo "<script>alert('Username / Password / Role tidak benar');location.href='login.php';</script>";
                }
        } elseif ($role=="Admin" || $role=="Kasir"){
            $qry_login=mysqli_query($conn,"select * from user where username = '".$username."' and password = '".$password."' and role = '".$role."'");
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                    $_SESSION['id_user']=$dt_login['id_user'];
                    $_SESSION['nama']=$dt_login['nama'];
                    $_SESSION['role']= $dt_login['role'];
                    $_SESSION['status_login']=true;
                    header("location: home.php");
            }else {
                echo "<script>alert('Username / Password / Role tidak benar');location.href='login.php';</script>";
            }


        }else {
            echo "<script>alert('Username / Password / Role tidak benar');location.href='login.php';</script>";
        }

            }
        }

?>