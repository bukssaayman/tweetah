<div class="container">
	<div class="row centered-form">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Please sign up for Tweetah <small>It's free!</small></h3>
				</div>
				<div class="panel-body">
					<div>
						<?php	if(!empty($errors)){	?>
							<div class="alert alert-danger" role="alert">
								<ul>
								<?php	foreach($errors	AS	$err){	?>
									<li><?php	echo	$err	?></li>
								<?php	}	?>
									</ul>
							</div>
						<?php	}	?>
					</div>
					<form method="post" action="<?php	echo	base_url()	.	'register/signup'	?>" role="form">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="first_name" id="first_name" value="<?php echo !empty($this->input->post('first_name'))?$this->input->post('first_name'):'' ?>" class="form-control input-sm" placeholder="First Name">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="last_name" id="last_name" value="<?php echo !empty($this->input->post('last_name'))?$this->input->post('last_name'):'' ?>" class="form-control input-sm" placeholder="Last Name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">@</span>
										<input type="text" id="handle" name="handle" value="<?php echo !empty($this->input->post('handle'))?$this->input->post('handle'):'' ?>" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<span class="availability" id="handle-available-yes">Congratulations! Your username is available.</span>
								<span class="availability" id="handle-available-no">Sorry, that username is already registered.</span>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password_confirm" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
								</div>
							</div>
						</div>
						<input type="submit" value="Sign me up!" class="btn btn-lg btn-primary btn-block">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>