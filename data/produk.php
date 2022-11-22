<?php
session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/login.php';
    </script>
    ";
}


$produk = query("SELECT * FROM produk");


?>

<?php require '../layout/sidebar.php'; ?>

<div class="main">
    <h3>Data Produk</h3>
    <a href="tambah_produk.php">Tambah Produk</a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($produk as $data) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $data["nama_produk"]; ?></td>
            <td><?= $data["harga"]; ?></td>
            <td><img src="../foto/<?= $data["foto"]; ?>" alt="" width="80"></td>
            <td><?= $data["stok"]; ?></td>
            <td><?= $data["deskripsi"]; ?></td>
            <td>
                <a href="edit_produk.php?id=<?= $data["id_produk"]; ?>" class="edit">Edit</a>
                <a href="hapus_produk.php?id=<?= $data["id_produk"]; ?>" class="hapus" onClick="return confirm('Anda Yakin Ingin Menghapus?');">Hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>