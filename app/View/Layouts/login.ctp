<?php echo $this->element('header');?>
<body>
	<div class="app">
  	<div id="container" class="container-fluid">
  			<?php echo $this->element('flash');?>
  			<?php echo $this->fetch('content'); ?>
  			<?php echo $this->element('sql_dump'); ?>
  	</div>
  </div>
  <?php echo $this->element('footer');?>	
</body>
</html>
