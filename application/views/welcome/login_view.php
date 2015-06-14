<div class="container">
	<div class="row centered-form">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Please sign in or register for a new account</h3>
				</div>
				<div class="panel-body">
					<form  method="post" action="<?php	echo	base_url()	.	'welcome/login'	?>" class="form-signin">
						<?php	if(!empty($error)){	?>
							<p>Oops... We could not find your details in the system, are you sure you entered the correct information?</p>
						<?php	}	?>
						<label class="sr-only">Tweetah Name</label>
						<input type="text" name="handle" class="form-control" placeholder="Username" required autofocus>
						<label class="sr-only">password</label>
						<input type="password" name="password" class="form-control" placeholder="Password" required>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
						<a href="<?php	echo	base_url()	.	'register'	?>" class="btn btn-lg btn-primary btn-block">Register new account</a>
					</form>
				</div> 
			</div> 
		</div> 
	</div> 
</div> 

