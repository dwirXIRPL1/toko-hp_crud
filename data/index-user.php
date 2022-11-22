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

<?php 

    require '../layout/navbar.php' ; ?>

<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

<div id="carouselExampleSlidesOnly" class="container carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../foto/bg.jpg" class="d-block w-100" style="height:400px;" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../foto/bg.jpg" class="d-block w-100" style="height:400px;" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../foto/bg.jpg" class="d-block w-100" style="height:400px;" alt="...">
    </div>
  </div>
</div>


<div class="container">
<div class="row">
    <?php $i = 1; ?>
    <?php foreach($produk as $data) : ?>
        <div class="col-3 align-center justify-content-center">
        <div class="card" style="width: 15rem;">
            <img src="../foto/<?= $data["foto"]; ?>" class="card-img-top" width="80px" height="200px" alt="foto">
            <div class="card-body">
            <h5 class="card-title"><?= $data["nama_produk"]; ?></h5>
            <p class="card-text"><?=  $data["deskripsi"]; ?></p>
        </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?= $data["harga"]; ?></li>
  </ul>
  <div class="card-body">
    <a href="#" class="btn btn-primary">Masukan Keranjang</a>
  </div>
</div>
    </div>
<?php $i++; ?>
<?php endforeach; ?>
</div>
</div>