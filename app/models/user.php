<?php 
#doc
#	classname:	User
#	scope:		PUBLIC
#
#/doc

class User extends AppModel
{
	var $name = 'User';
	
    var $hasMany = array(
        'Log' => array(
            'className'     => 'Log',
            'foreignKey'    => 'users_id'
        ),
		'Message' => array(
			'className' => 'Message',
			'foreignKey' => 'users_id'
		)
    );
	
	var $validate = array
	(
		'username' => array
		(
			'alphaNumeric' => array
			(
				'rule' 	   => 'alphaNumeric',
				'required' => true,
				'message'  => 'Apenas letras e números sem espaços',
				'on' 	   => 'create'
			),
			'isUnique' => array
			(
				'rule' => 'isUnique',
				'message' => 'Usuário já cadastrado'
			)
		),
		'email' => array
		(
			'alphaNumeric' => array
			(
				'rule' 	   => 'email',
				'required' => true,
				'message'  => 'Email no formato incorreto'
			)
		),
	);
	
	
	function hashPasswords($data) 
	{
		if ( isset($data['User']['password']) ) 
		{
			$data['User']['password'] = md5($data['User']['password']);
			return $data;
		}
		
		return $data;
	}
	
	
	function getUser()
	{
		return $this->Auth->user();
	}

}
### ?>