<?php

class ClientesController extends AppController
{
	var $name 		= 'Clientes';
	var $components = array('RequestHandler', 'Xml2php');
	var $helpers 	= array('Html', 'Form', 'Ftpcheck');
	var $uses 		= array('Cliente', 'Dominio', 'Server');
	
	var $paginate = array
	(
		'limit' => 10,
		'order' => array
		(
			'Cliente.nome' => 'asc'
		)
	);
	
	
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
	
	
	function index()
	{
		$data = $this->paginate('Cliente');
		$this->set('data',$data);
	}
	
	
	function add()
	{
		# Obtem todos os servers cadastrados.
		$this->set('servers', $this->Server->find('all'));
		
		if ( !empty($this->data) )
		{
			if ( $this->Cliente->save($this->data) )
			{
				$dados['Dominio']['url'] 		  = $this->data['Cliente']['url'];
				$dados['Dominio']['servers_id']   = $this->data['Cliente']['servers_id'];
				$dados['Dominio']['ftp_host'] 	  = $this->data['Cliente']['ftp_host'];
				$dados['Dominio']['ftp_username'] = $this->data['Cliente']['ftp_username'];
				$dados['Dominio']['ftp_password'] = $this->data['Cliente']['ftp_password'];
				$dados['Dominio']['clientes_id']  = $this->Cliente->id;
				
				# Salva o Domínio do cliente
				$this->Dominio->save($dados);
				
				$this->Session->setFlash($this->data['Cliente']['nome'].' salvo com sucesso, clique <a href="/plock/clientes/view/'.$this->Cliente->id.'">aqui</a> para visualizar.', 'flash_success');
			}
			else
			{
				$this->Session->setFlash('Você precisa informar o nome do cliente', 'flash_fail');
			}
		}
	}
	
	
	function edit($id = null)
	{
		# Obtem os dados do cliente.
		$cliente = $this->Cliente->findById($id);
		$this->set('cliente', $cliente);

		
		# Registra as alterações feitas
		if ( !empty($this->data) )
		{
			if ( $this->Cliente->save($this->data) )
			{
				$this->Session->setFlash($this->data['Cliente']['nome'].' atualizado com sucesso, clique <a href="/plock/clientes/view/'.$this->Cliente->id.'">aqui</a> para visualizar.', 'flash_success');
				$this->redirect('/clientes/');
			}
			else
			{
				$this->Session->setFlash('Você precisa informar o nome do cliente', 'flash_fail');
			}			
		}
	}
	
	
	function view($id = null)
	{
		$this->set('cliente', $this->Cliente->findById($id));
	}
	
	
	function delete($id = null)
	{
		$this->Cliente->delete($id);
		$this->Session->setFlash('Cliente apagado com sucesso!', 'flash_success');
		$this->redirect('/clientes/');
	}
	
	
	function search()
	{
		# Caso esteja enviando um post, guarda a busca em uma variavel de sessão
		if ( !empty($this->data) )
		{
			@$_SESSION['busca'] = $this->data['Cliente']['nome'];
		}
		
		$data = $this->paginate('Cliente',  array('Cliente.nome LIKE' => '%'.@$_SESSION['busca'].'%'));
		$this->set("busca",@$_SESSION['busca']);
		
		# Caso tenha apenas 1 resultado ele já redireciona para a página do cliente
		if ( count($data) == 1 )
		{
			$url = '/clientes/view/'.$data[0]['Cliente']['id'];
			$this->redirect($url);
		}
		else
		{
			$this->set("data", $data);
		}
	}
	
	
	function export()
	{
	}
	
	
	function import()
	{
		if ( !empty($this->data) )
		{
			
			$contents = file_get_contents($this->data['Clientes']['xml']['tmp_name']);
			
			$result = $this->Xml2php->parse($contents);
			
			$clientes = $result['FileZilla3']['Servers']['Server'];
			
			$errorsHandler = Array();
			
			foreach ($clientes as $c )
			{
				$this->Cliente->create();
				$dados['Cliente']['nome'] = $c['Name'];
				
				# Caso não funcione colocamos o nome de cada cliente em 1 array de erros
				if ( !$this->Cliente->save($dados) )
				{
					array_push($errorsHandler, $dados['Cliente']['nome']);
				}
				
				$this->Dominio->create();
				
				$dados2['Dominio']['ftp_host'] 		  = $c['Host'];
				$dados2['Dominio']['ftp_username'] 	  = $c['User'];
				$dados2['Dominio']['ftp_password'] 	  = $c['Pass'];
				$dados2['Dominio']['clientes_id'] = $this->Cliente->id;
				
				$this->Dominio->save($dados2);
			}
			
			$this->set("clientesXML", $clientes);
		}		
	}
	
	
	function rest()
	{
		$this->layout = 'none';
		
		if ( $_POST )
		{
			$param 	  = $_POST['format'];
			$clientes = $this->Cliente->find('all');

			switch ( $param )
			{
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