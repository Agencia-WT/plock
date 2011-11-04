<?php
/**
* 
*/
class FtpsController extends AppController
{
	var $uses = array("Ftp","Cliente");
	
	function beforeFilter(){
		parent::beforeFilter();
		
		$this->set("user", $this->Auth->user());
		
		# Cria uma variavel com os ultimos 5 clientes modificados
		$this->set("clientes",$this->Cliente->ultimosClientes());
		
		$this->set("active_menu","clientes");
	}
	
	function add($id = null){
		
		$this->set('cliente', $this->Cliente->findById($id));
		
		if(!empty($this->data)){
			if($this->Ftp->save($this->data)){
				$this->Session->setFlash('FTP incluido com sucesso!', 'flash_success');
				$url = "/clientes/view/".$this->data['Ftp']['clientes_id'];
				$this->redirect($url);
			}
		}
	}
	
	function delete($id = null){
		
		
		$ftp = $this->Ftp->findById($id);
		$cliente = $ftp['Cliente']['id'];
		
		# Deleta o ftp
		$this->Ftp->delete($id);
		$this->Session->setFlash('FTP excluido com sucesso!', 'flash_success');
		
		# Redireciona de volta para o cliente
		$url = "/clientes/view/".$cliente;
		$this->redirect($url);

	}
	
	function edit($id = null){
		
		$ftp = $this->Ftp->findById($id);

		$url = "/clientes/view/".$ftp['Cliente']['id'];
		
		$this->set("ftp",$ftp);
		
		if(!empty($this->data)){
			
			if($this->Ftp->save($this->data)){
				$this->Session->setFlash('FTP editado com sucesso!', 'flash_success');
				$this->redirect($url);
			}else{
				$this->Session->setFlash('Falha ao editar!', 'flash_fail');
				$this->redirect($url);
			}
			
			

		}
		
	}
	
}

?>