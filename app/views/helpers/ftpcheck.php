<?php
/**
* Ftp Helper
*/
class FtpcheckHelper extends AppHelper
{
	
	function check($ftp,$username,$password){
		
		@$f = ftp_connect($ftp);
		@$login = ftp_login($f, $username, $password); 
		
		if($login){
			return "<span class='label success'>Validado</span>";
		}else{
			return "<span class='label important'>Falha na conexão</span>";
		}
		
		
		
		
	}
}

?>