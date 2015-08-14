<div class="row single-tweet">
	<div class="row tweet-details">
		<div class="col-sm-3 tweet-handle"><?php	echo	'@'	.	$tweet['strHandle']	?></div>
		<div class="col-sm-9 tweet-date"><?php	echo	date("H:i Y/m/d",	strtotime($tweet['timestamp']))	?></div>
	</div>
	<div class="row">
		<div class="col-sm-12 tweet-message">
			<?php	echo	$tweet['strTweetText']	?>
		</div>
	</div>
</div>