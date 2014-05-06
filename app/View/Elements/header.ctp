<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic" rel="stylesheet" type="text/css">
	<title><?php echo $appconfig['name'];?></title>
	<?php
		echo $this->Minify->css(array('font-awesome.min','weather-icons.min','main','estilos'));
	?>
	<script type="text/javascript">
		var Controllers = new Array;
	</script>
</head>