<?php
class ClientesController extends AppController{
	
	var $paginate = array(
		'limit' => 10,
		'order' => array(
			'Cliente.nome' => 'asc'
		)
	);
	
	function beforeFilter(){
		# Cria uma variavel com os dados do usuário
		$this->set("user", $this->Auth->user());
		
		# Cria uma variavel com os ultimos 5 clientes modificados
		$this->set("clientes",$this->Cliente->ultimosClientes());
	}
	
	function index(){
		$data = $this->paginate('Cliente');
		$this->set('data',$data);
	}
	
	function add(){
		if(!empty($this->data)){
			if($this->Cliente->save($this->data)){
				$this->Session->setFlash($this->data['Cliente']['nome'].' salvo com sucesso, clique <a href="/plock/clientes/view/'.$this->Cliente->id.'">aqui</a> para visualizar.', 'flash_success');
			}else{
				$this->Session->setFlash('Você precisa informar o nome do cliente', 'flash_fail');
			}
		}
	}
	
	function edit($id = null){
		
		$this->set("cliente",$this->Cliente->findById($id));
		
		if(!empty($this->data)){
			if($this->Cliente->save($this->data)){
				$this->Session->setFlash($this->data['Cliente']['nome'].' atualizado com sucesso, clique <a href="/plock/clientes/view/'.$this->Cliente->id.'">aqui</a> para visualizar.', 'flash_success');
				$this->redirect("/clientes/");
			}else{
				$this->Session->setFlash('Você precisa informar o nome do cliente', 'flash_fail');
			}			
		}
	}
	
	function view($id = null){
		$this->set("cliente",$this->Cliente->findById($id));
	}
	
	function delete($id = null){
		$this->Cliente->delete($id);
		$this->Session->setFlash('Cliente apagado com sucesso!', 'flash_success');
		$this->redirect("/clientes/");
	}
	
	function search(){
		
		if(!empty($this->data)){
			$data = $this->paginate('Cliente',  array('Cliente.nome LIKE' => '%'.$this->data['Cliente']['nome'].'%'));
	
			$this->set("data", $data);
			$this->set("busca",$this->data['Cliente']['nome']);
		}
	}
}
?>