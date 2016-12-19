
<!-- Left side image -->
<div class='col-sm-4 col-md-3'>	
	<div class='detail-software-image border-grey drop-shadow'>
		<?php if($sw_info['sw_logo'] && $sw_info['sw_logo'] != ''): ?>
				<img class='img-rounded' src=<?php echo $PATH['UPLOADS'].'sw_logo/'.$sw_info['sw_logo']; ?>>
		<?php else: ?>
			<div class='img-rounded'><i class="fa fa-picture-o fa-fw text-lightgrey"></i></div>
		<?php endif; ?>
	</div>
	<?php if ($_GET['view'] == 'admin_sw_details'): ?>
		<div class='col-xs-12 update-image'>
			<a class='text-white' data-toggle="modal" data-target="#updateAppImage">
				<center><small><i class="fa fa-picture-o text-green"></i> Update Application Image
			</a></small></center>
		</div>
	<?php endif; ?>
</div> 
<!-- Left Side image -->


<div class='col-sm-8 col-md-9'> <!-- Software Info Box -->


	<!-- Title Box -->
	<?="<div class='col-xs-12 detail-software-title drop-shadow bg-".$sw_info['type_color']." border-grey'>" ?>
	<div class='row'>
		<div class='container-fluid'>

			<!-- Title, Manufacturer, Type -->
			<div class='col-md-6'>
				<?php echo $sw_info['sw_name'] ?> 
			</div>
			<div class='col-md-3'>
				<a class='text-grey' href=<?='.?view=mfg_details&mfg_id='.$sw_info['sw_mfg']; ?>>
					<span class='text-small'> by <?php echo $sw_info['mfg_name'] ?></span>
				</a>
			</div>
			<div class='col-md-3'>
				<!-- toggles whether redirected to admin view based on "view" -->
				<?php $_GET['view'] == 'admin_sw_details' ? $view_url = 'admin_sw' : $view_url = 'sw_list'; ?>  
				<a class='text-white' href=<?='.?view='.$view_url.'&type='.$sw_info['type_name']; ?>>
					<span class='text-right text-small hidden-xs pad-right-15'><?php echo $sw_info['type_name'] ?></span>
				</a>
			</div>
			<!-- Title, Manufacturer, Type -->
		</div>
	</div>
	<div class='row'>
		<div class='container-fluid'>
			<!-- Operating System, License Counts -->
			<div class='col-sm-4'>
				<?php while ($sub_row = $os->fetch_assoc()): ?>
							<?php 
								if($sw_info[$sub_row['os_key']] == 1){
									echo "<span class='text-grey' title='".$sub_row['os_name']."'>".$sub_row['os_icon'].'</span>';
								}
							?>
						<?php endwhile; ?>
			</div>
			<?php if (login_check() >= 999): ?>
				<div class='col-sm-6 col-sm-offset-2 software-detail-stats'>
					<em>
					Total Licenses: <strong><?=$total_licenses; ?></strong><br>
					Assigned Licenses: <strong><?=$total_claimed_licenses; ?></strong></br>
					Available Licenses: <strong><?=$total_available_licenses; ?></strong><br>
					</em>
				</div>
			<?php endif ?>
			<!-- Operating System, License Counts -->
		</div>
	</div>
</div>
<!-- Title Box -->


		<div class='col-xs-12 detail-software-backdrop border-grey drop-shadow text-box'>

			<h1>About <?=$sw_info['sw_name']; ?></h1>
			<?php echo $sw_info['sw_desc'] ?>


		</div>
	</div>
</div> <!-- End Software Info box -->