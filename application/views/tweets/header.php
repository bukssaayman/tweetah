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
			var Client;
			var defaultTweetText = 'Send a message of up to 140 characters...';

			function send(tweet) {
				Client.send('message', tweet);
			}

			$(document).ready(function () {
				Client = new FancyWebSocket('ws://<?php echo $_SERVER['SERVER_ADDR'] ?>:9300');
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

				Client.bind('message', function (data) { //add any new messages received
					$('#tweetah-stream').prepend($(JSON.parse(data)).hide().fadeIn(1000));
				});

				Client.connect();
			});

		</script>
	</head>
	<body>