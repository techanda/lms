<!--This is the window used for adding a new license -->
<?php 
$software_id = $_GET['swid'];
include $PATH['INC'].'query_type.php';
include $PATH['INC'].'query_mfg.php';
include $PATH['INC'].'query_one_software.php';
?>

<div id="editApplication" class="modal fade" role="dialog">
  <div class='modal-dialog modal-lg'>
		<div class='detail-software-backdrop drop-shadow-big border-gold'>

			<div class='modal-bar bg-gold'>
        Edit Application Information
        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'>


				<div class=''>


				<form name='insert_new_license' method='post' action='action.php?method=modify_application' enctype="multipart/form-data">
						<input type='hidden' name='url_redirect' value=<?=$_SERVER['QUERY_STRING']; ?>>
						<input type='hidden' name='software_id' value=<?=$software_id;?>>	

							<!-- Advertise -->

							<div class='form-group text-right'>
								<label for='app_advertise'>Advertise</label>
								<input name='sw_advertise' id='app_advertise' type='checkbox' <?php if($sw_info['sw_advertise'] == '1'){echo " checked ";} ?> value="1">
							</div>

							<!-- Advertise -->

						<!-- Application Name -->
						<div class='form-group'>
							<label for='app_name'>Name:</label>
							<input id='app_name' class='form-control' type='text' name='insert_name' placeholder='Enter Application Name...'
							value=<?= "'".$sw_info['sw_name']."'"; ?> required>
						</div>		
						<!-- Application Name -->

						<div class='row'>

							<!-- Application Manufacturer -->
							<div class='form-group col-sm-6'>
								<label for='app_mfg'>Manufacturer:</label>
								<select id='app_mfg' class='form-control' name='insert_mfg' required>
									<?php while ($row = $mfg->fetch_assoc()): ?>
										<option value=<?php echo $row['mfg_id']; if($sw_info['sw_mfg'] == $row['mfg_id']){echo " selected ";} ?>>
											<?php echo $row['mfg_name']; ?></option>
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
											<option value=<?php echo $row['type_id']; if($sw_info['sw_type'] == $row['type_id']){echo " selected ";} ?>>
												<?php echo $row['type_name']; ?></option>
										<?php endif; ?>
									<?php endwhile; ?>
								</select>
							</div>		
							<!-- Application Type -->

						</div>


						<!--  -->
						<div class='form-group'>
							<label>Compatability</label>
							<ul class='list-unstyled'>
								<li><input type="checkbox" name="os_windows" <?php if($sw_info['sw_os_windows'] == '1'){echo " checked ";} ?> value="1"> Windows</li>
								<li><input type="checkbox" name="os_osx" <?php if($sw_info['sw_os_osx'] == '1'){echo " checked ";} ?> value="1"> OS X</span></li>
								<li><input type="checkbox" name="os_linux" <?php if($sw_info['sw_os_linux'] == '1'){echo " checked ";} ?> value="1"> Linux</li>
							</ul>
						</div>		
						<!--  -->


						<!--  -->
						<div class='form-group'>
							<label for='app_desc'>Description:</label>
							<textarea rows='8' id='app_desc' class='form-control tinymce-textarea' style='height:200px;' name='insert_desc' required><?= $sw_info['sw_desc']; ?></textarea>
						</div>		
						<!--  -->


								<input type='submit' class='btn btn-default' value='Update Application' name='submit'>
								<input type='button' class='btn btn-default' value='Cancel' data-dismiss='modal' />
				</form>


				</div>
			</div>
		</div>
	</div>
</div>
