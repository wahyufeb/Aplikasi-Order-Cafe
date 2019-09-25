<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Document</title>
		<!-- bootstrap -->
		<link
			rel="stylesheet"
			href="<?= base_url() ?>assets/materialdesign/css/bootstrap-material-design.min.css"
		/>
	</head>
	<body></body>
	<script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
	<script
		src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
		integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
		crossorigin="anonymous"
	></script>
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
			channel.bind("my-event", function(data) {
				if (data.message === "hello") {
					getInv();
				}
			});
			getInv();

			function getInv() {
				$.ajax({
					url: "<?= base_url() ?>index.php/Admin/getInv",
					dataType: "json",
					type: "GET",
					async: true,
					success: data => {
						console.log(data);
					}
				});
			}
		});
	</script>
</html>
