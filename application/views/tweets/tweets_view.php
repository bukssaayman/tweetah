<div class="container">

	<div class="row center" id="headline">
		<div class="col-sm-2">
			<?php
			echo	img(array(
			'src'	=>	'assets/img/user-silhouette-icon.jpg',
			'width'	=>	'100',
			'height'	=>	'100',
			'title'	=>	'Your profile pic goes here',
			'class'=>'pretty-pic'
			));
			?>
		</div>
		<div class="col-sm-10">
			<h2>Timeline for <span id="handle">@<?php	echo	$this->session->userdata('handle');	?></span></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<textarea maxlength="140" id="message"></textarea>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 right">
			<span id="chars-left"></span>
			<input type='submit' id='btn_tweet' class="btn-primary" value='Send' />
		</div>
	</div>
	<div class="row">
		<div id="tweetah-stream" class="col-sm-12">

			<?php
			foreach($tweets	as	$key	=>	$tweet){
				$data	=	array(
				'handle'	=>	$tweet->strHandle,
				'timestamp'	=>	$tweet->timestamp,
				'tweettext'	=>	$tweet->strTweetText);
				echo	$this->load->view('tweets/tweet',	$data,	TRUE);
				?>
			<?php	}	?>
			<!--<textarea id='log' name='log' readonly='readonly'><?php	foreach($tweets	as	$key	=>	$tweet){	echo	'@'	.	$tweet->strHandle	.	': '	.	$tweet->strTweetText	.	"\n";	}	?>	</textarea>-->
		</div>
	</div>

</div>
