<?php
    $actionmultipleselect=array('admin_delete');
    $actionlocate = array('admin_delete','admin_edit');
    $headerstitles = array(
                            'Module.id' => '#',
                            'Module.name' => 'Nombre',
                            'Module.order' => 'Orden');

    $this->Viewbase->set('action', $action);
    $this->Viewbase->set('actionmultipleselect', $actionmultipleselect);
    $this->Viewbase->set('actionlocate', $actionlocate);
?>

<section class="panel panel-default">
    <?php  $this->Viewbase->panel_title('Listado de Modulos');   ?>
  
    <div class="panel-body">
         <?php include_once('filter.ctp'); 
            $this->Viewbase->Multi_form_create($this->form,'#');
           ?>
        <table class="table table-bordered">
            <?php
                // Encabezado de la tabla
                $this->Viewbase->table_Header($this->Paginator,$headerstitles);
            ?>      
            <tbody>
                <?php foreach ($lists as $list): ?>
                <tr>
                        <?php
                        // Campo check de cada linea
                        $datarow=array(
                            'idModel' => $list['Module']['id'],
                            'textname' => $list['Module']['name'],
                            'inputname'=> 'data[Module][id][]',
                            'value' => $list['Module']['id']
                        );
                        $this->Viewbase->Multi_check_row($datarow);
                        // Campo check de cada linea
                    ?>

                    <td style="width: 10px;"><?php echo h($list['Module']['id']); ?>&nbsp;</td>
                    <td><?php echo h($list['Module']['name']); ?>&nbsp;</td>
                    <td><?php echo h($list['Module']['order']); ?>&nbsp;</td>
                   
                    <?php 
                    if(in_array($action, $actionlocate)){  
                    ?>  
                     <td class="actions">
                            
                        <?php 

                        if($action == "admin_edit"){
                        $databutton_edit = array(
                                'url'=> '/admin/modules/edit/'.$list['Module']['id']
                            );
                            $this->Viewbase->button_edit($this->Html,$databutton_edit);
                        }

                         if($action == "admin_delete"){
                        $databutton_delete = array(
                                'url'=> '/admin/modules/delete/'.$list['Module']['id'],
                                'idModel' =>$list['Module']['id']
                            );
                            $this->Viewbase->button_delete($this->Html,$databutton_delete);
                        }

                        ?>
                    </td>
                    <?php } ?>
        	   </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
           <?php
            if(in_array($action, $actionmultipleselect)){ 
        ?>
        <div class="checkalldiv">
            <script>
                checkalltext = {
                    'empty' : {
                        'title' : 'Advertencia',
                        'text' : 'Debe seleccionar al menos un modulo para utilizar la opción sobre multiples registros'
                    },
                    'deleteall' :{
                        'title' : 'Confirmación para eliminar multiples registros',
                        'url' : '/admin/modules/deletemulti/',
                        'pretext' : 'Estas seguro que deseas eliminar los siguientes registros?'
                    } 
                };
            </script>
            <img class="selectallarrow" src="/img/arrow_ltr.png" width="38" height="22" alt="With selected:">
            <input type="checkbox" class="checkallclick" title="Check All">
            <label for="checkall">Check All</label> 
            <select id="selectmulti" name="submit_mult" class="autosubmit" style="margin-left:10px;">
                <option value="0" selected="selected">With selected:</option>
                <option value="deleteall">Delete All</option>
            </select>
        </div>
        <?php echo $this->Form->end(); ?>
        <?php } ?>
        <?php echo $this->element('paginado'); ?>
    </div>
</section>
 <?php if($action == "admin_index"){ ?>
 <script type="text/javascript">
    Controllers.push("Modules.index");
</script>
<?php } ?>