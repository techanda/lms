<?php 
//This section contains the includes necessary for view
include $PATH['INC'].'query_all_software.php';
include $PATH['INC'].'query_type.php';
include $PATH['INC'].'query_mfg.php';
include $PATH['INC'].'query_os.php';
if(isset($_GET['type'])){$header_type = urldecode($_GET['type']);}else{$header_type='All';}
?>
<?php if(login_check() >= 999): ?>
	<div class='container transparent-container'>
			<div class='display-type text-gold'>
				<p><?=$header_type; ?></p>
			</div>


	<!-- loads the common detail code block for back & admin/user view bar -->
	<?php include $PATH['BLOCKS'].'block.backViewRow.php'; ?>

	<!-- loads software tiles -->
	<?php 
	$query_results = $results;
	$results_prefix = 'admin_sw';
	include $PATH['BLOCKS'].'block.softwareTileDisplay.php'; 
	?>

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
					<a data-toggle="modal" data-target="#newApplication">
					<i class="fa fa-floppy-o"></i> Add New Application</a>
				</li>
				<li>
					<a href="#" data-toggle="modal" data-target="#newManufacturer">
					<i class="fa fa-building-o"></i> Add New Manufacturer</a>
				</a>
				</li>
				<li>
					<a href='#' data-toggle="modal" data-target="#newBusinessUnit">
					<i class="fa fa-sitemap"></i> Add New Business Unit</a>
				</a>
				</li>
	    </ul>
  	</div>
  </div>
</nav>


<!-- Modal Includes -->
	<!-- newBusinessUnit -->
	<?php include $PATH['FRAMES'].'add_businessunit.php'; ?>
	<!-- newManufacturer -->
	<?php include $PATH['FRAMES'].'add_manufacturer.php'; ?>
	<!-- newApplication -->
	<?php include $PATH['FRAMES'].'add_application.php'; ?>
	
<!-- Modal Includes -->




<?php else: ?>
	<meta http-equiv="refresh" content="0; URL='.?view=home'" />
<?php endif; ?>	