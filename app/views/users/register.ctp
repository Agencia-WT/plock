<?php
	echo $this->Session->flash('auth');
	echo $this->Form->create('User',array('action'=>'register'));
	echo $this->Form->input('name',array('label' => 'Nome completo'));
	echo $this->Form->input('email');
	echo $this->Form->input('username', array('label' => 'Usuário'));
	echo $this->Form->input('password', array('label' => 'Senha'));
	echo $this->Form->end('Register');
	
	echo $this->Html->link('Entrar no sistema' , '/users/login');
?>
