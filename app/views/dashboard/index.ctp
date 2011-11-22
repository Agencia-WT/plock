<h1>Procurar cliente</h1>
<form name="form1" method="post" action="<?php echo Configure::read('BASE_URL'); ?>clientes/search">
<input type="text" class="span10" name="data[Cliente][nome]" placeholder="Cliente"><button class="btn primary" style="margin-left:10px">Procurar</button>
</form>
<hr>
<h3>Atividade recente</h3>
<div class="atividade-recente">
	<ol>
		<?php foreach($log as $l){ ?>
			<li class="stbody">
				<div class="stimg">
					<?php
					$foto = $this->Gravatar->getImage($l['User']['email'],50);
					?>
					<a href="<?php echo Configure::read('BASE_URL') ?>/users/view/<?php echo $l['User']['username'] ?>">
						<img src="<?php echo $foto ?>"/>
					</a>
				</div> 
				<div class="sttext">
					<a href="<?php echo Configure::read('BASE_URL') ?>/users/view/<?php echo $l['User']['username'] ?>"><?php echo $l['User']['username'] ?></a> <?php echo $l['Log']['content']; ?>
				<div class="sttime"><?php echo $this->Html->time_stamp(strtotime($l['Log']['modified'])) ?></div> 
			</div> 
			</li>
		<?php } ?>
	</ol>
</div>