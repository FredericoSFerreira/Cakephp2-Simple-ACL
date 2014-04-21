<?php echo $this->element('header');?>
<body>

  <div id="load"></div>
  <div class="app" style="display:none;">
  	
    <?php echo $this->element('menu'); ?>
        
  	<div id="container">
  			
      <div class="row">
          
          <?php echo $this->element('aside'); ?>
          <div class="view-container">
                  <section id="content">
                      <section class="page-form-ele page">
                        <?php echo $this->element('flash');?>
                        <?php echo $this->fetch('content'); ?>
                        <?php echo $this->element('sql_dump'); ?>
                      </section>
                  </section>
          </div>

      </div>
  	</div>
  </div>
<?php echo $this->element('footer');?>	
</body>
</html>
