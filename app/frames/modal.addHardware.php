<!--This is the window used for adding a new license -->
<?php 
include $PATH['INC'].'query_hw_type.php';
$mfg_type = '3'; // 3 is the 'button_id' of the type in lms_product_type table for hardware
include $PATH['INC'].'query_mfg_by_product_type.php';
?>

<div id="addHardware" class="modal fade" role="dialog">
  <div class='modal-dialog modal-md'>
						

 		<div class='detail-software-backdrop drop-shadow-big border-gold'>
			<div class='modal-bar bg-gold'>
				Add New Hardware
				<div class='text-right upper-cancel'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
			</div>
			<div class='modal-container'>

					<form id='newHardware' name='insert_new_hardware' method='post' action='action.php?method=add_new_hardware' enctype="multipart/form-data">
							<input type="hidden" name="folder_path" value="hw_img"> <!-- used to set folder to upload to -->
				    	<input type="hidden" name="image_type" value="1">			<!-- used to set the image type 1-brew 2-beer type -->
							<input type='hidden' name='url_redirect' value=<?=$_SERVER['QUERY_STRING']; ?>>
							<input type='hidden' id='app_override'>


							<!-- Advertise -->

							<div class='form-group text-right'>
								<label for='app_advertise'>Advertise</label>
								<input name='sw_advertise' id='app_advertise' type='checkbox' value='1'>
							</div>

							<!-- Advertise -->


							<!-- Hardware Name -->
							<div class='form-group'>
								<label for='app_name'>Name:</label>
								<input id='app_name' class='form-control' type='text' name='insert_name' placeholder='Enter Hardware Name...' required>
							</div>		
							<!-- Hardware Name -->

							<div class='row'>


								<!-- Hardware Manufacturer -->
								<div class='form-group col-sm-6'>
									<label for='app_mfg'>Manufacturer:</label>
									<select id='app_mfg' class='form-control' name='insert_mfg' required>
										<?php while ($row = $mfg->fetch_assoc()): ?>
											<option value=<?php echo $row['mfg_id']; ?>><?php echo $row['mfg_name']; ?></option>
										<?php endwhile; ?>
									</select>
								</div>		
								<!-- Hardware Manufacturer -->

								<!-- Hardware Type -->
								<div class='form-group col-sm-6'>
									<label for='hw_type'>Type: </label>
									<select id='hw_type' class='form-control' name='insert_type' required>
										<?php while ($row = $hw_type->fetch_assoc()): ?>
											<?php if($row['hw_type_id'] != 9999): ?>
												<option value=<?php echo $row['hw_type_id']; ?>><?php echo $row['hw_type_name']; ?></option>
											<?php endif; ?>
										<?php endwhile; ?>
									</select>
								</div>		
								<!-- Hardware Type -->

							</div>


          <!-- Upload Image -->
          	<?php formImageUpload('addHardware',FALSE); ?>
          <!-- Upload Image -->


							<!-- Description -->
							<div class='form-group'>
								<label for='app_desc'>Description:</label>
								<textarea style='height:220px;' id='app_desc' class='form-control tinymce-textarea' placeholder='Enter the description here...' name='insert_desc' ></textarea>
							</div>		
							<!-- Description -->


							<input type='submit' class='btn btn-default' value='Add Hardware' name='submit'>
							<input type='button' class='btn btn-default cancel-button' value='Cancel' data-dismiss='modal' />				
					</form>

			</div>
		</div>
	</div>
</div>

