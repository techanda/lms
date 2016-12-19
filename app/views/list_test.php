<?php 
//This section contains the includes necessary for view
include $PATH['INC'].'query_all_test.php';
include $PATH['INC'].'query_type.php';
include $PATH['INC'].'query_mfg.php';
include $PATH['INC'].'query_os.php';
?>

<div id='main_text'>
	<!--This section builds the filter buttons-->
	<div id='sw_list_toolbar'>

		<?php
			if(isset($_GET['type']) || isset($_GET['mfg']) || isset($_GET['os']) || isset($_GET['sort']))
			{
				echo "<span id='toolbar_filter'>Filters:</span>";
				echo "<div class='class_filter_button'>";
				echo		'<a href="?view=sw_list" class="remove_filter" >X</a>';
				echo'<b>Clear All</b>';	
				echo '</div>';
			}
			create_filter_button('type');
			create_filter_button('mfg');
			create_filter_button('os');
			create_filter_button('sort');
		?>	
		<div id='add_application'>
			<a class='add_application' href='popup.php?frame=add_application' onclick="centeredPopup(this.href,'myWindow','600px','650px','yes');return false"> 
				<table>
					<tr>
						<td>
							Add Application
						</td>
						<td>
							<img class='action_button' src=<?php echo $PATH['IMG'].'button_plus.png' ?> title='Add a New Application'>
						</td>
					</tr>
				</table>
			</a>
		</div>
	</div>

	<table id='software_list'>
		<tr> <!--This is the table header section-->
			<th id='blank'><!--This is an empty cell --></th>
			<th id='type'>
				<div id='cssmenu'>
				   <li class='has-sub'><a href=<?php echo toggle_sort('type_name'); ?>>
				   	<span>
				   		Type
				   		<?php if (isset($_GET['sort']) && $_GET['sort'] == 'type_name' && isset($_GET['asc']) && $_GET['asc'] == 'true'){echo '&#9660';} ?>
				   		<?php if (isset($_GET['sort']) && $_GET['sort'] == 'type_name' && !isset($_GET['asc'])){echo '&#9650';} ?>
				   	</span>
				   </a>
				      <ul>
				      	<?php while($row = $type->fetch_assoc()): ?>
				      		<?php $updated_sort_url = remove_querystring_var($_SERVER['REQUEST_URI'],"type"); ?>
				         	<li>
				         		<a href=<?php echo $updated_sort_url.'&type='.urlencode($row['type_name']) ?>>
				         			<span><?php echo $row['type_name'] ?></span>
				         		</a>
				         	</li>
				        <?php endwhile; ?>
				      </ul>
				   </li>
				</div>
			</th>
			<th id='mfg'>
				<div id='cssmenu'>
				   <li class='has-sub'><a href=<?php echo toggle_sort('mfg_name')?>>
				   	<span>
				   		Manufacturer
				   		<?php if (isset($_GET['sort']) && $_GET['sort'] == 'mfg_name' && isset($_GET['asc']) && $_GET['asc'] == 'true'){echo '&#9660';} ?>
				   		<?php if (isset($_GET['sort']) && $_GET['sort'] == 'mfg_name' && !isset($_GET['asc'])){echo '&#9650';} ?>
				   	</span>
				   </a>
				      <ul>
				      	<?php while($row = $mfg->fetch_assoc()): ?>
				      		<?php $updated_sort_url = remove_querystring_var($_SERVER['REQUEST_URI'],"mfg"); ?>
				         	<li>
				         		<a href=<?php echo $updated_sort_url.'&mfg='.urlencode($row['mfg_name']) ?>>
				         			<span><?php echo $row['mfg_name'] ?></span>
				         		</a>
				         	</li>
				        <?php endwhile; ?>
				      </ul>
				   </li>
				</div>
			</th>
			<th id='apps'>
				<div id='cssmenu'>
				   <li class='has-sub'><a href=<?php echo toggle_sort('sw_name');?>>
				   	<span>
				   		Applications 
				   		<?php if (isset($_GET['sort']) && $_GET['sort'] == 'sw_name' && isset($_GET['asc']) && $_GET['asc'] == 'true'){echo '&#9660';} ?>
				   		<?php if (isset($_GET['sort']) && $_GET['sort'] == 'sw_name' && !isset($_GET['asc'])){echo '&#9650';} ?>
				   	</span>
				   </a>
				</div>
			</th>
			<th id='os'>
				<div id='cssmenu'>
				   <li class='has-sub'><a href='#'><span>Operating Systems</span></a>
				      <ul>
				      	<?php while($row = $os->fetch_assoc()): ?>
				      		<?php $updated_sort_url = remove_querystring_var($_SERVER['REQUEST_URI'],"os"); ?>
				         	<li>
				         		<a href=<?php echo $updated_sort_url.'&os='.urlencode($row['os_name']) ?>>
				         			<span><?php echo $row['os_name'] ?></span>
				         		</a>
				         	</li>
				        <?php endwhile; ?>
				      </ul>
				   </li>
				</div>
			</th>
			<th class='lic_count'>
				<div id='cssmenu'>
				   <li class='inactive'><a href='#'><span>Total Licenses</span></a> </li>
				</div>
			</th>
			<th class='lic_count'>
				<div id='cssmenu'>
				   <li class='inactive'><a href='#'><span>Assigned Licenses</span></a> </li>
				</div>
			</th>
			<th class='lic_count'>
				<div id='cssmenu'>
				   <li class='inactive'><a href='#'><span>Available Licenses</span></a> </li>
				</div>
			</th>
		</tr> <!--The end of the table header section -->
		<?php $tr_color=1; ?>
		<?php if (isset($results) && $results != FALSE): ?>
			<?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
				<?php if($tr_color == 1): ?>
					<tr class='tr_grey'>
					<?php $tr_color=0; ?>
				<?php else: ?>
					<tr class='tr_white'>
					<?php $tr_color=1; ?>
				<?php endif; ?>

					<td class='mfg_logo'>
						<img class='mfg_logo' src=<?php echo $PATH['UPLOADS'].'/mfg_logo/'.$results->data[$i]['mfg_logo']; ?> >
					</td>
					<td class='td_left'><?php echo $results->data[$i]['type_name'] ?></td>
					<td class='td_left'><?php echo $results->data[$i]['mfg_name'] ?></td>
					<td class='td_left'>
						<a href=<?php echo '.?view=sw_details&swid='.$results->data[$i]['sw_id'] ?>> 
							<?php echo $results->data[$i]['sw_name'] ?>
						</a>
					</td>
					<td class='td_left'>
						<?php include $PATH['INC'].'query_os.php'; ?>
						<?php while ($sub_row = $os->fetch_assoc()): ?>
							<?php 
								if($row[$sub_row['os_key']] == 1){
									echo $sub_row['os_name'].'<br>';
								}
							?>
						<?php endwhile; ?>
					</td>
					<?php 
					$software_id = $results->data[$i]['sw_id'];
					include $PATH['INC'].'query_license_info.php'; 
					?>
					<td class='td_left'><?php echo $total_licenses ?></td>
					<td class='td_left'><?php echo $total_claimed_licenses ?></td>
					<td class='td_left'><?php echo $total_available_licenses ?></td>				
				</tr>
				</tr>
			<?php endfor; ?>
			</table>
		<?php else: ?>
			</table>
				<h3>No Results Found</h3>

		<?php endif; ?>
	
	<?php echo $Paginator->createLinks( $links, 'pagination pagination-sm' ); ?>
</div>



