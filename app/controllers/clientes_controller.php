<?php
class ClientesController extends AppController{
	
	var $components = array('RequestHandler','Xml2php');
	
	var $paginate = array(
		'limit' => 10,
		'order' => array(
			'Cliente.nome' => 'asc'
		)
	);
	
	function beforeFilter(){
		parent::beforeFilter();
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
	
	function export(){
			

	}
	
	
	function import(){
		
		if(!empty($this->data)){
			
			$contents = file_get_contents($this->data['Clientes']['xml']['tmp_name']);
			$result = $this->Xml2php->parse($contents);
			
			$clientes = $result['FileZilla3']['Servers']['Server'];
			
			$errorsHandler = Array();
			
			foreach($clientes as $c){
				
				$this->Cliente->create();
				
				$dados['Cliente']['nome'] = $c['Name'];
				$dados['Cliente']['ftp'] = $c['Host'];
				$dados['Cliente']['usuario_ftp'] = $c['User'];
				$dados['Cliente']['senha_ftp'] = $c['Pass'];
				
				# Caso não funcione colocamos o nome de cada cliente em 1 array de erros
				if(!$this->Cliente->save($dados)){
					array_push($errorsHandler,$dados['Cliente']['nome']);
				}
				
			}
			
			
			$this->set("clientesXML",$clientes);
		}		
		
		
	}
	
	
	function rest(){
		$this->layout = 'none';
		
		$param = $_POST['format'];
		
		$clientes = $this->Cliente->find('all');
		
		switch($param){
			case 'JSON':
				$json = json_encode($clientes);
				echo '<h3>Resultado</h3>';
				pr($json);
			break;
		}		
	}

}
?>