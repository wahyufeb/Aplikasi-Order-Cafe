<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Daftar Produk</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/materialdesign/css/bootstrap-material-design.min.css">
  <!-- css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/styles/list_produk.css">
</head>

<body>
  <header>
    <div class="container">
      <input type="text" id="search" placeholder="cari makanan ...">
    </div>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-12 banner-section">
        <div class="banner">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="<?= base_url() ?>assets/img/hero1.jpg" height="160" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?= base_url() ?>assets/img/hero1.jpg" height="160" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?= base_url() ?>assets/img/hero1.jpg" height="160" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-12 sort-section">
        <div class="sort">
          <p>urut berdasarkan</p>
          <div class="row" id="sort-button">
            <div class="col-5 col-sm-5">
              <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option selected>Choose...</option>
                <option value="lebih20">Harga > 20k</option>
                <option value="kurang20">Harga < 20k</option> <option value="laku">Paling Laku</option>
              </select>
            </div>
            <div class="col-2 col-sm-2">
              <div id="sorting">
                <img src="<?= base_url() ?>assets/icon/sorting.png" alt="sorting" height="30">
              </div>
            </div>
            <div class="col-5 col-sm-5">
              <div id="submit">
                <div class="text-center">submit</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" id="container-produk">
      <div class="row" id="list-produk">
        <?php foreach($getProdukKategori as $row): ?>
        <div class="col-sm-4 col-4">
          <div class="produk">
            <a href="<?= base_url() ?>index.php/DetailProduct/detail/<?= $row['kode_menu'] ?>">
                <img src="<?= base_url() ?><?= $row['image'] ?>" alt="hero" width="100%">
              </a>
              <h6 class="text-center"><a href="<?= base_url() ?>index.php/DetailProduct/index/<?= $row['kode_menu'] ?>"><?= $row['nama'] ?></a></h6>
              <p class="text-center">Rp. <?= number_format($row['harga'],0,',','.') ?></p>
            </div>
          </div>
        <?php endforeach; ?>
    </div>
  </div>
  </div>

  <script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
    integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
    crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>assets/materialdesign/js/bootstrap-material-design.min.js"></script>
</body>

</html>