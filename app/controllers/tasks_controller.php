<?php
/**
* 
*/
class TasksController extends AppController
{
	var $name = 'Tasks';
	var $uses = array("Task","Cliente");
	
	var $paginate = array
	(
		'limit' => 10,
		'order' => array
		(
			'Cliente.nome' => 'asc'
		)
	);
	function beforeFilter(){
		
		parent::beforeFilter();
		
		# Cria uma variavel com os dados do usuário
		$this->set('user', $this->Auth->user());
		
		# Cria uma variavel com os ultimos 5 clientes modificados
		$this->set('clientes', $this->Cliente->ultimosClientes());
		
		# Seleciona o menu clientes
		$this->set('active_menu', 'clientes');
	}
	
	function index(){
		$this->set("tasks", $this->Task->find('all'));
	}
	
	function add($id = null){
		
		if(!$id){
			
			$data = $this->paginate('Cliente');
			$this->set("data",$data);
		
		}else{
			
			$cli = $this->Cliente->findById($id);
			$this->set("cliente",$cli);
			
			if(!empty($this->data)){
				
				$this->Task->save($this->data);
				$this->Session->setFlash('Tarefa criada com sucesso','flash_success');
				$this->redirect("/tarefas/");
				
			}
		}
		
		
	}
}

?>