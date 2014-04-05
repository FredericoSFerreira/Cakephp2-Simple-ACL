<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema</title>
	<?php
		echo $this->Html->css(array('bootstrap.min', 'estilos'));
		echo $this->Html->script(array('jquery-1.11.0.min','bootstrap.min'));
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>