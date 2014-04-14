<?php echo $this->element('header');?>
<body>

  <div class="app">
  	
    <?php echo $this->element('menu'); ?>
        
  	<div id="container">
  			
      <div class="row">
          
          <?php echo $this->element('aside'); ?>
          <div class="view-container">
                  <section data-ng-view="" id="content" class="animate-fade-up ng-scope">
                      <section class="page-form-ele page ng-scope">
                        <?php echo $this->element('flash');?>
                        <?php echo $this->fetch('content'); ?>
                        <?php echo $this->element('sql_dump'); ?>
                      </section>
                  </section>
          </div>

      </div>
  	</div>
  </div>
	
</body>
</html>
