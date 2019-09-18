<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Detail Produk</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/materialdesign/css/bootstrap-material-design.min.css">
  <!-- css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/styles/cart.css">
</head>

<body>
  <h5 class="text-center mt-4 keranjang">KERANJANG</h5>
  <div class="container mt-4">
    <div class="orders">
      <div class="row">
        <div class="col-sm-3 col-3">
          <div class="img-menu">
            <img src="<?= base_url() ?>assets/img/hero1.jpg" alt="menu-orders" width="100">
          </div>
        </div>
        <div class="col-sm-4 col-4">
          <div class="detail">
            <div class="name">Coffee</div>
            <div class="price">Rp. 20.000</div>
            <div class="qty">
              <a href="#">
                <div class="min">-</div>
              </a>
              <div class="total-qty">4</div>
              <a href="#">
                <div class="add">+</div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-5 col-5">
          <div class="catatan">
            <h6>Catatan: </h6>
            <p>Airnya jangan terlalu panas</p>
          </div>
        </div>
      </div>
      <div class="close">
        <a href="#">
          <img src="<?= base_url() ?>assets/icon/close.png" alt="close" width="16">
        </a>
      </div>
    </div>
  </div>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  <!-- footer -->
  <footer>
    <div class="row">
      <div class="col-sm-5 col-5 offset-sm-1 offset-1 total">
        Rp. 40.000
      </div>
      <div class="col-sm-4 col-4 offset-sm-1 offset-1">
        <a href="#">
          <div class="btn btn-bayar">PESAN</div>
        </a>
      </div>
    </div>
  </footer>



  <script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
    integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
    crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>assets/materialdesign/js/bootstrap-material-design.min.js"></script>
</body>

</html>