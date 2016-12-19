<?php 
	$hw_id = $_GET['hw_id'];
	include $PATH['INC'].'query_one_hw.php';
	include $PATH['INC'].'query_type.php';
	// include $PATH['INC'].'query_software_by_hw.php';
?>

	<div class='container transparent-container'> <!--Master container  -->
	<div class='row'>

	<!-- loads the common detail code block for back & admin/user view bar -->
	<?php include $PATH['BLOCKS'].'block.backViewRow.php'; ?>

	<!-- loads the common detail code block for detail top view -->
	<?php 
	$query_results = $hw_info;
	$results_prefix = 'hw';
	$detail_title = 'Hardware';
	include $PATH['BLOCKS'].'block.detailTop.php'; 
	?>

		

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
					<a data-toggle="modal" data-target="#updateSpecifications">
						<i class="fa fa-info"></i> <span>
						<?php if (isset($query_results[$results_prefix.'_specs']) && $query_results[$results_prefix.'_specs'] != ''): ?>
			    		Update Specifications
						<?php else: ?>
							Add Specifications
						<?php endif; ?>
					</span>
					</a>
				</li>
				<li>
					<a data-toggle="modal" data-target="#editHardware">
						<i class="fa fa-pencil-square-o"></i> <span>Edit Info</span>
					</a>
				</li>
				<li>
					<a data-toggle="modal" data-target="#hwDeleteConfirm">
					<i class="fa fa-times-circle"></i> <span>Delete Hardware</span>
				</a>
				</li>
	    </ul>
  	</div>
  </div>
</nav>
<?php endif; ?>

<!-- Admin Navbar Section -->


<!-- Modals Section  -->

<!-- updatehwImage -->
<?php include $PATH['FRAMES'].'modal.updateSpecifications.php'; ?>

<!-- updatehwImage -->
<?php include $PATH['FRAMES'].'modal.updateHwImage.php'; ?>

<!-- editManufacturer -->
<?php include $PATH['FRAMES'].'modal.editHardware.php'; ?>

<!-- hwDeleteConfirm -->
<?php include $PATH['FRAMES'].'modal.hwDeleteConfirm.php'; ?>

<!-- Modals Section  -->

<script type="text/javascript">
	//Disabled the option to change App manufacturer in form and sets the value to the current
	//manufacturer
	$("select#app_hw").val(<?= $hw_id ?>);
	$("select#app_hw").attr('disabled',true);
	$("input#app_override").attr({
		value: <?=$hw_id ?>,
		name: 'insert_hw'
	});
</script>






	





	