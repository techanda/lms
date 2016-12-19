
<?php 
if (!isset($suppress_mfg_text)) {
	$suppress_mfg_text = FALSE;
}
?>

<!-- Left side image -->
		<div class='col-sm-4 col-md-3'>	
			<div class='detail-software-image border-grey drop-shadow'>
				<?php if(isset($query_results[$results_prefix.'_img']) && $query_results[$results_prefix.'_img'] != ''): ?>
					<img class='img-rounded' src=<?php echo $PATH['UPLOADS'].$results_prefix.'_img/'.$query_results[$results_prefix.'_img']; ?>>
				<?php elseif(isset($query_results[$results_prefix.'_logo']) && $query_results[$results_prefix.'_logo'] != ''): ?>
					<img class='img-rounded' src=<?php echo $PATH['UPLOADS'].$results_prefix.'_logo/'.$query_results[$results_prefix.'_logo']; ?>>
				<?php else: ?>
					<div class='img-rounded'><i class="fa fa-picture-o fa-fw text-lightgrey"></i></div>
				<?php endif; ?>
			</div>
			<div class='col-xs-12 update-image'>
				<?php if (login_check() >= 999): ?>
						<a class='text-white' data-toggle="modal" data-target=<?="#update".ucfirst($results_prefix)."Image" ?>>
						<center>
							<small>
								<i class="fa fa-picture-o text-green"></i> Update <?= $detail_title ?> Image
							</small>
						</center>
					</a>
				<?php endif ?>
			</div>
		</div> 
		<!-- Left Side image -->

		<div class='col-sm-8 col-md-9'> <!-- Software Info Box -->


			<!-- Title Box -->
			<div class='col-xs-12 detail-software-title drop-shadow bg-grey border-black'>
				<div class='row'>
					<div class='container-fluid'>



						<!-- Title, $detail_title, Type -->
						<div class='col-sm-6'>
							<?php echo $query_results[$results_prefix.'_name'] ?> 
						</div>
						<div class='col-sm-3'>
							<?php if ($suppress_mfg_text == FALSE): ?>
								<?php if (isset($query_results['mfg_name']) && $query_results['mfg_name'] != ''): ?>
									<a class='text-green' href=<?='.?view=mfg_details&mfg_id='.$query_results['mfg_id']?>>
										<span class='text-small'> by <?php echo $query_results['mfg_name'] ?></span>
									</a>
								<?php endif ?>
							<?php endif ?>
						</div>
						<div class='col-sm-3'>
							<span class='text-right text-small hidden-xs'>
								<?php if (isset($query_results[$results_prefix.'_type_name']) && $query_results[$results_prefix.'_type_name'] != ''): ?>
									<a class='text-white' href=<?='.?view='.$results_prefix.'_list&type='.$query_results[$results_prefix.'_type_name'] ?>>
										<?php echo $query_results[$results_prefix.'_type_name'] ?>
									</a>
								<?php endif ?>
							</span>
						</div>
						<!-- Title, $detail_title, Type -->
					</div>
				</div>
			</div>
		<!-- Title Box -->

			<div class='col-xs-12 detail-software-backdrop border-grey drop-shadow text-box'>
				<?php if (isset($query_results[$results_prefix.'_specs']) && $query_results[$results_prefix.'_specs'] != ''): ?>
					<ul class="nav nav-pills">
		  			<li role="presentation" class="active"><a href="#description" aria-controls="profile" role="tab" data-toggle="tab">Description</a></li>
		  			<li role="presentation"><a href="#specs" aria-controls="profile" role="tab" data-toggle="tab">Specifications</a></li>
					</ul>
					<div class='tab-content'>
						<div id="description" class="tab-pane fade in active">
							<?php echo $query_results[$results_prefix.'_desc'] ?>
						</div>
						<div id="specs" class="tab-pane fade">
							<div class='margin-top-15'>
								<?php echo nl2br($query_results[$results_prefix.'_specs']) ?>
							</div>
						</div>
					</div>
				<?php else: ?>

					<?php echo $query_results[$results_prefix.'_desc'] ?>

				<?php endif ?>

				

			</div>
		</div>
	</div> <!-- End Software Info box -->
