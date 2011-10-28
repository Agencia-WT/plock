<?php
class AppController extends Controller {

	var $components = array('Auth','Session','Gravatar','DebugKit.Toolbar');

	function beforeFilter(){
		$this->Auth->authenticate = ClassRegistry::init('User');
		$this->Auth->flashElement    = "auth_error";
		$this->Auth->loginError = "Usuário e/ou senha incorreto(s)";
		$this->Auth->authError = "Você está tentando acessar uma área restrita, faça login para continuar.";
		$this->Auth->loginRedirect = array('action' => 'profile', 'controller' => 'users');
		$this->Auth->logoutRedirect = array('action' => 'login', 'controller' => 'users');
	}
}
?>