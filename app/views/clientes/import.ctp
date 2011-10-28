<h2>Importar clientes</h2>
<hr>
<strong>Escolha o formato:</strong><br/>
<div class="well" style="margin-top:8px">
	<button class="btn importBtn" alt="XML">Filezilla XML</button>&nbsp;
</div>

<div id="resultREST">

	<?php
	if(@$clientesXML){
		echo "<h2>Clientes adicionados</h2>";
		foreach($clientesXML as $c){
			echo "<div class='tumb_cliente_export_xml'>";
			echo $c['Name'];
			echo "</div>";
			echo "<div class='clear'></div>";
		}
	}
	?>
	
</div>