<?php 
	include $PATH['INC'].'query_license_info.php';
?>



<?php while($row = $licenses->fetch_assoc()): ?>
		<?php
			$license_id = $row['lic_id'];
			include $PATH['INC'].'query_one_software.php';
			$software_id = $sw_info['sw_id'];
		?>




	<?php  
	include $PATH['INC'].'query_one_software.php';
	include $PATH['INC'].'query_bus.php';
	include $PATH['INC'].'query_lic_type.php';
	include $PATH['INC'].'query_one_license.php';
	?>


	<div id= <?='editLicense_'.$license_id ?> class="modal fade" role="dialog">
	  <div class='modal-dialog modal-md'>
			<div class='detail-software-backdrop drop-shadow border-gold'>
				<div class='modal-bar bg-gold'>
	        View and Edit License Details
	        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
	      </div>
	      <div class='modal-container'>
	      	<div class='row'>
		      	<!-- Software Title -->
						<div class='col-xs-10'>
							<h3><?php echo $sw_info['sw_name'];?></h3> 
						</div>
						
						<!-- Software Title -->

						<!-- Edit Button -->
						<div class='col-xs-2'>
							<a class='btn btn-default btn-sm text-right' id='editToggle' href="#" onclick='toggleFormControls("editLicense");
																																									toggleTextContent("editToggle",
																																																		"Edit",
																																																		"Done");'>Edit</a>
						</div>
						<!-- Edit Button -->
	      	</div>


					<div class=''>

						<!-- Form -->
					<form id='editLicense' name='insert_new_license' method='post' action='action.php?method=edit_license'>
						<input type='hidden' name='insert_swid' value=<?php echo '"'.$software_id.'"'; ?>>
						<input type='hidden' name='request_uri' value=<?php echo '"'.$_SERVER['REQUEST_URI'].'"'; ?>>
						<input type='hidden' name='license_id' value=<?=$license_id; ?>>
						<input type='hidden' name='url_redirect' value=<?=$_SERVER['QUERY_STRING']; ?>>

						<div class='row'>
							<!-- License Type Input -->
							<div class='form-group col-sm-6'>
								<label for='lic_type'>License Type:</label>
								<select class='form-control' id='lic_type' name='insert_type'>
									<?php while ($row = $lic_type->fetch_assoc()): ?>
										<option <?php if($license_info['lic_lic_type'] == $row['lic_type_id']){echo " selected ";} ?>
										value=<?php echo $row['lic_type_id']; ?>><?php echo $row['lic_type_name']; ?></option>
									<?php endwhile; ?>
								</select>
							</div>
							<!-- License Type Input -->


							<!-- Business Unit Select -->
							<div class='form-group col-sm-6'>
								<label for='bu_select'>Company:</label>
									<select class='form-control' id='bu_select' name='insert_bu'>
										<?php while ($row = $bus->fetch_assoc()): ?>
											<option <?php if($license_info['lic_bu'] == $row['bu_id']){echo " selected ";} ?>
												value=<?php echo $row['bu_id']; ?>><?php echo $row['bu_name']; ?></option>
										<?php endwhile; ?>
									</select>
							</div>		
							<!-- Business Unit Select -->
						</div>


						<div class='row'>
							<!-- PO Number Input -->
							<div class='form-group col-sm-6'>
								<label for='po_number'>PO:</label>
								<input id='po_number' class='form-control' type='text' name='insert_po' placeholder='Enter PO/Reciept info...' value=<?=$license_info['lic_po'] ?>>
							</div>		
							<!-- PO Number Input -->

							<!-- Quantity -->
							<div class='form-group col-sm-6'>
								<label for='quantity'>Quantity:</label>
								<input id='quantity' class='form-control' type='number' name='insert_quantity' min='1' max='100' value='1' ?>
							</div>		
							<!-- Quantity -->
						</div>

						<div class='row'>
							<!-- Purchase Date-->
							<div class='form-group col-md-6'>
								<?php $purch_date = date('Y-m-d', strtotime($license_info['lic_purchdate'])); ?>
								<label for='purchase_date'>Purchase Date:</label>
								<input class='form-control' id='purchase_date' type='date' name='insert_purchase' value=<?=$purch_date ?>>
							</div>		
							<!-- Purchase Date -->


							<!-- Expiration Date -->
							<div class='form-group col-md-6'>
								<?php $expiration_date = date('Y-m-d', strtotime($license_info['lic_expdate'])); ?>
								<label for='expiration_date'>Expiration:</label>
								<input class='form-control' id='expiration_date' type='date' name='insert_exp' value=<?=$expiration_date ?>>
							</div>		
							<!-- Expiration Date -->
						</div>


						<!-- License Key -->
						<div id='license_info' class='form-group'>
							<label for='license_key'>License Key:</label>
							<textarea id='license_key' style='height:200px;' class='form-control'  name='insert_license' required><?=$license_info['lic_key'] ?></textarea>
						</div>		
						<!-- License Key -->


						<!-- Form Buttons -->
						<input type='submit' value='Update License Key' name='button_submit' class='btn btn-default'>
						<input type='button' value='Cancel' class='btn btn-default disable-immune' data-dismiss='modal'/>
						<!-- Form Buttons -->

					</form>
					<!-- Form -->
					<script type="text/javascript">toggleFormControls('editLicense');</script>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>



