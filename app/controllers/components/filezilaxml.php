<?php
/**
*  Converter array de php para XML do Filezilla
*/
class FilezilaxmlComponent extends Object
{
 
	function parse($clientes){
	    
		$a = '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
		$a .= '<FileZilla3>';
			$a .= '<Servers>';
			foreach($clientes as $c){
				
				$a .= '<Server>';
					$a .= '<Host>'.( isset($c['Dominio'][0]['ftp_host']) ? $c['Dominio'][0]['ftp_host'] : '' ).'</Host>';
					$a .= '<Port>21</Port>';
					$a .= '<Protocol>0</Protocol>';
		            $a .= '<Type>0</Type>';
		            $a .= '<User>'.( isset($c['Dominio'][0]['ftp_username']) ? $c['Dominio'][0]['ftp_username'] : '' ).'</User>';
		            $a .= '<Pass>'.( isset($c['Dominio'][0]['ftp_password']) ? $c['Dominio'][0]['ftp_password'] : '' ).'</Pass>';
		            $a .= '<Logontype>1</Logontype>';
		            $a .= '<TimezoneOffset>0</TimezoneOffset>';
		            $a .= '<PasvMode>MODE_DEFAULT</PasvMode>';
		            $a .= '<MaximumMultipleConnections>0</MaximumMultipleConnections>';
		            $a .= '<EncodingType>Auto</EncodingType>';
		            $a .= '<BypassProxy>0</BypassProxy>';
		            $a .= '<Name>'.$c['Cliente']['nome'].'</Name>';
		            $a .= '<Comments />';
		            $a .= '<LocalDir />';
		            $a .= '<RemoteDir />';
		            $a .= '<SyncBrowsing>0</SyncBrowsing>'.$c['Cliente']['nome'].'#x0A';
				$a .= '</Server>';
			}
			$a .= '</Servers>';
		$a .= '</FileZilla3>';
	
	 
    	return $a;
	}

}

?>