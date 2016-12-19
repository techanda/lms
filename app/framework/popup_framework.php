<?php if(isset($_GET['frame'])){$frame=$_GET['frame'];} ?>



	<body>
		<?php if(isset($_GET['frame'])){include $PATH['FRAMES'].$frame.'.php';} ?>
		<script>window.onunload = refreshParent;</script>
	</body>
