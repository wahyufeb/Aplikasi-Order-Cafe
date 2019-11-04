<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Daftar</title>
		<!-- bootstrap -->
		<link
			rel="stylesheet"
			href="<?= base_url() ?>assets/materialdesign/css/bootstrap-material-design.min.css"
		/>
		<!-- my styles -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/styles/daftar.css" />
		<!-- sweetalert -->
		<link
			rel="stylesheet"
			href="<?= base_url() ?>assets/sweetalert/sweetalert2.min.css"
		/>
	</head>
	<body>
		<div class="header">
			<h5 class="text-center">DAFTAR</h5>
		</div>
		<div class="container">
			<div class="form-daftar">
				<form
					action="<?= base_url() ?>index.php/Daftar/daftar_sekarang"
					method="POST"
				>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="Nama">Nama Depan</label>
								<input
									type="text"
									class="form-control"
									id="nama_depan"
									placeholder="masukan nama depan"
									name="nama_depan"
									required
								/>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="Nama">Nama Belakang</label>
								<input
									type="text"
									class="form-control"
									id="nama_belakang"
									placeholder="masukan nama belakang"
									name="nama_belakang"
									required
								/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="Email">Email</label>
						<input
							type="email"
							class="form-control"
							id="email"
							placeholder="masukan email"
							name="email"
							required
						/>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="no">No Hp</label>
								<input
									type="number"
									class="form-control"
									id="no_hp"
									placeholder="masukan no hp"
									name="no_hp"
									required
								/>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label for="tgl">Tanggal Lahir</label>
								<input
									type="date"
									class="form-control"
									id="tanggal_lahir"
									name="tanggal_lahir"
									required
								/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="Password">Password</label>
						<input
							type="password"
							class="form-control"
							id="password"
							placeholder="minimal 8 karakter"
							name="password"
							required
						/>
						<span id="mess"></span>
					</div>
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12">
							<button type="submit" id="daftar">DAFTAR</button>
						</div>
					</div>
				</form>
				<br />
				<p class="text-center">
					Sudah punya akun? silahkan <br /><a
						href="<?= base_url() ?>index.php/Auth/Masuk"
						><b>login</b></a
					>
				</p>
			</div>
		</div>
	</body>
	<script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
	<script
		src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
		integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
		crossorigin="anonymous"
	></script>
	<script src="<?= base_url() ?>assets/materialdesign/js/bootstrap-material-design.min.js"></script>
	<script>
		$(document).ready(function() {
			$("body").bootstrapMaterialDesign();
		});
	</script>
	<script>
		let pass = $('input[name="password"]');
		pass.on("keyup", function() {
			let val = pass.val().length;
			if (val < 8) {
				$("#mess").css("color", "red");
				$("#mess").text("minimal password 8 karakter");
			} else if (val >= 8) {
				$("#mess").css("color", "green");
				$("#mess").text("password memenuhi syarat");
			}
		});
	</script>
</html>
