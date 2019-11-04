<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Keranjang</title>
		<!-- bootstrap -->
		<link
			rel="stylesheet"
			href="<?= base_url() ?>assets/materialdesign/css/bootstrap-material-design.min.css"
		/>
		<!-- css -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/styles/cart.css" />
		<link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert/sweetalert2.min.css">
	</head>

	<body>
		<div id="user" data-user="<?= $this->session->userdata('id_user') ?>"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-2 col-2 mt-4">
					<a href="<?=base_url()  ?>index.php/Beranda"
						><img
							src="<?= base_url() ?>assets/icon/left-arrow.png"
							alt="left-arrow"
							height="25"
					/></a>
				</div>
				<div class="col-sm-2 col-4 offset-2 mt-4">
					<h5 style="color: #745ed2;"><b>KERANJANG</b></h5>
				</div>
			</div>
		</div>
		<div class="container mt-4">
			<?php foreach($this->cart->contents() as $item): ?>
			<div class="orders">
				<div class="row">
					<div class="col-sm-3 col-3">
						<div class="img-menu">
							<img
								src="<?= base_url() ?>uploads/<?= $item['options']['img_name'] ?>"
								alt="menu-orders"
								width="100"
							/>
						</div>
					</div>
					<div class="col-sm-4 col-4">
						<div class="detail">
							<div class="name"><?= $item['name'] ?></div>
							<div class="price">
								Rp.
								<?= number_format($item['subtotal'],0,',','.')?>
							</div>
							<div class="qty">
								<a
									href="<?= base_url() ?>index.php/Cart/minQty/<?= $item['rowid'] ?>/<?= $item['qty'] ?>/<?= $item['options']['img_name'] ?>/<?= $item['options']['catatan'] ?>"
								>
									<div class="min">-</div>
								</a>
								<div class="total-qty"><?= $item['qty'] ?></div>
								<a
									href="<?= base_url() ?>index.php/Cart/addQty/<?= $item['rowid'] ?>/<?= $item['qty'] ?>/<?= $item['options']['img_name'] ?>/<?= $item['options']['catatan'] ?>"
								>
									<div class="add">+</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-5 col-5">
						<div class="catatan">
							<h6>Catatan:</h6>
							<?php if($item['options']['catatan'] == "tidak ada catatan"){ ?>
							<p style="opacity:.6;">
								<i><?= $item['options']['catatan'] ?></i>
							</p>
							<?php }else{ ?>
							<p><?= $item['options']['catatan'] ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="close">
					<a
						href="<?= base_url() ?>index.php/Cart/deleteItem/<?= $item['rowid'] ?>"
					>
						<img
							src="<?= base_url() ?>assets/icon/close.png"
							alt="close"
							width="16"
						/>
					</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<!-- Button trigger modal -->
		<!-- <button
			type="button"
			class="btn btn-primary"
			data-toggle="modal"
			data-target="#exampleModalCenter"
		>
			Launch demo modal
		</button> -->

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
						<!-- <form
							action="<?= base_url() ?>index.php/Keranjang/Pesan"
							method="POST"
						> -->
							<div class="form-group" id="data-pesanan">
								<div class="row">
									<div class="col-sm-7 col-7">Total</div>
									<div class="col-sm-5 col-5">
										Rp.
										<?= number_format($this->cart->total(), 0,',','.') ?>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-sm-7 col-7">Total Pesanan</div>
									<div class="col-sm-5 col-5">
										<?= number_format($this->cart->total_items(), 0,',','.') ?>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-sm-7 col-7">Nomor Meja</div>
									<div class="col-sm-5 col-5">
										<select
											class="custom-select my-1 mr-sm-2"
											id="no_meja"
											name="no_meja"
											require
										>
											<option selected>pilih meja...</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<!-- <button type="button" class="btn btn-dark" data-dismiss="modal">
								close
							</button> -->
							<button type="submit" class="btn modal-add-cart" id="add-cart">
								PESAN SEKARANG
							</button>
						<!-- </form> -->
					</div>
				</div>
			</div>
		</div>
		<!-- footer -->
		<footer>
			<div class="row">
				<div class="col-sm-5 col-5 offset-sm-1 offset-1 total">
					Rp.
					<?= number_format($this->cart->total(),0,',','.') ?>
				</div>
				<div class="col-sm-4 col-4 offset-sm-1 offset-1">
					<div
						class="btn btn-bayar"
						data-toggle="modal"
						data-target="#exampleModalCenter"
					>
						PESAN
					</div>
				</div>
			</div>
		</footer>

		<script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
		<script
			src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
			integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
			crossorigin="anonymous"
		></script>
		<script src="<?= base_url() ?>assets/materialdesign/js/bootstrap-material-design.min.js"></script>
		<script src="<?= base_url() ?>assets/sweetalert/sweetalert2.all.min.js"></script>
		<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
		<script>
			$(document).ready(function(){
				Pusher.logToConsole = true;
				var pusher = new Pusher("b8a3021cab51c9711d9b", {
					cluster: "ap1",
					forceTLS: true
				});

				var channel = pusher.subscribe("my-channel");
				var user = <?= $this->session->userdata('id_user'); ?>;
				channel.bind("konfirmasi", function (data) {
					if (data.message === "konfimasi_to_"+user) {
						Swal.fire({
							type: 'success',
							title: 'Terimakasih',
							text:'Pesananmu sudah dikonfirmasi, silahkan ditunggu',
							showConfirmButton: false,
							timer: 2000
						})
					}
				});
				$('#add-cart').on("click", function(e){
					e.preventDefault();
					let cart = <?= $this->cart->total(); ?>;
					console.log(user)
					if (cart <= 0) {
						Swal.fire({
							type: 'error',
							title: 'Oops...',
							text: 'Maaf, Keranjang Kamu Masih Kosong',
						})
					}else{
						let no_meja = $('#no_meja').val()
						console.log(no_meja)
						if(no_meja === "pilih meja..."){
							Swal.fire({
								type: 'error',
								title: 'Oops...',
								text: 'Maaf, No Meja Tidak Boleh Kosong',
							})
						}else{
							$.ajax({
								url:"<?= base_url() ?>index.php/Keranjang/Pesan",
								data:{no_meja},
								type:"POST",
								success:()=>{
									Swal.fire({
										type: 'success',
										title: 'Terimakasih',
										text:'Pesananmu sudah terkirim, mohon tunggu konfirmasi dari Admin',
										showConfirmButton: false,
										timer: 2000
									})
									setTimeout(() => {
										document.location.href = '<?= base_url() ?>index.php/Keranjang'
									}, 2000);
								}
							})
						}
					}
				})
			})
		</script>
	</body>
</html>
