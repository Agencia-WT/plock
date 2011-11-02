<?php
	class DashboardController extends AppController {

		  var $name = 'Dashboard';
		  var $uses = array("User","Cliente");
		
		  function beforeFilter(){
			parent::beforeFilter();
			
			# Cria uma variavel com os ultimos 5 clientes modificados
			$this->set("clientes",$this->Cliente->ultimosClientes());
			
			$this->set("active_menu","home");
		  }
		  function index () {
			   $this->set('user', $this->Auth->user());
			   $this->set('nclientes', $this->Cliente->find('count'));
		  }
	}
?>