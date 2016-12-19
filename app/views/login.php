<?php if(!login_check()): ?>
	<div class='container'>
		<div class='row'>

			<div class='login-panel col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4'>


					<div class='col-xs-12 app-logo'>
						LMS<i class="fa fa-cube"></i>
						<span class='app-logo-subtext'>an <strong>IAC Publishing Labs</strong> Application</span>
					</div>

					<div class='col-xs-12 detail-software-backdrop drop-shadow'>
						<!-- Submit Error Section -->
						<div id='submit_error'>
							<?php if(isset($_GET['login_error'])): ?>			
								<h4 class='text-pink'><?php echo $_GET['login_error']; ?></h4>
							<?php endif; ?>
						</div>
						<!-- Submit Error Section -->
						<form action='.?method=ad_login' method='post'>
							<div class='form-group'>
								<label></label>
								<input class='form-control' id='username' type='text' name='username' placeholder='Username' autofocus>
							</div>
							<div class='form-group'>
								<label></label>
								<input class='form-control' id='password' type='password' name='password' placeholder='Password'>
							</div>
							<input class='btn btn-default' type='submit' value='Login'>
						</form>
					</div>


					<div class='col-xs-10 col-xs-offset-1'>
						<br>
							<center><a class='text-white' href=".?view=home">Skip Logon...</a></center>
					</div>

			</div>
		</div>
	</div>
<?php else: ?>
	<?php header('Location: .?view=home'); exit(); ?>

<?php endif; ?>