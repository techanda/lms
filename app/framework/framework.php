<body>
	<div id='gradient'></div>
<!-- =================== This Begins the Header =================== -->
	<header>
		<?php if ($view != 'login'): ?>
			<?php include $PATH['BLOCKS'].'block.header.php'; ?>
		<?php endif ?>
	</header>
<!-- =================== This Ends the Header =================== -->




			<?php if ($view != 'login'):?>
				<div class='master-container'>

					<?php include $PATH['VIEWS'].$view.'.php'; ?>

				</div>
			<?php else: ?>
				<?php include $PATH['VIEWS'].$view.'.php'; ?>
			<?php endif; ?>


			<!-- displays error modal if present-->
			<?php if (isset($_GET['submit_error']) && $_GET['submit_error'] != ''): ?>
				<script type="text/javascript">
					// loads the submitError modal
					$(window).load(function(){
						$('#submitError').modal('show');
					});
				</script>
			<?php endif ?>
			<!-- Universal Modals -->
			<!-- submitError -->
			<?php include $PATH['FRAMES'].'modal.error.php'; ?>
			<!-- Universal Modals -->
<!-- =================== This Begins the Footer =================== -->
	<footer>
		<?php if ($view != 'login'): ?>
			<center><p class='text-white'>Copyright &copy; 2016, Global Information Technology</p></center>
		<?php endif; ?>


		<script type="text/javascript">
			//Sets all modals to reset on close
			$('.modal').on('hidden.bs.modal', function(){
    		$(this).find('form')[0].reset();
			});

		// Scrolls page so that # anchor references are viewable due to fixed navbar
			var shiftWindow = function() { scrollBy(0, -80) };
			if (location.hash) shiftWindow();
				window.addEventListener("hashchange", shiftWindow);

			if(jQuery){
				$('.master-container').fadeIn(600);
			} else {
				masterContainers = document.querySelectorAll('.master-container');
				for (var i = masterContainers.length - 1; i >= 0; i--) {
					masterContainers[i].display('block');
				};
			}
				


		</script>

	</footer>
<!-- =================== This Ends the Footer =================== -->

</body>
