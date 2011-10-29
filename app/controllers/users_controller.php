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
		
		$this->Auth->flashElement    = "auth_error";
		$this->Auth->loginError = "Usuário e/ou senha incorreto(s)";
		$this->Auth->authError = "Você está tentando acessar uma área restrita, faça login para continuar.";
		
		$this->Auth->loginRedirect = array('action' => 'index', 'controller' => 'dashboard');
		$this->Auth->logoutRedirect = array('action' => 'login', 'controller' => 'users');
		
		
	}
	
	
	function index(){
	
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