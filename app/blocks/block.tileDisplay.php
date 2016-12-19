
<div class='row'>
	<div class='col-xs-12 margin-top-15'>
		<?php if (isset($query_results) && $query_results != FALSE): ?>
			<?php for( $i = 0; $i < count( $query_results->data ); $i++ ) : ?>
				<?php 
					$no_image_icon == FALSE ? $display_no_image_icon = $query_results->data[$i][$results_prefix.'_type_icon'] : $display_no_image_icon = $no_image_icon;
				?>
				<div class='software hvr-grow'>
					<a href=<?php echo '.?view='.$results_prefix.'_details&'.$results_prefix.'_id='.$query_results->data[$i][$results_prefix.'_id'] ?>> 
						<div class='software-package drop-shadow border-grey'>
							<?php if (isset($query_results->data[$i][$results_prefix.'_advertise']) && $query_results->data[$i][$results_prefix.'_advertise'] != 1): ?>
								<div class='not-advertised'>
									<i class='fa fa-times text-grey'></i>
								</div>
							<?php endif ?>

							<?php if (isset($query_results->data[$i][$results_prefix.'_img'])): ?>
								<?php if($query_results->data[$i][$results_prefix.'_img'] != ''): ?> 
									<img class="img-responsive" src=<?php echo $PATH['UPLOADS'].$results_prefix.'_img/'.$query_results->data[$i][$results_prefix.'_img']; ?>>
								<?php else: ?>
									<div class='software-tile-icon'>
										<i class=<?="'fa ".$display_no_image_icon." text-lightgrey'" ?>></i>
									</div>
								<?php endif; ?>
							<?php elseif (isset($query_results->data[$i][$results_prefix.'_logo'])): ?>
								<?php if($query_results->data[$i][$results_prefix.'_logo'] != ''): ?> 
									<img class="img-responsive" src=<?php echo $PATH['UPLOADS'].$results_prefix.'_logo/'.$query_results->data[$i][$results_prefix.'_logo']; ?>>
								<?php else: ?>
									<div class='software-tile-icon'>
										<i class=<?="'fa ".$display_no_image_icon." text-lightgrey'" ?>></i>
									</div>
								<?php endif; ?>
							<?php endif ?>

							<div class='overlay-bottom-all hidden-xs text-white bg-grey'>
								<?php echo $query_results->data[$i][$results_prefix.'_name'] ?>
							</div>
						</div>
					</a>
				<div class='col-xs-12 hidden-sm hidden-md hidden-lg software-label-small'>
					<strong><?php echo $query_results->data[$i][$results_prefix.'_name'] ?></strong>
				</div>
			</div>

			<?php endfor; ?>
		<?php else: ?>
			<h3 class='margin-15'>No Results Found</h3>
		<?php endif; ?>
	</div>
</div>

<?php if (${$results_prefix.'_total'} > 24): ?>
	<div class='row row-eq-height'>
		<div class='col-xs-12 margin-15'>
			
			<?php echo $Paginator->createLinks( $links, 'pagination pagination-sm' ); ?>
			
			<span id='pageination_show' class='hidden-xs'>Results Size:</span>
			<form class='form-pagination-limit'>
				<div class='form-group'>
					<select class='pagination pagination-limit text-pink'>
						<option id='limit-all'>All</option>
						<option id='limit-24'>24</option>
						<option id='limit-48'>48</option>
						<option id='limit-96'>96</option>
					</select>
				</div>
			</form>
		</div>
	</div>
<?php endif ?>