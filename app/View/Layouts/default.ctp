<?php echo $this->element('header');?>
<body>
	<div id="container">
			
			<?php echo $this->element('flash');?>
			<?php echo $this->fetch('content'); ?>
			<?php echo $this->element('sql_dump'); ?>
	</div>
	
</body>
</html>
