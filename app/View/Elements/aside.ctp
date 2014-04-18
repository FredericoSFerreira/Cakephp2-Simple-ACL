<aside id="nav-container" class="ng-scope"><div id="nav-wrapper" class="ng-scope">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">

          <ul id="nav" class="ng-scope" style="overflow: hidden; width: auto; height: 100%;">

      <?php 
          if(!empty($actions_category)){
              
              foreach ($actions_category as $keyact => $action) { 

                $actual  = false;
                
                $funcionactual = str_replace("admin_", "", $funcionactual);

                $urlactual  = array('/admin/'.$controladoractual.'/'.$funcionactual.'/','/admin/'.$controladoractual.'/'.$funcionactual);
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