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
	
	function index()
	{
		$this->set("tasks", $this->Task->find('all'));
	}
	
	function add()
	{
		
		$this->layout = 'none';
		
		$data = array();
		
		$data['Task']['conteudo'] =  $_POST['conteudo'];
		$data['Task']['clientes_id'] = $_POST['id'];
			
		$this->Task->save($data);
		
		
		$tk = $this->Task->findById($this->Task->id);
		
		$conteudo = '<li><input type="checkbox" name="check" value="'.$tk['Task']['id'].'" class="checkTask"> &nbsp;
		<span>'.$tk['Task']['conteudo'].'</span></li>';
		
		
		echo $conteudo;

		
	}
	
	function edit()
	{
		$this->layout = "none";
		
		if( is_numeric($_POST['id']) )
		{
			
			$task = $this->Task->findById($_POST['id']);
			if( $task['Task']['status'] == 'aberto' )
			{
				$status = 'fechado';
			}
			else
			{
				$status = 'aberto';
			}
			
			$this->Task->read(null,$_POST['id']);
			$this->Task->set('status',$status);
			$this->Task->save();
	

		}
	}
	
	
	function delete(){
		
		$this->layout = 'none';
		
		if( is_numeric($_POST['id']) )
		{
			$this->Task->delete($_POST['id']);
		}
	}
}

?>