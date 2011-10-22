<?php
	echo $this->Session->flash();
	echo $this->Form->create('Mensagen',array('action'=>'edit'));
	echo $this->Form->input('id', array('value' => $Mensagen['Mensagen']['id']));
	echo $this->Form->input('title',array('label' => 'Titulo da Mensagem','value'=> $Mensagen['Mensagen']['title']));
	echo $this->Form->input('content', array('label' => 'Conteúdo','value' => $Mensagen['Mensagen']['content']));
	echo $this->Form->end('Salvar');

?>
