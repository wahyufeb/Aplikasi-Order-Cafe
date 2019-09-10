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
    search
  </header>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-12 banner-section">
        <div class="banner">
          BANNER
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
    <div class="container">
      <div class="row" id="list-produk">
        <div class="col-sm-4 col-4">
          <div class="produk">
            <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero" width="100%" height="100%">
            <h6 class="text-center">Coffee</h6>
            <p class="text-center">Rp. 20.000</p>
          </div>
        </div>
        <div class="col-sm-4 col-4">
          <div class="produk">
            <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero" width="100%" height="100%">
            <h6 class="text-center">Coffee</h6>
            <p class="text-center">Rp. 20.000</p>
          </div>
        </div>
        <div class="col-sm-4 col-4">
          <div class="produk">
            <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero" width="100%" height="100%">
            <h6 class="text-center">Coffee</h6>
            <p class="text-center">Rp. 20.000</p>
          </div>
        </div>
        <div class="col-sm-4 col-4">
          <div class="produk">
            <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero" width="100%" height="100%">
            <h6 class="text-center">Coffee</h6>
            <p class="text-center">Rp. 20.000</p>
          </div>
        </div>
        <div class="col-sm-4 col-4">
          <div class="produk">
            <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero" width="100%" height="100%">
            <h6 class="text-center">Coffee</h6>
            <p class="text-center">Rp. 20.000</p>
          </div>
        </div>
        <div class="col-sm-4 col-4">
          <div class="produk">
            <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero" width="100%" height="100%">
            <h6 class="text-center">Coffee</h6>
            <p class="text-center">Rp. 20.000</p>
          </div>
        </div>
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