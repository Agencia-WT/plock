<?php
/**
*  Força o download de um arquivo.
*/
class DownloadComponent extends Object
{
	/**
	 * @param $arquivo -> Informe o path do arquivo ou uma string para gerar o arquivo.
	 * @param $arquivo_nome -> Informe o nome do arquivo com sua respectiva extesão caso passe em $arquivo uma string.
	 */
	function download($arquivo, $arquivo_nome = null)
	{
		# Caso seje um arquivo.
		if ( is_file($arquivo) )
		{
			# $arquivo_nome recebe o nome do mesmo.
			$arquivo_nome = basename($arquivo);
			
			# Calcula o tamanho do arquivo.
			$file_size = filesize($arquivo);
		}
		# Caso seje uma string
		{
			# Calcula o tamanho do arquivo.
			$file_size = strlen($arquivo);
		}
		
		
    	header('Content-type: octet/stream');
    	header('Content-disposition: attachment; filename='.$arquivo_nome.';');
    	header('Content-Length: '.$file_size);
    
		
    	if ( is_file($arquivo) )
		{
			readfile($arquivo);
		} 
		else 
		{
			echo $arquivo;	
		}
	}

}

?>