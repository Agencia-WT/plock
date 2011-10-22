<?php 

#doc
#	classname:	Mensagens_controller
#	scope:		PUBLIC
#
#/doc

class MensagensController extends AppController
{
	var $uses = array("User","Mensagen");
	var $paginate = array(
		'limit' => 5,
		'order' => array(
			'Mensagen.title' => 'asc')
	);

	function beforeFilter() {
		$this->Auth->fields = array(
		'username' => 'username',
		'password' => 'password'
		);
		$this->Auth->allow('');
		$this->Auth->loginError = "Usuário e/ou senha incorreto(s)";
		$this->Auth->authError = "Você está tentando acessar uma área restrita, faça login para continuar.";
		$this->Auth->loginRedirect = array('action' => 'profile', 'controller' => 'users');
		$this->Auth->logoutRedirect = array('action' => 'login', 'controller' => 'users');
		
		// Colocamos em todas as actions os dados do usuário logado e colocamos o layout
		$user = $this->User->findById($this->Auth->user('id'));
		$this->set("user",$user);

		$this->set('title_for_layout', 'SBOT - Portal do associado');
		$this->layout = 'profiles';
	}
	
	function index(){	
	
		$data = $this->paginate('Mensagen');
		$this->set("Mensagens", $data);	
	}
	
	
	function add(){
		if($this->Auth->user('role') != 'admin'){
			$this->redirect('/mensagens');
		}else{
			if($this->data){
				if($this->Mensagen->save($this->data)){
					$this->redirect("/mensagens/view/".$this->Mensagen->id);
				}else{
					$this->Session->setFlash('Erro ao inserir a Mensagem! Tente mais tarde');
					$this->redirect("/mensagens");
				}
				
			}
		}
	}
	
	
	
	function edit($id = null){
		if($this->Auth->user('role') != 'admin'){
			$this->redirect('/mensagens');
		}else{
			$Mensagen = $this->Mensagen->findById($id);
			$this->set("Mensagen",$Mensagen);
		
			if($this->data){
				$this->Mensagen->id = $id;
				
				if($this->Mensagen->save($this->data)){
					$this->redirect("/mensagens/view/".$this->Mensagen->id);
				}else{
					$this->Session->setFlash('Erro ao editar a mensagem! Tente mais tarde');
					$this->redirect("/mensagens/edit/".$id);
				}
				
			}
		}
	}
	
	
	
	function view($id = null){
		$Mensagen = $this->Mensagen->findById($id);
		$this->set("Mensagen", $Mensagen);
	}
	
	
	function delete($id = null){
		if($this->Auth->user('role') != 'admin'){
			$this->redirect('/mensagens');
		}else{
			if($this->Mensagen->delete($id)){
				$this->Session->setFlash('Mensagem excluida com sucesso!', 'default', array('class' => 'message success'));
				$this->redirect("/mensagens");				
			}
			;
		}
	
	}

}
### ?>