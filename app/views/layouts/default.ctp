<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('style');	
	?>
	<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700,400italic&v2' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script>
		var BASE_URL = '<?php echo Configure::read('BASE_URL'); ?>';
	</script>
	<script src="<?php echo Configure::read('BASE_URL'); ?>lib/alerts.js"></script>
	<script src="<?php echo Configure::read('BASE_URL'); ?>lib/tableshorter.js"></script>
	<script src="<?php echo Configure::read('BASE_URL'); ?>lib/modal.js"></script>
	<script src="<?php echo Configure::read('BASE_URL'); ?>lib/script.js"></script>
	<script src="<?php echo Configure::read('BASE_URL'); ?>lib/export.js"></script>
	<script src="<?php echo Configure::read('BASE_URL'); ?>lib/import.js"></script>
	<script src="<?php echo Configure::read('BASE_URL'); ?>lib/tabs.js"></script>
	<script src="<?php echo Configure::read('BASE_URL'); ?>lib/tasks.js"></script>
</head>
<body>

    <div class="topbar">
      <div class="topbar-inner">
        <div class="container-fluid">
          <a class="brand" href="/plock">Plock</a>
          <ul class="nav">
            <li <?php if($active_menu == 'home'){ ?>class="active"<?php } ?>><?php echo $this->Html->link("Home","/") ?></li>
            <li <?php if($active_menu == 'clientes'){ ?>class="active"<?php } ?>><?php echo $this->Html->link("Clientes","/clientes") ?></li>
			<?php if($user['User']['role'] == 'admin' || $user['User']['role'] == 'manager' || $user['User']['role'] == 'developer') {?>
				<li <?php if($active_menu == 'servers'){ ?>class="active"<?php } ?>><?php echo $this->Html->link("Servidores","/servers"); ?></li>
			<?php } ?>
			<?php if($user['User']['role'] == 'admin'){?>
				<li <?php if($active_menu == 'users'){ ?>class="active"<?php } ?>><?php echo $this->Html->link("Usuários","/users") ?></li>
			<?php } ?>
          </ul>
		  <form class="pull-left" action="<?php echo Configure::read('BASE_URL'); ?>clientes/search" method="post">
			<input type="text" placeholder="Procurar cliente" name="data[Cliente][nome]" class="input-search-cliente-topbar">
		  </form>
		  <ul>
			<li><?php echo $this->Html->link("Logout","/users/logout")?></li>
	      </ul>
          <p class="pull-right">Logado como <a href="#"><?php echo $user['User']['username'] ?></a></p>

        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="sidebar" >
        <div class="well">
          <h5>Clientes</h5>
          <ul class="list-sidebar">
            <li><?php echo $this->Html->link("Adicionar Cliente","/clientes/add") ?></li>
            <li><?php echo $this->Html->link("Gerenciar Clientes","/clientes") ?></li>
			<li><?php echo $this->Html->link("Importar clientes","/clientes/import") ?></li>
 			<li><?php echo $this->Html->link("Exportar clientes","/clientes/export") ?></li>
          </ul>
		  <?php if($user['User']['role'] == 'admin' || $user['User']['role'] == 'manager' || $user['User']['role'] == 'developer') {?>
          <h5>Servidores</h5>
          <ul class="list-sidebar">
            <li><?php echo $this->Html->link("Adicionar Servidor","/servers/add") ?></li>
            <li><?php echo $this->Html->link("Gerenciar Servidores","/servers") ?></li>
          </ul>
		  <?php } ?>
		  <?php if($user['User']['role'] == 'admin'){?>
		  <h5>Usuários</h5>
          <ul class="list-sidebar">
            <li><?php echo $this->Html->link("Adicionar usuários","/users/add") ?></li>
            <li><?php echo $this->Html->link("Gerenciar usuários","/users") ?></li>
			<li><?php echo $this->Html->link("Regras de acesso","/users/roles") ?></li>
          </ul>	
	 	  <?php } ?>
		  <?php if($user['User']['role'] == 'admin'){?>
		  <h5>Mensagens</h5>
	      <ul class="list-sidebar">
	      	<li><?php echo $this->Html->link("Criar mensagem","/messages/add") ?></li>
	      	<li><?php echo $this->Html->link("Gerenciar mensagens","/messages") ?></li>
	      </ul>			
		  <?php } ?>
		<!-- 
		  <h5>Tarefas</h5>
		  <ul class="list-sidebar">
			<li><?php //echo $this->Html->link("Adicionar tarefas","/tasks/add") ?></li>
			<li><?php //echo $this->Html->link("Visualizar tarefas","/tasks/") ?></li>
		  </ul>
		-->
          <h5>Ultimos clientes</h5>
          <ul class="list-sidebar">
			<?php foreach($clientes as $c){ ?>
				<li><?php echo $this->Html->link($c['Cliente']['nome'],"/clientes/view/".$c['Cliente']['id']) ?>
			<?php } ?>
          </ul>
        </div>
      </div>
      <div class="content">
        <?php echo $this->Session->flash(); ?>
		<?php echo $content_for_layout; ?>

        <footer>
          <p>&copy; Plock* 2011</p>
        </footer>
      </div>
    </div>	
<script>
$(function(){
	$('.tabs').tabs()	
});

</script>
</body>
</html>