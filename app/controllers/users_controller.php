<?php 
#doc
#	classname:	Users_Controller
#	scope:		PUBLIC
#
#/doc

class UsersController extends AppController {

	var $uses = array("Cliente","User");
	var $helpers = array("Html","Form","Gravatar");
	
	function beforeFilter() {
		$this->Auth->fields = array(
		'username' => 'username',
		'password' => 'password'
		);
		
		$this->Auth->allow('register');
		
		$this->Auth->flashElement    = "auth_error";
		$this->Auth->loginError = "Usuário e/ou senha incorreto(s)";
		$this->Auth->authError = "Você está tentando acessar uma área restrita, faça login para continuar.";
		
		$this->Auth->loginRedirect = array('action' => 'index', 'controller' => 'dashboard');
		$this->Auth->logoutRedirect = array('action' => 'login', 'controller' => 'users');
		
		
		
		# Cria uma variavel com os dados do usuário
		$this->set('user', $this->Auth->user());
		
		# Cria uma variavel com os ultimos 5 clientes modificados
		$this->set('clientes', $this->Cliente->ultimosClientes());
		
		# Seleciona o menu clientes
		$this->set('active_menu', 'users');
		
		
	}
	
	
	function index(){
		
		if($this->Auth->user('role') != 'admin'){
			$this->Session->setFlash('Você não tem acesso a esta area','flash_fail');
			$this->redirect("/");
		}else{
			$this->set('usuarios',$this->User->find('all'));
		}
	}
	
	
	function login() {
		$this->layout = "login";
	}
	
	function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	
	function add(){
		
		if($this->Auth->user('role') != 'admin'){
			$this->Session->setFlash('Você não tem acesso a esta area','flash_fail');
			$this->redirect("/");
		}else{
			if ($this->data) {
				$this->data['User']['password'] = $this->Auth->hashPasswords($this->data['User']['password']);
				$this->User->create();
				if($this->User->save($this->data)){
					$this->redirect('/users/');
				}else{
					$errors =  $this->User->invalidFields();
					foreach($errors as $e){
						$this->Session->setFlash($e,'flash_fail');
					}
				
				}
			}			
		}

	}
	
	function edit($id = null){
		
		if($this->Auth->user('role') != 'admin'){
			$this->Session->setFlash('Você não tem acesso a esta area','flash_fail');
			$this->redirect("/");			
		}else{
			$this->set('user',$this->User->findById($id));
			
			if(!empty($this->data)){
				if($this->User->save($this->data)){
					$this->Session->setFlash('Usuário atualizado com sucesso','flash_success');
					$this->redirect("/users/");
				}else{
					$this->Session->setFlash('Falha ao atualizar o usuário','flash_fail');
					$this->redirect("/users/");					
				}
			}
		}
		
	}
	
	function delete($id = null){
		
		if($this->Auth->user('role') != 'admin'){
			$this->Session->setFlash('Você não tem acesso a esta area','flash_fail');
			$this->redirect("/");			
		}else{
			
			if($this->User->delete($id)){
				$this->Session->setFlash('Usuário removido com sucesso','flash_success');
				$this->redirect("/users/");				
			}else{
				$this->Session->setFlash('Falha ao remover o usuário','flash_fail');
				$this->redirect("/users/");				
			}			
		}
		
	}
	
	function roles(){
		if($this->Auth->user('role') != 'admin'){
			$this->Session->setFlash('Você não tem acesso a esta area','flash_fail');
			$this->redirect("/");			
		}else{
			
		}
	}
	
	
	function view($usr = null){
		
		$user = $this->User->findByUsername($usr);
		
		if(count($user) > 0){
			$this->set("usr",$user);
		}else{
			$this->set("error","Usuário não encontrado");
		}
	}
	
	
}

### ?>