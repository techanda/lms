<?php 
	$software_id = $_GET['swid'];
	include $PATH['INC'].'query_one_software.php';
	include $PATH['INC'].'query_license_info.php';
	include $PATH['INC'].'query_os.php';
	include $PATH['INC'].'query_bus.php';



	/*This section sets the Session variables to pass to pop-up windows */
	$_SESSION['software_id'] = $software_id;

	//Checks if a user is logged in and checks for already having a license for current program
	if (login_check()) {
		include $PATH['INC'].'license_check.php';
	} else {
		$license_check_count = 0;
	}	

?>
<div class='container transparent-container'> <!--Master container  -->
	<div class='row'> 

	<!-- loads the common detail code block for back & admin/user view bar -->
	<?php include $PATH['BLOCKS'].'block.backViewRow.php'; ?>

	<!-- loads the common detail code block for software details -->
	<?php include $PATH['BLOCKS'].'block.softwareDetailTop.php'; ?>
		

		<!-- Request Software-->
		<?php 
			if (login_check()) {
				$subject = urlencode('Software Request: '.$sw_info['sw_name']);
				$description = urlencode('PLEASE SELECT AN APPROPRIATE TICKET TIME.').
				"%0D%0A%0D%0A%0D%0A====================%0D%0A".
				urlencode("User: ".$_SESSION['given_name']." ".$_SESSION['surname'])."%0D%0A".
				urlencode("Software Name: ".$sw_info['sw_name'])."%0D%0A".
				urlencode('Software URL: '.$lms_path."?view=sw_details&swid=".$software_id).
				"%0D%0A====================%0D%0A"."%0D%0A".
				urlencode("---- Put Additional Notes Below Here ----");
			}
		?>

				
			
			<div class='row'><!-- Row -->
				<div class='col-sm-9 col-sm-offset-3'>
					<div class='detail-software-backdrop drop-shadow border-grey'>
						<div class='col-sm-8 col-sm-offset-2 '>
							<center>
								<?php if ($sw_info['sw_advertise'] != 1): ?>
									<h3>Oops!  It looks like this application is not available.</h3>
									<p>
										It is possible that this application is outdated or there are not currently licenses available.  Please take a look 
										at the available software to see if there is an application that fits your needs.
									</p>
								<?php else: ?>
									<?php if ($license_check_count < 1): ?>
										<h3>Request Application</h3>  
										<p>
											If you would like to request a license or this application, please place a ticket with the GlobalIT team.  Click the following button to open a prefilled request form.
										</p>
										<br>
										<br>
										<?php if(login_check()): ?>
											<a target="_blank" class='text-pink btn btn-default btn-lg' href=<?="http://employees.informmedia.com/help/ticket/new.asp?cid=848&Subject=".$subject."&Body=".$description ?>>Request This App</a>
										<?php else: ?>
											<h4>You must <a class='text-pink' href=".?view=login">Log In</a> to Request Software</h4>
										<?php endif; ?>
										<br>
										<br>
									<?php else: ?>
										<h3>You already have this license assigned to you.</h3>  
										<p>
											If you would like to see all assigned license, click the following button.
										</p>
										<br>
										<br>
											<a class='text-pink btn btn-default btn-lg' href=".?view=user_details">Your Assigned License</a>
										<br>
										<br>
									<?php endif; ?>
								<?php endif ?>
							</center>
						</div>
					</div>
				</div>
			</div> <!-- Row -->
		<!-- Request Software-->


</div>
</div>










	



		<!-- <a href=<?php echo "popup.php?frame=new_license" ?> onclick="centeredPopup(this.href,'new_license','600','650','yes');return false">Add License Key</a> -->


	