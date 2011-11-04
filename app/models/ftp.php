<?php
/**
* 
*/
class Ftp extends AppModel
{
	var $name = 'Ftp';
  	var $belongsTo = array(
	    'Cliente' => array(
	        'className'    => 'Cliente',
	        'foreignKey'    => 'clientes_id'
	    )
	);  

	
}

?>