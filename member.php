<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<style>
        .container{
            width: 80%;
            margin: 0 auto;
            margin-top: 5vh;

        }
        .container h3{
            text-align: center;
            color : black;
            font-family : 'Montserrat';
        }
        .container .form-btn{
            margin-top: 3vh;
            background-color: Black;
            padding: 10px;
        }
        .container .form-btn:hover{
            background-color: green;
            color: white;
        }
    </style>
<body>
<div class="container">
    <h3>Member</h3>
    <form action="proses_member.php" method="post">

        Nama :
        <input type="text" name="nama" value="" class="form-control">
        Username : 
        <input type="text" name="username" value="" class="form-control">
        Alamat :
        <input type="text" name="alamat" value="" class="form-control">
        Jenis Kelamin :
        <select type="text" name="jk" value="" class="form-control">
            <option></option>    
            <option value="P">Perempuan</option>
            <option value="L">Laki-laki</option>
            </select>
        Telpon :
        <input type="number" name="telp" class="form-control">
        </input>
        Password : 
        <input type="text" name="password" value="" class="form-control">
        <input type="submit" name="simpan" value="Simpan" class="form-btn btn btn-primary">
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>