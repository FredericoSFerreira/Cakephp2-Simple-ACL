<div>
    <table>
        <tr>
            <th># | Parent</th>
            <th>Access</th>
            <?php foreach($groups as $group){ ?>
                <th><?php echo $group['Group']['name']; ?></th>
            <?php } ?>     
        </tr>
        <?php 
        $i=0;
        $anterior = '';
        $anteriorshow='';
        $anteriorparent='';
        $parenttrue= array();
        foreach($acos as $aco){ 
            
            if($i == 0){
                $anterior = $aco['Aco']['id'];
            }else{
                
                if ($aco['Aco']['parent_id'] == $anterior){
                    $anteriorshow .= '--';
                }else{
                    
                    if($aco['Aco']['parent_id'] != $anteriorparent){
                        $anteriorshow = '-';
                    }
                }
                
                $anterior = $aco['Aco']['id'];
                $anteriorparent = $aco['Aco']['parent_id'];
            }
            $i++;
        ?>
        <tr>
            <td><?php echo $aco['Aco']['id']; ?> | <?php echo $aco['Aco']['parent_id']; ?></td>
            <td><?php echo $anteriorshow.' '.$aco['Aco']['alias']; ?></td>
            <?php 
            
            foreach($groups as $group){ 
                
              $groupid = $group['Group']['id'];
              $acoid =$aco['Aco']['id'];
              $acoparent = $aco['Aco']['parent_id'];
              $permisionid =' ';
            
              $access = 0;
              if((isset($parenttrue[$groupid]['aco']))&&(isset($parenttrue[$groupid]['acoparent-'.$acoparent]))){
                  if(($parenttrue[$groupid]['aco'] == $acoparent)||($parenttrue[$groupid]['acoparent-'.$acoparent] ==1)){
                    $parenttrue[$groupid]['aco']= $acoid;
                    $parenttrue[$groupid]['acoparent-'.$acoid]=1;
                    $access = 1;
                  }
              }
 
              if(isset($accessgroup[$groupid][$acoid])){
                $permisionid = $accessgroup[$groupid]['idpermission-'.$acoid];
                if($accessgroup[$groupid][$acoid] == 1){
                    $parenttrue[$groupid]['aco']= $acoid;
                    $parenttrue[$groupid]['acoparent-'.$acoid]=1;
                    $access = 1;
                }else{
                    $access = 0;
                }
              } 
            ?>
                <td><?php 
                    $url = '/users/acladmin/'.$access.'/'.$group['Aros']['id'].'/'.$acoid.'/'.$permisionid;
                    if($access){
                        echo $this->Html->link(_('Disabled'), $url, array('class' => 'button'));
                    }else{
                        echo $this->Html->link(_('Enabled'), $url, array('class' => 'button'));
                    }
                    ?></td>
            <?php } ?> 
        </tr>
        <?php } ?>
         
    </table>
</div>