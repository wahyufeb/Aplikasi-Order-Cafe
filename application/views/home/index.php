<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/materialdesign/css/bootstrap-material-design.min.css">
  <!-- my styles -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/styles/home.css">
  <!-- owl css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/owl/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/owl/css/owl.theme.default.css">
</head>

<body>
  <div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
    <div id="dw-s2" class="bmd-layout-drawer bg-faded">
      <div class="row mt-4">
        <div class="col-4 offset-3">
          <div class="photo">
            <img src="<?= base_url() ?>assets/icon/user.png" width="100" alt="photo">
          </div>
        </div>
      </div>
      <ul class="list-group">
        <li class="list-group-item"><a href="#">Profile</a></li>
        <li class="list-group-item"><a href="#">Riwayat Transaksi</a></li>
        <li class="list-group-item"><a href="#">Pengaturan</a></li>
        <li class="list-group-item"><a href="#">Keluar</a></li>
      </ul>
    </div>
    <main class="bmd-layout-content">
      <div class="container">
        <div class="search-input">
          <input type="text" placeholder="cari makanan atau minuman..." autocomplete="off" autofocus>
          <img src="<?= base_url() ?>assets/icon/close.png" alt="close" width="12" id="close-btn">
        </div>
        <header>
          <div class="svg-menu">
            <img src="<?= base_url() ?>assets/icon/left1.svg" alt="left-side" id="svg-left">
            <img src="<?= base_url() ?>assets/icon/right1.svg" alt="right-side" id="svg-right">
          </div>
          <div class="row" id="top-menu">
            <div class="col-2 col-sm-2">
              <div class="hamburger" data-toggle="drawer" data-target="#dw-s2""><img
                  src=" <?= base_url() ?>assets/icon/menu.png" alt="menu" width="24">
              </div>
            </div>
            <div class="col-2 col-sm-2 offset-1">
              <div class="logo" style="color:#fff;font-family:Poppins-Medium">CafeX</div>
            </div>
            <div class="col-2 col-sm-2 offset-4">
              <div class="search-icon" id="search-icon"><img src="<?= base_url() ?>assets/icon/search.png" alt="search"
                  width="24"></div>
            </div>
          </div>
        </header>
        <main>
          <div class="hero">
            <img src="<?= base_url() ?><?= $all_menu[0]['image'] ?>" alt="">
            <!-- hero image -->
            <div class="typo">
              <h5>Beli Sekarang</h5>
              <h4>Diskon</h4>
              <h6>20 %</h6>
            </div>
          </div>
        </main>
        <section>
          <!-- Set up for Caraousel -->
          <div class="caraousel">
            <h6>Makanan paling laku</h6>
            <div class="owl-carousel">
              <div class="produk">
                <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero">
                <h6 class="text-center">Coffee</h6>
                <p class="text-center">Rp. 20.000</p>
              </div>
              <div class="produk">
                <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero">
                <h6 class="text-center">Coffee</h6>
                <p class="text-center">Rp. 20.000</p>
              </div>
              <div class="produk">
                <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero">
                <h6 class="text-center">Coffee</h6>
                <p class="text-center">Rp. 20.000</p>
              </div>
              <div class="produk">
                <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero">
                <h6 class="text-center">Coffee</h6>
                <p class="text-center">Rp. 20.000</p>
              </div>
            </div>
          </div>
      </div>
      </section>
      <div class="container">
        <section>
          <!-- Set up for Caraousel -->
          <div class="caraousel2">
            <h6>Minuman paling laku</h6>
            <div class="owl-carousel">
              <div class="produk">
                <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero">
                <h6 class="text-center">Coffee</h6>
                <p class="text-center">Rp. 20.000</p>
              </div>
              <div class="produk">
                <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero">
                <h6 class="text-center">Coffee</h6>
                <p class="text-center">Rp. 20.000</p>
              </div>
              <div class="produk">
                <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero">
                <h6 class="text-center">Coffee</h6>
                <p class="text-center">Rp. 20.000</p>
              </div>
              <div class="produk">
                <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero">
                <h6 class="text-center">Coffee</h6>
                <p class="text-center">Rp. 20.000</p>
              </div>
              <div class="produk">
                <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero">
                <h6 class="text-center">Coffee</h6>
                <p class="text-center">Rp. 20.000</p>
              </div>
              <div class="produk">
                <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero">
                <h6 class="text-center">Coffee</h6>
                <p class="text-center">Rp. 20.000</p>
              </div>
              <div class="produk">
                <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="hero">
                <h6 class="text-center">Coffee</h6>
                <p class="text-center">Rp. 20.000</p>
              </div>
            </div>
          </div>
        </section>
      </div>
  </div>
  </div>
  </main>
  </div>
  </div>
  <script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
    integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
    crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>assets/materialdesign/js/bootstrap-material-design.min.js"></script>
  <script src="<?= base_url() ?>assets/owl/js/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>assets/js/search.js"></script>
  <script>
    $(document).ready(function () {
      $('body').bootstrapMaterialDesign();
      $(".owl-carousel").owlCarousel({
        items: 3,
        autoPlay: 5000,
        navigation: true,
        stagePadding: 10, //padding in pixels
        smartSpeed: 400,
        // navigationText: true,
        // nav: true,
        // navText: ["prev", "go"]
      });
    });
  </script>
</body>

</html>