<!--This is the window used for adding a new license -->
<?php  
$software_id = $_SESSION['software_id'];
include $PATH['INC'].'query_one_software.php';
include $PATH['INC'].'query_bus.php';
include $PATH['INC'].'query_lic_type.php';
?>


<div id="newLicense" class="modal fade" role="dialog">
  <div class='modal-dialog modal-md'>
		<div class='detail-software-backdrop drop-shadow-big border-gold'>
			<div class='modal-bar bg-gold'>
        Add a New License
        <div class='text-right'><a class='text-grey' href="#" data-dismiss='modal'><i class="fa fa-times-circle"></i></a></div>
      </div>
      <div class='modal-container'></div>
				<h3><?php echo $sw_info['sw_name']; ?></h3> <!-- Software Title -->
				<div class=''>
					<!-- Form -->
				<form name='insert_new_license' method='post' action='action.php?method=add_new_license'>
					<input type='hidden' name='insert_swid' value=<?php echo '"'.$software_id.'"'; ?>>
					<input type='hidden' name='request_uri' value=<?php echo '"'.$_SERVER['REQUEST_URI'].'"'; ?>>
					<input type='hidden' name='url_redirect' value=<?=$_SERVER['QUERY_STRING']; ?>>
					<div class='row'>
						<!-- License Type Input -->
						<div class='form-group col-sm-6'>
							<label for='lic_type'>License Type:</label>
							<select class='form-control' id='lic_type' name='insert_type' required>
								<?php while ($row = $lic_type->fetch_assoc()): ?>
									<option value=<?php echo $row['lic_type_id']; ?>><?php echo $row['lic_type_name']; ?></option>
								<?php endwhile; ?>
							</select>
						</div>
						<!-- License Type Input -->


						<!-- Business Unit Select -->
						<div class='form-group col-sm-6'>
							<label for='bu_select'>Company:</label>
								<select class='form-control' id='bu_select' name='insert_bu' required>
									<?php while ($row = $bus->fetch_assoc()): ?>
										<option value=<?php echo $row['bu_id']; ?>><?php echo $row['bu_name']; ?></option>
									<?php endwhile; ?>
								</select>
						</div>		
						<!-- Business Unit Select -->
					</div>
					<div class='row'>
						<!-- PO Number Input -->
						<div class='form-group col-sm-6'>
							<label for='po_number'>PO:</label>
							<input id='po_number' class='form-control' type='text' name='insert_po' placeholder='Enter PO/Reciept info...'>
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
							<label for='purchase_date'>Purchase Date:</label>
							<input class='form-control' id='purchase_date' type='date' name='insert_purchase'>
						</div>		
						<!-- Purchase Date -->


						<!-- Expiration Date -->
						<div class='form-group col-md-6'>
							<label for='experation_date'>Expiration:</label>
							<input class='form-control' id='experation_date' type='date' name='insert_exp'>
						</div>		
						<!-- Expiration Date -->
					</div>


					<!-- License Key -->
					<div class='form-group'>
						<label for='license_key'>License Key:</label>
						<textarea id='license_key' style='height:200px;' class='form-control'  name='insert_license' required></textarea>
					</div>		
					<!-- License Key -->


					<!-- Form Buttons -->
					<input type='submit' value='Add License Key' name='button_submit' class='btn btn-default'>
					<input type='button' value='Cancel' class='btn btn-default' data-dismiss='modal'/>
					<!-- Form Buttons -->


				</form>
				<!-- Form -->


				</div>
			</div>
		</div>
	</div>
</div>




