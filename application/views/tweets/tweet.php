<div class="row single-tweet">
	<div class="row tweet-details">
		<div class="col-sm-3 tweet-handle"><?php	echo	'@'	.	$handle	?></div>
		<div class="col-sm-9 tweet-date"><?php	echo	date("H:i Y/m/d",	strtotime($timestamp))	?></div>
	</div>
	<div class="row">
		<div class="col-sm-12 tweet-message">
			<?php	echo	$tweettext	?>
		</div>
	</div>
</div>