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

		echo $scripts_for_layout;
	?>
	<link href='http://fonts.googleapis.com/css?family=Istok+Web:400,700,400italic&v2' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script src="/plock/lib/script.js"></script>
</head>
<body>
 <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="#">Plock*</a>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>Plock* <small>Gerenciador de clientes</small></h1>
        </div>
        <div class="row">
          <div class="span14">
            <?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
          </div>
        </div>
      </div>

      <footer>
        <p>&copy; Company 2011</p>
      </footer>

    </div> <!-- /container -->
</body>
</html>