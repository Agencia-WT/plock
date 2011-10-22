<?php
	echo $this->Session->flash('auth');
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('label' => 'Usuário'));
	echo $this->Form->input('password', array('label' => 'Senha'));
	echo $this->Form->end('Login');
	
	echo $this->Html->link('Registrar' , '/users/register');
?>
