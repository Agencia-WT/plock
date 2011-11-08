<?php
/**
* 
*/
class Task extends AppModel
{
	var $name = 'Task';
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