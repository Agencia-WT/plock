<?php
#doc
#	classname:	ClientesController
#	scope:		PUBLIC
#
#/doc
class ClientesController extends AppController
{
	var $name 		= 'Clientes';
	var $components = array('RequestHandler', 'Xml2php','Filezilaxml', 'Download');
	var $helpers 	= array('Html', 'Form', 'Ftpcheck');
	var $uses 		= array('Cliente', 'Dominio', 'Server', 'Log');
	
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
				
				# Cria o log
				$this->Log->create($this->Auth->user('id'),' cadastrou o cliente '.$this->data['Cliente']['nome']);
				
				$this->Session->setFlash($this->data['Cliente']['nome'].' salvo com sucesso, clique <a href="'.Configure::read('BASE_URL').'clientes/view/'.$this->Cliente->id.'">aqui</a> para visualizar.', 'flash_success');
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
				# Cria o log
				$this->Log->create($this->Auth->user('id'),' alterou o cliente '.$this->data['Cliente']['nome'].' ID: '.$this->data['Cliente']['id']);
				
				$this->Session->setFlash($this->data['Cliente']['nome'].' atualizado com sucesso, clique <a href="'.Configure::read('BASE_URL').'clientes/view/'.$this->Cliente->id.'">aqui</a> para visualizar.', 'flash_success');
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
		$cliente = $this->Cliente->findById($id);
		
		if( $this->Cliente->delete($id) )
		{
			# Cria o log
			$action = ' deletou o cliente '.$cliente['Cliente']['nome'];
			$this->Log->create( $this->Auth->user('id'), $action );
			
			$this->Session->setFlash('Cliente apagado com sucesso!', 'flash_success');
			$this->redirect('/clientes/');	
		}
		
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
			
			# Caso sejá apenas um ftp
			if ( !isset($result['FileZilla3']['Servers']['Server'][0]) )
			{
				$clientes[0] = $result['FileZilla3']['Servers']['Server'];
			}
			else 
			{
				$clientes = $result['FileZilla3']['Servers']['Server'];
			}
			
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
				$dados2['Dominio']['ftp_username'] 	  = isset($c['User']) ? $c['User'] : '';
				$dados2['Dominio']['ftp_password'] 	  = isset($c['Pass']) ? $c['Pass'] : '';
				$dados2['Dominio']['clientes_id'] = $this->Cliente->id;
				
				$this->Dominio->save($dados2);
				
				
				
			}
			# Cria um log
			$this->Log->create($this->Auth->user('id'),' importou <strong>'.count($clientes).'</strong> clientes para a base de dados');
			
			$this->set('clientesXML', $clientes);
		}		
	}
	
	
	function rest($formato = null)
	{
		$this->layout = 'none';
		
		# Verifica se foi especificado algum formato
		if ( !empty($formato) )
		{
			# Obtem todos os clientes cadastrados.
			$clientes = $this->Cliente->find('all');

			switch ( $formato )
			{
				case 'json':
					
					$json = json_encode($clientes);
					$this->Download->download($json, 'Plock_Clientes.json');
					
					break;
					
				case 'filezilla':
					
					$filezilla = $this->Filezilaxml->parse($clientes);
					$this->Download->download($filezilla, 'Plock_FileZilla.xml');
					
					break;
					
				case 'html':
					break;
			}
		}
	}
	
}
?>