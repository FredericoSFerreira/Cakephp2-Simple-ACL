<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic" rel="stylesheet" type="text/css">
	<title>Sistema</title>
	<?php
		echo $this->Html->css(array('font-awesome.min','weather-icons.min','main','estilos'));
		echo $this->Html->script(array('jquery-1.11.0.min','bootstrap.min'));
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>