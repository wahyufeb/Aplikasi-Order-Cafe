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
  <link rel="stylesheet" href="<?= base_url() ?>assets/styles/detail.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert/sweetalert2.min.css">
</head>

<body>
  <header>
    <div class="hero-product">
      <img src="<?= base_url() ?>uploads/<?= $getProdukId[0]['image'] ?>" alt="image-product" width="100%">
    </div>
  </header>
  <div class="container">
    <div class="desc-product">
      <div class="row">
        <div class="col-sm-12 col-12">
          <h3><?= $getProdukId[0]['nama'] ?></h3>
        </div>
        <div class="col-sm-12 col-12" id="harga">
          Rp. <?= number_format($getProdukId[0]['harga'], 0,',','.') ?>
        </div>
        <div class="mt-2 col-sm-6 col-6">
          <div class="btn " id="add-to-cart" data-toggle="modal" data-target="#exampleModalCenter">masukan keranjang
          </div>
        </div>
        <div class="mt-2 col-sm-6 col-5 offset-1">
          <img src="<?= base_url() ?>assets/icon/time.png" alt="time" width="24">
          <span style="font-size:14px;margin-left: 6px;"><?= $getProdukId[0]['waktu'] ?></span>
        </div>
      </div>
    </div>
    <div class="komentar">
      <h6>Komentar<img src="<?= base_url() ?>assets/icon/comment.png" alt="comment" width="16"></h6>
      <div class="all-comment">
        <div class="mt-3 row">
          <div class="col-sm-1 col-1 comment-photo">
            <img src="<?= base_url() ?>assets/icon/user.png" alt="user" width="40">
          </div>
          <div class="col-sm-10 col-9 offset-sm-1 offset-1 comment-section">
            <h6 class="comment-name">Diana</h6>
            <p class="comment-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus, temporibus
              itaque
              ex quasi minus
              voluptatem consectetur </p>
          </div>
        </div>
        <div class="mt-3 row">
          <div class="col-sm-1 col-1 comment-photo">
            <img src="<?= base_url() ?>assets/icon/user.png" alt="user" width="40">
          </div>
          <div class="col-sm-10 col-9 offset-sm-1 offset-1 comment-section">
            <h6 class="comment-name">Diana</h6>
            <p class="comment-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus, temporibus
              itaque
              ex quasi minus
              voluptatem consectetur </p>
          </div>
        </div>
        <div class="mt-3 row">
          <div class="col-sm-1 col-1 comment-photo">
            <img src="<?= base_url() ?>assets/icon/user.png" alt="user" width="40">
          </div>
          <div class="col-sm-10 col-9 offset-sm-1 offset-1 comment-section">
            <h6 class="comment-name">Diana</h6>
            <p class="comment-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus, temporibus
              itaque
              ex quasi minus
              voluptatem consectetur </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- modal -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" id="modal-cart">
        <div class="modal-header">
          <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-4 col-4">
              <div class="img-menu">
                <img src="<?= base_url() ?>uploads/<?= $getProdukId[0]['image'] ?>" alt="menu-orders" width="90" height="70">
              </div>
            </div>
            <div class="col-sm-8 col-8">
              <div class="detail">
                <div class="name"><?= $getProdukId[0]['nama'] ?></div>
                <div class="price">Rp. <?= number_format($getProdukId[0]['harga'], 0,',','.') ?></div>
                <div id="total">
                  <div><b>Total</b></div>
                  <div>:</div>
                  <div class="subtotal">Rp. <?= number_format($getProdukId[0]['harga'], 0,',','.') ?></div>
                </div>
                <div class="qty">
                  <a href="#">
                    <div class="min">-</div>
                  </a>
                  <div class="total-qty" data-total="<?= $getProdukId[0]['harga'] ?>" data-qty="1">1</div>
                  <a href="#">
                    <div class="add">+</div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- form -->
          <div class="row mt-3 cart-note">
            <div class="col-sm-12 col-12">
              <div class="form-group">
                <label for="catatan">Catatan : </label>
                <textarea class="form-control" id="catatan" name="catatan" rows="3"
                  placeholder="misal : esnya sedikit, sedikit pedas, ..."></textarea>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class=" col-sm-12 col-12">
              <!-- <input type="hidden" name="nama" value="<?=$getProdukId[0]['nama']?>"> -->
              <input type="hidden" name="kode" value="<?= $getProdukId[0]['kode_menu'] ?>">
              <input type="hidden" name="qty">
              <!-- <input type="hidden" name="harga"> -->
              <button type="submit" class="btn modal-add-cart" id="add-cart">Masukan
                Keranjang</button>
            </div>
          </div>
          <!-- end form -->
        </div>
      </div>
    </div>
  </div>
  <!-- end modal -->
  <script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
    integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
    crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>assets/materialdesign/js/bootstrap-material-design.min.js"></script>
  <script src="<?= base_url() ?>assets/sweetalert/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(() => {
      let qty = $('.total-qty').data('qty')
      let harga = $('.total-qty').data('total')
      $('input[name="harga"]').val(harga);
      $('input[name="qty"]').val(qty);
    })
    let qty = $('.total-qty').data('qty')
    let harga = $('.total-qty').data('total')
    // handle Quantity
    $('.add').on("click", () => {
      qty++
      $('.total-qty').attr('data-qty', qty)
      $('.total-qty').text(qty)
      hitungAll(harga, qty)
    })

    // min  event
    $('.min').on("click", () => {
      qty--
      if (qty <= 1) {
        qty = 1
        $('.total-qty').attr('data-qty', qty)
        $('.total-qty').text(qty)
        hitungAll(harga, qty)
      }
      $('.total-qty').attr('data-qty', qty)
      $('.total-qty').text(qty)
      hitungAll(harga, qty)
    })

    // handle add to cart
    $('#add-cart').on("click", () => {
      let cartKode = $('input[name="kode"]').val();
      // let cartNama = $('input[name="nama"]').val()
      let cartQty = $('input[name="qty"]').val();
      // let cartHarga = $('input[name="harga"]').val();
      let cartCatatan = $('#catatan').val();
      $.ajax({
        url: '<?= base_url() ?>index.php/Cart/addToCart',
        dataType: 'json',
        type: 'POST',
        data: { cartQty, cartCatatan, cartKode },
        success: (res) => {
          let uri = '<?= $this->uri->segment(3); ?>';
          let url = "<?= base_url() ?>index.php/DetailProduk/detail/" + uri
          if (res === "sukses") {
            Swal.fire({
              type: 'success',
              title: 'Sukses',
              text:'Berhasil memasukan ke keranjang',
              showConfirmButton: false,
              timer: 2000
            })
            setTimeout(() => {
              $(location).attr('href', url);
            }, 2000);
          } else {
            Swal.fire({
              type: 'error',
              title: 'Oops...',
              text: 'Maaf, gagal memasukan ke keranjang, silahkan coba lagi',
            })
            setTimeout(() => {
              $(location).attr('href', url);
            }, 1500);
          }
        }
      })
    })
    function hitungAll(harga, qty) {
      $('input[name="harga"]').val(harga);
      $('input[name="qty"]').val(qty);
      $('.subtotal').text(`Rp. ${toRp(harga * qty)}`)
    }
    function toRp(uangAnda) {
      let toRp = uangAnda.toString().split('').reverse().join(''),
        uang = toRp.match(/\d{1,3}/g);
      uang = uang.join('.').split('').reverse().join('');
      return uang
    }
  </script>
</body>

</html>