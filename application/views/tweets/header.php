<!DOCTYPE html>
<html lang="en">
	<head>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<?php	echo	link_tag('assets/css/style.css')	?>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="<?php	echo	base_url()	.	'assets/js/fancywebsocket.js'	?>"></script>

		<script>
			var Server;
			var defaultTweetText = 'Send a message of up to 140 characters...';

			function send(text) {
				Server.send('message', text);
			}

			$(document).ready(function () {
				Server = new FancyWebSocket('ws://127.0.0.1:9300');
				$('#message').val(defaultTweetText);

				$("#message").click(function () {
					$(this).val('');
				});

				$('#message').on('keyup', function () {
					var len = $(this).val().length;
					$('#chars-left').html('(' + (140 - len) + ' characters left)');
				});

				$("#btn_tweet").click(function () {
					if ($('#message').val() != '' && $('#message').val() != defaultTweetText) {

						$.post("<?php	echo	base_url()	?>tweets/log", {
							user: "<?php	echo	$this->session->userdata('userID');	?>",
							text: $('#message').val()
						},
						function (data) {
							send(data); //send the message to the other clients
							$('#tweetah-stream').prepend($(JSON.parse(data)).hide().fadeIn(1000));
						});
						$('#message').val(defaultTweetText);
						$('#chars-left').html('');
					} else {
						alert('Please type a message to tweet'); //this should be made something prettier, nice modal popup maybe?
					}
				});

				Server.bind('message', function (data) { //add any new messages
					$('#tweetah-stream').prepend($(JSON.parse(data)).hide().fadeIn(1000));
				});

				Server.connect();
			});

		</script>
	</head>
	<body>