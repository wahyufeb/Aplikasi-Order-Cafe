 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode Transaksi</th>
            <th>Tanggal</th>
            <th>No Meja</th>
            <th>Total</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          <?php foreach($pembayaran as $row): ?>
          <?php $i++ ?>
            <tr>
              <td><?= $i ?></td>
              <td><b><?= $row['kode_transaksi'] ?></b></td>
              <td><?= $row['tanggal'] ?></td>
              <td><?= $row['no_meja'] ?></td>
              <td>Rp. <?= number_format($row['total_pembayaran'], 0,',','.') ?></td>
              <td>
               <button data-toggle="modal" data-target="#exampleModal" data-total="<?= $row['total_pembayaran'] ?>" data-transaksi="<?= $row['kode_transaksi'] ?>" data-id="<?= $row['id_user'] ?>" data-inv="<?= $row['id_invoice'] ?>" class="btn btn-primary btn-bayar">Bayar</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->
<!-- Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="labelKode"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" id="modal-pembayaran">
      </div>
      <div class="modal-footer" id="total">
      </div>
		</div>
	</div>
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
<div class="copyright text-center my-auto">
  <span>Copyright &copy; Your Website 2019</span>
</div>
</div>
</footer>
<!-- End of Footer -->
</div>
</div>

<script src="<?= base_url() ?>assets/js/toRp.js"></script>
<script>
  $(document).ready(function(){
    $('.btn-bayar').on("click", function(){
      let total = $(this).data("total")
      let id_user = $(this).data("id")
      let kode = $(this).data("transaksi")
      let inv = $(this).data("inv");

      $('#labelKode').html(`<h5>Kode Transaksi : ${kode}</h5>`)
      $.ajax({
        url:"<?= base_url() ?>index.php/Administrator/Admin/getUser",
        data:{id_user:id_user},
        dataType:"json",
        type:"POST",
        success:(user)=>{
          let result = '';
          for (let i = 0; i < user.length; i++) {
            const res = user[i];
            result += `
            <div>
              <h5>Nama : ${res.nama_lengkap}</h5>
              <form action="<?= base_url() ?>index.php/Administrator/Admin/bayar" method="POST">
              <input type="hidden"  name="kode_transaksi" value="${kode}">
              <input type="hidden"  name="total_pembayaran" value="${total}">
              <input type="hidden"  name="inv_id" value="${inv}">              
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="uang_pembeli" placeholder="masukan uang pembeli">
                </div>
                <input type="submit" class="btn btn-info" value="BAYAR">
              </form>
            </div>`
          }

          $('#modal-pembayaran').html(result)
        }
      })
      $('#total').html(`<h5>Total : Rp. ${toRp(total)}</h5>`)
    })
      // $('#modal-pembayaran').html(`${kode_trans}`)
  })
</script>