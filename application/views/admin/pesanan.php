<style>
	.view-eye {
		cursor: pointer;
	}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Pesanan</h1>
		<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
	</div>

	<div class="row" id="resData">
	</div>
</div>
</div>

<!-- Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="labelModal"></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-6" id="tanggal"></div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-6" id="no_meja"></div>
			</div>
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-6 col-6">
						<div class="row">
							<div class="col-lg-5 col-md-4 col-sm-6 col-12">Nama :</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-12" id="nama">asdasd</div>
						</div>
						<div class="row">
							<div class="col-lg-5 col-md-4 col-sm-6 col-12">Telephone :</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-12" id="telephone"></div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-6">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-6 col-12" id="photo"></div>
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="table-responsive">
							<table class="table table-bordered" width="100%" cellspacing="0">
								<thead class="thead-dark">
									<tr>
										<th>No</th>
										<th>Kode</th>
										<th>Nama</th>
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
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<div id="konfirmasi"></div>
			</div>`
		</div>
	</div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/admin/js/sb-admin-2.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/toRp.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
	integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>
	$(document).ready(() => {
		// document.addEventListener("contextmenu", function(e){
		// 		e.preventDefault();
		// }, false);


		// document.onkeydown = function(e) {
		// 	if (e.ctrlKey && 
		// 			(e.keyCode === 67 || 
		// 			e.keyCode === 86 || 
		// 			e.keyCode === 85 || 
		// 			e.keyCode === 117)) {
		// 			alert('not allowed');
		// 			return false;
		// 	} else {
		// 			return true;
		// 	}
		// };

		// Enable pusher logging - don't include this in production
		Pusher.logToConsole = true;

		var pusher = new Pusher("b8a3021cab51c9711d9b", {
			cluster: "ap1",
			forceTLS: true
		});

		var channel = pusher.subscribe("my-channel");
		channel.bind("my-event", function (data) {
			if (data.message === "hello") {
				getInv();
			}
		});
		getInv();

		// setInterval(() => {
		// 	getInv()
		// }, 2000);

		function getInv() {
			$.ajax({
				url: "<?= base_url() ?>index.php/Administrator/Admin/getInv",
				dataType: "json",
				type: "GET",
				async: true,
				success: data => {
					// console.log(data);
					let res = '';
					if (data.length === 0) {
						res += `
						<center>
							<div>
								<div class="col-xl-12 col-md-12 mb-12 mt-3">
									<h4 class="text-center">Pesanan Tidak Ada</h4>
								</div>
							</div>
						</center>`
					} else {
						for (let i = 0; i < data.length; i++) {
							const element = data[i];
							res += `
										<div class="col-xl-12 col-md-12 mb-12 mt-3">
											<div class="card border-left-info shadow h-100 py-2">
												<div class="card-body">
													<div class="row no-gutters align-items-center">
														<div class="col mr-2">
															<img class="img-profile rounded-circle gambar" src="<?= base_url() ?>assets/photo/${element.photo}"
																style="margin-top:-15px;" width="64">
														</div>
														<div class="col">
															<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">${element.nama_lengkap}</div>
															<div class="h5 mb-0 font-weight-bold text-gray-800">No Meja : ${element.no_meja}</div>
														</div>
														<div class="col mr-2">
															<div class="h4 mb-0 font-weight-bold text-gray-800">Rp. ${toRp(element.total)}</div>
														</div>
														<div class="col mr-2">
															<a href="<?= base_url() ?>index.php/Administrator/Admin/konfirmasi/${element.id_invoice}/${element.id_user}" class="btn btn-info btn-block"><i class="fas fa-check"></i> Konfirmasi</a>
														</div>
														<div class="col-auto">
															<i class="fas view-eye fa-eye fa-2x text-gray-300" data-toggle="modal" data-target="#exampleModal" onClick="modal(${element.id_invoice})"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
							`;
						}
					}
					$('#resData').html(res);
				}

			});
			$('.gambar').on("click", function () {
				console.log("OK")
			})
		}
	});
	function modal(id_invoice) {
		// console.log(id)
		// console.log(id_invoice)
		$.ajax({
			url: "<?= base_url() ?>index.php/Administrator/Admin/getInvUserTrans",
			data: { id:id_invoice },
			type: "post",
			dataType: "json",
			async: true,
			success: data => { }
		}).then((data) => {
			$.ajax({
				url: "<?= base_url() ?>index.php/Administrator/Admin/getOrders",
				data: { id_invoice:id_invoice },
				type: "post",
				dataType: "json",
				success: res => {
					console.log(data);
					console.log(res)

					for (let i = 0; i < data.length; i++) {
						const resultData = data[i];
						$('#tanggal').html(`<h6 class="h6" style="font-weight:bolder;">Tanggal : ${resultData.tanggal}</h6>`)
						$('#no_meja').html(`<h6 class="h6" style="font-weight:bolder;">Nomor Meja : ${resultData.no_meja}</h6>`)
						$('#labelModal').text("Kode Transaksi : " + resultData.kode_transaksi);
						$('#nama').text(resultData.nama_lengkap)
						$('#telephone').text(resultData.no_hp)
						$('#photo').html(`<img src="<?= base_url() ?>assets/photo/${resultData.photo}" alt="photo-profile" width="64" />`)
						// button konfirmasi
						$('#konfirmasi').html(`<a class="btn btn-primary" href="<?= base_url() ?>index.php/Administrator/Admin/konfirmasi/${resultData.id_invoice}">Konfirmasi</a>`)
					}

					let table = '';
					for (let i = 0; i < res.length; i++) {
						const produk = res[i];
						table += `
						<tr>
							<td>${i+1}</td>
							<td>${produk.kode_menu}</td>
							<td>${produk.nama}</td>
							<td>Rp. ${toRp(produk.harga)}</td>
							<td>${produk.qty}</td>
						</tr>
						`
					}
					$('#table-data').html(table)
					// console.log(table)
				}
			})
		})
	}
		// $('#modal-content').html(
		// `<div class="modal-header">
		// 	<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
		// 	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
		// 		<span aria-hidden="true">×</span>
		// 	</button>
		// </div>
		// <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
		// <div class="modal-footer">
		// 	<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
		// 	<a class="btn btn-primary" href="login.html">Logout</a>
		// </div>`
		// )
</script>