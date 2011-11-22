<?php
/**
* 
*/
class Log extends AppModel
{
	var $name 	 = 'Log';
	var $belongsTo = array(
		'User' => array(
			'className'    => 'User',
			'foreignKey'    => 'users_id'
		)
	);
 

	function create( $uid, $action )
	{
		$dados['Log']['users_id'] = $uid;
		$dados['Log']['content'] = $action;
		
		$this->save($dados);
		
	}
	
	function getLatest($count = 10)
	{
		return $this->find('all', array(
			'limit' => $count,
			'order' => 'Log.created DESC'));
	}
}

?>