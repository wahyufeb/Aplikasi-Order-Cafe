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
  <!-- sweetalert -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert/sweetalert2.min.css">
  <style>
    #manip{
      width:100%;
      height: 600%;
      position: absolute;
      display: none;
      left: 0;
      top:0;
      z-index:1000;
      background-color:#fff;
    }
  </style>
</head>

<body id="body">
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
        <li class="list-group-item"><a href="<?= base_url() ?>index.php/Profile">Profile</a></li>
        <li class="list-group-item"><a href="<?= base_url() ?>index.php/Beranda/pesanan">Pesanan</a></li>
        <li class="list-group-item"><a href="<?= base_url() ?>index.php/Transaksi">Transaksi</a></li>
        <!-- <li class="list-group-item"><a href="<?= base_url() ?>index.php/Pengaturan">Pengaturan</a></li> -->
        <li class="list-group-item"><a href="<?= base_url() ?>index.php/Home/logout">Keluar</a></li>
      </ul>
    </div>
    <main class="bmd-layout-content">
      <div class="container">
        <div class="search-input">
          <form action="<?= base_url() ?>index.php/ListProduk/search" method="POST">
            <input type="text" name="search" placeholder="cari makanan atau minuman..." autocomplete="off" autofocus>
          </form>
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
        <div id="checkout" data-alert="<?= $this->session->flashdata('notif');?>"></div>
          <div class="hero">
            <?php foreach($all_menu as $row): ?>
              <img src="<?= base_url() ?>uploads/<?= $row['image'] ?>" alt="">
            <?php endforeach; ?>
            <!-- hero image -->
            <!-- <div class="typo">
              <h5>Beli Sekarang</h5>
              <h4>Diskon</h4>
              <h6>20 %</h6>
            </div> -->
          </div>
        </main>
        <section>
          <!-- Set up for Caraousel -->
          <div class="caraousel">
            <h6>Makanan paling laku</h6>
            <div class="owl-carousel">
              <?php foreach($makananlaku as $row): ?>
              <div class="produk">
                <a href="<?= base_url() ?>index.php/DetailProduk/detail/<?= $row['kode_menu'] ?>">
                  <img src="<?= base_url() ?>uploads/<?= $row['image'] ?>" alt="hero" height="70">
                </a>
                <h6 class="text-center"><a href="<?= base_url() ?>index.php/DetailProduk/detail/<?= $row['kode_menu'] ?>"><?= $row['nama'] ?></a></h6>
                <p class="text-center">Rp. <?= number_format($row['harga'],0,',','.')?></p>
              </div>
              <?php endforeach; ?>
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
              <?php foreach($minumanlaku as $row): ?>
              <div class="produk">
                <a href="<?= base_url() ?>index.php/DetailProduk/detail/<?= $row['kode_menu'] ?>">
                <img src="<?= base_url() ?>uploads/<?= $row['image'] ?>" alt="hero" height="70">
              </a>
              <h6 class="text-center"><a href="<?= base_url() ?>index.php/DetailProduk/detail/<?= $row['kode_menu'] ?>"><?= $row['nama'] ?></a></h6>
              <p class="text-center">Rp. <?= number_format($row['harga'],0,',','.')?></p>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</main>
</div>
  </div>
  <div id="manip">asda</div>
  <script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
    integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
    crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>assets/materialdesign/js/bootstrap-material-design.min.js"></script>
  <script src="<?= base_url() ?>assets/owl/js/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>assets/js/search.js"></script>
  <script src="<?= base_url() ?>assets/sweetalert/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function () {
      setInterval(() => {
        if($(window).width() > 480){
        $('#manip').css('display', 'block');
        $('#manip').html(`<center>
        <h2 style="margin-top:20%;">Maaf Halaman ini tidak kompatibel dengan layar desktop</h2>
          <button id="sesuaikan" class="btn btn-info" onClick="openWin()" style="background-color:blue;color:#fff;">Sesuaikan</button>
        </center>`)
      }else{
        $('#manip').css('display', 'none');
      }
      }, 10);
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

      const alert  = $('#checkout').data('alert');
      console.log(alert);
      if(alert == "success"){
        Swal.fire("Pesanan Sukses", "silahkan tunggu konfirmasi pesanan", "success");
      }
    });
  </script>
  <script>
  //   setInterval(() => {
  //   if($(window).width() > 480){
  //     $('#manip').css('display', 'block');
  //     $('#manip').html(`<center>
  //     <h4 style="margin-top:50%;">Maaf Halaman ini tidak kompatibel dengan layar desktop</h4>
  //       <button id="sesuaikan" class="btn btn-info" onClick="openWin()" style="background-color:blue;color:#fff;">Sesuaikan</button>
  //     </center>`)
  //   }
  // }, 100);
  // var myWindow;
  // function openWin() {
  //   let data = $('#url').data('url');
  //   // myWindow = window.open(`<?= base_url() ?>index.php/${data}`, "", "width=100, height=100");
  //     myWindow.resizeTo(480, 700);
  //   myWindow.focus();
  // }
  </script>
</body>

</html>