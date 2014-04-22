<div class="navbar navbar-fixed-top navbar-blue" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><?php echo $appconfig['name'];?></a>
      </div>

      <?php if(isset($header_menu)){ ?>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul  class="nav navbar-nav" >
                  <li class="dropdown">
                    
                    <?php
                       foreach ($header_menu as $keymenu => $modules) {

                          foreach ($modules as $keymod => $module) {
                    ?>
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo $module['name']; ?><b class="caret"></b>
                              </a>
                                
                              <ul class="dropdown-menu">

                                <?php foreach ($module['categories'] as $keycat => $categories) {?>
                                  <li>
                                    <a href="/admin/users/home/<?php echo $categories["id"];?>">
                                      <?php echo $categories['name'];?>
                                    </a>
                                  </li>
                                <?php } ?>
                              </ul>
                           
                    <?php } ?>
                  <?php } ?>
                  </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="/admin/users/logout"><?php echo __("User_logout");?></a></li>
                </ul>
      </div><!-- /.navbar-collapse -->
      <?php } ?>

  </div>
</div>