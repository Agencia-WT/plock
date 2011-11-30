<?php
/**
* 
*/
class Message extends AppModel
{
	
	var $name = 'Message';
	
    var $belongsTo = array(        
		'User' => array(            
			'className'    => 'User',            
			'foreignKey'    => 'users_id'        
		)    
	); 
	
	var $validate = array
	(
		'title' => array
		(
			'notEmpty' => array
			(
				'rule' 	   => 'notEmpty',
				'required' => true,
				'message'  => 'Titulo obrigatório',
			)
		)
	); 
	
}

?>