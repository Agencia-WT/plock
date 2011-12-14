<?php
/**
* 
*/
class MessagesController extends AppController
{
	var $uses = array("Message","Cliente","User", "Log");
	
	function beforeFilter()
	{
		parent::beforeFilter();	
		
		$this->set('user', $this->Auth->user());
		
		# Cria uma variavel com os ultimos 5 clientes modificados
		$this->set("clientes",$this->Cliente->ultimosClientes());
		
		# Marca o menu
		$this->set('active_menu', 'messages');
		
		
		if($this->Auth->user('role') != 'admin')
		{
			$this->Session->setFlash('Você não tem acesso a esta area','flash_fail');
			$this->redirect("/");
		}
		
	}
	
	
	function index()
	{
		$messages = $this->Message->find('all');
		
		$this->set("messages",$messages);
	}
	
	function add()
	{
		if( !empty( $this->data ) )
		{
			
			if($this->data['Message']['type'] == 'on' ){
				$this->data['Message']['type'] = 'comunicado';
			}
			if( $this->Message->save( $this->data ) )
			{
				
				if( $this->data['Message']['type'] == 'urgente'){
					// Envia mensagem de urgencia para todos os usuários
					// Para habilitar remover o comentário e configurar o email no AppController
					
					# $this->_sendAlertMessage($this->data['Message']['title'],$this->data['Message']['content']);
				}
				
				# Cria um log
				$this->Log->create($this->Auth->user('id'),' criou um informativo');

				$this->Session->setFlash('Mensagem cadastrada com sucesso!', 'flash_success');
				

				$this->redirect('/messages/');
			}
			else
			{
				$errors =  $this->Message->invalidFields();
				
				foreach($errors as $e)
				{
					$this->Session->setFlash($e,'flash_fail');
				}
			
			}
			

		}
	}
	
	function edit( $id = null )
	{
		$message = $this->Message->findById($id);
		$this->set("message",$message);
		
		if( !empty( $this->data ) )
		{
			if( $this->Message->save( $this->data ) )
			{
				# Cria um log
				$this->Log->create($this->Auth->user('id'),' editou o informativo "'.$this->data['Message']['title'].'"');

				$this->Session->setFlash('Mensagem editada com sucesso!', 'flash_success');

				$this->redirect('/messages/');				
			}
			else
			{
				$errors =  $this->Message->invalidFields();
				
				foreach($errors as $e)
				{
					$this->Session->setFlash($e,'flash_fail');
				}				
			}
		}
	}
	
	function delete ( $id = null) {
		$this->Message->delete($id);
		$this->Session->setFlash('Mensagem removida com sucesso!', 'flash_success');
		$this->redirect("/messages/");
		
	}
	
	function _sendAlertMessage($titulo,$message)
	{
		
		$users = $this->User->find('all');
		
		foreach($users as $u)
		{
			$this->Email->to = $u['User']['email'];
			$this->Email->subject = $titulo;
			
			$this->Email->replyTo = 'no-reply@plock.com.br';
		    $this->Email->from = 'Plock* <no-reply@plock.com.br>';
		    $this->Email->template = 'alert_message'; // note no '.ctp'
		
		 	$this->Email->sendAs = 'both'; // because we like to send pretty mail
		
			$this->set('message',$message);
			
			$this->Email->send();
		}
		
		
	}
}

?>