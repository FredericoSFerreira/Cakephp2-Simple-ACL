<?php
	echo $this->Minify->script(array(
			'jquery-1.11.0.min',
			'bootstrap.min',
			'bootbox.min',
			'jquery.form.min',
			'Controllers/App',
			'Controllers/Users',
			'funciones',
			));
?>