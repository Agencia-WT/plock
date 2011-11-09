<?php

class ServersController extends AppController
{
	var $name = 'Servers';
	var $uses = array('Server', 'Cliente');
	
	function beforeFilter()
	{
		parent::beforeFilter();	
		$this->set('user', $this->Auth->user());
		
		# Cria uma variavel com os ultimos 5 clientes modificados
		$this->set("clientes",$this->Cliente->ultimosClientes());
		
		# Marca o menu
		$this->set('active_menu', 'clientes');
		
		
		if($this->Auth->user('role') != 'admin' && $this->Auth->user('role') != 'manager'  && $this->Auth->user('role') != 'developer'){
			$this->Session->setFlash('Você não tem acesso a esta area','flash_fail');
			$this->redirect("/");
		}
		
	}
	
	
	function index()
	{
		$data = $this->paginate('Server');
		$this->set('servers', $data);
	}
	
	
	function add()
	{
		if ( !empty($this->data) )
		{
			if ( $this->Server->save($this->data) )
			{
				$this->Session->setFlash('Servidor salvo com sucesso, clique <a href="'.Configure::read('BASE_URL').'servers/view/'.$this->Server->id.'">aqui</a> para visualizar.', 'flash_success');
				$this->redirect("/servers/");
			}
			else
			{
				$this->Session->setFlash('Falha ao cadastrar. Tente mais tarde', 'flash_fail');				
			}
		}
	}
	
	
	function view($id = null)
	{
		$this->set('server', $this->Server->findById($id));
	}
	
	
	function edit($id = null)
	{
		# Obtem os dados do server.
		$this->set("server", $this->Server->findById($id));
		
		# Registra as alterações feitas
		if ( !empty($this->data) )
		{
			if ( $this->Server->save($this->data) )
			{
				$this->Session->setFlash('Server atualizado com sucesso, clique <a href="'.Configure::read('BASE_URL').'servers/view/'.$this->Server->id.'">aqui</a> para visualizar.', 'flash_success');
				$this->redirect('/servers/');
			}
			else
			{
				$this->Session->setFlash('Falha ao atualizar. Tente mais tarde', 'flash_fail');				
			}
		}
	}
	
	
	function delete($id = null)
	{
		$this->Server->delete($id);
		$this->Session->setFlash('Servidor removido com sucesso.', 'flash_success');
		$this->redirect('/servers/');
	}
}

?>