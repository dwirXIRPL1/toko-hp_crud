<?php
session_start();
require 'functions.php';

$id = $_GET["id"];
$user = query("SELECT * FROM user WHERE id_user = '$id'")[0];

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/login.php';
    </script>
    ";
}

if(isset($_POST["kirim"])){
    if(editUser($_POST) > 0){
        echo"
            <script type='text/javascript'>
                alert('Data user berhasil diubah');
                window.location = 'user.php'
            </script>
        ";
    }else{
        echo"
        <script type='text/javascript'>
            alert('Data user gagal ditambahkan');
            window.location = 'user.php'
        </script>
    ";
    }
}


?>

<?php require '../layout/sidebar.php'; ?>

<div class="main">
    <div class="box">
        <h3>Edit User</h3>

        <form action="" method="POST">
            <input type="hidden" name="id_user" value="<?= $user["id_user"]; ?>">

            <label for="nama_lengkap">nama lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $user["nama_lengkap"]; ?>">

            <label for="username">username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $user["username"]; ?>">

            <label for="password">password</label>
            <input type="text" name="password" id="password" class="form-control" value="<?= $user["password"]; ?>">

            <label for="roles">Roles</label>
            <select name="roles" class="form-control" value="<?= $user["roles"]; ?>">
                <option value="Admin">Admin</option>
                <option value="Customer">Customer</option>
            </select>

            <button type="submit" name="kirim">Tambah</button>
        </form>
    </div>
</div>