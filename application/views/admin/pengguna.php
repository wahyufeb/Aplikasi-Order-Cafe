 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>No Handphone</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 0; ?>
          <?php foreach($user as $row): ?>
          <?php $i++ ?>
            <tr>
              <td><?= $i ?></td>
              <td><img src="<?= base_url() ?>assets/photo/<?= $row['photo'] ?>" alt="photo-profile" width="64"></td>
              <td><?= $row['nama_lengkap'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['no_hp']?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

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