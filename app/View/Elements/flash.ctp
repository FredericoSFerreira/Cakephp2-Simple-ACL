<?php 
        $messagestext = '';
        
        if ($this->Session->check('Message.flash')) {
            $messagestext.= $this->Session->flash();
        }
        if ($this->Session->check('Message.auth')){ 
            $text= $this->Session->flash('auth');
            $messagestext.= '<div id="multiFlash.0Message" class="alert alert-warning">'.$text.'</div>';
                
        }
        if ($messages = $this->Session->read('Message.multiFlash')) {
            foreach($messages as $k=>$v) {
                $messagestext.= $this->Session->flash('multiFlash.'.$k);
            }
        }

        if(!empty($messagestext)){
        ?>
        <div id="messages">
            <?php echo $messagestext; ?>    
        </div>
        <?php } ?>