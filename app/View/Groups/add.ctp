
<section class="panel panel-default">
        <div class="panel-heading">
        	<strong>
        		<span class="glyphicon glyphicon-th"></span>
				Agregar Grupos
        	</strong>
        </div>
        <div class="panel-body">
	        <?php 
				echo $this->Form->create('Group', array('action' => 'add','class'=>'form-horizontal'));
			?>
			<div class="form-group">
			<?php
				echo $this->Form->input('name',array("label"=>"Nombre del Grupo","required"=>false,'class'=>'form-control'));
			?>
			</div>
			<?
			echo $this->Form->end(array('label'=>'Agregar','class'=>'btn btn-primary','type'=>'submit'));

			?>
        </div>
 </section>