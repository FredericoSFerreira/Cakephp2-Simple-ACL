<?php echo $this->element('header');?>
<body>
	<div id="load"></div>
	<div class="app" style="display:none;">
	  	<div id="container" class="container-fluid">

	  		<div class="row">
          
          
          		<div class="view-container">
                  <section id="content" class="login">
                  		<section class="page-form-ele page">
				  			<?php echo $this->element('flash');?>
				  			<?php echo $this->fetch('content'); ?>
				  			<?php echo $this->element('sql_dump'); ?>
			  			</div>
			  	    </section>
			  	</div>
			</div>
	  	</div>
  	</div>
  <?php echo $this->element('footer');?>	
</body>
</html>
