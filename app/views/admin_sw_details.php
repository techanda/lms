<?php 
	$software_id = $_GET['swid'];
	include $PATH['INC'].'query_one_software.php';
	include $PATH['INC'].'query_license_info.php';
	include $PATH['INC'].'query_os.php';
	include $PATH['INC'].'query_bus.php';


	/*This section sets the Session variables to pass to pop-up windows */
	$_SESSION['software_id'] = $software_id;
?>

<?php if(login_check() >= 999): ?>
	<div class='container transparent-container'> <!--Master container  -->
	<div class='row'>

	<!-- loads the common detail code block for back & admin/user view bar -->
	<?php include $PATH['BLOCKS'].'block.backViewRow.php'; ?>

	<!-- loads the common detail code block for software details -->
	<?php include $PATH['BLOCKS'].'block.softwareDetailTop.php'; ?>

	<div class='software-license-container'>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
  	<?php while ($row = $bus->fetch_assoc()): ?>

  		<?php 
				$bu_id = $row['bu_id'];
				include $PATH['INC'].'query_license_info_by_bu.php';
			?>
			<?php if($total_licenses > 0):?>
	  		<li role="presentation" <?php if (!isset($tablist)){echo 'class="active"';$tablist = true;} ?>>
	  			<a href=<?='#bu_'.$row['bu_id']; ?> aria-controls="profile" role="tab" data-toggle="tab">
	  				<?=$row['bu_name'];?>
	  			</a>
	  		</li>
  		<?php endif; ?>
  	<?php endwhile; ?>
  </ul>

  <!-- Tab panes -->
<div class="tab-content"> <!-- Tab Content -->
	<?php include $PATH['INC'].'query_bus.php';?>
	<?php while ($row = $bus->fetch_assoc()): ?>	<!--Business Unit Loop -->
		<?php 
			$bu_id = $row['bu_id'];
			include $PATH['INC'].'query_license_info_by_bu.php';
		?>
		<div role="tabpanel" <?php if (!isset($tabpane) && ($total_licenses > 0)){echo 'class="active tab-pane"';$tabpane = true;} else {echo 'class="tab-pane fade"';} ?> id=<?='bu_'.$bu_id; ?>> <!--Individual Tab Pane -->
			<?php while ($subrow = $licenses->fetch_assoc()): ?> <!-- License Key Loop -->
				<div class='col-xs-12 license-list border-grey drop-shadow'> <!-- License Key Area -->


					<!-- Error Message Area -->
					<?php if(isset($_SESSION['error'])): ?>
						<?php echo '<h1>'.$_SESSION['error'].'</h1>'; ?>
					<?php endif ?>
					<!-- Error Message Area -->


					<!-- License Column Header -->
					<div class='row hidden-xs license-header'> 
						<div class='col-sm-3 col-md-2'>
							Company
						</div>
						<div class='col-sm-4'>
							License
						</div>
						<div class='col-sm-2 hidden-xs hidden-sm'>
							License Type
						</div>
						<div class='col-sm-2'>
							Assigned User
						</div>
						<div class='col-sm-2'>
						</div>
					</div> 
					<!-- License Column Header -->


					<!-- License Key List-->
					<?php include $PATH['INC'].'query_license_info_by_bu.php'; ?>
					<?php while ($subrow = $licenses->fetch_assoc()): ?>
						<div class='row'> <!-- Row -->
							


							<!-- Business Unit -->
							<div class='col-sm-3 col-md-2'> 
								<span class='license-label hidden-sm hidden-md hidden-lg'>Company:</span>
								<a class='text-grey' href=<?='.?view=bu_details&bu_id='.$subrow['bu_id']; ?>>
									<?php echo $subrow['bu_name'] ?>
								</a>
							</div> 
							<!-- Business Unit -->


							<div class='hidden-sm hidden-md hidden-lg border-grey margin-15'></div> <!--Row Horizontal Rule -->

							<!-- License Key -->
							<div class='col-sm-4 break-text'>
								<span class='license-label hidden-sm hidden-md hidden-lg'>License:<br></span>
								<?php echo nl2br($subrow['lic_key']) ?>
							</div>
							<!-- License Key -->


							<!-- License Type -->
							<div class='col-sm-2 hidden-xs hidden-sm'>
								<?php echo $subrow['lic_type_name'] ?>
							</div>
							<!-- License Type -->


							<div class='hidden-sm hidden-md hidden-lg border-grey margin-15'></div> <!--Row Horizontal Rule -->

							<!-- Assigned User -->
							<div class='col-sm-2'>
								<a name=<?php echo "'lic_".$subrow['lic_id']."'" ?>></a> <!-- License Reference Link -->
								<span class='license-label hidden-sm hidden-md hidden-lg'>Assigned User:</span>
								<a class='text-grey' href=<?='.?view=user_details&username='.$subrow['lic_user_samaccount'] ?>>
									<?php echo $subrow['lic_user']; ?>
								</a>
							</div>
							<!-- Assigned User -->


							<div class='hidden-sm hidden-md hidden-lg border-grey margin-15'></div> <!--Row Horizontal Rule -->


							<!-- Actions -->
							<div class='col-sm-2'> 
								<ul class='list-unstyled'>
									<!-- Assign/Reclaim License -->
									<li>
										<?php if( $subrow['lic_user'] && $subrow['lic_user'] != ''): ?>
											<a class='btn btn-default btn-lic-action' data-toggle="modal" data-target=<?="#reclaimConfirm_".$subrow['lic_id']; ?>>
												<i class="fa fa-times-circle" title='Claim license key from user'></i> Reclaim
											</a>
										<?php else: ?>
											<a class='btn btn-default btn-lic-action' data-toggle="modal" data-target=<?="#assignLicense_".$subrow['lic_id']; ?>>
											<i class="fa fa-plus-circle" title='Assign user to license key'></i> Assign
											</a>
										<?php endif; ?>
									</li>
										
									<!-- Assign/Reclaim License -->


									<!-- Delete the License Key -->
									<li>
										<a class='btn btn-default btn-lic-action' data-toggle="modal" data-target=<?="#deleteConfirm_".$subrow['lic_id']; ?>>
											<i class="fa fa-trash" title='Remove the license key'></i> Delete
										</a>
									</li>
									<!-- Delete the License Key -->	


									<!-- Edit the License Key -->
									<li>
										<a class='btn btn-default btn-lic-action' data-toggle="modal" data-target=<?="#editLicense_".$subrow['lic_id']; ?>>
											<i class="fa  fa-info-circle" title='Edit the License'></i> Details
										</a>
									</li>
									<!-- Edit the License Key -->	
								</ul>
							</div>
							<!-- Actions -->


						</div> <!-- Row -->
					<?php endwhile; ?>
					<!-- License Key List-->


				</div><!-- License Key Area -->
			<?php endwhile; ?> <!-- License Key Loop -->
		</div> <!--Individual Tab Pane -->
	<?php endwhile; ?><!--Business Unit Loop -->
	</div><!-- End License Key Area -->
	</div>
</div><!-- Tab Content -->		
</div>
</div>


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
					<a data-toggle="modal" data-target="#newLicense">
						<i class="fa fa-key"></i> <span>Add New License</span>
					</a>
				</li>
				<li>
					<a data-toggle="modal" data-target="#editApplication">
						<i class="fa fa-pencil-square-o"></i> <span>Edit Info</span>
					</a>
				</li>
				<li>
					<a data-toggle="modal" data-target="#appDeleteConfirm">
					<i class="fa fa-times-circle"></i> <span>Delete Application</span>
				</a>
				</li>
	    </ul>
  	</div>
  </div>
</nav>


<!-- Admin Navbar Section -->
<?php else: ?>
	<meta http-equiv="refresh" content="0; URL='.?view=home'" />
<?php endif; ?>	

<!-- Modals Section  -->

<!-- newLicense -->
<?php include $PATH['FRAMES'].'new_license.php' ?>
<!-- editApplication -->
<?php include $PATH['FRAMES'].'modify_application.php' ?>
<!-- appDeleteConfirm -->
<?php include $PATH['FRAMES'].'app_delete_confirm.php' ?>
<!-- updateAppImage -->
<?php include $PATH['FRAMES'].'update_app_image.php' ?>
<!-- deleteConfirm_# -->
<?php include $PATH['FRAMES'].'delete_confirm.php' ?>
<!-- editLicense_# -->
<?php include $PATH['FRAMES'].'reclaim_confirm.php' ?>
<!-- assignLicense_# -->
<?php include $PATH['FRAMES'].'add_user.php' ?>
<!-- reclaimConfirm_# -->
<?php include $PATH['FRAMES'].'add_user.php' ?>
<!-- editLicense_# -->
<?php include $PATH['FRAMES'].'edit_license.php' ?>






<!-- Modals Section  -->








	





	