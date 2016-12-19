
<?php 
	include $PATH['INC'].'query_license_info.php';
?>



<?php while($row = $licenses->fetch_assoc()): ?>
	<?php
		$license_id = $row['lic_id'];
		include $PATH['INC'].'query_one_software.php';
		$software_id = $sw_info['sw_id'];
	?>

	<div id= <?='deleteConfirm_'.$license_id ?> class="modal fade vert-align" role="dialog">
	  <div class='modal-dialog modal-md'>
			<div class='detail-software-backdrop drop-shadow-big border-gold'>

				<div class='modal-bar bg-gold'>
        	Delete License Key
        	<div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
     		</div>
      	<div class='modal-container'>
					<p>Are you sure you want to delete this license from <strong><?php echo $sw_info['sw_name'];?></strong>?</p>

					<form name='confirm_action' method='post' action='action.php?method=delete_license'>
						<input type='hidden' name='url_redirect' value=<?=$_SERVER['QUERY_STRING']; ?>>
						<input type='hidden' name='license_id' value=<?=$license_id; ?>>
						<input type='hidden' name='sw_id' value=<?php echo "'".$software_id."'" ?>>
						<center>
							<input type='submit' class='btn btn-default' value='Okay' />
							<input type='button' class='btn btn-default' value='Cancel' data-dismiss='modal' />
					</center>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>





	
