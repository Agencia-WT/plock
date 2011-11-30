<?php

if( count(@$messages) > 0)
{
	foreach($messages as $m){
		$type = $m['Message']['type'];
		$class = '';
		switch($type)
		{
			case 'urgente':
			$class = 'error';
			$title[0] = '<h2>';
			$title[1] = '</h2>';
			break;
			case 'comunicado':
			$class = 'info';
			$title[0] = '<h4>';
			$title[1] = '</h4>';
			break;
			case 'importante':
			$class = 'warning';
			$title[0] = '<h3>';
			$title[1] = '</h3>';
			break;
		}

		echo '<div class="alert-message block-message '.$class.'">';
		echo '<a class="close" href="#">x</a>';
		echo $title[0].''.$m['Message']['title'].''.$title[1];
		echo '<p>'.str_replace("\n","<br/>",$m['Message']['content']).'</p>';
		echo '<hr/>';
		echo '<i style="font-size:11px"><strong>Criado por:</strong> '.$m['User']['username'].'</i>';
		echo '</div>';
	}	
	
	echo '<hr/>';
}

?>
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