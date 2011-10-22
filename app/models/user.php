<?php 
#doc
#	classname:	User
#	scope:		PUBLIC
#
#/doc

class User extends AppModel
{
	var $name = 'User';
	
	
	var $validate = array(
		'username' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'Alphabets and numbers only',
				'on' => 'create'
				)
		),
		'email' => array(
			'alphaNumeric' => array(
				'rule' => 'email',
				'required' => true,
				'message' => 'Alphabets and numbers only'
				)
		),
		
	);
	
	function hashPasswords($data) {
		if (isset($data['User']['password'])) {
			$data['User']['password'] = md5($data['User']['password']);
			return $data;
		}
		return $data;
	}
	
	
	function getUser(){
		return $this->Auth->user();
	}
	


}
### ?>