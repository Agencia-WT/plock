<?php 
#doc
#	classname:	Cliente
#	scope:		PUBLIC
#
#/doc

class Cliente extends AppModel
{
	var $name = 'Cliente';
	var $hasMany = array(
	    'Ftp' => array(
	        'className'     => 'Ftp',
	        'foreignKey'    => 'clientes_id',
	    )
	); 
	var $belongsTo = array(
	    'Server' => array(
	        'className'    => 'Server',
	        'foreignKey'    => 'servers_id'
	    )
	);	

	var $validate = array(
	    'nome' => array(
	        'rule' => array('minLength', 2),
	        'message' => ''
	    )
	);
		
	function ultimosClientes(){
		
		$clientes = $this->find('all', array(
			'order' => array('Cliente.modified DESC'),
			'limit' => 5));
			
		return $clientes;
		
	}


}
### ?>