
<?php 
	include $PATH['INC'].'query_license_info.php';
?>

<?php while($row = $licenses->fetch_assoc()): ?>
	<?php
		$license_key = $row['lic_key'];
		$license_id = $row['lic_id'];
		$license_user_samaccount = $row['lic_user_samaccount'];
		include $PATH['INC'].'query_one_software.php';
		$software_id = $sw_info['sw_id'];
		$software_name = $sw_info['sw_name'];
	?>
	<div id=<?='reclaimConfirm_'.$license_id ?> class="modal fade" role="dialog">
	  <div class='modal-dialog modal-md'>
			<div class='detail-software-backdrop drop-shadow-big border-gold'>

				<div class='modal-bar bg-gold'>
	        Reclaim this License Key
	        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
	      </div>
	      <div class='modal-container'>
						<p>Are you sure you want to reclaim this license from <strong><?= $row['lic_user'] ?></strong>?</p>
						<br>
						<form name='confirm_action' method='post' action='action.php?method=reclaim_license'>
							<input type='hidden' name='lic_id' value=<?php echo "'".$license_id."'" ?>>
							<input type='hidden' name='sw_id' value=<?php echo "'".$software_id."'" ?>>
							<input type='hidden' name='sw_name' value=<?php echo "'".$software_name."'" ?>>
							<input type='hidden' name='lic_key' value=<?php echo "'".$license_key."'" ?>>
							<input type='hidden' name='url_redirect' value=<?=$_SERVER['QUERY_STRING']; ?>>
							<input type='hidden' name='lic_user_samaccount' value=<?= $license_user_samaccount ?>>

							<!-- Send Email -->
							<div class='form-group text-right'>
								<label for='send_email'>Email User:</label>
								<input name='send_email' id='send_email' type='checkbox' value='1' checked>
							</div>
							<!-- Send Email -->
					


							<!-- Technician Message -->
							<div class='form-group'>
	              <label>Message to User:</label>
	              <textarea class='form-control tinymce-textarea' style='height:300px;' name='tech_message'></textarea>
          		</div>
          		<!-- Technician Message -->

						
							<input type='Submit' value='Reclaim License' class='btn btn-default' />
							<input type='button' value='Cancel' class='btn btn-default' data-dismiss='modal'/>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>
