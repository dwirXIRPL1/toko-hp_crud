<?php 
session_start();
require 'functions.php';

$id = $_GET["id"];
$produk = query("SELECT * FROM produk WHERE id_produk = '$id'")[0];

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/login.php';
    </script>
    ";
}

if(isset($_POST["kirim"])){
    if(editProduk($_POST) > 0){
        echo"
            <script type='text/javascript'>
                alert('Data produk berhasil diedit');
                window.location = 'produk.php'
            </script>
        ";
    }else{
        echo"
        <script type='text/javascript'>
            alert('Data produk gagal diedit');
            window.location = 'produk.php'
        </script>
    ";
    }
}


?>

<?php require '../layout/sidebar.php'; ?>

<div class="main">
    <div class="box">

        <h3>Tambah Data Produk</h3>

        <form action="" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id_produk" value="<?= $produk["id_produk"]; ?>">

            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= $produk["nama_produk"] ?>">
            
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control" value="<?= $produk["harga"] ?>">
            
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" value="<?= $produk["foto"] ?>">

            <label for="stok">Stok</label>
            <input type="text" name="stok" id="stok" class="form-control" value="<?= $produk["stok"] ?>">

            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="7"><?= $produk["deskripsi"] ?></textarea>

            <button type="submit" name="kirim">Tambah</button>
        </form>
    </div>
</div>