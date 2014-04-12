<?php echo $this->element('header');?>
<body>
	
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AppName</a>
        </div>
        <?php echo $this->element('menu'); ?>
      </div>
    </div>

	<div id="container">
			
      <div class="row">
        

    <aside id="nav-container" class="ng-scope"><div id="nav-wrapper" class="ng-scope">
      <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">

        <ul id="nav" class="ng-scope" style="overflow: hidden; width: auto; height: 100%;">

    <?php 
        if(!empty($actions_category)){
            
            foreach ($actions_category as $keyact => $action) { 

              $actual  = false;
              
              $urlactual  = array('/'.$controladoractual.'/'.$funcionactual.'/','/'.$controladoractual.'/'.$funcionactual);
              if(!$actual){
                if(in_array($action["url"],$urlactual)){$actual = true;}
              }
 
            ?>
            <li <?php if($actual){ ?>class="active"<?php } ?>>
              <a href="<?php echo $action["url"]; ?>"> 
                <span><?php echo $action["name"]; ?></span> 
              </a>
            </li>    
  <?php }?>
      <?php }?>

        </ul>

        <div class="slimScrollBar" style="background-color: rgb(0, 0, 0); width: 7px; position: absolute; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; z-index: 99; right: 1px; top: 94px; height: 152.5225px; display: none; opacity: 0.4; background-position: initial initial; background-repeat: initial initial;"></div>
            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 7px; border-top-right-radius: 7px; border-bottom-right-radius: 7px; border-bottom-left-radius: 7px; background-color: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px; background-position: initial initial; background-repeat: initial initial;">
            </div>
        </div>
      </div>
    </aside>

        
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
	
</body>
</html>
