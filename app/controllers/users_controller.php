<?php 
#doc
#	classname:	Users_Controller
#	scope:		PUBLIC
#
#/doc

class UsersController extends AppController {

	
	function beforeFilter() {
		$this->Auth->fields = array(
		'username' => 'username',
		'password' => 'password'
		);
		$this->Auth->allow('register');
		
		$this->Auth->loginError = "Usuário e/ou senha incorreto(s)";
		$this->Auth->authError = "Você está tentando acessar uma área restrita, faça login para continuar.";
		
		$this->Auth->loginRedirect = array('action' => 'index', 'controller' => 'dashboard');
		$this->Auth->logoutRedirect = array('action' => 'login', 'controller' => 'users');
		
		
	}
	
	
	function index(){
	
	}
	
	function profile(){
		$user = $this->User->findById($this->Auth->user('id'));
		$this->set("user",$user);

		$this->set('title_for_layout', 'Perfil de '.$user['User']['name']);
		$this->layout = 'profiles';
		
	
		// Manda a imagem do perfil do usuário
		$this->set('prof', $this->Gravatar->getImage($user['User']['email']));
		
	}
	
	function edit(){
		$user = $this->User->findById($this->Auth->user('id'));
		$this->set("user",$user);
		
		$this->set('title_for_layout', 'Editar perfil de '.$user['User']['name']);
		$this->layout = 'profiles';
		
				
		if($this->data){	
			$this->User->id = $user['User']['id'];
					
			if($this->User->save($this->data)){
				$this->Session->setFlash('Dados alterados com sucesso!');
				$this->redirect("/users/profile");
			}
		}

		
	}
	
	function login() {
		$this->layout = "login";
	}
	
	function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	function register() {
		$this->layout = "login";
		
		if ($this->data) {
			$this->data['User']['password'] = $this->Auth->hashPasswords($this->data['User']['password']);
			$this->User->create();
			if($this->User->save($this->data)){
				$this->Auth->login($this->data);
				$this->redirect('/dashboard/');
			}
		}
	}
	
}

### ?>