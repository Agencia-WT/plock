<?php
#doc
#	classname:	DashboardController
#	scope:		PUBLIC
#
#/doc
class DashboardController extends AppController 
{

		var $name = 'Dashboard';
		var $uses = array("User","Cliente","Server","Log","Message");
		var $helpers = array("Form","Html","Gravatar");
		
		function beforeFilter()
		{
			parent::beforeFilter();
			
			# Cria uma variavel com os ultimos 5 clientes modificados
			$this->set("clientes",$this->Cliente->ultimosClientes());
			
			$this->set("active_menu","home");
		}
		
		function index () 
		{
			$messages = $this->Message->find('all',
			array(
				'conditions' => array(
					'status' => 'active'
					),
				'order' => array(
					'Message.type DESC'
				)
			));
			$this->set("messages",$messages);
			$this->set('log', $this->Log->getLatest());
			$this->set('user', $this->Auth->user());
			$this->set('nclientes', $this->Cliente->find('count'));
			$this->set('nservers', $this->Server->find('count'));
		}
}
?>