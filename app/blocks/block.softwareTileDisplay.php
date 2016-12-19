		<div class='row'>
			<div class='col-xs-12 margin-top-15'>
				<?php if (isset($results) && $results != FALSE): ?>
				<?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
					<div class='software hvr-grow'>
						<a href=<?php echo '.?view='.$results_prefix.'_details&swid='.$results->data[$i]['sw_id'] ?>>
							<div class='software-package drop-shadow border-grey'>

							<?php if ($results->data[$i]['sw_advertise'] != 1): ?>
								<div class='not-advertised'>
									<i class='fa fa-times text-grey'></i>
								</div>
							<?php endif ?>

							<?php if($results->data[$i]['sw_logo'] != ''): ?> 
								<img class="img-responsive" src=<?php echo $PATH['UPLOADS'].'sw_logo/'.$results->data[$i]['sw_logo']; ?>>
							<?php else: ?>
								<div class='software-tile-icon'>
									<i class=<?="'fa fa-cube text-".$results->data[$i]['type_color']."'" ?>></i>
								</div>
							<?php endif; ?>

							<?="<div class='overlay-upper-left hidden-xs text-grey bg-".$results->data[$i]['type_color']."'>" ?>
								<?php echo $results->data[$i]['type_name'] ?>
							</div>

							<?="<div class='overlay-bottom-all hidden-xs text-grey bg-".$results->data[$i]['type_color']."'>" ?>
								<?php echo $results->data[$i]['sw_name'] ?>
							</div>

							<?="<div class='overlay-upper-right hidden-xs text-grey bg-".$results->data[$i]['type_color']."'>" ?>
								<span class='text-grey'><?php echo $results->data[$i]['available_license'] ?></span>
							</div>
							
							<div class='overlay-right hidden-xs'>
								<?php include $PATH['INC'].'query_os.php'; ?>
								<?php while ($sub_row = $os->fetch_assoc()): ?>
									<?php 
										if($results->data[$i][$sub_row['os_key']] == 1){
											echo "<span title='".$sub_row['os_name']."'>".$sub_row['os_icon'].'</span><br>';
										}
									?>
								<?php endwhile; ?>
							</div>
						</div>
						</a>						
						<div class='col-xs-12 hidden-sm hidden-md hidden-lg software-label-small'>
							<strong><?php echo $results->data[$i]['sw_name'] ?></strong>
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