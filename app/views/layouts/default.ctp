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
	<script src="/plock/lib/alerts.js"></script>
	<script src="/plock/lib/tableshorter.js"></script>
	<script src="/plock/lib/modal.js"></script>
	<script src="/plock/lib/script.js"></script>
</head>
<body>

    <div class="topbar">
      <div class="topbar-inner">
        <div class="container-fluid">
          <a class="brand" href="/plock">Plock</a>
          <ul class="nav">
            <li class="active"><?php echo $this->Html->link("Home","/") ?></li>
            <li><?php echo $this->Html->link("Clientes","/clientes") ?></li>
			<li><?php echo $this->Html->link("Logout","/users/logout")?>
          </ul>
          <p class="pull-right">Logado como <a href="#"><?php echo $user['User']['username'] ?></a></p>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="sidebar">
        <div class="well">
          <h5>Clientes</h5>
          <ul>
            <li><?php echo $this->Html->link("Adicionar Cliente","/clientes/add") ?></li>
            <li><?php echo $this->Html->link("Gerenciar Clientes","/clientes") ?></li>
            <li><?php echo $this->Html->link("Procurar","/clientes/search") ?></li>
          </ul>
          <h5>Ultimos clientes</h5>
          <ul>
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
</body>
</html>