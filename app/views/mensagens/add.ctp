<h2> Cadastrar Mensagem </h2>
<?php
	echo $this->Session->flash();
	echo $this->Form->create('Mensagen',array('action'=>'add'));
	echo $this->Form->input('title',array('label' => 'Titulo da Mensagem'));
	echo $this->Form->input('content', array('label' => 'Conteúdo'));
	echo $this->Form->end('Cadastrar');

?>
