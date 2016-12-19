
<?php 
$query_type = 'query_hw.php';
include $PATH['VIEWS'].'hw_list.php'; 
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
					<a data-toggle="modal" data-target="#addHardware">
						<i class="fa fa-building"></i> <span>Add New Hardware</span>
					</a>
				</li>
	    </ul>
  	</div>
  </div>
</nav>
<?php endif; ?>
<!-- Admin Navbar Section -->


<!-- Modal Section -->

<!-- #addHardware -->
<?php include $PATH['FRAMES'].'modal.addHardware.php'; ?>


<!-- Modal Section -->
