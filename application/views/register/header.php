<!DOCTYPE html>
<html lang="en">
	<head>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<?php	echo	link_tag('assets/css/style.css')	?>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

		<script>
			$(document).ready(function () {
				$("#handle").blur(function () {
						$.post("<?php	echo	base_url()	?>register/checkUserExists", {
							handle: $('#handle').val()
						},
						function (data) {
							$('.availability').hide();
							if(JSON.parse(data)){
								$('#handle-available-yes').show();
							}else{
								$('#handle-available-no').show();
							}
						});
				});
			});
		</script>
	</head>
	<body>