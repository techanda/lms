<?php include $PATH['INC'].'query_license_info.php'; ?>


<?php while($row = $licenses->fetch_assoc()): ?>

	<?php
		$license_id = $row['lic_id'];
		$license_key = $row['lic_key'];
		include $PATH['INC'].'query_one_software.php';
		$software_id = $sw_info['sw_id'];
		$software_name = $sw_info['sw_name'];
	?>

	<?php if(login_check() >= 999): ?>


		<div id= <?='assignLicense_'.$license_id ?> class="modal fade" role="dialog">
		  <div class='modal-dialog modal-md'>
					<div class='detail-software-backdrop border-gold'>
						<div class='modal-bar bg-gold'>
        			Assign License to a User
        		<div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
     		 	</div>

      		<div class='modal-container'>
      			Assign <?php echo $sw_info['sw_name'] ?> license to:
						<form method='post' action='action.php?method=assign_license'>
							<input type='hidden' name='lic_id' value=<?php echo "'".$license_id."'" ?>>
							<input type='hidden' name='sw_id' value=<?php echo "'".$software_id."'" ?>>
							<input type='hidden' name='sw_name' value=<?php echo "'".$software_name."'" ?>>
							<input type='hidden' name='lic_key' value=<?php echo "'".$license_key."'" ?>>
							<input type='hidden' name='url_redirect' value=<?=$_SERVER['QUERY_STRING']; ?>>


							<!-- Send Email -->
							<div class='form-group text-right'>
								<label for='send_email'>Email User:</label>
								<input name='send_email' id='send_email' type='checkbox' value='1' checked>
							</div>
							<!-- Send Email -->

							<!-- Domain User Name -->
							<div class='form-group'>
								<input class='form-control' id='user' type='text' name='insert_name' placeholder="Enter domain username" autofocus>
							</div>
							<!-- Domain User Name -->

							<!-- Technician Message -->
							<div class='form-group'>
	              <label>Message to User:</label>
	              <textarea class='form-control tinymce-textarea' style='height:300px;' name='tech_message'></textarea>
          		</div>
          		<!-- Technician Message -->

							<!-- Buttons -->
							<center>
								<input class='btn btn-default' type='submit' value='Assign License'>
								<input type='button' class='btn btn-default' value='Cancel' data-dismiss='modal' />
							</center>
							<!-- Buttons -->
						</form>
					</div>
					</div>
				</div>
			</div>
	<?php endif; ?>

<?php endwhile;?>

