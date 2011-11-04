<?php
/**
* Ftp Helper
*/
class FtpcheckHelper extends AppHelper
{
	
	function check($ftp,$username,$password){
		
		if($ftp && $username && $password){
				@$f = ftp_connect($ftp);
				@$login = ftp_login($f, $username, $password); 

				if($login){
					return "<span class='label success'>Verificado</span>";
				}else{
					return "<span class='label important'>Falha na conexão</span>";
				}
		}else{
			return "<span class='label important'>Erro na conexão</span>";
		}
		
	
		
		
		
		
	}
}

?>