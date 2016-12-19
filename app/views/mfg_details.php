<?php 
	$mfg_id = $_GET['mfg_id'];
	include $PATH['INC'].'query_one_mfg.php';
	include $PATH['INC'].'query_type.php';
	// include $PATH['INC'].'query_software_by_mfg.php';
?>

	<div class='container transparent-container'> <!--Master container  -->
	<div class='row'>

	<!-- loads the common detail code block for back & admin/user view bar -->
	<?php include $PATH['BLOCKS'].'block.backViewRow.php'; ?>

	<?php 
		$suppress_mfg_text = TRUE;
		$query_results = $mfg_info;
		$results_prefix = 'mfg';
		$detail_title = 'Manufacturer';
		include $PATH['BLOCKS'].'block.detailTop.php'; 
	?>

	<div class='software-license-container'>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
  	<?php while ($row = $type->fetch_assoc()): ?>

  		<?php 
				$type_id = $row['type_id'];
				include $PATH['INC'].'query_software_by_mfg.php';
			?>
			<?php if($total_software > 0 && $row['type_id'] != 9999):?>
	  		<li role="presentation" <?php if (!isset($tablist)){echo 'class="active"';$tablist = true;} ?>>
	  			<a href=<?='#type_'.$row['type_id']; ?> aria-controls="profile" role="tab" data-toggle="tab">
	  				<?=$row['type_name'];?>
	  			</a>
	  		</li>
  		<?php endif; ?>
  	<?php endwhile; ?>
  </ul>

  <!-- Tab panes -->
<div class="tab-content"> <!-- Tab Content -->
	<?php include $PATH['INC'].'query_type.php';?>
	<?php while ($row = $type->fetch_assoc()): ?>	<!--Business Unit Loop -->
		<?php 
			$type_id = $row['type_id'];
			include $PATH['INC'].'query_software_by_mfg.php';
		?>
		<div role="tabpanel" <?php if (!isset($tabpane) && ($total_software > 0)){echo 'class="active tab-pane"';$tabpane = true;} else {echo 'class="tab-pane fade"';} ?> id=<?='type_'.$type_id; ?>> <!--Individual Tab Pane -->
			<?php while ($subrow = $software_array->fetch_assoc()): ?> <!-- License Key Loop -->
				<div class='col-xs-12 license-list border-grey drop-shadow'> <!-- License Key Area -->


					<!-- License Column Header -->
					<div class='row hidden-xs license-header'> 
						<div class='col-sm-3'>
							Application
						</div>
						<div class='col-sm-3'>
							Type
						</div>
						<div class='col-sm-2'>
							Assigned Licenses
						</div>
						<div class='col-sm-2'>
							Unassigned Licenses
						</div>
						<div class='col-sm-2'>
							Total Licenses
						</div>
					</div> 
					<!-- License Column Header -->


					<!-- License Key List-->
					<?php include $PATH['INC'].'query_software_by_mfg.php'; ?>
					<?php while ($subrow = $software_array->fetch_assoc()): ?>
					<?php
						$software_id = $subrow['sw_id'];
						include $PATH['INC'].'query_license_info.php';
					?>
						<div class='row'> <!-- Row -->
							


							<!-- App Name -->
							<div class='col-sm-3'> 
								<span class='license-label hidden-sm hidden-md hidden-lg'>Company:</span>
								<?php login_check() >= 999 ? $admin = 'admin_' : $admin = ''; ?> <!-- sets anchor to point to admin details if admin signed in -->
								<a class='text-pink' href=<?= '.?view='.$admin.'sw_details&swid='.$software_id ?>><?php echo $subrow['sw_name'] ?></a>
							</div> 
							<!-- App Name -->


							<div class='hidden-sm hidden-md hidden-lg border-grey margin-15'></div> <!--Row Horizontal Rule -->

							<!-- License Type -->
							<div class='col-sm-3 break-text'>
								<span class='license-label hidden-sm hidden-md hidden-lg'>License:<br></span>
								<?php echo nl2br($subrow['type_name']) ?>
							</div>
							<!-- License Type -->


							<!-- Assigned License -->
							<div class='col-sm-2'>
								<?= $total_claimed_licenses; ?>
							</div>
							<!-- Assigned License -->


							<div class='hidden-sm hidden-md hidden-lg border-grey margin-15'></div> <!--Row Horizontal Rule -->


							<!-- Unassigned Licenses -->
							<div class='col-sm-2'>
								<?= $total_available_licenses; ?>
							</div>
							<!-- Unassigned Licenses -->

							<div class='hidden-sm hidden-md hidden-lg border-grey margin-15'></div> <!--Row Horizontal Rule -->


							<!-- Total Licenses -->
							<div class='col-sm-2'>
								<?= $total_licenses; ?>
							</div>
							<!-- Total Licenses -->


							<div class='hidden-sm hidden-md hidden-lg border-grey margin-15'></div> <!--Row Horizontal Rule -->
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

<?php if(login_check() >= 999): ?>
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
					<a data-toggle="modal" data-target="#newApplication">
						<i class="fa fa-key"></i> <span>Add New Application</span>
					</a>
				</li>
				<li>
					<a data-toggle="modal" data-target="#editManufacturer ">
						<i class="fa fa-pencil-square-o"></i> <span>Edit Info</span>
					</a>
				</li>
				<li>
					<a data-toggle="modal" data-target="#mfgDeleteConfirm">
					<i class="fa fa-times-circle"></i> <span>Delete Manufacturer</span>
				</a>
				</li>
	    </ul>
  	</div>
  </div>
</nav>
<?php endif; ?>

<!-- Admin Navbar Section -->


<!-- Modals Section  -->

<!-- updateMfgImage -->
<?php include $PATH['FRAMES'].'modal.updateMfgImage.php'; ?>

<!-- newApplication -->
<?php include $PATH['FRAMES'].'add_application.php'; ?>

<!-- editManufacturer -->
<?php include $PATH['FRAMES'].'modal.editManufacturer.php'; ?>

<!-- mfgDeleteConfirm -->
<?php include $PATH['FRAMES'].'modal.mfgDeleteConfirm.php'; ?>

<!-- Modals Section  -->

<script type="text/javascript">
	//Disabled the option to change App manufacturer in form and sets the value to the current
	//manufacturer
	$("select#app_mfg").val(<?= $mfg_id ?>);
	$("select#app_mfg").attr('disabled',true);
	$("input#app_override").attr({
		value: <?=$mfg_id ?>,
		name: 'insert_mfg'
	});
</script>






	





	