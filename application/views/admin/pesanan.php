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



<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/admin/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>assets/admin/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>assets/admin/js/demo/chart-pie-demo.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
	integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>
	$(document).ready(() => {
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

		function getInv() {
			$.ajax({
				url: "<?= base_url() ?>index.php/Administrator/Admin/getInv",
				dataType: "json",
				type: "GET",
				async: true,
				success: data => {
					console.log(data);
					let res = '';
					if(data.length === 0){
						res += `
						<center>
							<div>
								<div class="col-xl-12 col-md-12 mb-12 mt-3">
									<h4 class="text-center">Pesanan Tidak Ada</h4>
								</div>
							</div>
						</center>`
					}else{
						for (let i = 0; i < data.length; i++) {
							const element = data[i];
							res += `
										<div class="col-xl-12 col-md-12 mb-12 mt-3">
											<div class="card border-left-warning shadow h-100 py-2">
												<div class="card-body">
													<div class="row no-gutters align-items-center">
														<div class="col mr-2">
															<img class="img-profile rounded-circle" src="<?= base_url() ?>assets/photo/${element.photo}"
																style="margin-top:-15px;" width="64">
														</div>
														<div class="col">
															<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">${element.nama_lengkap}</div>
															<div class="h5 mb-0 font-weight-bold text-gray-800">No Meja : ${element.no_meja}</div>
														</div>
														<div class="col mr-2">
															<div class="h3 mb-0 font-weight-bold text-gray-800">Rp. ${toRp(element.total)}</div>
														</div>
														<div class="col mr-2">
															<a href="<?= base_url() ?>index.php/Administrator/Admin/konfirmasi/${element.id_invoice}" class="btn btn-facebook btn-block"><i class="fas fa-check"></i> Konfirmasi</a>
														</div>
														<div class="col-auto">
															<a href="#"><i class="fas fa-eye fa-2x text-gray-300"></i></a>
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
		}

		function toRp(uangAnda){
				let toRp =  uangAnda.toString().split('').reverse().join(''),
				uang = toRp.match(/\d{1,3}/g);
				uang = uang.join('.').split('').reverse().join('');
				return uang
		}
	});
</script>