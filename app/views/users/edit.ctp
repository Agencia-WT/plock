<?php
	echo $this->Session->flash();
	echo $this->Form->create('User',array('action'=>'edit'));
	echo $this->Form->input('id', array('value' => $user['User']['id']));
	echo $this->Form->input('name', array('value' => $user['User']['name']));
	echo $this->Form->input('email', array('value' => $user['User']['email']));
	echo $this->Form->end('Alterar');
?>
