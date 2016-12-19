<?php
	include $PATH['INC'].'query_bus.php';
?>

	<div class='container transparent-container'>
		<?php if (login_check() >= 999): ?>
			<div class='display-type text-gold'>
				<p>Manage Business Unit</p>
			</div>
		<?php else: ?>
			<div class='display-type text-white'>
				<p>Business Units</p>
			</div>
		<?php endif ?>

		<!-- loads the common detail code block for back & admin/user view bar -->
		<?php include $PATH['BLOCKS'].'block.backViewRow.php'; ?>

		<!-- loads the tile formatting for display -->
		<?php 
			$query_results = $bu_results;
			$results_prefix = 'bu';
			$no_image_icon = 'fa-briefcase';
			include $PATH['BLOCKS'].'block.tileDisplay.php';
		?>

<!-- Admin Navbar Section -->
<?php if(login_check() >= 999): ?>
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
					<a data-toggle="modal" data-target="#newBusinessUnit">
						<i class="fa fa-briefcase"></i> <span>Add New Business Unit</span>
					</a>
				</li>
	    </ul>
  	</div>
  </div>
</nav>
<?php endif; ?>

<!-- Admin Navbar Section -->

<!-- Modals -->

	<!-- newBusinessUnit -->
	<?php include $PATH['FRAMES'].'add_businessunit.php'; ?>

<!-- Modals -->