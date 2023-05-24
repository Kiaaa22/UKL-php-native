<!doctype html>
<html class="htmlLogin" lang="en">

<head>
    <?php
    session_start();
    if(isset($_SESSION['status_login'])){
        header('location: home.php');
    }
    ?>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Custom CSS -->
<link href="style/style.css" rel="stylesheet">

<title>Laundry Bunga</title>
</head>

<body class="bodyLogin">
<div class="global-container">
    <div class="floating" id="kotak" class="card login-form" style="height: 500px;">
    <div class="card-body">
        <div class="d-flex justify-content-center align-items-center flex-column ">
        <h1 class="">Laundry Bunga</h1>
        <img src="image/BUNGA.png" style="width: 130px;" >
        
        </div>
        <div class="card-text " style="max-width: 495px; margin: auto;">
        <form action="proses_login.php" method="post" style="margin: auto;">
            <form action="header.php" method="post">
            Username :
            <input type="text" name="username" value="" class="form-control">
            Password :
            <input type="password" name="password" class="form-control">
            Login Sebagai :
            <select name="role" class="form-control">
                <option style="text-align: center;">----Login as----</option>
                <option value="Admin">Admin</option>
                <option value="Kasir">Kasir</option>
                <option value="Member">Member</option>
            </select><br>
            <div>
                <div >
                <center><input type="submit" name="login" class="btn btn-success" value="LOGIN"></center>
                <center>
                    <p style="padding-top: 30px ;">Belum memiliki akun? <a href="tambah_member.php">Sign Up</a></p>
                </center>
                </div>
            </div>
            </form>
        </form>
        </div>
    </div>
    </div>
</div>

</body>

</html>