<h2>Exportar lista de clientes</h2>
<hr>
<strong>Escolha o formato:</strong><br/>
<div class="well" style="margin-top:8px">
	<button class="btn primary exportBtn" alt="JSON">JSON</button>&nbsp;
	<button class="btn exportBtn" alt="XML">XML</button>&nbsp;
	<button class="btn info">CSV</button>&nbsp;
	<button class="btn success">HTML</button>&nbsp;
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