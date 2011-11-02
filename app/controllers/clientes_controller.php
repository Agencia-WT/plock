<?php
class ClientesController extends AppController{
	
	var $name = 'Clientes';
	var $components = array('RequestHandler','Xml2php');
	var $helpers = array('Html','Form','Ftpcheck');
	var $uses = array("Cliente","Ftp");
	
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
		
		$this->set("active_menu","clientes");
	}
	
	function index(){
		$data = $this->paginate('Cliente');
		$this->set('data',$data);
	}
	
	function add(){
		if(!empty($this->data)){
			if($this->Cliente->save($this->data)){
				
				$dados['Ftp']['host'] = $this->data['Cliente']['ftp'];
				$dados['Ftp']['username'] = $this->data['Cliente']['usuario_ftp'];
				$dados['Ftp']['password'] = $this->data['Cliente']['senha_ftp'];
				$dados['Ftp']['clientes_id'] = $this->Cliente->id;
				
				# Salva o FTP do cliente
				$this->Ftp->save($dados);
				
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
		
		# Caso esteja enviando um post, guarda a busca em uma variavel de sessão
		if(!empty($this->data)){
			@$_SESSION['busca'] = $this->data['Cliente']['nome'];
		}
		
		$data = $this->paginate('Cliente',  array('Cliente.nome LIKE' => '%'.@$_SESSION['busca'].'%'));
		
		$this->set("data", $data);
		$this->set("busca",@$_SESSION['busca']);
		
		
		
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
				
				# Caso não funcione colocamos o nome de cada cliente em 1 array de erros
				if(!$this->Cliente->save($dados)){
					array_push($errorsHandler,$dados['Cliente']['nome']);
				}
				
				$this->Ftp->create();
				
				$dados2['Ftp']['host'] = $c['Host'];
				$dados2['Ftp']['username'] = $c['User'];
				$dados2['Ftp']['password'] = $c['Pass'];
				$dados2['Ftp']['clientes_id'] = $this->Cliente->id;
				
				$this->Ftp->save($dados2);
				
			}
			
			
			$this->set("clientesXML",$clientes);
		}		
		
		
	}
	
	
	function rest(){
		$this->layout = 'none';
		
		if($_POST){
			
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

}
?>