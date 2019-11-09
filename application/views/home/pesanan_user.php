<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pesanan Mu</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/materialdesign/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/styles/pesananmu.css">
</head>
<body>
  <div id="header">
    <div class="container">
    <h4 class="text-center">Daftar Pesanan</h4>
      <div class="pesananmu">
        <div class="row">
          <div class="col-sm-12 col-12">
            <?php foreach ($pesananmu as $row):?>
            <div class="transaksi-user">
              <div class="row">
                <div class="col-sm-12 col-12"><h5><b>Kode Transaksi : </b></h5></div>
                <div class="col-sm-12 col-12"><h3><b><?= $row['kode_transaksi'] ?></b></h3></div>
              </div>
              <div class="row mt-2">
                <div class="col-sm-12 col-12"><h5 style="opacity:.7">Tanggal : </h5></div>
                <div class="col-sm-12 col-12"><?= $row['tanggal'] ?></div>
              </div>
              <div class="row mt-3">
                <div class="col-sm-6 col-6">
                  <h6 style="opacity:.7"><b>Status : </b></h6>
                </div>
                <div class="col-sm-6 col-6">
                  <h6 style="opacity:.7"><b>Total : </b></h6>
                </div>
                <div class="col-sm-6 col-6">
                  <?php if($row['status'] == "dibayar"){ ?>
                    <button class="btn btn-success" style="background-color:#4caf50;color:#fff;">Telah dibayar</button>
                  <?php }else{?>
                    <button class="btn btn-warning" style="background-color:#ff5722;color:#fff;">Belum dibayar</button>
                  <?php } ?>
                </div>
                <div class="col-sm-6 col-6">
                  <h6>Rp. <?= number_format($row['total'], 0,',','.') ?></h6>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-12">
                  <button class="btn btn-primary" id="lihat-pesanan" data-toggle="modal" data-target="#exampleModalCenter" style="background-color:#03a9f4;color:#fff;width:100%;" data-id="<?= $row['id_invoice'] ?>"><b>Lihat Pesanan</b></button>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div
			class="modal fade"
			id="exampleModalCenter"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content" id="modal-cart">
					<div class="modal-header">
						<button
							type="button"
							class="close"
							data-dismiss="modal"
							aria-label="Close"
						>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th>Nama</th>
                      <th>Qty</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody id="table-data">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
				</div>
			</div>
		</div>
</body>
<script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
    integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
    crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>assets/materialdesign/js/bootstrap-material-design.min.js"></script>
  <script src="<?= base_url() ?>assets/sweetalert/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function () {
      $('body').bootstrapMaterialDesign();
      $('#lihat-pesanan').on("click", function(){
        let id = $(this).data('id');
        console.log(id)
      })
    })
  </script>
</html>