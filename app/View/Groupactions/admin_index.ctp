<?php
    $actionmultipleselect=array('admin_delete');
    $actionlocate = array('admin_delete','admin_edit');
    $headerstitles = array(
                            'Groupaction.id' => '#',
                            'Group.name' => 'Grupos',
                            'Action.name' => 'Funciones');

    $this->Viewbase->set('action', $action);
    $this->Viewbase->set('actionmultipleselect', $actionmultipleselect);
    $this->Viewbase->set('actionlocate', $actionlocate);
?>

<section class="panel panel-default">
    <?php  $this->Viewbase->panel_title('Listado de Permisos');   ?>

    <div class="panel-body">
    <?php 
            include_once('filter.ctp'); 
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
                        'idModel' => $list['Groupaction']['id'],
                        'textname' => $list['Group']['name'],
                        'inputname'=> 'data[Groupaction][id][]',
                        'value' => $list['Groupaction']['id']
                    );
                    $this->Viewbase->Multi_check_row($datarow);
                    // Campo check de cada linea
                ?>

            <td style="width: 10px;"><?php echo h($list['Groupaction']['id']); ?>&nbsp;</td>
            <td><?php echo h($list['Group']['name']); ?>&nbsp;</td>
            <td><?php echo h($list['Actions']['name']); ?>&nbsp;</td>
            <?php 
                    if(in_array($action, $actionlocate)){  
                    ?>  
                     <td class="actions">
                            
                        <?php 
                         if($action == "admin_delete"){
                          $databutton_delete = array(
                                'url'=> '/admin/groupactions/delete/'.$list['Groupaction']['id'],
                                'idModel' =>$list['Groupaction']['id']
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
                        'text' : 'Debe seleccionar al menos un Permiso para utilizar la opción sobre multiples registros'
                    },
                    'deleteall' :{
                        'title' : 'Confirmación para eliminar multiples registros',
                        'url' : '/admin/groupactions/deletemulti/',
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
    Controllers.push("Groupactions.index");
</script>
<?php } ?>