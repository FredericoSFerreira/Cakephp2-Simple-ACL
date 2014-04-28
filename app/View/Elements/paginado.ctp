<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, Mostrando {:current} registro(s) de {:count} en total')
	));
	?>	</p>

    <ul class="pagination">
        <li class='recordsforpage'>
            <p><?php echo __('Registros por página'); ?></p>
            <select name="recordsforpage" id="recordsforpage">
                 <?php foreach ($optionsrecors as $key => $value) { ?>
                 <option value="<?php echo $value;?>" <?php if($value == $recordsforpage){?>selected<?}?>>
                    <?php echo $value;?>
                </option>
                 <?php } ?>
            </select>
        </li>
            <?php
                echo $this->Paginator->prev(__('Anterior'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Siguiente'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
     </ul>