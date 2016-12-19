<div class='container'> <!-- Master Container -->
	<div class='row'> <!-- Row -->
		<nav class="navbar navbar-inverse navbar-fixed-top drop-shadow"> <!-- Navbar -->
		  <div class="container-fluid"> <!-- container fluid -->


		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href=".?view=home">LMS<i class="fa fa-cube"></i></a>
		    </div>
		    <!-- Brand and toggle get grouped for better mobile display -->


		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> <!-- collapsing section -->
		      <ul class="nav navbar-nav">
		      	<?php include $PATH['INC'].'query_lms_product_types.php' ?>
		      	<?php while ($row = $product_types->fetch_assoc()): ?>
		      	<?php if ($row['button_id'] != 1): ?>
		      		<?php if($row['submenu'] == 1): ?>
							   	<li class="dropdown">
							   		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							   			<span class='text-blue'><?php echo $row['navbar_icon']; ?></span> <?php echo strtoupper($row['name']); ?>
							   			<span class="caret"></span></a>
							   		</a>
						     	 	<ul class="dropdown-menu drop-shadow">
						     	 		<?php include $PATH['INC'].'query_'.$row['submenu_table'].'.php'; ?>
						     	 		<?php while ($sub_row = ${$row['submenu_table']}->fetch_assoc()): ?>
						     	 			<?php $list_name = $row['submenu_table']."_name" ?>
							         		<?php 
							         			if(isset($_GET[$row['submenu_table']]) && $_GET[$row['submenu_table']] == $sub_row[$list_name] ){
							         				echo "<li class='active' >";
							         			} else {
							         				echo '<li>';
							         			} 
							         		?>
							         			<a href=<?php echo '.?view='.$row['view_name'].'&'.$row['submenu_table']."=".$sub_row[$list_name] ?>>
			         								<span><?php echo $sub_row[$list_name]; ?></span>
			         							</a>
							         		</li>
						         		<?php endwhile; ?>
							      	</ul>
							   	</li>
						   <?php else: ?>
						   		<li>								   		
						   			<a href=<?php echo '".?view='.$row['view_name'].'"'; ?>>
							   			<span class='text-blue'><?php echo $row['navbar_icon']; ?></span> <?php echo strtoupper($row['name']); ?>
							   		</a>
							   	</li>
							<?php endif; ?>
		      	<?php endif; ?>
						<?php endwhile; ?>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		      	<?php if(login_check()): ?>
			      	<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			          	<span class=<?php if(isset($_SESSION['admin_priveleges']) and $_SESSION['admin_priveleges'] >= 999){echo "text-gold";}else{echo "text-blue";} ?>><i class="fa fa-user"></i> 
			          		Welcome <?=$_SESSION['given_name']; ?>! </span> <span class="caret text-pink"></span>
			          </a>
			          <ul class="dropdown-menu drop-shadow">
			            <li><a href=".?view=user_details"><i class="fa fa-fw fa-key text-blue"></i> Your Account</a></li>
			            <li><a data-toggle="modal" data-target='#sendFeedback' onClick='$("#sendFeedback #message").focus()'>
			            	<i class="fa fa-fw fa-envelope text-blue"></i> Send Feedback</a></li>
			            <!-- <li><a href="#">...</a></li> -->
			            <li><a href='.?method=logout'><i class="fa fa-fw fa-sign-out text-blue"></i> Logout</a></li>
			          </ul>
			        </li>
			      <?php else: ?>
			      	<p class='navbar-text'>
			      		<a data-toggle="modal" data-target='#loginModal' onClick='$("#loginModal #username").focus()'>
			          	<span class='text-blue'><i class="fa fa-user"></i> Log In </span>
			          </a>
			        </p>
		      	<?php endif; ?>
		      	<form name='search_bar' method='get' action='.' class="navbar-form navbar-left" role="search">
		      		<input type="hidden" name="view" id="view" value="search">
		      		<label>
		      			<i class="fa fa-search text-white"></i>
				        <div class="form-group">
				          <input name='search_string' type="text" class="form-control" placeholder="Search">
				        </div>
			        	<button type="submit" name='Go' class="btn btn-default">Submit</button>
			        </label>
		      	</form>


		      	<!-- Admin Only Section -->
		      	<?php if(login_check() >= 999): ?> <!-- Checks if User has Admin Account Access -->
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		          	</span><i class="fa fa-cogs text-gold"></i> <span class='text-white'>Admin</span><span class="caret text-pink"></span>
		          </a>
		          <ul class="dropdown-menu drop-shadow">
		          	<li class="dropdown-header">Administration</li>
		            <li class="dropdown-submenu">
	                <a tabindex="-1" href="#"><i class="fa fa-fw fa-floppy-o text-gold"></i> Manage Software</a>
	                <ul class="dropdown-menu drop-shadow">
              			<?php include $PATH['INC'].'query_type.php' ?>
              			<?php while ($row = $type->fetch_assoc()): ?>
              				<li>
					         			<a href=<?="?view=admin_sw&type=".$row['type_name']; ?>>
	         								<span><?php echo $row['type_name']; ?></span>
	         							</a>
					         		</li>
				         		<?php endwhile; ?>
	                </ul>
              	</li>
              	<li class="dropdown-submenu">
	                <a tabindex="-1" href="#"><i class="fa fa-fw fa-laptop text-gold"></i> Manage Hardware</a>
	                <ul class="dropdown-menu drop-shadow">
              			<?php include $PATH['INC'].'query_hw_type.php' ?>
              			<?php while ($row = $hw_type->fetch_assoc()): ?>
              				<li>
					         			<a href=<?="?view=admin_hw_list&hw_type=".$row['hw_type_name']; ?>>
	         								<span><?php echo $row['hw_type_name']; ?></span>
	         							</a>
					         		</li>
				         		<?php endwhile; ?>
	                </ul>
              	</li>
		            <li><a href=".?view=mfg_list"><i class="fa fa-fw fa-building-o text-gold"></i> Manage Manufacturers</a></li>
		            <li><a href=".?view=bu_list"><i class="fa fa-fw fa-briefcase text-gold"></i> Manage Business Units</a></li>
		            <li class="dropdown-header">Reporting</li>
		            <li class='disabled'><a href=""><i class="fa fa-fw fa-spinner fa-pulse"></i> In Development</a></li>
		          </ul>
		        </li>
		      	<?php endif; ?>
		      	<!-- Admin Only Section -->


		      </ul>
		    </div><!-- collapsing section -->
		    <!-- Collect the nav links, forms, and other content for toggling -->


		  </div><!-- container fluid -->
		</nav><!-- Navbar -->
	</div> <!-- Row -->
</div><!-- Master Container -->



<!-- Modal Includes -->
	<!-- loginModal -->
	<?php include $PATH['FRAMES'].'modal.login.php'; ?>

	<?php if (login_check()): ?>
		<!-- sendFeedback -->
		<?php include $PATH['FRAMES'].'modal.sendFeedback.php'; ?>
	<?php endif ?>


<!-- Modal Includes -->
