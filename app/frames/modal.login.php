<?php if(!login_check()): ?>


		<div id='loginModal' class="modal fade vert-align" role="dialog">
		  <div class='modal-dialog modal-sm'>
				<div class='detail-software-backdrop border-blue'>
						<div class='modal-bar bg-blue'>
							Login into the LMS System
							<div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
						</div>
						<div class='modal-container'>
							<p>Enter your credentials:</p>
							<form method='post' action='action.php?method=ad_login'>
								<input type='hidden' name='url_redirect' value=<?=$_SERVER['QUERY_STRING']; ?>>


								<!-- Domain User Name -->
								<div class='form-group'>
									<input class='form-control' id='username' type='text' name='username' placeholder="Username">
								</div>
								<!-- Domain User Name -->

								<!-- Domain Password -->
								<div class='form-group'>
									<input class='form-control' id='password' type='password' name='password' placeholder="Password">
								</div>
								<!-- Domain User Name -->

								<!-- Buttons -->
								<center>
									<input class='btn btn-default' type='submit' value='Login'>
									<input type='button' class='btn btn-default' value='Cancel' data-dismiss='modal' />
								</center>
								<!-- Buttons -->


							</form>
						</div>
					</div>
				</div>
			</div>
	<?php endif; ?>


<!-- Set focus on the username textbox when opened -->
	<script type="text/javascript">
		$('#loginModal').on('shown.bs.modal', function () {
      $("#username").focus();
    });
	</script>