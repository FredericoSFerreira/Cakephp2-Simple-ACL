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
                              <a href="/users/home/<?php echo $categories["id"];?>">
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
            <li><a href="/users/logout">Cerrar Sesión</a></li>
          </ul>
</div><!-- /.navbar-collapse -->
<?php } ?>