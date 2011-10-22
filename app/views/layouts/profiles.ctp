<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('grid');
		echo $this->Html->css('style');

		echo $scripts_for_layout;
	?>
	<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700,400italic&v2' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Area do Associado SBOT-MG</h1>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>

			<div class="actions">
				<h4> Olá, <?= $user['User']['name']; ?> </h4>
					<ul>
						<li> <?= $this->Html->link('Meu perfil', '/users/profile');?> </li>
						<li> <?= $this->Html->link('Logout','/users/logout');?> </li>
					</ul>
				
				<br/>
				<h4> Menu </h4>
					<ul>
						<li> <?= $this->Html->link('Mensagens', '/mensagens');?> </li>
					</ul>
				<?php if($user['User']['role'] == "admin"){ ?>
				<h4> Menu do administrador</h4>
				<ul>
					<li> <?= $this->Html->link('Cadastrar Mensagens', '/mensagens/add');?> </li>
				</ul>
				<?php } ?>
				
			</div>

			<div class="index">
				<?php echo $content_for_layout; ?>
			</div>

		</div>
		<div id="footer">
			<?php echo $this->element('sql_dump'); ?>
		</div>
	</div>
</body>
</html>