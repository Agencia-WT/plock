<?php
#doc
#	classname:	LogsController
#	scope:		PUBLIC
#
#/doc
class LogsController extends AppController
{
	
	function beforeFilter()
	{
		parent::beforeFilter();
		
		# Cria uma variavel com os dados do usuário
		$this->set('user', $this->Auth->user());
		
		# Cria uma variavel com os ultimos 5 clientes modificados
		$this->set('clientes', $this->Cliente->ultimosClientes());
		
		# Seleciona o menu clientes
		$this->set('active_menu', 'clientes');
		
	}
	
	
}

?>