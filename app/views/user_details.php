	<?php
		if (!login_check()) {
			echo "<script>document.location.href='.?view=login' </script>";
		}
		if(isset($_GET['username']) && $_GET['username'] != '' && login_check() >= 999){
			$ldap_account = query_ldap_samaccount($ldap_connection,$ldap_username,$ldap_password,strtoupper($_GET['username']));
			if(isset($ldap_account)){
				$given_name 				= $ldap_account[strtoupper($_GET['username'])]['first_name'];
				$surname 					= $ldap_account[strtoupper($_GET['username'])]['last_name'];
				$title 					= $ldap_account[strtoupper($_GET['username'])]['title'];
				$department 					= $ldap_account[strtoupper($_GET['username'])]['department'];
				$company 					= $ldap_account[strtoupper($_GET['username'])]['company'];
				$user_email 			= $mysqli->real_escape_string($ldap_account[strtoupper($_GET['username'])]['email']);
				$user 					= $mysqli->real_escape_string($given_name." ".$surname);
				$sam_account_name = $_GET['username'];
				$return_button_name = 'Reclaim';
			}
			else
			{
				$error = 	'No user with Account: "'.strtoupper($_POST['insert_name']).
							'" can be located on Domain Controller: "'.strtoupper($ldap_hostname).'"';
			}
		} else {
			$sam_account_name = $_SESSION['username'];
			$given_name = $_SESSION['given_name'];
			$surname = $_SESSION['surname'];
			$title = $_SESSION['title'];
			$user_email = $_SESSION['email'];
			$department = $_SESSION['department'];
			$company = $_SESSION['company'];
			$return_button_name = 'Return';
		}

		include $PATH['INC'].'query_license_info_by_samaccount.php';
		include $PATH['INC'].'query_login.php';
		?>
		<div class='container transparent-container'>
			<div class='row'>

				
				<!-- loads the common detail code block for back & admin/user view bar -->
				<?php include $PATH['BLOCKS'].'block.backViewRow.php'; ?>


				<div class='container'>
					<div class='col-xs-12 detail-software-title bg-grey border-black drop-shadow'>
								<div class='container'>
									<h1>
									<?= $given_name.' '.$surname; ?>
									<small class='user-title'><?= $title ?></small>
								</h1>
								<ul class='list-unstyled user-info-text text-lightgrey'>
									<li title="User's Email Address"><a class='text-green' href=<?= 'mailto:'.$user_email ?>><?= $user_email ?></a></li>
									<li title="User's Company"><?= $company ?></li>
									<li title="User's Department Code"><?= $department ?></li>
									<li title="User's Last Login"><a class='text-lightgrey' data-toggle="modal" data-target='#loginLog' ><?=$login_info['login_timestamp'] ?></a></li>
								</ul>
								</div>

					</div>
				</div>
			</div>
			<h2 class='drop-shadow border-grey bg-green padding-15'>Assigned Applications</h2>
			<div class='row'>
				<div class='col-xs-12 text-right text-white'>Assigned Licenses: <strong><?= $total_licenses ?></strong> </div>
				<div class='container margin-top-15'>
					<div class='col-xs-12 license-list border-grey drop-shadow'> <!-- License Key Area -->
						<!-- License Column Header -->
						<div class='row hidden-xs license-header'>
							<div class='col-sm-2'>
								Application Name
							</div>
							<div class='col-sm-2'>
								Company
							</div>
							<div class='col-sm-4'>
								License
							</div>
							<div class='col-sm-2'>
								License Type
							</div>
							<div class='col-sm-2'>
							</div>
						</div> 
						<!-- License Column Header -->


						<!-- License Key List-->
						<?php while ($row = $licenses->fetch_assoc()): ?>
							<div class='row'> <!-- Row -->
								
								<!-- Business Unit -->
								<div class='col-sm-2 '> 
									<span class='license-label hidden-sm hidden-md hidden-lg'>Name:</span>
									<a class='text-grey' href=<?='.?view=sw_details&swid='.$row['sw_id'] ?>>
										<?php echo $row['sw_name'] ?>
									</a>
								</div> 
								<!-- Business Unit -->

								<div class='hidden-sm hidden-md hidden-lg border-grey margin-15'></div> <!--Row Horizontal Rule -->

								<!-- Business Unit -->
								<div class='col-sm-3 col-md-2'> 
									<span class='license-label hidden-sm hidden-md hidden-lg'>Company:</span>
									<a class='text-grey' href=<?='.?view=bu_details&bu_id='.$row['bu_id']; ?>>
										<?php echo $row['bu_name'] ?>
									</a>
								</div> 
								<!-- Business Unit -->


								<div class='hidden-sm hidden-md hidden-lg border-grey margin-15'></div> <!--Row Horizontal Rule -->

								<!-- License Key -->
								<div class='col-sm-4 break-text'>
									<span class='license-label hidden-sm hidden-md hidden-lg'>License:<br></span>
									<?php echo nl2br($row['lic_key']) ?>
								</div>
								<!-- License Key -->


								<!-- License Type -->
								<div class='col-sm-2 hidden-xs hidden-sm'>
									<?php echo $row['lic_type_name'] ?>
								</div>
								<!-- License Type -->

								<div class='hidden-sm hidden-md hidden-lg border-grey margin-15'></div> <!--Row Horizontal Rule -->							

								<!-- Action Button -->
								<div class='col-sm-2'>
									<a class='btn btn-default btn-lic-action' data-toggle="modal" data-target=<?="#reclaimConfirm_".$row['lic_id']; ?>>
										<i class="fa fa-arrow-circle-left" title='Return the license'></i> <?= $return_button_name ?>
									</a>
								</div>
								<!-- Action Button -->

								<?php
									$license_id = $row['lic_id'];
									$software_id = $row['sw_id'];
								?>

							</div> <!-- Row -->

						<?php endwhile; ?>
						<!-- License Key List-->


					</div><!-- License Key Area -->


				</div>
				
		</div>
		<?php if (login_check() >= 999): ?>
			<!-- Admin Navbar Section -->
			<nav class="bottom-navbar navbar navbar-admin navbar-fixed-bottom">
			  <div class="container-fluid">
					 <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin-menu" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <strong>Admin</strong> <i class="fa fa-cogs"></i>
			      </button>
			    </div>
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="collapse navbar-collapse" id="admin-menu">
				    <ul class="nav navbar-nav navbar-right">
							<li>
								<a data-toggle="modal" data-target="#revokeAll">
									<i class="fa fa-chain-broken"></i> <span>Revoke All Licenses</span>
								</a>
							</li>
				    </ul>
			  	</div>
			  </div>
			</nav>
			<!-- Admin Navbar Section -->
		<?php endif; ?>

	</div>

	<!-- Modal Includes -->

	<!-- ReturnLicense_# -->
	<?php include $PATH['FRAMES'].'return_confirm.php' ?>

	<!-- newBusinessUnit -->
	<?php include $PATH['FRAMES'].'modal.revokeAll.php'; ?>

	<!-- loginLog -->
	<?php include $PATH['FRAMES'].'modal.loginLog.php'; ?>

	<!-- Modal Includes -->
