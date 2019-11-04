 <style>
  input[type="file"] {
      display: none;
  }
  .custom-file-upload-update {
      border: 1px solid #ccc;
      display: inline-block;
      border-radius:10px;
      padding: 6px 12px;
      cursor: pointer;
  }
 </style>
 <!-- Begin Page Content -->
 <div class="container-fluid">

<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="h5 mb-0 font-weight-bold text-gray-800">
            <a style="color:white"class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Menu</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode Menu</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Waktu</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          <?php foreach($allMenu as $row): ?>
          <?php $i++ ?>
            <tr>
              <td><?= $i ?></td>
              <td><b><?= $row['kode_menu'] ?></b></td>
              <td><img src="<?= base_url() ?>uploads/<?= $row['image'] ?>" width="94" /></td>
              <td><?= $row['nama'] ?></td>
              <td>Rp. <?= number_format($row['harga'], 0,',','.') ?></td>
              <td>
                <?php if($row['kategori'] == "makanan"){ ?>
                  <button class="btn btn-warning" style="border-radius:50px;">Makanan</button>
                <?php }else{ ?>
                  <button class="btn btn-info" style="border-radius:50px;">Minuman</button>
                <?php } ?>
              </td>
              <td><?= $row['waktu'] ?></td>
              <td>
               <button class="btn btn-dark edit-menu" data-id="<?= $row['kode_menu'] ?>" data-toggle="modal" data-target="#updateModal">Edit</button>
               <a href="<?= base_url() ?>index.php/Administrator/Admin/deleteMenu/<?= $row['kode_menu'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
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
				<h5 class="modal-title" id="title">Tambah Menu</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" id="modal-pembayaran" style="padding:30px;">
      <?php echo $error;?>
        <?php echo form_open_multipart('Administrator/Admin/tambah_menu');?>
        <div class="form-group">
          <label for="kode">Kode Menu</label>
          <input type="text" class="form-control" id="kode_menu" name="kode_menu" placeholder="Kode menu" required>
        </div>
        <input type="file" name="gambar" size="100" id="gambar" />
        <label for="file-upload" class="custom-file-upload">
          <i class="fas fa-cloud-upload-alt"></i> Upload Gambar
        </label>
        <p id="filename"></p>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama menu" required>
        </div>
        <div class="form-group">
          <label for="harga">Harga</label>
          <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga menu">
        </div>
        <label for="kategori">Kategori</label>
        <div class="input-group mb-3">
          <select class="custom-select" name="kategori" id="kategori" required>
            <option selected disable>Choose...</option>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
          </select>
        </div>
        <div class="form-group">
          <label for="stok">Stok</label>
          <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok menu" required>
        </div>
        <div class="form-group">
          <label for="waktu">Waktu Pembuatan</label>
          <input type="text" class="form-control" id="waktu" name="waktu" placeholder="Waktu pembuatan /menit" required>
        </div>
        <input class="btn btn-primary" style="width:100%" type="submit" value="Tambah Menu" />
        </form>
      </div>
      <div class="modal-footer" id="total">
      </div>
		</div>
	</div>
</div>






<!-- Modal Update-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="title">Update Menu</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" id="modal-pembayaran" style="padding:30px;">
        <?php echo form_open_multipart('Administrator/Admin/update_menu');?>
        <div id="image-menu"></div>
        <input type="hidden" name="kodeID" id="kodeID">

        <input type="file" name="gambar_update" size="100" id="gambar_update" />
        <label for="file-upload" class="custom-file-upload-update">
          <i class="fas fa-cloud-upload-alt"></i> Upload Gambar
        </label>
        <p id="filename_update"></p>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama_update" name="nama_update" placeholder="Nama menu" required>
        </div>
        <div class="form-group">
          <label for="harga">Harga</label>
          <input type="number" class="form-control" id="harga_update" name="harga_update" placeholder="Harga menu">
        </div>
        <label for="kategori">Kategori</label>
        <div class="input-group mb-3">
          <select class="custom-select" name="kategori_update" id="kategori_update" required>
            <option selected disable>Choose...</option>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
          </select>
        </div>
        <div class="form-group">
          <label for="stok">Stok</label>
          <input type="number" class="form-control" id="stok_update" name="stok_update" placeholder="Stok menu" required>
        </div>
        <div class="form-group">
          <label for="waktu">Waktu Pembuatan</label>
          <input type="text" class="form-control" id="waktu_update" name="waktu_update" placeholder="Waktu pembuatan /menit" required>
        </div>
        <input class="btn btn-primary" style="width:100%" type="submit" value="Update Menu" />
        </form>
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
<script>
  $(document).ready(function(){
    $('.custom-file-upload').bind("click" , function () {
        $('#gambar').click();
    });
    $('#gambar').on("change", function(){
      let data = this.files;
      let fileName = data.item(0).name;
      let size = data.item(0).size;

      let fileSize = Math.round((size / 1024))
      if(fileSize >= 2000){
        alert("kebesaran")
      }else{
        $('#filename').html(`<b>${fileName}</b>`)
      }
    })

    $('.custom-file-upload-update').bind("click" , function () {
        $('#gambar_update').click();
    });
    $('#gambar_update').on("change", function(){
      let data = this.files;
      let fileName = data.item(0).name;
      let size = data.item(0).size;

      let fileSize = Math.round((size / 1024))
      if(fileSize >= 2000){
        alert("kebesaran")
      }else{
        $('#filename_update').html(`<b>${fileName}</b>`)
      }
    })



  })
</script>
<script>
    $('.edit-menu').on("click", function(){
      let kode = $(this).data('id')
      $.ajax({
        url:"<?= base_url() ?>index.php/Administrator/Admin/getMenu",
        data:{kode},
        type:"POST",
        dataType:"json",
        success:(data)=>{
          for (let i = 0; i < data.length; i++) {
            const result = data[i];
            $('#image-menu').html(`<center>
            <img src="<?= base_url() ?>uploads/${result.image}" height="160" style="border-radius:20px;" />
            </center>`)
            $('#kodeID').val(result.kode_menu)
            // $('.custom-file-upload').hide()
            $('#nama_update').val(result.nama)
            $('#harga_update').val(result.harga)
            $('#stok_update').val(result.stok)
            $('#waktu_update').val(result.waktu)

            if(result.kategori === "minuman"){
              $('#kategori_update').html(`
              <option value="${result.kategori}" selected >Minuman</option>
              <option value="makanan">Makanan</option>
              `)
            }else{
              $('#kategori_update').html(`
              <option value="${result.kategori}" selected >Makanan</option>
              <option value="minuman">Minuman</option>
              `)
            }
          }
        }
      })
    })
</script>