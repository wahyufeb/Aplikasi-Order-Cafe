<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Login</title>
		<!-- bootstrap -->
		<link
			rel="stylesheet"
			href="<?= base_url() ?>assets/materialdesign/css/bootstrap-material-design.min.css"
		/>
		<!-- my styles -->
		<link
			rel="stylesheet"
			href="<?= base_url() ?>assets/styles/login.css"
		/>
		<!-- sweetalert -->
		<link
			rel="stylesheet"
			href="<?= base_url() ?>assets/sweetalert/sweetalert2.min.css"
		/>
	</head>
	<body onload="window.resizeTo(500,500)">
		<div class="svg">
			<img
				src="<?= base_url() ?>assets/icon/right-top.svg"
				alt=""
				width="100%"
				id="right-top"
			/>
			<img
				src="<?= base_url() ?>assets/icon/right-botom.svg"
				alt=""
				width="100%"
				id="right"
			/>
			<img
				src="<?= base_url() ?>assets/icon/left-bottom.svg"
				alt=""
				width="100%"
				id="left"
			/>
		</div>
		<div class="container">
			<h1>LOGIN</h1>
			<form action="<?= base_url() ?>index.php/Masuk/masuk_sekarang" method="POST">
				<div class="form-group">
					<label for="Email">Email</label>
					<input
						type="email"
						class="form-control"
						id="email"
						placeholder="masukan email"
						name="email"
					/>
				</div>
				<div class="form-group">
					<label for="Password">Password</label>
					<input
						type="password"
						class="form-control"
						id="password"
						placeholder="masukan password"
						name="password"
					/>
				</div>
				<h6 style="font-size:14px;font-weight:normal;">Belum punya Akun? Silahkan <a href="<?= base_url() ?>index.php/Auth/Daftar">Daftar</a></h6>
				<div class="login-btn">
					<button class="btn login">LOGIN</button>
				</div>
			</form>
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
	<script src="<?= base_url() ?>assets/sweetalert/sweetalert2.all.min.js"></script>
	<script>
		$(document).ready(function() {
			document.addEventListener("contextmenu", function(e){
					e.preventDefault();
			}, false);
			document.onkeydown = function(e) {
				if (e.ctrlKey && 
						(e.keyCode === 67 || 
						e.keyCode === 86 || 
						e.keyCode === 85 || 
						e.keyCode === 117)) {
						alert('not allowed');
						return false;
				} else {
						return true;
				}
			};
			$("body").bootstrapMaterialDesign();
		});
	</script>
</html>
