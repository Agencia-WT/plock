<?php

class Dominio extends AppModel
{
	var $name = 'Dominio';
  	var $belongsTo = array
  	(
	    'Cliente' => array
	    (
	        'className'  => 'Cliente',
	        'foreignKey' => 'clientes_id'
	    )
	);  
}

?>