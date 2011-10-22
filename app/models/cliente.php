<?php 
#doc
#	classname:	Cliente
#	scope:		PUBLIC
#
#/doc

class Cliente extends AppModel
{
	var $name = 'Cliente';

	var $validate = array(
		'nome' => array(
			'alphaNumeric' => array(
				'rule' => 'alphaNumeric',
				'required' => true,
				'message' => 'Preencha este campo',
				'on' => 'create'
				)
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