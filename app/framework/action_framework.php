
<?php if(isset($_GET['method'])){$method=$_GET['method'];} ?>

<body>
	<?php if(isset($_GET['method'])){include $PATH['BIN'].$method.'.php';} ?>
</body>

