<!--This is the window used for adding a new license -->
<?php 
include $PATH['INC'].'query_type.php';
$mfg_type = '2'; // 2 is the 'button_id' of the type in lms_product_type table for software
include $PATH['INC'].'query_mfg_by_product_type.php';
?>

<div id="newApplication" class="modal fade" role="dialog">
  <div class='modal-dialog modal-lg'>
						

 		<div class='detail-software-backdrop drop-shadow-big border-gold'>
			<div class='modal-bar bg-gold'>
				Add a New Application
				<div class='text-right upper-cancel'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
			</div>
			<div class='modal-container'>

					<form id='newApplication' name='insert_new_application' method='post' action='action.php?method=add_new_application' enctype="multipart/form-data">
							<input type="hidden" name="folder_path" value="sw_logo"> <!-- used to set folder to upload to -->
				    	<input type="hidden" name="image_type" value="1">			<!-- used to set the image type 1-brew 2-beer type -->
							<input type='hidden' name='url_redirect' value=<?=$_SERVER['QUERY_STRING']; ?>>
							<input type='hidden' id='app_override'>


							<!-- Advertise -->

							<div class='form-group text-right'>
								<label for='app_advertise'>Advertise</label>
								<input name='sw_advertise' id='app_advertise' type='checkbox' value='1'>
							</div>

							<!-- Advertise -->


							<!-- Application Name -->
							<div class='form-group'>
								<label for='app_name'>Name:</label>
								<input id='app_name' class='form-control' type='text' name='insert_name' placeholder='Enter Application Name...' required>
							</div>		
							<!-- Application Name -->

							<div class='row'>


								<!-- Application Manufacturer -->
								<div class='form-group col-sm-6'>
									<label for='app_mfg'>Manufacturer:</label>
									<select id='app_mfg' class='form-control' name='insert_mfg' required>
										<?php while ($row = $mfg->fetch_assoc()): ?>
											<option value=<?php echo $row['mfg_id']; ?>><?php echo $row['mfg_name']; ?></option>
										<?php endwhile; ?>
									</select>
								</div>		
								<!-- Application Manufacturer -->

								<!-- Application Type -->
								<div class='form-group col-sm-6'>
									<label for='app_type'>Type: </label>
									<select id='app_type' class='form-control' name='insert_type' required>
										<?php while ($row = $type->fetch_assoc()): ?>
											<?php if($row['type_id'] != 9999): ?>
												<option value=<?php echo $row['type_id']; ?>><?php echo $row['type_name']; ?></option>
											<?php endif; ?>
										<?php endwhile; ?>
									</select>
								</div>		
								<!-- Application Type -->

							</div>


							<div class='row'>
								<div class='col-sm-8'>
		         		<!-- Upload Image -->
		          	<?php formImageUpload('newApplication',FALSE); ?>
		         		<!-- Upload Image -->
		         		</div>
		         		<div class='col-sm-4'>
								<!-- Operating Systems -->
								<div class='form-group'>
									<label>Compatability</label>
									<small>
										<ul class='list-unstyled'>
											<li><input type="checkbox" name="os_windows" value="1"> Windows</li>
											<li><input type="checkbox" name="os_osx" value="1"> OS X</span></li>
											<li><input type="checkbox" name="os_linux" value="1"> Linux</li>
										</ul>
									</small>
								</div>		
								<!-- Operating Systems -->
								</div>
          		</div>

							<!-- Description -->
							<div class='form-group'>
								<label for='app_desc'>Description:</label>
								<textarea style='height:180px;' id='app_desc' class='form-control tinymce-textarea' placeholder='Enter the description here...' name='insert_desc' ></textarea>
							</div>		
							<!-- Description -->


							<input type='submit' class='btn btn-default' value='Add Application' name='submit'>
							<input type='button' class='btn btn-default cancel-button' value='Cancel' data-dismiss='modal' />				
					</form>

			</div>
		</div>
	</div>
</div>

