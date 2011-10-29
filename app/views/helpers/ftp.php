<?php
/**
* Ftp Helper
*/
class FtpHelper extends AppHelper
{
	
	function check($ftp,$username,$password){
		
		@$f = ftp_connect($ftp);
		@$login = ftp_login($f, $username, $password); 
		
		if($login){
			return "<span class='status-ftp success'>Validado</span>";
		}else{
			return "<span class='status-ftp failed'>Falha na conexão</span>";
		}
		
		
		
		
	}
}

?>