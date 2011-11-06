<?php
/**
* 
*/
class DominiosController extends AppController
{
	var $uses = array('Dominio', 'Cliente', 'Server');
	
	
	function beforeFilter()
	{
		parent::beforeFilter();
		
		$this->set("user", $this->Auth->user());
		
		# Cria uma variavel com os ultimos 5 clientes modificados
		$this->set("clientes",$this->Cliente->ultimosClientes());
		
		$this->set('active_menu', 'clientes');
	}
	
	
	function add($id = null)
	{
		# Obtem dados sobre o cliente
		$this->set('cliente', $this->Cliente->findById($id));
		
		# Obtem todos os servers cadastrados.
		$this->set('servers', $this->Server->find('all'));
		
		# Cadastra o domínio.
		if ( !empty($this->data) )
		{
			if ( $this->Dominio->save($this->data) )
			{
				$this->Session->setFlash('Domínio incluido com sucesso!', 'flash_success');
				$url = '/clientes/view/'.$this->data['Dominio']['clientes_id'];
				$this->redirect($url);
			}
		}
	}
	
	
	function delete($id = null)
	{
		$dominio = $this->Dominio->findById($id);
		$cliente = $dominio['Cliente']['id'];
		
		# Deleta o domínio
		$this->Dominio->delete($id);
		$this->Session->setFlash('Domínio excluido com sucesso!', 'flash_success');
		
		# Redireciona de volta para o cliente
		$url = "/clientes/view/".$cliente;
		$this->redirect($url);

	}
	
	function edit($id = null)
	{
		# Obtem dados do domínio.
		$dominio = $this->Dominio->findById($id);
		$this->set('dominio', $dominio);

		# Obtem todos os servers cadastrados.
		$this->set('servers', $this->Server->find('all'));
		
		# Url para visualizar os dados do cliente.
		$url = '/clientes/view/'.$dominio['Cliente']['id'];
		
		
		# Identifica o servidor do dominio automatico.
		if ( $dominio['Dominio']['url'] )
		{
			$dom = $dominio['Dominio']['url'];
		}
		else
		{
			$a = explode('ftp.', $dominio['Dominio']['ftp_host']);
			$dom = $a[1];
		}
		
		# Obtem o ip do servidor
		$info = dns_get_record($dom, DNS_A);
		$ip = $info[0]['ip'];
		
		# Obtem o servidor
		$server = $this->Server->findByIp($ip);
		if ( count($server) > 0 )
		{
			$server_select = $server['Server']['id'];
			$this->set('server_select', $server_select);
		}
		
		
		# Registra as alterações feitas no domínio.		
		if ( !empty($this->data) )
		{
			if ( $this->Dominio->save($this->data) )
			{
				$this->Session->setFlash('Domínio editado com sucesso!', 'flash_success');
				$this->redirect($url);
			}
			else
			{
				$this->Session->setFlash('Falha ao editar!', 'flash_fail');
				$this->redirect($url);
			}
		}
	}
}
?>