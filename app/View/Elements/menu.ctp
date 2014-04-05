<div>
    <h1>Menu</h1>
    <?php echo $this->Html->link('Home',array('controller' => 'users', 'action' => 'home')); ?>
    <?php echo $this->Html->link('Register User',array('controller' => 'users', 'action' => 'register')); ?>
    <?php echo $this->Html->link('Add Group',array('controller' => 'groups', 'action' => 'add')); ?>
    <?php echo $this->Html->link('InitDB',array('controller' => 'users', 'action' => 'initDB')); ?>
    <?php echo $this->Html->link('Acladmin',array('controller' => 'users', 'action' => 'acladmin')); ?>
    <?php echo $this->Html->link('Logout',array('controller' => 'users', 'action' => 'logout')); ?>
</div>