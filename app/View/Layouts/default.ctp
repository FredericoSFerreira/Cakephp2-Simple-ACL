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
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sistema <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Grupos</a></li>
              <li><a href="#">Usuarios</a></li>
              <li class="divider"></li>
              <li><a href="#">Modulos</a></li>
              <li><a href="#">Categorias</a></li>
              <li><a href="#">Funciones</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/users/logout">Cerrar Sesión</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
      </div>
    </div>

	<div id="container">
			
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="/groups/index">Listar Grupos</a></li>
            <li><a href="/groups/add">Agregar Grupos</a></li>
            <li><a href="/groups/edit">Editar Grupos</a></li>
            <li><a href="/groups/delete">Eliminar Grupos</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php echo $this->element('flash');?>
          <?php echo $this->fetch('content'); ?>
          <?php echo $this->element('sql_dump'); ?>
        </div>
      </div>


			
			
			
	</div>
	
</body>
</html>
